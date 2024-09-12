<?php

namespace App\Controller\Admin;

use App\Entity\MessageContacts;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class MessageContactsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MessageContacts::class;
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

            DateField::new('dateSend','Date d\'envoie'),
            TextField::new('civility','Civilité'),
            TextField::new('lastname','Nom'),
            TextField::new('firstname','Prénom'),
            TextField::new('occupation','Statut'),
            TextField::new('requestObject','Objet du message'),
            TextEditorField::new('message','Message'),
            TextField::new('telNumber','Téléphone'),
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
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des messages');

    }



}
