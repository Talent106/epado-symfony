<?php

/* AppBundle:User:admin.html.twig */
class __TwigTemplate_bd5ddd5389e863c06990d3f7444e86e4ebca507aad5373c5f6b0491a601fed3f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:User:admin.html.twig", 1);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-map\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Administracja"), "html", null, true);
        echo "</h1>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    

    <div class=\"content\">
        <div class=\"options\">
        <a href=\"?clear=1\" class=\"button clear\">";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Czyść cache"), "html", null, true);
        echo "</a>
        </div>
        <script>
            \$('.clear').click(function(e){      

                \$.ajax({
                    url : '?',
                    type : 'GET',
                    data : {
                        'clear' : 1
                    },
                    success : function(data) {              
                        alert(data);
                    },
                    error : function(request,error)
                    {
                       alert('Error');
                    }
                });
                e.preventDefault();

            });
        </script>
    </div>

    ";
        // line 35
        if ((isset($context["text"]) ? $context["text"] : null)) {
            echo "  
    <div class=\"content\">

         <h3>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["text"]) ? $context["text"] : null), "title", array()), "html", null, true);
            echo "</h3>
         ";
            // line 39
            echo $this->getAttribute((isset($context["text"]) ? $context["text"] : null), "content", array());
            echo "
        
    </div>
    ";
        }
        // line 43
        echo "    
    

    ";
        // line 46
        if ((isset($context["pages_active"]) ? $context["pages_active"] : null)) {
            $context["sum"] = 0;
            // line 47
            echo "        <div class=\"content\"><h3>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Aktywne strony"), "html", null, true);
            echo "</h3>
        <div class=\"table-wrapper\"><table><tr><th>";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Typ strony"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Język"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kategoria"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ilość"), "html", null, true);
            echo "</th></tr>
        ";
            // line 49
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pages_active"]) ? $context["pages_active"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                $context["sum"] = ((isset($context["sum"]) ? $context["sum"] : null) + $this->getAttribute($context["row"], "amount", array(), "array"));
                echo "  
                <tr>
                <td>";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "page", array(), "array"), "type", array()), "name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["row"], "page", array(), "array"), "locale", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 53
                if ($this->getAttribute($this->getAttribute($context["row"], "page", array(), "array"), "category", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "page", array(), "array"), "category", array()), "name", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoba"), "html", null, true);
                }
                echo "</td>
                <td>";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "amount", array(), "array"), "html", null, true);
                echo "</td>
                </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            echo " 
        <tr><th></th><th></th><th>";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Suma"), "html", null, true);
            echo ":</th><th>";
            echo twig_escape_filter($this->env, (isset($context["sum"]) ? $context["sum"] : null), "html", null, true);
            echo "</th></tr>
        </table></div>
        </div>
    ";
        }
        // line 61
        echo "
    ";
        // line 62
        if ((isset($context["pages_inactive"]) ? $context["pages_inactive"] : null)) {
            $context["sum"] = 0;
            // line 63
            echo "        <div class=\"content\"><h3>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nieaktywne strony"), "html", null, true);
            echo "</h3>
        <div class=\"table-wrapper\"><table><tr><th>";
            // line 64
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Typ strony"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Język"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kategoria"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ilość"), "html", null, true);
            echo "</th></tr>
        ";
            // line 65
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pages_inactive"]) ? $context["pages_inactive"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                $context["sum"] = ((isset($context["sum"]) ? $context["sum"] : null) + $this->getAttribute($context["row"], "amount", array(), "array"));
                echo "  
                <tr>
                <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "page", array(), "array"), "type", array()), "name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["row"], "page", array(), "array"), "locale", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 69
                if ($this->getAttribute($this->getAttribute($context["row"], "page", array(), "array"), "category", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "page", array(), "array"), "category", array()), "name", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoba"), "html", null, true);
                }
                echo "</td>
                <td>";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "amount", array(), "array"), "html", null, true);
                echo "</td>
                </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo " 
        <tr><th></th><th></th><th>";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Suma"), "html", null, true);
            echo ":</th><th>";
            echo twig_escape_filter($this->env, (isset($context["sum"]) ? $context["sum"] : null), "html", null, true);
            echo "</th></tr>
        </table></div>
        </div>
    ";
        }
        // line 77
        echo "    
    

    ";
        // line 80
        if ((isset($context["images"]) ? $context["images"] : null)) {
            $context["sum"] = 0;
            // line 81
            echo "        <div class=\"content\"><h3>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zdjęcia"), "html", null, true);
            echo "</h3>
        <div class=\"table-wrapper\"><table><tr><th>";
            // line 82
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Typ strony"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Język"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kategoria"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ilość"), "html", null, true);
            echo "</th></tr>
        ";
            // line 83
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["images"]) ? $context["images"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                $context["sum"] = ((isset($context["sum"]) ? $context["sum"] : null) + $this->getAttribute($context["row"], "amount", array(), "array"));
                echo " 
                <tr>
                <td>";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "type", array()), "name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "locale", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 87
                if ($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "category", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "category", array()), "name", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoba"), "html", null, true);
                }
                echo "</td>
                <td>";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "amount", array(), "array"), "html", null, true);
                echo "</td>
                </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 90
            echo " 
        <tr><th></th><th></th><th>";
            // line 91
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Suma"), "html", null, true);
            echo ":</th><th>";
            echo twig_escape_filter($this->env, (isset($context["sum"]) ? $context["sum"] : null), "html", null, true);
            echo "</th></tr>
        </table></div>
        </div>
    ";
        }
        // line 95
        echo "    
    ";
        // line 96
        if ((isset($context["videos"]) ? $context["videos"] : null)) {
            $context["sum"] = 0;
            // line 97
            echo "        <div class=\"content\"><h3>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wideo"), "html", null, true);
            echo "</h3>
        <div class=\"table-wrapper\"><table><tr><th>";
            // line 98
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Typ strony"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Język"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kategoria"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ilość"), "html", null, true);
            echo "</th></tr>
        ";
            // line 99
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["videos"]) ? $context["videos"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                $context["sum"] = ((isset($context["sum"]) ? $context["sum"] : null) + $this->getAttribute($context["row"], "amount", array(), "array"));
                echo "  
                <tr>
                <td>";
                // line 101
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "type", array()), "name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 102
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "locale", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 103
                if ($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "category", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "category", array()), "name", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoba"), "html", null, true);
                }
                echo "</td>
                <td>";
                // line 104
                echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "amount", array(), "array"), "html", null, true);
                echo "</td>
                </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 106
            echo " 
        <tr><th></th><th></th><th>";
            // line 107
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Suma"), "html", null, true);
            echo ":</th><th>";
            echo twig_escape_filter($this->env, (isset($context["sum"]) ? $context["sum"] : null), "html", null, true);
            echo "</th></tr>
        </table></div>
        </div>
    ";
        }
        // line 111
        echo "    
    ";
        // line 112
        if ((isset($context["audiobooks"]) ? $context["audiobooks"] : null)) {
            $context["sum"] = 0;
            // line 113
            echo "        <div class=\"content\"><h3>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Audiobooki"), "html", null, true);
            echo "</h3>
        <div class=\"table-wrapper\"><table><tr><th>";
            // line 114
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Typ strony"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Język"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kategoria"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ilość"), "html", null, true);
            echo "</th></tr>
        ";
            // line 115
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["audiobooks"]) ? $context["audiobooks"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                $context["sum"] = ((isset($context["sum"]) ? $context["sum"] : null) + $this->getAttribute($context["row"], "amount", array(), "array"));
                echo " 
                <tr>
                <td>";
                // line 117
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "type", array()), "name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 118
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "locale", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 119
                if ($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "category", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "category", array()), "name", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoba"), "html", null, true);
                }
                echo "</td>
                <td>";
                // line 120
                echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "amount", array(), "array"), "html", null, true);
                echo "</td>
                </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 122
            echo " 
        <tr><th></th><th></th><th>";
            // line 123
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Suma"), "html", null, true);
            echo ":</th><th>";
            echo twig_escape_filter($this->env, (isset($context["sum"]) ? $context["sum"] : null), "html", null, true);
            echo "</th></tr>
        </table></div>
        </div>
    ";
        }
        // line 127
        echo "    
    ";
        // line 128
        if ((isset($context["posts"]) ? $context["posts"] : null)) {
            $context["sum"] = 0;
            // line 129
            echo "        <div class=\"content\"><h3>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kondolencje"), "html", null, true);
            echo "</h3>
        <div class=\"table-wrapper\"><table><tr><th>";
            // line 130
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Typ strony"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Język"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kategoria"), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ilość"), "html", null, true);
            echo "</th></tr>
        ";
            // line 131
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                $context["sum"] = ((isset($context["sum"]) ? $context["sum"] : null) + $this->getAttribute($context["row"], "amount", array(), "array"));
                echo "  
                <tr>
                <td>";
                // line 133
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "type", array()), "name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 134
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "locale", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 135
                if ($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "category", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "image", array(), "array"), "page", array()), "category", array()), "name", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoba"), "html", null, true);
                }
                echo "</td>
                <td>";
                // line 136
                echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "amount", array(), "array"), "html", null, true);
                echo "</td>
                </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 138
            echo " 
        <tr><th></th><th></th><th>";
            // line 139
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Suma"), "html", null, true);
            echo ":</th><th>";
            echo twig_escape_filter($this->env, (isset($context["sum"]) ? $context["sum"] : null), "html", null, true);
            echo "</th></tr>
        </table></div>
        </div>
    ";
        }
        // line 143
        echo "    
    
    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:User:admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  491 => 143,  482 => 139,  479 => 138,  470 => 136,  462 => 135,  458 => 134,  454 => 133,  446 => 131,  436 => 130,  431 => 129,  428 => 128,  425 => 127,  416 => 123,  413 => 122,  404 => 120,  396 => 119,  392 => 118,  388 => 117,  380 => 115,  370 => 114,  365 => 113,  362 => 112,  359 => 111,  350 => 107,  347 => 106,  338 => 104,  330 => 103,  326 => 102,  322 => 101,  314 => 99,  304 => 98,  299 => 97,  296 => 96,  293 => 95,  284 => 91,  281 => 90,  272 => 88,  264 => 87,  260 => 86,  256 => 85,  248 => 83,  238 => 82,  233 => 81,  230 => 80,  225 => 77,  216 => 73,  213 => 72,  204 => 70,  196 => 69,  192 => 68,  188 => 67,  180 => 65,  170 => 64,  165 => 63,  162 => 62,  159 => 61,  150 => 57,  147 => 56,  138 => 54,  130 => 53,  126 => 52,  122 => 51,  114 => 49,  104 => 48,  99 => 47,  96 => 46,  91 => 43,  84 => 39,  80 => 38,  74 => 35,  46 => 10,  40 => 6,  37 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-map"></i>{{ 'Administracja'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/* */
/*     <div class="content">*/
/*         <div class="options">*/
/*         <a href="?clear=1" class="button clear">{{ 'Czyść cache'|trans }}</a>*/
/*         </div>*/
/*         <script>*/
/*             $('.clear').click(function(e){      */
/* */
/*                 $.ajax({*/
/*                     url : '?',*/
/*                     type : 'GET',*/
/*                     data : {*/
/*                         'clear' : 1*/
/*                     },*/
/*                     success : function(data) {              */
/*                         alert(data);*/
/*                     },*/
/*                     error : function(request,error)*/
/*                     {*/
/*                        alert('Error');*/
/*                     }*/
/*                 });*/
/*                 e.preventDefault();*/
/* */
/*             });*/
/*         </script>*/
/*     </div>*/
/* */
/*     {% if text %}  */
/*     <div class="content">*/
/* */
/*          <h3>{{text.title}}</h3>*/
/*          {{text.content|raw}}*/
/*         */
/*     </div>*/
/*     {% endif %}*/
/*     */
/*     */
/* */
/*     {% if pages_active %}{% set sum=0 %}*/
/*         <div class="content"><h3>{{ 'Aktywne strony'|trans }}</h3>*/
/*         <div class="table-wrapper"><table><tr><th>{{ 'Typ strony'|trans }}</th><th>{{ 'Język'|trans }}</th><th>{{ 'Kategoria'|trans }}</th><th>{{ 'Ilość'|trans }}</th></tr>*/
/*         {% for row in pages_active %}{% set sum=sum+row['amount'] %}  */
/*                 <tr>*/
/*                 <td>{{row['page'].type.name}}</td>*/
/*                 <td>{{row['page'].locale}}</td>*/
/*                 <td>{% if row['page'].category %}{{row['page'].category.name}}{% else %}{{ 'Osoba'|trans }}{% endif%}</td>*/
/*                 <td>{{row['amount']}}</td>*/
/*                 </tr>*/
/*         {% endfor %} */
/*         <tr><th></th><th></th><th>{{ 'Suma'|trans }}:</th><th>{{sum}}</th></tr>*/
/*         </table></div>*/
/*         </div>*/
/*     {% endif %}*/
/* */
/*     {% if pages_inactive %}{% set sum=0 %}*/
/*         <div class="content"><h3>{{ 'Nieaktywne strony'|trans }}</h3>*/
/*         <div class="table-wrapper"><table><tr><th>{{ 'Typ strony'|trans }}</th><th>{{ 'Język'|trans }}</th><th>{{ 'Kategoria'|trans }}</th><th>{{ 'Ilość'|trans }}</th></tr>*/
/*         {% for row in pages_inactive %}{% set sum=sum+row['amount'] %}  */
/*                 <tr>*/
/*                 <td>{{row['page'].type.name}}</td>*/
/*                 <td>{{row['page'].locale}}</td>*/
/*                 <td>{% if row['page'].category %}{{row['page'].category.name}}{% else %}{{ 'Osoba'|trans }}{% endif%}</td>*/
/*                 <td>{{row['amount']}}</td>*/
/*                 </tr>*/
/*         {% endfor %} */
/*         <tr><th></th><th></th><th>{{ 'Suma'|trans }}:</th><th>{{sum}}</th></tr>*/
/*         </table></div>*/
/*         </div>*/
/*     {% endif %}*/
/*     */
/*     */
/* */
/*     {% if images %}{% set sum=0 %}*/
/*         <div class="content"><h3>{{ 'Zdjęcia'|trans }}</h3>*/
/*         <div class="table-wrapper"><table><tr><th>{{ 'Typ strony'|trans }}</th><th>{{ 'Język'|trans }}</th><th>{{ 'Kategoria'|trans }}</th><th>{{ 'Ilość'|trans }}</th></tr>*/
/*         {% for row in images %}{% set sum=sum+row['amount'] %} */
/*                 <tr>*/
/*                 <td>{{row['image'].page.type.name}}</td>*/
/*                 <td>{{row['image'].page.locale}}</td>*/
/*                 <td>{% if row['image'].page.category %}{{row['image'].page.category.name}}{% else %}{{ 'Osoba'|trans }}{% endif%}</td>*/
/*                 <td>{{row['amount']}}</td>*/
/*                 </tr>*/
/*         {% endfor %} */
/*         <tr><th></th><th></th><th>{{ 'Suma'|trans }}:</th><th>{{sum}}</th></tr>*/
/*         </table></div>*/
/*         </div>*/
/*     {% endif %}*/
/*     */
/*     {% if videos %}{% set sum=0 %}*/
/*         <div class="content"><h3>{{ 'Wideo'|trans }}</h3>*/
/*         <div class="table-wrapper"><table><tr><th>{{ 'Typ strony'|trans }}</th><th>{{ 'Język'|trans }}</th><th>{{ 'Kategoria'|trans }}</th><th>{{ 'Ilość'|trans }}</th></tr>*/
/*         {% for row in videos %}{% set sum=sum+row['amount'] %}  */
/*                 <tr>*/
/*                 <td>{{row['image'].page.type.name}}</td>*/
/*                 <td>{{row['image'].page.locale}}</td>*/
/*                 <td>{% if row['image'].page.category %}{{row['image'].page.category.name}}{% else %}{{ 'Osoba'|trans }}{% endif%}</td>*/
/*                 <td>{{row['amount']}}</td>*/
/*                 </tr>*/
/*         {% endfor %} */
/*         <tr><th></th><th></th><th>{{ 'Suma'|trans }}:</th><th>{{sum}}</th></tr>*/
/*         </table></div>*/
/*         </div>*/
/*     {% endif %}*/
/*     */
/*     {% if audiobooks %}{% set sum=0 %}*/
/*         <div class="content"><h3>{{ 'Audiobooki'|trans }}</h3>*/
/*         <div class="table-wrapper"><table><tr><th>{{ 'Typ strony'|trans }}</th><th>{{ 'Język'|trans }}</th><th>{{ 'Kategoria'|trans }}</th><th>{{ 'Ilość'|trans }}</th></tr>*/
/*         {% for row in audiobooks %}{% set sum=sum+row['amount'] %} */
/*                 <tr>*/
/*                 <td>{{row['image'].page.type.name}}</td>*/
/*                 <td>{{row['image'].page.locale}}</td>*/
/*                 <td>{% if row['image'].page.category %}{{row['image'].page.category.name}}{% else %}{{ 'Osoba'|trans }}{% endif%}</td>*/
/*                 <td>{{row['amount']}}</td>*/
/*                 </tr>*/
/*         {% endfor %} */
/*         <tr><th></th><th></th><th>{{ 'Suma'|trans }}:</th><th>{{sum}}</th></tr>*/
/*         </table></div>*/
/*         </div>*/
/*     {% endif %}*/
/*     */
/*     {% if posts %}{% set sum=0 %}*/
/*         <div class="content"><h3>{{ 'Kondolencje'|trans }}</h3>*/
/*         <div class="table-wrapper"><table><tr><th>{{ 'Typ strony'|trans }}</th><th>{{ 'Język'|trans }}</th><th>{{ 'Kategoria'|trans }}</th><th>{{ 'Ilość'|trans }}</th></tr>*/
/*         {% for row in posts %}{% set sum=sum+row['amount'] %}  */
/*                 <tr>*/
/*                 <td>{{row['image'].page.type.name}}</td>*/
/*                 <td>{{row['image'].page.locale}}</td>*/
/*                 <td>{% if row['image'].page.category %}{{row['image'].page.category.name}}{% else %}{{ 'Osoba'|trans }}{% endif%}</td>*/
/*                 <td>{{row['amount']}}</td>*/
/*                 </tr>*/
/*         {% endfor %} */
/*         <tr><th></th><th></th><th>{{ 'Suma'|trans }}:</th><th>{{sum}}</th></tr>*/
/*         </table></div>*/
/*         </div>*/
/*     {% endif %}*/
/*     */
/*     */
/*     */
/* {% endblock %}*/
