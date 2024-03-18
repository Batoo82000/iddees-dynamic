<?php

namespace App\Entity;

use App\Repository\RoleOrganigrammeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleOrganigrammeRepository::class)]
class RoleOrganigramme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $role = null;

    #[ORM\OneToMany(targetEntity: Organigramme::class, mappedBy: 'roleOrganigramme')]
    private Collection $employes;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->getRole();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Organigramme>
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Organigramme $employe): static
    {
        if (!$this->employes->contains($employe)) {
            $this->employes->add($employe);
            $employe->setRoleOrganigramme($this);
        }

        return $this;
    }

    public function removeEmploye(Organigramme $employe): static
    {
        if ($this->employes->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getRoleOrganigramme() === $this) {
                $employe->setRoleOrganigramme(null);
            }
        }

        return $this;
    }
}
