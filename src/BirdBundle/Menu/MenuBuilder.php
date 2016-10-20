<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 18/10/2016
 * Time: 20:01
 */

namespace BirdBundle\Menu;


use Knp\Menu\FactoryInterface;


class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Espèces observées', array('route' => 'add_observation'));

        // create another menu item
        $menu->addChild('Dernières observations', array('route' => 'add_observation'));
        // you can also add sub level's to your menu's as follows
        $menu->addChild('Se déconnecter', array('route' => 'add_observation'));


        return $menu;
    }
}