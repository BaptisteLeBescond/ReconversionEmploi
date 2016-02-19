<?php

namespace BibliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BibliBundle\Entity\Document;

class DocumentController extends Controller
{
    public function indexAction()
    {
		$em = $this->container->get('doctrine')->getEntityManager();

		//$documentsPath = $_SERVER['DOCUMENT_ROOT'] . 'ReconversionEmploi/src/BibliBundle/Resources/documents';
		//$documentsUrlPath = 

		$documents = $em->getRepository('BibliBundle:Document')->findAll();

		return $this->container->get('templating')->renderResponse('BibliBundle:bibliotheque.html.twig', 
			array(
				'documents' => $documents
		 	));
    }
}
