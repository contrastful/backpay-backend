<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlaceRepository::class)
 */
class Place
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $about;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=8)
     */
    private $latitude;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=8)
     */
    private $longitude;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="places")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $approvedAt;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instagramLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebookLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $googleMapsLink;

    /**
     * @ORM\ManyToMany(targetEntity=Perk::class, inversedBy="places")
     */
    private $perks;

    /**
     * @ORM\ManyToOne(targetEntity=Area::class, inversedBy="places")
     */
    private $area;

    /**
     * @ORM\ManyToMany(targetEntity=Image::class)
     */
    private $images;

    /**
     * @ORM\ManyToOne(targetEntity=Image::class)
     */
    private $coverImage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $suggestionAddress;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $suggestionPerks;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $suggestionName;

    /**
     * @ORM\Column(type="integer")
     */
    private $priority;

    public function __construct()
    {
        $this->perks = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->priority = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(?string $about): self
    {
        $this->about = $about;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getApprovedAt(): ?\DateTimeInterface
    {
        return $this->approvedAt;
    }

    public function setApprovedAt(?\DateTimeInterface $approvedAt): self
    {
        $this->approvedAt = $approvedAt;

        return $this;
    }

    public function getInstagramLink(): ?string
    {
        return $this->instagramLink;
    }

    public function setInstagramLink(?string $instagramLink): self
    {
        $this->instagramLink = $instagramLink;

        return $this;
    }

    public function getFacebookLink(): ?string
    {
        return $this->facebookLink;
    }

    public function setFacebookLink(?string $facebookLink): self
    {
        $this->facebookLink = $facebookLink;

        return $this;
    }

    public function getGoogleMapsLink(): ?string
    {
        return $this->googleMapsLink;
    }

    public function setGoogleMapsLink(?string $googleMapsLink): self
    {
        $this->googleMapsLink = $googleMapsLink;

        return $this;
    }

    /**
     * @return Collection|Perk[]
     */
    public function getPerks(): Collection
    {
        return $this->perks;
    }

    public function addPerk(Perk $perk): self
    {
        if (!$this->perks->contains($perk)) {
            $this->perks[] = $perk;
        }

        return $this;
    }

    public function removePerk(Perk $perk): self
    {
        if ($this->perks->contains($perk)) {
            $this->perks->removeElement($perk);
        }

        return $this;
    }

    public function getArea(): ?Area
    {
        return $this->area;
    }

    public function setArea(?Area $area): self
    {
        $this->area = $area;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
        }

        return $this;
    }

    public function getCoverImage(): ?Image
    {
        return $this->coverImage;
    }

    public function setCoverImage(?Image $coverImage): self
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    public function getSuggestionAddress(): ?string
    {
        return $this->suggestionAddress;
    }

    public function setSuggestionAddress(?string $suggestionAddress): self
    {
        $this->suggestionAddress = $suggestionAddress;

        return $this;
    }

    public function getSuggestionPerks(): ?string
    {
        return $this->suggestionPerks;
    }

    public function setSuggestionPerks(?string $suggestionPerks): self
    {
        $this->suggestionPerks = $suggestionPerks;

        return $this;
    }

    public function getSuggestionName(): ?string
    {
        return $this->suggestionName;
    }

    public function setSuggestionName(?string $suggestionName): self
    {
        $this->suggestionName = $suggestionName;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }
}
