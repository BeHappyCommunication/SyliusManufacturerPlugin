<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Form\Type;

use Sylius\Bundle\CoreBundle\Form\Type\ImageType;

final class ManufacturerImageType extends ImageType
{
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'behappy_manufacturer_image';
    }
}
