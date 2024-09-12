<?php

namespace App\Form;

use App\Entity\Contents;
use App\Entity\Pages;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('orderContent')
            ->add('hook')
            ->add('title')
            ->add('subtitle')
            ->add('textContent')
            ->add('mediaSrc')
            ->add('mediaAlt')
            ->add('page', EntityType::class, [
                'class' => Pages::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contents::class,
        ]);
    }
}
