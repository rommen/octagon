<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Octagon\ShoePortal\CustomerBundle\Entity\Rating;
use Octagon\ShoePortal\CustomerBundle\Entity\User;
use Octagon\ShoePortal\CustomerBundle\Entity\Shoe;

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
        
        /*Request
            value = {1-5}
            sellerId or shoeId - which is not null is right one
         */

        $rating = new Rating();
        //set data from request
        
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($rating);
        $em->flush();
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
