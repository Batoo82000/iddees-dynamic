<?php

namespace App\Entity;

use App\Repository\HorairesApportsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesApportsRepository::class)]
class HorairesApports
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $lundi = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $mardi = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $mercredi = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $jeudi = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $vendredi = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $samedi = null;

    #[ORM\OneToOne(inversedBy: 'horairesApports', cascade: ['persist', 'remove'])]
    private ?SitesIddees $sitesIddees = null;

    public function __toString() {
        return $this->nom;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLundi(): ?string
    {
        return $this->lundi;
    }

    public function setLundi(?string $lundi): static
    {
        $this->lundi = $lundi;

        return $this;
    }

    public function getMardi(): ?string
    {
        return $this->mardi;
    }

    public function setMardi(?string $mardi): static
    {
        $this->mardi = $mardi;

        return $this;
    }

    public function getMercredi(): ?string
    {
        return $this->mercredi;
    }

    public function setMercredi(?string $mercredi): static
    {
        $this->mercredi = $mercredi;

        return $this;
    }

    public function getJeudi(): ?string
    {
        return $this->jeudi;
    }

    public function setJeudi(?string $jeudi): static
    {
        $this->jeudi = $jeudi;

        return $this;
    }

    public function getVendredi(): ?string
    {
        return $this->vendredi;
    }

    public function setVendredi(?string $vendredi): static
    {
        $this->vendredi = $vendredi;

        return $this;
    }

    public function getSamedi(): ?string
    {
        return $this->samedi;
    }

    public function setSamedi(?string $samedi): static
    {
        $this->samedi = $samedi;

        return $this;
    }

    public function getSitesIddees(): ?SitesIddees
    {
        return $this->sitesIddees;
    }

    public function setSitesIddees(?SitesIddees $sitesIddees): static
    {
        $this->sitesIddees = $sitesIddees;

        return $this;
    }
}
