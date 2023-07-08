<?php

namespace App\Entity;

use App\Repository\QuizzRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizzRepository::class)]
class Quizz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $theme = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\ManyToMany(targetEntity: questions::class, inversedBy: 'quizzs')]
    private Collection $parent;

    public function __construct()
    {
        $this->parent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): static
    {
        $this->theme = $theme;

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

    /**
     * @return Collection<int, questions>
     */
    public function getParent(): Collection
    {
        return $this->parent;
    }

    public function addParent(questions $parent): static
    {
        if (!$this->parent->contains($parent)) {
            $this->parent->add($parent);
        }

        return $this;
    }

    public function removeParent(questions $parent): static
    {
        $this->parent->removeElement($parent);

        return $this;
    }
}
