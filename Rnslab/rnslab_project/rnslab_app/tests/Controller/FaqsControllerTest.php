<?php

namespace App\Test\Controller;

use App\Entity\Faqs;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FaqsControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/faqs/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Faqs::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Faq index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'faq[question]' => 'Testing',
            'faq[response]' => 'Testing',
            'faq[OrderFaqs]' => 'Testing',
            'faq[metaKeywords]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Faqs();
        $fixture->setQuestion('My Title');
        $fixture->setResponse('My Title');
        $fixture->setOrderFaqs('My Title');
        $fixture->setMetaKeywords('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Faq');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Faqs();
        $fixture->setQuestion('Value');
        $fixture->setResponse('Value');
        $fixture->setOrderFaqs('Value');
        $fixture->setMetaKeywords('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'faq[question]' => 'Something New',
            'faq[response]' => 'Something New',
            'faq[OrderFaqs]' => 'Something New',
            'faq[metaKeywords]' => 'Something New',
        ]);

        self::assertResponseRedirects('/faqs/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getQuestion());
        self::assertSame('Something New', $fixture[0]->getResponse());
        self::assertSame('Something New', $fixture[0]->getOrderFaqs());
        self::assertSame('Something New', $fixture[0]->getMetaKeywords());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Faqs();
        $fixture->setQuestion('Value');
        $fixture->setResponse('Value');
        $fixture->setOrderFaqs('Value');
        $fixture->setMetaKeywords('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/faqs/');
        self::assertSame(0, $this->repository->count([]));
    }
}
