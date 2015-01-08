<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Octagon\ShoePortal\CustomerBundle\Entity\Comments;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of CommentsController
 *
 * @author rommen
 */
class CommentsController extends SecureController {

    /**
     * Add comment for the seller or the shoe
     * @param Request $request
     * --sellerId - Hash of the seller id
     * --shoeId - Hash of the shoe id
     */
    public function addAction(Request $request) {
        $this->checkIfUserLoggedIn();

        //Shoe
        $comments = new Comments();
        $comments->setIdOwner($this->getUser());

        $form = $this->createCommentsForm($comments);
        $form->setAction($this->generateUrl('_comments_add'));
        $form->add('submit', 'submit', array('label' => 'Add'));
        $form = $form->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $comments->setDate(new \DateTime());

            $em->persist($comments);
            $em->flush();

            return $this->redirect('/comments/list');
        }
        return $this->render('CustomerBundle:Comments:comments_add.html.twig', array('form' => $form->createView()));
    }

    private function createCommentsForm(Comments $comments) {
        return $this->createFormBuilder($comments)
                        ->add('idComments', 'hidden')
                        ->add('text')
                        ->add('date')
                        ->setMethod('POST');
    }

    /**
     * Report one particular comment by chaning Comments.reported field to true.
     * Perform AJAX call for this action (example: <button onclick="$.ajax({url: '{{path('_comments_report')}}?id={{m.idMailboxHash}}'})" .....>...</button>
     * @param Request $request
     * --id - hash of the comment id
     */
    public function reportAction(Request $request) {
        $id = base64_decode($request->get('id'));
        if ($id != null) {
            $em = $this->getDoctrine()->getManager();
            $qb = $em->createQueryBuilder()
                ->update('CustomerBundle:Comments c')
                ->where('c.idComments = :id')
                ->setParameter('id', $id)
                ->set('c.reported', true)
                ->getQuery()->execute();
            return new Response('Reported successfully');
        } else {
            throw $this->createNotFoundException('Id not found');
        }
    }

}
