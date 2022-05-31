<?php

namespace App\Entity;

use App\Repository\OffresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffresRepository::class)]
class Offres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $NomOffre;

    #[ORM\Column(type: 'float')]
    private $PrixOffres;

    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'Offres')]
    #[ORM\JoinColumn(nullable: false)]
    private $categoriestooffres;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Description;

    #[ORM\ManyToMany(targetEntity: Caracteristiques::class, inversedBy: 'offres')]
    private $caracterisiquesofoffres;

    #[ORM\ManyToOne(targetEntity: Agence::class, inversedBy: 'OffresOfAgence')]
    private $Agence;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug;

    public function __construct()
    {
        $this->caracterisiquesofoffres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOffre(): ?string
    {
        return $this->NomOffre;
    }

    public function setNomOffre(string $NomOffre): self
    {
        $this->NomOffre = $NomOffre;

        return $this;
    }

    public function getPrixOffres(): ?float
    {
        return $this->PrixOffres;
    }

    public function setPrixOffres(float $PrixOffres): self
    {
        $this->PrixOffres = $PrixOffres;

        return $this;
    }

    public function getCategoriestooffres(): ?Categorie
    {
        return $this->categoriestooffres;
    }

    public function setCategoriestooffres(?Categorie $categoriestooffres): self
    {
        $this->categoriestooffres = $categoriestooffres;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, Caracteristiques>
     */
    public function getCaracterisiquesofoffres(): Collection
    {
        return $this->caracterisiquesofoffres;
    }

    public function addCaracterisiquesofoffre(Caracteristiques $caracterisiquesofoffre): self
    {
        if (!$this->caracterisiquesofoffres->contains($caracterisiquesofoffre)) {
            $this->caracterisiquesofoffres[] = $caracterisiquesofoffre;
        }

        return $this;
    }

    public function removeCaracterisiquesofoffre(Caracteristiques $caracterisiquesofoffre): self
    {
        $this->caracterisiquesofoffres->removeElement($caracterisiquesofoffre);

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->Agence;
    }

    public function setAgence(?Agence $Agence): self
    {
        $this->Agence = $Agence;

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
