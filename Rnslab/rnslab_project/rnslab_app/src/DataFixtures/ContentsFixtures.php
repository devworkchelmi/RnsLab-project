<?php

namespace App\DataFixtures;

use App\Entity\Contents;
use App\Entity\Pages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ContentsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Création de plusieurs articles de test
        $contentsData = [
            //Accueil
            [
                'orderContent' => '1',
                'hook' => 'CarouselHeader 1',
                'title' => '',
                'subtitle' => '',
                'textContent' => '',
                'mediaSrc' => '..\images\carousel-header-accueil-1.jpg',
                'mediaAlt' => '',
                'page' => 'accueil'
            ],
            [
                'orderContent' => '2',
                'hook' => 'CarouselHeader',
                'title' => 'Nos produits',
                'subtitle' => '',
                'textContent' => '',
                'mediaSrc' => '..\images\carousel-header-accueil-2.jpg',
                'mediaAlt' => '',
                'page' => 'accueil'
            ],
            [
                'orderContent' => '3',
                'hook' => 'CarouselHeader',
                'title' => 'Nos produits',
                'subtitle' => '',
                'textContent' => '',
                'mediaSrc' => '..\images\carousel-header-accueil-3.jpg',
                'mediaAlt' => '',
                'page' => 'accueil'
            ],
            [
                'orderContent' => '4',
                'hook' => 'CarouselHeader',
                'title' => 'Nos produits',
                'subtitle' => '',
                'textContent' => '',
                'mediaSrc' => '..\images\carousel-header-accueil-4.jpg',
                'mediaAlt' => '',
                'page' => 'accueil'
            ],
            [
                'orderContent' => '1',
                'hook' => 'CarouselProducts',
                'title' => 'Découvrez les produits de RNS Lab',
                'subtitle' => '',
                'textContent' => '',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'accueil'
            ],
            [
                'orderContent' => '1',
                'hook' => 'CollapseHomePage 1',
                'title' => 'Développements & Innovations',
                // subtitle = slug page
                'subtitle' => 'notre-savoir-faire',
                'textContent' => 'Eiusmod reprehenderit minim aliquip laborum duis esse ipsum adipisicing enim. 
                                    Eiusmod reprehenderit minim aliquip laborum duis esse ipsum adipisicing enim.
                                    Cillum laborum consectetur do mollit reprehenderit officia ad sunt aliqua.
                                    Occaecat dolore exercitation cupidatat magna id sint eiusmod deserunt.',
                'mediaSrc' => '..\images\collapse-dev-innov.jpg',
                'mediaAlt' => 'eee',
                'page' => 'accueil'
            ],
            [
                'orderContent' => '2',
                'hook' => 'CollapseHomePage',
                'title' => 'Nos marques',
                // subtitle = slug page
                'subtitle' => 'nos-marques',
                'textContent' => 'Eiusmod reprehenderit minim aliquip laborum duis esse ipsum adipisicing enim. 
                                Eiusmod reprehenderit minim aliquip laborum duis esse ipsum adipisicing enim.
                                Magna culpa cupidatat ut eu.Sit id deserunt laborum anim ut.
                                Deserunt Lorem in amet ea voluptate Lorem deserunt enim velit et deserunt Lorem minim.',
                'mediaSrc' => '..\images\gamme-redactiv.png',
                'mediaAlt' => 'eee',
                'page' => 'accueil'
            ],
            [
                'orderContent' => '3',
                'hook' => 'CollapseHomePage',
                'title' => 'Marque blanche',
                // subtitle = slug page
                'subtitle' => 'creez-votre-marque',
                'textContent' => 'Eiusmod reprehenderit minim aliquip laborum duis esse ipsum adipisicing enim. 
                                Eiusmod reprehenderit minim aliquip laborum duis esse ipsum adipisicing enim.
                                Ipsum dolore dolore amet exercitation et aliqua.
                                Proident nulla sint cupidatat irure nostrud tempor reprehenderit aliquip exercitation enim.',
                'mediaSrc' => '..\images\collapse-marques-blanches.jpg',
                'mediaAlt' => 'eee',
                'page' => 'accueil'
            ],
            //Notre savoir-faire
            [
                'orderContent' => '1',
                'hook' => 'CardLeftPicture',
                'title' => 'Le mot du directeur',
                'subtitle' => 'Deserunt voluptate exercitation officia et culpa nostrud id aliqua ut.',
                'textContent' => 'Eiusmod culpa elit ex aute occaecat sit consequat esse duis sunt id consequat ut. 
                                Sunt consequat aliquip voluptate excepteur et. Consequat do eu ea mollit elit quis. 
                                Veniam laboris aute voluptate excepteur labore minim fugiat ut deserunt. 
                                Esse veniam reprehenderit cillum culpa amet occaecat reprehenderit dolor.
                                Tempor consequat adipisicing eiusmod veniam et nisi laborum sit in. 
                                Exercitation irure et reprehenderit anim duis dolore ipsum officia. 
                                Laboris velit nulla ut nisi consectetur nisi eiusmod consequat exercitation duis officia nisi quis. 
                                Dolore ad elit eiusmod magna ullamco. Culpa elit pariatur adipisicing dolore amet. 
                                Laborum officia irure ipsum mollit mollit labore anim tempor laborum commodo. 
                                Laboris quis anim consectetur mollit sunt nulla aliquip officia.',
                'mediaSrc' => '..\images\s-paulet.jpg',
                'mediaAlt' => 'Stéphane Paleut directeur de RNSLAB',
                'page' => 'notre-savoir-faire'
            ],
            [
                'orderContent' => '2',
                'hook' => 'PopUpHistory',
                'title' => '',
                'subtitle' => '-1980-',
                'textContent' => 'Aute aute ullamco in ipsum cillum exercitation aute aliqua aliqua. 
                                Tempor labore ipsum proident commodo pariatur incididunt officia sit aliquip proident nulla proident. 
                                Exercitation excepteur ut adipisicing exercitation. Non velit aliquip nulla consectetur enim est laboris.',
                'mediaSrc' => '..\images\carousel-notre-savoir-faire-1.jpg',
                'mediaAlt' => '',
                'page' => 'notre-savoir-faire'
            ],
            [
                'orderContent' => '3',
                'hook' => 'PopUpHistory',
                'title' => '',
                'subtitle' => '-2011-',
                'textContent' => 'Aute aute ullamco in ipsum cillum exercitation aute aliqua aliqua. 
                                Tempor labore ipsum proident commodo pariatur incididunt officia sit aliquip proident nulla proident. 
                                Exercitation excepteur ut adipisicing exercitation. Non velit aliquip nulla consectetur enim est laboris.',
                'mediaSrc' => '..\images\carousel-notre-savoir-faire-1.jpg',
                'mediaAlt' => '',
                'page' => 'notre-savoir-faire'
            ],
            [
                'orderContent' => '4',
                'hook' => 'PopUpHistory',
                'title' => '',
                'subtitle' => '-2014-',
                'textContent' => 'Aute aute ullamco in ipsum cillum exercitation aute aliqua aliqua. 
                                Tempor labore ipsum proident commodo pariatur incididunt officia sit aliquip proident nulla proident. 
                                Exercitation excepteur ut adipisicing exercitation. Non velit aliquip nulla consectetur enim est laboris.',
                'mediaSrc' => '..\images\carousel-notre-savoir-faire-1.jpg',
                'mediaAlt' => '',
                'page' => 'notre-savoir-faire'
            ],
            [
                'orderContent' => '5',
                'hook' => 'PopUpHistory',
                'title' => '',
                'subtitle' => '-2015-',
                'textContent' => 'Aute aute ullamco in ipsum cillum exercitation aute aliqua aliqua. 
                                Tempor labore ipsum proident commodo pariatur incididunt officia sit aliquip proident nulla proident. 
                                Exercitation excepteur ut adipisicing exercitation. Non velit aliquip nulla consectetur enim est laboris.',
                'mediaSrc' => '..\images\carousel-notre-savoir-faire-1.jpg',
                'mediaAlt' => '',
                'page' => 'notre-savoir-faire'
            ],
            [
                'orderContent' => '6',
                'hook' => 'PopUpHistory',
                'title' => '',
                'subtitle' => '-2017-',
                'textContent' => 'Aute aute ullamco in ipsum cillum exercitation aute aliqua aliqua. 
                                Tempor labore ipsum proident commodo pariatur incididunt officia sit aliquip proident nulla proident. 
                                Exercitation excepteur ut adipisicing exercitation. Non velit aliquip nulla consectetur enim est laboris.',
                'mediaSrc' => '..\images\carousel-notre-savoir-faire-1.jpg',
                'mediaAlt' => '',
                'page' => 'notre-savoir-faire'
            ],
            [
                'orderContent' => '7',
                'hook' => 'CardRightCarousel',
                'title' => 'Nos valeurs, notre engagement',
                'subtitle' => 'Sunt exercitation veniam adipisicing veniam do culpa.',
                'textContent' => 'Vous propose une gamme complète de produits professionnels, personnalisable avec votre logo déjà existant ou avec un design sur-mesure réalisé. De la création de votre marque à l\'expédition de votre commande : aucune démarche administrative n\'est nécessaire !',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'notre-savoir-faire'
            ],
            [
                'orderContent' => '8',
                'hook' => 'CarouselValues 1',
                'title' => '',
                'subtitle' => 'Pariatur ea ea consectetur',
                'textContent' => 'Dolor elit adipisicing magna elit Lorem. 
                                    Dolore consectetur consequat ullamco adipisicing ipsum irure sint Lorem cupidatat pariatur excepteur. 
                                    Ipsum eiusmod ex tempor duis tempor excepteur commodo. 
                                    Est elit cupidatat minim laboris amet eiusmod aliqua id.',
                'mediaSrc' => '..\images\carousel-notre-savoir-faire-1.jpg',
                'mediaAlt' => 'Some content 1',
                'page' => 'notre-savoir-faire'
            ],
            [
                'orderContent' => '9',
                'hook' => 'CarouselValues',
                'title' => '',
                'subtitle' => 'Labore aliqua irure cupidatat',
                'textContent' => 'Dolor elit adipisicing magna elit Lorem. 
                                    Dolore consectetur consequat ullamco adipisicing ipsum irure sint Lorem cupidatat pariatur excepteur. 
                                    Ipsum eiusmod ex tempor duis tempor excepteur commodo. 
                                    Est elit cupidatat minim laboris amet eiusmod aliqua id.',
                'mediaSrc' => '..\images\carousel-notre-savoir-faire-2.jpg',
                'mediaAlt' => 'Some Content 2',
                'page' => 'notre-savoir-faire'
            ],
            [
                'orderContent' => '10',
                'hook' => 'CarouselValues',
                'title' => '',
                'subtitle' => 'Fugiat reprehenderit aute commodo',
                'textContent' => 'Dolor elit adipisicing magna elit Lorem. 
                                    Dolore consectetur consequat ullamco adipisicing ipsum irure sint Lorem cupidatat pariatur excepteur. 
                                    Ipsum eiusmod ex tempor duis tempor excepteur commodo. 
                                    Est elit cupidatat minim laboris amet eiusmod aliqua id.',
                'mediaSrc' => '..\images\carousel-notre-savoir-faire-3.jpg',
                'mediaAlt' => 'Some Content 3',
                'page' => 'notre-savoir-faire'
            ],
            [
                'orderContent' => '11',
                'hook' => 'CardText',
                'title' => 'Innovation REDATIV',
                'subtitle' => 'Deserunt voluptate exercitation officia et culpa nostrud id aliqua ut.',
                'textContent' => 'Eiusmod culpa elit ex aute occaecat sit consequat esse duis sunt id consequat ut. 
                                Sunt consequat aliquip voluptate excepteur et. Consequat do eu ea mollit elit quis. 
                                Veniam laboris aute voluptate excepteur labore minim fugiat ut deserunt. 
                                Esse veniam reprehenderit cillum culpa amet occaecat reprehenderit dolor.
                                Tempor consequat adipisicing eiusmod veniam et nisi laborum sit in. 
                                Exercitation irure et reprehenderit anim duis dolore ipsum officia. 
                                Laboris velit nulla ut nisi consectetur nisi eiusmod consequat exercitation duis officia nisi quis. 
                                Dolore ad elit eiusmod magna ullamco. Culpa elit pariatur adipisicing dolore amet. 
                                Laborum officia irure ipsum mollit mollit labore anim tempor laborum commodo. 
                                Laboris quis anim consectetur mollit sunt nulla aliquip officia.
                                Ad id fugiat dolore magna non proident labore do anim labore. Anim aliqua in ex incididunt. 
                                Nostrud adipisicing esse elit culpa cupidatat pariatur fugiat sunt voluptate mollit amet veniam pariatur aute. 
                                Do et in ex ut dolore veniam consequat commodo commodo veniam. Cillum commodo elit aliquip qui consequat velit commodo aliqua ex elit.
                                Voluptate nulla nisi sit amet sit excepteur. Non dolor est sunt laboris veniam. 
                                Id id veniam dolor fugiat qui esse pariatur irure dolore sunt commodo culpa. 
                                Reprehenderit sit veniam cupidatat anim esse dolor sit dolore proident sint aute ad veniam officia.Ea occaecat id et quis velit aliquip ut ipsum aliqua. 
                                Ullamco exercitation pariatur culpa laborum et pariatur culpa ipsum occaecat et ullamco cillum cillum adipisicing. 
                                Aute pariatur ullamco Lorem velit.',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'notre-savoir-faire'
            ],
            [
                'orderContent' => '12',
                'hook' => 'CardLeftPicture',
                'title' => '',
                'subtitle' => 'Anim non duis labore cillum labore sunt velit proident nisi occaecat quis excepteur pariatur magna.',
                'textContent' => 'Eiusmod culpa elit ex aute occaecat sit consequat esse duis sunt id consequat ut. 
                                Sunt consequat aliquip voluptate excepteur et. Consequat do eu ea mollit elit quis. 
                                Veniam laboris aute voluptate excepteur labore minim fugiat ut deserunt. 
                                Esse veniam reprehenderit cillum culpa amet occaecat reprehenderit dolor.
                                Tempor consequat adipisicing eiusmod veniam et nisi laborum sit in. 
                                Exercitation irure et reprehenderit anim duis dolore ipsum officia. 
                                Laboris velit nulla ut nisi consectetur nisi eiusmod consequat exercitation duis officia nisi quis. 
                                Dolore ad elit eiusmod magna ullamco. Culpa elit pariatur adipisicing dolore amet. 
                                Laborum officia irure ipsum mollit mollit labore anim tempor laborum commodo. 
                                Laboris quis anim consectetur mollit sunt nulla aliquip officia.',
                'mediaSrc' => '..\images\notre-savoir-faire-1.jpg',
                'mediaAlt' => 'Stéphane Paleut directeur de RNSLAB',
                'page' => 'notre-savoir-faire'
            ],
            //Nos marques
            [
                'orderContent' => '1',
                'hook' => 'NosEnseignes',
                'title' => 'Nos enseignes',
                'subtitle' => '',
                'textContent' => '',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'nos-marques'
            ],
            [
                'orderContent' => '1.1',
                'hook' => 'CardVertical',
                'title' => 'Laboratoire Renascor',
                 // subtitle non modifiable = title AllVertical
                'subtitle' => 'Laboratoire Renascor',
                'textContent' => 'Est anim nulla ex excepteur ipsum. Do ad aute deserunt exercitation laborum reprehenderit irure cupidatat. 
                                Voluptate dolore ipsum tempor amet labore consequat ipsum pariatur est tempor',
                'mediaSrc' => '..\images\gamme-redactiv.png',
                'mediaAlt' => '',
                'page' => 'nos-marques'
            ],
            [
                'orderContent' => '1.2',
                'hook' => 'CardVertical',
                'title' => 'Barbatif',
                 // subtitle non modifiable = title AllVertical
                'subtitle' => 'Barbatif',
                'textContent' => 'Est anim nulla ex excepteur ipsum. Do ad aute deserunt exercitation laborum reprehenderit irure cupidatat. 
                                Voluptate dolore ipsum tempor amet labore consequat ipsum pariatur est tempor',
                'mediaSrc' => '..\images\gamme-barbatif.png',
                'mediaAlt' => '',
                'page' => 'nos-marques'
            ],
            [
                'orderContent' => '1.3',
                'hook' => 'CardVertical',
                'title' => 'NosCheveux.com',
                // subtitle non modifiable = title AllVertical
                'subtitle' => 'NosCheveux.com', 
                'textContent' => 'Est anim nulla ex excepteur ipsum. Do ad aute deserunt exercitation laborum reprehenderit irure cupidatat. 
                                Voluptate dolore ipsum tempor amet labore consequat ipsum pariatur est tempor',
                'mediaSrc' => '..\images\noscheveux-illustration.jpg',
                'mediaAlt' => '',
                'page' => 'nos-marques'
            ],
            [
                'orderContent' => '2',
                'hook' => 'AllVertical',
                'title' => 'Laboratoire Renascor',
                'subtitle' => 'Visitez notre site',
                'textContent' => 'Est anim nulla ex excepteur ipsum. Do ad aute deserunt exercitation laborum reprehenderit irure cupidatat. 
                                Voluptate dolore ipsum tempor amet labore consequat ipsum pariatur est tempor commodo. 
                                Quis laboris magna ut consectetur duis officia nisi proident ut cillum minim officia nulla non.',
                'mediaSrc' => '..\images\gamme-redactiv.png',
                'mediaAlt' => 'Les produits de la gamme Rédactiv',
                'page' => 'nos-marques'
            ],
            [
                'orderContent' => '3',
                'hook' => 'AllVertical',
                'title' => 'Barbatif',
                'subtitle' => 'Visitez notre site',
                'textContent' => 'Est anim nulla ex excepteur ipsum. Do ad aute deserunt exercitation laborum reprehenderit irure cupidatat. 
                                Voluptate dolore ipsum tempor amet labore consequat ipsum pariatur est tempor commodo. 
                                Quis laboris magna ut consectetur duis officia nisi proident ut cillum minim officia nulla non.',
                'mediaSrc' => '..\images\gamme-barbatif.png',
                'mediaAlt' => 'Les produits de la gamme Barbatif',
                'page' => 'nos-marques'
            ],
            [
                'orderContent' => '4.1',
                'hook' => 'AllVertical',
                'title' => 'NosCheveux.com',
                'subtitle' => 'Visitez notre site',
                'textContent' => 'Est anim nulla ex excepteur ipsum. Do ad aute deserunt exercitation laborum reprehenderit irure cupidatat. 
                                Voluptate dolore ipsum tempor amet labore consequat ipsum pariatur est tempor commodo. 
                                Quis laboris magna ut consectetur duis officia nisi proident ut cillum minim officia nulla non.',
                'mediaSrc' => '..\images\noscheveux-illustration.jpg',
                'mediaAlt' => 'Les produits de la gamme Barbatif',
                'page' => 'nos-marques'
            ],
            [
                'orderContent' => '4.2',
                'hook' => 'CardBigPicture',
                'title' => 'Objectifs de l\'enseigne',
                'subtitle' => 'Un sous-titre un peu long Un sous-titre un peu long',
                'textContent' => 'Est anim nulla ex excepteur ipsum. Do ad aute deserunt exercitation laborum reprehenderit irure cupidatat. 
                                Voluptate dolore ipsum tempor amet labore consequat ipsum pariatur est tempor commodo. 
                                Quis laboris magna ut consectetur duis officia nisi proident ut cillum minim officia nulla non.',
                'mediaSrc' => '..\images\carousel-header-accueil-1.jpg',
                'mediaAlt' => '',
                'page' => 'nos-marques'
            ],
            //Créez votre marque
            [
                'orderContent' => '1',
                'hook' => 'CardLeftPicture',
                'title' => 'Notre savoir-faire à votre service',
                'subtitle' => '',
                'textContent' => 'Esse anim anim est nulla deserunt commodo eu labore laborum labore et dolor ad consectetur. 
                                Sint velit duis reprehenderit quis aliquip sint reprehenderit dolore proident irure aliqua adipisicing. 
                                Lorem qui irure sit sunt consectetur deserunt aliqua amet cillum minim. 
                                Ut nisi incididunt mollit occaecat sit. Enim ex incididunt officia cillum ullamco Lorem cupidatat anim qui incididunt ex est aliqua adipisicing. 
                                Exercitation nulla fugiat laboris labore eiusmod aliqua consequat veniam enim. 
                                Tempor elit laboris deserunt aute adipisicing ut reprehenderit esse eiusmod exercitation esse dolore voluptate. 
                                Amet non laborum qui aute magna sint laboris ut proident.',
                'mediaSrc' => '../images/creez-votre-marque-1.jpg',
                'mediaAlt' => 'Lores ipsum',
                'page' => 'creez-votre-marque'
            ],
            [
                'orderContent' => '2',
                'hook' => 'CardText',
                'title' => 'Une marque, des produits qui vous ressemblent',
                'subtitle' => '',
                'textContent' => 'Esse anim anim est nulla deserunt commodo eu labore laborum labore et dolor ad consectetur. 
                                Sint velit duis reprehenderit quis aliquip sint reprehenderit dolore proident irure aliqua adipisicing. 
                                Lorem qui irure sit sunt consectetur deserunt aliqua amet cillum minim. 
                                Ut nisi incididunt mollit occaecat sit. Enim ex incididunt officia cillum ullamco Lorem cupidatat anim qui incididunt ex est aliqua adipisicing. 
                                Exercitation nulla fugiat laboris labore eiusmod aliqua consequat veniam enim. 
                                Tempor elit laboris deserunt aute adipisicing ut reprehenderit esse eiusmod exercitation esse dolore voluptate. 
                                Amet non laborum qui aute magna sint laboris ut proident.
                                Ullamco est reprehenderit elit cillum cupidatat duis officia incididunt. 
                                Nulla deserunt culpa ut est culpa nulla sunt et enim nostrud.Amet ad mollit duis reprehenderit consectetur aute.Magna ipsum est est aliqua sunt anim. 
                                Tempor magna ipsum dolore veniam aliqua. Reprehenderit proident labore esse reprehenderit non nostrud pariatur reprehenderit culpa reprehenderit adipisicing esse cupidatat. 
                                Laborum aliquip Lorem officia laborum laboris minim ut laborum aliqua veniam consectetur laboris nostrud. 
                                Sint do labore sit magna elit quis adipisicing est proident et ex cupidatat sit. Veniam dolor ad nisi mollit minim id adipisicing enim do Lorem cupidatat aute proident. 
                                Ex Lorem magna exercitation nulla duis laboris deserunt. Ad ea dolore ea cupidatat non irure est. 
                                Ea eu in nostrud dolore occaecat Lorem aliquip do adipisicing esse aliqua. Do pariatur ullamco ipsum fugiat commodo magna nulla commodo id ipsum dolore ipsum id enim. 
                                Voluptate nostrud amet commodo aliqua duis dolore eiusmod.',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'creez-votre-marque'
            ],
            [
                'orderContent' => '4',
                'hook' => 'CardLeftPicture',
                'title' => '',
                'subtitle' => 'Notre offre de services et de produits sur-mesure',
                'textContent' => 'Esse anim anim est nulla deserunt commodo eu labore laborum labore et dolor ad consectetur. 
                                Sint velit duis reprehenderit quis aliquip sint reprehenderit dolore proident irure aliqua adipisicing. 
                                Lorem qui irure sit sunt consectetur deserunt aliqua amet cillum minim. 
                                Ut nisi incididunt mollit occaecat sit. Enim ex incididunt officia cillum ullamco Lorem cupidatat anim qui incididunt ex est aliqua adipisicing. 
                                Exercitation nulla fugiat laboris labore eiusmod aliqua consequat veniam enim. 
                                Tempor elit laboris deserunt aute adipisicing ut reprehenderit esse eiusmod exercitation esse dolore voluptate. 
                                Amet non laborum qui aute magna sint laboris ut proident.',
                'mediaSrc' => '../images/creez-votre-marque-1.jpg',
                'mediaAlt' => 'Lores ipsum',
                'page' => 'creez-votre-marque'
            ],
            [
                'orderContent' => '3',
                'hook' => 'CardRightPicture',
                'title' => 'Personnalisées Vos Supports Marketing',
                'subtitle' => 'PROCESSUS SIMPLE ET RAPIDE DE CRÉATION DE MARQUE',
                'textContent' => 'Vous propose une gamme complète de produits professionnels, personnalisable avec votre logo déjà existant ou avec un design sur-mesure réalisé. De la création de votre marque à l\'expédition de votre commande : aucune démarche administrative n\'est nécessaire !',
                'mediaSrc' => 'https://picsum.photos/seed/picsum/80/90',
                'mediaAlt' => 'picture of development RNSLAB',
                'page' => 'creez-votre-marque'
            ],
            [
                'orderContent' => '5',
                'hook' => 'CardBigPicture',
                'title' => "Ici un titre",
                'subtitle' => 'Des conseils personnalisés pour développer votre marque',
                'textContent' => 'Esse anim anim est nulla deserunt commodo eu labore laborum labore et dolor ad consectetur. 
                                Sint velit duis reprehenderit quis aliquip sint reprehenderit dolore proident irure aliqua adipisicing. 
                                Lorem qui irure sit sunt consectetur deserunt aliqua amet cillum minim. 
                                Ut nisi incididunt mollit occaecat sit. Enim ex incididunt officia cillum ullamco Lorem cupidatat anim qui incididunt ex est aliqua adipisicing. 
                                Exercitation nulla fugiat laboris labore eiusmod aliqua consequat veniam enim. 
                                Tempor elit laboris deserunt aute adipisicing ut reprehenderit esse eiusmod exercitation esse dolore voluptate. 
                                Amet non laborum qui aute magna sint laboris ut proident.',
                'mediaSrc' => '../images/creez-votre-marque-2.jpg',
                'mediaAlt' => 'Lores ipsum',
                'page' => 'creez-votre-marque'
            ],
            //Contactez-nous
            [
                'orderContent' => '1',
                'hook' => 'CardRightPicture',
                'title' => 'Nos coordonnées',
                'subtitle' => 'subtitle 1',
                'textContent' => 'textContent 1',
                'mediaSrc' => '..\images\map-contact.jpg',
                'mediaAlt' => 'contact',
                'page' => 'contactez-nous'
            ],
            [
                'orderContent' => '2',
                'hook' => 'ContactHook',
                'title' => 'Vous avez une question?',
                'subtitle' => '',
                'textContent' => '',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'contactez-nous'
            ],
            //Mentions légales
            [
                'orderContent' => '1',
                'hook' => 'LegalNoticeHook',
                'title' => ' ',
                'subtitle' => '',
                'textContent' => '',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'mentions-legales'
            ],
            [
                'orderContent' => '2',
                'hook' => 'LegalNotice',
                'title' => ' Conditions générales d\'utilisation du site',
                'subtitle' => '',
                'textContent' => 'L\'utilisation du site implique l\'acceptation pleine et entière des conditions générales d\'utilisation ci-après décrites.
                Ces conditions d\'utilisation sont susceptibles d\'être modifiées ou complétées à tout moment, 
                les utilisateurs du site sont donc invités à les consulter de manière régulière.',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'mentions-legales'
            ],
            [
                'orderContent' => '3',
                'hook' => 'LegalNotice',
                'title' => 'Description des services fournis',
                'subtitle' => '',
                'textContent' => 'Le présent site a pour objet de fournir une information concernant l\'ensemble des activités de la société.
                RNS LAB s\'efforce de fournir sur le site des informations aussi précises que possible. 
                Toutefois, il ne pourra être tenue responsable des omissions, des inexactitudes et des carences dans la mise à jour, 
                qu\'elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'mentions-legales'
            ],
            [
                'orderContent' => '4',
                'hook' => 'LegalNotice',
                'title' => 'Propriété intellectuelle et contrefaçons',
                'subtitle' => '',
                'textContent' => 'RNS LAB est propriétaire des droits de propriété intellectuelle ou détient les droits d\'usage sur tous les éléments accessibles sur le site, 
                notamment les textes, images, graphismes, logo, icônes, sons, logiciels.
                Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, 
                quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de : RNS LAB.',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'mentions-legales'
            ],
            [
                'orderContent' => '5',
                'hook' => 'LegalNotice',
                'title' => 'Gestion des données personnelles',
                'subtitle' => '',
                'textContent' => 'Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l\'informatique, 
                aux fichiers et aux libertés, tout utilisateur dispose d\'un droit d\'accès, de rectification et d\'opposition aux données personnelles le concernant, 
                en effectuant sa demande écrite et signée, accompagnée d\'une copie du titre d\'identité avec signature du titulaire de la pièce, 
                en précisant l\'adresse à laquelle la réponse doit être envoyée.
                Aucune information personnelle de l\'utilisateur du présent site n\'est publiée à l\'insu de l\'utilisateur,
                 échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule l\'hypothèse du rachat de RNS LAB et de ses droits permettrait 
                 la transmission des dites informations à l\'éventuel acquéreur qui serait à son tour tenu de la même obligation de conservation et
                  de modification des données vis-à-vis de l\'utilisateur du présent site.',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'mentions-legales'
            ],
            [
                'orderContent' => '6',
                'hook' => 'LegalNotice',
                'title' => 'Liens hypertextes et cookies',
                'subtitle' => '',
                'textContent' => 'Le site  contient un certain nombre de liens hypertextes vers d\'autres sites, mis en place avec l\'autorisation de RNS LAB. 
                Cependant, RNS LAB n\'a pas la possibilité de vérifier le contenu des sites ainsi visités, et n\'assumera en conséquence aucune responsabilité de ce fait.
                La navigation sur le présent site est susceptible de provoquer l\'installation de cookie(s) sur l\'ordinateur de l\'utilisateur. 
                Un cookie est un fichier de petite taille, qui ne permet pas l\'identification de l\'utilisateur, 
                mais qui enregistre des informations relatives à la navigation d\'un ordinateur sur un site. 
                Les données ainsi obtenues visent à faciliter la navigation ultérieure sur le site, et ont également vocation à permettre diverses mesures de fréquentation.',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'mentions-legales'
            ],
            [
                'orderContent' => '7',
                'hook' => 'LegalNotice',
                'title' => 'Droit applicable et attribution de juridiction',
                'subtitle' => '',
                'textContent' => 'Tout litige en relation avec l\'utilisation du site est soumis au droit français. 
                Il est fait attribution exclusive de juridiction aux tribunaux compétents de Paris.',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'mentions-legales'
            ],
            [
                'orderContent' => '8',
                'hook' => 'LegalNotice',
                'title' => 'Les principales lois concernées',
                'subtitle' => '',
                'textContent' => 'Loi n° 78-17 du 6 janvier 1978, notamment modifiée par la loi n° 2004-801 du 6 août 2004 relative à l\'informatique,
                 aux fichiers et aux libertés.
                Loi n° 2004-575 du 21 juin 2004 pour la confiance dans l\'économie numérique.',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'mentions-legales'
            ],
            [
                'orderContent' => '9',
                'hook' => 'LegalNotice',
                'title' => 'Lexique',
                'subtitle' => '',
                'textContent' => 'Utilisateur : Internaute se connectant, utilisant le site susnommé.Informations personnelles : 
                    « les informations qui permettent, sous quelque forme que ce soit, directement ou non, l\'identification des personnes physiques 
                    auxquelles elles s\'appliquent » (article 4 de la loi n° 78-17 du 6 janvier 1978).',
                'mediaSrc' => '',
                'mediaAlt' => '',
                'page' => 'mentions-legales'
            ],
        ];


        foreach ($contentsData as $contentData) {
            $page = $manager->getRepository(Pages::class)->findOneBy(['slug' => $contentData['page']]);
            if (!$page) {
                throw new \Exception("No page found with slug : '{$contentData['page']}'");
            }

            $content = new Contents();
            $content->setOrderContent($contentData['orderContent']);
            $content->setHook($contentData['hook']);
            $content->setTitle($contentData['title']);
            $content->setSubtitle($contentData['subtitle']);
            $content->setTextContent($contentData['textContent']);
            $content->setMediaSrc($contentData['mediaSrc']);
            $content->setMediaAlt($contentData['mediaAlt']);
            $content->setPage($page);

            $manager->persist($content);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PagesFixtures::class,
        ];
    }
}
