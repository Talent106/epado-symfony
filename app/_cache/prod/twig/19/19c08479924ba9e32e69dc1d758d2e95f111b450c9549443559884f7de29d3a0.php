<?php

/* AppBundle:Code:form.html.twig */
class __TwigTemplate_4b9cd436513c83689fdc811e6b35c2da3d4092952330cfe26e06f2d3f2e46cff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Code:form.html.twig", 1);
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
        echo "<h1><i class=\"fa fa-qrcode\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Grupa kodów"), "html", null, true);
        echo "</h1>";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "

    <div class=\"content\">
        ";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
        ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 14
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
    </div>

";
        // line 17
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array())) {
            // line 18
            echo "    
    <div class=\"content\">
        <p>
        ";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ilość kodów"), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "amount", array()), "html", null, true);
            echo "<br>
        ";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wykorzystane"), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "used", array()), "html", null, true);
            echo "<br>
        ";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodane do zamówień"), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "ordered", array()), "html", null, true);
            echo "<br>
        ";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa pakietu"), "html", null, true);
            echo ": ";
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "product", array())) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "product", array()), "name", array()), "html", null, true);
                echo " ";
            } else {
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kody uniwersalne, pasują do wszystkich produktów"), "html", null, true);
            }
            // line 25
            echo "        </p>
        
        <div class=\"options\">
            <a class=\"button\" target=\"_blank\" href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("welcome_print", array("group_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "_locale" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "locale", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wydrukuj powitania"), "html", null, true);
            echo "</a>
            <a class=\"button\" target=\"_blank\" href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("code_print", array("group_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wydrukuj kody"), "html", null, true);
            echo "</a>
            <a class=\"button\" href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_list", array("code_group_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "ad" => 1)), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zobacz strony z tymi kodami"), "html", null, true);
            echo "</a>
        </div>
        
    </div>
    
";
        }
        // line 36
        echo "

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Code:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 36,  116 => 30,  110 => 29,  104 => 28,  99 => 25,  88 => 24,  82 => 23,  76 => 22,  70 => 21,  65 => 18,  63 => 17,  57 => 14,  53 => 13,  49 => 12,  45 => 11,  40 => 8,  37 => 7,  29 => 4,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* */
/* {% block header %}<h1><i class="fa fa-qrcode"></i>{{ 'Grupa kodów'|trans }}</h1>{% endblock %}*/
/* */
/* */
/* {% block content %}*/
/* */
/* */
/*     <div class="content">*/
/*         {{ form_start(form) }}*/
/*         {{ form_errors(form) }}*/
/*         {{ form_widget(form) }}*/
/*         {{ form_end(form) }}*/
/*     </div>*/
/* */
/* {% if object.id %}*/
/*     */
/*     <div class="content">*/
/*         <p>*/
/*         {{ 'Ilość kodów'|trans }}: {{ object.amount }}<br>*/
/*         {{ 'Wykorzystane'|trans }}: {{ object.used }}<br>*/
/*         {{ 'Dodane do zamówień'|trans }}: {{ object.ordered }}<br>*/
/*         {{ 'Nazwa pakietu'|trans }}: {% if object.product %} {{ object.product.name }} {% else %} {{ 'Kody uniwersalne, pasują do wszystkich produktów'|trans }}{% endif %}*/
/*         </p>*/
/*         */
/*         <div class="options">*/
/*             <a class="button" target="_blank" href="{{ path('welcome_print', {'group_id': object.id, '_locale': object.locale })}}">{{ 'Wydrukuj powitania'|trans }}</a>*/
/*             <a class="button" target="_blank" href="{{ path('code_print', {'group_id': object.id})}}">{{ 'Wydrukuj kody'|trans }}</a>*/
/*             <a class="button" href="{{ path('page_list', {'code_group_id': object.id, 'ad':1})}}">{{ 'Zobacz strony z tymi kodami'|trans }}</a>*/
/*         </div>*/
/*         */
/*     </div>*/
/*     */
/* {% endif %}*/
/* */
/* */
/* {% endblock %}*/
