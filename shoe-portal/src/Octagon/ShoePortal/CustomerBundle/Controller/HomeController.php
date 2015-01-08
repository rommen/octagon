<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\Expr\Join;

class HomeController extends Controller {

    public function homeAction() {
        //select user shoes
        $em = $this->getDoctrine()->getManager();
        
        //Shoes
        $qb = $em->createQueryBuilder()
                ->select(['s', 'AVG(r.value)'])
                ->from('CustomerBundle:Shoe', 's')
                ->leftJoin('CustomerBundle:Rating', 'r', Join::WITH, 's.idShoe = r.idShoe')
                ->addSelect('AVG(r.value) AS HIDDEN r_avg')
                ->groupBy('s.idShoe')
                ->orderBy('r_avg', 'ASC');
        $shoes = $qb->getQuery()->setMaxResults(10)->getResult();
        
        //Newsfeeds
        $qb = $em->createQueryBuilder()
                ->select('n')
                ->from('CustomerBundle:Newsfeed', 'n')
                ->orderBy('n.date', 'DESC');
        $newsfeeds = $qb->getQuery()->setMaxResults(10)->getResult();
        
        //Statistics
        $qb = $em->createQueryBuilder()
                ->select('s')
                ->from('CustomerBundle:Statistics', 's')
                ->orderBy('s.idStatistics', 'DESC');
        $statistics = $qb->getQuery()->setMaxResults(10)->getResult();
        
        return $this->render('CustomerBundle:Home:home.html.twig', 
                array(
                    'shoes' => $shoes,
                    'newsfeeds' => $newsfeeds,
                    'statistics' => $statistics
                ));
    }

}
