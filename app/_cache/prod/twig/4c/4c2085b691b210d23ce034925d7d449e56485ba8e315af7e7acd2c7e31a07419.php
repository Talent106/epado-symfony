<?php

/* AppBundle:Order:formMail.html.twig */
class __TwigTemplate_cb9b18daa20a6a5aab39107cdae05c3032b8f52b377b6c45807bb12d7112977d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Order:formMail.html.twig", 1);
        $this->blocks = array(
            '_mail_translations_row' => array($this, 'block__mail_translations_row'),
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
        // line 3
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => $this));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block__mail_translations_row($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"widget\">
        ";
        // line 7
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array())) != 1)) {
            // line 8
            echo "            ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
            echo "
        ";
        }
        // line 10
        echo "        
        ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
    </div> 
";
    }

    // line 17
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-shopping-cart\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Powiadomienie"), "html", null, true);
        echo "</h1>";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "

    <div class=\"content\">
        ";
        // line 23
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 26
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
    </div>
    <div class=\"content\">
        <p>";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("W treści powiadomienia można używać zmiennych ale tylko jeżeli dane powiadomienie ma taką możliwość (przykładowo powiadomienie o rejestracji jedyne zmienne to adres email usera i jego hasło)"), "html", null, true);
        echo ":</p>
        <p>
            ";
        // line 31
        echo "{{link}}";
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("opcjonalny link kierujący do wspomnianego obiektu"), "html", null, true);
        echo "<br>
            ";
        // line 32
        echo "{{message}}";
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("opcjonalna treść wiadomości"), "html", null, true);
        echo "<br>
            ";
        // line 33
        echo "{{page}}";
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("opcjnalna nazwa strony"), "html", null, true);
        echo "<br>
            ";
        // line 34
        echo "{{sender}}";
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("opcjonalny nadawca wiadomości np w przypadku kondolencji"), "html", null, true);
        echo "<br>
            ";
        // line 35
        echo "{{date}}";
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("opcjonalna data śmierci upamiętnionej osoby"), "html", null, true);
        echo "<br>
            ";
        // line 36
        echo "{{service}}";
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("opcjonalna nazwa usługi"), "html", null, true);
        echo "<br>
            ";
        // line 37
        echo "{{orderid}}";
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("opcjonalny numer zamówienia"), "html", null, true);
        echo "
        </p>
    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Order:formMail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 37,  130 => 36,  124 => 35,  118 => 34,  112 => 33,  106 => 32,  100 => 31,  95 => 29,  89 => 26,  85 => 25,  81 => 24,  77 => 23,  72 => 20,  69 => 19,  61 => 17,  54 => 12,  50 => 11,  47 => 10,  41 => 8,  39 => 7,  36 => 6,  33 => 5,  29 => 1,  27 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% form_theme form _self %}*/
/* */
/* {% block _mail_translations_row %}*/
/*     <div class="widget">*/
/*         {% if(form.children|length!=1) %}*/
/*             {{ form_label(form) }}*/
/*         {% endif %}*/
/*         */
/*         {{ form_widget(form) }}*/
/*         {{ form_errors(form) }}*/
/*     </div> */
/* {% endblock %}*/
/* */
/* */
/* {% block header %}<h1><i class="fa fa-shopping-cart"></i>{{ 'Powiadomienie'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/* */
/* */
/*     <div class="content">*/
/*         {{ form_start(form) }}*/
/*         {{ form_errors(form) }}*/
/*         {{ form_widget(form) }}*/
/*         {{ form_end(form) }}*/
/*     </div>*/
/*     <div class="content">*/
/*         <p>{{ 'W treści powiadomienia można używać zmiennych ale tylko jeżeli dane powiadomienie ma taką możliwość (przykładowo powiadomienie o rejestracji jedyne zmienne to adres email usera i jego hasło)'|trans }}:</p>*/
/*         <p>*/
/*             {{ '{{link}}' }} - {{ 'opcjonalny link kierujący do wspomnianego obiektu'|trans }}<br>*/
/*             {{ '{{message}}' }} - {{ 'opcjonalna treść wiadomości'|trans }}<br>*/
/*             {{ '{{page}}' }} - {{ 'opcjnalna nazwa strony'|trans }}<br>*/
/*             {{ '{{sender}}' }} - {{ 'opcjonalny nadawca wiadomości np w przypadku kondolencji'|trans }}<br>*/
/*             {{ '{{date}}' }} - {{ 'opcjonalna data śmierci upamiętnionej osoby'|trans }}<br>*/
/*             {{ '{{service}}' }} - {{ 'opcjonalna nazwa usługi'|trans }}<br>*/
/*             {{ '{{orderid}}' }} - {{ 'opcjonalny numer zamówienia'|trans }}*/
/*         </p>*/
/*     </div>*/
/* */
/* {% endblock %}*/
