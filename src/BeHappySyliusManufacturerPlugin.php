<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class BeHappySyliusManufacturerPlugin
 *
 * @package BeHappy\SyliusManufacturerPlugin
 */
class BeHappySyliusManufacturerPlugin extends Bundle
{
    use SyliusPluginTrait;
}