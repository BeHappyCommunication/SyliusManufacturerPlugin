<?php

declare(strict_types = 1);

namespace BeHappy\SyliusManufacturerPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

/**
 * Class AdminMenuListener
 *
 * @package BeHappy\SyliusManufacturerPlugin\Menu
 */
final class AdminMenuListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addManufacturerMenuItem(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();
        
        $configurationMenu = $menu->getChild('configuration');
        
        $configurationMenu
            ->addChild('behappy_manufacturer', ['route' => 'behappy_manufacturer_admin_manufacturer_index'])
            ->setLabel('behappy_manufacturer.ui.menu.manufacturer')
            ->setLabelAttribute('icon', 'industry')
        ;
    }
}