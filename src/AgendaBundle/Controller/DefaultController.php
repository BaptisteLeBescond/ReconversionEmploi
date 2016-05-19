<?php

namespace AgendaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AgendaBundle\Entity\Evenement;
use Symfony\Component\HttpFoundation\Request;
use AgendaBundle\Form\EvenementForm;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->container->get('doctrine')->getEntityManager();
        $evenements = $em->getRepository('AgendaBundle:Evenement')->findBy(array('user' => $user));
        // var_dump($evenements);
        return $this->render('AgendaBundle:Default:index.html.twig', array('evenements' => $evenements, 'message' => null));
    }

    public function addAction(Request $request)
    {
        $message='';
        $user = $this->getUser();
        $evenement = new Evenement();
        $form = $this->createForm(EvenementForm::class, $evenement);

        if ($request->getMethod() == 'POST') 
        {
            $form->handleRequest($request);

            if ($form->isValid()) 
            {
              $em = $this->container->get('doctrine')->getEntityManager();
              $evenement->setUser($user);
              $em->persist($evenement);
              $em->flush();

              $message='Évenement ajouté avec succès !';
              $em = $this->container->get('doctrine')->getEntityManager();
              $evenements = $em->getRepository('AgendaBundle:Evenement')->findBy(array('user' => $user));

              return $this->render('AgendaBundle:Default:index.html.twig', array('evenements' => $evenements, 'message' => $message));
            }
        }

        return $this->container->get('templating')->renderResponse('AgendaBundle:Default:add.html.twig',
        array(
        'form' => $form->createView(),
        'message' => $message,
        ));
    }

    public function addConseillerAction(Request $request, $id)
    {
        $message='';
        $em = $this->container->get('doctrine')->getEntityManager();
        $evenement = $em->getRepository('AgendaBundle:Evenement')->findOneBy(array('id' => $id));

        $user = $this->getUser();
        $conseiller = $user->getUser();
        
        $evenement->setUser($conseiller);
        $em->persist($evenement);
        $em->flush();

        $message='Conseiller invité avec succès !';

        $evenements = $em->getRepository('AgendaBundle:Evenement')->findBy(array('user' => $user));

        return $this->render('AgendaBundle:Default:index.html.twig', array('evenements' => $evenements, 'message' => $message));
    }
}
