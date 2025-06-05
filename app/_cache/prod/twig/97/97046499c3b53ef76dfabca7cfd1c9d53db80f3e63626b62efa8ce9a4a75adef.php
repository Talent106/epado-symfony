<?php

/* AppBundle:Public:posts.html.twig */
class __TwigTemplate_cfb92f3415a47d27924d8bb5e4b30a1aa7ce7a23a71f920ba91d68fc9b6dca1b extends Twig_Template
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
        echo "                ";
        if (twig_test_iterable((isset($context["posts"]) ? $context["posts"] : null))) {
            // line 2
            echo "                    ";
            $context["last_post_id"] = null;
            // line 3
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 4
                echo "                        ";
                if (($this->getAttribute($context["loop"], "last", array()) && ($this->getAttribute($context["loop"], "index", array()) == 10))) {
                    // line 5
                    echo "                        <div class=\"post\">    
                            <a href=\"";
                    // line 6
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("last_post_id" => $this->getAttribute($context["post"], "id", array()))), "html", null, true);
                    echo "\" class=\"button small refresh\"><i class=\"fa fa-refresh\"></i>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zobacz kolejne"), "html", null, true);
                    echo "</a>
                        </div>    
                        ";
                } else {
                    // line 8
                    echo "    
                        <div class=\"post\">
                            ";
                    // line 10
                    if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
                        // line 11
                        echo "                               ";
                        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["page"]) ? $context["page"] : null), 1 => "page_posts_delete"), "method"))) {
                            echo " 
                                   <a href=\"?post_delete_id=";
                            // line 12
                            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "id", array()), "html", null, true);
                            echo "\" class=\"icon delete\"><i class=\"fa fa-times\"></i></a>
                               ";
                        }
                        // line 13
                        echo "     
                            ";
                    }
                    // line 14
                    echo " 
                            ";
                    // line 15
                    echo $this->env->getExtension('app_extension')->tabUser($this->getAttribute($context["post"], "creator", array()));
                    echo "
                            <p class=\"name\">";
                    // line 16
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], "creator", array()), "fullname", array()), "html", null, true);
                    echo "<span>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateTimeFilter($this->getAttribute($context["post"], "created", array())), "html", null, true);
                    echo "</span></p>
                            <p class=\"message\">";
                    // line 17
                    echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "message", array()), "html", null, true);
                    echo "</p>
                        </div>  
                        ";
                }
                // line 19
                echo " 
                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "    
                ";
        }
        // line 21
        echo " ";
    }

    public function getTemplateName()
    {
        return "AppBundle:Public:posts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 21,  111 => 20,  96 => 19,  90 => 17,  84 => 16,  80 => 15,  77 => 14,  73 => 13,  68 => 12,  63 => 11,  61 => 10,  57 => 8,  49 => 6,  46 => 5,  43 => 4,  25 => 3,  22 => 2,  19 => 1,);
    }
}
/*                 {% if posts is iterable %}*/
/*                     {% set last_post_id=null %}*/
/*                     {% for post in posts %}*/
/*                         {% if(loop.last and loop.index==10) %}*/
/*                         <div class="post">    */
/*                             <a href="{{ extend({'last_post_id':post.id}) }}" class="button small refresh"><i class="fa fa-refresh"></i>{{ 'Zobacz kolejne'|trans }}</a>*/
/*                         </div>    */
/*                         {% else %}    */
/*                         <div class="post">*/
/*                             {% if app.user %}*/
/*                                {% if app.user and app.user.havepagepermission(page,'page_posts_delete') %} */
/*                                    <a href="?post_delete_id={{post.id}}" class="icon delete"><i class="fa fa-times"></i></a>*/
/*                                {% endif %}     */
/*                             {% endif %} */
/*                             {{ tabUser(post.creator|raw)|raw }}*/
/*                             <p class="name">{{ post.creator.fullname }}<span>{{ post.created|mydatetime() }}</span></p>*/
/*                             <p class="message">{{post.message}}</p>*/
/*                         </div>  */
/*                         {% endif %} */
/*                     {% endfor %}    */
/*                 {% endif %} */
