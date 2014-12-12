<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ExceptionListener {

    /**
     *
     * @var ContainerInterface
     */
    private $container;

    function __construct($container) {
        $this->container = $container;
    }

    public function onKernelException(GetResponseForExceptionEvent $event) {
        // You get the exception object from the received event
        $exception = $event->getException();

        // Customize your response object to display the exception details
        $templating = $this->container->get('templating');
        $response = new Response($templating->render('TwigBundle:Exception:error.html.twig', array(
                    'exception' => $exception
        )));

        // HttpExceptionInterface is a special type of exception that
        // holds status code and header details
        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
            $response->headers->replace($exception->getHeaders());
        } else {
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // Send the modified response object to the event
        $event->setResponse($response);
    }

}
