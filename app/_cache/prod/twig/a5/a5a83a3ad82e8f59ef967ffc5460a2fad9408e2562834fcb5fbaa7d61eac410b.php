<?php

/* AppBundle:Message:questions.html.twig */
class __TwigTemplate_275eeabd61beda9037f424e184d526a23a66d539ce31f9cafefb25c1ea6ed048 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Message:questions.html.twig", 1);
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
        echo "<h1><i class=\"fa fa-question-circle\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zapytania i opinie"), "html", null, true);
        echo "</h1>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    
    <div class=\"content\">
        <p>";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pojawiają się tu zapytania od klientów, w przypadku odpowiedzi na jedno z zapytań zostanie ono przeniesione do Twojego folderu z wiadomościami gdzie będzie można kontynuować korespondencję z klientem."), "html", null, true);
        echo "</p>
    </div>

    <div class=\"content\">  
        ";
        // line 13
        if ((isset($context["objects"]) ? $context["objects"] : null)) {
            // line 14
            echo "            ";
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
            <div class=\"table-wrapper\"><table>
                    <tr>
                        <th colspan=\"2\">";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoba"), "html", null, true);
            echo "</th>
                        <th>";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Temat"), "html", null, true);
            echo "</th>
                        <th>";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zmieniono"), "html", null, true);
            echo "</th>
                    </tr>
                ";
            // line 21
            $context["i"] = 0;
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["objects"]) ? $context["objects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 22
                echo "                    <tr class=\"";
                if ((($this->getAttribute($context["object"], "updater", array()) != $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) && (null === $this->getAttribute($context["object"], "read", array())))) {
                    echo "unread";
                }
                echo "\">
                        <td>
   
                           ";
                // line 25
                if ($this->getAttribute($context["object"], "creator", array())) {
                    echo $this->env->getExtension('app_extension')->tabUser($this->getAttribute($context["object"], "creator", array()));
                } else {
                    echo $this->env->getExtension('app_extension')->tabUser($this->getAttribute($context["object"], "recipient", array()));
                }
                echo " 
                    
                        </td>
                        <td>
                            <a href=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("message_form", array("id" => $this->getAttribute($context["object"], "id", array()))), "html", null, true);
                echo "\">   
                            ";
                // line 30
                if ($this->getAttribute($context["object"], "creator", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object"], "creator", array()), "firstname", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object"], "creator", array()), "lastname", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object"], "recipient", array()), "firstname", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object"], "recipient", array()), "lastname", array()), "html", null, true);
                }
                echo "    
                            </a>
                            </td>
                        <td>";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($context["object"], "subject", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 34
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["object"], "updated", array())), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "            </table></div>
            ";
            // line 38
            echo $this->env->getExtension('app_extension')->drawPagination((isset($context["pager"]) ? $context["pager"] : null));
            echo "
        ";
        } else {
            // line 40
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie masz wiadomości."), "html", null, true);
            echo "</p>
        ";
        }
        // line 42
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Message:questions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 42,  139 => 40,  134 => 38,  131 => 37,  122 => 34,  118 => 33,  104 => 30,  100 => 29,  89 => 25,  80 => 22,  74 => 21,  69 => 19,  65 => 18,  61 => 17,  54 => 14,  52 => 13,  45 => 9,  40 => 6,  37 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* {% block header %}<h1><i class="fa fa-question-circle"></i>{{ 'Zapytania i opinie'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     */
/*     <div class="content">*/
/*         <p>{{ 'Pojawiają się tu zapytania od klientów, w przypadku odpowiedzi na jedno z zapytań zostanie ono przeniesione do Twojego folderu z wiadomościami gdzie będzie można kontynuować korespondencję z klientem.'|trans }}</p>*/
/*     </div>*/
/* */
/*     <div class="content">  */
/*         {% if objects %}*/
/*             {{ pagination(pager)|raw }}*/
/*             <div class="table-wrapper"><table>*/
/*                     <tr>*/
/*                         <th colspan="2">{{ 'Osoba'|trans }}</th>*/
/*                         <th>{{ 'Temat'|trans }}</th>*/
/*                         <th>{{ 'Zmieniono'|trans }}</th>*/
/*                     </tr>*/
/*                 {% set i=0 %}{% for object in objects %}{% set i=i+1 %}*/
/*                     <tr class="{% if object.updater != app.user and object.read is null %}unread{% endif %}">*/
/*                         <td>*/
/*    */
/*                            {% if object.creator %}{{ tabUser(object.creator)|raw }}{% else %}{{ tabUser(object.recipient)|raw }}{% endif %} */
/*                     */
/*                         </td>*/
/*                         <td>*/
/*                             <a href="{{ path('message_form', {'id': object.id})}}">   */
/*                             {% if object.creator %}{{ object.creator.firstname }} {{ object.creator.lastname }}{% else %}{{ object.recipient.firstname }} {{ object.recipient.lastname }}{% endif %}    */
/*                             </a>*/
/*                             </td>*/
/*                         <td>{{object.subject}}</td>*/
/*                         <td>{{object.updated|mydate}}</td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*             </table></div>*/
/*             {{ pagination(pager)|raw }}*/
/*         {% else %}*/
/*             <p>{{ 'Nie masz wiadomości.'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/* */
/* {% endblock %}*/
