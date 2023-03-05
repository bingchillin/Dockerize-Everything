<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\ValidatorConstraints as Assert;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 13)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 1, max: 13)]
    private ?string $isbn = null;

    #[ORM\Column(length: 200)]
    #[Assert\NotBlank()]
    #[Assert\Length(max: 200)]
    private ?string $title = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank()]
    #[Assert\Length(max: 150)]
    private ?string $author = null;

    #[ORM\Column(length: 1500, nullable: true)]
    #[Assert\Length(max: 1500)]
    private ?string $overview = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $picture = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Length(min: 1)]
    private ?int $browse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getOverview(): ?string
    {
        return $this->overview;
    }

    public function setOverview(?string $overview): self
    {
        $this->overview = $overview;

        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getBrowse(): ?int
    {
        return $this->browse;
    }

    public function setBrowse(?int $browse): self
    {
        $this->browse = $browse;

        return $this;
    }
}
