<?php

/* AppBundle:Message:info.html.twig */
class __TwigTemplate_fe127d6dd9cc8e4c9c73aab4e7965e7be56375859e17d6ed89be04332953f52e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<i class=\"badge";
        if (((isset($context["count"]) ? $context["count"] : null) > 0)) {
            echo " red animated infinite pulse";
        }
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true);
        echo "</i>";
    }

    public function getTemplateName()
    {
        return "AppBundle:Message:info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <i class="badge{% if(count>0) %} red animated infinite pulse{% endif %}">{{count}}</i>*/
