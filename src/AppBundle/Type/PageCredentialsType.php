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

class PageCredentialsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $types=array('admin' => 'Administrator', 'redactor' => 'Redaktor');
        $builder->add('type', 'choice',array('label'=>'Typ uprawnień', 'required'=>true, 'choices' => $types  )); 
                
        if($options['page']){
            
            $builder  
            ->add('page_edit', 'checkbox',array('label'=>'Edytowanie strony',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))  
            ->add('page_image', 'checkbox',array('label'=>'Zdjęcie główne',  'attr'=>array(), 'mapped' => true, 'required'=>false,   )) 
            ->add('page_images', 'checkbox',array('label'=>'Zdjęcia',  'attr'=>array(), 'mapped' => true, 'required'=>false,   )) 
            ->add('page_background', 'checkbox',array('label'=>'Zdjęcie w tle',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))  
            ;
            
            if($options['page']->getType()->getId()==1){
                
                $builder
                ->add('page_remind', 'checkbox',array('label'=>'Przypomnienie o rocznicy śmierci',  'attr'=>array(), 'mapped' => true, 'required'=>false,   )) 
                ->add('page_posts_notification', 'checkbox',array('label'=>'Powiadomienie o kondolencjach',  'attr'=>array(), 'mapped' => true, 'required'=>false,   )) 
                ->add('page_posts_delete', 'checkbox',array('label'=>'Usuwanie kondolencji',  'attr'=>array(), 'mapped' => true, 'required'=>false,   )) 
                ;       
            }
            
            if($options['page']->getType()->getId()==2){
                $builder
                ->add('page_audiobooks', 'checkbox',array('label'=>'Audiobooki',  'attr'=>array(), 'mapped' => true, 'required'=>false,   )) 
                ;        
            }
        
        }
        if($options['family'])
        $builder  
            ->add('family_edit', 'checkbox',array('label'=>'Edytowanie informacji o rodzinie',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))  
            ;  
                
        $builder->add('save', 'submit', array('label' => 'Zapisz'));
        
        
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PageCredentials',
            'data'=> null,
            'cascade_validation'=>true,
            'default_locale' => 'pl',
            'translator'=> null,
            'page'=> null,
            'family'=> null,
            'allow_extra_fields' => true,
        ));
    }
    
    public function getName()
    {
        return 'page_credentials';
    }
}