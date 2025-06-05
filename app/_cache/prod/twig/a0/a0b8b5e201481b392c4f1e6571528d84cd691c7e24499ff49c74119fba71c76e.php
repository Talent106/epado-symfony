<?php

/* AppBundle:Public:person.html.twig */
class __TwigTemplate_1f2efecff4c5811ebe4256a1e3375f89abadefe40b12a0b670895f3b822ac362 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("home.html.twig", "AppBundle:Public:person.html.twig", 1);
        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'description' => array($this, 'block_description'),
            'after_body' => array($this, 'block_after_body'),
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

    // line 2
    public function block_meta($context, array $blocks = array())
    {
        // line 3
        echo "<meta property=\"og:url\"                content=\"";
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array(), "method") . $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('app_extension')->extendUrl())), "html", null, true);
        echo "\" >
<meta property=\"og:type\"               content=\"article\" >
<meta property=\"og:title\"              content=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "name", array()), "html", null, true);
        echo "\" >
<meta property=\"og:description\"        content=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "description", array()), "html", null, true);
        echo "\" >
<meta property=\"og:image\"              content=\"";
        // line 7
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array(), "method") . $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "1200x630", "file" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "avatar", array()))))), "html", null, true);
        echo "\" >

<meta name=\"twitter:card\" content=\"summary_large_image\">
<meta name=\"twitter:site\" content=\"@epado\">
<meta name=\"twitter:creator\" content=\"@epado\">
<meta name=\"twitter:title\" content=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "name", array()), "html", null, true);
        echo "\">
<meta name=\"twitter:description\" content=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "description", array()), "html", null, true);
        echo "\">
<meta name=\"twitter:image\" content=\"";
        // line 14
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array(), "method") . $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "700x500", "file" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "avatar", array()))))), "html", null, true);
        echo "\">
";
    }

    // line 17
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "name", array()), "html", null, true);
    }

    // line 18
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "description", array()), "html", null, true);
    }

    // line 20
    public function block_after_body($context, array $blocks = array())
    {
        // line 21
        echo "<div id=\"fb-root\"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \"//connect.facebook.net/";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["default_codes"]) ? $context["default_codes"] : null), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()), array(), "array"), "html", null, true);
        echo "/sdk.js#xfbml=1&version=v2.5&appId=1857414584485351\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = \"https://platform.twitter.com/widgets.js\";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, \"script\", \"twitter-wjs\"));</script>     
";
    }

    // line 47
    public function block_content($context, array $blocks = array())
    {
        // line 48
        echo "<div class=\"admin page person\">
    
    <div class=\"first-content person-info\" > 
        <div class=\"background";
        // line 51
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "background", array(), "any", true, true) && twig_in_filter($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "path", array()), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "background", array())))) {
            echo " custom\" style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "1800", "file" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "background", array())))), "html", null, true);
            echo "');\"";
        } else {
            echo "\"";
        }
        echo "></div>
        <div class=\"size\">
            
                               
            ";
        // line 55
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["page"]) ? $context["page"] : null), 1 => "page_background"), "method"))) {
            echo "                                   
            <a href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id", array()))), "html", null, true);
            echo "#background\" class=\"edit-image triggerAnimation fadeInLeft\"><i class=\"fa fa-camera\" aria-hidden=\"true\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zmień zdjęcie w tle"), "html", null, true);
            echo "</a>
            ";
        }
        // line 58
        echo "            <div class=\"description\">
                
                <div ";
        // line 60
        echo " class=\"avatar delay2 triggerAnimation\" data-animate=\"fadeInLeft\" style=\"background-image:url('";
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "165x165", "file" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "avatar", array())))), "html", null, true);
        echo "');\">
                
                ";
        // line 62
        if ((($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["page"]) ? $context["page"] : null), 1 => "page_image"), "method")) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["page"]) ? $context["page"] : null), 1 => "page_images"), "method"))) {
            echo "                                 
                <a href=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id", array()))), "html", null, true);
            echo "#image\" class=\"edit-image triggerAnimation fadeInDown\"><i class=\"fa fa-camera\" aria-hidden=\"true\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zmień zdjęcie"), "html", null, true);
            echo "</a>
                ";
        } else {
            // line 64
            echo "  
                <a href=\"#photos\" style=\"width:100%;height:100%; display:block; position:absolute;\"></a>   
                ";
        }
        // line 66
        echo "  
                
                </div>
                
                <h1 class=\"delay2 triggerAnimation\" data-animate=\"fadeInRight\">";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "lastname", array()), "html", null, true);
        echo "&nbsp;&nbsp;<i class=\"badge\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->lived($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "begin", array()), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "end", array())), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("l."), "html", null, true);
        echo "</i></h1>
                <p class=\"time delay2 triggerAnimation\" data-animate=\"fadeInRight\">";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "begin", array())), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "end", array())), "html", null, true);
        echo "</p>
                <p class=\"desc delay2 triggerAnimation\" data-animate=\"fadeInRight\">";
        // line 72
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "description", array()), "html", null, true));
        echo "</p>
                
            </div>

        </div>
    </div> 
                
    
    <div class=\"size\">    
        
        <div class=\"notifications\">
            ";
        // line 83
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification notice\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 84
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "warning"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification warning\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification success\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification error\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "        </div>
        
        
        <div class=\"left-half\">
        
            <h1>";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Informacje"), "html", null, true);
        echo "</h1>

            <div class=\"content\">
                <p>
                <b>";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoba"), "html", null, true);
        echo ":</b> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "lastname", array()), "html", null, true);
        echo "<br>
                <b>";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Data urodzenia"), "html", null, true);
        echo ":</b> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "begin", array())), "html", null, true);
        echo "<br>
                <b>";
        // line 98
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Data śmierci"), "html", null, true);
        echo ":</b> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "end", array())), "html", null, true);
        echo "<br>
                <b>";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Żył lat"), "html", null, true);
        echo ":</b> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->lived($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "begin", array()), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "end", array())), "html", null, true);
        echo "<br>
                
";
        // line 101
        if ((null === $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "cemetery", array()), "checked", array()))) {
            // line 102
            echo "    ";
            if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) == $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "buyer", array())))) {
                // line 103
                echo "    <b>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cmentarz"), "html", null, true);
                echo ":</b> <span style=\"color:red;\" class=\"tip\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Możesz dodać nowy cmentarz dla tej strony lub wybrać cmentarz już istniejący"), "html", null, true);
                echo "\"> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("wprowadzony błędnie lub zduplikowany"), "html", null, true);
                echo "</span><br>
    ";
            }
            // line 105
            echo "
";
        } elseif (($this->getAttribute($this->getAttribute(        // line 106
(isset($context["page"]) ? $context["page"] : null), "cemetery", array()), "checked", array()) == false)) {
            echo " 
    ";
            // line 107
            if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) == $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "buyer", array())))) {
                // line 108
                echo "    <b>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cmentarz"), "html", null, true);
                echo ":</b> <span style=\"color:#dac572;\" class=\"tip\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nasi pracownicy sprawdzą czy cmentarz został dodany prawidłowo i czy nie ma już takiego cmentarza w naszej bazie"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("oczekuje na weryfikację"), "html", null, true);
                echo "</span><br>
    ";
            }
        } else {
            // line 111
            echo "    <b>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cmentarz"), "html", null, true);
            echo ":</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "cemetery", array()), "name", array()), "html", null, true);
            echo "<br>
    <b>";
            // line 112
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Miasto"), "html", null, true);
            echo ":</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "cemetery", array()), "address", array()), "city", array()), "html", null, true);
            echo "<br>       
";
        }
        // line 114
        echo "                ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "alley", array())) {
            echo "<b>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Aleja"), "html", null, true);
            echo ":</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "alley", array()), "html", null, true);
            echo "<br>";
        }
        // line 115
        echo "                ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "number", array())) {
            echo "<b>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr kwatery"), "html", null, true);
            echo ":</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "number", array()), "html", null, true);
            echo "<br>";
        }
        // line 116
        echo "                
                ";
        // line 117
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "familyname", array())) {
            echo "<b>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwisko rodowe"), "html", null, true);
            echo ":</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "familyname", array()), "html", null, true);
            echo "<br>";
        }
        // line 118
        echo "                ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "father", array())) {
            echo "<b>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Imię ojca"), "html", null, true);
            echo ":</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "father", array()), "html", null, true);
            echo "<br>";
        }
        // line 119
        echo "                ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "mother", array())) {
            echo "<b>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Imię matki"), "html", null, true);
            echo ":</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "mother", array()), "html", null, true);
            echo "<br>";
        }
        // line 120
        echo "                ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "birthcity", array())) {
            echo "<b>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Miejsce urodzenia"), "html", null, true);
            echo ":</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "birthcity", array()), "html", null, true);
            echo "<br>";
        }
        // line 121
        echo "                </p>
                
                ";
        // line 123
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 124
            echo "
                ";
        } else {
            // line 125
            echo " 
                    ";
            // line 126
            if ( !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "special", array())) {
                // line 127
                echo "                    <p>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Aby skontaktować się z rodziną musisz się zalogować."), "html", null, true);
                echo "</p>
                    ";
            }
            // line 128
            echo " 
                ";
        }
        // line 129
        echo " 

                
                <div class=\"options\">
                    
                    
";
        // line 135
        if ((null === $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "cemetery", array()), "checked", array()))) {
        } elseif (($this->getAttribute($this->getAttribute(        // line 136
(isset($context["page"]) ? $context["page"] : null), "cemetery", array()), "checked", array()) == false)) {
            echo "   
";
        } else {
            // line 138
            echo "   <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cemetery", array("id" => $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "cemetery", array()), "id", array()))), "html", null, true);
            echo "\" class=\"button small\"><i class=\"fa fa-university\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Znajdź cmentarz"), "html", null, true);
            echo "</a>            
";
        }
        // line 140
        echo "                    ";
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) &&  !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "special", array()))) {
            // line 141
            echo "                      <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("message_form", array("recipient_id" => $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "creator", array()), "id", array()))), "html", null, true);
            echo "\" class=\"button small\"><i class=\"fa fa-envelope\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wiadomość do rodziny"), "html", null, true);
            echo "</a>  
                    ";
        } else {
            // line 142
            echo " 
                        
                
                    ";
        }
        // line 145
        echo " 
";
        // line 146
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["page"]) ? $context["page"] : null), 1 => "page_edit"), "method"))) {
            echo "                                 
<a href=\"";
            // line 147
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id", array()))), "html", null, true);
            echo "\" class=\"button small\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edytuj"), "html", null, true);
            echo "</a>
";
        }
        // line 148
        echo "  
                    
                </div>
                
                
                
            </div>
        
            <h1>";
        // line 156
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kondolencje"), "html", null, true);
        if (((isset($context["posts_count"]) ? $context["posts_count"] : null) > 0)) {
            echo "<i class=\"badge\">";
            echo twig_escape_filter($this->env, (isset($context["posts_count"]) ? $context["posts_count"] : null), "html", null, true);
            echo "</i>";
        }
        echo " </h1>


            <div class=\"content\">
                ";
        // line 160
        if ( !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "block", array())) {
            // line 161
            echo "                    ";
            if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
                // line 162
                echo "                    <form method=\"post\" class=\"new-post\">
                         ";
                // line 163
                echo $this->env->getExtension('app_extension')->tabUser($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()));
                echo "
                         <div class=\"widget\">
                         <textarea name=\"message\" required=\"required\" placeholder=\"";
                // line 165
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wpiusz tutaj treść kondolencji"), "html", null, true);
                echo "\"></textarea> 
                         </div>

                         <button type=\"submit\" class=\"small\"><i class=\"fa fa-heart\"></i> ";
                // line 168
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wyślij kondolencje"), "html", null, true);
                echo "</button>
                    </form>
                    ";
            } else {
                // line 170
                echo " 
                        <p>";
                // line 171
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Aby złożyć kondolencje należy się zalogować lub użyć konta facebook."), "html", null, true);
                echo "</p>
                        <div class=\"options\">
                           <a href=\"";
                // line 173
                echo $this->env->getExtension('routing')->getPath("register");
                echo "\" class=\"button small\"><i class=\"fa fa-user-plus\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestracja"), "html", null, true);
                echo "</a>
                           <a href=\"";
                // line 174
                echo $this->env->getExtension('routing')->getPath("login");
                echo "\" class=\"button small\"><i class=\"fa fa-user\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logowanie"), "html", null, true);
                echo "</a>
                           <a href=\"";
                // line 175
                echo twig_escape_filter($this->env, (isset($context["facebook_url"]) ? $context["facebook_url"] : null), "html", null, true);
                echo "\" class=\"button facebook small\"><i class=\"fa fa-facebook\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Konto facebook"), "html", null, true);
                echo "</a>
                        </div>
                        <p>";
                // line 177
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestrując się w Epado za pośrednictwem Facebooka, akceptujesz nasz regulamin:"), "html", null, true);
                echo " <a href=\"";
                echo $this->env->getExtension('routing')->getPath("rules");
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Regulamin"), "html", null, true);
                echo "</a>.</p> 
                    ";
            }
            // line 178
            echo "  
                ";
        } else {
            // line 179
            echo " 
                    <p>";
            // line 180
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodawanie nowych kondolencji zostało zablokowane."), "html", null, true);
            echo "</p>
                ";
        }
        // line 181
        echo " 
                
                ";
        // line 183
        echo twig_include($this->env, $context, "AppBundle:Public:posts.html.twig", array("posts" => (isset($context["posts"]) ? $context["posts"] : null)));
        echo "
                ";
        // line 197
        echo "   
            </div>
                
        </div>
        
        <div class=\"right-half\">  
    
            <h1>";
        // line 204
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Miejsce spoczynku"), "html", null, true);
        echo "</h1>


            <div class=\"content\">   
                <div class=\"options\">
                    <a href=\"/\" class=\"button small showmap\"><i class=\"fa fa-map-marker";
        // line 209
        echo "\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zobacz mapę"), "html", null, true);
        echo "</a> 
                    <a href=\"https://maps.apple.com/?q=";
        // line 210
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "localisation", array()), "latitude", array()), "html", null, true);
        echo ",";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "localisation", array()), "longitude", array()), "html", null, true);
        echo "\" target=\"_blank\" class=\"button small\"><i class=\"fa fa-location-arrow\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prowadź do miejsca"), "html", null, true);
        echo "</a>
                </div>
                <div id=\"map\" class=\"map\" style=\"height: 340px;\"></div>
                
                <script>
                  \$(function() {


                    var latLng = {lat: ";
        // line 218
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "localisation", array()), "latitude", array()), "html", null, true);
        echo ", lng: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "localisation", array()), "longitude", array()), "html", null, true);
        echo "};
                    
                    var map = new google.maps.Map(document.getElementById('map'), {
                      center: latLng,
                      zoom: 15
                    });
                    var marker = new google.maps.Marker({
                      position: latLng,
                      map: map,
                      title: '";
        // line 227
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "lastname", array()), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Miejsce spoczynku"), "html", null, true);
        echo "'
                    });
                    
                    \$('#map').toggle();
                    
                    \$('.showmap').click(function(event){
                       \$('#map').toggle(); 
                       
                       var center = map.getCenter(); google.maps.event.trigger(map, 'resize'); map.setCenter(center);
                       
                       event.preventDefault();
                       
                    });
                    
                    if(\$( window ).width()>800){
                        \$('.showmap').click();
                        \$('.showmap').remove();
                    }    
                  });
                </script>
            </div>
                    
            <h1>";
        // line 249
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Udostępnij"), "html", null, true);
        echo "</h1>
            
            <div class=\"content\">
  
    
";
        // line 254
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 255
            echo "<p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Poprawny format nr telefonu to +00.00000000"), "html", null, true);
            echo "</p> 
<form method=\"post\" class=\"share-form\">
    <input type=\"text\" name=\"phone\" class=\"sh phone\" placeholder=\"";
            // line 257
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr telefonu"), "html", null, true);
            echo "\">
    <button type=\"submit\" class=\"small sh\">";
            // line 258
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wyślij na telefon"), "html", null, true);
            echo "</button>
</form>
<form method=\"post\" class=\"share-form\">  
    <input type=\"text\" name=\"email\" class=\"sh\" placeholder=\"";
            // line 261
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Email"), "html", null, true);
            echo "\">
    <button type=\"submit\" class=\"small sh\">";
            // line 262
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wyślij na maila"), "html", null, true);
            echo "</button>
</form>
";
        } else {
            // line 264
            echo " 
    <p>";
            // line 265
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Po zalogowaniu będziesz mógł wysłać link do strony poprzez email lub SMS."), "html", null, true);
            echo "</p>
";
        }
        // line 266
        echo " 
</div>
<div class=\"content\">
<div class=\"options\">     
<a class=\"share twitter-share-button\" href=\"https://twitter.com/intent/tweet\"></a>
<div class=\"share fb-send\" data-href=\"";
        // line 271
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array(), "method") . $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('app_extension')->extendUrl())), "html", null, true);
        echo "\"></div>
<div class=\"share fb-share-button\" data-href=\"";
        // line 272
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array(), "method") . $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('app_extension')->extendUrl())), "html", null, true);
        echo "\" data-layout=\"button\"></div>
</div>


            </div>
                    
                    
                    
            ";
        // line 280
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "getImagesSort", array(), "method")) {
            // line 281
            echo "            <h1 id=\"photos\"><span class=\"pho\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zdjęcia"), "html", null, true);
            echo "</span> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("i"), "html", null, true);
            echo " <span class=\"vid\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Filmy"), "html", null, true);
            echo "</span></h1>    
            <div class=\"content\">
                <div class=\"gallery\">
                        ";
            // line 284
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "getImagesSort", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 285
                echo "                            ";
                if ($this->getAttribute($context["image"], "video", array())) {
                    // line 286
                    echo "                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "video", array()), "html", null, true);
                    echo "\" class=\"element video\" 
                               data-sub-html=\"";
                    // line 287
                    if ($this->getAttribute($context["image"], "name", array())) {
                        echo "<h4>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "name", array()), "html", null, true);
                        echo "</h4>";
                    }
                    if ($this->getAttribute($context["image"], "description", array())) {
                        echo "<p>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "description", array()), "html", null, true);
                        echo "</p>";
                    }
                    echo "\"
                               >
                                <img src=\"";
                    // line 289
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "160x120", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                    echo "\">
                            </a>    
                            ";
                } else {
                    // line 291
                    echo "    
                            <a href=\"/";
                    // line 292
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->getAttribute($context["image"], "webPath", array())), "html", null, true);
                    echo "\"  
                               data-responsive=\"";
                    // line 293
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "700", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                    echo " 700
                               , ";
                    // line 294
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "1000", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                    echo " 1000
                               , ";
                    // line 295
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "1300", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                    echo " 1300\" 
                               class=\"element photo\" 
                               data-sub-html=\"";
                    // line 297
                    if ($this->getAttribute($context["image"], "name", array())) {
                        echo "<h4>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "name", array()), "html", null, true);
                        echo "</h4>";
                    }
                    if ($this->getAttribute($context["image"], "description", array())) {
                        echo "<p>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "description", array()), "html", null, true);
                        echo "</p>";
                    }
                    echo "\">
                                <img src=\"";
                    // line 298
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "160x120", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                    echo "\">
                            </a>

                            ";
                }
                // line 302
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 303
            echo "                </div>        
            </div>  
            ";
        }
        // line 305
        echo " 

            ";
        // line 307
        if ((twig_length_filter($this->env, (isset($context["family"]) ? $context["family"] : null)) > 1)) {
            // line 308
            echo "            <h1>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Inni członkowie rodziny"), "html", null, true);
            echo "</h1>

            <div class=\"content pages\">
                ";
            // line 311
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["family"]) ? $context["family"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["fa"]) {
                if (($context["fa"] != (isset($context["page"]) ? $context["page"] : null))) {
                    // line 312
                    echo "                <div class=\"element\">  
                    <a href=\"";
                    // line 313
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->pageUrl($this->getAttribute($context["fa"], "code", array())), "html", null, true);
                    echo "\">
                    <div class=\"avatar\" style=\"background-image:url('";
                    // line 314
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "60x60", "file" => $this->getAttribute($context["fa"], "avatar", array())))), "html", null, true);
                    echo "');\"></div>    
                    
                    <p class=\"name\">
                        <i class=\"fa fa-eye\"></i>
                        ";
                    // line 318
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["fa"], "translate", array(0 => $this->getAttribute($context["fa"], "locale", array())), "method"), "name", array()), "html", null, true);
                    echo "
                        <span>";
                    // line 319
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["fa"], "begin", array())), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["fa"], "end", array())), "html", null, true);
                    echo "</span>
                    </p>
                    </a>
                </div>
                ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fa'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 324
            echo "            </div>
            ";
        }
        // line 325
        echo " 
            
            
            ";
        // line 328
        if ((isset($context["products"]) ? $context["products"] : null)) {
            // line 329
            echo "                <h1>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Produkty i usługi"), "html", null, true);
            echo "</h1>
                ";
            // line 330
            $this->loadTemplate("AppBundle:Product:products.html.twig", "AppBundle:Public:person.html.twig", 330)->display(array("products" => (isset($context["products"]) ? $context["products"] : null), "page" => (isset($context["page"]) ? $context["page"] : null)));
            // line 331
            echo "            ";
        }
        // line 332
        echo "            
            
        </div>


            
        ";
        // line 338
        if ((isset($context["partner"]) ? $context["partner"] : null)) {
            echo "   
            <div class=\"ad\">
                
            ";
            // line 341
            if ($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "addesktop", array())) {
                // line 342
                echo "              ";
                if ($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "adlink", array())) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "adlink", array()), "html", null, true);
                    echo "\">";
                }
                // line 343
                echo "                  <img class=\"addesktop\" src=\"/uploads/ads/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "addesktop", array()), "html", null, true);
                echo "\" style=\"max-width:100%;\">
              ";
                // line 344
                if ($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "adlink", array())) {
                    echo "</a>";
                }
                echo " 
            ";
            }
            // line 346
            echo "           
            ";
            // line 347
            if ($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "admobile", array())) {
                // line 348
                echo "              ";
                if ($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "adlink", array())) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "adlink", array()), "html", null, true);
                    echo "\">";
                }
                // line 349
                echo "                  <img class=\"admobile\" src=\"/uploads/ads/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "admobile", array()), "html", null, true);
                echo "\" style=\"max-width:100%;\">
              ";
                // line 350
                if ($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "adlink", array())) {
                    echo "</a>";
                }
                echo "  
            ";
            }
            // line 352
            echo "       
            </div>    
        ";
        }
        // line 355
        echo "
    </div>
    
</div>    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Public:person.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  962 => 355,  957 => 352,  950 => 350,  945 => 349,  938 => 348,  936 => 347,  933 => 346,  926 => 344,  921 => 343,  914 => 342,  912 => 341,  906 => 338,  898 => 332,  895 => 331,  893 => 330,  888 => 329,  886 => 328,  881 => 325,  877 => 324,  863 => 319,  859 => 318,  852 => 314,  848 => 313,  845 => 312,  840 => 311,  833 => 308,  831 => 307,  827 => 305,  822 => 303,  816 => 302,  809 => 298,  796 => 297,  791 => 295,  787 => 294,  783 => 293,  779 => 292,  776 => 291,  770 => 289,  756 => 287,  751 => 286,  748 => 285,  744 => 284,  733 => 281,  731 => 280,  720 => 272,  716 => 271,  709 => 266,  704 => 265,  701 => 264,  695 => 262,  691 => 261,  685 => 258,  681 => 257,  675 => 255,  673 => 254,  665 => 249,  636 => 227,  622 => 218,  607 => 210,  602 => 209,  594 => 204,  585 => 197,  581 => 183,  577 => 181,  572 => 180,  569 => 179,  565 => 178,  556 => 177,  549 => 175,  543 => 174,  537 => 173,  532 => 171,  529 => 170,  523 => 168,  517 => 165,  512 => 163,  509 => 162,  506 => 161,  504 => 160,  492 => 156,  482 => 148,  475 => 147,  471 => 146,  468 => 145,  462 => 142,  454 => 141,  451 => 140,  443 => 138,  438 => 136,  436 => 135,  428 => 129,  424 => 128,  418 => 127,  416 => 126,  413 => 125,  409 => 124,  407 => 123,  403 => 121,  394 => 120,  385 => 119,  376 => 118,  368 => 117,  365 => 116,  356 => 115,  347 => 114,  340 => 112,  333 => 111,  322 => 108,  320 => 107,  316 => 106,  313 => 105,  303 => 103,  300 => 102,  298 => 101,  291 => 99,  285 => 98,  279 => 97,  271 => 96,  264 => 92,  257 => 87,  245 => 86,  233 => 85,  221 => 84,  210 => 83,  196 => 72,  190 => 71,  181 => 70,  175 => 66,  170 => 64,  163 => 63,  159 => 62,  153 => 60,  149 => 58,  142 => 56,  138 => 55,  125 => 51,  120 => 48,  117 => 47,  93 => 26,  86 => 21,  83 => 20,  77 => 18,  71 => 17,  65 => 14,  61 => 13,  57 => 12,  49 => 7,  45 => 6,  41 => 5,  35 => 3,  32 => 2,  11 => 1,);
    }
}
/* {% extends "home.html.twig" %}*/
/* {% block meta %}*/
/* <meta property="og:url"                content="{{ app.request.getSchemeAndHttpHost()~extend()|production }}" >*/
/* <meta property="og:type"               content="article" >*/
/* <meta property="og:title"              content="{{ page.translate(page.locale).name }}" >*/
/* <meta property="og:description"        content="{{ page.translate(page.locale).description }}" >*/
/* <meta property="og:image"              content="{{ app.request.getSchemeAndHttpHost()~path('thumbnail', {'resolution': '1200x630', 'file': page.avatar })|production }}" >*/
/* */
/* <meta name="twitter:card" content="summary_large_image">*/
/* <meta name="twitter:site" content="@epado">*/
/* <meta name="twitter:creator" content="@epado">*/
/* <meta name="twitter:title" content="{{ page.translate(page.locale).name }}">*/
/* <meta name="twitter:description" content="{{ page.translate(page.locale).description }}">*/
/* <meta name="twitter:image" content="{{ app.request.getSchemeAndHttpHost()~path('thumbnail', {'resolution': '700x500', 'file': page.avatar })|production }}">*/
/* {% endblock %}*/
/* */
/* {% block title %}{{ page.translate(page.locale).name }}{% endblock %}*/
/* {% block description %}{{ page.translate(page.locale).description }}{% endblock %}*/
/* */
/* {% block after_body %}*/
/* <div id="fb-root"></div>*/
/* <script>(function(d, s, id) {*/
/*   var js, fjs = d.getElementsByTagName(s)[0];*/
/*   if (d.getElementById(id)) return;*/
/*   js = d.createElement(s); js.id = id;*/
/*   js.src = "//connect.facebook.net/{{ default_codes[app.request.locale] }}/sdk.js#xfbml=1&version=v2.5&appId=1857414584485351";*/
/*   fjs.parentNode.insertBefore(js, fjs);*/
/* }(document, 'script', 'facebook-jssdk'));</script>*/
/* <script>window.twttr = (function(d, s, id) {*/
/*   var js, fjs = d.getElementsByTagName(s)[0],*/
/*     t = window.twttr || {};*/
/*   if (d.getElementById(id)) return t;*/
/*   js = d.createElement(s);*/
/*   js.id = id;*/
/*   js.src = "https://platform.twitter.com/widgets.js";*/
/*   fjs.parentNode.insertBefore(js, fjs);*/
/*  */
/*   t._e = [];*/
/*   t.ready = function(f) {*/
/*     t._e.push(f);*/
/*   };*/
/*  */
/*   return t;*/
/* }(document, "script", "twitter-wjs"));</script>     */
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* <div class="admin page person">*/
/*     */
/*     <div class="first-content person-info" > */
/*         <div class="background{% if page.background is defined and page.path in page.background%} custom" style="background-image:url('{{ path('thumbnail', {'resolution': '1800', 'file': page.background })|production }}');"{% else %}"{% endif %}></div>*/
/*         <div class="size">*/
/*             */
/*                                */
/*             {% if app.user and app.user.havepagepermission(page,'page_background') %}                                   */
/*             <a href="{{ path('page_form',{'id':page.id}) }}#background" class="edit-image triggerAnimation fadeInLeft"><i class="fa fa-camera" aria-hidden="true"></i> {{ 'Zmień zdjęcie w tle'|trans }}</a>*/
/*             {% endif %}*/
/*             <div class="description">*/
/*                 */
/*                 <div {#href="#photos"#} class="avatar delay2 triggerAnimation" data-animate="fadeInLeft" style="background-image:url('{{ path('thumbnail', {'resolution': '165x165', 'file': page.avatar })|production }}');">*/
/*                 */
/*                 {% if app.user and app.user.havepagepermission(page,'page_image') and app.user.havepagepermission(page,'page_images') %}                                 */
/*                 <a href="{{ path('page_form',{'id':page.id}) }}#image" class="edit-image triggerAnimation fadeInDown"><i class="fa fa-camera" aria-hidden="true"></i> {{ 'Zmień zdjęcie'|trans }}</a>*/
/*                 {% else %}  */
/*                 <a href="#photos" style="width:100%;height:100%; display:block; position:absolute;"></a>   */
/*                 {% endif %}  */
/*                 */
/*                 </div>*/
/*                 */
/*                 <h1 class="delay2 triggerAnimation" data-animate="fadeInRight">{{ page.translate(page.locale).firstname }} {{ page.translate(page.locale).lastname }}&nbsp;&nbsp;<i class="badge">{{ lived(page.begin,page.end) }}{{ 'l.'|trans }}</i></h1>*/
/*                 <p class="time delay2 triggerAnimation" data-animate="fadeInRight">{{ page.begin|mydate() }} - {{ page.end|mydate() }}</p>*/
/*                 <p class="desc delay2 triggerAnimation" data-animate="fadeInRight">{{ page.translate(page.locale).description|nl2br }}</p>*/
/*                 */
/*             </div>*/
/* */
/*         </div>*/
/*     </div> */
/*                 */
/*     */
/*     <div class="size">    */
/*         */
/*         <div class="notifications">*/
/*             {% for flashMessage in app.session.flashbag.get('notice') %}<div class="notification notice">{{ flashMessage|raw }}</div>{% endfor %}*/
/*             {% for flashMessage in app.session.flashbag.get('warning') %}<div class="notification warning">{{ flashMessage|raw }}</div>{% endfor %}*/
/*             {% for flashMessage in app.session.flashbag.get('success') %}<div class="notification success">{{ flashMessage|raw }}</div>{% endfor %}*/
/*             {% for flashMessage in app.session.flashbag.get('error') %}<div class="notification error">{{ flashMessage|raw }}</div>{% endfor %}*/
/*         </div>*/
/*         */
/*         */
/*         <div class="left-half">*/
/*         */
/*             <h1>{{ 'Informacje'|trans }}</h1>*/
/* */
/*             <div class="content">*/
/*                 <p>*/
/*                 <b>{{ 'Osoba'|trans }}:</b> {{ page.translate(page.locale).firstname }} {{ page.translate(page.locale).lastname }}<br>*/
/*                 <b>{{ 'Data urodzenia'|trans }}:</b> {{ page.begin|mydate }}<br>*/
/*                 <b>{{ 'Data śmierci'|trans }}:</b> {{ page.end|mydate }}<br>*/
/*                 <b>{{ 'Żył lat'|trans }}:</b> {{ lived(page.begin,page.end) }}<br>*/
/*                 */
/* {% if page.cemetery.checked is null %}*/
/*     {% if app.user and app.user==page.buyer %}*/
/*     <b>{{ 'Cmentarz'|trans }}:</b> <span style="color:red;" class="tip" title="{{ 'Możesz dodać nowy cmentarz dla tej strony lub wybrać cmentarz już istniejący'|trans }}"> {{ 'wprowadzony błędnie lub zduplikowany'|trans }}</span><br>*/
/*     {% endif %}*/
/* */
/* {% elseif page.cemetery.checked==false %} */
/*     {% if app.user and app.user==page.buyer %}*/
/*     <b>{{ 'Cmentarz'|trans }}:</b> <span style="color:#dac572;" class="tip" title="{{ 'Nasi pracownicy sprawdzą czy cmentarz został dodany prawidłowo i czy nie ma już takiego cmentarza w naszej bazie'|trans }}">{{ 'oczekuje na weryfikację'|trans }}</span><br>*/
/*     {% endif %}*/
/* {% else %}*/
/*     <b>{{ 'Cmentarz'|trans }}:</b> {{ page.cemetery.name }}<br>*/
/*     <b>{{ 'Miasto'|trans }}:</b> {{ page.cemetery.address.city }}<br>       */
/* {% endif %}*/
/*                 {% if page.alley %}<b>{{ 'Aleja'|trans }}:</b> {{ page.alley }}<br>{% endif %}*/
/*                 {% if page.number %}<b>{{ 'Nr kwatery'|trans }}:</b> {{ page.number }}<br>{% endif %}*/
/*                 */
/*                 {% if page.familyname %}<b>{{ 'Nazwisko rodowe'|trans }}:</b> {{ page.familyname }}<br>{% endif %}*/
/*                 {% if page.father %}<b>{{ 'Imię ojca'|trans }}:</b> {{ page.father }}<br>{% endif %}*/
/*                 {% if page.mother %}<b>{{ 'Imię matki'|trans }}:</b> {{ page.mother }}<br>{% endif %}*/
/*                 {% if page.birthcity %}<b>{{ 'Miejsce urodzenia'|trans }}:</b> {{ page.birthcity }}<br>{% endif %}*/
/*                 </p>*/
/*                 */
/*                 {% if app.user %}*/
/* */
/*                 {% else %} */
/*                     {% if not page.special %}*/
/*                     <p>{{ 'Aby skontaktować się z rodziną musisz się zalogować.'|trans }}</p>*/
/*                     {% endif %} */
/*                 {% endif %} */
/* */
/*                 */
/*                 <div class="options">*/
/*                     */
/*                     */
/* {% if page.cemetery.checked is null %}*/
/* {% elseif page.cemetery.checked==false %}   */
/* {% else %}*/
/*    <a href="{{ path('cemetery',{'id':page.cemetery.id}) }}" class="button small"><i class="fa fa-university"></i>{{ 'Znajdź cmentarz'|trans }}</a>            */
/* {% endif %}*/
/*                     {% if app.user and not page.special %}*/
/*                       <a href="{{ path('message_form',{'recipient_id':page.creator.id}) }}" class="button small"><i class="fa fa-envelope"></i>{{ 'Wiadomość do rodziny'|trans }}</a>  */
/*                     {% else %} */
/*                         */
/*                 */
/*                     {% endif %} */
/* {% if app.user and app.user.havepagepermission(page,'page_edit') %}                                 */
/* <a href="{{ path('page_form',{'id':page.id}) }}" class="button small"><i class="fa fa-pencil" aria-hidden="true"></i> {{ 'Edytuj'|trans }}</a>*/
/* {% endif %}  */
/*                     */
/*                 </div>*/
/*                 */
/*                 */
/*                 */
/*             </div>*/
/*         */
/*             <h1>{{ 'Kondolencje'|trans }}{% if posts_count > 0 %}<i class="badge">{{ posts_count }}</i>{% endif %} </h1>*/
/* */
/* */
/*             <div class="content">*/
/*                 {% if not page.block %}*/
/*                     {% if app.user %}*/
/*                     <form method="post" class="new-post">*/
/*                          {{ tabUser(app.user)|raw }}*/
/*                          <div class="widget">*/
/*                          <textarea name="message" required="required" placeholder="{{ 'Wpiusz tutaj treść kondolencji'|trans }}"></textarea> */
/*                          </div>*/
/* */
/*                          <button type="submit" class="small"><i class="fa fa-heart"></i> {{ 'Wyślij kondolencje'|trans }}</button>*/
/*                     </form>*/
/*                     {% else %} */
/*                         <p>{{ 'Aby złożyć kondolencje należy się zalogować lub użyć konta facebook.'|trans }}</p>*/
/*                         <div class="options">*/
/*                            <a href="{{ path('register') }}" class="button small"><i class="fa fa-user-plus"></i>{{ 'Rejestracja'|trans }}</a>*/
/*                            <a href="{{ path('login') }}" class="button small"><i class="fa fa-user"></i>{{ 'Logowanie'|trans }}</a>*/
/*                            <a href="{{ facebook_url }}" class="button facebook small"><i class="fa fa-facebook"></i>{{ 'Konto facebook'|trans }}</a>*/
/*                         </div>*/
/*                         <p>{{ 'Rejestrując się w Epado za pośrednictwem Facebooka, akceptujesz nasz regulamin:'|trans }} <a href="{{ path('rules') }}">{{ 'Regulamin'|trans }}</a>.</p> */
/*                     {% endif %}  */
/*                 {% else %} */
/*                     <p>{{ 'Dodawanie nowych kondolencji zostało zablokowane.'|trans }}</p>*/
/*                 {% endif %} */
/*                 */
/*                 {{ include ('AppBundle:Public:posts.html.twig', {'posts':posts}) }}*/
/*                 {#{% if posts is iterable %}*/
/*                     {% for post in posts %}*/
/*                         <div class="post">*/
/*                             {% if app.user %}*/
/*                                {% if(app.user.type in ['admin','worker'] or app.user==post.creator or app.user==page.buyer ) %} */
/*                                    <a href="?post_delete_id={{post.id}}" class="icon delete"><i class="fa fa-times"></i></a>*/
/*                                {% endif %}     */
/*                             {% endif %} */
/*                             {{ tabUser(post.creator|raw)|raw }}*/
/*                             <p class="name">{{ post.creator.fullname }}<span>{{ post.created|mydatetime() }}</span></p>*/
/*                             <p class="message">{{post.message}}</p>*/
/*                         </div>    */
/*                     {% endfor %}   */
/*                 {% endif %}#}   */
/*             </div>*/
/*                 */
/*         </div>*/
/*         */
/*         <div class="right-half">  */
/*     */
/*             <h1>{{ 'Miejsce spoczynku'|trans }}</h1>*/
/* */
/* */
/*             <div class="content">   */
/*                 <div class="options">*/
/*                     <a href="/" class="button small showmap"><i class="fa fa-map-marker{#map#}"></i>{{ 'Zobacz mapę'|trans }}</a> */
/*                     <a href="https://maps.apple.com/?q={{ page.localisation.latitude }},{{ page.localisation.longitude }}" target="_blank" class="button small"><i class="fa fa-location-arrow"></i>{{ 'Prowadź do miejsca'|trans }}</a>*/
/*                 </div>*/
/*                 <div id="map" class="map" style="height: 340px;"></div>*/
/*                 */
/*                 <script>*/
/*                   $(function() {*/
/* */
/* */
/*                     var latLng = {lat: {{ page.localisation.latitude }}, lng: {{ page.localisation.longitude }}};*/
/*                     */
/*                     var map = new google.maps.Map(document.getElementById('map'), {*/
/*                       center: latLng,*/
/*                       zoom: 15*/
/*                     });*/
/*                     var marker = new google.maps.Marker({*/
/*                       position: latLng,*/
/*                       map: map,*/
/*                       title: '{{ page.firstname }} {{ page.lastname }}, {{ 'Miejsce spoczynku'|trans }}'*/
/*                     });*/
/*                     */
/*                     $('#map').toggle();*/
/*                     */
/*                     $('.showmap').click(function(event){*/
/*                        $('#map').toggle(); */
/*                        */
/*                        var center = map.getCenter(); google.maps.event.trigger(map, 'resize'); map.setCenter(center);*/
/*                        */
/*                        event.preventDefault();*/
/*                        */
/*                     });*/
/*                     */
/*                     if($( window ).width()>800){*/
/*                         $('.showmap').click();*/
/*                         $('.showmap').remove();*/
/*                     }    */
/*                   });*/
/*                 </script>*/
/*             </div>*/
/*                     */
/*             <h1>{{ 'Udostępnij'|trans }}</h1>*/
/*             */
/*             <div class="content">*/
/*   */
/*     */
/* {% if app.user %}*/
/* <p>{{ 'Poprawny format nr telefonu to +00.00000000'|trans }}</p> */
/* <form method="post" class="share-form">*/
/*     <input type="text" name="phone" class="sh phone" placeholder="{{ 'Nr telefonu'|trans }}">*/
/*     <button type="submit" class="small sh">{{ 'Wyślij na telefon'|trans }}</button>*/
/* </form>*/
/* <form method="post" class="share-form">  */
/*     <input type="text" name="email" class="sh" placeholder="{{ 'Email'|trans }}">*/
/*     <button type="submit" class="small sh">{{ 'Wyślij na maila'|trans }}</button>*/
/* </form>*/
/* {% else %} */
/*     <p>{{ 'Po zalogowaniu będziesz mógł wysłać link do strony poprzez email lub SMS.'|trans }}</p>*/
/* {% endif %} */
/* </div>*/
/* <div class="content">*/
/* <div class="options">     */
/* <a class="share twitter-share-button" href="https://twitter.com/intent/tweet"></a>*/
/* <div class="share fb-send" data-href="{{ app.request.getSchemeAndHttpHost()~extend()|production }}"></div>*/
/* <div class="share fb-share-button" data-href="{{ app.request.getSchemeAndHttpHost()~extend()|production }}" data-layout="button"></div>*/
/* </div>*/
/* */
/* */
/*             </div>*/
/*                     */
/*                     */
/*                     */
/*             {% if page.getImagesSort() %}*/
/*             <h1 id="photos"><span class="pho">{{ 'Zdjęcia'|trans }}</span> {{ 'i'|trans }} <span class="vid">{{ 'Filmy'|trans }}</span></h1>    */
/*             <div class="content">*/
/*                 <div class="gallery">*/
/*                         {% for image in page.getImagesSort() %}*/
/*                             {% if image.video %}*/
/*                             <a href="{{image.video}}" class="element video" */
/*                                data-sub-html="{% if image.name %}<h4>{{image.name}}</h4>{% endif %}{% if image.description %}<p>{{image.description}}</p>{% endif %}"*/
/*                                >*/
/*                                 <img src="{{ path('thumbnail', {'resolution': '160x120', 'file': image.webPath    })|production }}">*/
/*                             </a>    */
/*                             {% else %}    */
/*                             <a href="/{{image.webPath|production}}"  */
/*                                data-responsive="{{ path('thumbnail', {'resolution': '700', 'file': image.webPath    })|production }} 700*/
/*                                , {{ path('thumbnail', {'resolution': '1000', 'file': image.webPath    })|production }} 1000*/
/*                                , {{ path('thumbnail', {'resolution': '1300', 'file': image.webPath    })|production }} 1300" */
/*                                class="element photo" */
/*                                data-sub-html="{% if image.name %}<h4>{{image.name}}</h4>{% endif %}{% if image.description %}<p>{{image.description}}</p>{% endif %}">*/
/*                                 <img src="{{ path('thumbnail', {'resolution': '160x120', 'file': image.webPath    })|production }}">*/
/*                             </a>*/
/* */
/*                             {% endif %}*/
/*                         {% endfor %}*/
/*                 </div>        */
/*             </div>  */
/*             {% endif %} */
/* */
/*             {% if family|length>1 %}*/
/*             <h1>{{ 'Inni członkowie rodziny'|trans }}</h1>*/
/* */
/*             <div class="content pages">*/
/*                 {% for fa in family %}{% if fa!=page %}*/
/*                 <div class="element">  */
/*                     <a href="{{path_page(fa.code)}}">*/
/*                     <div class="avatar" style="background-image:url('{{ path('thumbnail', {'resolution': '60x60', 'file': fa.avatar })|production }}');"></div>    */
/*                     */
/*                     <p class="name">*/
/*                         <i class="fa fa-eye"></i>*/
/*                         {{ fa.translate(fa.locale).name }}*/
/*                         <span>{{ fa.begin|mydate }} - {{ fa.end|mydate }}</span>*/
/*                     </p>*/
/*                     </a>*/
/*                 </div>*/
/*                 {% endif %}{% endfor %}*/
/*             </div>*/
/*             {% endif %} */
/*             */
/*             */
/*             {% if products %}*/
/*                 <h1>{{ 'Produkty i usługi'|trans }}</h1>*/
/*                 {% include 'AppBundle:Product:products.html.twig' with {'products': products, 'page': page } only %}*/
/*             {% endif %}*/
/*             */
/*             */
/*         </div>*/
/* */
/* */
/*             */
/*         {% if partner %}   */
/*             <div class="ad">*/
/*                 */
/*             {% if partner.addesktop %}*/
/*               {% if partner.adlink %}<a href="{{partner.adlink}}">{% endif %}*/
/*                   <img class="addesktop" src="/uploads/ads/{{partner.addesktop}}" style="max-width:100%;">*/
/*               {% if partner.adlink %}</a>{% endif %} */
/*             {% endif %}*/
/*            */
/*             {% if partner.admobile %}*/
/*               {% if partner.adlink %}<a href="{{partner.adlink}}">{% endif %}*/
/*                   <img class="admobile" src="/uploads/ads/{{partner.admobile}}" style="max-width:100%;">*/
/*               {% if partner.adlink %}</a>{% endif %}  */
/*             {% endif %}*/
/*        */
/*             </div>    */
/*         {% endif %}*/
/* */
/*     </div>*/
/*     */
/* </div>    */
/* {% endblock %}*/
