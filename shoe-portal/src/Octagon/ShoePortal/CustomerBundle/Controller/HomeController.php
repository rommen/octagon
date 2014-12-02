<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        //Doctrine test
        
//        $shoes = $this->getDoctrine()
//               ->getRepository('CustomerBundle:Shoe')->findAll();
        $shoes = array();
        return $this->render('CustomerBundle:Home:index.html.twig', array('shoes' => $shoes));
    }
}
