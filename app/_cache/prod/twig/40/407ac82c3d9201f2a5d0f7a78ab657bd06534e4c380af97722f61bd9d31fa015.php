<?php

/* TwigBundle:Exception:error500.html.twig */
class __TwigTemplate_e48043ee4f76104d87837204b6f28396365016ec40660da862b4a08ca009c050 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("default.html.twig", "TwigBundle:Exception:error500.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "
    <h1>";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wystąpił nieoczekiwany błąd"), "html", null, true);
        echo "</h1>
    
    <div class=\"content\">
        <p>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Niestety strona na której jesteś nie działa prawidłowo. Wróć do strony głównej."), "html", null, true);
        echo "</p>
    </div>    
    
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error500.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 7,  34 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends "default.html.twig" %}*/
/* {% block content %}*/
/* */
/*     <h1>{{ 'Wystąpił nieoczekiwany błąd'|trans }}</h1>*/
/*     */
/*     <div class="content">*/
/*         <p>{{ 'Niestety strona na której jesteś nie działa prawidłowo. Wróć do strony głównej.'|trans }}</p>*/
/*     </div>    */
/*     */
/* {% endblock %}*/
/* */
