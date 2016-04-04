<?php

namespace MessagerieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder
            ->add('id_Destinataire', 'choice', array('choices' => array('F'=>'Féminin','M'=>'Masculin')))
            ->add('sujet')
            ->add('corps')
        ;
    }    
}