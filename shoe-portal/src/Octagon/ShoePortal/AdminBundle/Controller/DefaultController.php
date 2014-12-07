<?php
namespace Octagon\ShoePortal\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Description of DefaultController
 * @Route("/")
 */
class DefaultController extends Controller{
    /**
     * Lists all entities.
     *
     * @Route("/")
     * @Method("GET")
     * @Template("AdminBundle:Default:index.html.twig")
     */
    public function indexAction() {
        return array();
    }
}
