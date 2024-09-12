<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $hightlighted = null;

    #[ORM\Column(nullable: true)]
    private ?int $orderproduct = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 100)]
    private ?string $pictureSrc = null;

    #[ORM\Column(length: 100)]
    private ?string $pictureAlt = null;

    #[ORM\ManyToOne(inversedBy: 'product')]
    private ?ProductLabels $label = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getOrderproduct(): ?int
    {
        return $this->orderproduct;
    }

    public function setOrderproduct(?int $orderproduct): static
    {
        $this->orderproduct = $orderproduct;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getLabel(): ?ProductLabels
    {
        return $this->label;
    }

    public function setLabel(?ProductLabels $label): static
    {
        $this->label = $label;

        return $this;
    }
    // public function getLabelName(): ?string
    // {
    //     return $this->label ? $this->label->getNameLabel() : null;
    // }
}
