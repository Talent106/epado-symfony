<?php

/* AppBundle:Product:indexCategory.html.twig */
class __TwigTemplate_2c76d6303b56bf95d51951350d4d6883251c52ab54588ad55716df1d0f2f08f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Product:indexCategory.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kategorie produktów"), "html", null, true);
        echo "</h1>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    
    <div class=\"content\">
        <div class=\"options\">
        <a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("product_category_form");
        echo "\" class=\"button\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj kategorie"), "html", null, true);
        echo "</a>
        </div>
    </div>
    
    <div class=\"content\">
        

        
        ";
        // line 17
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 18
            echo "            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th>";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr"), "html", null, true);
            echo "</th>
                        <th>";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
            echo "</th>
                        <th>";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zmieniono"), "html", null, true);
            echo "</th>
                        <th>";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Utworzono"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                // line 26
                echo "                    <tr>
                        <td>";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "id", array()), "html", null, true);
                echo "</td>
                        <td><a href=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_category_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "</a></td>
                        <td>";
                // line 29
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "updated", array())), "html", null, true);
                echo "</td>
                        <td>";
                // line 30
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "created", array())), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "            </table></div>
        ";
        } else {
            // line 35
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie ma kategorii."), "html", null, true);
            echo "</p>
        ";
        }
        // line 37
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Product:indexCategory.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 37,  115 => 35,  111 => 33,  102 => 30,  98 => 29,  92 => 28,  88 => 27,  85 => 26,  81 => 25,  76 => 23,  72 => 22,  68 => 21,  64 => 20,  60 => 18,  58 => 17,  45 => 9,  40 => 6,  37 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-cube"></i>{{ 'Kategorie produktów'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/*     <div class="content">*/
/*         <div class="options">*/
/*         <a href="{{ path('product_category_form') }}" class="button">{{ 'Dodaj kategorie'|trans }}</a>*/
/*         </div>*/
/*     </div>*/
/*     */
/*     <div class="content">*/
/*         */
/* */
/*         */
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
/*                         <td><a href="{{ path('product_category_form', {'id': object.id})}}">{{object.name}}</a></td>*/
/*                         <td>{{object.updated|mydate}}</td>*/
/*                         <td>{{object.created|mydate}}</td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*         {% else %}*/
/*             <p>{{ 'Nie ma kategorii.'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/* */
/* {% endblock %}*/
