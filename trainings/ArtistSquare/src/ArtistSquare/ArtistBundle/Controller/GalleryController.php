<?php

namespace ArtistSquare\ArtistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ArtistSquare\ArtistBundle\Entity\Gallery;

class GalleryController extends Controller
{
    public function listAction()
    {
        
        //$galleries = $this->getDoctrine()
         //      ->getRepository('ArtistBundle:Gallery')->findAll();
       //Fake DB  data
	   //Gallery 1
	   $g1 = new Gallery();
	   $g1->setId(1);
	   $g1->setName("Gallery Name 1");
	   //Gallery 2
	   $g2 = new Gallery();
	   $g2->setId(2);
	   $g2->setName("Gallery Name 2");
	   
	   
	   $galleries = array($g1, $g2);
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
