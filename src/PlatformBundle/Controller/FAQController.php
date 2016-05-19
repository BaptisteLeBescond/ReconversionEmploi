<?php

namespace PlatformBundle\Controller;

use PlatformBundle\Entity\Questions_FAQ;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class FAQController extends Controller
{
    public function indexAction()
    {
		
    	$em = $this->container->get('doctrine')->getManager();
		$Questions = $em->getRepository('PlatformBundle:Questions_FAQ')->findAll();
		
        return $this->render('PlatformBundle:Default:faq.html.twig', array('Questions' => $Questions));
    }
	
    public function delete_questionAction($id){
		
			$em = $this->container->get('doctrine')->getEntityManager();
			$question = $em->find('PlatformBundle:Questions_FAQ', $id);
				
	
				
			$em->remove($question);
			$em->flush();        

			return $this->redirectToRoute('faq');
		
		
	}
	
	public function modify_questionAction($id = null, Request $request){
		
		
		$em = $this->container->get('doctrine')->getEntityManager();
		if (isset($id)) 
			{
				// modification d'un patient existant : on recherche ses données
				$question = $em->find('PlatformBundle:Questions_FAQ', $id);
			
				 $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $question);
				 $formBuilder
				  ->add('title', TextType::class, array('label'=>'Titre'))
				  ->add('content', TextType::class, array('label'=>'Contenu'))
				  ->add('Modifier', SubmitType::class, array('label'=>'Modifier'))

				;
						  $form = $formBuilder->getForm();
		  
					  if ($request->isMethod('POST')) {
						   
						   $form->handleRequest($request);
							if ($form->isValid()) {
								
								  $em = $this->getDoctrine()->getManager();
								  $em->persist($question);
								  $em->flush();
								
							}
						$request->getSession()->getFlashBag()->add('notice', 'Question bien enregistrée.');
						return $this->redirectToRoute('faq');
						}
				return $this->render('PlatformBundle:Default:add.html.twig', array(
		  'form' => $form->createView(),
			));
	
		}
	
	}
	
	
	public function add_questionAction(Request $request)
	{
		
		  $Questions_FAQ = new Questions_FAQ();
		  $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $Questions_FAQ);
		  $formBuilder
			  ->add('title', TextType::class, array('label'=>'Titre'))
			  ->add('content', TextType::class, array('label'=>'Contenu'))
			  ->add('Ajouter', SubmitType::class, array('label'=>'Ajouter'))

			;
		
		
		  $form = $formBuilder->getForm();
		  
		  if ($request->isMethod('POST')) {
			   
			   $form->handleRequest($request);
			    if ($form->isValid()) {
					
					  $em = $this->getDoctrine()->getManager();
					  $em->persist($Questions_FAQ);
					  $em->flush();
					
				}
			$request->getSession()->getFlashBag()->add('notice', 'Question bien enregistrée.');
			return $this->redirectToRoute('faq');
			   
	   }
		
		return $this->render('PlatformBundle:Default:add.html.twig', array(
		  'form' => $form->createView(),
			));
		
	}
}
