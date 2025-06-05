<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Type\OrderType;
use AppBundle\Entity\Contract;
use AppBundle\Entity\User;
use AppBundle\Entity\Order;
use AppBundle\Entity\OrderProduct;
use AppBundle\Entity\Payment;
use Symfony\Component\Form\FormError;

class OrderController extends BaseController
{
    

    

    /**
     * @Route("/{_locale}/orders/{page}", name="order_list", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexAction(Request $request, $page)
    {
        $ad=$this->get('request')->query->get('ad');
        
        $em = $this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Order','o')    
        ->leftJoin('o.buyer','u')        
        //->leftJoin('u.delivery_address','a')         
        ->select('o')
        ->orderBy('o.created','DESC');
        
        if(!in_array($this->getUser()->getType(),array('admin','worker','trader') ) || $ad!=1 ){
           $query->andWhere('o.buyer=:buyer');
           $query->setParameter('buyer',$this->getUser());
        }else{
           //$query->andWhere('o.confirmed IS NOT NULL'); 
        }
        
        
        $statuses=$this->getDoctrine()->getManager()->createQueryBuilder()
            ->from('AppBundle:OrderStatus','s')
            ->leftJoin('s.translations','st')       
            ->addSelect('s,st')
            ->getQuery()->getArrayResult();  

        foreach($statuses as $i=>$s){
            if(isset($s['translations'][$request->getLocale()]['name']))
            $statuses[$i]['name']=$s['translations'][$request->getLocale()]['name'];
            else $statuses[$i]['name']='';
        }
 
        
        
 
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
        if($ad==1) $filters_params=array('ad'=>1);
        $filters=array(
            'name'=>array( 'name'=>'id', 'table'=>'o','type'=>'text', 'label'=>$this->get('translator')->trans('Nr zamówienia'), 'value'=>null),
            'state'=>array( 'name'=>'state', 'table'=>'o','type'=>'select', 'label'=>$this->get('translator')->trans('Stan'), 'empty'=>false, 'options'=>array(array('id'=>-1,'name'=>$this->get('translator')->trans('Wszystkie')),array('id'=>1,'name'=>$this->get('translator')->trans('Koszyk')),array('id'=>2,'name'=>$this->get('translator')->trans('Potwierdzone')),array('id'=>3,'name'=>$this->get('translator')->trans('Zakończone')),array('id'=>4,'name'=>$this->get('translator')->trans('Anulowane'))) , 'value'=>2 ),
            'status'=>array( 'name'=>'status', 'table'=>'o','type'=>'select', 'label'=>$this->get('translator')->trans('Status'), 'options'=>$statuses , 'value'=>null ),
            'paid'=>array( 'name'=>'paid', 'table'=>'o','type'=>'select', 'label'=>$this->get('translator')->trans('Stan'), 'empty'=>false, 'options'=>array(array('id'=>-1,'name'=>$this->get('translator')->trans('Wszystkie')),array('id'=>1,'name'=>$this->get('translator')->trans('Opłacone')),array('id'=>2,'name'=>$this->get('translator')->trans('Nieopłacone'))) , 'value'=>1 ) ,
            'year'=>array( 'name'=>'year', 'table'=>'o','type'=>'select', 'label'=>$this->get('translator')->trans('Miesiąc'), 'options'=>$years , 'value'=>null ),

        );  
        
        
        
        if($this->get('request')->query->get('reset')==1) return $this->refresh(array(),array('?*','page'));
        
        if(in_array($this->getUser()->getType(),array('admin','worker','trader') ) && $ad==1)
        foreach($filters as $id=>$data){
            
            if($id=='year'){
                    $page=1;
                    $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                    if($filters[$id]['value']) {
                        $emConfig = $em->getConfiguration();
                        $emConfig->addCustomDatetimeFunction('YEAR', '\AppBundle\Dql\Datetime\Year');
                        $emConfig->addCustomDatetimeFunction('MONTH', '\AppBundle\Dql\Datetime\Month');
                        $emConfig->addCustomDatetimeFunction('DAY', '\AppBundle\Dql\Datetime\Day');
                        $temp=explode('-',$filters[$id]['value']);
                        
                        $query->andWhere(' YEAR(o.created)=  \''.$temp[1].'\' ');
                        $query->andWhere(' MONTH(o.created)=  \''.$temp[0].'\' ');
                    }   
            }
            elseif($data['type']=='text' && $data['name']!='id'){
                if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                    $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);

                    if($data['type']=='text') $query->andWhere($filters[$id]['table'].'.'.$data['name'].' LIKE \'%'.$filters[$id]['value'].'%\'');
                }
            }
            elseif($data['name']=='state'){
                if(!$this->get('request')->query->get($data['table'].'_'.$data['name'])){
                    $this->get('request')->query->set('o_paid',1);
                }
                if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                    
                    $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                }
                if($filters[$id]['value']){
                    if($filters[$id]['value']==1) { $query->andWhere($data['table'].'.confirmed IS NULL')->andWhere($data['table'].'.done IS NULL'); }
                    if($filters[$id]['value']==2) { $query->andWhere($data['table'].'.confirmed IS NOT NULL')->andWhere($data['table'].'.done IS NULL'); }
                    if($filters[$id]['value']==3) { $query->andWhere($data['table'].'.confirmed IS NOT NULL')->andWhere($data['table'].'.done IS NOT NULL'); }
                    if($filters[$id]['value']==4) { $query->andWhere($data['table'].'.canceled IS NOT NULL'); }
                }
            }
            elseif($data['name']=='paid'){
                if(!$this->get('request')->query->get($data['table'].'_'.$data['name'])){
                    $this->get('request')->query->set('o_paid',2);
                }
                if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                    $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);

                    if($filters[$id]['value']==1) { $query->andWhere($data['table'].'.paid IS NOT NULL'); }
                    if($filters[$id]['value']==2) { $query->andWhere($data['table'].'.paid IS NULL'); }
                   
                }
            }
            elseif($data['name']=='status' || $data['name']=='company'){
                
                if($this->get('request')->query->get($data['table'].'_'.$data['name']) || $data['value']){
                    if($this->get('request')->query->get($data['table'].'_'.$data['name'])) $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                    $query->andWhere($filters[$id]['table'].'.'.$data['name'].' = '.$filters[$id]['value'].'');
                }
            }
            elseif($data['name']=='id'){
                if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                    $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);

                    $query->andWhere($filters[$id]['table'].'.'.$data['name'].' LIKE \'%'.$filters[$id]['value'].'%\'');
                    $query->orWhere('u.first_name LIKE \'%'.$filters[$id]['value'].'%\'');
                    $query->orWhere('u.last_name LIKE \'%'.$filters[$id]['value'].'%\'');
                    $query->orWhere('o.delivery LIKE \'%'.$filters[$id]['value'].'%\'');
                    $query->orWhere('o.billing LIKE \'%'.$filters[$id]['value'].'%\'');
                    $query->orWhere('o.note LIKE \'%'.$filters[$id]['value'].'%\'');
                }
            }
            else{  
               if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                    $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);    
               }
            }
        }  
  
        $buyer_id=$this->get('request')->query->get('buyer_id');
        if($buyer_id){
            $buyer=$this->getDoctrine()->getRepository('AppBundle:User')->findOneById($buyer_id);
            if($buyer){
                $filters_params['buyer_id']=$buyer_id;
                $query->andWhere('o.buyer=:buyer')->setParameter('buyer', $buyer);
                $this->get('session')->getFlashBag()->add('notice', $this->get('translator')->trans('Przeszukujesz zamówienia użytkownika:').' '.$buyer->getFullName().'.' );
            }
        }
        
        $pager=$this->getPager($page,15,$query);  

        
        return array('ad'=>$ad, 'objects'=>$pager['results'], 'pager'=>$pager,'filters'=>$filters, 'filters_params'=>$filters_params);

        
    }
    
    
    
    
    

    /**
     * @Route("/{_locale}/contract/form/{id}", name="contract_form")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formContractAction(Request $request, $id){
       
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:OrderProduct');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Usługa nie istnieje'); 
            
            
            if(!in_array($this->getUser()->getType(),array('admin','worker','contractor') )){
               if($object->getOrder()->getBuyer()!=$this->getUser()) throw $this->createNotFoundException('Usługa nie istnieje'); 
            }
            if(in_array($this->getUser()->getType(),array('contractor') )){
               if($object->getContractor()!=$this->getUser()) throw $this->createNotFoundException('Usługa nie istnieje'); 
            }
            
            
        }else{
            throw $this->createNotFoundException('Usługa nie istnieje'); 
        }
        
        
        
        $em=$this->getDoctrine()->getManager();

        
        $contractor_confirm=$this->get('request')->query->get('contractor_confirm');
        $customer_confirm=$this->get('request')->query->get('customer_confirm');
        $rating=$this->get('request')->query->get('rating');
        $review=$this->get('request')->query->get('review');
        
        if(in_array($this->getUser()->getType(),array('admin','worker') ) || $object->getContractor()==$this->getUser() ){ 
            if($contractor_confirm){
                
                if(count($object->getImages())>3){
                    
                    $object->setContractorConfirmed(new \DateTime());
                    $em->persist($object);
                    $em->flush();
                    
                    $this->sendNotification(7, array(
                    '{{link}}'=>$this->getUrlProtocol($this->generateUrl('contract_form',array('id'=>$object->getId()),true)).'#photos',    
                    '{{service}}'=>$object->getName(),
                    '{{page}}'=>$object->getPage()->getName(),    
                    '{{serviceid}}'=>$object->getId(),    
                    '{{orderid}}'=>$object->getOrder()->getId(),     
                    ), $object->getOrder()->getBuyer() );
                    //$this->sendMail('Prośba o potwierdzenie wykonania usługi','wykonawca dodał zdjęcia i oznaczył usługę jako wykonaną. Zaloguj się do Epado i zweryfikuj wykonanie usługi na podstawie dodanych zdjęć.',$object->getOrder()->getBuyer()->getEmail());
                    
                    //$this->get('session')->getFlashBag()->add('success', 'Status został zmieniony.' );
                    
                    $status=$this->getDoctrine()->getRepository('AppBundle:OrderStatus')->findOneBy(array('contractor_confirmation'=>'1'));
                    if($status){
                        $this->setOrderStatus($object->getOrder(),$status);
                    } 
 
                    
                    $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Oznaczono usługę jako wykonana.') );
         
                    
                    return $this->refresh( array(), array('?*') );
        
                }else{
                    $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Status nie został zmieniony. Musisz dodać co najmniej 4 zdjęcia.') );
        
                    return $this->refresh( array(), array('?*') );
                }
            }
        }
        
        if(in_array($this->getUser()->getType(),array('admin','worker') ) || $object->getOrder()->getBuyer()==$this->getUser() ){ 
            if($customer_confirm){
                    $object->setCustomerConfirmed(new \DateTime());
                    if(!$review) $review=null;
                    $object->setReview($review);
                    
                    if(!$rating) $rating=null;
                    $object->setRating($rating);
                    
                    $em->persist($object);
                    $em->flush();
                    
                    $query=$this->getDoctrine()->getManager()->createQueryBuilder();
                    $query->select("avg(u.rating) AS rating")
                    ->from('AppBundle:OrderProduct','u')        
                    ->where('u.contractor = :user')
                    ->andWhere('u.rating IS NOT NULL')
                    ->setParameter('user', $object->getContractor());
                    
                    $avg=$query->getQuery()->getSingleScalarResult();
                    $object->getContractor()->setRating($avg);
                    $em->persist($object->getContractor());
                    $em->flush();
                    
                    
                    
                    if($object->getContractor()) {
                        
                        if(!$object->getReview()) $review=$this->get('translator')->trans('Brak');
                        if(!$object->getRating()) $rating=$this->get('translator')->trans('Brak');
                        
                        $this->sendNotification(6, array(
                        '{{link}}'=>$this->getUrlProtocol($this->generateUrl('contract_form',array('id'=>$object->getId()),true)),       
                        '{{service}}'=>$object->getName(),
                        '{{page}}'=>$object->getPage()->getName(),    
                        '{{serviceid}}'=>$object->getId(),    
                        '{{rating}}'=>$rating,   
                        '{{review}}'=>$review,     
                        '{{orderid}}'=>$object->getOrder()->getId(),   
                        ), $object->getContractor() );
                        
                        
                        //$this->sendMail('Klient ocenił wykonanie usługi',' ',$object->getContractor()->getEmail());
                    }
                    
                    //$this->get('session')->getFlashBag()->add('success', 'Status został zmieniony.' );
                    
                    //$status=$this->getDoctrine()->getRepository('AppBundle:OrderStatus')->findOneBy(array('customer_confirmation'=>'1'));
                    //if($status){
                    //    $this->setOrderStatus($object->getOrder(),$status);
                    //} 
                    
                    $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Usługa została oceniona.') );
                    
                    return $this->refresh( array(), array('?*') );
            }
        }


        
        if(in_array($this->getUser()->getType(),array('admin','worker') ) || $object->getContractor()==$this->getUser() )
        if ($request->getMethod() == 'POST') {

            if(!empty($_FILES)) {
                
                if(!$this->getUser()->havePagePermission($object,'page_images')) {
                    $message=$this->get('translator')->trans('Wystąpił błąd.');
                    if(!$request->isXmlHttpRequest()) {
                        $this->get('session')->getFlashBag()->add('error', $message);
                        return $this->refresh();
                    }
                    throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                }
                
                $types=array('image/png','image/jpeg');
                $extensions=array('jpg','jpeg','png');
 
                // @var $file \Symfony\Component\HttpFoundation\File\UploadedFile
                foreach ($request->files as $file) {

                    if(!$file || !in_array($file->getMimeType(),$types) || !in_array($file->guessExtension(),$extensions)){
                        $message=$this->get('translator')->trans('Niewłaściwy format pliku, dozwolone pliki to jpg lub png.');
                        if(!$request->isXmlHttpRequest()) {
                            $this->get('session')->getFlashBag()->add('error', $message);
                            return $this->refresh();
                        }
                        return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => 'error', 'message'=>$message));
                    }

                    if($file->getSize()>$file->getMaxFilesize()){
                        $message=$this->get('translator')->trans('Plik jest za duży. Dozwolony rozmiar to:').' '.$file->getMaxFilesize();
                        if(!$request->isXmlHttpRequest()) {
                            $this->get('session')->getFlashBag()->add('error', $message);
                            return $this->refresh();
                        }
                        return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => 'error', 'message'=>$message));
                    }
            
                    $img = new \AppBundle\Entity\Image();
                    $img->setOrderProduct($object);

                    $images=$object->getImagesSort();
                    $last=null;
                    if($images) $last=end($images);   
                    if($last) $img->setSort($last->getSort()+1);
                    else $img->setSort(1);  

                    $img->setPath('_NULL_');
                    $em->persist($img);
                    $em->flush();

                    $filename = sha1(uniqid(mt_rand(), true)).'.'.$file->guessExtension();
                    $targetFile = $img->getUploadRootDir().'/'.$filename;
                    $temp=move_uploaded_file($file->getPathname(), $targetFile);     

                    $img->setPath($filename);
                    $em->persist($img);
                    $em->flush();

                    if(!$object->getImage()) { 
                        $object->setImage($img);                 
                        $em->persist($object);
                        $em->flush();
                    }

                    if(!$request->isXmlHttpRequest()) {
                        $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Dodawanie przebiegło prawidłowo'));
                        return $this->refresh();
                    }
                    return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => 'ok', 'id'=>$img->getId()));
                }    
                
                
            }
            if($this->get('request')->request->get('video')){
                    $url=$this->getVideoImage($this->get('request')->request->get('video'));
                    //die($url);
                    
                    if(!$url){
                        $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Wystąpił błąd upewnij się że podany link jest prawidłowy.'));
                        return $this->refresh(); 
                    }
                    
                    $img = new \AppBundle\Entity\Image();
                    $img->setOrderProduct($object);
                    $img->setVideo($this->get('request')->request->get('video'));
                    $img->setPath('_NULL_');
                    
                    $images=$object->getImagesSort();
                    if($images) $last=end($images);   
                    if($last)
                    $img->setSort($last->getSort()+1);
                    else
                    $img->setSort(1);  
                    
                    $em->persist($img);
                    $em->flush();
                    
                    $filename = sha1(uniqid(mt_rand(), true));
                    
                    $split = explode('.', $url);
                    $targetFile = $img->getUploadRootDir().'/'.$filename.'.'.strtolower(end($split));
                    $size=file_put_contents($targetFile, file_get_contents($url));

                    if($size)
                    {
                        $img->setPath($filename.'.'.end($split));
                        $em->persist($img);
                        $em->flush();
                        
                        return $this->refresh();
                    }
                    else
                    {
                        $em->remove($img);
                        $em->flush();

                        $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Wystąpił błąd upewnij się że podany link jest prawidłowy.'));
                        return $this->refresh();
                    }
                

            }       
        }
        
        
        
        return array('object'=>$object);
    }
    


    /**
     * @Route("/{_locale}/contract/form/{id}/image/del", name="contract_form_del_img", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function delContractImageAction(Request $request, $id){
           
        $product=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:OrderProduct');
            $product = $repository->findOneById($id);
            if(!$product) throw $this->createNotFoundException('Strona nie istnieje');
            
            if(!in_array($this->getUser()->getType(),array('admin','worker','contractor') )){
               throw $this->createNotFoundException('Usługa nie istnieje'); 
            }
            if(in_array($this->getUser()->getType(),array('contractor') ) && $this->getUser()!=$product->getContractor() ){
               throw $this->createNotFoundException('Usługa nie istnieje'); 
            }     
            
        }
        $em = $this->getDoctrine()->getManager();
        foreach($product->getImages() as $image) {
            if($image->getId() == $_POST['delImgId']) {
                
                if($product->getImage() && $image->getId()==$product->getImage()->getId()){
                    $product->setImage(null);
                    $em->persist($product);
                    $em->flush();
                }
                
                $file = $image->getAbsolutePath();
                $em->remove($image);
                $em->flush();
            }
        }

        return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => true));
    }
    
    

    /**
     * @Route("/{_locale}/contract/form/{id}/image/def", name="contract_page_def_img", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function defContractImageAction(Request $request, $id){
        
        $product=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:OrderProduct');
            $product = $repository->findOneById($id);
            if(!$product) throw $this->createNotFoundException('Strona nie istnieje');
        }
        $em = $this->getDoctrine()->getManager();
        foreach($product->getImages() as $image) {
            if($image->getId() == $_POST['defImgId']) {
                $product->setImage($image);
                $em->persist($product);

                $em->flush();
            }
        }

        return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => true));
    }

    
    

    /**
     * @Route("/{_locale}/contract/info", name="contract_info")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function infoContractAction($ad=null)
    {
        $repository=$this->getDoctrine()->getRepository('AppBundle:Message');

        $em = $this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:OrderProduct','op') 
        ->leftJoin('op.order', 'o')    
        ->leftJoin('op.product','p')            
        ->select('COUNT(op)')
        ->where('op.customer_confirmed IS NULL OR op.contractor_confirmed IS NULL')
        ->andWhere('o.paid IS NOT NULL')        
        ->orderBy('op.updated','DESC');
        
        $query->andWhere('o.confirmed IS NOT NULL'); 
 
        $product_type=$this->getDoctrine()->getRepository('AppBundle:ProductType')->findOneBy(array('id'=>'3'));
        if($product_type){
           $query->andWhere('p.type=:type');
           $query->setParameter('type',$product_type);
        } 
        
        if(!in_array($this->getUser()->getType(),array('admin','worker','contractor')) || $ad!=1  ){
           $query->andWhere('o.buyer=:buyer');
           $query->setParameter('buyer',$this->getUser());
        }
        if(in_array($this->getUser()->getType(),array('contractor') ) && $ad==1){
           $query->andWhere('op.contractor=:contractor');
           $query->setParameter('contractor',$this->getUser());
        }
        
        $count = $query->getQuery()->getSingleScalarResult();

        return array('count'=>$count);
    }
    
    

    /**
     * @Route("/{_locale}/cart/info", name="contract_info")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function infoCartAction()
    {
        $count=0;
        
        if($this->getUser()->getCart()){
            if($this->getUser()->getCart()->getConfirmed()==null && $this->getUser()->getCart()->getDeleted()==null && $this->getUser()->getCart()->getCanceled()==null){
                
                $count=count($this->getUser()->getCart()->getOrderProducts());

            }
        }
        
        return array('count'=>$count);
    }
    
    

    /**
     * @Route("/{_locale}/contracts/{page}", name="contract_list", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexContractAction(Request $request, $page)
    {
        $ad=$this->get('request')->query->get('ad');
        $sort=$this->get('request')->query->get('sort');
        
        $em = $this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:OrderProduct','op') 
        ->leftJoin('op.order', 'o')    
        ->leftJoin('op.product','p')  
        ->andWhere('o.paid IS NOT NULL')
        ->select('op')
        ->orderBy('op.updated','DESC');
        
        $product_type=$this->getDoctrine()->getRepository('AppBundle:ProductType')->findOneBy(array('id'=>'3'));
        if($product_type){
           $query->andWhere('p.type=:type');
           $query->setParameter('type',$product_type);
        } 
        
        $query->andWhere('o.confirmed IS NOT NULL'); 
        
        
        if(!in_array($this->getUser()->getType(),array('admin','worker','contractor') ) || $ad!=1 ){
           $query->andWhere('o.buyer=:buyer');
           $query->setParameter('buyer',$this->getUser());
        }
        if(in_array($this->getUser()->getType(),array('contractor') ) && $ad==1  ){
           $query->andWhere('op.contractor=:contractor');
           $query->setParameter('contractor',$this->getUser());
        }
        
        
        $statuses=$this->getDoctrine()->getManager()->createQueryBuilder()
            ->from('AppBundle:OrderStatus','s')
            ->leftJoin('s.translations','st')     
            ->addSelect('s,st')
            ->getQuery()->getArrayResult();  

        foreach($statuses as $i=>$s){
            if(isset($s['translations'][$request->getLocale()]['name']))
            $statuses[$i]['name']=$s['translations'][$request->getLocale()]['name'];
            else $statuses[$i]['name']='';
        }
        

        
        
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
        if($ad==1) $filters_params=array('ad'=>1);
        
        $filters_params['sort']=$sort;
        
        if($sort){
            foreach($sort as $k=>$v){
                if($v==0) $sort='ASC';  else $sort='DESC';
                $query->orderBy($k,$sort);
            }
        }
        
        $filters=array(
            'id'=>array( 'name'=>'id', 'table'=>'op','type'=>'text', 'label'=>$this->get('translator')->trans('Nr usługi'), 'value'=>null ), 
            'id_order'=>array( 'name'=>'id', 'table'=>'o','type'=>'text', 'label'=>$this->get('translator')->trans('Nr zamówienia'), 'value'=>null ), 
            'state'=>array( 'name'=>'state', 'table'=>'op','type'=>'select', 'label'=>$this->get('translator')->trans('Stan usługi'), 'options'=>array(array('id'=>-1,'name'=>$this->get('translator')->trans('Wszystkie')), array('id'=>1,'name'=>$this->get('translator')->trans('W trakcie realizacji')),array('id'=>2,'name'=>$this->get('translator')->trans('Zakończone'))) , 'value'=>1 ),
            'year'=>array( 'name'=>'year', 'table'=>'op','type'=>'select', 'label'=>$this->get('translator')->trans('Miesiąc'), 'options'=>$years , 'value'=>null ),
          
        );  
             
        if($this->get('request')->query->get('reset')==1) return $this->refresh(array('ad'=>$ad),array('?*','page'));
        
        foreach($filters as $id=>$data){
            if($id=='id' || $id=='id_order'){
                    $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);

                    if($data['type']=='text') $query->andWhere($filters[$id]['table'].'.'.$data['name'].' LIKE \'%'.$filters[$id]['value'].'%\'');
            }
            if($id=='year'){
                    $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                    if($filters[$id]['value']) {
                        $emConfig = $em->getConfiguration();
                        $emConfig->addCustomDatetimeFunction('YEAR', '\AppBundle\Dql\Datetime\Year');
                        $emConfig->addCustomDatetimeFunction('MONTH', '\AppBundle\Dql\Datetime\Month');
                        $emConfig->addCustomDatetimeFunction('DAY', '\AppBundle\Dql\Datetime\Day');
                        $temp=explode('-',$filters[$id]['value']);
                        
                        $query->andWhere(' YEAR(op.created)=  \''.$temp[1].'\' ');
                        $query->andWhere(' MONTH(op.created)=  \''.$temp[0].'\' ');
                    }   
            }
            elseif($data['name']=='state'){
                //if($data['value'] && !$this->get('request')->query->get($data['table'].'_'.$data['name'])) $this->get('request')->query->set($data['table'].'_'.$data['name'],$data['value']);
                
                if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                    $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                }    
                if($filters[$id]['value']){
                    if($filters[$id]['value']==1) { $query->andWhere('op.customer_confirmed IS NULL OR op.contractor_confirmed IS NULL');   }
                    if($filters[$id]['value']==2) { $query->andWhere('op.customer_confirmed IS NOT NULL AND op.contractor_confirmed IS NOT NULL'); }
                }
            }
            elseif($data['name']=='status'){
                
                if($this->get('request')->query->get($data['table'].'_'.$data['name']) || $data['value']){
                    if($this->get('request')->query->get($data['table'].'_'.$data['name'])) $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                    $query->andWhere($filters[$id]['table'].'.'.$data['name'].' = '.$filters[$id]['value'].'');
                }
            }
            else{  
               if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                    $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);    
               }
            }
        }  
  
        
        $contractor_id=$this->get('request')->query->get('contractor_id');
        if($contractor_id){
            $user=$this->getDoctrine()->getRepository('AppBundle:User')->findOneById($contractor_id);
            if($user){
                $filters_params['contractor_id']=$contractor_id;
                $query->andWhere('op.contractor=:contractor')->setParameter('contractor', $user);
                $this->get('session')->getFlashBag()->add('notice', $this->get('translator')->trans('Przeszukujesz usługi wykonawcy:').' '.$user->getFullName().'.' );
            }
        }
        
        $buyer_id=$this->get('request')->query->get('buyer_id');
        if($buyer_id){
            $buyer=$this->getDoctrine()->getRepository('AppBundle:User')->findOneById($buyer_id);
            if($buyer){
                $filters_params['buyer_id']=$buyer_id;
                $query->andWhere('o.buyer=:buyer')->setParameter('buyer', $buyer);
                $this->get('session')->getFlashBag()->add('notice', $this->get('translator')->trans('Przeszukujesz usługi zlecone przez użytkownika').' '.$buyer->getFullName().'.' );
            }
        }
        
        
        
        
        $pager=$this->getPager($page,15,$query);  

        return array('ad'=>$ad,  'objects'=>$pager['results'], 'pager'=>$pager,'filters'=>$filters, 'filters_params'=>$filters_params);

        
    }
    
    
    

    

    /* @var $order_product \AppBundle\Entity\OrderProduct */
    /* @var $object \AppBundle\Entity\Order */
    
    public function recountOrder($object){
                $order_products=$object->getOrderProducts();
                if($order_products){
                    $em=$this->getDoctrine()->getManager();
                    $price=0; $products_count=0; $items_count=0;

                    if(!$object->getConfirmed() ){ /* && $this->getUser()==$object->getBuyer() */
                        
                        if($object->getInvoice() && (!$object->getBillingAddress()->getTaxId() || !$object->getBillingAddress()->getCompany())){
                            $object->setInvoice(false);
                        }
                        
                        
                        if($object->getBuyer()->getBillingAddress())
                        $object->setBilling($object->getBuyer()->getBillingAddress()->toString());
                   
                        if($object->getBuyer()->getDeliveryAddress())
                        $object->setDelivery($object->getBuyer()->getDeliveryAddress()->toString());
                        
                        if($object->getBuyer()->getDeliveryAddress()){
                            $new_da=clone $object->getBuyer()->getDeliveryAddress();
                            $em->persist($new_da);
                        }
                        if($object->getBuyer()->getBillingAddress()){
                            $new_ba=clone $object->getBuyer()->getBillingAddress();
                            $em->persist($new_ba);
                        }
                        
                        if($object->getDeliveryAddress()) $em->remove($object->getDeliveryAddress());
                        if($object->getBillingAddress()) $em->remove($object->getBillingAddress());

                        if($object->getDeliveryAddress()) $object->setDeliveryAddress(null);
                        if($object->getBillingAddress()) $object->setBillingAddress(null);
                        $em->persist($object);
                        
                        
                        $em->flush();
                        
                        if($object->getBuyer()->getBillingAddress()) $object->setDeliveryAddress($new_da);
                        if($object->getBuyer()->getBillingAddress()) $object->setBillingAddress($new_ba);
                        

                        $object->setParentPartner(null);
                        $object->setPartner(null);
                            
                        foreach($order_products as $order_product){
                            
                            $order_product->setDiscount(null);
                            $order_product->setDiscountPrice(null);
                            $order_product->setProvision(null);
                            $order_product->setProvisionPrice(null);
                            
                            $order_product->setCurrency($object->getCurrency());
                            $order_product->setPrice($order_product->getProduct()->getPrice($object->getCurrency()));
                            if(in_array($object->getBuyer()->getType(),array('admin','worker','partner','trader') ) && $order_product->getProduct()->getCategory()->getId()==2){
                                
                               $order_product->setPrice($order_product->getProduct()->getPriceDiscount($object->getCurrency(),$object->getBuyer()->getDiscount()));
                               $order_product->setDiscount($object->getBuyer()->getDiscount());
                               $order_product->setDiscountPrice($order_product->getProduct()->getPriceDiscountAmount($object->getCurrency(),$object->getBuyer()->getDiscount()));
                               $object->setPartner($object->getBuyer());  
                               
                               if($object->getBuyer()->getParentPartner()){
                                    $order_product->setProvision($object->getBuyer()->getParentPartner()->getProvision());
                                    $order_product->setProvisionPrice($order_product->getProduct()->getPriceDiscountAmount($object->getCurrency(),$object->getBuyer()->getParentPartner()->getProvision()));
                                    $object->setParentPartner($object->getBuyer()->getParentPartner());  
                               }
                            } 
                            
                        }   
                    }
                    
                    $discount=0;
                    $discount_price=0;
                    $provision=0;
                    $provision_price=0;
                    
                    foreach($order_products as $order_product){
                        $price+=$order_product->getPrice()*$order_product->getAmount();
                        $products_count++;
                        $items_count+=$order_product->getAmount();
                        if($order_product->getDiscount()){
                            $discount=$order_product->getDiscount();
                            $discount_price+=$order_product->getDiscountPrice()*$order_product->getAmount();
                        }
                        if($order_product->getProvision()){
                            $provision=$order_product->getProvision();
                            $provision_price+=$order_product->getProvisionPrice()*$order_product->getAmount(); 
                        }                        
                    }

                    $object->setPrice($price);
                    $object->setProductsCount($products_count);
                    $object->setItemsCount($items_count);
                    
                    $object->setDiscount($discount);
                    $object->setDiscountPrice($discount_price);
                    $object->setProvision($provision);
                    $object->setProvisionPrice($provision_price);

                    $em->persist($object);
                    $em->flush();
                }
    }
    


    /**
     * @Route("/{_locale}/cart/{product_id}", name="cart", defaults={"product_id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function cartAction(Request $request, $product_id)
    {
        $em=$this->getDoctrine()->getManager();
        $repository=$this->getDoctrine()->getRepository('AppBundle:Order');
        $order = $repository->findOneBy(array('buyer'=>$this->getUser(),'confirmed'=>null,'done'=>null,'canceled'=>null,'deleted'=>null));


        $repository=$this->getDoctrine()->getRepository('AppBundle:Product');
        $product = $repository->findOneById($product_id);
        if($product){
            if( $product->getCategory()->getId()==2 && !in_array($this->getUser()->getType(),array('admin','worker','partner','trader') ) )
            throw $this->createNotFoundException('Produkt nie istnieje');     
        }
        //if(!$product) throw $this->createNotFoundException('Produkt nie istnieje'); 

        
        if(!$this->getUser()->getDeliveryAddress()){
            $this->container->get('session')->set('redirect_after_save',$this->selfUrl());
            
            $this->get('session')->getFlashBag()->add('warning', $this->get('translator')->trans('Twój koszyk jest aktualnie pusty. Aby z niego skorzystać musisz podać swoje dane adresowe.') );
            
            return $this->redirectToRoute('profile_address');
        }
        
        
        if(!$order) {
            $order=new Order();
            $order->setCreator($this->getUser());
            $order->setPaid(null);
            $order->setBuyer($this->getUser());
            $order->setPrice(0);
            $order->setCurrency($request->getSession()->get('currency'));
            $order->setProductsCount(0);
            $order->setItemsCount(0);
            $order->setConfirmed(null);  
            $this->getUser()->setCart($order);
            $em->persist($order);
            $em->persist($this->getUser());
            $em->flush();
            
            
            $status=$this->getDoctrine()->getRepository('AppBundle:OrderStatus')->findOneBy(array('first'=>'1'));
            if($status){
                $this->setOrderStatus($order,$status);
            } 
            
        }else{
            $order->setCurrency($request->getSession()->get('currency')); 
            $this->getUser()->setCart($order);
            $em->persist($this->getUser());
            $em->flush();
        }
        
        
        
        
        $page_id=$this->get('request')->query->get('page_id');
        $page=null;
        if($page_id){
            $r=$this->getDoctrine()->getRepository('AppBundle:Page');
            $page = $r->findOneById($page_id);
            if(!$page) throw $this->createNotFoundException('Strona nie istnieje'); 
            if($page->getType()!=$product->getPageType()) throw $this->createNotFoundException('Strona nie istnieje'); 
            //$this->get('session')->getFlashBag()->add('notice', 'Dodajesz zamówienie dla użytkownika.' );
        }
        
        $amount=$this->get('request')->query->get('amount');
        if(!$amount || !is_numeric($amount)) $amount=1;
        //place to get amount from query string
        
        
        $is_new=true;
        $deleted=false;
        if($order->getOrderProducts())
        foreach($order->getOrderProducts() as $op){
            if($op->getProduct()==$product){
                if(!$page || ( $page && $page==$op->getPage() ) ){ 
                    if(!$op->getProduct()->getSingle())
                    $op->setAmount($op->getAmount()+$amount); 
                    $is_new=false;
                }    
            }
            
            if($product && $product->getCategory()!=$op->getProduct()->getCategory()){
                $deleted=true;
                $em->remove($op);
                $em->flush();
            }
        }
        
        //$this->get('session')->getFlashBag()->add('warning', 'W koszyku miałeś produkty które nie były przeznaczone dla sprzedaży partnerom.' );
            
        
        if($is_new && $product){
            $op=new OrderProduct();
            $op->setProduct($product);
            $op->setAmount($amount); 
            if($product->getSingle()) $op->setAmount(1);
            $op->setCreator($this->getUser())
            ->setName($product->getName())
            ->setPrice($product->getPrice($request->getSession()->get('currency')))
            ->setCurrency($request->getSession()->get('currency'))
            ->setOrder($order);
            
            
            
            if($page) $op->setPage($page);   

            $em->persist($op);
            $em->flush();
        }
        
        $this->recountOrder($order);
        
        return $this->redirectToRoute('order_form', array('id'=>$order->getId())); 
    }
    

    /**
     * @Route("/{_locale}/order/form/{id}", name="order_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formAction(Request $request, $id){

        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Order');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Zamówienie nie istnieje'); 
            
            if(!in_array($this->getUser()->getType(),array('admin','worker','trader') )){
               if($object->getBuyer()!=$this->getUser()) 
               throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
            }
            
        }else{
            throw $this->createNotFoundException('Zamówienie nie istnieje'); 
            $object=new Order();
        }
        
        
        if(!$object->getConfirmed() && $object->getBuyer()==$this->getUser()){
            $object->setCurrency($request->getSession()->get('currency'));
        }
        $this->recountOrder($object);
        
        if($object->getInvoice() && (!$object->getBillingAddress()->getTaxId() || !$object->getBillingAddress()->getCompany())){
            $object->setInvoice(false);
        }

        
        
        
        $em = $this->getDoctrine()->getManager();
        
        if(in_array($this->getUser()->getType(),array('worker','trader','admin')) )
        if ($request->getMethod() == 'GET' && $object) {
            
            $product_id=$this->get('request')->query->get('product_id');
            
            if($product_id){
                $repository=$this->getDoctrine()->getRepository('AppBundle:OrderProduct');
                $product = $repository->findOneById($product_id); 
            }
            
            $contractor=$this->get('request')->query->get('contractor');
            $contractor_id=$this->get('request')->query->get('contractor_id');
            
            $code=trim($this->get('request')->query->get('code'));
            $code_id=$this->get('request')->query->get('code_id');
            $delete=$this->get('request')->query->get('delete');
            
            if($contractor_id && $product){
                $crepository=$this->getDoctrine()->getRepository('AppBundle:User');
                $contractor= $crepository->findOneBy(array('id'=>$contractor_id)); 
                if($contractor){
                    $product->setContractor($contractor);
                    $em->persist($product);
                    $em->flush();

                    $this->sendNotification(9, array(
                    '{{link}}'=>$this->getUrlProtocol($this->generateUrl('contract_form',array('id'=>$product->getId())),true),    
                    '{{service}}'=>$product->getName(),
                    '{{page}}'=>$product->getPage()->getName(),    
                    '{{serviceid}}'=>$product->getId(),    
                    '{{orderid}}'=>$product->getOrder()->getId(),     
                    ), $contractor );

                    $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Wykonawca został przypisany.') );
                }else{
                    $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Wykonawca nie został przypisany.') );
                }
                
                return $this->refresh(array(), array('?*'));
            }
            
            
            if($contractor && $product){
                $filters = $this->get('twig')->getFunctions();
                $callable = $filters['tabUser']->getCallable();
                
                $parameters=array();
                $strings=explode(' ',trim($contractor) );
                foreach($strings as $key=>$string){
                    if(trim($string)=='') unset($strings[$key]);
                    else $parameters[]=trim($string);
                }

                
                $query=$em->createQueryBuilder();
                $query
                ->from('AppBundle:User','u')
                ->leftJoin('u.billing_address','ba') 
                ->leftJoin('u.products','pc', \Doctrine\ORM\Query\Expr\Join::WITH, 'pc.product = :product AND pc.user=u')
                ->setParameter('product',$product->getProduct())        
                ->andWhere('pc.product IS NOT NULL')        
                        
                        
                ->andWhere('u.type=\'contractor\' AND u.billing_address IS NOT NULL')
                ->setMaxResults(20)                
                ->select('u');
  
                foreach($parameters as $param){
                    $query->andWhere('u.first_name LIKE \'%'.$param.'%\' OR u.last_name LIKE \'%'.$param.'%\' OR u.description LIKE \'%'.$param.'%\' OR u.cities LIKE \'%'.$param.'%\' OR ba.company LIKE \'%'.$param.'%\' ');// OR ba.city LIKE \'%'.$param.'%\'
                }

                $result = $query->getQuery()->getResult();

                foreach($result as $res){
                    
                   $desc=$this->get('translator')->trans('Brak');
                   $cities=$this->get('translator')->trans('Brak');
                   
                   if($res->getDescription()) $desc=$res->getDescription();
                   if($res->getCities()) $cities=$res->getCities();
                   
                   foreach($parameters as $parm){
                       $desc=str_replace(array($parm),array('<span style="color:red;">'.$parm.'</span>'),$desc);
                       $cities=str_replace(array($parm),array('<span style="color:red;">'.$parm.'</span>'),$cities);
                   } 
                   $tabUser= $callable( $res ); 
                   echo '<div class="element tip" data-position="top" data-class="description'.$res->getId().'"><div class="hidden hide description'.$res->getId().'">'.$this->get('translator')->trans('Opis').':<br>'.$desc.'<br><br>'.$this->get('translator')->trans('Miasta').':<br>'.$cities.'</div>'.$tabUser;
                   echo '<div class="data">'.$res->getFullName().'</div><div class="data">'.$res->getBillingAddress()->getCity().'</div><div class="data">'.$res->getBillingAddress()->getCompany().'</div>';
                   echo '<a href="?contractor_id='.$res->getId().'&product_id='.$product->getId().'" class="button small">'.$this->get('translator')->trans('Przypisz').'</a>';
                   echo '</div>';   
                }
                if(!$result) {
                    echo '<p style="color:red;">'.$this->get('translator')->trans('Nie odnaleziono wykonawcy.').'</p><p>'.$this->get('translator')->trans('Upewnij się czy miasto cmentarza strony upamiętnianej zostało dodane do jednego z wykonawców. Można też wpisywać inne hasła które zostaną wyszukane w polu opis wykonawcy lub też w danych firmowych wykonawcy.').'</p>';
                }

                die();
            }    
            
            
            if($code_id && $product && $delete){
                $crepository=$this->getDoctrine()->getRepository('AppBundle:Code');
                $code= $crepository->findOneBy(array('id'=>$code_id)); 
                if($code){
                    $code->setOrderProductMany(null);
                    $code->getGroup()->setOrdered($code->getGroup()->getOrdered()-1);
                    
                    $em->persist($code);
                    $em->persist($code->getGroup());
                    $em->persist($product);
                    
                    
                    $em->flush();
                    
                    $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Kod został odłączony od zamówienia.') );
                }else{
                    $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Kod nie został znaleziony.') );
                }
                
                return $this->refresh(array(), array('?*'),'#codes');
            }
            
            if($code_id && $product){
                $crepository=$this->getDoctrine()->getRepository('AppBundle:Code');
                $code= $crepository->findOneBy(array('id'=>$code_id)); 
                if($code){
                    $code->setOrderProductMany($product);
                    //$product->getPage()->setCode($code->getCode());
                    $code->getGroup()->setOrdered($code->getGroup()->getOrdered()+1);
                    //$product->setCode($code);
                    //$product->getPage()->expiredFromProduct($product);
                    
                    $em->persist($code);
                    $em->persist($code->getGroup());
                    $em->persist($product);
                    //$em->persist($product->getPage());
                    $em->flush();
                    
                    
                    
                    $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Kod został przypisany do zamówienia.') );
                }else{
                    $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Kod nie został przypisany do zamówienia.') );
                }
                
                return $this->refresh(array(), array('?*'),'#codes');
            }

            
            if($code && $product){
                
                $crepository=$this->getDoctrine()->getRepository('AppBundle:Code');
                $code= $crepository->findOneBy(array('code'=>$code));
                if($code){
                    
                echo '<p>Produkt na który przeznaczony jest kod: ';
                if($code->getGroup()->getProduct()) 
                    echo $code->getGroup()->getProduct()->getName();
                else
                    echo 'Kod uniwersalny. Może być przypisany do produktu który ma określoną ilość przedłużanych lat.';
                echo '<br>';
                
                echo 'Przedłużany okres tego kodu: ';
                if($code->getGroup()->getMonths()) 
                    echo ($code->getGroup()->getMonths()/12).' lat';
                else
                    echo 'Uniwersalny.';
                echo '</p>';
                
                }
                
               
                
                
                if(!$code){
                    die('<p style="color:red;">'.$this->get('translator')->trans('Nie odnaleziono takiego kodu').'</p>');
                }
                elseif($code->getGroup()->getMonths()==null && $product->getProduct()->getMonths()==null){
                    echo '<p style="color:red;">Uwaga zeskanowany kod nie został stworzony dla tego produktu upewnij się że dodawnay kod ma wpisaną ilość przedłużanych lat lub produkt ma wpisaną ilość przedłużanych lat. Bez jednej z tych informacji nie wiadomo na jaki okres czasu kupon ma przedłużać lub aktywować strony.</p>';
                }
                elseif($code->getGroup()->getMonths()!=null && $product->getProduct()->getMonths()!=null && $code->getGroup()->getMonths()!=$product->getProduct()->getMonths()){
                    echo '<p style="color:red;">Uwaga zeskanowany kod ma wpisaną inną ilość lat niż produkt do którego chcesz go przypisać.</p>';
                }
                elseif($code->getGroup()->getProduct()!=$product->getProduct()){
                    //die('<p style="color:red;">'.$this->get('translator')->trans('Znaleziony kod nie należy do zamówionej grupy produktów').'</p>');
                    echo '<a href="?code_id='.$code->getId().'&product_id='.$product->getId().'" class="button">'.$this->get('translator')->trans('Przypisz ten kod do zamówienia').'</a>';
                }elseif($code->getPage()){
                    die('<p style="color:red;">'.$this->get('translator')->trans('Znaleziony kod jest już przypisany do strony:').' '.$code->getPage()->getName().'</p>');
                }elseif($code->getOrderProduct()){
                    die('<p style="color:red;">'.$this->get('translator')->trans('Znaleziony kod jest już przypisany do zamówienia nr:').' '.$code->getOrderProduct()->getOrder()->getId().'</p>');
                }else{
                    echo '<a href="?code_id='.$code->getId().'&product_id='.$product->getId().'" class="button">'.$this->get('translator')->trans('Przypisz ten kod do zamówienia').'</a>';
                }
 
                die();     
            }
            
            
        }
        
        if ($request->getMethod() == 'GET' && $object) {

            $send=$this->get('request')->query->get('send');
            $print=$this->get('request')->query->get('print');
            
            
            if($print==1){

                $order_products=$object->getOrderProducts();
                
                require_once $this->get('kernel')->getRootDir() . '/../vendor/mpdf/mpdf.php';

                $mpdf=new \mPDF('', '', 0, '', 15, 15, 35, 15, 8, 8); 

                $mpdf->SetHTMLHeaderByName('header');
                $mpdf->SetHTMLFooterByName('footer');

                $mpdf->WriteHTML(htmlspecialchars_decode($this->get('twig')->render(
                    'AppBundle:Order:print.html.twig',
                    array('object'=>$object,'do'=>'print','order_products'=>$order_products)
                )));

                $pdf=$mpdf->Output('Zamówienie nr '.$object->getId().'.pdf','S');

                return new \Symfony\Component\HttpFoundation\Response($pdf ,200 , array('Content-type' => 'application/pdf'));
                
            }
            
            /*if($send==1){
                $order_products=$object->getOrderProducts();
                
                $message=$this->get('twig')->render(
                    'AppBundle:Order:print.html.twig',
                    array('object'=>$object,'do'=>'mail','order_products'=>$order_products)
                );
                
                $test=$this->sendMail('Zamówienie od  nr '.$object->getId(),'<p>Użytkownik '.$this->getUser()->getFirstName().' '.$this->getUser()->getLastName().' wysłał do Państwa zamówienie na następujące produkty.</p> '.$message,$object->getEmail()); 
            
                if($test) $this->get('session')->getFlashBag()->add('success', 'Zamówienie zostało wysłane na maila.' );  
                else $this->get('session')->getFlashBag()->add('error', 'Zamówienie nie zostało wysłane na maila.' ); 
                
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            }*/
            

            $done=$this->get('request')->query->get('done');
            $confirm=$this->get('request')->query->get('confirm');
            $cancel=$this->get('request')->query->get('cancel');


          
            $payu=$this->get('request')->query->get('payu');
            
            if(in_array($this->getUser()->getType(),array('worker','trader','admin')) )
            if($done && $object->getConfirmed()){
                $object->setDone(new \DateTime());
                $em->persist($object);
                
                $status=$this->getDoctrine()->getRepository('AppBundle:OrderStatus')->findOneBy(array('done'=>'1'));
                if($status){
                    $this->setOrderStatus($object,$status);
                } 
                
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            }
            
            if($confirm && !$object->getConfirmed()){
                $object->setConfirmed(new \DateTime());
                $em->persist($object);
                $em->flush();

                $status=$this->getDoctrine()->getRepository('AppBundle:OrderStatus')->findOneBy(array('confirmed'=>'1'));
                if($status){
                    $this->setOrderStatus($object,$status);
                } 
                
                if($this->getUser()==$object->getBuyer() && $payu) return $this->refresh( array('id'=>$object->getId(),'payu'=>$payu), array('?*') );
                else return $this->refresh( array('id'=>$object->getId()), array('?*') );
            }
            
            if(in_array($this->getUser()->getType(),array('worker','trader','admin')) )
            if($cancel){
                $object->setCanceled(new \DateTime());
                $em->persist($object);
                $em->flush();
                
                $status=$this->getDoctrine()->getRepository('AppBundle:OrderStatus')->findOneBy(array('canceled'=>'1'));
                if($status){
                    $this->setOrderStatus($object,$status);
                } 
                
                //$object->getCanceled()->format('Y-m-d H:i:s');
                //var_dump($object->getCanceled());
                //die('aa');
                
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            }
        }
        
        

        
        if(in_array($this->getUser()->getType(),array('worker','trader','admin')) )    
        if($this->get('request')->request->get('status_id') || $this->get('request')->request->get('paid')){

            
            
            $status_id=$this->get('request')->request->get('status_id');
            $status=$this->getDoctrine()->getRepository('AppBundle:OrderStatus')->findOneById($status_id);
            if($status){
                if($status != $object->getStatus()){
                     $this->setOrderStatus($object,$status);
                }
            } 
            
            $paid=$this->get('request')->request->get('paid');

            if($paid=='0' || $paid=='1'){

                if($paid=='1') {
                    if(is_null($object->getPaid())){
                        
                        $object->setPaid(new \DateTime());

                        $object->onlinePayment();

                        foreach($object->getOrderProducts() as $op){
                            if($op->getPage()) $em->persist($op->getPage());
                        }
                        
                        $em->persist($object); $em->flush();  
                        
                        $status=$this->getDoctrine()->getRepository('AppBundle:OrderStatus')->findOneBy(array('payment_manual'=>'1'));
                        if($status){
                            $this->setOrderStatus($object,$status);
                        } 
                        
                    }
                }else{
                    if(!is_null($object->getPaid())){ $object->setPaid(null); $em->persist($object); $em->flush();   }
                }   

                
                 
            }
            

            

            
            return $this->refresh( array('id'=>$object->getId()), array('?*') );
        }
        
     
        if(!$object->getPaid() && !$object->getConfirmed())
        if ($request->getMethod() == 'POST' || $request->getMethod() == 'GET') {

  
            if ($request->getMethod() == 'GET') {
                $new_amount=$this->get('request')->query->get('new_amount');
                $new_price=$this->get('request')->query->get('new_price');
                $order_product_id=$this->get('request')->query->get('order_product_id');
            }

            if ($request->getMethod() == 'POST') {
                $new_amount=$this->get('request')->request->get('new_amount');
                $new_price=$this->get('request')->request->get('new_price');
                $order_product_id=$this->get('request')->request->get('order_product_id');
            }

            $order_product_repository=$this->getDoctrine()->getRepository('AppBundle:OrderProduct');
            $op = $order_product_repository->findOneById($order_product_id);
     
            if($op && $op->getOrder()==$object) {          
                if(isset($new_amount)){  
                    
                    if($new_amount){
                       $op->setAmount($new_amount); 

                       $em->persist($op);
                       $em->flush(); 
                    }  
                    else
                    {
                        
                       $em->remove($op);
                       $em->flush();  
                    }
                }

                if(is_numeric($new_price)){
                    $op->setPrice($new_price);

                    $em->persist($op);
                    $em->flush(); 
                } 

                $this->recountOrder($object);
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            }    
            
        }
       
        $validation_groups=array('empty');
        
        if(in_array($this->getUser()->getType(),array('worker','admin')) ) array_push($validation_groups,'admin');
        if(!$object->getConfirmed())  array_push($validation_groups,'notconfirmed');
        //var_dump($validation_groups); 
        $form=$this->createForm(new OrderType(), $object, array('validation_groups'=>$validation_groups,'cascade_validation' => true) );
        
        
        
        if($this->get('request')->query->has('invoice')){
            $invoice=$this->get('request')->query->get('invoice');
            $object->setInvoice($invoice);
            $error=null;
            if($object->getInvoice() && (!$object->getBillingAddress()->getTaxId() || !$object->getBillingAddress()->getCompany())){
                $error = $this->get('translator')->trans('Nie podałeś pełnych danych do faktury, uzupełnij dane jeżeli chcesz otrzymać fakturę');  
                $object->setInvoice(false);
            }
            
            return $this->render('AppBundle:Order:formInvoice.html.twig', array(
                'object' => $object,
                'error' => $error,
            ));
        }
        
        
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if($object->getInvoice() && (!$object->getBillingAddress()->getTaxId() || !$object->getBillingAddress()->getCompany())){
                $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Nie podałeś pełnych danych do faktury, uzupełnij dane jeżeli chcesz otrzymać fakturę'));  
                $form->get('invoice')->addError($error);
                $object->setInvoice(false);
            }
            
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }


        $query=$em->createQueryBuilder();
        $query->from('AppBundle:OrderStatus','u')
        ->select('u'); //, us
        $statuses=$query->getQuery()->getResult();
        

        
        $payu=$this->get('request')->query->get('payu');
        
        if($payu){
            //require_once $this->get('kernel')->getRootDir() . '/../vendor/payu/lib/openpayu.php';
            //require_once $this->get('kernel')->getRootDir() . '/../vendor/payu/config.php';
            $parameters=$this->container->getParameter('payu');
            
            $order=$object;

            if(!isset($parameters[$order->getCurrency()])) throw $this->createNotFoundException('Płatności nie są dostępne');
            
            require_once $this->get('kernel')->getRootDir() . '/../vendor/payu/lib/openpayu.php';
            \OpenPayU_Configuration::setEnvironment($parameters[$order->getCurrency()]['enviroment'],$parameters[$order->getCurrency()]['domain']);
            \OpenPayU_Configuration::setMerchantPosId($parameters[$order->getCurrency()]['pos_id']); // POS ID (Checkout)
            \OpenPayU_Configuration::setSignatureKey($parameters[$order->getCurrency()]['signature_key']); //Second MD5 key. You will find it in admin panel.
            //require_once $this->get('kernel')->getRootDir() . '/../vendor/payu/config.php';
            
            $order = array();



            //die('aa');
            
            $payment=new Payment();
            $payment->setCreator($this->getUser());
            $payment->setOrder($object);
        
            $em->persist($payment);
            $em->flush();
            
            //tutaj trzeba sprawdzic opcje z dozwolonymi adresami zwrotnymi
            $order['notifyUrl'] = $this->getUrlProtocol($this->generateUrl('order_payu',array('id'=>$payment->getId()),true));
            $order['continueUrl'] = $this->getUrlProtocol($this->generateUrl('order_form',array('id'=>$object->getId()),true));
            
            
            
            $order['customerIp'] =  $_SERVER['REMOTE_ADDR'];
            $order['merchantPosId'] = \OpenPayU_Configuration::getMerchantPosId();
            $order['description'] = 'Epado';
            $order['currencyCode'] = $object->getCurrency();
            //$order['currencyCode'] = 'EUR';
            $order['totalAmount'] = $object->getPrice()*100;
            $order['extOrderId'] = $payment->getId().'#EPADO';

            $order['products'][0]['name'] = 'Zamówienie '.$object->getId();
            $order['products'][0]['unitPrice'] = $object->getPrice()*100;
            $order['products'][0]['quantity'] = 1;

            $order['buyer']['email'] = $this->getUser()->getEmail();
            $order['buyer']['phone'] = '';
            $order['buyer']['firstName'] = $this->getUser()->getFirstName();
            $order['buyer']['lastName'] = $this->getUser()->getLastName();

            
            $rsp = \OpenPayU_Order::create($order);
            
            
            //var_dump($rsp); die('Dane testowe'.$payment->getId());
            
            if( !isset($rsp->getResponse()->redirectUri) ){
                $em->remove($payment);
                $em->flush();
                
                //var_dump($rsp); die('Dane testowe');
                
                return $this->refresh( array('id'=>$object->getId()), array('?*') );//,'payu'=>1
            }
                    
            return $this->redirect($rsp->getResponse()->redirectUri);       

        }
        
        
        if($object->getInvoice())
			$this->sendInvoice($object);
        
        
        return array('object'=>$object, 'statuses'=>$statuses, 'form'=>$form->createView()); 
    }
    
	
	
	public function sendInvoice($order){	  
	    if(!$order->getPaid() || !$order->getConfirmed() || !$order->getInvoice() || $order->getInvoiceId() || !$order->getOrderProducts()) return null;
				
			$json_products_array = array();
				
			$i=0;
		
            if($order->getOrderProducts())
            foreach($order->getOrderProducts() as $op){
				
				$json_products_array[] = '
							"'.$i.'": {
							  "invoicecontent": {
								"name": "'.$op->getName().'",
								"unit": "szt.",
								"count": "'.$op->getAmount().'",
								"price": '.$op->getPrice().',
								"vat": 23
							  }
							}				
				';		

				$i++;
				
               // $invoicecontents[]=array( 'invoicecontent'=> array( 'name'=>$op->getName(),  'price' => $op->getPrice(), 'type'=>'good', 'count'=>$op->getAmount(), 'unit'=>'szt.' )  );
            }
						
		$json_products = implode(",", $json_products_array);
		
		
		$id_contactor = $this->findContractor($order->getBillingAddress()->getTaxId());
		if($id_contactor == 0)
			$id_contactor = $this->addContractor($order);
			
	  
		$data = '
					{
					  "invoices": {
						"invoice": {
						  "contractor": {
							"id": "'.$id_contactor.'"
						  },
						  "paymentmethod": "transfer",
						  "paid":"1",
						  "auto_send":"1",
						  "date": "'.date("Y-m-d").'",
						  "paymentdate": "'.date("Y-m-d").'",
						  "type": "normal",
						  "currency": "PLN",
						  "description": "",
						  "price_type":"brutto",
						  "series": {
							"id": null
						  },
						  "invoicecontents": {
							'.$json_products.'
						  }
						}
					  }
					}		
		';
		
		
		echo $data;

		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_URL, 'https://api2.wfirma.pl/invoices/add?inputFormat=json&outputFormat=json');
		curl_setopt($this->ch, CURLOPT_POST, 1);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($this->ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($this->ch, CURLOPT_HEADER, 0);
		curl_setopt($this->ch, CURLINFO_HEADER_OUT, 1);
		curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, [
        "accessKey: 38ad8d6bdae91bbf9c2cc14e1bc81c56",
        "secretKey: 03c7c0bbaffb30ae3da58c34cf1fb57e",
        "appKey: 50b3e054b9ae555cb886a45c0b590244"
    ]);
		$r = curl_exec($this->ch);
		
		
		curl_close($this->ch);
	  
		echo $r;
	}
	
	
	
	public function findContractor($nip){			
		$data = '	
				{
					"api": {
						"contractors": {
							"parameters": {
								"conditions": {
									"condition": {
										"field": "nip",
										"operator": "eq",
										"value": "'.$nip.'"
									}
								}
							}
						}
					}
				}		
		';
		
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_URL, 'https://api2.wfirma.pl/contractors/find?inputFormat=json&outputFormat=json');
		curl_setopt($this->ch, CURLOPT_POST, 1);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($this->ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($this->ch, CURLOPT_HEADER, 0);
		curl_setopt($this->ch, CURLINFO_HEADER_OUT, 1);
		curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, [
        "accessKey: 38ad8d6bdae91bbf9c2cc14e1bc81c56",
        "secretKey: 03c7c0bbaffb30ae3da58c34cf1fb57e",
        "appKey: 50b3e054b9ae555cb886a45c0b590244"
    ]);
		$r = curl_exec($this->ch);
		curl_close($this->ch);	

		$json = json_decode($r, true);
			
			//if((int)$json['contractors']['parameters']['total']>0)	
			//	$id = (int)$json['contractors'][0]['contractor']['id'];
			//else
				$id = 0;
	
		return $id;		
	}
	
	
	public function addContractor($order){
		
		$data = '	
		{"contractors": {
			"contractor": {
							"name": "'.$order->getBillingAddress()->getCompany().'",
							"zip": "'.$order->getBillingAddress()->getPostalCode().'",
							"city": "'.$order->getBillingAddress()->getCity().'",
							"tax_id_type":"nip",
							"nip":"'.$order->getBillingAddress()->getTaxId().'",
							"street":"'.$order->getBillingAddress()->getAddress().'",
							"email":"'.$order->getBuyer()->getEmail().'"
			}
		}}		
		';
		
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_URL, 'https://api2.wfirma.pl/contractors/add?inputFormat=json&outputFormat=json');
		curl_setopt($this->ch, CURLOPT_POST, 1);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($this->ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($this->ch, CURLOPT_HEADER, 0);
		curl_setopt($this->ch, CURLINFO_HEADER_OUT, 1);
		curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, [
        "accessKey: 38ad8d6bdae91bbf9c2cc14e1bc81c56",
        "secretKey: 03c7c0bbaffb30ae3da58c34cf1fb57e",
        "appKey: 50b3e054b9ae555cb886a45c0b590244"
    ]);
		$r = curl_exec($this->ch);
		curl_close($this->ch);	

		$json = json_decode($r, true);
		
		//$id = (int)$json['contractors'][0]['contractor']['id'];
		$id=0;
		return $id;			
			
	}
	
	
	
/*	
    public function sendInvoice($order){
		
		
		
		

        if(!$order->getPaid() || !$order->getConfirmed() || !$order->getInvoice() || $order->getInvoiceId() || !$order->getOrderProducts()) return null; 


        
        $parameters=$this->container->getParameter('wfirma');
        $document_type=$parameters['company_document_type'];
        $auto_send=$parameters['auto_send'];
        
        $conditions=array();
        $conditions[]=array( 'condition'=> array( 'field'=>'nip', 'operator'=>'eq', 'value'=>$order->getBillingAddress()->getTaxId() )  );      //eq ne like with %
        $conditions[]=array( 'condition'=> array( 'field'=>'country', 'operator'=>'eq', 'value'=>$order->getBillingAddress()->getCountry()->getCode() )  );      //eq ne like with %

        $data=array(
        'contractors'=>
          array(
            'parameters'=>
              array(
               'conditions'=>$conditions
              )
          )
        );
		
		$contractor_id=null;
		
 
	   $contractor=$this->wfirmaApi('contractors','find',$data);
        var_dump($contractor);   
        
        if($contractor->status->code=='OK'){
            if(isset($contractor->contractors->{0}))
            $contractor_id=$contractor->contractors->{0}->contractor->id;
        }

		
        $data=array(
        'contractors'=>
          array(
            'contractor'=>
              array(
               'name'=>$order->getBillingAddress()->getCompany(),
               'altname'=>$order->getBillingAddress()->getCompany(),
               'nip'=>$order->getBillingAddress()->getTaxId(),
               'country'=>$order->getBillingAddress()->getCountry()->getCode(),
               'tax_id_type'=>'nip',
               'city'=>$order->getBillingAddress()->getCity(),
               'zip'=>$order->getBillingAddress()->getPostalCode(),
               'email'=>$order->getBuyer()->getEmail(),
               'street'=>$order->getBillingAddress()->getAddress(),
              )
          )
        );
        

        if($contractor_id){
            $contractor=$this->wfirmaApi('contractors','edit',$data,$contractor_id);
            
        }else{
            $contractor=$this->wfirmaApi('contractors','add',$data);
            
            $contractor_id=null;
            if($contractor->status->code=='OK'){
                $contractor_id=$contractor->contractors->{0}->contractor->id;
            }
        }
        

        if($contractor_id){
            $invoicecontents=array();  //good is for integration with stock
            
            if($order->getOrderProducts())
            foreach($order->getOrderProducts() as $op){
                $invoicecontents[]=array( 'invoicecontent'=> array( 'name'=>$op->getName(),  'price' => $op->getPrice(), 'type'=>'good', 'count'=>$op->getAmount(), 'unit'=>'szt.' )  );
            }         
            
            $data=array(
            'invoices'=>
              array(
                'invoice'=>
                  array(
                   'contractor'=>array('id'=>$contractor_id),
                   'type'=>$document_type,
                   'description'=>'Zamówienie z epado.com nr '.$order->getId(),
                   'price_type'=> 'brutto',
                   'paymentmethod'=>'transfer',
                   'alreadypaid_initial'=>$order->getPrice(),
                   'auto_send'=>$auto_send,
                   'date'=>date('Y-m-d'),
                   'disposaldate'=>date('Y-m-d'),
                   'paymentdate'=>date('Y-m-d'),
                   'invoicecontents'=>array('invoicecontent'=>$invoicecontents)
                  )
              )
            );

            $invoice=$this->wfirmaApi('invoices','add',$data);

            if($invoice->status->code=='OK'){
                $invoice_id=$invoice->invoices->{0}->invoice->id;
                $invoice_number=$invoice->invoices->{0}->invoice->fullnumber;
            }
        }
        
        if(!$contractor_id){
            $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Nie udało się wystawić automatycznej faktury prosimy o kontakt z działem obsługi klienta.') );
        }
        
        if(!$invoice_id){
            $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Nie udało się wystawić automatycznej faktury prosimy o kontakt z działem obsługi klienta.') );
        } 
        
        if($invoice_id && $contractor_id){
            $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Faktura została automatycznie wystawiona. Możesz ją pobrać w panelu jej numer to:').' '.$invoice_number.'.' );
            
            $order->setInvoiceId($invoice_id);
            $order->setInvoiceNumber($invoice_number);
            $order->setContractorId($contractor_id);
            $order->setInvoiceType($document_type);
            $em=$this->getDoctrine()->getManager();
            
            $em->persist($order);
            $em->flush();
        }
        
        $this->wfirmaApi();
		
		
		
		
    }
*/


    /**
     * @Route("/{_locale}/order/payu/{id}", name="order_payu", defaults={"id" = null})
     * @Template(engine="twig")
     */
    public function payuAction(Request $request, $id){
       
        
        $body = file_get_contents('php://input');
        //file_put_contents($this->get('kernel')->getRootDir() . '/../test.txt',date('Y-m-d H:i:s').' - '.$id.' '.$body.PHP_EOL,FILE_APPEND);
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Payment');
            $payment = $repository->findOneById($id);
            if(!$payment) throw $this->createNotFoundException('Zamówienie nie istnieje'); 
        }else{
            throw $this->createNotFoundException('Zamówienie nie istnieje'); 
        }
  

        $em = $this->getDoctrine()->getManager();
        
        //require_once $this->get('kernel')->getRootDir() . '/../vendor/payu/lib/openpayu.php';
        //require_once $this->get('kernel')->getRootDir() . '/../vendor/payu/config.php';
        $parameters=$this->container->getParameter('payu');
        
        $order=$payment->getOrder();
        
        if(!isset($parameters[$order->getCurrency()])) throw $this->createNotFoundException('Płatności nie są dostępne');
        if($order->getPrice()<=0) throw $this->createNotFoundException('Płatności nie są dostępne');   
        
        require_once $this->get('kernel')->getRootDir() . '/../vendor/payu/lib/openpayu.php';
        \OpenPayU_Configuration::setEnvironment($parameters[$order->getCurrency()]['enviroment'],$parameters[$order->getCurrency()]['domain']);
        \OpenPayU_Configuration::setMerchantPosId($parameters[$order->getCurrency()]['pos_id']); // POS ID (Checkout)
        \OpenPayU_Configuration::setSignatureKey($parameters[$order->getCurrency()]['signature_key']); //Second MD5 key. You will find it in admin panel.
        //require_once $this->get('kernel')->getRootDir() . '/../vendor/payu/config.php';
            
        if ($request->getMethod() == 'POST'){
            
            $body = file_get_contents('php://input');
            $data = trim($body);
            //file_put_contents($this->get('kernel')->getRootDir() . '/../test.txt',date('Y-m-d H:i:s').' - '.$id.' POSZLO '.PHP_EOL,FILE_APPEND);

            try {
                if (!empty($data)) {
                    $result = \OpenPayU_Order::consumeNotification($data);
                }

                if ($result->getResponse()->order->orderId) {

                    /* Check if OrderId exists in Merchant Service, update Order data by OrderRetrieveRequest */
                    $order = \OpenPayU_Order::retrieve($result->getResponse()->order->orderId);
                    if($order->getStatus() == 'SUCCESS'){
                        //the response should be status 200

                        $payment_id=$result->getResponse()->order->extOrderId;
                        $status=$result->getResponse()->order->status;
                        $payu_id=$result->getResponse()->order->orderId;

                        if($payment_id!=$payment->getId()) $payment->setDescription($this->get('translator')->trans('Nie zgadza się nr płatności')); 

                        $payment->setStatus($status);
                        $payment->setPayuId($payu_id);
                        if(!$payment->getStarted()) $payment->setStarted(new \DateTime());

                        $send_invoice=false;

                        if($status=='COMPLETED'){
                            
                            
                            if(!$payment->getFinished()) $payment->setFinished(new \DateTime());
                            
                            
                            if($payment->getOrder()->getPaid()===null) {
                                $payment->getOrder()->onlinePayment();
                                
                                foreach($payment->getOrder()->getOrderProducts() as $op){
                                    if($op->getPage()) $em->persist($op->getPage());
                                } 
                                
                                $send_invoice=true;
                            }    
                            
                            $payment->getOrder()->setPaid(new \DateTime());

                            $status=$this->getDoctrine()->getRepository('AppBundle:OrderStatus')->findOneBy(array('payment_success'=>'1'));
                            if($status){
                                $this->setOrderStatus($payment->getOrder(),$status);
                            }
                                          
                        }

                        if($status=='CANCELED' || $status=='REJECTED'){
                            if(!$payment->getFinished()) $payment->setFinished(new \DateTime());
                            
                            //$payment->getOrder()->setPaid(null);
                            $status=$this->getDoctrine()->getRepository('AppBundle:OrderStatus')->findOneBy(array('payment_fail'=>'1'));
                            if($status){
                                $this->setOrderStatus($payment->getOrder(),$status);
                            } 
                        }  
                        
                        $em->persist($payment);
                        $em->persist($payment->getOrder());
                        $em->flush();

                        if($send_invoice===true) {
                            if($payment->getOrder()->getInvoice())
                              $this->sendInvoice($payment->getOrder());  
                        }    
                    }  
                }    
            } catch (\OpenPayU_Exception $e) {
                echo $e->getMessage();
            }

            die('ok');
        }
        
        die('error');
    }
    
    
    /**
     * @Route("/{_locale}/order/address/form/{id}", name="order_address_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function addressFormAction(Request $request, $id){
        
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Order');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Zamówienie nie istnieje'); 
        }else{
            throw $this->createNotFoundException('Zamówienie nie istnieje'); 
        }
        
        

        $validation_group='default';
        $form=$this->createForm(new \AppBundle\Type\OrderAddressType(), $object, array('validation_groups'=>array($validation_group),'cascade_validation' => true) );
           
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {

            if($object->getBillingAddress()->getTaxId() || $object->getBillingAddress()->getCompany()){
                if(!$object->getBillingAddress()->getTaxId()){
                    $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Jeżeli podałeś nazwę firmy to te pole jest wymagane'));  
                    $form->get('billing_address')->get('tax_id')->addError($error);   
                }
                if(!$object->getBillingAddress()->getCompany()){
                    $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Jeżeli podałeś numer identyfikacj podatkowej to te pole jest wymagane'));  
                    $form->get('billing_address')->get('company')->addError($error);   
                }
            }
            
            if($object->getBillingAddress()->getTaxId() && $object->getBillingAddress()->getCountry()->getId()=='657'){ //poland vat id
                     
                    $valid=false;
                    
                    $str = preg_replace("/[^0-9]+/","",$object->getBillingAddress()->getTaxId());
                    if (strlen($str) != 10)
                    {
                            $valid=false;
                    }
                    else
                    {
                        $arrSteps = array(6, 5, 7, 2, 3, 4, 5, 6, 7);
                        $intSum=0;
                        for ($i = 0; $i < 9; $i++)
                        {
                                $intSum += $arrSteps[$i] * $str[$i];
                        }
                        $int = $intSum % 11;

                        $intControlNr=($int == 10)?0:$int;
                        if ($intControlNr == $str[9])
                        {
                                $valid=true;
                        }
                    }
                    
                    if($valid==false){
                            $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Podany numer jest nieprawidłowy'));  
                            $form->get('billing_address')->get('tax_id')->addError($error);    
                    }
                    
            }
            
            if($form->isValid()) {
                
                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Zmiany zostały zapisane.') );

                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
                
                $redirect_after_save=$this->container->get('session')->get('redirect_after_save');
                if($redirect_after_save){
                    $this->container->get('session')->set('redirect_after_save',null);
                    return $this->redirect($redirect_after_save);
                }
                
                if($id) return $this->redirectToRoute('order_form',array('id'=>$object->getId()));
                else return $this->refresh( array(), array('?*') );
            }else $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('W formularzu wystąpiły błędy.') ); 
        }
      
        return array('form' => $form->createView());
        
    }
    
    

    /**
     * @Route("/{_locale}/order/invoice/download/epado_dokument_{id}.pdf", name="order_invoice_download", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function invoiceDownloadAction(Request $request, $id){
        
        
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Order');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Zamówienie nie istnieje'); 
        }else{
            throw $this->createNotFoundException('Zamówienie nie istnieje'); 
        }
        
        if(!in_array($this->getUser()->getType(),array('admin','worker') ) && $object->getBuyer()!=$this->getUser() ) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        if(!$object->getInvoiceId()) throw $this->createNotFoundException('Faktura nie istnieje'); 

        $parameters=array();
        $parameters[]=array( 'parameter'=> array( 'name'=>'page',  'value'=>'invoice' )  );     
        $parameters[]=array( 'parameter'=> array( 'name'=>'address', 'value'=>'0' ) );    
        $parameters[]=array( 'parameter'=> array( 'name'=>'leaflet', 'value'=>'0' ) );    
        $parameters[]=array( 'parameter'=> array( 'name'=>'duplicate', 'value'=>'0' ) );    
        
        $data=array(
        'invoices'=>
          array(
            'parameters'=>$parameters
          )
        );

        $pdf=$this->wfirmaApi('invoices','download',$data,$object->getInvoiceId());

        return new \Symfony\Component\HttpFoundation\Response($pdf ,200 , array('Content-type' => 'application/pdf','Content-disposition'=>'attachment','Content-Disposition'=>$object->getInvoiceNumber().'.pdf'  ));   
    }
    
    
    /**
     * @Route("/{_locale}/order/invoice/add/{id}", name="order_invoice_add", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function invoiceAddAction(Request $request, $id){
        
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Order');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Zamówienie nie istnieje'); 
        }else{
            throw $this->createNotFoundException('Zamówienie nie istnieje'); 
        }

        $this->sendInvoice($object);

        return $this->redirectToRoute('order_form',array('id'=>$object->getId()));  
    }
    
    
    
    

    /**
     * @Route("/{_locale}/order/info", name="order_info")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function infoAction(Request $request, $ad=null){
         
        $repository=$this->getDoctrine()->getRepository('AppBundle:Message');

        $em = $this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Order','o')         
        ->select('COUNT(o)')
        ->andWhere('');
        
        if(!in_array($this->getUser()->getType(),array('admin','worker') ) || $ad!=1 ){
           $query->where('o.done IS NULL AND o.canceled IS NULL AND o.confirmed IS NOT NULL');
           $query->andWhere('o.buyer=:buyer');
           $query->setParameter('buyer',$this->getUser());
        }
        else{
          $query->where('o.confirmed IS NOT NULL AND o.done IS NULL AND o.canceled IS NULL AND o.paid IS NOT NULL');  
        }
        
        $count = $query->getQuery()->getSingleScalarResult();

        return array('count'=>$count);
    }
    

    

    /**
     * @Route("/{_locale}/status/list", name="order_status_list")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexStatusAction()
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        
        $repository=$this->getDoctrine()->getRepository('AppBundle:OrderStatus');
        $objects = $repository->findAll();
        
        return array('objects'=>$objects);

        
    }
    

    /**
     * @Route("/{_locale}/status/form/{id}", name="order_status_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formStatusAction(Request $request, $id){
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:OrderStatus');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Status nie istnieje'); 
        }else{
            $object=new \AppBundle\Entity\OrderStatus();
            $object->setCreator($this->getUser());
        }
        
        $form=$this->createForm(new \AppBundle\Type\OrderStatusType(), $object, array(
            'validation_groups'=>'registration',
            'default_locale'=>$this->container->getParameter('default_locale'),
            'locales'=>$this->container->getParameter('admin_locales'),
            'translator'=>$this->get('translator'),         
            'cascade_validation' => true) );
                    
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }
        
        return array('object'=>$object, 'form'=>$form->createView());
    }
    
    
    


    /**
     * @Route("/{_locale}/mail/list", name="mail_list")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexMailAction()
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        
        $repository=$this->getDoctrine()->getRepository('AppBundle:Mail');
        $objects = $repository->findAll();
        
        return array('objects'=>$objects);

        
    }
    

    /**
     * @Route("/{_locale}/mail/form/{id}", name="mail_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formMailAction(Request $request, $id){
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Mail');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Mail nie istnieje'); 
        }else{
            $object=new \AppBundle\Entity\Mail();
            $object->setCreator($this->getUser());
        }
        
        $form=$this->createForm(new \AppBundle\Type\MailType(), $object, array(
            'validation_groups'=>'registration',
            'default_locale'=>$this->container->getParameter('default_locale'),
            'locales'=>$this->container->getParameter('admin_locales'),
            'translator'=>$this->get('translator'),         
            'cascade_validation' => true) );
                    
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }
        
        return array('object'=>$object, 'form'=>$form->createView());
    }
    
    
    public function statisticsQuery($filters,$query)
    { 
        
        if(isset($filters['user_id'])){
            $query=$query->andWhere('o.buyer=:buyer')->setParameter('buyer',$filters['user_id']);
        }
        if(isset($filters['parent_partner_id'])){
            $query=$query->andWhere('o.parent_partner=:parentpartner')->setParameter('parentpartner',$filters['parent_partner_id']);
        }
        
        if(!isset($filters['user_id']) && !isset($filters['parent_partner_id'])){
            if(isset($filters['type']) && $filters['type']=='partner'){
                $query=$query->andWhere('o.partner IS NOT NULL');
            }
            if(isset($filters['type']) && $filters['type']=='user'){
                $query=$query->andWhere('o.partner IS NULL');
            }
        }
        
        if(isset($filters['sort']) && $filters['sort']){
            $query=$query->orderBy('o.'.$filters['sort'],'ASC');
            if(isset($filters['sortd']) && $filters['sortd']==1){
                $query=$query->orderBy('o.'.$filters['sort'],'DESC');
            }
        }
        
        $query=$query->andWhere('o.paid IS NOT NULL');
        $query=$query->andWhere('o.status!=:status')->setParameter('status',9); 
        
        $query=$query->andWhere('o.paid>:from')->setParameter('from',new \DateTime($filters['from'].' 00:00:00'));
        $query=$query->andWhere('o.paid<:to')->setParameter('to',new \DateTime($filters['to'].' 23:59:59'));
        
        return $query;
    }

    /**
     * @Route("/{_locale}/statistics", name="statistics")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function statisticsAction(Request $request)
    {
        if(!in_array($this->getUser()->getType(),array('admin','partner') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        if(in_array($this->getUser()->getType(),array('partner') ) && !$this->getUser()->getParentPartnerCode()) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        

        $filters=array();
        
        $filters=$this->get('request')->query->get('filters'); 
        
        if(in_array($this->getUser()->getType(),array('partner'))) $filters['parent_partner_id']=$this->getUser()->getId();
        
        
        $current_quarter = ceil(date('n') / 3);
        $from = date('Y-m-d', strtotime(date('Y') . '-' . (($current_quarter * 3) - 2) . '-1'));
        $to = date('Y-m-t', strtotime(date('Y') . '-' . (($current_quarter * 3)) . '-1'));
        
        if(!isset($filters['from']) || !$filters['from']) $filters['from']=$from;
        if(!isset($filters['to']) || !$filters['to']) $filters['to']=$to;
        if(!isset($filters['type']) ) $filters['type']='';
        
        if(!isset($filters['sort']) ) $filters['sort']='price';
        if(!isset($filters['sortd']) ) $filters['sortd']='1';
        
        
        if(new \DateTime($filters['from'])>new \DateTime($filters['to'])) $filters['from']=$filters['to'];
        
        
        if(!isset($filters['currency'])) $filters['currency']=$request->getSession()->get('currency');
        
        $stats['price']=array();
        $stats['discount_price']=array();
        $stats['provision_price']=array();
        
        $currencies=$this->container->getParameter('default_currencies');
        
        foreach($currencies as $currency){
            $stats['price'][$currency]=0;
            $stats['discount_price'][$currency]=0;
            $stats['provision_price'][$currency]=0; 
        }
        
        $stats['orders_price']=0;
        $stats['orders_discount_price']=0;
        $stats['orders_provision_price']=0;
        
        $stats['users_price']=0;
        $stats['users_discount_price']=0;
        $stats['users_provision_price']=0;
        
        $stats['parent_price']=0;
        $stats['parent_discount_price']=0;
        $stats['parent_provision_price']=0;
        
        $stats['products_price']=0;
        $stats['products_amount']=0;
        $stats['products_discount_price']=0;
        $stats['products_provision_price']=0;
        

        $parent_partner=null;
        $user=null;
        
        if(isset($filters['user_id'])){
            $repository=$this->getDoctrine()->getRepository('AppBundle:User');
            $user = $repository->findOneById($filters['user_id']);
            if(!$user) throw $this->createNotFoundException('Strona nie istnieje');
            
            if(in_array($this->getUser()->getType(),array('partner') ) && (!$user->getParentPartner() || $user->getParentPartner()!=$this->getUser())) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        }
        if(isset($filters['parent_partner_id'])){
            $repository=$this->getDoctrine()->getRepository('AppBundle:User');
            $parent_partner = $repository->findOneById($filters['parent_partner_id']);
            if(!$parent_partner) throw $this->createNotFoundException('Strona nie istnieje');;
        }        
        
        
        
        $query=$this->getDoctrine()->getManager()->createQueryBuilder()
            ->from('AppBundle:Order','o')
            ->groupBy('o.currency')    
            ->addSelect('SUM(o.price) AS price')
            ->addSelect('SUM(o.discount_price) AS discount_price')
            ->addSelect('SUM(o.provision_price) AS provision_price')
            ->addSelect('o.currency');
        $query=$this->statisticsQuery($filters,$query);     
        $stats['sum']=$query->getQuery()->getResult();

        foreach($stats['sum'] as $order){
            $stats['price'][$order['currency']]+=$order['price'];
            $stats['discount_price'][$order['currency']]+=$order['discount_price'];
            $stats['provision_price'][$order['currency']]+=$order['provision_price'];
        }
        
        
        if(!isset($filters['user_id']) && !(isset($filters['type']) && $filters['type']=='user')){

            $sub=$this->getDoctrine()->getManager()->createQueryBuilder()
                ->from('AppBundle:Order','o')
                ->leftJoin('o.buyer','u')
                ->groupBy('o.buyer')
                ->andWhere('o.parent_partner IS NOT NULL')
                ->addSelect('u.id');
            $sub=$this->statisticsQuery($filters,$sub);  
            $sub=$sub->orderBy('o.price','DESC');
            
            $sub=$sub->getQuery()->getResult();
            $ids=array();
            foreach($sub as $s){
                //var_dump($s);
                //die();
                array_push($ids, $s['id']);
            }
            //var_dump($ids);
            //die();
            
            $query=$this->getDoctrine()->getManager()->createQueryBuilder()
                ->from('AppBundle:User','u')
                ->andWhere('u.parent_partner_code IS NULL')
                ->andWhere('u.type = :type')->setParameter('type','partner') 
                ->andWhere('u.enabled = :enabled')->setParameter('enabled',true) 
                ->andWhere('u.locked = :locked')->setParameter('locked',false)     
                ->andWhere('u.created<:dateto')->setParameter('dateto',new \DateTime($filters['to']))
                ->groupBy('u')    
                ->addSelect('u AS object');
            if($parent_partner) $query=$query->andWhere('u.parent_partner =:pp')->setParameter('pp',$parent_partner);
            if(!empty($ids)) $query=$query->andWhere('u.id NOT IN (:ids)')->setParameter('ids',$ids);
            //$query=$this->statisticsQuery($filters,$query);     
            $stats['bad_partners']=$query->getQuery()->getResult();
        }

        
        if(!isset($filters['user_id']) && isset($filters['parent_partner_id'])){
            $query=$this->getDoctrine()->getManager()->createQueryBuilder()
                ->from('AppBundle:Order','o')
                ->leftJoin('o.buyer','b')      
                ->andWhere('o.currency =:currency')->setParameter('currency',$filters['currency'])
                ->groupBy('b')    
                ->addSelect('SUM(o.price) AS price')
                ->addSelect('SUM(o.discount_price) AS discount_price')
                ->addSelect('SUM(o.provision_price) AS provision_price')
                ->addSelect('o.provision AS provision')
                ->addSelect('o.discount AS discount')
                ->addSelect('b.first_name AS first_name, b.last_name AS last_name, o AS object');
            $query=$this->statisticsQuery($filters,$query);     
            $stats['users']=$query->getQuery()->getResult();


            foreach($stats['users'] as $order){
                //var_dump($order);
                $stats['users_price']+=$order['price'];
                $stats['users_discount_price']+=$order['discount_price'];
                $stats['users_provision_price']+=$order['provision_price'];
            }
        }
        
        
        if(!isset($filters['user_id']) && !isset($filters['parent_partner_id']) && ($filters['type']=='' || $this->getUser()->getType()!='partner')){
            $query=$this->getDoctrine()->getManager()->createQueryBuilder()
                ->from('AppBundle:Order','o')
                ->leftJoin('o.parent_partner','b')      
                ->andWhere('o.currency =:currency')->setParameter('currency',$filters['currency'])
                ->andWhere('o.parent_partner IS NOT NULL')    
                ->groupBy('b')    
                ->addSelect('SUM(o.price) AS price')
                ->addSelect('SUM(o.discount_price) AS discount_price')
                ->addSelect('SUM(o.provision_price) AS provision_price')
                ->addSelect('o.provision AS provision')
                ->addSelect('o.discount AS discount')
                ->addSelect('b.first_name AS first_name, b.last_name AS last_name, o AS object');
            $query=$this->statisticsQuery($filters,$query);     
            $stats['parent']=$query->getQuery()->getResult();


            foreach($stats['parent'] as $order){
                //var_dump($order);
                $stats['parent_price']+=$order['price'];
                $stats['parent_discount_price']+=$order['discount_price'];
                $stats['parent_provision_price']+=$order['provision_price'];
            }
        }
        
        if(isset($filters['user_id'])){
            $query=$this->getDoctrine()->getManager()->createQueryBuilder()
                ->from('AppBundle:Order','o')
                ->andWhere('o.currency =:currency')->setParameter('currency',$filters['currency'])   
                ->addSelect('SUM(o.price) AS price')
                ->addSelect('SUM(o.discount_price) AS discount_price')
                ->addSelect('SUM(o.provision_price) AS provision_price')
                ->addSelect('o.provision AS provision')
                ->addSelect('o.discount AS discount')
                ->groupBy('o')     
                ->addSelect('o AS object')
                ->addSelect('o.id');
            $query=$this->statisticsQuery($filters,$query);     
            $stats['orders']=$query->getQuery()->getResult();


            foreach($stats['orders'] as $order){
                //var_dump($order);
                $stats['orders_price']+=$order['price'];
                $stats['orders_discount_price']+=$order['discount_price'];
                $stats['orders_provision_price']+=$order['provision_price'];
            }
        }
 

        
        $query=$this->getDoctrine()->getManager()->createQueryBuilder()
            ->from('AppBundle:OrderProduct','op')
            ->leftJoin('op.order','o')  
            ->leftJoin('op.product','p')      
            ->andWhere('o.currency =:currency')->setParameter('currency',$filters['currency'])
            ->groupBy('p')   
            ->addSelect('SUM(op.price*op.amount) AS price')
            ->addSelect('SUM(op.discount_price*op.amount) AS discount_price')
            ->addSelect('SUM(op.provision_price*op.amount) AS provision_price') 
            ->addSelect('SUM(op.amount) AS amount')     
            ->addSelect('o.provision AS provision')
            ->addSelect('o.discount AS discount')
            ->addSelect('op.name AS product')
            ->addSelect('p.id AS product_id, op AS object');
        $query=$this->statisticsQuery($filters,$query);     
        if(isset($filters['sort']) && $filters['sort']){ 
            $query=$query->orderBy(''.$filters['sort'],'ASC');
            if(isset($filters['sortd']) && $filters['sortd']==1){
                $query=$query->orderBy(''.$filters['sort'],'DESC');
            }
        }
        $stats['products']=$query->getQuery()->getResult();
        
        foreach($stats['products'] as $product){
            //var_dump($product);
            $stats['products_price']+=$product['price'];
            $stats['products_amount']+=$product['amount'];
            $stats['products_discount_price']+=$product['discount_price'];
            $stats['products_provision_price']+=$product['provision_price'];
        }
        

        

        //die();
        
        //$stats=null;
        //var_dump($filters);
        
        //die();
        return array('stats'=>$stats, 'filters'=>$filters, 'stat_user'=>$user, 'parent_partner'=>$parent_partner);

        
    }
}
