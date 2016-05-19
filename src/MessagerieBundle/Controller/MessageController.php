<?php

namespace MessagerieBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// namespace ReconversionEmploi\src\MessagerieBundle\Entity;
// use ReconversionEmploi\src\MessagerieBundle\Entity;
	use MessagerieBundle\Entity\Message;
	use UserBundle\Entity\User;

class MessageController extends Controller
{
    
	public function ajouterAction()
	{
		$repository = $this->getDoctrine()->getRepository('UserBundle:User');
		$users = $repository->findAll();
		$tabId = [];
		$tabName = [];
		// foreach($users as $user){
			// $tabId[] = $user->getId();
		// }
        $userCourant = $this->getUser();
        $id = $userCourant->getId();
        $idUser = $userCourant->getUser();
        if($idUser==null)
        {
            foreach($users as $user){
               $tabName[] = $user->getNom();
               $tabId[] = $user->getId();
            }
        }
        else{
            foreach($users as $user)
            {
                if($user->getUser()==null)
                    $tabName[] = $user->getNom();
                    $tabId[] = $user->getId();
            }
        }
		//$user = $repository->find($id);
		$message = new Message();
		return $this->render('MessagerieBundle:Message:form.html.twig',
			array(
				'tabId' => $tabId,
				'tabName' => $tabName,
			)
		);
	}
    public function envoiAction()
    {
        var_dump($_POST);
        $sujet = $_POST['sujet'];
        $idDestinataire = $_POST['destinataire'];
        $id = $this->getUser()->getId();
        $corps = $_POST['corps'];
        
        

        $message = new Message();
        $message->setIdDestinataire($idDestinataire);
        $message->setIdAuteur($id);
        $message->setSujet($sujet);
        $message->setCorps($corps);
        $em =  $this->container->get('doctrine')->getEntityManager();
        $em->persist($message);
        $em->flush();
        //$messageInfo = 'gg';
        return $this->redirectToRoute('messagerie_recu');
        
    }
    public function recuAction()
    { 
        $id = $this->getUser()->getId();

        $em =  $this->container->get('doctrine')->getEntityManager();
        $messages = $em->getRepository('MessagerieBundle:Message')->findBy(array('idDestinataire'=>$id));
        $tabSujet = [];
        $tabAuteur = [];
        $tabCorps = [];
        $tabIdAuteur = [];
        foreach($messages as $message)
        {
                $tabSujet[] = $message->getSujet();
                $tabCorps[] = $message->getCorps();
                $idAuteur = $message->getIdAuteur();
                $tabIdAuteur[] = $idAuteur;
                $userAuteur = $em->getRepository('UserBundle:User')->findBy(array('id'=>$idAuteur));
                $tabAuteur[] =  $userAuteur[0]->getPrenom().' '.$userAuteur[0]->getNom();;
        }
        return $this->render('MessagerieBundle:Message:recu.html.twig',
			array(
				'tabSujet' => $tabSujet,
				'tabAuteur' => $tabAuteur,
				'tabCorps' => $tabCorps,
				'tabIdAuteur' => $tabIdAuteur,
			)
		);
    }
	
	public function envoyeAction()
   {
       $id = $this->getUser()->getId();
       $em =  $this->container->get('doctrine')->getEntityManager();
       $messages = $em->getRepository('MessagerieBundle:Message')->findBy(array('idAuteur'=>$id));
       $tabSujet = [];
       $tabCorps = [];
       $tabDestinataire = [];
       foreach($messages as $message)
       {
               $tabSujet[] = $message->getSujet();
               $tabCorps[] = $message->getCorps();
               $idDestinataire = $message->getIdDestinataire();
               $userDestinataire = $em->getRepository('UserBundle:User')->findBy(array('id'=>$idDestinataire));
               $tabDestinataire[] =  $userDestinataire[0]->getPrenom().' '.$userDestinataire[0]->getNom();
       }
       return $this->render('MessagerieBundle:Message:envoye.html.twig',
            array(
                'tabSujet' => $tabSujet,
                'tabDestinataire' => $tabDestinataire,
                'tabCorps' => $tabCorps,
            )
        );
   }
		
}

