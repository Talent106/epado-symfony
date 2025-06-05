<?php

/* empty.html.twig */
class __TwigTemplate_d5f564142f84dcf26ea6ccb02982f3ea294aa30e6bb1cfc41015e4c1dfd3e55b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "empty.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  20 => 1,);
    }
}
/* {% block content %}{% endblock %}*/
