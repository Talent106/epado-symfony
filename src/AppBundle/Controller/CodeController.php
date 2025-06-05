<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\CodeGroup;
use AppBundle\Entity\Code;
use AppBundle\Entity\User;
use Symfony\Component\Form\FormError;
use AppBundle\Type\CodeType;

class CodeController extends BaseController
{
    

    /**
     * @Route("/{_locale}/codes/{page}", name="code_list", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexAction(Request $request, $page)
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');

        
        $em = $this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:CodeGroup','c')     
        ->where('c.deleted IS NULL ')   
        ->orderBy('c.created','DESC')
        ->select('c');
        
        $code=$this->get('request')->query->get('code');
        if($code){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Code');
            $object = $repository->findOneBy(array('code'=>$code)); 
        }else $object=null;

        
        
        $pager=$this->getPager($page,15,$query);  
        
        
        return array('objects'=>$pager['results'], 'pager'=>$pager, 'object'=>$object);
    }
    
    
    /**
     * @Route("/{_locale}/sold/{page}", name="sold", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function soldAction(Request $request, $page)
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker','partner') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');

        
        $em = $this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Code','c')
        ->leftJoin('c.order_product_many','op')
        ->leftJoin('op.order','o')
                
        ->where('o.buyer=:buyer')->setParameter('buyer',$this->getUser())   
        ->orderBy('c.created','DESC')
        ->select('c');
        
        $change_id=$this->get('request')->query->get('change_id');
        if($change_id){    
            
            $repository=$this->getDoctrine()->getRepository('AppBundle:Code');
            $object = $repository->findOneById($change_id); 
            
            if($object){
                if($object->getPage()){
                    $object->getPage()->setAds(!$object->getPage()->getAds());
                    $em->persist($object);
                    $em->flush();
                    
                    $this->get('session')->getFlashBag()->add('success', 'Zmieniono wyświetlanie reklam dla kodu '.$object->getCode());
                    
                } else $this->get('session')->getFlashBag()->add('error', 'Kod nie ma strony');
            }else $this->get('session')->getFlashBag()->add('error', 'Nie odnaleziono kodu');
            
            return $this->refresh(array(),array('?*'));
            
        }
        
        
        $code=$this->get('request')->query->get('code');
        if($code){
            
            $query->andWhere('c.code=:code')->setParameter('code',$code);
            
            //$repository=$this->getDoctrine()->getRepository('AppBundle:Code');
            //$object = $repository->findOneBy(array('code'=>$code)); 
            
        }else $code=null;

        
        
        $pager=$this->getPager($page,15,$query);  
        
        
        return array('objects'=>$pager['results'], 'pager'=>$pager, 'code'=>$code);
    }

    

    /**
     * @Route("/{_locale}/code/form/{id}", name="code_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formAction(Request $request, $id){
        
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');

        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:CodeGroup');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Grupa nie istnieje'); 
        }else{
            $object=new CodeGroup();
            $object->setCreator($this->getUser());
            $object->setUsed(0);
        }
      
        $form=$this->createForm(new CodeType(), $object, array('data'=>$object,'cascade_validation' => false, 'validation_groups'=>'edit', 
            'default_locale'=>$this->container->getParameter('default_locale'),
            'locales'=>$this->container->getParameter('admin_locales'),
            ) );
                       
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                
                if($object->getProduct()){
                    if(!$object->getDocument()){
                        $object->setDocument($object->getProduct()->getDocument());
                    }
                }
                
                $em->persist($object);
                
                if(!$object->getId()){
                    
                    for ($i = 1; $i <= $object->getAmount(); $i++) {
                        $this->codes[$i]=$this->code($i);
                        $this->passwords[$i]=$this->password();
                    }

                    
                    for ($i = 1; $i <= $object->getAmount(); $i++) {
                        $code=new \AppBundle\Entity\Code();
                        
                        $code->setGroup($object);
                        $code->setPassword($this->passwords[$i]);
                        $code->setCode($this->codes[$i]);
                        $code->setNumber($i);
                        $em->persist($code);  
                    }
                    
                    //var_dump($this->codes);
                    //var_dump($this->passwords);
                    //die('end');
                }
                
                
                
                
                $em->flush();
                
                
                
                
                
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }

        return array('object'=>$object, 'form'=>$form->createView()); //, 'users'=>$users
    }

    public function randomNumber($digits){
      return rand(pow(10, $digits - 1) - 1, pow(10, $digits) - 1);
    }
    
    public function randomString($length){
        $pattern='123456789qwertyuipasdfghkzxcvbnmQWERTYUPASDFGHJKLZXCVBNM';
        $key='';
        for($i=0; $i<$length; $i++){
            $key.=$pattern{rand(0,strlen($pattern)-1)};
        }
        return $key;
    }

    public $codes=array();
    public $passwords=array();
    
    public function code($nr=0){
        $date=date('ymd');
        $nr=str_pad($nr, 4, '0', STR_PAD_LEFT);
        
        $em = $this->getDoctrine()->getManager();
        
        $code=0; 
        while($code==0){
            $code=$this->randomNumber(1).$date.$this->randomNumber(4).$nr;
            
            if(in_array($code,$this->codes)) { $code=0;  continue; }

            $query = $em->
                createQuery('SELECT 1 FROM AppBundle:Code c WHERE c.code = :code')
                    ->setParameter('code', $code)
                    ->setMaxResults(1);

            if(count($query->getResult())) $code=0;
        }

        return $code;  
    }
    
    public function password(){       
        $em = $this->getDoctrine()->getManager();
        
        $password=0; 
        while($password==0){
            $password=$this->randomString(9);
            
            if(in_array($password,$this->passwords)) { $password=0;  continue; }
            
            $query = $em->
                createQuery('SELECT 1 FROM AppBundle:Code c WHERE c.password = :password')
                    ->setParameter('password', $password)
                    ->setMaxResults(1);
            
            if(count($query->getResult())) $password=0;
        }

        return $password;  
    }
    
    
    
    /**
     * @Route("/{_locale}/welcome.pdf", name="welcome_print")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function welcomePrintAction(Request $request){
        
        $codes=null;
        $name='';
        
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');


        
        $group_id=$this->get('request')->query->get('group_id');
        $id=$this->get('request')->query->get('id');
        
        $em = $this->getDoctrine()->getManager();

        if($group_id)
        {   
            $repository_group=$this->getDoctrine()->getRepository('AppBundle:CodeGroup');
            $group = $repository_group->findOneBy(array('id'=>$group_id));
            
            if(!$group) throw $this->createNotFoundException('Grupa nie istnieje'); 
            
            $repository_code=$this->getDoctrine()->getRepository('AppBundle:Code');
            $codes = $repository_code->findBy(array('group'=>$group,'page'=>null)); 
            
            if(!$codes) throw $this->createNotFoundException('W grupie nie ma już kodów do wydruku');
            
            $name='Powitania z grupy '.$group->getName().'.pdf';
        }
        
        if($id)
        {    
            $repository_code=$this->getDoctrine()->getRepository('AppBundle:Code');
            $codes = $repository_code->findBy(array( 'id'=> $id) );    
            
            $name='Powitania wybrane.pdf';
        }

        if(!$codes) throw $this->createNotFoundException('Brak kodów do wydruku');
        
        
        $locale=$request->getLocale();
        if(isset($group)) $request->setLocale($group->getLocale());
        
        
        require_once $this->get('kernel')->getRootDir() . '/../vendor/mpdf/mpdf.php';

        $mpdf=new \mPDF();   

        $documents=array();
        foreach($codes as $code){

            $var_code='
            <div class="password">
                <div class="aktywacja"><div class="label ">'.$this->get('translator')->trans('Kod aktywacyjny').':</div>
                <div style="float:left; margin-left:40px;">
                <div class="data">'.$code->getPassword().'</div></div>
                </div>
            </div>';
            
            $var_fixed_code='
            <div style="margin-left:48mm; padding-top:116.5mm; color:black;">
            <div style="padding:5px 5px; font-family:arial; font-size:14px; border:1px solid black; border-radius:8px; width:125px; text-align:center; color:black;">'.$code->getPassword().'</div>
            </div>';
            
            //if($code->getGroup()->getProduct())
            //$document=nl2br($code->getGroup()->getProduct()->getDocument());
            //else 
            //$document=nl2br($code->getGroup()->getDocument());
            
            $document=nl2br($code->getGroup()->getDocument());
            
            $document=str_replace(array(
              '{code}',
              '{fixed_code}'  
            ),array(
              $var_code,
              $var_fixed_code  
            ), $document);
            
            $documents[$code->getCode()]=$document;       
        }
               
        $mpdf->WriteHTML(htmlspecialchars_decode($this->get('twig')->render(
                    'AppBundle:Code:welcome.html.twig',
                    array('codes'=>$codes,'documents'=>$documents)
        ))); 
        
        $mpdf->Output($name,'I');
        
        die();
        
    }
    

    /**
     * @Route("/{_locale}/codes.pdf", name="code_print")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function codesPrintAction(Request $request){
        $codes=null;
        $name='';
        
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');


        $group_id=$this->get('request')->query->get('group_id');
        $id=$this->get('request')->query->get('id');
        
        $em = $this->getDoctrine()->getManager();
        

        if($group_id)
        {   
            $repository_group=$this->getDoctrine()->getRepository('AppBundle:CodeGroup');
            $group = $repository_group->findOneBy(array('id'=>$group_id));
            
            if(!$group) throw $this->createNotFoundException('Grupa nie istnieje'); 
            
            $repository_code=$this->getDoctrine()->getRepository('AppBundle:Code');
            $codes = $repository_code->findBy(array('group'=>$group,'page'=>null)); 
            
            if(!$codes) throw $this->createNotFoundException('W grupie nie ma już kodów do wydruku');
            
            $name='Kody z grupy '.$group->getName().'.pdf';
        }
        
        if($id)
        {    
            $repository_code=$this->getDoctrine()->getRepository('AppBundle:Code');
            $codes = $repository_code->findBy(array( 'id'=> $id) );    
            
            $name='Kody wybrane.pdf';
        }
        
        
        if(!$codes) throw $this->createNotFoundException('Brak kodów do wydruku');
        
        
        require_once $this->get('kernel')->getRootDir() . '/../vendor/mpdf/mpdf.php';

        $mpdf=new \mPDF();   

        
        $mpdf->WriteHTML(htmlspecialchars_decode($this->get('twig')->render(
                    'AppBundle:Code:codes.html.twig',
                    array()
        ))); 
        
        $mpdf->WriteHTML('<div class="wrapper">');    
        $column=-1;
        $row=0;

        foreach($codes as $code){

            $column++;
            if($column>5) { $column=0; $row++; if($row>9) { $row=0; $mpdf->WriteHTML('&nbsp;</div><div class="wrapper">'); }  }

            $x=5+$column*49;
            $y=5+$row*59;

            $mpdf->WriteHTML('
            <div class="kod" style="left:'.$x.'mm; top:'.$y.'mm;">
                <div class="idimg">'.$code->getCode().'</div>
                <div class="barcodeimg">    
                    <barcode code="https://epado.com/'.$code->getCode().'?scan=1" type="QR" class="barcode" size="1.28" error="L" />
                </div>
                <div class="logoimg "><img src="/images/logo.svg" style="width:32.0mm; margin-top:2px;" /></div>
            </div>
            ');  
        }
          
        $mpdf->WriteHTML('</div>');   

        $mpdf->Output($name,'I');
        
        die();
    }

    
    
}
