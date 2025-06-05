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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('note', 'textarea',array('label'=>'Uwagi dla Epado', 'attr'=>array('class'=>'long'), 'required'=>false));
       
            if(in_array('admin',$options['validation_groups']) && !in_array('notconfirmed',$options['validation_groups'])){   
                $builder->add('invoice', 'checkbox',array('required'=>false,'label'=>'Klient chce otrzymać fakturę', 'attr'=>array('data-help'=>'Opcja widoczna tylko dla administracji, można z niej skorzystać już po zatwierdzeniu zamówienia jeżeli klient skontaktuje się w sprawie otrzymania faktury.') ));   

                //$builder->add('delivery', 'textarea',array('label'=>'Dane dostawy', 'required'=>false, 'attr'=>array('class'=>'small')));    
                //$builder->add('billing', 'textarea',array('label'=>'Dane rozliczeniowe', 'required'=>false, 'attr'=>array('class'=>'small')));  
            
                //$builder->add('status', 'entity',array('class'=> 'AppBundle:OrderStatus','label'=>'Status', 'property' => 'name', 'attr'=>array('class'=>'')));
        /*
                $builder
                    ->add('manager', 'entity', array(
                    'label'=>'Opiekun zamówienia',
                    'class' => 'AppBundle:User',
                    'empty_data' => null,
                    'required'=>false,
                    'query_builder' => function (EntityRepository $er) {
                           return $er->createQueryBuilder('u')
                               ->andWhere('u.type=:trader ')
                               ->setParameter('trader','trader')
                               ->orderBy('u.first_name', 'ASC');
                       },
                    'property' => 'fullname',
                    )) 
                       
                ->add('price_work', 'number', array('label'=>'Cena usługi'));  
         */     
            }        
            
            $builder->add('save', 'submit', array('label' => 'Zapisz'));
        
        //var_dump($options['validation_groups']); die();SiteBundle
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Order',
            'validation_groups' => array(),
        ));
    }
    
    public function getName()
    {
        return 'order';
    }
}