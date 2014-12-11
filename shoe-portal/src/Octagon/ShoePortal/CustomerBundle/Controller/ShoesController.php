<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ShoesController extends SecureController {

    public function listAction(Request $request) {
        return $this->render('CustomerBundle:Shoes:shoes.html.twig');
    }

    public function viewAction(Request $request) {
        return $this->render('CustomerBundle:Shoes:shoe.html.twig');
    }

    public function deleteAction(Request $request) {
        $this->checkIfUserLoggedIn();

        //Retrieve id of the shoe from the request
        $id = $request->get('id');
        if ($id != null) {
            $id = base64_decode($id);
        } else {
            throw $this->createNotFoundException(
                    'No id found '
            );
        }

        //Retrieve shoe from the db
        $em = $this->getDoctrine()->getManager();
        $shoe = $em->getRepository('CustomerBundle:Shoe')->find($id);
        if (!$shoe) {//$shoe==null
            throw $this->createNotFoundException(
                    'No shoe found for id '
            );
        }

        //Check if user can delete the shoe
        if ($this->isUserAdmin() || $this->getAuthUserId() == $shoe->idOwner->idUser) {
            $em->remove($shoe);
            $em->flush();
            return $this->redirect($this->generateUrl('_shoes'));
        } else {
            throw new AccessDeniedException('Cannot perform delete operation');
        }
    }
}
