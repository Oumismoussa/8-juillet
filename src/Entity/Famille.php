<?php

namespace App\Entity;
use App\Repository\FamilleRepository;
use Doctrine\DBAL\Types\Types;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilleRepository::class)]
class Famille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $corrosion = null;

    #[ORM\Column]
    private ?int $id_quizz = null;

    #[ORM\Column(length: 255)]
    private ?string $prevention = null;

    #[ORM\Column(length: 100)]
    private ?string $Fonctionnalités = null;

    #[ORM\Column(length: 255)]
    private ?string $Mors = null;

    #[ORM\Column(type: Types::BLOB)]
    private $image = null;

    #[ORM\Column(length: 100)]
    private ?string $classe = null;


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

    public function getCorrosion(): ?string
    {
        return $this->corrosion;
    }

    public function setCorrosion(string $corrosion): static
    {
        $this->corrosion = $corrosion;

        return $this;
    }

    public function getIdQuizz(): ?int
    {
        return $this->id_quizz;
    }

    public function setIdQuizz(int $id_quizz): static
    {
        $this->id_quizz = $id_quizz;

        return $this;
    }

    public function getPrevention(): ?string
    {
        return $this->prevention;
    }

    public function setPrevention(string $prevention): static
    {
        $this->prevention = $prevention;

        return $this;
    }

    public function getFonctionnalités(): ?string
    {
        return $this->Fonctionnalités;
    }

    public function setFonctionnalités(string $Fonctionnalités): static
    {
        $this->Fonctionnalités = $Fonctionnalités;

        return $this;
    }

    public function getMors(): ?string
    {
        return $this->Mors;
    }

    public function setMors(string $Mors): static
    {
        $this->Mors = $Mors;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): static
    {
        $this->classe = $classe;

        return $this;
    }
}
