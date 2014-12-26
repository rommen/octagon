<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {

    public function homeAction() {
        //select user shoes
        $em = $this->getDoctrine()->getManager();
        
        //Shoes
        $qb = $em->createQueryBuilder()
                ->select('s')
                ->from('CustomerBundle:Shoe', 's')
                ->orderBy('s.idShoe', 'DESC');
        $shoes = $qb->getQuery()->getResult();
        
        //Newsfeeds
        $qb = $em->createQueryBuilder()
                ->select('n')
                ->from('CustomerBundle:Newsfeed', 'n')
                ->orderBy('n.date', 'DESC');
        $newsfeeds = $qb->getQuery()->getResult();
        
        //Statistics
        $qb = $em->createQueryBuilder()
                ->select('s')
                ->from('CustomerBundle:Statistics', 's')
                ->orderBy('s.idStatistics', 'DESC');
        $statistics = $qb->getQuery()->getResult();
        
        return $this->render('CustomerBundle:Home:home.html.twig', 
                array(
                    'shoes' => $shoes,
                    'newsfeeds' => $newsfeeds,
                    'statistics' => $statistics
                ));
    }

}
