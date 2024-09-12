<?php

namespace App\Controller\Admin;

use App\Entity\Administrators;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class AdministratorsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Administrators::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->add(Crud::PAGE_INDEX, Action::DETAIL) 

            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Créer un Administrateur');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            });
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            IdField::new('id')
            ->hideOnDetail()
            ->hideOnIndex()
            ->hideOnForm(),

        ];
    }

    public function ConfigureCrud (Crud $crud) : Crud
    {
        return $crud

            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des Administrateurs')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter un nouvel utilisateur')
            ->setPageTitle(Crud::PAGE_EDIT, 'Éditer un nouvel utilisateur')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détail du nouvel utilisateur');

    }

    // public function ConfigureCrud (Crud $crud) : Crud
    // {
    //     return $crud
    //         ->setPageTitle(Crud::PAGE_INDEX, '');

    // }


    

}
