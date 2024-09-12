<?php

namespace App\DataFixtures;

use App\Entity\Pages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PagesFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        // Création de plusieurs articles de test
        $pagesData = [
            [
                'title' => 'Accueil',
                'metaDescription' => 'Accueil description',
            ],
            [
                'title' => 'Notre savoir-faire',
                'metaDescription' => 'Notre savoir-faire description',
            ],
            [
                'title' => 'Nos marques',
                'metaDescription' => 'Nos marques description',
            ],
            [
                'title' => 'Créez votre marque',
                'metaDescription' => 'Créez votre marque description',
            ],
            [
                'title' => 'Contactez-nous',
                'metaDescription' => 'Contactez-nous description',
            ],
            [
                'title' => 'Mentions légales',
                'metaDescription' => 'Mentions légales description',
            ],
        ];

        foreach ($pagesData as $pageData) {
            $page = new Pages();
            $page->setTitle($pageData['title']);
            $page->setMetaDescription($pageData['metaDescription']);
            $manager->persist($page);
        }

        $manager->flush();
    }
}