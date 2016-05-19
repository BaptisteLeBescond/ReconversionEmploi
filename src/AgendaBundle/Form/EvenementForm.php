<?php

namespace AgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use AgendaBundle\Evenement;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextAreaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EvenementForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder
            ->add('titre', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
            ->add('date', DateType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
            ->add('description', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
        ;
    }
    
    public function getName()
    {
        return 'evenement';
    }    
}