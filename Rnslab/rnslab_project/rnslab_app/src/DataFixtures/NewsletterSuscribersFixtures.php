<?php

namespace App\DataFixtures;

use App\Entity\NewsletterSuscribers;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NewsletterSuscribersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //foreach index < 5 build a new subscription
       for($i = 0; $i < 5; $i++) {
        $NewsletterSuscribers = new NewsletterSuscribers();
        $NewsletterSuscribers -> setEmail("user." . $i . "@example.com");
        $NewsletterSuscribers -> setLegalConsent(true);
        $NewsletterSuscribers -> setDateSuscription(new DateTime());

        $manager->persist($NewsletterSuscribers);
       }

       $manager->flush(); 
    }
}
