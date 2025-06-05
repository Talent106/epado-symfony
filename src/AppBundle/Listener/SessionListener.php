<?php

namespace AppBundle\Listener;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use AppBundle\Controller\HomeController;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;

class SessionListener {

    private $container;
    private $resolver;
    private $templating;
    
    public function __construct($container,ControllerResolverInterface $resolver, $templating)
    {
        $this->resolver = $resolver;
        $this->container = $container;
        $this->templating = $templating;
        
    }
    
    public function onController(FilterControllerEvent $event)
    {
        //$fakeRequest = $event->getRequest()->duplicate(null, null, array('_controller' => 'AppBundle:Home:notFound'));
        //$replacementController = $this->resolver->getController($fakeRequest);

        //$event->setController($replacementController);   
    }

    public function onRequest(\Symfony\Component\HttpKernel\Event\GetResponseEvent $event) {
        $session = $this->container->get('session'); 
        $kernel = $this->container->get('kernel');
         
        $request = $event->getRequest();

        $locales_allowed=$this->container->getParameter('locales');
        
        try{
            if(!in_array($request->getLocale(),$locales_allowed)) 
            {    
                $request->setLocale($this->container->getParameter('default_locale'));
                if($session->get('prev_locale')){ $request->setLocale($session->get('prev_locale')); }
                
                throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('');
            }    
        }catch(\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e){
            
            $code=404;    
            $app=new \Symfony\Bundle\FrameworkBundle\Templating\GlobalVariables($this->container);
            $twig = $this->container->get('twig');

            $response = new \Symfony\Component\HttpFoundation\Response();

            $response->setContent($this->templating->render('TwigBundle:Exception:error.html.twig', array(
                 'status_code' => $code,
                 'status_text' => $e->getMessage(),
                 'exception' => $e,
                 //'app'=>$app,
                 //'logger' => null,
                 //'currentContent' => 'Test',
                 )));
            $response->setStatusCode($code);
            $response->headers->set('Content-Type', 'text/html');

            $event->setResponse($response);  
        }
        
        //dopisek
        //$session->set('currency','PLN');
        
        //tylko przy pierwszym wejściu kiedy nie ma jeszcze ustanowionej waluty
        if(!$session->get('currency')){
            $currencies=$this->container->getParameter('default_currencies');
            $session->set('currency',$currencies[$request->getLocale()]); 
            //dopisek
            //$session->set('currency','PLN'); 
        }
        
        //dopisek - zmiana zawsze w zależności od języka zmieniaj walute
        $currencies=$this->container->getParameter('default_currencies');
        $session->set('currency',$currencies[$request->getLocale()]);   
        
       //ręczna zmiana waluty
        if($request->query->get('currency')){
            //$currencies=$this->container->getParameter('currencies');
            //if(in_array($request->query->get('currency'),$currencies)){
            //    $session->set('currency',$request->query->get('currency')); 
            //}
            //dopisek
            //$session->set('currency','PLN');
        }
   
        if(in_array($request->getLocale(),$locales_allowed) && $request->get('_route')!='panel_after_login' ) {
            $session->set('prev_locale',$request->getLocale());
            //die($session->get('prev_locale').'bb');
        }else{
            //die($session->get('prev_locale').'bb');
        }
        
        $visit=$session->get('visit');
        if($visit==1) $session->set('is_next_visit', '1');
        else $session->set('visit',1); 

        $session->save();
    }

}