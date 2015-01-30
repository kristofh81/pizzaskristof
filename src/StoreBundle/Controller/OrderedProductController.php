<?php

namespace StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use StoreBundle\Entity\OrderedProduct;
use StoreBundle\Form\OrderedProductType;

/**
 * OrderedProduct controller.
 *
 * @Route("/orderedproduct")
 */
class OrderedProductController extends Controller
{

    /**
     * Lists all OrderedProduct entities.
     *
     * @Route("/", name="orderedproduct")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('StoreBundle:OrderedProduct')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new OrderedProduct entity.
     *
     * @Route("/", name="orderedproduct_create")
     * @Method("POST")
     * @Template("StoreBundle:OrderedProduct:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new OrderedProduct();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('orderedproduct_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a OrderedProduct entity.
     *
     * @param OrderedProduct $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(OrderedProduct $entity)
    {
        $form = $this->createForm(new OrderedProductType(), $entity, array(
            'action' => $this->generateUrl('orderedproduct_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new OrderedProduct entity.
     *
     * @Route("/new", name="orderedproduct_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new OrderedProduct();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a OrderedProduct entity.
     *
     * @Route("/{id}", name="orderedproduct_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StoreBundle:OrderedProduct')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrderedProduct entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing OrderedProduct entity.
     *
     * @Route("/{id}/edit", name="orderedproduct_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StoreBundle:OrderedProduct')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrderedProduct entity.');
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
    * Creates a form to edit a OrderedProduct entity.
    *
    * @param OrderedProduct $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(OrderedProduct $entity)
    {
        $form = $this->createForm(new OrderedProductType(), $entity, array(
            'action' => $this->generateUrl('orderedproduct_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing OrderedProduct entity.
     *
     * @Route("/{id}", name="orderedproduct_update")
     * @Method("PUT")
     * @Template("StoreBundle:OrderedProduct:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StoreBundle:OrderedProduct')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrderedProduct entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('orderedproduct_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a OrderedProduct entity.
     *
     * @Route("/{id}", name="orderedproduct_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('StoreBundle:OrderedProduct')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OrderedProduct entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('orderedproduct'));
    }

    /**
     * Creates a form to delete a OrderedProduct entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('orderedproduct_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
