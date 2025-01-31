<?php

namespace App\Test\Controller;

use App\Entity\NewsletterSuscribers;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NewsletterSuscribersControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/newsletter/suscribers/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(NewsletterSuscribers::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('NewsletterSuscriber index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'newsletter_suscriber[email]' => 'Testing',
            'newsletter_suscriber[legalConsent]' => 'Testing',
            'newsletter_suscriber[dateSuscription]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new NewsletterSuscribers();
        $fixture->setEmail('My Title');
        $fixture->setLegalConsent('My Title');
        $fixture->setDateSuscription('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('NewsletterSuscriber');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new NewsletterSuscribers();
        $fixture->setEmail('Value');
        $fixture->setLegalConsent('Value');
        $fixture->setDateSuscription('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'newsletter_suscriber[email]' => 'Something New',
            'newsletter_suscriber[legalConsent]' => 'Something New',
            'newsletter_suscriber[dateSuscription]' => 'Something New',
        ]);

        self::assertResponseRedirects('/newsletter/suscribers/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getLegalConsent());
        self::assertSame('Something New', $fixture[0]->getDateSuscription());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new NewsletterSuscribers();
        $fixture->setEmail('Value');
        $fixture->setLegalConsent('Value');
        $fixture->setDateSuscription('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/newsletter/suscribers/');
        self::assertSame(0, $this->repository->count([]));
    }
}
