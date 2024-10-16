<?php

namespace App\Entity;

use App\Repository\FiliereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FiliereRepository::class)]
class Filiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, section>
     */
    #[ORM\ManyToMany(targetEntity: section::class, inversedBy: 'filieres')]
    private Collection $section;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $sort = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $all_user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    /**
     * @var Collection<int, Classe>
     */
    #[ORM\ManyToMany(targetEntity: Classe::class, mappedBy: 'filiere')]
    private Collection $classes;

    /**
     * @var Collection<int, Bord>
     */
    #[ORM\ManyToMany(targetEntity: Bord::class, mappedBy: 'filiere')]
    private Collection $bords;

    public function __construct()
    {
        $this->section = new ArrayCollection();
        $this->classes = new ArrayCollection();
        $this->bords = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, section>
     */
    public function getSection(): Collection
    {
        return $this->section;
    }

    public function addSection(section $section): static
    {
        if (!$this->section->contains($section)) {
            $this->section->add($section);
        }

        return $this;
    }

    public function removeSection(section $section): static
    {
        $this->section->removeElement($section);

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(int $sort): static
    {
        $this->sort = $sort;

        return $this;
    }

    public function getAllUser(): ?string
    {
        return $this->all_user;
    }

    public function setAllUser(string $all_user): static
    {
        $this->all_user = $all_user;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classe $class): static
    {
        if (!$this->classes->contains($class)) {
            $this->classes->add($class);
            $class->addFiliere($this);
        }

        return $this;
    }

    public function removeClass(Classe $class): static
    {
        if ($this->classes->removeElement($class)) {
            $class->removeFiliere($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Bord>
     */
    public function getBords(): Collection
    {
        return $this->bords;
    }

    public function addBord(Bord $bord): static
    {
        if (!$this->bords->contains($bord)) {
            $this->bords->add($bord);
            $bord->addFiliere($this);
        }

        return $this;
    }

    public function removeBord(Bord $bord): static
    {
        if ($this->bords->removeElement($bord)) {
            $bord->removeFiliere($this);
        }

        return $this;
    }
}
