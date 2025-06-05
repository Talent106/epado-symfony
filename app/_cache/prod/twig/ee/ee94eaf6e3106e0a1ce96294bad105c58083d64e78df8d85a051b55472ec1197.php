<?php

/* AppBundle:Public:place.html.twig */
class __TwigTemplate_81d60c40716ebe2acee518c93c852117d18f666bea4b82c4d677b65b05a9827c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("home.html.twig", "AppBundle:Public:place.html.twig", 1);
        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
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
    public function block_content($context, array $blocks = array())
    {
        // line 21
        echo "<div class=\"admin page place\">
    
    <div class=\"first-content person-info\"> 
        <div class=\"background\" ";
        // line 24
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "background", array(), "any", true, true) && ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "background", array()) != ""))) {
            echo " style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "1800", "file" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "background", array())))), "html", null, true);
            echo "');\"";
        }
        echo "></div>
        <div class=\"size\">
            
            ";
        // line 27
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["page"]) ? $context["page"] : null), 1 => "page_background"), "method"))) {
            echo "                                 
            <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id", array()))), "html", null, true);
            echo "#background\" class=\"edit-image triggerAnimation fadeInLeft\"><i class=\"fa fa-camera\" aria-hidden=\"true\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zmień zdjęcie w tle"), "html", null, true);
            echo "</a>
            ";
        }
        // line 30
        echo "            
            <div class=\"description\">
                
                <div ";
        // line 33
        echo " class=\"avatar delay2 triggerAnimation\" data-animate=\"fadeInLeft\" style=\"background-image:url('";
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "165x165", "file" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "avatar", array())))), "html", null, true);
        echo "');\">
                ";
        // line 34
        if ((($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["page"]) ? $context["page"] : null), 1 => "page_image"), "method")) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["page"]) ? $context["page"] : null), 1 => "page_images"), "method"))) {
            echo "                                
                <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id", array()))), "html", null, true);
            echo "#image\" class=\"edit-image triggerAnimation fadeInDown\"><i class=\"fa fa-camera\" aria-hidden=\"true\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zmień zdjęcie"), "html", null, true);
            echo "</a>
                ";
        }
        // line 37
        echo "                </div>
                
                <h1 class=\"delay2 triggerAnimation\" data-animate=\"fadeInRight\">";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "name", array()), "html", null, true);
        echo "</h1>
                <p class=\"time delay2 triggerAnimation\" data-animate=\"fadeInRight\">";
        // line 40
        if ( !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "begin", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "beginyear", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "begin", array())), "html", null, true);
        }
        echo "</p>
                <p class=\"desc delay2 triggerAnimation\" data-animate=\"fadeInRight\">";
        // line 41
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "description", array()), "html", null, true));
        echo "</p>
                
            </div>

        </div>
    </div> 
                
    
    <div class=\"size\">    
        
        <div class=\"notifications\">
            ";
        // line 52
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
        // line 53
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
        // line 54
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
        // line 55
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
        // line 56
        echo "        </div>
        
        
        <div class=\"left-half\">
        
            <h1>";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Informacje"), "html", null, true);
        echo "</h1>

            <div class=\"content\">
                <p>
                <b>";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
        echo ":</b> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "name", array()), "html", null, true);
        echo "<br>
                <b>";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Data powstania"), "html", null, true);
        echo ":</b> ";
        if ( !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "begin", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "beginyear", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "begin", array())), "html", null, true);
        }
        echo "<br>
                <b>";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ilość lat od powstania"), "html", null, true);
        echo ":</b> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->lived($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "begin", array()), $this->env->getExtension('app_extension')->nowObject()), "html", null, true);
        echo "<br>
                <b>";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Miasto"), "html", null, true);
        echo ":</b> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "address", array()), "city", array()), "html", null, true);
        echo "<br>
                </p>
        
";
        // line 71
        if (( !(null === $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "longdescription", array())) && ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "longdescription", array()) != ""))) {
            echo "   
    ";
            // line 72
            $context["longdescription"] = nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "longdescription", array()), "html", null, true));
            // line 73
            echo "    ";
            $context["parts"] = twig_split_filter($this->env, (isset($context["longdescription"]) ? $context["longdescription"] : null), "<br />");
            // line 74
            echo "    ";
            $context["i"] = 0;
            // line 75
            echo "    
    ";
            // line 76
            if ((twig_length_filter($this->env, (isset($context["parts"]) ? $context["parts"] : null)) > 1)) {
                echo "   
    <p>  
        ";
                // line 78
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["parts"]) ? $context["parts"] : null), 0, array(), "array"), "html", null, true);
                echo "
        
        <span class=\"longdescription hidden\">
            ";
                // line 81
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["parts"]) ? $context["parts"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["part"]) {
                    // line 82
                    echo "                ";
                    $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                    // line 83
                    echo "                ";
                    if (((isset($context["i"]) ? $context["i"] : null) == 2)) {
                        echo "   
                ";
                        // line 84
                        echo twig_escape_filter($this->env, $context["part"], "html", null, true);
                        echo "
                ";
                    }
                    // line 86
                    echo "                
                ";
                    // line 87
                    if (((isset($context["i"]) ? $context["i"] : null) > 2)) {
                        echo "   
                <br>";
                        // line 88
                        echo twig_escape_filter($this->env, $context["part"], "html", null, true);
                        echo "
                ";
                    }
                    // line 90
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['part'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 91
                echo "        </span>
    </p>
    
    <div class=\"options\">
        <div class=\"button small longdescription-show\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ";
                // line 95
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Czytaj więcej"), "html", null, true);
                echo "</div>
        <div class=\"button small longdescription-hide\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i> ";
                // line 96
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zwiń"), "html", null, true);
                echo "</div>
    </div>
    ";
            } else {
                // line 99
                echo "    <p>";
                echo twig_escape_filter($this->env, (isset($context["longdescription"]) ? $context["longdescription"] : null), "html", null, true);
                echo "</p>
    ";
            }
            // line 101
            echo "    
";
        }
        // line 102
        echo "         
                
";
        // line 104
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["page"]) ? $context["page"] : null), 1 => "page_edit"), "method"))) {
            echo "   
<div class=\"options\">
<a href=\"";
            // line 106
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id", array()))), "html", null, true);
            echo "\" class=\"button small\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edytuj"), "html", null, true);
            echo "</a>
</div>
";
        }
        // line 108
        echo "  
                
            </div>
        
           
 
            ";
        // line 114
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "getImagesSort", array(), "method")) {
            // line 115
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
            // line 118
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "getImagesSort", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 119
                echo "                            ";
                if ($this->getAttribute($context["image"], "video", array())) {
                    // line 120
                    echo "                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "video", array()), "html", null, true);
                    echo "\" class=\"element video\" 
                               data-sub-html=\"";
                    // line 121
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
                    // line 123
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "160x120", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                    echo "\">
                            </a>    
                            ";
                } else {
                    // line 125
                    echo "    
                            <a href=\"/";
                    // line 126
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->getAttribute($context["image"], "webPath", array())), "html", null, true);
                    echo "\"  
                               data-responsive=\"";
                    // line 127
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "700", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                    echo " 700
                               , ";
                    // line 128
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "1000", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                    echo " 1000
                               , ";
                    // line 129
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "1300", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                    echo " 1300\" 
                               class=\"element photo\" 
                               data-sub-html=\"";
                    // line 131
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
                    // line 132
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "160x120", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                    echo "\">
                            </a>

                            ";
                }
                // line 136
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 137
            echo "                </div>        
            </div>  
            ";
        }
        // line 139
        echo " 
    
                
        </div>
        
        <div class=\"right-half\">  
    
            <h1>";
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mapa"), "html", null, true);
        echo "</h1>


            <div class=\"content\"> 
                <div class=\"options\">
                    <a href=\"/\" class=\"button small showmap\"><i class=\"fa fa-map\"></i>";
        // line 151
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zobacz mapę"), "html", null, true);
        echo "</a>
                    <a href=\"https://maps.apple.com/?q=";
        // line 152
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
        // line 159
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
        // line 168
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "translate", array(0 => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "locale", array())), "method"), "name", array()), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Miejsce"), "html", null, true);
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
           
                    
        
        
        ";
        // line 193
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "audiobooks", array()))) {
            // line 194
            echo "            
            <script src=\"/js/soundmanager/script/soundmanager2-jsmin.js\"></script>
            <script type=\"text/javascript\">
                soundManager.setup({
                  // path to directory containing SM2 SWF
                  url: '/js/soundmanager/swf/'
                });
                
                soundManager.debugMode = false;
            </script>


            <script src=\"/js/soundmanager/demo/bar-ui/script/bar-ui.js\"></script>
            <link rel=\"stylesheet\" href=\"/js/soundmanager/demo/bar-ui/css/bar-ui.css\" />
            <style>
                .sm2-bar-ui {
                 font-size: 18px;
                 margin-bottom:15px;
                 color:white;
                }
                
                .sm2-bar-ui li, .sm2-bar-ui div{
                    color:white;
                }
                
                .sm2-bar-ui .sm2-main-controls,
                .sm2-bar-ui .sm2-playlist-drawer {
                 background-color: #dac572;
                }
                .sm2-bar-ui .sm2-inline-texture {
                 background: transparent;
                }
                .sm2-bar-ui {
                 min-width:100%;
                }
            </style>
            
            
            <h1><i class=\"fa fa-music\"></i>";
            // line 232
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Audiobooki"), "html", null, true);
            echo "</h1>
            
            <div class=\"content\"> 
        
<div class=\"sm2-bar-ui playlist-open full-width\">

 <div class=\"bd sm2-main-controls\">

  <div class=\"sm2-inline-texture\"></div>
  <div class=\"sm2-inline-gradient\"></div>

  <div class=\"sm2-inline-element sm2-button-element\">
   <div class=\"sm2-button-bd\">
    <a href=\"#play\" class=\"sm2-inline-button play-pause\">Play / pause</a>
   </div>
  </div>

  <div class=\"sm2-inline-element sm2-inline-status\">

   <div class=\"sm2-playlist\">
    <div class=\"sm2-playlist-target\">
     <!-- playlist <ul> + <li> markup will be injected here -->
     <!-- if you want default / non-JS content, you can put that here. -->
     <noscript><p>";
            // line 255
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wymagane jest włączenie javascriptu w przeglądarce."), "html", null, true);
            echo "</p></noscript>
    </div>
   </div>

   <div class=\"sm2-progress\">
    <div class=\"sm2-row\">
    <div class=\"sm2-inline-time\">0:00</div>
     <div class=\"sm2-progress-bd\">
      <div class=\"sm2-progress-track\">
       <div class=\"sm2-progress-bar\"></div>
       <div class=\"sm2-progress-ball\"><div class=\"icon-overlay\"></div></div>
      </div>
     </div>
     <div class=\"sm2-inline-duration\">0:00</div>
    </div>
   </div>

  </div>

  
  
  <div class=\"sm2-inline-element sm2-button-element sm2-volume\">
   <div class=\"sm2-button-bd\">
    <span class=\"sm2-inline-button sm2-volume-control volume-shade\"></span>
    <a href=\"#volume\" class=\"sm2-inline-button sm2-volume-control\">volume</a>
   </div>
  </div>

  <div class=\"sm2-inline-element sm2-button-element\">
   <div class=\"sm2-button-bd\">
    <a href=\"#prev\" title=\"Previous\" class=\"sm2-inline-button previous\">&lt; previous</a>
   </div>
  </div>

  <div class=\"sm2-inline-element sm2-button-element\">
   <div class=\"sm2-button-bd\">
    <a href=\"#next\" title=\"Next\" class=\"sm2-inline-button next\">&gt; next</a>
   </div>
  </div>

";
            // line 300
            echo "
 </div>

 <div class=\"bd sm2-playlist-drawer sm2-element\">

  <div class=\"sm2-inline-texture\">
   <div class=\"sm2-box-shadow\"></div>
  </div>

  <!-- playlist content is mirrored here -->

  <div class=\"sm2-playlist-wrapper\">
    
    <ul class=\"sm2-playlist-bd\">
    ";
            // line 326
            echo "     
     <!-- standard one-line items -->
     ";
            // line 328
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "audiobooks", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["audiobook"]) {
                // line 329
                echo "     <li><a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["audiobook"], "webpath", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["audiobook"], "name", array()), "html", null, true);
                echo "</a></li>
     ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['audiobook'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 331
            echo "    </ul>
  
  </div>

 </div>

</div>    
                  
            </div>    
        ";
        }
        // line 340
        echo "            
                    
            ";
        // line 342
        if ((isset($context["products"]) ? $context["products"] : null)) {
            // line 343
            echo "                <h1>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Produkty i usługi"), "html", null, true);
            echo "</h1>
                ";
            // line 344
            $this->loadTemplate("AppBundle:Product:products.html.twig", "AppBundle:Public:place.html.twig", 344)->display(array("products" => (isset($context["products"]) ? $context["products"] : null), "page" => (isset($context["page"]) ? $context["page"] : null)));
            // line 345
            echo "            ";
        }
        // line 346
        echo "            
            
            
        </div>

    </div>
    
</div>    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Public:place.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  714 => 346,  711 => 345,  709 => 344,  704 => 343,  702 => 342,  698 => 340,  686 => 331,  675 => 329,  671 => 328,  667 => 326,  651 => 300,  608 => 255,  582 => 232,  542 => 194,  540 => 193,  510 => 168,  496 => 159,  482 => 152,  478 => 151,  470 => 146,  461 => 139,  456 => 137,  450 => 136,  443 => 132,  430 => 131,  425 => 129,  421 => 128,  417 => 127,  413 => 126,  410 => 125,  404 => 123,  390 => 121,  385 => 120,  382 => 119,  378 => 118,  367 => 115,  365 => 114,  357 => 108,  349 => 106,  344 => 104,  340 => 102,  336 => 101,  330 => 99,  324 => 96,  320 => 95,  314 => 91,  308 => 90,  303 => 88,  299 => 87,  296 => 86,  291 => 84,  286 => 83,  283 => 82,  279 => 81,  273 => 78,  268 => 76,  265 => 75,  262 => 74,  259 => 73,  257 => 72,  253 => 71,  245 => 68,  239 => 67,  229 => 66,  223 => 65,  216 => 61,  209 => 56,  197 => 55,  185 => 54,  173 => 53,  162 => 52,  148 => 41,  140 => 40,  136 => 39,  132 => 37,  125 => 35,  121 => 34,  116 => 33,  111 => 30,  104 => 28,  100 => 27,  90 => 24,  85 => 21,  82 => 20,  76 => 18,  70 => 17,  64 => 14,  60 => 13,  56 => 12,  48 => 7,  44 => 6,  40 => 5,  34 => 3,  31 => 2,  11 => 1,);
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
/* {% block content %}*/
/* <div class="admin page place">*/
/*     */
/*     <div class="first-content person-info"> */
/*         <div class="background" {% if page.background is defined and page.background!='' %} style="background-image:url('{{ path('thumbnail', {'resolution': '1800', 'file': page.background })|production }}');"{% endif %}></div>*/
/*         <div class="size">*/
/*             */
/*             {% if app.user and app.user.havepagepermission(page,'page_background') %}                                 */
/*             <a href="{{ path('page_form',{'id':page.id}) }}#background" class="edit-image triggerAnimation fadeInLeft"><i class="fa fa-camera" aria-hidden="true"></i> {{ 'Zmień zdjęcie w tle'|trans }}</a>*/
/*             {% endif %}*/
/*             */
/*             <div class="description">*/
/*                 */
/*                 <div {#href="#photos"#} class="avatar delay2 triggerAnimation" data-animate="fadeInLeft" style="background-image:url('{{ path('thumbnail', {'resolution': '165x165', 'file': page.avatar })|production }}');">*/
/*                 {% if app.user and app.user.havepagepermission(page,'page_image') and app.user.havepagepermission(page,'page_images') %}                                */
/*                 <a href="{{ path('page_form',{'id':page.id}) }}#image" class="edit-image triggerAnimation fadeInDown"><i class="fa fa-camera" aria-hidden="true"></i> {{ 'Zmień zdjęcie'|trans }}</a>*/
/*                 {% endif %}*/
/*                 </div>*/
/*                 */
/*                 <h1 class="delay2 triggerAnimation" data-animate="fadeInRight">{{ page.translate(page.locale).name }}</h1>*/
/*                 <p class="time delay2 triggerAnimation" data-animate="fadeInRight">{% if not page.begin %}{{ page.beginyear }}{% else %}{{ page.begin|mydate() }}{% endif %}</p>*/
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
/*                 <b>{{ 'Nazwa'|trans }}:</b> {{ page.translate(page.locale).name }}<br>*/
/*                 <b>{{ 'Data powstania'|trans }}:</b> {% if not page.begin %}{{ page.beginyear }}{% else %}{{ page.begin|mydate() }}{% endif %}<br>*/
/*                 <b>{{ 'Ilość lat od powstania'|trans }}:</b> {{ lived(page.begin,nowObject()) }}<br>*/
/*                 <b>{{ 'Miasto'|trans }}:</b> {{ page.address.city }}<br>*/
/*                 </p>*/
/*         */
/* {% if(page.translate(page.locale).longdescription is not null and page.translate(page.locale).longdescription!='') %}   */
/*     {% set longdescription = page.translate(page.locale).longdescription|nl2br %}*/
/*     {% set parts = longdescription|split('<br />') %}*/
/*     {% set i = 0 %}*/
/*     */
/*     {% if(parts|length > 1) %}   */
/*     <p>  */
/*         {{parts[0]}}*/
/*         */
/*         <span class="longdescription hidden">*/
/*             {% for part in parts %}*/
/*                 {% set i = i+1 %}*/
/*                 {% if(i == 2) %}   */
/*                 {{part}}*/
/*                 {% endif %}*/
/*                 */
/*                 {% if(i > 2) %}   */
/*                 <br>{{part}}*/
/*                 {% endif %}*/
/*             {% endfor %}*/
/*         </span>*/
/*     </p>*/
/*     */
/*     <div class="options">*/
/*         <div class="button small longdescription-show"><i class="fa fa-eye" aria-hidden="true"></i> {{ 'Czytaj więcej'|trans }}</div>*/
/*         <div class="button small longdescription-hide"><i class="fa fa-eye" aria-hidden="true"></i> {{ 'Zwiń'|trans }}</div>*/
/*     </div>*/
/*     {% else %}*/
/*     <p>{{longdescription}}</p>*/
/*     {% endif %}*/
/*     */
/* {% endif %}         */
/*                 */
/* {% if app.user and app.user.havepagepermission(page,'page_edit') %}   */
/* <div class="options">*/
/* <a href="{{ path('page_form',{'id':page.id}) }}" class="button small"><i class="fa fa-pencil" aria-hidden="true"></i> {{ 'Edytuj'|trans }}</a>*/
/* </div>*/
/* {% endif %}  */
/*                 */
/*             </div>*/
/*         */
/*            */
/*  */
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
/*     */
/*                 */
/*         </div>*/
/*         */
/*         <div class="right-half">  */
/*     */
/*             <h1>{{ 'Mapa'|trans }}</h1>*/
/* */
/* */
/*             <div class="content"> */
/*                 <div class="options">*/
/*                     <a href="/" class="button small showmap"><i class="fa fa-map"></i>{{ 'Zobacz mapę'|trans }}</a>*/
/*                     <a href="https://maps.apple.com/?q={{ page.localisation.latitude }},{{ page.localisation.longitude }}" target="_blank" class="button small"><i class="fa fa-location-arrow"></i>{{ 'Prowadź do miejsca'|trans }}</a>*/
/*                 </div>*/
/*                 <div id="map" class="map" style="height: 340px;"></div>*/
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
/*                       title: '{{ page.translate(page.locale).name }}, {{ 'Miejsce'|trans }}'*/
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
/*                     } */
/*                   });*/
/*                 </script>*/
/*             </div>*/
/*            */
/*                     */
/*         */
/*         */
/*         {% if page.audiobooks|length %}*/
/*             */
/*             <script src="/js/soundmanager/script/soundmanager2-jsmin.js"></script>*/
/*             <script type="text/javascript">*/
/*                 soundManager.setup({*/
/*                   // path to directory containing SM2 SWF*/
/*                   url: '/js/soundmanager/swf/'*/
/*                 });*/
/*                 */
/*                 soundManager.debugMode = false;*/
/*             </script>*/
/* */
/* */
/*             <script src="/js/soundmanager/demo/bar-ui/script/bar-ui.js"></script>*/
/*             <link rel="stylesheet" href="/js/soundmanager/demo/bar-ui/css/bar-ui.css" />*/
/*             <style>*/
/*                 .sm2-bar-ui {*/
/*                  font-size: 18px;*/
/*                  margin-bottom:15px;*/
/*                  color:white;*/
/*                 }*/
/*                 */
/*                 .sm2-bar-ui li, .sm2-bar-ui div{*/
/*                     color:white;*/
/*                 }*/
/*                 */
/*                 .sm2-bar-ui .sm2-main-controls,*/
/*                 .sm2-bar-ui .sm2-playlist-drawer {*/
/*                  background-color: #dac572;*/
/*                 }*/
/*                 .sm2-bar-ui .sm2-inline-texture {*/
/*                  background: transparent;*/
/*                 }*/
/*                 .sm2-bar-ui {*/
/*                  min-width:100%;*/
/*                 }*/
/*             </style>*/
/*             */
/*             */
/*             <h1><i class="fa fa-music"></i>{{ 'Audiobooki'|trans }}</h1>*/
/*             */
/*             <div class="content"> */
/*         */
/* <div class="sm2-bar-ui playlist-open full-width">*/
/* */
/*  <div class="bd sm2-main-controls">*/
/* */
/*   <div class="sm2-inline-texture"></div>*/
/*   <div class="sm2-inline-gradient"></div>*/
/* */
/*   <div class="sm2-inline-element sm2-button-element">*/
/*    <div class="sm2-button-bd">*/
/*     <a href="#play" class="sm2-inline-button play-pause">Play / pause</a>*/
/*    </div>*/
/*   </div>*/
/* */
/*   <div class="sm2-inline-element sm2-inline-status">*/
/* */
/*    <div class="sm2-playlist">*/
/*     <div class="sm2-playlist-target">*/
/*      <!-- playlist <ul> + <li> markup will be injected here -->*/
/*      <!-- if you want default / non-JS content, you can put that here. -->*/
/*      <noscript><p>{{ 'Wymagane jest włączenie javascriptu w przeglądarce.'|trans }}</p></noscript>*/
/*     </div>*/
/*    </div>*/
/* */
/*    <div class="sm2-progress">*/
/*     <div class="sm2-row">*/
/*     <div class="sm2-inline-time">0:00</div>*/
/*      <div class="sm2-progress-bd">*/
/*       <div class="sm2-progress-track">*/
/*        <div class="sm2-progress-bar"></div>*/
/*        <div class="sm2-progress-ball"><div class="icon-overlay"></div></div>*/
/*       </div>*/
/*      </div>*/
/*      <div class="sm2-inline-duration">0:00</div>*/
/*     </div>*/
/*    </div>*/
/* */
/*   </div>*/
/* */
/*   */
/*   */
/*   <div class="sm2-inline-element sm2-button-element sm2-volume">*/
/*    <div class="sm2-button-bd">*/
/*     <span class="sm2-inline-button sm2-volume-control volume-shade"></span>*/
/*     <a href="#volume" class="sm2-inline-button sm2-volume-control">volume</a>*/
/*    </div>*/
/*   </div>*/
/* */
/*   <div class="sm2-inline-element sm2-button-element">*/
/*    <div class="sm2-button-bd">*/
/*     <a href="#prev" title="Previous" class="sm2-inline-button previous">&lt; previous</a>*/
/*    </div>*/
/*   </div>*/
/* */
/*   <div class="sm2-inline-element sm2-button-element">*/
/*    <div class="sm2-button-bd">*/
/*     <a href="#next" title="Next" class="sm2-inline-button next">&gt; next</a>*/
/*    </div>*/
/*   </div>*/
/* */
/* {#  <div class="sm2-inline-element sm2-button-element sm2-menu">*/
/*    <div class="sm2-button-bd">*/
/*      <a href="#menu" class="sm2-inline-button menu">menu</a>*/
/*    </div>*/
/*   </div>#}*/
/* */
/*  </div>*/
/* */
/*  <div class="bd sm2-playlist-drawer sm2-element">*/
/* */
/*   <div class="sm2-inline-texture">*/
/*    <div class="sm2-box-shadow"></div>*/
/*   </div>*/
/* */
/*   <!-- playlist content is mirrored here -->*/
/* */
/*   <div class="sm2-playlist-wrapper">*/
/*     */
/*     <ul class="sm2-playlist-bd">*/
/*     {# */
/*      <!-- item with "download" link -->*/
/*      <li>*/
/*       <div class="sm2-row">*/
/*        <div class="sm2-col sm2-wide">*/
/*         <a href="/{{ audiobook.webpath }}">{{ audiobook.name }} 2 <span class="label">Tag</span></a>*/
/*        </div>*/
/*        <div class="sm2-col">*/
/*         <a href="/{{ audiobook.webpath }}" target="_blank" title="Download &quot;LA&quot;" class="sm2-icon sm2-music sm2-exclude">Ściągnij</a>*/
/*        </div>*/
/*       </div>*/
/*      </li>#}*/
/*      */
/*      <!-- standard one-line items -->*/
/*      {% for audiobook in page.audiobooks %}*/
/*      <li><a href="/{{ audiobook.webpath }}">{{ audiobook.name }}</a></li>*/
/*      {% endfor %}*/
/*     </ul>*/
/*   */
/*   </div>*/
/* */
/*  </div>*/
/* */
/* </div>    */
/*                   */
/*             </div>    */
/*         {% endif %}            */
/*                     */
/*             {% if products %}*/
/*                 <h1>{{ 'Produkty i usługi'|trans }}</h1>*/
/*                 {% include 'AppBundle:Product:products.html.twig' with {'products': products, 'page': page } only %}*/
/*             {% endif %}*/
/*             */
/*             */
/*             */
/*         </div>*/
/* */
/*     </div>*/
/*     */
/* </div>    */
/* {% endblock %}*/
