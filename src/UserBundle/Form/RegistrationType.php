<?php 

// src/UserBundle/Form/RegistrationType.php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('civilite', ChoiceType::class, array(
			 'choices' => array('Madame' => 'madame', 'Monsieur' => 'monsieur'),
            'expanded' => true,
			'label'=>'Civilité*'
        ))
		->add('en_poste', ChoiceType::class, array('choices' => array('En Veille' => 'en_veille ', 'En Recherche' => 'en_recherche', 'En CDD' => 'en_cdd', 'En CDI' => 'en_cdi' , 'En Interim' => 'en_interim'),
			 'expanded' => true,
			 'multiple' => true ))
			 
	    ->add('en_recherche', ChoiceType::class, array(
			 'choices' => array('Oui' => 'oui', 'Non' => 'non'),
			  "required" => false,
			  'expanded' => true,
			 'label'=>'Pole Emploi'
        ))
        ->add('naissance', DateType::class, array('label'=>'Date de Naissance*'))
        ->add('adresse',TextType::class, array('label'=>'Adresse*'))
        ->add('postal',IntegerType::class, array('label'=>'Code Postal*'))
        ->add('ville',TextType::class, array('label'=>'Ville*'))
		->add('nom',TextType::class)
		->add('prenom',TextType::class)
        ->add('telephone',IntegerType::class, array('label'=>'Téléphone*'))
        ->add('projet',TextAreaType::class, array('label'=>'Votre Projet*'))
        ->add('attentes', TextAreaType::class, array('label'=>'Vos Attentes*'))
        // ->add('fonction')
        ->add('fonction', TextType::class, array('label'=>'Fonction'))
        ->add('csp', ChoiceType::class, array(
            'choices' => array('Employé' => 'employe', 'Agent de maitrise' => 'agent_maitrise', 'Technicien' => 'technicien', 'Cadre' => 'cadre', 'Ingénieur' => 'ingenieur')))
        ->add('experience', IntegerType::class, array('label'=>'Années d\'experience'))
        ->add('etudes', ChoiceType::class, array(
            'choices' => array('CAP/BEP' => 'cap_bep', 'BAC' => 'bac', 'BAC+2' => 'bac2', 'BAC+3' => 'bac3', 'Supérieur au Bac+3' => 'sup_bac3')))
        ->add('de_nom',TextType::class, array('label'=>'Nom de l\'entreprise'))
        ->add('de_postal',IntegerType::class, array('label'=>'Code Postal'))
        ->add('de_ville',TextType::class,array('label'=>'Ville'))
        ->add('de_taille', ChoiceType::class, array(
            'choices' => array('1 à 9' => 9, '10 à 19' => 19, '20 à 49' => 49, '50 à 249' => 249, '250 à 999' => 999),
			'label' => 'Taille de l\'entreprise'))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}