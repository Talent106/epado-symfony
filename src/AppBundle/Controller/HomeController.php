<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\HttpFoundation\Response;
//use Facebook\FacebookApp;
use Facebook;
use AppBundle\Entity\Post;

class HomeController extends BaseController
{
    
    

    /**
     * @Route("/cron_reminder", name="cron")
     * @Template("AppBundle:Public:empty.html.twig")
     */
    public function cronAction(Request $request)
    {
//        $em=$this->getDoctrine()->getEntityManager();
//        
//        $emConfig = $em->getConfiguration();
//        $emConfig->addCustomDatetimeFunction('YEAR', '\AppBundle\Dql\Datetime\Year');
//        $emConfig->addCustomDatetimeFunction('MONTH', '\AppBundle\Dql\Datetime\Month');
//        $emConfig->addCustomDatetimeFunction('DAY', '\AppBundle\Dql\Datetime\Day');
//        $emConfig->addCustomDatetimeFunction('DATE', '\AppBundle\Dql\Datetime\Date');
//        $query=$em->createQueryBuilder();
//        $query
//        ->from('AppBundle:Page','p')  
//        ->leftJoin('p.translations','pt') 
//        ->where('DATE(p.expired)>DATE(:now) AND p.deleted IS NULL ')
//        ->setParameter("now", new \DateTime('now'))  
//        ->andWhere('MONTH(p.end)>DATE(:now) AND p.deleted IS NULL ')        
//        ->select('p'); 
//        
//        $pages=$query->getQuery()->getResult();
//        
//        foreach($pages as $page){
//            $date=new \DateTime();
//            
//            //if($page->getLastRemind()!=null && $page->getLastRemind()<$date)
//            
//            echo $page->getName().' - '.$page->getEnd()->format('Y-m-d').' - '.date('Y-m-d').' <br>';
//        }
        
        
        $em = $this->getDoctrine()->getManager();
        $query = "SELECT id
                FROM page 
                WHERE DATE(expired)>DATE(NOW()) AND deleted IS NULL 
                AND ( MONTH(DATE_ADD(end, INTERVAL -remind_days DAY))=MONTH(NOW()) AND DAY(DATE_ADD(end, INTERVAL -remind_days DAY))=DAY(NOW()) )
                AND remind=1
                AND page_type_id='1'
                AND (last_remind IS NULL OR DATE(last_remind)<>DATE(NOW()) ) LIMIT 30";
        
        $stmt = $em->getConnection()->query($query);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach($results as $result){
            
            $page=$this->getDoctrine()->getRepository('AppBundle:Page')->findOneById($result['id']);
            if($page){
                $this->sendNotification(8, array(
                '{{page}}'=>$page->getName(),
                '{{date}}'=>$page->getEnd()->format('d.m.Y'),
                '{{link}}'=>$this->getUrlProtocol($this->generateUrl('page',array('code'=>$page->getCode()),true)),    
                ), $page->getCreator());
                
                
                //echo $page->getName().'<br>';
                //echo $page->getLastRemind()->format('Y-m-d').'<br>';
                //echo $page->getCreator()->getFullName().'<br>';
                
                $page->setLastRemind(new \DateTime());
                $em->persist($page);

                foreach($page->getCredentials() as $c){
                    if($c->getPageRemind() || $c->getType()=='admin'){
                        //echo $c->getUser()->getFullName().'<br>';
                        $this->sendNotification(8, array(
                        '{{page}}'=>$page->getName(),
                        '{{date}}'=>$page->getEnd()->format('d.m.Y'),
                        '{{link}}'=>$this->getUrlProtocol($this->generateUrl('page',array('code'=>$page->getCode()),true)),      
                        ), $c->getUser());
                    }
                }


                
            }
            
        }
        $em->flush();
        

        //die('');
        return array();
    }   


    public function getIpAddress() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($ips[count($ips) - 1]);
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    /**
     * @Route("/contact", name="contact")
     * @Template("AppBundle:Public:empty.html.twig")
     */
    public function contactAction(Request $request)
    {
        
        if ($request->getMethod() == 'POST') {
            
            if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){
                
            }
            $ip='Brak';
            $name=$this->get('request')->get('name');
            $type=$this->get('request')->get('type');
            $mail=$this->get('request')->get('mail');
            $subject=$this->get('request')->get('subject');
            $message=$this->get('request')->get('message');
           
            
            
            
            $button='Wyślij do nas sugestie';
            if($type=='complaint') $button='Formularz reklamacyjny';
            if($type=='idea') $button='Wyślij do nas sugestie';
            if($type=='partner') $button='Zostań partnerem';
            
            $content='IP: '.$this->getIpAddress().'  
            Imię i nazwisko: '.$name.'   
            Rodzaj wiadomości: '.$button.'       
            Temat: '.$subject.'   
            Kontakt: '.$mail.'

            Wiadomość: 

            '.$message.'
            ';
            
            $captcha=$this->get('request')->get('g-recaptcha-response');
            $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcGnyUTAAAAAPAZEueyXw0o5pNyP1xlf-f8dULa&response=".$captcha."&remoteip=".$this->getIpAddress()), true);

            echo '<div class="page">';
            
            if($response['success'] == false)
            {
               echo($this->get('translator')->trans('To pole jest wymagane'));
            }
            else
            {
              $this->sendMail('Wysłano maila przez stronę Epado', nl2br($content), 'office@epado.com', 'mailAdmin'); 
              if($type=='complaint') echo($this->get('translator')->trans('Dziękujemy, Twoje zgłoszenie zostało wysłane.'));
              if($type=='idea') echo($this->get('translator')->trans('Każda opinia na temat Epado jest dla nas bardzo ważna dlatego dziękujemy za wiadomość.'));
              if($type=='partner') echo($this->get('translator')->trans('Dziękujemy, Twoje zgłoszenie zostało wysłane.'));
            }
            

            echo '</div>';
        }    
        
        return array();
    }  
    
    /**
     * @Route("/{_locale}/search", name="search")
     * @Template(engine="twig")
     */
    public function searchAction(Request $request)
    {
        

        
        $search=$this->get('request')->query->get('search');
        if($search){
            $parameters=array();
            $strings=explode(' ',trim($search) );
            foreach($strings as $key=>$string){
                if(trim($string)=='') unset($strings[$key]);
                else $parameters[]=trim($string);
            }
            
            
            //$crepository=$this->getDoctrine()->getRepository('AppBundle:PageType');
            //$type= $crepository->findOneBy(array('id'=>1)); 
            
            $em=$this->getDoctrine()->getManager();
            $query=$em->createQueryBuilder();
            $query
            ->from('AppBundle:Page','p')
            ->leftJoin('p.translations','pt')              
            ->where('p.enabled=1 AND p.expired>:now AND p.public=1') 
            ->andWhere('pt.locale = p.locale ')   
            ->leftJoin('p.address','pa')         
            ->leftJoin('p.type','ptype')         
            ->andWhere('p.deleted IS NULL ')    
            ->andWhere('p.type=:type')
            ->setParameter("type", 1)  
            ->setParameter("now", new \DateTime('now'))  
            ->setMaxResults(20)        
            ->select('p,pt,pa,ptype');
            
            if(count($parameters)==1){
                $query->andWhere('pt.first_name LIKE \'%'.$parameters[0].'%\' OR pt.last_name LIKE \'%'.$parameters[0].'%\'   ');  //OR pt.name LIKE \'%'.$parameters[0].'%\'  
            }elseif(count($parameters)==2){
                $query->andWhere(' 
                    (pt.first_name LIKE \'%'.$parameters[0].'%\' AND pt.last_name LIKE \'%'.$parameters[1].'%\') 
                    OR (pt.first_name LIKE \'%'.$parameters[1].'%\' AND pt.last_name LIKE \'%'.$parameters[0].'%\')
                    '); // OR (pt.name LIKE \'%'.$parameters[0].'%\' OR pt.name LIKE \'%'.$parameters[1].'%\' )    
            }else{
                $temp=''; $i=0;
                foreach($parameters as $param){ $i++; if($i!=1) $temp.=' AND ';
                    $temp.= ' (pt.first_name LIKE \'%'.$param.'%\' OR pt.last_name LIKE \'%'.$param.'%\' OR pt.name LIKE \'%'.$param.'%\') ';
                }
                $query->andWhere($temp);
            }

            $pages_people = $query->getQuery()->getResult();
            
            
            
            //$crepository=$this->getDoctrine()->getRepository('AppBundle:PageType');
            //$type= $crepository->findOneBy(array('id'=>2)); 
            
            $em=$this->getDoctrine()->getManager();
            $query=$em->createQueryBuilder();
            $query
            ->from('AppBundle:Page','p')
            ->leftJoin('p.translations','pt')              
            ->where('p.enabled=1 AND p.expired>:now AND p.public=1')    
            ->andWhere('pt.locale = p.locale ')
            ->leftJoin('p.address','pa')    
            ->leftJoin('p.type','ptype')          
            ->andWhere('p.deleted IS NULL ')    
            ->andWhere('p.type=:type')
            ->setParameter("type", 2)  
            ->setParameter("now", new \DateTime('now'))  
            ->setMaxResults(20)        
            ->select('p,pt,pa,ptype');
            
            if(count($parameters)==1){
                $query->andWhere('pt.name LIKE \'%'.$parameters[0].'%\' ');   
            }elseif(count($parameters)==2){
                $query->andWhere(' 
                    (pt.name LIKE \'%'.$parameters[0].'%\' OR pt.name LIKE \'%'.$parameters[1].'%\' )
                    ');   
            }else{
                $temp=''; $i=0;
                foreach($parameters as $param){ $i++; if($i!=1) $temp.=' AND ';
                    $temp.= ' (pt.name LIKE \'%'.$param.'%\') ';
                }
                $query->andWhere($temp);
            }

            $pages_places = $query->getQuery()->setHint(\Doctrine\ORM\Query::HINT_FORCE_PARTIAL_LOAD, true)->getResult();
            
            
            
            $places=0;
            $people=0;
            
            if($pages_places) $places=1;
            if($pages_people) $people=1;
            
            /*foreach($pages as $page){
                if($page->getType()->getId()==1){
                    $people++;
                }
                elseif($page->getType()->getId()==2){
                    $places++;
                }
            }*/
            
            
            $query=$em->createQueryBuilder();
            $query
            ->from('AppBundle:Cemetery','c')
            ->leftJoin('c.address','a')  
            ->setMaxResults(30)                
            ->select('c,a');
            $query->andWhere('c.checked=true');   
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
            foreach($parameters as $param){ $i++; if($i!=1) $temp.=' AND ';
                $temp.= '(a.city LIKE \'%'.$param.'%\' ) '; //OR pt.name LIKE \'%'.$parameters[0].'%\' OR a.address LIKE \'%'.$param.'%\'
                //$query->orWhere('c.name LIKE \'%'.$param.'%\' OR a.city LIKE \'%'.$param.'%\' OR a.address LIKE \'%'.$param.'%\' ');
            }
            $query->andWhere($temp);
            */
            
            
            
            $cemeteries = $query->getQuery()->getResult();
        }else{
            $pages=null;
            $cemeteries=null;
        }
        

        
        return $this->render('AppBundle:Public:search.html.twig', array(
            'cemeteries' => $cemeteries,
            'pages_people'=> $pages_people,
            'pages_places'=> $pages_places,
            'places'=>$places,
            'people'=>$people
        ));
    }  

    /**
     * @Route("/{_locale}/cemetery/{id}", name="cemetery")
     * @Template(engine="twig")

     */
    public function cemeteryAction(Request $request, $id)
    {

        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:Cemetery');
            $cemetery = $repository->findOneBy(array('id'=>$id));
            if(!$cemetery) throw $this->createNotFoundException(''); 
        }else{
            throw $this->createNotFoundException(''); 
        }
        
            
        $em=$this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Page','p')
        ->leftJoin('p.translations','pt')  
        ->where('p.enabled=1 AND p.expired>:now AND p.public=1 AND p.cemetery=:cemetery') 
        ->andWhere('p.deleted IS NULL ')        
        ->setParameter('now', new \DateTime('now'))    
        ->setParameter('cemetery', $cemetery)           
        ->select('p');

        $pages = $query->getQuery()->getResult();
        
        
        return $this->render('AppBundle:Public:cemetery.html.twig', array(
            'cemetery' => $cemetery,
            'pages'=> $pages,
        ));
    }
    
    
    public function displayPage(Request $request,$parameters)
    {
        //$this->get('session')->getFlashBag()->add('success', 'Zmiany zostały zapisane.' );
        //$this->get('session')->getFlashBag()->add('warning', 'Zmiany zostały zapisane ale testowanie dlugiego elementu trwa dalej i trzeba bedzie wszystko przetestowac i zobaczyc czy sie nadaje.' );
        //$this->get('session')->getFlashBag()->add('error', 'Zmiany zostały zapisane.' );
        //$this->get('session')->getFlashBag()->add('notice', 'Zmiany zostały zapisane.' );


        //$test=$this->sendMail('Temat','w załączniku znajduje się Faktura VAT wystawiona przez firmę.', 'l.boguszewski@gmail.com' );           
        //var_dump($test);
        //die();
        


        $em=$this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query->from('AppBundle:Page','p')   
        ->leftJoin('p.translations','pt')
        ->leftJoin('p.address','pa')  
        ->leftJoin('p.image','pi')        
        ->leftJoin('p.images','pim')      
        ->leftJoin('p.family','pf')    
        ->leftJoin('p.type','type')        
        ->leftJoin('p.localisation','pl') 
        ->leftJoin('p.cemetery','pc')  
        ->leftJoin('pc.address','pcaddress')
        ->leftJoin('p.creator','pcreator')          
        ->where('p.deleted IS NULL ')     
        ->andWhere('pt.locale = p.locale ')        
        ->select('p,pt,pa,pl,pc,pi,pf,type,pcaddress,pcreator');
        
        if(isset($parameters['code'])){
            if($parameters['code']=='017845163920008') return $this->redirectToRoute('homepage');
            $query->andWhere('p.code = :code ')->setParameter('code',$parameters['code']);   
            
        }elseif(isset($parameters['id'])){
            $parameters['code']=null;
            $query->andWhere('p.id = :id ')->setParameter('id',$parameters['id']);   
        }else{
            throw $this->createNotFoundException('Strona nie istnieje'); 
        }
        
        $query=$query->getQuery();//hint becouse sometimes owning site always query second time for it
        
        
        //$repository=$this->getDoctrine()->getRepository('AppBundle:Page');
        //$page2 = $repository->findOneById(3);
        //var_dump($page2->getImages()); die('aa');
        
        
        
        
        $query->setFetchMode("AppBundle\\Entity\\Page", "cemetery", \Doctrine\ORM\Mapping\ClassMetadata::FETCH_EAGER);
        $query->setFetchMode("AppBundle\\Entity\\Cemetery", "address", \Doctrine\ORM\Mapping\ClassMetadata::FETCH_EAGER);
        $query->setFetchMode("AppBundle\\Entity\\Address", "localisation", \Doctrine\ORM\Mapping\ClassMetadata::FETCH_EAGER);
        //$page = $query->setHint(\Doctrine\ORM\Query::HINT_FORCE_PARTIAL_LOAD, true)->getOneOrNullResult();
        $page = $query->getOneOrNullResult();
        
        if(!$page) throw $this->createNotFoundException('Strona nie istnieje');   


        //var_dump($page->getImages()); die('aa');
        

        if($parameters['preview']){
            if(!$this->getUser()) throw $this->createNotFoundException('Strona nie istnieje');
            if(!in_array($this->getUser()->getType(),array('admin','worker') )){
                if($page->getCreator()!=$this->getUser())  
                    throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
            }
        }else{
            if($page->getExpired()<new \DateTime('now')){
                if(!$this->getUser()) throw $this->createNotFoundException('Strona nie istnieje');
                if(!in_array($this->getUser()->getType(),array('admin','worker') )){
                    if($page->getCreator()!=$this->getUser())  
                        throw $this->createNotFoundException('Strona nie istnieje');
                }   
            }
        }
        
        
        
        
        $partner=null;
        //die('a');
        //var_dump($page->getCodebject());
        //var_dump($parameters['code']);
        
        $repository_code=$this->getDoctrine()->getRepository('AppBundle:Code');
        $code_object = $repository_code->findOneBy(array('code'=>$parameters['code'])); 
        //var_dump($code_object);
        //die();

        if($code_object)
        if($code_object->getOrderProductMany())
        if($code_object->getOrderProductMany()->getOrder()->getBuyer()){
            $partner=$code_object->getOrderProductMany()->getOrder()->getBuyer();
            //die($partner->getFullName() );
            if($partner->getType()!='partner' || $partner->getAds()!=true || $partner->getAdsShow()!=true  || $page->getAds()!=true) $partner=null;
        }
        
        
        
        $partner_id=$this->get('request')->query->get('partner_id');
        if($partner_id){
            $repository_partner=$this->getDoctrine()->getRepository('AppBundle:User');
            $partner = $repository_partner->findOneById($partner_id);
            
            if($partner)
            if($partner->getType()!='partner' || $partner->getAds()!=true ) $partner=null;
        } 
        
        
        
        
        
        $scan=$this->get('request')->query->get('scan');
        if($scan==1){
            $page->setCountScan($page->getCountScan()+1);
        }else{
            $page->setCountNormal($page->getCountNormal()+1);
        }
        $em->persist($page);
        $em->flush();
        

        
        if ($request->getMethod() == 'POST' && $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $message=$this->get('request')->get('message');
            $phone=$this->get('request')->get('phone');
            $email=$this->get('request')->get('email');
  
     
            if(!is_null($phone)){ 
                    if ($phone=='' || !preg_match("/^[+][0-9]{1,4}[.][0-9]{5,20}$/", $phone)) {
                        $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Podany przez Ciebie numer telefonu jest nieprawidłowy:').' '.$phone );
                    }else{
                        $response=$this->sendAnonymousNotification(10, array(
                        '{{sender}}'=>$this->getUser()->getFullName(),
                        '{{page}}'=>$page->getName(),
                        '{{link}}'=>$request->getUri(),    
                        ), array('phone'=>$phone));

                        if($response) $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Wysłany został SMS z linkiem do strony na numer:').' '.$phone.'.' );
                        else  $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('SMS nie został wysłany, możliwe że podałeś zły nr telefonu albo numer który już nie działa:').' '.$phone.'.' );
                    }  
                    return $this->refresh();
            }
            
            if(!is_null($email)){ 

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Podany przez Ciebie mail jest nieprawidłowy:').' '.$email.'.' );
                    }else{
                        $this->sendAnonymousNotification(10, array(
                        '{{sender}}'=>$this->getUser()->getFullName(),
                        '{{page}}'=>$page->getName(),
                        '{{link}}'=>$request->getUri(),    
                        ), array('email'=>$email));

                        $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Wysłany został mail z linkiem do strony na adres:').' '.$email.'.' );
                    }
                    return $this->refresh();
            }
            
            if($message){    
                $new=new Post();
                $new->setCreator($this->getUser());
                $new->setPage($page);
                $new->setMessage($message);


                $em = $this->getDoctrine()->getManager();
                $em->persist($new);
                $em->flush();
                if($this->getUser()!=$page->getBuyer()){
                    if($page->getBuyer()->getNotificationPost())    
                    $this->sendNotification(4, array(
                    '{{sender}}'=>$this->getUser()->getFullName(),
                    '{{page}}'=>$page->getName(),
                    '{{message}}'=>$message, 
                    '{{link}}'=>$request->getUri(),    
                    ), $page->getBuyer());
                    
                    foreach($page->getCredentials() as $c){
                        if($c->getUser()->getNotificationPost() && $this->getUser()!=$c->getUser())
                            if($c->getPagePostsNotification() || $c->getType()=='admin'){
                                $this->sendNotification(4, array(
                                '{{sender}}'=>$this->getUser()->getFullName(),
                                '{{page}}'=>$page->getName(),
                                '{{message}}'=>$message, 
                                '{{link}}'=>$request->getUri(),    
                                ), $c->getUser());
                            }
                    }
                    
                    //$this->sendMail('Dodano kondolencje','Użytkownik '.$this->getUser()->getFirstName().' '.$this->getUser()->getLastName().' wysłał kondolencje. Treść kondolencji to: '.$message.' ',$page->getBuyer()->getEmail());  
                }
                return $this->refresh();
            }
        }
        
        if ($request->getMethod() == 'GET' && $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $post_delete_id=$this->get('request')->query->get('post_delete_id');
            if($post_delete_id){
                
                
                $post=$this->getDoctrine()->getRepository('AppBundle:Post')->findOneBy(array('id'=>$post_delete_id));
  
                if($post){
                if($this->getUser()->havePagePermission($page,'page_posts_delete')){
                    
                    $post->setDeleted(new \DateTime());
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($post);
                    $em->flush(); 
                }
                }
                
                
                return $this->refresh( array(), array('?*') );
            }
            
            
            
        }
        
        if ($request->getMethod() == 'GET') {
          $last_post_id=$this->get('request')->query->get('last_post_id');
          if(is_numeric($last_post_id)){

            $em=$this->getDoctrine()->getManager();
            $query=$em->createQueryBuilder();
            $query
            ->from('AppBundle:Post','p')   
            ->leftJoin('p.creator','pc')        
            ->where('p.page=:page')  
            ->andWhere('p.deleted IS NULL ') 
            ->andWhere('p.id<=:last_post_id')
            ->setParameter('last_post_id', $last_post_id)
            ->setParameter('page', $page) 
            ->orderBy('p.created','DESC')
            ->setMaxResults(10)           
            ->select('p,pc');

            $posts = $query->getQuery()->getResult();
            
            return $this->render('AppBundle:Public:posts.html.twig', array(
                'posts' => $posts,
            ));
              
          }
        }
        $posts=null;
        $posts_count=0;
        if($page->getType()->getId()==1){
            $em=$this->getDoctrine()->getManager();
            $query=$em->createQueryBuilder();
            $query
            ->from('AppBundle:Post','p') 
            ->leftJoin('p.creator','pc')
            ->where('p.page=:page')  
            ->andWhere('p.deleted IS NULL ')        
            ->setParameter('page', $page) 
            ->orderBy('p.created','DESC')
            ->setMaxResults(10)           
            ->select('p,pc');

            $clone=clone $query;
            $aliases=$query->getRootAliases();
            $clone->setMaxResults(null);
            $clone->select('count('.$aliases[0].')');
            $posts_count=$clone->getQuery()->getSingleScalarResult();

            $posts = $query->getQuery()->getResult();
        }
        
        $audiobooks=null; 
        if($page->getType()->getId()==2){
            $em=$this->getDoctrine()->getManager();
            $query=$em->createQueryBuilder();
            $query
            ->from('AppBundle:Audiobook','a') 
            ->where('a.page=:page')->setParameter('page', $page) 
            ->orderBy('a.sort','ASC')          
            ->select('a');

            $audiobooks = $query->getQuery()->getResult();
        }
     
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Page','p')
        ->leftJoin('p.translations','pt') 
        ->leftJoin('p.image','pi')        
        ->where('p.enabled=1 AND p.expired>:now AND p.public=1 AND p.family=:family')  
        ->andWhere('pt.locale = p.locale ')        
        ->andWhere('p.deleted IS NULL ')        
        ->setParameter('now', new \DateTime('now'))    
        ->setParameter('family', $page->getFamily())           
        ->select('p,pt,pi');
        $family = $query->getQuery()->setHint(\Doctrine\ORM\Query::HINT_FORCE_PARTIAL_LOAD, true)->getResult(); //hint becouse sometimes owning site always query second time for it
        
        
     
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Image','i')
        ->where('i.page=:page')          
        ->setParameter('page', $page)   
        ->orderBy('i.sort','ASC')
        ->select('i');
        $images = $query->getQuery()->getResult();
        
        
        $products=null;
        
        if($page->getId()){
            $query = $em->createQueryBuilder('')
            ->from('AppBundle:Product','p')
            ->leftJoin('p.translations','pt')
            ->leftJoin('p.image','pi')        
            ->leftJoin('p.prices','pp') 
            ->where('pp.currency=:currency')->setParameter('currency',$request->getSession()->get('currency'))
            ->andWhere("pt.locale = '".$request->getLocale()."'")
            ->andWhere('p.enabled = 1')
            ->andWhere('p.in_page = 1')
            ->andWhere('p.deleted IS NULL ')
            ->andWhere('p.page_type = :type')           
            ->orderBy('pt.name', 'ASC')
            ->select('p,pt,pp,pi');
            
            if($page->getSpecial()) $query->andWhere('p.special = 1');
            
            $query->andWhere('p.category = :category')->setParameter('category',  1);
            
            $query->setParameter('type',  $page->getType());
            
            if($page->getCode()) $query->andWhere(' p.with_code = 1 ');
            else $query->andWhere(' p.without_code = 1 ');

            $products = $query->getQuery()->getResult();
            
            foreach($products as $i=>$p){
                if($p->getCities()){
                    $cities=explode(',',$p->getCities());
                    if(!in_array($page->getAddress()->getCity(),$cities)) unset($products[$i]);
                }
                
                //if($p->getCategory()->getId()==2) unset($products[$i]);
            }
            
        }
        
        
        $this->container->get('session')->set('_security.main.target_path',''.$this->selfUrl(array(),array(),true));
        
        $facebook_url = $this->getFacebookUrl();

        if($page->getType()->getId()==1)
        return $this->render('AppBundle:Public:person.html.twig', array(
            'page' => $page,
            'products' => $products,
            'family' => $family,
            'code' => $parameters['code'],
            'facebook_url' => $facebook_url,
            'posts' => $posts,
            'audiobooks' => $audiobooks,
            'images' => $images,
            'posts_count'=>$posts_count,
            'partner'=>$partner,
        ));
        if($page->getType()->getId()==2)
        return $this->render('AppBundle:Public:place.html.twig', array(
            'page' => $page,
            'products' => $products,
            'family' => $family,
            'code' => $parameters['code'],
            'facebook_url' => $facebook_url,
            'posts' => $posts,
            'audiobooks' => $audiobooks,
            'images' => $images,
            'posts_count'=>$posts_count,
            'partner'=>$partner,
        ));
        
    }
    
    /**
     * @Route("/{code}", name="page", requirements={"code" = "\d{15}+"})
     * @Template(engine="twig")

     */
    public function pageAction(Request $request, $code)
    {
        $locale = $request->getPreferredLanguage($this->container->getParameter('locales'));
        
        if($locale!=$this->container->getParameter('default_locale') && $request->getSession()->get('is_next_visit')!=1){
            $currencies=$this->container->getParameter('default_currencies');
            $request->getSession()->set('currency',$currencies[$locale]); 
            return $this->redirectToRoute('page_locale', array('_locale' => $locale,'code'=>$code));
        }
        
        $request->setLocale($this->container->getParameter('default_locale')); 
        if(!$request->getSession()->get('currency')){
            $currencies=$this->container->getParameter('default_currencies');
            $request->getSession()->set('currency',$currencies[$request->getLocale()]); 
        }
        
        return $this->displayPage($request,array('code'=>$code,'preview'=>false));
    }
    

    
    
    
    /**
     * @Route("/{_locale}/{code}", name="page_locale", requirements={"code" = "\d{15}+"})
     * @Template(engine="twig")

     */
    public function pageLocaleAction(Request $request, $code)
    {
        if($request->getLocale()==$this->container->getParameter('default_locale')) 
            return $this->redirectToRoute('epado',array('code'=>$code));
        
        return $this->displayPage($request,array('code'=>$code,'preview'=>false));
    }
    

    /**
     * @Route("/{_locale}/preview/{id}", name="page_preview")
     * @Template(engine="twig")

     */
    public function pagePreviewAction(Request $request, $id)
    {
        
        return $this->displayPage($request,array('id'=>$id,'preview'=>true));
    }
    

    /* @var $mail \AppBundle\Entity\Mail */
    /**
     * @Route("/", name="homepage")
     * @Template(engine="twig")

     */
    public function homeAction(Request $request)
    {
        
        //$mail=$this->getDoctrine()->getRepository('AppBundle:Mail')->findOneById(1);
        //die($mail->translate('en')->getName().$mail->translate('en')->getMail().'-');
        
        
//        $this->get('session')->getFlashBag()->add('success', 'Zmiany zostały zapisane.' );
//        $this->get('session')->getFlashBag()->add('warning', 'Zmiany zostały zapisane ale testowanie dlugiego elementu trwa dalej i trzeba bedzie wszystko przetestowac i zobaczyc czy sie nadaje.' );
//        $this->get('session')->getFlashBag()->add('error', 'Zmiany zostały zapisane.' );
//        $this->get('session')->getFlashBag()->add('notice', 'Zmiany zostały zapisane.' );
         

//        if($_SERVER['REMOTE_ADDR']!='192.168.0.1') die('');
           
        //$parameters=$this->container->getParameter('facebook');
        //var_dump($parameters);
        //die('a');
        
        $locale = $request->getPreferredLanguage($this->container->getParameter('locales'));
//var_dump($this->container->getParameter('locales'));
//var_dump($locale);
//die();
        if($locale!=$this->container->getParameter('default_locale') && $request->getSession()->get('is_next_visit')!=1){
            $currencies=$this->container->getParameter('default_currencies');
            $request->getSession()->set('currency',$currencies[$locale]); 
            return $this->redirectToRoute('homepage_locale', array('_locale' => $locale));
        }
        
        $request->setLocale($this->container->getParameter('default_locale')); 
        if(!$request->getSession()->get('currency')){
            $currencies=$this->container->getParameter('default_currencies');
            $request->getSession()->set('currency',$currencies[$request->getLocale()]); 
        }

        $products=array();
        //$repository_code=$this->getDoctrine()->getRepository('AppBundle:Product');
        //$products_obj = $repository_code->findBy(array( 'id'=> array(1,2,3)) ); 
        
        $products_obj=$this->getDoctrine()->getManager()->createQueryBuilder()
            ->from('AppBundle:Product','p')
            ->leftJoin('p.translations','pt')  
            ->leftJoin('p.prices','pp') 
            ->where('pp.currency=:currency')->setParameter('currency',$request->getSession()->get('currency'))
            ->andWhere('p.id IN (:ids)')->setParameter('ids',array(1,2,3))
            ->select('p,pt,pp')->getQuery()->getResult();
        
        
        foreach($products_obj as $product){
            $products[$product->getId()]=$product;
        }
        
        return array( 'products'=>$products );
    }   
    
    /**
     * @Route("/{_locale}", name="homepage_locale")
     * @Template("AppBundle:Home:home.html.twig",engine="twig")

     */
    public function homeLocaleAction(Request $request)
    {
        if($request->getLocale()==$this->container->getParameter('default_locale')) return $this->redirectToRoute('homepage');
       
        $products=array();
        $repository_code=$this->getDoctrine()->getRepository('AppBundle:Product');
        $products_obj = $repository_code->findBy(array( 'id'=> array(1,2,3)) );    
        foreach($products_obj as $product){
            $products[$product->getId()]=$product;
        }
        
        return array( 'products'=>$products );
    }    
    
    

    
    /**
     * @Route("/{_locale}/rules", name="rules")
     * @Template("AppBundle:Home:rules.html.twig",engine="twig")

     */
    public function rulesAction(Request $request)
    {   
        //$repository=$this->getDoctrine()->getRepository('AppBundle:Text');
        //$text = $repository->findOneById(1);
        
        $text=$this->getDoctrine()->getManager()->createQueryBuilder()
            ->from('AppBundle:Text','t')
            ->leftJoin('t.translations','tt')     
            ->where('t.id = 1')        
            ->select('t,tt')->getQuery()->getOneOrNullResult();
            
            
        return array('text'=>$text);
    }  
    

    
    /**
     * @Route("/{_locale}/prv", name="prv")
     * @Template("AppBundle:Home:prv.html.twig",engine="twig")

     */
    public function prvAction(Request $request)
    {   
        //$repository=$this->getDoctrine()->getRepository('AppBundle:Text');
        //$text = $repository->findOneById(2);
        
        $text=$this->getDoctrine()->getManager()->createQueryBuilder()
            ->from('AppBundle:Text','t')
            ->leftJoin('t.translations','tt')     
            ->where('t.id = 2')        
            ->select('t,tt')->getQuery()->getOneOrNullResult();
            
        
        return array('text'=>$text);
    }  
    
    
}

