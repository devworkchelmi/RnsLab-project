symfony server:start -dev

Uploader sur BDD:
    $ php bin/console make:migration
    $ php bin/console doctrine:migrations:migrate

SASS watch:
    $ php bin/console sass:build --watch

**Fixtures**

Loading fixture
    $ php bin/console doctrine:fixtures:load || d:f:l

Convention de nommages:
    PascalCase + toujours au pluriel => reprends le nom de l’entité + Fitures (ex: ClassesFixtures.php)

Exemple de Fixtures
`
<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création de plusieurs articles de test
        $articlesData = [
            [
                'title' => 'Article 1',
                'description' => 'Description de l\'article 1.',
                'picture' => 'https://picsum.photos/200/301',
                'hook' => 'blog'
            ],
            [
                'title' => 'Article 2',
                'description' => 'Description de l\'article 2.',
                'picture' => 'https://picsum.photos/200/302',
                'hook' => 'PictureLeft'
            ],
        ];

        // Création des objets Articles et sauvegarde en base de données
        foreach ($articlesData as $articleData) {
            $article = new Articles();
            $article->setTitle($articleData['title']);
            $article->setDescription($articleData['description']);
            $article->setPicture($articleData['picture']);
            $article->setHook($articleData['hook']);
            $manager->persist($article);
        }

        $manager->flush();
    }
}

`

***_***

**Création des entités**

Création branche avec nom entité à partir de dev
    $ git checkout -b <nomEntité>

Créer entité    
    
    $php bin/console make:entity  || symfony console make:entity

        Convention de nommage :
            Entités : PascalCase + toujours au pluriel. (ex: Classes.php)
            Attributs des entités : camelCase (souvent au singulier)

Uploader sur BDD:
    $ php bin/console make:migration
    $ php bin/console doctrine:migrations:migrate

si tout est ok:
    commit avec nom du ticker
    $ git push origin <nomEntité> 
        => merge request sur Gitlab
    $ git checkout main
    et on recommence pour la prochaine


***_***

**CRUD**

    $ php bin/console make:crud

***_***



Sass is watching for changes. Press Ctrl-C to stop.
    $ php bin/console sass:build --watch

# Installation du projet :
git clone lien https
cd dossier /voir sous dossier
git checkout dev( branch dev)
demarré wamp
phpmyadmin ->root/root/mariaDB
création DB "Base de donnée -> utf8generali-ci
création .env.local 
ajouter DATABASE copier coller ligne 29 dans le .env (DATABASE_URL="mysql://root:root@localhost:3307/rnslab?serverVersion=mariadb-10.3.39"
Dispose d’un menu contextuel)

# Installation des entity :

Créer une branch pour chaques entity
        git checkout -b <nomdelentity>
        php bin/console make:entity
Uploader sur DB:
        php bin/console make:migration
        php bin/console doctrine:migrations:migrate
Si tout ok:
        commit avec nom du ticket
        git push origin <nomEntity>
        merge request sur Gitlab
        git checkout main
        et on recommence pour chaque entity

# etape suivante :
       php bin/console make:crud / symfony console make:crud
       remplir les champs
