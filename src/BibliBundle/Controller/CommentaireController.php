<?php

namespace BibliBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BibliBundle\Entity\Commentaire;
use BibliBundle\Form\CommentaireForm;

class CommentaireController extends Controller
{
    public function indexAction($document_id, $message = null) {
		
		$commentaires = $this->getDocumentCommentaires($document_id);

		return $this->container->get('templating')->renderResponse('BibliBundle:Commentaire:index.html.twig', 
			array(
				'commentaires' => $commentaires,
				'document_id'  => $document_id,
				'message'	   => $message
		 	));
    }

    public function addAction($document_id) {

    	if ( isset($_POST['corps']) && !empty($_POST['corps']) ) {

    		$em = $this->container->get('doctrine')->getManager();
  			$document = $this->getDocument($document_id);
			$commentaire = new Commentaire();

			$commentaire->setCorps($_POST['corps']);
			$commentaire->setDocument($document);
			$commentaire->setCandidat($document->getCandidat());
			$commentaire->setConseiller($document->getCandidat()->getUser());
			$commentaire->setCandidat($this->getUser());
			$em->persist($commentaire);
	    	$em->flush();

	    	return $this->indexAction($document_id, "Commentaire ajouté avec succès.");
    	} else
    		return $this->indexAction($document_id, "Echec de l'ajout du commentaire.");
    }

    public function answerAction($document_id, $commentaire_id) {

		if ( isset($_POST['corps']) && !empty($_POST['corps']) ) {

    		$em = $this->container->get('doctrine')->getManager();
    		$document = $this->getDocument($document_id);
    		$commentairePere = $this->getCommentaire($commentaire_id);
			$commentaire = new Commentaire();

			$commentaire->setCorps($_POST['corps']);
			$commentaire->setDocument($document);
			$commentaire->setCandidat($document->getCandidat());
			$commentaire->setConseiller($document->getCandidat()->getUser());
			$commentaire->setCommentairePere($commentairePere);
			$em->persist($commentaire);
	    	$em->flush();

	    	return $this->redirectToRoute('commentaires', array('document_id' => $document_id));
    	} else
    		return $this->indexAction($document_id, "Echec de l'ajout du commentaire.");
    }

    public function removeAction($document_id, $commentaire_id) {

		$em = $this->container->get('doctrine')->getManager();
	  	$commentaire = $em->find('BibliBundle:Commentaire', $commentaire_id);
	  	
	  	if ( $commentaire ) {

	  		$em->remove($commentaire);
	  		$em->flush();

	  		return $this->indexAction($document_id, "Commentaire supprimé avec succès.");
	  	} else
			return $this->indexAction($document_id, "Commentaire non trouvé.");
    }

    private function getDocumentCommentaires($document_id) {

    	$em = $this->container->get('doctrine')->getManager();
    	$document = $this->getDocument($document_id);

    	$baseCommentaires = $em->getRepository('BibliBundle:Commentaire')->findBy(
			array('document' => $document, 'commentairePere' => null)
		);

		foreach ($baseCommentaires as $commentaire) {
			$enfants = $em->getRepository('BibliBundle:Commentaire')->findBy(
				array('commentairePere' => $commentaire->getId())
			);
			if ( !empty($enfants) )
				$commentaire->setEnfants($enfants);

			//var_dump($commentaire);
		}

		return $baseCommentaires;
    }

    private function getDocument($document_id) {

    	$em = $this->container->get('doctrine')->getManager();
    	return $em->getRepository('BibliBundle:Document')->findOneBy(
			array('id' => $document_id)
		);
    }

    private function getCommentaire($commentaire_id) {

    	$em = $this->container->get('doctrine')->getManager();
    	return $em->getRepository('BibliBundle:Commentaire')->findOneBy(
			array('id' => $commentaire_id)
		);
    }

    private function getDocumentCandidat($document) {

    	$em = $this->container->get('doctrine')->getManager();
    	$candidat = $em->getRepository('UserBundle:User')->findOneBy(
			array('document' => $document)
		);

		return array(
			'full_document' => $document,
			'candidat_id' => $document[0]->getCandidat(),
			'conseiller_id' => 0
		);
    }
}
