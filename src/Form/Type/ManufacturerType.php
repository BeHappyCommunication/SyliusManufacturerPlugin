<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Class ManufacturerType
 *
 * @package BeHappy\SyliusManufacturerPlugin\Form\Type
 */
final class ManufacturerType extends AbstractResourceType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event){
            $form = $event->getForm();
            $data = $event->getData();
            
            $disabled = false;
            if ($data->getId()) {
                $disabled = true;
            }
            $form->add('code', TextType::class, [
                'label' => 'behappy_manufacturer.form.code',
                'disabled' => $disabled,
                'required' => true,
            ]);
        });
        $builder
            ->add('enabled', CheckboxType::class, [
                'label' => 'behappy_manufacturer.form.enabled',
                'required' => false,
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => ManufacturerTranslationType::class
            ])
            ->add('images', CollectionType::class, [
                'entry_type' => ManufacturerImageType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'behappy_manufacturer.form.manufacturer.images',
            ])
        ;
    }
    
    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'behappy_manufacturer';
    }
}