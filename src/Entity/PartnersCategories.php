<?php

namespace App\Entity;

use App\Repository\PartnersCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartnersCategoriesRepository::class)]
class PartnersCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $category = null;

    #[ORM\ManyToMany(targetEntity: Partners::class, mappedBy: 'categories')]
    private Collection $partners;

    public function __construct()
    {
        $this->partners = new ArrayCollection();
    }
    public function __toString() {
        return $this->category;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Partners>
     */
    public function getPartners(): Collection
    {
        return $this->partners;
    }

    public function addPartner(Partners $partner): static
    {
        if (!$this->partners->contains($partner)) {
            $this->partners->add($partner);
            $partner->addCategory($this);
        }

        return $this;
    }

    public function removePartner(Partners $partner): static
    {
        if ($this->partners->removeElement($partner)) {
            $partner->removeCategory($this);
        }

        return $this;
    }
}
