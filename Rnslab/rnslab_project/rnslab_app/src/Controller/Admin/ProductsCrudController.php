<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Créer un produit');
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
            TextField::new('label')->setLabel('Marque'),
            ($pageName === Crud::PAGE_INDEX)
                ? BooleanField::new('hightlighted', 'Star')->renderAsSwitch(false)
                : BooleanField::new('hightlighted', 'Star'),
            ImageField::new('pictureSrc', 'Image')
                ->setUploadDir('public/images')
                //NOTE: setBasePath() not working properly => '../images/' added to img src in front office templates
                ->setBasePath('/images')
                ->setUploadedFileNamePattern('[slug].[extension]')
                ->setRequired(false),
            TextField::new('pictureAlt')
                ->setLabel('Texte alternative de l\'image'),
            TextField::new('title','Titre'),
            TextField::new('description')
                ->setFormType(CKEditorType::class),
            NumberField::new('orderProduct','Ordre'),
            AssociationField::new('label', 'Label')
                ->setCrudController(ProductLabelsCrudController::class)
                ->setFormTypeOption('choice_label', 'nameLabel'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des produits')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }
}