<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $placeOfPurchase;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productReference;

    /**
     * @ORM\Column(type="datetime")
     */
    private $timeOfPurchase;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endOfGaranteeDate;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $maintenanceAdvice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $purchaseTicketImage;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPlaceOfPurchase(): ?string
    {
        return $this->placeOfPurchase;
    }

    public function setPlaceOfPurchase(string $placeOfPurchase): self
    {
        $this->placeOfPurchase = $placeOfPurchase;

        return $this;
    }

    public function getProductReference(): ?string
    {
        return $this->productReference;
    }

    public function setProductReference(string $productReference): self
    {
        $this->productReference = $productReference;

        return $this;
    }

    public function getTimeOfPurchase(): ?\DateTimeInterface
    {
        return $this->timeOfPurchase;
    }

    public function setTimeOfPurchase(\DateTimeInterface $timeOfPurchase): self
    {
        $this->timeOfPurchase = $timeOfPurchase;

        return $this;
    }

    public function getEndOfGaranteeDate(): ?\DateTimeInterface
    {
        return $this->endOfGaranteeDate;
    }

    public function setEndOfGaranteeDate(\DateTimeInterface $endOfGaranteeDate): self
    {
        $this->endOfGaranteeDate = $endOfGaranteeDate;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getMaintenanceAdvice(): ?string
    {
        return $this->maintenanceAdvice;
    }

    public function setMaintenanceAdvice(string $maintenanceAdvice): self
    {
        $this->maintenanceAdvice = $maintenanceAdvice;

        return $this;
    }

    public function getPurchaseTicketImage(): ?string
    {
        return $this->purchaseTicketImage;
    }

    public function setPurchaseTicketImage(string $purchaseTicketImage): self
    {
        $this->purchaseTicketImage = $purchaseTicketImage;

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
}
