<?php

namespace BibliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BibliBundle\Entity\Document;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

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

	    $em = $this->container->get('doctrine')->getEntityManager();
    	$document = $em->getRepository('BibliBundle:Document')->findOneBy(
			array('path' => $filename, 'candidat' => $this->getUser())
		);
		if ( $document->getEtat() < 2 ) {
			$document->setEtat(2);
    		$em->flush();
		}

	    return $response;
    }

    public function uploadAction($document_id)
    {
    	if ($_FILES['file']['error'] > 0)

    		return;

    	else {

    		$em = $this->container->get('doctrine')->getEntityManager();
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

					return "YEAH";
				}
				else {
					return;
				}

			} else {

				return;
			}
    	}

    	return var_dump($_FILES['file']);
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
}
