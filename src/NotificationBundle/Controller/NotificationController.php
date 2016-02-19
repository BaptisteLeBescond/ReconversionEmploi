<?php

namespace NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller
use NotificationBundle\Entity\Notification;

class NotificationController extends Controller
{
    public function indexAction()
    {
        return $this->render('NotificationBundle:Notification:index.html.twig');
    }
	
	public function ListeNotificationAction(){
		
		
	}
}