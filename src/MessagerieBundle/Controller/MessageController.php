<?php

namespace MessagerieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MessageController extends Controller
{
    public function ajouterAction()
	{
	  $messageInfo='';
	  $message = new Message();
	  $form = $this->container->get('form.factory')->create(new MessageForm(), $message);

	  $request = $this->container->get('request');

	  if ($request->getMethod() == 'POST') 
	  {
		$form->handleRequest($request);

		if ($form->isValid()) 
		{
		  $em = $this->container->get('doctrine')->getEntityManager();
		  $em->persist($message);
		  $em->flush();
		  $messageInfo='message ajouté avec succès !';
		}
	  }

	  return $this->container->get('templating')->renderResponse(
	'MessagerieBundle:Message:form.html.twig',
	  array(
		'form' => $form->createView(),
		'messageInfo' => $messageInfo,
	  ));
	}
}
