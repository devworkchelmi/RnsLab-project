<?php

namespace App\Entity;

use App\Repository\LegalInformationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LegalInformationsRepository::class)]
class LegalInformations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $typeCompagny = null;

    #[ORM\Column(length: 50)]
    private ?string $nameCompagny = null;

    #[ORM\Column(length: 255)]
    private ?string $adressHeadOffice = null;

    #[ORM\Column(length: 255)]
    private ?string $telNumberHeadOffice = null;

    #[ORM\Column(length: 50)]
    private ?string $siret = null;

    #[ORM\Column(length: 50)]
    private ?string $tvaIdNumber = null;

    #[ORM\Column]
    private ?int $capitalAmount = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $adressLogistic = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adressContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telNumberContact1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telNumberContact2 = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $firstnameDirector = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $lastnameDirector = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $firstnameContact = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $lastnameContact = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $roleContact = null;

    #[ORM\Column(length: 50)]
    private ?string $nameInternethost = null;

    #[ORM\Column(length: 255)]
    private ?string $adressInternethost = null;

    #[ORM\Column(length: 255)]
    private ?string $telNumber_Internethost = null;

    #[ORM\Column(length: 170, nullable: true)]
    private ?string $descriptionFooter = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $titleFooter = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeCompagny(): ?string
    {
        return $this->typeCompagny;
    }

    public function setTypeCompagny(string $typeCompagny): static
    {
        $this->typeCompagny = $typeCompagny;

        return $this;
    }

    public function getNameCompagny(): ?string
    {
        return $this->nameCompagny;
    }

    public function setNameCompagny(string $nameCompagny): static
    {
        $this->nameCompagny = $nameCompagny;

        return $this;
    }

    public function getAdressHeadOffice(): ?string
    {
        return $this->adressHeadOffice;
    }

    public function setAdressHeadOffice(string $adressHeadOffice): static
    {
        $this->adressHeadOffice = $adressHeadOffice;

        return $this;
    }

    public function getTelNumberHeadOffice(): ?string
    {
        return $this->telNumberHeadOffice;
    }

    public function setTelNumberHeadOffice(string $telNumberHeadOffice): static
    {
        $this->telNumberHeadOffice = $telNumberHeadOffice;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): static
    {
        $this->siret = $siret;

        return $this;
    }

    public function getTvaIdNumber(): ?string
    {
        return $this->tvaIdNumber;
    }

    public function setTvaIdNumber(string $tvaIdNumber): static
    {
        $this->tvaIdNumber = $tvaIdNumber;

        return $this;
    }

    public function getCapitalAmount(): ?int
    {
        return $this->capitalAmount;
    }

    public function setCapitalAmount(int $capitalAmount): static
    {
        $this->capitalAmount = $capitalAmount;

        return $this;
    }

    public function getAdressLogistic(): ?string
    {
        return $this->adressLogistic;
    }

    public function setAdressLogistic(?string $adressLogistic): static
    {
        $this->adressLogistic = $adressLogistic;

        return $this;
    }

    public function getAdressContact(): ?string
    {
        return $this->adressContact;
    }

    public function setAdressContact(?string $adressContact): static
    {
        $this->adressContact = $adressContact;

        return $this;
    }

    public function getTelNumberContact1(): ?string
    {
        return $this->telNumberContact1;
    }

    public function setTelNumberContact1(?string $telNumberContact1): static
    {
        $this->telNumberContact1 = $telNumberContact1;

        return $this;
    }

    public function getTelNumberContact2(): ?string
    {
        return $this->telNumberContact2;
    }

    public function setTelNumberContact2(?string $telNumberContact2): static
    {
        $this->telNumberContact2 = $telNumberContact2;

        return $this;
    }

    public function getFirstnameDirector(): ?string
    {
        return $this->firstnameDirector;
    }

    public function setFirstnameDirector(?string $firstnameDirector): static
    {
        $this->firstnameDirector = $firstnameDirector;

        return $this;
    }

    public function getLastnameDirector(): ?string
    {
        return $this->lastnameDirector;
    }

    public function setLastnameDirector(?string $lastnameDirector): static
    {
        $this->lastnameDirector = $lastnameDirector;

        return $this;
    }

    public function getFirstnameContact(): ?string
    {
        return $this->firstnameContact;
    }

    public function setFirstnameContact(?string $firstnameContact): static
    {
        $this->firstnameContact = $firstnameContact;

        return $this;
    }

    public function getLastnameContact(): ?string
    {
        return $this->lastnameContact;
    }

    public function setLastnameContact(?string $lastnameContact): static
    {
        $this->lastnameContact = $lastnameContact;

        return $this;
    }

    public function getRoleContact(): ?string
    {
        return $this->roleContact;
    }

    public function setRoleContact(?string $roleContact): static
    {
        $this->roleContact = $roleContact;

        return $this;
    }

    public function getNameInternethost(): ?string
    {
        return $this->nameInternethost;
    }

    public function setNameInternethost(string $nameInternethost): static
    {
        $this->nameInternethost = $nameInternethost;

        return $this;
    }

    public function getAdressInternethost(): ?string
    {
        return $this->adressInternethost;
    }

    public function setAdressInternethost(string $adressInternethost): static
    {
        $this->adressInternethost = $adressInternethost;

        return $this;
    }

    public function getTelNumberInternethost(): ?string
    {
        return $this->telNumber_Internethost;
    }

    public function setTelNumberInternethost(string $telNumber_Internethost): static
    {
        $this->telNumber_Internethost = $telNumber_Internethost;

        return $this;
    }

    public function getdescriptionFooter(): ?string
    {
        return $this->descriptionFooter;
    }

    public function setdescriptionFooter(?string $descriptionFooter): static
    {
        $this->descriptionFooter = $descriptionFooter;

        return $this;
    }

    public function getTitleFooter(): ?string
    {
        return $this->titleFooter;
    }

    public function setTitleFooter(?string $titleFooter): static
    {
        $this->titleFooter = $titleFooter;

        return $this;
    }
}
