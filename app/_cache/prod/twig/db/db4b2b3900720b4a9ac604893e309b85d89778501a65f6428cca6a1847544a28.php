<?php

/* AppBundle:Order:index.html.twig */
class __TwigTemplate_ee01f6c7d1fd0e0058193ab80d6e824b3a6301fd1f13bb9c13a615979400e41c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Order:index.html.twig", 1);
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
        echo "<h1><i class=\"fa fa-shopping-cart\"></i>";
        if (((isset($context["ad"]) ? $context["ad"] : null) == 1)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienia do realizacji"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienia"), "html", null, true);
        }
        echo "</h1>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if ((twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin")) && ((isset($context["ad"]) ? $context["ad"] : null) == 1))) {
            // line 7
            echo "    <div class=\"content\">
        <div class=\"options\">
            ";
            // line 9
            if (twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin"))) {
                // line 10
                echo "            <a href=\"";
                echo $this->env->getExtension('routing')->getPath("order_status_list");
                echo "\" class=\"button\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Statusy"), "html", null, true);
                echo "</a>
            ";
            }
            // line 12
            echo "            
        </div>
    </div>
    ";
        }
        // line 16
        echo "    
    ";
        // line 17
        if ((( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader"))) && ((isset($context["ad"]) ? $context["ad"] : null) == 1))) {
            // line 18
            echo "    <div class=\"content\">
        ";
            // line 19
            echo $this->env->getExtension('app_extension')->drawFilters((isset($context["filters"]) ? $context["filters"] : null), (isset($context["filters_params"]) ? $context["filters_params"] : null));
            echo "    
    </div>
    ";
        }
        // line 22
        echo "         
    
    <div class=\"content\">  
        
        ";
        // line 26
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 27
            echo "            ";
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
            
            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th>";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Lp"), "html", null, true);
            echo "</th>
                        <th>";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
            echo "</th>
                        <th>";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kupujący"), "html", null, true);
            echo "</th>
                        <th>";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cena"), "html", null, true);
            echo "</th>
                        ";
            // line 35
            if ((( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader"))) && ((isset($context["ad"]) ? $context["ad"] : null) == 1))) {
                echo "<th>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Stan"), "html", null, true);
                echo "</th>";
            }
            // line 36
            echo "                        <th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Status"), "html", null, true);
            echo "</th>
                        <th>";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Utworzono"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 39
            $context["i"] = 0;
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 40
                echo "                    <tr class=\"";
                if ($this->getAttribute($context["object"], "canceled", array())) {
                    echo "canceled ";
                } elseif ($this->getAttribute($context["object"], "done", array())) {
                    echo "done ";
                } elseif ($this->getAttribute($context["object"], "confirmed", array())) {
                    echo "confirmed ";
                }
                echo "\" >
                        <td>";
                // line 41
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "per_page", array()) * ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "page", array()) - 1))), "html", null, true);
                echo "</td>
                        
                        <td><a href=\"";
                // line 43
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\">
                                ";
                // line 44
                if ($this->getAttribute($context["object"], "confirmed", array())) {
                    // line 45
                    echo "                                ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienie nr"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "id", array()), "html", null, true);
                    echo "
                                ";
                } else {
                    // line 47
                    echo "                                ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Koszyk"), "html", null, true);
                    echo "
                                ";
                }
                // line 49
                echo "                            </a></td>
                            
                            
                        <td>";
                // line 52
                echo $this->env->getExtension('app_extension')->tabUser($this->getAttribute($context["object"], "creator", array()));
                echo "</td>
                        <td><span class=\"tip\" title=\"";
                // line 53
                if ($this->getAttribute($context["object"], "paid", array())) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opłacone"), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nieopłacone"), "html", null, true);
                }
                echo "\" style=\"";
                if ($this->getAttribute($context["object"], "paid", array())) {
                    echo "color:green;";
                } else {
                    echo "color:red;";
                }
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($context["object"], "price", array()), $this->getAttribute($context["object"], "currency", array())), "html", null, true);
                echo "</span></td>
                        ";
                // line 54
                if ((( !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader"))) && ((isset($context["ad"]) ? $context["ad"] : null) == 1))) {
                    echo "<td class=\"tip\" title=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Data stanu"), "html", null, true);
                    echo ": ";
                    if ($this->getAttribute($context["object"], "canceled", array())) {
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "canceled", array())), "html", null, true);
                    } elseif ($this->getAttribute($context["object"], "done", array())) {
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "done", array())), "html", null, true);
                    } elseif ($this->getAttribute($context["object"], "confirmed", array())) {
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "confirmed", array())), "html", null, true);
                    } else {
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "created", array())), "html", null, true);
                    }
                    echo "\">";
                    if ($this->getAttribute($context["object"], "canceled", array())) {
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Anulowane"), "html", null, true);
                        echo " ";
                    } elseif ($this->getAttribute($context["object"], "done", array())) {
                        echo "Zrealizowane ";
                    } elseif ($this->getAttribute($context["object"], "confirmed", array())) {
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Potwierdzone"), "html", null, true);
                        echo " ";
                    } else {
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Koszyk"), "html", null, true);
                        echo " ";
                    }
                    echo "</td>";
                }
                // line 55
                echo "                        <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "currentstatus", array()), "html", null, true);
                echo "</td>
                        <td class=\"tip\" title=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "created", array()), "d.m.Y H:i:s"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "created", array())), "html", null, true);
                echo "</td>
                        
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "            </table></div>
            
            ";
            // line 62
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
        ";
        } else {
            // line 64
            echo "            ";
            if (((isset($context["ad"]) ? $context["ad"] : null) == 1)) {
                // line 65
                echo "            <p>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie odnaleziono żadnych zamówień"), "html", null, true);
                echo "</p>
            ";
            } else {
                // line 66
                echo "    
            <p>";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie posiadasz żadnych zamówień. Możesz zamówić produkty lub usługi Epado na jednej ze swoich stron lub na stronach dodanych przez inne osoby. Nową stronę możesz dodać w zakładce Moje strony."), "html", null, true);
                echo "</p>
            ";
            }
            // line 69
            echo "        ";
        }
        echo "    
    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Order:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 69,  263 => 67,  260 => 66,  254 => 65,  251 => 64,  246 => 62,  242 => 60,  230 => 56,  225 => 55,  196 => 54,  180 => 53,  176 => 52,  171 => 49,  165 => 47,  157 => 45,  155 => 44,  151 => 43,  146 => 41,  135 => 40,  129 => 39,  124 => 37,  119 => 36,  113 => 35,  109 => 34,  105 => 33,  101 => 32,  97 => 31,  89 => 27,  87 => 26,  81 => 22,  75 => 19,  72 => 18,  70 => 17,  67 => 16,  61 => 12,  53 => 10,  51 => 9,  47 => 7,  44 => 6,  41 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-shopping-cart"></i>{% if ad==1 %}{{ 'Zamówienia do realizacji'|trans }}{% else %}{{ 'Zamówienia'|trans }}{% endif %}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     {% if(app.user.type in ['admin'] and ad==1 ) %}*/
/*     <div class="content">*/
/*         <div class="options">*/
/*             {% if(app.user.type in ['admin'] ) %}*/
/*             <a href="{{ path('order_status_list') }}" class="button">{{ 'Statusy'|trans }}</a>*/
/*             {% endif %}*/
/*             */
/*         </div>*/
/*     </div>*/
/*     {% endif %}*/
/*     */
/*     {% if(app.user is not null and app.user.type in ['admin','worker','trader'] and ad==1 ) %}*/
/*     <div class="content">*/
/*         {{ filters(filters,filters_params)|raw }}    */
/*     </div>*/
/*     {% endif %}*/
/*          */
/*     */
/*     <div class="content">  */
/*         */
/*         {% if objects %}*/
/*             {{ pagination(pager)|raw }}*/
/*             */
/*             <div class="table-wrapper"><table>*/
/*                     <tr>*/
/*                         <th>{{ 'Lp'|trans }}</th>*/
/*                         <th>{{ 'Nazwa'|trans }}</th>*/
/*                         <th>{{ 'Kupujący'|trans }}</th>*/
/*                         <th>{{ 'Cena'|trans }}</th>*/
/*                         {% if(app.user is not null and app.user.type in ['admin','worker','trader'] and ad==1 ) %}<th>{{ 'Stan'|trans }}</th>{% endif %}*/
/*                         <th>{{ 'Status'|trans }}</th>*/
/*                         <th>{{ 'Utworzono'|trans }}</th>*/
/*                     </tr>*/
/*                 {% set i=0 %}{% for object in objects %}{% set i=i+1 %}*/
/*                     <tr class="{% if(object.canceled) %}canceled {% elseif(object.done) %}done {% elseif(object.confirmed) %}confirmed {% endif %}" >*/
/*                         <td>{{ i+(pager.per_page*(pager.page-1)) }}</td>*/
/*                         */
/*                         <td><a href="{{ path('order_form', {'id': object.id})}}">*/
/*                                 {% if(object.confirmed) %}*/
/*                                 {{ 'Zamówienie nr'|trans }} {{object.id}}*/
/*                                 {% else %}*/
/*                                 {{ 'Koszyk'|trans }}*/
/*                                 {% endif %}*/
/*                             </a></td>*/
/*                             */
/*                             */
/*                         <td>{{ tabUser(object.creator)|raw }}</td>*/
/*                         <td><span class="tip" title="{% if(object.paid) %}{{ 'Opłacone'|trans }}{% else %}{{ 'Nieopłacone'|trans }}{% endif %}" style="{% if(object.paid) %}color:green;{% else %}color:red;{% endif %}">{{ object.price|price(object.currency) }}</span></td>*/
/*                         {% if(app.user is not null and app.user.type in ['admin','worker','trader'] and ad==1 ) %}<td class="tip" title="{{ 'Data stanu'|trans }}: {% if(object.canceled) %}{{object.canceled|mydate}}{% elseif(object.done) %}{{object.done|mydate}}{% elseif(object.confirmed) %}{{object.confirmed|mydate}}{% else %}{{object.created|mydate}}{% endif %}">{% if(object.canceled) %}{{ 'Anulowane'|trans }} {% elseif(object.done) %}Zrealizowane {% elseif(object.confirmed) %}{{ 'Potwierdzone'|trans }} {% else %}{{ 'Koszyk'|trans }} {% endif %}</td>{% endif %}*/
/*                         <td>{{object.currentstatus}}</td>*/
/*                         <td class="tip" title="{{object.created|mydate('d.m.Y H:i:s')}}">{{object.created|mydate}}</td>*/
/*                         */
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*             */
/*             {{ pagination(pager)|raw }}*/
/*         {% else %}*/
/*             {% if(ad==1 ) %}*/
/*             <p>{{ 'Nie odnaleziono żadnych zamówień'|trans }}</p>*/
/*             {% else %}    */
/*             <p>{{ 'Nie posiadasz żadnych zamówień. Możesz zamówić produkty lub usługi Epado na jednej ze swoich stron lub na stronach dodanych przez inne osoby. Nową stronę możesz dodać w zakładce Moje strony.'|trans }}</p>*/
/*             {% endif %}*/
/*         {% endif %}    */
/*     </div>*/
/* */
/* {% endblock %}*/
