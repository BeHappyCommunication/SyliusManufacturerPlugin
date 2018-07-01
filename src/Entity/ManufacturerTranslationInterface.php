<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * Interface ManufacturerTranslationInterface
 *
 * @package BeHappy\SyliusManufacturerPlugin\Model
 */
interface ManufacturerTranslationInterface extends ResourceInterface, TranslationInterface
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
}