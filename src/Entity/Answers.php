<?php

namespace App\Entity;

use App\Repository\AnswersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnswersRepository::class)]
class Answers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $answer = null;

    #[ORM\Column]
    private ?bool $is_good_answer = null;

    #[ORM\ManyToOne(inversedBy: 'Selectionne')]
    private ?user $parent = null;

    #[ORM\ManyToOne(inversedBy: 'parent')]
    private ?Questions $questions = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): static
    {
        $this->answer = $answer;

        return $this;
    }

    public function isIsGoodAnswer(): ?bool
    {
        return $this->is_good_answer;
    }

    public function setIsGoodAnswer(bool $is_good_answer): static
    {
        $this->is_good_answer = $is_good_answer;

        return $this;
    }

    public function getParent(): ?user
    {
        return $this->parent;
    }

    public function setParent(?user $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    public function getQuestions(): ?Questions
    {
        return $this->questions;
    }

    public function setQuestions(?Questions $questions): static
    {
        $this->questions = $questions;

        return $this;
    }
}
