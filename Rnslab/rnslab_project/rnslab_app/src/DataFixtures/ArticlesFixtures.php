<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $articlesData = [
            [
                "title" => "Cancer de l'endomètre : ce qu'il faut savoir",
                "autor" => "Stéphane Paulet",
                "hightlighted" => true,
                "orderArticle" => 1,
                "textContent" => "Après une chimiothérapie, votre cuir chevelu devient plus délicat
                 et sensible. Il est important de le protéger pour favoriser la guérison et la repousse
                 des cheveux. Voici quelques conseils essentiels pour prendre soin de votre cuir chevelu 
                 pendant cette période sensible. Des soins capillaires adaptés à la chimiothérapieChoisissez
                 des Produits Doux : Utilisez des shampoings et des soins capillaires formulés pour les cuirs
                 chevelus sensibles spécifique à la chimiothérapie, comme le shampooing dermo protecteur du 
                 Laboratoire RENASCOR. Il est sans sulfates, sans parabènes. En outre, son parfum est très discret.
                 Il a été spécifiquement formulé pour les hommes et les femmes qui sont ou quittent la chimiothérapie
                 REDACTIV1, l'unique protocole de croissance du cheveu post chimiothérapie. Gardez votre cuir chevelu 
                 hydraté sans utiliser d'huile. L'huile obstrue les pores et sature excessivement la peau. De plus,
                 graisser son cuir chevelu dérègle la glande sébacée, ce qui perturbe la repousse du cheveu. Il est
                 préférable d'utiliser le protocole de croissance du cheveu post chimiothérapie REDACTIV1. Il est
                 exclusivement dédié aux patients au crane lisse qui quittent la chimiothérapie. Son complexe d'actifs
                 unique a fait l'objet d'une étude clinique en double aveugle (mode d'étude le plus sérieux). REDACTIV1
                 favorise la cicatrisation de l'épiderme, apporte un effet exfoliant doux grace à ses billes de 
                 celluloses calibrées, hydrate le cuir chevelu, mais est un soin non gras. Une de ses fonctions 
                 est de protéger le cuir chevelu d'agression extérieure, comme un pansement invisible. De plus, 
                 son complexe d'actifs révolutionnaires permet un passage des bulbes en phase anagène. La pousse 
                 du cheveu devient homogène et proche de la qualité originale du cheveu, avant chimiothérapie.
                 Le lavage des cheveux ou du crâne, l'instant massage douceur.Lavez vos cheveux avec de l'eau tiède
                 plutôt qu'avec de l'eau chaude, qui peut assécher et irriter davantage. Lors du lavage, massez doucement
                 votre cuir chevelu pour stimuler la circulation sans l'agresser. Protégez votre cuir chevelu du soleil
                 Un cuir chevelu exposé peut être très sensible aux brûlures solaires. Utilisez un chapeau ou un foulard 
                 lors de vos sorties en extérieur, et envisagez l'utilisation de produits contenant un écran solaire 
                 spécialement conçu pour le cuir chevelu. Eviter les températures extrême. Favoriser la température Ambiante
                 modérée. Ni trop froid, ni trop chaud. Le froid peut rendre le cuir chevelu plus sec et le chaud peut 
                 augmenter la transpiration et l'irritation.En cas de début de repousse, favoriser le séchage naturel
                 Évitez les séchoirs à cheveux chauds qui peuvent aggraver la sécheresse. Préférez le séchage naturel ou
                 l'utilisation d'un sèche-cheveux à température basse. Vous avez eu suffisamment de chimie. Pensez 
                 Évitez les Traitements Chimiques et Thermiques, comme les colorations. Les colorations, les permanentes et
                 l'utilisation d'outils de coiffage chauffants sont trop agressifs pour un cuir chevelu sensible. N'hésitez 
                 pas à consulter les conseillers experts du Laboratoire RENASCOR. Ils vous apporteront des conseils 
                 personnalisés et vous aiderons activement à traiter tout problème spécifique lié à votre cuir chevelu.",
                "pictureSrc" => "..\images\article-star.jpg",
                "pictureAlt" => "The first picture of hightlighted article",
                "metaDescription" => "Conseils essentiels pour prendre soin de votre cuir chevelu après une
                 chimiothérapie.",
            ],
            [
                "title" => "Quand les cheveux recommencent-ils à pousser après une chimio ?",
                "autor" => "Stéphane Paulet",
                "hightlighted" => false,
                "orderArticle" => 2,
                "textContent" => "Après avoir traversé lépreuve de la chimiothérapie, l\'une des questions les plus fréquentes
                 concerne la repousse des cheveux. Ce phénomène, symbolisant un retour à la normalité et la guérison est attendu
                 par la patient. Un processus qui varie considérablement d'une personne à l'autre. Voici ce qu'il faut savoir
                 pour mieux comprendre et accompagner ce processus : Typiquement, la repousse des cheveux peut commencer 2 à 3
                 semaines après la dernière séance de chimiothérapie. Certains patients peuvent observer une repousse plus rapide,
                 tandis que pour d'autres, cela peut prendre un peu plus de temps. Nous ne sommes pas tous égaux devant la chimio.
                 En moyenne, les cheveux repoussent à un rythme de 1 centimètre par mois. La texture des nouveaux cheveux peut
                 varier : certains constatent que leurs cheveux sont plus bouclés, et/ou plus fins qu'auparavant. La couleur peut
                 également changer temporairement. Le rôle clef de la gaine conjonctive est un élément du bulbe capillaire. 
                 C'est une membrane souple qui donne la forme et le diamètre du cheveu. Plus elle est souple, plus le diamètre 
                 du cheveu sera grand et donc le cheveu épais. Avec le temps, cette membrane se durcie. C'est le vieillissement 
                 naturel du cheveu. Toutefois, la chimiothérapie accélère anormalement le processus. Un changement de texture 
                 est fréquent suite à une chimiothérapie. Le cheveu boucle alors qu'avant la chimio, il était plus raide. C'est
                 un des signes que la gaine conjonctive est altérée et nécessite un soin particulier. Attention aux légendes
                 urbaines sur la pousse du cheveu après la chimiothérapie. Internet offre son lot de conseils de 'grand mère'.
                 La plupart de ceux relatifs à la pousse post chimio n'ont jamais fait l'objet d'études sérieuses. Nous listerons
                 dans un prochain articles toutes ces légendes urbaines qui sont à la fois commune, adoptés par une majorité, mais
                 qui sont totalement destructeurs pour vos cheveux fragilisés par le traitement. Optez pour une alimentation et
                 un mode de vie sain. Une alimentation riche en nutriments essentiels, tels que les protéines, vitamines
                 (notamment Biotine et Vitamine E), et minéraux, est cruciale pour favoriser une repousse saine. l\'exercice régulier,
                 la réduction du stress et un sommeil adéquat sont également bénéfiques. Lalimentation nimpacte pas directement le
                 cheveu et sa repousse. En revanche, il permet de retrouver un corps en bon état général, moins fatigué et moins 
                 carencée. De fait, ce corp en meilleure forme permet au cheveu de pousser dans les meilleures conditions. 13% des 
                 patients retrouvent naturellement leurs cheveux. Dans 2% des cas, le cheveu ne repousse pas du tout. 85% se disent 
                 insatisfait de la repousse post chimiothérapie. Heureusement une solution existe et est efficace si elle est utilisée 
                 en sortie de chimiothérapie : le protocole de croissance du cheveu REDACTIV1. Il s'agit d'un sérum aux multiples 
                 actions qui a été formulé en 2017 par le Laboratoire RENASCOR. Il est spécifiquement dédié aux patients en oncologie.
                 Un soutien psychologique est nécessaire car la repousse des cheveux est un processus qui demande du temps et de la 
                 patience. Il est important de se rappeler que la repousse est un signe positif de rétablissement. N'hésitez pas à 
                 chercher du soutien auprès de groupes de soutien, de forums en ligne ou de professionnels de la santé mentale pour 
                 vous accompagner dans cette étape. Sur Facebook, nous vous conseillons CANCER Les conseils des socio esthéticiennes",
                "pictureSrc" => "..\images\carousel-header-accueil-1.jpg",
                "pictureAlt" => "The second picture of hightlighted article",
                "metaDescription" => "tout sur la repousse des cheveux après chimiothérapie. Comprendre le processus de 
                guérison capillaire et les solutions disponibles pour soutenir ce parcours.",
            ],
            [
                "title" => "Comment protéger mon cuir chevelu sensible après une chimiothérapie ?",
                "autor" => "Stéphane Paulet",
                "hightlighted" => false,
                "orderArticle" => 3,
                "textContent" => "Après une chimiothérapie, votre cuir chevelu devient plus délicat et sensible. Il est
                 important de le protéger pour favoriser la guérison et la repousse des cheveux. Voici quelques conseils 
                 essentiels pour prendre soin de votre cuir chevelu pendant cette période sensible.Des soins capillaires 
                 adaptés à la chimiothérapieChoisissez des Produits Doux : Utilisez des shampoings et des soins capillaires 
                 formulés pour les cuirs chevelus sensibles spécifique à la chimiothérapie, comme le shampooing dermo protecteur 
                 du Laboratoire RENASCOR. Il est sans sulfates, sans parabènes. En outre, son parfum est très discret. Il a été 
                 spécifiquement formulé pour les hommes et les femmes qui sont ou quittent la chimiothérapie.REDACTIV1, l'unique 
                 protocole de croissance du cheveu post chimiothérapieGardez votre cuir chevelu hydraté sans utiliser d'huile. 
                 L'huile obstrue les pores et sature excessivement la peau. De plus, graisser son cuir chevelu dérègle la glande 
                 sébacée, ce qui perturbe la repousse du cheveu. Il est préférable d'utiliser le protocole de croissance du cheveu
                 post chimiothérapie REDACTIV1. Il est exclusivement dédié aux patients au crane lisse qui quittent la chimiothérapie.
                 Son complexe d'actifs unique a fait l'objet d'une étude clinique en double aveugle (mode d'étude le plus sérieux). 
                 REDACTIV1 favorise la cicatrisation de l'épiderme, apporte un effet exfoliant doux grâce à ses billes de celluloses 
                 calibrées, hydrate le cuir chevelu, mais est un soin non gras. Une de ses fonctions est de protéger le cuir chevelu
                 d'agression extérieure, comme un pansement invisible. De plus, son complexe d'actifs révolutionnaires permet un 
                 passage des bulbes en phase anagène. La pousse du cheveu devient homogène et proche de la qualité originale du cheveu,
                 avant chimiothérapie.Le lavage des cheveux ou du crâne, l'instant massage douceurLavez vos cheveux avec de l'eau tiède
                 plutôt qu'avec de l'eau chaude, qui peut assécher et irriter davantage. Lors du lavage, massez doucement votre cuir 
                 chevelu pour stimuler la circulation sans l'agresser.Protégez votre cuir chevelu du soleilUn cuir chevelu exposé peut
                 être très sensible aux brûlures solaires. Utilisez un chapeau ou un foulard lors de vos sorties en extérieur, et 
                 envisagez l'utilisation de produits contenant un écran solaire spécialement conçu pour le cuir chevelu.Éviter les 
                 températures extrêmesFavoriser la température Ambiante modérée. Ni trop froid, ni trop chaud. Le froid peut rendre le 
                 cuir chevelu plus sec et le chaud peut augmenter la transpiration et l'irritation.En cas de début de repousse, 
                 favoriser le séchage naturelÉvitez les séchoirs à cheveux chauds qui peuvent aggraver la sécheresse. Préférez le 
                 séchage naturel ou l'utilisation d'un sèche-cheveux à température basse.Vous avez eu suffisamment de chimie. Pensez 
                 'naturel'Évitez les traitements Chimiques et Thermiques, comme les colorations. Les colorations, les permanentes et
                 l'utilisation d'outils de coiffage chauffants sont trop agressifs pour un cuir chevelu sensible.",
                "pictureSrc" => "..\images\carousel-header-accueil-2.jpg",
                "pictureAlt" => "The third picture of hightlighted article",
                "metaDescription" => "prendre soin de votre cuir chevelu après une chimiothérapie:
                 produits doux, hydratation sans huile, protection solaire et températures modérées.",
            ],
            [
                "title" => "Sit tempor laboris quis magna.",
                "autor" => "Stéphane Paulet",
                "hightlighted" => false,
                "orderArticle" => 3,
                "textContent" => "Excepteur do sunt sit et anim. 
                Est esse mollit Lorem reprehenderit cupidatat laboris dolore laboris labore. 
                Exercitation ullamco amet dolore enim enim veniam ea est culpa mollit veniam adipisicing. 
                In dolore cillum incididunt ullamco commodo consectetur deserunt dolor. 
                Aliqua sit reprehenderit occaecat aliquip dolore et elit fugiat consequat tempor duis consequat 
                cupidatat sint. Laborum nisi labore ut esse consectetur veniam reprehenderit exercitation nisi 
                mollit ipsum culpa. Aliquip fugiat do do exercitation nisi do.
                Sint irure aliqua do nulla ex in dolore magna cupidatat ea veniam culpa occaecat magna. 
                Quis excepteur Lorem ex minim nulla veniam labore esse sit et eu labore mollit officia. 
                Do adipisicing reprehenderit sint anim incididunt sint. Velit laboris ea consectetur deserunt occaecat eu est do. 
                Cupidatat cupidatat dolore eiusmod ea eu veniam ex. Dolore et est veniam consectetur irure incididunt duis velit 
cupidatat aliquip esse. Occaecat amet ut culpa do nulla eiusmod dolore qui et sint eiusmod reprehenderit.
Occaecat amet sunt ex ex occaecat aute anim ullamco excepteur. Culpa laboris id laborum sit excepteur id 
pariatur nostrud proident. Ipsum id veniam incididunt aliquip ipsum laboris voluptate adipisicing occaecat. 
Excepteur eu irure anim nostrud cupidatat do consequat proident adipisicing elit. Labore reprehenderit qui amet
 cupidatat pariatur magna ad sit elit incididunt esse.",
                "pictureSrc" => "..\images\carousel-header-accueil-3.jpg",
                "pictureAlt" => "The third picture of hightlighted article",
                "metaDescription" => "prendre soin de votre cuir chevelu après une chimiothérapie:
                 produits doux, hydratation sans huile, protection solaire et températures modérées.",
            ],
        ];

        foreach ($articlesData as $articleData) {
            $article = new Articles();
            $article->setHightlighted($articleData['hightlighted']);
            $article->setOrderArticle($articleData['orderArticle']);
            $article->setTitle($articleData['title']);
            $article->setTextContent($articleData['textContent']);
            $article->setAutor($articleData['autor']);
            $article->setDatePublication(new DateTime());
            $article->setPictureSrc($articleData['pictureSrc']);
            $article->setPictureAlt($articleData['pictureAlt']);
            $article->setMetaDescription($articleData['metaDescription']);

            $manager->persist($article);
        }

        $manager->flush();
    }
}
