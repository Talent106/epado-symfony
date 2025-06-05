<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Type\CompanyType;
use AppBundle\Entity\Company;
use AppBundle\Entity\User;
use Symfony\Component\Form\FormError;

class CompanyController extends BaseController
{
    

    /**
     * @Route("/{_locale}/companies/{page}", name="company_list", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexAction(Request $request, $page)
    {
        if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        //$repository=$this->getDoctrine()->getRepository('AppBundle:Company');
        //$objects = $repository->findAll();
        
        
        
        $em = $this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Company','c')        
        ->select('c'); //, com
        
     
        
        
        $pager=$this->getPager($page,15,$query);  
        
        
        return array('objects'=>$pager['results'], 'pager'=>$pager);
    }

    /**
     * @Route("/{_locale}/company/form/{id}", name="company_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formAction(Request $request, $id){
        
        if($this->getUser()->getType()=='partner') throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Company');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Użytkownik nie istnieje'); 
        }else{
            $object=new Company();
            $object->setCreator($this->getUser());
        }
      
        $form=$this->createForm(new CompanyType(), $object, array('validation_groups'=>'registration','cascade_validation' => true) );
                       
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }
        
        //$repository=$this->getDoctrine()->getRepository('AppBundle:User');
        //if($object->getId()) $users = $repository->findBy(array('company'=>$object->getId()));
        //else $users=null;
        
        //$users=$object->getUsers();
        return array('object'=>$object, 'form'=>$form->createView()); //, 'users'=>$users
    }
}
