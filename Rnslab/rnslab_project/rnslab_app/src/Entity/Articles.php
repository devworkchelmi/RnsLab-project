<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\AsciiSlugger;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePublication = null;

    #[ORM\Column(length: 50)]
    private ?string $autor = null;

    #[ORM\Column]
    private ?bool $hightlighted = null;

    #[ORM\Column(length: 100)]
    private ?string $slug = null;

    #[ORM\Column(nullable: true)]
    private ?int $orderArticle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $textContent = null;

    #[ORM\Column(length: 100)]
    private ?string $pictureSrc = null;

    #[ORM\Column(length: 100)]
    private ?string $pictureAlt = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $metaDescription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
        //set slug automatisation :
        $slugger = new AsciiSlugger();
        $this->slug = $slugger->slug($title)->lower();

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTimeInterface $datePublication): static
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): static
    {
        $this->autor = $autor;

        return $this;
    }

    public function isHightlighted(): ?bool
    {
        return $this->hightlighted;
    }

    public function setHightlighted(bool $hightlighted): static
    {
        $this->hightlighted = $hightlighted;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getOrderArticle(): ?int
    {
        return $this->orderArticle;
    }

    public function setOrderArticle(?int $orderArticle): static
    {
        $this->orderArticle = $orderArticle;

        return $this;
    }

    public function getTextContent(): ?string
    {
        return $this->textContent;
    }

    public function setTextContent(string $textContent): static
    {
        $this->textContent = $textContent;

        return $this;
    }

    public function getPictureSrc(): ?string
    {
        return $this->pictureSrc;
    }

    public function setPictureSrc(string $pictureSrc): static
    {
        $this->pictureSrc = $pictureSrc;

        return $this;
    }

    public function getPictureAlt(): ?string
    {
        return $this->pictureAlt;
    }

    public function setPictureAlt(string $pictureAlt): static
    {
        $this->pictureAlt = $pictureAlt;

        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): static
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }
}
