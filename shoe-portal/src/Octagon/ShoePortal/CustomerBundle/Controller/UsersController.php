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
     public function registerAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $username = $request->get('username');
            $password = $request->get('password');
            $email = $request->get('email');
            $address = $request->get('address');

            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setAddress($address);
            $password = $this->container->get('security.password_encoder')
                    ->encodePassword($user, $password);
            $user->setPassword($password);

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $em->flush();

            return new \Symfony\Component\HttpFoundation\RedirectResponse('_login');
        }
        return $this->render('CustomerBundle:Users:register.html.twig');
    }
}
