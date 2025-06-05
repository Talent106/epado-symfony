<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Type\FamilyType;
use AppBundle\Entity\Family;
use AppBundle\Entity\User;
use Symfony\Component\Form\FormError;

use Doctrine\ORM\QueryBuilder;

class FamilyController extends BaseController
{
    
  
    
    /**
     * @Route("/{_locale}/families/{page}", name="family_list", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexAction(Request $request, $page)
    {
        $ad=$this->get('request')->query->get('ad');
         
        
        $em = $this->getDoctrine()->getManager();

        $order_id=null;
        $order=null;
        
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Family','p') 
        ->where('p.deleted IS NULL ')        
        ->select('p');

        if(!in_array($this->getUser()->getType(),array('admin','worker') ) || $ad!=1){

           $query->leftJoin('AppBundle:PageCredentials','c', \Doctrine\ORM\Query\Expr\Join::WITH, 'c.user = :user AND c.family=p');
           $query->andWhere('p.creator=:user OR c.user=:user ');
           $query->setParameter('user',$this->getUser());
           
        }
        
        $filters_params=array('ad'=>$ad);


        $filters=array(
            array( 'name'=>'name', 'table'=>'p','type'=>'text', 'label'=>$this->get('translator')->trans('Nazwa rodziny'), 'value'=>null),
        );
        
        if($this->get('request')->query->get('reset')==1) return $this->refresh($filters_params,array('?*','page'));
        
        foreach($filters as $id=>$data){
            if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                
                $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                
                if($data['type']=='text') $query->andWhere($filters[$id]['table'].'.'.$data['name'].' LIKE \'%'.$filters[$id]['value'].'%\'');
            }   
        }
        
        $pager=$this->getPager($page,30,$query);  
        
        return array('ad'=>$ad,'objects'=>$pager['results'], 'pager'=>$pager, 'filters'=>$filters, 'filters_params'=>$filters_params, 'order_id'=>$order_id, 'order'=>$order); 
    }
    
    
    /* @var $query QueryBuilder */
    /**
     * @Route("/{_locale}/family/form/{id}", name="family_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formAction(Request $request, $id){
        $object=null;
        $em = $this->getDoctrine()->getManager();

        if($id){
            
            
            
            $repository=$this->getDoctrine()->getRepository('AppBundle:Family');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Rodzina nie istnieje'); 
            
            if(!$this->getUser()->haveFamilyPermission($object)) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
//            if(!in_array($this->getUser()->getType(),array('admin','worker') )){
//               if($object->getCreator()!=$this->getUser()) 
//               throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
//            } 
            
        }else{
            $object=new Family();
            $object->setCreator($this->getUser());
        }
        
        if($this->get('request')->query->get('response'))
        $response=$this->get('request')->query->get('response');    
        else
        $response='form';

        
        $form=$this->createForm(new FamilyType(), $object, array(
            'default_locale'=>$this->container->getParameter('default_locale'),
            'locales'=>$this->container->getParameter('admin_locales'),
            'translator'=>$this->get('translator'),
            'validation_groups'=> array('default'),
            'cascade_validation' => true) );
                    
        
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            //if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
      
                
                        
                return $this->refresh( array('id'=>$object->getId(),'response'=>'close'), array('?*') );
            }else $response='error'; 
        }

        return array('object'=>$object,'form'=>$form->createView(), 'response'=>$response);
    }
    
}
