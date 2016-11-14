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
        $menu->addChild('Accueil', array('route' => 'bird'));
        $menu->addChild('Inscription', array('route' => 'fos_user_registration_register'));


        if ($this->checker->isGranted('ROLE_ADMIN')) {
            $menu->removeChild('Inscription');
            $menu->addChild('Nouvelle observation', array('route' => 'add_observation'));
            $menu->addChild('Dernières observations', array('route' => 'last_observations'));
            $menu->addChild('Administration', array('route' => 'nao_user'));
            $menu->addChild('Profil', array('route' => 'fos_user_profile_show'));
            $menu->addChild('Gestion des profils', array('route' => 'fos_user_profile_edit'));
            $menu->addChild('Deconnection', array('route' => 'fos_user_security_logout'));
        }

        if ($this->checker->isGranted('ROLE_SUPER_USER')) {
            $menu->removeChild('Inscription');
            $menu->addChild('Nouvelle observation', array('route' => 'add_observation'));
            $menu->addChild('Dernières observations', array('route' => 'last_observations'));
            $menu->addChild('Profil', array('route' => 'fos_user_profile_show'));
            $menu->addChild('Deconnection', array('route' => 'fos_user_security_logout'));
        }

        if ($this->checker->isGranted('ROLE_USER')) {
            $menu->removeChild('Inscription');
            $menu->addChild('Nouvelle observation', array('route' => 'add_observation'));
            $menu->addChild('Profil', array('route' => 'fos_user_profile_show'));
            $menu->addChild('Deconnection', array('route' => 'fos_user_security_logout'));
        }

        return $menu;
    }

}