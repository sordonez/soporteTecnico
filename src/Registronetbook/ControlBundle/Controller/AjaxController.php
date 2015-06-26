<?php

namespace Registronetbook\ControlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Registronetbook\ControlBundle\Entity\Usuario;
use Registronetbook\ControlBundle\Form\UsuarioType;

/**
 * Usuario controller.
 *
 */
class AjaxController extends Controller
{

    /**
     * Lists all Usuario entities.
     *
     */
    public function indexAction()
    {
        //$this->getRequest()->isXmlHttpRequest();

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ControlBundle:Usuario')->findAll();

        return $this->render('ControlBundle:Usuario:selectUsuario.html.twig', array(
            'entities' => $entities,
        ));
    }
}
    