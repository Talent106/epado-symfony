<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Type\CemeteryType;
use AppBundle\Entity\Cemetery;
use AppBundle\Entity\User;
use Symfony\Component\Form\FormError;

use Doctrine\ORM\QueryBuilder;

class CemeteryController extends BaseController
{
    
  

    /**
     * @Route("/{_locale}/cemetery/info", name="cemetery_info")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function infoAction(Request $request, $ad=null){
         
        $repository=$this->getDoctrine()->getRepository('AppBundle:Cemetery');

        $em = $this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Cemetery','c')         
        ->select('COUNT(c)')
        ->andWhere('c.checked=false');
        
        $count = $query->getQuery()->getSingleScalarResult();

        return array('count'=>$count);
    }
    

    
    
    /**
     * @Route("/{_locale}/cemeteries/{page}", name="cemetery_list", defaults={"page" = 1})
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
        ->from('AppBundle:Cemetery','p')  
        ->leftJoin('p.address','a')           
        ->where('p.deleted IS NULL ')
        ->select('p');

        if(!in_array($this->getUser()->getType(),array('admin','worker','trader') ) || $ad!=1){
           $query->andWhere('p.creator=:creator');
           $query->setParameter('creator',$this->getUser());
        }
                
        
        $filters_params=array('ad'=>$ad);

        
        if ($request->getMethod() == 'GET') {

            $checked_id=$this->get('request')->query->get('checked_id');
            $checked=$this->get('request')->query->get('checked');
            
            if($checked_id && in_array($this->getUser()->getType(),array('admin','worker','trader')) ){
                $repository=$this->getDoctrine()->getRepository('AppBundle:Cemetery');
                $object = $repository->findOneById($checked_id);
                if(!$object) throw $this->createNotFoundException('Cmentarz nie istnieje'); 
                
                if($checked=='null') $object->setChecked(null);
                else $object->setChecked($checked);
                
                $em->persist($object);
                
                $em->flush();
                
                return $this->refresh(array(),array('checked_id','checked'));
            }
            
        }    
        
        

        


        $filters=array(
            array( 'name'=>'name', 'table'=>'p','type'=>'text', 'label'=>$this->get('translator')->trans('Wyszukaj'), 'value'=>null),
            array( 'name'=>'state', 'table'=>'p','type'=>'select', 'label'=>$this->get('translator')->trans('Stan'), 'empty'=>false, 'options'=>array(array('id'=>-1,'name'=>$this->get('translator')->trans('Zweryfikowane')),array('id'=>1,'name'=>$this->get('translator')->trans('Wszystkie')),array('id'=>2,'name'=>$this->get('translator')->trans('Niezweryfikowane')),array('id'=>3,'name'=>$this->get('translator')->trans('Błędne'))) , 'value'=>-1 )  ,
            
        );
        
        if($this->get('request')->query->get('reset')==1) return $this->refresh($filters_params,array('?*','page'));
        $stateset=false;
        foreach($filters as $id=>$data){
            if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                
                
                $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                
                if($data['type']=='text') {
                    $query->andWhere($filters[$id]['table'].'.'.$data['name'].' LIKE \'%'.$filters[$id]['value'].'%\'');
                    $query->orWhere('a.address LIKE \'%'.$filters[$id]['value'].'%\'');
                    $query->orWhere('a.city LIKE \'%'.$filters[$id]['value'].'%\'');
                    $query->orWhere('a.postal_code LIKE \'%'.$filters[$id]['value'].'%\'');
                    
                }   
                elseif($data['name']=='state'){
                    if(!$this->get('request')->query->get($data['table'].'_'.$data['name'])){
                        //$this->get('request')->query->set('o_paid',1);
                        $stateset=true;
                        $query->andWhere($data['table'].'.checked = true');
                    }
                    if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                        if($filters[$id]['value']==-1) { $stateset=true; $query->andWhere($data['table'].'.checked = true'); }
                        if($filters[$id]['value']==1) { $stateset=true;  }
                        if($filters[$id]['value']==2) { $stateset=true; $query->andWhere($data['table'].'.checked = false'); }
                        if($filters[$id]['value']==3) { $stateset=true; $query->andWhere($data['table'].'.checked IS NULL '); }
                    }
                }
                
            }   
        }
        
        if(!$stateset && $ad==1) $query->andWhere($data['table'].'.checked = true');
        
        $pager=$this->getPager($page,30,$query);  
        
        return array('ad'=>$ad,'objects'=>$pager['results'], 'pager'=>$pager, 'filters'=>$filters, 'filters_params'=>$filters_params, 'order_id'=>$order_id, 'order'=>$order); 
    }
    
    
    /* @var $query QueryBuilder */
    /**
     * @Route("/{_locale}/cemetery/form/{id}", name="cemetery_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formAction(Request $request, $id){
        $object=null;
        $em = $this->getDoctrine()->getManager();
        
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Cemetery');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Cmentarz nie istnieje'); 
            
            if(!in_array($this->getUser()->getType(),array('admin','worker','trader') )){
               if($object->getCreator()!=$this->getUser()) 
               throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
            }
        }else{

            $object=new Cemetery();
            
            if(in_array($this->getUser()->getType(),array('admin','worker','trader')) ){
                $object->setChecked(true);
            }
            
            $object->setCreator($this->getUser());
            $address=new \AppBundle\Entity\Address();

            if($this->getUser()->getDeliveryAddress()){
                $address->setCountry($this->getUser()->getDeliveryAddress()->getCountry());  
            }elseif($this->getUser()->getBillingAddress()){
                $address->setCountry($this->getUser()->getBillingAddress()->getCountry());  
            }else{
                $r=$this->getDoctrine()->getRepository('AppBundle:Country');
                $country = $r->findOneById(657);
                if($country) $address->setCountry($country); 
            }
            
            $object->setAddress($address); 
        }
        
        if($this->get('request')->query->get('response'))
        $response=$this->get('request')->query->get('response');    
        else
        $response='form';


        
        $form=$this->createForm(new CemeteryType(), $object, array(
            'default_locale'=>$this->container->getParameter('default_locale'),
            'locales'=>$this->container->getParameter('admin_locales'),
            'translator'=>$this->get('translator'),
            'validation_groups'=> array('default'),
            'cascade_validation' => true) );
                    
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                //$em->persist($object->getAddress());
                $em->persist($object);
                $em->flush();
      
                return $this->refresh( array('id'=>$object->getId(),'response'=>'close'), array('?*') );
            }else $response='error'; 
        }

        return array('object'=>$object,'form'=>$form->createView(), 'response'=>$response);
    }
    
}
