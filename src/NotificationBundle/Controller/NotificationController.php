<?php

namespace NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NotificationBundle\Entity\Notification;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NotificationController extends Controller
{
    public function indexAction()
    {
		
		$em = $this->container->get('doctrine')->getEntityManager();

		$notification= $em->getRepository('NotificationBundle:Notification')->findAll();
		
		$new= $em->getRepository('NotificationBundle:Notification')->findBy(
											array('statut' => 0)
											);
											
        $countNewNotifications = count($new);


		return $this->container->get('templating')->renderResponse('NotificationBundle:Notification:index.html.twig', 
		array(
		'notification' => $notification,
		'countNewNotifications'=>  $countNewNotifications
		));
		
    }
	
	public function markAsReadAction(){
		 
		$data= $_POST["data"];
		 $em = $this->getDoctrine()->getManager();

		$qb = $em->createQueryBuilder();
		
		foreach ($data as $id_notif) {
			$q=$qb->update('NotificationBundle:Notification', 'n')
			   ->set('n.statut', '1')	
			   ->where('n.id='.$id_notif)
			   ->getQuery();
			 $p=$q->execute();
		}

  		$new= $em->getRepository('NotificationBundle:Notification')->findBy(
  																			array('statut' => 0));
											
        $countNewNotifications = count($new);

		return $this->redirectToRoute("notification_homepage", array(
        	'countNewNotifications'=>  $countNewNotifications
		));
		
	}
}