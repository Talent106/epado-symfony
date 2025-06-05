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

class CemeteryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder  
            ->add('name', 'text',array('label'=>'Nazwa cmentarza',  'attr'=>array(), 'mapped' => true, 'required'=>true,   ))  
            ->add('address', new \AppBundle\Type\AddressType(), array('validation_groups'=>$options['validation_groups'], 'type'=>'page_address')) 
            ->add('localisation', new \AppBundle\Type\LocalisationType(), array('validation_groups'=>$options['validation_groups']))        
            ->add('save', 'submit', array('label' => 'Zapisz', 'attr'=>array('class'=>'') ));
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Cemetery',
            'cascade_validation'=>true,
            'validation_groups'=> array(),
            'locales' => array('pl'),
            'default_locale' => 'pl',
            'translator'=> null,
        ));
    }
    
    public function getName()
    {
        return 'cemetery';
    }
}