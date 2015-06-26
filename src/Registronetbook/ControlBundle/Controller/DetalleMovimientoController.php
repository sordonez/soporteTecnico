<?php

namespace Registronetbook\ControlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Registronetbook\ControlBundle\Entity\DetalleMovimiento;
use Registronetbook\ControlBundle\Form\DetalleMovimientoType;

/**
 * DetalleMovimiento controller.
 *
 */
class DetalleMovimientoController extends Controller
{

    /**
     * Lists all DetalleMovimiento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ControlBundle:DetalleMovimiento')->findAll();

        return $this->render('ControlBundle:DetalleMovimiento:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new DetalleMovimiento entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new DetalleMovimiento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_detalleMovimiento_show', array('id' => $entity->getId())));
        }

        return $this->render('ControlBundle:DetalleMovimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a DetalleMovimiento entity.
     *
     * @param DetalleMovimiento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DetalleMovimiento $entity)
    {
        $form = $this->createForm(new DetalleMovimientoType(), $entity, array(
            'action' => $this->generateUrl('admin_detalleMovimiento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DetalleMovimiento entity.
     *
     */
    public function newAction()
    {
        $entity = new DetalleMovimiento();
        $form   = $this->createCreateForm($entity);

        return $this->render('ControlBundle:DetalleMovimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DetalleMovimiento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:DetalleMovimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DetalleMovimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlBundle:DetalleMovimiento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing DetalleMovimiento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:DetalleMovimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DetalleMovimiento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlBundle:DetalleMovimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a DetalleMovimiento entity.
    *
    * @param DetalleMovimiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DetalleMovimiento $entity)
    {
        $form = $this->createForm(new DetalleMovimientoType(), $entity, array(
            'action' => $this->generateUrl('admin_detalleMovimiento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DetalleMovimiento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:DetalleMovimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DetalleMovimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_detalleMovimiento_edit', array('id' => $id)));
        }

        return $this->render('ControlBundle:DetalleMovimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a DetalleMovimiento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ControlBundle:DetalleMovimiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DetalleMovimiento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_detalleMovimiento'));
    }

    /**
     * Creates a form to delete a DetalleMovimiento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_detalleMovimiento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
