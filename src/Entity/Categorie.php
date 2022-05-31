<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $NomCat;

    #[ORM\OneToMany(mappedBy: 'categoriestooffres', targetEntity: Offres::class)]
    private $Offres;

    public function __construct()
    {
        $this->Offres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCat(): ?string
    {
        return $this->NomCat;
    }

    public function setNomCat(string $NomCat): self
    {
        $this->NomCat = $NomCat;

        return $this;
    }

    /**
     * @return Collection<int, Offres>
     */
    public function getOffres(): Collection
    {
        return $this->Offres;
    }

    public function addOffre(Offres $offre): self
    {
        if (!$this->Offres->contains($offre)) {
            $this->Offres[] = $offre;
            $offre->setCategoriestooffres($this);
        }

        return $this;
    }

    public function removeOffre(Offres $offre): self
    {
        if ($this->Offres->removeElement($offre)) {
            // set the owning side to null (unless already changed)
            if ($offre->getCategoriestooffres() === $this) {
                $offre->setCategoriestooffres(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getNomCat();
    }
}
