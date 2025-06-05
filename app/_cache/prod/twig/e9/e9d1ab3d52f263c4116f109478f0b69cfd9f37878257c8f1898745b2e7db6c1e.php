<?php

/* AppBundle:Product:form.html.twig */
class __TwigTemplate_c3024e92a1a14d2248b134b80a5eb9a57cb58dafa3842a3a0bd15ca5af168334 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Product:form.html.twig", 1);
        $this->blocks = array(
            '_product_prices_widget' => array($this, 'block__product_prices_widget'),
            '_product_prices_row' => array($this, 'block__product_prices_row'),
            '_product_translations_row' => array($this, 'block__product_translations_row'),
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
        // line 4
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => $this));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block__product_prices_widget($context, array $blocks = array())
    {
        // line 12
        ob_start();
        // line 13
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 14
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget');
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 19
    public function block__product_prices_row($context, array $blocks = array())
    {
        // line 20
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
";
    }

    // line 24
    public function block__product_translations_row($context, array $blocks = array())
    {
        // line 25
        echo "    <div class=\"widget\">
        ";
        // line 26
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array())) != 1)) {
            // line 27
            echo "            ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
            echo "
        ";
        }
        // line 29
        echo "        
        ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
    </div> 
";
    }

    // line 35
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-cube\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Produkt"), "html", null, true);
        echo "</h1>";
    }

    // line 38
    public function block_content($context, array $blocks = array())
    {
        // line 39
        echo "



    ";
        // line 43
        if (twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader"))) {
            // line 44
            echo "    <div class=\"content\">
        ";
            // line 45
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
            echo "
        ";
            // line 46
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
            echo "
        ";
            // line 47
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
            echo "
        ";
            // line 48
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
            echo "
    </div>
    ";
        }
        // line 51
        echo "    

    ";
        // line 53
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array())) {
            // line 54
            echo "
        ";
            // line 82
            echo "  


        <h1><i class=\"fa fa-photo\"></i>";
            // line 85
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zdjęcia produktu"), "html", null, true);
            echo "</h1>
        <div class=\"content\">

            <div class=\"drop-wrapper\">
            <form action=\"";
            // line 89
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "schemeAndHttpHost", array()) . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "requestUri", array())), "html", null, true);
            echo "\" data-edit=\"";
            echo $this->env->getExtension('routing')->getPath("image_form");
            echo "\" data-sort=\"";
            echo $this->env->getExtension('routing')->getPath("image_sort");
            echo "\"  method=\"post\" class=\"drop\" id=\"drop\">
                <div class=\"dz-message\">
                    ";
            // line 91
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Upuść tutaj zdjęcia albo kliknij i wybierz je ze swojego urządzenia."), "html", null, true);
            echo "<br>
                </div>

                ";
            // line 94
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "getImagesSort", array(), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 95
                echo "                    <div class=\"dz-preview dz-processing dz-image-preview dz-success dz-complete exists\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "getId", array(), "method"), "html", null, true);
                echo "\">
                        <div class=\"dz-image\" style=\"background-image: url(";
                // line 96
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "160x120", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                echo "); background-size: cover; background-repeat: no-repeat;\"></div>
                        <div class=\"dz-details\">
                            <span data-id=\"";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "id", array()), "html", null, true);
                echo "\" class=\"btn-del tip\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usuń zdjęcie"), "html", null, true);
                echo "\" ></span>
                            <span data-id=\"";
                // line 99
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "id", array()), "html", null, true);
                echo "\" class=\"btn-def tip\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ustaw zdjęcie jako domyślne dla tego produktu"), "html", null, true);
                echo "\"></span>
                            ";
                // line 101
                echo "                        </div>
                        <span class=\"is-def tip ";
                // line 102
                if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "image", array()) && ($this->getAttribute($context["image"], "id", array()) == $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "image", array()), "id", array())))) {
                    echo "show";
                }
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zdjęcie jest domyślne dla tego produktu"), "html", null, true);
                echo "\" ></span>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 105
            echo "
            </form>
            </div>


            <script type=\"text/javascript\" src=\"/js/dropzone/dropzone.js\"></script>
            <script type=\"text/javascript\">



            \$(document).ready(function() {

                function buttonsBind(container){
                    if(container.parents('form.drop.ui-sortable').length){ container.parents('form.drop.ui-sortable').find('.dz-preview,.dz-image,.dz-image img,.dz-details').css('cursor', 'move'); }
                    
                    container.find('form.drop').sortable({ 
                        items: \".dz-preview\",
                        placeholder: \"dz-preview placeholder\",
                        revert: true,
                        
                        
                        update: function(){
                            var sorted = \$(this).sortable('toArray',{attribute:'data-id'}).toString();
                            console.log(sorted);
                            var url=\$(this).data('sort');
                            \$.ajax({url: url+'/'+sorted});            
                        } 
                    }).disableSelection().find('.dz-preview,.dz-image,.dz-details').css('cursor', 'move');
                    
                    
                    
                    container.find(\".dz-details span.btn-del\").click(function() {
                        var element=\$(this);

                        \$.post(updateQueryString('order_id',null,\$(this).closest('form').attr('action'))+'/image/del', {'delImgId':\$(this).data('id')}, function(response) {
                            if(response.status==true) {
                               element.parents('.dz-preview').fadeOut(300);
                            }
                        });
                    });

                    container.find(\".dz-details span.btn-def\").click(function() {
                        var element=\$(this);
                        \$.post(updateQueryString('order_id',null,\$(this).closest('form').attr('action'))+'/image/def', {'defImgId':\$(this).data('id')}, function(response) {
                            if(response.status==true) {
                               \$('.is-def').removeClass('show');
                               \$(element).parent().parent().find('.is-def').addClass('show'); 
                               //element.parents('.dz-preview').fadeOut(300);
                            }
                        });
                    });
                    
                    container.find(\".dz-details span.btn-edit\").click(function() {
                        var element=\$(this);
                        
                        \$.ajax({
                          url: \$(this).closest('form').data('edit')+'/'+\$(this).data('id'),
                          //dataType    : 'json',
                          beforeSend: function( xhr ) {
                            //xhr.overrideMimeType( \"text/plain; charset=x-user-defined\" );
                          }
                        })
                        .done(function( data ) {
                          ajaxForm(data, { test: 1 });
                        });
                    });
                    
                }


                buttonsBind(\$('body'));

                var url=\$('#drop').attr('action');

                \$('#drop').dropzone({ 
                    url: url, 
                    autoProcessQueue: true,
                    autoProcessQueue: true,
                    maxFilesize: 12,
                    acceptedFiles: 'image/jpg,image/png,image/jpeg' ,
                    dictInvalidFileType: '";
            // line 185
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Niewłaściwy format pliku, dozwolone pliki to jpg lub png."), "html", null, true);
            echo "',
                    dictFileTooBig: '";
            // line 186
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Plik jest za duży. Dozwolony rozmiar to:"), "html", null, true);
            echo " ";
            echo "{{";
            echo "maxFilesize";
            echo "}}";
            echo " MB.',
                    dictResponseError: '";
            // line 187
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wystąpił błąd."), "html", null, true);
            echo "',
                    dictMaxFilesExceeded: '";
            // line 188
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodałeś zbyt dużo plików."), "html", null, true);
            echo "',
                    
                    thumbnailWidth: 159,
                    thumbnailHeight: 120,
                    success: function(file) {
                      obj = JSON.parse(file.xhr.response);  
                      var def_class='';
                      if(obj.status!='ok') {
                        var node, _i, _len, _ref, _results;
                        var message = obj.message // modify it to your error message
                        file.previewElement.classList.add(\"dz-error\");
                        _ref = file.previewElement.querySelectorAll(\"[data-dz-errormessage]\");
                        _results = [];
                        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                          node = _ref[_i];
                          _results.push(node.textContent = message);
                        }
                        return _results;
                      }
        
                      if(\$('.dz-preview.exists').length==0) def_class='show';

                      \$(file.previewElement).append('<span class=\"is-def tip '+def_class+'\" title=\"";
            // line 210
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zdjęcie jest domyślne dla tego produktu"), "html", null, true);
            echo "\" ></span>')
                        .find('.dz-details').html(''+
                        '<span data-id=\"'+obj.id+'\" class=\"btn-del tip\" title=\"";
            // line 212
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usuń zdjęcie"), "html", null, true);
            echo "\" ></span>'+
                        '<span data-id=\"'+obj.id+'\" class=\"btn-def tip\" title=\"";
            // line 213
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ustaw zdjęcie jako domyślne dla tego produktu"), "html", null, true);
            echo "\"></span>'+
                        '";
            // line 214
            echo "');

                      buttonsBind(\$(file.previewElement));
                      preapareContent(\$(file.previewElement));

                      if (file.previewElement) {
                        return file.previewElement.classList.add(\"dz-success\");
                      }

                    },
                    fallback: function() {
                        
                        \$('.dz-fallback').show();
                        \$('.dz-message').hide();
                        
                        var child, messageElement, span, _i, _len, _ref;
                        this.element.className = \"\" + this.element.className + \" dz-browser-not-supported\";
                        _ref = this.element.getElementsByTagName(\"div\");
                        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                          child = _ref[_i];
                          if (/(^| )dz-message(\$| )/.test(child.className)) {
                            messageElement = child;
                            child.className = \"dz-message\";
                            continue;
                          }
                        }
                        if (!messageElement) {
                          messageElement = Dropzone.createElement(\"<div class=\\\"dz-message\\\"><span></span></div>\");
                          this.element.appendChild(messageElement);
                        }
                        span = messageElement.getElementsByTagName(\"span\")[0];
                        if (span) {
                          span.textContent = this.options.dictFallbackMessage;
                        }
                        return this.element.appendChild(this.getFallbackForm());
                    },
                    thumbnail: function(file, dataUrl) {
                           var thumbnailElement, _i, _len, _ref;
                           if (file.previewElement) {
                             file.previewElement.classList.remove(\"dz-file-preview\");
                             _ref = file.previewElement.querySelectorAll(\"[data-dz-thumbnail]\");
                             for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                               thumbnailElement = _ref[_i];
                               //thumbnailElement.alt = file.name;
                               thumbnailElement.src = dataUrl;
                               //\$(thumbnailElement).css('background-image','url(\\''+dataUrl+'\\')').css('background-size','cover').css('background-repeat','no-repeat');
                               //thumbnailElement.style = 'background-image: url('+dataUrl+')';
                             }
                             return setTimeout(((function(_this) {
                               return function() {
                                 return file.previewElement.classList.add(\"dz-image-preview\");
                               };
                             })(this)), 1);
                           }
                         }
                });


            });



            </script>


            <link rel=\"stylesheet\" href=\"/css/dropzone.css\" />   

        </div>

            

        <div class=\"dz-fallback content hidden\" >
          <p>";
            // line 286
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Twoja przeglądarka nie obsługuje dodawania wielu plików jednocześnie"), "html", null, true);
            echo "</p>  
          <form action=\"";
            // line 287
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "schemeAndHttpHost", array()) . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "requestUri", array())), "html", null, true);
            echo "\" style=\"\" enctype=\"multipart/form-data\"  method=\"post\">

          <div class=\"widget\">
            <label>";
            // line 290
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wybierz plik"), "html", null, true);
            echo "</label>
            <div class=\"field\">
            <input name=\"file\" type=\"file\" />
            </div>
          </div>
          <div>
              <button type=\"submit\" id=\"page_save\" name=\"page[save]\" >";
            // line 296
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj zdjęcie"), "html", null, true);
            echo "</button>
          </div>
          </form>  
        </div>      
            
                        
                        
    ";
        }
        // line 304
        echo "




";
    }

    public function getTemplateName()
    {
        return "AppBundle:Product:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  457 => 304,  446 => 296,  437 => 290,  431 => 287,  427 => 286,  353 => 214,  349 => 213,  345 => 212,  340 => 210,  315 => 188,  311 => 187,  303 => 186,  299 => 185,  217 => 105,  204 => 102,  201 => 101,  195 => 99,  189 => 98,  184 => 96,  179 => 95,  175 => 94,  169 => 91,  160 => 89,  153 => 85,  148 => 82,  145 => 54,  143 => 53,  139 => 51,  133 => 48,  129 => 47,  125 => 46,  121 => 45,  118 => 44,  116 => 43,  110 => 39,  107 => 38,  99 => 35,  92 => 31,  88 => 30,  85 => 29,  79 => 27,  77 => 26,  74 => 25,  71 => 24,  65 => 21,  60 => 20,  57 => 19,  45 => 14,  40 => 13,  38 => 12,  35 => 11,  31 => 1,  29 => 4,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* {#{% form_theme form 'AppBundle:Form:base.html.twig' %}#}*/
/* */
/* {% form_theme form _self %}*/
/* */
/* {#{% form_theme form with ['bootstrap_3_layout.html.twig', _self] %}#}*/
/* {#{% form_theme form with ['AppBundle:Form:materialize.html.twig', _self] %}#}*/
/* {#{% form_theme form with ['AppBundle:Form:materialize.html.twig'] %}#}*/
/* */
/* */
/* {% block _product_prices_widget %}*/
/* {% spaceless %}*/
/*     {% for child in form %}*/
/*         {{ form_widget(child) }}*/
/*     {% endfor %}*/
/* {% endspaceless %}*/
/* {% endblock %}*/
/* */
/* {% block _product_prices_row %}*/
/*         {{ form_widget(form) }}*/
/*         {{ form_errors(form) }}*/
/* {% endblock %}*/
/* */
/* {% block _product_translations_row %}*/
/*     <div class="widget">*/
/*         {% if(form.children|length!=1) %}*/
/*             {{ form_label(form) }}*/
/*         {% endif %}*/
/*         */
/*         {{ form_widget(form) }}*/
/*         {{ form_errors(form) }}*/
/*     </div> */
/* {% endblock %}*/
/* */
/* {% block header %}<h1><i class="fa fa-cube"></i>{{ 'Produkt'|trans }}</h1>{% endblock %}*/
/* */
/* */
/* {% block content %}*/
/* */
/* */
/* */
/* */
/*     {% if(app.user.type in ['admin','trader'] ) %}*/
/*     <div class="content">*/
/*         {{ form_start(form) }}*/
/*         {{ form_errors(form) }}*/
/*         {{ form_widget(form) }}*/
/*         {{ form_end(form) }}*/
/*     </div>*/
/*     {% endif %}*/
/*     */
/* */
/*     {% if object.id %}*/
/* */
/*         {#{% if connected or app.user.type=='admin' %}*/
/* */
/*             <h1>Produkty powiązane</h1>*/
/*             <div class="content">*/
/* */
/*             {% if(app.user.type in ['admin','trader'] ) %}*/
/*             <form>*/
/*             <input type="text" name="connect" placeholder="Wpisz nazwę szukanego produktu">*/
/*             </form>*/
/*             {% endif %}*/
/*             <div class="connect-result"></div> */
/* */
/*                 <p class="not-connected" {% if connected %} style="display:none;" {% endif %}>Nie ma dodanych produktów powiązanych.</p>*/
/*                 <div class="table-wrapper"><table class="connected" {% if not connected %} style="display:none;" {% endif %}>*/
/*                     <tr>*/
/*                         <th>Nr</th>*/
/*                         <th>Zdjęcie</th>*/
/*                         <th>Nazwa</th>*/
/*                         <th>Cena</th>*/
/*                         <th>Zmieniono</th>*/
/*                         <th>Utworzono</th>*/
/*                     </tr>*/
/*                     {% if connected %}{% include 'AppBundle:Product:connectList.html.twig' with {"connected": connected, 'i': 1, 'order_id': order_id } only %}{% endif %}     */
/*                 </table></div>*/
/* */
/* */
/*             </div>*/
/*         {% endif %}#}  */
/* */
/* */
/*         <h1><i class="fa fa-photo"></i>{{ 'Zdjęcia produktu'|trans }}</h1>*/
/*         <div class="content">*/
/* */
/*             <div class="drop-wrapper">*/
/*             <form action="{{ app.request.schemeAndHttpHost~app.request.requestUri }}" data-edit="{{ path('image_form')}}" data-sort="{{ path('image_sort')}}"  method="post" class="drop" id="drop">*/
/*                 <div class="dz-message">*/
/*                     {{ 'Upuść tutaj zdjęcia albo kliknij i wybierz je ze swojego urządzenia.'|trans }}<br>*/
/*                 </div>*/
/* */
/*                 {% for image in object.getImagesSort() %}*/
/*                     <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete exists" data-id="{{ image.getId() }}">*/
/*                         <div class="dz-image" style="background-image: url({{ path('thumbnail', {'resolution': '160x120', 'file': image.webPath    })|production }}); background-size: cover; background-repeat: no-repeat;"></div>*/
/*                         <div class="dz-details">*/
/*                             <span data-id="{{image.id}}" class="btn-del tip" title="{{ 'Usuń zdjęcie'|trans }}" ></span>*/
/*                             <span data-id="{{image.id}}" class="btn-def tip" title="{{ 'Ustaw zdjęcie jako domyślne dla tego produktu'|trans }}"></span>*/
/*                             {#<span data-id="{{image.id}}" class="btn-edit tip" title="{{ 'Edytuj zdjęcie'|trans }}"></span>#}*/
/*                         </div>*/
/*                         <span class="is-def tip {% if object.image and image.id==object.image.id %}show{% endif %}" title="{{ 'Zdjęcie jest domyślne dla tego produktu'|trans }}" ></span>*/
/*                     </div>*/
/*                 {% endfor %}*/
/* */
/*             </form>*/
/*             </div>*/
/* */
/* */
/*             <script type="text/javascript" src="/js/dropzone/dropzone.js"></script>*/
/*             <script type="text/javascript">*/
/* */
/* */
/* */
/*             $(document).ready(function() {*/
/* */
/*                 function buttonsBind(container){*/
/*                     if(container.parents('form.drop.ui-sortable').length){ container.parents('form.drop.ui-sortable').find('.dz-preview,.dz-image,.dz-image img,.dz-details').css('cursor', 'move'); }*/
/*                     */
/*                     container.find('form.drop').sortable({ */
/*                         items: ".dz-preview",*/
/*                         placeholder: "dz-preview placeholder",*/
/*                         revert: true,*/
/*                         */
/*                         */
/*                         update: function(){*/
/*                             var sorted = $(this).sortable('toArray',{attribute:'data-id'}).toString();*/
/*                             console.log(sorted);*/
/*                             var url=$(this).data('sort');*/
/*                             $.ajax({url: url+'/'+sorted});            */
/*                         } */
/*                     }).disableSelection().find('.dz-preview,.dz-image,.dz-details').css('cursor', 'move');*/
/*                     */
/*                     */
/*                     */
/*                     container.find(".dz-details span.btn-del").click(function() {*/
/*                         var element=$(this);*/
/* */
/*                         $.post(updateQueryString('order_id',null,$(this).closest('form').attr('action'))+'/image/del', {'delImgId':$(this).data('id')}, function(response) {*/
/*                             if(response.status==true) {*/
/*                                element.parents('.dz-preview').fadeOut(300);*/
/*                             }*/
/*                         });*/
/*                     });*/
/* */
/*                     container.find(".dz-details span.btn-def").click(function() {*/
/*                         var element=$(this);*/
/*                         $.post(updateQueryString('order_id',null,$(this).closest('form').attr('action'))+'/image/def', {'defImgId':$(this).data('id')}, function(response) {*/
/*                             if(response.status==true) {*/
/*                                $('.is-def').removeClass('show');*/
/*                                $(element).parent().parent().find('.is-def').addClass('show'); */
/*                                //element.parents('.dz-preview').fadeOut(300);*/
/*                             }*/
/*                         });*/
/*                     });*/
/*                     */
/*                     container.find(".dz-details span.btn-edit").click(function() {*/
/*                         var element=$(this);*/
/*                         */
/*                         $.ajax({*/
/*                           url: $(this).closest('form').data('edit')+'/'+$(this).data('id'),*/
/*                           //dataType    : 'json',*/
/*                           beforeSend: function( xhr ) {*/
/*                             //xhr.overrideMimeType( "text/plain; charset=x-user-defined" );*/
/*                           }*/
/*                         })*/
/*                         .done(function( data ) {*/
/*                           ajaxForm(data, { test: 1 });*/
/*                         });*/
/*                     });*/
/*                     */
/*                 }*/
/* */
/* */
/*                 buttonsBind($('body'));*/
/* */
/*                 var url=$('#drop').attr('action');*/
/* */
/*                 $('#drop').dropzone({ */
/*                     url: url, */
/*                     autoProcessQueue: true,*/
/*                     autoProcessQueue: true,*/
/*                     maxFilesize: 12,*/
/*                     acceptedFiles: 'image/jpg,image/png,image/jpeg' ,*/
/*                     dictInvalidFileType: '{{ 'Niewłaściwy format pliku, dozwolone pliki to jpg lub png.'|trans }}',*/
/*                     dictFileTooBig: '{{ 'Plik jest za duży. Dozwolony rozmiar to:'|trans }} {{ '{{' }}maxFilesize{{ '}}' }} MB.',*/
/*                     dictResponseError: '{{ 'Wystąpił błąd.'|trans }}',*/
/*                     dictMaxFilesExceeded: '{{ 'Dodałeś zbyt dużo plików.'|trans }}',*/
/*                     */
/*                     thumbnailWidth: 159,*/
/*                     thumbnailHeight: 120,*/
/*                     success: function(file) {*/
/*                       obj = JSON.parse(file.xhr.response);  */
/*                       var def_class='';*/
/*                       if(obj.status!='ok') {*/
/*                         var node, _i, _len, _ref, _results;*/
/*                         var message = obj.message // modify it to your error message*/
/*                         file.previewElement.classList.add("dz-error");*/
/*                         _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");*/
/*                         _results = [];*/
/*                         for (_i = 0, _len = _ref.length; _i < _len; _i++) {*/
/*                           node = _ref[_i];*/
/*                           _results.push(node.textContent = message);*/
/*                         }*/
/*                         return _results;*/
/*                       }*/
/*         */
/*                       if($('.dz-preview.exists').length==0) def_class='show';*/
/* */
/*                       $(file.previewElement).append('<span class="is-def tip '+def_class+'" title="{{ 'Zdjęcie jest domyślne dla tego produktu'|trans }}" ></span>')*/
/*                         .find('.dz-details').html(''+*/
/*                         '<span data-id="'+obj.id+'" class="btn-del tip" title="{{ 'Usuń zdjęcie'|trans }}" ></span>'+*/
/*                         '<span data-id="'+obj.id+'" class="btn-def tip" title="{{ 'Ustaw zdjęcie jako domyślne dla tego produktu'|trans }}"></span>'+*/
/*                         '{#<span data-id="'+obj.id+'" class="btn-edit tip" title="{{ 'Edytuj zdjęcie'|trans }}"></span>#}');*/
/* */
/*                       buttonsBind($(file.previewElement));*/
/*                       preapareContent($(file.previewElement));*/
/* */
/*                       if (file.previewElement) {*/
/*                         return file.previewElement.classList.add("dz-success");*/
/*                       }*/
/* */
/*                     },*/
/*                     fallback: function() {*/
/*                         */
/*                         $('.dz-fallback').show();*/
/*                         $('.dz-message').hide();*/
/*                         */
/*                         var child, messageElement, span, _i, _len, _ref;*/
/*                         this.element.className = "" + this.element.className + " dz-browser-not-supported";*/
/*                         _ref = this.element.getElementsByTagName("div");*/
/*                         for (_i = 0, _len = _ref.length; _i < _len; _i++) {*/
/*                           child = _ref[_i];*/
/*                           if (/(^| )dz-message($| )/.test(child.className)) {*/
/*                             messageElement = child;*/
/*                             child.className = "dz-message";*/
/*                             continue;*/
/*                           }*/
/*                         }*/
/*                         if (!messageElement) {*/
/*                           messageElement = Dropzone.createElement("<div class=\"dz-message\"><span></span></div>");*/
/*                           this.element.appendChild(messageElement);*/
/*                         }*/
/*                         span = messageElement.getElementsByTagName("span")[0];*/
/*                         if (span) {*/
/*                           span.textContent = this.options.dictFallbackMessage;*/
/*                         }*/
/*                         return this.element.appendChild(this.getFallbackForm());*/
/*                     },*/
/*                     thumbnail: function(file, dataUrl) {*/
/*                            var thumbnailElement, _i, _len, _ref;*/
/*                            if (file.previewElement) {*/
/*                              file.previewElement.classList.remove("dz-file-preview");*/
/*                              _ref = file.previewElement.querySelectorAll("[data-dz-thumbnail]");*/
/*                              for (_i = 0, _len = _ref.length; _i < _len; _i++) {*/
/*                                thumbnailElement = _ref[_i];*/
/*                                //thumbnailElement.alt = file.name;*/
/*                                thumbnailElement.src = dataUrl;*/
/*                                //$(thumbnailElement).css('background-image','url(\''+dataUrl+'\')').css('background-size','cover').css('background-repeat','no-repeat');*/
/*                                //thumbnailElement.style = 'background-image: url('+dataUrl+')';*/
/*                              }*/
/*                              return setTimeout(((function(_this) {*/
/*                                return function() {*/
/*                                  return file.previewElement.classList.add("dz-image-preview");*/
/*                                };*/
/*                              })(this)), 1);*/
/*                            }*/
/*                          }*/
/*                 });*/
/* */
/* */
/*             });*/
/* */
/* */
/* */
/*             </script>*/
/* */
/* */
/*             <link rel="stylesheet" href="/css/dropzone.css" />   */
/* */
/*         </div>*/
/* */
/*             */
/* */
/*         <div class="dz-fallback content hidden" >*/
/*           <p>{{ 'Twoja przeglądarka nie obsługuje dodawania wielu plików jednocześnie'|trans }}</p>  */
/*           <form action="{{ app.request.schemeAndHttpHost~app.request.requestUri }}" style="" enctype="multipart/form-data"  method="post">*/
/* */
/*           <div class="widget">*/
/*             <label>{{ 'Wybierz plik'|trans }}</label>*/
/*             <div class="field">*/
/*             <input name="file" type="file" />*/
/*             </div>*/
/*           </div>*/
/*           <div>*/
/*               <button type="submit" id="page_save" name="page[save]" >{{ 'Dodaj zdjęcie'|trans }}</button>*/
/*           </div>*/
/*           </form>  */
/*         </div>      */
/*             */
/*                         */
/*                         */
/*     {% endif %}*/
/* */
/* */
/* */
/* */
/* */
/* {% endblock %}*/
