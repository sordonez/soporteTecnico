<?php

namespace Registronetbook\ControlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Registronetbook\ControlBundle\Entity\entrada;
use Registronetbook\ControlBundle\Form\entradaType;

/**
 * entrada controller.
 * Desarrollado por Sebastian Ordoñez
 *
 */
class busquedasController extends Controller
{
    /**
     * lista las entrada que conincide con el parametro
     *
     */
    public function searchAction()
    {
        $request = $this->getRequest();
        $postData = $request->request->get('buscar');

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ControlBundle:entrada');

        $query = $repository->createQueryBuilder('e')
            ->where('e.codigo LIKE :codigo')
            ->setParameter('codigo',"%".$postData."%")
            ->getQuery();
        $entities = $query->getResult();

        return $this->render('ControlBundle:entrada:index.html.twig', array(
            'entities' => $entities,
        ));
    }

        /**
     * Creates a new entrada entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new entrada();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('entrada_show', array('id' => $entity->getId())));
        }

        return $this->render('ControlBundle:entrada:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a entrada entity.
     *
     * @param entrada $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(entrada $entity)
    {
        $form = $this->createForm(new entradaType(), $entity, array(
            'action' => $this->generateUrl('busqueda_create'),
            'method' => 'POST',
            'attr'  => array('class' => 'form-horizontal'),
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new entrada a partir de otra entity.
     *
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlBundle:entrada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entrada entity.');
        }

        $form   = $this->createCreateForm($entity);

        return $this->render('ControlBundle:entrada:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

}