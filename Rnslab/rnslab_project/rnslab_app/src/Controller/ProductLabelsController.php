<?php

namespace App\Controller;

use App\Entity\ProductLabels;
use App\Form\ProductLabelsType;
use App\Repository\ProductLabelsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/product-labels')]
class ProductLabelsController extends AbstractController
{
    #[Route('/', name: 'app_product_labels_index', methods: ['GET'])]
    public function index(ProductLabelsRepository $productLabelsRepository): Response
    {
        return $this->render('product_labels/index.html.twig', [
            'product_labels' => $productLabelsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_product_labels_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $productLabel = new ProductLabels();
        $form = $this->createForm(ProductLabelsType::class, $productLabel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($productLabel);
            $entityManager->flush();

            return $this->redirectToRoute('app_product_labels_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('product_labels/new.html.twig', [
            'product_label' => $productLabel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_product_labels_show', methods: ['GET'])]
    public function show(ProductLabels $productLabel): Response
    {
        return $this->render('product_labels/show.html.twig', [
            'product_label' => $productLabel,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_product_labels_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProductLabels $productLabel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProductLabelsType::class, $productLabel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_product_labels_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('product_labels/edit.html.twig', [
            'product_label' => $productLabel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_product_labels_delete', methods: ['POST'])]
    public function delete(Request $request, ProductLabels $productLabel, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$productLabel->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($productLabel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_product_labels_index', [], Response::HTTP_SEE_OTHER);
    }
}
