<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class ShoesController extends SecureController {

    public function listAction(Request $request) {
        return $this->render('CustomerBundle:Shoes:shoes.html.twig');
    }

    public function viewAction(Request $request) {
        return $this->render('CustomerBundle:Shoes:shoe.html.twig');
    }

    public function editAction(Request $request) {
        //check if user is logged in
        $login = $this->checkIfUserLoggedIn();
        if ($login != null)
            return $login;
    }

}
