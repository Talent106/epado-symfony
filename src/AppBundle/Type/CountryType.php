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

class CountryType extends AbstractType
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
                    ),
                )     
            ))      
            ->add('code', 'text',array('label'=>'Kod kraju',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))  
            ->add('page', 'checkbox',array('required'=>false,'label'=>'Dostępny jako lokalizacja strony'))      
            ->add('delivery', 'checkbox',array('required'=>false,'label'=>'Dostępny w danych do dostawy'))      
            ->add('billing', 'checkbox',array('required'=>false,'label'=>'Dostępny w danych bilingowych'))        
            ->add('save', 'submit', array('label' => 'Zapisz', 'attr'=>array('class'=>'') ));
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Country',
            'cascade_validation'=>true,
            'locales' => array('pl'),
            'default_locale' => 'pl',
            'translator'=> null,
        ));
    }
    
    public function getName()
    {
        return 'country';
    }
}