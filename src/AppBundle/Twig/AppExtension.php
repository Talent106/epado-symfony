<?php
namespace AppBundle\Twig;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class AppExtension extends \Twig_Extension
{
    private $requestStack;
    private $router;
    private $session;
    private $request;
    private $translator;
    protected $tokenStorage;
    
    public function __construct(RequestStack $requestStack, Router $router, $session, $tokenStorage, $translator)
    {
        $this->requestStack = $requestStack;
        $this->router = $router;
        $this->session = $session;
        $this->tokenStorage = $tokenStorage;
        $this->translator= $translator;
    }
    
    /*
     * Listen to the 'kernel.request' event to get the main request, this has several reasons:
     *  - The request can not be injected directly into a Twig extension, this causes a ScopeWideningInjectionException
     *  - Retrieving the request inside of the 'localize_route' method might yield us an internal request
     *  - Requesting the request from the container in the constructor breaks the CLI environment (e.g. cache warming)
     */
    public function onKernelRequest(GetResponseEvent $event) {
            if ($event->getRequestType() === HttpKernel::MASTER_REQUEST) {
                    $this->request = $event->getRequest();
            }
    }
    
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('strpad', array($this, 'strpadFilter')), 
            new \Twig_SimpleFilter('payment', array($this, 'paymentFilter')),
            new \Twig_SimpleFilter('price', array($this, 'priceFilter')),
            new \Twig_SimpleFilter('sayprice', array($this, 'sayPrice')), 
            new \Twig_SimpleFilter('pricecheck', array($this, 'priceCheckFilter')), 
            new \Twig_SimpleFilter('percent', array($this, 'percentFilter')), 
            new \Twig_SimpleFilter('stock', array($this, 'stockFilter')), 
            new \Twig_SimpleFilter('priceornot', array($this, 'priceornotFilter')),  
            new \Twig_SimpleFilter('ornot', array($this, 'ornotFilter')), 
            new \Twig_SimpleFilter('dateornot', array($this, 'dateornotFilter')), 
            new \Twig_SimpleFilter('stars', array($this, 'starsFilter')), 
            new \Twig_SimpleFilter('mydate', array($this, 'dateFilter')),  
            new \Twig_SimpleFilter('mydatetime', array($this, 'dateTimeFilter')),  
            new \Twig_SimpleFilter('datemod', array($this, 'datemodFilter')),  
            new \Twig_SimpleFilter('production', array($this, 'productionFilter')), 
            new \Twig_SimpleFilter('json_decode', array($this, 'jsonDecodeFilter')),
        );
    }
    
    public function getFunctions()
    {
        return array(
             new \Twig_SimpleFunction('vardump',  array($this, 'vardump')),
             new \Twig_SimpleFunction('extend',  array($this, 'extendUrl')),
             new \Twig_SimpleFunction('lived',  array($this, 'lived')),
             new \Twig_SimpleFunction('path_page',  array($this, 'pageUrl')),
             new \Twig_SimpleFunction('path_homepage',  array($this, 'homepageUrl')),
             new \Twig_SimpleFunction('currency',  array($this, 'getCurrency')),
             new \Twig_SimpleFunction('locale',  array($this, 'getLocale')),
             new \Twig_SimpleFunction('now',  array($this, 'now')),
             new \Twig_SimpleFunction('nowObject',  array($this, 'nowObject')),
             new \Twig_SimpleFunction('pagination',  array($this, 'drawPagination')),
             new \Twig_SimpleFunction('filters',  array($this, 'drawFilters')),
             new \Twig_SimpleFunction('tabUser',  array($this, 'tabUser')),
             new \Twig_SimpleFunction('address',  array($this, 'address')),
             new \Twig_SimpleFunction('ip',  array($this, 'getIpAddress')),
        );
    }
    
    public function strpadFilter($a,$b,$c) {
              return str_pad($a,$b,$c);
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
    
    public function lived($begin, $end) {
        if($begin && $end){
            $diff = $begin->diff($end);
           
            return $diff->y+1;
        }else{
            return '';
        }
    } 
    
    public function pageUrl($parameter=null) {
        if($parameter){
        if($this->request->getLocale()=='pl'){
            return $this->router->generate('page',array('code'=>$parameter));
        }else{
            return $this->router->generate('page_locale',array('code'=>$parameter));
        }}else{
            return '#no';
        }
    }
    
    public function homepageUrl($parameter=null) {
        if($this->request->getLocale()=='pl'){
            $this->router->generate('homepage');
        }else{
            $this->router->generate('homepage_locale');
        }
    }
    
    public function tabUser($user) {
        if(is_object($user)){
            $zmienna='<div class="avatar tip" title="'.$user->getFirstName().' '.$user->getLastName().'" style="background-image:url(\'/'.$user->getAvatar().'\');"></div>';


            if($this->tokenStorage){
                $token=$this->tokenStorage->getToken(); 
                //var_dump($token->getUser());

                if($token->getUser() && is_object($token->getUser())){
                    

                    if($token->getUser()->getId()!=$user->getId()) 
                    {    
                        $message=$this->router->generate('message_form',array('recipient_id'=> $user->getId()));
                        $edit=$this->router->generate('user_form',array('id'=> $user->getId()));

                        $zmienna='<div class="avatar tip" title="'.$user->getFirstName().' '.$user->getLastName().'" style="background-image:url(\'/'.$user->getAvatar().'\');"><a href="'.$message.'" class="mask full"><i class="fa fa-envelope"></i></a></div>';
                    
                        if($token->getUser()->getType()=='admin'){
                        $zmienna='<div class="avatar tip" title="'.$user->getFirstName().' '.$user->getLastName().'" style="background-image:url(\'/'.$user->getAvatar().'\');"><a href="'.$message.'" class="mask half"><i class="fa fa-envelope"></i></a><a href="'.$edit.'" class="mask half"><i class="fa fa-pencil"></i></a></div>';
                        }
                    }
                    

                    
                }
            }



            return $zmienna;
        }else return 'error';
    }
    
    

    public function address($address) {
        $temp='';
        if(is_object($address)){

            if($address->getCompany()) $temp.=''.$address->getCompany().'<br>';
            if($address->getTaxId()) $temp.=$address->getInvoiceType($address->getTaxIdName()).' '.$address->getTaxId().'<br>'; 
            if($address->getKrs()) $temp.='KRS: '.$address->getKrs().'<br>'; 
            if($address->getRegon()) $temp.='REGON: '.$address->getRegon().'<br>'; 
            if($address->getFirstName() || $address->getLastName()) $temp.=''.$address->getFirstName().' '.$address->getLastName().'<br>'; 
            $temp.=''.$address->getCountry()->getName().', '; 
            if($address->getCity()) $temp.=''.$address->getCity().', '.$address->getPostalCode().'<br>';
            
            $temp.=''.$address->getAddress().''; 
            
        }else{
            $temp=$this->translator->trans('Brak danych');
        }
        
        return $temp;
    }
    
    
    public function vardump($my_var) {
        var_dump($my_var);
        return var_export($my_var, true);
    }
    
    public function paymentFilter($val) {
        if($val=='COMPLETED') return $this->translator->trans('Ukończona');
        if($val=='PENDING') return $this->translator->trans('Przetwarzana');
        if($val=='CANCELED') return $this->translator->trans('Anluowana');
        if($val=='REJECTED') return $this->translator->trans('Odrzucona');
        if($val=='WAITING_FOR_CONFIRMATION') return $this->translator->trans('Przetwarzana');
        if($val=='') return $this->translator->trans('Nierozpoczęta');
        
        return $this->translator->trans('Nieznany');
    }
    
    public function jsonDecodeFilter($val) {
        return json_decode($val);
    }
     
    
    
    public function getCurrency() {
        return $this->session->get('currency');
    }
    
    public function getLocale() {
        return $this->request->getLocale();
    }
    
    


    public function sayNumber($number, $imploder = ' ') {
            $number = (int)$number;

            if ($number == 0) {
                    return 'zero';
            }

            $levels = array(
                    '0' => array('', 'jeden', 'dwa', 'trzy', 'cztery', 'pięć', 'sześć', 'siedem', 'osiem', 'dziewięć'),
                    '0a' => array('', 'jedenaście', 'dwanaście', 'trzynaście', 'czternaście', 'piętnaście', 'szesnaście', 'siedemnaście', 'osiemnaście', 'dziewiętnaście'),
                    '1' => array('', 'dziesięć', 'dwadzieścia', 'trzydzieści', 'czterdzieści', 'pięćdziesiąt', 'sześćdziesiąt', 'siedemdziesiąt', 'osiemdziesiąt', 'dziewięćdziesiąt'),
                    '2' => array('', 'sto', 'dwieście', 'trzysta', 'czterysta', 'pięćset', 'sześćset', 'siedemset', 'osiemset', 'dziewięćset'),
                    '3' => array('', 'jeden tysiąc', 'dwa tysiące', 'trzy tysiące', 'cztery tysiące', 'pięć tysięcy', 'sześć tysięcy', 'siedem tysięcy', 'osiem tysięcy', 'dziewięć tysięcy'),
                    '3a' => array('', 'jedenaście tysięcy', 'dwanaście tysięcy', 'trzynaście tysięcy', 'czternaście tysięcy', 'piętnaście tysięcy', 'szesnaście tysięcy', 'siedemnaście tysięcy', 'osiemnaście tysięcy', 'dziewiętnaście tysięcy'),
                    '4' => array('', 'dziesięć tysięcy', 'dwadzieścia tysięcy', 'trzydzieści tysięcy', 'czterdzieści tysięcy', 'pięćdziesiąt tysięcy', 'sześćdziesiąt tysięcy', 'siedemdziesiąt tysięcy', 'osiemdziesiąt tysięcy', 'dziewięćdziesiąt tysięcy'),
                    '5' => array('', 'sto tysięcy', 'dwieście tysięcy', 'trzysta tysięcy', 'czterysta tysięcy', 'pięćset tysięcy', 'sześćset tysięcy', 'siedemset tysięcy', 'osiemset tysięcy', 'dziewięćset tysięcy'),
                    '6' => array('', 'jeden milion', 'dwa miliony', 'trzy miliony', 'cztery miliony', 'pięć milionów', 'sześć milionów', 'siedem milionów', 'osiem milionów', 'dziewięć milionów')
            );

            $return = array();
            $skip_next_level = FALSE;

            $number = (string)$number;

            // Pętla przypisująca słowne odpowiedniki cyfrom na określonych miejscach.
            for ($i=0, $strlen=strlen($number); $i<$strlen; $i++) {
                    if ($skip_next_level === TRUE) {
                            $return[] = '';
                            $skip_next_level = FALSE;

                            continue;
                    }

                    $l = $strlen - $i - 1;
                    $n = (int)$number[$i];

                    if ($n == 1 && isset($levels[($l - 1).'a'])) {
                            $next_number = (int)$number[$i + 1];

                            if ($next_number != 0) {
                                    $l = ($l - 1).'a';
                                    $n = (int)$number[$i + 1];
                            }

                            $return[] = $levels[$l][(string)$n];

                            $skip_next_level = TRUE;
                    }
                    else {
                            $return[] = $levels[$l][(string)$n];
                    }
            }
            //

            // Usunięcie powtórzeń typu "sto tysięcy jedenaście tysięcy" do postaci "sto jedenaście tysięcy".
            $c = 0;
            $remove_after_space = FALSE;

            for ($i=$strlen-1; $i>=0; $i--) {
                    $strpos = strpos($return[$i], ' ');

                    if ($strpos > 0) {
                            if ($remove_after_space === TRUE) {
                                    $return[$i] = substr($return[$i], 0, $strpos);
                            }
                            else {
                                    $remove_after_space = TRUE;
                            }
                    }

                    if ($c == 2) {
                            $remove_after_space = FALSE;
                            $c = 0;
                    }
                    else {
                            $c++;
                    }
            }
            //

            return implode($imploder, $return);
    }

    function sayPrice($kwota){
        //$user=User::getInstance(); 

        //if($user->getCulture()!='pl_PL') return '';

        $order   =',';
        $replace ='.';

        $kwota = str_replace($order, $replace, $kwota);

        $kwota=round($kwota , 2);

        $order   ='.';
        $replace =',';

        $kwota = str_replace($order, $replace, $kwota);


        $zl = array("złotych", "złoty", "złote");
        $gr = array("groszy", "grosz", "grosze");
        $kwotaArr = explode( ',', $kwota );

        if(strlen($kwotaArr[1])==1) { $kwotaArr[1].='0'; $kwota.='0'; }

        $ostZl = substr($kwotaArr[0], -1, 1);
            switch($ostZl){
              case "0":
                $zlote =$zl[0];
              break;

              case "1":
                $ost2Zl = substr($kwotaArr[0], -2, 2);


                    if($kwotaArr[0] == "1"){
                      $zlote = $zl[1];
                    }
                    elseif($ost2Zl == "01"){
                      $zlote = $zl[0];
                    }
                    else{
                      $zlote = $zl[0];
                    }
              break;

              case "2":
                $ost2Zl = substr($kwotaArr[0], -2, 2);
                    if($ost2Zl == "12"){
                      $zlote = $zl[0];
                    }
                    else{
                      $zlote = $zl[2];
                    }
              break;

              case "3":
                $ost2Zl = substr($kwotaArr[0], -2, 2);
                    if($ost2Zl == "13"){
                      $zlote = $zl[0];
                    }
                    else{
                      $zlote = $zl[2];
                    }
              break;

              case "4":
                $ost2Zl = substr($kwotaArr[0], -2, 2);
                    if($ost2Zl == "14"){
                      $zlote = $zl[0];
                    }
                    else{
                      $zlote = $zl[2];
                    }
              break;

              case "5":
                $zlote = $zl[0];
              break;

              case "6":
                $zlote = $zl[0];
              break;

              case "7":
                $zlote = $zl[0];
              break;

              case "8":
                $zlote = $zl[0];
              break;

              case "9":
                $zlote = $zl[0];
              break;
            }

          ############### PONIZEJ ||VVV|| GROSZE


        $ostGr = substr($kwotaArr[1], -1, 1);
            switch($ostGr){
              case "0":
                $grosze =$gr[0];
              break;

              case "1":
                $ost2Gr = substr($kwotaArr[1], -2, 2);


                    if($kwotaArr[0] == "1"){
                      $grosze = $gr[1];
                    }
                    elseif($ost2Gr == "01"){
                      $grosze = $gr[1];
                    }
                    else{
                      $grosze = $gr[0];
                    }
              break;

              case "2":
                $ost2Gr = substr($kwotaArr[1], -2, 2);
                    if($ost2Gr == "12"){
                      $grosze = $gr[0];
                    }
                    else{
                      $grosze = $gr[2];
                    }
              break;

              case "3":
                $ost2Gr = substr($kwotaArr[1], -2, 2);
                    if($ost2Gr == "13"){
                      $grosze = $gr[0];
                    }
                    else{
                      $grosze = $gr[2];
                    }
              break;

              case "4":
                $ost2Gr = substr($kwotaArr[1], -2, 2);
                    if($ost2Gr == "14"){
                      $grosze = $gr[0];
                    }
                    else{
                      $grosze = $gr[2];
                    }
              break;

              case "5":
                $grosze = $gr[0];
              break;

              case "6":
                $grosze = $gr[0];
              break;

              case "7":
                $grosze = $gr[0];
              break;

              case "8":
                $grosze = $gr[0];
              break;

              case "9":
                $grosze = $gr[0];
              break;
            }

        return( $this->sayNumber( $kwotaArr[0] ) . ' '.$zlote.' i ' . $this->sayNumber( $kwotaArr[1] ) . ' '. $grosze );
    }

    
    public function datemodFilter($date,$format='Y-m-d H:i:s',$mod)
    {
        
        return $date->modify($mod)->format($format);
    }
    

    public function now(){

        return date('Y-m-d');
    }
    

    public function nowObject(){

        return new \DateTime();
    } 
    
    public function extendUrl($query=array()){
        $request = $this->requestStack->getCurrentRequest();
        /*
        var_dump($request->query->all());
        var_dump($request->get('_route_params'));
        var_dump($request->getRequestUri());
        var_dump($request->getUri());
        var_dump($request->getHttpHost());
        var_dump($request->getScriptName());
        var_dump($request->getPathInfo());
        */
        //var_dump($request->get('_route_params'));
        //ob_end_clean();
        //var_dump($request->query->all());
        //ob_end_clean();
        //var_dump($request->query->all()); die();
        if($request->get('_route_params')) 
        {    
            $current_query=$request->get('_route_params')+$request->query->all();
//            ob_end_clean();
            //var_dump($query);
            //var_dump($current_query);
            
            //die('a');
            //echo '<pre>';
            //var_dump($query);
            
            //var_dump($current_query);
            
            //var_dump($query+$current_query);
            //echo '</pre>';
            if(array_key_exists('filters',$query))
            foreach($query as $k=>$v){
                if(is_array($v)){
                   $kk=$k; 
                   $vv=$v;
                   if(!array_key_exists($k,$query))$query[$k]=array();
                   
                   if(array_key_exists($k,$current_query))
                   $query[$k]=$query[$k]+$current_query[$k];
                   //var_dump($query[$k]);
                   foreach($v as $k=>$v){ 
                       //echo $kk.' - '.$k.' out<br>';
                       if($v==null && array_key_exists($k,$current_query[$kk])) unset($query[$kk][$k]);
                       //elseif(array_key_exists($k,$current_query[$kk])) $query[$kk][$k]=$current_query[$kk][$k];  
                   }
                   
                   
                }else{
                if($v==null && array_key_exists($k,$current_query)) {
                    //echo $k.' out<br>';
                    unset($current_query[$k]);
                    
                    
                }
                }
            } 
            
            //echo '</pre>';
//            var_dump($current_query);
//            die();
        //var_dump($query);
        //var_dump($query+$current_query);
        if(array_key_exists('field', $current_query)){
            
            if(!array_key_exists('field', $query)) $query['field']=array();
            foreach($current_query['field'] as $id=>$val){
                if(!array_key_exists($id, $query['field'])) $query['field'][$id]=$val;
            }
        }
        
        
        
        $replace=array('%5B'=>'[','%5D'=>']');
        //die();
        return str_replace(array_keys($replace), array_values($replace), $this->router->generate($request->get('_route'), $query+$current_query));
        }
        else return '/';
        
    }
    

    public function drawFilters($filters, $params=array()){

        $html='<form action="'.$this->extendUrl(array('page'=>1)).'" method="get" class="filters">';
        
        //$html.='<input type="hidden" value="1" name="page">'; 
        
        foreach($params as $id=>$data){
            
            //echo $id.'<br>';
            if(is_array($data))
            {
                foreach($data as $id2=>$data2)
                {
                    $html.='<input type="hidden" value="'.$data2.'" name="'.$id.'['.$id2.']">'; 
                }
            }
            else
            $html.='<input type="hidden" value="'.$data.'" name="'.$id.'">'; 
        }
        
        
        foreach($filters as $id=>$data){
           if($data['type']=='text'){
               $html.='<div class="field">'
                    . '<label for="'.$data['table'].'_'.$data['name'].'">'.$data['label'].'</label>'
                    . '<div class="'.$data['type'].'"><input type="text" value="'.$data['value'].'" name="'.$data['table'].'_'.$data['name'].'"></div>'
                    . '</div>';
           }  
           if($data['type']=='select'){
               if(!isset($data['empty'])) $data['empty']=true;
               $options='';
               if($data['empty']) $options='<option></option>';
               foreach($data['options'] as $i=>$opt){
                   if(isset($opt['id'])){
                        $select='';
                        if($data['value']==$opt['id']) $select=' selected="selected"';
                        $options.='<option value="'.$opt['id'].'" '.$select.'>'.$opt['name'].'</option>';
                   }else{
                        $select='';
                        if($data['value']==$i) $select=' selected="selected"';
                        $options.='<option value="'.$i.'" '.$select.'>'.$opt.'</option>'; 
                   }
               }
               $html.='<div class="field">'
                    . '<label for="'.$data['table'].'_'.$data['name'].'">'.$data['label'].'</label>'
                    . '<div class="'.$data['type'].'"><select name="'.$data['table'].'_'.$data['name'].'">'.$options.'</select></div>'
                    . '</div>'; 
           }
           if($data['type']=='period'){
               $html.='<div class="field period">'
                    . '<label for="'.$data['table'].'_'.$data['name'].'_start">'.$data['label'].'</label>'
                    . '<div class="'.$data['type'].'"><input class="datepicker" type="text" value="'.$data['value']['start'].'" name="'.$data['table'].'_'.$data['name'].'_start"></div>'
                    . '</div>';
               $html.='<div class="field">'
                    . '<label for="'.$data['table'].'_'.$data['name'].'_end">&nbsp;</label>'
                    . '<div class="'.$data['type'].'"><input class="datepicker" type="text" value="'.$data['value']['end'].'" name="'.$data['table'].'_'.$data['name'].'_end"></div>'
                    . '</div>';
           }
        }
        $html.='<div class="buttons"><input type="submit" value="'.$this->translator->trans('Szukaj').'"><button type="submit" name="reset"  value="1">'.$this->translator->trans('Resetuj').'</button></div></form>';
        
        return $html;
    }
    
    public function drawPagination($pager){

        $html='<div class="pagination">';
        
        $range=4;
        
        if($pager['page']-$range>1) { $i=1; $html.='<a href="'.$this->extendUrl(array('page'=>$i)).'" class="button">'.$i.'</a>';  }
        if($pager['page']-$range>2) $html.='<div  class="button active">...</div>'; 
        
        for($i=$pager['page']-$range;$i<=$pager['page']+$range;$i++)
        {
            if($i>0 && $i<=$pager['page_count']){
                if($i==$pager['page']) $html.='<div class="button active">'.$i.'</div>';
                else $html.='<a href="'.$this->extendUrl(array('page'=>$i)).'" class="button">'.$i.'</a>';
            }
        }
        
        if($pager['page']+$range<$pager['page_count']-1) $html.='<div  class="button active">...</div>'; 
        if($pager['page']+$range<$pager['page_count']) { $i=$pager['page_count']; $html.='<a href="'.$this->extendUrl(array('page'=>$i)).'" class="button">'.$i.'</a>';  }
        
        $html.='</div>';
        
        return $html;
    }
    
    public function priceFilter($number, $set_currency = null,$decimals = 2, $decPoint = ',', $thousandsSep = ' ')
    {
        $n = $number;
        $whole = floor($n);      // 1
        $fraction = $n - $whole; // .25
        
        if($fraction==0){
            $decimals=0;
        }
            
            
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        $currency=$this->getCurrency();
        if($set_currency) $currency=$set_currency;
        
        if($currency=='PLN'){
            $price = ''.$price.' zł';
        }
        elseif($currency=='EUR'){
            $price = ''.$price.' €';
        }
        elseif($currency=='USD'){
            $price = '$'.$price.'';  
        }
        elseif($currency=='GBP'){
            $price = '£'.$price.'';  
        }
        else{
            $price = ''.$price.' '.$currency; 
        }

        return $price;
    }
    
    public function priceCheckFilter($number, $set_currency = null, $decimals = 2, $decPoint = ',', $thousandsSep = ' ')
    {
        $price = $this->priceFilter($number, $decimals, $decPoint, $thousandsSep);
        
        $test='green';
        if($number<10) $test='orange';
        if($number<=0) $test='red';
        
        $price = '<span style="color:'.$test.';">'.$price.'</span>';

        return $price;
    }
    
    public function percentFilter($number)
    {
        $number=$number*100;
        return $number.'%';
    }
    
    public function stockFilter($number)
    {
        if($number==null) return '<span style="color:red;">'.$this->translator->trans('Brak').'</span>';
        if($number<30) return '<span style="color:orange;">'.$number.'</span>'; 
        
        return '<span style="color:green;">'.$number.'</span>';
    }
    
    
    public function priceornotFilter($number, $decimals = 2, $decPoint = ',', $thousandsSep = ' ')
    {
        if($number==null) return '<span style="color:red;">'.$this->translator->trans('Brak').'</span>';
            
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        $price = ''.$price.' zł';

        return $price;
    }
    

    public function ornotFilter($text)
    {
        if(!$text) return '<span style="color:red;">'.$this->translator->trans('Brak').'</span>';
        return $text;
    }

    public function productionFilter($url)
    {       
        return str_replace('app_dev.php/','',$url);
    }
    
    
    public function dateornotFilter($date,$format='d.m.Y H:i')
    {
        if(!is_object($date)) return '<span style="color:red;">'.$this->translator->trans('Brak').'</span>';
        else return $date->format($format);
    }
    
    public function starsFilter($rating)
    {
        $class=array();
        for ($i=1;$i<=5;$i++){
            if($i<=$rating) {
                $class[$i]=' chosen';
            } else {
                $class[$i]='';
                
                if($rating<$i && $rating>$i-1)
                if($rating>$i-0.5){
                  $class[$i]=' chosen';  
                }else{
                  $class[$i]=' chosen half';  
                }
                
                
                
            }
            
        }
        $html='<span class="ratingshow"><span class="star'.$class[5].'" data-rating="5"></span><span class="star'.$class[4].'" data-rating="4"></span><span class="star'.$class[3].'" data-rating="3"></span><span class="star'.$class[2].'" data-rating="2"></span><span class="star'.$class[1].'" data-rating="1"></span></span>';
           
        return $html;   
    }
    
    
    public function dateFilter($date,$format='d.m.Y')
    {
        if(!is_object($date)) return null;
        else return $date->format($format);
    }
    
    public function dateTimeFilter($date,$format='d.m.Y H:i')
    {
        if(!is_object($date)) return null;
        else return $date->format($format);
    }

    public function getName()
    {
        return 'app_extension';
    }
}