<?php

namespace Registronetbook\ControlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Registronetbook\ControlBundle\Entity\Maquina;
use Registronetbook\ControlBundle\Form\MaquinaType;

/**
 * Maquina controller.
 *
 */
class MaquinaController extends Controller
{

    /**
     * Lists all Maquina entities.
     *
     */
    public function indexAction()
    {
        

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ControlBundle:Maquina')->findAll();

        return $this->render('ControlBundle:Maquina:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Maquina entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Maquina();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_maquina_show', array('id' => $entity->getId())));
        }

        return $this->render('ControlBundle:Maquina:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Maquina entity.
     *
     * @param Maquina $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Maquina $entity)
    {
        $form = $this->createForm(new MaquinaType(), $entity, array(
            'action' => $this->generateUrl('admin_maquina_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Maquina entity.
     *
     */
    public function newAction()
    {
        $entity = new Maquina();
        $form   = $this->createCreateForm($entity);

        return $this->render('ControlBundle:Maquina:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Maquina entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:Maquina')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Maquina entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlBundle:Maquina:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Maquina entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:Maquina')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Maquina entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlBundle:Maquina:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Maquina entity.
    *
    * @param Maquina $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Maquina $entity)
    {
        $form = $this->createForm(new MaquinaType(), $entity, array(
            'action' => $this->generateUrl('admin_maquina_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Maquina entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:Maquina')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Maquina entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_maquina_edit', array('id' => $id)));
        }

        return $this->render('ControlBundle:Maquina:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Maquina entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ControlBundle:Maquina')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Maquina entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_maquina'));
    }

    /**
     * Creates a form to delete a Maquina entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_maquina_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
