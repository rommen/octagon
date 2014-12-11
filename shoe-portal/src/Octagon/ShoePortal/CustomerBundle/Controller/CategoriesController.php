<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of CategoriesController
 *
 * @author rommen
 */
class CategoriesController extends Controller{
    
    public function listAction(Request $request){     
         $categories = $this->getDoctrine()
               ->getRepository('CustomerBundle:Categories')->findAll();
        return $this->render('CustomerBundle:Categories:list.html.twig', 
                array('categories'=>$categories, 
                    'categoryId'=>$request->get("categoryId")));
    }
}
