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
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class UserAdsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
     
        $builder->add('ads_show', 'checkbox',array('required'=>false,'label'=>'Wyświetlaj reklamy'));  

        $builder->add('ads_name', 'text',array('required'=>false,'label'=>'Nazwa wyświetlana'));
        $builder->add('ads_description', 'text',array('required'=>false,'label'=>'Nazwa funkcji (np "Nagrobek wykonał")'));

        $builder->add('ad_desktop', 'file', array( 'label' => 'Reklama na komputery (szerokość wyświetlania max 1110px, wysokość max 500px)', 'mapped'=>false, 'required' => false, 'data_class' => null ));
        $builder->add('ad_mobile', 'file', array( 'label' => 'Reklama na urządzenia mobilne (szerokość wyświetlania max 900px, wysokość max 900px)', 'mapped'=>false, 'required' => false, 'data_class' => null ));
        $builder->add('ad_link', 'text',array('required'=>false,'label'=>'Adres strony do której mają kierować banery (razem z http lub https)'));

        
        $builder->add('save', 'submit', array('label' => 'Zapisz')); 
        
        
            $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($builder,$options)
            {
               $form = $event->getForm();
               $data = $event->getData();

               if (is_object($data))
               {  

                    if($data->getAdDesktop() && $data->getAdDesktop()!='') $form->add('ad_desktop', 'file', array( 'label_attr'=> array('image'=>$data->getAdDesktop()), 'label' => 'Zamień baner reklamowy na komputery (szerokość wyświetlania max 1110px, wysokość max 500px, jpg, png lub gif)', 'mapped'=>false, 'required' => false, 'data_class' => null ));
                    else $form->add('ad_desktop', 'file', array( 'label_attr'=> array('image'=>$data->getAdDesktop()), 'label' => 'Dodaj reklamę na komputery (szerokość wyświetlania max 1110px, wysokość max 500px, jpg, png lub gif)', 'mapped'=>false, 'required' => false, 'data_class' => null ));

                    if($data->getAdMobile() && $data->getAdMobile()!='') $form->add('ad_mobile', 'file', array( 'label_attr'=> array('image'=>$data->getAdMobile()), 'label' => 'Zamień baner reklamowy na urządzenia mobilne (szerokość wyświetlania max 900px, wysokość max 900px, jpg, png lub gif)', 'mapped'=>false, 'required' => false, 'data_class' => null ));
                    else $form->add('ad_mobile', 'file', array( 'label_attr'=> array('image'=>$data->getAdMobile()), 'label' => 'Dodaj baner reklamowy na urządzenia mobilne (szerokość wyświetlania max 900px, wysokość max 900px, jpg, png lub gif)', 'mapped'=>false, 'required' => false, 'data_class' => null ));
   
               }  
            }); 
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
            'validation_groups' => array(
                'none'
            ),
        ));
    }
    
    public function getName()
    {
        return 'user';
    }
}