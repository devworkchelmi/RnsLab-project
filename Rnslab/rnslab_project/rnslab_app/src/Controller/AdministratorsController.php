<?php

namespace App\Controller;

use App\Entity\Administrators;
use App\Form\AdministratorsType;
use App\Repository\AdministratorsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administrators')]
class AdministratorsController extends AbstractController
{
    #[Route('/', name: 'app_administrators_index', methods: ['GET'])]
    public function index(AdministratorsRepository $administratorsRepository): Response
    {
        return $this->render('administrators/index.html.twig', [
            'administrators' => $administratorsRepository->findAll(),
        ]);
    }

    // Déclare une route pour le chemin '/new' avec le nom 'app_administrators_new'. Cette route accepte les méthodes GET et POST.
    #[Route('/new', name: 'app_administrators_new', methods: ['GET', 'POST'])]
    // Déclare la méthode 'new' du contrôleur qui accepte un objet Request, un EntityManagerInterface et un UserPasswordHasherInterface,
    //et retourne un objet Response.
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        // Crée une nouvelle instance de l'entité Administrators.
        $administrator = new Administrators();
         // Crée un formulaire basé sur la classe AdministratorsType et associe ce formulaire à l'objet $administrator.
        $form = $this->createForm(AdministratorsType::class, $administrator);
        // Traite la requête HTTP (GET ou POST) et remplit le formulaire avec les données soumises, si disponibles.
        $form->handleRequest($request);

         // Vérifie si le formulaire a été soumis et si les données sont valides.
        if ($form->isSubmitted() && $form->isValid()) {

            // Hash le mot de passe de l'administrateur en utilisant le UserPasswordHasherInterface.
            $hashedPassword = $passwordHasher->hashPassword(
                $administrator,
                $administrator->getPassword()
            );
             // Définit le mot de passe de l'administrateur avec le mot de passe haché.
            $administrator->setPassword($hashedPassword);

             // Prépare l'objet $administrator à être enregistré dans la base de données.
            $entityManager->persist($administrator);

            // Exécute les opérations de persistance en attente dans la base de données, enregistrant effectivement l'administrateur.
            $entityManager->flush();

            // Redirige l'utilisateur vers la route 'app_administrators_index' après avoir enregistré l'administrateur.
            return $this->redirectToRoute('app_administrators_index', [], Response::HTTP_SEE_OTHER);
        }
        // Si le formulaire n'a pas été soumis ou est invalide, affiche le formulaire de création d'administrateur.
        return $this->render('administrators/new.html.twig', [
            'administrator' => $administrator,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_administrators_show', methods: ['GET'])]
    public function show(Administrators $administrator): Response
    {
        return $this->render('administrators/show.html.twig', [
            'administrator' => $administrator,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_administrators_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Administrators $administrator, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdministratorsType::class, $administrator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_administrators_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('administrators/edit.html.twig', [
            'administrator' => $administrator,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_administrators_delete', methods: ['POST'])]
    public function delete(Request $request, Administrators $administrator, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$administrator->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($administrator);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_administrators_index', [], Response::HTTP_SEE_OTHER);
    }
}
