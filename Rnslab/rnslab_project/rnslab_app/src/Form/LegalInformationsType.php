<?php

namespace App\Form;

use App\Entity\LegalInformations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LegalInformationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typeCompagny')
            ->add('nameCompagny')
            ->add('adressHeadOffice')
            ->add('telNumberHeadOffice')
            ->add('siret')
            ->add('tvaIdNumber')
            ->add('capitalAmount')
            ->add('adressLogistic')
            ->add('adressContact')
            ->add('telNumberContact1')
            ->add('telNumberContact2')
            ->add('firstnameDirector')
            ->add('lastnameDirector')
            ->add('firstnameContact')
            ->add('lastnameContact')
            ->add('roleContact')
            ->add('nameInternethost')
            ->add('adressInternethost')
            ->add('telNumberInternethost')
            ->add('titleFooter')
            ->add('descriptionFooter');   
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LegalInformations::class,
        ]);
    }
}
