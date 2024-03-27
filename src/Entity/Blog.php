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

    #[ORM\ManyToMany(targetEntity: ImagesBlog::class, mappedBy: 'blog')]
    private Collection $imagesBlogs;

    #[ORM\ManyToMany(targetEntity: VideosBlog::class, mappedBy: 'blog')]
    private Collection $videosBlogs;

    public function __construct()
    {
        $this->imagesBlogs = new ArrayCollection();
        $this->videosBlogs = new ArrayCollection();
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
     * @return Collection<int, ImagesBlog>
     */
    public function getImagesBlogs(): Collection
    {
        return $this->imagesBlogs;
    }

    public function addImagesBlog(ImagesBlog $imagesBlog): static
    {
        if (!$this->imagesBlogs->contains($imagesBlog)) {
            $this->imagesBlogs->add($imagesBlog);
            $imagesBlog->addBlog($this);
        }

        return $this;
    }

    public function removeImagesBlog(ImagesBlog $imagesBlog): static
    {
        if ($this->imagesBlogs->removeElement($imagesBlog)) {
            $imagesBlog->removeBlog($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, VideosBlog>
     */
    public function getVideosBlogs(): Collection
    {
        return $this->videosBlogs;
    }

    public function addVideosBlog(VideosBlog $videosBlog): static
    {
        if (!$this->videosBlogs->contains($videosBlog)) {
            $this->videosBlogs->add($videosBlog);
            $videosBlog->addBlog($this);
        }

        return $this;
    }

    public function removeVideosBlog(VideosBlog $videosBlog): static
    {
        if ($this->videosBlogs->removeElement($videosBlog)) {
            $videosBlog->removeBlog($this);
        }

        return $this;
    }
}
