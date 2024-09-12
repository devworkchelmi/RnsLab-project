<?php

namespace App\Test\Controller;

use App\Entity\Contents;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContentsControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/content/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Contents::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Content index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'content[orderContent]' => 'Testing',
            'content[hook]' => 'Testing',
            'content[title]' => 'Testing',
            'content[subtitle]' => 'Testing',
            'content[textContent]' => 'Testing',
            'content[mediaSrc]' => 'Testing',
            'content[mediaAlt]' => 'Testing',
            'content[page]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Contents();
        $fixture->setOrderContent('My Title');
        $fixture->setHook('My Title');
        $fixture->setTitle('My Title');
        $fixture->setSubtitle('My Title');
        $fixture->setTextContent('My Title');
        $fixture->setMediaSrc('My Title');
        $fixture->setMediaAlt('My Title');
        $fixture->setPage('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Content');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Contents();
        $fixture->setOrderContent('Value');
        $fixture->setHook('Value');
        $fixture->setTitle('Value');
        $fixture->setSubtitle('Value');
        $fixture->setTextContent('Value');
        $fixture->setMediaSrc('Value');
        $fixture->setMediaAlt('Value');
        $fixture->setPage('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'content[orderContent]' => 'Something New',
            'content[hook]' => 'Something New',
            'content[title]' => 'Something New',
            'content[subtitle]' => 'Something New',
            'content[textContent]' => 'Something New',
            'content[mediaSrc]' => 'Something New',
            'content[mediaAlt]' => 'Something New',
            'content[page]' => 'Something New',
        ]);

        self::assertResponseRedirects('/content/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getOrderContent());
        self::assertSame('Something New', $fixture[0]->getHook());
        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getSubtitle());
        self::assertSame('Something New', $fixture[0]->getTextContent());
        self::assertSame('Something New', $fixture[0]->getMediaSrc());
        self::assertSame('Something New', $fixture[0]->getMediaAlt());
        self::assertSame('Something New', $fixture[0]->getPage());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Contents();
        $fixture->setOrderContent('Value');
        $fixture->setHook('Value');
        $fixture->setTitle('Value');
        $fixture->setSubtitle('Value');
        $fixture->setTextContent('Value');
        $fixture->setMediaSrc('Value');
        $fixture->setMediaAlt('Value');
        $fixture->setPage('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/content/');
        self::assertSame(0, $this->repository->count([]));
    }
}
