<?php

/* AppBundle:Public:cemetery.html.twig */
class __TwigTemplate_acba724dab6db0b238fc85e6f781db61f8a3c74b8ddce1e1352257cc56739275 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("home.html.twig", "AppBundle:Public:cemetery.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'description' => array($this, 'block_description'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "home.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "name", array()), "html", null, true);
    }

    // line 4
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "address", array()), "city", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "address", array()), "postalcode", array()), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "address", array()), "address", array()), "html", null, true);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "<div class=\"admin cemetery\">
    
    <div class=\"first-content cemetery-info\"> 

        <div class=\"size\">
            <div class=\"description\">
                <h1 class=\"delay2 triggerAnimation\" data-animate=\"fadeInRight\">";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "name", array()), "html", null, true);
        echo "&nbsp;&nbsp;<i class=\"badge\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ilość osób:"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["pages"]) ? $context["pages"] : null)), "html", null, true);
        echo "</i></h1>
                <p class=\"time delay2 triggerAnimation\" data-animate=\"fadeInRight\">";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "address", array()), "city", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "address", array()), "postalcode", array()), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "address", array()), "address", array()), "html", null, true);
        echo "</p>
            </div>

        </div>
    </div> 
                
    
    <div class=\"size\">    
        
        <div class=\"notifications\">
            ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification notice\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "warning"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification warning\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification success\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            echo "<div class=\"notification error\">";
            echo $context["flashMessage"];
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "        </div>
        
        
        <div class=\"full\">
        
            <h1>";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mapa"), "html", null, true);
        echo "</h1>

            <div class=\"content\">
                <div class=\"options\">
                    <a href=\"https://maps.apple.com/?q=";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "localisation", array()), "latitude", array()), "html", null, true);
        echo ",";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "localisation", array()), "longitude", array()), "html", null, true);
        echo "\" target=\"_blank\" class=\"button small\"><i class=\"fa fa-location-arrow\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prowadź do miejsca"), "html", null, true);
        echo "</a>
                </div>
                
                <div id=\"map\" class=\"map\"></div>
                <script>
                  \$(function() {


                    var latLng = {lat: ";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "localisation", array()), "latitude", array()), "html", null, true);
        echo ", lng: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "localisation", array()), "longitude", array()), "html", null, true);
        echo "};
                    
                    var map = new google.maps.Map(document.getElementById('map'), {
                      center: latLng,
                      zoom: 15
                    });
                    var marker = new google.maps.Marker({
                      position: latLng,
                      map: map,
                      title: '";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cemetery"]) ? $context["cemetery"] : null), "name", array()), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cmentarz"), "html", null, true);
        echo "'
                    });
                  });
                </script>
            </div>
           

            ";
        // line 61
        if ((twig_length_filter($this->env, (isset($context["pages"]) ? $context["pages"] : null)) > 0)) {
            // line 62
            echo "            <h1>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Osoby zmarłe"), "html", null, true);
            echo "</h1>
            
            <div class=\"content pages\">
                ";
            // line 65
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pages"]) ? $context["pages"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["fa"]) {
                // line 66
                echo "                <div class=\"element\">  
                    <a href=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->pageUrl($this->getAttribute($context["fa"], "code", array())), "html", null, true);
                echo "\">
                    <div class=\"avatar\" style=\"background-image:url('";
                // line 68
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "60x60", "file" => $this->getAttribute($context["fa"], "avatar", array())))), "html", null, true);
                echo "');\"></div>    
                    
                    <p class=\"name\">
                        <i class=\"fa fa-eye\"></i>
                        ";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["fa"], "translate", array(0 => $this->getAttribute($context["fa"], "locale", array())), "method"), "name", array()), "html", null, true);
                echo "
                        <span>";
                // line 73
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["fa"], "begin", array())), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute($context["fa"], "end", array())), "html", null, true);
                echo "</span>
                    </p>
                    </a>
                </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fa'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 78
            echo "            </div>
            ";
        }
        // line 79
        echo " 
        </div>

    </div>
    
</div>    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Public:cemetery.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  234 => 79,  230 => 78,  217 => 73,  213 => 72,  206 => 68,  202 => 67,  199 => 66,  195 => 65,  188 => 62,  186 => 61,  174 => 54,  160 => 45,  145 => 37,  138 => 33,  131 => 28,  119 => 27,  107 => 26,  95 => 25,  84 => 24,  67 => 14,  59 => 13,  51 => 7,  48 => 6,  36 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends "home.html.twig" %}*/
/* */
/* {% block title %}{{ cemetery.name }}{% endblock %}*/
/* {% block description %}{{ 'Adres'|trans }}: {{ cemetery.address.city }} {{ cemetery.address.postalcode }}, {{ cemetery.address.address }}{% endblock %}*/
/* */
/* {% block content %}*/
/* <div class="admin cemetery">*/
/*     */
/*     <div class="first-content cemetery-info"> */
/* */
/*         <div class="size">*/
/*             <div class="description">*/
/*                 <h1 class="delay2 triggerAnimation" data-animate="fadeInRight">{{ cemetery.name }}&nbsp;&nbsp;<i class="badge">{{ 'Ilość osób:'|trans }} {{ pages|length }}</i></h1>*/
/*                 <p class="time delay2 triggerAnimation" data-animate="fadeInRight">{{ cemetery.address.city }} {{ cemetery.address.postalcode }}, {{ cemetery.address.address }}</p>*/
/*             </div>*/
/* */
/*         </div>*/
/*     </div> */
/*                 */
/*     */
/*     <div class="size">    */
/*         */
/*         <div class="notifications">*/
/*             {% for flashMessage in app.session.flashbag.get('notice') %}<div class="notification notice">{{ flashMessage|raw }}</div>{% endfor %}*/
/*             {% for flashMessage in app.session.flashbag.get('warning') %}<div class="notification warning">{{ flashMessage|raw }}</div>{% endfor %}*/
/*             {% for flashMessage in app.session.flashbag.get('success') %}<div class="notification success">{{ flashMessage|raw }}</div>{% endfor %}*/
/*             {% for flashMessage in app.session.flashbag.get('error') %}<div class="notification error">{{ flashMessage|raw }}</div>{% endfor %}*/
/*         </div>*/
/*         */
/*         */
/*         <div class="full">*/
/*         */
/*             <h1>{{ 'Mapa'|trans }}</h1>*/
/* */
/*             <div class="content">*/
/*                 <div class="options">*/
/*                     <a href="https://maps.apple.com/?q={{ cemetery.localisation.latitude }},{{ cemetery.localisation.longitude }}" target="_blank" class="button small"><i class="fa fa-location-arrow"></i>{{ 'Prowadź do miejsca'|trans }}</a>*/
/*                 </div>*/
/*                 */
/*                 <div id="map" class="map"></div>*/
/*                 <script>*/
/*                   $(function() {*/
/* */
/* */
/*                     var latLng = {lat: {{ cemetery.localisation.latitude }}, lng: {{ cemetery.localisation.longitude }}};*/
/*                     */
/*                     var map = new google.maps.Map(document.getElementById('map'), {*/
/*                       center: latLng,*/
/*                       zoom: 15*/
/*                     });*/
/*                     var marker = new google.maps.Marker({*/
/*                       position: latLng,*/
/*                       map: map,*/
/*                       title: '{{ cemetery.name }}, {{ 'Cmentarz'|trans }}'*/
/*                     });*/
/*                   });*/
/*                 </script>*/
/*             </div>*/
/*            */
/* */
/*             {% if pages|length>0 %}*/
/*             <h1>{{ 'Osoby zmarłe'|trans }}</h1>*/
/*             */
/*             <div class="content pages">*/
/*                 {% for fa in pages %}*/
/*                 <div class="element">  */
/*                     <a href="{{path_page(fa.code)}}">*/
/*                     <div class="avatar" style="background-image:url('{{ path('thumbnail', {'resolution': '60x60', 'file': fa.avatar })|production }}');"></div>    */
/*                     */
/*                     <p class="name">*/
/*                         <i class="fa fa-eye"></i>*/
/*                         {{ fa.translate(fa.locale).name }}*/
/*                         <span>{{ fa.begin|mydate }} - {{ fa.end|mydate }}</span>*/
/*                     </p>*/
/*                     </a>*/
/*                 </div>*/
/*                 {% endfor %}*/
/*             </div>*/
/*             {% endif %} */
/*         </div>*/
/* */
/*     </div>*/
/*     */
/* </div>    */
/* {% endblock %}*/
