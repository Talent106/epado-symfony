<?php

/* AppBundle:Profile:login.html.twig */
class __TwigTemplate_998e57aba0965bb30e86f1cad516c21b16710712b35cb0d29cf43d960aa7a5b5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("full.html.twig", "AppBundle:Profile:login.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logowanie"), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1><i class=\"fa fa-user\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logowanie"), "html", null, true);
        echo "</h1>
    
    <div class=\"content\"><div class=\"options\">
        <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["facebook_url"]) ? $context["facebook_url"] : null), "html", null, true);
        echo "\" class=\"button facebook\"><i class=\"fa fa-facebook\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zaloguj się przez Facebooka!"), "html", null, true);
        echo "</a>
        <a class=\"button\" href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("register");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rejestracja"), "html", null, true);
        echo "</a>
        <a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("reset");
        echo "\" class=\"button\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie pamiętam hasła"), "html", null, true);
        echo "</a>
        
    </div>
    <p>";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logując się w Epado za pośrednictwem Facebooka, akceptujesz nasz regulamin:"), "html", null, true);
        echo " <a href=\"";
        echo $this->env->getExtension('routing')->getPath("rules");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Regulamin"), "html", null, true);
        echo "</a>.</p> 
    </div>
    
    <div class=\"content\">
        <form action=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" class=\"animated\" method=\"post\">
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\" />
            <div class=\"widget\">
                <label for=\"username\">";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Login"), "html", null, true);
        echo "</label>
                <div class=\"field\"><input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" required=\"required\" /></div>
            </div>
            <div class=\"widget\">
                <label for=\"password\">";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Hasło"), "html", null, true);
        echo "</label>
                <div class=\"field\"><input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" /></div>
            </div>

            
            ";
        // line 30
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 31
            echo "            <div>    
                <ul class=\"errors fa-ul log\">";
            // line 32
            if ((isset($context["error"]) ? $context["error"] : null)) {
                echo "<li><i class=\"fa fa-warning fa-fw\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "messageData", array()), "security"), "html", null, true);
                echo "</li>";
            }
            echo "</ul>
                <div style=\"clear:both;\"></div>
            </div>
            ";
        }
        // line 36
        echo "            
            <div class=\"widget checkbox\">
                <label for=\"remember_me\">";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pamiętaj mnie"), "html", null, true);
        echo "</label>

                <div class=\"field switch single\">
                    <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
                    <label for=\"remember_me\">";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pamiętaj mnie"), "html", null, true);
        echo "</label>
                </div>
            </div>
            

            
            <div>
                <button type=\"submit\" id=\"_submit\" name=\"_submit\">";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zaloguj mnie"), "html", null, true);
        echo "</button> 
            </div>
            

        </form>
                
    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Profile:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 49,  130 => 42,  123 => 38,  119 => 36,  108 => 32,  105 => 31,  103 => 30,  95 => 25,  89 => 22,  85 => 21,  80 => 19,  76 => 18,  65 => 14,  57 => 11,  51 => 10,  45 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "full.html.twig" %}*/
/* */
/* {% block title %}{{ 'Logowanie'|trans }}{% endblock %}*/
/* */
/* {% block content %}*/
/*     <h1><i class="fa fa-user"></i>{{ 'Logowanie'|trans }}</h1>*/
/*     */
/*     <div class="content"><div class="options">*/
/*         <a href="{{ facebook_url }}" class="button facebook"><i class="fa fa-facebook"></i>{{ 'Zaloguj się przez Facebooka!'|trans }}</a>*/
/*         <a class="button" href="{{ path('register') }}">{{ 'Rejestracja'|trans }}</a>*/
/*         <a href="{{ path('reset') }}" class="button">{{ 'Nie pamiętam hasła'|trans }}</a>*/
/*         */
/*     </div>*/
/*     <p>{{ 'Logując się w Epado za pośrednictwem Facebooka, akceptujesz nasz regulamin:'|trans }} <a href="{{ path('rules') }}">{{ 'Regulamin'|trans }}</a>.</p> */
/*     </div>*/
/*     */
/*     <div class="content">*/
/*         <form action="{{ path("login_check") }}" class="animated" method="post">*/
/*             <input type="hidden" name="_csrf_token" value="{{ csrf_token }}" />*/
/*             <div class="widget">*/
/*                 <label for="username">{{ 'Login'|trans }}</label>*/
/*                 <div class="field"><input type="text" id="username" name="_username" value="{{ last_username }}" required="required" /></div>*/
/*             </div>*/
/*             <div class="widget">*/
/*                 <label for="password">{{ 'Hasło'|trans }}</label>*/
/*                 <div class="field"><input type="password" id="password" name="_password" required="required" /></div>*/
/*             </div>*/
/* */
/*             */
/*             {% if error %}*/
/*             <div>    */
/*                 <ul class="errors fa-ul log">{% if error %}<li><i class="fa fa-warning fa-fw"></i>{{ error.messageKey|trans(error.messageData, 'security') }}</li>{% endif %}</ul>*/
/*                 <div style="clear:both;"></div>*/
/*             </div>*/
/*             {% endif %}*/
/*             */
/*             <div class="widget checkbox">*/
/*                 <label for="remember_me">{{ 'Pamiętaj mnie'|trans }}</label>*/
/* */
/*                 <div class="field switch single">*/
/*                     <input type="checkbox" id="remember_me" name="_remember_me" value="on" />*/
/*                     <label for="remember_me">{{ 'Pamiętaj mnie'|trans }}</label>*/
/*                 </div>*/
/*             </div>*/
/*             */
/* */
/*             */
/*             <div>*/
/*                 <button type="submit" id="_submit" name="_submit">{{ 'Zaloguj mnie'|trans }}</button> */
/*             </div>*/
/*             */
/* */
/*         </form>*/
/*                 */
/*     </div>*/
/* */
/* {% endblock content %}*/
/* */
