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

class OrderStatusType extends AbstractType
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
              
            ->add('send_mail', 'checkbox',array('required'=>false, 'label'=>'Wyślij maila gdy zostanie ustawiony ten status'))    
            ->add('confirmed', 'checkbox',array('required'=>false, 'label'=>'Zamówienie potwierdzone'))    
            ->add('done', 'checkbox',array('required'=>false, 'label'=>'Zamówienie zakończone'))   
            ->add('canceled', 'checkbox',array('required'=>false, 'label'=>'Zamówienie anulowane'))       
            ->add('first', 'checkbox',array('required'=>false, 'label'=>'Klient dodał koszyk z produktami'))  
            ->add('customer_confirmation', 'checkbox',array('required'=>false, 'label'=>'Klient potwierdził wykonanie usługi')) 
            ->add('contractor_confirmation', 'checkbox',array('required'=>false, 'label'=>'Wykonawca potwierdził wykonanie usługi')) 
            ->add('payment_manual', 'checkbox',array('required'=>false, 'label'=>'Zamówienie ustawione jako opłacone'))  
            ->add('payment_success', 'checkbox',array('required'=>false, 'label'=>'Zamówienie opłacone online'))   
            ->add('payment_fail', 'checkbox',array('required'=>false, 'label'=>'Nieudana płatność online'))   
                
            ->add('save', 'submit', array('label' => 'Zapisz'));
        
        //var_dump($options['validation_groups']); die();SiteBundle
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\OrderStatus',
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
        return 'order_status';
    }
}