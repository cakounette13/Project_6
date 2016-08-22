<?php

namespace BirdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="bird")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
}
