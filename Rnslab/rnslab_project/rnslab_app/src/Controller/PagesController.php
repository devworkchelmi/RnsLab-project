<?php

namespace App\Controller;

use App\Entity\MessageContacts;
use App\Entity\NewsletterSuscribers;
use App\Entity\Pages;
use App\Form\MessageContactsType;
use App\Form\NewsletterSuscribersType;
use App\Repository\NewsletterSuscribersRepository;
use App\Repository\PagesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\MailerInterface;

#[Route('/')]
class PagesController extends AbstractController
{
    #[Route('/', name: 'app_pages_home', methods: ['GET'])]
    public function home(PagesRepository $pagesRepository): Response
    {
        $page = $pagesRepository->findOneBy([]);

        if (!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }

        return $this->render('pages/pages.html.twig', [
            'page' => $page,
        ]);
    }

    #[Route('/{slug}', name: 'app_pages_show', methods: ['GET', 'POST'])]
    public function show(
        string $slug,
        PagesRepository $pagesRepository,
        NewsletterSuscribersRepository $newsletterSuscribersRepository,
        Request $request,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer,
        LoggerInterface $logger
    ): Response {
        $page = $pagesRepository->findOneBy(['slug' => $slug]);
    
        if (!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }
    
        $messageContact = new MessageContacts();
        $form = $this->createForm(MessageContactsType::class, $messageContact);
        $form->handleRequest($request);
    
        $newsletterSuscriber = new NewsletterSuscribers();
        $newsletterForm = $this->createForm(NewsletterSuscribersType::class, $newsletterSuscriber);
        $newsletterForm->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {

            $messageContact = $form->getData();

            $entityManager->persist($messageContact);
            $entityManager->flush();

            $emailContact = (new TemplatedEmail())
                ->from($messageContact->getEmail())
                ->to('rnslabDev@example.com')
                ->subject('Nouvelle demande de contact')
                ->htmlTemplate('mailer/new_message.html.twig')
                ->context([
                    'contact' => $messageContact
                ]);

            try {
                $mailer->send($emailContact);
            } catch (TransportExceptionInterface $error) {
                var_dump('Error : ' . $error);
            }

            $this->addFlash('success', 'Votre Message a bien été envoyé');

            return $this->redirectToRoute('app_pages_show', ['slug' => $page->getSlug()], Response::HTTP_SEE_OTHER);
        }
    
        if ($newsletterForm->isSubmitted() && $newsletterForm->isValid()) {
            $existingSubscriber = $newsletterSuscribersRepository->findOneBy(['email' => $newsletterSuscriber->getEmail()]);
            if ($existingSubscriber) {
                $this->addFlash('Erreur :', 'cet email est déjà abonné à la newsletter.');
            } else {
                $newsletterSuscriber->setDateSuscription(new \DateTime('now', new \DateTimeZone('UTC')));
                $entityManager->persist($newsletterSuscriber);
                $entityManager->flush();
                $this->addFlash('Succès', 'Merci pour votre abonnement à la newsletter !');
                return $this->redirectToRoute('app_pages_show', ['slug' => $slug]);
            }
        }
    
        return $this->render('pages/pages.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
            'newsletterForm' => $newsletterForm->createView(),
        ]);
    }
}
