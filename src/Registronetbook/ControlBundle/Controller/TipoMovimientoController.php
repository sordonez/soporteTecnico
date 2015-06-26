<?php

namespace Registronetbook\ControlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Registronetbook\ControlBundle\Entity\TipoMovimiento;
use Registronetbook\ControlBundle\Form\TipoMovimientoType;

/**
 * TipoMovimiento controller.
 *
 */
class TipoMovimientoController extends Controller
{

    /**
     * Lists all TipoMovimiento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ControlBundle:TipoMovimiento')->findAll();

        return $this->render('ControlBundle:TipoMovimiento:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TipoMovimiento entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TipoMovimiento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_tipoMovimiento_show', array('id' => $entity->getId())));
        }

        return $this->render('ControlBundle:TipoMovimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TipoMovimiento entity.
     *
     * @param TipoMovimiento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoMovimiento $entity)
    {
        $form = $this->createForm(new TipoMovimientoType(), $entity, array(
            'action' => $this->generateUrl('admin_tipoMovimiento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoMovimiento entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoMovimiento();
        $form   = $this->createCreateForm($entity);

        return $this->render('ControlBundle:TipoMovimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoMovimiento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:TipoMovimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoMovimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlBundle:TipoMovimiento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoMovimiento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:TipoMovimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoMovimiento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlBundle:TipoMovimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TipoMovimiento entity.
    *
    * @param TipoMovimiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoMovimiento $entity)
    {
        $form = $this->createForm(new TipoMovimientoType(), $entity, array(
            'action' => $this->generateUrl('admin_tipoMovimiento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoMovimiento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:TipoMovimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoMovimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_tipoMovimiento_edit', array('id' => $id)));
        }

        return $this->render('ControlBundle:TipoMovimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TipoMovimiento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ControlBundle:TipoMovimiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoMovimiento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_tipoMovimiento'));
    }

    /**
     * Creates a form to delete a TipoMovimiento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_tipoMovimiento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
