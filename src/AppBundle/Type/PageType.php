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

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $sex=array('f' => 'Kobieta', 'm' => 'Mężczyzna');
            
        
        $years=array();
        
        for($i=1800;$i<=date('Y');$i++){
           $years[]=$i; 
        }
        if($options['data'] && $options['data']->getWebPath())
        $path=$options['data']->getWebPath();
        else 
        $path='';
        
        if($options['data'] && $options['data']->getBackground())
        $background=$options['data']->getBackground();
        else 
        $background='';   
        
        if($options['data']->getType()->getId()==1 && $options['page_edit'])
        $builder  
            ->add('translations', 'a2lix_translations', array(
                'locales' => $options['locales'],   
                'label' => 'Tłumaczenie',   
                'required_locales' => array($options['default_locale']),   
                'default_locale' => $options['default_locale'],   
                'fields' => array(                     
                    'first_name' => array(                  
                        'field_type' => 'text',                
                        'label' => 'Imię osoby',                    
                    ),
                    'last_name' => array(                  
                        'field_type' => 'text',                
                        'label' => 'Nazwisko osoby',                    
                    ),
                    'description' => array(                  
                        'field_type' => 'textarea',              
                        'label' => 'Biografia',    
                        'block_name' => 'artgate_description',
                        'attr' => array( 'data-bio'=>1, 'class'=>'long bio' )
                    ), 
                    'name' => array(                  
                        'field_type' => 'hidden',             
                    ),   
                    'long_description' => array(                  
                        'field_type' => 'hidden',              
                    ) 
                )
            ))  
			->add('facebook', 'text',array('label'=>'Profil na Facebooku',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))
            ->add('family_name', 'text',array('label'=>'Nazwisko rodowe',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))  
            ->add('father', 'text',array('label'=>'Imię ojca',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))
            ->add('mother', 'text',array('label'=>'Imię matki',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))
            ->add('birth_city', 'text',array('label'=>'Miejsce urodzenia',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))
            ->add('sex', 'choice',array('label'=>'Płeć', 'required'=>true, 'choices' => $sex  ))        
                
                
            ->add('cemetery', 'entity_hidden',array('class'=>'AppBundle\Entity\Cemetery') )
            ->add('cemetery_object', 'textarea',array('mapped'=>false, 'data'=>json_encode( !$options['data']->getCemetery() ? 0 : $options['data']->getCemetery()->serialize()  ), 'required'=>false,  'attr'=>array('data-hidden'=>'1') ) )         
            ->add('cemetery_search', 'text',array('mapped'=>false,'required'=>false,  'label'=>'Cmentarz', 'attr'=>array('data-help'=>'Wyszukaj cmentarz podająć jego nazwe lub miejscowość w której się znajduje' , 'class'=>'findoradd','data-id'=>'page_cemetery','data-object'=>'page_cemetery_object','data-search'=>'1') ) ) //data-object -> field name , data-id -> field name, data-    
            
            ->add('alley', 'text',array('label'=>'Aleja',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))
            ->add('number', 'text',array('label'=>'Nr kwatery',  'attr'=>array(), 'mapped' => true, 'required'=>false,   ))
                              
                
            ->add('family', 'entity_hidden',array('class'=>'AppBundle\Entity\Family') )      
            ->add('family_object', 'textarea',array('mapped'=>false, 'data'=>json_encode( !$options['data']->getFamily() ? 0 : $options['data']->getFamily()->serialize() ),'required'=>false,  'attr'=>array('data-hidden'=>'1') ) )         
            ->add('family_search', 'text',array('mapped'=>false,'required'=>false,  'label'=>'Rodzina', 'attr'=>array('data-help'=>'Wybierz lub dodaj nową rodzinę' , 'class'=>'findoradd','data-id'=>'page_family','data-object'=>'page_family_object','data-search'=>'0') ) ) //data-object -> field name , data-id -> field name, data-    
                                                                //datepicker //widget single_text                                                                                                      //choice
            ->add('begin', 'date',array( 'attr'=>array('class'=>'dateselect'),'required'=>true,'label'=>'Data urodzenia (rok, miesiąc, dzień)','placeholder' => '', 'years'=>$years, 'format' => 'yyyy-MM-dd' , 'widget' => 'single_text', 'html5'=>false)) //, 'widget' => 'single_text'   
            ->add('end', 'date',array( 'attr'=>array('class'=>'dateselect'),'required'=>true,'label'=>'Data śmierci (rok, miesiąc, dzień)','placeholder' => '','years'=>$years, 'format' => 'yyyy-MM-dd',  'widget' => 'single_text', 'html5'=>false)) //, 'widget' => 'single_text'   
            
            //->add('file', 'file', array( 'label' => 'Dodaj własne zdjęcie w tle', 'attr'=>array('data-background'=>$background, 'data-path'=>$path), 'required' => false ))      
            ->add('enabled', 'checkbox',array('required'=>false,'label'=>'Widoczność w wyszukiwarce Epado')) 
                
            ->add('block', 'checkbox',array('required'=>false,'label'=>'Blokuj dodawanie nowych kondolencji')) 
            //->add('public', 'checkbox',array('required'=>false,'label'=>'Strona publicznie dostępna')) 
            ->add('remind', 'checkbox',array('required'=>false,'label'=>'Przypomnij o rocznicy'))            
            //->add('address', 'collection', array( 'label'=>'', 'options'=>array('translator'=>$options['translator']), 'type' => new \AppBundle\Type\AddressType()))
            ;
        if($options['data']->getType()->getId()==2 && $options['page_edit'])
        $builder  
            ->add('translations', 'a2lix_translations', array(
                'locales' => $options['locales'],   
                'label' => 'Tłumaczenie',   
                'required_locales' => array($options['default_locale']),   
                'default_locale' => $options['default_locale'],   
                'fields' => array(                     
                    'name' => array(                  
                        'field_type' => 'text',                
                        'label' => 'Nazwa',                    
                    ),
                    'first_name' => array(                  
                        'field_type' => 'hidden',                
                        'label' => 'Imię osoby',                    
                    ),
                    'last_name' => array(                  
                        'field_type' => 'hidden',                
                        'label' => 'Nazwisko osoby',                    
                    ),
                    'description' => array(                  
                        'field_type' => 'textarea',              
                        'label' => 'Opis',    
                        'attr' => array( 'class'=>'long' )
                    ),
                    'long_description' => array(                  
                        'field_type' => 'textarea',              
                        'label' => 'Dłuższy opis (pierwszy akapit będzie widoczny)',    
                        'attr' => array( 'class'=>'long' ),
                        'required'=>false
                    ) 
                )
            ))   //datepicker //widget single_text                                                                                                      //choice
            ->add('begin', 'date',array( 'attr'=>array('class'=>'dateselect'),'required'=>false,'label'=>'Data powstania (rok, miesiąc, dzień)','placeholder' => '', 'years'=>$years, 'format' => 'yyyy-MM-dd' , 'widget' => 'single_text', 'html5'=>false)) //, 'widget' => 'single_text'   
            ->add('begin_year', 'text',array( 'attr'=>array('class'=>''),'required'=>false,'label'=>'Rok powstania')) //, 'widget' => 'single_text'   
            
            ->add('category', 'entity' , array('label'=>'Typ miejsca','expanded'=>false, 'required'=>true, 'empty_data'  => null, 'property' => 'name', 'class' =>'AppBundle\Entity\PageCategory',  "multiple" => false)) 
            ;
        
            //var_dump($options['page_background']); die();
            if($options['page_background'])
            $builder->add('file', 'file', array( 'label' => 'Dodaj własne zdjęcie w tle', 'attr'=>array('data-background'=>$background, 'data-path'=>$path), 'required' => false ));      
            
            if($options['user_type']=='admin' || $options['user_type']=='worker'){
            $builder->add('special', 'checkbox', array( 'label' => 'Strona specjalna, wyświetlaj tylko oznaczone produkty', 'attr'=>array('data-help'=>'Na stronie oznaczonej jako specjalna wyświetlały się będą tylko oznaczone produkty. Opcja ta jest widoczna tylko dla administratorów i pracowników Epado.'), 'required' => false ));      
            $builder->add('ads', 'checkbox',array('required'=>false,'label'=>'Wyświetlaj reklame'));  
                    
            }
            
            if($options['page_edit']){
                
                if($options['data']->getType()->getId()==2)
                $builder->add('enabled', 'checkbox',array('required'=>false,'label'=>'Widoczność w wyszukiwarce Epado'))           
                ->add('address', new \AppBundle\Type\AddressType(), array('validation_groups'=>$options['validation_groups'], 'type'=>'page_address')) 
                ; 
                if($options['data']->getType()->getId()==1)
                $builder->add('enabled', 'checkbox',array('required'=>false,'label'=>'Widoczność w wyszukiwarce Epado'))           
                ->add('address', new \AppBundle\Type\AddressType(), array('validation_groups'=>$options['validation_groups'],'mapped'=>false, 'type'=>'page_address')) 
                ; 
                
                $builder->add('localisation', new \AppBundle\Type\LocalisationType());
            }
            $builder->add('save', 'submit', array('label' => 'Zapisz'));
        
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Page',
            'data'=> null,
            'user_type'=> null,
            'page_edit'=>false,
            'page_background'=>false,
            'cascade_validation'=>true,
            'validation_groups'=>array(),
            'locales' => array('pl'),
            'default_locale' => 'pl',
            'translator'=> null,
        ));
    }
    
    public function getName()
    {
        return 'page';
    }
}