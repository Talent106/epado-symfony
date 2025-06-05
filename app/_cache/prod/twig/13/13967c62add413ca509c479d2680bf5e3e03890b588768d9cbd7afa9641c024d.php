<?php

/* AppBundle:Cemetery:form.html.twig */
class __TwigTemplate_3e74a2d802afd1739a4ca53b2457bebdf00bc087b4036405bbd05b48e7cabd03 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'object' => array($this, 'block_object'),
            'response' => array($this, 'block_response'),
            'element' => array($this, 'block_element'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 7
        return $this->loadTemplate((isset($context["template"]) ? $context["template"] : null), "AppBundle:Cemetery:form.html.twig", 7);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["template"] = "admin.html.twig";
        // line 3
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "xmlHttpRequest", array())) {
            // line 4
            $context["template"] = "ajax.html.twig";
        }
        // line 7
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_object($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array(), "any", true, true)) {
            // line 11
            echo "        ";
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "serialize", array())), "html", null, true);
            echo "
    ";
        }
    }

    // line 15
    public function block_response($context, array $blocks = array())
    {
        if (array_key_exists("response", $context)) {
            echo twig_escape_filter($this->env, (isset($context["response"]) ? $context["response"] : null), "html", null, true);
        } else {
            echo "form";
        }
    }

    // line 17
    public function block_element($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array(), "any", true, true)) {
            // line 19
            echo "        ";
            echo twig_include($this->env, $context, "AppBundle:Cemetery:element.html.twig", array("object" => (isset($context["object"]) ? $context["object"] : null)));
            echo "
    ";
        }
    }

    // line 24
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-bank\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cmentarz"), "html", null, true);
        echo "</h1>";
    }

    // line 26
    public function block_content($context, array $blocks = array())
    {
        // line 27
        echo "

    <div class=\"content\">

        ";
        // line 31
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("action" => $this->env->getExtension('app_extension')->extendUrl()));
        echo "
        ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 34
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "  
        
    </div>


";
    }

    public function getTemplateName()
    {
        return "AppBundle:Cemetery:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 34,  102 => 33,  98 => 32,  94 => 31,  88 => 27,  85 => 26,  77 => 24,  69 => 19,  66 => 18,  63 => 17,  53 => 15,  45 => 11,  42 => 10,  39 => 9,  35 => 7,  32 => 4,  30 => 3,  28 => 1,  22 => 7,);
    }
}
/* {% set template="admin.html.twig" %}    */
/* */
/* {% if app.request.xmlHttpRequest %}*/
/*     {% set template="ajax.html.twig" %}    */
/* {% endif %}*/
/* */
/* {% extends template %}*/
/* */
/* {% block object %}*/
/*     {% if(object.id is defined) %}*/
/*         {{object.serialize|json_encode}}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/* {% block response %}{% if(response is defined) %}{{response}}{% else %}form{% endif %}{% endblock %}*/
/* */
/* {% block element %}*/
/*     {% if(object.id is defined) %}*/
/*         {{ include ('AppBundle:Cemetery:element.html.twig', {'object':object}) }}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/* */
/* {% block header %}<h1><i class="fa fa-bank"></i>{{ 'Cmentarz'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/* */
/* */
/*     <div class="content">*/
/* */
/*         {{ form_start(form,{'action':extend()}) }}*/
/*         {{ form_errors(form) }}*/
/*         {{ form_widget(form) }}*/
/*         {{ form_end(form) }}  */
/*         */
/*     </div>*/
/* */
/* */
/* {% endblock %}*/
