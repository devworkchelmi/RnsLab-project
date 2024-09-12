<?php

namespace App\Form;

use App\Entity\MessageContacts;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class MessageContactsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('civility', ChoiceType::class, [
            'choices' => [
                'M.' => ' M. ',
                'Mme.' => ' Mme. ',
                'Mx.' => ' Mx. ',
            ],
            'expanded' => true,
            'multiple' => false,
            'attr' => ['class' => 'form-control'],
            'label' => 'Civilité',
        ])
        ->add('firstname', null, [
            'attr' => ['class' => 'form-control'],
            'label' => 'Prénom',
        ])
        ->add('lastname', null, [
            'attr' => ['class' => 'form-control'],
            'label' => 'Nom de famille',
        ])
        ->add('telnumber', null, [
            'attr' => ['class' => 'form-control'],
            'label' => 'Numéro de téléphone',
        ])
        ->add('email', null, [
            'attr' => ['class' => 'form-control'],
            'label' => 'Email',
            'constraints' => [
                new NotBlank(),
                new Email([
                    'message' => 'Veuillez entrer une adresse email valide de type',
                ]),
            ],
        ])
        ->add('occupation', null, [
            'attr' => ['class' => 'form-control'],
            'label' => 'Profession',
        ])
        ->add('requestObject', null, [
            'attr' => ['class' => 'form-control'],
            'label' => 'Objet de la demande',
        ])
        ->add('message', null, [
            'attr' => ['class' => 'form-control'],
            'label' => 'Message',
        ]);
        // ->add('dateSend', DateType::class, [
        //     'widget' => 'single_text',
        //     'attr' => ['class' => 'form-control'],
        //     'label' => 'Date d\'envoi',
        //     'disabled' => true,
        // ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MessageContacts::class,
        ]);
    }
}
