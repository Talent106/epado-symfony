<?php

/* AppBundle:Family:index.html.twig */
class __TwigTemplate_1781e8c1e33be46f6b66fb070e919035e6163f436f4e237d998fdb8b5e946797 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Family:index.html.twig", 1);
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
        echo "<h1><i class=\"fa fa-users\"></i>";
        if (((isset($context["ad"]) ? $context["ad"] : null) == 1)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie rodziny"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rodziny"), "html", null, true);
        }
        echo "</h1>";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
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
        echo $this->env->getExtension('routing')->getPath("family_form");
        echo "\" class=\"button\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj rodzinę"), "html", null, true);
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
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwisko"), "html", null, true);
            echo "</th>
                        <th>";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Data dodania"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 32
            $context["i"] = 0;
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 33
                echo "                    <tr class=\"\">
                        <td>";
                // line 34
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "per_page", array()) * ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "page", array()) - 1))), "html", null, true);
                echo "</td>
                        <td>";
                // line 35
                echo $this->env->getExtension('app_extension')->tabUser($this->getAttribute($context["object"], "creator", array()));
                echo "</td>
                        <td><a href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("family_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\" class=\"longtext tip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "</a></td> 
                        <td>";
                // line 37
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "created", array())), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "            </table></div>
            
            ";
            // line 42
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
        ";
        } else {
            // line 44
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie dodałeś rodziny. Możesz to zrobić podczas dodawania nowej strony dla osoby upamiętniającej lub dodać rodzinę przed dodaniem strony. Osoby upamiętniane połączone rodziną będą powiązane dzięki czemu na stronie osobby pojawią się inni członkowie jej rodziny."), "html", null, true);
            echo "</p>
        ";
        }
        // line 46
        echo "    </div>
    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Family:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 46,  144 => 44,  139 => 42,  135 => 40,  126 => 37,  118 => 36,  114 => 35,  110 => 34,  107 => 33,  101 => 32,  96 => 30,  92 => 29,  88 => 28,  84 => 27,  76 => 23,  74 => 22,  64 => 17,  59 => 14,  53 => 11,  50 => 10,  48 => 9,  44 => 7,  41 => 6,  29 => 4,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* */
/* {% block header %}<h1><i class="fa fa-users"></i>{% if ad==1 %}{{ 'Wszystkie rodziny'|trans }}{% else %}{{ 'Rodziny'|trans }}{% endif %}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/* */
/*     {% if(app.user is not null and app.user.type in ['admin','worker','trader'] and ad==1 ) %}*/
/*     <div class="content">*/
/*         {{ filters(filters,filters_params)|raw }}    */
/*     </div>*/
/*     {% endif %}*/
/* */
/*     <div class="content">*/
/*         <div class="options">*/
/*         <a href="{{ path('family_form') }}" class="button">{{ 'Dodaj rodzinę'|trans }}</a>*/
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
/*                         <th>{{ 'Nazwisko'|trans }}</th>*/
/*                         <th>{{ 'Data dodania'|trans }}</th>*/
/*                     </tr>*/
/*                 {% set i=0 %}{% for object in objects %}{% set i=i+1 %}*/
/*                     <tr class="">*/
/*                         <td>{{ i+(pager.per_page*(pager.page-1)) }}</td>*/
/*                         <td>{{ tabUser(object.creator)|raw }}</td>*/
/*                         <td><a href="{{ path('family_form', {'id': object.id}) }}" class="longtext tip" title="{{object.name}}">{{object.name}}</a></td> */
/*                         <td>{{ object.created|mydate }}</td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*             */
/*             {{ pagination(pager)|raw }}*/
/*         {% else %}*/
/*             <p>{{ 'Nie dodałeś rodziny. Możesz to zrobić podczas dodawania nowej strony dla osoby upamiętniającej lub dodać rodzinę przed dodaniem strony. Osoby upamiętniane połączone rodziną będą powiązane dzięki czemu na stronie osobby pojawią się inni członkowie jej rodziny.'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/*     */
/* {% endblock %}*/
