<?php

namespace BirdBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="bird")
     * @Template("default/index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $search = $this->get('search_bird')->createSearchField($request);
        return [
            'search' => $search->createView(),
            'datas' => []
        ];
    }

    /**
     * @Route("/json", name="json")
     */
    public function jsonAction()
    {
        $datas = $this->get('search_bird')->json();
        return new Response($datas);
    }
}
