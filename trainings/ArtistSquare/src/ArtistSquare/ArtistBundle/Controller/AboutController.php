<?php

namespace ArtistSquare\ArtistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller{
    public function indexAction(){
        return $this->render('ArtistBundle:About:about.html.twig');
    }
}
