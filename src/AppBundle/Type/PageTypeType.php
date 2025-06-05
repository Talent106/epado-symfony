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

class PageTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder  
            ->add('translations', 'a2lix_translations', array(
                'locales' => $options['locales'],   
                'label' => 'Tłumaczenie',   
                'required_locales' => array($options['default_locale']),   
                'default_locale' => $options['default_locale'],  
                'fields' => array(                     
                    'name' => array(                  
                        'field_type' => 'text',                
                        'label' => 'Nazwa',  
                        'required' => false,
                    ),
                    'description' => array(                  
                        'field_type' => 'hidden',                
                        'label' => 'Opis',  
                        'required' => false,
                    ),   
                
                )     
            ))      
            ->add('save', 'submit', array('label' => 'Zapisz', 'attr'=>array('class'=>'') ));
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PageType',
            'cascade_validation'=>true,
            'locales' => array('pl'),
            'default_locale' => 'pl',
            'translator'=> null,
        ));
    }
    
    public function getName()
    {
        return 'page_type';
    }
}