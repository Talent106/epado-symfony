<?php

namespace App\Services;


use Symfony\Component\Form\AbstractTypeExtension;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BaseType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class FormTypeExtension
 * @package Acme\FrontendBundle\Form\Extension
 */
class FormTypeExtension extends AbstractTypeExtension //AbstractTypeExtension
{
    /**
     * Extends the form type which all other types extend
     *
     * @return string The name of the type being extended
     */
    public function getExtendedType()
    {
        return FormType::class;
    }

    /**
     * Add the extra row_attr option
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'help'=>'',
            'row_class'=> '',
            'icon'=>'',
            'image'=>'',
            
        ));
    }

    /**
     * Pass the set row_attr options to the view
     *
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['help'] = $options['help'];
        $view->vars['row_class'] = $options['row_class'];
        $view->vars['icon'] = $options['icon'];
        $view->vars['image'] = $options['image'];
    }
}