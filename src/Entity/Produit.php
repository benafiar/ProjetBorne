<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @Vich\Uploadable
 * @ApiResource
 */
class Produit
{
    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->commande = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
    }
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * 
     * @Vich\UploadableField(mapping="produit_image", fileNameProperty="filename")
     * @var File
     */
    private $imageFile;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;



    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;




    /**
     * @ORM\ManyToMany(targetEntity=Commande::class, inversedBy="produits")
     */
    private $commande;

    /**
     * @ORM\Column(type="boolean")
     */
    private $promotion;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, inversedBy="produits")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Ingredient::class, mappedBy="produit")
     */
    private $ingredients;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $nouveau_prix;



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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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

    public function getFilename(): ?string
    {
        return $this->filename;
    }


    public function setFilename(?string $filename): Produit
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommande(): Collection
    {
        return $this->commande;
    }
  



    public function addCommande(Commande $commande): self
    {
        if (!$this->commande->contains($commande)) {
            $this->commande[] = $commande;
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commande->contains($commande)) {
            $this->commande->removeElement($commande);
        }

        return $this;
    }

    public function getPromotion(): ?bool
    {
        return $this->promotion;
    }

    public function setPromotion(bool $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }



    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
            $ingredient->setProduit($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        if ($this->ingredients->contains($ingredient)) {
            $this->ingredients->removeElement($ingredient);
            // set the owning side to null (unless already changed)
            if ($ingredient->getProduit() === $this) {
                $ingredient->setProduit(null);
            }
        }

        return $this;
    }

    public function getNouveauPrix(): ?float
    {
        return $this->nouveau_prix;
    }

    public function setNouveauPrix(?float $nouveau_prix): self
    {
        $this->nouveau_prix = $nouveau_prix;

        return $this;
    }



}