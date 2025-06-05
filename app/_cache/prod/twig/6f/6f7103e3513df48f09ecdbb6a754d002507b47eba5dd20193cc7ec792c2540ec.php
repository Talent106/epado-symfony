<?php

/* AppBundle:Profile:reset.html.twig */
class __TwigTemplate_cdfe136e8060db4f3bcf7c7fb678d0f565deccc366e7c9264923855bd63adb7c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("full.html.twig", "AppBundle:Profile:reset.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prośba o nowe hasło"), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    <h1><i class=\"fa fa-question-circle\"></i>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prośba o nowe hasło"), "html", null, true);
        echo "</h1>
    
    <div class=\"content\">
        ";
        // line 10
        if (array_key_exists("error", $context)) {
            // line 11
            echo "            <p>";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</p>
        ";
        }
        // line 12
        echo "    
            
        ";
        // line 14
        if (array_key_exists("info", $context)) {
            // line 15
            echo "            <p>";
            echo twig_escape_filter($this->env, (isset($context["info"]) ? $context["info"] : null), "html", null, true);
            echo "</p>
        ";
        } else {
            // line 17
            echo "            
            
            ";
            // line 19
            if (array_key_exists("do", $context)) {
                // line 20
                echo "
                ";
                // line 21
                if (((isset($context["do"]) ? $context["do"] : null) == "username")) {
                    echo "    
                    <form method=\"post\">
                        <div class=\"widget\">
                            <label for=\"username\">";
                    // line 24
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Podaj adres email"), "html", null, true);
                    echo "</label>
                            <input type=\"text\" name=\"username\" id=\"username\" value=\"\">
                        </div>    
                        <div><button type=\"submit\" id=\"user_save\" name=\"request\">";
                    // line 27
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zmień hasło"), "html", null, true);
                    echo "</button></div>   
                    </form>
                ";
                } elseif ((                // line 29
(isset($context["do"]) ? $context["do"] : null) == "password")) {
                    // line 30
                    echo "                    <form method=\"post\">
                        <div class=\"widget\">
                            <label for=\"password\">";
                    // line 32
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Podaj nowe hasło"), "html", null, true);
                    echo "</label>
                            <input type=\"password\" name=\"password\" id=\"password\" value=\"\">
                        </div>    
                        <div class=\"widget\">
                            <label for=\"password_confirm\">";
                    // line 36
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Powtórz nowe hasło"), "html", null, true);
                    echo "</label>
                            <input type=\"password\" name=\"password_confirm\" id=\"password_confirm\" value=\"\">
                        </div> 
                        <div><button type=\"submit\" id=\"user_save\" name=\"request\">";
                    // line 39
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zmień hasło"), "html", null, true);
                    echo "</button></div>   
                    </form>
                ";
                } else {
                    // line 41
                    echo " 
                    <p>";
                    // line 42
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wystąpił błąd proszę spróbować ponownie."), "html", null, true);
                    echo "</p>
                ";
                }
                // line 44
                echo "
            ";
            }
            // line 46
            echo "        
        ";
        }
        // line 48
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Profile:reset.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 48,  130 => 46,  126 => 44,  121 => 42,  118 => 41,  112 => 39,  106 => 36,  99 => 32,  95 => 30,  93 => 29,  88 => 27,  82 => 24,  76 => 21,  73 => 20,  71 => 19,  67 => 17,  61 => 15,  59 => 14,  55 => 12,  49 => 11,  47 => 10,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "full.html.twig" %}*/
/* */
/* {% block title %}{{ 'Prośba o nowe hasło'|trans }}{% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <h1><i class="fa fa-question-circle"></i>{{ 'Prośba o nowe hasło'|trans }}</h1>*/
/*     */
/*     <div class="content">*/
/*         {% if(error is defined) %}*/
/*             <p>{{ error }}</p>*/
/*         {% endif %}    */
/*             */
/*         {% if(info is defined) %}*/
/*             <p>{{ info }}</p>*/
/*         {% else %}*/
/*             */
/*             */
/*             {% if(do is defined) %}*/
/* */
/*                 {% if(do=='username') %}    */
/*                     <form method="post">*/
/*                         <div class="widget">*/
/*                             <label for="username">{{ 'Podaj adres email'|trans }}</label>*/
/*                             <input type="text" name="username" id="username" value="">*/
/*                         </div>    */
/*                         <div><button type="submit" id="user_save" name="request">{{ 'Zmień hasło'|trans }}</button></div>   */
/*                     </form>*/
/*                 {% elseif(do=='password') %}*/
/*                     <form method="post">*/
/*                         <div class="widget">*/
/*                             <label for="password">{{ 'Podaj nowe hasło'|trans }}</label>*/
/*                             <input type="password" name="password" id="password" value="">*/
/*                         </div>    */
/*                         <div class="widget">*/
/*                             <label for="password_confirm">{{ 'Powtórz nowe hasło'|trans }}</label>*/
/*                             <input type="password" name="password_confirm" id="password_confirm" value="">*/
/*                         </div> */
/*                         <div><button type="submit" id="user_save" name="request">{{ 'Zmień hasło'|trans }}</button></div>   */
/*                     </form>*/
/*                 {% else %} */
/*                     <p>{{ 'Wystąpił błąd proszę spróbować ponownie.'|trans }}</p>*/
/*                 {% endif %}*/
/* */
/*             {% endif %}*/
/*         */
/*         {% endif %}*/
/*     </div>*/
/* */
/* {% endblock %}*/
