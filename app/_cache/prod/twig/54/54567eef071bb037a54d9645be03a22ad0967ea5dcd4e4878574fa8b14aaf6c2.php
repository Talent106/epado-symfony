<?php

/* AppBundle:Home:prv.html.twig */
class __TwigTemplate_e14f5b30d3f9e6e1a1ec581868a8c203677426962806b35c724627a2ee388d6b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("full.html.twig", "AppBundle:Home:prv.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "full.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Polityka prywatności"), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>";
        if ((isset($context["text"]) ? $context["text"] : null)) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["text"]) ? $context["text"] : null), "title", array()), "html", null, true);
            echo " ";
        }
        echo "</h1>
    
    
    <div class=\"content rules\">
        ";
        // line 10
        if ((isset($context["text"]) ? $context["text"] : null)) {
            echo " ";
            echo $this->getAttribute((isset($context["text"]) ? $context["text"] : null), "content", array());
            echo " ";
        }
        // line 11
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Home:prv.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 11,  50 => 10,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "full.html.twig" %}*/
/* */
/* {% block title %}{{ 'Polityka prywatności'|trans }}{% endblock %}*/
/* */
/* {% block content %}*/
/*     <h1>{% if text %} {{text.title}} {% endif %}</h1>*/
/*     */
/*     */
/*     <div class="content rules">*/
/*         {% if text %} {{text.content|raw}} {% endif %}*/
/*     </div>*/
/* */
/* {% endblock content %}*/
/* */
