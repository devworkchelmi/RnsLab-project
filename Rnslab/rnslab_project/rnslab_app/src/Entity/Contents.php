<?php

namespace App\Entity;

use App\Repository\ContentsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContentsRepository::class)]
class Contents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $orderContent = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $hook = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $subtitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $textContent = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $mediaSrc = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $mediaAlt = null;

    #[ORM\ManyToOne(inversedBy: 'content')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pages $page = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderContent(): ?int
    {
        return $this->orderContent;
    }

    public function setOrderContent(?int $orderContent): static
    {
        $this->orderContent = $orderContent;

        return $this;
    }

    public function getHook(): ?string
    {
        return $this->hook;
    }

    public function setHook(?string $hook): static
    {
        $this->hook = $hook;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): static
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getTextContent(): ?string
    {
        return $this->textContent;
    }

    public function setTextContent(?string $textContent): static
    {
        $this->textContent = $textContent;

        return $this;
    }

    public function getMediaSrc(): ?string
    {
        return $this->mediaSrc;
    }

    public function setMediaSrc(?string $mediaSrc): static
    {
        $this->mediaSrc = $mediaSrc;

        return $this;
    }

    public function getMediaAlt(): ?string
    {
        return $this->mediaAlt;
    }

    public function setMediaAlt(?string $mediaAlt): static
    {
        $this->mediaAlt = $mediaAlt;

        return $this;
    }

    public function getPage(): ?Pages
    {
        return $this->page;
    }

    public function setPage(?Pages $page): static
    {
        $this->page = $page;

        return $this;
    }
}
