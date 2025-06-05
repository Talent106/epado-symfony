<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Type\UserType;
use AppBundle\Type\UserAdsType;

use Symfony\Component\Form\FormError;




class UserController extends BaseController
{

    /**
     * @Route("/{_locale}/users/{page}", name="user_list", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexAction(Request $request, $page)
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker','trader') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        $sort=$this->get('request')->query->get('sort');
        

        $em = $this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:User','u')  
        ->leftJoin('u.billing_address','ba')  
        ->leftJoin('u.delivery_address','da')        
        ->andWhere('u.deleted IS NULL') 
        ->andWhere('u.enabled = 1')   
                
        ->select('u'); 
        
     
        
        $years=array();
        for ($i = date('Y'); $i >= 2015; $i--) {
            $month=12;
            if($i==date('Y')) $month=date('m');
            for ($j = $month; $j >= 1; $j--) {
                $name=str_pad($j, 2, '0', STR_PAD_LEFT);
                $years[]=array('id'=>$j.'-'.$i,'name'=>$name.'-'.$i);
            } 
        }
        
        $filters_params=array();
        $filters_params['sort']=$sort;
        
        if($sort){
            foreach($sort as $k=>$v){
                if($v==0) $sort='ASC';  else $sort='DESC';
                $query->orderBy($k,$sort);
            }
        }
        
        $type_names=$this->getUser()->getTypeNames();
        foreach($type_names as $key=>$value){
            $type_names[$key]=$this->get('translator')->trans($value);
        }        
               
        $filters=array(
            'search'=>array( 'name'=>'search', 'table'=>'u','type'=>'text', 'label'=>$this->get('translator')->trans('Wyszukaj'), 'value'=>null),
            array( 'name'=>'first_name', 'table'=>'u','type'=>'text', 'label'=>$this->get('translator')->trans('Imię'), 'value'=>null),
            array( 'name'=>'last_name', 'table'=>'u','type'=>'text', 'label'=>$this->get('translator')->trans('Nazwisko'), 'value'=>null),
            array( 'name'=>'email', 'table'=>'u','type'=>'text', 'label'=>$this->get('translator')->trans('Email'), 'value'=>null), 
            'type'=>array( 'name'=>'type', 'table'=>'u','type'=>'select', 'label'=>$this->get('translator')->trans('Typ konta'), 'options'=>$type_names , 'value'=>null ),
        );
  
        if($this->get('request')->query->get('reset')==1) return $this->refresh($filters_params,array('?*','page'));



        foreach($filters as $id=>$data){
            if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                
                if($id=='search'){
                    $query->andWhere('u.first_name LIKE \'%'.$filters[$id]['value'].'%\' '
                            . 'OR u.last_name LIKE \'%'.$filters[$id]['value'].'%\' '
                            . 'OR u.cities LIKE \'%'.$filters[$id]['value'].'%\' '
                            . 'OR u.description LIKE \'%'.$filters[$id]['value'].'%\' '
                            . 'OR da.address LIKE \'%'.$filters[$id]['value'].'%\' '
                            . 'OR da.city LIKE \'%'.$filters[$id]['value'].'%\' '
                            . 'OR ba.company LIKE \'%'.$filters[$id]['value'].'%\' '
                            . 'OR ba.city LIKE \'%'.$filters[$id]['value'].'%\' '
                            . 'OR ba.tax_id LIKE \'%'.$filters[$id]['value'].'%\' '
                            . '');
                }
                elseif($data['type']=='text') {
                    $query->andWhere($filters[$id]['table'].'.'.$data['name'].' LIKE \'%'.$filters[$id]['value'].'%\'');
                }
                elseif($id=='type'){
                   $query->andWhere($filters[$id]['table'].'.'.$data['name'].' = \''.$filters[$id]['value'].'\'');
                }
            }   
        }
        
        
        $pager=$this->getPager($page,15,$query);  

        return array('objects'=>$pager['results'], 'pager'=>$pager, 'filters'=>$filters, 'filters_params'=>$filters_params);
    }

    /**
     * @Route("/{_locale}/user/form/{id}", name="user_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formAction(Request $request, $id){
        
        if(!in_array($this->getUser()->getType(),array('admin', 'worker', 'partner') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:User');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Użytkownik nie istnieje'); 
            $validation_group='update';
        }else{
            $object=new User();
            $validation_group='create';
            $object->setCreator($this->getUser());
            $object->setPassword('init');
            $object->setRoles(array('ROLE_ADMIN'));
            $object->setEnabled(true);
            $object->setNotificationMessage(true);
            $object->setNotificationPost(true);
        }
      
        
        
        $em=$this->getDoctrine()->getManager();
        
        $ads=$object->getAds();
        
        if ($request->getMethod() == 'GET' && $object) {

            $date=$this->get('request')->query->get('date');
            $city=$this->get('request')->query->get('city');
            $print=$this->get('request')->query->get('print');
            
            
            if($print==1){

                $locale=$request->getLocale();
                $request->setLocale($object->getLocale());
                
                require_once $this->get('kernel')->getRootDir() . '/../vendor/mpdf/mpdf.php';

                $mpdf=new \mPDF('', '', 0, '', 15, 15, 35, 15, 8, 8); 

                $mpdf->SetHTMLHeaderByName('header');
                $mpdf->SetHTMLFooterByName('footer');

                $repository=$this->getDoctrine()->getRepository('AppBundle:Text');
                $text = $repository->findOneById(3);
                
                $mpdf->WriteHTML(htmlspecialchars_decode($this->get('twig')->render(
                    'AppBundle:User:printPartner.html.twig',
                    array('object'=>$object,'do'=>'print','city'=>$city,'date'=>$date, 'text'=>$text)
                )));

                $pdf=$mpdf->Output('Umowa Dystrybucyjna.pdf','S');

                return new \Symfony\Component\HttpFoundation\Response($pdf ,200 , array('Content-type' => 'application/pdf'));
                
            }
            
            
            $product_delete_id=$this->get('request')->query->get('product_delete_id'); 
            $product_id=$this->get('request')->query->get('product_id');
            $product=$this->get('request')->query->get('product');
            $delete_parent_partner=$this->get('request')->query->get('delete_parent_partner');
            
            if($delete_parent_partner){
                $object->setParentPartner(null);
                $em->persist($object);
                $em->flush();
                
                return $this->redirectToRoute('user_form',array('id'=>$object->getId()) ); 
            }
            
            if($product_delete_id){
                $repository=$this->getDoctrine()->getRepository('AppBundle:UserProduct');
                $up = $repository->findOneById($product_delete_id);
                if(!$up) throw $this->createNotFoundException('Powiązanie nie istnieje');

                $em->remove($up);
                $em->flush(); 

                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Produkt został usunięty z listy wykonawcy')); 

                return $this->redirectToRoute('user_form',array('id'=>$object->getId()) ); 
            }
            
            
            if($product_id){
                $repository=$this->getDoctrine()->getRepository('AppBundle:Product');
                $product = $repository->findOneById($product_id);
                if(!$product) throw $this->createNotFoundException('Powiązanie nie istnieje');
                foreach($object->getProducts() as $p){
                    if($p->getProduct()->getId()==$product->getId()) throw $this->createNotFoundException('Powiązanie nie istnieje');
                }
                
                
                $up = new \AppBundle\Entity\UserProduct();
                $up->setUser($object);
                $up->setProduct($product);
                $up->setCreator($this->getUser());

                $em->persist($up);
                $em->flush(); 

                return $this->render('AppBundle:User:product.html.twig', array(
                    'p' => $up
                ));
                
            }
            
            if($product){

                $repository=$this->getDoctrine()->getRepository('AppBundle:ProductType');
                $pt = $repository->findOneById(3);
                if(!$pt) throw $this->createNotFoundException('Powiązanie nie istnieje');
                
                $query=$em->createQueryBuilder();
                $query
                ->from('AppBundle:Product','p')
                ->leftJoin('p.translations','pt')  
                ->leftJoin('p.contractors','pc', \Doctrine\ORM\Query\Expr\Join::WITH, 'pc.user = :user AND pc.product=p')  
                ->andWhere('pc.user!=:user OR pc.user IS NULL')
                ->setParameter('user',$object)
                ->andWhere('p.type=:type')
                ->setParameter('type',$pt)  
                ->andWhere('pt.name LIKE \'%'.$product.'%\'')
                        
                ->setMaxResults(20)                
                ->select('p');

                $products = $query->getQuery()->getResult();

                return $this->render('AppBundle:User:products.html.twig', array(
                    'products' => $products
                ));
            }
            
        }
        
        
		if(in_array($this->getUser()->getType(),array('admin') ))       
			$form=$this->createForm(new UserType(), $object, array('validation_groups'=>array($validation_group, 'admin_form'),'cascade_validation' => true) );		
		else			
			$form=$this->createForm(new UserType(), $object, array('validation_groups'=>array($validation_group),'cascade_validation' => true) );

			
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            
            
            if(!empty($_FILES)) {

                $types=array('image/png','image/jpeg','image/gif');
                $extensions=array('jpg','jpeg','png','gif');
 
                // @var $file \Symfony\Component\HttpFoundation\File\UploadedFile
                foreach ($request->files as $files) foreach ($files as $name=>$file) if($file && ($name=='ad_desktop' || $name=='ad_mobile')){
                   
                    if(!$file || !in_array($file->getMimeType(),$types) || !in_array($file->guessExtension(),$extensions)){
                        $message=$this->get('translator')->trans('Niewłaściwy format pliku, dozwolone pliki to jpg lub png.');
                        $this->get('session')->getFlashBag()->add('error', $message);
                    }
                    elseif($file->getSize()>$file->getMaxFilesize()){
                        $message=$this->get('translator')->trans('Plik jest za duży. Dozwolony rozmiar to:').' '.$file->getMaxFilesize();
                        $this->get('session')->getFlashBag()->add('error', $message);
                    }
                    else{

                      $filename = sha1(uniqid(mt_rand(), true)).'.'.$file->guessExtension();
                      $dir=__DIR__.'/../../../web/'.'uploads/ads';
                      if(!file_exists($dir)) mkdir($dir);
                      $target = __DIR__.'/../../../web/'.'uploads/ads'.'/'.$filename;
                      $temp=move_uploaded_file($file->getPathname(), $target);   
                      
                      if($name=='ad_desktop'){
                          $object->setAdDesktop($filename);
                      }
                      if($name=='ad_mobile'){
                          $object->setAdMobile($filename);
                      }
                      
                      $em->persist($object);
                      $em->flush();
                    }
            
                   
                }    
                
                
            }
            
            
            
            
            if($object->getPhone()!=''){ 
                $matches=preg_match("/^[+][0-9]{1,4}[.][0-9]{5,20}$/", $object->getPhone());
                if(!$matches){
                    $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Podałeś zły nr telefonu'));  
                    $form->get('phone')->addError($error);   
                }
            }
            
            $data=$this->get('request')->request->get('user');
            if($data['new_password']){

                if($data['new_password']==$data['new_password_confirm']){
                    $userManager = $this->container->get('fos_user.user_manager');
                    $object->setPlainPassword($data['new_password']);
                    $userManager->updatePassword($object);  
                }
                else{
                    $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Potwierdzenie nie zgadza sie z wpisanym hasłem'));  
                    $form->get('new_password')->addError($error);   
                    //$this->get('session')->getFlashBag()->add('error', 'Potwierdzenie hasła nie zgadza sie z tym wpisanym w polu nowe hasło.' );
                }

            }
            
            if($data['new_parent_partner_code']){
                
                $data['new_parent_partner_code']=strtoupper($data['new_parent_partner_code']);
                $query=$em->createQueryBuilder();
                $query
                ->from('AppBundle:User','u')->select('u')
                ->andWhere('u.type=:partner')->setParameter('partner','partner')
                ->andWhere('u.parent_partner_code=:code')->setParameter('code',$data['new_parent_partner_code']);
                $parent_partner=$query->getQuery()->getOneOrNullResult();
                
                if(!$parent_partner || $parent_partner==$object){
                    $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Nie znaleziono takiego kodu polecającego upewnij się że został podany prawidłowy kod.'));  
                    $form->get('new_parent_partner_code')->addError($error);
                }else{
                    $object->setParentPartner($parent_partner);
                }
            }
            
            if($object->getType()=='partner' && $object->getDiscount()==null ){
                $object->setDiscount(40);
            }
            
            if($object->getType()=='partner' && $object->getProvision()==null ){
                $object->setProvision(10);
            }
            
            if($form->isValid()) {
                
                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Zmiany zostały zapisane.') );

                $em = $this->getDoctrine()->getManager();
                if($object->getParentPartnerCode()){
                    $object->setParentPartnerCode(strtoupper($object->getParentPartnerCode()));
                }
                $em->persist($object);
                $em->flush();
                
                $data=$this->get('request')->request->get('user');
                
                if($data['new_password']){
                    //$userManager = $this->container->get('fos_user.user_manager');
                    //$object->setPlainPassword($data['new_password']);
                    //$userManager->updatePassword($object);  
                    //$this->get('session')->getFlashBag()->add('success', 'Hasło zostało zmienione.' );
                }
                
                $em->persist($object);
                $em->flush();
                
                if($object->getAds() && $object->getAds()!=$ads) return $this->refresh( array('id'=>$object->getId()), array('?*'),'#ads' );
                else return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }
        
        return array('object'=>$object, 'form'=>$form->createView());
    }
    

    

    /**
     * @Route("/{_locale}/ads/form", name="ads", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function adsAction(Request $request){
        
        
        $object=$this->getUser();
        
        
        $em=$this->getDoctrine()->getManager();
        
        $validation_group='';
        
        $form=$this->createForm(new UserAdsType(), $object, array('validation_groups'=>array($validation_group),'cascade_validation' => true) );
                       
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            
            
            if(!empty($_FILES)) {

                $types=array('image/png','image/jpeg','image/gif');
                $extensions=array('jpg','jpeg','png','gif');
 
                // @var $file \Symfony\Component\HttpFoundation\File\UploadedFile
                foreach ($request->files as $files) foreach ($files as $name=>$file) if($file && ($name=='ad_desktop' || $name=='ad_mobile')){
                   
                   
                    $info = getimagesize($file);
                    list($w, $h) = $info; 
                    
                    var_dump($w);  
                    if($name=='ad_desktop' && ($w>1100 || $h>500)){
                        $this->get('session')->getFlashBag()->add('error', 'Wymiary pliku graficznego dla reklamy na komputerach przekraczają dozwoloną wartość.');             
                    }
                    elseif($name=='ad_mobile' && ($w>900 || $h>900)){
                        $this->get('session')->getFlashBag()->add('error', 'Wymiary pliku graficznego dla reklamy na urządzeniach mobilnych przekraczają dozwoloną wartość.');   
                    }
                    elseif(!$file || !in_array($file->getMimeType(),$types) || !in_array($file->guessExtension(),$extensions)){
                        $this->get('session')->getFlashBag()->add('error', 'Niewłaściwy format pliku, dozwolone pliki to jpg lub png.');
                    }
                    elseif($file->getSize()>$file->getMaxFilesize()){
                        $this->get('session')->getFlashBag()->add('error', 'Plik jest za duży. Dozwolony rozmiar to:');
                    }
                    else{

                      $filename = sha1(uniqid(mt_rand(), true)).'.'.$file->guessExtension();
                      $dir=__DIR__.'/../../../web/'.'uploads/ads';
                      if(!file_exists($dir)) mkdir($dir);
                      $target = __DIR__.'/../../../web/'.'uploads/ads'.'/'.$filename;
                      $temp=move_uploaded_file($file->getPathname(), $target);   
              
                      if($name=='ad_desktop'){
                          $object->setAdDesktop($filename);
                      }
                      if($name=='ad_mobile'){
                          $object->setAdMobile($filename);
                      }
                              
                      $em->persist($object);
                      $em->flush();
                      

                    }
            
                   
                }    
                
                
            }
        
            if($form->isValid()) {
                
                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Zmiany zostały zapisane.') );

                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
                
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }
        
        return array('object'=>$object, 'form'=>$form->createView());
    }
     
    
    
    

    /**
     * @Route("/{_locale}/admin", name="admin")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function adminAction(Request $request){
        
        if(!in_array($this->getUser()->getType(),array('admin') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        $repository=$this->getDoctrine()->getRepository('AppBundle:Text');
        $text = $repository->findOneById(4);

        $clear=$this->get('request')->query->get('clear');
        if($clear==1){
              $fs = new \Symfony\Component\Filesystem\Filesystem();
              $temp=$fs->remove($this->container->getParameter('kernel.cache_dir'));
              
              die('Cache zostało wyczyszczone');
        }
        

        $em=$this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Page','p')
        ->leftJoin('p.translations','pt')              
        ->where('p.expired>:now')    
        ->andWhere('p.deleted IS NULL ')             
        ->setParameter("now", new \DateTime('now'))    
        ->groupBy('p.locale, p.type, p.category')        
        ->select('count(p) AS amount, p AS page');

        $pages_active = $query->getQuery()->getResult(); //\Doctrine\ORM\Query::HYDRATE_ARRAY

        $em=$this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Page','p')
        ->leftJoin('p.translations','pt')              
        ->where('p.expired<:now OR p.expired IS NULL')    
        ->andWhere('p.deleted IS NULL ')             
        ->setParameter("now", new \DateTime('now'))    
        ->groupBy('p.locale, p.type, p.category')        
        ->select('count(p) AS amount, p AS page');

        $pages_inactive = $query->getQuery()->getResult(); //\Doctrine\ORM\Query::HYDRATE_ARRAY

        $em=$this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Image','i')            
        ->leftJoin('i.page','p')
        ->groupBy('p.locale, p.type, p.category')   
        ->andWhere('p.type IS NOT NULL')
        ->andWhere('i.video IS NULL')        
        ->select('count(i) AS amount, i AS image, p AS page');

        $images = $query->getQuery()->getResult(); //\Doctrine\ORM\Query::HYDRATE_ARRAY
        
        $em=$this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Image','i')            
        ->leftJoin('i.page','p')
        ->groupBy('p.locale, p.type, p.category')   
        ->andWhere('p.type IS NOT NULL')
        ->andWhere('i.video IS NOT NULL')            
        ->select('count(i) AS amount, i AS image, p AS page');

        $videos = $query->getQuery()->getResult();

        $em=$this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Audiobook','i')            
        ->leftJoin('i.page','p')
        ->groupBy('p.locale, p.type, p.category')   
        ->andWhere('p.type IS NOT NULL')      
        ->select('count(i) AS amount, i AS image, p AS page');

        $audiobooks = $query->getQuery()->getResult();

        $em=$this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Post','i')            
        ->leftJoin('i.page','p')
        ->groupBy('p.locale, p.type, p.category')   
        ->andWhere('p.type IS NOT NULL')      
        ->select('count(i) AS amount, i AS image, p AS page');

        $posts = $query->getQuery()->getResult();
        
        
        return array('text'=>$text,'pages_active'=>$pages_active,'pages_inactive'=>$pages_inactive,'images'=>$images,'videos'=>$videos, 'audiobooks'=>$audiobooks, 'posts'=>$posts);
    }
    
    
}
