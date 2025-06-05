<?php

/* AppBundle:Product:index.html.twig */
class __TwigTemplate_91930273b591c41d0cd68b6aa802f0d1098c72815c0fff187db652699724e7af extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Product:index.html.twig", 1);
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
        echo "<h1><i class=\"fa fa-cube\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Produkty"), "html", null, true);
        echo "</h1>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    
    
    
    <div class=\"content\">
        ";
        // line 10
        echo $this->env->getExtension('app_extension')->drawFilters((isset($context["filters"]) ? $context["filters"] : null), (isset($context["filters_params"]) ? $context["filters_params"] : null));
        echo "    
    </div>

    <div class=\"content\">
        <div class=\"options\">
        <a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("product_form");
        echo "\" class=\"button\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj produkt"), "html", null, true);
        echo "</a>
        ";
        // line 16
        if (twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader"))) {
            // line 17
            echo "            <a href=\"";
            echo $this->env->getExtension('routing')->getPath("product_type_list");
            echo "\" class=\"button\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Typy produktów"), "html", null, true);
            echo "</a>
            <a href=\"";
            // line 18
            echo $this->env->getExtension('routing')->getPath("product_category_list");
            echo "\" class=\"button\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kategorie produktów"), "html", null, true);
            echo "</a>
        ";
        }
        // line 20
        echo "        </div>
    </div>
    
    <div class=\"content\">
        ";
        // line 24
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 25
            echo "            ";
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
            
            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th>";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr"), "html", null, true);
            echo "</th>
                        <th>";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zdjęcie"), "html", null, true);
            echo "</th>
                        <th>";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
            echo "</th>
                        <th>";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kategoria"), "html", null, true);
            echo "</th>
                        <th>";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Typ"), "html", null, true);
            echo "</th>
                        <th>";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cena"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 36
            $context["i"] = 0;
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 37
                echo "                    <tr class=\"";
                if ( !$this->getAttribute($context["object"], "enabled", array())) {
                    echo "disabled";
                }
                echo "\">
                        <td>";
                // line 38
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "per_page", array()) * ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "page", array()) - 1))), "html", null, true);
                echo "</td>
                        <td><div class=\"avatar\" style=\"background-image:url('";
                // line 39
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "42x42", "file" => $this->getAttribute($context["object"], "avatar", array())))), "html", null, true);
                echo "');\"></div></td> 
                        <td><a href=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_form", array("id" => $this->getAttribute($context["object"], "id", array()), "order_id" => (isset($context["order_id"]) ? $context["order_id"] : null))), "html", null, true);
                echo "\" class=\"longtext tip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "</a></td>
                        <td>";
                // line 41
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute($context["object"], "category", array()), "name", array())), "html", null, true);
                echo "</td>
                        <td>";
                // line 42
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute($context["object"], "pagetype", array()), "name", array())), "html", null, true);
                echo "</td> 
                        <td>";
                // line 43
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($context["object"], "price", array(0 => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "currency"), "method")), "method")), "html", null, true);
                echo " </td>

                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "            </table></div>
            
            ";
            // line 49
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
        ";
        } else {
            // line 51
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie ma produktów."), "html", null, true);
            echo "</p>
        ";
        }
        // line 53
        echo "    </div>
    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Product:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 53,  173 => 51,  168 => 49,  164 => 47,  154 => 43,  150 => 42,  146 => 41,  138 => 40,  134 => 39,  130 => 38,  123 => 37,  117 => 36,  112 => 34,  108 => 33,  104 => 32,  100 => 31,  96 => 30,  92 => 29,  84 => 25,  82 => 24,  76 => 20,  69 => 18,  62 => 17,  60 => 16,  54 => 15,  46 => 10,  40 => 6,  37 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-cube"></i>{{ 'Produkty'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/*     */
/*     */
/*     <div class="content">*/
/*         {{ filters(filters,filters_params)|raw }}    */
/*     </div>*/
/* */
/*     <div class="content">*/
/*         <div class="options">*/
/*         <a href="{{ path('product_form') }}" class="button">{{ 'Dodaj produkt'|trans }}</a>*/
/*         {% if(app.user.type in ['admin','trader'] ) %}*/
/*             <a href="{{ path('product_type_list') }}" class="button">{{ 'Typy produktów'|trans }}</a>*/
/*             <a href="{{ path('product_category_list') }}" class="button">{{ 'Kategorie produktów'|trans }}</a>*/
/*         {% endif %}*/
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
/*                         <th>{{ 'Zdjęcie'|trans }}</th>*/
/*                         <th>{{ 'Nazwa'|trans }}</th>*/
/*                         <th>{{ 'Kategoria'|trans }}</th>*/
/*                         <th>{{ 'Typ'|trans }}</th>*/
/*                         <th>{{ 'Cena'|trans }}</th>*/
/*                     </tr>*/
/*                 {% set i=0 %}{% for object in objects %}{% set i=i+1 %}*/
/*                     <tr class="{% if( not object.enabled ) %}disabled{% endif %}">*/
/*                         <td>{{ i+(pager.per_page*(pager.page-1)) }}</td>*/
/*                         <td><div class="avatar" style="background-image:url('{{ path('thumbnail', {'resolution': '42x42', 'file': object.avatar })|production }}');"></div></td> */
/*                         <td><a href="{{ path('product_form', {'id': object.id, 'order_id': order_id }) }}" class="longtext tip" title="{{object.name}}">{{object.name}}</a></td>*/
/*                         <td>{{object.category.name|trans}}</td>*/
/*                         <td>{{object.pagetype.name|trans}}</td> */
/*                         <td>{{object.price(app.session.get('currency'))|price}} </td>*/
/* */
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*             */
/*             {{ pagination(pager)|raw }}*/
/*         {% else %}*/
/*             <p>{{ 'Nie ma produktów.'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/*     */
/* {% endblock %}*/
