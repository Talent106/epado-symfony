<?php

/* mail.html.twig */
class __TwigTemplate_8b43d15846acfb371cc3e91c242fce8faa10a2dccb6b4ea242e50b927bed7764 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html style=\"\">
    <head>
        <meta charset=\"UTF-8\" />
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    </head>    


    <body style=\"padding:40px 0px;     
    background: url(";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array(), "method"), "html", null, true);
        echo "/images/pattern_light_small.jpg) repeat;
    background-position: 0 -10px; background-color:#ddd; text-align:center; background-repeat: repeat;
    ";
        // line 12
        echo " \">
        
            
            
            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                <tr>
                    <td align=\"center\">
                      <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"background-color:#fff; border:1px solid #c2c2c2; box-shadow: 0px 0px 5px #888888; width:100%; max-width:600px;\">
                          <tr>
                              <td align=\"left\" class=\"content\" style=\"padding:20px 30px; padding-bottom:15px; font-size:13px; font-family:arial; line-height:20px; color:#222;\">

                                    ";
        // line 24
        echo "                                   
                                    ";
        // line 25
        $this->displayBlock('content', $context, $blocks);
        // line 26
        echo "                                    
                                    <p>
                                       <b>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pozdrawiamy,"), "html", null, true);
        echo "</b><br /><br />
                                       ";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zespół Epado"), "html", null, true);
        echo "<br />
                                       
                                       <img src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array(), "method"), "html", null, true);
        echo "/images/logo-border.png\" style=\"margin-bottom:10px; margin-top:10px;\" /><br />

                                       Email: office@epado.com
                                    </p>
                                    
                              </td>
                          </tr>
                      </table>        
                    </td>
                </tr>
            </table>
        
            <style>
                ";
        // line 102
        echo "                
            </style>       
    </body>
</html>
";
    }

    // line 25
    public function block_content($context, array $blocks = array())
    {
        echo "<p>";
        echo (isset($context["content"]) ? $context["content"] : null);
        echo "</p>";
    }

    public function getTemplateName()
    {
        return "mail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 25,  83 => 102,  67 => 31,  62 => 29,  58 => 28,  54 => 26,  52 => 25,  49 => 24,  36 => 12,  31 => 10,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html style="">*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />*/
/*     </head>    */
/* */
/* */
/*     <body style="padding:40px 0px;     */
/*     background: url({{ app.request.getSchemeAndHttpHost() }}/images/pattern_light_small.jpg) repeat;*/
/*     background-position: 0 -10px; background-color:#ddd; text-align:center; background-repeat: repeat;*/
/*     {#background-attachment: fixed;#} ">*/
/*         */
/*             */
/*             */
/*             <table width="100%" border="0" cellspacing="0" cellpadding="0">*/
/*                 <tr>*/
/*                     <td align="center">*/
/*                       <table border="0" cellspacing="0" cellpadding="0" style="background-color:#fff; border:1px solid #c2c2c2; box-shadow: 0px 0px 5px #888888; width:100%; max-width:600px;">*/
/*                           <tr>*/
/*                               <td align="left" class="content" style="padding:20px 30px; padding-bottom:15px; font-size:13px; font-family:arial; line-height:20px; color:#222;">*/
/* */
/*                                     {#<p>Witaj,</p>#}*/
/*                                    */
/*                                     {% block content %}<p>{{content|raw}}</p>{% endblock %}*/
/*                                     */
/*                                     <p>*/
/*                                        <b>{{ 'Pozdrawiamy,'|trans }}</b><br /><br />*/
/*                                        {{ 'Zespół Epado'|trans }}<br />*/
/*                                        */
/*                                        <img src="{{ app.request.getSchemeAndHttpHost() }}/images/logo-border.png" style="margin-bottom:10px; margin-top:10px;" /><br />*/
/* */
/*                                        Email: office@epado.com*/
/*                                     </p>*/
/*                                     */
/*                               </td>*/
/*                           </tr>*/
/*                       </table>        */
/*                     </td>*/
/*                 </tr>*/
/*             </table>*/
/*         */
/*             <style>*/
/*                 {#*/
/*                 p,td,th,li,h1,h2,h3{*/
/*                     font-family:Arial;*/
/*                     color:#666;*/
/*                 }*/
/*                 */
/*                 b{*/
/*                     font-size: 30px; line-height: 38px;  */
/*                     color: #062340;*/
/*                     font-family: Arial,sans-serif;*/
/*                     display:block;*/
/*                 }*/
/*                 */
/*                 p,td,th,li{*/
/*                     line-height:18px;*/
/*                     margin-bottom:20px;*/
/*                     margin-top:0;*/
/*                 }*/
/*                 */
/*                 h1,h2,h3{*/
/*                     font-size:24px;*/
/*                     line-height:30px;*/
/*                     margin-bottom:20px;*/
/*                 }*/
/*                 */
/*                 table{*/
/*                     border-collapse: collapse;*/
/*                     margin-bottom:20px;*/
/*                 }*/
/* */
/*                 td, th{*/
/*                     border:0px solid #ddd;*/
/*                     padding:4px 6px;*/
/*                 }*/
/*                 */
/*                 .content td, .content th{*/
/*                     border:1px solid #ddd;*/
/*                     padding:4px 6px;*/
/*                     text-align:left;*/
/*                 }*/
/*                 */
/*                 .content table{*/
/*                     width:100%;*/
/*                 }*/
/*                 */
/*                 */
/*                 table.products th{*/
/*                     background-color: #ddd;*/
/*                 }*/
/*                 */
/*                 table.products td, table.products th{*/
/*                     border:1px solid #ddd;*/
/*                 }*/
/*                 */
/*                 .hidden td, .hidden th{*/
/*                     border:0px solid #ddd;*/
/*                     padding:0;*/
/*                 } #}*/
/*                 */
/*             </style>       */
/*     </body>*/
/* </html>*/
/* */
