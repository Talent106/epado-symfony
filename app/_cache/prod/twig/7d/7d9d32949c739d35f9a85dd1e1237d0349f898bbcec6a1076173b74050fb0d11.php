<?php

/* AppBundle:Order:indexContract.html.twig */
class __TwigTemplate_39d1ce701546b0e7c3d0fedfc9176dfec5c21265cc0331cd288a766b248fb6cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Order:indexContract.html.twig", 1);
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
        echo "<h1><i class=\"fa fa-fire\"></i>";
        if (((isset($context["ad"]) ? $context["ad"] : null) == 1)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usługi do wykonania"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówione usługi"), "html", null, true);
        }
        echo "</h1>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    
    ";
        // line 8
        echo "    <div class=\"content\">
        ";
        // line 9
        echo $this->env->getExtension('app_extension')->drawFilters((isset($context["filters"]) ? $context["filters"] : null), (isset($context["filters_params"]) ? $context["filters_params"] : null));
        echo "    
    </div>
    ";
        // line 12
        echo "         
    
    <div class=\"content\">  
        
        ";
        // line 16
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 17
            echo "            ";
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
            
            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th>";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Lp"), "html", null, true);
            echo "</th>
                        <th>";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr"), "html", null, true);
            echo "</th>
                        <th>";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
            echo "</th>
                        <th colspan=\"2\">";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kupujący i wykonawca"), "html", null, true);
            echo "</th>
                        ";
            // line 26
            echo "                        <th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Data wykonania"), "html", null, true);
            echo "</th>
                        
                        <th><a href=\"";
            // line 28
            if (($this->getAttribute($this->getAttribute((isset($context["filters_params"]) ? $context["filters_params"] : null), "sort", array(), "any", false, true), "op.rating", array(), "array", true, true) && ($this->getAttribute($this->getAttribute((isset($context["filters_params"]) ? $context["filters_params"] : null), "sort", array()), "op.rating", array(), "array") == 1))) {
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("sort" => array("op.rating" => "0"))), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("sort" => array("op.rating" => "1"))), "html", null, true);
            }
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ocena"), "html", null, true);
            echo " ";
            if ($this->getAttribute($this->getAttribute((isset($context["filters_params"]) ? $context["filters_params"] : null), "sort", array(), "any", false, true), "op.rating", array(), "array", true, true)) {
                if (($this->getAttribute($this->getAttribute((isset($context["filters_params"]) ? $context["filters_params"] : null), "sort", array()), "op.rating", array(), "array") == 1)) {
                    echo "<i class=\"fa fa-sort-amount-desc\"></i>";
                } else {
                    echo "<i class=\"fa fa-sort-amount-asc\" ></i>";
                }
            } else {
                echo "<i class=\"fa fa-sort\" ></i>";
            }
            echo "</a></th>
                        <th>";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Utworzono"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 31
            $context["i"] = 0;
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 32
                echo "                    <tr class=\"";
                if ($this->getAttribute($this->getAttribute($context["object"], "order", array()), "canceled", array())) {
                    echo "canceled ";
                } elseif ($this->getAttribute($this->getAttribute($context["object"], "order", array()), "done", array())) {
                    echo "done ";
                } elseif ($this->getAttribute($this->getAttribute($context["object"], "order", array()), "confirmed", array())) {
                    echo "confirmed ";
                }
                echo "\" >
                        <td>";
                // line 33
                echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : null) + ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "per_page", array()) * ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : null), "page", array()) - 1))), "html", null, true);
                echo "</td>
                        <td  class=\"tip\" title=\"Pochodzi z zamówienia nr: ";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object"], "order", array()), "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "id", array()), "html", null, true);
                echo "</td>
                        <td class=\"tip\" title=\"Pochodzi z zamówienia nr: ";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object"], "order", array()), "id", array()), "html", null, true);
                echo "\">
                            <a href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contract_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object"], "product", array()), "name", array()), "html", null, true);
                echo "</a><br>
                            ";
                // line 54
                echo "                        </td>
                            
                            
                        <td>";
                // line 57
                echo $this->env->getExtension('app_extension')->tabUser($this->getAttribute($this->getAttribute($context["object"], "order", array()), "buyer", array()));
                echo "</td>
                        <td>";
                // line 58
                if ( !(null === $this->getAttribute($context["object"], "contractor", array()))) {
                    echo $this->env->getExtension('app_extension')->tabUser($this->getAttribute($context["object"], "contractor", array()));
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Brak"), "html", null, true);
                }
                echo "</td>
                        ";
                // line 60
                echo "                        <td>
                                ";
                // line 61
                echo $this->env->getExtension('app_extension')->dateornotFilter($this->getAttribute($context["object"], "contractorconfirmed", array()), "d.m.Y");
                echo " 
                                
                        </td>
                        <td>
                            ";
                // line 65
                if ($this->getAttribute($context["object"], "rating", array())) {
                    echo "    
                                <span class=\"tip\" ";
                    // line 66
                    if ($this->getAttribute($context["object"], "review", array())) {
                        echo "title=\"Komentarz: ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "review", array()), "html", null, true);
                        echo "\"";
                    } else {
                        echo "title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Brak komentarza"), "html", null, true);
                        echo "\"";
                    }
                    echo ">
                                    ";
                    // line 67
                    echo $this->env->getExtension('app_extension')->starsFilter(twig_number_format_filter($this->env, $this->getAttribute($context["object"], "rating", array()), 0));
                    echo "
                                </span> 
                            ";
                } else {
                    // line 69
                    echo " 
                                -
                            ";
                }
                // line 71
                echo "      
                        </td>
                        
                        <td class=\"tip\" title=\"";
                // line 74
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
            // line 78
            echo "            </table></div>
            
            ";
            // line 80
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
        ";
        } else {
            // line 82
            echo "            ";
            if (((isset($context["ad"]) ? $context["ad"] : null) == 1)) {
                // line 83
                echo "            <p>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie odnaleziono żadnych zamówień. Zmień ustawienia filtra."), "html", null, true);
                echo "</p>
            ";
            } else {
                // line 84
                echo "    
            <p>";
                // line 85
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie posiadasz żadnych usług które wymagają realizacji."), "html", null, true);
                echo "</p>
            ";
            }
            // line 87
            echo "            
        ";
        }
        // line 89
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Order:indexContract.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  256 => 89,  252 => 87,  247 => 85,  244 => 84,  238 => 83,  235 => 82,  230 => 80,  226 => 78,  214 => 74,  209 => 71,  204 => 69,  198 => 67,  186 => 66,  182 => 65,  175 => 61,  172 => 60,  164 => 58,  160 => 57,  155 => 54,  149 => 36,  145 => 35,  139 => 34,  135 => 33,  124 => 32,  118 => 31,  113 => 29,  93 => 28,  87 => 26,  83 => 24,  79 => 23,  75 => 22,  71 => 21,  63 => 17,  61 => 16,  55 => 12,  50 => 9,  47 => 8,  44 => 6,  41 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-fire"></i>{% if ad==1 %}{{ 'Usługi do wykonania'|trans }}{% else %}{{ 'Zamówione usługi'|trans }}{% endif %}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/*     {#{% if(app.user is not null and app.user.type in ['admin','worker','trader'] ) %}#}*/
/*     <div class="content">*/
/*         {{ filters(filters,filters_params)|raw }}    */
/*     </div>*/
/*     {#{% endif %}#}*/
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
/*                         <th>{{ 'Nr'|trans }}</th>*/
/*                         <th>{{ 'Nazwa'|trans }}</th>*/
/*                         <th colspan="2">{{ 'Kupujący i wykonawca'|trans }}</th>*/
/*                         {#<th>{{ 'Cena'|trans }}</th>#}*/
/*                         <th>{{ 'Data wykonania'|trans }}</th>*/
/*                         */
/*                         <th><a href="{% if filters_params.sort['op.rating'] is defined and filters_params.sort['op.rating']==1 %}{{extend({'sort':{'op.rating':'0'}})}}{%else%}{{extend({'sort':{'op.rating':'1'}})}}{%endif%}">{{ 'Ocena'|trans }} {% if filters_params.sort['op.rating'] is defined %}{% if filters_params.sort['op.rating']==1 %}<i class="fa fa-sort-amount-desc"></i>{%else%}<i class="fa fa-sort-amount-asc" ></i>{%endif%}{%else%}<i class="fa fa-sort" ></i>{%endif%}</a></th>*/
/*                         <th>{{ 'Utworzono'|trans }}</th>*/
/*                     </tr>*/
/*                 {% set i=0 %}{% for object in objects %}{% set i=i+1 %}*/
/*                     <tr class="{% if(object.order.canceled) %}canceled {% elseif(object.order.done) %}done {% elseif(object.order.confirmed) %}confirmed {% endif %}" >*/
/*                         <td>{{ i+(pager.per_page*(pager.page-1)) }}</td>*/
/*                         <td  class="tip" title="Pochodzi z zamówienia nr: {{object.order.id}}">{{ object.id }}</td>*/
/*                         <td class="tip" title="Pochodzi z zamówienia nr: {{object.order.id}}">*/
/*                             <a href="{{ path('contract_form', {'id': object.id})}}">{{ object.product.name }}</a><br>*/
/*                             {#{% if(app.user.type in ['admin','trader','worker'])  %}*/
/*                                 {% if(object.order.confirmed) %}*/
/*                                 <a href="{{ path('order_form', {'id': object.order.id})}}" class="">Zamówienie nr {{object.order.id}}</a>*/
/*                                 {% else %}*/
/*                                 <a href="{{ path('order_form', {'id': object.order.id})}}">Koszyk</a>*/
/*                                 {% endif %}*/
/*                                 <div class="long">Usługa: <a href="{{ path('product_form',{'id':object.product.id}) }}">{{ object.product.name }}</a></div>*/
/*                                 <div class="long">Strona: <a href="{{ path('page_form',{'id':object.page.id}) }}">{{ object.page.name }}</a></div>  */
/*                             {% else %}*/
/*                                 {% if(object.order.confirmed) %}*/
/*                                 Zamówienie nr {{object.order.id}}*/
/*                                 {% else %}*/
/*                                 Koszyk*/
/*                                 {% endif %}*/
/*                                 <div class="long">Usługa: {{ object.product.name }}</div>*/
/*                                 <div class="long">Strona: {{ object.page.name }}</div>  */
/*                             {% endif %}#}*/
/*                         </td>*/
/*                             */
/*                             */
/*                         <td>{{ tabUser(object.order.buyer)|raw }}</td>*/
/*                         <td>{% if object.contractor is not null %}{{ tabUser(object.contractor)|raw }}{% else %}{{ 'Brak'|trans }}{% endif %}</td>*/
/*                         {#<td><span class="tip" title="{% if(object.order.paid) %}Opłacone{% else %}Nieopłacone{% endif %}" style="{% if(object.order.paid) %}color:green;{% else %}color:red;{% endif %}">{{ object.price|price(object.order.currency) }}</span></td>#}*/
/*                         <td>*/
/*                                 {{ object.contractorconfirmed|dateornot('d.m.Y')|raw }} */
/*                                 */
/*                         </td>*/
/*                         <td>*/
/*                             {% if( object.rating) %}    */
/*                                 <span class="tip" {% if( object.review) %}title="Komentarz: {{object.review}}"{% else %}title="{{ 'Brak komentarza'|trans }}"{% endif %}>*/
/*                                     {{ object.rating|number_format(0)|stars|raw }}*/
/*                                 </span> */
/*                             {% else %} */
/*                                 -*/
/*                             {% endif %}      */
/*                         </td>*/
/*                         */
/*                         <td class="tip" title="{{object.created|mydate('d.m.Y H:i:s')}}">{{object.created|mydate}}</td>*/
/*                         */
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*             */
/*             {{ pagination(pager)|raw }}*/
/*         {% else %}*/
/*             {% if(ad==1 ) %}*/
/*             <p>{{ 'Nie odnaleziono żadnych zamówień. Zmień ustawienia filtra.'|trans }}</p>*/
/*             {% else %}    */
/*             <p>{{ 'Nie posiadasz żadnych usług które wymagają realizacji.'|trans }}</p>*/
/*             {% endif %}*/
/*             */
/*         {% endif %}*/
/*     </div>*/
/* */
/* {% endblock %}*/
