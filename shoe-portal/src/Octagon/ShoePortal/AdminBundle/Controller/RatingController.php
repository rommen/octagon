<?php

namespace Octagon\ShoePortal\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Octagon\ShoePortal\CustomerBundle\Entity\Rating;
use Octagon\ShoePortal\AdminBundle\Form\RatingType;

/**
 * Rating controller.
 *
 * @Route("/admin_rating")
 */
class RatingController extends Controller
{

    /**
     * Lists all Rating entities.
     *
     * @Route("/", name="admin_rating")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CustomerBundle:Rating')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Rating entity.
     *
     * @Route("/", name="admin_rating_create")
     * @Method("POST")
     * @Template("CustomerBundle:Rating:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Rating();
        $entity->setIdOwner($this->getUser());
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setIdOwner($this->getUser());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_rating_show', array('id' => $entity->getIdRating())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Rating entity.
     *
     * @param Rating $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Rating $entity)
    {
        $form = $this->createForm(new RatingType(), $entity, array(
            'action' => $this->generateUrl('admin_rating_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Rating entity.
     *
     * @Route("/new", name="admin_rating_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Rating();
        $entity->setIdOwner($this->getUser());
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Rating entity.
     *
     * @Route("/{id}", name="admin_rating_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CustomerBundle:Rating')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rating entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Rating entity.
     *
     * @Route("/{id}/edit", name="admin_rating_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CustomerBundle:Rating')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rating entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Rating entity.
    *
    * @param Rating $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Rating $entity)
    {
        $form = $this->createForm(new RatingType(), $entity, array(
            'action' => $this->generateUrl('admin_rating_update', array('id' => $entity->getIdRating())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Rating entity.
     *
     * @Route("/{id}", name="admin_rating_update")
     * @Method("PUT")
     * @Template("CustomerBundle:Rating:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CustomerBundle:Rating')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rating entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->setIdOwner($this->getUser());
            $em->flush();

            return $this->redirect($this->generateUrl('admin_rating_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Rating entity.
     *
     * @Route("/{id}", name="admin_rating_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CustomerBundle:Rating')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rating entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_rating'));
    }

    /**
     * Creates a form to delete a Rating entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_rating_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
