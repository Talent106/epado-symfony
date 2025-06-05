<?php

/* AppBundle:Profile:panel.html.twig */
class __TwigTemplate_893af3ab1bcbbc80585605c2979373959892b0816ef6f08b2e566853f1bdaf67 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Profile:panel.html.twig", 1);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'title' => array($this, 'block_title'),
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

    // line 3
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-user\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje konto"), "html", null, true);
        echo "</h1>";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Panel"), "html", null, true);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        if ((( !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "cookies", array()), "get", array(0 => "welcomemessage"), "method") && ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()) == "user")) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "pages", array())) == 0))) {
            // line 8
            echo "    <script>
        function setCookie(c_name,value,expiredays,element)
\t{
\t\tvar exdate=new Date();
\t\texdate.setDate(exdate.getDate()+expiredays)
\t\tdocument.cookie=c_name+ \"=\" +escape(value)+
\t\t((expiredays==null) ? \"\" : \";expires=\"+exdate.toGMTString());
                element.parentNode.parentNode.style.display='none';
\t}
    </script>
    <div class=\"content error\" style=\"background-image:none;\">
        <p>";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Witamy w Epado, jeśli zakupiłeś i posiadasz jedną z kopert. dodaj stronę i zapisz ją a następnie wpisz poufny kod aktywacyjny znajdujący się w kopercie. Strona zacznie być wyświetlana w wynikach wyszukiwania."), "html", null, true);
            echo "</p>
        <p>";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Jeśli nie posiadasz koperty z kodem aktywacyjnym. Dodaj stronę, uzupełnij formularze, dodaj zdjęcia i zapisz ją. Po dokonaniu  wyboru jednego z pakietów, opłać i oczekuj na przesyłkę z fizycznym kodem Epado, który nakleisz na nagrobku."), "html", null, true);
            echo "</p>
        <div class=\"options\">
            <div class=\"button small\" onClick=\"setCookie('welcomemessage','1',null,this)\">";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie pokazuj tej informacji ponownie"), "html", null, true);
            echo "</div>
        </div>
    </div>
    ";
        }
        // line 25
        echo "    
    <div class=\"content\">
        <p><b><i class=\"fa fa-fw fa-user\"></i>&nbsp; ";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane podstawowe"), "html", null, true);
        echo ":</b></p>
        <p>
        ";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres email"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
        echo "<br />
        ";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Imię i nazwisko"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "lastname", array()), "html", null, true);
        echo "
        </p>
        
        <p><b><i class=\"fa fa-fw fa-truck\"></i>&nbsp; ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres dostawy"), "html", null, true);
        echo ":</b></p>
        <p>";
        // line 34
        echo $this->env->getExtension('app_extension')->address($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "deliveryaddress", array()));
        echo "</p>
        <p><b><i class=\"fa fa-fw fa-credit-card-alt\"></i>&nbsp; ";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane rozliczeniowe"), "html", null, true);
        echo ":</b></p>
        <p>";
        // line 36
        echo $this->env->getExtension('app_extension')->address($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "billingaddress", array()));
        echo "</p>

    </div>  

    <div class=\"content\">
        <div class=\"options\">
            <a class=\"button small\" href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("profile_edit");
        echo "\"><i class=\"fa fa-gear\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ustawienia"), "html", null, true);
        echo "</a> 
            <a class=\"button small\" href=\"";
        // line 43
        echo $this->env->getExtension('routing')->getPath("profile_address");
        echo "\"><i class=\"fa fa-truck\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edytuj dane adresowe"), "html", null, true);
        echo "</a> 
            <a href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("page_form");
        echo "\" class=\"button small\"><i class=\"fa fa-plus\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj stronę"), "html", null, true);
        echo "</a>
        </div>
    </div>
       
        
        
        
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Profile:panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 44,  131 => 43,  125 => 42,  116 => 36,  112 => 35,  108 => 34,  104 => 33,  94 => 30,  88 => 29,  83 => 27,  79 => 25,  72 => 22,  67 => 20,  63 => 19,  50 => 8,  47 => 7,  44 => 6,  38 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-user"></i>{{ 'Moje konto'|trans }}</h1>{% endblock %}*/
/* {% block title %}{{ 'Panel'|trans }}{% endblock %}*/
/*     */
/* {% block content %}*/
/*     {% if not app.request.cookies.get('welcomemessage') and app.user.type == 'user' and app.user.pages|length==0 %}*/
/*     <script>*/
/*         function setCookie(c_name,value,expiredays,element)*/
/* 	{*/
/* 		var exdate=new Date();*/
/* 		exdate.setDate(exdate.getDate()+expiredays)*/
/* 		document.cookie=c_name+ "=" +escape(value)+*/
/* 		((expiredays==null) ? "" : ";expires="+exdate.toGMTString());*/
/*                 element.parentNode.parentNode.style.display='none';*/
/* 	}*/
/*     </script>*/
/*     <div class="content error" style="background-image:none;">*/
/*         <p>{{ 'Witamy w Epado, jeśli zakupiłeś i posiadasz jedną z kopert. dodaj stronę i zapisz ją a następnie wpisz poufny kod aktywacyjny znajdujący się w kopercie. Strona zacznie być wyświetlana w wynikach wyszukiwania.'|trans }}</p>*/
/*         <p>{{ 'Jeśli nie posiadasz koperty z kodem aktywacyjnym. Dodaj stronę, uzupełnij formularze, dodaj zdjęcia i zapisz ją. Po dokonaniu  wyboru jednego z pakietów, opłać i oczekuj na przesyłkę z fizycznym kodem Epado, który nakleisz na nagrobku.'|trans }}</p>*/
/*         <div class="options">*/
/*             <div class="button small" onClick="setCookie('welcomemessage','1',null,this)">{{ 'Nie pokazuj tej informacji ponownie'|trans }}</div>*/
/*         </div>*/
/*     </div>*/
/*     {% endif %}    */
/*     <div class="content">*/
/*         <p><b><i class="fa fa-fw fa-user"></i>&nbsp; {{ 'Dane podstawowe'|trans }}:</b></p>*/
/*         <p>*/
/*         {{ 'Adres email'|trans }}: {{ app.user.username }}<br />*/
/*         {{ 'Imię i nazwisko'|trans }}: {{ app.user.firstname }} {{ app.user.lastname }}*/
/*         </p>*/
/*         */
/*         <p><b><i class="fa fa-fw fa-truck"></i>&nbsp; {{ 'Adres dostawy'|trans }}:</b></p>*/
/*         <p>{{ address(app.user.deliveryaddress)|raw }}</p>*/
/*         <p><b><i class="fa fa-fw fa-credit-card-alt"></i>&nbsp; {{ 'Dane rozliczeniowe'|trans }}:</b></p>*/
/*         <p>{{ address(app.user.billingaddress)|raw }}</p>*/
/* */
/*     </div>  */
/* */
/*     <div class="content">*/
/*         <div class="options">*/
/*             <a class="button small" href="{{ path('profile_edit')}}"><i class="fa fa-gear"></i> {{ 'Ustawienia'|trans }}</a> */
/*             <a class="button small" href="{{ path('profile_address')}}"><i class="fa fa-truck"></i> {{ 'Edytuj dane adresowe'|trans }}</a> */
/*             <a href="{{ path('page_form') }}" class="button small"><i class="fa fa-plus"></i> {{ 'Dodaj stronę'|trans }}</a>*/
/*         </div>*/
/*     </div>*/
/*        */
/*         */
/*         */
/*         */
/* {% endblock %}*/
