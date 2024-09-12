<?php

namespace App\Form;

use App\Entity\ProductLabels;
use App\Entity\Products;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hightlighted')
            ->add('orderproduct')
            ->add('title')
            ->add('description')
            ->add('pictureSrc')
            ->add('pictureAlt')
            ->add('label', EntityType::class, [
                'class' => ProductLabels::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
