<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Type\CountryType;
use AppBundle\Entity\Country;
use AppBundle\Entity\User;
use Symfony\Component\Form\FormError;

use Doctrine\ORM\QueryBuilder;

class CountryController extends BaseController
{
    
  
    
    /**
     * @Route("/{_locale}/countries/{page}", name="country_list", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexAction(Request $request, $page)
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        
        $em = $this->getDoctrine()->getManager();

        $order_id=null;
        $order=null;
        
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Country','p')  
        ->leftJoin('p.translations','pt')     
        ->where("pt.locale = '".$request->getLocale()."'")        
        ->select('p'); 


        $filters_params=array();


        $filters=array(
            array( 'name'=>'name', 'table'=>'pt','type'=>'text', 'label'=>$this->get('translator')->trans('Nazwa kraju'), 'value'=>null),
        );
        
        if($this->get('request')->query->get('reset')==1) return $this->refresh($filters_params,array('?*','page'));
        
        foreach($filters as $id=>$data){
            
            if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                $page=1;
                $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                
                if($data['type']=='text') $query->andWhere($filters[$id]['table'].'.'.$data['name'].' LIKE \'%'.$filters[$id]['value'].'%\'');
            }   
        }
        
        $pager=$this->getPager($page,40,$query);  
        
        return array('objects'=>$pager['results'], 'pager'=>$pager, 'filters'=>$filters, 'filters_params'=>$filters_params, 'order_id'=>$order_id, 'order'=>$order); 
    }
    
    
    /* @var $query QueryBuilder */
    /**
     * @Route("/{_locale}/countries/form/{id}", name="country_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formAction(Request $request, $id){
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        
        $object=null;
        $em = $this->getDoctrine()->getManager();
        
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Country');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Kraj nie istnieje'); 
            
        }else{
            $object=new Country();
            $object->setCreator($this->getUser());
        }
      


        
        $form=$this->createForm(new CountryType(), $object, array(
            'default_locale'=>$this->container->getParameter('default_locale'),
            'locales'=>$this->container->getParameter('admin_locales'),
            'translator'=>$this->get('translator'),
            'cascade_validation' => true) );
                    
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
      
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }

        return array('object'=>$object,'form'=>$form->createView());
    }
    
}
