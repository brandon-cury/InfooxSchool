<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?role $role = null;

    #[ORM\Column(length: 255)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $email_verified_at = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $tel = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $code_tel = null;

    #[ORM\ManyToOne]
    private ?user $user_affiliate = null;

    #[ORM\Column]
    private ?int $number_affiliated = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    /**
     * @var Collection<int, Bord>
     */
    #[ORM\OneToMany(targetEntity: Bord::class, mappedBy: 'editor')]
    private Collection $myBooksPublished;

    /**
     * @var Collection<int, CollectionBord>
     */
    #[ORM\OneToMany(targetEntity: CollectionBord::class, mappedBy: 'editor')]
    private Collection $collectionBords;

    /**
     * @var Collection<int, Epreuve>
     */
    #[ORM\OneToMany(targetEntity: Epreuve::class, mappedBy: 'editor')]
    private Collection $myEpreuvesPublished;

    public function __construct()
    {
        $this->myBooksPublished = new ArrayCollection();
        $this->collectionBords = new ArrayCollection();
        $this->myEpreuvesPublished = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?role
    {
        return $this->role;
    }

    public function setRole(?role $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): static
    {
        $this->last_name = $last_name;

        return $this;
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

    public function getEmailVerifiedAt(): ?\DateTimeImmutable
    {
        return $this->email_verified_at;
    }

    public function setEmailVerifiedAt(?\DateTimeImmutable $email_verified_at): static
    {
        $this->email_verified_at = $email_verified_at;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getCodeTel(): ?string
    {
        return $this->code_tel;
    }

    public function setCodeTel(?string $code_tel): static
    {
        $this->code_tel = $code_tel;

        return $this;
    }

    public function getUserAffiliate(): ?user
    {
        return $this->user_affiliate;
    }

    public function setUserAffiliate(?user $user_affiliate): static
    {
        $this->user_affiliate = $user_affiliate;

        return $this;
    }

    public function getNumberAffiliated(): ?int
    {
        return $this->number_affiliated;
    }

    public function setNumberAffiliated(int $number_affiliated): static
    {
        $this->number_affiliated = $number_affiliated;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

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
     * @return Collection<int, Bord>
     */
    public function getMyBooksPublished(): Collection
    {
        return $this->myBooksPublished;
    }

    public function addMyBooksPublished(Bord $myBooksPublished): static
    {
        if (!$this->myBooksPublished->contains($myBooksPublished)) {
            $this->myBooksPublished->add($myBooksPublished);
            $myBooksPublished->setEditor($this);
        }

        return $this;
    }

    public function removeMyBooksPublished(Bord $myBooksPublished): static
    {
        if ($this->myBooksPublished->removeElement($myBooksPublished)) {
            // set the owning side to null (unless already changed)
            if ($myBooksPublished->getEditor() === $this) {
                $myBooksPublished->setEditor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CollectionBord>
     */
    public function getCollectionBords(): Collection
    {
        return $this->collectionBords;
    }

    public function addCollectionBord(CollectionBord $collectionBord): static
    {
        if (!$this->collectionBords->contains($collectionBord)) {
            $this->collectionBords->add($collectionBord);
            $collectionBord->setEditor($this);
        }

        return $this;
    }

    public function removeCollectionBord(CollectionBord $collectionBord): static
    {
        if ($this->collectionBords->removeElement($collectionBord)) {
            // set the owning side to null (unless already changed)
            if ($collectionBord->getEditor() === $this) {
                $collectionBord->setEditor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Epreuve>
     */
    public function getMyEpreuvesPublished(): Collection
    {
        return $this->myEpreuvesPublished;
    }

    public function addMyEpreuvesPublished(Epreuve $myEpreuvesPublished): static
    {
        if (!$this->myEpreuvesPublished->contains($myEpreuvesPublished)) {
            $this->myEpreuvesPublished->add($myEpreuvesPublished);
            $myEpreuvesPublished->setEditor($this);
        }

        return $this;
    }

    public function removeMyEpreuvesPublished(Epreuve $myEpreuvesPublished): static
    {
        if ($this->myEpreuvesPublished->removeElement($myEpreuvesPublished)) {
            // set the owning side to null (unless already changed)
            if ($myEpreuvesPublished->getEditor() === $this) {
                $myEpreuvesPublished->setEditor(null);
            }
        }

        return $this;
    }
}
