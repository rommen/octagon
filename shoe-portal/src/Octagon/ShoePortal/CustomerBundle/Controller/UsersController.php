<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of UserController
 *
 * @author rommen
 */
class UsersController extends SecureController{
    public function viewAction(Request $request){
        $this->checkIfUserLoggedIn();//check if logged in
        //get id
        $id = $request->get('id');
        if($id != null){
            $id = base64_decode($id);
            $user = $this->getDoctrine()
                   ->getRepository('CustomerBundle:User')->find($id);            
        }else{
            $user = null;
        }
        
        //select user shoes
        $shoes = array();
        
        
        return $this->render('CustomerBundle:Users:user.html.twig', 
                array('user' => $user, 'shoes'=>$shoes));
    }
    public function registerAction(Request $request){
         return $this->render('CustomerBundle:Users:register.html.twig');
    }
}
