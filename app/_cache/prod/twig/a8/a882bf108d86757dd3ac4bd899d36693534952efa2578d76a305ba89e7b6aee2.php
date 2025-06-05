<?php

/* AppBundle:Home:rules.html.twig */
class __TwigTemplate_3fe76df79549428af23b84b1aa1ded9ef1547336308afee30aef9d43d4dbefbe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("full.html.twig", "AppBundle:Home:rules.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Regulamin serwisu"), "html", null, true);
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
        echo "        
    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Home:rules.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 10,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "full.html.twig" %}*/
/* */
/* {% block title %}{{ 'Regulamin serwisu'|trans }}{% endblock %}*/
/* */
/* {% block content %}*/
/*     <h1>{% if text %} {{text.title}} {% endif %}</h1>*/
/*     */
/*     */
/*     <div class="content rules">*/
/*         {% if text %} {{text.content|raw}} {% endif %}        */
/*     </div>*/
/* */
/* {% endblock content %}*/
/* */
