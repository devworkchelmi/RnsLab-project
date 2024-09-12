<?php

namespace App\Entity;

use App\Repository\NewsletterSuscribersRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsletterSuscribersRepository::class)]
class NewsletterSuscribers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $email = null;

    #[ORM\Column]
    private ?bool $legalConsent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateSuscription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function isLegalConsent(): ?bool
    {
        return $this->legalConsent;
    }

    public function setLegalConsent(bool $legalConsent): static
    {
        $this->legalConsent = $legalConsent;

        return $this;
    }

    public function getDateSuscription(): ?\DateTimeInterface
    {
        return $this->dateSuscription;
    }

    public function setDateSuscription(?\DateTimeInterface $dateSuscription): static
    {
        $this->dateSuscription = $dateSuscription;

        return $this;
    }
}
