<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngredientRepository")
 * @Vich\Uploadable()
 */
class Ingredient
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * 
     * @Vich\UploadableField(mapping="ingredient_image", fileNameProperty="filename")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="ingredients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;
 


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }



    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }


    public function setImageFile(File $filename = null)
    {
        $this->imageFile = $filename;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($filename) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }


    public function setFilename(?string $filename): Ingredient
    {
        $this->filename = $filename;
        return $this;
    }
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
    public function __toString()
    {
        return $this->nom;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

  

 


}
