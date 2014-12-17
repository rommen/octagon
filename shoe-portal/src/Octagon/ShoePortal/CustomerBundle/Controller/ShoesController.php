<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Octagon\ShoePortal\CustomerBundle\Entity\Shoe;
use Octagon\ShoePortal\AdminBundle\Form\ShoeType;

class ShoesController extends SecureController {

    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select('s')
                ->from('CustomerBundle:Shoe', 's');

        //WHERE: category
        $category = $request->get('categoryId');
        if ($category != null) {
            $category = base64_decode($category);
            $qb->where('s.idCategories = :category')
                    ->setParameter('category', $category);
        }

        $user = $request->get('userId');
        if ($user != null) {
            $user = base64_decode($user);
            $qb->andWhere('s.idOwner = :owner')
                    ->setParameter('owner', $user);
        }

        $qb->orderBy('s.idShoe', 'DESC');

        $shoes = $qb->getQuery()->getResult();

        return $this->render('CustomerBundle:Shoes:shoes.html.twig', array('shoes' => $shoes));
    }

    public function viewAction(Request $request) {
        $id = $request->get('id');
        if ($id != null) {
            $id = base64_decode($id);
            $shoe = $this->getDoctrine()
                            ->getRepository('CustomerBundle:Shoe')->find($id);
            return $this->render('CustomerBundle:Shoes:shoe.html.twig', array('shoe' => $shoe));
        } else {
            throw $this->createNotFoundException('Shoe not found');
        }
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
        if ($this->isUserAdmin() || $this->getAuthUserId() == $shoe->getIdOwner()->getIdUser()) {
            $shoe->deleteFileFromDisk();
            $em->remove($shoe);
            $em->flush();
            return $this->redirect($this->generateUrl('_shoes'));
        } else {
            throw new AccessDeniedException('Cannot perform delete operation');
        }
    }

    public function editAction($id) {
        //retrieve the id of the shoe in question after checking user login statujs
//        $this->checkIfUserLoggedIn();
//        $id = $request->get('id');
//        if ($id != null) {
//            $id = base64_decode($id);
//        } else {
//            throw $this->createNotFoundException(
//                    'No id found '
//            );
//        }
//        //fetch the shoe in question
//
//        $em = $this->getDoctrine()->getManager();
//        $shoe = $em->getRepository('CustomerBundle:Shoe')->find($id);
//        if (!$shoe) {//$shoe==null
//            throw $this->createNotFoundException(
//                    'No shoe found for id '
//            );
//        }
//        //check if the user can edit the shoe
//        //Check if user can delete the shoe
//        if ($this->isUserAdmin() || $this->getAuthUserId() == $shoe->getIdOwner()->getIdUser()) {
//
//            //   $product->setName('New product name!');
//            $editForm = $this->createUpdateForm($shoe);
//            return array(
//                'shoe' => $shoe,
//                'edit_form' => $editForm->createView(),
//            );
//        } else {
//            throw new AccessDeniedException('Cannot perform edit operation');
//        }
//        return array();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CustomerBundle:Shoe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shoe entity.');
        }

        $editForm = $this->shoeEditForm($entity);
          return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            
        );
    }

    public function addAction(Request $request) {
        $this->checkIfUserLoggedIn();
        $entity = new Shoe();
        $form = $this->newShoeForm($entity);
        
        $form->handleRequest($request);
         if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($entity->getFile() != null) {
                $entity->updateExtensionFromFile();
            }
            $em->persist($entity);
            $em->flush();
            $entity->upload();
 $session = $this->getRequest()->getSession();
        $session->getFlashBag()->add('message', 'shoe saved!');
   
            return $this->redirect($this->generateUrl('_shoe_add', array('id' => $entity->getIdShoe())));
        }
 
        return $this->render('CustomerBundle:Shoes:newshoe.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    private function newShoeForm(Shoe $entity) {
        $form = $this->createForm(new ShoeType(), $entity, array(
            'action' => $this->generateUrl('_shoe_add'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Add'));
        //////////////////////

    //////////////
    return $form;
    }
private function shoeEditForm(Shoe $entity){
     $form = $this->createForm(new ShoeType(), $entity, array(
            'action' => $this->generateUrl('_shoe_edit', array('id' => $entity->getIdShoe())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    
    
}
//    private function editForm(Shoe $entity) {
//         $form = $this->createForm(new ShoeType(), $entity, array(
//            'action' => $this->generateUrl('admin_shoe_update', array('id' => $entity->getIdShoe())),
//            'method' => 'PUT',
//        ));
//
//        $form->add('submit', 'submit', array('label' => 'Update'));
//
//        return $form;
//    }

    private function createShoeForm(Shoe $entity) {
        $form = $this->createForm(new ShoeType(), $entity, array(
            'action' => $this->generateUrl('_shoe_add', array('id' => $entity->getIdShoe())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

}
