<?php

/* AppBundle:Form:base.html.twig */
class __TwigTemplate_b3e294d0c54fb5c2aa2b6d6e1dc1f876d12ab09384ca8d548fea074dd2117b7c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form_row' => array($this, 'block_form_row'),
            'integer_widget' => array($this, 'block_integer_widget'),
            'text_widget' => array($this, 'block_text_widget'),
            'textarea_widget' => array($this, 'block_textarea_widget'),
            'form_errors' => array($this, 'block_form_errors'),
            'checkbox_row' => array($this, 'block_checkbox_row'),
            'radio_row' => array($this, 'block_radio_row'),
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
            'address_row' => array($this, 'block_address_row'),
            'localisation_row' => array($this, 'block_localisation_row'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "

        

";
        // line 5
        $this->displayBlock('form_row', $context, $blocks);
        // line 16
        echo "

";
        // line 18
        $this->displayBlock('integer_widget', $context, $blocks);
        // line 24
        echo "

";
        // line 26
        $this->displayBlock('text_widget', $context, $blocks);
        // line 32
        echo "


";
        // line 35
        $this->displayBlock('textarea_widget', $context, $blocks);
        // line 41
        echo "

";
        // line 43
        $this->displayBlock('form_errors', $context, $blocks);
        // line 54
        echo "






";
        // line 61
        $this->displayBlock('checkbox_row', $context, $blocks);
        // line 75
        echo "
";
        // line 76
        $this->displayBlock('radio_row', $context, $blocks);
        // line 91
        $this->displayBlock('choice_widget_expanded', $context, $blocks);
        // line 108
        $this->displayBlock('address_row', $context, $blocks);
        // line 115
        echo "

";
        // line 117
        $this->displayBlock('localisation_row', $context, $blocks);
    }

    // line 5
    public function block_form_row($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"";
        if ($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-hidden", array(), "array", true, true)) {
            echo " hidden ";
        }
        echo " ";
        if (array_key_exists("name", $context)) {
            echo "widget";
        }
        echo " ";
        if (array_key_exists("name", $context)) {
            echo "widget_";
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        }
        echo "\">
        ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
        <div class=\"field\">
        ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        </div>
        ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        ";
        // line 12
        if ($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-help", array(), "array", true, true)) {
            echo " <div class=\"tip help\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-help", array(), "array")), "html", null, true);
            echo "\"><i class=\"fa fa-question-circle\" aria-hidden=\"true\"></i></div> ";
        }
        // line 13
        echo "        
    </div>
";
    }

    // line 18
    public function block_integer_widget($context, array $blocks = array())
    {
        // line 20
        echo "        ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : null), "number")) : ("number"));
        // line 21
        echo "        ";
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
";
    }

    // line 26
    public function block_text_widget($context, array $blocks = array())
    {
        // line 28
        echo "        ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : null), "text")) : ("text"));
        // line 29
        echo "        ";
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
";
    }

    // line 35
    public function block_textarea_widget($context, array $blocks = array())
    {
        // line 37
        echo "        ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : null), array("class" => trim(((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " form-control"))));
        // line 38
        echo "        <textarea ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
        echo "</textarea>
";
    }

    // line 43
    public function block_form_errors($context, array $blocks = array())
    {
        // line 44
        echo "    ";
        ob_start();
        // line 45
        echo "        ";
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
            // line 46
            echo "        <ul class=\"errors fa-ul\">
            ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 48
                echo "                <li><i class=\"fa fa-warning fa-fw\"></i>&nbsp; ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["error"], "message", array()), "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "        </ul>
        ";
        }
        // line 52
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 61
    public function block_checkbox_row($context, array $blocks = array())
    {
        // line 62
        echo "    <div class=\"widget\">
        ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
        
        <div class=\"field switch single\">
            ";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
            ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label', array("label_attr" => array("class" => "")));
        echo "
        </div>
            
        ";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        ";
        // line 71
        if ($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-help", array(), "array", true, true)) {
            echo "<span class=\"tip help\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-help", array(), "array")), "html", null, true);
            echo "\"><i class=\"fa fa-question-circle\" aria-hidden=\"true\"></i></span>";
        }
        // line 72
        echo "        
    </div>    
";
    }

    // line 76
    public function block_radio_row($context, array $blocks = array())
    {
        // line 77
        echo "    <div class=\"widget\">
        ";
        // line 78
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
        
        <div class=\"field radio single\">
            ";
        // line 81
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
            ";
        // line 82
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label', array("label_attr" => array("class" => "")));
        echo "
        </div>
            
        ";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        ";
        // line 86
        if ($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-help", array(), "array", true, true)) {
            echo " <div class=\"tip help\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-help", array(), "array")), "html", null, true);
            echo "\"><i class=\"fa fa-question-circle\" aria-hidden=\"true\"></i></div> ";
        }
        // line 87
        echo "        
    </div>    
";
    }

    // line 91
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        // line 92
        echo "<div class=\"field\" ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">";
        // line 93
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 94
            echo "        
        <div class=\"choice-wrapper\">
        <div class=\"";
            // line 96
            if ((isset($context["multiple"]) ? $context["multiple"] : null)) {
                echo "check";
            } else {
                echo "radio";
            }
            echo " multi\">
            ";
            // line 97
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget');
            echo "
            ";
            // line 98
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'label', array("label_attr" => array("class" => "")));
            echo "
        </div>
        ";
            // line 100
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'label', array("label_attr" => array("class" => "choice-radio")));
            echo "
        </div>
        
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        echo "</div>";
    }

    // line 108
    public function block_address_row($context, array $blocks = array())
    {
        // line 109
        echo "    
    <div class=\"widget\" class=\"address\">
        ";
        // line 111
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 112
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
    </div> 
";
    }

    // line 117
    public function block_localisation_row($context, array $blocks = array())
    {
        // line 118
        echo "    
    <div class=\"localisation\">
        ";
        // line 120
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 121
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
    </div> 
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Form:base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  361 => 121,  357 => 120,  353 => 118,  350 => 117,  343 => 112,  339 => 111,  335 => 109,  332 => 108,  328 => 104,  318 => 100,  313 => 98,  309 => 97,  301 => 96,  297 => 94,  293 => 93,  289 => 92,  286 => 91,  280 => 87,  274 => 86,  270 => 85,  264 => 82,  260 => 81,  254 => 78,  251 => 77,  248 => 76,  242 => 72,  236 => 71,  232 => 70,  226 => 67,  222 => 66,  216 => 63,  213 => 62,  210 => 61,  205 => 52,  201 => 50,  192 => 48,  188 => 47,  185 => 46,  182 => 45,  179 => 44,  176 => 43,  167 => 38,  164 => 37,  161 => 35,  154 => 29,  151 => 28,  148 => 26,  141 => 21,  138 => 20,  135 => 18,  129 => 13,  123 => 12,  119 => 11,  114 => 9,  109 => 7,  93 => 6,  90 => 5,  86 => 117,  82 => 115,  80 => 108,  78 => 91,  76 => 76,  73 => 75,  71 => 61,  62 => 54,  60 => 43,  56 => 41,  54 => 35,  49 => 32,  47 => 26,  43 => 24,  41 => 18,  37 => 16,  35 => 5,  29 => 1,);
    }
}
/* */
/* */
/*         */
/* */
/* {% block form_row %}*/
/*     <div class="{% if attr['data-hidden'] is defined %} hidden {% endif %} {% if name is defined %}widget{% endif %} {% if name is defined %}widget_{{name}}{% endif %}">*/
/*         {{ form_label(form) }}*/
/*         <div class="field">*/
/*         {{ form_widget(form) }}*/
/*         </div>*/
/*         {{ form_errors(form) }}*/
/*         {% if attr['data-help'] is defined %} <div class="tip help" title="{{ attr['data-help']|trans }}"><i class="fa fa-question-circle" aria-hidden="true"></i></div> {% endif %}*/
/*         */
/*     </div>*/
/* {% endblock form_row %}*/
/* */
/* */
/* {% block integer_widget %}*/
/* {#    <div class="integer">#}*/
/*         {% set type = type|default('number') %}*/
/*         {{ block('form_widget_simple') }}*/
/* {#    </div>#}*/
/* {% endblock %}*/
/* */
/* */
/* {% block text_widget %}*/
/* {#    <div class="text">#}*/
/*         {% set type = type|default('text') %}*/
/*         {{ block('form_widget_simple') }}*/
/* {#    </div>#}*/
/* {% endblock %}*/
/* */
/* */
/* */
/* {% block textarea_widget %}*/
/* {#    <div class="textarea">#}*/
/*         {% set attr = attr|merge({class: (attr.class|default('') ~ ' form-control')|trim}) %}*/
/*         <textarea {{ block('widget_attributes') }}>{{ value }}</textarea>*/
/* {#    </div>#}*/
/* {% endblock %}*/
/* */
/* */
/* {% block form_errors %}*/
/*     {% spaceless %}*/
/*         {% if errors|length > 0 %}*/
/*         <ul class="errors fa-ul">*/
/*             {% for error in errors %}*/
/*                 <li><i class="fa fa-warning fa-fw"></i>&nbsp; {{ error.message }}</li>*/
/*             {% endfor %}*/
/*         </ul>*/
/*         {% endif %}*/
/*     {% endspaceless %}*/
/* {% endblock %}*/
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* {% block checkbox_row %}*/
/*     <div class="widget">*/
/*         {{ form_label(form) }}*/
/*         */
/*         <div class="field switch single">*/
/*             {{ form_widget(form) }}*/
/*             {{ form_label(form,null,{label_attr:{'class':''} }) }}*/
/*         </div>*/
/*             */
/*         {{ form_errors(form) }}*/
/*         {% if attr['data-help'] is defined %}<span class="tip help" title="{{ attr['data-help']|trans }}"><i class="fa fa-question-circle" aria-hidden="true"></i></span>{% endif %}*/
/*         */
/*     </div>    */
/* {% endblock %}*/
/* */
/* {% block radio_row %}*/
/*     <div class="widget">*/
/*         {{ form_label(form) }}*/
/*         */
/*         <div class="field radio single">*/
/*             {{ form_widget(form) }}*/
/*             {{ form_label(form,null,{label_attr:{'class':''} }) }}*/
/*         </div>*/
/*             */
/*         {{ form_errors(form) }}*/
/*         {% if attr['data-help'] is defined %} <div class="tip help" title="{{ attr['data-help']|trans }}"><i class="fa fa-question-circle" aria-hidden="true"></i></div> {% endif %}*/
/*         */
/*     </div>    */
/* {% endblock %}*/
/* */
/* {%- block choice_widget_expanded -%}*/
/*     <div class="field" {{ block('widget_container_attributes') }}>*/
/*     {%- for child in form %}*/
/*         */
/*         <div class="choice-wrapper">*/
/*         <div class="{% if(multiple) %}check{% else %}radio{% endif %} multi">*/
/*             {{ form_widget(child) }}*/
/*             {{ form_label(child,null,{label_attr:{'class':''} }) }}*/
/*         </div>*/
/*         {{ form_label(child,null,{label_attr:{'class':'choice-radio'} }) }}*/
/*         </div>*/
/*         */
/*     {% endfor -%}*/
/*     </div>    */
/* {%- endblock choice_widget_expanded -%}*/
/* */
/* */
/* {% block address_row %}*/
/*     */
/*     <div class="widget" class="address">*/
/*         {{ form_widget(form) }}*/
/*         {{ form_errors(form) }}*/
/*     </div> */
/* {% endblock %}*/
/* */
/* */
/* {% block localisation_row %}*/
/*     */
/*     <div class="localisation">*/
/*         {{ form_widget(form) }}*/
/*         {{ form_errors(form) }}*/
/*     </div> */
/* {% endblock %}*/
