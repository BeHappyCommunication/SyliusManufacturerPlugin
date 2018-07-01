<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Form\Extension;

use BeHappy\SyliusManufacturerPlugin\Entity\Manufacturer;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('manufacturer', EntityType::class, [
            'label' => 'behappy_manufacturer.form.product_manufacturer',
            'class' => Manufacturer::class,
            'required' => false,
        ]);
    }
    
    public function getExtendedType(): string
    {
        return ProductType::class;
    }
}