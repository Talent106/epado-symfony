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

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('first_name', 'text',array('label'=>'Imię')) 
        ->add('last_name', 'text',array('label'=>'Nazwisko')) 
        ;
        
        if(!in_array('profile',$options['validation_groups']))
        $builder->add('email', 'email',array('label'=>'Email'));  
      
        if(in_array('update',$options['validation_groups']) || in_array('profile',$options['validation_groups']))
        {        
            $builder->add('new_password', 'password',array('mapped' => false, 'required'=>false, 'label'=>'Nowe hasło'));
            $builder->add('new_password_confirm', 'password',array('mapped' => false, 'required'=>false, 'label'=>'Potwierdź nowe hasło'));
        }
        
        if(in_array('create',$options['validation_groups']) || in_array('register',$options['validation_groups']))
        {        
            $builder->add('new_password', 'password',array('mapped' => false, 'required'=>true, 'label'=>'Hasło'));    
            $builder->add('new_password_confirm', 'password',array('mapped' => false, 'required'=>false, 'label'=>'Potwierdź hasło'));
        }
        
        if(in_array('register',$options['validation_groups']) ) //|| in_array('profile',$options['validation_groups'])
        {  
            $builder->add('new_parent_partner_code', 'text',array('mapped' => false, 'attr'=>array('data-help'=>'Jeżeli posiadasz kod polecający wprowadź go tutaj'), 'required'=>false, 'label'=>'Kod polecający'));
        }
        

        
        if( in_array('profile',$options['validation_groups']) )
        $builder->add('old_password', 'password',array('mapped' => false, 'required'=>false, 'label'=>'Stare hasło'));    

        
        
        if(in_array('create',$options['validation_groups']) || in_array('update',$options['validation_groups'])  || in_array('profile',$options['validation_groups']) )
        $builder  
        ->add('phone', 'text', array('label' => 'Numer telefonu (+00.00000000)', 'required' => false )) //, 'attr'=>array('class'=>'phone') //bad idea different language defferent phone numbers       
        ->add('notification_message', 'checkbox', array( 'label' => 'Powiadomienia mailowe o nowych wiadomościach', 'required' => false ))     
        ->add('notification_post', 'checkbox', array('label' => 'Powiadomienia mailowe o dodanych kondolencjach', 'required' => false ))   
        ;   
        $builder->add('file', 'file', array( 'label' => 'Zdjęcie profilowe', 'required' => false ));
        
        
        if(in_array('create',$options['validation_groups'])  || in_array('update',$options['validation_groups'])){
            //$builder->add('new_parent_partner_code', 'text',array('mapped' => false, 'attr'=>array('data-help'=>'Aby powiązać tego partnera z partnerem nadrzędnym wpisz kod partnera nadrzędnego. Pamiętaj że w celu pełnej aktywacji należy zmienić typ konta tego użytkownika na partner po podpisaniu z nim umowy.'), 'required'=>false, 'label'=>'Przydziel partnera nadrzędnego'));
        }
        
        if(in_array('create',$options['validation_groups']) || in_array('update',$options['validation_groups']) )   
        {        
            $names=array('admin' => 'Administrator', 'user' => 'Użytkownik', 'worker' => 'Pracownik', 'contractor' => 'Wykonawca', /*'trader'=>'Handlowiec',*/ 'partner'=>'Partner');
            $builder->add('cities', 'hidden',array('label'=>'Miasta wykonawcy',  'attr'=>array('class'=>'tags'), 'mapped' => true, 'required'=>false,   ));            
            $builder->add('description', 'hidden',array('label'=>'Opis wykonawcy', 'required'=>false)); 
			
			if(in_array('admin_form',$options['validation_groups']))
				$builder->add('type', 'choice',array('label'=>'Typ konta', 'required'=>true, 'choices' => $names  ));    
			
            $builder->add('enabled', 'checkbox',array('required'=>false,'label'=>'Aktywność konta')); 
            $builder->add('locked', 'checkbox',array('required'=>false,'label'=>'Blokada konta')); 
            $builder->add('discount', 'hidden',array('required'=>false,'label'=>'Zniżka procentowa dla partnera'));
            $builder->add('provision', 'hidden',array('required'=>false,'label'=>'Prowizja procentowa dla partnera'));
            $builder->add('parent_partner_code', 'hidden',array('required'=>false,'label'=>'Kod polecający partnera nadrzędnego'));
            $builder->add('new_parent_partner_code', 'hidden',array('mapped' => false, 'attr'=>array('data-help'=>'Aby powiązać tego partnera z partnerem nadrzędnym wpisz kod partnera nadrzędnego. Pamiętaj że w celu pełnej aktywacji należy zmienić typ konta tego użytkownika na partner po podpisaniu z nim umowy.'), 'required'=>false, 'label'=>'Przydziel partnera nadrzędnego'));
            
            $builder->add('ads', 'hidden',array('required'=>false,'label'=>'Zniżka procentowa dla partnera'));
            $builder->add('ads_show', 'hidden',array('required'=>false,'label'=>'Prowizja procentowa dla partnera'));
            $builder->add('ads_name', 'hidden',array('required'=>false,'label'=>'Kod polecający partnera nadrzędnego'));
            $builder->add('ads_description', 'hidden',array('required'=>false,'label'=>'Kod polecający partnera nadrzędnego'));
            $builder->add('ad_desktop', 'hidden', array( 'label' => 'Reklama na komputery', 'mapped'=>false, 'required' => false ));
            $builder->add('ad_mobile', 'hidden', array( 'label' => 'Reklama na urządzenia mobilne', 'mapped'=>false, 'required' => false ));
            $builder->add('ad_link', 'hidden', array( 'label' => 'Reklama na urządzenia mobilne', 'mapped'=>false, 'required' => false ));
        

            $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($builder,$options)
            {
               $form = $event->getForm();
               $data = $event->getData();

               if (is_object($data))
               {  
                   if($data->getType()=='contractor'){
                    $form->add('cities', 'textarea',array('label'=>'Miasta wykonawcy',  'attr'=>array('class'=>'tags'), 'mapped' => true, 'required'=>false,   ));            
                    $form->add('description', 'textarea',array('label'=>'Opis wykonawcy', 'required'=>false)); 
                   } 
                   
                   
                   if($data->getType()=='partner'){
                    $form->add('discount', 'text',array('required'=>false,'label'=>'Zniżka procentowa dla partnera'));  
                    $form->add('new_parent_partner_code', 'text',array('mapped' => false, 'attr'=>array('data-help'=>'Aby powiązać tego partnera z partnerem nadrzędnym wpisz kod partnera nadrzędnego. Pamiętaj że w celu pełnej aktywacji należy zmienić typ konta tego użytkownika na partner po podpisaniu z nim umowy.'), 'required'=>false, 'label'=>'Przydziel partnera nadrzędnego'));
                    $form->add('parent_partner_code', 'text',array('required'=>false,'label'=>'Kod polecający partnera nadrzędnego'));
                    
                   }
                   
                   if($data->getType()=='partner' && $data->getParentPartnerCode()){
                    $form->add('provision', 'text',array('required'=>false,'label'=>'Prowizja procentowa dla partnera'));            
                   }
                   
                   if($data->getType()=='partner'){
                    $form->add('ads', 'checkbox',array('required'=>false,'label'=>'System reklam'));  
                    
                    
                   }
                   
                    if($data->getType()=='partner' && $data->getAds()){
                       
                       $form->add('ads_show', 'checkbox',array('required'=>false,'label'=>'Wyświetlaj reklamy'));  
                       
                       $form->add('ads_name', 'text',array('required'=>false,'label'=>'Nazwa wyświetlana'));
                       $form->add('ads_description', 'text',array('required'=>false,'label'=>'Nazwa funkcji (np "Nagrobek wykonał")'));
              
                        if($data->getAdDesktop() && $data->getAdDesktop()!='') $form->add('ad_desktop', 'file', array( 'label_attr'=> array('image'=>$data->getAdDesktop()), 'label' => 'Zamień baner reklamowy na komputery (szerokość wyświetlania max 1110px, wysokość max 500px, jpg, png lub gif)', 'mapped'=>false, 'required' => false, 'data_class' => null ));
                        else $form->add('ad_desktop', 'file', array( 'label_attr'=> array('image'=>$data->getAdDesktop()), 'label' => 'Dodaj reklamę na komputery (szerokość wyświetlania max 1110px, wysokość max 500px, jpg, png lub gif)', 'mapped'=>false, 'required' => false, 'data_class' => null ));

                        if($data->getAdMobile() && $data->getAdMobile()!='') $form->add('ad_mobile', 'file', array( 'label_attr'=> array('image'=>$data->getAdMobile()), 'label' => 'Zamień baner reklamowy na urządzenia mobilne (szerokość wyświetlania max 900px, wysokość max 900px, jpg, png lub gif)', 'mapped'=>false, 'required' => false, 'data_class' => null ));
                        else $form->add('ad_mobile', 'file', array( 'label_attr'=> array('image'=>$data->getAdMobile()), 'label' => 'Dodaj baner reklamowy na urządzenia mobilne (szerokość wyświetlania max 900px, wysokość max 900px, jpg, png lub gif)', 'mapped'=>false, 'required' => false, 'data_class' => null ));

                       $form->add('ad_link', 'text',array('required'=>false,'label'=>'Adres strony do której mają kierować banery (razem z http lub https):'));
              
                    }  
                   
                   
               }  
            }); 
        }
        


        
        
             
        $builder->add('save', 'submit', array('label' => 'Zapisz')); 
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