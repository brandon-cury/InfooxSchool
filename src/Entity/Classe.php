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

    /**
     * @var Collection<int, filiere>
     */
    #[ORM\ManyToMany(targetEntity: filiere::class, inversedBy: 'classes')]
    private Collection $filiere;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $all_user = null;

    #[ORM\Column]
    private ?int $sort = null;

    /**
     * @var Collection<int, Matiere>
     */
    #[ORM\ManyToMany(targetEntity: Matiere::class, mappedBy: 'classe')]
    private Collection $matieres;

    /**
     * @var Collection<int, Bord>
     */
    #[ORM\ManyToMany(targetEntity: Bord::class, mappedBy: 'classe')]
    private Collection $bords;

    public function __construct()
    {
        $this->filiere = new ArrayCollection();
        $this->matieres = new ArrayCollection();
        $this->bords = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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
            $bord->addClasse($this);
        }

        return $this;
    }

    public function removeBord(Bord $bord): static
    {
        if ($this->bords->removeElement($bord)) {
            $bord->removeClasse($this);
        }

        return $this;
    }
}
