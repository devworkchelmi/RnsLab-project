<?php

namespace App\Test\Controller;

use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductsControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/products/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Products::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Product index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'product[hightlighted]' => 'Testing',
            'product[orderproduct]' => 'Testing',
            'product[title]' => 'Testing',
            'product[description]' => 'Testing',
            'product[pictureSrc]' => 'Testing',
            'product[pictureAlt]' => 'Testing',
            'product[label]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Products();
        $fixture->setHightlighted('My Title');
        $fixture->setOrderproduct('My Title');
        $fixture->setTitle('My Title');
        $fixture->setDescription('My Title');
        $fixture->setPictureSrc('My Title');
        $fixture->setPictureAlt('My Title');
        $fixture->setLabel('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Product');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Products();
        $fixture->setHightlighted('Value');
        $fixture->setOrderproduct('Value');
        $fixture->setTitle('Value');
        $fixture->setDescription('Value');
        $fixture->setPictureSrc('Value');
        $fixture->setPictureAlt('Value');
        $fixture->setLabel('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'product[hightlighted]' => 'Something New',
            'product[orderproduct]' => 'Something New',
            'product[title]' => 'Something New',
            'product[description]' => 'Something New',
            'product[pictureSrc]' => 'Something New',
            'product[pictureAlt]' => 'Something New',
            'product[label]' => 'Something New',
        ]);

        self::assertResponseRedirects('/products/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getHightlighted());
        self::assertSame('Something New', $fixture[0]->getOrderproduct());
        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getPictureSrc());
        self::assertSame('Something New', $fixture[0]->getPictureAlt());
        self::assertSame('Something New', $fixture[0]->getLabel());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Products();
        $fixture->setHightlighted('Value');
        $fixture->setOrderproduct('Value');
        $fixture->setTitle('Value');
        $fixture->setDescription('Value');
        $fixture->setPictureSrc('Value');
        $fixture->setPictureAlt('Value');
        $fixture->setLabel('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/products/');
        self::assertSame(0, $this->repository->count([]));
    }
}
