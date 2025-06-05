<?php

/* AppBundle:Order:form.html.twig */
class __TwigTemplate_34187ee061cc1b4bfa684d5b631fee31760d90a777acb0bfa1029e73da947047 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Order:form.html.twig", 1);
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

    // line 4
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-shopping-cart\"></i>";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array())) {
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "canceled", array())) {
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienie anulowane"), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienie"), "html", null, true);
            }
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("nr"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
        } else {
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "canceled", array())) {
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Koszyk anulowany"), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Koszyk"), "html", null, true);
            }
        }
        echo "</h1>";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    
    



    ";
        // line 12
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array())) {
            // line 13
            echo "        
        
        

        ";
            // line 18
            echo "
        <div class=\"content order\">
            ";
            // line 20
            if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproducts", array()), "first", array(), "method")) {
                // line 21
                echo "
                <div class=\"table-wrapper\"><table>
                        <tr>
                            <th class=\"notmobile\">";
                // line 24
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zdjęcie"), "html", null, true);
                echo "</th>
                            <th>";
                // line 25
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
                echo "</th>
                            ";
                // line 26
                if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array())) {
                    // line 27
                    echo "                                <th>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zmiany"), "html", null, true);
                    echo "</th>    
                            ";
                } else {
                    // line 28
                    echo "  
                                ";
                    // line 32
                    echo "                            ";
                }
                // line 33
                echo "                            <th class=\"notmobile\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Cena"), "html", null, true);
                echo "</th>
                            <th class=\"notmobile\">";
                // line 34
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Suma"), "html", null, true);
                echo "</th>

                        </tr>
                    ";
                // line 37
                $context["i"] = 0;
                echo "    
                    ";
                // line 38
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproducts", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["object_product"]) {
                    $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                    // line 39
                    echo "                        <tr>
                            <td class=\"image notmobile\"><div class=\"avatar\" style=\"background-image:url('";
                    // line 40
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "42x42", "file" => $this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "avatar", array())))), "html", null, true);
                    echo "');\"></div></td> 
                            <td>
                                ";
                    // line 42
                    if (twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader", 2 => "worker"))) {
                        // line 43
                        echo "                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_form", array("id" => $this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "id", array()), "order_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "name", array()), "html", null, true);
                        echo "</a>
                                ";
                    } else {
                        // line 45
                        echo "                                    ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "name", array()), "html", null, true);
                        echo "
                                ";
                    }
                    // line 47
                    echo "                                
                                ";
                    // line 48
                    if ($this->getAttribute($context["object_product"], "page", array())) {
                        // line 49
                        echo "                                <br>
                                ";
                        // line 50
                        if ( !(null === $this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "code", array()))) {
                            // line 51
                            echo "                                    <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->pageUrl($this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "code", array())), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona"), "html", null, true);
                            echo ": ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "translate", array(0 => $this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "locale", array())), "method"), "name", array()), "html", null, true);
                            echo "</a>
                                ";
                        } else {
                            // line 53
                            echo "                                    <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "id", array()), "order_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona"), "html", null, true);
                            echo ": ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "translate", array(0 => $this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "locale", array())), "method"), "name", array()), "html", null, true);
                            echo "</a>   
                                ";
                        }
                        // line 54
                        echo "    
                                
                                ";
                    }
                    // line 56
                    echo " 
                                <div class=\"mobile\">
                                    ";
                    // line 58
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($context["object_product"], "price", array()), $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "currency", array())), "html", null, true);
                    echo " (x";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "amount", array()), "html", null, true);
                    echo ")
                                </div>
                            </td>
                            
                            ";
                    // line 62
                    if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array())) {
                        // line 63
                        echo "                                <td>    
                                <form action=\"\" method=\"post\">
                                    
                                    <input type=\"text\" class=\"amount\" name=\"new_amount\" ";
                        // line 66
                        if ($this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "single", array())) {
                            echo "disabled=\"disabled\"";
                        }
                        echo " value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "amount", array()), "html", null, true);
                        echo "\" />
                                    ";
                        // line 67
                        if ( !$this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "single", array())) {
                            // line 68
                            echo "                                    <input type=\"hidden\" name=\"order_product_id\" value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "id", array()), "html", null, true);
                            echo "\" />   
                                    <button type=\"submit\" class=\"small icon\"><i class=\"fa fa-pencil\"></i></button>
                                    ";
                        }
                        // line 71
                        echo "                                    <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("order_product_id" => $this->getAttribute($context["object_product"], "id", array()), "new_amount" => 0)), "html", null, true);
                        echo "\" class=\"button small icon\"><i class=\"fa fa-close\"></i></a>    
                                
                                </form>
                                </td>    
                            ";
                    } else {
                        // line 75
                        echo "  
                                ";
                        // line 85
                        echo "                            ";
                    }
                    // line 86
                    echo "                            
                            <td class=\"notmobile\">";
                    // line 87
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute($context["object_product"], "price", array()), $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "currency", array())), "html", null, true);
                    echo " (x";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "amount", array()), "html", null, true);
                    echo ")</td>
                            <td class=\"notmobile\">";
                    // line 88
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter(($this->getAttribute($context["object_product"], "price", array()) * $this->getAttribute($context["object_product"], "amount", array())), $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "currency", array())), "html", null, true);
                    echo "</td>

                        </tr>
                       
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object_product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 93
                echo "                        <tr>
                            <td class=\"notmobile\"></td>
                            <td><div class=\"mobile\">";
                // line 95
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Suma"), "html", null, true);
                echo ": ";
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "price", array()), $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "currency", array())), "html", null, true);
                echo "</div></td>
                            ";
                // line 96
                if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array())) {
                    // line 97
                    echo "                            <td></td>    
                            ";
                } else {
                    // line 98
                    echo "  
                                ";
                    // line 102
                    echo "                            ";
                }
                // line 103
                echo "                            <td class=\"notmobile\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Suma"), "html", null, true);
                echo "</td>
                            <td class=\"notmobile\">";
                // line 104
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->priceFilter($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "price", array()), $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "currency", array())), "html", null, true);
                echo "</td>

                        </tr>
                </table></div>
                ";
                // line 108
                if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproducts", array(), "any", false, true), "first", array(), "method", false, true), "product", array(), "any", false, true), "category", array(), "any", true, true)) {
                    echo "          
                ";
                    // line 109
                    if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproducts", array()), "first", array(), "method"), "product", array()), "category", array()), "id", array()) == 2) &&  !(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()))) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "worker", 2 => "trader", 3 => "partner")))) {
                        // line 110
                        echo "                    <div class=\"options\">
                        <a class=\"button\" href=\"";
                        // line 111
                        echo $this->env->getExtension('routing')->getPath("shop");
                        echo "\"><i class=\"fa fa-fw fa-shopping-cart\"></i>";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wróć do zakupów"), "html", null, true);
                        echo "</a>  
                    </div>
                ";
                    }
                    // line 113
                    echo "         
                ";
                }
                // line 114
                echo "  
                
                ";
                // line 116
                $context["contract"] = 0;
                // line 117
                echo "                ";
                $context["send"] = 1;
                // line 118
                echo "                ";
                if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array()) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "paid", array()))) {
                    echo "   
                ";
                    // line 119
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproducts", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["object_product"]) {
                        echo " 
                    ";
                        // line 120
                        if (($this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "type", array()), "id", array()) == "3")) {
                            // line 121
                            echo "                        ";
                            $context["contract"] = 1;
                            // line 122
                            echo "                    ";
                        }
                        // line 123
                        echo "                    ";
                        if (($this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "type", array()), "id", array()) == "2")) {
                            // line 124
                            echo "                        ";
                            $context["send"] = 1;
                            // line 125
                            echo "                    ";
                        }
                        // line 126
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object_product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 127
                    echo "                ";
                    if (((isset($context["contract"]) ? $context["contract"] : null) == 1)) {
                        // line 128
                        echo "                <p>";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("W zamówieniu znajdują się usługi które można przeglądać w zakładce z usługami. Znajdzie się tam informacja o ich przebiegu."), "html", null, true);
                        echo "</p>
                <div class=\"options\"><a href=\"";
                        // line 129
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contract_list", array("o_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "op_state" =>  -1)), "html", null, true);
                        echo "\" class=\"button\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Przejdź do listy usług"), "html", null, true);
                        echo "</a></div>
                ";
                    }
                    // line 131
                    echo "                ";
                }
                echo " 
                
                
            ";
            } else {
                // line 135
                echo "                <p>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Obecnie Twój koszyk jest pusty. Możesz dodać do niego produkty na jednej ze swoich stron Epado. Jeżeli nie masz dodanej strony możesz ją dodać, wystarczy wypełnić prosty formularz ze wszystkimi danymi dotyczącymi upamiętnianej osoby lub miejsca."), "html", null, true);
                echo "</p>
            ";
            }
            // line 137
            echo "
            
            

        </div>
            
        ";
            // line 143
            if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "payments", array()), "first", array(), "method")) {
                // line 144
                echo "        <div class=\"content\">
                <div class=\"table-wrapper\"><table>
                        <tr>
                            <th>";
                // line 147
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr płatności"), "html", null, true);
                echo "</th>
                            <th>";
                // line 148
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Status"), "html", null, true);
                echo "</th>
                            <th>";
                // line 149
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Utworzono"), "html", null, true);
                echo "</th>
                            <th class=\"notmobile\">";
                // line 150
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ostatnia zmiana"), "html", null, true);
                echo "</th>
                        </tr>    
                    ";
                // line 152
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "payments", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["payment"]) {
                    // line 153
                    echo "                        <tr>
                            <td>";
                    // line 154
                    echo twig_escape_filter($this->env, $this->getAttribute($context["payment"], "id", array()), "html", null, true);
                    echo "</td> 
                            <td>";
                    // line 155
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->paymentFilter($this->getAttribute($context["payment"], "status", array())), "html", null, true);
                    echo "</td>
                            <td>";
                    // line 156
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateTimeFilter($this->getAttribute($context["payment"], "created", array())), "html", null, true);
                    echo "</td>
                            <td class=\"notmobile\">";
                    // line 157
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateTimeFilter($this->getAttribute($context["payment"], "updated", array())), "html", null, true);
                    echo "</td>
                        </tr>
                        
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 161
                echo "                </table></div>
        </div>                    
        ";
            }
            // line 164
            echo "        
        
        ";
            // line 166
            if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "canceled", array())) {
                // line 167
                echo "        
        <h1><i class=\"fa fa-gears\"></i>";
                // line 168
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opcje"), "html", null, true);
                echo "</h1> 
        
        <div class=\"content\" style=\"overflow:visible;\">
            <div style=\"float:right; margin-left:20px;\">
                ";
                // line 172
                echo $this->env->getExtension('app_extension')->tabUser($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "buyer", array()));
                echo "
            </div>
            
            ";
                // line 175
                if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array())) {
                    echo "<p>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Przed zatwierdzeniem zamówienia upewnij się że Poniższe dane są prawidłowe."), "html", null, true);
                    echo "</p>";
                }
                // line 176
                echo "            
            
            <div class=\"order_billing onleft\" style=\"margin-bottom:0;\">
            <p><b><i class=\"fa fa-fw fa-credit-card-alt\"></i>&nbsp; ";
                // line 179
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dane rozliczeniowe"), "html", null, true);
                echo ":</b></p>
            <p>";
                // line 180
                if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "billingaddress", array())) {
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "billingaddress", array()), "tostring", array()), "html", null, true));
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Brak"), "html", null, true);
                }
                echo "</p>
            </div>
            
            <div class=\"order_delivery \">
            <p><b><i class=\"fa fa-fw fa-truck\"></i>&nbsp; ";
                // line 184
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres dostawy"), "html", null, true);
                echo ":</b></p>
            <p>";
                // line 185
                if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "deliveryaddress", array())) {
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "deliveryaddress", array()), "tostring", array()), "html", null, true));
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Brak"), "html", null, true);
                }
                echo "</p>
            </div>

            <div style=\"clear:left;\"></div>
 
            
            
                <div class=\"options\"> 
                    ";
                // line 193
                if (( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array()) && (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "buyer", array()) == $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) || twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader", 2 => "worker"))))) {
                    echo " 
                        <a class=\"button\" href=\"";
                    // line 194
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("profile_address", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "buyer", array()), "id", array()))), "html", null, true);
                    echo "\"><i class=\"fa fa-fw fa-gear\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edytuj"), "html", null, true);
                    echo "</a>   
                    ";
                }
                // line 195
                echo " 
                    ";
                // line 196
                if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array()) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader", 2 => "worker")))) {
                    echo " 
                        <a class=\"button\" href=\"";
                    // line 197
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_address_form", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
                    echo "\"><i class=\"fa fa-fw fa-gear\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edytuj"), "html", null, true);
                    echo "</a>
                    ";
                }
                // line 198
                echo "     
                    ";
                // line 199
                if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "invoiceid", array()) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "invoicenumber", array()))) {
                    echo " 
                        <a class=\"button\" href=\"";
                    // line 200
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_invoice_download", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
                    echo "\"><i class=\"fa fa-fw fa-file-text\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pobierz dokument"), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "invoicenumber", array()), "html", null, true);
                    echo "</a>
                    ";
                }
                // line 201
                echo " 
                    ";
                // line 202
                if ((((( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "invoiceid", array()) &&  !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "invoicenumber", array())) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "paid", array())) && twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader", 2 => "worker"))) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "invoice", array()))) {
                    echo " 
                        <a class=\"button\" href=\"";
                    // line 203
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_invoice_add", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
                    echo "\"><i class=\"fa fa-fw fa-file-text\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wystaw fakturę"), "html", null, true);
                    echo "</a>
                    ";
                }
                // line 204
                echo " 
                </div>     
             
        </div>
        ";
            } else {
                // line 208
                echo "  
        <div class=\"content\"><p>";
                // line 209
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienie zostało anulowane dnia:"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "canceled", array())), "html", null, true);
                echo "</p></div>    
        ";
            }
            // line 210
            echo "  
        
        

        
        
        

        ";
            // line 219
            echo "        
        ";
            // line 220
            if ((twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader", 2 => "worker")) ||  !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array()))) {
                echo "  
        <div class=\"content\">
            ";
                // line 222
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
                echo "
            ";
                // line 223
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
                echo "
            ";
                // line 224
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
                echo "
            ";
                // line 225
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
                echo "
        </div>
        ";
            }
            // line 228
            echo "             
        ";
            // line 229
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array())) {
                echo "     
        ";
                // line 230
                echo "   
        
        <div class=\"content\">
                
                 
                      ";
                // line 235
                if (twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader", 2 => "worker"))) {
                    echo "   
                               
                                <form action=\"\" method=\"post\">
                                    <div class=\"widget\">
                                    <label>";
                    // line 239
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Status zamówienia"), "html", null, true);
                    echo "</label>
                                    <select name=\"status_id\">
                                        <option>";
                    // line 241
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Brak"), "html", null, true);
                    echo "</option>
                                        ";
                    // line 242
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["statuses"]) ? $context["statuses"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                        // line 243
                        echo "                                        <option ";
                        if (($context["status"] == $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()))) {
                            echo "selected=\"seleceted\"";
                        }
                        echo "  value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "id", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "name", array()), "html", null, true);
                        echo "</option>
                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 245
                    echo "                                    </select>
                                    </div>
                                    
                                    <div class=\"widget\">
                                    <label>";
                    // line 249
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienie opłacone"), "html", null, true);
                    echo "</label>
                                    <select name=\"paid\">
                                        <option ";
                    // line 251
                    if ( !(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "paid", array()))) {
                        echo "selected=\"seleceted\"";
                    }
                    echo "  value=\"1\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opłacone"), "html", null, true);
                    echo "</option>
                                        <option ";
                    // line 252
                    if ((null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "paid", array()))) {
                        echo "selected=\"seleceted\"";
                    }
                    echo "  value=\"0\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nieopłacone"), "html", null, true);
                    echo "</option>
                                    </select>
                                    </div>
                                    
                                    
                                    
                                    <div>
                                    <button type=\"submit\">";
                    // line 259
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zapisz"), "html", null, true);
                    echo "</button>    
                                    </div>           
                                </form> 
                                    
                      ";
                } else {
                    // line 263
                    echo "  
                            <p>";
                    // line 264
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Status zamówienia"), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "currentstatus", array()), "html", null, true);
                    echo "</p> 
                            ";
                    // line 265
                    if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "note", array())) {
                        echo "<p>";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Twoje uwagi"), "html", null, true);
                        echo ": ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "note", array()), "html", null, true);
                        echo "</p> ";
                    }
                    // line 266
                    echo "
                            ";
                    // line 267
                    $context["contract"] = 0;
                    // line 268
                    echo "                            ";
                    $context["send"] = 1;
                    // line 269
                    echo "                            ";
                    if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproducts", array()), "first", array(), "method") && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "paid", array()))) {
                        // line 270
                        echo "                                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproducts", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["object_product"]) {
                            echo " 
                                    ";
                            // line 271
                            if (($this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "type", array()), "id", array()) == "3")) {
                                // line 272
                                echo "                                        ";
                                $context["contract"] = 1;
                                // line 273
                                echo "                                    ";
                            }
                            // line 274
                            echo "                                    ";
                            if (($this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "type", array()), "id", array()) == "2")) {
                                // line 275
                                echo "                                        ";
                                $context["send"] = 1;
                                // line 276
                                echo "                                    ";
                            }
                            // line 277
                            echo "                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object_product'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 278
                        echo "
                                <p>";
                        // line 279
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Twoje zamówienie jest opłacone."), "html", null, true);
                        echo "
                                ";
                        // line 280
                        if (((isset($context["contract"]) ? $context["contract"] : null) == 1)) {
                            // line 281
                            echo "                                  ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Znajdują się w nim usługi które wykona dla Ciebie odpowiednio dobrana przez nas firma. Przebieg ich realizacji możesz obserwować klikając w link poniżej. Zostaniesz poproszony mailem o akceptacje każdej wykonanej usługi na podstawie przesłanych przez wykonawce zdjęć."), "html", null, true);
                            echo "
                                ";
                        }
                        // line 282
                        echo " 
                                ";
                        // line 283
                        if (((isset($context["send"]) ? $context["send"] : null) == 1)) {
                            // line 284
                            echo "                                  ";
                            // line 285
                            echo "                                ";
                        }
                        echo " 
                                </p>
                                ";
                        // line 287
                        if (((isset($context["contract"]) ? $context["contract"] : null) == 1)) {
                            // line 288
                            echo "                                <div class=\"options\">
                                <a class=\"button\" href=\"";
                            // line 289
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contract_list", array("o_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "op_state" =>  -1)), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usługi"), "html", null, true);
                            echo "</a>
                                </div>
                                ";
                        }
                        // line 291
                        echo " 
                                
                            ";
                    }
                    // line 293
                    echo " 
                      ";
                }
                // line 294
                echo "     

        </div>
        ";
            }
            // line 298
            echo "        
        
        
        
        

        
        ";
            // line 305
            if ((twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader", 2 => "worker")) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array()))) {
                // line 306
                echo "            ";
                if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproducts", array()), "first", array(), "method") && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "paid", array()))) {
                    // line 307
                    echo "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproducts", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["object_product"]) {
                        echo " 
                    
                  
                    ";
                        // line 310
                        if (($this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "category", array()), "id", array()) == "2")) {
                            // line 311
                            echo "                        <div class=\"content\" id=\"codes\">
                            <h3><i class=\"fa fa-fw fa-qrcode\"></i> ";
                            // line 312
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienie kodu dla strony"), "html", null, true);
                            echo "</h3>
                            <p>
                            <b>";
                            // line 314
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Produkt"), "html", null, true);
                            echo ":</b> <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_form", array("id" => $this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "id", array()))), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "name", array()), "html", null, true);
                            echo "</a> x ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "amount", array()), "html", null, true);
                            echo "<br>
";
                            // line 316
                            echo "                            ";
                            if ( !(null === $this->getAttribute($context["object_product"], "page", array()))) {
                                // line 317
                                echo "                            <b>";
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona"), "html", null, true);
                                echo ":</b> <a href=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "id", array()))), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "translate", array(0 => $this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "locale", array())), "method"), "name", array()), "html", null, true);
                                echo "</a>
                            ";
                            }
                            // line 319
                            echo "                            </p>
                            

                            
                            
                            ";
                            // line 328
                            echo " 
                            
                            ";
                            // line 330
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["object_product"], "codes", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["code"]) {
                                echo " 
                                <p>";
                                // line 331
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Przypisany kod to"), "html", null, true);
                                echo ": <b>";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["code"], "code", array()), "html", null, true);
                                echo "</b> 
                                (Okres: ";
                                // line 332
                                if ( !(null === $this->getAttribute($this->getAttribute($context["code"], "group", array()), "months", array()))) {
                                    echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($context["code"], "group", array()), "months", array()) / 12), "html", null, true);
                                    echo " lat";
                                } else {
                                    echo "Brak";
                                }
                                echo ", 
                                Produkt: ";
                                // line 333
                                if ( !(null === $this->getAttribute($this->getAttribute($context["code"], "group", array()), "product", array()))) {
                                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["code"], "group", array()), "product", array()), "name", array()), "html", null, true);
                                } else {
                                    echo "Kody uniwersalne";
                                }
                                echo ")
                                - <a style=\"color:red;\" href=\"?delete=1&code_id=";
                                // line 334
                                echo twig_escape_filter($this->env, $this->getAttribute($context["code"], "id", array()), "html", null, true);
                                echo "&product_id=";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "id", array()), "html", null, true);
                                echo "\">Usuń</a>
                                </p>
                                ";
                                // line 336
                                if ( !(null === $this->getAttribute($context["code"], "page", array()))) {
                                    // line 337
                                    echo "                                    <p>";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kod został aktywowany przez użytkownika"), "html", null, true);
                                    echo ": <b>";
                                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["code"], "page", array()), "creator", array()), "fullname", array()), "html", null, true);
                                    echo "</b></p>
                                ";
                                }
                                // line 339
                                echo "                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['code'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            echo " 
                            
                            <div class=\"orderform\">
                                <p>";
                            // line 342
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zeskanuj kod wysyłanego produktu aby powiązać go z zamówieniem"), "html", null, true);
                            echo ": </p>
                                <input type=\"text\" name=\"code\" data-product=\"";
                            // line 343
                            echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "id", array()), "html", null, true);
                            echo "\" autocomplete=\"off\" />
                                <div class=\"result\"></div>
                            </div>
                        </div>
                    ";
                        }
                        // line 348
                        echo "                    
                    
                    ";
                        // line 350
                        if ((( !(null === $this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "months", array())) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "type", array()), "id", array()) == "2")) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "category", array()), "id", array()) == "1"))) {
                            // line 351
                            echo "                        <div class=\"content\" id=\"codes\">
                            <h3><i class=\"fa fa-fw fa-qrcode\"></i> ";
                            // line 352
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienie kodu dla strony"), "html", null, true);
                            echo "</h3>
                            <p>
                            <b>";
                            // line 354
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Produkt"), "html", null, true);
                            echo ":</b> <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_form", array("id" => $this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "id", array()))), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "name", array()), "html", null, true);
                            echo "</a><br>
                            <b>";
                            // line 355
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona"), "html", null, true);
                            echo ":</b> <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "id", array()))), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "translate", array(0 => $this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "locale", array())), "method"), "name", array()), "html", null, true);
                            echo "</a>
                            </p>
                            
                            ";
                            // line 361
                            echo "                            
                            ";
                            // line 362
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["object_product"], "codes", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["code"]) {
                                echo " 
                                <p>";
                                // line 363
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Przypisany kod to"), "html", null, true);
                                echo ": <b>";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object_product"], "code", array()), "code", array()), "html", null, true);
                                echo "</b>
                                (Okres: ";
                                // line 364
                                if ( !(null === $this->getAttribute($this->getAttribute($context["code"], "group", array()), "product", array()))) {
                                    echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($context["code"], "group", array()), "months", array()) / 12), "html", null, true);
                                    echo " lat";
                                } else {
                                    echo "Brak";
                                }
                                echo ", 
                                Produkt: ";
                                // line 365
                                if ( !(null === $this->getAttribute($this->getAttribute($context["code"], "group", array()), "product", array()))) {
                                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["code"], "group", array()), "product", array()), "name", array()), "html", null, true);
                                } else {
                                    echo "Kody uniwersalne";
                                }
                                echo ")
                                - <a style=\"color:red;\" href=\"?delete=1&code_id=";
                                // line 366
                                echo twig_escape_filter($this->env, $this->getAttribute($context["code"], "id", array()), "html", null, true);
                                echo "&product_id=";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "id", array()), "html", null, true);
                                echo "\">Usuń</a>
                                </p>
                                ";
                                // line 368
                                if ( !(null === $this->getAttribute($context["code"], "page", array()))) {
                                    // line 369
                                    echo "                                    <p>";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Kod został aktywowany przez użytkownika"), "html", null, true);
                                    echo ": <b>";
                                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["code"], "page", array()), "creator", array()), "fullname", array()), "html", null, true);
                                    echo "</b></p>
                                ";
                                }
                                // line 371
                                echo "                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['code'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            echo "   
                            
                            ";
                            // line 373
                            if (twig_length_filter($this->env, $this->getAttribute($context["object_product"], "codes", array()))) {
                                // line 375
                                echo "                            ";
                            } else {
                                // line 376
                                echo "                                <div class=\"orderform\">
                                    <p>";
                                // line 377
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zeskanuj kod wysyłanego produktu aby powiązać go z zamówieniem"), "html", null, true);
                                echo ": </p>
                                    <input type=\"text\" name=\"code\" data-product=\"";
                                // line 378
                                echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "id", array()), "html", null, true);
                                echo "\" autocomplete=\"off\" />
                                    <div class=\"result\"></div>
                                </div>
                            ";
                            }
                            // line 381
                            echo "    
                        </div>
                    ";
                        }
                        // line 383
                        echo " 
                    
                    
                    
                    ";
                        // line 387
                        if ((($this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "type", array()), "id", array()) == "3") && ($this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "category", array()), "id", array()) == "1"))) {
                            // line 388
                            echo "                        <div class=\"content\">
                            <h3><i class=\"fa fa-fw fa-fire\"></i> ";
                            // line 389
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zamówienie usługi dla strony"), "html", null, true);
                            echo "</h3>
                            <p>
                            <b>";
                            // line 391
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usługa"), "html", null, true);
                            echo ":</b> <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_form", array("id" => $this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "id", array()))), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object_product"], "product", array()), "name", array()), "html", null, true);
                            echo "</a><br>
                            <b>";
                            // line 392
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona"), "html", null, true);
                            echo ":</b> <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_form", array("id" => $this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "id", array()))), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "translate", array(0 => $this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "locale", array())), "method"), "name", array()), "html", null, true);
                            echo "</a><br>   
                            <a href=\"";
                            // line 393
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contract_form", array("id" => $this->getAttribute($context["object_product"], "id", array()))), "html", null, true);
                            echo "\" class=\"\">";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Przejdź do strony usługi"), "html", null, true);
                            echo "</a>
                            </p>
                            
                            ";
                            // line 396
                            if ( !(null === $this->getAttribute($context["object_product"], "contractor", array()))) {
                                // line 397
                                echo "                                ";
                                echo $this->env->getExtension('app_extension')->tabUser($this->getAttribute($context["object_product"], "contractor", array()));
                                echo "<br>
                                <p>
                                <b>";
                                // line 399
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wykonawca"), "html", null, true);
                                echo ":</b> ";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object_product"], "contractor", array()), "fullname", array()), "html", null, true);
                                echo "<br>
                                <b>";
                                // line 400
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opis"), "html", null, true);
                                echo ":</b> ";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["object_product"], "contractor", array()), "description", array()), "html", null, true);
                                echo "<br>
                                <b>";
                                // line 401
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Firma"), "html", null, true);
                                echo ":</b> ";
                                echo $this->env->getExtension('app_extension')->address($this->getAttribute($this->getAttribute($context["object_product"], "contractor", array()), "billingaddress", array()));
                                echo "<br><br> 
                                <b>";
                                // line 402
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Potwierdzenie wykonania usługi przez firmę"), "html", null, true);
                                echo ":</b> ";
                                echo $this->env->getExtension('app_extension')->dateornotFilter($this->getAttribute($context["object_product"], "contractorconfirmed", array()));
                                echo "<br> 
                                <b>";
                                // line 403
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Potwierdzenie odebrania usługi przez klienta"), "html", null, true);
                                echo ":</b> ";
                                echo $this->env->getExtension('app_extension')->dateornotFilter($this->getAttribute($context["object_product"], "customerconfirmed", array()));
                                echo "
                                </p>
                            ";
                            }
                            // line 406
                            echo "                            
                            
                            ";
                            // line 408
                            if ($this->getAttribute($context["object_product"], "page", array(), "any", true, true)) {
                                // line 409
                                echo "                            <div class=\"orderform\">
                                <p>";
                                // line 410
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Przypisz podwykonawce"), "html", null, true);
                                echo ": </p>
                                <input type=\"text\" name=\"contractor\" placeholder=\"";
                                // line 411
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Miasto lub nazwa wykonawcy"), "html", null, true);
                                echo "\" value=\"";
                                if ((null === $this->getAttribute($context["object_product"], "contractor", array()))) {
                                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["object_product"], "page", array()), "address", array()), "city", array()), "html", null, true);
                                }
                                echo "\" data-product=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["object_product"], "id", array()), "html", null, true);
                                echo "\"  autocomplete=\"off\" />
                                <div class=\"result\"></div>
                            </div>
                            ";
                            }
                            // line 414
                            echo "    
                        </div>
                    ";
                        }
                        // line 416
                        echo "  
                    
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object_product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 419
                    echo "            ";
                }
                // line 420
                echo "        ";
            }
            // line 421
            echo "        
        ";
            // line 422
            if ((($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderproducts", array()), "first", array(), "method") &&  !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "canceled", array())) && ((twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader", 2 => "worker")) ||  !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array())) ||  !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "paid", array())))) {
                echo " 

        <div class=\"content\">
        ";
                // line 425
                if (( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array()) && ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "invoice", array()) || $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "invoice", array())))) {
                    // line 426
                    echo "            
            <script>
            \$( document ).ready(function() { 
                function bindInvoice(){
                    \$('#order_invoice_option').bind('change',function(){ 
                        var val=0;

                        var element=\$(this).parents('.content').first();
                        element.find('a').hide();
                        
                        if(\$(this).is(':checked')) val=1;    
                        else val=0;

                        \$.ajax({
                            type        : 'GET',
                            url         : '?invoice='+val, 
                        })
                        .done(function(data) {
                            \$('#invoice-result').html(data);
                            bindInvoice();
                           
                            element.find('a').show();
                        });

                    });
                }
                bindInvoice();
            });
            </script>  
            <div id=\"invoice-result\">
            ";
                    // line 456
                    echo twig_include($this->env, $context, "AppBundle:Order:formInvoice.html.twig", array("object" => (isset($context["object"]) ? $context["object"] : null), "error" => null));
                    echo "
            </div>
        ";
                }
                // line 458
                echo "    
            
            
            <div class=\"options\"> 

            
            ";
                // line 464
                $context["pay"] = 1;
                // line 465
                echo "            ";
                if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "paid", array())) {
                    echo " ";
                    $context["pay"] = 0;
                    echo " ";
                }
                echo "  
            ";
                // line 466
                if ( !$this->getAttribute((isset($context["payu_switch"]) ? $context["payu_switch"] : null), $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "currency", array()), array(), "array", true, true)) {
                    echo " ";
                    $context["pay"] = 0;
                    echo " ";
                }
                echo " 
            ";
                // line 467
                if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "price", array()) <= 0)) {
                    echo " ";
                    $context["pay"] = 0;
                    echo " ";
                }
                echo " 
            
            ";
                // line 469
                if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "paid", array())) {
                    echo "   
            ";
                    // line 470
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "payments", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["payment"]) {
                        echo " 
                ";
                        // line 471
                        if (((null === $this->getAttribute($context["payment"], "finished", array())) &&  !(null === $this->getAttribute($context["payment"], "started", array())))) {
                            // line 472
                            echo "                    ";
                            $context["pay"] = 0;
                            // line 473
                            echo "                ";
                        }
                        // line 474
                        echo "            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payment'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 475
                    echo "            ";
                }
                // line 476
                echo "
            ";
                // line 477
                if (( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array()) && ((isset($context["pay"]) ? $context["pay"] : null) == 0))) {
                    echo " 
                <a class=\"button\" href=\"";
                    // line 478
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_form", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "confirm" => 1)), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zatwierdź zamówienie"), "html", null, true);
                    echo "</a>
            ";
                }
                // line 479
                echo "    
            ";
                // line 480
                if (( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array()) && ((isset($context["pay"]) ? $context["pay"] : null) == 1))) {
                    echo "   
                <a class=\"button\" href=\"";
                    // line 481
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_form", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "confirm" => 1, "payu" => 1)), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zatwierdź zamówienie i opłać online"), "html", null, true);
                    echo "</a>
            ";
                }
                // line 483
                echo "            ";
                if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array()) && ((isset($context["pay"]) ? $context["pay"] : null) == 1))) {
                    echo "   
                <a class=\"button\" href=\"";
                    // line 484
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_form", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "payu" => 1)), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opłać zamówienie online"), "html", null, true);
                    echo "</a>
            ";
                }
                // line 486
                echo "            
            
            
            
            ";
                // line 490
                if ((twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader", 2 => "worker")) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array()))) {
                    echo " 
                <a class=\"button\" href=\"";
                    // line 491
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_form", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "print" => 1)), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Drukuj zamówienie"), "html", null, true);
                    echo "</a> 
            ";
                }
                // line 492
                echo "   
            
            ";
                // line 494
                if ((((twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader", 2 => "worker")) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array())) &&  !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "canceled", array())) &&  !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "done", array()))) {
                    echo "          
                <a class=\"button\" href=\"";
                    // line 495
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_form", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "done" => 1)), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zakończ zamówienie"), "html", null, true);
                    echo "</a>      
            ";
                }
                // line 496
                echo "   

            ";
                // line 498
                if ((((twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "type", array()), array(0 => "admin", 1 => "trader", 2 => "worker")) &&  !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "paid", array())) &&  !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "confirmed", array())) &&  !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "canceled", array()))) {
                    echo "          
                <a class=\"button\" href=\"";
                    // line 499
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("order_form", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "cancel" => 1)), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Anuluj zamówienie"), "html", null, true);
                    echo "</a>      
            ";
                }
                // line 500
                echo "   

            
            </div>
        </div>     
        ";
            }
            // line 505
            echo "    
            
    ";
        }
        // line 508
        echo "  
    
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Order:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1415 => 508,  1410 => 505,  1402 => 500,  1395 => 499,  1391 => 498,  1387 => 496,  1380 => 495,  1376 => 494,  1372 => 492,  1365 => 491,  1361 => 490,  1355 => 486,  1348 => 484,  1343 => 483,  1336 => 481,  1332 => 480,  1329 => 479,  1322 => 478,  1318 => 477,  1315 => 476,  1312 => 475,  1306 => 474,  1303 => 473,  1300 => 472,  1298 => 471,  1292 => 470,  1288 => 469,  1279 => 467,  1271 => 466,  1262 => 465,  1260 => 464,  1252 => 458,  1246 => 456,  1214 => 426,  1212 => 425,  1206 => 422,  1203 => 421,  1200 => 420,  1197 => 419,  1189 => 416,  1184 => 414,  1171 => 411,  1167 => 410,  1164 => 409,  1162 => 408,  1158 => 406,  1150 => 403,  1144 => 402,  1138 => 401,  1132 => 400,  1126 => 399,  1120 => 397,  1118 => 396,  1110 => 393,  1102 => 392,  1094 => 391,  1089 => 389,  1086 => 388,  1084 => 387,  1078 => 383,  1073 => 381,  1066 => 378,  1062 => 377,  1059 => 376,  1056 => 375,  1054 => 373,  1045 => 371,  1037 => 369,  1035 => 368,  1028 => 366,  1020 => 365,  1011 => 364,  1005 => 363,  999 => 362,  996 => 361,  986 => 355,  978 => 354,  973 => 352,  970 => 351,  968 => 350,  964 => 348,  956 => 343,  952 => 342,  942 => 339,  934 => 337,  932 => 336,  925 => 334,  917 => 333,  908 => 332,  902 => 331,  896 => 330,  892 => 328,  885 => 319,  875 => 317,  872 => 316,  862 => 314,  857 => 312,  854 => 311,  852 => 310,  843 => 307,  840 => 306,  838 => 305,  829 => 298,  823 => 294,  819 => 293,  814 => 291,  806 => 289,  803 => 288,  801 => 287,  795 => 285,  793 => 284,  791 => 283,  788 => 282,  782 => 281,  780 => 280,  776 => 279,  773 => 278,  767 => 277,  764 => 276,  761 => 275,  758 => 274,  755 => 273,  752 => 272,  750 => 271,  743 => 270,  740 => 269,  737 => 268,  735 => 267,  732 => 266,  724 => 265,  718 => 264,  715 => 263,  707 => 259,  693 => 252,  685 => 251,  680 => 249,  674 => 245,  659 => 243,  655 => 242,  651 => 241,  646 => 239,  639 => 235,  632 => 230,  628 => 229,  625 => 228,  619 => 225,  615 => 224,  611 => 223,  607 => 222,  602 => 220,  599 => 219,  589 => 210,  582 => 209,  579 => 208,  572 => 204,  565 => 203,  561 => 202,  558 => 201,  549 => 200,  545 => 199,  542 => 198,  535 => 197,  531 => 196,  528 => 195,  521 => 194,  517 => 193,  502 => 185,  498 => 184,  487 => 180,  483 => 179,  478 => 176,  472 => 175,  466 => 172,  459 => 168,  456 => 167,  454 => 166,  450 => 164,  445 => 161,  435 => 157,  431 => 156,  427 => 155,  423 => 154,  420 => 153,  416 => 152,  411 => 150,  407 => 149,  403 => 148,  399 => 147,  394 => 144,  392 => 143,  384 => 137,  378 => 135,  370 => 131,  363 => 129,  358 => 128,  355 => 127,  349 => 126,  346 => 125,  343 => 124,  340 => 123,  337 => 122,  334 => 121,  332 => 120,  326 => 119,  321 => 118,  318 => 117,  316 => 116,  312 => 114,  308 => 113,  300 => 111,  297 => 110,  295 => 109,  291 => 108,  284 => 104,  279 => 103,  276 => 102,  273 => 98,  269 => 97,  267 => 96,  261 => 95,  257 => 93,  246 => 88,  240 => 87,  237 => 86,  234 => 85,  231 => 75,  222 => 71,  215 => 68,  213 => 67,  205 => 66,  200 => 63,  198 => 62,  189 => 58,  185 => 56,  180 => 54,  170 => 53,  160 => 51,  158 => 50,  155 => 49,  153 => 48,  150 => 47,  144 => 45,  136 => 43,  134 => 42,  129 => 40,  126 => 39,  121 => 38,  117 => 37,  111 => 34,  106 => 33,  103 => 32,  100 => 28,  94 => 27,  92 => 26,  88 => 25,  84 => 24,  79 => 21,  77 => 20,  73 => 18,  67 => 13,  65 => 12,  58 => 7,  55 => 6,  29 => 4,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* */
/* */
/* {% block header %}<h1><i class="fa fa-shopping-cart"></i>{% if object.confirmed  %}{% if(object.canceled)  %} {{ 'Zamówienie anulowane'|trans }}{% else %}{{ 'Zamówienie'|trans }}{% endif %} {{ 'nr'|trans }} {{ object.id }}{% else  %}{% if(object.canceled)  %} {{ 'Koszyk anulowany'|trans }}{% else %}{{ 'Koszyk'|trans }}{% endif %}{% endif  %}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/*     */
/* */
/* */
/* */
/*     {% if object.id  %}*/
/*         */
/*         */
/*         */
/* */
/*         {#<h1><i class="fa fa-cube"></i>{% if object.confirmed  %}{{ 'Produkty i usługi'|trans }}{% else  %}{{ 'Zawartość koszyka'|trans }}{% endif  %}</h1>#}*/
/* */
/*         <div class="content order">*/
/*             {% if object.orderproducts.first() %}*/
/* */
/*                 <div class="table-wrapper"><table>*/
/*                         <tr>*/
/*                             <th class="notmobile">{{ 'Zdjęcie'|trans }}</th>*/
/*                             <th>{{ 'Nazwa'|trans }}</th>*/
/*                             {% if not object.confirmed  %}*/
/*                                 <th>{{ 'Zmiany'|trans }}</th>    */
/*                             {% else %}  */
/*                                 {#{% if(app.user.type in ['admin'] ) %}   */
/*                                 <th>{{ 'Zmień cenę'|trans }}</th>    */
/*                                 {% endif %}#}*/
/*                             {% endif %}*/
/*                             <th class="notmobile">{{ 'Cena'|trans }}</th>*/
/*                             <th class="notmobile">{{ 'Suma'|trans }}</th>*/
/* */
/*                         </tr>*/
/*                     {% set i=0 %}    */
/*                     {% for object_product in object.orderproducts %}{% set i=i+1 %}*/
/*                         <tr>*/
/*                             <td class="image notmobile"><div class="avatar" style="background-image:url('{{ path('thumbnail', {'resolution': '42x42', 'file': object_product.product.avatar })|production }}');"></div></td> */
/*                             <td>*/
/*                                 {% if(app.user.type in ['admin','trader','worker'])  %}*/
/*                                 <a href="{{ path('product_form', {'id': object_product.product.id, 'order_id': object.id})}}">{{object_product.name}}</a>*/
/*                                 {% else %}*/
/*                                     {{object_product.name}}*/
/*                                 {% endif %}*/
/*                                 */
/*                                 {% if  object_product.page  %}*/
/*                                 <br>*/
/*                                 {% if(object_product.page.code is not null) %}*/
/*                                     <a href="{{ path_page(object_product.page.code) }}">{{ 'Strona'|trans }}: {{ object_product.page.translate(object_product.page.locale).name }}</a>*/
/*                                 {% else %}*/
/*                                     <a href="{{ path('page_form', {'id': object_product.page.id, 'order_id': object.id})}}">{{ 'Strona'|trans }}: {{object_product.page.translate(object_product.page.locale).name}}</a>   */
/*                                 {% endif %}    */
/*                                 */
/*                                 {% endif %} */
/*                                 <div class="mobile">*/
/*                                     {{object_product.price|price(object.currency)}} (x{{ object_product.amount }})*/
/*                                 </div>*/
/*                             </td>*/
/*                             */
/*                             {% if not object.confirmed  %}*/
/*                                 <td>    */
/*                                 <form action="" method="post">*/
/*                                     */
/*                                     <input type="text" class="amount" name="new_amount" {% if object_product.product.single  %}disabled="disabled"{% endif %} value="{{object_product.amount}}" />*/
/*                                     {% if not object_product.product.single  %}*/
/*                                     <input type="hidden" name="order_product_id" value="{{object_product.id}}" />   */
/*                                     <button type="submit" class="small icon"><i class="fa fa-pencil"></i></button>*/
/*                                     {% endif %}*/
/*                                     <a href="{{ extend({'order_product_id':object_product.id,'new_amount':0}) }}" class="button small icon"><i class="fa fa-close"></i></a>    */
/*                                 */
/*                                 </form>*/
/*                                 </td>    */
/*                             {% else %}  */
/*                                 {#{% if(app.user.type in ['admin'] ) %} */
/*                                 <td>      */
/*                                 <form action="" method="post">*/
/*                                     <input type="hidden" name="order_product_id" value="{{object_product.id}}" />*/
/*                                     <input type="text" class="price" name="new_price" value="{{object_product.price}}" />*/
/*                                     <input type="submit" value="Zmień">*/
/*                                 </{#form> */
/*                                 </td> */
/*                                 {% endif %}#}*/
/*                             {% endif %}*/
/*                             */
/*                             <td class="notmobile">{{object_product.price|price(object.currency)}} (x{{ object_product.amount }})</td>*/
/*                             <td class="notmobile">{{(object_product.price*object_product.amount)|price(object.currency)}}</td>*/
/* */
/*                         </tr>*/
/*                        */
/*                     {% endfor %}*/
/*                         <tr>*/
/*                             <td class="notmobile"></td>*/
/*                             <td><div class="mobile">{{ 'Suma'|trans }}: {{ object.price|price(object.currency) }}</div></td>*/
/*                             {% if not object.confirmed  %}*/
/*                             <td></td>    */
/*                             {% else %}  */
/*                                 {#{% if(app.user.type in ['admin','trader'] ) %}   */
/*                                 <td></td>   */
/*                                 {% endif %}#}*/
/*                             {% endif %}*/
/*                             <td class="notmobile">{{ 'Suma'|trans }}</td>*/
/*                             <td class="notmobile">{{ object.price|price(object.currency) }}</td>*/
/* */
/*                         </tr>*/
/*                 </table></div>*/
/*                 {% if(object.orderproducts.first().product.category is defined ) %}          */
/*                 {% if(object.orderproducts.first().product.category.id==2 and app.user is not null and app.user.type in ['admin','worker','trader','partner'] ) %}*/
/*                     <div class="options">*/
/*                         <a class="button" href="{{ path('shop') }}"><i class="fa fa-fw fa-shopping-cart"></i>{{ 'Wróć do zakupów'|trans }}</a>  */
/*                     </div>*/
/*                 {% endif %}         */
/*                 {% endif %}  */
/*                 */
/*                 {% set contract=0 %}*/
/*                 {% set send=1 %}*/
/*                 {% if object.confirmed and object.paid %}   */
/*                 {% for object_product in object.orderproducts %} */
/*                     {% if object_product.product.type.id=='3' %}*/
/*                         {% set contract=1 %}*/
/*                     {% endif %}*/
/*                     {% if object_product.product.type.id=='2' %}*/
/*                         {% set send=1 %}*/
/*                     {% endif %}*/
/*                 {% endfor %}*/
/*                 {% if contract==1 %}*/
/*                 <p>{{ 'W zamówieniu znajdują się usługi które można przeglądać w zakładce z usługami. Znajdzie się tam informacja o ich przebiegu.'|trans }}</p>*/
/*                 <div class="options"><a href="{{ path('contract_list',{'o_id':object.id,'op_state':-1}) }}" class="button">{{ 'Przejdź do listy usług'|trans }}</a></div>*/
/*                 {% endif %}*/
/*                 {% endif  %} */
/*                 */
/*                 */
/*             {% else %}*/
/*                 <p>{{ 'Obecnie Twój koszyk jest pusty. Możesz dodać do niego produkty na jednej ze swoich stron Epado. Jeżeli nie masz dodanej strony możesz ją dodać, wystarczy wypełnić prosty formularz ze wszystkimi danymi dotyczącymi upamiętnianej osoby lub miejsca.'|trans }}</p>*/
/*             {% endif %}*/
/* */
/*             */
/*             */
/* */
/*         </div>*/
/*             */
/*         {% if object.payments.first() %}*/
/*         <div class="content">*/
/*                 <div class="table-wrapper"><table>*/
/*                         <tr>*/
/*                             <th>{{ 'Nr płatności'|trans }}</th>*/
/*                             <th>{{ 'Status'|trans }}</th>*/
/*                             <th>{{ 'Utworzono'|trans }}</th>*/
/*                             <th class="notmobile">{{ 'Ostatnia zmiana'|trans }}</th>*/
/*                         </tr>    */
/*                     {% for payment in object.payments %}*/
/*                         <tr>*/
/*                             <td>{{ payment.id }}</td> */
/*                             <td>{{ payment.status|payment }}</td>*/
/*                             <td>{{ payment.created|mydatetime }}</td>*/
/*                             <td class="notmobile">{{ payment.updated|mydatetime }}</td>*/
/*                         </tr>*/
/*                         */
/*                     {% endfor %}*/
/*                 </table></div>*/
/*         </div>                    */
/*         {% endif %}*/
/*         */
/*         */
/*         {% if(not object.canceled)  %}*/
/*         */
/*         <h1><i class="fa fa-gears"></i>{{ 'Opcje'|trans }}</h1> */
/*         */
/*         <div class="content" style="overflow:visible;">*/
/*             <div style="float:right; margin-left:20px;">*/
/*                 {{ tabUser(object.buyer)|raw }}*/
/*             </div>*/
/*             */
/*             {% if(not object.confirmed)  %}<p>{{ 'Przed zatwierdzeniem zamówienia upewnij się że Poniższe dane są prawidłowe.'|trans }}</p>{% endif  %}*/
/*             */
/*             */
/*             <div class="order_billing onleft" style="margin-bottom:0;">*/
/*             <p><b><i class="fa fa-fw fa-credit-card-alt"></i>&nbsp; {{ 'Dane rozliczeniowe'|trans }}:</b></p>*/
/*             <p>{% if object.billingaddress  %}{{ object.billingaddress.tostring|nl2br }}{% else  %}{{ 'Brak'|trans }}{% endif  %}</p>*/
/*             </div>*/
/*             */
/*             <div class="order_delivery ">*/
/*             <p><b><i class="fa fa-fw fa-truck"></i>&nbsp; {{ 'Adres dostawy'|trans }}:</b></p>*/
/*             <p>{% if object.deliveryaddress  %}{{ object.deliveryaddress.tostring|nl2br }}{% else  %}{{ 'Brak'|trans }}{% endif  %}</p>*/
/*             </div>*/
/* */
/*             <div style="clear:left;"></div>*/
/*  */
/*             */
/*             */
/*                 <div class="options"> */
/*                     {% if not object.confirmed and (object.buyer == app.user or app.user.type in ['admin','trader','worker'] )  %} */
/*                         <a class="button" href="{{ path('profile_address',{'id':object.buyer.id})}}"><i class="fa fa-fw fa-gear"></i> {{ 'Edytuj'|trans }}</a>   */
/*                     {% endif  %} */
/*                     {% if object.confirmed and app.user.type in ['admin','trader','worker']  %} */
/*                         <a class="button" href="{{ path('order_address_form',{'id':object.id})}}"><i class="fa fa-fw fa-gear"></i> {{ 'Edytuj'|trans }}</a>*/
/*                     {% endif  %}     */
/*                     {% if object.invoiceid and object.invoicenumber  %} */
/*                         <a class="button" href="{{ path('order_invoice_download',{'id':object.id})}}"><i class="fa fa-fw fa-file-text"></i> {{ 'Pobierz dokument'|trans }}: {{ object.invoicenumber }}</a>*/
/*                     {% endif  %} */
/*                     {% if not object.invoiceid and not object.invoicenumber and object.paid  and app.user.type in ['admin','trader','worker'] and object.invoice %} */
/*                         <a class="button" href="{{ path('order_invoice_add',{'id':object.id})}}"><i class="fa fa-fw fa-file-text"></i> {{ 'Wystaw fakturę'|trans }}</a>*/
/*                     {% endif  %} */
/*                 </div>     */
/*              */
/*         </div>*/
/*         {% else  %}  */
/*         <div class="content"><p>{{ 'Zamówienie zostało anulowane dnia:'|trans }} {{ object.canceled|mydate }}</p></div>    */
/*         {% endif  %}  */
/*         */
/*         */
/* */
/*         */
/*         */
/*         */
/* */
/*         {#<h1><i class="fa fa-gears"></i>Opcje</h1>#}*/
/*         */
/*         {% if(app.user.type in ['admin','trader','worker'] or not object.confirmed ) %}  */
/*         <div class="content">*/
/*             {{ form_start(form) }}*/
/*             {{ form_errors(form) }}*/
/*             {{ form_widget(form) }}*/
/*             {{ form_end(form) }}*/
/*         </div>*/
/*         {% endif  %}*/
/*              */
/*         {% if object.confirmed  %}     */
/*         {#<h1><i class="fa fa-gears"></i>{{ 'Informacje'|trans }}</h1>#}   */
/*         */
/*         <div class="content">*/
/*                 */
/*                  */
/*                       {% if(app.user.type in ['admin','trader','worker'] ) %}   */
/*                                */
/*                                 <form action="" method="post">*/
/*                                     <div class="widget">*/
/*                                     <label>{{ 'Status zamówienia'|trans }}</label>*/
/*                                     <select name="status_id">*/
/*                                         <option>{{ 'Brak'|trans }}</option>*/
/*                                         {% for status in statuses %}*/
/*                                         <option {% if status==object.status %}selected="seleceted"{% endif  %}  value="{{status.id}}">{{status.name}}</option>*/
/*                                         {% endfor %}*/
/*                                     </select>*/
/*                                     </div>*/
/*                                     */
/*                                     <div class="widget">*/
/*                                     <label>{{ 'Zamówienie opłacone'|trans }}</label>*/
/*                                     <select name="paid">*/
/*                                         <option {% if object.paid is not null %}selected="seleceted"{% endif  %}  value="1">{{ 'Opłacone'|trans }}</option>*/
/*                                         <option {% if object.paid is null %}selected="seleceted"{% endif  %}  value="0">{{ 'Nieopłacone'|trans }}</option>*/
/*                                     </select>*/
/*                                     </div>*/
/*                                     */
/*                                     */
/*                                     */
/*                                     <div>*/
/*                                     <button type="submit">{{ 'Zapisz'|trans }}</button>    */
/*                                     </div>           */
/*                                 </form> */
/*                                     */
/*                       {% else  %}  */
/*                             <p>{{ 'Status zamówienia'|trans }}: {{ object.currentstatus }}</p> */
/*                             {% if(object.note) %}<p>{{ 'Twoje uwagi'|trans }}: {{ object.note }}</p> {% endif  %}*/
/* */
/*                             {% set contract=0 %}*/
/*                             {% set send=1 %}*/
/*                             {% if object.orderproducts.first() and object.paid %}*/
/*                                 {% for object_product in object.orderproducts %} */
/*                                     {% if object_product.product.type.id=='3' %}*/
/*                                         {% set contract=1 %}*/
/*                                     {% endif %}*/
/*                                     {% if object_product.product.type.id=='2' %}*/
/*                                         {% set send=1 %}*/
/*                                     {% endif %}*/
/*                                 {% endfor %}*/
/* */
/*                                 <p>{{ 'Twoje zamówienie jest opłacone.'|trans }}*/
/*                                 {% if contract==1 %}*/
/*                                   {{ 'Znajdują się w nim usługi które wykona dla Ciebie odpowiednio dobrana przez nas firma. Przebieg ich realizacji możesz obserwować klikając w link poniżej. Zostaniesz poproszony mailem o akceptacje każdej wykonanej usługi na podstawie przesłanych przez wykonawce zdjęć.'|trans }}*/
/*                                 {% endif %} */
/*                                 {% if send==1 %}*/
/*                                   {#{{ 'W zamówieniu znajdują się kody dla stron Epado. Zostaną one wysłane do Ciebie pocztą.'|trans }}#}*/
/*                                 {% endif %} */
/*                                 </p>*/
/*                                 {% if contract==1 %}*/
/*                                 <div class="options">*/
/*                                 <a class="button" href="{{ path('contract_list',{'o_id':object.id,'op_state':-1}) }}">{{ 'Usługi'|trans }}</a>*/
/*                                 </div>*/
/*                                 {% endif %} */
/*                                 */
/*                             {% endif %} */
/*                       {% endif  %}     */
/* */
/*         </div>*/
/*         {% endif  %}*/
/*         */
/*         */
/*         */
/*         */
/*         */
/* */
/*         */
/*         {% if(app.user.type in ['admin','trader','worker'] and object.confirmed)  %}*/
/*             {% if object.orderproducts.first() and object.paid %}*/
/*                 {% for object_product in object.orderproducts %} */
/*                     */
/*                   */
/*                     {% if  object_product.product.category.id=='2' %}*/
/*                         <div class="content" id="codes">*/
/*                             <h3><i class="fa fa-fw fa-qrcode"></i> {{ 'Zamówienie kodu dla strony'|trans }}</h3>*/
/*                             <p>*/
/*                             <b>{{ 'Produkt'|trans }}:</b> <a href="{{ path('product_form',{'id':object_product.product.id}) }}">{{ object_product.product.name }}</a> x {{ object_product.amount }}<br>*/
/* {#                            {{ dump(object_product) }}#}*/
/*                             {% if object_product.page is not null %}*/
/*                             <b>{{ 'Strona'|trans }}:</b> <a href="{{ path('page_form',{'id':object_product.page.id}) }}">{{ object_product.page.translate(object_product.page.locale).name }}</a>*/
/*                             {% endif %}*/
/*                             </p>*/
/*                             */
/* */
/*                             */
/*                             */
/*                             {#ze wzgledu na zmiany tego juz nie używamy {% if object_product.code is not null %}*/
/*                                 <p>{{ 'Przypisany kod to'|trans }}: <b>{{object_product.code.code }}</b></p>*/
/*                             {% else %}*/
/*                             */
/*                             {% endif %} #} */
/*                             */
/*                             {% for code in object_product.codes %} */
/*                                 <p>{{ 'Przypisany kod to'|trans }}: <b>{{code.code }}</b> */
/*                                 (Okres: {% if code.group.months is not null %}{{ code.group.months/12 }} lat{% else %}Brak{% endif %}, */
/*                                 Produkt: {% if code.group.product is not null %}{{code.group.product.name}}{% else %}Kody uniwersalne{% endif %})*/
/*                                 - <a style="color:red;" href="?delete=1&code_id={{code.id}}&product_id={{object_product.id}}">Usuń</a>*/
/*                                 </p>*/
/*                                 {% if code.page is not null %}*/
/*                                     <p>{{ 'Kod został aktywowany przez użytkownika'|trans }}: <b>{{code.page.creator.fullname}}</b></p>*/
/*                                 {% endif %}*/
/*                             {% endfor %} */
/*                             */
/*                             <div class="orderform">*/
/*                                 <p>{{ 'Zeskanuj kod wysyłanego produktu aby powiązać go z zamówieniem'|trans }}: </p>*/
/*                                 <input type="text" name="code" data-product="{{object_product.id}}" autocomplete="off" />*/
/*                                 <div class="result"></div>*/
/*                             </div>*/
/*                         </div>*/
/*                     {% endif %}*/
/*                     */
/*                     */
/*                     {% if object_product.product.months is not null and object_product.product.type.id=='2' and object_product.product.category.id=='1' %}*/
/*                         <div class="content" id="codes">*/
/*                             <h3><i class="fa fa-fw fa-qrcode"></i> {{ 'Zamówienie kodu dla strony'|trans }}</h3>*/
/*                             <p>*/
/*                             <b>{{ 'Produkt'|trans }}:</b> <a href="{{ path('product_form',{'id':object_product.product.id}) }}">{{ object_product.product.name }}</a><br>*/
/*                             <b>{{ 'Strona'|trans }}:</b> <a href="{{ path('page_form',{'id':object_product.page.id}) }}">{{ object_product.page.translate(object_product.page.locale).name }}</a>*/
/*                             </p>*/
/*                             */
/*                             {#{% if object_product.page.code is not null %}*/
/*                                 <p>{{ 'Kod został aktywowany przez użytkownika'|trans }}: <b>{{object_product.page.code}}</b></p>*/
/*                             {% endif %}#}*/
/*                             */
/*                             {% for code in object_product.codes %} */
/*                                 <p>{{ 'Przypisany kod to'|trans }}: <b>{{object_product.code.code }}</b>*/
/*                                 (Okres: {% if code.group.product is not null %}{{ code.group.months/12 }} lat{% else %}Brak{% endif %}, */
/*                                 Produkt: {% if code.group.product is not null %}{{code.group.product.name}}{% else %}Kody uniwersalne{% endif %})*/
/*                                 - <a style="color:red;" href="?delete=1&code_id={{code.id}}&product_id={{object_product.id}}">Usuń</a>*/
/*                                 </p>*/
/*                                 {% if code.page is not null %}*/
/*                                     <p>{{ 'Kod został aktywowany przez użytkownika'|trans }}: <b>{{code.page.creator.fullname}}</b></p>*/
/*                                 {% endif %}*/
/*                             {% endfor %}   */
/*                             */
/*                             {% if object_product.codes|length %}*/
/* {#                                <p>{{ 'Przypisany kod to'|trans }}: <b>{{object_product.code.code }}</b></p>#}*/
/*                             {% else %}*/
/*                                 <div class="orderform">*/
/*                                     <p>{{ 'Zeskanuj kod wysyłanego produktu aby powiązać go z zamówieniem'|trans }}: </p>*/
/*                                     <input type="text" name="code" data-product="{{object_product.id}}" autocomplete="off" />*/
/*                                     <div class="result"></div>*/
/*                                 </div>*/
/*                             {% endif %}    */
/*                         </div>*/
/*                     {% endif %} */
/*                     */
/*                     */
/*                     */
/*                     {% if object_product.product.type.id=='3' and object_product.product.category.id=='1' %}*/
/*                         <div class="content">*/
/*                             <h3><i class="fa fa-fw fa-fire"></i> {{ 'Zamówienie usługi dla strony'|trans }}</h3>*/
/*                             <p>*/
/*                             <b>{{ 'Usługa'|trans }}:</b> <a href="{{ path('product_form',{'id':object_product.product.id}) }}">{{ object_product.product.name }}</a><br>*/
/*                             <b>{{ 'Strona'|trans }}:</b> <a href="{{ path('page_form',{'id':object_product.page.id}) }}">{{ object_product.page.translate(object_product.page.locale).name }}</a><br>   */
/*                             <a href="{{ path('contract_form', {'id': object_product.id})}}" class="">{{ 'Przejdź do strony usługi'|trans }}</a>*/
/*                             </p>*/
/*                             */
/*                             {% if object_product.contractor is not null %}*/
/*                                 {{ tabUser(object_product.contractor)|raw }}<br>*/
/*                                 <p>*/
/*                                 <b>{{ 'Wykonawca'|trans }}:</b> {{ object_product.contractor.fullname }}<br>*/
/*                                 <b>{{ 'Opis'|trans }}:</b> {{ object_product.contractor.description }}<br>*/
/*                                 <b>{{ 'Firma'|trans }}:</b> {{ address(object_product.contractor.billingaddress)|raw }}<br><br> */
/*                                 <b>{{ 'Potwierdzenie wykonania usługi przez firmę'|trans }}:</b> {{ object_product.contractorconfirmed|dateornot|raw }}<br> */
/*                                 <b>{{ 'Potwierdzenie odebrania usługi przez klienta'|trans }}:</b> {{ object_product.customerconfirmed|dateornot|raw }}*/
/*                                 </p>*/
/*                             {% endif %}*/
/*                             */
/*                             */
/*                             {% if object_product.page is defined %}*/
/*                             <div class="orderform">*/
/*                                 <p>{{ 'Przypisz podwykonawce'|trans }}: </p>*/
/*                                 <input type="text" name="contractor" placeholder="{{ 'Miasto lub nazwa wykonawcy'|trans }}" value="{% if object_product.contractor is null %}{{ object_product.page.address.city }}{% endif %}" data-product="{{object_product.id}}"  autocomplete="off" />*/
/*                                 <div class="result"></div>*/
/*                             </div>*/
/*                             {% endif %}    */
/*                         </div>*/
/*                     {% endif %}  */
/*                     */
/*                 {% endfor %}*/
/*             {% endif %}*/
/*         {% endif %}*/
/*         */
/*         {% if object.orderproducts.first() and not object.canceled and (app.user.type in ['admin','trader','worker'] or not object.confirmed or not object.paid )  %} */
/* */
/*         <div class="content">*/
/*         {% if not object.confirmed and (not object.invoice or object.invoice)  %}*/
/*             */
/*             <script>*/
/*             $( document ).ready(function() { */
/*                 function bindInvoice(){*/
/*                     $('#order_invoice_option').bind('change',function(){ */
/*                         var val=0;*/
/* */
/*                         var element=$(this).parents('.content').first();*/
/*                         element.find('a').hide();*/
/*                         */
/*                         if($(this).is(':checked')) val=1;    */
/*                         else val=0;*/
/* */
/*                         $.ajax({*/
/*                             type        : 'GET',*/
/*                             url         : '?invoice='+val, */
/*                         })*/
/*                         .done(function(data) {*/
/*                             $('#invoice-result').html(data);*/
/*                             bindInvoice();*/
/*                            */
/*                             element.find('a').show();*/
/*                         });*/
/* */
/*                     });*/
/*                 }*/
/*                 bindInvoice();*/
/*             });*/
/*             </script>  */
/*             <div id="invoice-result">*/
/*             {{ include ('AppBundle:Order:formInvoice.html.twig', {'object':object, 'error':null}) }}*/
/*             </div>*/
/*         {% endif %}    */
/*             */
/*             */
/*             <div class="options"> */
/* */
/*             */
/*             {% set pay=1 %}*/
/*             {% if object.paid %} {% set pay=0 %} {% endif %}  */
/*             {% if payu_switch[object.currency] is not defined %} {% set pay=0 %} {% endif %} */
/*             {% if object.price<=0 %} {% set pay=0 %} {% endif %} */
/*             */
/*             {% if not object.paid %}   */
/*             {% for payment in object.payments %} */
/*                 {% if payment.finished is null and payment.started is not null %}*/
/*                     {% set pay=0 %}*/
/*                 {% endif %}*/
/*             {% endfor %}*/
/*             {% endif %}*/
/* */
/*             {% if not object.confirmed and pay==0  %} */
/*                 <a class="button" href="{{ path('order_form', {'id': object.id,'confirm': 1})}}">{{ 'Zatwierdź zamówienie'|trans }}</a>*/
/*             {% endif  %}    */
/*             {% if not object.confirmed and pay==1  %}   */
/*                 <a class="button" href="{{ path('order_form', {'id': object.id,'confirm': 1, 'payu':1})}}">{{ 'Zatwierdź zamówienie i opłać online'|trans }}</a>*/
/*             {% endif  %}*/
/*             {% if object.confirmed and pay==1    %}   */
/*                 <a class="button" href="{{ path('order_form', {'id': object.id,'payu':1})}}">{{ 'Opłać zamówienie online'|trans }}</a>*/
/*             {% endif  %}*/
/*             */
/*             */
/*             */
/*             */
/*             {% if(app.user.type in ['admin','trader','worker'] and object.confirmed)  %} */
/*                 <a class="button" href="{{ path('order_form', {'id': object.id,'print': 1})}}">{{ 'Drukuj zamówienie'|trans }}</a> */
/*             {% endif  %}   */
/*             */
/*             {% if(app.user.type in ['admin','trader','worker'] and object.confirmed and not object.canceled and not object.done ) %}          */
/*                 <a class="button" href="{{ path('order_form', {'id': object.id,'done': 1})}}">{{ 'Zakończ zamówienie'|trans }}</a>      */
/*             {% endif  %}   */
/* */
/*             {% if(app.user.type in ['admin','trader','worker'] and  not object.paid and  not object.confirmed  and  not object.canceled) %}          */
/*                 <a class="button" href="{{ path('order_form', {'id': object.id,'cancel': 1})}}">{{ 'Anuluj zamówienie'|trans }}</a>      */
/*             {% endif  %}   */
/* */
/*             */
/*             </div>*/
/*         </div>     */
/*         {% endif  %}    */
/*             */
/*     {% endif %}*/
/*   */
/*     */
/* {% endblock %}*/
