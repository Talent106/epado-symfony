<?php

/* TwigBundle:Exception:error.html.twig */
class __TwigTemplate_78b41b3576980260fe1ed388fc8fce65c453d312eb11263a3958a4450d4f0ff7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("default.html.twig", "TwigBundle:Exception:error.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie znaleziono strony"), "html", null, true);
        echo "</h1>
    
    <div class=\"content\">
        <p>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Niestety szukana przez Ciebie strona nie istnieje. Wróć do strony głównej."), "html", null, true);
        echo "</p>
    </div>    
    
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.html.twig";
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
/*     <h1>{{ 'Nie znaleziono strony'|trans }}</h1>*/
/*     */
/*     <div class="content">*/
/*         <p>{{ 'Niestety szukana przez Ciebie strona nie istnieje. Wróć do strony głównej.'|trans }}</p>*/
/*     </div>    */
/*     */
/* {% endblock %}*/
/* */
