<?php

/* AppBundle:Page:index.html.twig */
class __TwigTemplate_5fc8539ab0412ddaef5f0423ca5b67866a193718883c486ce23b40cbfbc7e18a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Page:index.html.twig", 1);
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
        echo "<h1><i class=\"fa fa-newspaper-o\"></i>";
        if (((isset($context["ad"]) ? $context["ad"] : null) == 1)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wszystkie strony"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moje strony"), "html", null, true);
        }
        echo "</h1>";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    
    ";
        // line 8
        if ((( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader"))) && ((isset($context["ad"]) ? $context["ad"] : null) == 1))) {
            // line 9
            echo "    <div class=\"content\">
        ";
            // line 10
            echo $this->env->getExtension('app_extension')->drawFilters((isset($context["filters"]) ? $context["filters"] : null), (isset($context["filters_params"]) ? $context["filters_params"] : null));
            echo "    
    </div>
    ";
        }
        // line 13
        echo "
    <div class=\"content\">
        <div class=\"options\">
        <a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("page_form");
        echo "\" class=\"button\"><i class=\"fa fa-plus\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj stronę"), "html", null, true);
        echo "</a>
        ";
        // line 17
        if ((twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader")) && ((isset($context["ad"]) ? $context["ad"] : null) == 1))) {
            // line 18
            echo "            <a href=\"";
            echo $this->env->getExtension('routing')->getPath("page_type_list");
            echo "\" class=\"button\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Typy stron"), "html", null, true);
            echo "</a>
            <a href=\"";
            // line 19
            echo $this->env->getExtension('routing')->getPath("page_category_list");
            echo "\" class=\"button\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kategorie stron"), "html", null, true);
            echo "</a>
        ";
        }
        // line 20
        echo " 
        </div>
    </div>
    
    <div class=\"content\">
        ";
        // line 25
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 26
            echo "            ";
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
            
            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th>";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr"), "html", null, true);
            echo "</th>
                        <th>";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zdjęcie"), "html", null, true);
            echo "</th>
                        <th>";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opis"), "html", null, true);
            echo "</th>
                        <th>";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wygasa"), "html", null, true);
            echo "</th>
                        <th>";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Utworzono"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 36
            $context["i"] = 0;
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 37
                echo "                    <tr class=\"";
                if ( !$this->getAttribute($context["object"], "enabled", array())) {
                    echo "disabled";
                }
                echo "\">
                        <td>";
                // line 38
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "per_page", array()) * ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "page", array()) - 1))), "html", null, true);
                echo "</td>
                        <td><div class=\"avatar\" style=\"background-image:url('";
                // line 39
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "42x42", "file" => $this->getAttribute($context["object"], "avatar", array())))), "html", null, true);
                echo "');\"></div></td> 
                        <td><a href=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\" class=\"longtext tip\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object"], "translate", array(0 => $this->getAttribute($context["object"], "locale", array())), "method"), "name", array()), "html", null, true);
                echo "\">";
                if (($this->getAttribute($this->getAttribute($context["object"], "type", array()), "id", array()) == 1)) {
                    echo "<i class=\"fa fa-fw fa-user\"></i>";
                } elseif (($this->getAttribute($this->getAttribute($context["object"], "type", array()), "id", array()) == 2)) {
                    echo "<i class=\"fa fa-fw fa-map-marker\"></i>";
                }
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object"], "translate", array(0 => $this->getAttribute($context["object"], "locale", array())), "method"), "name", array()), "html", null, true);
                echo "</a></td>
                        <td>
                            ";
                // line 42
                if ( !$this->getAttribute($context["object"], "expired", array())) {
                    // line 43
                    echo "                                ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nieaktywna"), "html", null, true);
                    echo "
                            ";
                } else {
                    // line 45
                    echo "                                ";
                    if (($this->getAttribute($context["object"], "expired", array()) < $this->env->getExtension('app_extension')->nowObject())) {
                        // line 46
                        echo "                                    <span style=\"color:red;\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "expired", array())), "html", null, true);
                        echo "</span>
                                ";
                    } else {
                        // line 47
                        echo "   
                                    <span>";
                        // line 48
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "expired", array())), "html", null, true);
                        echo "</span>
                                ";
                    }
                    // line 50
                    echo "                            ";
                }
                // line 51
                echo "                        </td>
                        <td>";
                // line 52
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "created", array())), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "            </table></div>
            
            ";
            // line 57
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
        ";
        } else {
            // line 59
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie posiadasz dodanych stron. Możesz dodać stronę:"), "html", null, true);
            echo " <a href=\"";
            echo $this->env->getExtension('routing')->getPath("page_form");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("tutaj"), "html", null, true);
            echo "</a>.</p>
        ";
        }
        // line 61
        echo "    </div>
    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Page:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  217 => 61,  207 => 59,  202 => 57,  198 => 55,  189 => 52,  186 => 51,  183 => 50,  178 => 48,  175 => 47,  169 => 46,  166 => 45,  160 => 43,  158 => 42,  144 => 40,  140 => 39,  136 => 38,  129 => 37,  123 => 36,  118 => 34,  114 => 33,  110 => 32,  106 => 31,  102 => 30,  94 => 26,  92 => 25,  85 => 20,  78 => 19,  71 => 18,  69 => 17,  63 => 16,  58 => 13,  52 => 10,  49 => 9,  47 => 8,  44 => 7,  41 => 6,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-newspaper-o"></i>{% if ad==1 %}{{ 'Wszystkie strony'|trans }}{% else %}{{ 'Moje strony'|trans }}{% endif %}</h1>{% endblock %}*/
/* */
/* */
/* {% block content %}*/
/*     */
/*     {% if(app.user is not null and app.user.type in ['admin','worker','trader'] and ad==1 ) %}*/
/*     <div class="content">*/
/*         {{ filters(filters,filters_params)|raw }}    */
/*     </div>*/
/*     {% endif %}*/
/* */
/*     <div class="content">*/
/*         <div class="options">*/
/*         <a href="{{ path('page_form') }}" class="button"><i class="fa fa-plus"></i> {{ 'Dodaj stronę'|trans }}</a>*/
/*         {% if(app.user.type in ['admin','trader'] and ad==1) %}*/
/*             <a href="{{ path('page_type_list') }}" class="button">{{ 'Typy stron'|trans }}</a>*/
/*             <a href="{{ path('page_category_list') }}" class="button">{{ 'Kategorie stron'|trans }}</a>*/
/*         {% endif %} */
/*         </div>*/
/*     </div>*/
/*     */
/*     <div class="content">*/
/*         {% if objects %}*/
/*             {{ pagination(pager)|raw }}*/
/*             */
/*             <div class="table-wrapper"><table>*/
/*                     <tr>*/
/*                         <th>{{ 'Nr'|trans }}</th>*/
/*                         <th>{{ 'Zdjęcie'|trans }}</th>*/
/*                         <th>{{ 'Opis'|trans }}</th>*/
/*                         <th>{{ 'Wygasa'|trans }}</th>*/
/*                         <th>{{ 'Utworzono'|trans }}</th>*/
/*                     </tr>*/
/*                 {% set i=0 %}{% for object in objects %}{% set i=i+1 %}*/
/*                     <tr class="{% if( not object.enabled ) %}disabled{% endif %}">*/
/*                         <td>{{ i+(pager.per_page*(pager.page-1)) }}</td>*/
/*                         <td><div class="avatar" style="background-image:url('{{ path('thumbnail', {'resolution': '42x42', 'file': object.avatar })|production }}');"></div></td> */
/*                         <td><a href="{{ path('page_form', {'id': object.id}) }}" class="longtext tip" title="{{object.translate(object.locale).name}}">{% if(object.type.id==1) %}<i class="fa fa-fw fa-user"></i>{% elseif(object.type.id==2) %}<i class="fa fa-fw fa-map-marker"></i>{% endif %}{{object.translate(object.locale).name}}</a></td>*/
/*                         <td>*/
/*                             {% if( not object.expired ) %}*/
/*                                 {{ 'Nieaktywna'|trans }}*/
/*                             {% else %}*/
/*                                 {% if object.expired<nowObject() %}*/
/*                                     <span style="color:red;">{{ object.expired|mydate }}</span>*/
/*                                 {% else %}   */
/*                                     <span>{{ object.expired|mydate }}</span>*/
/*                                 {% endif %}*/
/*                             {% endif %}*/
/*                         </td>*/
/*                         <td>{{ object.created|mydate }}</td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*             */
/*             {{ pagination(pager)|raw }}*/
/*         {% else %}*/
/*             <p>{{ 'Nie posiadasz dodanych stron. Możesz dodać stronę:'|trans }} <a href="{{ path('page_form') }}">{{ 'tutaj'|trans }}</a>.</p>*/
/*         {% endif %}*/
/*     </div>*/
/*     */
/* {% endblock %}*/
