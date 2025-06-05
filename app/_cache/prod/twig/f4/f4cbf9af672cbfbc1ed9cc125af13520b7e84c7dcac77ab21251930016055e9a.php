<?php

/* AppBundle:Product:indexType.html.twig */
class __TwigTemplate_9304b632df3400b008e39421cd00d43edd3074e3c22434dc18f78c7a73592274 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Product:indexType.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Typy produktów"), "html", null, true);
        echo "</h1>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"content\">
        <div class=\"options\">
        <a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("product_type_form");
        echo "\" class=\"button\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj typ"), "html", null, true);
        echo "</a>
        </div> 
    </div>
    
    <div class=\"content\">


        ";
        // line 15
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 16
            echo "            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th>";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr"), "html", null, true);
            echo "</th>
                        <th>";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
            echo "</th>
                        <th>";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zmieniono"), "html", null, true);
            echo "</th>
                        <th>";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Utworzono"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                // line 24
                echo "                    <tr>
                        <td>";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "id", array()), "html", null, true);
                echo "</td>
                        <td><a href=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_type_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "</a></td>
                        <td>";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "updated", array())), "html", null, true);
                echo "</td>
                        <td>";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "created", array())), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "            </table></div>
        ";
        } else {
            // line 33
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie ma typów produktów."), "html", null, true);
            echo "</p>
        ";
        }
        // line 35
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Product:indexType.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 35,  113 => 33,  109 => 31,  100 => 28,  96 => 27,  90 => 26,  86 => 25,  83 => 24,  79 => 23,  74 => 21,  70 => 20,  66 => 19,  62 => 18,  58 => 16,  56 => 15,  44 => 8,  40 => 6,  37 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-cube"></i>{{ 'Typy produktów'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     <div class="content">*/
/*         <div class="options">*/
/*         <a href="{{ path('product_type_form') }}" class="button">{{ 'Dodaj typ'|trans }}</a>*/
/*         </div> */
/*     </div>*/
/*     */
/*     <div class="content">*/
/* */
/* */
/*         {% if objects %}*/
/*             <div class="table-wrapper"><table>*/
/*                     <tr>*/
/*                         <th>{{ 'Nr'|trans }}</th>*/
/*                         <th>{{ 'Nazwa'|trans }}</th>*/
/*                         <th>{{ 'Zmieniono'|trans }}</th>*/
/*                         <th>{{ 'Utworzono'|trans }}</th>*/
/*                     </tr>*/
/*                 {% for object in objects %}*/
/*                     <tr>*/
/*                         <td>{{object.id}}</td>*/
/*                         <td><a href="{{ path('product_type_form', {'id': object.id})}}">{{object.name}}</a></td>*/
/*                         <td>{{object.updated|mydate}}</td>*/
/*                         <td>{{object.created|mydate}}</td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*         {% else %}*/
/*             <p>{{ 'Nie ma typów produktów.'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/* */
/* {% endblock %}*/
