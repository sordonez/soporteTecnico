<?php

namespace Registronetbook\ControlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Registronetbook\ControlBundle\Entity\Ubicacion;
use Registronetbook\ControlBundle\Form\UbicacionType;

/**
 * Ubicacion controller.
 *
 */
class UbicacionController extends Controller
{

    /**
     * Lists all Ubicacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ControlBundle:Ubicacion')->findAll();

        return $this->render('ControlBundle:Ubicacion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Ubicacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Ubicacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_ubicacion_show', array('id' => $entity->getId())));
        }

        return $this->render('ControlBundle:Ubicacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Ubicacion entity.
     *
     * @param Ubicacion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Ubicacion $entity)
    {
        $form = $this->createForm(new UbicacionType(), $entity, array(
            'action' => $this->generateUrl('admin_ubicacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Ubicacion entity.
     *
     */
    public function newAction()
    {
        $entity = new Ubicacion();
        $form   = $this->createCreateForm($entity);

        return $this->render('ControlBundle:Ubicacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ubicacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:Ubicacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ubicacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlBundle:Ubicacion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ubicacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:Ubicacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ubicacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlBundle:Ubicacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Ubicacion entity.
    *
    * @param Ubicacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Ubicacion $entity)
    {
        $form = $this->createForm(new UbicacionType(), $entity, array(
            'action' => $this->generateUrl('admin_ubicacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Ubicacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:Ubicacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ubicacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_ubicacion_edit', array('id' => $id)));
        }

        return $this->render('ControlBundle:Ubicacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Ubicacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ControlBundle:Ubicacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ubicacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_ubicacion'));
    }

    /**
     * Creates a form to delete a Ubicacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_ubicacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
