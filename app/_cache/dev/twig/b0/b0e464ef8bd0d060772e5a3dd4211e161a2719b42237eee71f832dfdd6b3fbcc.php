<?php

/* home.html.twig */
class __TwigTemplate_a6a2f0f89f8d5e0de1542cd3c2fe7b7f482cbeb93793967d4d002b25cd8a63f0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("wrapper.html.twig", "home.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "wrapper.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        $this->displayBlock('content', $context, $blocks);
        echo " 
";
    }

    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 3,  29 => 2,  11 => 1,);
    }
}
/* {% extends 'wrapper.html.twig' %}*/
/* {% block body %}*/
/* {% block content %}{% endblock %} */
/* {% endblock %}*/
