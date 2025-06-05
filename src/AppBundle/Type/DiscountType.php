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

class DiscountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('code', 'text',array('label'=>'Kod')) 
            ->add('count', 'text',array('label'=>'Rabat')) 
			->add('expire', 'datetime',array('label'=>'Wygasa', 'widget'=>'single_text',  'attr'=>array('class'=>'dateselect') ) )
			 ;
			  $builder->add('save', 'submit', array('label' => 'Dodaj'));
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
          
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
	
    public function getStatus()
    {
        return 'Nowy';
    }	
} 