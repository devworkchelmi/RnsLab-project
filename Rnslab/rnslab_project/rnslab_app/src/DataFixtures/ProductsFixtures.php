<?php 

namespace App\DataFixtures;

use App\Entity\ProductLabels;
use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class ProductsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $productsData = [
            [
                "hightlighted" => false,
                "orderproduct" => 1,
                "title" => "Duo Post Chimiothérapie",
                "description" => "Découvrez notre Duo Post Chimiothérapie : REDACTIV 1®,
                 un sérum gel unique pour stimuler la repousse des cheveux sur les cuirs
                 lisses ou naissants...",
                "pictureSrc" => "carousel-produit-redactiv-1.jpg",
                "pictureAlt" => "The hightlighted product of redactiv",
                "label" => "Redactiv",
            ],
            [
                "hightlighted" => false,
                "orderproduct" => 2,
                "title" => "Duo Densité",
                "description" => "Optez pour notre cure d'un mois avec le Duo Capillaire :
                 REDACTIV 2®, un sérum naturel anti-chute, et le Shampooing Densifiant aux
                 extraits de tamarin et...",
                "pictureSrc" => "carousel-produit-redactiv-2.jpg",
                "pictureAlt" => "The second hightlighted product of redactiv",
                "label" => "Redactiv",
            ],
            [
                "hightlighted" => true,
                "orderproduct" => 3,
                "title" => "CURE RENAISSANCE POST CHIMIOTHÉRAPIE (4MOIS)",
                "description" => "Découvrez la CURE RENAISSANCE POST CHIMIOTHÉRAPIE (4 mois)
                 : REDACTIV 1®, un sérum gel unique pour réactiver la croissance, REDACTIV 
                 2®, un sérum naturel anti-chute..",
                "pictureSrc" => "carousel-produit-redactiv-3.jpg",
                "pictureAlt" => "The third hightlighted product of redactiv",
                "label" => "Redactiv",
            ],
            [
                "hightlighted" => true,
                "orderproduct" => 1,
                "title" => "KILAVE - SHAMPOOING CHEVEUX & BARBE QUOTIDIEN",
                "description" => "Que demande-t-on à un shampooing ? KILAVE® !
                 Celui-ci le fait parfaitement pour les cheveux et la barbe !
                 Ce shampooing technique..",
                "pictureSrc" => "carousel-produit-barbatif-1.jpg",
                "pictureAlt" => "The first hightlighted product of barbatif",
                "label" => "Barbatif",
            ],
            [
                "hightlighted" => false,
                "orderproduct" => 2,
                "title" => "REBOOST POIL - SÉRUM BOOSTER DE BARBE",
                "description" => "REBOOST POILS®. S or not S... That is the question!
                Ce sérum de croissance spécialement formulé pour la barbe contient le 
                complexe d'actifs..",
                "pictureSrc" => "carousel-produit-barbatif-2.jpg",
                "pictureAlt" => "The second hightlighted product of barbatif",
                "label" => "Barbatif",
            ],
            [
                "hightlighted" => true,
                "orderproduct" => 1,
                "title" => "Vos cheveux sont nos cheveux, c'est pourquoi on vous propose les meilleures marques!",
                "description" => "Une large gamme de soins du ruban adhésif, aux shampooings. ",
                "pictureSrc" => "carousel-produit-noscheveux.jpg",
                "pictureAlt" => "The first hightlighted product of NosCheveux.com.",
                "label" => "NosCheveux",
            ],
        ];

        foreach ($productsData as $productData) {

            $label = $manager->getRepository(ProductLabels::class)->findOneBy(['nameLabel' => $productData['label']]);
            if (!$label) {
                throw new \Exception("No product found with label : '{$productData['label']}'");
            }

            $product = new Products();
            $product -> setHightlighted($productData['hightlighted']);
            $product -> setOrderproduct($productData['orderproduct']);
            $product -> setTitle($productData['title']);
            $product -> setDescription($productData['description']);
            $product -> setPictureSrc($productData['pictureSrc']);
            $product -> setPictureAlt($productData['pictureAlt']);
            $product -> setLabel($label);

            $manager -> persist($product);
        }

        $manager -> flush();
     }
     public function getDependencies() 
     {
        return 
        [
            ProductLabelsFixtures::class, 
        ];
     }
}