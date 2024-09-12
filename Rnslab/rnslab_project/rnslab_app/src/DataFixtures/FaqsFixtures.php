<?php

namespace App\DataFixtures;

use App\Entity\Faqs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FaqsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faqData = [
            [
                'question' => "Lorem Ipsom?",
                'response' => "Le lorem ipsum",
                'orderFaqs' => 1,
            ],
            [
                'question' => "Lorem Ipsom?",
                'response' => "Le lorem ipsum",
                'orderFaqs' => 2,
            ],
            [
                'question' => "Lorem Ipsom?",
                'response' => "Le lorem ipsum",
                'orderFaqs' => 3,
            ],
            [
                'question' => "Lorem Ipsom?",
                'response' => "Le lorem ipsum",
                'orderFaqs' => 4,
            ]
         ];
         
         foreach ($faqData as $data) {
            $faq = new Faqs();
            $faq->setQuestion($data['question']);
            $faq->setResponse($data['response']);
            $faq->setOrderFaqs($data['orderFaqs']);

            $manager->persist($faq);
        }

        $manager->flush();
    
    }
       
}
