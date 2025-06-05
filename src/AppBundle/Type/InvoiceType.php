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
use AppBundle\Type\InvoiceItemType;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        
        //var_dump($options);
        //die();
        $data=$options['data'];
        
        //die($options['user']->getFirstName());
        
        //var_dump($data);
        //die($data->getAccount());
        
        $accounts=array('WBK 95 1060 0135 3411 0000 0397 0680');
        $payments=array('Przelew', 'Gotówka', 'Karta kredytowa', 'Karta płatnicza', 'Kompensata');
        $deadlines=array(1,2,3,7,14,32);
        $cities=array('Warszawa');

        $cities=array_combine($cities, $cities);
        $deadlines=array_combine($deadlines, $deadlines);
        $payments=array_combine($payments, $payments);
        $accounts=array_combine($accounts, $accounts);
        
        $types=array(1 => 'Faktura VAT', 2 => 'Faktura Pro-Forma', 3 => 'Paragon');
        //$types=array_combine($types, $types);
        
        $deadlines=array(0=>'Brak')+$deadlines;
        
        if(!in_array($data->getAccount(), $accounts)) $accounts=$accounts+array($data->getAccount()=>$data->getAccount());
        if(!in_array($data->getPayment(), $payments)) $payments=$payments+array($data->getPayment()=>$data->getPayment());     
        
        $builder
            ->add('type', 'choice',array('label'=>'Typ dokumentu', 'required'=>true, 'choices' => $types  ))     
                
            ->add('number', 'text',array('label'=>'Nr faktury', 'required'=>false, 'attr'=>array('placeholder'=>'Automatyczny', 'class'=>'number'))) 
            ->add('created', 'datetime',array('label'=>'Data wystawienia', 'date_widget'=>'single_text',  'attr'=>array('class'=>'datetime') ))
            ->add('sold', 'date',array('label'=>'Data sprzedaży', 'widget'=>'single_text' ))
            ->add('note', 'textarea',array('label'=>'Uwagi', 'required'=>false, 'attr'=>array('placeholder'=>'')))     
                
            ->add('payment', 'choice',array('label'=>'Rodzaj płatności', 'required'=>true, 'choices' =>  $payments ))     
            ->add('account', 'choice',array('label'=>'Nr konta', 'required'=>true, 'choices' => $accounts ,  'attr'=>array('class'=>'long')  ))     
            ->add('deadline', 'choice',array('label'=>'Termin', 'required'=>true, 'choices' => $deadlines  ))         
            ->add('city', 'choice',array('label'=>'Miasto', 'required'=>true, 'choices' => $cities  ))      
             
            ->add('buyer_data', 'textarea',array('label'=>'Nabywca', 'required'=>true, 'attr'=>array()))     
            ->add('seller_data', 'textarea',array('label'=>'Sprzedawca', 'required'=>true, 'attr'=>array()))     
                ;
            
        
            //account pozwalajacy na dodanie calkiem innej wartosci niz te zdefiniowane wyzej:
        
            $builder->addEventListener(FormEvents::PRE_SUBMIT, function(FormEvent $event) {
                $form = $event->getForm();
                $data = $event->getData();
                $form->remove('account');
                $form->add('account', 'choice', array(
                    'choices' => array(
                        $data['account'] => $data['account'],
                    )
                ));
            });
        
        
        //'allow_delete' => true,
        $builder->add('items', 'collection', array( 'options'=> array('ss'=>1),  'label'=>'Pozycje na fakturze', 'type' => new \AppBundle\Type\InvoiceItemType(),   'allow_add'    => true));
        
        
            $builder->add('save', 'submit', array('label' => 'Zapisz'));
        
        //var_dump($options['validation_groups']); die();SiteBundle
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'ss' => 'qq',
            'user'=> null,
            'data_class' => 'AppBundle\Entity\Invoice',
            'validation_groups' => array(
                'registration'
            ),
        ));
    }
    
    public function getName()
    {
        return 'invoice';
    }
}