<?php

namespace PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlatformController extends Controller
{
    public function getListAction()
    {
    	//$user_id = $this->getUser()->getId();
		$em = $this->getDoctrine()->getManager();
		$candidats = $em->getRepository('UserBundle:User')->findBy(array('user'=> $this->getUser()));

		//var_dump($candidats);
        return $this->render('PlatformBundle:Default:liste.html.twig', array('candidats' => $candidats));
    }
}
