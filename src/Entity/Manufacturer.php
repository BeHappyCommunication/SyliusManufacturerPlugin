<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Resource\Model\ArchivableTrait;
use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\Resource\Model\ToggleableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * Class Manufacturer
 *
 * @package BeHappy\SyliusManufacturerPlugin\Model
 */
class Manufacturer implements ManufacturerInterface
{
    use ArchivableTrait, TimestampableTrait, ToggleableTrait;
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
        getTranslation as private doGetTranslation;
    }
    
    /** @var int */
    protected $id;
    /** @var string */
    protected $code;
    /** @var Collection|ProductInterface[] */
    protected $products;
    /** @var Collection|ImageInterface[] */
    protected $images;
    
    /**
     * Manufacturer constructor.
     */
    public function __construct()
    {
        $this->initializeTranslationsCollection();
        
        $this->createdAt = new \DateTime();
        $this->products = new ArrayCollection();
        $this->images = new ArrayCollection();
    }
    
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
    
    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    
    /**
     * @param string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName(): ?string
    {
        return $this->getTranslation()->getName();
    }
    
    /**
     * {@inheritdoc}
     */
    public function setName(?string $name): void
    {
        $this->getTranslation()->setName($name);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getDescription(): ?string
    {
        return $this->getTranslation()->getDescription();
    }
    
    /**
     * {@inheritdoc}
     */
    public function setDescription(?string $description): void
    {
        $this->getTranslation()->setDescription($description);
    }
    
    /**
     * @param string|null $locale
     *
     * @return ManufacturerTranslationInterface
     */
    public function getTranslation(?string $locale = null): TranslationInterface
    {
        /** @var ManufacturerTranslationInterface $translation */
        $translation = $this->doGetTranslation($locale);
        
        return $translation;
    }
    
    /**
     * {@inheritdoc}
     */
    protected function createTranslation(): ManufacturerTranslationInterface
    {
        return new ManufacturerTranslation();
    }
    
    /**
     * @return ProductInterface[]|Collection
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }
    
    /**
     * @param ProductInterface $product
     *
     * @return bool
     */
    public function addProduct(ProductInterface $product): bool
    {
        if (!$this->getProducts()->contains($product)) {
            $this->products->add($product);
        }
        
        return true;
    }
    
    /**
     * @param ProductInterface $product
     *
     * @return bool
     */
    public function removeProduct(ProductInterface $product): bool
    {
        return $this->products->removeElement($product);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getImages(): Collection
    {
        return $this->images;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getImagesByType(string $type): Collection
    {
        return $this->images->filter(function (ImageInterface $image) use ($type): bool {
            return $type === $image->getType();
        });
    }
    
    /**
     * {@inheritdoc}
     */
    public function hasImages(): bool
    {
        return !$this->images->isEmpty();
    }
    
    /**
     * {@inheritdoc}
     */
    public function hasImage(ImageInterface $image): bool
    {
        return $this->images->contains($image);
    }
    
    /**
     * {@inheritdoc}
     */
    public function addImage(ImageInterface $image): void
    {
        $image->setOwner($this);
        $this->images->add($image);
    }
    
    /**
     * {@inheritdoc}
     */
    public function removeImage(ImageInterface $image): void
    {
        if ($this->hasImage($image)) {
            $image->setOwner(null);
            $this->images->removeElement($image);
        }
    }
}