<?php

/* admin.html.twig */
class __TwigTemplate_21de51ff1ed13485102bf4478b849f5770d8226e0b48f59662eb5e795b4e83a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("wrapper.html.twig", "admin.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "wrapper.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"admin\">
    
    <div class=\"size first-content\">
        
    ";
        // line 7
        $this->displayBlock("header", $context, $blocks);
        echo "
    
    <div class=\"notifications\">
        ";
        // line 10
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
        // line 11
        echo "        ";
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
        // line 12
        echo "        ";
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
        // line 13
        echo "        ";
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
        // line 14
        echo "    </div>
    
    

    <div class=\"right-navigation\">
        <div class=\"content profile nav-user\">
        ";
        // line 20
        $context["user"] = $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array());
        // line 21
        echo "        ";
        if ( !(null === (isset($context["user"]) ? $context["user"] : null))) {
            // line 22
            echo "            <div class=\"user\">
            <div class=\"avatar circle\" style=\"width:65px; height:65px; background-image:url('";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "60x60", "file" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar", array())))), "html", null, true);
            echo "');\"></div>

            ";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "lastname", array()), "html", null, true);
            echo "
            <br>";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "gettypename", array(), "method")), "html", null, true);
            echo "
            <div class=\"buttons\">
                <a href=\"";
            // line 28
            echo $this->env->getExtension('routing')->getPath("profile_edit");
            echo "\" class=\"button tiny\"><i class=\"fa fa-gear\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ustawienia"), "html", null, true);
            echo "</a>
                ";
            // line 30
            echo "            </div>
            </div>
        ";
        }
        // line 33
        echo "        </div>
        ";
        // line 34
        if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "contractor", 4 => "partner")))) {
            // line 35
            echo "            
        ";
            // line 36
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin")))) {
                // line 37
                echo "            <h3>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel administracyjny"), "html", null, true);
                echo "</h3>
        ";
            }
            // line 39
            echo "        ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "worker")))) {
                // line 40
                echo "            <h3>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel pracownika"), "html", null, true);
                echo "</h3>
        ";
            }
            // line 42
            echo "        ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "trader")))) {
                // line 43
                echo "            <h3>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel handlowca"), "html", null, true);
                echo "</h3>
        ";
            }
            // line 45
            echo "        ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "contractor")))) {
                // line 46
                echo "            <h3>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel wykonawcy"), "html", null, true);
                echo "</h3>
        ";
            }
            // line 48
            echo "        ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "partner")))) {
                // line 49
                echo "            <h3>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel partnera"), "html", null, true);
                echo "</h3>
        ";
            }
            // line 51
            echo "            
        <div class=\"content nav-admin\">
            <ul class=\"navigation\">

                
                ";
            // line 56
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "partner")))) {
                // line 57
                echo "                    <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("shop");
                echo "\"><i class=\"fa fa-fw fa-shopping-cart\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sklep dla partnerów"), "html", null, true);
                echo "</a></li>   
                ";
            }
            // line 59
            echo "
                ";
            // line 60
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker")))) {
                // line 61
                echo "                        <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("text_list");
                echo "\"><i class=\"fa fa-fw fa-file-text-o\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Teksty"), "html", null, true);
                echo "</a></li>   
                ";
            }
            // line 63
            echo "                ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin")))) {
                // line 64
                echo "                        <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("admin");
                echo "\"><i class=\"fa fa-fw fa-wrench\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Administracja"), "html", null, true);
                echo "</a></li>   
                ";
            }
            // line 66
            echo "                
                ";
            // line 67
            if ((( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "partner"))) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "ads", array()))) {
                // line 68
                echo "                    <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("ads");
                echo "\"><i class=\"fa fa-fw fa-wrench\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje reklamy"), "html", null, true);
                echo "</a></li>  
                ";
            }
            // line 70
            echo "
                ";
            // line 71
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "partner")))) {
                // line 72
                echo "                    <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("sold");
                echo "\"><i class=\"fa fa-fw fa-qrcode\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje kody"), "html", null, true);
                echo "</a></li>  
                ";
            }
            // line 73
            echo "    
                
                
                ";
            // line 76
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader")))) {
                // line 77
                echo "
";
                // line 79
                echo "
                    ";
                // line 80
                if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker")))) {
                    // line 81
                    echo "                    <li><a href=\"";
                    echo $this->env->getExtension('routing')->getPath("questions_list");
                    echo "\"><i class=\"fa fa-fw fa-question-circle\"></i>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zapytania i opinie"), "html", null, true);
                    echo " ";
                    echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Message:infoQuestions"));
                    echo "</a></li>
                    ";
                }
                // line 82
                echo "  

                    <li><a href=\"";
                // line 84
                echo $this->env->getExtension('routing')->getPath("user_list");
                echo "\"><i class=\"fa fa-fw fa-users\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Użytkownicy"), "html", null, true);
                echo "</a></li>
                    <li><a href=\"";
                // line 85
                echo $this->env->getExtension('routing')->getPath("product_list");
                echo "\"><i class=\"fa fa-fw fa-cube\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Produkty"), "html", null, true);
                echo "</a></li>
                    <li><a href=\"";
                // line 86
                echo $this->env->getExtension('routing')->getPath("code_list");
                echo "\"><i class=\"fa fa-fw fa-qrcode\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kody"), "html", null, true);
                echo "</a></li>
                    <li><a href=\"";
                // line 87
                echo $this->env->getExtension('routing')->getPath("country_list");
                echo "\"><i class=\"fa fa-fw fa-map\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kraje"), "html", null, true);
                echo "</a></li>
                    <li><a href=\"";
                // line 88
                echo $this->env->getExtension('routing')->getPath("mail_list");
                echo "\"><i class=\"fa fa-fw fa-info-circle\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Powiadomienia"), "html", null, true);
                echo "</a></li>
                    

                    
                    <li><a href=\"";
                // line 92
                echo $this->env->getExtension('routing')->getPath("page_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-newspaper-o\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie strony"), "html", null, true);
                echo "</a></li>
                    <li><a class=\"badge-link\" data-badge-link=\"";
                // line 93
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cemetery_list", array("ad" => 1, "p_state" => 2)), "html", null, true);
                echo "\" href=\"";
                echo $this->env->getExtension('routing')->getPath("cemetery_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-bank\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie cmentarze"), "html", null, true);
                echo " ";
                echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Cemetery:info", array("ad" => 1)));
                echo "</a></li>                
                    <li><a href=\"";
                // line 94
                echo $this->env->getExtension('routing')->getPath("family_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-group\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie rodziny"), "html", null, true);
                echo "</a></li>
                    <li><a href=\"";
                // line 95
                echo $this->env->getExtension('routing')->getPath("order_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-shopping-cart\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienia do realizacji"), "html", null, true);
                echo " ";
                echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:info", array("ad" => 1)));
                echo "</a></li>
    
                ";
            }
            // line 98
            echo "
                ";
            // line 99
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "contractor")))) {
                // line 100
                echo "                    <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("contract_list", array("ad" => 1));
                echo "\"><i class=\"fa fa-fw fa-fire\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usługi do wykonania"), "html", null, true);
                echo " ";
                echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:infoContract", array("ad" => 1)));
                echo "</a></li>   
                ";
            }
            // line 102
            echo "                ";
            if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "contractor", 1 => "partner", 2 => "trader")))) {
                // line 103
                echo "                    <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("profile_address");
                echo "\"><i class=\"fa fa-fw fa-truck\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane adresowe"), "html", null, true);
                echo "</a></li>   
                ";
            }
            // line 105
            echo "
            </ul>
        </div>
        ";
        }
        // line 109
        echo "        
        ";
        // line 110
        if (( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "contractor", 4 => "partner")))) {
            // line 111
            echo "            <h3>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Konto Epado"), "html", null, true);
            echo "</h3>
        ";
        }
        // line 112
        echo "   
                
        <div class=\"content nav-user\">
            <ul class=\"navigation\">
                
                

                
";
        // line 121
        echo "                <li><a href=\"";
        echo $this->env->getExtension('routing')->getPath("panel");
        echo "\"><i class=\"fa fa-fw fa-user\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje konto"), "html", null, true);
        echo "</a></li>
                <li><a href=\"";
        // line 122
        echo $this->env->getExtension('routing')->getPath("page_list");
        echo "\"><i class=\"fa fa-fw fa-newspaper-o\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje strony"), "html", null, true);
        echo "</a></li>
                <li><a href=\"";
        // line 123
        echo $this->env->getExtension('routing')->getPath("cemetery_list");
        echo "\"><i class=\"fa fa-fw fa-bank\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cmentarze"), "html", null, true);
        echo "</a></li>
                <li><a href=\"";
        // line 124
        echo $this->env->getExtension('routing')->getPath("family_list");
        echo "\"><i class=\"fa fa-fw fa-group\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rodziny"), "html", null, true);
        echo "</a></li>
                <li><a href=\"";
        // line 125
        echo $this->env->getExtension('routing')->getPath("order_list");
        echo "\"><i class=\"fa fa-fw fa-shopping-cart\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienia"), "html", null, true);
        echo " ";
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:info"));
        echo "</a></li>
                <li><a href=\"";
        // line 126
        echo $this->env->getExtension('routing')->getPath("contract_list");
        echo "\"><i class=\"fa fa-fw fa-fire\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówione usługi"), "html", null, true);
        echo " ";
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Order:infoContract"));
        echo "</a></li>                
                
 

            </ul>
        </div>
            
    </div>
    
    <div class=\"left-big\">
        ";
        // line 136
        $this->displayBlock('content', $context, $blocks);
        // line 137
        echo "    </div>
    
    </div>
        
</div>        
";
    }

    // line 136
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  461 => 136,  452 => 137,  450 => 136,  433 => 126,  425 => 125,  419 => 124,  413 => 123,  407 => 122,  400 => 121,  390 => 112,  384 => 111,  382 => 110,  379 => 109,  373 => 105,  365 => 103,  362 => 102,  352 => 100,  350 => 99,  347 => 98,  337 => 95,  331 => 94,  321 => 93,  315 => 92,  306 => 88,  300 => 87,  294 => 86,  288 => 85,  282 => 84,  278 => 82,  268 => 81,  266 => 80,  263 => 79,  260 => 77,  258 => 76,  253 => 73,  245 => 72,  243 => 71,  240 => 70,  232 => 68,  230 => 67,  227 => 66,  219 => 64,  216 => 63,  208 => 61,  206 => 60,  203 => 59,  195 => 57,  193 => 56,  186 => 51,  180 => 49,  177 => 48,  171 => 46,  168 => 45,  162 => 43,  159 => 42,  153 => 40,  150 => 39,  144 => 37,  142 => 36,  139 => 35,  137 => 34,  134 => 33,  129 => 30,  123 => 28,  118 => 26,  112 => 25,  107 => 23,  104 => 22,  101 => 21,  99 => 20,  91 => 14,  79 => 13,  67 => 12,  55 => 11,  44 => 10,  38 => 7,  32 => 3,  29 => 2,  11 => 1,);
    }
}
/* {% extends 'wrapper.html.twig' %}*/
/* {% block body %}*/
/* <div class="admin">*/
/*     */
/*     <div class="size first-content">*/
/*         */
/*     {{ block('header') }}*/
/*     */
/*     <div class="notifications">*/
/*         {% for flashMessage in app.session.flashbag.get('notice') %}<div class="notification notice">{{ flashMessage|raw }}</div>{% endfor %}*/
/*         {% for flashMessage in app.session.flashbag.get('warning') %}<div class="notification warning">{{ flashMessage|raw }}</div>{% endfor %}*/
/*         {% for flashMessage in app.session.flashbag.get('success') %}<div class="notification success">{{ flashMessage|raw }}</div>{% endfor %}*/
/*         {% for flashMessage in app.session.flashbag.get('error') %}<div class="notification error">{{ flashMessage|raw }}</div>{% endfor %}*/
/*     </div>*/
/*     */
/*     */
/* */
/*     <div class="right-navigation">*/
/*         <div class="content profile nav-user">*/
/*         {% set user = app.user %}*/
/*         {% if user is not null %}*/
/*             <div class="user">*/
/*             <div class="avatar circle" style="width:65px; height:65px; background-image:url('{{ path('thumbnail', {'resolution': '60x60', 'file': user.avatar })|production }}');"></div>*/
/* */
/*             {{ user.firstname }} {{ user.lastname }}*/
/*             <br>{{ user.gettypename()|trans }}*/
/*             <div class="buttons">*/
/*                 <a href="{{ path('profile_edit') }}" class="button tiny"><i class="fa fa-gear"></i>{{ 'Ustawienia'|trans }}</a>*/
/*                 {#<a href="{{ path('logout') }}" class="button tiny"><i class="fa fa-power-off"></i>{{ 'Wyloguj'|trans }}</a>#}*/
/*             </div>*/
/*             </div>*/
/*         {% endif %}*/
/*         </div>*/
/*         {% if(app.user is not null and app.user.type in ['admin','worker','trader', 'contractor','partner'] ) %}*/
/*             */
/*         {% if(app.user is not null and app.user.type in ['admin'] ) %}*/
/*             <h3>{{ 'Panel administracyjny'|trans }}</h3>*/
/*         {% endif %}*/
/*         {% if(app.user is not null and app.user.type in ['worker'] ) %}*/
/*             <h3>{{ 'Panel pracownika'|trans }}</h3>*/
/*         {% endif %}*/
/*         {% if(app.user is not null and app.user.type in ['trader'] ) %}*/
/*             <h3>{{ 'Panel handlowca'|trans }}</h3>*/
/*         {% endif %}*/
/*         {% if(app.user is not null and app.user.type in ['contractor'] ) %}*/
/*             <h3>{{ 'Panel wykonawcy'|trans }}</h3>*/
/*         {% endif %}*/
/*         {% if(app.user is not null and app.user.type in ['partner'] ) %}*/
/*             <h3>{{ 'Panel partnera'|trans }}</h3>*/
/*         {% endif %}*/
/*             */
/*         <div class="content nav-admin">*/
/*             <ul class="navigation">*/
/* */
/*                 */
/*                 {% if(app.user is not null and app.user.type in ['admin','worker','trader','partner'] ) %}*/
/*                     <li><a href="{{ path('shop') }}"><i class="fa fa-fw fa-shopping-cart"></i>{{ 'Sklep dla partnerów'|trans }}</a></li>   */
/*                 {% endif %}*/
/* */
/*                 {% if(app.user is not null and app.user.type in ['admin','worker'] ) %}*/
/*                         <li><a href="{{ path('text_list') }}"><i class="fa fa-fw fa-file-text-o"></i>{{ 'Teksty'|trans }}</a></li>   */
/*                 {% endif %}*/
/*                 {% if(app.user is not null and app.user.type in ['admin'] ) %}*/
/*                         <li><a href="{{ path('admin') }}"><i class="fa fa-fw fa-wrench"></i>{{ 'Administracja'|trans }}</a></li>   */
/*                 {% endif %}*/
/*                 */
/*                 {% if(app.user is not null and app.user.type in ['partner'] and app.user.ads ) %}*/
/*                     <li><a href="{{ path('ads') }}"><i class="fa fa-fw fa-wrench"></i>{{ 'Moje reklamy'|trans }}</a></li>  */
/*                 {% endif %}*/
/* */
/*                 {% if(app.user is not null and app.user.type in ['partner'] ) %}*/
/*                     <li><a href="{{ path('sold') }}"><i class="fa fa-fw fa-qrcode"></i>{{ 'Moje kody'|trans }}</a></li>  */
/*                 {% endif %}    */
/*                 */
/*                 */
/*                 {% if(app.user is not null and app.user.type in ['admin','worker','trader'] ) %}*/
/* */
/* {#                    <li><a href="{{ path('message_list') }}"><i class="fa fa-fw fa-envelope"></i>{{ 'Wiadomości'|trans }} {{ render_esi(controller('AppBundle:Message:info' )) }}</a></li>#}*/
/* */
/*                     {% if(app.user is not null and app.user.type in ['admin','worker'] ) %}*/
/*                     <li><a href="{{ path('questions_list') }}"><i class="fa fa-fw fa-question-circle"></i>{{ 'Zapytania i opinie'|trans }} {{ render_esi(controller('AppBundle:Message:infoQuestions' )) }}</a></li>*/
/*                     {% endif %}  */
/* */
/*                     <li><a href="{{ path('user_list') }}"><i class="fa fa-fw fa-users"></i>{{ 'Użytkownicy'|trans }}</a></li>*/
/*                     <li><a href="{{ path('product_list') }}"><i class="fa fa-fw fa-cube"></i>{{ 'Produkty'|trans }}</a></li>*/
/*                     <li><a href="{{ path('code_list') }}"><i class="fa fa-fw fa-qrcode"></i>{{ 'Kody'|trans }}</a></li>*/
/*                     <li><a href="{{ path('country_list') }}"><i class="fa fa-fw fa-map"></i>{{ 'Kraje'|trans }}</a></li>*/
/*                     <li><a href="{{ path('mail_list') }}"><i class="fa fa-fw fa-info-circle"></i>{{ 'Powiadomienia'|trans }}</a></li>*/
/*                     */
/* */
/*                     */
/*                     <li><a href="{{ path('page_list',{'ad':1}) }}"><i class="fa fa-fw fa-newspaper-o"></i>{{ 'Wszystkie strony'|trans }}</a></li>*/
/*                     <li><a class="badge-link" data-badge-link="{{ path('cemetery_list',{'ad':1,'p_state':2}) }}" href="{{ path('cemetery_list',{'ad':1}) }}"><i class="fa fa-fw fa-bank"></i>{{ 'Wszystkie cmentarze'|trans }} {{ render_esi(controller('AppBundle:Cemetery:info',{'ad':1} )) }}</a></li>                */
/*                     <li><a href="{{ path('family_list',{'ad':1}) }}"><i class="fa fa-fw fa-group"></i>{{ 'Wszystkie rodziny'|trans }}</a></li>*/
/*                     <li><a href="{{ path('order_list',{'ad':1}) }}"><i class="fa fa-fw fa-shopping-cart"></i>{{ 'Zamówienia do realizacji'|trans }} {{ render_esi(controller('AppBundle:Order:info',{'ad':1} )) }}</a></li>*/
/*     */
/*                 {% endif %}*/
/* */
/*                 {% if(app.user is not null and app.user.type in ['admin','worker','trader','contractor'] ) %}*/
/*                     <li><a href="{{ path('contract_list',{'ad':1}) }}"><i class="fa fa-fw fa-fire"></i>{{ 'Usługi do wykonania'|trans }} {{ render_esi(controller('AppBundle:Order:infoContract',{'ad':1} )) }}</a></li>   */
/*                 {% endif %}*/
/*                 {% if(app.user is not null and app.user.type in ['contractor','partner','trader'] ) %}*/
/*                     <li><a href="{{ path('profile_address') }}"><i class="fa fa-fw fa-truck"></i>{{ 'Dane adresowe'|trans }}</a></li>   */
/*                 {% endif %}*/
/* */
/*             </ul>*/
/*         </div>*/
/*         {% endif %}*/
/*         */
/*         {% if(app.user is not null and app.user.type in ['admin','worker','trader', 'contractor','partner'] ) %}*/
/*             <h3>{{ 'Konto Epado'|trans }}</h3>*/
/*         {% endif %}   */
/*                 */
/*         <div class="content nav-user">*/
/*             <ul class="navigation">*/
/*                 */
/*                 */
/* */
/*                 */
/* {#                <li><a href="{{ path('message_list') }}"><i class="fa fa-fw fa-envelope"></i>Wiadomości {{ render_esi(controller('AppBundle:Message:info' )) }}</a></li>#}*/
/*                 <li><a href="{{ path('panel') }}"><i class="fa fa-fw fa-user"></i>{{ 'Moje konto'|trans }}</a></li>*/
/*                 <li><a href="{{ path('page_list') }}"><i class="fa fa-fw fa-newspaper-o"></i>{{ 'Moje strony'|trans }}</a></li>*/
/*                 <li><a href="{{ path('cemetery_list') }}"><i class="fa fa-fw fa-bank"></i>{{ 'Cmentarze'|trans }}</a></li>*/
/*                 <li><a href="{{ path('family_list') }}"><i class="fa fa-fw fa-group"></i>{{ 'Rodziny'|trans }}</a></li>*/
/*                 <li><a href="{{ path('order_list') }}"><i class="fa fa-fw fa-shopping-cart"></i>{{ 'Zamówienia'|trans }} {{ render_esi(controller('AppBundle:Order:info' )) }}</a></li>*/
/*                 <li><a href="{{ path('contract_list') }}"><i class="fa fa-fw fa-fire"></i>{{ 'Zamówione usługi'|trans }} {{ render_esi(controller('AppBundle:Order:infoContract' )) }}</a></li>                */
/*                 */
/*  */
/* */
/*             </ul>*/
/*         </div>*/
/*             */
/*     </div>*/
/*     */
/*     <div class="left-big">*/
/*         {% block content %}{% endblock %}*/
/*     </div>*/
/*     */
/*     </div>*/
/*         */
/* </div>        */
/* {% endblock %}*/
