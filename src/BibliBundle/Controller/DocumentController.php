<?php

namespace BibliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BibliBundle\Entity\Document;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;

class DocumentController extends Controller
{
    public function indexAction($message = null) {

    	if ( !$this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN') ) {

    		$documents = $this->getUserDocuments();

			return $this->container->get('templating')->renderResponse('BibliBundle:Default:index.html.twig',
				array(
					'documents' => $documents,
					'message'	=> $message
			 	));
    	} else {

    		return $this->container->get('templating')->renderResponse('BibliBundle:Default:index.html.twig',
				array(
					'documents' => array(),
					'message'	=> "Vous devez sélectionner un candidat."
			 	));
    	}
    }

    public function indexConseillerAction($candidat_id, $message = null) {

    	if ( $this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN') && $this->isLinkedCandidate($candidat_id) ) {

			$documents = $this->getUserDocuments($candidat_id);

			return $this->container->get('templating')->renderResponse('BibliBundle:Default:indexConseiller.html.twig', 
				array(
					'documents' => $documents,
					'message'	=> $message,
					'candidat' => $candidat_id,
					'candidatName' => $this->getCandidatName($candidat_id)
			 	));
		} else {

			return $this->container->get('templating')->renderResponse('BibliBundle:Default:indexConseiller.html.twig', 
				array(
					'documents' => array(),
					'message' => "Vous n'êtes pas autorisé à accéder à cette page.",
					'candidat' => $candidat_id,
					'candidatName' => $this->getCandidatName($candidat_id)
			 )); 
		}
	}

	private function getCandidatName($candidat_id) {

    	$em = $this->container->get('doctrine')->getManager();
    	$candidat = $em->getRepository('UserBundle:User')->findOneBy(
			array('id' => $candidat_id)
		);

		return $candidat->getPrenom() . ' ' . $candidat->getNom();
    }

    public function downloadAction($filename) {

    	$baseDocsPath = $this->getDocsPath();
		$usersDocsPath = $this->getDocsPath('users');

    	if ( file_exists($usersDocsPath . $filename) )
	    	$content = file_get_contents($usersDocsPath . $filename);
	    else
	    	$content = file_get_contents($baseDocsPath . $filename);

	    $response = new Response();
	    $response->headers->set(
           'Content-Type',
           'application/force-download'
       	);
	    $response->headers->set('Content-Disposition', 'filename="' . $filename);
	    $response->setContent($content);

	    $em = $this->container->get('doctrine')->getManager();
    	$document = $em->getRepository('BibliBundle:Document')->findOneBy(
			array('path' => $filename, 'candidat' => $this->getUser())
		);
		if ( $document->getEtat() < 2 ) {
			$document->setEtat(2);
    		$em->flush();
		}

	    return $response;
    }

    public function downloadConseillerAction($candidat_id, $filename) {

    	$baseDocsPath = $this->getDocsPath();
		$usersDocsPath = $this->getDocsPath('users');

    	if ( file_exists($usersDocsPath . $filename) )
	    	$content = file_get_contents($usersDocsPath . $filename);
	    else
	    	$content = file_get_contents($baseDocsPath . $filename);

	    $response = new Response();
	    $response->headers->set(
           'Content-Type',
           'application/pdf'
       	);
	    $response->headers->set('Content-Disposition', 'filename="' . $filename);
	    $response->setContent($content);

	    $em = $this->container->get('doctrine')->getManager();
    	$document = $em->getRepository('BibliBundle:Document')->findOneBy(
			array('path' => $filename, 'candidat' => $candidat_id)
		);
		if ( $document->getEtat() < 2 ) {
			$document->setEtat(2);
    		$em->flush();
		}

	    return $response;
    }

    public function uploadAction($document_id) {

    	if ($_FILES['file']['error'] > 0 || empty($_FILES) )

			return $this->indexAction("Une erreur est survenue lors de l'envoi du document.");

    	else {

    		$em = $this->container->get('doctrine')->getManager();
	    	$document = $em->getRepository('BibliBundle:Document')->findOneBy(
				array('id' => $document_id, 'candidat' => $this->getUser())
			);

			if ( count($document) > 0) {

				if ( move_uploaded_file($_FILES['file']['tmp_name'], $this->getDocsPath('users') . $document->getPath()) ) {

					if ( $document->getEtat() < 3 )
						$document->setEtat(3);
					$version = $document->getVersion();
					$document->setVersion($version += 1);
					$em->flush();

					return $this->indexAction("Document envoyé avec succès.");
				}
				else
					return $this->indexAction("Une erreur est survenue lors de l'envoi du document.");
			} else
				return $this->indexAction("Une erreur est survenue lors de l'envoi du document.");
    	}
    }

    public function validateAction($candidat_id, $document_id) {

    	$em = $this->container->get('doctrine')->getManager();
    	$document = $em->getRepository('BibliBundle:Document')->findOneBy(
			array('id' => $document_id)
		);

		if ( $document->getEtat() < 4 ) {
			$document->setEtat(4);
    		$em->flush();
		}

		return $this->indexConseillerAction($candidat_id);
    }

    public function restoreAction($candidat_id, $document_id) {

    	$em = $this->container->get('doctrine')->getManager();
    	$candidat = $em->getRepository('UserBundle:User')->findOneBy(
			array('id' => $candidat_id)
		);
    	$document = $em->getRepository('BibliBundle:Document')->findOneBy(
			array('id' => $document_id)
		);
		$baseDocPath = explode('_', $document->getPath());
    	$baseDocument = $em->getRepository('BibliBundle:Document')->findOneBy(
			array('path' => $baseDocPath[count($baseDocPath) - 1], 'candidat' => null)
		);

    	$fs = new Filesystem();
    	$fs->copy($this->getDocsPath() . $baseDocument->getPath(), $this->getDocsPath('users') . $document->getPath(), true);
		$document->setEtat(0);
		$document->setVersion(0);
		$em->flush();

    	return $this->indexConseillerAction($candidat_id);
    }

    private function getUserDocuments($candidat_id = null) {

    	$em = $this->container->get('doctrine')->getManager();

    	$userId = is_null($candidat_id) ? $this->getUser() : $candidat_id;

		$userDocuments = $em->getRepository('BibliBundle:Document')->findBy(
			array('candidat' => $userId)
		);

		if ( count($userDocuments) == 0 )	{

			$this->createUserDocuments($em);
			return $em->getRepository('BibliBundle:Document')->findBy(
				array('candidat' => $userId)
			);
		} else {
			
			foreach ( $userDocuments as $doc ) {

				$lastCom = $em->getRepository('BibliBundle:Commentaire')->findOneBy(
					array('document' => $doc), array('id' => 'desc')
				);
				
				if ( !empty($lastCom) )
					$doc->setLastCom($lastCom);
			}

			return $userDocuments;
		}
    }

    private function createUserDocuments($em) {

    	$baseDocuments = $em->getRepository('BibliBundle:Document')->findBy(
			array('candidat' => null)
		);
		
		$baseDocsPath = $this->getDocsPath();
		$usersDocsPath = $this->getDocsPath('users');
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

    private function getDocsPath($directory = null) {

    	if ( $directory == 'users' )
    		return $_SERVER["DOCUMENT_ROOT"] . 'ReconversionEmploi/web/documents/users/';
    	else
    		return $_SERVER["DOCUMENT_ROOT"] . 'ReconversionEmploi/web/documents/originaux/';
    }

    private function isLinkedCandidate($candidat_id) {

    	$em = $this->container->get('doctrine')->getManager();
    	$candidat = $em->getRepository('UserBundle:User')->findOneBy(
			array('id' => $candidat_id)
		);

		return $candidat->getUser()->getId() == $this->getUser()->getId();
    }
}
