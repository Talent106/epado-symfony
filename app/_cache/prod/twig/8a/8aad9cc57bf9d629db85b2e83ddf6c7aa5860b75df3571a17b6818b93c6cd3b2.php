<?php

/* AppBundle:Product:formCategory.html.twig */
class __TwigTemplate_ae5235283e089a6ff19655f014155a3157cbcf52cd6096df474526172f659ab9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Product:formCategory.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kategoria produktu"), "html", null, true);
        echo "</h1>";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "
    <div class=\"content\">
    ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
    ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
    ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
    ";
        // line 12
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "

    ";
        // line 18
        echo "
    ";
        // line 27
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Product:formCategory.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 27,  61 => 18,  56 => 12,  52 => 11,  48 => 10,  44 => 9,  40 => 7,  37 => 6,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-cube"></i>{{ 'Kategoria produktu'|trans }}</h1>{% endblock %}*/
/* */
/* */
/* {% block content %}*/
/* */
/*     <div class="content">*/
/*     {{ form_start(form) }}*/
/*     {{ form_errors(form) }}*/
/*     {{ form_widget(form) }}*/
/*     {{ form_end(form) }}*/
/* */
/*     {#{% if object.creator %}*/
/*         <p>Stworzona przez: {{ object.creator.username }}</p>*/
/*     {% endif %} */
/*     #}*/
/* */
/*     {#{% if object.products %}*/
/* */
/*         <h1>Powiązane produkty</h1>*/
/*         {% for product in object.products %}*/
/*             <a href="{{ path('product_form', {'id': product.id})}}">{{product.name}}</a> */
/*         {% endfor %}*/
/* */
/*     {% endif %}#}*/
/*     </div>*/
/* */
/* {% endblock %}*/
