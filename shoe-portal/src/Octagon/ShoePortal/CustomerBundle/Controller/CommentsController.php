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

        $em = $this->getDoctrine()->getManager();
        //Comment
        $comment = new Comments();
        $comment->setDate(new \DateTime());
        $comment->setReported(false);
        $comment->setIdOwner($this->getUser());
        $comment->setText($request->get('text'));

        $id = $request->get('sellerId');
        if ($id == null) {
            $id = base64_decode($request->get('shoeId'));
            
            $qb = $em->createQueryBuilder()
                ->select('s')
                ->from('CustomerBundle:Shoe', 's')
                ->where('s.idShoe = :id')
                ->setParameter('id', $id);
            $idShoe = $qb->getQuery()->getOneOrNullResult();
            $comment->setIdShoe($idShoe);
        } else {
            $id = base64_decode($id);
            $qb = $em->createQueryBuilder()
                ->select('s')
                ->from('CustomerBundle:User', 's')
                ->where('s.idUser = :id')
                ->setParameter('id', $id);
            $idSeller = $qb->getQuery()->getOneOrNullResult();
            $comment->setIdSeller($idSeller);
        }

        $em->persist($comment);
        $em->flush();

        if($comment->getIdSeller() != null){
            return $this->redirect('/users/view?id=' . base64_encode($id));            
        }else{
            return $this->redirect('/shoes/view?id=' . base64_encode($id));            
        }        
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
