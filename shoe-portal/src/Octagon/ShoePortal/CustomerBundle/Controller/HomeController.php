<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function homeAction()
    {
        //Doctrine test
        
//        $shoes = $this->getDoctrine()
//               ->getRepository('CustomerBundle:Shoe')->findAll();
        $shoes = array();
        return $this->render('CustomerBundle:Home:home.html.twig', array('shoes' => $shoes));
    }
}
