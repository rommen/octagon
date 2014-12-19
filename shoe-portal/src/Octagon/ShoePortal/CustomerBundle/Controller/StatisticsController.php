<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Octagon\ShoePortal\CustomerBundle\Entity\Statistics;
use Octagon\ShoePortal\CustomerBundle\Entity\User;

class StatisticsController extends SecureController {

    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select('s')
                ->from('CustomerBundle:Statistics', 's');

        //WHERE: category
        $category = $request->get('categoryId');
        if ($category != null) {
            $category = base64_decode($category);
            $qb->where('s.idCategories = :category')
                    ->setParameter('category', $category);
        }

        $user = $request->get('userId');
        if ($user != null) {
            $user = base64_decode($user);
            $qb->andWhere('s.idOwner = :owner')
                    ->setParameter('owner', $user);
        }

        $qb->orderBy('s.idStatistics', 'DESC');

        $statistics = $qb->getQuery()->getResult();

        return $this->render('CustomerBundle:Statistics:statistics.html.twig', array('statistics' => $statistics));
    }
}
