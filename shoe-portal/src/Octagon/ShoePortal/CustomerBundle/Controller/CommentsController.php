<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
/**
 * Description of CommentsController
 *
 * @author rommen
 */
class CommentsController extends SecureController {

    /**
     * Add comment for the seller or the shoe
     * @param Request $request
     * --sellerId - Hash of the seller id
     * --shoeId - Hash of the shoe id
     */
    public function addAction(Request $request){
        
    }
    
    /**
     * List comments of the shoe or of the seller
     * @param Request $request
     * --sellerId - Hash of the seller id
     * --shoeId - Hash of the shoe id
     */
    public function listAction(Request $request){
        
    }
    
    /**
     * Report one particular comment by chaning Comments.reported field to true.
     * Perform AJAX call for this action (example: <button onclick="$.ajax({url: '{{path('_comments_report')}}?id={{m.idMailboxHash}}'})" .....>...</button>
     * @param Request $request
     * --id - hash of the comment id
     */
    public function reportAction(Request $request){
        
    }
}
