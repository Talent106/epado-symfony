<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation
use AppBundle\Entity\Testing;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\QueryBuilder;
use Facebook;

class BaseController extends Controller
{
   public function refresh($include=array(),$exclude=array(),$hash=''){
       $request=$this->getRequest();
       $route_params=$request->get('_route_params');
       $query_params=$request->query->all();
       
       if(in_array('?*',$exclude)) $query_params=array();
       if(in_array('*?',$exclude)) $route_params=array();
       
       $current_query=$route_params+$query_params;
       
       foreach($current_query as $key=>$val){
           if(in_array($key,$exclude)) unset($current_query[$key]);
       }

       return $this->redirect($this->generateUrl($request->get('_route'), $include+$current_query).$hash);
   }
   
   public function selfUrl($include=array(),$exclude=array(), $absolute=false){
       $request=$this->getRequest();
       $route_params=$request->get('_route_params');
       $query_params=$request->query->all();
       
       if(in_array('?*',$exclude)) $query_params=array();
       if(in_array('*?',$exclude)) $route_params=array();
       
       $current_query=$route_params+$query_params;
       
       foreach($current_query as $key=>$val){
           if(in_array($key,$exclude)) unset($current_query[$key]);
       }

       return $this->generateUrl($request->get('_route'), $include+$current_query, $absolute);
   }
   
   
   public function getPager($page,$objects_per_page, QueryBuilder $query){     
        $clone=clone $query;
       
        $aliases=$query->getRootAliases();
        $clone->select('count('.$aliases[0].')');
        
        $pager['page']=$page;
        $pager['count']=$clone->getQuery()->getSingleScalarResult();
        $pager['per_page']=$objects_per_page;
        $pager['page_count']=ceil($pager['count']/$pager['per_page']);
        
        if( ($page>$pager['page_count'] || $page<1) && $pager['count']!=0 ) throw $this->createNotFoundException('Strona nie istnieje');   
        
        $pager['results']=$query     
        ->setFirstResult(($page-1)*$pager['per_page'])
        ->setMaxResults($pager['per_page'])
        ->getQuery()->getResult();
        
        //var_dump($aliases);
        //die($pager['count']);
        
        
        

        //var_dump($pager['results']);
        //die($pager['per_page'].'aa');
        return $pager;
   }
   
   
   public function sendMail($subject,$content,$recepiant,$attachments=array()){
        //die(dirname(__FILE__));
        require_once(dirname(__FILE__).'/../../../vendor/phpmailer/PHPMailerAutoload.php');

        $mail = new \PHPMailer();
         
        //$mail->SMTPDebug  = true;  
        //$mail->SMTPDebug = 3;
        
        foreach($attachments as $att){
            $mail->addStringAttachment($att,'Faktura.pdf');
        }
        
        $mail->IsSMTP();       
        $mail->CharSet = 'UTF-8'; 
        
        $mail->Host = 's27.cyber-folks.pl'; 
        $mail->Port='587';
        $mail->SMTPAuth=true; 
        $mail->SMTPSecure='tls';
        $mail->Username = 'office@epado.com';
        $mail->Password = 'qomandos11';  
        $mail->From     = 'office@epado.com';
        $mail->FromName = 'Epado';
        $mail->Hostname = 'epado.com';
        
        
        
        
        
        $mail->AddAddress("$recepiant", "$recepiant"); 
        $mail->AddReplyTo($mail->From,  $mail->FromName);  
        //$mail->AddBCC($mail->From, $mail->FromName);

        $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
        );

        $mail->Subject = $subject;
        //die($this->renderView('mail.html.twig',array('content' => $content)));
        $mail->MsgHTML($this->renderView('mail.html.twig',array('content' => $content)));

        $test=$mail->Send();
        
        $error="Nie wyslano maila z informacja do klienta. Blad wysyłki: " . $mail->ErrorInfo;
        
        if ($test) {
            $this->get('session')->getFlashBag()->add('success', 'Została wysłana wiadomość email.' );
                
        } else {
            $this->get('session')->getFlashBag()->add('error', 'Wystąpił błąd podczas wysyłania wiadomości.' );     //.$error
        }    
        
        //die();

        return $test;
   }
   
   
    public function smsApi($params, $token, $backup = false ) {

        static $content;

        if($backup == true){
            $url = 'https://api2.smsapi.pl/sms.do'; //http for non secure conn
        }else{
            $url = 'https://api.smsapi.pl/sms.do'; //http for non secure conn
        }

        $c = curl_init();
        curl_setopt( $c, CURLOPT_URL, $url );
        curl_setopt( $c, CURLOPT_POST, true );
        curl_setopt( $c, CURLOPT_POSTFIELDS, $params );
        curl_setopt( $c, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $c, CURLOPT_HTTPHEADER, array(
           "Authorization: Bearer $token" 
        ));

        $content = curl_exec( $c );
        $http_status = curl_getinfo($c, CURLINFO_HTTP_CODE);

        if($http_status != 200 && $backup == false){
            $backup = true;
            $this->smsApi($params, $token, $backup);
        }

        curl_close( $c );    
        return $content;
    }

   
   
   public function sendSms($content,$recepiant){
       
        $content=ucfirst($content);
        $parameters=$this->container->getParameter('smsapi'); 
        
        $phone_number=null;
        if(strpos($recepiant,'.')){
            $temp=explode('.',$recepiant);
            if(key_exists(1,$temp)) $phone_number=$temp[0].$temp[1];
            else $phone_number=$temp[0];  
        }else $phone_number=$recepiant;
        //$content='Test';
        $params = array(
             'to' => $phone_number,
             'from' => 'Info',
             'nounicode' => '0',
             'normalize' => '0',
             'encoding' => 'utf-8',
             'message' => $content,
        );
          
        $token=$parameters['token'];
        $response=$this->smsApi($params, $token);
        //var_dump($content);
        //var_dump($response);
        //die('a');
        //echo $phone_number;
        //die($token);
        if(!$response){
            //var_dump($response);
            //die();
            return false;
        }else{
           $info=explode(':',$response);
           if($info[0]=='OK') return true;
           else return false;
        }
        
        //sprawdzanie poprawnosci numeru http://api.smsapi.pl/hlr.do?username=epado.com@gmail.com&password=b4556446c2d18fa4014d2e362611bee0&number=393397884956&format=json
        
        /*
        if(strlen($phone_number) == 9){
            //$content='Test';
            
            $soap = null;
            try {
                
                $soap = new \SoapClient( 'https://ssl.smsapi.pl/webservices/v2/?wsdl' , array('features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'cache_wsdl' => WSDL_CACHE_NONE, 'trace' => true));

                $client = array( 'username' => $parameters['login'], 'password' => $parameters['password']); //'8d512058ea2e4c9b979ea2a8f831a5bf');
                $sms = array('recipient' => $phone_number,
                                        'sender'	=> 'Epado',
                                        'eco'       => 1,
                                        'details'   => 1,
                                        'date_send' => 0,
                                        'message'   => $content,
                                        'params'    => array(),
                                        'idx'       => uniqid(),
                );
                $params = array('client' => $client, 'sms' => $sms);
                $result = $soap->send_sms($params);

            } catch(Exception $e) {
            }
        } 
        */   
   }
   
    /* @var $mail \AppBundle\Entity\Mail */
   
   public function sendNotification($id,$replace,$user){

        $mail=$this->getDoctrine()->getRepository('AppBundle:Mail')->findOneById($id);
        //$mail->getTranslation();
        
        if($mail){
            
           
            $message=str_replace(array_keys($replace),array_values($replace),$mail->translate($user->getLocale())->getMail());
            $subject=str_replace(array_keys($replace),array_values($replace),$mail->translate($user->getLocale())->getSubject());
             
            if($mail->getSendMail()){
                return $this->sendMail($subject,nl2br($message),$user->getEmail());
            }  
            if($id==8){
                
                return $this->sendSms(strip_tags($message) ,$user->getPhone());
            }
        }     
   }
   
   public function sendAnonymousNotification($id,$replace,$data=array('phone'=>null,'email'=>null)){
       
        $mail=$this->getDoctrine()->getRepository('AppBundle:Mail')->findOneById($id);
        if($mail){
            
            $message=str_replace(array_keys($replace),array_values($replace),$mail->getMail());
            $subject=str_replace(array_keys($replace),array_values($replace),$mail->getSubject());
             
            if(isset($data['email'])){
                return $this->sendMail($subject,nl2br($message),$data['email']);
            }  
            if(isset($data['phone'])){
                return $this->sendSms(strip_tags($message) ,$data['phone']);
            }
        }     
   }
   
   public function getUrlProtocol($url){
       if($this->getRequest()->isSecure()) $url=str_replace('http:','https:',$url);
       
       return $url;
   }
   
   public function setOrderStatus($order,$status){
       
        $em=$this->getDoctrine()->getManager();

        $order->setStatus($status);
        //status do zmienienia
        //$this->get('session')->getFlashBag()->add('notice', $order->getStatus()->getName() );
        
        $prev_order=$em->getUnitOfWork()->getOriginalEntityData($order);
        
        //poprzedni status
        //if($prev_order['status']) $this->get('session')->getFlashBag()->add('notice', $prev_order['status']->getName() );
        
        $em->persist($order);
       
       
        $his=new \AppBundle\Entity\OrderStatusHistory();
        if (is_object($this->getUser()) && $this->getUser()->getId()) { $his->setCreator($this->getUser()); }
        $his->setOrder($order);
        $his->setStatus($status);
        

        
        
        $em->persist($his);
        $em->flush();
        

        //$this->get('session')->getFlashBag()->add('success', 'Status został zmieniony.' );
        
        if($status->getSendMail()){
            $tab='<table style="width:100%; border-collapse: collapse;"><tr>'
                    . '<th style="border:1px solid #ddd; padding:4px 6px; text-align:left;">Lp</th>'
                    . '<th style="border:1px solid #ddd; padding:4px 6px; text-align:left;">Nazwa</th>'
                    . '<th style="border:1px solid #ddd; padding:4px 6px; text-align:left;">Strona</th>'
                    . '<th style="border:1px solid #ddd; padding:4px 6px; text-align:left;">Ilość</th>'
                    . '<th style="border:1px solid #ddd; padding:4px 6px; text-align:left;">Cena</th>'
                    . '</tr>';
            $i=0;
            foreach($order->getOrderProducts() as $op){$i++;
              $tab.='<tr><td style="border:1px solid #ddd; padding:4px 6px; text-align:left;">'.$i.'</td><td style="border:1px solid #ddd; padding:4px 6px; text-align:left;">'.$op->getName().'</td>';  
              
              if($op->getPage()) $tab.='<td style="border:1px solid #ddd; padding:4px 6px; text-align:left;">'.$op->getPage()->getName().'</td>';    
              else $tab.='<td style="border:1px solid #ddd; padding:4px 6px; text-align:left;">-</td>';    
              
              $tab.='<td style="border:1px solid #ddd; padding:4px 6px; text-align:left;">'.$op->getAmount().'</td>'; 
              $tab.='<td style="border:1px solid #ddd; padding:4px 6px; text-align:left;">'.($op->getPrice()*$op->getAmount()).' '.$order->getCurrency().'</td></tr>';  
            }
            $tab.='<tr><td style="border:1px solid #ddd; padding:4px 6px; text-align:right; " colspan="4">Suma:</td><td style="border:1px solid #ddd; padding:4px 6px; text-align:left;">'.$order->getPrice().' '.$order->getCurrency().'</td>';  
            $tab.='</table>';
            

            $replace=array(
                '{{link}}'=>$this->getUrlProtocol($this->generateUrl('order_form',array('id'=>$order->getId()),true)),
                '{{orderid}}'=>$order->getId(),
                '{{delivery}}'=>$order->getDelivery(),
                '{{billing}}'=>$order->getBilling(),
                '{{price}}'=>$order->getPrice().' '.$order->getCurrency(),
                '{{products}}'=>$tab,
            );
            
            $message=str_replace(array_keys($replace),array_values($replace),$status->getMail());
            $subject=str_replace(array_keys($replace),array_values($replace),$status->getSubject());
            
            $this->sendMail($subject,nl2br($message),$order->getBuyer()->getEmail());
        }     
   }
   
   
   
   
   public function getVideoImage($link){
       
        $url=null;
        
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $link, $matches);
        if($matches)
        $vid=$matches[0];   
        if($matches)
        {
            //echo('<pre>');
            //$test=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?id='.$vid.'&key=AIzaSyDrDcdgTitaBN0crJOZP_Go8-5DoI3-fGQ%20&part=snippet,contentDetails,statistics,status'));
            
            //if(is_object($test) && isset($test->items[0]->snippet->thumbnails)){
            //    var_dump($test->items[0]->snippet->thumbnails);
            //}
            //echo('</pre>');
            $url="https://i1.ytimg.com/vi/$vid/hqdefault.jpg";//maxresdefault
            
        }

        
        preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $link, $matches);
        if($matches)
        $vid=$matches[5];
        if($matches)
        {
            $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vid.php"));
            $url=$hash[0]['thumbnail_large'];
        }
        
        return $url;
   }
   
   

    public function wfirmaApi($module,$action=null,$data=null, $id=null){
        $url='http://api2.wfirma.pl';

        if($module) $url=$url.'/'.$module;
        if($action) $url=$url.'/'.$action;
        if($id) $url=$url.'/'.$id;

        if($action=='download') $url=$url.'?inputFormat=json';
        else $url=$url.'?inputFormat=json&outputFormat=json';    
        //var_dump($data);

        $data=json_encode($data);
        $parameters=$this->container->getParameter('wfirma');
        $login=$parameters['login'];
        $password=$parameters['password'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST,   1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, [
        "accessKey: 38ad8d6bdae91bbf9c2cc14e1bc81c56",
        "secretKey: 03c7c0bbaffb30ae3da58c34cf1fb57e",
        "appKey: 50b3e054b9ae555cb886a45c0b590244"
    ]);
        $result = curl_exec($ch);

      
        if($action!='download') $response=json_decode($result);
        else $response=$result;
        //var_dump($response);

        return $response;
    }
   
   
    public function getFacebookSdk()
    {
        if(!$this->container->get('session')->isStarted()){
            $session = $this->get('session');
            $session->start();
        }
        
        $parameters = $this->container->getParameter('facebook');
        
        require_once $this->get('kernel')->getRootDir() . '/../vendor/facebook/graph-sdk/src/Facebook/autoload.php';
        
        $fb = new \Facebook\Facebook([
            'app_id' => $parameters['app_id'],
            'app_secret' => $parameters['app_secret'],
            'default_graph_version' => $parameters['default_graph_version'],
            'persistent_data_handler' => 'session',    
        ]);
        
        return $fb;
    }
 
    public function getFacebookUrl($add_params=array())
    {
        $fb=$this->getFacebookSdk();
        $parameters=$this->container->getParameter('facebook');
        
        $helper = $fb->getRedirectLoginHelper();
        
        //$params=array_merge(array('scope' => $parameters['scope']), $add_params);
        $params=array('scope' => $parameters['scope']);
        //if(!empty($add_params)) { var_dump($params); die(''); }
        
        $redirect_uri=$this->getUrlProtocol($this->generateUrl('facebook', [], true));
        //$redirect_uri=str_replace('http:','https:',$redirect_uri);
        //$redirect_uri=str_replace('app_dev.php/','',$redirect_uri);
        //die($redirect_uri);
        
        if(isset($add_params)) $loginUrl = $helper->getReRequestUrl($redirect_uri, $params);
        else $loginUrl = $helper->getLoginUrl($this->generateUrl('facebook', [], true), $params);
        
        return $loginUrl;
    }
   
   
}
