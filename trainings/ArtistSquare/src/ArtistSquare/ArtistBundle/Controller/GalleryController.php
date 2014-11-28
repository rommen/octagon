<?php

namespace ArtistSquare\ArtistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    public function listAction()
    {
        
        $galleries = $this->getDoctrine()
               ->getRepository('ArtistBundle:Gallery')->findAll();
       
        return $this->render('ArtistBundle:Gallery:galleries.html.twig', array('galleries' => $galleries));
    }
    
    public function viewAction($id)
    {
        $id = base64_decode($id);
        
        $gallery = $this->getDoctrine()
                ->getRepository('ArtistBundle:Gallery')->find($id);
          
        return $this->render('ArtistBundle:Gallery:gallery.html.twig', array('gallery' => $gallery));
    }
}