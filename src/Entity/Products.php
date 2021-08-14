<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 * @Vich\Uploadable
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
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=255, unique=true)
     */
    private $slug;

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

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;


    /**
     * @Vich\UploadableField(mapping="featured_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @var \DateTime $created_at
     * 
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $created_at;

    /**
     * @var \DateTime $updated_at
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updated_at;


    // public function __construct()
    // {
    //     $this->created_at = new \DateTime();
    //     $this->updated_at = new \DateTime();
    // }

    public function setImageFile(File $image = null)
    {
    $this->imageFile = $image;

    if ($image) {
        $this->updated_at = new \DateTime('now');
    }

    }

    public function getImageFile()
    {

    return $this->imageFile;

    }


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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }


    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }


    public function getSlug(): ?string
    {
        return $this->slug;
    }

}
