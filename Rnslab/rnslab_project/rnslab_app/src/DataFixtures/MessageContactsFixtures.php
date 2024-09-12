<?php

namespace App\DataFixtures;

use App\Entity\MessageContacts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MessageContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $contact = new MessageContacts();
            $contact->setCivility($faker->randomElement(['M.', 'Mme.', 'Mx.']));
            $contact->setFirstname($faker->firstName);
            $contact->setLastname($faker->lastName);
            $contact->setTelnumber($faker->randomNumber(9));
            $contact->setEmail($faker->email);
            $contact->setOccupation($faker->jobTitle);
            $contact->setRequestObject($faker->sentence(1));
            $contact->setMessage($faker->text);
            $contact->setDateSend($faker->dateTimeThisYear);

            $manager->persist($contact);
        }

        $manager->flush();
    }
}
