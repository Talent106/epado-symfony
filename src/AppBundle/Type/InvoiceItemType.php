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

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class InvoiceItemType extends AbstractType
{
//    protected $em;
//    
//    function __construct(EntityManager $em)
//    {
//        $this->em = $em;
//    }

    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //var_dump($options);
        //die();
        
        
        //$data=$options;
        //var_dump($data);
        //die('a');
        //$new=$builder->getForm()->getData();
        
        //$data=$options['data'];
        
        //var_dump($new->getId());
        //die();
        
        $taxes=array(1 => '23%', 2 => '8%', 3 => '0%');
        $tax_rates=array(1 => 23, 2 => 8, 3 => 0);
        
        $units=array('szt.','usł.','m','m²', 'cm', 'mb');
        
        $units=array_combine($units, $units);
        
        $builder
            ->add('delete', 'checkbox', array('label'    => 'Usuń', 'mapped' => false, 'required'=>false,  )) 
               
            ->add('name', 'text',array('label'=>'Nazwa',  'attr'=>array('class'=>'name', 'autocomplete'=>'off') )) 
                
            ->add('tax', 'choice',array('label'=>'Podatek', 'required'=>true, 'choices' => $taxes ,  'attr'=>array('class'=>'tax')   ))
        
            ->add('amount', 'number',array('label'=>'Ilość',  'attr'=>array('class'=>'amount')  ))      
            ->add('unit', 'choice', array('label'=>'Jednostka', 'required'=>true, 'choices' => $units  ))         
            ->add('net_price', 'number',array('label'=>'Netto' ,  'attr'=>array('class'=>'net')  ))
            ->add('gross_price', 'number',array('label'=>'Brutto' ,  'attr'=>array('class'=>'gross')  ))
                
            ->add('tax_rate', 'choice',array('label'=>'Stawka', 'required'=>true, 'choices' => $tax_rates ,  'attr'=>array('class'=>'tax_rate'), 'mapped' => false, 'required'=>false,   ))    
            
            ->add('product', 'entity',array('label'=>'Produkt',  'empty_data'  => null, 'required'    => false , 'class'=>'AppBundle\Entity\Product'  , 'property'=>'name',
                
                
                  'query_builder' => function (EntityRepository $er) {
                           return $er->createQueryBuilder('u')
                               ->andWhere('u.name=:trader ')
                                   
                               ->setParameter('trader','none')
                               ->orderBy('u.name', 'ASC');
                  },
                'attr'=>array('class'=>'product')  ))    
            //, 'data_class'=>'AppBundle\Entity\Product'    
            //->add('entity_id', 'hidden', array('data' => $data->getList()->getId(),'property_path' => false, ))    
            //->add('id', 'hidden',array('label'=>'Nazwa'))      
                    
                    ;

            $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($builder)
             {
               $form = $event->getForm();
               $data = $event->getData();
               //var_dump($data);
               

               
               /* Check we're looking at the right data/form */
               if ( is_object($data) && method_exists($data, 'getId') && $data->getProduct() )
               {
                 $label = $data->getProduct()->getId();
                 //echo($label);
                 
                 $form->remove('product'); 
                 $form->add('product', 'entity',array('label'=>'Produkt',  'empty_data'  => null, 'required'    => false , 'class'=>'AppBundle\Entity\Product'  , 'property'=>'name',
                
                
                  'query_builder' => function (EntityRepository $er) use ( $data ) {
                     //var_dump($data);
                           return $er->createQueryBuilder('u')
                               ->andWhere('u=:product ')
                                   
                               ->setParameter('product',$data->getProduct())
                               ->orderBy('u.name', 'ASC');
                  },
                'attr'=>array('class'=>'product')  ));
                 
                 
//                 $form->add($builder->getFormFactory()->createNamed(
//                   'textarea',
//                   'comments',
//                   null,
//                   array('label' => $label)
//                 ));
               }
               
               
               
               $order_product_id=0;
               if( is_object($data) && $data->getOrderProduct()) $order_product_id=$data->getOrderProduct()->getId();
               $id=0;
               if ( is_object($data) ) $id=$data->getId();
               
               
               $form->add('item_order_product', 'hidden', array('label'    => 'Usuń', 'data'=>$order_product_id, 'mapped' => false, 'required'=>false, 'attr'=>array('class'=>'order_product')  )); 
               $form->add('item_id', 'hidden', array('label'    => 'Usuń', 'data'=>$id, 'mapped' => false, 'required'=>false, 'attr'=>array('class'=>'order_product')  )); 
               
               
               
               
             }); 
             
            $builder->addEventListener(FormEvents::PRE_SUBMIT, array($this, 'onPreSubmit'));
                  
                  
                  
            //$builder->add('save', 'submit', array('label' => 'Zapisz'));
        
        //var_dump($options['validation_groups']); die();SiteBundle
    }
    

    function onPreSubmit(FormEvent $event) {
        $form = $event->getForm();
        $data = $event->getData();
        // Note that the data is not yet hydrated into the entity.
        
        $product=$data['product'];
        
        if($product){
            $form->remove('product');

            $form->add('product', 'entity',array('label'=>'Produkt',  'empty_data'  => null, 'required'    => false , 'class'=>'AppBundle\Entity\Product'  , 'property'=>'name',

                      'query_builder' => function (EntityRepository $er) use ( $product ) {
                
                                $p = $er->find($product);
            
                         //var_dump($data);
                               return $er->createQueryBuilder('u')
                                   ->andWhere('u=:product ')

                                   ->setParameter('product',$p)
                                   ->orderBy('u.name', 'ASC');
                      },
                    'attr'=>array('class'=>'product')  ));
        }          
        //$this->addElements($form, $product);
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'ss' => 'qq',
            'user'=> null,
            'data_class' => 'AppBundle\Entity\InvoiceItem',
            'validation_groups' => array(
                'registration'
            ),
        ));
    }
    
    public function getName()
    {
        return 'invoice_item_type';
    }
}