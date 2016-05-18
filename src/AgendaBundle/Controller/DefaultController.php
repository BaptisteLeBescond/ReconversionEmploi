<?php

namespace AgendaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ReconversionEmploi\AgendaBundle\Evenement;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->container->get('doctrine')->getEntityManager();
        $evenements = $em->getRepository('AgendaBundle:Evenement')->findBy(array('user' => $user));
        // var_dump($evenements);
        return $this->render('AgendaBundle:Default:index.html.twig', array('evenements' => $evenements));
    }
}
