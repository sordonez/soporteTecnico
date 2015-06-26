<?php

namespace Registronetbook\ControlBundle\Controller;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Doctrine\ORM\Query\ResultSetMapping;

/**
 * .
 * Desarrollado por Sebastian Ordoñez
 *
 */
class UsuarioqueryController extends Controller
{
    /**
     * lista las entrada que conincide con el parametro
     *
     */
    public function searchAction()
    {
        $request = $this->getRequest();
        
        $postData = $request->request->get('parameter');
        $logger = $this->get('logger');
        $logger->info('logsdata:'.$postData);
        $sql = 
            'SELECT
                u.id ,
                u.nombre,
                u.dni,
                u.direccion,
                u.descripcion,
                u.tipo
            FROM ControlBundle:Usuario u
            WHERE u.nombre LIKE :postData
            OR u.dni = :dni';
            
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery($sql)
            ->setParameter('postData', '%'.$postData.'%')
            ->setParameter('dni', $postData);
        $entities = $query->getResult();
        return $this->render('ControlBundle:Usuario:selectUsuario.html.twig', array(
            'entities' => $entities,));
    }
}