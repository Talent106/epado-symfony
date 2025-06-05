<?php

/* AppBundle:Country:index.html.twig */
class __TwigTemplate_768f085c227b46748fade5eea17d4cac5684bf0713db194dc3ba1d93ae92e0c4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Country:index.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kraje"), "html", null, true);
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
        echo $this->env->getExtension('routing')->getPath("country_form");
        echo "\" class=\"button\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj kraj"), "html", null, true);
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
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa kraju"), "html", null, true);
            echo "</th>
                        <th>";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona"), "html", null, true);
            echo "</th>
                        <th>";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dostawa"), "html", null, true);
            echo "</th>
                        <th>";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Biling"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 29
            $context["i"] = 0;
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 30
                echo "                    <tr class=\"\">
                        <td>";
                // line 31
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "per_page", array()) * ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "page", array()) - 1))), "html", null, true);
                echo "</td>
                        <td><a href=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("country_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\" class=\"longtext tip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "</a></td>
                        <td>";
                // line 33
                if ($this->getAttribute($context["object"], "page", array())) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Tak"), "html", null, true);
                } else {
                    echo "-";
                }
                echo "</td> 
                        <td>";
                // line 34
                if ($this->getAttribute($context["object"], "delivery", array())) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Tak"), "html", null, true);
                } else {
                    echo "-";
                }
                echo "</td> 
                        <td>";
                // line 35
                if ($this->getAttribute($context["object"], "billing", array())) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Tak"), "html", null, true);
                } else {
                    echo "-";
                }
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "            </table></div>
            
            ";
            // line 40
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
        ";
        } else {
            // line 42
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie ma dodanego kraju."), "html", null, true);
            echo "</p>
        ";
        }
        // line 44
        echo "    </div>
    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Country:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 44,  152 => 42,  147 => 40,  143 => 38,  130 => 35,  122 => 34,  114 => 33,  106 => 32,  102 => 31,  99 => 30,  93 => 29,  88 => 27,  84 => 26,  80 => 25,  76 => 24,  72 => 23,  64 => 19,  62 => 18,  52 => 13,  44 => 8,  40 => 6,  37 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-map"></i>{{ 'Kraje'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/*     <div class="content">*/
/*         {{ filters(filters,filters_params)|raw }}    */
/*     </div>*/
/* */
/*     <div class="content">*/
/*         <div class="options">*/
/*         <a href="{{ path('country_form') }}" class="button">{{ 'Dodaj kraj'|trans }}</a>*/
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
/*                         <th>{{ 'Nazwa kraju'|trans }}</th>*/
/*                         <th>{{ 'Strona'|trans }}</th>*/
/*                         <th>{{ 'Dostawa'|trans }}</th>*/
/*                         <th>{{ 'Biling'|trans }}</th>*/
/*                     </tr>*/
/*                 {% set i=0 %}{% for object in objects %}{% set i=i+1 %}*/
/*                     <tr class="">*/
/*                         <td>{{ i+(pager.per_page*(pager.page-1)) }}</td>*/
/*                         <td><a href="{{ path('country_form', {'id': object.id}) }}" class="longtext tip" title="{{object.name}}">{{object.name}}</a></td>*/
/*                         <td>{% if object.page %}{{ 'Tak'|trans }}{% else %}-{% endif %}</td> */
/*                         <td>{% if object.delivery %}{{ 'Tak'|trans }}{% else %}-{% endif %}</td> */
/*                         <td>{% if object.billing %}{{ 'Tak'|trans }}{% else %}-{% endif %}</td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*             */
/*             {{ pagination(pager)|raw }}*/
/*         {% else %}*/
/*             <p>{{ 'Nie ma dodanego kraju.'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/*     */
/* {% endblock %}*/
