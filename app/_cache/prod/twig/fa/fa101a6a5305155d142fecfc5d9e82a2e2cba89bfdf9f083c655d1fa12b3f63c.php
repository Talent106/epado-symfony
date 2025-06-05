<?php

/* AppBundle:Cemetery:info.html.twig */
class __TwigTemplate_92742a06aa4c9c7e02b09903ade23ed21ffb8ed9243d4b11a8624e74831a99a3 extends Twig_Template
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
            echo " red";
        }
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true);
        echo "</i>";
    }

    public function getTemplateName()
    {
        return "AppBundle:Cemetery:info.html.twig";
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
/* <i class="badge{% if(count>0) %} red{% endif %}">{{count}}</i>*/
