<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 18/10/2016
 * Time: 20:01
 */

namespace BirdBundle\Menu;


use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;


class MenuBuilder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory, AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->factory = $factory;
        $this->checker = $authorizationChecker;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav menu');
        $menu->addChild(' Accueil', array('route' => 'bird'))->setLinkAttribute('class', 'fa fa-home');
        $menu->addChild(' Inscription', array('route' => 'fos_user_registration_register'))->setLinkAttribute('class', 'fa fa-eye');


        if ($this->checker->isGranted('ROLE_ADMIN')) {
            $menu->removeChild(' Inscription');
            $menu->addChild(' Observation', array('route' => 'add_observation'))->setLinkAttribute('class', 'fa fa-eye');
            $menu->addChild(' Contributions', array('route' => 'last_observations'))->setLinkAttribute('class', 'fa fa-calendar');
            $menu->addChild(' Administration', array('route' => 'nao_user'))->setLinkAttribute('class', 'fa fa-newspaper-o');
            $menu->addChild(' Profil', array('route' => 'fos_user_profile_show'))->setLinkAttribute('class', 'fa-male ');
        }

        if ($this->checker->isGranted('ROLE_SUPER_USER')) {
            $menu->removeChild(' Inscription');
            $menu->addChild(' Observation', array('route' => 'add_observation'))->setLinkAttribute('class', 'fa fa-eye');
            $menu->addChild(' Contributions', array('route' => 'last_observations'))->setLinkAttribute('class', 'fa fa-calendar');
            $menu->addChild(' Profil', array('route' => 'fos_user_profile_show'))->setLinkAttribute('class', 'fa fa-male');
        }

        if ($this->checker->isGranted('ROLE_USER')) {
            $menu->removeChild(' Inscription');
            $menu->addChild(' Observation', array('route' => 'add_observation'))->setLinkAttribute('class', 'fa fa-eye');
            $menu->addChild(' Profil', array('route' => 'fos_user_profile_show'))->setLinkAttribute('class', 'fa fa-male');
        }

        return $menu;
    }
}