<?php

/* AppBundle:Product:shop.html.twig */
class __TwigTemplate_98363e909e586831e3c5f5290080d0ce2fbda906298a1a563af42ea73aa76e03 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Product:shop.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sklep dla partnerów"), "html", null, true);
        echo "</h1>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    
    ";
        // line 8
        if ((isset($context["products"]) ? $context["products"] : null)) {
            // line 9
            echo "        ";
            $this->loadTemplate("AppBundle:Product:products.html.twig", "AppBundle:Product:shop.html.twig", 9)->display(array("products" => (isset($context["products"]) ? $context["products"] : null)));
            // line 10
            echo "    ";
        } else {
            // line 11
            echo "        <div class=\"content\">
        <p>";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie ma dodanych produktów dla partnerów."), "html", null, true);
            echo "</p>
        </div>
    ";
        }
        // line 15
        echo "    
    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Product:shop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 15,  55 => 12,  52 => 11,  49 => 10,  46 => 9,  44 => 8,  40 => 6,  37 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-shopping-cart"></i>{{ 'Sklep dla partnerów'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     */
/*     {% if products %}*/
/*         {% include 'AppBundle:Product:products.html.twig' with {'products': products } only %}*/
/*     {% else %}*/
/*         <div class="content">*/
/*         <p>{{ 'Nie ma dodanych produktów dla partnerów.'|trans }}</p>*/
/*         </div>*/
/*     {% endif %}*/
/*     */
/*     */
/* {% endblock %}*/
