<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Octagon\ShoePortal\CustomerBundle\Entity\Newsfeed;
use Octagon\ShoePortal\CustomerBundle\Entity\User;

class NewsfeedController extends SecureController {

    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select('n')
                ->from('CustomerBundle:Newsfeed', 'n');

        //WHERE: category
        $category = $request->get('categoryId');
        if ($category != null) {
            $category = base64_decode($category);
            $qb->where('n.idCategories = :category')
                    ->setParameter('category', $category);
        }

        $user = $request->get('userId');
        if ($user != null) {
            $user = base64_decode($user);
            $qb->andWhere('n.idOwner = :owner')
                    ->setParameter('owner', $user);
        }

        $qb->orderBy('n.idNewsfeed', 'DESC');

        $news = $qb->getQuery()->getResult();

        return $this->render('CustomerBundle:Newsfeed:newsfeeds.html.twig', array('newsfeeds' => $news));
    }

    public function deleteAction(Request $request) {
//        $this->checkIfUserLoggedIn();
//
//        //Retrieve id of the shoe from the request
//        $id = $request->get('id');
//        if ($id != null) {
//            $id = base64_decode($id);
//        } else {
//            throw $this->createNotFoundException(
//                    'No id found '
//            );
//        }
//
//        //Retrieve shoe from the db
//        $em = $this->getDoctrine()->getManager();
//        $shoe = $em->getRepository('CustomerBundle:Shoe')->find($id);
//        if (!$shoe) {//$shoe==null
//            throw $this->createNotFoundException(
//                    'No shoe found for id '
//            );
//        }
//
//        //Check if user can delete the shoe
//        if ($this->isUserAdmin() || $this->getAuthUserId() == $shoe->getIdOwner()->getIdUser()) {
//            $shoe->deleteFileFromDisk();
//            $em->remove($shoe);
//            $em->flush();
//            return $this->redirect($this->generateUrl('_shoes'));
//        } else {
//            throw new AccessDeniedException('Cannot perform delete operation');
//        }
    }

    public function editAction(Request $request) {

       $this->checkIfUserLoggedIn();
//        //get id

       $id = $request->get('id');
       if ($id != null) 
           {
        $this->checkIfUserLoggedIn();
//        //get id

        $id = $request->get('id');
        if ($id != null) {
        }
            $id = base64_decode($id);
        } else {
            //deny access if id is not provided
            if ($request->getMethod() != 'POST') {
                throw $this->createAccessDeniedException('Cannot perform operation without an id');
            }
            $newsfeed = null;
        }

        //retrive user fromdb
        $em = $this->getDoctrine()->getEntityManager();
        $newsfeed = $em->getRepository('CustomerBundle:Newsfeed')->find($id);
        if (!$this->isUserAdmin() && $newsfeed->getIdOwner()->getIdUser() != $this->getAuthUserId()) {
            throw new AccessDeniedException('Cannot perform feed edit operation');
        }

        //create user form
        $form = $this->createNewsfeedForm($newsfeed)
                ->add('submit', 'submit', array('label' => 'Update'))
                ->getForm();

        //Handle submited form data
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request); //map request to form

            if ($form->isValid()) {//validate form

                $em->persist($newsfeed); //update user
                $em->flush(); //commit

                return $this->redirect('newsfeed/list' . $newsfeed->getIdNewsfeedHash());
               
                $newsfeed->setDate(new \DateTime());
                $em->persist($newsfeed); //update user
                $em->flush(); //commit

                return $this->redirect('/newsfeed/list');

            }
        }

        return $this->render('CustomerBundle:Newsfeed:edit.html.twig', array(
                    'form' => $form->createView(), 'newsfeed' => $newsfeed));
    }

    public function addAction(Request $request) {
        $this->checkIfUserLoggedIn();

        //Shoe
        $newsfeed = new Newsfeed();
        $newsfeed->setIdOwner($this->getUser());

        $form = $this->createNewsfeedForm($newsfeed);
        $form->setAction($this->generateUrl('_newsfeed_add'));
        $form->add('submit', 'submit', array('label' => 'Add'));
        $form = $form->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $newsfeed->setDate(new \DateTime());

            $em->persist($newsfeed);
            $em->flush();

            return $this->redirect('/newsfeed/list?id=' . $newsfeed->getIdNewsfeedHash());
        }
        return $this->render('CustomerBundle:Newsfeed:newsfeed_add.html.twig', array('form' => $form->createView()));
    }

    private function createNewsfeedForm(Newsfeed $newsfeed) {
        return $this->createFormBuilder($newsfeed)
                        ->add('idNewsfeed', 'hidden')
                        ->add('tile')
                        ->add('text')
                        ->add('idCategories', null, array('label' => 'Categories'))
                        ->setMethod('POST');
    }

    
}
