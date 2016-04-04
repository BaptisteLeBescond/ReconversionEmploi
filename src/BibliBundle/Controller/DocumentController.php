<?php

namespace BibliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BibliBundle\Entity\Document;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;

class DocumentController extends Controller
{
    public function indexAction()
    {

		$documents = $this->getUserDocuments();

		return $this->container->get('templating')->renderResponse('BibliBundle:Default:index.html.twig', 
			array(
				'documents' => $documents
		 	));
    }

    public function downloadAction($filename) 
    {
    	//$schema = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		//$webBaseDocsPath = $schema . $_SERVER["SERVER_NAME"] . '/ReconversionEmploi/web/documents/originaux/';

    	$usersDocsPath = $_SERVER["DOCUMENT_ROOT"] . '/ReconversionEmploi/web/documents/users/';
	    $content = file_get_contents($usersDocsPath . $filename);

	    $response = new Response();
	    $response->headers->set(
           'Content-Type',
           'application/pdf'
       	);
	    $response->headers->set('Content-Disposition', 'filename="' . $filename);
	    $response->setContent($content);

	    $em = $this->container->get('doctrine')->getEntityManager();
    	$document = $em->getRepository('BibliBundle:Document')->findOneBy(
			array('path' => $filename, 'candidat' => $this->getUser())
		);
		$document->setEtat(2);
    	$em->flush();

	    return $response;
    }

    private function getUserDocuments() {

    	$em = $this->container->get('doctrine')->getEntityManager();

    	$userId = $this->getUser();

		$userDocuments = $em->getRepository('BibliBundle:Document')->findBy(
			array('candidat' => $userId)
		);

		if ( count($userDocuments) == 0 )	{

			$this->createUserDocuments($em);
			return $em->getRepository('BibliBundle:Document')->findBy(
				array('candidat' => $userId)
			);
		} else {

			return $userDocuments;
		}

    }

    private function createUserDocuments($em) {

    	$baseDocuments = $em->getRepository('BibliBundle:Document')->findBy(
			array('candidat' => null)
		);
		$baseDocsPath = $_SERVER["DOCUMENT_ROOT"] . '/ReconversionEmploi/web/documents/originaux/';
		$usersDocsPath = $_SERVER["DOCUMENT_ROOT"] . '/ReconversionEmploi/web/documents/users/';
		$fs = new Filesystem();

		foreach ( $baseDocuments as $bd ) {
			$filename = $this->getUser() . '_' . uniqid() . '_' . $bd->getPath();
			$document = new Document();
			$document->setTitre($bd->getTitre());
			$document->setDescription($bd->getDescription());
			$document->setEtat($bd->getEtat());
			$document->setRubrique($bd->getRubrique());
			$document->setVersion($bd->getVersion());
			$document->setCandidat($this->getUser());
			$document->setPath($filename);
    		$em->persist($document);
    		$em->flush();
			$fs->copy($baseDocsPath . $bd->getPath(), $usersDocsPath . $filename);
		}
    }
}
