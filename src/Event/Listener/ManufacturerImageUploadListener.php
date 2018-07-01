<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Event\Listener;

use BeHappy\SyliusManufacturerPlugin\Entity\ManufacturerInterface;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Webmozart\Assert\Assert;

/**
 * Class ManufacturerImageUploadListener
 *
 * @package BeHappy\SyliusManufacturerPlugin\Event\Listener
 */
final class ManufacturerImageUploadListener
{
    /**
     * @var ImageUploaderInterface
     */
    private $uploader;
    
    /**
     * ManufacturerImageUploadListener constructor.
     *
     * @param ImageUploaderInterface $uploader
     */
    public function __construct(ImageUploaderInterface $uploader)
    {
        $this->uploader = $uploader;
    }
    
    /**
     * @param ResourceControllerEvent $event
     */
    public function uploadImages(ResourceControllerEvent $event): void
    {
        $manufacturer = $event->getSubject();
        
        Assert::isInstanceOf($manufacturer, ManufacturerInterface::class);
        
        foreach ($manufacturer->getImages() as $image) {
            $this->uploader->upload($image);
        }
    }
}