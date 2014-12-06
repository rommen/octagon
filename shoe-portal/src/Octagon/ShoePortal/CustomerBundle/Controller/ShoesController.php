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
        $this->checkIfUserLoggedIn();//check if user is logged in
        return $this->render('CustomerBundle:Shoes:shoe_edit.html.twig');
    }

}
