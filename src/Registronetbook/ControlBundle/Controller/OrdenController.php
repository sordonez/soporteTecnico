<?php

namespace Registronetbook\ControlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Common\Collections\ArrayCollection;

use Registronetbook\ControlBundle\Entity\Orden;
use Registronetbook\ControlBundle\Entity\DetalleMovimiento;
use Registronetbook\ControlBundle\Form\OrdenType;

/**
 * Orden controller.
 *
 */
class OrdenController extends Controller
{

    /**
     * Lists all Orden entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ControlBundle:Orden')->findAll();

        return $this->render('ControlBundle:Orden:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Orden entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Orden();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            foreach ($entity->getDetalleMovimiento() as $detalleMovimiento) {
              $em->persist($detalleMovimiento);
            }
            $em->flush();

            return $this->redirect($this->generateUrl('admin_orden_show', array('id' => $entity->getId())));
        }

        return $this->render('ControlBundle:Orden:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Orden entity.
     *
     * @param Orden $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Orden $entity)
    {
        $form = $this->createForm(new OrdenType(), $entity, array(
            'action' => $this->generateUrl('admin_orden_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Orden entity.
     *
     */
    public function newAction()
    {
        $entity = new Orden();
     //   $dm = new DetalleMovimiento();
      //  $entity->getDetalleMovimiento()->add($dm);
        $form   = $this->createCreateForm($entity);


        return $this->render('ControlBundle:Orden:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Orden entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:Orden')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Orden entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlBundle:Orden:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Orden entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:Orden')->find($id);

        $array = $em->getRepository('ControlBundle:DetalleMovimiento')->findBy(array('orden' => $id));
        $detalleMovimiento = new ArrayCollection($array);
        $entity->setDetalleMovimiento($detalleMovimiento);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Orden entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlBundle:Orden:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Orden entity.
    *
    * @param Orden $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Orden $entity)
    {
        $form = $this->createForm(new OrdenType(), $entity, array(
            'action' => $this->generateUrl('admin_orden_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Orden entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $originalmd = $em->getRepository('ControlBundle:DetalleMovimiento')->findBy(array('orden' => $id));
        //$entity = $em->getRepository('ControlBundle:Orden')->find($id);
        //$originalmd = new ArrayCollection($entity->getDetalleMovimiento());
        $detalleMovimiento = new ArrayCollection($originalmd);
        $entity->setDetalleMovimiento($detalleMovimiento);
        $detalleMovimiento = array();
        // Create an array of the current movimientoDetalle objects in the database
        foreach ($entity->getDetalleMovimiento() as $md) {
            $detalleMovimiento[] = $md;
        }
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Orden entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            // filter $originalmd to contain adressess no longer present
            foreach ($entity->getDetalleMovimiento() as $md) {
            //     foreach ($originalmd as $key => $toDel) {
            //         if ($toDel->getId() === $md->getId()) {
            //             unset($originalmd[$key]);
                        $em->persist($md);
            //         }else{
            //         }
            //     }
            }
            $em->flush();
            // remove the relationship between the md and the Task
            //foreach ($originalmd as $md) {
                // remove the Address from the User
            //    $entity->getDetalleMovimiento()->removeElement($md);
                // if you wanted to delete the Address entirely, you can also do that
            //    $em->remove($md);
            //}
            
            //$em->flush();
            $em->persist($entity);

            return $this->redirect($this->generateUrl('admin_orden_edit', array('id' => $id)));
        }

        return $this->render('ControlBundle:Orden:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Orden entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ControlBundle:Orden')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Orden entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_orden'));
    }

    /**
     * Creates a form to delete a Orden entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_orden_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
