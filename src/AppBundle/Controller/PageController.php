<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Type\PageType;
use AppBundle\Entity\Page;
use AppBundle\Entity\Address;
use AppBundle\Entity\User;
use Symfony\Component\Form\FormError;

use Doctrine\ORM\QueryBuilder;

class PageController extends BaseController
{
    
  
    
    /**
     * @Route("/{_locale}/pages/{page}", name="page_list", defaults={"page" = 1})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexAction(Request $request, $page)
    {
        $ad=$this->get('request')->query->get('ad');
        
        
        //$test=$this->sendMail('Temat','w załączniku znajduje się Faktura VAT wystawiona przez firmę.', 'l.boguszewski@gmail.com' ); 
        //var_dump($test);
        //die();
        
        
        $em = $this->getDoctrine()->getManager();

        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Page','p')  
        ->leftJoin('p.translations','pt') 
        //->where("pt.locale = '".$request->getLocale()."'") 
        ->andWhere('p.deleted IS NULL ')        
        ->select('p'); 

        if(!in_array($this->getUser()->getType(),array('admin','worker') ) || $ad!=1){
           //$query->andWhere('p.creator=:creator');
           //$query->setParameter('creator',$this->getUser());
           
           $query->leftJoin('AppBundle:PageCredentials','c', \Doctrine\ORM\Query\Expr\Join::WITH, 'c.user = :user AND c.page=p');
           $query->andWhere('p.creator=:user OR (c.user=:user) ');
           $query->setParameter('user',$this->getUser());
           
        }

        $filters_params=array();
        if($ad==1) $filters_params['ad']=1;

        $filters=array(
            array( 'name'=>'first_name', 'table'=>'pt','type'=>'text', 'label'=>$this->get('translator')->trans('Imię osoby'), 'value'=>null),
            array( 'name'=>'last_name', 'table'=>'pt','type'=>'text', 'label'=>$this->get('translator')->trans('Nazwisko osoby'), 'value'=>null), 
            //array( 'name'=>'name', 'table'=>'ma','type'=>'text', 'label'=>'Nazwa producenta', 'value'=>null),
            //array( 'name'=>'name', 'table'=>'ca','type'=>'text', 'label'=>'Nazwa kategorii', 'value'=>null), 
            //array( 'name'=>'name', 'table'=>'ty','type'=>'text', 'label'=>'Typ produktu', 'value'=>null), 
        );
        
        if($this->get('request')->query->get('reset')==1) return $this->refresh($filters_params,array('?*','page'));
        
        foreach($filters as $id=>$data){
            if($this->get('request')->query->get($data['table'].'_'.$data['name'])){
                $filters[$id]['value']=$this->get('request')->query->get($data['table'].'_'.$data['name']);
                
                if($data['type']=='text') $query->andWhere($filters[$id]['table'].'.'.$data['name'].' LIKE \'%'.$filters[$id]['value'].'%\'');
            }   
        }
        
        
        $creator_id=$this->get('request')->query->get('creator_id');
        $code_group_id=$this->get('request')->query->get('code_group_id');
        
        if($creator_id){
            $creator=$this->getDoctrine()->getRepository('AppBundle:User')->findOneById($creator_id);
            if($creator){
                $filters_params['creator_id']=$creator_id;
                $query->andWhere('p.creator=:creator')->setParameter('creator', $creator);
                $this->get('session')->getFlashBag()->add('notice', $this->get('translator')->trans('Przeszukujesz strony użytkownika:').' '.$creator->getFullName().'.' );
            }
        }
        
        if($code_group_id){
            $code_group=$this->getDoctrine()->getRepository('AppBundle:CodeGroup')->findOneById($code_group_id);
            if($code_group){
                $filters_params['code_group_id']=$code_group_id;
                $query->leftJoin('p.code_object','co');
                $query->andWhere('co.group=:codegroup')->setParameter('codegroup', $code_group);
                $this->get('session')->getFlashBag()->add('notice', $this->get('translator')->trans('Przeszukujesz strony wykorzystane w grupie kodów:').' '.$code_group->getName().'.' );
            }
        }
        
        
        
        $pager=$this->getPager($page,15,$query);  
        
        return array('ad'=>$ad,'objects'=>$pager['results'], 'pager'=>$pager, 'filters'=>$filters, 'filters_params'=>$filters_params); 
    }
    
    
    
    

    /* @var $query QueryBuilder */
    /**
     * @Route("/{_locale}/page/code/{id}", name="page_code", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function codeAction(Request $request, $id){
        
        $object=null;

        $em = $this->getDoctrine()->getManager();
        
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Page');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Strona nie istnieje'); 
            
            if(!$object->getCode()) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
            
            if(!$this->getUser()->havePagePermission($object)) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
            //if(!in_array($this->getUser()->getType(),array('admin','worker') )){
            //   if($object->getCreator()!=$this->getUser()) 
            //   throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
            //}
        }else{
          throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        }

        require_once $this->get('kernel')->getRootDir() . '/../vendor/mpdf/mpdf.php';

        $mpdf=new \mPDF();  
        
        $mpdf->WriteHTML('
        <style>
        @page wrapper { sheet-size: 55mm 65mm; margin:8mm 5mm 0mm 5mm; } 
        div.wrapper { page-break-before:right; page:wrapper; position:relative; }  

            .id { 
                 font-family:arial; 
                 font-size:10px; 
                 letter-spacing:1.21mm; 
                 padding-left:1.78mm;  
                 solid #FF0000; 
                 text-align:left; 
                 margin-top:1mm;
            }

            .barcode{ 
                margin-top:3px;
                padding-left:0mm; 
                padding-right:0mm;
            }

            .logo {
                font-family:courier;
                font-size:50.4px;
                padding-left:1.2mm;
            }

            .id{ margin-top:4mm; }
            .id,.logo,.barcode{ margin-left:3.9mm; }
            .id,.logo{ margin-left:5.9mm; }


            .idimg{ 
                 font-family:arial; 
                 font-size:10px; 
                 letter-spacing:0.68mm; 
                 padding-left:1.78mm;  
                 solid #FF0000; 
                 text-align:left; 
                 margin-top:1mm;
            }

            .barcodeimg{ 
                margin-top:3px;
                padding-left:0mm; 
                padding-right:0mm;
            }

            .logoimg {
                font-family:courier;
                font-size:50.4px;
                padding-left:1.2mm;
                margin-top:1mm;
            }

            .idimg{ margin-top:4mm; }
            .idimg,.logoimg,.barcodeimg{ margin-left:2.6mm; }
            .idimg,.logoimg{ margin-left:4.6mm; }
            .logoimg{ margin-left:5.29mm; }

            .kod{
                 width:45mm;
                 height:55mm;
                 border:0;
                 display:block;
                 position:absolute; 
            }
        </style>    
        <div class="wrapper">    
        <div class="kod" style="left:0mm; top:0mm;">
            <div class="idimg">'.$object->getCode().'</div>
            <div class="barcodeimg">    
                <barcode code="https://epado.com/'.$object->getCode().'?scan=1" type="QR" class="barcode" size="1.28" error="L" />
            </div>
            <div class="logoimg "><img src="/images/logo.svg" style="width:32.0mm; margin-top:2px;" /></div>
        </div>
        </div>
        ');  
        
        $mpdf->Output('Kod.pdf','I');
        
        die();
    }
    
    

    /* @var $query QueryBuilder */
    /* @var $file \Symfony\Component\HttpFoundation\File\UploadedFile */
    /**
     * @Route("/{_locale}/page/audiobook/form/{id}", name="page_audiobook", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function audiobookAction(Request $request,$id){

        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Page');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Strona nie istnieje'); 
            
            if(!$this->getUser()->havePagePermission($object,'page_audiobooks')) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
            
//            if(!in_array($this->getUser()->getType(),array('admin','worker') )){
//                if($object->getCreator()!=$this->getUser())  
//                    throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
//            }
            
            $type=null;
        }else{
            throw $this->createNotFoundException('Strona nie istnieje'); 
        }
        
        $em=$this->getDoctrine()->getManager();
        $errors=array();
        
        $delete_id=$this->get('request')->query->get('delete_id');
        if(isset($delete_id) && is_numeric($delete_id)){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Audiobook');
            $audiobook = $repository->findOneById($delete_id);
            if(!$audiobook) throw $this->createNotFoundException('Audiobook nie istnieje');
            
            $file = $audiobook->getAbsolutePath();
            unlink($file);

            $em->remove($audiobook);
            $em->flush(); 
            
            $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Plik został usunięty')); 

            return $this->redirectToRoute('page_form',array('id'=>$object->getId()) );  
        }
        
        $edits=$this->get('request')->request->get('edits');
        
        if($edits){
            foreach($edits as $id => $edit){
                if(isset($edit['name']) && isset($edit['sort']) && $edit['name'] && $edit['sort'] ){
                    $repository=$this->getDoctrine()->getRepository('AppBundle:Audiobook');
                    $audiobook = $repository->findOneById($id);
                    if(!$audiobook) throw $this->createNotFoundException('Audiobook nie istnieje');

                    $audiobook->setName($edit['name']);
                    $audiobook->setSort($edit['sort']);
                    $em->persist($audiobook);
                    $em->flush();


                }
            }
            $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Zmiany zostały zapisane')); 

            return $this->redirectToRoute('page_form',array('id'=>$object->getId()) );
        }

        
        $files=$this->get('request')->files->get('audiobook');
        $names=$this->get('request')->request->get('audiobook');
        
        $types=array('audio/mpeg','audio/x-wav','audio/mp3');
        $extensions=array('mp3','wav');
        
        $files=$files['file'];
        $names=$names['name'];

        $sort=count($object->getAudiobooks());
        
        if(is_array($files))
        foreach($files as $id=>$file){

            if($file->getSize()>$file->getMaxFilesize()) $errors[]=$this->get('translator')->trans('Przesyłany plik jet za duży:').' '.$file->getClientOriginalName();
            if(!in_array($file->getMimeType(),$types) || !in_array($file->getClientOriginalExtension(),$extensions)) $errors[]=$this->get('translator')->trans('Przesyłany plik ma niewspierany format:').' '.$file->getClientOriginalName();
            if(!$names[$id]) $errors[]=$this->get('translator')->trans('Nie podano nazwy dla pliku:').' '.$file->getClientOriginalName();
            
            
            if(empty($errors)){
                $audiobook = new \AppBundle\Entity\Audiobook();
                $audiobook->setName($names[$id]);
                $audiobook->setPage($object);
                $audiobook->setPath('_NULL_');
                $sort++;
                $audiobook->setSort($sort);
                
                $filename = sha1(uniqid(mt_rand(), true)).'.'.$file->getClientOriginalExtension();
                $size=$file->move($audiobook->getUploadRootDir(),$filename);
                
                if($size)
                {
                    $audiobook->setPath($filename);
                    $em->persist($audiobook);
                    $em->flush();
                }
                else
                {
                    $em->remove($audiobook);
                    $em->flush();

                    $errors[]=$this->get('translator')->trans('Wystąpił błąd podczas dodawania pliku:').' '.$file->getClientOriginalName();
                }
            }
        }
        
        
        foreach($errors as $error){
            $this->get('session')->getFlashBag()->add('error', $error);
        }
        if(empty($errors)){
            $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Dodawanie przebiegło prawidłowo')); 
        }
        
        return $this->redirectToRoute('page_form',array('id'=>$object->getId()) );
    }
    
    
    /* @var $query QueryBuilder */
    /**
     * @Route("/{_locale}/page/form/{id}", name="page_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formAction(Request $request, $id){
        
        $object=null;

        $em = $this->getDoctrine()->getManager();
        
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Page');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Strona nie istnieje'); 
            
           // var_dump($object->getImages()); die('aa');
            
            if(!$this->getUser()->havePagePermission($object)) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
//            if(!in_array($this->getUser()->getType(),array('admin','worker') )){
//               if($object->getCreator()!=$this->getUser()) 
//               throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
//            }
            
            $type=null;
        }else{
            $object=new Page();
            $object->setBuyer($this->getUser());
            $object->setCreator($this->getUser());
            $object->setPublic(true);
            $object->setEnabled(true);
            $object->setEnd(new \DateTime());
            $object->setBegin(new \DateTime());
            $object->setRemaindDays(5);
            $object->setLocale($request->getLocale());
            
            $type=trim($this->get('request')->query->get('type'));
            if(!$type) $type=1;
            
            $r=$this->getDoctrine()->getRepository('AppBundle:PageType');
            $page_type = $r->findOneById($type);
            $object->setType($page_type);
            
            if($type==1) $object->setRemaindDays(5);
            
            if($type!=1){
                $object->setRemaind(0);
                $object->setRemaindDays(5);
            }
            
            //$address=new Address();
            //$address->setCity('Warszawa');
            //$object->setAddress($address);
        }

        

        if ($request->getMethod() == 'GET' && $object->getId()) {

            $password=trim($this->get('request')->query->get('password'));

            if($password && !$object->getCode()){
                $crepository=$this->getDoctrine()->getRepository('AppBundle:Code');
                $code= $crepository->findOneBy(array('password'=>$password)); 
                if($code){
                    
                    if(!$code->getPage()){
                        $code->setPage($object);
                        $object->setCodeObject($code);
                        $object->setCode($code->getCode());
                        $code->getGroup()->setUsed($code->getGroup()->getUsed()+1);
                        
                        $go=false;
                        //w ramach kodów uniwersalnych musiałem dodać || is_null($code->getGroup()->getProduct())
                        if($code->getGroup()->getProduct() || is_null($code->getGroup()->getProduct()) /*&& $code->getOrderProduct()*/ ){ //pelna autoryzacja narazie nie moze byc wymagana poniewaz nie ma hurtowni
                            if($code->getGroup()->getProduct()) $info=$object->expiredFromProduct($code->getGroup()->getProduct());
                            else $info=$object->expiredFromProduct($code->getGroup()); 
                            if(!is_null($info)) $go=true;
                        }
                        elseif($code->getOrderProduct() && $code->getOrderProduct()->getOrder()->getBuyer()==$this->getUser()){
                            if($code->getGroup()->getProduct()) $info=$object->expiredFromProduct($code->getGroup()->getProduct());
                            else $info=$object->expiredFromProduct($code->getGroup()); 
                            if(!is_null($info)) $go=true;
                        }
                        
                        if($go){
                            $em->persist($code);
                            $em->persist($code->getGroup());
                            $em->persist($object);
                            $em->flush();

                            $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Kod został przypisany i strona została aktywowana.') );
                        }else{
                            $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Podany kod nie został autoryzowany.') );
                        }
                    }else{
                        
                        $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Podany kod został już użyty wcześniej.') );
                    }  
                }else{
                    $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Kod nie został znaleziony.') );
                }

                return $this->refresh(array(), array('?*'));
            }


        }
        
        
        
        
        
        $page_family_search=$this->get('request')->query->get('page_family_search');
        $page_cemetery_search=$this->get('request')->query->get('page_cemetery_search');
        
        if($page_family_search){
//            $query = $em->createQuery(
//                'SELECT p FROM AppBundle:Family p
//                WHERE p.name LIKE :search
//                ORDER BY p.name ASC')
//            ->setMaxResults(20)       
//            ->setParameter('search',  '%'.$page_family_search.'%');

            $query=$em->createQueryBuilder();
            $query
            ->from('AppBundle:Family','p') 
            ->where('p.deleted IS NULL ')  
            ->andWhere('p.name LIKE :search')
            ->setParameter('search',  '%'.$page_family_search.'%')        
            ->select('p');

            
            
            if(!in_array($this->getUser()->getType(),array('admin','worker') )){
                $query->leftJoin('AppBundle:PageCredentials','c', \Doctrine\ORM\Query\Expr\Join::WITH, 'c.user = :user AND c.family=p');
                $query->andWhere('p.creator=:user OR c.user=:user ');
                $query->setParameter('user',$this->getUser());
                //$query->andWhere('p.creator=:creator'
                //$query->setParameter('creator',$this->getUser());
            }
            
            $result = $query->getQuery()->getResult();

            foreach($result as $family){
                echo($this->render(
                    'AppBundle::Family/element.html.twig',
                    array('object' => $family) )->getContent());   
            }
            if(!$result) {
                echo '<li class="element notfound">'.$this->get('translator')->trans('Nie odnaleziono').'</li>';
            }
            
            die();
        }
       
        
        if($page_cemetery_search){
            
            $parameters=array();
            $strings=explode(' ',trim($page_cemetery_search) );
            foreach($strings as $key=>$string){
                if(trim($string)=='') unset($strings[$key]);
                else $parameters[]=trim($string);
            }
            
            
            $query=$em->createQueryBuilder();
            $query
            ->from('AppBundle:Cemetery','c')
            ->leftJoin('c.address','a')  
            ->setMaxResults(30)                
            ->select('c,a');
            $query->andWhere('c.checked=true OR c.creator=:user')->setParameter('user',  $this->getUser());  
            $query->andWhere('c.deleted IS NULL ');
            
            $temp=''; $i=0;

            if(count($parameters)==1){
                $query->andWhere('a.city LIKE \'%'.$parameters[0].'%\' ');   
            }elseif(count($parameters)==2){
                $query->andWhere(' 
                    (a.city LIKE \'%'.$parameters[0].'%\' OR a.city LIKE \'%'.$parameters[1].'%\' ) AND ( (c.name LIKE \'%'.$parameters[0].'%\' OR c.name LIKE \'%'.$parameters[1].'%\') OR (a.address LIKE \'%'.$parameters[0].'%\' OR a.address LIKE \'%'.$parameters[1].'%\') )
                    ');   
            }else{
                $temp=''; $i=0;
                foreach($parameters as $param){ $i++; if($i!=1) $temp.=' OR ';
                    $temp.= ' (a.city LIKE \'%'.$param.'%\') ';
                }
                $query->andWhere($temp);
            }
            
            
            
            /*
            $query = $em->createQuery(
                'SELECT p FROM AppBundle:Cemetery p
                 LEFT JOIN p.address a   
                WHERE ( p.name LIKE :search OR a.city LIKE :search  OR a.address LIKE :search ) AND (p.checked=true OR p.creator=:user)
                ')//ORDER BY p.name ASC
            ->setMaxResults(20)       
            ->setParameter('search',  '%'.$page_cemetery_search.'%')
            ->setParameter('user',  $this->getUser());
            */
            $result = $query->getQuery()->getResult();

            foreach($result as $cemetery){
                echo($this->render(
                    'AppBundle::Cemetery/element.html.twig',
                    array('object' => $cemetery) )->getContent());   
            }
            if(!$result) {
                echo '<li class="element notfound">'.$this->get('translator')->trans('Nie odnaleziono').'</li>';
            }
            
            die();
        }
        

  

        
        if ($request->getMethod() == 'POST') {

            
            if(!empty($_FILES) && isset($_FILES['file'])) {
                
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
                    $img->setPage($object);

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
                
                    if(!$this->getUser()->havePagePermission($object,'page_images')) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
               
                    $url=$this->getVideoImage($this->get('request')->request->get('video'));
                    //die($url);
                    
                    if(!$url){
                        $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Wystąpił błąd upewnij się że podany link jest prawidłowy.'));
                        return $this->refresh(); 
                    }
                    
                    $img = new \AppBundle\Entity\Image();
                    $img->setPage($object);
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
        
        $locale=$request->getLocale();//$locale='pl';
        if($object->getLocale()) $locale=$object->getLocale();

        $form=$this->createForm(new PageType(), $object, array(
            'default_locale'=>$locale,
            'locales'=>array($locale),
            'data'=>$object,
            'user_type'=>$this->getUser()->getType(),
            'page_edit'=>$this->getUser()->havePagePermission($object,'page_edit'),
            'page_background'=>$this->getUser()->havePagePermission($object,'page_background'),
            'translator'=>$this->get('translator'),
            'validation_groups'=>array('registration','default'),
            'cascade_validation' => true) );
        
                    
        $form->handleRequest($this->getRequest());
        
        if($object->getCemetery() && !$form->isSubmitted()){ 
            $ca=$object->getCemetery()->getAddress();
            
            $form->get('address')->get('address')->setData($ca->getAddress());
            $form->get('address')->get('country')->setData($ca->getCountry());
            $form->get('address')->get('postal_code')->setData($ca->getPostalCode());
            $form->get('address')->get('city')->setData($ca->getCity());
        }
        
        
        if ($form->isSubmitted()) {
            if(!$this->getUser()->havePagePermission($object,'page_edit') && !$this->getUser()->havePagePermission($object,'page_background')) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');       
        
            if($object->getType()->getId()==1)
            if(!$object->getCemetery()){
                $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans("Cmentarz jest wymagany"));  
                $form->get('cemetery_search')->addError($error);   
            }
            
            if($object->getType()->getId()==1)
            if(!$object->getFamily()){
                $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans("Rodzina jest wymagany"));  
                $form->get('family_search')->addError($error);   
            }

            if($object->getType()->getId()==1)
            if($object->getBegin()>$object->getEnd()){
                $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Data urodzenia nie może być wcześniejsza niż data śmierci'));  
                $form->get('begin')->addError($error);   
            }
            
            
            $data = $form->getData();
            $background=$request->request->get('background');
            $object->setBackground($background);
            //var_dump($data);
            //die('');
            //var_dump($form->getErrors());
            
            if($object->getType()->getId()==1) {
                $object->setName($object->translate($request->getLocale())->getFirstName().' '.$object->translate($request->getLocale())->getLastName());
            } 
              
            echo '<br><br><br><br><br><br><br><br><br><br>';
            foreach($form->getErrors() as $key=>$error){
                echo $key.': <br>';
                echo $error->getMessage();
                echo $error->getCause();
                echo $object->getName().$object->translate($request->getLocale())->getFirstName().$object->getType()->getId();
            }    
            //die();
            
            
            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                if($object->getType()->getId()==1) {
                    $object->setAddress($object->getCemetery()->getAddress());
                    $em->persist($object->getCemetery()->getAddress());
                    //$object->setName($object->getFirstName().' '.$object->getLastName());
                }    
                
                $em->persist($object);
                $em->flush();
  
                return $this->refresh( array('id'=>$object->getId()), array('?*') );
            } 
        }
       
        $products=null;
        
        if($object->getId()){
            $query = $em->createQueryBuilder('')->from('AppBundle:Product','p')->leftJoin('p.translations','pt')
            ->where("pt.locale = '".$request->getLocale()."'")
            ->andWhere('p.enabled = 1')
            ->andWhere('p.in_page = 1')
            ->andWhere('p.deleted IS NULL ')
            ->andWhere('p.page_type = :type')           
            ->orderBy('pt.name', 'ASC')
            ->select('p');
            
            if($object->getSpecial()) $query->andWhere('p.special = 1');
            
            $repository=$this->getDoctrine()->getRepository('AppBundle:ProductCategory');
            $productcategory = $repository->findOneById(1); 
            $query->andWhere('p.category = :category'); 
            $query->setParameter('category',  $productcategory);
            
            $query->setParameter('type',  $object->getType());
            
            if($object->getCode()) $query->andWhere(' p.with_code = 1 ');
            else $query->andWhere(' p.without_code = 1 ');

            $products = $query->getQuery()->getResult();
            
            foreach($products as $i=>$p){
               
                if($p->getCities()){
                    $cities=explode(',',$p->getCities());
                    if(!in_array($object->getAddress()->getCity(),$cities)) unset($products[$i]);
                }
                //if($p->getCategory()->getId()==2) unset($products[$i]);
            }
            
        }
        
        

        return array('object'=>$object, 'type'=>$type, 'products'=>$products, 'form'=>$form->createView());
    }
    
    
    
    
    
    
    /**
     * @Route("/{_locale}/page/form/{id}/image/del", name="page_form_del_img", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function delPageImageAction(Request $request, $id){
           
        $product=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Page');
            $product = $repository->findOneById($id);
            if(!$product) throw $this->createNotFoundException('Strona nie istnieje');
            if(!$this->getUser()->havePagePermission($product,'page_images')) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');       
        
        }else throw $this->createNotFoundException('Strona nie istnieje');
        
        
        $em = $this->getDoctrine()->getManager();
        foreach($product->getImages() as $image) {
            if($image->getId() == $_POST['delImgId']) {
                
                if($product->getImage() && $image->getId()==$product->getImage()->getId()){
                    
                    if(!$this->getUser()->havePagePermission($product,'page_image')) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');       
        
                    $product->setImage(null);
                    $em->persist($product);
                    $em->flush();
                }
                
                $file = $image->getAbsolutePath();
                if(file_exists($file)) unlink($file);
                
                $em->remove($image);
                $em->flush();
            }
        }

        return new \Symfony\Component\HttpFoundation\JsonResponse(array('status' => true));
    }
    
    

    /**
     * @Route("/{_locale}/page/form/{id}/image/def", name="page_page_def_img", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function defPageImageAction(Request $request, $id){
        
        $product=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Page');
            $product = $repository->findOneById($id);
            if(!$product) throw $this->createNotFoundException('Strona nie istnieje');
            if(!$this->getUser()->havePagePermission($product,'page_image') || !$this->getUser()->havePagePermission($product,'page_images')) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');       
        
        }else throw $this->createNotFoundException('Strona nie istnieje');
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
     * @Route("/{_locale}/page/types", name="page_type_list")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexTypeAction()
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        $repository=$this->getDoctrine()->getRepository('AppBundle:PageType');
        $objects = $repository->findAll();
        
        return array('objects'=>$objects);

        
    }

    /**
     * @Route("/{_locale}/page/type/form/{id}", name="page_type_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formTypeAction(Request $request, $id){
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:PageType');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Produkt nie istnieje'); 
        }else{
            $object=new \AppBundle\Entity\PageType();
            $object->setCreator($this->getUser());
        }
        
        
        $form=$this->createForm(new \AppBundle\Type\PageTypeType(), $object, array(
            'default_locale'=>$this->container->getParameter('default_locale'),
            'locales'=>$this->container->getParameter('admin_locales'),
            'validation_groups'=>array('registration','default'),
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
     * @Route("/{_locale}/page/categories", name="page_category_list")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function indexCategoryAction()
    {
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        $repository=$this->getDoctrine()->getRepository('AppBundle:PageCategory');
        $objects = $repository->findAll();
        
        return array('objects'=>$objects);

        
    }

    /**
     * @Route("/{_locale}/page/category/form/{id}", name="page_category_form", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function formCategoryAction(Request $request, $id){
        if(!in_array($this->getUser()->getType(),array('admin','worker') )) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
        
        $object=null;
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:PageCategory');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Produkt nie istnieje'); 
        }else{
            $object=new \AppBundle\Entity\PageCategory();
            $object->setCreator($this->getUser());
            
            //die($object->getCreator()->getUsername());
        }
        
        $form=$this->createForm(new \AppBundle\Type\PageCategoryType(), $object, array(
            'default_locale'=>$this->container->getParameter('default_locale'),
            'locales'=>$this->container->getParameter('admin_locales'),
            'validation_groups'=>'registration','cascade_validation' => true) );
                    
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
     
   
    
}
