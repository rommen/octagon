<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShoesController extends Controller
{
    public function listAction()
    {
        return $this->render('CustomerBundle:Shoes:list.html.twig');
    }
}
