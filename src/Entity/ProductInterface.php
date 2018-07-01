<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Entity;

use Sylius\Component\Core\Model\ProductInterface as BaseProductInterface;

/**
 * Interface ProductVariantInterface
 *
 * @package BeHappy\SyliusManufacturerPlugin\Entity
 */
interface ProductInterface extends BaseProductInterface
{
    /**
     * @return ManufacturerInterface|null
     */
    public function getManufacturer(): ?ManufacturerInterface;
    
    /**
     * @param ManufacturerInterface|null $manufacturer
     */
    public function setManufacturer(?ManufacturerInterface $manufacturer): void;
}