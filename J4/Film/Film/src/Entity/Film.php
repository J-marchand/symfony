<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publichDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $img;

    /**
     * @ORM\Column(type="array")
     */
    private $actors = [];

    /**
     * @ORM\Column(type="array")
     */
    private $director = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActors(): ?array
    {
        return $this->actors;
    }

    public function setActors(array $actors): self
    {
        $this->actors = $actors;

        return $this;
    }

    public function getDirector(): ?array
    {
        return $this->director;
    }

    public function setDirector(array $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPublichDate(): ?\DateTimeInterface
    {
        return $this->publichDate;
    }

    public function setPublichDate(\DateTimeInterface $publichDate): self
    {
        $this->publichDate = $publichDate;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }


}
