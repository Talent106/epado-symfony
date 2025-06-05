<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductPriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        //$this->getData();
        
        $builder->add('price', 'text',array('label'=>'Cena')); 
           // ->add('currency', 'text',array('label'=>'Waluta'));     
            
            //->add('save', 'submit', array('label' => 'Zapisz'));
        
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($builder,$options)
        {
           $form = $event->getForm();
           $data = $event->getData();
            
           if (is_object($data))
           {  
                $translated = $options['translator']->trans(
                    'Cena w %currency%',
                    array('%currency%' => $data->getCurrency())
                );
               
                $form->add('price', 'text',array('label'=>$translated ));
           }  
        });   
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ProductPrice',
            'validation_groups' => array(),
            'translator'=>null,
        ));
    }
    
    public function getName()
    {
        return 'price';
    }
}