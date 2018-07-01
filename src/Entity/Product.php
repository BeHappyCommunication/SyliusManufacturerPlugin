<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Entity;

use Sylius\Component\Core\Model\Product as BaseProduct;

/**
 * Class ProductVariant
 *
 * @package BeHappy\SyliusManufacturerPlugin\Entity
 */
class Product extends BaseProduct implements ProductInterface
{
    /** @var ManufacturerInterface|null */
    protected $manufacturer;
    
    /**
     * @return ManufacturerInterface|null
     */
    public function getManufacturer(): ?ManufacturerInterface
    {
        return $this->manufacturer;
    }
    
    /**
     * @param ManufacturerInterface|null $manufacturer
     */
    public function setManufacturer(?ManufacturerInterface $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }
}