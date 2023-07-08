<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 100)]
    private ?string $lastname = null;

    #[ORM\Column(length: 100)]
    private ?string $firstname = null;

    #[ORM\Column(length: 100)]
    private ?string $teacher = null;

    #[ORM\Column(length: 100)]
    private ?string $token_mail = null;

    #[ORM\Column(length: 100)]
    private ?string $hashtag = null;

    #[ORM\Column(nullable: true)]
    private ?int $abonnement_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $etablissement_id = null;

    #[ORM\Column (type: 'datetime_immutable', options:['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: Answers::class)]
    private Collection $Selectionne;

    public function __construct()
    {
        $this->Selectionne = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getTeacher(): ?string
    {
        return $this->teacher;
    }

    public function setTeacher(string $teacher): static
    {
        $this->teacher = $teacher;

        return $this;
    }

    public function getTokenMail(): ?string
    {
        return $this->token_mail;
    }

    public function setTokenMail(string $token_mail): static
    {
        $this->token_mail = $token_mail;

        return $this;
    }

    public function getHashtag(): ?string
    {
        return $this->hashtag;
    }

    public function setHashtag(string $hashtag): static
    {
        $this->hashtag = $hashtag;

        return $this;
    }

    public function getAbonnementId(): ?int
    {
        return $this->abonnement_id;
    }

    public function setAbonnementId(?int $abonnement_id): static
    {
        $this->abonnement_id = $abonnement_id;

        return $this;
    }

    public function getEtablissementId(): ?int
    {
        return $this->etablissement_id;
    }

    public function setEtablissementId(?int $etablissement_id): static
    {
        $this->etablissement_id = $etablissement_id;

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

    /**
     * @return Collection<int, Answers>
     */
    public function getSelectionne(): Collection
    {
        return $this->Selectionne;
    }

    public function addSelectionne(Answers $selectionne): static
    {
        if (!$this->Selectionne->contains($selectionne)) {
            $this->Selectionne->add($selectionne);
            $selectionne->setParent($this);
        }

        return $this;
    }

    public function removeSelectionne(Answers $selectionne): static
    {
        if ($this->Selectionne->removeElement($selectionne)) {
            // set the owning side to null (unless already changed)
            if ($selectionne->getParent() === $this) {
                $selectionne->setParent(null);
            }
        }

        return $this;
    }
}
