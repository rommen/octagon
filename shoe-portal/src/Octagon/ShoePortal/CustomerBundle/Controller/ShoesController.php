<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Octagon\ShoePortal\CustomerBundle\Entity\Shoe;
use Octagon\ShoePortal\CustomerBundle\Entity\User;

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

    public function editAction(Request $request) {
        $this->checkIfUserLoggedIn();

        $id = $request->get('id');
        if (($id != null && strtoupper($request->getMethod() === 'GET')) || strtoupper($request->getMethod() === 'POST')) {
            if (strtoupper($request->getMethod()) === 'GET') {
                $id = base64_decode($id);
                $shoe = $this->getDoctrine()
                                ->getRepository('CustomerBundle:Shoe')->find($id);
            } else {
                $shoe = new Shoe();
                $shoe->setIdOwner($this->getUser());
            }

            $form = $this->createShoeForm($shoe);
            $form->setAction($this->generateUrl('_shoe_edit'));
            $form->add('submit', 'submit', array('label' => 'Update'));
            $form->setMethod('POST');
            $form = $form->getForm();

            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                if ($shoe->getFile() != null) {
                    $shoe->updateExtensionFromFile();
                }

                $em->persist($shoe);
                $em->flush();
                $shoe->upload();

                return $this->redirect($this->generateUrl('_shoes'));
            }

            return $this->render('CustomerBundle:Shoes:shoe_edit.html.twig', array(
                        'entity' => $shoe,
                        'form' => $form->createView(),
            ));
        } else {
            throw $this->createNotFoundException('Cannot perform edit operation, shoe id not found');
        }
    }

    public function addAction(Request $request) {
        $this->checkIfUserLoggedIn();

        //Shoe
        $shoe = new Shoe();
        $shoe->setIdOwner($this->getUser());

        $form = $this->createShoeForm($shoe);
        $form->setAction($this->generateUrl('_shoe_add'));
        $form->add('submit', 'submit', array('label' => 'Add'));
        $form->setMethod('POST');
        $form = $form->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($shoe->getFile() != null) {
                $shoe->updateExtensionFromFile();
            }

            $em->persist($shoe);
            $em->flush();
            $shoe->upload();

            return $this->redirect($this->generateUrl('_shoes'));
        }

        return $this->render('CustomerBundle:Shoes:shoe_edit.html.twig', array(
                    'entity' => $shoe,
                    'form' => $form->createView(),
        ));
    }

    private function createShoeForm(Shoe $shoe) {
        return $this->createFormBuilder($shoe)
                        ->add('idShoe', 'hidden')
                        ->add('name')
                        ->add('color')
                        ->add('size', 'number', array('precision' => '1'))
                        ->add('text')
                        ->add('brand')
                        ->add('price', 'money', array('label' => 'Price', 'required' => 'false'))
                        ->add('sportstar')
                        ->add('year')
                        ->add('edition')
                        ->add('idCategories', null, array('label' => 'Categories'))
                        ->add('file')
                        ->setMethod('POST');
    }

}
