<?php 

namespace App\DataFixtures;

use App\Entity\ProductLabels;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class ProductLabelsFixtures extends Fixture {
    public function load(ObjectManager $manager) 
    {
    
        $productLabelsData = [
            [
            "nameLabel" => "Redactiv"
            ],
            [
            "nameLabel" => "Barbatif"
            ],
            [
            "nameLabel" => "NosCheveux"
            ]
        ];

        foreach($productLabelsData as $productLabelData) {
            $productLabel = new ProductLabels();
            $productLabel -> setNameLabel($productLabelData['nameLabel']);

        $manager -> persist($productLabel);
        }
        
    $manager -> flush();
    }
}