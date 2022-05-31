<?php

namespace App\Entity;

use App\Repository\CaracteristiquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaracteristiquesRepository::class)]
class Caracteristiques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $Description;

    #[ORM\Column(type: 'float')]
    private $TauxReduc;

    #[ORM\ManyToMany(targetEntity: Offres::class, mappedBy: 'caracterisiquesofoffres')]
    private $offres;

    public function __construct()
    {
        $this->offres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getTauxReduc(): ?float
    {
        return $this->TauxReduc;
    }

    public function setTauxReduc(float $TauxReduc): self
    {
        $this->TauxReduc = $TauxReduc;

        return $this;
    }

    /**
     * @return Collection<int, Offres>
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    public function addOffre(Offres $offre): self
    {
        if (!$this->offres->contains($offre)) {
            $this->offres[] = $offre;
            $offre->addCaracterisiquesofoffre($this);
        }

        return $this;
    }

    public function removeOffre(Offres $offre): self
    {
        if ($this->offres->removeElement($offre)) {
            $offre->removeCaracterisiquesofoffre($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getDescription().' :  '.$this->getTauxReduc().'%';
    }
}
