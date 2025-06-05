<?php

/* AppBundle:Form:locale.html.twig */
class __TwigTemplate_541090d8dab3ee3645eb1f3f968fffcef21fef77371cf9ec774289d616c45bfe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'a2lix_translations_widget' => array($this, 'block_a2lix_translations_widget'),
            'a2lix_translationsForms_widget' => array($this, 'block_a2lix_translationsForms_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('a2lix_translations_widget', $context, $blocks);
        // line 42
        echo "

";
        // line 44
        $this->displayBlock('a2lix_translationsForms_widget', $context, $blocks);
    }

    // line 1
    public function block_a2lix_translations_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
    
    ";
        // line 4
        if ((twig_length_filter($this->env, (isset($context["form"]) ? $context["form"] : null)) == 1)) {
            // line 5
            echo "        <div class=\"translation\">
            ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
                // line 7
                echo "                ";
                $context["locale"] = $this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "name", array());
                // line 8
                echo "                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["translationsFields"], 'errors');
                echo "
                ";
                // line 9
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["translationsFields"], 'widget');
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "        </div>
    ";
        } else {
            // line 13
            echo "        <div class=\"translation tabbable\">
            <ul class=\"translation-locales nav nav-tabs\">
            ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
                // line 16
                echo "                ";
                $context["locale"] = $this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "name", array());
                // line 17
                echo "
                <li ";
                // line 18
                if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()) == (isset($context["locale"]) ? $context["locale"] : null))) {
                    echo "class=\"active\"";
                }
                echo ">
                    <a href=\"#\" class=\"button\" data-toggle=\"tab\" data-target=\".";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "id", array()), "html", null, true);
                echo "_translation-fields-";
                echo twig_escape_filter($this->env, (isset($context["locale"]) ? $context["locale"] : null), "html", null, true);
                echo "\">
                        ";
                // line 20
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, (isset($context["locale"]) ? $context["locale"] : null)), "html", null, true);
                echo "
                        ";
                // line 21
                if (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "default_locale", array()) == (isset($context["locale"]) ? $context["locale"] : null))) {
                }
                // line 22
                echo "                        ";
                if ($this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "required", array())) {
                }
                // line 23
                echo "                    </a>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "            </ul>

            <div class=\"translation-fields tab-content \">
            ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
                // line 30
                echo "                ";
                $context["locale"] = $this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "name", array());
                // line 31
                echo "
                <div class=\"";
                // line 32
                echo twig_escape_filter($this->env, (isset($context["locale"]) ? $context["locale"] : null), "html", null, true);
                echo " animated ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "id", array()), "html", null, true);
                echo "_translation-fields-";
                echo twig_escape_filter($this->env, (isset($context["locale"]) ? $context["locale"] : null), "html", null, true);
                echo " tab-pane ";
                if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()) == (isset($context["locale"]) ? $context["locale"] : null))) {
                    echo "active";
                }
                echo " ";
                if ( !$this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "valid", array())) {
                    echo "sonata-ba-field-error";
                }
                echo "\">
                    ";
                // line 33
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["translationsFields"], 'errors');
                echo "
                    ";
                // line 34
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["translationsFields"], 'widget');
                echo "
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "            </div>
        </div>
    ";
        }
        // line 39
        echo "   
        
";
    }

    // line 44
    public function block_a2lix_translationsForms_widget($context, array $blocks = array())
    {
        // line 45
        echo "    ";
        $this->displayBlock("a2lix_translations_widget", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Form:locale.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  172 => 45,  169 => 44,  163 => 39,  158 => 37,  149 => 34,  145 => 33,  129 => 32,  126 => 31,  123 => 30,  119 => 29,  114 => 26,  106 => 23,  102 => 22,  99 => 21,  95 => 20,  89 => 19,  83 => 18,  80 => 17,  77 => 16,  73 => 15,  69 => 13,  65 => 11,  57 => 9,  52 => 8,  49 => 7,  45 => 6,  42 => 5,  40 => 4,  34 => 2,  31 => 1,  27 => 44,  23 => 42,  21 => 1,);
    }
}
/* {% block a2lix_translations_widget %}*/
/*     {{ form_errors(form) }}*/
/*     */
/*     {% if(form|length==1) %}*/
/*         <div class="translation">*/
/*             {% for translationsFields in form %}*/
/*                 {% set locale = translationsFields.vars.name %}*/
/*                 {{ form_errors(translationsFields) }}*/
/*                 {{ form_widget(translationsFields) }}*/
/*             {% endfor %}*/
/*         </div>*/
/*     {% else %}*/
/*         <div class="translation tabbable">*/
/*             <ul class="translation-locales nav nav-tabs">*/
/*             {% for translationsFields in form %}*/
/*                 {% set locale = translationsFields.vars.name %}*/
/* */
/*                 <li {% if app.request.locale == locale %}class="active"{% endif %}>*/
/*                     <a href="#" class="button" data-toggle="tab" data-target=".{{ translationsFields.vars.id }}_translation-fields-{{ locale }}">*/
/*                         {{ locale|capitalize }}*/
/*                         {% if form.vars.default_locale == locale %}{% endif %}*/
/*                         {% if translationsFields.vars.required %}{% endif %}*/
/*                     </a>*/
/*                 </li>*/
/*             {% endfor %}*/
/*             </ul>*/
/* */
/*             <div class="translation-fields tab-content ">*/
/*             {% for translationsFields in form %}*/
/*                 {% set locale = translationsFields.vars.name %}*/
/* */
/*                 <div class="{{ locale }} animated {{ translationsFields.vars.id }}_translation-fields-{{ locale }} tab-pane {% if app.request.locale == locale %}active{% endif %} {% if not form.vars.valid %}sonata-ba-field-error{% endif %}">*/
/*                     {{ form_errors(translationsFields) }}*/
/*                     {{ form_widget(translationsFields) }}*/
/*                 </div>*/
/*             {% endfor %}*/
/*             </div>*/
/*         </div>*/
/*     {% endif %}   */
/*         */
/* {% endblock %}*/
/* */
/* */
/* {% block a2lix_translationsForms_widget %}*/
/*     {{ block('a2lix_translations_widget') }}*/
/* {% endblock %}*/
/* */
