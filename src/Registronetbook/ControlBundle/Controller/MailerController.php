<?php

namespace Registronetbook\ControlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * 
 * Desarrollado por Sebastian Ordoñez
 *
 */
class mailerController extends Controller
{
    public function indexAction($maquina,$usuario)
    {
        $destinatario = $usuario.getEmail();
        $message = \Swift_Message::newInstance()
            ->setSubject('Soporte Tecnico Agrotecnica N° 4')
            ->setFrom('sebas.29.8@gmail.com')
            ->setTo($destinatario)
            ->setBody(
                $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                    'Emails/maquinaMail.html.twig',
                    array('maquina' => $maquina),
                    array('usuario' => $usuario)
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        $this->get('mailer')->send($message);
        /*
        if ($mailer->send($message))
        {
            echo "Mensaje enviado correctamente";
        }
        else
        {
            echo "Mensaje fallido";
        }
        }
        */
        //return $this->render(...);
    }
}