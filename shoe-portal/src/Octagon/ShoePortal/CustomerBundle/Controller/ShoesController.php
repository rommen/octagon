<?php

namespace Octagon\ShoePortal\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class ShoesController extends SecureController {

    public function listAction(Request $request) {
        return $this->render('CustomerBundle:Shoes:shoes.html.twig');
    }

    public function viewAction(Request $request) {
        return $this->render('CustomerBundle:Shoes:shoe.html.twig');
    }
    
    public function editAction(Request $request) {
        $this->checkIfUserLoggedIn();//check if user is logged in
        return $this->render('CustomerBundle:Shoes:shoe_edit.html.twig');
    }
    /**
     * Lists all Shoe entities.
     *
     * @Route("/", name="customer_shoe")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entities = $em->getRepository('CustomerBundle:Shoe')->findAll();
    
    	return array(
    			'entities' => $entities,
    	);
    }
    /**
     * Creates a new Shoe entity.
     *
     * @Route("/", name="customer_shoe_create")
     * @Method("POST")
     * @Template("CustomerBundle:Shoe:new.html.twig")
     */
    public function createAction(Request $request)
    {
    	$entity = new Shoe();
    	$form = $this->createCreateForm($entity);
    	$form->handleRequest($request);
    
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($entity);
    		$em->flush();
    
    		return $this->redirect($this->generateUrl('customer_shoe_show', array('id' => $entity->getId())));
    	}
    
    	return array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	);
    }
    
    /**
     * Creates a form to create a Shoe entity.
     *
     * @param Shoe $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Shoe $entity)
    {
    	$form = $this->createForm(new ShoeType(), $entity, array(
    			'action' => $this->generateUrl('customer_shoe_create'),
    			'method' => 'POST',
    	));
    
    	$form->add('submit', 'submit', array('label' => 'Create'));
    
    	return $form;
    }
    
    /**
     * Displays a form to create a new Shoe entity.
     *
     * @Route("/new", name="customer_shoe_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
    	$entity = new Shoe();
    	$form   = $this->createCreateForm($entity);
    
    	return array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	);
    }
    
    /**
     * Finds and displays a Shoe entity.
     *
     * @Route("/{id}", name="admin_shoe_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('CustomerBundle:Shoe')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find Shoe entity.');
    	}
    
    	$deleteForm = $this->createDeleteForm($id);
    
    	return array(
    			'entity'      => $entity,
    			'delete_form' => $deleteForm->createView(),
    	);
    }
    
    /**
     * Displays a form to edit an existing Shoe entity.
     *
     * @Route("/{id}/edit", name="admin_shoe_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('CustomerBundle:Shoe')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find Shoe entity.');
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
     * Creates a form to edit a Shoe entity.
     *
     * @param Shoe $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Shoe $entity)
    {
    	$form = $this->createForm(new ShoeType(), $entity, array(
    			'action' => $this->generateUrl('customer_shoe_update', array('id' => $entity->getId())),
    			'method' => 'PUT',
    	));
    
    	$form->add('submit', 'submit', array('label' => 'Update'));
    
    	return $form;
    }
    /**
     * Edits an existing Shoe entity.
     *
     * @Route("/{id}", name="customer_shoe_update")
     * @Method("PUT")
     * @Template("CustomerBundle:Shoe:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('CustomerBundle:Shoe')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find Shoe entity.');
    	}
    
    	$deleteForm = $this->createDeleteForm($id);
    	$editForm = $this->createEditForm($entity);
    	$editForm->handleRequest($request);
    
    	if ($editForm->isValid()) {
    		$em->flush();
    
    		return $this->redirect($this->generateUrl('customer_shoe_edit', array('id' => $id)));
    	}
    
    	return array(
    			'entity'      => $entity,
    			'edit_form'   => $editForm->createView(),
    			'delete_form' => $deleteForm->createView(),
    	);
    }
    /**
     * Deletes a Shoe entity.
     *
     * @Route("/{id}", name="customer_shoe_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
    	$form = $this->createDeleteForm($id);
    	$form->handleRequest($request);
    
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$entity = $em->getRepository('CustomerBundle:Shoe')->find($id);
    
    		if (!$entity) {
    			throw $this->createNotFoundException('Unable to find Shoe entity.');
    		}
    
    		$em->remove($entity);
    		$em->flush();
    	}
    
    	return $this->redirect($this->generateUrl('customer_shoe'));
    }
    
    /**
     * Creates a form to delete a Shoe entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
    	return $this->createFormBuilder()
    	->setAction($this->generateUrl('customer_shoe_delete', array('id' => $id)))
    	->setMethod('DELETE')
    	->add('submit', 'submit', array('label' => 'Delete'))
    	->getForm()
    	;
    }
}
