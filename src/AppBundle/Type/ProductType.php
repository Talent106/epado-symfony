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

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $months=array(null => 'Brak', 60 => '5 lat', 120 => '10 lat', 240 => '20 lat');
        
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
//                        'locale_options' => array(            
//                            'en' => array(
//                                'label' => 'Nazwa hiszpanska',           
//                            ),
//                            'fr' => array(
//                                'label' => 'Nazwa polska',     
//                               // 'display' => false                 
//                            ),
//                            'pl' => array(
//                                'label' => 'Nazwa polska',     
//                               // 'display' => false                 
//                            ),
//                            'de' => array(
//                                'label' => 'Nazwa niemiecka',     
//                               // 'display' => false                
//                            )
//                            
//                        )
                    ),
                    'description' => array(                  
                        'field_type' => 'textarea',              
                        'label' => 'Opis',                
                        'locale_options' => array(      
//                        'en' => array(
//                            'label' => 'Nazwa hiszpanska',            
//                        ),
//                        'fr' => array(
//                            'label' => 'Nazwa francuska',    
//                            'required'=>true,
//                           // 'display' => false              
//                        ),
//                        'pl' => array(
//                            'label' => 'Nazwa polska',     
//                           // 'display' => false               
//                        ),
//                        'de' => array(
//                            'label' => 'Nazwa niemiecka',     
//                           // 'display' => false               
//                        )
                            
                        )
                    ),
                    'document' => array(                  
                        'field_type' => 'textarea',              
                        'label' => 'Szablon dokumentu powitalnego', 
                        'attr'=> array('class'=>'long', 'data-help'=>'Po utworzeniu grupy kodów z tym produktem ta treść zostanie skopiowana do treści dokumentu powitalnego tej grupy'),
                        'required'=> false,
                        'locale_options' => array(      
//                        'en' => array(
//                            'label' => 'Nazwa hiszpanska',            
//                        ),
//                        'fr' => array(
//                            'label' => 'Nazwa francuska',    
//                            'required'=>true,
//                           // 'display' => false              
//                        ),
//                        'pl' => array(
//                            'label' => 'Nazwa polska',     
//                           // 'display' => false               
//                        ),
//                        'de' => array(
//                            'label' => 'Nazwa niemiecka',     
//                           // 'display' => false               
//                        )
                            
                        )
                    )  
                    
                )
                
                
            ))    
//            ->add('translations', 'a2lix_translations', array(
//                      'locales' => array('pl','en'),   
//                       'label' => ' ',   
//                       'required_locales' => array(),
//                       //'required_locales' => array('fr'),      
//                   ))  
            //->add('price', 'text',array('label'=>'Cena podstawowa', 'required'=>false,))  
            ->add('cities', 'textarea',array('label'=>'Miasta',  'attr'=>array('class'=>'tags'), 'mapped' => true, 'required'=>false,   ))  
            ->add('page_type', 'entity' , array('label'=>'Typ strony',  'attr'=>array('data-help'=>'Produkt wyświetla się tylko w wybranym typie strony, upamiętniającej miejsce lub osobę'), 'expanded'=>false, 'required'=>true, 'empty_data'  => null, 'property' => 'name', 'class' =>'AppBundle\Entity\PageType',  "multiple" => false)) 
            ->add('category', 'entity' , array('label'=>'Kategoria',  'attr'=>array('data-help'=>'Produkty dla użytkowników wyświetlają się tylko zwykłym użytkownikom na stronach upamiętnianych, produkty dla partnerów wyświetlają się tylko w sklepie dla partnerów'), 'expanded'=>false, 'required'=>true, 'empty_data'  => null, 'property' => 'name', 'class' =>'AppBundle\Entity\ProductCategory',  "multiple" => false))
            ->add('type', 'entity' , array('label'=>'Typ',  'attr'=>array('data-help'=>'Sposób w jaki dany produkt bedzie realizowany, przykłądowo produkty które wymagają zlecenia dla podwykonawcy powinny być tak oznaczone'), 'expanded'=>false, 'required'=>true, 'empty_data'  => null, 'property' => 'name', 'class' =>'AppBundle\Entity\ProductType', "multiple" => false))  

                
            ->add('months', 'choice',array('label'=>'Przedłużany okres',  'attr'=>array('data-help'=>'Okres na jaki przedłużona zostanie strona po zakupie tego produktu'), 'expanded'=>false,  'choices' => $months ,  'mapped' => true, 'required'=>false,   ))    
               
            ->add('prices', 'collection', array( 'label'=>'Ceny', 'options'=>array('translator'=>$options['translator']), 'type' => new \AppBundle\Type\ProductPriceType(),   'allow_add'    => true))
            /*
            ->add('countries', 'entity', array(
                'class' => 'AppBundle\Entity\Country',
                'property' => 'name',
                'multiple' => true,
                'expanded' => false,
                'label' => 'Kraje w których produkt jest dostępny',
              ))
            */
                
            ->add('enabled', 'checkbox',array('required'=>false,'label'=>'Widoczność','attr'=>array('data-help'=>'Czy produkt ma wyświetlać się na stronach użytkowników')))    
            ->add('special', 'checkbox',array('required'=>false,'label'=>'Wyświetlaj na stronach specjalnych','attr'=>array('data-help'=>'Strony specjalne to strony na których wyświetlają się tylko oznaczone produkty, pracownik lub administrator może oznaczyć stronę jako specjalna') ))       
            ->add('in_page', 'checkbox',array('required'=>false,'label'=>'Rozszerzenie strony','attr'=>array('data-help'=>'Czy produkt dotyczy rozszerzenia strony upamiętniającej')))    
            ->add('with_code', 'checkbox',array('required'=>false,'label'=>'Dla stron z kodem','attr'=>array('data-help'=>'Czy produkt ma wyświetlać się na stronach które mają przypisany kod Epado')))    
            ->add('without_code', 'checkbox',array('required'=>false,'label'=>'Dla stron bez kodu','attr'=>array('data-help'=>'Czy produkt ma wyświetlać się na stronach które nie mają przypisanego kodu Epado'))) 
            ->add('single', 'checkbox',array('required'=>false,'label'=>'Sprzedawane pojedynczo','attr'=>array('data-help'=>'Czy użytkownik może kupić tylko jedną sztukę tego produktu w jednym zamówieniu, jeżeli ta opcja jest wyłączona kupujący może zmienić ilość zamawianych produktów')))     
//
//            ->add('radio1', 'radio',array('required'=>false, 'mapped'=>false , 'label'=>'Widoczność'))    
//            ->add('radio2', 'choice',array('required'=>false, 'mapped'=>false , 'label'=>'Widoczność' 
//                , 'empty_value' => null, 'multiple'=>false, 'expanded'=>true, 'choices'=>array('m' => 'Male', 'f' => 'Female', 'o' => 'Other')))    
//            ->add('radio3', 'choice',array('required'=>false, 'mapped'=>false , 'label'=>'Widoczność' 
//                , 'empty_value' => null, 'multiple'=>true, 'expanded'=>true, 'choices'=>array('m' => 'Male', 'f' => 'Female', 'o' => 'Other')))    
//                 
//            ->add('begin', 'date',array('required'=>false,'mapped'=>false,'label'=>'Data urodzenia','placeholder' => '', 'attr'=>array('class'=>'datepicker'), 'widget' => 'single_text', 'html5'=>false)) //, 'widget' => 'single_text'   
//            ->add('end', 'date',array('required'=>false,'mapped'=>false,'label'=>'Data śmierci','placeholder' => '', 'widget' => 'single_text', 'html5'=>false)) //, 'widget' => 'single_text'   
//             
//                
            ->add('save', 'submit', array('label' => 'Zapisz', 'attr'=>array('class'=>'') ));
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product',
            'cascade_validation'=>true,
            'locales' => array('pl'),
            'default_locale' => 'pl',
            'translator'=> null,
        ));
    }
    
    public function getName()
    {
        return 'product';
    }
}