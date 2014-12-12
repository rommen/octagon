<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Octagon\ShoePortal\CustomerBundle\Entity\User;

/**
 * Description of UserController
 *
 * @author rommen
 */
class UsersController extends SecureController {

    public function viewAction(Request $request) {
        $this->checkIfUserLoggedIn(); //check if logged in
        //get id
        $id = $request->get('id');
        if ($id != null) {
            $id = base64_decode($id);
            $user = $this->getDoctrine()
                            ->getRepository('CustomerBundle:User')->find($id);
        } else {
            $user = null;
        }

        //select user shoes
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select('s')
                ->from('CustomerBundle:Shoe', 's')
                ->where('s.idOwner = :owner')
                ->setParameter('owner', $user->getIdUser());

        //WHERE: category
        $category = $request->get('categoryId');
        if ($category != null) {
            $category = base64_decode($category);
            $qb->andWhere('s.idCategories = :category')
                    ->setParameter('category', $category);
        }
        $qb->orderBy('s.idShoe', 'DESC');

        $shoes = $qb->getQuery()->getResult();


        return $this->render('CustomerBundle:Users:user.html.twig', array('user' => $user, 'shoes' => $shoes));
    }

    public function registerAction(Request $request) {

        if ($request->getMethod() == 'POST') {

            $username = $request->get('username');
            $password = $request->get('password');
            $email = $request->get('email');
            $address = $request->get('address');

            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setAddress($address);
            $password = $this->container->get('security.password_encoder')->encodePassword($user, $password);
            $user->setPassword($password);

            $em = $this->getDoctrine()->getEntityManager();

            $qb = $em->createQueryBuilder()
                    ->select('u')
                    ->from('CustomerBundle:User', 'u')
                    ->where('u.username = :username')
                    ->orWhere('u.email = :email')
                    ->setParameter('username', $username)
                    ->setParameter('email', $email);
            $u = $qb->getQuery()->getOneOrNullResult();
            if ($u == null) {
                $em->persist($user);
                $em->flush();
                return $this->redirect($this->generateUrl('_login'));
            } else {
                return $this->render('CustomerBundle:Users:register.html.twig', array('error' => 'Dublicate value (username or email)'));
            }
        }
        return $this->render('CustomerBundle:Users:register.html.twig', array('error' => null));
    }

    public function editAction(Request $request) {
        $this->checkIfUserLoggedIn();
        //get id

        $id = $request->get('id');
        if ($id != null) {
            $id = base64_decode($id);
            if (!$this->isUserAdmin() && $id != $this->getAuthUserId()) {
                throw new AccessDeniedException('Cannot perform edit operation');
            }
        } else {
            //deny access if id is not provided
            if ($request->getMethod() != 'POST') {
                throw $this->createAccessDeniedException('Cannot perform operation without an id');
            }
            $user = null;
        }

        //retrive user fromdb
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('CustomerBundle:User')->find($id);

        //create user form
        $form = $this->createFormBuilder($user)
                        ->add('address')
                        ->add('email', 'email')
                        ->add('password', 'password', array('required' => false))
                        ->add('confirmPassword', 'text', array('required' => false, 'mapped' => false))
                        ->add('file', 'file', array('label' => 'Avatar file', 'required' => false))
                        ->add('submit', 'submit', array('label' => 'Update'))->getForm();

        //Handle submited form data
        if ($request->getMethod() == 'POST') {
            $pwd = $user->getPassword();

            $form->handleRequest($request); //map request to form

            $p = $form->get('confirmPassword')->getData();

            if ($form->isValid()) {//validate form
                if ($p != null && !empty($p)) {                   
                    $pwd = $this->container->get('security.password_encoder')->encodePassword($user, $p);
                    $user->setPassword($pwd);
                }else{
                    $user->setPassword($pwd);
                }
                $em->persist($user); //update user
                $user->upload(); //upload file
                $em->flush(); //commit

                return $this->redirect('/users/view?id=' . $user->getIdUserHash());
            }
        }

        return $this->render('CustomerBundle:Users:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function blockAction(Request $request) {
        $this->checkIfUserLoggedIn();
        if (!$this->isUserAdmin()) {
            throw $this->createAccessDeniedException('User block function is denied');
        } else {
            $id = $request->get('id');
            if ($id != null) {
                $id = base64_decode($id);
                $em = $this->getDoctrine()->getEntityManager();
                $user = $em->getRepository('CustomerBundle:User')->find($id);

                $date = \DateTime::createFromFormat('Y-m-d', $request->get('blocked')); // ex, 2014-12-01, 
                if ($date != null) {
                    $user->setBlocked($date);
                    $em->persist($user);
                    $em->flush();
                } else {
                    throw $this->createNotFoundException('Validate block date not found:' . $request->get('blocked'));
                }

                return $this->redirect($this->generateUrl('_user', array('id' => $request->get('id'))));
            } else {
                throw $this->createNotFoundException('User id not found');
            }
        }
    }

}
