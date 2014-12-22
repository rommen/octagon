<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MailboxController extends SecureController {

    public function inboxListAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select('i')
                ->from('CustomerBundle:Mailbox', 'i')
                ->where('i.idReceiver = :user')
                ->andWhere('i.deleteByReceiver = 0')
                ->setParameter('user', $this->getAuthUserId());

        $qb->orderBy('i.date', 'DESC');

        $mails = $qb->getQuery()->getResult();

        return $this->render('CustomerBundle:Mailbox:mailbox.html.twig', array('mails' => $mails));
    }

    public function unreadCountByUserAction($userId) {
        if ($userId != null) {
            $userId = base64_decode($userId);
            $em = $this->getDoctrine()->getManager();
            $count = $em->createQueryBuilder()
                            ->select('count(m.idMailbox)')
                            ->from('CustomerBundle:Mailbox', 'm')
                            ->where('m.idReceiver = :user')
                            ->andWhere('m.deleteByReceiver = 0')
                            ->andWhere('m.read <> 1')
                            ->setParameter('user', $userId)
                            ->getQuery()->getSingleScalarResult();
            if ($count != null && $count > 0) {
                return new Response('(' . $count . ')');
            } else {
                return new Response();
            }
        } else {
            throw $this->createNotFoundException("Cannot count unread mails : id not found");
        }
    }

    public function outboxListAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select('i')
                ->from('CustomerBundle:Mailbox', 'i')
                ->where('i.idSender = :user')
                ->andWhere('i.deleteBySender = 0')
                ->setParameter('user', $this->getAuthUserId());

        $qb->orderBy('i.date', 'DESC');

        $mails = $qb->getQuery()->getResult();

        return $this->render('CustomerBundle:Mailbox:mailbox.html.twig', array('mails' => $mails));
    }

    /**
     * Deletes a e-mail from current user inbox/outbox
     *  id -- mail id base64
     *  mailbox -- inbox or outbox
     * @param Request $request
     */
    public function deleteAction(Request $request) {
        $id = $request->get('id');

        if ($id != null) {
            $id = base64_decode($id);
            $mailbox = $request->get('mailbox');

            $em = $this->getDoctrine()->getManager();
            $qb = $em->createQueryBuilder()
                    ->update('CustomerBundle:Mailbox m')
                    ->where('m.idMailbox = :id')
                    ->setParameter('id', $id);

            if ($mailbox == 'inbox') {
                $qb->set('m.deleteByReceiver', 1);
            } else {//outbox
                $qb->set('m.deleteBySender', 1);
            }
            $qb->getQuery()->execute();

            return new RedirectResponse($this->generateUrl(($mailbox == 'inbox') ? '_inbox' : '_outbox'));
        } else {
            throw $this->createNotFoundException("Cannot remove mail: id not found");
        }
    }

    /**
     * Update read proerty of the e-mail, that receiver of the mail has read it.
     * @param Request $request
     * @return Response
     */
    public function readAction(Request $request) {
        $id = $request->get('id');

        if ($id != null) {
            $id = base64_decode($id);
            $connection = $this->getDoctrine()->getManager()->getConnection();
            $connection->executeUpdate('UPDATE Mailbox m SET m.read = 1 WHERE m.idMailbox = ?', array($id));
            return new Response();
        } else {
            throw $this->createNotFoundException("Cannot mark mail as read: id not found");
        }
    }

    /**
     * Preview send email view and on its submit send an e-mail.
     * Parameters:
     * - to = bas64 of userId  for reply operation (optional)
     * @param Request $request
     */
    public function sendAction(Request $request) {
        return new Response('Send mail view');
    }

}
