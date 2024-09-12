<?php

namespace App\Controller\Admin;

use App\Entity\Administrators;
use App\Entity\Articles;
use App\Entity\Contents;
use App\Entity\Faqs;
use App\Entity\LegalInformations;
use App\Entity\MessageContacts;
use App\Entity\NewsletterSuscribers;
use App\Entity\Pages;
use App\Entity\Products;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToCrud('Informations légales RnsLab', 'fas fa-circle-info', LegalInformations::class);
        yield MenuItem::linkToCrud('Vos Messages', 'fas fa-message', MessageContacts::class);
        yield MenuItem::linkToCrud('Produits', 'fa-brands fa-product-hunt', Products::class);
        yield MenuItem::linkToCrud('Articles', 'fas fa-newspaper', Articles::class);
        yield MenuItem::linkToCrud('FAQ', 'fas fa-question', Faqs::class);
        yield MenuItem::linkToCrud('Newsletter ', 'fas fa-envelope', NewsletterSuscribers::class);
        yield MenuItem::linkToCrud('Pages', 'fas fa-file', Pages::class);
        yield MenuItem::linkToCrud('Contenues', 'fas fa-arrows-to-dot', Contents::class);
        yield MenuItem::linkToCrud('Admin', 'fas fa-home', Administrators::class);

    }
}
