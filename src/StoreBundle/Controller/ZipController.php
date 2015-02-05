<?php

namespace StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use StoreBundle\Entity\Zip;
use StoreBundle\Entity\Customer;
use StoreBundle\Form\ZipType;

/**
 * Zip controller.
 *
 * @Route("/zip")
 */
class ZipController extends Controller
{

    /**
     * Lists all Zip entities.
     *
     * @Route("/", name="zip")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('StoreBundle:Zip')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Zip entity.
     *
     * @Route("/", name="zip_create")
     * @Method("POST")
     * @Template("StoreBundle:Zip:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Zip();

        $customer = new Customer();
        

        $entity->addCustomersZip($customer);

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('zip_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Zip entity.
     *
     * @param Zip $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Zip $entity)
    {
        $form = $this->createForm(new ZipType(), $entity, array(
            'action' => $this->generateUrl('zip_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Zip entity.
     *
     * @Route("/new", name="zip_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Zip();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Zip entity.
     *
     * @Route("/{id}", name="zip_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StoreBundle:Zip')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zip entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Zip entity.
     *
     * @Route("/{id}/edit", name="zip_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StoreBundle:Zip')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zip entity.');
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
    * Creates a form to edit a Zip entity.
    *
    * @param Zip $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Zip $entity)
    {
        $form = $this->createForm(new ZipType(), $entity, array(
            'action' => $this->generateUrl('zip_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Zip entity.
     *
     * @Route("/{id}", name="zip_update")
     * @Method("PUT")
     * @Template("StoreBundle:Zip:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StoreBundle:Zip')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zip entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('zip_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Zip entity.
     *
     * @Route("/{id}", name="zip_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('StoreBundle:Zip')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Zip entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('zip'));
    }

    /**
     * Creates a form to delete a Zip entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zip_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
