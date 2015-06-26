<?php

namespace Registronetbook\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Registronetbook\UserBundle\Form\Type\RegistrationType;
use Registronetbook\UserBundle\Form\Model\Registration;

use Symfony\Component\HttpFoundation\Request;

class AccountController extends Controller
{
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'UserBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }

    public function createAction(Request $request)
	{
	    $em = $this->getDoctrine()->getManager();

	    $form = $this->createForm(new RegistrationType(), new Registration());

	    $form->handleRequest($request);

	    if ($form->isValid()) {
	        $registration = $form->getData();

	        $em->persist($registration->getUser());
	        $em->flush();

	        //return $this->redirectToRoute($this->generateUrl('maquina'));
	        return new RedirectResponse($this->generateUrl('maquina'));
	    }

	    return $this->render(
	        'UserBundle:Account:register.html.twig',
	        array('form' => $form->createView())
	    );
	}
}