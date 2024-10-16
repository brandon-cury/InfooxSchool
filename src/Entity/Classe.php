<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, filiere>
     */
    #[ORM\ManyToMany(targetEntity: filiere::class, inversedBy: 'classes')]
    private Collection $filiere;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $all_user = null;

    #[ORM\Column]
    private ?int $sort = null;

    /**
     * @var Collection<int, Matiere>
     */
    #[ORM\ManyToMany(targetEntity: Matiere::class, mappedBy: 'classe')]
    private Collection $matieres;

    public function __construct()
    {
        $this->filiere = new ArrayCollection();
        $this->matieres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, filiere>
     */
    public function getFiliere(): Collection
    {
        return $this->filiere;
    }

    public function addFiliere(filiere $filiere): static
    {
        if (!$this->filiere->contains($filiere)) {
            $this->filiere->add($filiere);
        }

        return $this;
    }

    public function removeFiliere(filiere $filiere): static
    {
        $this->filiere->removeElement($filiere);

        return $this;
    }

    public function getAllUsers(): ?string
    {
        return $this->all_users;
    }

    public function setAllUsers(string $all_users): static
    {
        $this->all_users = $all_users;

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

    /**
     * @return Collection<int, Matiere>
     */
    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function addMatiere(Matiere $matiere): static
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres->add($matiere);
            $matiere->addClasse($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): static
    {
        if ($this->matieres->removeElement($matiere)) {
            $matiere->removeClasse($this);
        }

        return $this;
    }
}
