<?php

/* full.html.twig */
class __TwigTemplate_2f92be20bbb0901a7ee387cf072ef5d340ec1a6447d33a7d2799760a39be7ce1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("wrapper.html.twig", "full.html.twig", 1);
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
        echo "<div class=\"admin\">
    
    <div class=\"size first-content\">
        ";
        // line 6
        $this->displayBlock("header", $context, $blocks);
        echo "
        
        <div class=\"notifications\">
            ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification notice\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "warning"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification warning\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification success\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification error\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "        </div>
        
        <div class=\"full\">
        ";
        // line 16
        $this->displayBlock('content', $context, $blocks);
        // line 17
        echo "        </div>
    </div>
</div>     
";
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 16,  97 => 17,  95 => 16,  90 => 13,  78 => 12,  66 => 11,  54 => 10,  43 => 9,  37 => 6,  32 => 3,  29 => 2,  11 => 1,);
    }
}
/* {% extends 'wrapper.html.twig' %}*/
/* {% block body %}*/
/* <div class="admin">*/
/*     */
/*     <div class="size first-content">*/
/*         {{ block('header') }}*/
/*         */
/*         <div class="notifications">*/
/*             {% for flashMessage in app.session.flashbag.get('notice') %}<div class="notification notice">{{ flashMessage|raw }}</div>{% endfor %}*/
/*             {% for flashMessage in app.session.flashbag.get('warning') %}<div class="notification warning">{{ flashMessage|raw }}</div>{% endfor %}*/
/*             {% for flashMessage in app.session.flashbag.get('success') %}<div class="notification success">{{ flashMessage|raw }}</div>{% endfor %}*/
/*             {% for flashMessage in app.session.flashbag.get('error') %}<div class="notification error">{{ flashMessage|raw }}</div>{% endfor %}*/
/*         </div>*/
/*         */
/*         <div class="full">*/
/*         {% block content %}{% endblock %}*/
/*         </div>*/
/*     </div>*/
/* </div>     */
/* {% endblock %}*/
