<?php

namespace App\Entity;

use App\Repository\OngletsOrganigrammeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OngletsOrganigrammeRepository::class)]
class OngletsOrganigramme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $onglet1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $texte_onglet1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $onglet2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $texte_onglet2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $onglet3 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $texte_onglet3 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOnglet1(): ?string
    {
        return $this->onglet1;
    }

    public function setOnglet1(?string $onglet1): static
    {
        $this->onglet1 = $onglet1;

        return $this;
    }

    public function getTexteOnglet1(): ?string
    {
        return $this->texte_onglet1;
    }

    public function setTexteOnglet1(?string $texte_onglet1): static
    {
        $this->texte_onglet1 = $texte_onglet1;

        return $this;
    }

    public function getOnglet2(): ?string
    {
        return $this->onglet2;
    }

    public function setOnglet2(?string $onglet2): static
    {
        $this->onglet2 = $onglet2;

        return $this;
    }

    public function getTexteOnglet2(): ?string
    {
        return $this->texte_onglet2;
    }

    public function setTexteOnglet2(?string $texte_onglet2): static
    {
        $this->texte_onglet2 = $texte_onglet2;

        return $this;
    }

    public function getOnglet3(): ?string
    {
        return $this->onglet3;
    }

    public function setOnglet3(?string $onglet3): static
    {
        $this->onglet3 = $onglet3;

        return $this;
    }

    public function getTexteOnglet3(): ?string
    {
        return $this->texte_onglet3;
    }

    public function setTexteOnglet3(?string $texte_onglet3): static
    {
        $this->texte_onglet3 = $texte_onglet3;

        return $this;
    }
}
