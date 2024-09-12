<?php

namespace App\Controller\Admin;

use App\Entity\NewsletterSuscribers;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class NewsletterSuscribersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NewsletterSuscribers::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->disable(Crud::PAGE_NEW, Action::NEW)
            ->disable(Crud::PAGE_EDIT, Action::EDIT)
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            });
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('email'),
            DateField::new('dateSuscription','Date de souscription')
                ->setFormat('dd.MM.yyyy'),
            IdField::new('id')
            ->hideOnDetail()
            ->hideOnIndex()
            ->hideOnForm(),
        ];
    }

    public function ConfigureCrud (Crud $crud) : Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des abonnés à la newsletter');

    }


}
