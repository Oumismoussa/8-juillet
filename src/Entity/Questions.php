<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionsRepository::class)]
class Questions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $question = null;

    #[ORM\Column(length: 255)]
    private ?string $id_quizz = null;

    #[ORM\OneToMany(mappedBy: 'questions', targetEntity: answers::class)]
    private Collection $parent;

    #[ORM\ManyToMany(targetEntity: Quizz::class, mappedBy: 'parent')]
    private Collection $quizzs;

    public function __construct()
    {
        $this->parent = new ArrayCollection();
        $this->quizzs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): static
    {
        $this->question = $question;

        return $this;
    }

    public function getIdQuizz(): ?string
    {
        return $this->id_quizz;
    }

    public function setIdQuizz(string $id_quizz): static
    {
        $this->id_quizz = $id_quizz;

        return $this;
    }

    /**
     * @return Collection<int, answers>
     */
    public function getParent(): Collection
    {
        return $this->parent;
    }

    public function addParent(answers $parent): static
    {
        if (!$this->parent->contains($parent)) {
            $this->parent->add($parent);
            $parent->setQuestions($this);
        }

        return $this;
    }

    public function removeParent(answers $parent): static
    {
        if ($this->parent->removeElement($parent)) {
            // set the owning side to null (unless already changed)
            if ($parent->getQuestions() === $this) {
                $parent->setQuestions(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Quizz>
     */
    public function getQuizzs(): Collection
    {
        return $this->quizzs;
    }

    public function addQuizz(Quizz $quizz): static
    {
        if (!$this->quizzs->contains($quizz)) {
            $this->quizzs->add($quizz);
            $quizz->addParent($this);
        }

        return $this;
    }

    public function removeQuizz(Quizz $quizz): static
    {
        if ($this->quizzs->removeElement($quizz)) {
            $quizz->removeParent($this);
        }

        return $this;
    }
}
