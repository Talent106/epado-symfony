<?php

/* AppBundle:Order:infoCart.html.twig */
class __TwigTemplate_586de3aadc71c0fd760a0d9e7ae5987620d8b5911afd0c65cbb624346b2093dd extends Twig_Template
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
        if (((isset($context["count"]) ? $context["count"] : null) > 0)) {
            echo "<i class=\"badge";
            if (((isset($context["count"]) ? $context["count"] : null) > 0)) {
                echo " red";
            }
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true);
            echo "</i>";
        }
    }

    public function getTemplateName()
    {
        return "AppBundle:Order:infoCart.html.twig";
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
/* {% if(count>0) %}<i class="badge{% if(count>0) %} red{% endif %}">{{count}}</i>{% endif %}*/
