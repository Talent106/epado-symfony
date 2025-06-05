<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Controller;


use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security; // turn on security annotation

//login
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use AppBundle\Entity\Address;
use AppBundle\Entity\User;
use AppBundle\Entity\PageCredentials;
use AppBundle\Type\PageCredentialsType;
use AppBundle\Type\UserType;
use AppBundle\Type\UserAddressType;

use Symfony\Component\Form\FormError;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;


/**
 * Controller managing the user profile
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class ProfileController extends BaseController
{
    
    
    

    /**
     * @Route("/{_locale}/profile/permission/{id}", name="permission", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function permissionAction(Request $request, $id)
    {
        $page=null;
        $family=null;
        $object=null;
        
        $em = $this->getDoctrine()->getManager();
        
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:PageCredentials');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Pozwolenie nie istnieje');
            
            if($object->getPage()){
                if(!$this->getUser()->havePagePermission($object->getPage(),'admin')) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                $page=$object->getPage();
            }
            if($object->getFamily()){
                if(!$this->getUser()->haveFamilyPermission($object->getFamily(),'admin')) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
                $family=$object->getFamily();
            }
 
            if($this->get('request')->query->get('delete')==1){
                $em->remove($object);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Uprawnienia zostały usunięte.'));

                if($page) return $this->redirectToRoute('page_form',array('id'=>$page->getId())); 
                if($family) return $this->redirectToRoute('family_form',array('id'=>$family->getId())); 
            }
    
        }else{
            
            $object=new PageCredentials();
            
            if($this->get('request')->request->get('page_id')){
               $repository=$this->getDoctrine()->getRepository('AppBundle:Page');
               $page = $repository->findOneById($this->get('request')->request->get('page_id'));
               if(!$page) throw $this->createNotFoundException('Pozwolenie nie istnieje');
               $object->setPage($page);
               
               if(!$this->getUser()->havePagePermission($object->getPage(),'admin')) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
            }
            elseif($this->get('request')->request->get('family_id')){
               $repository=$this->getDoctrine()->getRepository('AppBundle:Family');
               $family = $repository->findOneById($this->get('request')->request->get('family_id'));
               if(!$family) throw $this->createNotFoundException('Pozwolenie nie istnieje');
               $object->setFamily($family);
               
               if(!$this->getUser()->haveFamilyPermission($object->getFamily(),'admin')) throw $this->createAccessDeniedException('Nie masz dostępu do tej strony.');
            }
            else{
              throw $this->createNotFoundException('Pozwolenie nie istnieje');   
            }

            if($this->get('request')->request->get('email')){
               $repository=$this->getDoctrine()->getRepository('AppBundle:User');
               $user = $repository->findOneBy(array( 'email' => $this->get('request')->request->get('email') ) );
               if(!$user) {
                    $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Użytkownik o podanym adresie email nie ma konta w Epado. Żeby dodać uprawnienia musisz podać adres osoby zarejestrowanej w Epado.'));
                    if($page) return $this->redirectToRoute('page_form',array('id'=>$page->getId())); 
                    if($family) return $this->redirectToRoute('family_form',array('id'=>$family->getId()));   
               }
              
                if($page && $user->havePagePermission($page)) {
                   $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Użytkownik o podanym adresie email ma już nadane uprawnienia, możesz je zmienić.'));
                   
                   return $this->redirectToRoute('page_form',array('id'=>$page->getId()));
                }    
                if($family && $user->haveFamilyPermission($family)){
                   $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Użytkownik o podanym adresie email ma już nadane uprawnienia, możesz je zmienić.'));
                     
                   return $this->redirectToRoute('family_form',array('id'=>$family->getId()));
                }
               
               $object->setUser($user);
            } else throw $this->createNotFoundException('Pozwolenie nie istnieje');   
            
            $object->setCreator($this->getUser());
            

        }
            
        $validation_group='profile';
        $form=$this->createForm(new PageCredentialsType(), $object, array('validation_groups'=>array($validation_group),'family'=>$family, 'page'=>$page , 'cascade_validation' => true) );

        $form->handleRequest($this->getRequest());
            

        if ($form->isSubmitted()) {
            if($form->isValid()) {
                
                
                $em->persist($object);
                $em->flush();
 
                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Uprawnienia zostały zapisane prawidłowo.'));
                if($page) return $this->redirectToRoute('page_form',array('id'=>$page->getId())); 
                if($family) return $this->redirectToRoute('family_form',array('id'=>$family->getId())); 
            } 
        }
        
        return array('form' => $form->createView(), 'object'=>$object);
    }
    
    
    
    
    
    /**
     * @Route("/{_locale}/profile/show", name="profile_show")
     * @Template(engine="tfwig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function showAction(Request $request)
    {
        $id=$this->getUser()->getId();
        if($id){
            $repository=$this->getDoctrine()->getRepository('AppBundle:User');
            $object = $repository->findOneById($id);
            if(!$object) throw $this->createNotFoundException('Profil nie istnieje');
        }else{
            throw $this->createNotFoundException('Profil nie istnieje');
        }
        
        return array('user' => $object);
    }

    /**
     * @Route("/panel_after_login", name="panel_after_login")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function panelAfterLoginAction(Request $request)
    {
        //die($this->container->get('session')->get('prev_locale').' aa');
        
        
        
        $key = '_security.main.target_path'; #where "main" is your firewall name

        //check if the referrer session key has been set 
        if ($this->container->get('session')->has($key)) {
            //set the url based on the link they were trying to access before being authenticated
            $url = $this->container->get('session')->get($key);
            //remove the session key
            $this->container->get('session')->remove($key);
            
            return new RedirectResponse($url); 
        }
        //if the referrer key was never set, redirect to a default route
        else{
            
            return $this->redirectToRoute('panel',array('_locale'=>$this->container->get('session')->get('prev_locale'))  );
        }

        
        
        
        
    }

    /**
     * @Route("/{_locale}/panel", name="panel")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function panelAction(Request $request)
    {
        $user = $this->getUser();
        //var_dump($user);
        
        if (!is_object($user) || !$user instanceof UserInterface) {  //
           throw new AccessDeniedException('Nie masz dostępu do tej strony.');
        }
        
        $em=$this->getDoctrine()->getManager();
        $query=$em->createQueryBuilder();
        $query
        ->from('AppBundle:Page','p')  
        ->leftJoin('p.translations','pt') 
        ->where("pt.locale = '".$request->getLocale()."' AND p.creator=:user") 
        ->andWhere('p.deleted IS NULL ')    
        ->setParameter('user',$this->getUser())
        ->select('p'); 
        $pages = $query->getQuery()->getResult();
        
//        $this->get('session')->getFlashBag()->add('success', 'Zmiany zostały zapisane.' );
//        $this->get('session')->getFlashBag()->add('warning', 'Zmiany zostały zapisane ale testowanie dlugiego elementu trwa dalej i trzeba bedzie wszystko przetestowac i zobaczyc czy sie nadaje.' );
//        $this->get('session')->getFlashBag()->add('error', 'Zmiany zostały zapisane.' );
//        $this->get('session')->getFlashBag()->add('notice', 'Zmiany zostały zapisane.' );
         

        return array('pages'=>$pages);
    }
    
    

    /**
     * @Route("/{_locale}/profile/address/{id}", name="profile_address", defaults={"id" = null})
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function addressAction(Request $request,$id)
    {

        if($id){
            if(!in_array($this->getUser()->getType(),array('admin','worker','trader') ) and $id!=$this->getUser()->getId()) throw $this->createNotFoundException(); 

            $repository=$this->getDoctrine()->getRepository('AppBundle:User');
            $user = $repository->findOneById($id);
            if(!$user) throw $this->createNotFoundException('Osoba nie istnieje'); 
     
        }else{
            $user = $this->getUser();
            if (!is_object($user) || !$user instanceof UserInterface) {
                throw new AccessDeniedException('Nie masz dostępu do tej strony.');
            }
        }
        
        
        if($user->getDeliveryAddress()==null){
            $delivery=new Address();
            $delivery->setFirstName($user->getFirstName());
            $delivery->setLastName($user->getLastName());
            $user->setDeliveryAddress($delivery);
            
            $billing=new Address();
            $billing->setFirstName($user->getFirstName());
            $billing->setTaxIdName('NIP');
            $billing->setLastName($user->getLastName());
            $user->setBillingAddress($billing);
        }
            

        $validation_group='default';
        $form=$this->createForm(new UserAddressType(), $user, array('validation_groups'=>array($validation_group),'cascade_validation' => true) );
        $error=false; 
        
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            $object=$user;
            
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
                $em->persist($user);
                $em->flush();
                
                $redirect_after_save=$this->container->get('session')->get('redirect_after_save');
                if($redirect_after_save){
                    $this->container->get('session')->set('redirect_after_save',null);
                    return $this->redirect($redirect_after_save);
                }
                
                if($id) return $this->refresh( array('id'=>$user->getId()), array('?*') );
                else return $this->refresh( array(), array('?*') );
            }else {
                $error=true;
                $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('W formularzu wystąpiły błędy.') ); 
            }    
        }
      
        return array('form' => $form->createView(), 'formuser'=>$user, 'error'=>$error);
    }
    
    
    
    
    

    /**
     * @Route("/{_locale}/profile/edit", name="profile_edit")
     * @Template(engine="twig")
     * @Security("has_role('ROLE_ADMIN')") 
     */
    public function editAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('Nie masz dostępu do tej strony.');
        }


        $validation_group='profile';
        $form=$this->createForm(new UserType(), $user, array('validation_groups'=>array($validation_group),'cascade_validation' => true) );
           
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
            if($user->getPhone()!=''){ 
                $matches=preg_match("/^[+][0-9]{1,4}[.][0-9]{5,20}$/", $user->getPhone());
                if(!$matches){
                    $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Podałeś zły nr telefonu'));  
                    $form->get('phone')->addError($error);   
                }
            }

            $data=$this->get('request')->request->get('user');
            if($data['new_password']){

                //$user_manager = $this->get('fos_user.user_manager');
                $factory = $this->get('security.encoder_factory');   

                //$user = $user_manager->loadUserByUsername($user->getEmail());
                $encoder = $factory->getEncoder($user);

                $bool = ($encoder->isPasswordValid($user->getPassword(),$data['old_password'],$user->getSalt())) ? true : false;

                if(!$bool){
                  $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Podałeś nieprawidłowe hasło.'));  
                  $form->get('old_password')->addError($error);     
                }
                else
                if($data['new_password']==$data['new_password_confirm']){
                    $userManager = $this->container->get('fos_user.user_manager');
                    $user->setPlainPassword($data['new_password']);
                    $userManager->updatePassword($user);  

                    //$em->persist($user);
                    //$em->flush();

                    $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Hasło zostało zmienione.') );

                }else
                {
                    $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Potwierdzenie nie zgadza sie z wpisanym hasłem'));  
                    $form->get('new_password')->addError($error);   
                    
                }

            }
            
            
            if($form->isValid()) {
                
                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Zmiany zostały zapisane.') );

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
 
                return $this->refresh( array('id'=>$user->getId()), array('?*') );
            } 
        }
        
        return array('form' => $form->createView());
    }
    
    
    
    
    
    /**
     * @Route("/{_locale}/reset", name="reset")
     * @Template(engine="twig")
     */
    public function resetAction(Request $request)
    {
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            if($request->getLocale()==$this->container->getParameter('default_locale'))
            return $this->redirectToRoute('homepage');
            else 
            return $this->redirectToRoute('homepage_locale');
        }
        
        
        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $password_confirm = $request->request->get('password_confirm');
        $token = $request->query->get('token');


        if($username){
            /** @var $user UserInterface */
            $user = $this->get('fos_user.user_manager')->findUserByUsernameOrEmail($username);

            if (null === $user) {
                return array('info'=>'Nieprawidłowy adres email.');
            }

            //if ($user->isPasswordRequestNonExpired($this->container->getParameter('fos_user.resetting.token_ttl'))) {
            //    return array('info'=>'Prośba o zmiane zapomnianego hasła została już wysłana.');
            //}

            //if (null === $user->getConfirmationToken()) {
                $tokenGenerator = $this->get('fos_user.util.token_generator');
                $token=$tokenGenerator->generateToken();
                $user->setConfirmationToken($token);
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            //}else return array('info'=>'Prośba o zmiane zapomnianego hasła została już wysłana.');
       
            $this->sendNotification(3, array(
            '{{link}}'=>$this->getUrlProtocol($this->generateUrl($request->get('_route'),array('token'=>$token),true))
            ), $user);
            
            //$this->sendMail('Prośba o zmiane hasła w serwisie Epado','aby zmienić hasło w serwisie Epado kliknij w ten link <a href="'.$this->getRequest()->getHost().''.$this->generateUrl($request->get('_route'),array('token'=>$token)).'">Zmiana hasła</a>',$user->getEmail());

            $user->setPasswordRequestedAt(new \DateTime());
            $this->get('fos_user.user_manager')->updateUser($user);

            return array('info'=>$this->get('translator')->trans('Wysłaliśmy do Ciebie maila z linkiem do zmiany hasła.'));
        
        }elseif($token){
           
            $user = $this->get('fos_user.user_manager')->findUserByConfirmationToken($token);

            if (null === $user) {
                return array('info'=>$this->get('translator')->trans('Podałeś nieprawidłowy adres zmiany hasła.'));
            }

            if($password!=NULL && $password_confirm!=NULL){
              
                if($password==$password_confirm){
                    $user->setConfirmationToken(null);
                    $user->setPasswordRequestedAt(null);
                    $user->setPlainPassword($password);
                    $this->get('fos_user.user_manager')->updatePassword($user);   
                    
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();
                    
                    $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Hasło zostało zmienione możesz teraz zalogować się na swoje konto.'));
                    
                    return $this->redirectToRoute('login');
                }else return array('do'=>'password','error'=>$this->get('translator')->trans('Podano nieprawidłowe hasło lub błędnie je powtórzono.'));    
            }
            if($password!=NULL || $password_confirm!=NULL) return array('do'=>'password','error'=>$this->get('translator')->trans('Wypełnij wszystkie pola.')); 
            
            return array('do'=>'password');
            
        }else{

            return array('do'=>'username');
        }
        
    }
    
    public function randomString($length){
        $pattern='123456789qwertyuipasdfghkzxcvbnmQWERTYUPASDFGHJKLZXCVBNM';
        $key='';
        for($i=0; $i<$length; $i++){
            $key.=$pattern{rand(0,strlen($pattern)-1)};
        }
        return $key;
    }
    
    /**
     * @Route("/{_locale}/facebook", name="facebook")
     * @Template(engine="twig")
     */
    public function facebookAction(Request $request)
    {
        $fb=$this->getFacebookSdk();

        //var_dump($_SESSION);
        //die('a');
        $redirect_uri=$this->getUrlProtocol($this->generateUrl('facebook', [], true));
        
        //$redirect_uri=str_replace('http:','https:',$redirect_uri);
        //$redirect_uri=str_replace('app_dev.php/','',$redirect_uri);
        //die($redirect_uri);
        
        
        $helper = $fb->getRedirectLoginHelper();
        try {
          $accessToken = $helper->getAccessToken($redirect_uri);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          //echo 'Graph returned an error: ' . $e->getMessage();
          throw $this->createNotFoundException('Logowanie nie powiodło się');  
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          //echo 'Facebook SDK returned an error: ' . $e->getMessage();
          throw $this->createNotFoundException('Logowanie nie powiodło się');
          exit;
        }
  
        if (isset($accessToken)) {
           $fb->setDefaultAccessToken($accessToken);

           /*
           $response = $fb->get('/me/permissions');
           $data=$response->getDecodedBody();

           $new_scope=array();
           if(isset($data['data'])) foreach($data['data'] as $perm){
               
               if(isset($perm['permission']) && isset($perm['status']) && $perm['status']=='declined'){
                   $new_scope[]=$perm['permission'];
               }
           }

           if(!empty($new_scope)){
                $scope=implode(',',$new_scope);
                $add_params=array('auth_type'=>'rerequest');
                $url=$this->getFacebookUrl($add_params);
                
                //die($url);
                return new RedirectResponse($url);
           }
           */
           
           
            try {
              $response = $fb->get('/me?locale=pl_PL&fields=name,email,picture,id,first_name,last_name');
              //$userNode = $response->getGraphUser();
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
              // When Graph returns an error
              //echo 'Graph returned an error: ' . $e->getMessage();
              throw $this->createNotFoundException('Logowanie nie powiodło się');  
              exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
              // When validation fails or other local issues
              //echo 'Facebook SDK returned an error: ' . $e->getMessage();
              throw $this->createNotFoundException('Logowanie nie powiodło się');  
              exit;
            }
            
            $data=$response->getDecodedBody();
            
            $first_name=null;
            $last_name=null;
            $facebook_id=null;
            $email=null;
            
            
            if(isset($data['first_name'])) $first_name=$data['first_name'];
            if(isset($data['last_name'])) $last_name=$data['last_name'];
            if(isset($data['id'])) $facebook_id=$data['id'];
            if(isset($data['email'])) $email=$data['email'];
            
            $image="https://graph.facebook.com/$facebook_id/picture?type=large";
            
            if($email && $first_name && $last_name && $facebook_id){
                
                $em = $this->getDoctrine()->getManager();
                $repository=$this->getDoctrine()->getRepository('AppBundle:User');
                $user = $repository->findOneBy(array('username'=>$email));
                if($user) {
                    if(!$user->getFacebookId())
                    $user->setFacebookId($facebook_id);
                    
                    $em->persist($user);
                    $em->flush();

                    $token = new UsernamePasswordToken($user, null, "main", $user->getRoles());
                    $this->get("security.context")->setToken($token); //now the user is logged in

                    //now dispatch the login event
                    $request = $this->get("request");
                    $event = new InteractiveLoginEvent($request, $token);
                    $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
                    


                     
                }else{
                    
                    $user=new User();
                    $user->setPassword('init');
                    $user->setRoles(array('ROLE_ADMIN'));
                    $user->setEnabled(true);
                    $user->setType('user');
                    $user->setFirstName($first_name);
                    $user->setLastName($last_name);
                    $user->setEmail($email);
                    $user->setLocale($request->getLocale());
                    $user->setNotificationMessage(true);
                    $user->setNotificationPost(true);
                    
                    
                    if($image){
                        
                            $filename = sha1(uniqid(mt_rand(), true));
                            $targetFile = $user->getUploadRootDir().'/'.$filename.'.jpg';
                            $size=file_put_contents($targetFile, file_get_contents($image));
                            
                            if($size)
                            {
                                $user->setPath($filename.'.jpg');
                            }
                    }
                    
                    $userManager = $this->container->get('fos_user.user_manager');
                    $password=$this->randomString(8);
                    $user->setPlainPassword($password);
                    $userManager->updatePassword($user);  
                    
                    $em->persist($user);
                    $em->flush();
                    
                    $this->sendNotification(1, array(
                    '{{email}}'=>$user->getEmail(),
                    '{{password}}'=>$password,
                    ), $user);
                    //$this->sendMail('Potwierdzenie rejestracji w serwisie Epado','dziękujemy za zarejestrowanie się w naszym serwisie. Możesz logować się do Epado przy pomocy swojego konta na facebooku lub przy pomocy poniższych danych: <br><br>Login: '.$email.' <br>Hasło: '.$password,$user->getEmail());

                    
                    $token = new UsernamePasswordToken($user, null, "main", $user->getRoles());
                    $this->get("security.context")->setToken($token); //now the user is logged in

                    //now dispatch the login event
                    $request = $this->get("request");
                    $event = new InteractiveLoginEvent($request, $token);
                    $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
                    
                 
                }   
                
                
                $key = '_security.main.target_path'; #where "main" is your firewall name

                //check if the referrer session key has been set 
                if ($this->container->get('session')->has($key)) {
                    //set the url based on the link they were trying to access before being authenticated
                    $url = $this->container->get('session')->get($key);
                    //remove the session key
                    $this->container->get('session')->remove($key);
                }
                //if the referrer key was never set, redirect to a default route
                else{
                    $url = $this->container->get('router')->generate('panel');
                }

                
                return new RedirectResponse($url); 
                

                die();
            }else{
                //$add_params=array('auth_type'=>'rerequest');
                //$url=$this->getFacebookUrl($add_params);
                //return new RedirectResponse($url);
                
                $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans('Podczas logowania wystąpił błąd, aplikacja nie otrzymała dostępu do niektórych informacji. Wymagany jest dostęp do maila, imienia i nazwiska osoby korzystającej z serwisu. Dane dostępne dla aplikacji Epado na facebooku można zmienić w zakładce Facebook -> Ustawienia -> Aplikacje.').'<br><br>'.$this->get('translator')->trans('Istnieje również możliwość, że konto na facebooku nie ma potwierdzonego adresu email (link aktywujący adres email został wysłany przez facebooka przy zakładaniu konta), w takiej sytuacji logowanie przez facebooka nie jest dostępne, prosimy o zweryfikowanie maila w facebooku lub dodanie tam nowego adresu email. Więcej informacji na ten temat znajdą Państwo na odpowiedniej stronie pomocy Facebooka.').'<br><br>'.$this->get('translator')->trans('Jeżeli nie jest to możliwe proponujemy skorzystać z tradycyjnego formularza rejestracji w Epado.') );
                return new RedirectResponse($this->container->get('router')->generate('homepage').'#notifications'); 
            }

            //echo " $first_name $last_name <br> $facebook_id <br> $email <br> <img src=\"$image\"> ";
            //die();
        }
        
        throw $this->createNotFoundException('Logowanie nie powiodło się');
    }
    
    /**
     * @Route("/{_locale}/login", name="login")
     * @Template(engine="twig")
     */
    public function loginAction(Request $request)
    {
        //$this->redirectToRoute('panel',array('_locale'=>$this->container->get('session')->get('prev_locale'))  );
        if($this->container->get('session')->has('prev_locale')){
            //$request->setLocale($this->container->get('session')->get('prev_locale'));
            //die($this->container->get('session')->get('prev_locale'));
        }
            
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('panel');
        }
        
        /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = null;
        }

        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        $csrfToken = $this->has('form.csrf_provider')
            ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        $facebook_url = $this->getFacebookUrl();
        
        return array(
            'last_username' => $lastUsername,
            'error'         => $error,        
            'csrf_token' => $csrfToken,
            'facebook_url' => $facebook_url,
        );
    }


    
    

    /**
     * @Route("/{_locale}/register", name="register")
     * @Template(engine="twig")
     */
    public function registerAction(Request $request)
    {
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('panel');
        }   
        
        $token = $request->query->get('token');
        
        if($token){
            $repository=$this->getDoctrine()->getRepository('AppBundle:User');
            $object = $repository->findOneBy(array('registration_token'=>$token));
            if(!$object)  throw $this->createNotFoundException('Użytkownik nie istnieje'); 
            
            $object->setEnabled(true); 
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($object);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Konto zostało aktywowane możesz się teraz zalogować.') );
                
            return $this->redirectToRoute('login');
        }
        

        
        /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = null;
        }

        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }

        

        $object=new User();
        $validation_group='register';
        $object->setPassword('init');
        $object->setRoles(array('ROLE_ADMIN'));
        $object->setEnabled(false);//agc false in futer 
        $object->setType('user'); 
        $object->setLocale($request->getLocale());
        $object->setNotificationMessage(true);
        $object->setNotificationPost(true);
        
        $form=$this->createForm(new UserType(), $object, array('validation_groups'=>array($validation_group),'cascade_validation' => true) );
                       
        $form->handleRequest($this->getRequest());
        if ($form->isSubmitted()) {
            
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
                }

            }
            
            
            if($data['new_parent_partner_code']){
                $em = $this->getDoctrine()->getManager();
                
                $data['new_parent_partner_code']=strtoupper($data['new_parent_partner_code']);
                $query=$em->createQueryBuilder();
                $query
                ->from('AppBundle:User','u')->select('u')
                ->andWhere('u.type=:partner')->setParameter('partner','partner')
                ->andWhere('u.parent_partner_code=:code')->setParameter('code',$data['new_parent_partner_code']);
                $parent_partner=$query->getQuery()->getOneOrNullResult();
                
                if(!$parent_partner){
                    $error = new \Symfony\Component\Form\FormError($this->get('translator')->trans('Nie znaleziono takiego kodu polecającego upewnij się że został podany prawidłowy kod.'));  
                    $form->get('new_parent_partner_code')->addError($error);
                }else{
                    $object->setParentPartner($parent_partner);
                }
            }
            
            
            if($form->isValid()) {
                

                
                $em = $this->getDoctrine()->getManager();
                $em->persist($object);
                $em->flush();
                
                $data=$this->get('request')->request->get('user');
                
                if($data['new_password']){
                    //$userManager = $this->container->get('fos_user.user_manager');
                    //$object->setPlainPassword($data['new_password']);
                    //$userManager->updatePassword($object);  
                    //$this->get('session')->getFlashBag()->add('success', 'Hasło zostało zmienione.' );
                }
                

                $tokenGenerator = $this->get('fos_user.util.token_generator');
                $token=$tokenGenerator->generateToken();
                $object->setRegistrationToken($token);
                
                
                $em->persist($object);
                $em->flush();
                
                
                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans('Konto zostało dodane. Aby je aktywować kliknij w link wysłany na podanego w formularzu maila.') );
                
                $this->sendNotification(2, array(
                '{{link}}'=>$this->getUrlProtocol($this->generateUrl($request->get('_route'),array('token'=>$token), true)),
                ), $object);
                //$this->sendMail('Potwierdzenie rejestracji w serwisie Epado','aby aktywować swoje konto w serwisie Epado kliknij w ten link <a href="'.$this->generateUrl($request->get('_route'),array('token'=>$token), true).'">Potwierdzenie</a>',$object->getEmail());
            
                return $this->redirectToRoute('login');
            } 
        }
        
        $facebook_url = $this->getFacebookUrl();
        
        return array('object'=>$object, 'form'=>$form->createView(), 'facebook_url' => $facebook_url);
    }
    
    
    
    
}
