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

class ActionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


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
	
    public function getStatus()
    {
        return 'Nowy';
    }	
}