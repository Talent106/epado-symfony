<?php

/* AppBundle:Code:index.html.twig */
class __TwigTemplate_6b9f720c169f4236e7447d0c74cc791fecd4089f4041d316a9a877659e766a45 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Code:index.html.twig", 1);
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

    // line 3
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-qrcode\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Grupy kodów"), "html", null, true);
        echo "</h1>";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    
    <div class=\"content\">
        <form action=\"\" method=\"get\" class=\"filters\">
            <div class=\"field\"><label for=\"code\">Szukaj pojedynczego kodu</label><div class=\"text\"><input type=\"text\" value=\"";
        // line 10
        if ( !(null === (isset($context["object"]) ? $context["object"] : null))) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "code", array()), "html", null, true);
        }
        echo "\" name=\"code\"></div></div>
            <div class=\"buttons\"><input type=\"submit\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Szukaj"), "html", null, true);
        echo "\"></div>
        </form>
        ";
        // line 13
        if ( !(null === (isset($context["object"]) ? $context["object"] : null))) {
            // line 14
            echo "            <p>
            Znaleziono kod: ";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "code", array()), "html", null, true);
            echo "<br>
            Grupa do której należy: <a href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("code_form", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "group", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "group", array()), "name", array()), "html", null, true);
            echo "</a><br>
            ";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Okres"), "html", null, true);
            echo ": ";
            if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "group", array()), "product", array())) {
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "group", array()), "product", array()), "months", array()) / 12) . " lat")), "html", null, true);
            } else {
                if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "group", array()), "months", array())) {
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "group", array()), "months", array()) / 12) . " lat")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Uniwersalne"), "html", null, true);
                }
            }
            echo "<br>
            Wykorzystany: ";
            // line 18
            if ( !(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "page", array()))) {
                echo "Tak (<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "page", array()), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "page", array()), "name", array()), "html", null, true);
                echo "</a>)";
            } else {
                echo "Nie";
            }
            echo "<br>
            Zamówienie: ";
            // line 19
            if ( !(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproduct", array()))) {
                echo "Tak (<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_form", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproduct", array()), "order", array()), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproduct", array()), "order", array()), "id", array()), "html", null, true);
                echo "</a>)";
            } else {
                echo "Nie";
            }
            // line 20
            echo "            </p>
            
            <div class=\"options\">
                <a class=\"button\" target=\"_blank\" href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("welcome_print", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wydrukuj powitania"), "html", null, true);
            echo "</a>
                <a class=\"button\" target=\"_blank\" href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("code_print", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wydrukuj kody"), "html", null, true);
            echo "</a>
            </div>
        ";
        } else {
            // line 27
            echo "            ";
            if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "code"), "method")) {
                // line 28
                echo "            <p>Nie odnaleziono podanego kodu</p>
            ";
            }
            // line 29
            echo " 
        ";
        }
        // line 30
        echo "    
    </div>
    
    <div class=\"content\">
        
        <div class=\"options\"> 
        <a href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("code_form");
        echo "\" class=\"button\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj grupę"), "html", null, true);
        echo "</a>
        </div>


        ";
        // line 40
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 41
            echo "            ";
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th>";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr"), "html", null, true);
            echo "</th>
                        <th>";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
            echo "</th>
                        <th>";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Liczba kodów"), "html", null, true);
            echo "</th>
                        <th>";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kody użyte"), "html", null, true);
            echo "</th>
                        <th>";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Okres"), "html", null, true);
            echo "</th>
                        <th>";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zmieniono"), "html", null, true);
            echo "</th>
                        <th>";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Utworzono"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 52
            $context["i"] = 0;
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 53
                echo "                    <tr>
                        <td>";
                // line 54
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "per_page", array()) * ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "page", array()) - 1))), "html", null, true);
                echo "</td>
                        <td><a href=\"";
                // line 55
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("code_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "name", array()), "html", null, true);
                echo "</a></td>
                        <td>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "amount", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "used", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 58
                if ($this->getAttribute($context["object"], "product", array())) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((($this->getAttribute($this->getAttribute($context["object"], "product", array()), "months", array()) / 12) . " lat")), "html", null, true);
                } else {
                    if ($this->getAttribute($context["object"], "months", array())) {
                        echo " ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((($this->getAttribute($context["object"], "months", array()) / 12) . " lat")), "html", null, true);
                    } else {
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Uniwersalne"), "html", null, true);
                    }
                }
                echo "</td>
                        <td>";
                // line 59
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "updated", array())), "html", null, true);
                echo "</td>
                        <td>";
                // line 60
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "created", array())), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "            </table></div>
            ";
            // line 64
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
        ";
        } else {
            // line 66
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie ma dodanych grup kodów."), "html", null, true);
            echo "</p>
        ";
        }
        // line 68
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Code:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  260 => 68,  254 => 66,  249 => 64,  246 => 63,  237 => 60,  233 => 59,  220 => 58,  216 => 57,  212 => 56,  206 => 55,  202 => 54,  199 => 53,  193 => 52,  188 => 50,  184 => 49,  180 => 48,  176 => 47,  172 => 46,  168 => 45,  164 => 44,  157 => 41,  155 => 40,  146 => 36,  138 => 30,  134 => 29,  130 => 28,  127 => 27,  119 => 24,  113 => 23,  108 => 20,  98 => 19,  86 => 18,  71 => 17,  65 => 16,  61 => 15,  58 => 14,  56 => 13,  51 => 11,  45 => 10,  40 => 7,  37 => 6,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-qrcode"></i>{{ 'Grupy kodów'|trans }}</h1>{% endblock %}*/
/* */
/* */
/* {% block content %}*/
/*     */
/*     <div class="content">*/
/*         <form action="" method="get" class="filters">*/
/*             <div class="field"><label for="code">Szukaj pojedynczego kodu</label><div class="text"><input type="text" value="{% if object is not null %}{{object.code}}{% endif %}" name="code"></div></div>*/
/*             <div class="buttons"><input type="submit" value="{{ 'Szukaj'|trans }}"></div>*/
/*         </form>*/
/*         {% if object is not null %}*/
/*             <p>*/
/*             Znaleziono kod: {{object.code}}<br>*/
/*             Grupa do której należy: <a href="{{ path('code_form', {'id': object.group.id})}}">{{object.group.name}}</a><br>*/
/*             {{ 'Okres'|trans }}: {% if object.group.product %}{{ (object.group.product.months/12~' lat')|trans }}{% else %}{% if object.group.months %} {{ (object.group.months/12~' lat')|trans }}{% else %}{{ 'Uniwersalne'|trans }}{% endif %}{% endif %}<br>*/
/*             Wykorzystany: {% if object.page is not null %}Tak (<a href="{{ path('page_form', {'id': object.page.id})}}">{{object.page.name}}</a>){% else %}Nie{% endif %}<br>*/
/*             Zamówienie: {% if object.orderproduct is not null %}Tak (<a href="{{ path('order_form', {'id': object.orderproduct.order.id})}}">{{object.orderproduct.order.id}}</a>){% else %}Nie{% endif %}*/
/*             </p>*/
/*             */
/*             <div class="options">*/
/*                 <a class="button" target="_blank" href="{{ path('welcome_print', {'id': object.id })}}">{{ 'Wydrukuj powitania'|trans }}</a>*/
/*                 <a class="button" target="_blank" href="{{ path('code_print', {'id': object.id})}}">{{ 'Wydrukuj kody'|trans }}</a>*/
/*             </div>*/
/*         {% else %}*/
/*             {% if(app.request.get('code')) %}*/
/*             <p>Nie odnaleziono podanego kodu</p>*/
/*             {% endif %} */
/*         {% endif %}    */
/*     </div>*/
/*     */
/*     <div class="content">*/
/*         */
/*         <div class="options"> */
/*         <a href="{{ path('code_form') }}" class="button">{{ 'Dodaj grupę'|trans }}</a>*/
/*         </div>*/
/* */
/* */
/*         {% if objects %}*/
/*             {{ pagination(pager)|raw }}*/
/*             <div class="table-wrapper"><table>*/
/*                     <tr>*/
/*                         <th>{{ 'Nr'|trans }}</th>*/
/*                         <th>{{ 'Nazwa'|trans }}</th>*/
/*                         <th>{{ 'Liczba kodów'|trans }}</th>*/
/*                         <th>{{ 'Kody użyte'|trans }}</th>*/
/*                         <th>{{ 'Okres'|trans }}</th>*/
/*                         <th>{{ 'Zmieniono'|trans }}</th>*/
/*                         <th>{{ 'Utworzono'|trans }}</th>*/
/*                     </tr>*/
/*                 {% set i=0 %}{% for object in objects %}{% set i=i+1 %}*/
/*                     <tr>*/
/*                         <td>{{ i+(pager.per_page*(pager.page-1)) }}</td>*/
/*                         <td><a href="{{ path('code_form', {'id': object.id})}}">{{object.name}}</a></td>*/
/*                         <td>{{ object.amount }}</td>*/
/*                         <td>{{ object.used }}</td>*/
/*                         <td>{% if object.product %}{{ (object.product.months/12~' lat')|trans }}{% else %}{% if object.months %} {{ (object.months/12~' lat')|trans }}{% else %}{{ 'Uniwersalne'|trans }}{% endif %}{% endif %}</td>*/
/*                         <td>{{object.updated|mydate}}</td>*/
/*                         <td>{{object.created|mydate}}</td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*             {{ pagination(pager)|raw }}*/
/*         {% else %}*/
/*             <p>{{ 'Nie ma dodanych grup kodów.'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/* */
/* {% endblock %}*/
