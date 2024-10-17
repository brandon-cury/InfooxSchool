<?php

namespace App\Entity;

use App\Repository\ExerciceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
class Exercice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $editor = null;

    #[ORM\ManyToOne(inversedBy: 'exercices')]
    private ?cour $cour = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $corrected = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $video_link = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $video_img = null;

    #[ORM\Column]
    private ?bool $is_youtube = null;

    #[ORM\Column]
    private ?int $sort = null;

    #[ORM\Column]
    private ?bool $is_container = null;

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

    public function getCour(): ?cour
    {
        return $this->cour;
    }

    public function setCour(?cour $cour): static
    {
        $this->cour = $cour;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getCorrected(): ?string
    {
        return $this->corrected;
    }

    public function setCorrected(?string $corrected): static
    {
        $this->corrected = $corrected;

        return $this;
    }

    public function getVideoLink(): ?string
    {
        return $this->video_link;
    }

    public function setVideoLink(?string $video_link): static
    {
        $this->video_link = $video_link;

        return $this;
    }

    public function getVideoImg(): ?string
    {
        return $this->video_img;
    }

    public function setVideoImg(?string $video_img): static
    {
        $this->video_img = $video_img;

        return $this;
    }

    public function isYoutube(): ?bool
    {
        return $this->is_youtube;
    }

    public function setYoutube(bool $is_youtube): static
    {
        $this->is_youtube = $is_youtube;

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

    public function isContainer(): ?bool
    {
        return $this->is_container;
    }

    public function setContainer(bool $is_container): static
    {
        $this->is_container = $is_container;

        return $this;
    }
}
