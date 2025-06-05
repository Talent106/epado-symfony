<?php

/* AppBundle:Public:search.html.twig */
class __TwigTemplate_05c59bf90c1637770d9d03f251310af8a7af950f2d2649577ba5c0bed237cc5e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("empty.html.twig", "AppBundle:Public:search.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "empty.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    ";
        // line 5
        if (((isset($context["people"]) ? $context["people"] : null) > 0)) {
            // line 6
            echo "    <h4><i class=\"fa fa-fw fa-user\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoby zmarłe"), "html", null, true);
            echo "</h4>

    <div class=\"pages\">
        ";
            // line 9
            if ((twig_length_filter($this->env, (isset($context["pages_people"]) ? $context["pages_people"] : null)) > 0)) {
                // line 10
                echo "            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["pages_people"]) ? $context["pages_people"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["fa"]) {
                    // line 11
                    echo "            ";
                    if (($this->getAttribute($this->getAttribute($context["fa"], "type", array()), "id", array()) == 1)) {
                        echo "    
            <div class=\"element\">  
                <a href=\"";
                        // line 13
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->pageUrl($this->getAttribute($context["fa"], "code", array())), "html", null, true);
                        echo "\">
                <div class=\"avatar\" style=\"background-image:url('";
                        // line 14
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "60x60", "file" => $this->getAttribute($context["fa"], "avatar", array())))), "html", null, true);
                        echo "');\"></div>    

                <p class=\"name\">
                    <i class=\"fa fa-eye\"></i>
                    ";
                        // line 18
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["fa"], "translate", array(0 => $this->getAttribute($context["fa"], "locale", array())), "method"), "name", array()), "html", null, true);
                        echo "
                    <span>";
                        // line 19
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["fa"], "begin", array())), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["fa"], "end", array())), "html", null, true);
                        echo ", ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["fa"], "address", array()), "city", array()), "html", null, true);
                        echo "</span>
                </p>
                </a>
            </div>
            ";
                    }
                    // line 23
                    echo "   
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fa'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 25
                echo "        ";
            }
            // line 26
            echo "    </div>
    ";
        }
        // line 28
        echo "    
    

    ";
        // line 31
        if (((isset($context["places"]) ? $context["places"] : null) > 0)) {
            // line 32
            echo "    <h4><i class=\"fa fa-fw fa-map\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Miejsca"), "html", null, true);
            echo "</h4>

    <div class=\"pages\">
        ";
            // line 35
            if ((twig_length_filter($this->env, (isset($context["pages_places"]) ? $context["pages_places"] : null)) > 0)) {
                // line 36
                echo "            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["pages_places"]) ? $context["pages_places"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["fa"]) {
                    // line 37
                    echo "            ";
                    if (($this->getAttribute($this->getAttribute($context["fa"], "type", array()), "id", array()) == 2)) {
                        echo "     
            <div class=\"element\">  
                <a href=\"";
                        // line 39
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->pageUrl($this->getAttribute($context["fa"], "code", array())), "html", null, true);
                        echo "\">
                ";
                        // line 40
                        if ( !(null === $this->getAttribute($context["fa"], "image", array()))) {
                            echo "   
                <div class=\"avatar\" style=\"background-image:url('";
                            // line 41
                            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "60x60", "file" => $this->getAttribute($context["fa"], "avatar", array())))), "html", null, true);
                            echo "');\"></div>    
                ";
                        } else {
                            // line 43
                            echo "                <div class=\"avatar\" style=\"";
                            echo "\"><i class=\"fa fa-map-marker\"></i></div>    
                ";
                        }
                        // line 45
                        echo "                <p class=\"name\">
                    <i class=\"fa fa-eye\"></i>
                    ";
                        // line 47
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["fa"], "translate", array(0 => $this->getAttribute($context["fa"], "locale", array())), "method"), "name", array()), "html", null, true);
                        echo "
                    <span>";
                        // line 48
                        if ( !$this->getAttribute($context["fa"], "begin", array())) {
                            echo twig_escape_filter($this->env, $this->getAttribute($context["fa"], "beginyear", array()), "html", null, true);
                        } else {
                            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["fa"], "begin", array())), "html", null, true);
                        }
                        echo ", ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["fa"], "address", array()), "city", array()), "html", null, true);
                        echo "</span>
                </p>
                </a>
            </div>
            ";
                    }
                    // line 52
                    echo "   
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fa'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 54
                echo "        ";
            }
            // line 55
            echo "    </div>
    ";
        }
        // line 57
        echo "    
    
    <h4><i class=\"fa fa-fw fa-bank\"></i> ";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cmentarze"), "html", null, true);
        echo "</h4>

    <div class=\"pages\">
        ";
        // line 62
        if ((twig_length_filter($this->env, (isset($context["cemeteries"]) ? $context["cemeteries"] : null)) > 0)) {
            // line 63
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["cemeteries"]) ? $context["cemeteries"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["fa"]) {
                // line 64
                echo "            <div class=\"element\">  
                <a href=\"";
                // line 65
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cemetery", array("id" => $this->getAttribute($context["fa"], "id", array()))), "html", null, true);
                echo "\">
                <div class=\"avatar\" style=\"";
                // line 66
                echo "\"><i class=\"fa fa-map-marker\"></i></div>    

                <p class=\"name\">
                    <i class=\"fa fa-eye\"></i>
                    ";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute($context["fa"], "name", array()), "html", null, true);
                echo "
                    <span>";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["fa"], "address", array()), "city", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["fa"], "address", array()), "address", array()), "html", null, true);
                echo "</span>
                </p>
                </a>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fa'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "        ";
        } else {
            // line 77
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie odnaleziono cmentarza"), "html", null, true);
            echo "</p>
        ";
        }
        // line 79
        echo "    </div>
     
    
    ";
        // line 82
        if (((isset($context["people"]) ? $context["people"] : null) == 0)) {
            // line 83
            echo "    <h4><i class=\"fa fa-fw fa-user\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoby zmarłe"), "html", null, true);
            echo "</h4>

    <div class=\"pages\">
            <p>";
            // line 86
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie odnaleziono osoby"), "html", null, true);
            echo "</p>
    </div>
    ";
        }
        // line 89
        echo "    
    ";
        // line 90
        if (((isset($context["places"]) ? $context["places"] : null) == 0)) {
            // line 91
            echo "    <h4><i class=\"fa fa-fw fa-map-marker\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Miejsca"), "html", null, true);
            echo "</h4>

    <div class=\"pages\">
            <p>";
            // line 94
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nie odnaleziono miejsca"), "html", null, true);
            echo "</p>
    </div>
    ";
        }
        // line 97
        echo "    
 
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Public:search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  272 => 97,  266 => 94,  259 => 91,  257 => 90,  254 => 89,  248 => 86,  241 => 83,  239 => 82,  234 => 79,  228 => 77,  225 => 76,  212 => 71,  208 => 70,  202 => 66,  198 => 65,  195 => 64,  190 => 63,  188 => 62,  182 => 59,  178 => 57,  174 => 55,  171 => 54,  164 => 52,  150 => 48,  146 => 47,  142 => 45,  137 => 43,  132 => 41,  128 => 40,  124 => 39,  118 => 37,  113 => 36,  111 => 35,  104 => 32,  102 => 31,  97 => 28,  93 => 26,  90 => 25,  83 => 23,  71 => 19,  67 => 18,  60 => 14,  56 => 13,  50 => 11,  45 => 10,  43 => 9,  36 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "empty.html.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*     {% if people>0 %}*/
/*     <h4><i class="fa fa-fw fa-user"></i> {{ 'Osoby zmarłe'|trans }}</h4>*/
/* */
/*     <div class="pages">*/
/*         {% if pages_people|length>0 %}*/
/*             {% for fa in pages_people %}*/
/*             {% if fa.type.id==1 %}    */
/*             <div class="element">  */
/*                 <a href="{{path_page(fa.code)}}">*/
/*                 <div class="avatar" style="background-image:url('{{ path('thumbnail', {'resolution': '60x60', 'file': fa.avatar })|production }}');"></div>    */
/* */
/*                 <p class="name">*/
/*                     <i class="fa fa-eye"></i>*/
/*                     {{ fa.translate(fa.locale).name }}*/
/*                     <span>{{ fa.begin|mydate }} - {{ fa.end|mydate }}, {{ fa.address.city }}</span>*/
/*                 </p>*/
/*                 </a>*/
/*             </div>*/
/*             {% endif %}   */
/*             {% endfor %}*/
/*         {% endif %}*/
/*     </div>*/
/*     {% endif %}*/
/*     */
/*     */
/* */
/*     {% if places>0 %}*/
/*     <h4><i class="fa fa-fw fa-map"></i> {{ 'Miejsca'|trans }}</h4>*/
/* */
/*     <div class="pages">*/
/*         {% if pages_places|length>0 %}*/
/*             {% for fa in pages_places %}*/
/*             {% if fa.type.id==2 %}     */
/*             <div class="element">  */
/*                 <a href="{{path_page(fa.code)}}">*/
/*                 {% if fa.image is not null %}   */
/*                 <div class="avatar" style="background-image:url('{{ path('thumbnail', {'resolution': '60x60', 'file': fa.avatar })|production }}');"></div>    */
/*                 {% else %}*/
/*                 <div class="avatar" style="{#background-image:url('{{ path('thumbnail', {'resolution': '60x60', 'file': 'images/product.png' })|production }}');#}"><i class="fa fa-map-marker"></i></div>    */
/*                 {% endif %}*/
/*                 <p class="name">*/
/*                     <i class="fa fa-eye"></i>*/
/*                     {{ fa.translate(fa.locale).name }}*/
/*                     <span>{% if not fa.begin %}{{ fa.beginyear }}{% else %}{{ fa.begin|mydate() }}{% endif %}, {{ fa.address.city }}</span>*/
/*                 </p>*/
/*                 </a>*/
/*             </div>*/
/*             {% endif %}   */
/*             {% endfor %}*/
/*         {% endif %}*/
/*     </div>*/
/*     {% endif %}*/
/*     */
/*     */
/*     <h4><i class="fa fa-fw fa-bank"></i> {{ 'Cmentarze'|trans }}</h4>*/
/* */
/*     <div class="pages">*/
/*         {% if cemeteries|length>0 %}*/
/*             {% for fa in cemeteries %}*/
/*             <div class="element">  */
/*                 <a href="{{path('cemetery',{'id':fa.id})}}">*/
/*                 <div class="avatar" style="{#background-image:url('{{ path('thumbnail', {'resolution': '60x60', 'file': 'images/product.png' })|production }}');#}"><i class="fa fa-map-marker"></i></div>    */
/* */
/*                 <p class="name">*/
/*                     <i class="fa fa-eye"></i>*/
/*                     {{ fa.name }}*/
/*                     <span>{{ fa.address.city }}, {{ fa.address.address }}</span>*/
/*                 </p>*/
/*                 </a>*/
/*             </div>*/
/*             {% endfor %}*/
/*         {% else %}*/
/*             <p>{{ 'Nie odnaleziono cmentarza'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/*      */
/*     */
/*     {% if people==0 %}*/
/*     <h4><i class="fa fa-fw fa-user"></i> {{ 'Osoby zmarłe'|trans }}</h4>*/
/* */
/*     <div class="pages">*/
/*             <p>{{ 'Nie odnaleziono osoby'|trans }}</p>*/
/*     </div>*/
/*     {% endif %}*/
/*     */
/*     {% if places==0 %}*/
/*     <h4><i class="fa fa-fw fa-map-marker"></i> {{ 'Miejsca'|trans }}</h4>*/
/* */
/*     <div class="pages">*/
/*             <p>{{ 'Nie odnaleziono miejsca'|trans }}</p>*/
/*     </div>*/
/*     {% endif %}*/
/*     */
/*  */
/* {% endblock %}*/
