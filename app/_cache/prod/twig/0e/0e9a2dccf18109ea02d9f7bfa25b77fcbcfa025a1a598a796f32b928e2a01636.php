<?php

/* AppBundle:Profile:edit.html.twig */
class __TwigTemplate_c9c525dda445f1322cf70e8ec6d04505d603b236220619688fac734b76d01438 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Profile:edit.html.twig", 2);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-gear\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ustawienia"), "html", null, true);
        echo "</h1>";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    
    <div class=\"content\">
        ";
        // line 9
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "avatar", array())) {
            // line 10
            echo "        <div class=\"avatar\" style=\"width:60px; height:60px;  background-image:url('/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "avatar", array()), "html", null, true);
            echo "'); margin-bottom:20px;\"></div>
        ";
        }
        // line 12
        echo "        
        ";
        // line 13
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
        ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 16
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
    </div>
    
    <div class=\"content overauto\">
        
        <div class=\"onright\">
            <p><b><i class=\"fa fa-fw fa-user\"></i>&nbsp; ";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane podstawowe"), "html", null, true);
        echo ":</b></p>
            <p>
            ";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres email"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
        echo "<br>
            ";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Imię i nazwisko"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "lastname", array()), "html", null, true);
        echo "<br>
            ";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Liczba dodanych stron"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "pages", array())), "html", null, true);
        echo "<br>
            ";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Liczba dodanych cmentarzy"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "cemeteries", array())), "html", null, true);
        echo "<br>
            ";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Liczba dodanych rodzin"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "families", array())), "html", null, true);
        echo "<br>
            ";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Liczba zamówień"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "orders", array())), "html", null, true);
        echo "
            </p>
        </div>
        

        
        <p><b><i class=\"fa fa-fw fa-truck\"></i>&nbsp; ";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres dostawy"), "html", null, true);
        echo ":</b></p>
        <p>";
        // line 36
        echo $this->env->getExtension('app_extension')->address($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "deliveryaddress", array()));
        echo "</p>
        <p><b><i class=\"fa fa-fw fa-credit-card-alt\"></i>&nbsp; ";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane rozliczeniowe"), "html", null, true);
        echo ":</b></p>
        <p>";
        // line 38
        echo $this->env->getExtension('app_extension')->address($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "billingaddress", array()));
        echo "</p>
        
        
    </div>
        
    <div class=\"content\">
        
        <div class=\"options\"> 
            <a class=\"button small\" href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("profile_address");
        echo "\"><i class=\"fa fa-truck\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edytuj dane adresowe"), "html", null, true);
        echo "</a>
        </div>
    </div>

    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Profile:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 46,  136 => 38,  132 => 37,  128 => 36,  124 => 35,  113 => 29,  107 => 28,  101 => 27,  95 => 26,  87 => 25,  81 => 24,  76 => 22,  67 => 16,  63 => 15,  59 => 14,  55 => 13,  52 => 12,  46 => 10,  44 => 9,  40 => 7,  37 => 6,  29 => 4,  11 => 2,);
    }
}
/* {#{% trans_default_domain 'FOSUserBundle' %}#}*/
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-gear"></i>{{ 'Ustawienia'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/*     <div class="content">*/
/*         {% if(app.user.avatar) %}*/
/*         <div class="avatar" style="width:60px; height:60px;  background-image:url('/{{ app.user.avatar }}'); margin-bottom:20px;"></div>*/
/*         {% endif %}*/
/*         */
/*         {{ form_start(form) }}*/
/*         {{ form_errors(form) }}*/
/*         {{ form_widget(form) }}*/
/*         {{ form_end(form) }}*/
/*     </div>*/
/*     */
/*     <div class="content overauto">*/
/*         */
/*         <div class="onright">*/
/*             <p><b><i class="fa fa-fw fa-user"></i>&nbsp; {{ 'Dane podstawowe'|trans }}:</b></p>*/
/*             <p>*/
/*             {{ 'Adres email'|trans }}: {{ app.user.username }}<br>*/
/*             {{ 'Imię i nazwisko'|trans }}: {{ app.user.firstname }} {{ app.user.lastname }}<br>*/
/*             {{ 'Liczba dodanych stron'|trans }}: {{ app.user.pages|length }}<br>*/
/*             {{ 'Liczba dodanych cmentarzy'|trans }}: {{ app.user.cemeteries|length }}<br>*/
/*             {{ 'Liczba dodanych rodzin'|trans }}: {{ app.user.families|length }}<br>*/
/*             {{ 'Liczba zamówień'|trans }}: {{ app.user.orders|length }}*/
/*             </p>*/
/*         </div>*/
/*         */
/* */
/*         */
/*         <p><b><i class="fa fa-fw fa-truck"></i>&nbsp; {{ 'Adres dostawy'|trans }}:</b></p>*/
/*         <p>{{ address(app.user.deliveryaddress)|raw }}</p>*/
/*         <p><b><i class="fa fa-fw fa-credit-card-alt"></i>&nbsp; {{ 'Dane rozliczeniowe'|trans }}:</b></p>*/
/*         <p>{{ address(app.user.billingaddress)|raw }}</p>*/
/*         */
/*         */
/*     </div>*/
/*         */
/*     <div class="content">*/
/*         */
/*         <div class="options"> */
/*             <a class="button small" href="{{ path('profile_address')}}"><i class="fa fa-truck"></i> {{ 'Edytuj dane adresowe'|trans }}</a>*/
/*         </div>*/
/*     </div>*/
/* */
/*     */
/* {% endblock %}*/
