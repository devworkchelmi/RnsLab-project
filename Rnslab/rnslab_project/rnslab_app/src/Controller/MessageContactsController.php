<?php

namespace App\Controller;

use App\Entity\MessageContacts;
use App\Form\MessageContactsType;
use App\Repository\MessageContactsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/message-contacts')]
class MessageContactsController extends AbstractController
{
    // #[Route('/', name: 'app_message_contacts_index', methods: ['GET'])]
    // public function index(MessageContactsRepository $messageContactsRepository): Response
    // {
    //     return $this->render('message_contacts/index.html.twig', [
    //         'message_contacts' => $messageContactsRepository->findAll(),
    //     ]);
    // }

    #[Route('/new', name: 'app_message_contacts_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $messageContact = new MessageContacts();
        $form = $this->createForm(MessageContactsType::class, $messageContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($messageContact);
            $entityManager->flush();

            // $this->addFlash('success','Votre Message a bien été envoyé');
            return $this->redirectToRoute('app_message_contacts_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('message_contacts/contact-form.html.twig', [
            'message_contact' => $messageContact,
            'form' => $form,
        ]);
    }

    // #[Route('/{id}', name: 'app_message_contacts_show', methods: ['GET'])]
    // public function show(MessageContacts $messageContact): Response
    // {
    //     return $this->render('message_contacts/show.html.twig', [
    //         'message_contact' => $messageContact,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'app_message_contacts_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, MessageContacts $messageContact, EntityManagerInterface $entityManager): Response
    // {
    //     $form = $this->createForm(MessageContactsType::class, $messageContact);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_message_contacts_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('message_contacts/edit.html.twig', [
    //         'message_contact' => $messageContact,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_message_contacts_delete', methods: ['POST'])]
    // public function delete(Request $request, MessageContacts $messageContact, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$messageContact->getId(), $request->getPayload()->get('_token'))) {
    //         $entityManager->remove($messageContact);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_message_contacts_index', [], Response::HTTP_SEE_OTHER);
    // }
}
