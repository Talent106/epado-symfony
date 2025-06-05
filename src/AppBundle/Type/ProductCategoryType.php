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

class ProductCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text',array('label'=>'Nazwa')) 
            //->add('commission', 'percent',array('label'=>'Prowizja procentowa dla produktów w tej kategorii'))     
            ->add('save', 'submit', array('label' => 'Zapisz'));
        
        //var_dump($options['validation_groups']); die();SiteBundle
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ProductCategory',
            'validation_groups' => array(
                'registration'
            ),
        ));
    }
    
    public function getName()
    {
        return 'product_category';
    }
}