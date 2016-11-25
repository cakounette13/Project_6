<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 11/16/16
 * Time: 10:24 AM
 */

namespace BirdBundle\EventListener;


use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WrongRouteListener {

	/**
	 * @var Router
	 */
	private $router;

	public function __construct( Router $router ) {
		$this->router = $router;
	}

	public function onKernelException( GetResponseForExceptionEvent $event ) {
		$exception = $event->getException();

		if ( $exception instanceof NotFoundHttpException ) {
			$route = 'bird';
			if ( $route === $event->getRequest()->get('_route') ) {
				return;
			}
			$url = $this->router->generate($route);
			$response = new RedirectResponse($url);
			$event->setResponse( $response );
		}
	}
}