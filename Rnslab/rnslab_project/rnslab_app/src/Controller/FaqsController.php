<?php

namespace App\Controller;

use App\Entity\Faqs;
use App\Form\FaqsType;
use App\Repository\FaqsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class FaqsController extends AbstractController
{
    #[Route('/faqs', name: 'app_faqs_index', methods: ['GET'])]
    public function index(FaqsRepository $faqsRepository): Response
    {
        return $this->render('faqs/faq.html.twig', [
            'faqs' => $faqsRepository->findAll(),
        ]);
    }

    // #[Route('/new', name: 'app_faqs_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $faq = new Faqs();
    //     $form = $this->createForm(FaqsType::class, $faq);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($faq);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_faqs_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('faqs/new.html.twig', [
    //         'faq' => $faq,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_faqs_show', methods: ['GET'])]
    // public function show(Faqs $faq): Response
    // {
    //     return $this->render('faqs/show.html.twig', [
    //         'faq' => $faq,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'app_faqs_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Faqs $faq, EntityManagerInterface $entityManager): Response
    // {
    //     $form = $this->createForm(FaqsType::class, $faq);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_faqs_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('faqs/edit.html.twig', [
    //         'faq' => $faq,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_faqs_delete', methods: ['POST'])]
    // public function delete(Request $request, Faqs $faq, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$faq->getId(), $request->getPayload()->get('_token'))) {
    //         $entityManager->remove($faq);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_faqs_index', [], Response::HTTP_SEE_OTHER);
    // }
}
