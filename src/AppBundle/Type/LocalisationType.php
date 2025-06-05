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

class LocalisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('map', 'text',array('mapped'=>false,'required'=>false,  'label'=>'Mapa', 'attr'=>array('class'=>'hidden insert-map') ) ) //data-object -> field name , data-id -> field name, data-    
                
            ->add('latitude', 'hidden',array('attr'=>array('class'=>'latitude'))  )  
            ->add('longitude', 'hidden',array('attr'=>array('class'=>'longitude')))   
            ;//->add('save', 'submit', array('label' => 'Zapisz'));
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Localisation',
            'validation_groups' => array(
                'registration'
            ),
        ));
    }
    
    public function getName()
    {
        return 'localisation';
    }
}