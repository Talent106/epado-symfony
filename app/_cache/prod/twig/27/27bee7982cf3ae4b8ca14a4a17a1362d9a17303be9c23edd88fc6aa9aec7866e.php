<?php

/* AppBundle:Profile:register.html.twig */
class __TwigTemplate_a7b7e020c142c45ec6d29fbd6ae17c814ec3f9a47fe15408d8e1dc6b5c17a9b0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("full.html.twig", "AppBundle:Profile:register.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestracja"), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    
    <h1><i class=\"fa fa-user-plus\"></i>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestracja"), "html", null, true);
        echo "</h1>

    <div class=\"content\"><div class=\"options\">
        <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["facebook_url"]) ? $context["facebook_url"] : null), "html", null, true);
        echo "\" class=\"button facebook\"><i class=\"fa fa-facebook\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestracja przez Facebooka"), "html", null, true);
        echo "</a>
        <a class=\"button\" href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("login");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logowanie"), "html", null, true);
        echo "</a>
        
        <p>";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestrując się w Epado za pośrednictwem Facebooka, akceptujesz nasz regulamin:"), "html", null, true);
        echo " <a href=\"";
        echo $this->env->getExtension('routing')->getPath("rules");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Regulamin"), "html", null, true);
        echo "</a>.</p> 
    </div></div>
    
    <div class=\"content\">        
        ";
        // line 17
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
        ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 20
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
        
        
    </div>
    <div class=\"content\">  
        <p>";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestrując się w Epado, akceptujesz nasz regulamin:"), "html", null, true);
        echo " <a href=\"";
        echo $this->env->getExtension('routing')->getPath("rules");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Regulamin"), "html", null, true);
        echo "</a>.</p> 
    </div>
        
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Profile:register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 25,  83 => 20,  79 => 19,  75 => 18,  71 => 17,  60 => 13,  53 => 11,  47 => 10,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "full.html.twig" %}*/
/* */
/* {% block title %}{{ 'Rejestracja'|trans }}{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/*     <h1><i class="fa fa-user-plus"></i>{{ 'Rejestracja'|trans }}</h1>*/
/* */
/*     <div class="content"><div class="options">*/
/*         <a href="{{ facebook_url }}" class="button facebook"><i class="fa fa-facebook"></i>{{ 'Rejestracja przez Facebooka'|trans }}</a>*/
/*         <a class="button" href="{{ path('login') }}">{{ 'Logowanie'|trans }}</a>*/
/*         */
/*         <p>{{ 'Rejestrując się w Epado za pośrednictwem Facebooka, akceptujesz nasz regulamin:'|trans }} <a href="{{ path('rules') }}">{{ 'Regulamin'|trans }}</a>.</p> */
/*     </div></div>*/
/*     */
/*     <div class="content">        */
/*         {{ form_start(form) }}*/
/*         {{ form_errors(form) }}*/
/*         {{ form_widget(form) }}*/
/*         {{ form_end(form) }}*/
/*         */
/*         */
/*     </div>*/
/*     <div class="content">  */
/*         <p>{{ 'Rejestrując się w Epado, akceptujesz nasz regulamin:'|trans }} <a href="{{ path('rules') }}">{{ 'Regulamin'|trans }}</a>.</p> */
/*     </div>*/
/*         */
/* {% endblock %}*/
