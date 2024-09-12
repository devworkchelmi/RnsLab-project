<?php

namespace App\Controller;

use App\Entity\NewsletterSuscribers;
use App\Form\NewsletterSuscribersType;
use App\Repository\NewsletterSuscribersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/newsletter-suscribers')]
class NewsletterSuscribersController extends AbstractController
{
    #[Route('/', name: 'app_newsletter_suscribers_index', methods: ['GET'])]
    public function index(NewsletterSuscribersRepository $newsletterSuscribersRepository): Response
    {
        return $this->render('newsletter_suscribers/index.html.twig', [
            'newsletter_suscribers' => $newsletterSuscribersRepository->findAll(),
        ]);
    }

    #[Route('/subscribe', name: 'newsletter_subscribe', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $newsletterSuscriber = new NewsletterSuscribers();
        $form = $this->createForm(NewsletterSuscribersType::class, $newsletterSuscriber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($newsletterSuscriber);
            $entityManager->flush();

            $this->addFlash('success', 'New subscriber added successfully!');

        }

        return $this->render('newsletter_suscribers/new.html.twig', [
            'newsletter_suscriber' => $newsletterSuscriber,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_newsletter_suscribers_show', methods: ['GET'])]
    public function show(NewsletterSuscribers $newsletterSuscriber): Response
    {
        return $this->render('newsletter_suscribers/show.html.twig', [
            'newsletter_suscriber' => $newsletterSuscriber,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_newsletter_suscribers_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NewsletterSuscribers $newsletterSuscriber, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NewsletterSuscribersType::class, $newsletterSuscriber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_newsletter_suscribers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('newsletter_suscribers/edit.html.twig', [
            'newsletter_suscriber' => $newsletterSuscriber,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_newsletter_suscribers_delete', methods: ['POST'])]
    public function delete(Request $request, NewsletterSuscribers $newsletterSuscriber, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newsletterSuscriber->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($newsletterSuscriber);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_newsletter_suscribers_index', [], Response::HTTP_SEE_OTHER);
    }
}
