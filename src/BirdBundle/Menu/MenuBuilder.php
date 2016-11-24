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
        $menu->addChild(' <span class="hidden-xs">Accueil</span>', array('route' => 'bird', 'extras' => array('safe_label' => true)))->setLinkAttribute('class', 'fa fa-home')->setLinkAttribute('data-toggle', 'tooltip')->setLinkAttribute('title', 'Accueil');
        $menu->addChild(' <span class="hidden-xs">Inscription</span>', array('route' => 'fos_user_registration_register', 'extras' => array('safe_label' => true)))->setLinkAttribute('class', 'fa fa-user')->setLinkAttribute('data-toggle', 'tooltip')->setLinkAttribute('title', 'Inscription');


        if ($this->checker->isGranted('ROLE_ADMIN')) {
            $menu->removeChild(' <span class="hidden-xs">Inscription</span>');
            $menu->addChild(' <span class="hidden-xs">Observation</span>', array('route' => 'add_observation', 'extras' => array('safe_label' => true)))->setLinkAttribute('class', 'fa fa-eye')->setLinkAttribute('data-toggle', 'tooltip')->setlinkattribute('title', 'Observation');
            $menu->addChild(' <span class="hidden-xs">Contributions</span>', array('route' => 'last_observations', 'extras' => array('safe_label' => true)))->setLinkAttribute('class', 'fa fa-calendar')->setLinkAttribute('data-toggle', 'tooltip')->setLinkAttribute('title', 'Contribution');
            $menu->addChild(' <span class="hidden-xs">Administration</span>', array('route' => 'nao_user', 'extras' => array('safe_label' => true)))->setLinkAttribute('class', 'fa fa-newspaper-o')->setLinkAttribute('data-toggle', 'tooltip')->setLinkAttribute('title', 'Administration');
            $menu->addChild(' <span class="hidden-xs">Profil</span>', array('route' => 'fos_user_profile_show', 'extras' => array('safe_label' => true)))->setLinkAttribute('class', 'fa-male ')->setLinkAttribute('data-toggle', 'tooltip')->setLinkAttribute('title', 'Profil');
        }

        if ($this->checker->isGranted('ROLE_SUPER_USER')) {
            $menu->removeChild(' <span class="hidden-xs">Inscription</span>');
            $menu->addChild(' <span class="hidden-xs">Observation</span>', array('route' => 'add_observation', 'extras' => array('safe_label' => true)))->setLinkAttribute('class', 'fa fa-eye')->setLinkAttribute('data-toggle', 'tooltip')->setLinkAttribute('title', 'Observation');
            $menu->addChild(' <span class="hidden-xs">Contributions</span>', array('route' => 'last_observations', 'extras' => array('safe_label' => true)))->setLinkAttribute('class', 'fa fa-calendar')->setLinkAttribute('data-toggle', 'tooltip')->setLinkAttribute('title', 'Contribution');
            $menu->addChild(' <span class="hidden-xs">Profil</span>', array('route' => 'fos_user_profile_show', 'extras' => array('safe_label' => true)))->setLinkAttribute('class', 'fa fa-male')->setLinkAttribute('data-toggle', 'tooltip')->setLinkAttribute('title', 'Profil');
        }

        if ($this->checker->isGranted('ROLE_USER')) {
            $menu->removeChild(' <span class="hidden-xs">Inscription</span>');
            $menu->addChild(' <span class="hidden-xs">Observation</span>', array('route' => 'add_observation', 'extras' => array('safe_label' => true)))->setLinkAttribute('class', 'fa fa-eye')->setLinkAttribute('data-toggle', 'tooltip')->setLinkAttribute('title', 'Observation');
            $menu->addChild(' <span class="hidden-xs">Profil</span>', array('route' => 'fos_user_profile_show', 'extras' => array('safe_label' => true)))->setLinkAttribute('class', 'fa fa-male')->setLinkAttribute('data-toggle', 'tooltip')->setLinkAttribute('title', 'Profil');
        }

        return $menu;
    }
}