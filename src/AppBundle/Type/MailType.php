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

class MailType extends AbstractType
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
                    'subject' => array(                  
                        'field_type' => 'text',                
                        'label' => 'Temat maila',                    
                    ),
                    'mail' => array(                  
                        'field_type' => 'textarea',              
                        'label' => 'Wiadomość email', 
                        'required' => false,
                        'attr' => array('class'=>'long'),
                        'locale_options' => array(      
                        )
                    ),
                    'sms' => array(                  
                        'field_type' => 'hidden',  
                    )  
                    
                )
                
                
            ))    
              
            ->add('send_mail', 'checkbox',array('required'=>false, 'label'=>'Wyślij tego maila'))    
            ->add('save', 'submit', array('label' => 'Zapisz'));
        
        //var_dump($options['validation_groups']); die();SiteBundle
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Mail',
            'locales' => array('pl'),
            'default_locale' => 'pl',
            'translator'=> null,
            'validation_groups' => array(
                'registration'
            ),
        ));
    }
    
    public function getName()
    {
        return 'mail';
    }
}