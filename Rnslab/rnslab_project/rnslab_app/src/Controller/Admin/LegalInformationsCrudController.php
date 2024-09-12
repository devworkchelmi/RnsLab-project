<?php

namespace App\Controller\Admin;

use App\Entity\LegalInformations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class LegalInformationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LegalInformations::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplates([
                'crud/index' => 'admin\crud\adminInfosRns.html.twig',
            ])
            ->setPageTitle(Crud::PAGE_INDEX, 'Legal Informations')
            ->setEntityLabelInSingular('Legal Information')
            ->setEntityLabelInPlural('Legal Informations');
    }

    public function configureFields(string $pageName): iterable
    {
        return [

            IdField::new('id')
            ->hideOnDetail()
            ->hideOnIndex()
            ->hideOnForm(),
            FormField::addPanel('Company Information')->setIcon('fa fa-building'),
            TextField::new('typeCompagny', 'Status'),
            TextField::new('nameCompagny', 'Nom'),
            TextEditorField::new('adressHeadOffice', 'Adresse siège social'),
            TextField::new('telNumberHeadOffice', 'N° tél. siège'),
            TextField::new('siret', 'Siret'),
            TextField::new('tvaIdNumber', 'ID tva'),
            NumberField::new('capitalAmount', 'Capital'),

            FormField::addPanel('Contact Information','informations')->setIcon('fa fa-address-book'),
            TextEditorField::new('adressLogistic', 'Adresse logistique'),
            TextField::new('firstnameDirector', 'Prénom du directeur'),
            TextField::new('lastnameDirector', 'Nom du directeur'),
            TextEditorField::new('adressContact', 'Adresse contact'),
            TextField::new('telNumberContact1', 'N° contact'),
            TextField::new('telNumberContact2', 'N° contact/2'),
            TextField::new('firstnameContact', 'Prénom contact'),
            TextField::new('lastnameContact', 'Nom contact'),
            TextField::new('roleContact', 'Rôle contact'),

            FormField::addPanel('Internet Host Information', 'informations de l\'hébergeur' )->setIcon('fa fa-globe'),
            TextField::new('nameInternethost', 'Hébergeur internet'),
            TextEditorField::new('adressInternethost', 'Adresse de l\'hébergeur'),
            TextField::new('telNumberInternethost', 'N° tél. hébergeur'),

            FormField::addPanel('Footer informations'),
            TextField::new('titleFooter', 'Titre du footer'),
            TextEditorField::new('descriptionFooter', 'Présentation du footer'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }
}


