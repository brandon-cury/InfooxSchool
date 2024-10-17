<?php

namespace App\Entity;

use App\Repository\BordRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BordRepository::class)]
class Bord
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'myBooksPublished')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $editor = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $keyword = null;

    #[ORM\Column]
    private ?bool $is_online_access = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $all_user = null;

    #[ORM\Column]
    private ?int $star = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $price = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $whatsapp_number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $path = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $all_gain_bord = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $all_gain_infooxschool = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $last_update_at = null;

    #[ORM\Column]
    private ?bool $is_onligne = null;

    #[ORM\ManyToOne(inversedBy: 'bords')]
    private ?collectionBord $collection = null;

    /**
     * @var Collection<int, section>
     */
    #[ORM\ManyToMany(targetEntity: section::class, inversedBy: 'bords')]
    private Collection $section;

    /**
     * @var Collection<int, filiere>
     */
    #[ORM\ManyToMany(targetEntity: filiere::class, inversedBy: 'bords')]
    private Collection $filiere;

    /**
     * @var Collection<int, classe>
     */
    #[ORM\ManyToMany(targetEntity: classe::class, inversedBy: 'bords')]
    private Collection $classe;

    /**
     * @var Collection<int, matiere>
     */
    #[ORM\ManyToMany(targetEntity: matiere::class, inversedBy: 'bords')]
    private Collection $matiere;

    /**
     * @var Collection<int, Cours>
     */
    #[ORM\OneToMany(targetEntity: Cours::class, mappedBy: 'bord')]
    private Collection $cours;

    /**
     * @var Collection<int, Epreuve>
     */
    #[ORM\OneToMany(targetEntity: Epreuve::class, mappedBy: 'bord')]
    private Collection $epreuves;

    public function __construct()
    {
        $this->section = new ArrayCollection();
        $this->filiere = new ArrayCollection();
        $this->classe = new ArrayCollection();
        $this->matiere = new ArrayCollection();
        $this->cours = new ArrayCollection();
        $this->epreuves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEditor(): ?user
    {
        return $this->editor;
    }

    public function setEditor(?user $editor): static
    {
        $this->editor = $editor;

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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    public function setKeyword(?string $keyword): static
    {
        $this->keyword = $keyword;

        return $this;
    }

    public function isOnlineAccess(): ?bool
    {
        return $this->is_online_access;
    }

    public function setOnlineAccess(bool $is_online_access): static
    {
        $this->is_online_access = $is_online_access;

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

    public function getStar(): ?int
    {
        return $this->star;
    }

    public function setStar(int $star): static
    {
        $this->star = $star;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getWhatsappNumber(): ?string
    {
        return $this->whatsapp_number;
    }

    public function setWhatsappNumber(?string $whatsapp_number): static
    {
        $this->whatsapp_number = $whatsapp_number;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAllGainBord(): ?string
    {
        return $this->all_gain_bord;
    }

    public function setAllGainBord(string $all_gain_bord): static
    {
        $this->all_gain_bord = $all_gain_bord;

        return $this;
    }

    public function getAllGainInfooxschool(): ?string
    {
        return $this->all_gain_infooxschool;
    }

    public function setAllGainInfooxschool(string $all_gain_infooxschool): static
    {
        $this->all_gain_infooxschool = $all_gain_infooxschool;

        return $this;
    }

    public function getLastUpdateAt(): ?\DateTimeImmutable
    {
        return $this->last_update_at;
    }

    public function setLastUpdateAt(?\DateTimeImmutable $last_update_at): static
    {
        $this->last_update_at = $last_update_at;

        return $this;
    }

    public function isOnligne(): ?bool
    {
        return $this->is_onligne;
    }

    public function setOnligne(bool $is_onligne): static
    {
        $this->is_onligne = $is_onligne;

        return $this;
    }

    public function getCollection(): ?collectionBord
    {
        return $this->collection;
    }

    public function setCollection(?collectionBord $collection): static
    {
        $this->collection = $collection;

        return $this;
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

    /**
     * @return Collection<int, classe>
     */
    public function getClasse(): Collection
    {
        return $this->classe;
    }

    public function addClasse(classe $classe): static
    {
        if (!$this->classe->contains($classe)) {
            $this->classe->add($classe);
        }

        return $this;
    }

    public function removeClasse(classe $classe): static
    {
        $this->classe->removeElement($classe);

        return $this;
    }

    /**
     * @return Collection<int, matiere>
     */
    public function getMatiere(): Collection
    {
        return $this->matiere;
    }

    public function addMatiere(matiere $matiere): static
    {
        if (!$this->matiere->contains($matiere)) {
            $this->matiere->add($matiere);
        }

        return $this;
    }

    public function removeMatiere(matiere $matiere): static
    {
        $this->matiere->removeElement($matiere);

        return $this;
    }

    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): static
    {
        if (!$this->cours->contains($cour)) {
            $this->cours->add($cour);
            $cour->setBord($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): static
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getBord() === $this) {
                $cour->setBord(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Epreuve>
     */
    public function getEpreuves(): Collection
    {
        return $this->epreuves;
    }

    public function addEpreufe(Epreuve $epreufe): static
    {
        if (!$this->epreuves->contains($epreufe)) {
            $this->epreuves->add($epreufe);
            $epreufe->setBord($this);
        }

        return $this;
    }

    public function removeEpreufe(Epreuve $epreufe): static
    {
        if ($this->epreuves->removeElement($epreufe)) {
            // set the owning side to null (unless already changed)
            if ($epreufe->getBord() === $this) {
                $epreufe->setBord(null);
            }
        }

        return $this;
    }
}
