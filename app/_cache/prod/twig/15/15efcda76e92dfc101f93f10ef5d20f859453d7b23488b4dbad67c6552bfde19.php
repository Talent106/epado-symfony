<?php

/* AppBundle:Order:indexStatus.html.twig */
class __TwigTemplate_53a18a9f5cebc8798668b1fb0aef408fc72ad5ec9c3cfd23381a00e5ae792017 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Order:indexStatus.html.twig", 1);
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
        echo "<h1><i class=\"fa fa-shopping-cart\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Statusy zamówień"), "html", null, true);
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
        // line 11
        echo $this->env->getExtension('routing')->getPath("order_status_form");
        echo "\" class=\"button\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj status"), "html", null, true);
        echo "</a>
        </div>
        
        ";
        // line 14
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 15
            echo "            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th>";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr"), "html", null, true);
            echo "</th>
                        <th>";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
            echo "</th>
                        <th>";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mail"), "html", null, true);
            echo "</th>
                        <th>";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Utworzono"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                // line 23
                echo "                    <tr>
                        <td>";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "id", array()), "html", null, true);
                echo "</td>
                        <td><a href=\"";
                // line 25
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_status_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "</a></td>
                        <td>";
                // line 26
                if ($this->getAttribute($context["object"], "sendmail", array())) {
                    echo "<i class=\"fa fa-envelope tip\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "subject", array()), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "mail", array()), "html", null, true);
                    echo "\"></i> ";
                } else {
                    echo " - ";
                }
                echo "</td>
                        <td>";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "created", array())), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "            </table></div>
        ";
        } else {
            // line 32
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie ma statusów."), "html", null, true);
            echo "</p>
        ";
        }
        // line 34
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Order:indexStatus.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 34,  120 => 32,  116 => 30,  107 => 27,  95 => 26,  89 => 25,  85 => 24,  82 => 23,  78 => 22,  73 => 20,  69 => 19,  65 => 18,  61 => 17,  57 => 15,  55 => 14,  47 => 11,  40 => 6,  37 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-shopping-cart"></i>{{ 'Statusy zamówień'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     */
/*     <div class="content">*/
/*         */
/*         <div class="options">*/
/*         <a href="{{ path('order_status_form') }}" class="button">{{ 'Dodaj status'|trans }}</a>*/
/*         </div>*/
/*         */
/*         {% if objects %}*/
/*             <div class="table-wrapper"><table>*/
/*                     <tr>*/
/*                         <th>{{ 'Nr'|trans }}</th>*/
/*                         <th>{{ 'Nazwa'|trans }}</th>*/
/*                         <th>{{ 'Mail'|trans }}</th>*/
/*                         <th>{{ 'Utworzono'|trans }}</th>*/
/*                     </tr>*/
/*                 {% for object in objects %}*/
/*                     <tr>*/
/*                         <td>{{object.id}}</td>*/
/*                         <td><a href="{{ path('order_status_form', {'id': object.id})}}">{{object.name}}</a></td>*/
/*                         <td>{% if object.sendmail %}<i class="fa fa-envelope tip" title="{{object.subject}}: {{object.mail }}"></i> {% else %} - {% endif %}</td>*/
/*                         <td>{{object.created|mydate}}</td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*         {% else %}*/
/*             <p>{{ 'Nie ma statusów.'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/* */
/* {% endblock %}*/
