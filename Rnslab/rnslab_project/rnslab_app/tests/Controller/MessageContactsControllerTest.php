<?php

namespace App\Test\Controller;

use App\Entity\MessageContacts;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MessageContactsControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/message/contacts/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(MessageContacts::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('MessageContact index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'message_contact[civility]' => 'Testing',
            'message_contact[firstname]' => 'Testing',
            'message_contact[lastname]' => 'Testing',
            'message_contact[telnumber]' => 'Testing',
            'message_contact[email]' => 'Testing',
            'message_contact[occupation]' => 'Testing',
            'message_contact[request_object]' => 'Testing',
            'message_contact[message]' => 'Testing',
            'message_contact[date_send]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new MessageContacts();
        $fixture->setCivility('My Title');
        $fixture->setFirstname('My Title');
        $fixture->setLastname('My Title');
        $fixture->setTelnumber('My Title');
        $fixture->setEmail('My Title');
        $fixture->setOccupation('My Title');
        $fixture->setRequest_object('My Title');
        $fixture->setMessage('My Title');
        $fixture->setDate_send('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('MessageContact');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new MessageContacts();
        $fixture->setCivility('Value');
        $fixture->setFirstname('Value');
        $fixture->setLastname('Value');
        $fixture->setTelnumber('Value');
        $fixture->setEmail('Value');
        $fixture->setOccupation('Value');
        $fixture->setRequest_object('Value');
        $fixture->setMessage('Value');
        $fixture->setDate_send('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'message_contact[civility]' => 'Something New',
            'message_contact[firstname]' => 'Something New',
            'message_contact[lastname]' => 'Something New',
            'message_contact[telnumber]' => 'Something New',
            'message_contact[email]' => 'Something New',
            'message_contact[occupation]' => 'Something New',
            'message_contact[request_object]' => 'Something New',
            'message_contact[message]' => 'Something New',
            'message_contact[date_send]' => 'Something New',
        ]);

        self::assertResponseRedirects('/message/contacts/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCivility());
        self::assertSame('Something New', $fixture[0]->getFirstname());
        self::assertSame('Something New', $fixture[0]->getLastname());
        self::assertSame('Something New', $fixture[0]->getTelnumber());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getOccupation());
        self::assertSame('Something New', $fixture[0]->getRequest_object());
        self::assertSame('Something New', $fixture[0]->getMessage());
        self::assertSame('Something New', $fixture[0]->getDate_send());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new MessageContacts();
        $fixture->setCivility('Value');
        $fixture->setFirstname('Value');
        $fixture->setLastname('Value');
        $fixture->setTelnumber('Value');
        $fixture->setEmail('Value');
        $fixture->setOccupation('Value');
        $fixture->setRequest_object('Value');
        $fixture->setMessage('Value');
        $fixture->setDate_send('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/message/contacts/');
        self::assertSame(0, $this->repository->count([]));
    }
}
