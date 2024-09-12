<?php

namespace App\Test\Controller;

use App\Entity\LegalInformations;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LegalInformationsControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/legal/informations/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(LegalInformations::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('LegalInformation index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'legal_information[typeCompagny]' => 'Testing',
            'legal_information[nameCompagny]' => 'Testing',
            'legal_information[adressHeadOffice]' => 'Testing',
            'legal_information[telNumberHeadOffice]' => 'Testing',
            'legal_information[siret]' => 'Testing',
            'legal_information[tvaIdNumber]' => 'Testing',
            'legal_information[capitalAmount]' => 'Testing',
            'legal_information[adressLogistic]' => 'Testing',
            'legal_information[adressContact]' => 'Testing',
            'legal_information[telNumberContact1]' => 'Testing',
            'legal_information[telNumberContact2]' => 'Testing',
            'legal_information[firstnameDirector]' => 'Testing',
            'legal_information[lastnameDirector]' => 'Testing',
            'legal_information[firstnameContact]' => 'Testing',
            'legal_information[lastnameContact]' => 'Testing',
            'legal_information[roleContact]' => 'Testing',
            'legal_information[nameInternethost]' => 'Testing',
            'legal_information[adressInternethost]' => 'Testing',
            'legal_information[telNumber_Internethost]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new LegalInformations();
        $fixture->setTypeCompagny('My Title');
        $fixture->setNameCompagny('My Title');
        $fixture->setAdressHeadOffice('My Title');
        $fixture->setTelNumberHeadOffice('My Title');
        $fixture->setSiret('My Title');
        $fixture->setTvaIdNumber('My Title');
        $fixture->setCapitalAmount('My Title');
        $fixture->setAdressLogistic('My Title');
        $fixture->setAdressContact('My Title');
        $fixture->setTelNumberContact1('My Title');
        $fixture->setTelNumberContact2('My Title');
        $fixture->setFirstnameDirector('My Title');
        $fixture->setLastnameDirector('My Title');
        $fixture->setFirstnameContact('My Title');
        $fixture->setLastnameContact('My Title');
        $fixture->setRoleContact('My Title');
        $fixture->setNameInternethost('My Title');
        $fixture->setAdressInternethost('My Title');
        $fixture->setTelNumber_Internethost('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('LegalInformation');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new LegalInformations();
        $fixture->setTypeCompagny('Value');
        $fixture->setNameCompagny('Value');
        $fixture->setAdressHeadOffice('Value');
        $fixture->setTelNumberHeadOffice('Value');
        $fixture->setSiret('Value');
        $fixture->setTvaIdNumber('Value');
        $fixture->setCapitalAmount('Value');
        $fixture->setAdressLogistic('Value');
        $fixture->setAdressContact('Value');
        $fixture->setTelNumberContact1('Value');
        $fixture->setTelNumberContact2('Value');
        $fixture->setFirstnameDirector('Value');
        $fixture->setLastnameDirector('Value');
        $fixture->setFirstnameContact('Value');
        $fixture->setLastnameContact('Value');
        $fixture->setRoleContact('Value');
        $fixture->setNameInternethost('Value');
        $fixture->setAdressInternethost('Value');
        $fixture->setTelNumber_Internethost('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'legal_information[typeCompagny]' => 'Something New',
            'legal_information[nameCompagny]' => 'Something New',
            'legal_information[adressHeadOffice]' => 'Something New',
            'legal_information[telNumberHeadOffice]' => 'Something New',
            'legal_information[siret]' => 'Something New',
            'legal_information[tvaIdNumber]' => 'Something New',
            'legal_information[capitalAmount]' => 'Something New',
            'legal_information[adressLogistic]' => 'Something New',
            'legal_information[adressContact]' => 'Something New',
            'legal_information[telNumberContact1]' => 'Something New',
            'legal_information[telNumberContact2]' => 'Something New',
            'legal_information[firstnameDirector]' => 'Something New',
            'legal_information[lastnameDirector]' => 'Something New',
            'legal_information[firstnameContact]' => 'Something New',
            'legal_information[lastnameContact]' => 'Something New',
            'legal_information[roleContact]' => 'Something New',
            'legal_information[nameInternethost]' => 'Something New',
            'legal_information[adressInternethost]' => 'Something New',
            'legal_information[telNumber_Internethost]' => 'Something New',
        ]);

        self::assertResponseRedirects('/legal/informations/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTypeCompagny());
        self::assertSame('Something New', $fixture[0]->getNameCompagny());
        self::assertSame('Something New', $fixture[0]->getAdressHeadOffice());
        self::assertSame('Something New', $fixture[0]->getTelNumberHeadOffice());
        self::assertSame('Something New', $fixture[0]->getSiret());
        self::assertSame('Something New', $fixture[0]->getTvaIdNumber());
        self::assertSame('Something New', $fixture[0]->getCapitalAmount());
        self::assertSame('Something New', $fixture[0]->getAdressLogistic());
        self::assertSame('Something New', $fixture[0]->getAdressContact());
        self::assertSame('Something New', $fixture[0]->getTelNumberContact1());
        self::assertSame('Something New', $fixture[0]->getTelNumberContact2());
        self::assertSame('Something New', $fixture[0]->getFirstnameDirector());
        self::assertSame('Something New', $fixture[0]->getLastnameDirector());
        self::assertSame('Something New', $fixture[0]->getFirstnameContact());
        self::assertSame('Something New', $fixture[0]->getLastnameContact());
        self::assertSame('Something New', $fixture[0]->getRoleContact());
        self::assertSame('Something New', $fixture[0]->getNameInternethost());
        self::assertSame('Something New', $fixture[0]->getAdressInternethost());
        self::assertSame('Something New', $fixture[0]->getTelNumber_Internethost());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new LegalInformations();
        $fixture->setTypeCompagny('Value');
        $fixture->setNameCompagny('Value');
        $fixture->setAdressHeadOffice('Value');
        $fixture->setTelNumberHeadOffice('Value');
        $fixture->setSiret('Value');
        $fixture->setTvaIdNumber('Value');
        $fixture->setCapitalAmount('Value');
        $fixture->setAdressLogistic('Value');
        $fixture->setAdressContact('Value');
        $fixture->setTelNumberContact1('Value');
        $fixture->setTelNumberContact2('Value');
        $fixture->setFirstnameDirector('Value');
        $fixture->setLastnameDirector('Value');
        $fixture->setFirstnameContact('Value');
        $fixture->setLastnameContact('Value');
        $fixture->setRoleContact('Value');
        $fixture->setNameInternethost('Value');
        $fixture->setAdressInternethost('Value');
        $fixture->setTelNumber_Internethost('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/legal/informations/');
        self::assertSame(0, $this->repository->count([]));
    }
}
