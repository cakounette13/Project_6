<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 8/19/16
 * Time: 6:43 PM
 */

namespace BirdBundle\EventListener;

use FOS\RestBundle\Controller\Annotations\View;
use JMS\DiExtraBundle\Annotation\Observe;
use JMS\DiExtraBundle\Annotation\Service;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;


/**
 * @Service("app.view_response_listener")
 */
class ViewResponseListener
{
    /**
     * @Observe(event="kernel.view", priority=110)
     * {@inheritdoc}
     */
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $request = $event->getRequest();
        $request->getSession()->save();

        if (!$request->attributes->has('_view')) {
            $configuration = new View([]);
            $configuration->setSerializerEnableMaxDepthChecks(true);
            $request->attributes->set('_view', $configuration);
        }
    }
}