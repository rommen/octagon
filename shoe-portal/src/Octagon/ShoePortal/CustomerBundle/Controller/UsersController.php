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
         return $this->render('CustomerBundle:Users:user.html.twig');
    }
    public function registerAction(Request $request){
         return $this->render('CustomerBundle:Users:register.html.twig');
    }
}
