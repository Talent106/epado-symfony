<?php

/* AppBundle:Product:products.html.twig */
class __TwigTemplate_335cc9bfa04909f4a447fb580ae46e95be061876042f5b04fe30e37594a6bd18 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "    ";
        if ((isset($context["products"]) ? $context["products"] : null)) {
            // line 2
            echo "        <div class=\"content products boxes\">    
            ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 4
                echo "                <div class=\"product box\">
                    <div class=\"image showproduct\" style=\"background-image:url('";
                // line 5
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "300x200", "file" => $this->getAttribute($context["product"], "avatar", array())))), "html", null, true);
                echo "');\"></div>
                    <div class=\"name showproduct\">";
                // line 6
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                echo "</div>
                    ";
                // line 7
                if (((($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "discount", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "partner"))) && ($this->getAttribute($this->getAttribute($context["product"], "category", array()), "id", array()) == 2))) {
                    // line 8
                    echo "                        ";
                    if (($this->getAttribute($context["product"], "pricediscount", array(0 => $this->env->getExtension('app_extension')->getCurrency(), 1 => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "discount", array())), "method") != $this->getAttribute($context["product"], "price", array(0 => $this->env->getExtension('app_extension')->getCurrency()), "method"))) {
                        echo "   
                          <div class=\"price showproduct oldprice\">";
                        // line 9
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($context["product"], "price", array(0 => $this->env->getExtension('app_extension')->getCurrency()), "method")), "html", null, true);
                        echo "</div>   
                        ";
                    }
                    // line 10
                    echo "    
                        <div class=\"price showproduct\">";
                    // line 11
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($context["product"], "pricediscount", array(0 => $this->env->getExtension('app_extension')->getCurrency(), 1 => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "discount", array())), "method")), "html", null, true);
                    echo "</div> 
                    ";
                } else {
                    // line 13
                    echo "                        <div class=\"price showproduct\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($context["product"], "price", array(0 => $this->env->getExtension('app_extension')->getCurrency()), "method")), "html", null, true);
                    echo "</div> 
                    ";
                }
                // line 14
                echo "    
                    
                    <div class=\"hidden showproductdiv\">
                        <h1><i class=\"fa fa-shopping-cart\"></i>";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                echo "</h1>
                        <div class=\"content productinformation\">
                            <div class=\"page\">
                                <img src=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "480x160", "file" => $this->getAttribute($context["product"], "avatar", array())))), "html", null, true);
                echo "\" class=\"image\">
                    
                                <p>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "description", array()), "html", null, true);
                echo "</p>
                                
                                <p>
                                ";
                // line 25
                if (((($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "discount", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "partner"))) && ($this->getAttribute($this->getAttribute($context["product"], "category", array()), "id", array()) == 2))) {
                    // line 26
                    echo "                                    ";
                    if (($this->getAttribute($context["product"], "pricediscount", array(0 => $this->env->getExtension('app_extension')->getCurrency(), 1 => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "discount", array())), "method") != $this->getAttribute($context["product"], "price", array(0 => $this->env->getExtension('app_extension')->getCurrency()), "method"))) {
                        echo "   
                                      ";
                        // line 27
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cena detaliczna"), "html", null, true);
                        echo ": <span class=\"oldprice\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($context["product"], "price", array(0 => $this->env->getExtension('app_extension')->getCurrency()), "method")), "html", null, true);
                        echo "</span><br>   
                                    ";
                    }
                    // line 28
                    echo "    
                                    ";
                    // line 29
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cena dla partnera"), "html", null, true);
                    echo ": <span>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($context["product"], "pricediscount", array(0 => $this->env->getExtension('app_extension')->getCurrency(), 1 => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "discount", array())), "method")), "html", null, true);
                    echo "</span> 
                                ";
                } else {
                    // line 31
                    echo "                                    ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cena"), "html", null, true);
                    echo ": <span>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($context["product"], "price", array(0 => $this->env->getExtension('app_extension')->getCurrency()), "method")), "html", null, true);
                    echo "</span> 
                                ";
                }
                // line 32
                echo "  
                                </p>
                                
                            </div>
                                
                            ";
                // line 37
                if ( !array_key_exists("page", $context)) {
                    // line 38
                    echo "                            <form method=\"get\" action=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cart", array("product_id" => $this->getAttribute($context["product"], "id", array()))), "html", null, true);
                    echo "\">
                                
                                ";
                    // line 40
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ilość zamawianych sztuk"), "html", null, true);
                    echo ": <input type=\"text\" name=\"amount\" value=\"1\" required=\"required\" class=\"tip\" onkeydown=\"return ( event.ctrlKey || event.altKey 
                                || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                || (95<event.keyCode && event.keyCode<106)
                                || (event.keyCode==8) || (event.keyCode==9) 
                                || (event.keyCode>34 && event.keyCode<40) 
                                || (event.keyCode==46) )\">

                                <button type=\"submit\" name=\"submit\"><i class=\"fa fa-shopping-cart\"></i> ";
                    // line 47
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamów"), "html", null, true);
                    echo "</button>
                            </form>
                            ";
                }
                // line 50
                echo "                                
                        </div>
                    </div>
                    ";
                // line 53
                if (array_key_exists("page", $context)) {
                    // line 54
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cart", array("product_id" => $this->getAttribute($context["product"], "id", array()), "page_id" => $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id", array()))), "html", null, true);
                    echo "\" class=\"button\"><i class=\"fa fa-shopping-cart\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamów"), "html", null, true);
                    echo "</a>
                    ";
                } else {
                    // line 55
                    echo "    
                    <a href=\"";
                    // line 56
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cart", array("product_id" => $this->getAttribute($context["product"], "id", array()))), "html", null, true);
                    echo "\" class=\"button\"><i class=\"fa fa-shopping-cart\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamów"), "html", null, true);
                    echo "</a>
                    ";
                }
                // line 58
                echo "                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "    
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "AppBundle:Product:products.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 59,  176 => 58,  169 => 56,  166 => 55,  158 => 54,  156 => 53,  151 => 50,  145 => 47,  135 => 40,  129 => 38,  127 => 37,  120 => 32,  112 => 31,  105 => 29,  102 => 28,  95 => 27,  90 => 26,  88 => 25,  82 => 22,  77 => 20,  71 => 17,  66 => 14,  60 => 13,  55 => 11,  52 => 10,  47 => 9,  42 => 8,  40 => 7,  36 => 6,  32 => 5,  29 => 4,  25 => 3,  22 => 2,  19 => 1,);
    }
}
/*     {% if products %}*/
/*         <div class="content products boxes">    */
/*             {% for product in products %}*/
/*                 <div class="product box">*/
/*                     <div class="image showproduct" style="background-image:url('{{ path('thumbnail', {'resolution': '300x200', 'file': product.avatar })|production }}');"></div>*/
/*                     <div class="name showproduct">{{ product.name }}</div>*/
/*                     {% if(app.user and app.user.discount and app.user.type in ['admin','worker','trader','partner'] and product.category.id==2 ) %}*/
/*                         {% if(product.pricediscount(currency(),app.user.discount)!=product.price(currency())) %}   */
/*                           <div class="price showproduct oldprice">{{ product.price(currency())|price }}</div>   */
/*                         {% endif %}    */
/*                         <div class="price showproduct">{{ product.pricediscount(currency(),app.user.discount)|price }}</div> */
/*                     {% else %}*/
/*                         <div class="price showproduct">{{ product.price(currency())|price }}</div> */
/*                     {% endif %}    */
/*                     */
/*                     <div class="hidden showproductdiv">*/
/*                         <h1><i class="fa fa-shopping-cart"></i>{{ product.name }}</h1>*/
/*                         <div class="content productinformation">*/
/*                             <div class="page">*/
/*                                 <img src="{{ path('thumbnail', {'resolution': '480x160', 'file': product.avatar })|production }}" class="image">*/
/*                     */
/*                                 <p>{{ product.description }}</p>*/
/*                                 */
/*                                 <p>*/
/*                                 {% if(app.user and app.user.discount and app.user.type in ['admin','worker','trader','partner'] and product.category.id==2 ) %}*/
/*                                     {% if(product.pricediscount(currency(),app.user.discount)!=product.price(currency())) %}   */
/*                                       {{ 'Cena detaliczna'|trans }}: <span class="oldprice">{{ product.price(currency())|price }}</span><br>   */
/*                                     {% endif %}    */
/*                                     {{ 'Cena dla partnera'|trans }}: <span>{{ product.pricediscount(currency(),app.user.discount)|price }}</span> */
/*                                 {% else %}*/
/*                                     {{ 'Cena'|trans }}: <span>{{ product.price(currency())|price }}</span> */
/*                                 {% endif %}  */
/*                                 </p>*/
/*                                 */
/*                             </div>*/
/*                                 */
/*                             {% if(page is not defined) %}*/
/*                             <form method="get" action="{{ path('cart',{'product_id':product.id})}}">*/
/*                                 */
/*                                 {{ 'Ilość zamawianych sztuk'|trans }}: <input type="text" name="amount" value="1" required="required" class="tip" onkeydown="return ( event.ctrlKey || event.altKey */
/*                                 || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) */
/*                                 || (95<event.keyCode && event.keyCode<106)*/
/*                                 || (event.keyCode==8) || (event.keyCode==9) */
/*                                 || (event.keyCode>34 && event.keyCode<40) */
/*                                 || (event.keyCode==46) )">*/
/* */
/*                                 <button type="submit" name="submit"><i class="fa fa-shopping-cart"></i> {{ 'Zamów'|trans }}</button>*/
/*                             </form>*/
/*                             {% endif %}*/
/*                                 */
/*                         </div>*/
/*                     </div>*/
/*                     {% if(page is defined) %}*/
/*                     <a href="{{ path('cart',{'product_id':product.id,'page_id':page.id})}}" class="button"><i class="fa fa-shopping-cart"></i> {{ 'Zamów'|trans }}</a>*/
/*                     {% else %}    */
/*                     <a href="{{ path('cart',{'product_id':product.id})}}" class="button"><i class="fa fa-shopping-cart"></i> {{ 'Zamów'|trans }}</a>*/
/*                     {% endif %}*/
/*                 </div>*/
/*             {% endfor %}    */
/*         </div>*/
/*     {% endif %}*/
