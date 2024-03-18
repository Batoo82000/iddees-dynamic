<?php

namespace App\Entity;

use App\Repository\OrganigrammeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrganigrammeRepository::class)]
class Organigramme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\ManyToOne(inversedBy: 'employes')]
    private ?RoleOrganigramme $roleOrganigramme = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\ManyToOne(inversedBy: 'organigramme')]
    private ?LocalisationSites $localisationSites = null;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getRoleOrganigramme(): ?RoleOrganigramme
    {
        return $this->roleOrganigramme;
    }

    public function setRoleOrganigramme(?RoleOrganigramme $roleOrganigramme): static
    {
        $this->roleOrganigramme = $roleOrganigramme;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getLocalisationSites(): ?LocalisationSites
    {
        return $this->localisationSites;
    }

    public function setLocalisationSites(?LocalisationSites $localisationSites): static
    {
        $this->localisationSites = $localisationSites;

        return $this;
    }
}
