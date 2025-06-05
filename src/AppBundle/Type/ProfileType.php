<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('first_name', 'text',array('label'=>'Imię')) 
        ->add('last_name', 'text',array('label'=>'Nazwisko')) 
        ->add('new_password', 'password',array('mapped' => false, 'required'=>false, 'label'=>'Nowe hasło'))  
        ->add('file', 'file', array( 'label' => 'Dodaj zdjęcie profilowe', 'required' => false ))       
        ->add('save', 'submit', array('label' => 'Zapisz')); 
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
            'validation_groups' => array(
                'update'
            ),
        ));
    }
    
    public function getName()
    {
        return 'user';
    }
}