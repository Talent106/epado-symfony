<?php

/* AppBundle:User:index.html.twig */
class __TwigTemplate_0bd7380e65d5bca780807d47315faab77b1afebbb87b4a0fb632a4ddaa756386 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:User:index.html.twig", 1);
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
        echo "<h1><i class=\"fa fa-users\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Użytkownicy"), "html", null, true);
        echo "</h1>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    
    <div class=\"content\">
        ";
        // line 8
        echo $this->env->getExtension('app_extension')->drawFilters((isset($context["filters"]) ? $context["filters"] : null), (isset($context["filters_params"]) ? $context["filters_params"] : null));
        echo "    
    </div>
    
    <div class=\"content\">
        ";
        // line 17
        echo "        ";
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 18
            echo "            ";
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th>";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr"), "html", null, true);
            echo "</th>
                        <th>";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zdjęcie"), "html", null, true);
            echo "</th>
                        <th>";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Imię"), "html", null, true);
            echo "</th>
                        <th>";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwisko"), "html", null, true);
            echo "</th>
                        <th>";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Email"), "html", null, true);
            echo "</th>
                        <th><a href=\"";
            // line 26
            if (($this->getAttribute($this->getAttribute((isset($context["filters_params"]) ? $context["filters_params"] : null), "sort", array(), "any", false, true), "u.rating", array(), "array", true, true) && ($this->getAttribute($this->getAttribute((isset($context["filters_params"]) ? $context["filters_params"] : null), "sort", array()), "u.rating", array(), "array") == 1))) {
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("sort" => array("u.rating" => "0"))), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("sort" => array("u.rating" => "1"))), "html", null, true);
            }
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ocena"), "html", null, true);
            echo " ";
            if ($this->getAttribute($this->getAttribute((isset($context["filters_params"]) ? $context["filters_params"] : null), "sort", array(), "any", false, true), "u.rating", array(), "array", true, true)) {
                if (($this->getAttribute($this->getAttribute((isset($context["filters_params"]) ? $context["filters_params"] : null), "sort", array()), "u.rating", array(), "array") == 1)) {
                    echo "<i class=\"fa fa-sort-amount-desc\"></i>";
                } else {
                    echo "<i class=\"fa fa-sort-amount-asc\" ></i>";
                }
            } else {
                echo "<i class=\"fa fa-sort\" ></i>";
            }
            echo "</a></th>
                        
                        <th>";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Utworzono"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 30
            $context["i"] = 0;
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 31
                echo "                    <tr>
                        <td>";
                // line 32
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "per_page", array()) * ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "page", array()) - 1))), "html", null, true);
                echo "</td>
                        <td>";
                // line 33
                echo $this->env->getExtension('app_extension')->tabUser($context["object"]);
                echo "</td>
                        <td><a href=\"";
                // line 34
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "firstname", array()), "html", null, true);
                echo "</a></td>
                        <td><a href=\"";
                // line 35
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "lastname", array()), "html", null, true);
                echo "</a></td>
                        <td>";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "email", array()), "html", null, true);
                echo "<br>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "type", array()), "html", null, true);
                echo "</td>
                        <td>
                            ";
                // line 38
                if ($this->getAttribute($context["object"], "rating", array())) {
                    echo "    
                                <span class=\"tip\" title=\"";
                    // line 39
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Średnia ocena wykonawcy:"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "rating", array()), "html", null, true);
                    echo "\">
                                    <a href=\"";
                    // line 40
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contract_list", array("contractor_id" => $this->getAttribute($context["object"], "id", array()), "ad" => 1, "op_state" =>  -1)), "html", null, true);
                    echo "\">";
                    echo $this->env->getExtension('app_extension')->starsFilter($this->getAttribute($context["object"], "rating", array()));
                    echo "</a>
                                </span> 
                            ";
                } else {
                    // line 42
                    echo " 
                                -
                            ";
                }
                // line 44
                echo "      
                        </td>
                        <td>";
                // line 46
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "created", array())), "html", null, true);
                echo "</td> 
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "            </table></div>
            ";
            // line 50
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
        ";
        } else {
            // line 52
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie ma użytkowników."), "html", null, true);
            echo "</p>
        ";
        }
        // line 54
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:User:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 54,  187 => 52,  182 => 50,  179 => 49,  170 => 46,  166 => 44,  161 => 42,  153 => 40,  147 => 39,  143 => 38,  136 => 36,  130 => 35,  124 => 34,  120 => 33,  116 => 32,  113 => 31,  107 => 30,  102 => 28,  81 => 26,  77 => 25,  73 => 24,  69 => 23,  65 => 22,  61 => 21,  54 => 18,  51 => 17,  44 => 8,  40 => 6,  37 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-users"></i>{{ 'Użytkownicy'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/*     <div class="content">*/
/*         {{ filters(filters,filters_params)|raw }}    */
/*     </div>*/
/*     */
/*     <div class="content">*/
/*         {#*/
/*         <div class="options">*/
/*             <a href="{{ path('user_form') }}" class="button">Dodaj użytkownika</a>*/
/*         </div>*/
/*         #}*/
/*         {% if objects %}*/
/*             {{ pagination(pager)|raw }}*/
/*             <div class="table-wrapper"><table>*/
/*                     <tr>*/
/*                         <th>{{ 'Nr'|trans }}</th>*/
/*                         <th>{{ 'Zdjęcie'|trans }}</th>*/
/*                         <th>{{ 'Imię'|trans }}</th>*/
/*                         <th>{{ 'Nazwisko'|trans }}</th>*/
/*                         <th>{{ 'Email'|trans }}</th>*/
/*                         <th><a href="{% if filters_params.sort['u.rating'] is defined and filters_params.sort['u.rating']==1 %}{{extend({'sort':{'u.rating':'0'}})}}{%else%}{{extend({'sort':{'u.rating':'1'}})}}{%endif%}">{{ 'Ocena'|trans }} {% if filters_params.sort['u.rating'] is defined %}{% if filters_params.sort['u.rating']==1 %}<i class="fa fa-sort-amount-desc"></i>{%else%}<i class="fa fa-sort-amount-asc" ></i>{%endif%}{%else%}<i class="fa fa-sort" ></i>{%endif%}</a></th>*/
/*                         */
/*                         <th>{{ 'Utworzono'|trans }}</th>*/
/*                     </tr>*/
/*                 {% set i=0 %}{% for object in objects %}{% set i=i+1 %}*/
/*                     <tr>*/
/*                         <td>{{ i+(pager.per_page*(pager.page-1)) }}</td>*/
/*                         <td>{{ tabUser(object)|raw }}</td>*/
/*                         <td><a href="{{ path('user_form', {'id': object.id})}}">{{object.firstname}}</a></td>*/
/*                         <td><a href="{{ path('user_form', {'id': object.id})}}">{{object.lastname}}</a></td>*/
/*                         <td>{{object.email}}<br>{{object.type}}</td>*/
/*                         <td>*/
/*                             {% if( object.rating) %}    */
/*                                 <span class="tip" title="{{ 'Średnia ocena wykonawcy:'|trans }} {{object.rating}}">*/
/*                                     <a href="{{ path('contract_list', {'contractor_id': object.id, 'ad':1,'op_state':-1})}}">{{ object.rating|stars|raw }}</a>*/
/*                                 </span> */
/*                             {% else %} */
/*                                 -*/
/*                             {% endif %}      */
/*                         </td>*/
/*                         <td>{{object.created|mydate}}</td> */
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*             {{ pagination(pager)|raw }}*/
/*         {% else %}*/
/*             <p>{{ 'Nie ma użytkowników.'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/* */
/* {% endblock %}*/
