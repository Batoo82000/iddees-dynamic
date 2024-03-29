<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogRepository::class)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(length: 50)]
    private ?string $auteur = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $texte_blog = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToMany(targetEntity: Sources::class, inversedBy: 'blogs')]
    private Collection $sources;

    #[ORM\ManyToMany(targetEntity: VideosBlogs::class, inversedBy: 'blogs')]
    private Collection $videos;

    #[ORM\ManyToMany(targetEntity: ImagesBlogs::class, inversedBy: 'blogs')]
    private Collection $images;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
        $this->sources = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getTexteblog(): ?string
    {
        return $this->texte_blog;
    }

    public function setTexteblog(string $texte_blog): static
    {
        $this->texte_blog = $texte_blog;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, Sources>
     */
    public function getSources(): Collection
    {
        return $this->sources;
    }

    public function addSource(Sources $source): static
    {
        if (!$this->sources->contains($source)) {
            $this->sources->add($source);
        }

        return $this;
    }

    public function removeSource(Sources $source): static
    {
        $this->sources->removeElement($source);

        return $this;
    }

    /**
     * @return Collection<int, VideosBlogs>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(VideosBlogs $video): static
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
        }

        return $this;
    }

    public function removeVideo(VideosBlogs $video): static
    {
        $this->videos->removeElement($video);

        return $this;
    }

    /**
     * @return Collection<int, ImagesBlogs>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(ImagesBlogs $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
        }

        return $this;
    }

    public function removeImage(ImagesBlogs $image): static
    {
        $this->images->removeElement($image);

        return $this;
    }
}