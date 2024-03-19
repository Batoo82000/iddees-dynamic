<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $jourDebut = null;

    #[ORM\Column(length: 10)]
    private ?string $jourFin = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $heureDebutMatin = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $heureFinMatin = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $heureDebutApresMidi = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $heureFinApresMidi = null;

    #[ORM\OneToMany(targetEntity: SitesIddees::class, mappedBy: 'horaires')]
    private Collection $siteIddees;

    public function __construct()
    {
        $this->siteIddees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJourDebut(): ?string
    {
        return $this->jourDebut;
    }

    public function setJourDebut(string $jourDebut): static
    {
        $this->jourDebut = $jourDebut;

        return $this;
    }

    public function getJourFin(): ?string
    {
        return $this->jourFin;
    }

    public function setJourFin(string $jourFin): static
    {
        $this->jourFin = $jourFin;

        return $this;
    }

    public function getHeureDebutMatin(): ?int
    {
        return $this->heureDebutMatin;
    }

    public function setHeureDebutMatin(int $heureDebutMatin): static
    {
        $this->heureDebutMatin = $heureDebutMatin;

        return $this;
    }

    public function getHeureFinMatin(): ?int
    {
        return $this->heureFinMatin;
    }

    public function setHeureFinMatin(int $heureFinMatin): static
    {
        $this->heureFinMatin = $heureFinMatin;

        return $this;
    }

    public function getHeureDebutApresMidi(): ?int
    {
        return $this->heureDebutApresMidi;
    }

    public function setHeureDebutApresMidi(int $heureDebutApresMidi): static
    {
        $this->heureDebutApresMidi = $heureDebutApresMidi;

        return $this;
    }

    public function getHeureFinApresMidi(): ?int
    {
        return $this->heureFinApresMidi;
    }

    public function setHeureFinApresMidi(int $heureFinApresMidi): static
    {
        $this->heureFinApresMidi = $heureFinApresMidi;

        return $this;
    }

    /**
     * @return Collection<int, SitesIddees>
     */
    public function getSiteIddees(): Collection
    {
        return $this->siteIddees;
    }

    public function addSiteIddee(SitesIddees $siteIddee): static
    {
        if (!$this->siteIddees->contains($siteIddee)) {
            $this->siteIddees->add($siteIddee);
            $siteIddee->setHoraires($this);
        }

        return $this;
    }

    public function removeSiteIddee(SitesIddees $siteIddee): static
    {
        if ($this->siteIddees->removeElement($siteIddee)) {
            // set the owning side to null (unless already changed)
            if ($siteIddee->getHoraires() === $this) {
                $siteIddee->setHoraires(null);
            }
        }

        return $this;
    }
}
