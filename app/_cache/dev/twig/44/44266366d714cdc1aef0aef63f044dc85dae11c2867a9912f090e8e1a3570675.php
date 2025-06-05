<?php

/* wrapper.html.twig */
class __TwigTemplate_7188c0a4016a92bb3a63597130c0f9b3827fc331b63d39e6776bb094236ae9d5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'after_body' => array($this, 'block_after_body'),
            'top_right' => array($this, 'block_top_right'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        ";
        // line 5
        $context["title"] = $this->renderBlock("title", $context, $blocks);
        // line 6
        echo "        ";
        $context["full_title"] = $this->renderBlock("full_title", $context, $blocks);
        // line 7
        echo "        ";
        $context["description"] = $this->renderBlock("description", $context, $blocks);
        // line 8
        echo "        ";
        $context["keywords"] = $this->renderBlock("keywords", $context, $blocks);
        // line 9
        echo "        <title>";
        if ((isset($context["full_title"]) ? $context["full_title"] : $this->getContext($context, "full_title"))) {
            echo twig_escape_filter($this->env, (isset($context["full_title"]) ? $context["full_title"] : $this->getContext($context, "full_title")), "html", null, true);
        } else {
            if ((isset($context["title"]) ? $context["title"] : $this->getContext($context, "title"))) {
                echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
                echo " | ";
            }
            echo "Epado";
        }
        echo "</title>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1\" /> 
        <meta name=\"description\" content=\"";
        // line 11
        if ((isset($context["description"]) ? $context["description"] : $this->getContext($context, "description"))) {
            echo twig_escape_filter($this->env, (isset($context["description"]) ? $context["description"] : $this->getContext($context, "description")), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Epado to największy w Polsce serwis upamiętniający osoby zmarłe"), "html", null, true);
        }
        echo "\">
        <meta name=\"keywords\" content=\"";
        // line 12
        if ((isset($context["keywords"]) ? $context["keywords"] : $this->getContext($context, "keywords"))) {
            echo twig_escape_filter($this->env, (isset($context["keywords"]) ? $context["keywords"] : $this->getContext($context, "keywords")), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("epado, osoby zmarłe, cmentarze, baza cmentarzy"), "html", null, true);
        }
        echo "\">
        <meta name=\"author\" content=\"artgate.pl\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" >
        <meta name=\"theme-color\" content=\"#000000\">
        <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"/apple-touch-icon-57x57.png\">
        <link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"/apple-touch-icon-60x60.png\">
        <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"/apple-touch-icon-72x72.png\">
        <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"/apple-touch-icon-76x76.png\">
        <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"/apple-touch-icon-114x114.png\">
        <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"/apple-touch-icon-120x120.png\">
        <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"/apple-touch-icon-144x144.png\">
        <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"/apple-touch-icon-152x152.png\">
        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/apple-touch-icon-180x180.png\">
        <link rel=\"icon\" type=\"image/png\" href=\"/favicon-32x32.png\" sizes=\"32x32\">
        <link rel=\"icon\" type=\"image/png\" href=\"/android-chrome-192x192.png\" sizes=\"192x192\">
        <link rel=\"icon\" type=\"image/png\" href=\"/favicon-96x96.png\" sizes=\"96x96\">
        <link rel=\"icon\" type=\"image/png\" href=\"/favicon-16x16.png\" sizes=\"16x16\">
        <link rel=\"manifest\" href=\"/manifest.json\">
        <link rel=\"mask-icon\" href=\"/safari-pinned-tab.svg\" color=\"#dac572\">
        <meta name=\"msapplication-TileColor\" content=\"#da532c\">
        <meta name=\"msapplication-TileImage\" content=\"/mstile-144x144.png\">
        <meta name=\"theme-color\" content=\"#ffffff\">
        ";
        // line 34
        $this->displayBlock('meta', $context, $blocks);
        // line 35
        echo "        
        
        <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\" />
        
        <script src=\"/js/jquery.min.js\"></script>
        <link rel=\"stylesheet\" href=\"/css/animate.css\">
        <script src=\"/js/jwaypoints/jquery.waypoints.min.js\"></script>
        
        <link rel=\"stylesheet\" href=\"/css/fontawsome/css/font-awesome.min.css\">
        <link rel=\"stylesheet\" href=\"/css/rippler/dist/css/rippler.min.css\">
        <script src=\"/css/rippler/dist/js/jquery.rippler.min.js\"></script>

        <script type=\"text/javascript\" src=\"/css/jquery-timepicker-master/lib/bootstrap-datepicker.js\"></script>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/jquery-timepicker-master/lib/bootstrap-datepicker.css\" />
        <script src=\"/css/datepair/dist/datepair.js\"></script>
        <script src=\"/css/datepair/dist/jquery.datepair.js\"></script>
        
        <link href=\"/js/jquery.scrollbar/jquery.scrollbar.css\" rel=\"stylesheet\">
        <script src=\"/js/jquery.scrollbar/jquery.scrollbar.min.js\"></script>   
      
        <link href=\"/js/fancybox/fancybox/jquery.fancybox-1.3.4.css\" rel=\"stylesheet\">
        <script src=\"/js/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js\"></script>    

        
        <link href=\"/js/tooltipster-master/css/tooltipster.css\" rel=\"stylesheet\">
        <link href=\"/js/tooltipster-master/css/themes/tooltipster-light.css\" rel=\"stylesheet\">
        <script src=\"/js/tooltipster-master/js/jquery.tooltipster.min.js\"></script>      
        
        <script src=\"/js/prettyloader/js/jquery.prettyLoader.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<link rel=\"stylesheet\" href=\"/js/prettyloader/css/prettyLoader.css\" type=\"text/css\" media=\"screen\" charset=\"utf-8\" />
                
        <script src=\"//maps.googleapis.com/maps/api/js?key=AIzaSyDrDcdgTitaBN0crJOZP_Go8-5DoI3-fGQ\" type=\"text/javascript\"></script>
        
        <script src=\"/js/tageditor/jquery.caret.min.js\"></script>
        <script src=\"/js/tageditor/jquery.tag-editor.min.js\"></script>
        
        <script src=\"/js/jquery-ui-custom/jquery-ui.min.js\"></script>  
        
        <link href=\"/js/lightgallery/css/lightgallery.css\" rel=\"stylesheet\">
        <script src=\"/js/lightgallery/js/lightgallery.js\"></script>
        <script src=\"/js/lightgallery/js/lg-video.js\"></script>
        ";
        // line 77
        echo "        <script src='https://www.google.com/recaptcha/api.js'></script>

        ";
        // line 79
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 80
        echo "        
        <link rel=\"stylesheet\" href=\"/css/main.css?v=3.4.5\" />
        <script src=\"/js/main.js?v=3.4.5\"></script>
    </head>
    <body data-language=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), "html", null, true);
        echo "\">
        ";
        // line 85
        $this->displayBlock('after_body', $context, $blocks);
        // line 86
        echo "        <div class=\"top\">
            
            <div class=\"header\">
                <div class=\"size\">
                    <div class=\"left search\">
                        <div class=\"bg\"><i class=\"fa fa-search\"></i><input type=\"text\" data-url=\"";
        // line 91
        echo $this->env->getExtension('routing')->getPath("search");
        echo "\" autocomplete=\"off\" class=\"search-input\" name=\"search\" data-placeholder=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoba lub miejsce..."), "html", null, true);
        echo "\"></div>
                        <div class=\"result\"><div class=\"inner\"><h4 style=\"\"><i class=\"fa fa-fw fa-search\"></i> ";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wyszukiwarka"), "html", null, true);
        echo "</h4><p>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wpisz imię i nazwisko osoby zmarłej, nazwę upamiętnianego miejsca, miasto lub nazwę cmentarza"), "html", null, true);
        echo "</p></div></div>
                    </div>    

                    ";
        // line 107
        echo "                        
                    ";
        // line 108
        if ( !array_key_exists("code", $context)) {
            $context["code"] = null;
        }
        // line 109
        echo "                        
                    <div class=\"right spec language dropwrapper\">
                        <span class=\"click\">
                        <img src=\"/images/flags/";
        // line 112
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), "html", null, true);
        echo ".png\" alt=\"Language ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), "html", null, true);
        echo "\"> <i class=\"fa fa-caret-down\"></i>
                        </span>
                        <div class=\"dropmenu\"> 
                        ";
        // line 115
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["locales"]) ? $context["locales"] : $this->getContext($context, "locales")));
        foreach ($context['_seq'] as $context["_key"] => $context["locale"]) {
            // line 116
            echo "                            ";
            $context["url"] = $this->env->getExtension('app_extension')->extendUrl(array("_locale" => $context["locale"]));
            // line 117
            echo "                            ";
            if (twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array(0 => "homepage", 1 => "page"))) {
                // line 118
                echo "                               ";
                $context["url"] = $this->env->getExtension('routing')->getPath(($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") . "_locale"), array("_locale" => $context["locale"], "code" => (isset($context["code"]) ? $context["code"] : $this->getContext($context, "code"))));
                echo " 
                               ";
                // line 119
                if (($context["locale"] == (isset($context["default_locale"]) ? $context["default_locale"] : $this->getContext($context, "default_locale")))) {
                    // line 120
                    echo "                                  ";
                    $context["url"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("code" => (isset($context["code"]) ? $context["code"] : $this->getContext($context, "code"))));
                    echo " 
                               ";
                }
                // line 121
                echo "    
                            ";
            }
            // line 123
            echo "                            ";
            if (twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array(0 => "homepage_locale"))) {
                // line 124
                echo "                               ";
                $context["url"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("_locale" => $context["locale"]));
                echo " 
                               ";
                // line 125
                if (($context["locale"] == (isset($context["default_locale"]) ? $context["default_locale"] : $this->getContext($context, "default_locale")))) {
                    // line 126
                    echo "                                  ";
                    $context["url"] = $this->env->getExtension('routing')->getPath("homepage");
                    echo " 
                               ";
                }
                // line 127
                echo "    
                            ";
            }
            // line 129
            echo "                            ";
            if (twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array(0 => "page_locale"))) {
                // line 130
                echo "                               ";
                $context["url"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("_locale" => $context["locale"], "code" => (isset($context["code"]) ? $context["code"] : $this->getContext($context, "code"))));
                echo " 
                               ";
                // line 131
                if (($context["locale"] == (isset($context["default_locale"]) ? $context["default_locale"] : $this->getContext($context, "default_locale")))) {
                    // line 132
                    echo "                                  ";
                    $context["url"] = $this->env->getExtension('routing')->getPath("page", array("code" => (isset($context["code"]) ? $context["code"] : $this->getContext($context, "code"))));
                    echo " 
                               ";
                }
                // line 133
                echo "    
                            ";
            }
            // line 135
            echo "                            
                            <a href=\"";
            // line 136
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "html", null, true);
            echo "\"><img src=\"/images/flags/";
            echo twig_escape_filter($this->env, $context["locale"], "html", null, true);
            echo ".png\" class=\"tip\" title=\"";
            echo twig_escape_filter($this->env, $context["locale"], "html", null, true);
            echo "\" alt=\"Language ";
            echo twig_escape_filter($this->env, $context["locale"], "html", null, true);
            echo "\"></a>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['locale'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        echo " 
                        </div> 
                        
                    </div>

                        
                    ";
        // line 143
        $context["user"] = $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array());
        // line 144
        echo "                    ";
        if ( !(null === (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")))) {
            // line 145
            echo "  
                    <div class=\"right messages logout \">
                        <a href=\"";
            // line 147
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\" class=\"tip\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wyloguj"), "html", null, true);
            echo "\"><i class=\"fa fa-power-off\"></i></a>
                    </div>    
                    <div class=\"right messages settings biger\">
                        <a href=\"";
            // line 150
            echo $this->env->getExtension('routing')->getPath("profile_edit");
            echo "\" class=\"tip\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ustawienia"), "html", null, true);
            echo "\"><i class=\"fa fa-gear\"></i></a>
                    </div>      
                    <div class=\"right messages\">
                        <a href=\"";
            // line 153
            echo $this->env->getExtension('routing')->getPath("message_list");
            echo "\" class=\"tip\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wiadomości"), "html", null, true);
            echo "\"><i class=\"fa fa-envelope\"></i>";
            echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Message:info"));
            echo "</a>
                    </div>    
                    <div class=\"right messages cart biger first\">
                        <a href=\"";
            // line 156
            echo $this->env->getExtension('routing')->getPath("cart");
            echo "\" class=\"tip\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Koszyk"), "html", null, true);
            echo "\"><i class=\"fa fa-shopping-cart\"></i>";
            echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:infoCart"));
            echo "</a>
                    </div>  

                    
                    ";
        }
        // line 160
        echo "    

                    <div class=\"right person navnotmobile dropwrapper\">
                        ";
        // line 163
        $this->displayBlock('top_right', $context, $blocks);
        // line 259
        echo "                    </div>
                    
                    <div class=\"right person navmobile dropwrapper topaccount\">
                        
                        ";
        // line 263
        $context["user"] = $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array());
        // line 264
        echo "                        ";
        if ( !(null === (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")))) {
            // line 265
            echo "                        ";
        } else {
            // line 266
            echo "                            <a class=\"sometimes\" href=\"";
            echo $this->env->getExtension('routing')->getPath("register");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestracja"), "html", null, true);
            echo "</a>
                            <span class=\"sometimes separator\"></span>
                            <a href=\"";
            // line 268
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logowanie"), "html", null, true);
            echo "</a>
                        ";
        }
        // line 270
        echo "                        
                    </div>  

                    
                </div>
            </div>
                    
               ";
        // line 277
        $context["url"] = $this->env->getExtension('routing')->getPath("homepage_locale", array("_locale" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
        echo " 
               ";
        // line 278
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()) == (isset($context["default_locale"]) ? $context["default_locale"] : $this->getContext($context, "default_locale")))) {
            // line 279
            echo "                  ";
            $context["url"] = $this->env->getExtension('routing')->getPath("homepage");
            echo " 
               ";
        }
        // line 280
        echo "   
               
                    
                
            <div class=\"main\">
                <div class=\"size\">
                    <a class=\"home\" href=\"";
        // line 286
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()) == (isset($context["default_locale"]) ? $context["default_locale"] : $this->getContext($context, "default_locale")))) {
            echo $this->env->getExtension('routing')->getPath("homepage");
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("homepage_locale", array("_locale" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        }
        echo "\"><img src=\"/images/ememoria.png\"></a>
                    <div class=\"nav\">
                    <div class=\"ico navmobile\"><i class=\"fa fa-bars\"></i></div>    
                    <ul>";
        // line 289
        $context["user"] = $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array());
        // line 290
        echo "                        ";
        if ( !(null === (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")))) {
            // line 291
            echo "                            
                            ";
            // line 292
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin")))) {
                // line 293
                echo "                                <li class=\"navmobile\"><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel administracyjny"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 295
            echo "                            ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "worker")))) {
                // line 296
                echo "                                <li class=\"navmobile\"><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel pracownika"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 298
            echo "                            ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "trader")))) {
                // line 299
                echo "                                <li class=\"navmobile\"><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel handlowca"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 301
            echo "                            ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "contractor")))) {
                // line 302
                echo "                                <li class=\"navmobile\"><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel wykonawcy"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 304
            echo "                            ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "partner")))) {
                // line 305
                echo "                                <li class=\"navmobile\"><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel partnera"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 307
            echo "
                            ";
            // line 308
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "partner")))) {
                // line 309
                echo "                                <li class=\"navmobile\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("shop");
                echo "\"><i class=\"fa fa-fw fa-shopping-cart\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sklep dla partnerów"), "html", null, true);
                echo "</a></li>   
                            ";
            }
            // line 311
            echo "
                            ";
            // line 312
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker")))) {
                // line 313
                echo "                                <li class=\"navmobile\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("text_list");
                echo "\"><i class=\"fa fa-fw fa-file-text-o\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Teksty"), "html", null, true);
                echo "</a></li>   
                            ";
            }
            // line 315
            echo "                            ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin")))) {
                // line 316
                echo "                                <li class=\"navmobile\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("admin");
                echo "\"><i class=\"fa fa-fw fa-wrench\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Administracja"), "html", null, true);
                echo "</a></li>   
                            ";
            }
            // line 318
            echo "
                            
                            ";
            // line 320
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader")))) {
                // line 321
                echo "
                                ";
                // line 322
                if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker")))) {
                    // line 323
                    echo "                                <li class=\"navmobile\"><a href=\"";
                    echo $this->env->getExtension('routing')->getPath("questions_list");
                    echo "\"><i class=\"fa fa-fw fa-question-circle\"></i>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zapytania i opinie"), "html", null, true);
                    echo " ";
                    echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Message:infoQuestions"));
                    echo "</a></li>
                                ";
                }
                // line 324
                echo "  

                                <li class=\"navmobile\"><a href=\"";
                // line 326
                echo $this->env->getExtension('routing')->getPath("user_list");
                echo "\"><i class=\"fa fa-fw fa-users\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Użytkownicy"), "html", null, true);
                echo "</a></li>
                                <li class=\"navmobile\"><a href=\"";
                // line 327
                echo $this->env->getExtension('routing')->getPath("product_list");
                echo "\"><i class=\"fa fa-fw fa-cube\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Produkty"), "html", null, true);
                echo "</a></li>
                                <li class=\"navmobile\"><a href=\"";
                // line 328
                echo $this->env->getExtension('routing')->getPath("code_list");
                echo "\"><i class=\"fa fa-fw fa-qrcode\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kody"), "html", null, true);
                echo "</a></li>
                                <li class=\"navmobile\"><a href=\"";
                // line 329
                echo $this->env->getExtension('routing')->getPath("country_list");
                echo "\"><i class=\"fa fa-fw fa-map\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kraje"), "html", null, true);
                echo "</a></li>
                                <li class=\"navmobile\"><a href=\"";
                // line 330
                echo $this->env->getExtension('routing')->getPath("mail_list");
                echo "\"><i class=\"fa fa-fw fa-info-circle\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Powiadomienia"), "html", null, true);
                echo "</a></li>

                                <li class=\"navmobile\"><a href=\"";
                // line 332
                echo $this->env->getExtension('routing')->getPath("page_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-newspaper-o\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie strony"), "html", null, true);
                echo "</a></li>
                                <li class=\"navmobile\"><a  class=\"badge-link\" data-badge-link=\"";
                // line 333
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cemetery_list", array("ad" => 1, "p_state" => 2)), "html", null, true);
                echo "\"  href=\"";
                echo $this->env->getExtension('routing')->getPath("cemetery_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-bank\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie cmentarze"), "html", null, true);
                echo " ";
                echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Cemetery:info", array("ad" => 1)));
                echo "</a></li>                
                                <li class=\"navmobile\"><a href=\"";
                // line 334
                echo $this->env->getExtension('routing')->getPath("family_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-group\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie rodziny"), "html", null, true);
                echo "</a></li>
                                <li class=\"navmobile\"><a href=\"";
                // line 335
                echo $this->env->getExtension('routing')->getPath("order_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-shopping-cart\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienia do realizacji"), "html", null, true);
                echo " ";
                echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:info", array("ad" => 1)));
                echo "</a></li>

                            ";
            }
            // line 338
            echo "
                            ";
            // line 339
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "contractor", 4 => "partner")))) {
                // line 340
                echo "                                <li class=\"navmobile\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("contract_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-fire\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usługi do wykonania"), "html", null, true);
                echo " ";
                echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:infoContract", array("ad" => 1)));
                echo "</a></li>   
                            ";
            }
            // line 342
            echo "                            
                            ";
            // line 343
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "contractor", 1 => "partner")))) {
                // line 344
                echo "                                <li class=\"navmobile\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("profile_address");
                echo "\"><i class=\"fa fa-fw fa-truck\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane adresowe"), "html", null, true);
                echo "</a></li>   
                            ";
            }
            // line 346
            echo "                            
                            ";
            // line 347
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "contractor", 4 => "partner")))) {
                echo "    
                                <li class=\"navmobile\"><span>";
                // line 348
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Konto Epado"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 350
            echo "                            
                            
                            <li class=\"navmobile\"><a href=\"";
            // line 352
            echo $this->env->getExtension('routing')->getPath("panel");
            echo "\"><i class=\"fa fa-fw fa-user\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje konto"), "html", null, true);
            echo "</a></li>
                            ";
            // line 354
            echo "                            <li class=\"navmobile\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("page_list");
            echo "\"><i class=\"fa fa-fw fa-newspaper-o\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje strony"), "html", null, true);
            echo "</a></li>
                            <li class=\"navmobile\"><a href=\"";
            // line 355
            echo $this->env->getExtension('routing')->getPath("cemetery_list");
            echo "\"><i class=\"fa fa-fw fa-bank\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cmentarze"), "html", null, true);
            echo "</a></li>
                            <li class=\"navmobile\"><a href=\"";
            // line 356
            echo $this->env->getExtension('routing')->getPath("family_list");
            echo "\"><i class=\"fa fa-fw fa-group\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rodziny"), "html", null, true);
            echo "</a></li>
                            <li class=\"navmobile\"><a href=\"";
            // line 357
            echo $this->env->getExtension('routing')->getPath("order_list");
            echo "\"><i class=\"fa fa-fw fa-shopping-cart\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienia"), "html", null, true);
            echo " ";
            echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:info"));
            echo "</a></li>
                            <li class=\"navmobile\"><a href=\"";
            // line 358
            echo $this->env->getExtension('routing')->getPath("contract_list");
            echo "\"><i class=\"fa fa-fw fa-fire\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówione usługi"), "html", null, true);
            echo " ";
            echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:infoContract"));
            echo "</a></li>
                            
                            ";
            // line 360
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "contractor")))) {
                // line 361
                echo "                                <li class=\"navmobile\"><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona główna"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 362
            echo " 
                            
                        ";
        } else {
            // line 365
            echo "                            <li class=\"navmobile\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("register");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestracja"), "html", null, true);
            echo "</a></li>
                            <li class=\"navmobile\"><a href=\"";
            // line 366
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logowanie"), "html", null, true);
            echo "</a></li>
                        ";
        }
        // line 368
        echo "                        
                        <li><a href=\"";
        // line 369
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "html", null, true);
        echo "#what\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Czym jestem"), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 370
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "html", null, true);
        echo "#work\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Jak działam"), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 371
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "html", null, true);
        echo "#price\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cennik"), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 372
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "html", null, true);
        echo "#footer\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kontakt"), "html", null, true);
        echo "</a></li>
                    </ul>  
                    </div>
                </div>
            </div>  

        </div>
                    
        <div class=\"wrapper\">
   
            <div class=\"content-wrapper\">
            ";
        // line 383
        $this->displayBlock('body', $context, $blocks);
        // line 384
        echo "            </div>
            
            <div class=\"footer\" id=\"footer\">
                <div class=\"size\">
                    <div class=\"contact col\">
                        <h4 class=\"triggerMany delay12\" data-animate=\"pulse\">";
        // line 389
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kontakt"), "html", null, true);
        echo "</h4>
                        <p>
                            Stono Sp. z o. o.<br>
                            Wspólna 50A/35, Warszawa<br>
                            <a href=\"mailto:office@epado.com\">office@epado.com</a><br>
                            ";
        // line 394
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("tel."), "html", null, true);
        echo ": +48502502188<br>
                            NIP: 7010387978,<br> REGON: 14677061500000
                            <br><br>
                            Copyright ";
        // line 397
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " Stono Sp. z o. o.
                        </p>
                    </div>
                    <div class=\"find col\">
                        <h4 class=\"triggerMany delay12\" data-animate=\"pulse\">";
        // line 401
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Znajdź nas"), "html", null, true);
        echo "</h4>
                        <p>
                           ";
        // line 403
        if ($this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : null), "twitter", array(), "array", false, true), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array", true, true)) {
            // line 404
            echo "                           <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : $this->getContext($context, "social")), "twitter", array(), "array"), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array"), "html", null, true);
            echo "\"><i class=\"fa fa-twitter\"></i></a> 
                           ";
        }
        // line 406
        echo "                           ";
        if ($this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : null), "facebook", array(), "array", false, true), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array", true, true)) {
            // line 407
            echo "                           <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : $this->getContext($context, "social")), "facebook", array(), "array"), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array"), "html", null, true);
            echo "\"><i class=\"fa fa-facebook\"></i></a> 
                           ";
        }
        // line 409
        echo "                           ";
        if ($this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : null), "youtube", array(), "array", false, true), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array", true, true)) {
            // line 410
            echo "                           <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : $this->getContext($context, "social")), "youtube", array(), "array"), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array"), "html", null, true);
            echo "\"><i class=\"fa fa-youtube-play\"></i></a> 
                           ";
        }
        // line 412
        echo "                           ";
        if ($this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : null), "instagram", array(), "array", false, true), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array", true, true)) {
            // line 413
            echo "                           <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["social"]) ? $context["social"] : $this->getContext($context, "social")), "instagram", array(), "array"), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), array(), "array"), "html", null, true);
            echo "\"><i class=\"fa fa-instagram\"></i></a>
                           ";
        }
        // line 415
        echo "                        </p>
                        <br>
                        <p>";
        // line 417
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Płatności obsługuje"), "html", null, true);
        echo ":</p>
                        <p>
                        <img src=\"/images/payu.png\" width=\"100\" >
                        </p>
                    </div>
                        
                        
                    <div class=\"menu col\">
                        <h4 class=\"triggerMany delay12\" data-animate=\"pulse\">";
        // line 425
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Menu"), "html", null, true);
        echo "</h4>
                        <ul>
                            <li><a href=\"";
        // line 427
        echo $this->env->getExtension('routing')->getPath("rules");
        echo "\"><i class=\"fa fa-fw fa-certificate\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Regulamin serwisu"), "html", null, true);
        echo "</a></li>
                            <li><a href=\"";
        // line 428
        echo $this->env->getExtension('routing')->getPath("prv");
        echo "\"><i class=\"fa fa-fw fa-certificate\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Polityka prywatności"), "html", null, true);
        echo "</a></li>
                            <li><a href=\"";
        // line 429
        echo $this->env->getExtension('routing')->getPath("login");
        echo "\"><i class=\"fa fa-fw fa-user\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logowanie"), "html", null, true);
        echo "</a></li>
                            <li><a href=\"";
        // line 430
        echo $this->env->getExtension('routing')->getPath("register");
        echo "\"><i class=\"fa fa-fw fa-user-plus\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestracja"), "html", null, true);
        echo "</a></li>
                            <li><a href=\"";
        // line 431
        echo $this->env->getExtension('routing')->getPath("reset");
        echo "\"><i class=\"fa fa-fw fa-key\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zapomniałem hasła"), "html", null, true);
        echo "</a></li>
                            <li><a href=\"";
        // line 432
        echo $this->env->getExtension('routing')->getPath("page_form");
        echo "\"><i class=\"fa fa-fw fa-plus\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj stronę"), "html", null, true);
        echo "</a></li>
                            <li><a href=\"/\" class=\"contactus";
        // line 433
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "show"), "method") == "contact-us")) {
            echo " show";
        }
        echo "\"><i class=\"fa fa-fw fa-envelope\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wyślij do nas sugestie"), "html", null, true);
        echo "</a>
                            <div class=\"hidden\">
                            <h1><i class=\"fa fa-envelope\"></i>";
        // line 435
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Twoja sugestia"), "html", null, true);
        echo "</h1>
                            <div class=\"content\">
                            <form action=\"";
        // line 437
        echo $this->env->getExtension('routing')->getPath("contact");
        echo "\" method=\"post\">
                                <input type=\"hidden\" id=\"type\" name=\"type\" value=\"idea\" />
                                 
                                <div class=\"widget\">
                                    <label for=\"name\">";
        // line 441
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Twój adres IP"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"name\" name=\"name\" value=\"";
        // line 442
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->getIpAddress(), "html", null, true);
        echo "\" disabled /></div>
                                </div>
                                <div class=\"widget\">
                                    <label for=\"name\">";
        // line 445
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Imię i nazwisko"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"name\" name=\"name\" value=\"\" required=\"required\" autocomplete=\"off\" /><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>";
        // line 446
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("To pole jest wymagane"), "html", null, true);
        echo "</li></ul></div>
                                </div>
                                <div class=\"widget\">
                                    <label for=\"mail\">";
        // line 449
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres email"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"mail\" name=\"mail\" value=\"\" required=\"required\" autocomplete=\"off\" /><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>";
        // line 450
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("To pole jest wymagane"), "html", null, true);
        echo "</li></ul></div>
                                </div>  
                                <div class=\"widget\">
                                    <label for=\"subject\">";
        // line 453
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Temat"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"subject\" name=\"subject\" value=\"\" required=\"required\" autocomplete=\"off\" /><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>";
        // line 454
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("To pole jest wymagane"), "html", null, true);
        echo "</li></ul></div>
                                </div>
                                <div class=\"widget\">
                                    <label for=\"message\">";
        // line 457
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wiadomość"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><textarea id=\"message\" name=\"message\" required=\"required\"></textarea><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>";
        // line 458
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("To pole jest wymagane"), "html", null, true);
        echo "</li></ul></div>
                                </div> 
                                <div class=\"widget\">
                                    <div class=\"field\">
                                    <div class=\"captcha\"></div>
                                    </div>
                                </div> 
                                
                                
                                <button type=\"submit\" name=\"submit\">";
        // line 467
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wyślij wiadomość"), "html", null, true);
        echo "</button>
                            </form>
                            </div>
                            </div>
                            </li>
                            
                            <li><a href=\"/\" class=\"contactus\"><i class=\"fa fa-fw fa-envelope\"></i>";
        // line 473
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Formularz reklamacyjny"), "html", null, true);
        echo "</a>
                            <div class=\"hidden\">
                            <h1><i class=\"fa fa-envelope\"></i>";
        // line 475
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Formularz reklamacyjny"), "html", null, true);
        echo "</h1>
                            <div class=\"content\">
                            <form action=\"";
        // line 477
        echo $this->env->getExtension('routing')->getPath("contact");
        echo "\" method=\"post\">
                                <input type=\"hidden\" id=\"type\" name=\"type\" value=\"complaint\" />
                                
                                <div class=\"widget\" style=\"display:none;\">
                                    <label for=\"name\">";
        // line 481
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Twój adres IP"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"name\" name=\"name\" value=\"";
        // line 482
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->getIpAddress(), "html", null, true);
        echo "\" disabled /></div>
                                </div>
                                <div class=\"widget\">
                                    <label for=\"name\">";
        // line 485
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Imię i nazwisko"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"name\" name=\"name\" value=\"\" required=\"required\" autocomplete=\"off\" /><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>";
        // line 486
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("To pole jest wymagane"), "html", null, true);
        echo "</li></ul></div>
                                </div>
                                <div class=\"widget\">
                                    <label for=\"mail\">";
        // line 489
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres email"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"mail\" name=\"mail\" value=\"\" required=\"required\" autocomplete=\"off\" /><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>";
        // line 490
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("To pole jest wymagane"), "html", null, true);
        echo "</li></ul></div>
                                </div>  
                                <div class=\"widget\">
                                    <label for=\"subject\">";
        // line 493
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Temat"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"subject\" name=\"subject\" value=\"\" required=\"required\" autocomplete=\"off\" /><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>";
        // line 494
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("To pole jest wymagane"), "html", null, true);
        echo "</li></ul></div>
                                </div>
                                <div class=\"widget\">
                                    <label for=\"message\">";
        // line 497
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opis reklamacji"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><textarea id=\"message\" name=\"message\" required=\"required\"></textarea><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>";
        // line 498
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("To pole jest wymagane"), "html", null, true);
        echo "</li></ul></div>
                                </div> 
                                <div class=\"widget\">
                                    <div class=\"field\">
                                    <div class=\"captcha\"></div>
                                    </div>
                                </div> 
                                
                                
                                <button type=\"submit\" name=\"submit\">";
        // line 507
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wyślij zgłoszenie"), "html", null, true);
        echo "</button>
                            </form>
                            </div>
                            </div>
                            </li>
                            
                            <li><a href=\"/\" class=\"contactus\"><i class=\"fa fa-fw fa-users\"></i>";
        // line 513
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zostań partnerem"), "html", null, true);
        echo "</a>
                            <div class=\"hidden\">
                            <h1><i class=\"fa fa-envelope\"></i>";
        // line 515
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zostań partnerem"), "html", null, true);
        echo "</h1>
                            <div class=\"content\">
                            <form action=\"";
        // line 517
        echo $this->env->getExtension('routing')->getPath("contact");
        echo "\" method=\"post\">
                                <input type=\"hidden\" id=\"type\" name=\"type\" value=\"partner\" />
                                <div class=\"widget\" style=\"display:none;\">
                                    <label for=\"name\">";
        // line 520
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Twój adres IP"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"name\" name=\"name\" value=\"";
        // line 521
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->getIpAddress(), "html", null, true);
        echo "\" disabled /></div>
                                </div>
                                <div class=\"widget\">
                                    <label for=\"name\">";
        // line 524
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Imię i nazwisko"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"name\" name=\"name\" value=\"\" required=\"required\" autocomplete=\"off\" /><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>To pole jest wymagane</li></ul></div>
                                </div>
                                <div class=\"widget\">
                                    <label for=\"mail\">";
        // line 528
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres email"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"mail\" name=\"mail\" value=\"\" required=\"required\" autocomplete=\"off\" /><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>To pole jest wymagane</li></ul></div>
                                </div>  
                                <div class=\"widget\">
                                    <label for=\"subject\">";
        // line 532
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Temat"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><input type=\"text\" id=\"subject\" name=\"subject\" value=\"";
        // line 533
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Program partnerski"), "html", null, true);
        echo "\" required=\"required\" autocomplete=\"off\" /><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>To pole jest wymagane</li></ul></div>
                                </div>
                                <div class=\"widget\">
                                    <label for=\"message\">";
        // line 536
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wiadomość"), "html", null, true);
        echo "</label>
                                    <div class=\"field\"><textarea id=\"message\" name=\"message\" required=\"required\"></textarea><ul class=\"errors hidden\"><li><i class=\"fa fa-warning fa-fw\"></i>To pole jest wymagane</li></ul></div>
                                </div> 
                                <div class=\"widget\">
                                    <div class=\"field\">
                                    <div class=\"captcha\"></div>
                                    </div>
                                </div>
                                <button type=\"submit\" name=\"submit\">";
        // line 544
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wyślij wiadomość"), "html", null, true);
        echo "</button>
                            </form>
                            </div>
                            </div>
                            
                            </li>
                        </ul>    
                    </div>
                    
                            
                    <div class=\"info col\">
                        <h4 class=\"triggerMany delay12\" data-animate=\"pulse\">";
        // line 555
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Informacje"), "html", null, true);
        echo "</h4>
                        <p>
                           ";
        // line 557
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona Epado używa ciasteczka w celu usprawnienia działania strony i użycia niektórych jej funkcjonalności. Jeżeli nie zgadzasz się na używanie ciastek przez naszą stronę możesz zmienić ustawienia swojej przeglądarki lub opuścić stronę."), "html", null, true);
        echo " 
                        </p>
                    </div>
                    
                </div>
            <div>
            
        </div>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-75772683-1', 'auto');
          ga('send', 'pageview');

        </script>  
        <a href=\"#\" class=\"up triggerAnimation fadeInDown\"><i class=\"fa fa-arrow-circle-up\" aria-hidden=\"true\"></i></a>
    </body>
</html>
";
    }

    // line 34
    public function block_meta($context, array $blocks = array())
    {
    }

    // line 79
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 85
    public function block_after_body($context, array $blocks = array())
    {
    }

    // line 163
    public function block_top_right($context, array $blocks = array())
    {
        // line 164
        echo "                            ";
        $context["user"] = $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array());
        // line 165
        echo "                            ";
        if ( !(null === (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")))) {
            // line 166
            echo "                                <span class=\"click\">
                                    <div class=\"avatar circle\" style=\"background-image:url('";
            // line 167
            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "60x60", "file" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "avatar", array())))), "html", null, true);
            echo "');\"></div>
                                    <span>";
            // line 168
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel"), "html", null, true);
            echo "</span>
                                </span>
                                
                                <div class=\"dropmenu\"> 
                                    <ul>
                            ";
            // line 173
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin")))) {
                // line 174
                echo "                                <li><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel administracyjny"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 176
            echo "                            ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "worker")))) {
                // line 177
                echo "                                <li><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel pracownika"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 179
            echo "                            ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "trader")))) {
                // line 180
                echo "                                <li><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel handlowca"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 182
            echo "                            ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "contractor")))) {
                // line 183
                echo "                                <li><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel wykonawcy"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 185
            echo "                            ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "partner")))) {
                // line 186
                echo "                                <li><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel partnera"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 187
            echo "   

                            
                            ";
            // line 190
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "partner")))) {
                // line 191
                echo "                                <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("shop");
                echo "\"><i class=\"fa fa-fw fa-shopping-cart\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sklep dla partnerów"), "html", null, true);
                echo "</a></li>   
                            ";
            }
            // line 193
            echo "
                            ";
            // line 194
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker")))) {
                // line 195
                echo "                                <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("text_list");
                echo "\"><i class=\"fa fa-fw fa-file-text-o\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Teksty"), "html", null, true);
                echo "</a></li>   
                            ";
            }
            // line 197
            echo "                            ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin")))) {
                // line 198
                echo "                                <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("admin");
                echo "\"><i class=\"fa fa-fw fa-wrench\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Administracja"), "html", null, true);
                echo "</a></li>   
                            ";
            }
            // line 200
            echo "                            
                            
                            ";
            // line 202
            if ((( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "partner"))) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "ads", array()))) {
                // line 203
                echo "                                <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("ads");
                echo "\"><i class=\"fa fa-fw fa-wrench\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje reklamy"), "html", null, true);
                echo "</a></li>  
                            ";
            }
            // line 205
            echo "
                            ";
            // line 206
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "partner")))) {
                // line 207
                echo "                                <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("sold");
                echo "\"><i class=\"fa fa-fw fa-qrcode\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje kody"), "html", null, true);
                echo "</a></li>  
                            ";
            }
            // line 208
            echo "    

                            ";
            // line 210
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader")))) {
                // line 211
                echo "
";
                // line 213
                echo "
                                ";
                // line 214
                if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker")))) {
                    // line 215
                    echo "                                <li><a href=\"";
                    echo $this->env->getExtension('routing')->getPath("questions_list");
                    echo "\"><i class=\"fa fa-fw fa-question-circle\"></i>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zapytania i opinie"), "html", null, true);
                    echo " ";
                    echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Message:infoQuestions"));
                    echo "</a></li>
                                ";
                }
                // line 216
                echo "  

                                <li><a href=\"";
                // line 218
                echo $this->env->getExtension('routing')->getPath("user_list");
                echo "\"><i class=\"fa fa-fw fa-users\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Użytkownicy"), "html", null, true);
                echo "</a></li>
                                <li><a href=\"";
                // line 219
                echo $this->env->getExtension('routing')->getPath("product_list");
                echo "\"><i class=\"fa fa-fw fa-cube\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Produkty"), "html", null, true);
                echo "</a></li>
                                <li><a href=\"";
                // line 220
                echo $this->env->getExtension('routing')->getPath("code_list");
                echo "\"><i class=\"fa fa-fw fa-qrcode\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kody"), "html", null, true);
                echo "</a></li>
                                <li><a href=\"";
                // line 221
                echo $this->env->getExtension('routing')->getPath("country_list");
                echo "\"><i class=\"fa fa-fw fa-map\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kraje"), "html", null, true);
                echo "</a></li>
                                <li><a href=\"";
                // line 222
                echo $this->env->getExtension('routing')->getPath("mail_list");
                echo "\"><i class=\"fa fa-fw fa-info-circle\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Powiadomienia"), "html", null, true);
                echo "</a></li>

                                
                                <li><a href=\"";
                // line 225
                echo $this->env->getExtension('routing')->getPath("page_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-newspaper-o\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie strony"), "html", null, true);
                echo "</a></li>
                                <li><a  class=\"badge-link\" data-badge-link=\"";
                // line 226
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cemetery_list", array("ad" => 1, "p_state" => 2)), "html", null, true);
                echo "\"  href=\"";
                echo $this->env->getExtension('routing')->getPath("cemetery_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-bank\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie cmentarze"), "html", null, true);
                echo " ";
                echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Cemetery:info", array("ad" => 1)));
                echo "</a></li>                
                                <li><a href=\"";
                // line 227
                echo $this->env->getExtension('routing')->getPath("family_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-group\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie rodziny"), "html", null, true);
                echo "</a></li>
                                <li><a href=\"";
                // line 228
                echo $this->env->getExtension('routing')->getPath("order_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-shopping-cart\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienia do realizacji"), "html", null, true);
                echo " ";
                echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:info", array("ad" => 1)));
                echo "</a></li>

                            ";
            }
            // line 231
            echo "
                            ";
            // line 232
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "contractor")))) {
                // line 233
                echo "                                <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("contract_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-fire\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usługi do wykonania"), "html", null, true);
                echo " ";
                echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:infoContract", array("ad" => 1)));
                echo "</a></li>   
                            ";
            }
            // line 235
            echo "                            ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "contractor", 1 => "partner", 2 => "trader")))) {
                // line 236
                echo "                                <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("profile_address");
                echo "\"><i class=\"fa fa-fw fa-truck\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane adresowe"), "html", null, true);
                echo "</a></li>   
                            ";
            }
            // line 238
            echo "                            
                            ";
            // line 239
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "contractor", 4 => "partner")))) {
                // line 240
                echo "                                <li class=\"title\"><span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Konto Epado"), "html", null, true);
                echo "</span></li>
                            ";
            }
            // line 241
            echo "   
                            
                            <li><a href=\"";
            // line 243
            echo $this->env->getExtension('routing')->getPath("panel");
            echo "\"><i class=\"fa fa-fw fa-user\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje konto"), "html", null, true);
            echo "</a></li>
                            <li><a href=\"";
            // line 244
            echo $this->env->getExtension('routing')->getPath("page_list");
            echo "\"><i class=\"fa fa-fw fa-newspaper-o\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje strony"), "html", null, true);
            echo "</a></li>
                            <li><a href=\"";
            // line 245
            echo $this->env->getExtension('routing')->getPath("cemetery_list");
            echo "\"><i class=\"fa fa-fw fa-bank\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cmentarze"), "html", null, true);
            echo "</a></li>
                            <li><a href=\"";
            // line 246
            echo $this->env->getExtension('routing')->getPath("family_list");
            echo "\"><i class=\"fa fa-fw fa-group\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rodziny"), "html", null, true);
            echo "</a></li>
                            <li><a href=\"";
            // line 247
            echo $this->env->getExtension('routing')->getPath("order_list");
            echo "\"><i class=\"fa fa-fw fa-shopping-cart\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienia"), "html", null, true);
            echo " ";
            echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:info"));
            echo "</a></li>
                            <li><a href=\"";
            // line 248
            echo $this->env->getExtension('routing')->getPath("contract_list");
            echo "\"><i class=\"fa fa-fw fa-fire\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówione usługi"), "html", null, true);
            echo " ";
            echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:infoContract"));
            echo "</a></li>

                            
                                    </ul>    
                                </div>  
                            ";
        } else {
            // line 254
            echo "                                <a href=\"";
            echo $this->env->getExtension('routing')->getPath("register");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestracja"), "html", null, true);
            echo "</a>
                                <span class=\"separator\"></span>
                                <a href=\"";
            // line 256
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logowanie"), "html", null, true);
            echo "</a>
                            ";
        }
        // line 258
        echo "                        ";
    }

    // line 383
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "wrapper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1483 => 383,  1479 => 258,  1472 => 256,  1464 => 254,  1451 => 248,  1443 => 247,  1437 => 246,  1431 => 245,  1425 => 244,  1419 => 243,  1415 => 241,  1409 => 240,  1407 => 239,  1404 => 238,  1396 => 236,  1393 => 235,  1383 => 233,  1381 => 232,  1378 => 231,  1368 => 228,  1362 => 227,  1352 => 226,  1346 => 225,  1338 => 222,  1332 => 221,  1326 => 220,  1320 => 219,  1314 => 218,  1310 => 216,  1300 => 215,  1298 => 214,  1295 => 213,  1292 => 211,  1290 => 210,  1286 => 208,  1278 => 207,  1276 => 206,  1273 => 205,  1265 => 203,  1263 => 202,  1259 => 200,  1251 => 198,  1248 => 197,  1240 => 195,  1238 => 194,  1235 => 193,  1227 => 191,  1225 => 190,  1220 => 187,  1214 => 186,  1211 => 185,  1205 => 183,  1202 => 182,  1196 => 180,  1193 => 179,  1187 => 177,  1184 => 176,  1178 => 174,  1176 => 173,  1168 => 168,  1164 => 167,  1161 => 166,  1158 => 165,  1155 => 164,  1152 => 163,  1147 => 85,  1142 => 79,  1137 => 34,  1111 => 557,  1106 => 555,  1092 => 544,  1081 => 536,  1075 => 533,  1071 => 532,  1064 => 528,  1057 => 524,  1051 => 521,  1047 => 520,  1041 => 517,  1036 => 515,  1031 => 513,  1022 => 507,  1010 => 498,  1006 => 497,  1000 => 494,  996 => 493,  990 => 490,  986 => 489,  980 => 486,  976 => 485,  970 => 482,  966 => 481,  959 => 477,  954 => 475,  949 => 473,  940 => 467,  928 => 458,  924 => 457,  918 => 454,  914 => 453,  908 => 450,  904 => 449,  898 => 446,  894 => 445,  888 => 442,  884 => 441,  877 => 437,  872 => 435,  863 => 433,  857 => 432,  851 => 431,  845 => 430,  839 => 429,  833 => 428,  827 => 427,  822 => 425,  811 => 417,  807 => 415,  801 => 413,  798 => 412,  792 => 410,  789 => 409,  783 => 407,  780 => 406,  774 => 404,  772 => 403,  767 => 401,  760 => 397,  754 => 394,  746 => 389,  739 => 384,  737 => 383,  721 => 372,  715 => 371,  709 => 370,  703 => 369,  700 => 368,  693 => 366,  686 => 365,  681 => 362,  675 => 361,  673 => 360,  664 => 358,  656 => 357,  650 => 356,  644 => 355,  637 => 354,  631 => 352,  627 => 350,  622 => 348,  618 => 347,  615 => 346,  607 => 344,  605 => 343,  602 => 342,  592 => 340,  590 => 339,  587 => 338,  577 => 335,  571 => 334,  561 => 333,  555 => 332,  548 => 330,  542 => 329,  536 => 328,  530 => 327,  524 => 326,  520 => 324,  510 => 323,  508 => 322,  505 => 321,  503 => 320,  499 => 318,  491 => 316,  488 => 315,  480 => 313,  478 => 312,  475 => 311,  467 => 309,  465 => 308,  462 => 307,  456 => 305,  453 => 304,  447 => 302,  444 => 301,  438 => 299,  435 => 298,  429 => 296,  426 => 295,  420 => 293,  418 => 292,  415 => 291,  412 => 290,  410 => 289,  400 => 286,  392 => 280,  386 => 279,  384 => 278,  380 => 277,  371 => 270,  364 => 268,  356 => 266,  353 => 265,  350 => 264,  348 => 263,  342 => 259,  340 => 163,  335 => 160,  323 => 156,  313 => 153,  305 => 150,  297 => 147,  293 => 145,  290 => 144,  288 => 143,  280 => 137,  266 => 136,  263 => 135,  259 => 133,  253 => 132,  251 => 131,  246 => 130,  243 => 129,  239 => 127,  233 => 126,  231 => 125,  226 => 124,  223 => 123,  219 => 121,  213 => 120,  211 => 119,  206 => 118,  203 => 117,  200 => 116,  196 => 115,  188 => 112,  183 => 109,  179 => 108,  176 => 107,  168 => 92,  162 => 91,  155 => 86,  153 => 85,  149 => 84,  143 => 80,  141 => 79,  137 => 77,  94 => 35,  92 => 34,  63 => 12,  55 => 11,  41 => 9,  38 => 8,  35 => 7,  32 => 6,  30 => 5,  24 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         {% set title = block('title') %}*/
/*         {% set full_title = block('full_title') %}*/
/*         {% set description = block('description') %}*/
/*         {% set keywords = block('keywords') %}*/
/*         <title>{% if full_title %}{{full_title}}{% else %}{% if title %}{{title}} | {% endif %}Epado{% endif %}</title>*/
/*         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" /> */
/*         <meta name="description" content="{% if description %}{{ description }}{% else %}{{ 'Epado to największy w Polsce serwis upamiętniający osoby zmarłe'|trans }}{% endif %}">*/
/*         <meta name="keywords" content="{% if keywords %}{{ keywords }}{% else %}{{ 'epado, osoby zmarłe, cmentarze, baza cmentarzy'|trans }}{% endif %}">*/
/*         <meta name="author" content="artgate.pl">*/
/*         <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >*/
/*         <meta name="theme-color" content="#000000">*/
/*         <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">*/
/*         <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">*/
/*         <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">*/
/*         <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">*/
/*         <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">*/
/*         <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">*/
/*         <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">*/
/*         <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">*/
/*         <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">*/
/*         <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">*/
/*         <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">*/
/*         <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">*/
/*         <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">*/
/*         <link rel="manifest" href="/manifest.json">*/
/*         <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#dac572">*/
/*         <meta name="msapplication-TileColor" content="#da532c">*/
/*         <meta name="msapplication-TileImage" content="/mstile-144x144.png">*/
/*         <meta name="theme-color" content="#ffffff">*/
/*         {% block meta %}{% endblock %}*/
/*         */
/*         */
/*         <link rel="icon" type="image/x-icon" href="/favicon.ico" />*/
/*         */
/*         <script src="/js/jquery.min.js"></script>*/
/*         <link rel="stylesheet" href="/css/animate.css">*/
/*         <script src="/js/jwaypoints/jquery.waypoints.min.js"></script>*/
/*         */
/*         <link rel="stylesheet" href="/css/fontawsome/css/font-awesome.min.css">*/
/*         <link rel="stylesheet" href="/css/rippler/dist/css/rippler.min.css">*/
/*         <script src="/css/rippler/dist/js/jquery.rippler.min.js"></script>*/
/* */
/*         <script type="text/javascript" src="/css/jquery-timepicker-master/lib/bootstrap-datepicker.js"></script>*/
/*         <link rel="stylesheet" type="text/css" href="/css/jquery-timepicker-master/lib/bootstrap-datepicker.css" />*/
/*         <script src="/css/datepair/dist/datepair.js"></script>*/
/*         <script src="/css/datepair/dist/jquery.datepair.js"></script>*/
/*         */
/*         <link href="/js/jquery.scrollbar/jquery.scrollbar.css" rel="stylesheet">*/
/*         <script src="/js/jquery.scrollbar/jquery.scrollbar.min.js"></script>   */
/*       */
/*         <link href="/js/fancybox/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">*/
/*         <script src="/js/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>    */
/* */
/*         */
/*         <link href="/js/tooltipster-master/css/tooltipster.css" rel="stylesheet">*/
/*         <link href="/js/tooltipster-master/css/themes/tooltipster-light.css" rel="stylesheet">*/
/*         <script src="/js/tooltipster-master/js/jquery.tooltipster.min.js"></script>      */
/*         */
/*         <script src="/js/prettyloader/js/jquery.prettyLoader.js" type="text/javascript" charset="utf-8"></script>*/
/* 	<link rel="stylesheet" href="/js/prettyloader/css/prettyLoader.css" type="text/css" media="screen" charset="utf-8" />*/
/*                 */
/*         <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDrDcdgTitaBN0crJOZP_Go8-5DoI3-fGQ" type="text/javascript"></script>*/
/*         */
/*         <script src="/js/tageditor/jquery.caret.min.js"></script>*/
/*         <script src="/js/tageditor/jquery.tag-editor.min.js"></script>*/
/*         */
/*         <script src="/js/jquery-ui-custom/jquery-ui.min.js"></script>  */
/*         */
/*         <link href="/js/lightgallery/css/lightgallery.css" rel="stylesheet">*/
/*         <script src="/js/lightgallery/js/lightgallery.js"></script>*/
/*         <script src="/js/lightgallery/js/lg-video.js"></script>*/
/*         {#<script src="/js/lightgallery/js/lg-autoplay.js"></script>#}*/
/*         <script src='https://www.google.com/recaptcha/api.js'></script>*/
/* */
/*         {% block stylesheets %}{% endblock %}*/
/*         */
/*         <link rel="stylesheet" href="/css/main.css?v=3.4.5" />*/
/*         <script src="/js/main.js?v=3.4.5"></script>*/
/*     </head>*/
/*     <body data-language="{{ app.request.locale }}">*/
/*         {% block after_body %}{% endblock %}*/
/*         <div class="top">*/
/*             */
/*             <div class="header">*/
/*                 <div class="size">*/
/*                     <div class="left search">*/
/*                         <div class="bg"><i class="fa fa-search"></i><input type="text" data-url="{{ path('search') }}" autocomplete="off" class="search-input" name="search" data-placeholder="{{ 'Osoba lub miejsce...'|trans }}"></div>*/
/*                         <div class="result"><div class="inner"><h4 style=""><i class="fa fa-fw fa-search"></i> {{ 'Wyszukiwarka'|trans }}</h4><p>{{ 'Wpisz imię i nazwisko osoby zmarłej, nazwę upamiętnianego miejsca, miasto lub nazwę cmentarza'|trans }}</p></div></div>*/
/*                     </div>    */
/* */
/*                     {#<div class="right spec currency dropwrapper">*/
/*                         {{ currency() }} <i class="fa fa-caret-down"></i>*/
/*                         <div class="dropmenu">   */
/*                         {% for currency in currencies %}*/
/*                             {% if( app.request.attributes.get('_route') in ['homepage'] )  %}*/
/*                             <a href="?currency={{currency}}">{{currency}}</a>  */
/*                             {% else  %}    */
/*                             <a href="{{extend({'currency':currency})}}">{{currency}}</a>  */
/*                             {% endif  %}*/
/*                         {% endfor %}  */
/*                         </div>  */
/*                     </div>#}*/
/*                         */
/*                     {% if( code is not defined ) %}{% set code=null %}{% endif  %}*/
/*                         */
/*                     <div class="right spec language dropwrapper">*/
/*                         <span class="click">*/
/*                         <img src="/images/flags/{{ app.request.locale }}.png" alt="Language {{ app.request.locale }}"> <i class="fa fa-caret-down"></i>*/
/*                         </span>*/
/*                         <div class="dropmenu"> */
/*                         {% for locale in locales %}*/
/*                             {% set url=extend({'_locale':locale}) %}*/
/*                             {% if( app.request.attributes.get('_route') in ['homepage','page'] )  %}*/
/*                                {% set url=path(app.request.attributes.get('_route')~'_locale',{'_locale':locale,'code':code}) %} */
/*                                {% if( locale==default_locale )  %}*/
/*                                   {% set url=path(app.request.attributes.get('_route'),{'code':code}) %} */
/*                                {% endif  %}    */
/*                             {% endif  %}*/
/*                             {% if( app.request.attributes.get('_route') in ['homepage_locale'] )  %}*/
/*                                {% set url=path(app.request.attributes.get('_route'),{'_locale':locale}) %} */
/*                                {% if( locale==default_locale )  %}*/
/*                                   {% set url=path('homepage') %} */
/*                                {% endif  %}    */
/*                             {% endif  %}*/
/*                             {% if( app.request.attributes.get('_route') in ['page_locale'] )  %}*/
/*                                {% set url=path(app.request.attributes.get('_route'),{'_locale':locale,'code':code}) %} */
/*                                {% if( locale==default_locale )  %}*/
/*                                   {% set url=path('page',{'code':code}) %} */
/*                                {% endif  %}    */
/*                             {% endif  %}*/
/*                             */
/*                             <a href="{{url}}"><img src="/images/flags/{{locale}}.png" class="tip" title="{{ locale }}" alt="Language {{locale}}"></a>*/
/*                         {% endfor %} */
/*                         </div> */
/*                         */
/*                     </div>*/
/* */
/*                         */
/*                     {% set user = app.user %}*/
/*                     {% if user is not null %}*/
/*   */
/*                     <div class="right messages logout ">*/
/*                         <a href="{{ path('logout') }}" class="tip" title="{{ 'Wyloguj'|trans }}"><i class="fa fa-power-off"></i></a>*/
/*                     </div>    */
/*                     <div class="right messages settings biger">*/
/*                         <a href="{{ path('profile_edit') }}" class="tip" title="{{ 'Ustawienia'|trans }}"><i class="fa fa-gear"></i></a>*/
/*                     </div>      */
/*                     <div class="right messages">*/
/*                         <a href="{{ path('message_list') }}" class="tip" title="{{ 'Wiadomości'|trans }}"><i class="fa fa-envelope"></i>{{ render_esi(controller('AppBundle:Message:info' )) }}</a>*/
/*                     </div>    */
/*                     <div class="right messages cart biger first">*/
/*                         <a href="{{ path('cart') }}" class="tip" title="{{ 'Koszyk'|trans }}"><i class="fa fa-shopping-cart"></i>{{ render_esi(controller('AppBundle:Order:infoCart' )) }}</a>*/
/*                     </div>  */
/* */
/*                     */
/*                     {% endif %}    */
/* */
/*                     <div class="right person navnotmobile dropwrapper">*/
/*                         {% block top_right %}*/
/*                             {% set user = app.user %}*/
/*                             {% if user is not null %}*/
/*                                 <span class="click">*/
/*                                     <div class="avatar circle" style="background-image:url('{{ path('thumbnail', {'resolution': '60x60', 'file': user.avatar })|production }}');"></div>*/
/*                                     <span>{{ 'Panel'|trans }}</span>*/
/*                                 </span>*/
/*                                 */
/*                                 <div class="dropmenu"> */
/*                                     <ul>*/
/*                             {% if(app.user is not null and app.user.type in ['admin'] ) %}*/
/*                                 <li><span>{{ 'Panel administracyjny'|trans }}</span></li>*/
/*                             {% endif %}*/
/*                             {% if(app.user is not null and app.user.type in ['worker'] ) %}*/
/*                                 <li><span>{{ 'Panel pracownika'|trans }}</span></li>*/
/*                             {% endif %}*/
/*                             {% if(app.user is not null and app.user.type in ['trader'] ) %}*/
/*                                 <li><span>{{ 'Panel handlowca'|trans }}</span></li>*/
/*                             {% endif %}*/
/*                             {% if(app.user is not null and app.user.type in ['contractor'] ) %}*/
/*                                 <li><span>{{ 'Panel wykonawcy'|trans }}</span></li>*/
/*                             {% endif %}*/
/*                             {% if(app.user is not null and app.user.type in ['partner'] ) %}*/
/*                                 <li><span>{{ 'Panel partnera'|trans }}</span></li>*/
/*                             {% endif %}   */
/* */
/*                             */
/*                             {% if(app.user is not null and app.user.type in ['admin','worker','trader','partner'] ) %}*/
/*                                 <li><a href="{{ path('shop') }}"><i class="fa fa-fw fa-shopping-cart"></i>{{ 'Sklep dla partnerów'|trans }}</a></li>   */
/*                             {% endif %}*/
/* */
/*                             {% if(app.user is not null and app.user.type in ['admin','worker'] ) %}*/
/*                                 <li><a href="{{ path('text_list') }}"><i class="fa fa-fw fa-file-text-o"></i>{{ 'Teksty'|trans }}</a></li>   */
/*                             {% endif %}*/
/*                             {% if(app.user is not null and app.user.type in ['admin'] ) %}*/
/*                                 <li><a href="{{ path('admin') }}"><i class="fa fa-fw fa-wrench"></i>{{ 'Administracja'|trans }}</a></li>   */
/*                             {% endif %}*/
/*                             */
/*                             */
/*                             {% if(app.user is not null and app.user.type in ['partner'] and app.user.ads ) %}*/
/*                                 <li><a href="{{ path('ads') }}"><i class="fa fa-fw fa-wrench"></i>{{ 'Moje reklamy'|trans }}</a></li>  */
/*                             {% endif %}*/
/* */
/*                             {% if(app.user is not null and app.user.type in ['partner'] ) %}*/
/*                                 <li><a href="{{ path('sold') }}"><i class="fa fa-fw fa-qrcode"></i>{{ 'Moje kody'|trans }}</a></li>  */
/*                             {% endif %}    */
/* */
/*                             {% if(app.user is not null and app.user.type in ['admin','worker','trader'] ) %}*/
/* */
/* {#                                <li><a href="{{ path('message_list') }}"><i class="fa fa-fw fa-envelope"></i>{{ 'Wiadomości'|trans }} {{ render_esi(controller('AppBundle:Message:info' )) }}</a></li>#}*/
/* */
/*                                 {% if(app.user is not null and app.user.type in ['admin','worker'] ) %}*/
/*                                 <li><a href="{{ path('questions_list') }}"><i class="fa fa-fw fa-question-circle"></i>{{ 'Zapytania i opinie'|trans }} {{ render_esi(controller('AppBundle:Message:infoQuestions' )) }}</a></li>*/
/*                                 {% endif %}  */
/* */
/*                                 <li><a href="{{ path('user_list') }}"><i class="fa fa-fw fa-users"></i>{{ 'Użytkownicy'|trans }}</a></li>*/
/*                                 <li><a href="{{ path('product_list') }}"><i class="fa fa-fw fa-cube"></i>{{ 'Produkty'|trans }}</a></li>*/
/*                                 <li><a href="{{ path('code_list') }}"><i class="fa fa-fw fa-qrcode"></i>{{ 'Kody'|trans }}</a></li>*/
/*                                 <li><a href="{{ path('country_list') }}"><i class="fa fa-fw fa-map"></i>{{ 'Kraje'|trans }}</a></li>*/
/*                                 <li><a href="{{ path('mail_list') }}"><i class="fa fa-fw fa-info-circle"></i>{{ 'Powiadomienia'|trans }}</a></li>*/
/* */
/*                                 */
/*                                 <li><a href="{{ path('page_list',{'ad':1}) }}"><i class="fa fa-fw fa-newspaper-o"></i>{{ 'Wszystkie strony'|trans }}</a></li>*/
/*                                 <li><a  class="badge-link" data-badge-link="{{ path('cemetery_list',{'ad':1,'p_state':2}) }}"  href="{{ path('cemetery_list',{'ad':1}) }}"><i class="fa fa-fw fa-bank"></i>{{ 'Wszystkie cmentarze'|trans }} {{ render_esi(controller('AppBundle:Cemetery:info',{'ad':1} )) }}</a></li>                */
/*                                 <li><a href="{{ path('family_list',{'ad':1}) }}"><i class="fa fa-fw fa-group"></i>{{ 'Wszystkie rodziny'|trans }}</a></li>*/
/*                                 <li><a href="{{ path('order_list',{'ad':1}) }}"><i class="fa fa-fw fa-shopping-cart"></i>{{ 'Zamówienia do realizacji'|trans }} {{ render_esi(controller('AppBundle:Order:info',{'ad':1} )) }}</a></li>*/
/* */
/*                             {% endif %}*/
/* */
/*                             {% if(app.user is not null and app.user.type in ['admin','worker','trader','contractor'] ) %}*/
/*                                 <li><a href="{{ path('contract_list',{'ad':1}) }}"><i class="fa fa-fw fa-fire"></i>{{ 'Usługi do wykonania'|trans }} {{ render_esi(controller('AppBundle:Order:infoContract',{'ad':1} )) }}</a></li>   */
/*                             {% endif %}*/
/*                             {% if(app.user is not null and app.user.type in ['contractor','partner','trader'] ) %}*/
/*                                 <li><a href="{{ path('profile_address') }}"><i class="fa fa-fw fa-truck"></i>{{ 'Dane adresowe'|trans }}</a></li>   */
/*                             {% endif %}*/
/*                             */
/*                             {% if(app.user is not null and app.user.type in ['admin','worker','trader', 'contractor','partner'] ) %}*/
/*                                 <li class="title"><span>{{ 'Konto Epado'|trans }}</span></li>*/
/*                             {% endif %}   */
/*                             */
/*                             <li><a href="{{ path('panel') }}"><i class="fa fa-fw fa-user"></i>{{ 'Moje konto'|trans }}</a></li>*/
/*                             <li><a href="{{ path('page_list') }}"><i class="fa fa-fw fa-newspaper-o"></i>{{ 'Moje strony'|trans }}</a></li>*/
/*                             <li><a href="{{ path('cemetery_list') }}"><i class="fa fa-fw fa-bank"></i>{{ 'Cmentarze'|trans }}</a></li>*/
/*                             <li><a href="{{ path('family_list') }}"><i class="fa fa-fw fa-group"></i>{{ 'Rodziny'|trans }}</a></li>*/
/*                             <li><a href="{{ path('order_list') }}"><i class="fa fa-fw fa-shopping-cart"></i>{{ 'Zamówienia'|trans }} {{ render_esi(controller('AppBundle:Order:info' )) }}</a></li>*/
/*                             <li><a href="{{ path('contract_list') }}"><i class="fa fa-fw fa-fire"></i>{{ 'Zamówione usługi'|trans }} {{ render_esi(controller('AppBundle:Order:infoContract' )) }}</a></li>*/
/* */
/*                             */
/*                                     </ul>    */
/*                                 </div>  */
/*                             {% else %}*/
/*                                 <a href="{{ path('register') }}">{{ 'Rejestracja'|trans }}</a>*/
/*                                 <span class="separator"></span>*/
/*                                 <a href="{{ path('login') }}">{{ 'Logowanie'|trans }}</a>*/
/*                             {% endif %}*/
/*                         {% endblock %}*/
/*                     </div>*/
/*                     */
/*                     <div class="right person navmobile dropwrapper topaccount">*/
/*                         */
/*                         {% set user = app.user %}*/
/*                         {% if user is not null %}*/
/*                         {% else %}*/
/*                             <a class="sometimes" href="{{ path('register') }}">{{ 'Rejestracja'|trans }}</a>*/
/*                             <span class="sometimes separator"></span>*/
/*                             <a href="{{ path('login') }}">{{ 'Logowanie'|trans }}</a>*/
/*                         {% endif %}*/
/*                         */
/*                     </div>  */
/* */
/*                     */
/*                 </div>*/
/*             </div>*/
/*                     */
/*                {% set url=path('homepage_locale',{'_locale':app.request.locale}) %} */
/*                {% if( app.request.locale==default_locale )  %}*/
/*                   {% set url=path('homepage') %} */
/*                {% endif  %}   */
/*                */
/*                     */
/*                 */
/*             <div class="main">*/
/*                 <div class="size">*/
/*                     <a class="home" href="{% if( app.request.locale==default_locale )  %}{{ path('homepage') }}{% else  %}{{ path('homepage_locale',{'_locale':app.request.locale}) }}{% endif  %}"><img src="/images/ememoria.png"></a>*/
/*                     <div class="nav">*/
/*                     <div class="ico navmobile"><i class="fa fa-bars"></i></div>    */
/*                     <ul>{% set user = app.user %}*/
/*                         {% if user is not null %}*/
/*                             */
/*                             {% if(app.user is not null and app.user.type in ['admin'] ) %}*/
/*                                 <li class="navmobile"><span>{{ 'Panel administracyjny'|trans }}</span></li>*/
/*                             {% endif %}*/
/*                             {% if(app.user is not null and app.user.type in ['worker'] ) %}*/
/*                                 <li class="navmobile"><span>{{ 'Panel pracownika'|trans }}</span></li>*/
/*                             {% endif %}*/
/*                             {% if(app.user is not null and app.user.type in ['trader'] ) %}*/
/*                                 <li class="navmobile"><span>{{ 'Panel handlowca'|trans }}</span></li>*/
/*                             {% endif %}*/
/*                             {% if(app.user is not null and app.user.type in ['contractor'] ) %}*/
/*                                 <li class="navmobile"><span>{{ 'Panel wykonawcy'|trans }}</span></li>*/
/*                             {% endif %}*/
/*                             {% if(app.user is not null and app.user.type in ['partner'] ) %}*/
/*                                 <li class="navmobile"><span>{{ 'Panel partnera'|trans }}</span></li>*/
/*                             {% endif %}*/
/* */
/*                             {% if(app.user is not null and app.user.type in ['admin','worker','trader','partner'] ) %}*/
/*                                 <li class="navmobile"><a href="{{ path('shop') }}"><i class="fa fa-fw fa-shopping-cart"></i>{{ 'Sklep dla partnerów'|trans }}</a></li>   */
/*                             {% endif %}*/
/* */
/*                             {% if(app.user is not null and app.user.type in ['admin','worker'] ) %}*/
/*                                 <li class="navmobile"><a href="{{ path('text_list') }}"><i class="fa fa-fw fa-file-text-o"></i>{{ 'Teksty'|trans }}</a></li>   */
/*                             {% endif %}*/
/*                             {% if(app.user is not null and app.user.type in ['admin'] ) %}*/
/*                                 <li class="navmobile"><a href="{{ path('admin') }}"><i class="fa fa-fw fa-wrench"></i>{{ 'Administracja'|trans }}</a></li>   */
/*                             {% endif %}*/
/* */
/*                             */
/*                             {% if(app.user is not null and app.user.type in ['admin','worker','trader'] ) %}*/
/* */
/*                                 {% if(app.user is not null and app.user.type in ['admin','worker'] ) %}*/
/*                                 <li class="navmobile"><a href="{{ path('questions_list') }}"><i class="fa fa-fw fa-question-circle"></i>{{ 'Zapytania i opinie'|trans }} {{ render_esi(controller('AppBundle:Message:infoQuestions' )) }}</a></li>*/
/*                                 {% endif %}  */
/* */
/*                                 <li class="navmobile"><a href="{{ path('user_list') }}"><i class="fa fa-fw fa-users"></i>{{ 'Użytkownicy'|trans }}</a></li>*/
/*                                 <li class="navmobile"><a href="{{ path('product_list') }}"><i class="fa fa-fw fa-cube"></i>{{ 'Produkty'|trans }}</a></li>*/
/*                                 <li class="navmobile"><a href="{{ path('code_list') }}"><i class="fa fa-fw fa-qrcode"></i>{{ 'Kody'|trans }}</a></li>*/
/*                                 <li class="navmobile"><a href="{{ path('country_list') }}"><i class="fa fa-fw fa-map"></i>{{ 'Kraje'|trans }}</a></li>*/
/*                                 <li class="navmobile"><a href="{{ path('mail_list') }}"><i class="fa fa-fw fa-info-circle"></i>{{ 'Powiadomienia'|trans }}</a></li>*/
/* */
/*                                 <li class="navmobile"><a href="{{ path('page_list',{'ad':1}) }}"><i class="fa fa-fw fa-newspaper-o"></i>{{ 'Wszystkie strony'|trans }}</a></li>*/
/*                                 <li class="navmobile"><a  class="badge-link" data-badge-link="{{ path('cemetery_list',{'ad':1,'p_state':2}) }}"  href="{{ path('cemetery_list',{'ad':1}) }}"><i class="fa fa-fw fa-bank"></i>{{ 'Wszystkie cmentarze'|trans }} {{ render_esi(controller('AppBundle:Cemetery:info',{'ad':1} )) }}</a></li>                */
/*                                 <li class="navmobile"><a href="{{ path('family_list',{'ad':1}) }}"><i class="fa fa-fw fa-group"></i>{{ 'Wszystkie rodziny'|trans }}</a></li>*/
/*                                 <li class="navmobile"><a href="{{ path('order_list',{'ad':1}) }}"><i class="fa fa-fw fa-shopping-cart"></i>{{ 'Zamówienia do realizacji'|trans }} {{ render_esi(controller('AppBundle:Order:info',{'ad':1} )) }}</a></li>*/
/* */
/*                             {% endif %}*/
/* */
/*                             {% if(app.user is not null and app.user.type in ['admin','worker','trader','contractor','partner'] ) %}*/
/*                                 <li class="navmobile"><a href="{{ path('contract_list',{'ad':1}) }}"><i class="fa fa-fw fa-fire"></i>{{ 'Usługi do wykonania'|trans }} {{ render_esi(controller('AppBundle:Order:infoContract',{'ad':1} )) }}</a></li>   */
/*                             {% endif %}*/
/*                             */
/*                             {% if(app.user is not null and app.user.type in ['contractor','partner'] ) %}*/
/*                                 <li class="navmobile"><a href="{{ path('profile_address') }}"><i class="fa fa-fw fa-truck"></i>{{ 'Dane adresowe'|trans }}</a></li>   */
/*                             {% endif %}*/
/*                             */
/*                             {% if(app.user is not null and app.user.type in ['admin','worker','trader', 'contractor','partner'] ) %}    */
/*                                 <li class="navmobile"><span>{{ 'Konto Epado'|trans }}</span></li>*/
/*                             {% endif %}*/
/*                             */
/*                             */
/*                             <li class="navmobile"><a href="{{ path('panel') }}"><i class="fa fa-fw fa-user"></i>{{ 'Moje konto'|trans }}</a></li>*/
/*                             {#<li class="navmobile"><a href="{{ path('profile_address') }}"><i class="fa fa-fw fa-truck"></i>{{ 'Dane adresowe'|trans }}</a></li>#}*/
/*                             <li class="navmobile"><a href="{{ path('page_list') }}"><i class="fa fa-fw fa-newspaper-o"></i>{{ 'Moje strony'|trans }}</a></li>*/
/*                             <li class="navmobile"><a href="{{ path('cemetery_list') }}"><i class="fa fa-fw fa-bank"></i>{{ 'Cmentarze'|trans }}</a></li>*/
/*                             <li class="navmobile"><a href="{{ path('family_list') }}"><i class="fa fa-fw fa-group"></i>{{ 'Rodziny'|trans }}</a></li>*/
/*                             <li class="navmobile"><a href="{{ path('order_list') }}"><i class="fa fa-fw fa-shopping-cart"></i>{{ 'Zamówienia'|trans }} {{ render_esi(controller('AppBundle:Order:info' )) }}</a></li>*/
/*                             <li class="navmobile"><a href="{{ path('contract_list') }}"><i class="fa fa-fw fa-fire"></i>{{ 'Zamówione usługi'|trans }} {{ render_esi(controller('AppBundle:Order:infoContract' )) }}</a></li>*/
/*                             */
/*                             {% if(app.user is not null and app.user.type in ['admin','worker','trader','contractor'] ) %}*/
/*                                 <li class="navmobile"><span>{{ 'Strona główna'|trans }}</span></li>*/
/*                             {% endif %} */
/*                             */
/*                         {% else %}*/
/*                             <li class="navmobile"><a href="{{ path('register') }}">{{ 'Rejestracja'|trans }}</a></li>*/
/*                             <li class="navmobile"><a href="{{ path('login') }}">{{ 'Logowanie'|trans }}</a></li>*/
/*                         {% endif %}*/
/*                         */
/*                         <li><a href="{{ url }}#what">{{ 'Czym jestem'|trans }}</a></li>*/
/*                         <li><a href="{{ url }}#work">{{ 'Jak działam'|trans }}</a></li>*/
/*                         <li><a href="{{ url }}#price">{{ 'Cennik'|trans }}</a></li>*/
/*                         <li><a href="{{ url }}#footer">{{ 'Kontakt'|trans }}</a></li>*/
/*                     </ul>  */
/*                     </div>*/
/*                 </div>*/
/*             </div>  */
/* */
/*         </div>*/
/*                     */
/*         <div class="wrapper">*/
/*    */
/*             <div class="content-wrapper">*/
/*             {% block body %}{% endblock %}*/
/*             </div>*/
/*             */
/*             <div class="footer" id="footer">*/
/*                 <div class="size">*/
/*                     <div class="contact col">*/
/*                         <h4 class="triggerMany delay12" data-animate="pulse">{{ 'Kontakt'|trans }}</h4>*/
/*                         <p>*/
/*                             Stono Sp. z o. o.<br>*/
/*                             Wspólna 50A/35, Warszawa<br>*/
/*                             <a href="mailto:office@epado.com">office@epado.com</a><br>*/
/*                             {{ 'tel.'|trans }}: +48502502188<br>*/
/*                             NIP: 7010387978,<br> REGON: 14677061500000*/
/*                             <br><br>*/
/*                             Copyright {{ 'now'|date('Y') }} Stono Sp. z o. o.*/
/*                         </p>*/
/*                     </div>*/
/*                     <div class="find col">*/
/*                         <h4 class="triggerMany delay12" data-animate="pulse">{{ 'Znajdź nas'|trans }}</h4>*/
/*                         <p>*/
/*                            {% if social['twitter'][app.request.locale] is defined %}*/
/*                            <a href="{{social['twitter'][app.request.locale]}}"><i class="fa fa-twitter"></i></a> */
/*                            {% endif %}*/
/*                            {% if social['facebook'][app.request.locale] is defined %}*/
/*                            <a href="{{ social['facebook'][app.request.locale] }}"><i class="fa fa-facebook"></i></a> */
/*                            {% endif %}*/
/*                            {% if social['youtube'][app.request.locale] is defined %}*/
/*                            <a href="{{ social['youtube'][app.request.locale] }}"><i class="fa fa-youtube-play"></i></a> */
/*                            {% endif %}*/
/*                            {% if social['instagram'][app.request.locale] is defined %}*/
/*                            <a href="{{ social['instagram'][app.request.locale] }}"><i class="fa fa-instagram"></i></a>*/
/*                            {% endif %}*/
/*                         </p>*/
/*                         <br>*/
/*                         <p>{{ 'Płatności obsługuje'|trans }}:</p>*/
/*                         <p>*/
/*                         <img src="/images/payu.png" width="100" >*/
/*                         </p>*/
/*                     </div>*/
/*                         */
/*                         */
/*                     <div class="menu col">*/
/*                         <h4 class="triggerMany delay12" data-animate="pulse">{{ 'Menu'|trans }}</h4>*/
/*                         <ul>*/
/*                             <li><a href="{{ path('rules') }}"><i class="fa fa-fw fa-certificate"></i>{{ 'Regulamin serwisu'|trans }}</a></li>*/
/*                             <li><a href="{{ path('prv') }}"><i class="fa fa-fw fa-certificate"></i>{{ 'Polityka prywatności'|trans }}</a></li>*/
/*                             <li><a href="{{ path('login') }}"><i class="fa fa-fw fa-user"></i>{{ 'Logowanie'|trans }}</a></li>*/
/*                             <li><a href="{{ path('register') }}"><i class="fa fa-fw fa-user-plus"></i>{{ 'Rejestracja'|trans }}</a></li>*/
/*                             <li><a href="{{ path('reset') }}"><i class="fa fa-fw fa-key"></i>{{ 'Zapomniałem hasła'|trans }}</a></li>*/
/*                             <li><a href="{{ path('page_form') }}"><i class="fa fa-fw fa-plus"></i>{{ 'Dodaj stronę'|trans }}</a></li>*/
/*                             <li><a href="/" class="contactus{% if(app.request.get('show')=='contact-us') %} show{% endif %}"><i class="fa fa-fw fa-envelope"></i>{{ 'Wyślij do nas sugestie'|trans }}</a>*/
/*                             <div class="hidden">*/
/*                             <h1><i class="fa fa-envelope"></i>{{ 'Twoja sugestia'|trans }}</h1>*/
/*                             <div class="content">*/
/*                             <form action="{{ path('contact') }}" method="post">*/
/*                                 <input type="hidden" id="type" name="type" value="idea" />*/
/*                                  */
/*                                 <div class="widget">*/
/*                                     <label for="name">{{ 'Twój adres IP'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="name" name="name" value="{{ ip() }}" disabled /></div>*/
/*                                 </div>*/
/*                                 <div class="widget">*/
/*                                     <label for="name">{{ 'Imię i nazwisko'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="name" name="name" value="" required="required" autocomplete="off" /><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>{{ 'To pole jest wymagane'|trans }}</li></ul></div>*/
/*                                 </div>*/
/*                                 <div class="widget">*/
/*                                     <label for="mail">{{ 'Adres email'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="mail" name="mail" value="" required="required" autocomplete="off" /><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>{{ 'To pole jest wymagane'|trans }}</li></ul></div>*/
/*                                 </div>  */
/*                                 <div class="widget">*/
/*                                     <label for="subject">{{ 'Temat'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="subject" name="subject" value="" required="required" autocomplete="off" /><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>{{ 'To pole jest wymagane'|trans }}</li></ul></div>*/
/*                                 </div>*/
/*                                 <div class="widget">*/
/*                                     <label for="message">{{ 'Wiadomość'|trans }}</label>*/
/*                                     <div class="field"><textarea id="message" name="message" required="required"></textarea><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>{{ 'To pole jest wymagane'|trans }}</li></ul></div>*/
/*                                 </div> */
/*                                 <div class="widget">*/
/*                                     <div class="field">*/
/*                                     <div class="captcha"></div>*/
/*                                     </div>*/
/*                                 </div> */
/*                                 */
/*                                 */
/*                                 <button type="submit" name="submit">{{ 'Wyślij wiadomość'|trans }}</button>*/
/*                             </form>*/
/*                             </div>*/
/*                             </div>*/
/*                             </li>*/
/*                             */
/*                             <li><a href="/" class="contactus"><i class="fa fa-fw fa-envelope"></i>{{ 'Formularz reklamacyjny'|trans }}</a>*/
/*                             <div class="hidden">*/
/*                             <h1><i class="fa fa-envelope"></i>{{ 'Formularz reklamacyjny'|trans }}</h1>*/
/*                             <div class="content">*/
/*                             <form action="{{ path('contact') }}" method="post">*/
/*                                 <input type="hidden" id="type" name="type" value="complaint" />*/
/*                                 */
/*                                 <div class="widget" style="display:none;">*/
/*                                     <label for="name">{{ 'Twój adres IP'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="name" name="name" value="{{ ip() }}" disabled /></div>*/
/*                                 </div>*/
/*                                 <div class="widget">*/
/*                                     <label for="name">{{ 'Imię i nazwisko'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="name" name="name" value="" required="required" autocomplete="off" /><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>{{ 'To pole jest wymagane'|trans }}</li></ul></div>*/
/*                                 </div>*/
/*                                 <div class="widget">*/
/*                                     <label for="mail">{{ 'Adres email'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="mail" name="mail" value="" required="required" autocomplete="off" /><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>{{ 'To pole jest wymagane'|trans }}</li></ul></div>*/
/*                                 </div>  */
/*                                 <div class="widget">*/
/*                                     <label for="subject">{{ 'Temat'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="subject" name="subject" value="" required="required" autocomplete="off" /><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>{{ 'To pole jest wymagane'|trans }}</li></ul></div>*/
/*                                 </div>*/
/*                                 <div class="widget">*/
/*                                     <label for="message">{{ 'Opis reklamacji'|trans }}</label>*/
/*                                     <div class="field"><textarea id="message" name="message" required="required"></textarea><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>{{ 'To pole jest wymagane'|trans }}</li></ul></div>*/
/*                                 </div> */
/*                                 <div class="widget">*/
/*                                     <div class="field">*/
/*                                     <div class="captcha"></div>*/
/*                                     </div>*/
/*                                 </div> */
/*                                 */
/*                                 */
/*                                 <button type="submit" name="submit">{{ 'Wyślij zgłoszenie'|trans }}</button>*/
/*                             </form>*/
/*                             </div>*/
/*                             </div>*/
/*                             </li>*/
/*                             */
/*                             <li><a href="/" class="contactus"><i class="fa fa-fw fa-users"></i>{{ 'Zostań partnerem'|trans }}</a>*/
/*                             <div class="hidden">*/
/*                             <h1><i class="fa fa-envelope"></i>{{ 'Zostań partnerem'|trans }}</h1>*/
/*                             <div class="content">*/
/*                             <form action="{{ path('contact') }}" method="post">*/
/*                                 <input type="hidden" id="type" name="type" value="partner" />*/
/*                                 <div class="widget" style="display:none;">*/
/*                                     <label for="name">{{ 'Twój adres IP'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="name" name="name" value="{{ ip() }}" disabled /></div>*/
/*                                 </div>*/
/*                                 <div class="widget">*/
/*                                     <label for="name">{{ 'Imię i nazwisko'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="name" name="name" value="" required="required" autocomplete="off" /><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>To pole jest wymagane</li></ul></div>*/
/*                                 </div>*/
/*                                 <div class="widget">*/
/*                                     <label for="mail">{{ 'Adres email'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="mail" name="mail" value="" required="required" autocomplete="off" /><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>To pole jest wymagane</li></ul></div>*/
/*                                 </div>  */
/*                                 <div class="widget">*/
/*                                     <label for="subject">{{ 'Temat'|trans }}</label>*/
/*                                     <div class="field"><input type="text" id="subject" name="subject" value="{{ 'Program partnerski'|trans }}" required="required" autocomplete="off" /><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>To pole jest wymagane</li></ul></div>*/
/*                                 </div>*/
/*                                 <div class="widget">*/
/*                                     <label for="message">{{ 'Wiadomość'|trans }}</label>*/
/*                                     <div class="field"><textarea id="message" name="message" required="required"></textarea><ul class="errors hidden"><li><i class="fa fa-warning fa-fw"></i>To pole jest wymagane</li></ul></div>*/
/*                                 </div> */
/*                                 <div class="widget">*/
/*                                     <div class="field">*/
/*                                     <div class="captcha"></div>*/
/*                                     </div>*/
/*                                 </div>*/
/*                                 <button type="submit" name="submit">{{ 'Wyślij wiadomość'|trans }}</button>*/
/*                             </form>*/
/*                             </div>*/
/*                             </div>*/
/*                             */
/*                             </li>*/
/*                         </ul>    */
/*                     </div>*/
/*                     */
/*                             */
/*                     <div class="info col">*/
/*                         <h4 class="triggerMany delay12" data-animate="pulse">{{ 'Informacje'|trans }}</h4>*/
/*                         <p>*/
/*                            {{ 'Strona Epado używa ciasteczka w celu usprawnienia działania strony i użycia niektórych jej funkcjonalności. Jeżeli nie zgadzasz się na używanie ciastek przez naszą stronę możesz zmienić ustawienia swojej przeglądarki lub opuścić stronę.'|trans }} */
/*                         </p>*/
/*                     </div>*/
/*                     */
/*                 </div>*/
/*             <div>*/
/*             */
/*         </div>*/
/*         <script>*/
/*           (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){*/
/*           (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),*/
/*           m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)*/
/*           })(window,document,'script','//www.google-analytics.com/analytics.js','ga');*/
/* */
/*           ga('create', 'UA-75772683-1', 'auto');*/
/*           ga('send', 'pageview');*/
/* */
/*         </script>  */
/*         <a href="#" class="up triggerAnimation fadeInDown"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>*/
/*     </body>*/
/* </html>*/
/* */
