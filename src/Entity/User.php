<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

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

    #[ORM\Column(nullable: true)]
    private ?int $code_tel = null;

    #[ORM\Column]
    private ?int $numb_affiliating = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\OneToOne(inversedBy: 'user', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?role $role = null;

    #[ORM\OneToOne(targetEntity: self::class, mappedBy: 'user_affilliated', cascade: ['persist', 'remove'])]
    private ?self $UserAffilliated = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCodeTel(): ?int
    {
        return $this->code_tel;
    }

    public function setCodeTel(?int $code_tel): static
    {
        $this->code_tel = $code_tel;

        return $this;
    }

    public function getNumbAffiliating(): ?int
    {
        return $this->numb_affiliating;
    }

    public function setNumbAffiliating(int $numb_affiliating): static
    {
        $this->numb_affiliating = $numb_affiliating;

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

    public function getRole(): ?role
    {
        return $this->role;
    }

    public function setRole(role $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getUserAffilliated(): ?self
    {
        return $this->UserAffilliated;
    }

    public function setUserAffilliated(?self $UserAffilliated): static
    {
        // unset the owning side of the relation if necessary
        if (null === $UserAffilliated && null !== $this->UserAffilliated) {
            $this->UserAffilliated->setUserAffilliated(null);
        }

        // set the owning side of the relation if necessary
        if (null !== $UserAffilliated && $UserAffilliated->getUserAffilliated() !== $this) {
            $UserAffilliated->setUserAffilliated($this);
        }

        $this->UserAffilliated = $UserAffilliated;

        return $this;
    }
}
