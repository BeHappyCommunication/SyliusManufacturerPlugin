<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ManufacturerTranslationType
 *
 * @package BeHappy\SyliusManufacturerPlugin\Form\Type
 */
final class ManufacturerTranslationType extends AbstractResourceType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'behappy_manufacturer.form.translatable.name',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'behappy_manufacturer.form.translatable.description',
                'required' => false,
            ]);
    }
    
    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'behappy_manufacturer_translation';
    }
}