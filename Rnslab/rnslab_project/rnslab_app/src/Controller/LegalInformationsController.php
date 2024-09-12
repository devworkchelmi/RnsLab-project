<?php

namespace App\Controller;

use App\Entity\LegalInformations;
use App\Form\LegalInformationsType;
use App\Repository\LegalInformationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Router\EasyAdminRouter;

// #[Route('/legal-informations')]
class LegalInformationsController extends AbstractController
{
    //  #[Route('/', name: 'app_legal_informations_index', methods: ['GET'])]
    // public function index(LegalInformationsRepository $legalInformationsRepository): Response
    // {
    //     return $this->render('legal_informations/index.html.twig', [
    //         'legal_informations' => $legalInformationsRepository->findAll(),
    //     ]);
    // }

    // #[Route('/new', name: 'app_legal_informations_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $legalInformation = new LegalInformations();
    //     $form = $this->createForm(LegalInformationsType::class, $legalInformation);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($legalInformation);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_legal_informations_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('legal_informations/new.html.twig', [
    //         'legal_information' => $legalInformation,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_legal_informations_show', methods: ['GET'])]
    // public function show(LegalInformations $legalInformation): Response
    // {
    //     return $this->render('legal_informations/show.html.twig', [
    //         'legal_information' => $legalInformation,
    //     ]);
    // }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('admin/legal-informations/{id}/edit', name: 'app_legal_informations_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LegalInformations $legalInformation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LegalInformationsType::class, $legalInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin', [
                'entity' => 'LegalInformations',
                'crudAction' => 'index',
                'crudControllerFqcn' => 'App\Controller\Admin\LegalInformationsCrudController'
            ]);
        }

        return $this->render('legal_informations/edit.html.twig', [
            'legal_information' => $legalInformation,
            'form' => $form,
        ]);
    }

    // #[Route('/{id}', name: 'app_legal_informations_delete', methods: ['POST'])]
    // public function delete(Request $request, LegalInformations $legalInformation, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$legalInformation->getId(), $request->getPayload()->get('_token'))) {
    //         $entityManager->remove($legalInformation);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_legal_informations_index', [], Response::HTTP_SEE_OTHER);
    // }
}
