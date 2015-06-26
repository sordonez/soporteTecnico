<?php

namespace Registronetbook\ControlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Registronetbook\ControlBundle\Entity\entrada;
use Registronetbook\ControlBundle\Form\entradaType;

/**
 * .
 * Desarrollado por Sebastian Ordoñez
 *
 */
class MovimientoQueryController extends Controller
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
        $repository = $em->getRepository('ControlBundle:Movimiento');
        $dql = 
            "SELECT
                m.linea AS N°,
                m.app_user AS Usuario, 
                (SELECT mq.descripcion WHERE m.maquina = mq.id FROM Maquina mq) AS Serie,
                (SELECT t.descripcion WHERE m.tipoMovimiento = t.id FROM Movimiento t) AS Movimiento,
                (SELECT u.descripcion WHERE m.ubicacion = u.id FROM Ubicacion u) AS Ubicacion,
                (SELECT p.descripcion WHERE m.problema = p.id FROM Problema p) AS Problema,
                (SELECT e.descripcion WHERE m.estado = e.id FROM Estado e) AS Estado,
                m.fecha AS Fecha
            WHERE m.maquina = (SELECT mq.id 
                                WHERE (mq.serie LIKE %:postData%)
                                OR  mq.usuario = (SELECT u.id 
                                                WHERE (u.dni = :postData) 
                                                OR  (u.nombre LIKE %:postData%) 
                                                FROM Usuario u)
                                FROM Maquina mq)
            FROM Movimiento m";

        $entities = $entityManager->createQuery($dql)
            ->setParameter('postData', $postData)
            ->getResult();

        return $this->render('ControlBundle:entrada:index.html.twig', array(
            'entities' => $entities,
        ));
    }
}