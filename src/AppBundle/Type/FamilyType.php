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

class FamilyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder  
            ->add('name', 'text',array('label'=>'Nazwa rodziny',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))    
            ->add('description', 'textarea',array('label'=>'Opis rodziny',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))     
            ->add('save', 'submit', array('label' => 'Zapisz', 'attr'=>array('class'=>'') ));
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Family',
            'cascade_validation'=>true,
            'locales' => array('pl'),
            'default_locale' => 'pl',
            'translator'=> null,
        ));
    }
    
    public function getName()
    {
        return 'family';
    }
}