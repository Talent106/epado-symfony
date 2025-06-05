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
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', 'text',array('label'=>'Nazwa')) 
            ->add('description', 'textarea',array('label'=>'Opis','required'=> false))
            ->add('document', 'textarea',array('label'=>'Treść dokumentu powitalnego','attr'=> array('class'=>'long'), 'required'=> false ))
			->add('status', 'text',array('label'=>'Status')) ;
        
        $locales=$options['locales'];
        $locales=array_combine($locales, $locales);
        $builder->add('locale', 'choice',array('label'=>'Język', 'required'=>true, 'choices' => $locales  )); 
        $months=array(null => 'Brak', 60 => '5 lat', 120 => '10 lat', 240 => '20 lat');
        
        if($options['data'] && !$options['data']->getId())
        $builder
            ->add('amount', 'number',array('label'=>'Ilość kodów', 'required'=>true, 
                'constraints' => array(
                    new NotBlank(array('message' => 'Musisz podać ilość kodów')),
                    new Range(array('min'=>21,'minMessage'=>'Za mało kodów')),  
                ),
                'attr'=>array('data-help'=>'Ilość generowanych kodów podaje się tylko podczas tworzenia grupy kodów') )); 
        
        $builder
            ->add('product', 'entity' , array('label'=>'Produkt','expanded'=>false,  'required'=>false, 'empty_value' => true, 'placeholder' => 'Kody uniwersalne', 'empty_data'  => null, 'property' => 'typename', 'class' =>'AppBundle\Entity\Product',  
                'multiple' => false,
                'query_builder' => function(EntityRepository $er ) use ( $options ) { 
                     $query=$er->createQueryBuilder('w')
                              ->orderBy('w.created', 'ASC')
                              ->andWhere('w.enabled = 1')
                              ->andWhere('w.without_code = 1')
                              ->andWhere('w.months IS NOT NULL')
                              ->andWhere('w.with_code = 0'); 
                     if($options['data']->getProduct()) $query->orWhere('w=:product')->setParameter('product',$options['data']->getProduct());
                     return $query;
                    }
                )) 
            ->add('months', 'choice',array('label'=>'Przedłużany okres w przypadku kodów uniwersalnych', 'expanded'=>true,  'choices' => $months ,  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))    
            
			
            ->add('save', 'submit', array('label' => 'Zapisz'));
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CodeGroup',
            'data'=> null,
            'locales' => array('pl'),
            'default_locale' => 'pl',
            'validation_groups' => array(
                'form'
            ),
        ));
    }
    
    public function getName()
    {
        return 'code';
    }
}