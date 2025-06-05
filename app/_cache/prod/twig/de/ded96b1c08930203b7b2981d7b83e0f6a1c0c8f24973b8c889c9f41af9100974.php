<?php

/* AppBundle:User:form.html.twig */
class __TwigTemplate_600dd7ed32161f09ac08117b5595fe43e1b7f15613afb9edbd0bdd4b05f95999 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:User:form.html.twig", 1);
        $this->blocks = array(
            '_user_ad_desktop_row' => array($this, 'block__user_ad_desktop_row'),
            '_user_ad_mobile_row' => array($this, 'block__user_ad_mobile_row'),
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
        // line 2
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => $this));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block__user_ad_desktop_row($context, array $blocks = array())
    {
        // line 7
        echo "
        <div class=\"widget\">
           
            ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
            ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
            ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
            
        </div>  
        <div class=\"ad_desktop_wrapper\" style=\" float:none;\"></div>
        <div></div>
        
";
    }

    // line 20
    public function block__user_ad_mobile_row($context, array $blocks = array())
    {
        // line 22
        echo "        <div class=\"widget\">
           
            ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
            ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
            ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
            
        </div> 
        <div class=\"ad_mobile_wrapper\" style=\" float:none;\"></div>
        <div></div>
";
    }

    // line 35
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-user\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Użytkownik"), "html", null, true);
        echo "</h1>";
    }

    // line 37
    public function block_content($context, array $blocks = array())
    {
        // line 38
        echo "
    <div class=\"content\">
        ";
        // line 40
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "avatar", array())) {
            // line 41
            echo "        <div class=\"avatar\" style=\"width:60px; height:60px;  background-image:url('/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "avatar", array()), "html", null, true);
            echo "'); margin-bottom:20px;\"></div>
        ";
        }
        // line 43
        echo "        
        ";
        // line 44
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "addesktop", array())) {
            // line 45
            echo "        <div class=\"ad_desktop\" style=\"display:none;\">
        <img src=\"/uploads/ads/";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "addesktop", array()), "html", null, true);
            echo "\" style=\"max-width:100%; border: 1px solid #CCD; margin-bottom:20px;\">
        </div>
        ";
        }
        // line 49
        echo "        ";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "admobile", array())) {
            // line 50
            echo "        <div class=\"ad_mobile\" style=\"display:none;\">
        <img src=\"/uploads/ads/";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "admobile", array()), "html", null, true);
            echo "\" style=\"max-width:100%; width:500px; border: 1px solid #CCD; margin-bottom:20px;\">
        </div>
        ";
        }
        // line 54
        echo "         
        ";
        // line 56
        echo "        ";
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
        echo "
        ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        ";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 59
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
    </div>
        
    <div class=\"content overauto\">
        
        <div class=\"onright\">
            <p><b><i class=\"fa fa-fw fa-user\"></i>&nbsp; ";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane podstawowe"), "html", null, true);
        echo ":</b></p>
            <p>
            ";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres email"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "username", array()), "html", null, true);
        echo "<br>
            ";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Imię i nazwisko"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "firstname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "lastname", array()), "html", null, true);
        echo "<br>
            ";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Liczba dodanych stron"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "pages", array())), "html", null, true);
        echo "<br>
            ";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Liczba dodanych cmentarzy"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "cemeteries", array())), "html", null, true);
        echo "<br>
            ";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Liczba dodanych rodzin"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "families", array())), "html", null, true);
        echo "<br>
            ";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Liczba zamówień"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orders", array())), "html", null, true);
        echo "
            </p>
        </div>
        
        
        <p><b><i class=\"fa fa-fw fa-truck\"></i>&nbsp; ";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres dostawy"), "html", null, true);
        echo ":</b></p>
        <p>";
        // line 78
        echo $this->env->getExtension('app_extension')->address($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "deliveryaddress", array()));
        echo "</p>
        <p><b><i class=\"fa fa-fw fa-credit-card-alt\"></i>&nbsp; ";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane rozliczeniowe"), "html", null, true);
        echo ":</b></p>
        <p>";
        // line 80
        echo $this->env->getExtension('app_extension')->address($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "billingaddress", array()));
        echo "</p>
    </div>
    
    ";
        // line 83
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array()) == "contractor")) {
            echo "   
        
    <h3><i class=\"fa fa-fw fa-fire\"></i> ";
            // line 85
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usługi oferowane przez wykonawcę"), "html", null, true);
            echo "</h3>    
    <div class=\"content\">
  
        <input type=\"text\" name=\"product\" value=\"\" placeholder=\"";
            // line 88
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wyszukaj produkt"), "html", null, true);
            echo "\" style=\"margin-bottom:15px;\">
 
        <div class=\"list search-result\">
            
        </div>
    </div>    
    <div class=\"content\">
        ";
            // line 95
            if ( !twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "products", array()))) {
                // line 96
                echo "            <p>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pojawią się tu produkty powiązane"), "html", null, true);
                echo "</p>
        ";
            }
            // line 97
            echo " 
        
        <div class=\"list add-result\">
        ";
            // line 100
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "products", array()))) {
                echo " 
              ";
                // line 101
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "products", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                    // line 102
                    echo "                ";
                    $this->loadTemplate("AppBundle:User:product.html.twig", "AppBundle:User:form.html.twig", 102)->display(array("p" => $context["p"]));
                    echo "  
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 104
                echo "        ";
            }
            echo " 
        </div>
        
    </div> 
    <script>
        
        if(\$('input[name=product]').length){
        var delay = (function(){
          var timer = 0;
          return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
          };
        })();
        
        \$('input[name=product]').keyup(function(e){
            var search=\$(this);
            var name=\$(this).attr('name');
            var val=\$(this).val();
            
            if(search.data('prev')!=search.val()){

             delay(function(){
                 if(search.val()!='')    
                 {
                     \$.ajax({
                       url: '?product='+val+'',
                     }).done(function( data ) {
                         
                        search.parent().find('.search-result').html(data);
                        search.parent().find('.search-result a').click(function(e){
                            \$(this).parent().slideUp();
                            e.preventDefault();
                            \$.ajax({
                              url: \$(this).attr('href'),
                            }).done(function( data ) {
                              \$('.add-result').append(data);
                            });
                        });
                       
                     });
                 }
                 search.data('prev',search.val());
             }, 500 );

            }

        });
        if(\$('input[name=product]').val()!='')
            \$('input[name=product]').keyup();
        }
        

        \$('.add-result a.delete').click(function(e){
            \$(this).parent().slideUp();
            e.preventDefault();
            \$.ajax({
              url: \$(this).attr('href'),
            }).done(function( data ) {
              
            });
        });
        
    </script>
        
    ";
        }
        // line 170
        echo "    
    
    <div class=\"content\">
        <div class=\"options\"> 
            <a class=\"button small\" href=\"";
        // line 174
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("profile_address", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
        echo "\"><i class=\"fa fa-truck\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edytuj dane adresowe"), "html", null, true);
        echo "</a>
            <a class=\"button small\" href=\"";
        // line 175
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_list", array("creator_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "ad" => 1)), "html", null, true);
        echo "\"><i class=\"fa fa-newspaper-o\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strony tej osoby"), "html", null, true);
        echo "</a>
            <a class=\"button small\" href=\"";
        // line 176
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_list", array("buyer_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "ad" => 1)), "html", null, true);
        echo "\"><i class=\"fa fa-shopping-cart\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienia tej osoby"), "html", null, true);
        echo "</a>
            <a class=\"button small\" href=\"";
        // line 177
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contract_list", array("buyer_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "ad" => 1, "op_state" =>  -1)), "html", null, true);
        echo "\"><i class=\"fa fa-fire\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usługi zamówione"), "html", null, true);
        echo "</a>
            ";
        // line 178
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array()) == "contractor")) {
            // line 179
            echo "            <a class=\"button small\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contract_list", array("contractor_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "ad" => 1, "op_state" =>  -1)), "html", null, true);
            echo "\"><i class=\"fa fa-fire\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usługi wykonawcy"), "html", null, true);
            echo "</a>
            ";
        }
        // line 181
        echo "            
            ";
        // line 182
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "billingaddress", array()) && ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array()) == "partner"))) {
            // line 183
            echo "            <div>
                <input style=\"margin-right:10px; margin-bottom:10px; width:120px;\" type=\"text\" name=\"date\" value=\"";
            // line 184
            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->env->getExtension('app_extension')->nowObject()), "html", null, true);
            echo "\" placeholder=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Data podpisania"), "html", null, true);
            echo "\">
                <input style=\"margin-right:10px; margin-bottom:10px; width:160px;\" type=\"text\" name=\"city\" value=\"";
            // line 185
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "billingaddress", array()), "city", array()), "html", null, true);
            echo "\" placeholder=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Miasto"), "html", null, true);
            echo "\">
                <a class=\"button small getdateandcity\" href=\"?print=1\"><i class=\"fa fa-paperclip\"></i> ";
            // line 186
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Umowa dla partnera"), "html", null, true);
            echo "</a>
            </div>    
            ";
        }
        // line 188
        echo "    
        </div>
    </div>
    
    <script>
      \$('.ad_desktop_wrapper').html(\$('.ad_desktop').html());
      \$('.ad_mobile_wrapper').html(\$('.ad_mobile').html());
    </script>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:User:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  412 => 188,  406 => 186,  400 => 185,  394 => 184,  391 => 183,  389 => 182,  386 => 181,  378 => 179,  376 => 178,  370 => 177,  364 => 176,  358 => 175,  352 => 174,  346 => 170,  276 => 104,  267 => 102,  263 => 101,  259 => 100,  254 => 97,  248 => 96,  246 => 95,  236 => 88,  230 => 85,  225 => 83,  219 => 80,  215 => 79,  211 => 78,  207 => 77,  197 => 72,  191 => 71,  185 => 70,  179 => 69,  171 => 68,  165 => 67,  160 => 65,  151 => 59,  147 => 58,  143 => 57,  138 => 56,  135 => 54,  129 => 51,  126 => 50,  123 => 49,  117 => 46,  114 => 45,  112 => 44,  109 => 43,  103 => 41,  101 => 40,  97 => 38,  94 => 37,  86 => 35,  76 => 26,  72 => 25,  68 => 24,  64 => 22,  61 => 20,  50 => 12,  46 => 11,  42 => 10,  37 => 7,  34 => 5,  30 => 1,  28 => 2,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* {% form_theme form _self %}*/
/* */
/* */
/* {% block _user_ad_desktop_row %}*/
/* {#{{ dump() }}#}*/
/* */
/*         <div class="widget">*/
/*            */
/*             {{ form_label(form) }}*/
/*             {{ form_widget(form) }}*/
/*             {{ form_errors(form) }}*/
/*             */
/*         </div>  */
/*         <div class="ad_desktop_wrapper" style=" float:none;"></div>*/
/*         <div></div>*/
/*         */
/* {% endblock %}*/
/* */
/* {% block _user_ad_mobile_row %}*/
/* {#{{ dump() }}#}*/
/*         <div class="widget">*/
/*            */
/*             {{ form_label(form) }}*/
/*             {{ form_widget(form) }}*/
/*             {{ form_errors(form) }}*/
/*             */
/*         </div> */
/*         <div class="ad_mobile_wrapper" style=" float:none;"></div>*/
/*         <div></div>*/
/* {% endblock %}*/
/* */
/* */
/* */
/* {% block header %}<h1><i class="fa fa-user"></i>{{ 'Użytkownik'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class="content">*/
/*         {% if(object.avatar) %}*/
/*         <div class="avatar" style="width:60px; height:60px;  background-image:url('/{{ object.avatar }}'); margin-bottom:20px;"></div>*/
/*         {% endif %}*/
/*         */
/*         {% if(object.addesktop) %}*/
/*         <div class="ad_desktop" style="display:none;">*/
/*         <img src="/uploads/ads/{{object.addesktop}}" style="max-width:100%; border: 1px solid #CCD; margin-bottom:20px;">*/
/*         </div>*/
/*         {% endif %}*/
/*         {% if(object.admobile) %}*/
/*         <div class="ad_mobile" style="display:none;">*/
/*         <img src="/uploads/ads/{{object.admobile}}" style="max-width:100%; width:500px; border: 1px solid #CCD; margin-bottom:20px;">*/
/*         </div>*/
/*         {% endif %}*/
/*          */
/*         {#{{ dump(form) }} #}*/
/*         {{ form_start(form) }}*/
/*         {{ form_errors(form) }}*/
/*         {{ form_widget(form) }}*/
/*         {{ form_end(form) }}*/
/*     </div>*/
/*         */
/*     <div class="content overauto">*/
/*         */
/*         <div class="onright">*/
/*             <p><b><i class="fa fa-fw fa-user"></i>&nbsp; {{ 'Dane podstawowe'|trans }}:</b></p>*/
/*             <p>*/
/*             {{ 'Adres email'|trans }}: {{ object.username }}<br>*/
/*             {{ 'Imię i nazwisko'|trans }}: {{ object.firstname }} {{ object.lastname }}<br>*/
/*             {{ 'Liczba dodanych stron'|trans }}: {{ object.pages|length }}<br>*/
/*             {{ 'Liczba dodanych cmentarzy'|trans }}: {{ object.cemeteries|length }}<br>*/
/*             {{ 'Liczba dodanych rodzin'|trans }}: {{ object.families|length }}<br>*/
/*             {{ 'Liczba zamówień'|trans }}: {{ object.orders|length }}*/
/*             </p>*/
/*         </div>*/
/*         */
/*         */
/*         <p><b><i class="fa fa-fw fa-truck"></i>&nbsp; {{ 'Adres dostawy'|trans }}:</b></p>*/
/*         <p>{{ address(object.deliveryaddress)|raw }}</p>*/
/*         <p><b><i class="fa fa-fw fa-credit-card-alt"></i>&nbsp; {{ 'Dane rozliczeniowe'|trans }}:</b></p>*/
/*         <p>{{ address(object.billingaddress)|raw }}</p>*/
/*     </div>*/
/*     */
/*     {% if(object.type=='contractor') %}   */
/*         */
/*     <h3><i class="fa fa-fw fa-fire"></i> {{ 'Usługi oferowane przez wykonawcę'|trans }}</h3>    */
/*     <div class="content">*/
/*   */
/*         <input type="text" name="product" value="" placeholder="{{ 'Wyszukaj produkt'|trans }}" style="margin-bottom:15px;">*/
/*  */
/*         <div class="list search-result">*/
/*             */
/*         </div>*/
/*     </div>    */
/*     <div class="content">*/
/*         {% if not object.products|length %}*/
/*             <p>{{ 'Pojawią się tu produkty powiązane'|trans }}</p>*/
/*         {% endif %} */
/*         */
/*         <div class="list add-result">*/
/*         {% if object.products|length %} */
/*               {% for p in object.products %}*/
/*                 {% include 'AppBundle:User:product.html.twig' with {'p': p } only %}  */
/*               {% endfor %}*/
/*         {% endif %} */
/*         </div>*/
/*         */
/*     </div> */
/*     <script>*/
/*         */
/*         if($('input[name=product]').length){*/
/*         var delay = (function(){*/
/*           var timer = 0;*/
/*           return function(callback, ms){*/
/*             clearTimeout (timer);*/
/*             timer = setTimeout(callback, ms);*/
/*           };*/
/*         })();*/
/*         */
/*         $('input[name=product]').keyup(function(e){*/
/*             var search=$(this);*/
/*             var name=$(this).attr('name');*/
/*             var val=$(this).val();*/
/*             */
/*             if(search.data('prev')!=search.val()){*/
/* */
/*              delay(function(){*/
/*                  if(search.val()!='')    */
/*                  {*/
/*                      $.ajax({*/
/*                        url: '?product='+val+'',*/
/*                      }).done(function( data ) {*/
/*                          */
/*                         search.parent().find('.search-result').html(data);*/
/*                         search.parent().find('.search-result a').click(function(e){*/
/*                             $(this).parent().slideUp();*/
/*                             e.preventDefault();*/
/*                             $.ajax({*/
/*                               url: $(this).attr('href'),*/
/*                             }).done(function( data ) {*/
/*                               $('.add-result').append(data);*/
/*                             });*/
/*                         });*/
/*                        */
/*                      });*/
/*                  }*/
/*                  search.data('prev',search.val());*/
/*              }, 500 );*/
/* */
/*             }*/
/* */
/*         });*/
/*         if($('input[name=product]').val()!='')*/
/*             $('input[name=product]').keyup();*/
/*         }*/
/*         */
/* */
/*         $('.add-result a.delete').click(function(e){*/
/*             $(this).parent().slideUp();*/
/*             e.preventDefault();*/
/*             $.ajax({*/
/*               url: $(this).attr('href'),*/
/*             }).done(function( data ) {*/
/*               */
/*             });*/
/*         });*/
/*         */
/*     </script>*/
/*         */
/*     {% endif %}*/
/*     */
/*     */
/*     <div class="content">*/
/*         <div class="options"> */
/*             <a class="button small" href="{{ path('profile_address', {'id': object.id})}}"><i class="fa fa-truck"></i> {{ 'Edytuj dane adresowe'|trans }}</a>*/
/*             <a class="button small" href="{{ path('page_list', {'creator_id': object.id, 'ad':1})}}"><i class="fa fa-newspaper-o"></i> {{ 'Strony tej osoby'|trans }}</a>*/
/*             <a class="button small" href="{{ path('order_list', {'buyer_id': object.id, 'ad':1})}}"><i class="fa fa-shopping-cart"></i> {{ 'Zamówienia tej osoby'|trans }}</a>*/
/*             <a class="button small" href="{{ path('contract_list', {'buyer_id': object.id, 'ad':1,'op_state':-1})}}"><i class="fa fa-fire"></i> {{ 'Usługi zamówione'|trans }}</a>*/
/*             {% if(object.type=='contractor') %}*/
/*             <a class="button small" href="{{ path('contract_list', {'contractor_id': object.id, 'ad':1,'op_state':-1})}}"><i class="fa fa-fire"></i> {{ 'Usługi wykonawcy'|trans }}</a>*/
/*             {% endif %}*/
/*             */
/*             {% if(object.billingaddress and object.type=='partner') %}*/
/*             <div>*/
/*                 <input style="margin-right:10px; margin-bottom:10px; width:120px;" type="text" name="date" value="{{nowObject()|mydate}}" placeholder="{{ 'Data podpisania'|trans }}">*/
/*                 <input style="margin-right:10px; margin-bottom:10px; width:160px;" type="text" name="city" value="{{object.billingaddress.city}}" placeholder="{{ 'Miasto'|trans }}">*/
/*                 <a class="button small getdateandcity" href="?print=1"><i class="fa fa-paperclip"></i> {{ 'Umowa dla partnera'|trans }}</a>*/
/*             </div>    */
/*             {% endif %}    */
/*         </div>*/
/*     </div>*/
/*     */
/*     <script>*/
/*       $('.ad_desktop_wrapper').html($('.ad_desktop').html());*/
/*       $('.ad_mobile_wrapper').html($('.ad_mobile').html());*/
/*     </script>*/
/* */
/* {% endblock %}*/
