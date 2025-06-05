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

class OrderAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder  
            ->add('delivery_address', new \AppBundle\Type\AddressType(), array('validation_groups'=>$options['validation_groups'], 'type'=>'delivery_address')) 
            ->add('billing_address', new \AppBundle\Type\AddressType(), array('validation_groups'=>$options['validation_groups'], 'type'=>'billing_address')) 
            ->add('save', 'submit', array('label' => 'Zapisz', 'attr'=>array('class'=>'') ));
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Order',
            'cascade_validation'=>true,
            'validation_groups'=> array(),
            'locales' => array('pl'),
            'default_locale' => 'pl',
            'translator'=> null,
        ));
    }
    
    public function getName()
    {
        return 'order_address';
    }
}