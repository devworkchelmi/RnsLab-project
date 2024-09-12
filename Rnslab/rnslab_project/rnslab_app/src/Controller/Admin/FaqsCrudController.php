<?php

namespace App\Controller\Admin;

use App\Entity\Faqs;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class FaqsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Faqs::class;
    }


    public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->add(Crud::PAGE_INDEX, Action::DETAIL) 

            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Créer une FAQ');
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

            TextField::new('question','Question'),
            TextField::new('response','Réponse')
                ->setFormType(CKEditorType::class)
                ->renderAsHtml(true),
            NumberField::new('orderFaqs','Ordre'),
            IdField::new('id')
            ->hideOnDetail()
            ->hideOnIndex()
            ->hideOnForm(),
        ];
    }

    public function ConfigureCrud (Crud $crud) : Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des FAQS')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');;

    }



  
}
