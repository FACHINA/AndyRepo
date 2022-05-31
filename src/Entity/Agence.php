<?php

namespace App\Entity;

use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: AgenceRepository::class)]
class Agence implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $NomAgence;

    #[ORM\Column(type: 'string', length: 30)]
    private $TelAgence;

    #[ORM\Column(type: 'string', length: 255)]
    private $NumRegistreCom;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'text', length: 255)]
    private $LocationDesc;

    #[ORM\Column(type: 'string', length: 255)]
    private $Longitude;

    #[ORM\Column(type: 'string', length: 255)]
    private $Latitude;

    #[ORM\OneToMany(mappedBy: 'Agence', targetEntity: Offres::class)]
    private $OffresOfAgence;

    #[ORM\Column(type: 'boolean')]
    private $IsVerified;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug;

    public function __construct()
    {
        $this->OffresOfAgence = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
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

    public function getFullName(): ?string
    {
        return $this->getNomAgence();
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        $roles[] = 'ROLE_AGENCE';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
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

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNomAgence(): ?string
    {
        return $this->NomAgence;
    }

    public function setNomAgence(string $NomAgence): self
    {
        $this->NomAgence = $NomAgence;

        return $this;
    }


    public function getTelAgence(): ?string
    {
        return $this->TelAgence;
    }

    public function setTelAgence(string $TelAgence): self
    {
        $this->TelAgence = $TelAgence;

        return $this;
    }

    public function getNumRegistreCom(): ?string
    {
        return $this->NumRegistreCom;
    }

    public function setNumRegistreCom(string $NumRegistreCom): self
    {
        $this->NumRegistreCom = $NumRegistreCom;

        return $this;
    }

    public function getLocationDesc(): ?string
    {
        return $this->LocationDesc;
    }

    public function setLocationDesc(?string $LocationDesc): self
    {
        $this->LocationDesc = $LocationDesc;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->Longitude;
    }

    public function setLongitude(?string $Longitude): self
    {
        $this->Longitude = $Longitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->Latitude;
    }

    public function setLatitude(string $Latitude): self
    {
        $this->Latitude = $Latitude;

        return $this;
    }

    /**
     * @return Collection<int, Offres>
     */
    public function getOffresOfAgence(): Collection
    {
        return $this->OffresOfAgence;
    }

    public function addOffresOfAgence(Offres $offresOfAgence): self
    {
        if (!$this->OffresOfAgence->contains($offresOfAgence)) {
            $this->OffresOfAgence[] = $offresOfAgence;
            $offresOfAgence->setAgence($this);
        }

        return $this;
    }

    public function removeOffresOfAgence(Offres $offresOfAgence): self
    {
        if ($this->OffresOfAgence->removeElement($offresOfAgence)) {
            // set the owning side to null (unless already changed)
            if ($offresOfAgence->getAgence() === $this) {
                $offresOfAgence->setAgence(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getNomAgence();
    }

    public function isIsVerified(): ?bool
    {
        return $this->IsVerified;
    }

    public function setIsVerified(bool $IsVerified): self
    {
        $this->IsVerified = $IsVerified;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
