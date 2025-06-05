<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use AppBundle\Entity\Message;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Type\UserType;

use Symfony\Component\Form\FormError;

//login
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

//annotations
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;


class MessageController extends BaseController
{
    /* @var $query QueryBuilder */
    /* @var $dql Query */

    /**
     * @Route("/{_locale}/messages/{page}", name="message_list", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexAction(Request $request, $page)
    {
        $em=$this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query->from('AppBundle:Message','m')
        ->select('m')
        ->andWhere('m.parent IS NULL')
        ->andWhere('(m.recipient = :user OR m.creator = :user)')        
        ->orderBy('m.updated','DESC')
        ->setParameter('user', $this->getUser());        
         
        $pager=$this->getPager($page,15,$query);  
        
        
        return array('objects'=>$pager['results'], 'pager'=>$pager);
    }
    
    
    /* @var $query QueryBuilder */
    /* @var $dql Query */

    /**
     * @Route("/{_locale}/questions/{page}", name="questions_list", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function questionsAction(Request $request, $page)
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');

        $em=$this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query->from('AppBundle:Message','m')
        ->select('m')
        ->andWhere('m.parent IS NULL')
        ->andWhere('(m.recipient IS NULL AND m.creator IS NOT NULL)')        
        ->orderBy('m.updated','DESC');
       // ->setParameter('user', null);        
         
        $pager=$this->getPager($page,15,$query);  
        
        
        return array('objects'=>$pager['results'], 'pager'=>$pager);
    }
    
    

    /**
     * @Route("/{_locale}/messages/info", name="message_info")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     * @Cache(expires="tomorrow", public=false)
     */
    public function infoAction()
    {
        
        $repository=$this->getDoctrine()->getRepository('AppBundle:Message');

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT COUNT(m) FROM AppBundle:Message m
            WHERE (m.recipient = :recipient OR m.creator = :creator) AND m.parent IS NULL AND m.read IS NULL AND m.updater<>:creator
            ORDER BY m.updated DESC')
        ->setParameter('recipient', $this->getUser())
        ->setParameter('creator', $this->getUser());

        $count = $query->getSingleScalarResult();

        return array('count'=>$count);
    }
    


    /**
     * @Route("/{_locale}/questions/info", name="questions_info")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     * @Cache(expires="tomorrow", public=false)
     */
    public function infoQuestionsAction()
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');

        $repository=$this->getDoctrine()->getRepository('AppBundle:Message');

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT COUNT(m) FROM AppBundle:Message m
            WHERE (m.recipient IS NULL AND m.creator IS NOT NULL) AND m.parent IS NULL
            ORDER BY m.updated DESC');

        $count = $query->getSingleScalarResult();

        return array('count'=>$count);
    }
    

    /**
     * @Route("/{_locale}/message/form/{id}", name="message_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formAction(Request $request, $id){
       
        $object=null;
        $recipient=null;
        $messages=null;
        
        $new=new Message();
        $new->setCreator($this->getUser());
        
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Message');
            $object = $repository->findOneById($id);
            
            //die($object->getRecipient()->getId().'aa');
            
            if($object->getCreator()==$this->getUser()) { $new->setRecipient($object->getRecipient()); }
            else { $new->setRecipient($object->getCreator()); }
            
            $new->setParent($object);
            
            $messages=$repository->findBy(array('parent'=>$object), array('created'=>'DESC'));
 
            if( ($object->getRecipient()!=$this->getUser() && $object->getCreator()!=$this->getUser()) && !in_array($this->getUser()->getType(),array('admin','worker') ) )  throw $this->createNotFoundException('Brak dostępu');  
            
            if($object->getUpdater()!=$this->getUser() && !$object->getRead()) {
                $updated=$object->getUpdated();
                $object->setRead(new \DateTime(date('Y-m-d H:i:s')));

                $em = $this->getDoctrine()->getManager();
                $object->setUpdated($updated);
                $em->persist($object);
                $em->flush();
            }    
        }else{
 
            $recipient_id=$this->get('request')->query->get('recipient_id');
            if($recipient_id){
                $r=$this->getDoctrine()->getRepository('AppBundle:User');
                $recipient = $r->findOneById($recipient_id);
                
                if(!$recipient) throw $this->createNotFoundException('Adresat wiadomości nie istnieje'); 
                $new->setRecipient($recipient);
                
            }else $this->createNotFoundException('Adresat wiadomości nie jest dostępny');   
        }
        

        if ($request->getMethod() == 'GET') {
//
//            $user=$this->get('request')->query->get('user'); 
//            if($user){
//                
//                $em = $this->getDoctrine()->getManager();
//                
//                $dql_where='';
//                if($this->getUser()->getType()=='partner') $dql_where=' AND p.partner_contact=1';
//                //c.name LIKE :user  JOIN AppBundle:Company c WITH p.company=c
//                $query = $em->createQuery(
//                    'SELECT p FROM AppBundle:User p
//                    WHERE ( OR p.first_name LIKE :user OR p.last_name LIKE :user) AND p<>:object '.$dql_where.'
//                    ORDER BY p.first_name ASC')
//                ->setMaxResults(20)       
//                ->setParameter('user',  '%'.$user.'%')
//                ->setParameter('object',  $this->getUser());
//
//                
//                
//                $result = $query->getResult();
//
//                return $this->render(
//                    'AppBundle::Message/userResult.html.twig',
//                    array('result' => $result)
//                );
//            }
//            
        }
        
        
        if ($request->getMethod() == 'POST') {
            
           $subject=$this->get('request')->get('subject'); 
           $message=$this->get('request')->get('message');
           $recipient_id=$this->get('request')->get('recipient_id');
           $new->setMessage($message);
           if($subject) $new->setSubject($subject);
           
           if($new->getParent()){
               $new->getParent()->setUpdater($this->getUser());
               $new->getParent()->setUpdated(new \DateTime(date('Y-m-d H:i:s')));
               $new->getParent()->setCount($new->getParent()->getCount()+1);
               $new->getParent()->setRead(null);
           }else{
               $new->setUpdater($this->getUser());
               $new->setUpdated(new \DateTime(date('Y-m-d H:i:s')));   
               $new->setCount(1);
               $new->setRead(null);
           }  
           
           if($object && $object->getRecipient()===null && in_array($this->getUser()->getType(),array('admin','worker') ) ){
              $object->setRecipient($this->getUser());   
           }
           
           if($recipient_id){
                $repository=$this->getDoctrine()->getRepository('AppBundle:User');
                $us = $repository->findOneById($recipient_id);
                if(!$us) $this->createNotFoundException('Brak dostępu'); 
                $new->setRecipient($us);
           }
           if($new->getRecipient()){
                if($new->getRecipient()->getNotificationMessage())
                //if($page->getBuyer()->getNotificationPost())    
                $this->sendNotification(5, array(
                '{{sender}}'=>$this->getUser()->getFullName(),
                '{{message}}'=>$message,
                '{{link}}'=>$this->getUrlProtocol($this->generateUrl('message_list',array(),true)),
                    
                ), $new->getRecipient());
                //$this->sendMail('Dostałeś nową wiadomość','Użytkownik '.$this->getUser()->getFirstName().' '.$this->getUser()->getLastName().' wysłał do Ciebie wiadomość w systemie Epado. ',$new->getRecipient()->getEmail());        
           }
           
           $em = $this->getDoctrine()->getManager();
           if($new->getParent()) $em->persist($new->getParent());
           $em->persist($new);
           $em->flush();
           
           if(!$object) return $this->refresh(array('id'=>$new->getId()));
           else return $this->refresh();

        }
        
        
        return array('object'=>$object, 'messages'=>$messages, 'new'=>$new);
    }
    



}
