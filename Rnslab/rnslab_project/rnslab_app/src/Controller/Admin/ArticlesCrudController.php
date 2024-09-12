<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class ArticlesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Articles::class;
    }


    public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->add(Crud::PAGE_INDEX, Action::DETAIL) 

            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Créer un Article');
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

            DateField::new('datePublication','Date de publication'),
            ($pageName === Crud::PAGE_INDEX)
                ? BooleanField::new('hightlighted', 'Star')
            ->renderAsSwitch(false)
                : BooleanField::new('hightlighted', 'Star'),
            ImageField::new('pictureSrc', 'Image')
                ->setUploadDir('public/images')
                ->setBasePath('/images')
                ->setRequired(false),
            TextField::new('title','Titre'),
            TextField::new('textContent','Contenu')
                ->hideOnIndex()
                ->setFormType(CKEditorType::class)
                ->renderAsHtml(true),
            TextField::new('metaDescription','Méta-description'),
            TextField::new('autor','Auteur'),
            NumberField::new('orderArticle','Ordre'),
            IdField::new('id')
            ->hideOnDetail()
            ->hideOnIndex()
            ->hideOnForm(),

        ];
    }

    public function ConfigureCrud (Crud $crud) : Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des articles')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');


    }


}
