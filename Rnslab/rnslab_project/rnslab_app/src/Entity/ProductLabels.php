<?php

namespace App\Entity;

use App\Repository\ProductLabelsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductLabelsRepository::class)]
class ProductLabels
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nameLabel = null;

    /**
     * @var Collection<int, Products>
     */
    #[ORM\OneToMany(targetEntity: Products::class, mappedBy: 'label')]
    private Collection $product;

    public function __construct()
    {
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameLabel(): ?string
    {
        return $this->nameLabel;
    }

    public function setNameLabel(string $nameLabel): static
    {
        $this->nameLabel = $nameLabel;

        return $this;
    }

    /**
     * @return Collection<string, Products>
     */
    public function getProducts(): Collection
    {
        return $this->product;
    }

    public function addProduct(Products $product): static
    {
        if (!$this->product->contains($product)) {
            $this->product->add($product);
            $product->setLabel($this);
        }

        return $this;
    }

    public function removeProduct(Products $product): static
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getLabel() === $this) {
                $product->setLabel(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->nameLabel;
    }
}
