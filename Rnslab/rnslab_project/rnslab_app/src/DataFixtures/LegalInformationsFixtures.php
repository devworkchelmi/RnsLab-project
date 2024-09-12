<?php

namespace App\DataFixtures;

use App\Entity\LegalInformations;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LegalInformationsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $legalInformation = new LegalInformations();
        $legalInformation->setTypeCompagny('SAS');
        $legalInformation->setNameCompagny('RNS LAB');
        $legalInformation->setAdressHeadOffice('LABORATOIRE RENASCOR, 128 RUE LA BOETIE 75008 PARIS');
        $legalInformation->setTelNumberHeadOffice('+33(0)0 00 00 00 00');
        $legalInformation->setSiret('979 213 626 00018');
        $legalInformation->setTvaIdNumber('FR61 979 213 626');
        $legalInformation->setCapitalAmount(100000);
        $legalInformation->setAdressLogistic('124 Logistic Rd, Logistic City, LC 12345');
        $legalInformation->setAdressContact('125 Contact Rd, Contact City, CC 12345');
        $legalInformation->setTelNumberContact1('+33(0)1 11 11 11 11');
        $legalInformation->setTelNumberContact2('+33(0)2 22 22 22 22');
        $legalInformation->setFirstnameDirector('Stéphane');
        $legalInformation->setLastnameDirector('Paulet');
        $legalInformation->setFirstnameContact('Jane');
        $legalInformation->setLastnameContact('Doe');
        $legalInformation->setRoleContact('Manager');
        $legalInformation->setNameInternethost('O2SWITCH');
        $legalInformation->setAdressInternethost('CHE DES PARDIAUX 63000 CLERMONT FERRAND');
        $legalInformation->setTelNumberInternethost('+33(0)4 44 44 60 40');
        $legalInformation->setTitleFooter('RNS LAB, ');
        $legalInformation->setDescriptionFooter('créé et dirigé par Stéphane PAULET, développe des soins  innovants composés jusqu\'à 99% d\'ingrédients d\'origine naturelle destinés à réactiver la pousse des cheveux.');

        $manager->persist($legalInformation);
        $manager->flush();
    }
}
