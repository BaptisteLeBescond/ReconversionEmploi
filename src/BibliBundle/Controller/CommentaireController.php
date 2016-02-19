<?php

namespace BibliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BibliBundle\Entity\Commentaire;

class CommentaireController extends Controller
{
    public function indexAction()
    {
		$em = $this->container->get('doctrine')->getEntityManager();

		$commentaires = $em->getRepository('BibliBundle:Commentaire')->findAll();

		return $this->container->get('templating')->renderResponse('BibliBundle:bibliotheque.html.twig', 
			array(
				'commentaires' => $commentaires
		 	));
    }
}
