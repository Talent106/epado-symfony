<?php

/* AppBundle:Cemetery:index.html.twig */
class __TwigTemplate_f85cc478ce6fb3bac792f4ee70a2080db038d9fe1d6ba7124e8f79017de1a5bd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Cemetery:index.html.twig", 1);
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

    // line 4
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-bank\"></i>";
        if (((isset($context["ad"]) ? $context["ad"] : null) == 1)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie cmentarze"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cmentarze"), "html", null, true);
        }
        echo "</h1>";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
    ";
        // line 9
        if ((( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader"))) && ((isset($context["ad"]) ? $context["ad"] : null) == 1))) {
            // line 10
            echo "    <div class=\"content\">
        ";
            // line 11
            echo $this->env->getExtension('app_extension')->drawFilters((isset($context["filters"]) ? $context["filters"] : null), (isset($context["filters_params"]) ? $context["filters_params"] : null));
            echo "    
    </div>
    ";
        }
        // line 14
        echo "    
    <div class=\"content\">
        <div class=\"options\">
        <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("cemetery_form");
        echo "\" class=\"button\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj cmentarz"), "html", null, true);
        echo "</a>
        </div>
    </div>
    
    <div class=\"content\">
        ";
        // line 22
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 23
            echo "            ";
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
            
            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th>";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr"), "html", null, true);
            echo "</th>
                        <th>";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodający"), "html", null, true);
            echo "</th>
                        <th>";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
            echo "</th>
                        <th>";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Miasto"), "html", null, true);
            echo "</th>
                        <th>";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres"), "html", null, true);
            echo "</th>
                        ";
            // line 32
            if ((( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader"))) && ((isset($context["ad"]) ? $context["ad"] : null) == 1))) {
                echo "<th>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sprawdzony"), "html", null, true);
                echo "&nbsp;&nbsp;</th>";
            }
            // line 33
            echo "                    </tr>
                ";
            // line 34
            $context["i"] = 0;
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 35
                echo "                    <tr class=\"\">
                        <td>";
                // line 36
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "per_page", array()) * ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "page", array()) - 1))), "html", null, true);
                echo "</td> 
                        <td>";
                // line 37
                echo $this->env->getExtension('app_extension')->tabUser($this->getAttribute($context["object"], "creator", array()));
                echo "</td>
                        <td><a href=\"";
                // line 38
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cemetery_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\" class=\"longtext tip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "</a></td>
                        <td>";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object"], "address", array()), "city", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object"], "address", array()), "address", array()), "html", null, true);
                echo "</td>
                        ";
                // line 41
                if ((( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader"))) && ((isset($context["ad"]) ? $context["ad"] : null) == 1))) {
                    echo "<td>
                                ";
                    // line 42
                    if ((null === $this->getAttribute($context["object"], "checked", array()))) {
                        // line 43
                        echo "                                    <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("checked" => 1, "checked_id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                        echo "\" class=\"button tiny tip\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Oznaczony jako błędny. Kliknij aby oznaczyć jako zweryfikowany"), "html", null, true);
                        echo "\" style=\"background-color:#ddd;\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zły"), "html", null, true);
                        echo "</a>
                                ";
                    } elseif (($this->getAttribute(                    // line 44
$context["object"], "checked", array()) == false)) {
                        echo "   
                                    <a href=\"";
                        // line 45
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("checked" => 1, "checked_id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                        echo "\" class=\"button tiny tip\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Niezweryfikowany. Kliknij aby oznaczyć jako zweryfikowany"), "html", null, true);
                        echo "\" style=\"background-color:red; float:left;\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie"), "html", null, true);
                        echo "</a>
                                    <a href=\"";
                        // line 46
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("checked" => "null", "checked_id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                        echo "\" class=\"button tiny tip\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Niezweryfikowany. Kliknij aby oznaczyć jako błędny"), "html", null, true);
                        echo "\" style=\"background-color:red;\">X</a>
                                ";
                    } else {
                        // line 48
                        echo "                                    <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("checked" => 0, "checked_id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                        echo "\" class=\"button tiny tip\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kliknij aby odwołać weryfikacje"), "html", null, true);
                        echo "\" style=\" float:left;\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Tak"), "html", null, true);
                        echo "</a>
                                    <a href=\"";
                        // line 49
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("checked" => "null", "checked_id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                        echo "\" class=\"button tiny tip\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zweryfikowany. Kliknij aby oznaczyć jako błędny"), "html", null, true);
                        echo "\">X</a>
                                ";
                    }
                    // line 50
                    echo "</td>";
                }
                // line 51
                echo "                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "            </table></div>
            
            ";
            // line 55
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
        ";
        } else {
            // line 57
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie dodałeś żadnych cmentarzy lub wybrałeś filtr który nie zwrócił żadnych wyników. Możesz to zrobić podczas dodawania nowej strony dla osoby upamiętniającej"), "html", null, true);
            echo " <a href=\"";
            echo $this->env->getExtension('routing')->getPath("page_form");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("tutaj"), "html", null, true);
            echo "</a>. ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Możesz też dodać cmentarz przed dodaniem strony"), "html", null, true);
            echo " <a href=\"";
            echo $this->env->getExtension('routing')->getPath("cemetery_form");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("tutaj"), "html", null, true);
            echo "</a>.</p>
        ";
        }
        // line 59
        echo "    </div>
    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Cemetery:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 59,  214 => 57,  209 => 55,  205 => 53,  198 => 51,  195 => 50,  188 => 49,  179 => 48,  172 => 46,  164 => 45,  160 => 44,  151 => 43,  149 => 42,  145 => 41,  141 => 40,  137 => 39,  129 => 38,  125 => 37,  121 => 36,  118 => 35,  112 => 34,  109 => 33,  103 => 32,  99 => 31,  95 => 30,  91 => 29,  87 => 28,  83 => 27,  75 => 23,  73 => 22,  63 => 17,  58 => 14,  52 => 11,  49 => 10,  47 => 9,  44 => 8,  41 => 7,  29 => 4,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* */
/* {% block header %}<h1><i class="fa fa-bank"></i>{% if ad==1 %}{{ 'Wszystkie cmentarze'|trans }}{% else %}{{ 'Cmentarze'|trans }}{% endif %}</h1>{% endblock %}*/
/* */
/* */
/* {% block content %}*/
/* */
/*     {% if(app.user is not null and app.user.type in ['admin','worker','trader'] and ad==1 ) %}*/
/*     <div class="content">*/
/*         {{ filters(filters,filters_params)|raw }}    */
/*     </div>*/
/*     {% endif %}*/
/*     */
/*     <div class="content">*/
/*         <div class="options">*/
/*         <a href="{{ path('cemetery_form') }}" class="button">{{ 'Dodaj cmentarz'|trans }}</a>*/
/*         </div>*/
/*     </div>*/
/*     */
/*     <div class="content">*/
/*         {% if objects %}*/
/*             {{ pagination(pager)|raw }}*/
/*             */
/*             <div class="table-wrapper"><table>*/
/*                     <tr>*/
/*                         <th>{{ 'Nr'|trans }}</th>*/
/*                         <th>{{ 'Dodający'|trans }}</th>*/
/*                         <th>{{ 'Nazwa'|trans }}</th>*/
/*                         <th>{{ 'Miasto'|trans }}</th>*/
/*                         <th>{{ 'Adres'|trans }}</th>*/
/*                         {% if(app.user is not null and app.user.type in ['admin','worker','trader'] and ad==1 ) %}<th>{{ 'Sprawdzony'|trans }}&nbsp;&nbsp;</th>{% endif %}*/
/*                     </tr>*/
/*                 {% set i=0 %}{% for object in objects %}{% set i=i+1 %}*/
/*                     <tr class="">*/
/*                         <td>{{ i+(pager.per_page*(pager.page-1)) }}</td> */
/*                         <td>{{ tabUser(object.creator)|raw }}</td>*/
/*                         <td><a href="{{ path('cemetery_form', {'id': object.id}) }}" class="longtext tip" title="{{object.name}}">{{object.name}}</a></td>*/
/*                         <td>{{ object.address.city }}</td>*/
/*                         <td>{{ object.address.address }}</td>*/
/*                         {% if(app.user is not null and app.user.type in ['admin','worker','trader'] and ad==1 ) %}<td>*/
/*                                 {% if object.checked is null %}*/
/*                                     <a href="{{ extend({checked:1,checked_id:object.id}) }}" class="button tiny tip" title="{{ 'Oznaczony jako błędny. Kliknij aby oznaczyć jako zweryfikowany'|trans }}" style="background-color:#ddd;">{{ 'Zły'|trans }}</a>*/
/*                                 {% elseif object.checked==false %}   */
/*                                     <a href="{{ extend({checked:1,checked_id:object.id}) }}" class="button tiny tip" title="{{ 'Niezweryfikowany. Kliknij aby oznaczyć jako zweryfikowany'|trans }}" style="background-color:red; float:left;">{{ 'Nie'|trans }}</a>*/
/*                                     <a href="{{ extend({checked:'null',checked_id:object.id}) }}" class="button tiny tip" title="{{ 'Niezweryfikowany. Kliknij aby oznaczyć jako błędny'|trans }}" style="background-color:red;">X</a>*/
/*                                 {% else %}*/
/*                                     <a href="{{ extend({checked:0,checked_id:object.id}) }}" class="button tiny tip" title="{{ 'Kliknij aby odwołać weryfikacje'|trans }}" style=" float:left;">{{ 'Tak'|trans }}</a>*/
/*                                     <a href="{{ extend({checked:'null',checked_id:object.id}) }}" class="button tiny tip" title="{{ 'Zweryfikowany. Kliknij aby oznaczyć jako błędny'|trans }}">X</a>*/
/*                                 {% endif %}</td>{% endif %}*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*             */
/*             {{ pagination(pager)|raw }}*/
/*         {% else %}*/
/*             <p>{{ 'Nie dodałeś żadnych cmentarzy lub wybrałeś filtr który nie zwrócił żadnych wyników. Możesz to zrobić podczas dodawania nowej strony dla osoby upamiętniającej'|trans }} <a href="{{ path('page_form') }}">{{ 'tutaj'|trans }}</a>. {{ 'Możesz też dodać cmentarz przed dodaniem strony'|trans }} <a href="{{ path('cemetery_form') }}">{{ 'tutaj'|trans }}</a>.</p>*/
/*         {% endif %}*/
/*     </div>*/
/*     */
/* {% endblock %}*/
/* */
