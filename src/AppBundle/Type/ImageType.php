<?php

namespace AppBundle\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class ImageType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       // $builder->add('name','text');
        
        //->add('id','hidden', array( 'property_path' => false));
        
//        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (DataEvent $event) use ($builder)
//        {
//          //$form = $event->getForm();
//          //$data = $event->getData();
//
//          /* Check we're looking at the right data/form */
//          //if (!$data || $data->getId()!==null)
//          {
//             //$builder->add('file', 'file');
//          }
//        });
        
        
        $builder  
            ->add('name', 'text',array('label'=>'Nazwa', 'required'=>false)) 
            ->add('description', 'textarea',array('label'=>'Opis', 'required'=>false))
            ->add('video', 'text',array('label'=>'Link do filmu', 'required'=>false)) 
            ->add('save', 'submit', array('label' => 'Zapisz', 'attr'=>array('class'=>'') ));
        
        
        
//        $builder->addEventListener(FormEvents::PRE_SET_DATA,
//            function(FormEvent $event) use ($builder) {
//                $image = $event->getData();
//               
//                if (!$image || null === $image->getId()) {
//                   $event->getForm()->add('file', 'file', array( 'label'=>'Zdjęcie', 'required' => false ));  
//                } else {
//                   $event->getForm()->add('file', 'file', array( 'label'=>'Zdjęcie', 'required' => false ));  
//                   //$builder->add('file', 'file', array( 'required' => false ));
//
//                }
//            }
//        );
        
        
        //if(!$this->getData() || null === $this->getData()->getId())
        //var_dump($builder->getData());
        //$builder->add('file', 'file', array( 'required' => false )); //is_null($builder->getData()) || is_null($builder->getData()->getId())

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Image',
            'cascade_validation'=>true,
            'validation_groups'=> array(),
            'locales' => array('pl'),
            'default_locale' => 'pl',
            'translator'=> null,
        ));
    }

    public function getName()
    {
        return 'image';
    }
}
