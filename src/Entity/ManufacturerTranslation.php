<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Entity;

use Sylius\Component\Resource\Model\AbstractTranslation;

/**
 * Class ManufacturerTranslation
 *
 * @package BeHappy\SyliusManufacturerPlugin\Model
 */
class ManufacturerTranslation extends AbstractTranslation implements ManufacturerTranslationInterface
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /** @var string */
    protected $description;
    
    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->getName();
    }
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    /**
     * @param string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
    
    
}