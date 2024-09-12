<?php

namespace App\Entity;

use App\Repository\PagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\AsciiSlugger;

#[ORM\Entity(repositoryClass: PagesRepository::class)]
class Pages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $title = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $metaDescription = null;

    /**
     * @var Collection<int, Contents>
     */
    #[ORM\OneToMany(targetEntity: Contents::class, mappedBy: 'page', orphanRemoval: true)]
    private Collection $content;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->content = new ArrayCollection();
    }

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

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): static
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * @return Collection<int, Contents>
     */
    public function getContent(): Collection
    {
        return $this->content;
    }

    public function addContent(Contents $content): static
    {
        if (!$this->content->contains($content)) {
            $this->content->add($content);
            $content->setPage($this);
        }

        return $this;
    }

    public function removeContent(Contents $content): static
    {
        if ($this->content->removeElement($content)) {
            // set the owning side to null (unless already changed)
            if ($content->getPage() === $this) {
                $content->setPage(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }
}
