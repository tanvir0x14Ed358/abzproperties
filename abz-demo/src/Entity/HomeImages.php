<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HomeImagesRepository")
 */
class HomeImages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotBlank(message="Please, upload image file for home page slider.")
     * @Assert\File(mimeTypes={ "image/*" })
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PropertyDetails", inversedBy="homeImages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $property;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getProperty(): ?PropertyDetails
    {
        return $this->property;
    }

    public function setProperty(?PropertyDetails $property): self
    {
        $this->property = $property;

        return $this;
    }

   
}
