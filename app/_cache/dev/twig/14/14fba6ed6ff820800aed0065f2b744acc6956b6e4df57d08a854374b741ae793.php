<?php

/* AppBundle:Home:home.html.twig */
class __TwigTemplate_9296ddb41c850c29869bc0e698aeda878ce0164fed518c724785ee5364d80e6b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("home.html.twig", "AppBundle:Home:home.html.twig", 1);
        $this->blocks = array(
            'full_title' => array($this, 'block_full_title'),
            'description' => array($this, 'block_description'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "home.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_full_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Witamy w Epado"), "html", null, true);
    }

    // line 4
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Epado to wyjątkowe miejsce wspomnień o wspaniałych ludziach, których nie powinniśmy zapomnieć."), "html", null, true);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "<div class=\"homepage\">    
    <div class=\"first-content intro\"> 
        <video poster=\"/images/introorg.png\" style=\"background-image:url(/images/introorg.png); background-size:cover;\" preload=\"none\" loop src=\"/images/candle.mp4\">
           <source src=\"/images/candle.mp4\" type=\"video/mp4\"  />
        </video>
        ";
        // line 15
        echo "           
        
        <div class=\"size\">
            <div class=\"description delay2 triggerAnimation\" data-animate=\"fadeInLeft\">
                <h1>";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Epado odkrywa zakodowane wspomnienia"), "html", null, true);
        echo "</h1>
                <p>";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Epado to wyjątkowe miejsce wspomnień o wspaniałych ludziach, których nie powinniśmy zapomnieć."), "html", null, true);
        echo "</p>
                ";
        // line 21
        if ($this->getAttribute((isset($context["demo"]) ? $context["demo"] : null), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array", true, true)) {
            // line 22
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->pageUrl($this->getAttribute((isset($context["demo"]) ? $context["demo"] : $this->getContext($context, "demo")), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array")), "html", null, true);
            echo "\" ";
            echo " class=\"homebutton gold\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sprawdź"), "html", null, true);
            echo "</a>
                ";
        } else {
            // line 24
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->pageUrl("015040163920008"), "html", null, true);
            echo "\" ";
            echo " class=\"homebutton gold\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sprawdź"), "html", null, true);
            echo "</a> 
                ";
        }
        // line 26
        echo "                <a href=\"";
        echo $this->env->getExtension('routing')->getPath("page_form");
        echo "\" class=\"homebutton\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamów"), "html", null, true);
        echo "</a>

                <div class=\"separator\"></div><br>

                ";
        // line 30
        if ($this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : null), "google_play", array(), "array", false, true), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array", true, true)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : $this->getContext($context, "social")), "google_play", array(), "array"), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array"), "html", null, true);
            echo "\" class=\"shop\"><img src=\"/images/googleplay.png\"></a>";
        }
        // line 31
        echo "                ";
        if ($this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : null), "app_store", array(), "array", false, true), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array", true, true)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : $this->getContext($context, "social")), "app_store", array(), "array"), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array"), "html", null, true);
            echo "\" class=\"shop\"><img src=\"/images/appstore.png\"></a>";
        }
        // line 32
        echo "               
            </div>


            <div class=\"photo delay2 triggerAnimation\" data-animate=\"fadeInRight\" style=\"position:relative;\">               \t\t\t
\t\t\t\t<div class=\"inside\" style=\"background-image: url(/images/a_page.png);width: 209px;height: 369px;top: 60px;left: 102px;position: absolute;overflow: hidden;z-index: -4;\">
                  <img style=\"\" src=\"/images/a_grave.jpg\">
                </div>

\t\t\t\t<div class=\"inside\" style=\"background-image: url(/images/qr_scan.png);width: 115px;height: 115px;top: 60px;left: 102px;position: absolute;overflow: hidden;z-index: -4;\">
                 <!-- <img style=\"\" src=\"/images/a_grave.jpg\">-->
                </div>
\t\t\t\t
                <img src=\"/images/iphone.png\" style=\"width:358px;\">
            </div>
\t\t\t

        </div>
        <div class=\"box\"></div>
                
                
    </div> 
                
    <div class=\"notifications\" id=\"notifications\">
        <div class=\"size\">
        ";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification notice\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "warning"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification warning\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification success\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification error\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "        </div>
    </div>

    <div class=\"what\" id=\"what\">    
        <div class=\"size\">

   

     
                <h1>";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Czym jest Ememoria"), "html", null, true);
        echo "</h1>
                <div class=\"elements boxes\">
                   <div class=\"element delay1 triggerAnimation\" data-animate=\"fadeInUp\">
                       <div class=\"inside box\">
                           <div class=\"image\"><i class=\"fa fa-camera\"></i></div>
                           <h3>";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pamiątka"), "html", null, true);
        echo "</h3>
                           <p>";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Epado najlepszym pamiętnikiem, albumem wspomnień o najbliższych."), "html", null, true);
        echo "</p>
                       </div>
                   </div>
                   <div class=\"element delay2 triggerAnimation\" data-animate=\"fadeInUp\">
                       <div class=\"inside box\">
                           <div class=\"image\"><i class=\"fa fa-graduation-cap\"></i></div>
                           <h3>";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wiedza"), "html", null, true);
        echo "</h3>
                           <p>";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Epado sposobem pogłębiania wiedzy o zabytkach oraz ciekawych obiektach."), "html", null, true);
        echo "</p>
                       </div>
                   </div>
                   <div class=\"element delay3 triggerAnimation\" data-animate=\"fadeInUp\">
                       <div class=\"inside box\">
                           <div class=\"image\"><i class=\"fa fa-heart\"></i></div>
                           <h3>";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pamięć"), "html", null, true);
        echo "</h3>
                           <p>";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Epado przypomina o rocznicy wysyłając powiadomienie mailem i SMS, aby najważniejsze daty były niezapomniane."), "html", null, true);
        echo "</p>
                       </div>
                   </div>
                   <div class=\"element delay4 triggerAnimation\" data-animate=\"fadeInUp\">
                       <div class=\"inside box\">
                           <div class=\"image\"><i class=\"fa fa-group\"></i></div>
                           <h3>";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Drzewo genealogiczne"), "html", null, true);
        echo "</h3>
                           <p>";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Epado umożliwi w przyszłości stworzenie drzewa genealogicznego."), "html", null, true);
        echo "</p>
                       </div>
                   </div>
                   <div class=\"element delay5 triggerAnimation\" data-animate=\"fadeInUp\">
                       <div class=\"inside box\">
                           <div class=\"image\"><i class=\"fa fa-shopping-bag\"></i></div>
                           <h3>";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usługi"), "html", null, true);
        echo "</h3>
                           <p>";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Epado umożliwia zakup realnych usług w wirtualnym świecie wspomnień."), "html", null, true);
        echo "</p>
                       </div>
                   </div>
                   <div class=\"element delay6 triggerAnimation\" data-animate=\"fadeInUp\">
                       <div class=\"inside box\">
                           <div class=\"image\"><i class=\"fa fa-binoculars\"></i></div>
                           <h3>";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wyszukiwarka"), "html", null, true);
        echo "</h3>
                           <p>";
        // line 111
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Epado pozwoli odszukać interesujące Cię osoby, obiekty i miejsca."), "html", null, true);
        echo "</p>
                       </div>
                   </div>
                </div>
        </div>
    </div> 
                
                
                
    <div class=\"quote\">    
        <div class=\"size\">    
            <div class=\"inside\">
                <div>
                <div class=\"circle delay6 triggerAnimation\" data-animate=\"fadeInLeft\">
                <i class=\"fa fa-quote-right\"></i>
                </div>
                </div>
                <p class=\"text delay6 triggerAnimation\" data-animate=\"fadeInRight\">";
        // line 128
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Umarłych wieczność dotąd trwa, dokąd pamięcią się im płaci."), "html", null, true);
        echo "</p>
                <p class=\"author delay6 triggerAnimation\" data-animate=\"fadeInLeft\">~ Wisława Szymborska</p>
                
            </div>
            
        </div>
    </div> 
                
                
       
    <div class=\"work\" id=\"work\">    
        <div class=\"size\">
                <h1>";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Jak to działa"), "html", null, true);
        echo "</h1>
                <p class=\"description\">";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zapoznaj się ze wszystkimi krokami które występują w procesie stworzenia własnej strony Epado."), "html", null, true);
        echo "</p>
                <div class=\"elements boxes\">
                   <div class=\"element delay4 triggerAnimation\" data-animate=\"fadeInLeft\">
                       <div class=\"inside box\">
                           <div class=\"circle\">1</div>
                           <h3>";
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Załóż swoje konto w serwisie Epado"), "html", null, true);
        echo "</h3>
                           <div class=\"separator\"></div>
                           <p>";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Aby rozpocząć tworzenie swojej strony Epado musisz się zarejestrować. Możesz do tego celu wykorzystać swoje konto na facebooku lub wypełnić tradycyjny formularz rejestracyjny."), "html", null, true);
        echo "</p>
                       </div>
                   </div>
                   <div class=\"element delay1 triggerAnimation\" data-animate=\"fadeInLeft\">
                       <div class=\"inside box\">
                           <div class=\"circle\">2</div>
                           <h3>";
        // line 154
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Stwórz swoją własną stronę Epado"), "html", null, true);
        echo "</h3>
                           <div class=\"separator\"></div>
                           <p>";
        // line 156
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Stwórz stronę Epado upamiętniającą wybraną przez Ciebie osobę zmarłą lub miejsce. Po zapisaniu podstawowych danych będziesz mógł dodać zdjęcia i filmy oraz zamawiać pakiety."), "html", null, true);
        echo "</p>
                       </div>
                   </div>
                   <div class=\"element delay1 triggerAnimation\" data-animate=\"fadeInRight\">
                       <div class=\"inside box\">
                           <div class=\"circle\">3</div>
                           <h3>";
        // line 162
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamów jeden z pakietów dla strony"), "html", null, true);
        echo "</h3>
                           <div class=\"separator\"></div>
                           <p>";
        // line 164
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Po utworzeniu strony będziesz mógł zakupić do niej pakiet. W skład pakietu poza abonamentem dla strony na określoną ilość lat otrzymasz również fizyczny kod QR."), "html", null, true);
        echo "</p>
                       </div>
                   </div>
                   <div class=\"element delay4 triggerAnimation\" data-animate=\"fadeInRight\">
                       <div class=\"inside box\">
                           <div class=\"circle\">4</div>
                           <h3>";
        // line 170
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Odbierz przesyłkę z kodem aktywacyjnym"), "html", null, true);
        echo "</h3>
                           <div class=\"separator\"></div>
                           <p>";
        // line 172
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Po opłaceniu zamówienia niezwłocznie wyślemy do Ciebie przesyłkę z kodem aktywacyjnym i fizyczną płytką Epado zawierającą kod QR prowadzący do Twojej strony."), "html", null, true);
        echo "</p>
                       </div>
                   </div>
                    
                </div>
        </div>
    </div> 
                
                
                
     
       
    <div class=\"price\" id=\"price\">  
        <div class=\"size\">
                <h1>";
        // line 186
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cennik"), "html", null, true);
        echo "</h1>
                <p class=\"description\">";
        // line 187
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sprawdź wszystkie dostępne pakiety i wybierz okres."), "html", null, true);
        echo "</p>
                
                <div class=\"elements\">
                   
                   <div class=\"element delay1 triggerAnimation\" data-animate=\"fadeInLeft\">
                       <div class=\"inside\">
                           <h3>";
        // line 193
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), 1, array(), "array"), "name", array()), "html", null, true);
        echo "</h3>
                           <div class=\"amount\">";
        // line 194
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), 1, array(), "array"), "price", array(0 => $this->env->getExtension('app_extension')->getCurrency()), "method")), "html", null, true);
        echo "</div>
                           <ul>
                            <li>";
        // line 196
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opisy i zdjęcia"), "html", null, true);
        echo "</li>
                            <li>";
        // line 197
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pojedynczy kod Epado"), "html", null, true);
        echo "</li>
                            <li>";
        // line 198
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dostęp do utworzonych wspomnień 365/24"), "html", null, true);
        echo "</li>
                            <li>";
        // line 199
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Intuicyjny system zarządzania treścią"), "html", null, true);
        echo "</li>
                            <li>";
        // line 200
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wspomnienia w postaci strony internetowej"), "html", null, true);
        echo "</li>
                           </ul>
                           
                           <a href=\"";
        // line 203
        echo $this->env->getExtension('routing')->getPath("page_form");
        echo "\" class=\"homebutton gold\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamów"), "html", null, true);
        echo "</a>
                           
                       </div>
                   </div>
                   <div class=\"element gold delay4 triggerAnimation\" data-animate=\"fadeInUp\">
                       <div class=\"inside\">
                           
                           <h3>";
        // line 210
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), 3, array(), "array"), "name", array()), "html", null, true);
        echo "</h3>
                           <div class=\"amount\">";
        // line 211
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), 3, array(), "array"), "price", array(0 => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "currency"), "method")), "method")), "html", null, true);
        echo "</div>
                           <ul>
                            <li>";
        // line 213
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opisy i zdjęcia"), "html", null, true);
        echo "</li>
                            <li>";
        // line 214
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pojedynczy kod Epado"), "html", null, true);
        echo "</li>
                            <li>";
        // line 215
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dostęp do utworzonych wspomnień 365/24"), "html", null, true);
        echo "</li>
                            <li>";
        // line 216
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Intuicyjny system zarządzania treścią"), "html", null, true);
        echo "</li>
                            <li>";
        // line 217
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wspomnienia w postaci strony internetowej"), "html", null, true);
        echo "</li>
                            <li>";
        // line 218
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Najdłuższy dostępny okres czasu"), "html", null, true);
        echo "</li>
                           </ul>
                           
                           <a href=\"";
        // line 221
        echo $this->env->getExtension('routing')->getPath("page_form");
        echo "\" class=\"homebutton gold\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamów"), "html", null, true);
        echo "</a>
                           
                       </div>
                   </div>
                   <div class=\"element delay1 triggerAnimation\" data-animate=\"fadeInRight\">
                       <div class=\"inside\">
                           <h3>";
        // line 227
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), 2, array(), "array"), "name", array()), "html", null, true);
        echo "</h3>
                           <div class=\"amount\">";
        // line 228
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), 2, array(), "array"), "price", array(0 => $this->env->getExtension('app_extension')->getCurrency()), "method")), "html", null, true);
        echo "</div>
                           <ul>
                            <li>";
        // line 230
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opisy i zdjęcia"), "html", null, true);
        echo "</li>
                            <li>";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pojedynczy kod Epado"), "html", null, true);
        echo "</li>
                            <li>";
        // line 232
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dostęp do utworzonych wspomnień 365/24"), "html", null, true);
        echo "</li>
                            <li>";
        // line 233
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Intuicyjny system zarządzania treścią"), "html", null, true);
        echo "</li>
                            <li>";
        // line 234
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wspomnienia w postaci strony internetowej"), "html", null, true);
        echo "</li>
                           </ul>
                           
                           <a href=\"";
        // line 237
        echo $this->env->getExtension('routing')->getPath("page_form");
        echo "\" class=\"homebutton gold\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamów"), "html", null, true);
        echo "</a>
                           
                       </div>
                   </div>
                </div>
        </div>
    </div>              
    
    ";
        // line 245
        if (($this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : null), "facebook_feed", array(), "array", false, true), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array", true, true) && (1 == 2))) {
            echo "                       
    <section class=\"content-area newsbg fb-section\" id=\"facebook\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-12 col-sm-12\">
                    <ul class=\"inline-list align-right facebook-nav\">
                        <li>
                            <a href=\"#\" data-target=\"prev\"><i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i></a>
                        </li>
                        <li>
                            <a href=\"#\" data-target=\"next\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i></a>
                        </li>
                    </ul>
                </div>
                <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                    <div class=\"row margin-top-0\">
                        <ul class=\"strip-list team-members-classic\">
                            <li>
                                <div class=\"social-feed-container facebook-slider\"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,300italic,400italic,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel=\"stylesheet\" href=\"/js/socialfeed/bootstrap.css\">
    <link href=\"/js/socialfeed/jquery.socialfeed.css\" rel=\"stylesheet\" type=\"text/css\">
    
    <script src=\"/js/socialfeed/sudoslider.js\"></script>
    <script src=\"/js/socialfeed/doT.min.js\"></script>
    <script src=\"/js/socialfeed/moment.min.js\"></script>
    <script src=\"/js/socialfeed/pl.js\"></script>
    <script src=\"/js/socialfeed/jquery.socialfeed.js\"></script>
    <script type=\"text/javascript\">
        \$(document).ready(function() {
            \$('.social-feed-container').socialfeed({
                facebook: {
                    accounts: ['@";
            // line 285
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : $this->getContext($context, "social")), "facebook_feed", array(), "array"), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array"), "html", null, true);
            echo "'],
                    limit: 12,
                    access_token: '233532476998022|6227ea897cc925e3c0fac0288b3f1242'
                },
                template_html: '<div> <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 portfolio-item get-url\"> <div class=\"social-feed-element ";
            // line 289
            echo "{{";
            echo "? !it.moderation_passed";
            echo "}}";
            echo "hidden";
            echo "{{";
            echo "?";
            echo "}}";
            echo "\" dt-create=\"";
            echo "{{";
            echo "=it.dt_create";
            echo "}}";
            echo "\" social-feed-id = \"";
            echo "{{";
            echo "=it.id";
            echo "}}";
            echo "\"> <div id=\"default";
            echo "{{";
            echo "=it.id";
            echo "}}";
            echo "\"><a href=\"";
            echo "{{";
            echo "=it.link";
            echo "}}";
            echo "\" target=\"_blank\" style=\"background-image: url(";
            echo "{{";
            echo "=it.attachment";
            echo "}}";
            echo ")\" class=\"fb-bg\"></a></div> <div class=\"content\"> <div class=\"media-body\"> <div class=\"text-wrapper\"> <p class=\"social-feed-text\">";
            echo "{{";
            echo "=it.text";
            echo "}}";
            echo " <a href=\"";
            echo "{{";
            echo "=it.link";
            echo "}}";
            echo "\" target=\"_blank\" class=\"read-button\"> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("czytaj więcej"), "html", null, true);
            echo "</a></p> </div> <br> <a class=\"pull-left\" href=\"";
            echo "{{";
            echo "=it.author_link";
            echo "}}";
            echo "\" target=\"_blank\"> <img class=\"media-object\" src=\"";
            echo "{{";
            echo "=it.author_picture";
            echo "}}";
            echo "\"> <span class=\"author-title\">";
            echo "{{";
            echo "=it.author_name";
            echo "}}";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <br> <span class=\"muted\"> ";
            echo "{{";
            echo "=it.date";
            echo "}}";
            echo "</span> </a> <a href=\"";
            echo "{{";
            echo "=it.link";
            echo "}}";
            echo "\" target=\"_blank\" class=\"pull-right\"> <i class=\"fa fa-facebook-official\"></i> </a> </div> </div> </div> </div> </div>',
                date_format: \"DD-MM-YYYY\",
                update_period: 5000000,
                show_media: true,
                media_min_width: 300,
                length: 140
            });
        });
    </script>

    <script type=\"text/javascript\">
        \$(window).load(function() {
            var finddefault = '';
            \$('.facebook-slider').find('div[id^=default]').each(function() {
                finddefault = \$(this).html();
                if (finddefault.indexOf(\"scontent\") >= 0) {
                    \$(this).html('<img class=\"attachment\" src=\"/images/ememoria.png\" style=\"display: block; width: auto; height: 180px; margin: 0 auto;\">');
                    \$(this).css('background-color', '#F26F21');
                }
            });
        });
        var everythingLoaded = setInterval(function() {
            if (/loaded|complete/.test(document.readyState)) {
                clearInterval(everythingLoaded);
                var textHeight = -1
                \$('.facebook-slider').find('div[class^=text-wrapper]').each(function() {
                    textHeight = textHeight > \$(this).height() ? textHeight : \$(this).height();
                });
                \$('.facebook-slider').find('div[class^=text-wrapper]').each(function() {
                    \$(this).height(textHeight);
                });
            }
        }, 10);
    </script>

    <script type=\"text/javascript\">
        \$(window).load(function() {
            var facebookSlider = \$(\".facebook-slider\").sudoSlider({
                slideCount: 4,
                moveCount: 1,
                responsive: true,
                auto: false,
                pause: 2000,
                resumePause: false,
                continuous: true,
                prevNext: false,
                customLink: '.facebook-nav > li > a',
                touch: false,
                touchHandle: false,
                mouseTouch: true,
                allowScroll: true,
                speed: 200
            });

            if (\$(\".facebook-slider\").length) {
                if (\$(window).width() < 1199 && \$(window).width() > 992) {
                    facebookSlider.setOption('slideCount', 3);
                } else if (\$(window).width() < 992 && \$(window).width() > 750) {
                    facebookSlider.setOption('slideCount', 2);
                } else if (\$(window).width() < 750) {
                    facebookSlider.setOption('slideCount', 1);
                }

                \$(window).resize(function() {
                    if (\$(window).width() < 1199 && \$(window).width() > 992) {
                        facebookSlider.setOption('slideCount', 3);
                    } else if (\$(window).width() < 992 && \$(window).width() > 750) {
                        facebookSlider.setOption('slideCount', 2);
                    } else if (\$(window).width() < 750) {
                        facebookSlider.setOption('slideCount', 1);
                    } else {
                        facebookSlider.setOption('slideCount', 4);
                    }
                });
            }
        });
    </script>                     
    ";
        }
        // line 366
        echo "                       
                           
</div>   
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Home:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  715 => 366,  578 => 289,  571 => 285,  528 => 245,  515 => 237,  509 => 234,  505 => 233,  501 => 232,  497 => 231,  493 => 230,  488 => 228,  484 => 227,  473 => 221,  467 => 218,  463 => 217,  459 => 216,  455 => 215,  451 => 214,  447 => 213,  442 => 211,  438 => 210,  426 => 203,  420 => 200,  416 => 199,  412 => 198,  408 => 197,  404 => 196,  399 => 194,  395 => 193,  386 => 187,  382 => 186,  365 => 172,  360 => 170,  351 => 164,  346 => 162,  337 => 156,  332 => 154,  323 => 148,  318 => 146,  310 => 141,  306 => 140,  291 => 128,  271 => 111,  267 => 110,  258 => 104,  254 => 103,  245 => 97,  241 => 96,  232 => 90,  228 => 89,  219 => 83,  215 => 82,  206 => 76,  202 => 75,  194 => 70,  183 => 61,  171 => 60,  159 => 59,  147 => 58,  136 => 57,  109 => 32,  102 => 31,  96 => 30,  86 => 26,  77 => 24,  68 => 22,  66 => 21,  62 => 20,  58 => 19,  52 => 15,  45 => 7,  42 => 6,  36 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends "home.html.twig" %}*/
/* */
/* {% block full_title %}{{ 'Witamy w Epado'|trans }}{% endblock %}*/
/* {% block description %}{{ 'Epado to wyjątkowe miejsce wspomnień o wspaniałych ludziach, których nie powinniśmy zapomnieć.'|trans }}{% endblock %}*/
/* */
/* {% block content %}*/
/* <div class="homepage">    */
/*     <div class="first-content intro"> */
/*         <video poster="/images/introorg.png" style="background-image:url(/images/introorg.png); background-size:cover;" preload="none" loop src="/images/candle.mp4">*/
/*            <source src="/images/candle.mp4" type="video/mp4"  />*/
/*         </video>*/
/*         {#<video poster="/images/introorg.png" style="background-image:url(/images/introorg.png);" preload="none" loop src="http://images.apple.com/media/us/music/2015/758e7234_576d_4c94_8dc0_54994631d0fb/overview/hero.mp4">*/
/*            <source src="http://images.apple.com/media/us/music/2015/758e7234_576d_4c94_8dc0_54994631d0fb/overview/hero.mp4" type="video/mp4"  />*/
/*         </video>#}*/
/*            */
/*         */
/*         <div class="size">*/
/*             <div class="description delay2 triggerAnimation" data-animate="fadeInLeft">*/
/*                 <h1>{{ 'Epado odkrywa zakodowane wspomnienia'|trans }}</h1>*/
/*                 <p>{{ 'Epado to wyjątkowe miejsce wspomnień o wspaniałych ludziach, których nie powinniśmy zapomnieć.'|trans }}</p>*/
/*                 {% if demo[app.request.locale] is defined %}*/
/*                 <a href="{{path_page( demo[app.request.locale] )}}" {#015040163920008#} class="homebutton gold">{{ 'Sprawdź'|trans }}</a>*/
/*                 {% else %}*/
/*                 <a href="{{path_page('015040163920008')}}" {#015040163920008#} class="homebutton gold">{{ 'Sprawdź'|trans }}</a> */
/*                 {% endif %}*/
/*                 <a href="{{path('page_form')}}" class="homebutton">{{ 'Zamów'|trans }}</a>*/
/* */
/*                 <div class="separator"></div><br>*/
/* */
/*                 {% if social['google_play'][app.request.locale] is defined %}<a href="{{ social['google_play'][app.request.locale] }}" class="shop"><img src="/images/googleplay.png"></a>{% endif %}*/
/*                 {% if social['app_store'][app.request.locale] is defined %}<a href="{{ social['app_store'][app.request.locale] }}" class="shop"><img src="/images/appstore.png"></a>{% endif %}*/
/*                */
/*             </div>*/
/* */
/* */
/*             <div class="photo delay2 triggerAnimation" data-animate="fadeInRight" style="position:relative;">               			*/
/* 				<div class="inside" style="background-image: url(/images/a_page.png);width: 209px;height: 369px;top: 60px;left: 102px;position: absolute;overflow: hidden;z-index: -4;">*/
/*                   <img style="" src="/images/a_grave.jpg">*/
/*                 </div>*/
/* */
/* 				<div class="inside" style="background-image: url(/images/qr_scan.png);width: 115px;height: 115px;top: 60px;left: 102px;position: absolute;overflow: hidden;z-index: -4;">*/
/*                  <!-- <img style="" src="/images/a_grave.jpg">-->*/
/*                 </div>*/
/* 				*/
/*                 <img src="/images/iphone.png" style="width:358px;">*/
/*             </div>*/
/* 			*/
/* */
/*         </div>*/
/*         <div class="box"></div>*/
/*                 */
/*                 */
/*     </div> */
/*                 */
/*     <div class="notifications" id="notifications">*/
/*         <div class="size">*/
/*         {% for flashMessage in app.session.flashbag.get('notice') %}<div class="notification notice">{{ flashMessage|raw }}</div>{% endfor %}*/
/*         {% for flashMessage in app.session.flashbag.get('warning') %}<div class="notification warning">{{ flashMessage|raw }}</div>{% endfor %}*/
/*         {% for flashMessage in app.session.flashbag.get('success') %}<div class="notification success">{{ flashMessage|raw }}</div>{% endfor %}*/
/*         {% for flashMessage in app.session.flashbag.get('error') %}<div class="notification error">{{ flashMessage|raw }}</div>{% endfor %}*/
/*         </div>*/
/*     </div>*/
/* */
/*     <div class="what" id="what">    */
/*         <div class="size">*/
/* */
/*    */
/* */
/*      */
/*                 <h1>{{ 'Czym jest Ememoria'|trans }}</h1>*/
/*                 <div class="elements boxes">*/
/*                    <div class="element delay1 triggerAnimation" data-animate="fadeInUp">*/
/*                        <div class="inside box">*/
/*                            <div class="image"><i class="fa fa-camera"></i></div>*/
/*                            <h3>{{ 'Pamiątka'|trans }}</h3>*/
/*                            <p>{{ 'Epado najlepszym pamiętnikiem, albumem wspomnień o najbliższych.'|trans }}</p>*/
/*                        </div>*/
/*                    </div>*/
/*                    <div class="element delay2 triggerAnimation" data-animate="fadeInUp">*/
/*                        <div class="inside box">*/
/*                            <div class="image"><i class="fa fa-graduation-cap"></i></div>*/
/*                            <h3>{{ 'Wiedza'|trans }}</h3>*/
/*                            <p>{{ 'Epado sposobem pogłębiania wiedzy o zabytkach oraz ciekawych obiektach.'|trans }}</p>*/
/*                        </div>*/
/*                    </div>*/
/*                    <div class="element delay3 triggerAnimation" data-animate="fadeInUp">*/
/*                        <div class="inside box">*/
/*                            <div class="image"><i class="fa fa-heart"></i></div>*/
/*                            <h3>{{ 'Pamięć'|trans }}</h3>*/
/*                            <p>{{ 'Epado przypomina o rocznicy wysyłając powiadomienie mailem i SMS, aby najważniejsze daty były niezapomniane.'|trans }}</p>*/
/*                        </div>*/
/*                    </div>*/
/*                    <div class="element delay4 triggerAnimation" data-animate="fadeInUp">*/
/*                        <div class="inside box">*/
/*                            <div class="image"><i class="fa fa-group"></i></div>*/
/*                            <h3>{{ 'Drzewo genealogiczne'|trans }}</h3>*/
/*                            <p>{{ 'Epado umożliwi w przyszłości stworzenie drzewa genealogicznego.'|trans }}</p>*/
/*                        </div>*/
/*                    </div>*/
/*                    <div class="element delay5 triggerAnimation" data-animate="fadeInUp">*/
/*                        <div class="inside box">*/
/*                            <div class="image"><i class="fa fa-shopping-bag"></i></div>*/
/*                            <h3>{{ 'Usługi'|trans }}</h3>*/
/*                            <p>{{ 'Epado umożliwia zakup realnych usług w wirtualnym świecie wspomnień.'|trans }}</p>*/
/*                        </div>*/
/*                    </div>*/
/*                    <div class="element delay6 triggerAnimation" data-animate="fadeInUp">*/
/*                        <div class="inside box">*/
/*                            <div class="image"><i class="fa fa-binoculars"></i></div>*/
/*                            <h3>{{ 'Wyszukiwarka'|trans }}</h3>*/
/*                            <p>{{ 'Epado pozwoli odszukać interesujące Cię osoby, obiekty i miejsca.'|trans }}</p>*/
/*                        </div>*/
/*                    </div>*/
/*                 </div>*/
/*         </div>*/
/*     </div> */
/*                 */
/*                 */
/*                 */
/*     <div class="quote">    */
/*         <div class="size">    */
/*             <div class="inside">*/
/*                 <div>*/
/*                 <div class="circle delay6 triggerAnimation" data-animate="fadeInLeft">*/
/*                 <i class="fa fa-quote-right"></i>*/
/*                 </div>*/
/*                 </div>*/
/*                 <p class="text delay6 triggerAnimation" data-animate="fadeInRight">{{ 'Umarłych wieczność dotąd trwa, dokąd pamięcią się im płaci.'|trans }}</p>*/
/*                 <p class="author delay6 triggerAnimation" data-animate="fadeInLeft">~ Wisława Szymborska</p>*/
/*                 */
/*             </div>*/
/*             */
/*         </div>*/
/*     </div> */
/*                 */
/*                 */
/*        */
/*     <div class="work" id="work">    */
/*         <div class="size">*/
/*                 <h1>{{ 'Jak to działa'|trans }}</h1>*/
/*                 <p class="description">{{ 'Zapoznaj się ze wszystkimi krokami które występują w procesie stworzenia własnej strony Epado.'|trans }}</p>*/
/*                 <div class="elements boxes">*/
/*                    <div class="element delay4 triggerAnimation" data-animate="fadeInLeft">*/
/*                        <div class="inside box">*/
/*                            <div class="circle">1</div>*/
/*                            <h3>{{ 'Załóż swoje konto w serwisie Epado'|trans }}</h3>*/
/*                            <div class="separator"></div>*/
/*                            <p>{{ 'Aby rozpocząć tworzenie swojej strony Epado musisz się zarejestrować. Możesz do tego celu wykorzystać swoje konto na facebooku lub wypełnić tradycyjny formularz rejestracyjny.'|trans }}</p>*/
/*                        </div>*/
/*                    </div>*/
/*                    <div class="element delay1 triggerAnimation" data-animate="fadeInLeft">*/
/*                        <div class="inside box">*/
/*                            <div class="circle">2</div>*/
/*                            <h3>{{ 'Stwórz swoją własną stronę Epado'|trans }}</h3>*/
/*                            <div class="separator"></div>*/
/*                            <p>{{ 'Stwórz stronę Epado upamiętniającą wybraną przez Ciebie osobę zmarłą lub miejsce. Po zapisaniu podstawowych danych będziesz mógł dodać zdjęcia i filmy oraz zamawiać pakiety.'|trans }}</p>*/
/*                        </div>*/
/*                    </div>*/
/*                    <div class="element delay1 triggerAnimation" data-animate="fadeInRight">*/
/*                        <div class="inside box">*/
/*                            <div class="circle">3</div>*/
/*                            <h3>{{ 'Zamów jeden z pakietów dla strony'|trans }}</h3>*/
/*                            <div class="separator"></div>*/
/*                            <p>{{ 'Po utworzeniu strony będziesz mógł zakupić do niej pakiet. W skład pakietu poza abonamentem dla strony na określoną ilość lat otrzymasz również fizyczny kod QR.'|trans }}</p>*/
/*                        </div>*/
/*                    </div>*/
/*                    <div class="element delay4 triggerAnimation" data-animate="fadeInRight">*/
/*                        <div class="inside box">*/
/*                            <div class="circle">4</div>*/
/*                            <h3>{{ 'Odbierz przesyłkę z kodem aktywacyjnym'|trans }}</h3>*/
/*                            <div class="separator"></div>*/
/*                            <p>{{ 'Po opłaceniu zamówienia niezwłocznie wyślemy do Ciebie przesyłkę z kodem aktywacyjnym i fizyczną płytką Epado zawierającą kod QR prowadzący do Twojej strony.'|trans }}</p>*/
/*                        </div>*/
/*                    </div>*/
/*                     */
/*                 </div>*/
/*         </div>*/
/*     </div> */
/*                 */
/*                 */
/*                 */
/*      */
/*        */
/*     <div class="price" id="price">  */
/*         <div class="size">*/
/*                 <h1>{{ 'Cennik'|trans }}</h1>*/
/*                 <p class="description">{{ 'Sprawdź wszystkie dostępne pakiety i wybierz okres.'|trans }}</p>*/
/*                 */
/*                 <div class="elements">*/
/*                    */
/*                    <div class="element delay1 triggerAnimation" data-animate="fadeInLeft">*/
/*                        <div class="inside">*/
/*                            <h3>{{ products[1].name }}</h3>*/
/*                            <div class="amount">{{ products[1].price(currency())|price }}</div>*/
/*                            <ul>*/
/*                             <li>{{ 'Opisy i zdjęcia'|trans }}</li>*/
/*                             <li>{{ 'Pojedynczy kod Epado'|trans }}</li>*/
/*                             <li>{{ 'Dostęp do utworzonych wspomnień 365/24'|trans }}</li>*/
/*                             <li>{{ 'Intuicyjny system zarządzania treścią'|trans }}</li>*/
/*                             <li>{{ 'Wspomnienia w postaci strony internetowej'|trans }}</li>*/
/*                            </ul>*/
/*                            */
/*                            <a href="{{path('page_form')}}" class="homebutton gold">{{ 'Zamów'|trans }}</a>*/
/*                            */
/*                        </div>*/
/*                    </div>*/
/*                    <div class="element gold delay4 triggerAnimation" data-animate="fadeInUp">*/
/*                        <div class="inside">*/
/*                            */
/*                            <h3>{{ products[3].name }}</h3>*/
/*                            <div class="amount">{{ products[3].price(app.session.get('currency'))|price }}</div>*/
/*                            <ul>*/
/*                             <li>{{ 'Opisy i zdjęcia'|trans }}</li>*/
/*                             <li>{{ 'Pojedynczy kod Epado'|trans }}</li>*/
/*                             <li>{{ 'Dostęp do utworzonych wspomnień 365/24'|trans }}</li>*/
/*                             <li>{{ 'Intuicyjny system zarządzania treścią'|trans }}</li>*/
/*                             <li>{{ 'Wspomnienia w postaci strony internetowej'|trans }}</li>*/
/*                             <li>{{ 'Najdłuższy dostępny okres czasu'|trans }}</li>*/
/*                            </ul>*/
/*                            */
/*                            <a href="{{path('page_form')}}" class="homebutton gold">{{ 'Zamów'|trans }}</a>*/
/*                            */
/*                        </div>*/
/*                    </div>*/
/*                    <div class="element delay1 triggerAnimation" data-animate="fadeInRight">*/
/*                        <div class="inside">*/
/*                            <h3>{{ products[2].name }}</h3>*/
/*                            <div class="amount">{{ products[2].price(currency())|price }}</div>*/
/*                            <ul>*/
/*                             <li>{{ 'Opisy i zdjęcia'|trans }}</li>*/
/*                             <li>{{ 'Pojedynczy kod Epado'|trans }}</li>*/
/*                             <li>{{ 'Dostęp do utworzonych wspomnień 365/24'|trans }}</li>*/
/*                             <li>{{ 'Intuicyjny system zarządzania treścią'|trans }}</li>*/
/*                             <li>{{ 'Wspomnienia w postaci strony internetowej'|trans }}</li>*/
/*                            </ul>*/
/*                            */
/*                            <a href="{{path('page_form')}}" class="homebutton gold">{{ 'Zamów'|trans }}</a>*/
/*                            */
/*                        </div>*/
/*                    </div>*/
/*                 </div>*/
/*         </div>*/
/*     </div>              */
/*     */
/*     {% if social['facebook_feed'][app.request.locale] is defined and 1==2 %}                       */
/*     <section class="content-area newsbg fb-section" id="facebook">*/
/*         <div class="container">*/
/*             <div class="row">*/
/*                 <div class="col-md-12 col-sm-12">*/
/*                     <ul class="inline-list align-right facebook-nav">*/
/*                         <li>*/
/*                             <a href="#" data-target="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="#" data-target="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>*/
/*                         </li>*/
/*                     </ul>*/
/*                 </div>*/
/*                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">*/
/*                     <div class="row margin-top-0">*/
/*                         <ul class="strip-list team-members-classic">*/
/*                             <li>*/
/*                                 <div class="social-feed-container facebook-slider"></div>*/
/*                             </li>*/
/*                         </ul>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </section>*/
/*     */
/*     <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,300italic,400italic,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>*/
/*     <link rel="stylesheet" href="/js/socialfeed/bootstrap.css">*/
/*     <link href="/js/socialfeed/jquery.socialfeed.css" rel="stylesheet" type="text/css">*/
/*     */
/*     <script src="/js/socialfeed/sudoslider.js"></script>*/
/*     <script src="/js/socialfeed/doT.min.js"></script>*/
/*     <script src="/js/socialfeed/moment.min.js"></script>*/
/*     <script src="/js/socialfeed/pl.js"></script>*/
/*     <script src="/js/socialfeed/jquery.socialfeed.js"></script>*/
/*     <script type="text/javascript">*/
/*         $(document).ready(function() {*/
/*             $('.social-feed-container').socialfeed({*/
/*                 facebook: {*/
/*                     accounts: ['@{{ social['facebook_feed'][app.request.locale] }}'],*/
/*                     limit: 12,*/
/*                     access_token: '233532476998022|6227ea897cc925e3c0fac0288b3f1242'*/
/*                 },*/
/*                 template_html: '<div> <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 portfolio-item get-url"> <div class="social-feed-element {{ '{{' }}? !it.moderation_passed{{ '}}' }}hidden{{ '{{' }}?{{ '}}' }}" dt-create="{{ '{{' }}=it.dt_create{{ '}}' }}" social-feed-id = "{{ '{{' }}=it.id{{ '}}' }}"> <div id="default{{ '{{' }}=it.id{{ '}}' }}"><a href="{{ '{{' }}=it.link{{ '}}' }}" target="_blank" style="background-image: url({{ '{{' }}=it.attachment{{ '}}' }})" class="fb-bg"></a></div> <div class="content"> <div class="media-body"> <div class="text-wrapper"> <p class="social-feed-text">{{ '{{' }}=it.text{{ '}}' }} <a href="{{ '{{' }}=it.link{{ '}}' }}" target="_blank" class="read-button"> {{ 'czytaj więcej'|trans }}</a></p> </div> <br> <a class="pull-left" href="{{ '{{' }}=it.author_link{{ '}}' }}" target="_blank"> <img class="media-object" src="{{ '{{' }}=it.author_picture{{ '}}' }}"> <span class="author-title">{{ '{{' }}=it.author_name{{ '}}' }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <br> <span class="muted"> {{ '{{' }}=it.date{{ '}}' }}</span> </a> <a href="{{ '{{' }}=it.link{{ '}}' }}" target="_blank" class="pull-right"> <i class="fa fa-facebook-official"></i> </a> </div> </div> </div> </div> </div>',*/
/*                 date_format: "DD-MM-YYYY",*/
/*                 update_period: 5000000,*/
/*                 show_media: true,*/
/*                 media_min_width: 300,*/
/*                 length: 140*/
/*             });*/
/*         });*/
/*     </script>*/
/* */
/*     <script type="text/javascript">*/
/*         $(window).load(function() {*/
/*             var finddefault = '';*/
/*             $('.facebook-slider').find('div[id^=default]').each(function() {*/
/*                 finddefault = $(this).html();*/
/*                 if (finddefault.indexOf("scontent") >= 0) {*/
/*                     $(this).html('<img class="attachment" src="/images/ememoria.png" style="display: block; width: auto; height: 180px; margin: 0 auto;">');*/
/*                     $(this).css('background-color', '#F26F21');*/
/*                 }*/
/*             });*/
/*         });*/
/*         var everythingLoaded = setInterval(function() {*/
/*             if (/loaded|complete/.test(document.readyState)) {*/
/*                 clearInterval(everythingLoaded);*/
/*                 var textHeight = -1*/
/*                 $('.facebook-slider').find('div[class^=text-wrapper]').each(function() {*/
/*                     textHeight = textHeight > $(this).height() ? textHeight : $(this).height();*/
/*                 });*/
/*                 $('.facebook-slider').find('div[class^=text-wrapper]').each(function() {*/
/*                     $(this).height(textHeight);*/
/*                 });*/
/*             }*/
/*         }, 10);*/
/*     </script>*/
/* */
/*     <script type="text/javascript">*/
/*         $(window).load(function() {*/
/*             var facebookSlider = $(".facebook-slider").sudoSlider({*/
/*                 slideCount: 4,*/
/*                 moveCount: 1,*/
/*                 responsive: true,*/
/*                 auto: false,*/
/*                 pause: 2000,*/
/*                 resumePause: false,*/
/*                 continuous: true,*/
/*                 prevNext: false,*/
/*                 customLink: '.facebook-nav > li > a',*/
/*                 touch: false,*/
/*                 touchHandle: false,*/
/*                 mouseTouch: true,*/
/*                 allowScroll: true,*/
/*                 speed: 200*/
/*             });*/
/* */
/*             if ($(".facebook-slider").length) {*/
/*                 if ($(window).width() < 1199 && $(window).width() > 992) {*/
/*                     facebookSlider.setOption('slideCount', 3);*/
/*                 } else if ($(window).width() < 992 && $(window).width() > 750) {*/
/*                     facebookSlider.setOption('slideCount', 2);*/
/*                 } else if ($(window).width() < 750) {*/
/*                     facebookSlider.setOption('slideCount', 1);*/
/*                 }*/
/* */
/*                 $(window).resize(function() {*/
/*                     if ($(window).width() < 1199 && $(window).width() > 992) {*/
/*                         facebookSlider.setOption('slideCount', 3);*/
/*                     } else if ($(window).width() < 992 && $(window).width() > 750) {*/
/*                         facebookSlider.setOption('slideCount', 2);*/
/*                     } else if ($(window).width() < 750) {*/
/*                         facebookSlider.setOption('slideCount', 1);*/
/*                     } else {*/
/*                         facebookSlider.setOption('slideCount', 4);*/
/*                     }*/
/*                 });*/
/*             }*/
/*         });*/
/*     </script>                     */
/*     {% endif %}                       */
/*                            */
/* </div>   */
/* {% endblock content %} */
/* */
