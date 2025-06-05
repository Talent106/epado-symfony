<?php

/* AppBundle:Text:index.html.twig */
class __TwigTemplate_be54d5ca27674f3b3f101e60644da840f75a61cc789c31d25c1340bac68e974a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Text:index.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Teksty"), "html", null, true);
        echo "</h1>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    
    <div class=\"content\">
        ";
        // line 8
        echo $this->env->getExtension('app_extension')->drawFilters((isset($context["filters"]) ? $context["filters"] : null), (isset($context["filters_params"]) ? $context["filters_params"] : null));
        echo "    
    </div>

    <div class=\"content\">
        <div class=\"options\">
        <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("text_form");
        echo "\" class=\"button\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj tekst"), "html", null, true);
        echo "</a>
        </div>
    </div>
    
    <div class=\"content\">
        ";
        // line 18
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 19
            echo "            ";
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
            
            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th>";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr"), "html", null, true);
            echo "</th>
                        <th>";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 26
            $context["i"] = 0;
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 27
                echo "                    <tr class=\"\">
                        <td>";
                // line 28
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "per_page", array()) * ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "page", array()) - 1))), "html", null, true);
                echo "</td>
                        <td><a href=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("text_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\" class=\"longtext tip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "</a></td> 
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "            </table></div>
            
            ";
            // line 34
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
        ";
        } else {
            // line 36
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie ma tekstów."), "html", null, true);
            echo "</p>
        ";
        }
        // line 38
        echo "    </div>
    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Text:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 38,  116 => 36,  111 => 34,  107 => 32,  94 => 29,  90 => 28,  87 => 27,  81 => 26,  76 => 24,  72 => 23,  64 => 19,  62 => 18,  52 => 13,  44 => 8,  40 => 6,  37 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-map"></i>{{ 'Teksty'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/*     <div class="content">*/
/*         {{ filters(filters,filters_params)|raw }}    */
/*     </div>*/
/* */
/*     <div class="content">*/
/*         <div class="options">*/
/*         <a href="{{ path('text_form') }}" class="button">{{ 'Dodaj tekst'|trans }}</a>*/
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
/*                         <th>{{ 'Nazwa'|trans }}</th>*/
/*                     </tr>*/
/*                 {% set i=0 %}{% for object in objects %}{% set i=i+1 %}*/
/*                     <tr class="">*/
/*                         <td>{{ i+(pager.per_page*(pager.page-1)) }}</td>*/
/*                         <td><a href="{{ path('text_form', {'id': object.id}) }}" class="longtext tip" title="{{object.name}}">{{object.name}}</a></td> */
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*             */
/*             {{ pagination(pager)|raw }}*/
/*         {% else %}*/
/*             <p>{{ 'Nie ma tekstów.'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/*     */
/* {% endblock %}*/
