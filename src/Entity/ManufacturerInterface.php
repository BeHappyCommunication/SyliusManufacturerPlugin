<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Entity;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\ImagesAwareInterface;
use Sylius\Component\Resource\Model\ArchivableInterface;
use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\Resource\Model\ToggleableInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * Interface ManufacturerInterface
 *
 * @package BeHappy\SyliusManufacturerPlugin\Model
 */
interface ManufacturerInterface extends
    ResourceInterface,
    ArchivableInterface,
    CodeAwareInterface,
    TimestampableInterface,
    ToggleableInterface,
    TranslatableInterface,
    ImagesAwareInterface
{
    /**
     * @return string|null
     */
    public function getName(): ?string;
    
    /**
     * @param string|null $name
     */
    public function setName(?string $name): void;
    
    /**
     * @return string|null
     */
    public function getDescription(): ?string;
    
    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void;
    
    /**
     * @param string|null $locale
     *
     * @return ManufacturerTranslationInterface
     */
    public function getTranslation(?string $locale = null): TranslationInterface;
    
    /**
     * @return Collection|ProductInterface[]
     */
    public function getProducts(): Collection;
}
