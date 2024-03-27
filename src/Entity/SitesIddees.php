<?php

namespace App\Entity;

use App\Repository\SitesIddeesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SitesIddeesRepository::class)]
class SitesIddees
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $carte = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mentionSpeciale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(nullable: true)]
    private ?int $codePostal = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(nullable: true)]
    private ?int $telephone = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\OneToOne(mappedBy: 'sitesIddees', cascade: ['persist'])]
    private ?HorairesMagasin $horairesMagasin = null;

    #[ORM\OneToOne(mappedBy: 'sitesIddees', cascade: ['persist'])]
    private ?HorairesApports $horairesApports = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

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

    public function getCarte(): ?string
    {
        return $this->carte;
    }

    public function setCarte(string $carte): static
    {
        $this->carte = $carte;

        return $this;
    }

    public function getMentionSpeciale(): ?string
    {
        return $this->mentionSpeciale;
    }

    public function setMentionSpeciale(?string $mentionSpeciale): static
    {
        $this->mentionSpeciale = $mentionSpeciale;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(?int $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
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

    public function getHorairesMagasin(): ?HorairesMagasin
    {
        return $this->horairesMagasin;
    }

    public function setHorairesMagasin(?HorairesMagasin $horairesMagasin): static
    {
        // unset the owning side of the relation if necessary
        if ($horairesMagasin === null && $this->horairesMagasin !== null) {
            $this->horairesMagasin->setSitesIddees(null);
        }

        // set the owning side of the relation if necessary
        if ($horairesMagasin !== null && $horairesMagasin->getSitesIddees() !== $this) {
            $horairesMagasin->setSitesIddees($this);
        }

        $this->horairesMagasin = $horairesMagasin;

        return $this;
    }

    public function getHorairesApports(): ?HorairesApports
    {
        return $this->horairesApports;
    }

    public function setHorairesApports(?HorairesApports $horairesApports): static
    {
        // unset the owning side of the relation if necessary
        if ($horairesApports === null && $this->horairesApports !== null) {
            $this->horairesApports->setSitesIddees(null);
        }

        // set the owning side of the relation if necessary
        if ($horairesApports !== null && $horairesApports->getSitesIddees() !== $this) {
            $horairesApports->setSitesIddees($this);
        }

        $this->horairesApports = $horairesApports;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
