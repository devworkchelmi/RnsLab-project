<?php

namespace App\DataFixtures;

use App\Entity\Administrators;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdministratorsFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        // Création du premier administrateur
        $admin1 = new Administrators();
        $admin1->setEmail('admin1@example.com');
        $admin1->setRoles(['ROLE_ADMIN']);
        $hashedPassword1 = $this->passwordHasher->hashPassword($admin1, 'strong_password1');
        $admin1->setPassword($hashedPassword1);
        $manager->persist($admin1);

        // Création du deuxième administrateur
        $admin2 = new Administrators();
        $admin2->setEmail('admin2@example.com');
        $admin2->setRoles(['ROLE_ADMIN']);
        $hashedPassword2 = $this->passwordHasher->hashPassword($admin2, 'strong_password2');
        $admin2->setPassword($hashedPassword2);
        $manager->persist($admin2);

        // Sauvegarde des changements dans la base de données
        $manager->flush();
    }
}
