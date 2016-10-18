<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 17/10/2016
 * Time: 11:15
 */

namespace BirdBundle\Menu;


use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Espèces observées', array('route' => 'add_observation'));

        // create another menu item
        $menu->addChild('Dernières observations', array('route' => 'add_observation'));
        // you can also add sub level's to your menu's as follows
        $menu->addChild('Se déconnecter', array('route' => 'add_observation'));


        return $menu;
    }
}