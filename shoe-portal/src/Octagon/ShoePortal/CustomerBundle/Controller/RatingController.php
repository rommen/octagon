<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Octagon\ShoePortal\CustomerBundle\Entity\Rating;
use Octagon\ShoePortal\CustomerBundle\Entity\User;
use Octagon\ShoePortal\CustomerBundle\Entity\Shoe;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of CommentsController
 *
 * @author rommen
 */
class RatingController extends SecureController {

    /**
     * Rate seller or shoe 
     * @param Request $request
     * --sellerId - Hash of the seller id
     * --shoeId - Hash of the shoe id
     */
    public function addAction(Request $request) {
        $this->checkIfUserLoggedIn();
        $rating = new Rating();
        $em = $this->getDoctrine()->getEntityManager();
        $id = $request->get('sellerId');
        if ($id == null) {
            $id = base64_decode($request->get('shoeId'));
            
            $qb = $em->createQueryBuilder()
                ->select('s')
                ->from('CustomerBundle:Shoe', 's')
                ->where('s.idShoe = :id')
                ->setParameter('id', $id);
            $idShoe = $qb->getQuery()->getOneOrNullResult();
            $rating->setIdShoe($idShoe);
        } else {
            $id = base64_decode($id);
            $qb = $em->createQueryBuilder()
                ->select('s')
                ->from('CustomerBundle:User', 's')
                ->where('s.idUser = :id')
                ->setParameter('id', $id);
            $idSeller = $qb->getQuery()->getOneOrNullResult();
            $rating->setIdSeller($idSeller);
        }
       
        $rating->setValue($request->get('value'));
        $rating->setIdOwner($this->getUser());
        /*Request
            value = {1-5}
            sellerId or shoeId - which is not null is right one
         */
       
        //set data from request
        
        
        $em->persist($rating);
        $em->flush();
        return new Response('Rated successfully');
    }

    /**
     * Preview average rate for the seller or the shoe
     * @param Request $request
     * --sellerId - Hash of the seller id
     * --shoeId - Hash of the shoe id
     */
    public function viewAction(Request $request) {
        
    }

}
