<?php

namespace App\Controller\Admin;

use App\Entity\ProductLabels;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class ProductLabelsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductLabels::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nameLabel', 'Nom du Label'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des labels de produits');
    }
}