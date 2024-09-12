<?php

namespace App\Form;

use App\Entity\NewsletterSuscribers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\NotBlank;

class NewsletterSuscribersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => new NotBlank(),
                'label' => 'Votre adresse mail',
                'attr' => ['class' => 'form-control']
            ])
            ->add('legalConsent', CheckboxType::class, [
                'constraints' => new IsTrue(['message' => 'You must agree to the terms.']),
                'label' => 'J\'accepte les conditions d\'utilisation'
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NewsletterSuscribers::class,
        ]);
    }
}