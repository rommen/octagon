<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {

    public function homeAction() {
        //select user shoes
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select('s')
                ->from('CustomerBundle:Shoe', 's')
                ->orderBy('s.idShoe', 'DESC');

        $shoes = $qb->getQuery()->getResult();
        return $this->render('CustomerBundle:Home:home.html.twig', array('shoes' => $shoes));
    }

}
