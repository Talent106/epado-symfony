<?php

/* AppBundle:Profile:address.html.twig */
class __TwigTemplate_e2ef670556fbc4db2b9976b8de69532a37b6d4037eb69ad45b41e77d56ac44cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Profile:address.html.twig", 1);
        $this->blocks = array(
            '_user_address_delivery_address_company_row' => array($this, 'block__user_address_delivery_address_company_row'),
            '_user_address_delivery_address_postal_code_row' => array($this, 'block__user_address_delivery_address_postal_code_row'),
            '_user_address_billing_address_company_row' => array($this, 'block__user_address_billing_address_company_row'),
            '_user_address_billing_address_postal_code_row' => array($this, 'block__user_address_billing_address_postal_code_row'),
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
        // line 3
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => $this));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block__user_address_delivery_address_company_row($context, array $blocks = array())
    {
        // line 6
        echo "    <h3><i class=\"fa fa-fw fa-truck\"></i>&nbsp; ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wysyłkowe dane adresowe"), "html", null, true);
        echo "</h3>
    <div class=\"delivery\">
        <div class=\"widget\">
            ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
            <div class=\"field\">
            ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
            </div>
            ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        </div> 
";
    }

    // line 17
    public function block__user_address_delivery_address_postal_code_row($context, array $blocks = array())
    {
        // line 18
        echo "        <div class=\"widget\">
            ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
            <div class=\"field\">
            ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
            </div>
            ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        </div> 
    </div>
";
    }

    // line 28
    public function block__user_address_billing_address_company_row($context, array $blocks = array())
    {
        // line 29
        echo "    
    <h3><i class=\"fa fa-fw fa-credit-card-alt\"></i>&nbsp; ";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane rozliczeniowe"), "html", null, true);
        echo "</h3>
    
    <div class=\"widget checkbox\">
        <label for=\"copy\">";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Takie jak wysyłkowe"), "html", null, true);
        echo "</label>

        <div class=\"field switch single\">
            <input type=\"checkbox\" id=\"copy\" name=\"copy\" value=\"1\" checked=\"checked\" />
            <label for=\"copy\">";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Takie jak wysyłkowe"), "html", null, true);
        echo "</label>
        </div>
    </div>
    
    <div class=\"billing\" style=\"display:none;\">
        <div class=\"widget\">
            ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
            <div class=\"field\">
            ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
            </div>
            ";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        </div> 
";
    }

    // line 51
    public function block__user_address_billing_address_postal_code_row($context, array $blocks = array())
    {
        // line 52
        echo "        <div class=\"widget\">
            ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
            <div class=\"field\">
            ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
            </div>
            ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        </div> 
    </div>
";
    }

    // line 64
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-truck\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane adresowe"), "html", null, true);
        echo "</h1>";
    }

    // line 66
    public function block_content($context, array $blocks = array())
    {
        // line 67
        echo "
    <div class=\"content\">
        ";
        // line 69
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("action" => $this->env->getExtension('app_extension')->extendUrl()));
        echo "
        ";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        ";
        // line 71
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 72
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
    </div>
    

    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('.delivery .copy').change(function(){
                
                if(\$(this).val()!=''){
                  if (\$('#copy').prop('checked')==true)  \$('.billing').find('[data-name='+\$(this).data('name')+']').val(\$(this).val());
                }
            });
            
            \$('#copy').change(function(){
                if (\$(this).prop('checked')==true){ 
                    \$('.billing').hide();
                }else{
                    \$('.billing').show();
                }
            });
            
            ";
        // line 93
        if (((isset($context["error"]) ? $context["error"] : null) || ($this->getAttribute($this->getAttribute((isset($context["formuser"]) ? $context["formuser"] : null), "deliveryaddress", array(), "any", false, true), "id", array(), "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute((isset($context["formuser"]) ? $context["formuser"] : null), "deliveryaddress", array()), "id", array()))))) {
            echo "\$('#copy').click();";
        } else {
        }
        // line 94
        echo "
        }); 
    </script>
    

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Profile:address.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 94,  207 => 93,  183 => 72,  179 => 71,  175 => 70,  171 => 69,  167 => 67,  164 => 66,  156 => 64,  148 => 57,  143 => 55,  138 => 53,  135 => 52,  132 => 51,  125 => 47,  120 => 45,  115 => 43,  106 => 37,  99 => 33,  93 => 30,  90 => 29,  87 => 28,  79 => 23,  74 => 21,  69 => 19,  66 => 18,  63 => 17,  56 => 13,  51 => 11,  46 => 9,  39 => 6,  36 => 5,  32 => 1,  30 => 3,  11 => 1,);
    }
}
/* {% extends "admin.html.twig"  %}*/
/* */
/* {% form_theme form _self %}*/
/* */
/* {% block _user_address_delivery_address_company_row %}*/
/*     <h3><i class="fa fa-fw fa-truck"></i>&nbsp; {{ 'Wysyłkowe dane adresowe'|trans }}</h3>*/
/*     <div class="delivery">*/
/*         <div class="widget">*/
/*             {{ form_label(form) }}*/
/*             <div class="field">*/
/*             {{ form_widget(form) }}*/
/*             </div>*/
/*             {{ form_errors(form) }}*/
/*         </div> */
/* {% endblock %}*/
/* */
/* {% block _user_address_delivery_address_postal_code_row %}*/
/*         <div class="widget">*/
/*             {{ form_label(form) }}*/
/*             <div class="field">*/
/*             {{ form_widget(form) }}*/
/*             </div>*/
/*             {{ form_errors(form) }}*/
/*         </div> */
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block _user_address_billing_address_company_row %}*/
/*     */
/*     <h3><i class="fa fa-fw fa-credit-card-alt"></i>&nbsp; {{ 'Dane rozliczeniowe'|trans }}</h3>*/
/*     */
/*     <div class="widget checkbox">*/
/*         <label for="copy">{{ 'Takie jak wysyłkowe'|trans }}</label>*/
/* */
/*         <div class="field switch single">*/
/*             <input type="checkbox" id="copy" name="copy" value="1" checked="checked" />*/
/*             <label for="copy">{{ 'Takie jak wysyłkowe'|trans }}</label>*/
/*         </div>*/
/*     </div>*/
/*     */
/*     <div class="billing" style="display:none;">*/
/*         <div class="widget">*/
/*             {{ form_label(form) }}*/
/*             <div class="field">*/
/*             {{ form_widget(form) }}*/
/*             </div>*/
/*             {{ form_errors(form) }}*/
/*         </div> */
/* {% endblock %}*/
/* */
/* {% block _user_address_billing_address_postal_code_row %}*/
/*         <div class="widget">*/
/*             {{ form_label(form) }}*/
/*             <div class="field">*/
/*             {{ form_widget(form) }}*/
/*             </div>*/
/*             {{ form_errors(form) }}*/
/*         </div> */
/*     </div>*/
/* {% endblock %}*/
/* */
/* */
/* */
/* {% block header %}<h1><i class="fa fa-truck"></i>{{ 'Dane adresowe'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="content">*/
/*         {{ form_start(form,{'action':extend()}) }}*/
/*         {{ form_errors(form) }}*/
/*         {{ form_widget(form) }}*/
/*         {{ form_end(form) }}*/
/*     </div>*/
/*     */
/* */
/*     <script type="text/javascript">*/
/*         $(document).ready(function () {*/
/*             $('.delivery .copy').change(function(){*/
/*                 */
/*                 if($(this).val()!=''){*/
/*                   if ($('#copy').prop('checked')==true)  $('.billing').find('[data-name='+$(this).data('name')+']').val($(this).val());*/
/*                 }*/
/*             });*/
/*             */
/*             $('#copy').change(function(){*/
/*                 if ($(this).prop('checked')==true){ */
/*                     $('.billing').hide();*/
/*                 }else{*/
/*                     $('.billing').show();*/
/*                 }*/
/*             });*/
/*             */
/*             {% if( error or (formuser.deliveryaddress.id is defined and formuser.deliveryaddress.id is not null) ) %}$('#copy').click();{% else %}{% endif %}*/
/* */
/*         }); */
/*     </script>*/
/*     */
/* */
/* {% endblock %}*/
/* */
/* */
/* */
/* */
