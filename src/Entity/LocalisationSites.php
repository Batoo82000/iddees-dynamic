<?php

namespace App\Entity;

use App\Repository\LocalisationSitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocalisationSitesRepository::class)]
class LocalisationSites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $site = null;

    #[ORM\OneToMany(targetEntity: Organigramme::class, mappedBy: 'localisationSites')]
    private Collection $organigramme;

    public function __construct()
    {
        $this->organigramme = new ArrayCollection();
    }
    public function __toString(): string
    {
        return $this->site;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(string $site): static
    {
        $this->site = $site;

        return $this;
    }

    /**
     * @return Collection<int, Organigramme>
     */
    public function getOrganigramme(): Collection
    {
        return $this->organigramme;
    }

    public function addOrganigramme(Organigramme $organigramme): static
    {
        if (!$this->organigramme->contains($organigramme)) {
            $this->organigramme->add($organigramme);
            $organigramme->setLocalisationSites($this);
        }

        return $this;
    }

    public function removeOrganigramme(Organigramme $organigramme): static
    {
        if ($this->organigramme->removeElement($organigramme)) {
            // set the owning side to null (unless already changed)
            if ($organigramme->getLocalisationSites() === $this) {
                $organigramme->setLocalisationSites(null);
            }
        }

        return $this;
    }
}
