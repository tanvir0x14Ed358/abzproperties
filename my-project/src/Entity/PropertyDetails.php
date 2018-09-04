<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PropertyDetailsRepository")
 */
class PropertyDetails
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumb_info;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotBlank(message="Please, upload the property thumbnail image file.")
     * @Assert\File(mimeTypes={ "image/*" })
     */
    private $thumb;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $additional_details;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $area;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bed;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $map;

    /**
     * @ORM\Column(type="boolean", options={"default" : 0})
     */
    private $featured;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HomeImages", mappedBy="property", orphanRemoval=true)
     */
    private $homeImages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PropertyImages", mappedBy="property", orphanRemoval=true)
     */
    private $propertyImages;

    public function __construct()
    {
        $this->homeImages = new ArrayCollection();
        $this->propertyImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThumbInfo(): ?string
    {
        return $this->thumb_info;
    }

    public function setThumbInfo(?string $thumb_info): self
    {
        $this->thumb_info = $thumb_info;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    public function setThumb(string $thumb): self
    {
        $this->thumb = $thumb;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getAdditionalDetails(): ?string
    {
        return $this->additional_details;
    }

    public function setAdditionalDetails(?string $additional_details): self
    {
        $this->additional_details = $additional_details;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(?string $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getBed(): ?string
    {
        return $this->bed;
    }

    public function setBed(?string $bed): self
    {
        $this->bed = $bed;

        return $this;
    }

    public function getBath(): ?string
    {
        return $this->bath;
    }

    public function setBath(?string $bath): self
    {
        $this->bath = $bath;

        return $this;
    }

    public function getMap(): ?string
    {
        return $this->map;
    }

    public function setMap(?string $map): self
    {
        $this->map = $map;

        return $this;
    }

    public function getFeatured(): ?bool
    {
        return $this->featured;
    }

    public function setFeatured(bool $featured): self
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * @return Collection|HomeImages[]
     */
    public function getHomeImages(): Collection
    {
        return $this->homeImages;
    }

    public function addHomeImage(HomeImages $homeImage): self
    {
        if (!$this->homeImages->contains($homeImage)) {
            $this->homeImages[] = $homeImage;
            $homeImage->setProperty($this);
        }

        return $this;
    }

    public function removeHomeImage(HomeImages $homeImage): self
    {
        if ($this->homeImages->contains($homeImage)) {
            $this->homeImages->removeElement($homeImage);
            // set the owning side to null (unless already changed)
            if ($homeImage->getProperty() === $this) {
                $homeImage->setProperty(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PropertyImages[]
     */
    public function getPropertyImages(): Collection
    {
        return $this->propertyImages;
    }

    public function addPropertyImage(PropertyImages $propertyImage): self
    {
        if (!$this->propertyImages->contains($propertyImage)) {
            $this->propertyImages[] = $propertyImage;
            $propertyImage->setProperty($this);
        }

        return $this;
    }

    public function removePropertyImage(PropertyImages $propertyImage): self
    {
        if ($this->propertyImages->contains($propertyImage)) {
            $this->propertyImages->removeElement($propertyImage);
            // set the owning side to null (unless already changed)
            if ($propertyImage->getProperty() === $this) {
                $propertyImage->setProperty(null);
            }
        }

        return $this;
    }
}
