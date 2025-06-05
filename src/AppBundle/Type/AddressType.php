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

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $invoice_types=\AppBundle\Entity\User::getInvoiceTypes();
        
        if($options['type']=='delivery_address'){
            $builder
            ->add('company', 'text',array('label'=>'Nazwa firmy', 'required'=>false, 'attr'=>array('data-name'=>'company')  ))  
            ->add('first_name', 'text',array('label'=>'Imię', 'required'=>true, 'attr'=>array('class'=>'copy','data-name'=>'first_name') ))   
            ->add('last_name', 'text',array('label'=>'Nazwisko', 'required'=>true, 'attr'=>array('class'=>'copy','data-name'=>'last_name') )); 
        }
        
        if($options['type']=='billing_address'){
            $builder
            ->add('company', 'text',array('label'=>'Nazwa firmy', 'required'=>false, 'attr'=>array('class'=>'copy','data-name'=>'company')  )) 
            //->add('tax_id_name', 'text',array('label'=>'Nazwa numeru identyfikacji podatkowej', 'required'=>false, 'attr'=>array('class'=>'copy','data-name'=>'tax_id')  ))  
            ->add('tax_id_name', 'choice', array('label'=>'Nazwa numeru identyfikacji podatkowej', 'required'=>true, 'choices' => $invoice_types  )) 
            ->add('tax_id', 'text',array('label'=>'Numer identyfikacji podatkowej', 'required'=>false, 'attr'=>array('class'=>'copy','data-name'=>'tax_id')  ))  
            ->add('krs', 'hidden',array('label'=>'KRS', 'required'=>false, 'attr'=>array()  ))      
            ->add('regon', 'hidden',array('label'=>'REGON', 'required'=>false, 'attr'=>array()  ))
            ->add('first_name', 'text',array('label'=>'Imię', 'required'=>true, 'attr'=>array('class'=>'copy','data-name'=>'first_name')  ))   
            ->add('last_name', 'text',array('label'=>'Nazwisko', 'required'=>true, 'attr'=>array('class'=>'copy','data-name'=>'last_name')  )); 
        }
        
        if($options['type']=='page_address'){           
            $builder->add('country', 'entity' , 
                array('label'=>'Kraj', 'attr'=>array('class'=>'copy country','data-name'=>'country') ,'query_builder' => function(EntityRepository $er ) use ( $options ) { 
                     $query=$er->createQueryBuilder('w')
                              ->andWhere('w.page = 1');
                     return $query;
                    },
                'expanded'=>false,  'required'=>true, 'empty_data'  => null, 'property' => 'name', 'class' =>'AppBundle\Entity\Country',  'multiple' => false));       
        }
        
        if($options['type']=='delivery_address'){           
            $builder->add('country', 'entity' , 
                array('label'=>'Kraj', 'attr'=>array('class'=>'copy country','data-name'=>'country') ,'query_builder' => function(EntityRepository $er ) use ( $options ) { 
                     $query=$er->createQueryBuilder('w')
                              ->andWhere('w.delivery = 1');
                     return $query;
                    },
                'expanded'=>false,  'required'=>true, 'empty_data'  => null, 'property' => 'name', 'class' =>'AppBundle\Entity\Country',  'multiple' => false));       
        }
        
        if($options['type']=='billing_address'){           
            $builder->add('country', 'entity' , 
                array('label'=>'Kraj', 'attr'=>array('class'=>'copy country','data-name'=>'country') ,'query_builder' => function(EntityRepository $er ) use ( $options ) { 
                     $query=$er->createQueryBuilder('w')
                              ->andWhere('w.billing = 1')
                              ->orWhere('w.delivery = 1');
                     return $query;
                    },
                'expanded'=>false,  'required'=>true, 'empty_data'  => null, 'property' => 'name', 'class' =>'AppBundle\Entity\Country',  'multiple' => false));       
        }
       
        if($options['type']=='billing_address'){   
            

            $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($builder,$options)
            {
               $form = $event->getForm();
               $data = $event->getData();

               if (is_object($data))
               {  
                   $invoice_types=array();
                   $users=$data->getBillingUsers();
                   $isPartner=false;
                   foreach($users as $user){
                       if($user->getType()=='partner') $isPartner=true;
                       //$invoice_types=$user->getInvoiceTypes();
                   }
                   
                   if($invoice_types){
                      //$form->add('tax_id_name', 'choice', array('label'=>'Nazwa numeru identyfikacji podatkowej', 'required'=>true, 'choices' => $invoice_types  ));       
                   }
                   
                   if($isPartner==true){
                    $form->add('krs', 'text',array('label'=>'KRS', 'required'=>false, 'attr'=>array()  ));      
                    $form->add('regon', 'text',array('label'=>'REGON', 'required'=>false, 'attr'=>array()  )); 
                   } 
            
               }  
            }); 
            
        } 
        
        
        $builder
            //->add('company', 'text',array('label'=>'Nazwa firmy')) 
            //->add('tax_id', 'text',array('label'=>'NIP'))  
                
            //->add('first_name', 'text',array('label'=>'Imie'))   
            //->add('last_name', 'text',array('label'=>'Nazwisko')) 
                
            //->add('new', 'country',array('label'=>'Adres', 'mapped'=>false))  
            
            
            ->add('address', 'text',array('label'=>'Adres','required'=>true,'attr'=>array('class'=>'address copy','data-name'=>'address'))  )  
            ->add('city', 'text',array('label'=>'Miasto','required'=>true,'attr'=>array('class'=>'city copy','data-name'=>'city')))     
            ->add('postal_code', 'text',array('label'=>'Kod pocztowy','required'=>true,'attr'=>array('class'=>'copy','data-name'=>'postal_code'))) //postalcode  
            ;//->add('save', 'submit', array('label' => 'Zapisz'));
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Address',
            'type'=> 'page_address',// page_address, cemetery_address, billing_address, delivery_address
            'validation_groups' => array(
                'default'
            ),
        ));
    }
    
    public function getName()
    {
        return 'address';
    }
}