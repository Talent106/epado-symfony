<?php

/* AppBundle:Page:form.html.twig */
class __TwigTemplate_189a5172cc265f50dc3411966bcae5237d277d4107334257950834cf3e3b5dfb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.html.twig", "AppBundle:Page:form.html.twig", 1);
        $this->blocks = array(
            '_page_file_row' => array($this, 'block__page_file_row'),
            '_page_localisation_map_row' => array($this, 'block__page_localisation_map_row'),
            '_page_translations_row' => array($this, 'block__page_translations_row'),
            'date_widget' => array($this, 'block_date_widget'),
            'textarea_row' => array($this, 'block_textarea_row'),
            '_translations_artgate_description_row' => array($this, 'block__translations_artgate_description_row'),
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

    // line 9
    public function block__page_file_row($context, array $blocks = array())
    {
        // line 10
        echo "
";
        // line 12
        echo "        <div class=\"widget\" id=\"background\">
            
            ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
            ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        </div> 
        ";
        // line 18
        if (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-path", array(), "array") != "")) {
            // line 19
            echo "        <div class=\"widget\">   
            <label>";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Twoje zdjęcie w tle"), "html", null, true);
            echo "</label>
            <div class=\"field background\">
                
                <div class=\"effect\">
                <label for=\"bg0\" class=\"img\" style=\"";
            // line 24
            echo "\">
                    <span class=\"zoom tip\" title=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Powiększ zdjęcie"), "html", null, true);
            echo "\"><a href=\"/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-path", array(), "array"), "html", null, true);
            echo "\" style=\"position:absolute; top:0; left:0; width:100%; height:100%; display:block;\"></a></span> 
                    
                    <div class=\"input\" style=\"z-index:1;\"><input id=\"bg0\" ";
            // line 27
            if (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-path", array(), "array") == $this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-background", array(), "array"))) {
                echo "checked=\"checked\"";
            }
            echo " type=\"radio\" name=\"background\" data-image=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-path", array(), "array"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-path", array(), "array"), "html", null, true);
            echo "\"></div>
                </label>
                <div class=\"custom\" style=\"position:absolute; width:100%; height:100%; background-size:cover; background-image:url(/";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-path", array(), "array"), "html", null, true);
            echo "); z-index:0;\"></div>
                </div>
                
            </div>
        </div>
        ";
        }
        // line 34
        echo "         
        <div class=\"widget\">  
            <label>";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Możesz też wybrać gotowe zdjęcie w tle"), "html", null, true);
        echo "</label> 
            
            <div class=\"field background\">  
                ";
        // line 39
        $context["bg"] = "uploads/backgrounds/1.jpg";
        // line 40
        echo "                ";
        $context["nr"] = "1";
        // line 41
        echo "                <label for=\"bg";
        echo twig_escape_filter($this->env, (isset($context["nr"]) ? $context["nr"] : null), "html", null, true);
        echo "\" class=\"img\" style=\"background-image:url(/";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo ");\">
                    <span class=\"zoom tip\" title=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Powiększ zdjęcie"), "html", null, true);
        echo "\"><a href=\"/";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo "\" style=\"position:absolute; top:0; left:0; width:100%; height:100%; display:block;\"></a></span> 
                    
                    <div class=\"input\"><input id=\"bg";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["nr"]) ? $context["nr"] : null), "html", null, true);
        echo "\" ";
        if (((isset($context["bg"]) ? $context["bg"] : null) == $this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-background", array(), "array"))) {
            echo "checked=\"checked\"";
        }
        echo " type=\"radio\" name=\"background\" data-image=\"";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo "\"></div>
                </label>
                
                ";
        // line 47
        $context["bg"] = "uploads/backgrounds/2.jpg";
        // line 48
        echo "                ";
        $context["nr"] = "2";
        // line 49
        echo "                <label for=\"bg";
        echo twig_escape_filter($this->env, (isset($context["nr"]) ? $context["nr"] : null), "html", null, true);
        echo "\" class=\"img\" style=\"background-image:url(/";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo ");\">
                    <span class=\"zoom tip\" title=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Powiększ zdjęcie"), "html", null, true);
        echo "\"><a href=\"/";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo "\" style=\"position:absolute; top:0; left:0; width:100%; height:100%; display:block;\"></a></span> 
                    
                    <div class=\"input\"><input id=\"bg";
        // line 52
        echo twig_escape_filter($this->env, (isset($context["nr"]) ? $context["nr"] : null), "html", null, true);
        echo "\" ";
        if (((isset($context["bg"]) ? $context["bg"] : null) == $this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-background", array(), "array"))) {
            echo "checked=\"checked\"";
        }
        echo " type=\"radio\" name=\"background\" data-image=\"";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo "\"></div>
                </label>
                
                ";
        // line 55
        $context["bg"] = "uploads/backgrounds/3.jpg";
        // line 56
        echo "                ";
        $context["nr"] = "3";
        // line 57
        echo "                <label for=\"bg";
        echo twig_escape_filter($this->env, (isset($context["nr"]) ? $context["nr"] : null), "html", null, true);
        echo "\" class=\"img\" style=\"background-image:url(/";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo ");\">
                    <span class=\"zoom tip\" title=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Powiększ zdjęcie"), "html", null, true);
        echo "\"><a href=\"/";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo "\" style=\"position:absolute; top:0; left:0; width:100%; height:100%; display:block;\"></a></span> 
                    
                    <div class=\"input\"><input id=\"bg";
        // line 60
        echo twig_escape_filter($this->env, (isset($context["nr"]) ? $context["nr"] : null), "html", null, true);
        echo "\" ";
        if (((isset($context["bg"]) ? $context["bg"] : null) == $this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-background", array(), "array"))) {
            echo "checked=\"checked\"";
        }
        echo " type=\"radio\" name=\"background\" data-image=\"";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["bg"]) ? $context["bg"] : null), "html", null, true);
        echo "\"></div>
                </label>

            </div>
        </div>         
";
    }

    // line 68
    public function block__page_localisation_map_row($context, array $blocks = array())
    {
        // line 69
        echo "    <div class=\"widget\">
        ";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
        <div class=\"field withlocalisation\">
        ";
        // line 72
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        <p class=\"mapdefault\">";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Jeżeli znajdujesz się przy tym miejscu możesz zlokalizować je za pomocą Twojego urządzenia klikając w poniższy przycisk."), "html", null, true);
        echo "</p>
        <p class=\"mapwait hidden\">";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Poczekaj. Trwa lokalizowanie Twojego urządzenia."), "html", null, true);
        echo "</p>
        <p class=\"maperror hidden\">";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Niestety Twoje urządzenie nie wspiera funkcji lokalizacyjnych."), "html", null, true);
        echo "</p>
        <p class=\"mapwarning hidden\">";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Twoje urządzenie wspiera funkcje lokalizacji ale niestety nie mogło jej znaleźć. Upewnij się że masz włączony GPS i dałeś stronie pozwolenie na korzystanie z geolokalizacji."), "html", null, true);
        echo "</p>
        <p class=\"mapsuccess hidden\">";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Udało się zlokalizować Twoje urządzenie, sprawdź czy pozycja na mapie się zgadza. Kolorem niebieskim zaznaczony jest obszar wyznaczający dokładność pomiaru. Jeżeli urządzenie błędnie wskazało lokalizacje to spróbuj zlokalizować je ponownie lub przeciągnij i upuść marker na właściwe miejsce."), "html", null, true);
        echo "</p>
        
        <a href=\"\" class=\"button getlocalisation\"><i class=\"fa fa-map-marker\"></i> ";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Twoja lokalizacja"), "html", null, true);
        echo "</a>
        </div>
    </div> 
";
    }

    // line 86
    public function block__page_translations_row($context, array $blocks = array())
    {
        // line 87
        echo "    <div class=\"widget\">
        ";
        // line 88
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array())) != 1)) {
            // line 89
            echo "            ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
            echo "
        ";
        }
        // line 91
        echo "        
        ";
        // line 92
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 93
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
    </div> 
";
    }

    // line 98
    public function block_date_widget($context, array $blocks = array())
    {
        // line 99
        if (((isset($context["widget"]) ? $context["widget"] : null) == "single_text")) {
            // line 100
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 102
            echo "<div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
            <div>";
            // line 103
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "year", array()), 'widget');
            echo "</div>
            <div>";
            // line 104
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "month", array()), 'widget');
            echo "</div>
            <div>";
            // line 105
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "day", array()), 'widget');
            echo "</div>
            ";
            // line 111
            echo "        </div>";
        }
    }

    // line 117
    public function block_textarea_row($context, array $blocks = array())
    {
        // line 118
        echo "    ";
        if (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-bio", array(), "array", true, true) && ((isset($context["name"]) ? $context["name"] : null) == "description"))) {
            // line 119
            echo "    <div class=\"widget\">
        <label>";
            // line 120
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Gotowa biografia"), "html", null, true);
            echo "</label>
        <div class=\"field\">
            <select class=\"preset\" data-target=\"description\">
            <option value=\"\">";
            // line 123
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wybierz z listy"), "html", null, true);
            echo "</option>
            <option value=\"\"></option>
            <option value=\"tata\">";
            // line 125
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Tata"), "html", null, true);
            echo "</option>
            <option value=\"mama\">";
            // line 126
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mama"), "html", null, true);
            echo "</option>
            <option value=\"babcia\">";
            // line 127
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Babcia"), "html", null, true);
            echo "</option>
            <option value=\"dziadek\">";
            // line 128
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dziadek"), "html", null, true);
            echo "</option>
            </select>
        </div>
    </div> 
    <script>
    \$('select.preset').on('change',function(){ 

      var preset='';
      if(\$(this).val().toLowerCase()=='mama') preset='";
            // line 136
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moja mama była osobą niezwykle drogą memu sercu - kochającą, dobrą i mądrą. Z wielką pokorą znosiła wszelkie przeciwności losu, do ostatniej chwili cieszyła się życiem, zawsze na pierwszym miejscu stawiając dzieci i wnuki, którym bezgranicznie się poświęcała. To ona nauczyła mnie wrażliwości na drugiego człowieka i szacunku dla historii, to dzięki niej nasza rodzina potrafi trzymać się razem. Okazywała nam miłość i czułość, ale potrafiła być także wymagająca, wyrażając troskę o  naszą przyszłość. To dzięki niej nauczyłam się życia. Dziękuję Ci za to, kochana Mamusiu..."), "html", null, true);
            echo "'; 
      if(\$(this).val().toLowerCase()=='tata') preset='";
            // line 137
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mój ojciec był wspaniałym człowiekiem, który ofiarował mi wspaniałe dzieciństwo, wykształcił i wychował mnie na człowieka, którym jestem dzisiaj. Żył pięknie i szczerze, potrafił być współczujący i wrażliwy, a równocześnie umiał także wymagać. Niósł pomoc w trudnych chwilach, wspierał całą naszą rodzinę i przyjaciół ciepłem, mądrością oraz dobrym słowem. Jego sprawiedliwość i wyrozumiałość dawała poczucie bezpieczeństwa, bo zawsze trzeźwo oceniał, ale nigdy nie był krzywdzący w swoich osądach. Zasiał ziarno kultury i dobrego wychowania, za co dozgonnie będę mu wdzięczny. Żegnaj, Tato..."), "html", null, true);
            echo "'; 
      if(\$(this).val().toLowerCase()=='babcia') preset='";
            // line 138
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moja babcia była osobą niezwykle drogą memu sercu - kochającą, dobrą i mądrą. Z wielką pokorą znosiła wszelkie przeciwności losu, do ostatniej chwili cieszyła się życiem, zawsze na pierwszym miejscu stawiając dzieci i wnuki, którym bezgranicznie się poświęcała. To ona nauczyła mnie wrażliwości na drugiego człowieka i szacunku dla historii, to dzięki niej nasza rodzina potrafi trzymać się razem. Okazywała nam miłość i czułość, ale potrafiła być także wymagająca, wyrażając troskę o naszą przyszłość. To dzięki niej nauczyłam się życia. Dziękuję Ci za to, kochana Babciu..."), "html", null, true);
            echo "'; 
      if(\$(this).val().toLowerCase()=='dziadek') preset='";
            // line 139
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mój dziadek do końca pozostał szlachetnym człowiekiem, autorytetem dla mnie i całej naszej rodziny. Mimo że wiele przeżył, zawsze potrafił zachować pogodę ducha i nigdy nie szczędził dobrego słowa, dzieląc się swoim doświadczeniem i mądrością. Zapamiętam go jako szlachetnego, sprawiedliwego i życzliwego wszystkim człowieka, który przez całe życie starał się uczyć nas siły, wiary oraz pracowitości. Jako oddany patriota, ojciec i dziadek zdobył szacunek wielu i pozostawił moc wspaniałych wspomnień, które na zawsze pozostaną w naszych sercach. To dzięki niemu nauczyłam się życia. Dziękuję Ci za to, ukochany Dziadku..."), "html", null, true);
            echo "'; 
      
      if(preset) \$(this).parent().parent().parent().find('textarea').val(preset).keyup();

    });
    </script>     
    ";
        }
        // line 146
        echo "
    
    ";
        // line 148
        $this->displayBlock("form_row", $context, $blocks);
        echo "
";
    }

    // line 152
    public function block__translations_artgate_description_row($context, array $blocks = array())
    {
        echo " ";
        // line 153
        echo "    ";
        // line 154
        echo "    ";
        // line 155
        echo "    ";
        // line 156
        echo "    ";
        echo "   
    ";
        // line 157
        if ($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-bio", array(), "array", true, true)) {
            // line 158
            echo "    <div class=\"widget\">
        <label>";
            // line 159
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Gotowa biografia"), "html", null, true);
            echo "</label>
        <div class=\"field\">
            <select class=\"preset\" data-target=\"description\">
            <option value=\"\">";
            // line 162
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wybierz z listy"), "html", null, true);
            echo "</option>
            <option value=\"\"></option>
            <option value=\"Tata\">";
            // line 164
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Tata"), "html", null, true);
            echo "</option>
            <option value=\"Mama\">";
            // line 165
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mama"), "html", null, true);
            echo "</option>
            <option value=\"Babcia\">";
            // line 166
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Babcia"), "html", null, true);
            echo "</option>
            <option value=\"Dziadek\">";
            // line 167
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dziadek"), "html", null, true);
            echo "</option>
            </select>
        </div>
    </div> 
    ";
        }
        // line 172
        echo "    <div class=\"widget\">
        ";
        // line 173
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label');
        echo "
        <div class=\"field\">";
        // line 174
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "</div>
        ";
        // line 175
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
    </div> 
    <script>
    \$('select.preset').on('change',function(){ 

      var preset='';
      if(\$(this).val().toLowerCase()=='mama') preset='";
        // line 181
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moja mama była osobą niezwykle drogą memu sercu - kochającą, dobrą i mądrą. Z wielką pokorą znosiła wszelkie przeciwności losu, do ostatniej chwili cieszyła się życiem, zawsze na pierwszym miejscu stawiając dzieci i wnuki, którym bezgranicznie się poświęcała. To ona nauczyła mnie wrażliwości na drugiego człowieka i szacunku dla historii, to dzięki niej nasza rodzina potrafi trzymać się razem. Okazywała nam miłość i czułość, ale potrafiła być także wymagająca, wyrażając troskę o  naszą przyszłość. To dzięki niej nauczyłam się życia. Dziękuję Ci za to, kochana Mamusiu..."), "html", null, true);
        echo "'; 
      if(\$(this).val().toLowerCase()=='tata') preset='";
        // line 182
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mój ojciec był wspaniałym człowiekiem, który ofiarował mi wspaniałe dzieciństwo, wykształcił i wychował mnie na człowieka, którym jestem dzisiaj. Żył pięknie i szczerze, potrafił być współczujący i wrażliwy, a równocześnie umiał także wymagać. Niósł pomoc w trudnych chwilach, wspierał całą naszą rodzinę i przyjaciół ciepłem, mądrością oraz dobrym słowem. Jego sprawiedliwość i wyrozumiałość dawała poczucie bezpieczeństwa, bo zawsze trzeźwo oceniał, ale nigdy nie był krzywdzący w swoich osądach. Zasiał ziarno kultury i dobrego wychowania, za co dozgonnie będę mu wdzięczny. Żegnaj, Tato..."), "html", null, true);
        echo "'; 
      if(\$(this).val().toLowerCase()=='babcia') preset='";
        // line 183
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Moja babcia była osobą niezwykle drogą memu sercu - kochającą, dobrą i mądrą. Z wielką pokorą znosiła wszelkie przeciwności losu, do ostatniej chwili cieszyła się życiem, zawsze na pierwszym miejscu stawiając dzieci i wnuki, którym bezgranicznie się poświęcała. To ona nauczyła mnie wrażliwości na drugiego człowieka i szacunku dla historii, to dzięki niej nasza rodzina potrafi trzymać się razem. Okazywała nam miłość i czułość, ale potrafiła być także wymagająca, wyrażając troskę o naszą przyszłość. To dzięki niej nauczyłam się życia. Dziękuję Ci za to, kochana Babciu..."), "html", null, true);
        echo "'; 
      if(\$(this).val().toLowerCase()=='dziadek') preset='";
        // line 184
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mój dziadek do końca pozostał szlachetnym człowiekiem, autorytetem dla mnie i całej naszej rodziny. Mimo że wiele przeżył, zawsze potrafił zachować pogodę ducha i nigdy nie szczędził dobrego słowa, dzieląc się swoim doświadczeniem i mądrością. Zapamiętam go jako szlachetnego, sprawiedliwego i życzliwego wszystkim człowieka, który przez całe życie starał się uczyć nas siły, wiary oraz pracowitości. Jako oddany patriota, ojciec i dziadek zdobył szacunek wielu i pozostawił moc wspaniałych wspomnień, które na zawsze pozostaną w naszych sercach. To dzięki niemu nauczyłam się życia. Dziękuję Ci za to, ukochany Dziadku..."), "html", null, true);
        echo "'; 

      if(preset) \$(this).parent().parent().next().find('textarea').val(preset).keyup();

    });
    </script>
        
";
    }

    // line 194
    public function block_header($context, array $blocks = array())
    {
        echo "<h1><i class=\"fa fa-newspaper-o\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona"), "html", null, true);
        echo "</h1>";
    }

    // line 196
    public function block_content($context, array $blocks = array())
    {
        // line 197
        echo "    

    ";
        // line 199
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array())) {
            // line 200
            echo "    <div class=\"content\">
        <div class=\"options\">
        ";
            // line 202
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "code", array())) {
                echo "    
        <a href=\"";
                // line 203
                echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->pageUrl($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "code", array())), "html", null, true);
                echo "\" class=\"button\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Przejdź do strony"), "html", null, true);
                echo "</a>    
        <a href=\"";
                // line 204
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_code", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
                echo "\" class=\"button\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wygeneruj kod QR"), "html", null, true);
                echo "</a>   
        ";
            } else {
                // line 205
                echo "      
        <a href=\"";
                // line 206
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_preview", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
                echo "\" class=\"button\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Podgląd strony"), "html", null, true);
                echo "</a>
        ";
            }
            // line 208
            echo "        </div>

        ";
            // line 210
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "code", array())) {
                echo "    
        <p>";
                // line 211
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona posiada aktywny kod Epado."), "html", null, true);
                echo "</p> 
        
            ";
                // line 213
                if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "expired", array()) < $this->env->getExtension('app_extension')->nowObject())) {
                    // line 214
                    echo "                <p style=\"color:red;\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona wygasła dnia:"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "expired", array())), "html", null, true);
                    echo "</p>
            ";
                } else {
                    // line 215
                    echo "   
                <p>";
                    // line 216
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Strona opłacona do dnia:"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->dateFilter($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "expired", array())), "html", null, true);
                    echo "</p>
            ";
                }
                // line 218
                echo "        
        ";
            } else {
                // line 219
                echo "      
        <p>";
                // line 220
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Podaj kod aktywacyjny, który znajduje się w liście. Jeżeli nie posiadasz kodu epado możesz zakupić jeden z pakietów online, zostanie on wysłany do Ciebie pocztą. W przesyłce będzie znajdował się kod aktywacyjny, który trzeba będzie wpisać w poniższe pole. Istnieje również możliwość zakupu kodu u jednego z naszych partnerów."), "html", null, true);
                echo "</p>
        <form action=\"\" method=\"get\">
            <div class=\"widget\">
            <input type=\"text\" name=\"password\" placeholder=\"";
                // line 223
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Podaj kod aktywacyjny"), "html", null, true);
                echo "\"> 
            </div>
            <button class=\"small\" type=\"submit\">";
                // line 225
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Aktywuj stronę"), "html", null, true);
                echo "</button>
        </form> 
        ";
            }
            // line 228
            echo "        
        ";
            // line 229
            if ((($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "remind", array()) &&  !$this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "creator", array()), "phone", array())) && ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array()), "id", array()) == 1))) {
                echo "  
            <p>";
                // line 230
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Masz ustawione przypomnienie o rocznicy, jeżeli chcesz żeby przypomnienie było wysyłane do Ciebie jako SMS musisz podać swój nr telefonu. Możesz to zrobić tutaj:"), "html", null, true);
                echo " <a href=\"";
                echo $this->env->getExtension('routing')->getPath("profile_edit");
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("tutaj"), "html", null, true);
                echo "</a>. ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Przypomnienie będzie wysyłane również na Twój adres email."), "html", null, true);
                echo "</p>
        ";
            }
            // line 232
            echo "    </div>
    ";
        }
        // line 234
        echo "    


    ";
        // line 237
        if ( !(null === (isset($context["type"]) ? $context["type"] : null))) {
            // line 238
            echo "    <div class=\"content\">
        <div class=\"pageselect boxes\">    
            <a href=\"";
            // line 240
            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("type" => 1)), "html", null, true);
            echo "\" class=\"element box";
            if (((isset($context["type"]) ? $context["type"] : null) == 1)) {
                echo " active";
            }
            echo "\"><i class=\"fa fa-fw fa-user\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Upamiętnienie osoby"), "html", null, true);
            echo "</a>
            <a href=\"";
            // line 241
            echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->extendUrl(array("type" => 2)), "html", null, true);
            echo "\" class=\"element box";
            if (((isset($context["type"]) ? $context["type"] : null) == 2)) {
                echo " active";
            }
            echo "\"><i class=\"fa fa-fw fa-map-marker\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Upamiętnienie miejsca"), "html", null, true);
            echo "</a>
        </div>  
    </div>
    ";
        }
        // line 245
        echo "
    ";
        // line 246
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["object"]) ? $context["object"] : null), 1 => "page_edit"), "method") || $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["object"]) ? $context["object"] : null), 1 => "page_background"), "method"))) {
            // line 247
            echo "    <div class=\"content\">

        
        ";
            // line 250
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start');
            echo "
        ";
            // line 251
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
            echo "
        ";
            // line 252
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget', array("test" => 4));
            echo "
        ";
            // line 253
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
            echo "
    </div>
    ";
        }
        // line 256
        echo "    
    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('#page_cemetery_object').change(function(){
                
                if(\$(this).val()!=''){
                    var object_data=JSON.parse(\$(this).val());
                    
                    if(object_data.address)
                    {
                        \$(this).parents('form').find('.city').val(object_data.address.city);
                        \$(this).parents('form').find('.address').val(object_data.address.address);
                        \$(this).parents('form').find('#page_address_postal_code').val(object_data.address.postalcode);
                        \$(this).parents('form').find('.country').val(object_data.address.country);
                        
                    }
                    
                    if(object_data.localisation)
                    {    
                        \$(this).parents('form').find('.longitude').val(object_data.localisation.longitude);
                        \$(this).parents('form').find('.latitude').val(object_data.localisation.latitude);
                        \$(this).parents('form').find('.latitude').change();
                    }
                    

                        
                }
            });

        }); 
    </script>

    ";
        // line 289
        echo "    
    <div class=\"hidden page_cemetery_search\">
        <ul class=\"result\">
            <li><a href=\"";
        // line 292
        echo $this->env->getExtension('routing')->getPath("cemetery_form");
        echo "\" class=\"element add\"><i class=\"fa fa-plus-circle\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj nowy cmentarz"), "html", null, true);
        echo " <span style=\"display:none;\" class=\"name\"></span></a></li>
            
            ";
        // line 294
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "cemeteries", array())) < 20)) {
            // line 295
            echo "              ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "cemeteries", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["cemetery"]) {
                // line 296
                echo "                ";
                echo twig_include($this->env, $context, "AppBundle:Cemetery:element.html.twig", array("object" => $context["cemetery"]));
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cemetery'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 298
            echo "            ";
        }
        echo "    
            
        </li>
    </div>
            
    <div class=\"hidden page_family_search\">
        <ul class=\"result\">
            <li><a href=\"";
        // line 305
        echo $this->env->getExtension('routing')->getPath("family_form");
        echo "\" class=\"element add\"><i class=\"fa fa-plus-circle\"></i>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj rodzinę"), "html", null, true);
        echo " <span class=\"name\"></span></a></li>
            ";
        // line 306
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "families", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["family"]) {
            // line 307
            echo "            ";
            echo twig_include($this->env, $context, "AppBundle:Family:element.html.twig", array("object" => $context["family"]));
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['family'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 308
        echo "    
            ";
        // line 309
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "credentials", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 310
            echo "              ";
            if ( !(null === $this->getAttribute($context["c"], "family", array()))) {
                echo "  
              ";
                // line 311
                echo twig_include($this->env, $context, "AppBundle:Family:element.html.twig", array("object" => $this->getAttribute($context["c"], "family", array())));
                echo "   
              ";
            }
            // line 313
            echo "            ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "   
            
        </ul>
    </div>   
            
    ";
        // line 318
        if ((isset($context["products"]) ? $context["products"] : null)) {
            // line 319
            echo "        <h1><i class=\"fa fa-cube\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Produkty i usługi"), "html", null, true);
            echo "</h1>
        ";
            // line 320
            $this->loadTemplate("AppBundle:Product:products.html.twig", "AppBundle:Page:form.html.twig", 320)->display(array("products" => (isset($context["products"]) ? $context["products"] : null), "page" => (isset($context["object"]) ? $context["object"] : null)));
            // line 321
            echo "    ";
        }
        // line 322
        echo "    
    ";
        // line 323
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()) && ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array()), "id", array()) == 2))) {
            // line 324
            echo "        <h1><i class=\"fa fa-music\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Audiobooki"), "html", null, true);
            echo "</h1>
        
        ";
            // line 326
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "audiobooks", array()))) {
                // line 327
                echo "            <div class=\"content\">
                <script src=\"/js/soundmanager/script/soundmanager2-jsmin.js\"></script>
                <script type=\"text/javascript\">
                    soundManager.setup({
                      // path to directory containing SM2 SWF
                      url: '/js/soundmanager/swf/'
                    });
                    
                    soundManager.debugMode = false;
                </script>

                <script type=\"text/javascript\" src=\"/js/soundmanager/demo/360-player/script/berniecode-animator.js\"></script>
                <script type=\"text/javascript\" src=\"/js/soundmanager/demo/360-player/script/360player.js\"></script>
                <link rel=\"stylesheet\" href=\"/js/soundmanager/demo/360-player/360player.css\" />
                

                <form action=\"";
                // line 343
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_audiobook", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
                echo "\" method=\"post\">
                ";
                // line 344
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "audiobooks", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["audiobook"]) {
                    // line 345
                    echo "                <div class=\"audiorow\">   
                    <a href=\"";
                    // line 346
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_audiobook", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "delete_id" => $this->getAttribute($context["audiobook"], "id", array()))), "html", null, true);
                    echo "\" class=\"btn-del\"></a>
                    <div class=\"ui360\" >
                     <a href=\"/";
                    // line 348
                    echo twig_escape_filter($this->env, $this->getAttribute($context["audiobook"], "webpath", array()), "html", null, true);
                    echo "\"></a>
                    </div>
                    <div class=\"fieldwrapper f_name\">
                      <label for=\"name";
                    // line 351
                    echo twig_escape_filter($this->env, $this->getAttribute($context["audiobook"], "id", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
                    echo "</label><br>
                      <input name=\"edits[";
                    // line 352
                    echo twig_escape_filter($this->env, $this->getAttribute($context["audiobook"], "id", array()), "html", null, true);
                    echo "][name]\" id=\"name";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["audiobook"], "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["audiobook"], "name", array()), "html", null, true);
                    echo "\" required=\"true\" type=\"text\" />
                    </div>  
                    <div class=\"fieldwrapper f_sort\">
                      <label for=\"sort";
                    // line 355
                    echo twig_escape_filter($this->env, $this->getAttribute($context["audiobook"], "id", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nr na liście"), "html", null, true);
                    echo "</label><br>
                      <input name=\"edits[";
                    // line 356
                    echo twig_escape_filter($this->env, $this->getAttribute($context["audiobook"], "id", array()), "html", null, true);
                    echo "][sort]\" id=\"sort";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["audiobook"], "id", array()), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["audiobook"], "sort", array()), "html", null, true);
                    echo "\" required=\"true\" type=\"text\" />
                    </div>  
                </div>   
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['audiobook'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 360
                echo "                <button type=\"submit\" id=\"audibook_edit\" name=\"audiobook_save\" >";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zapisz zmiany"), "html", null, true);
                echo "</button>
                
                </form>
            </div>  
        ";
            }
            // line 365
            echo "        
        <div class=\"content\">
          <form action=\"";
            // line 367
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_audiobook", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
            echo "\"   enctype=\"multipart/form-data\" method=\"post\">

          <div class=\"widget\">
            <label>";
            // line 370
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Nazwa"), "html", null, true);
            echo "</label>
            <div class=\"field\">
                <input name=\"audiobook[name][1]\" required=\"true\" type=\"text\" />
            </div>
          </div>
              
          <div class=\"widget audio\">
            <label>";
            // line 377
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Audiobook (w formacie wav lub mp3)"), "html", null, true);
            echo "</label>
            <div class=\"field\">
                <input name=\"audiobook[file][1]\" accept=\".mp3,.wav,audio/mp3,audio/mpeg,audio/x-wav\" required=\"true\" type=\"file\" />
            </div>
          </div>  
              
          <div>
              <button type=\"submit\" id=\"page_save\" name=\"audiobook_save\" >";
            // line 384
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj audiobook"), "html", null, true);
            echo "</button>
          </div>
          </form> 
        </div>    
            
    ";
        }
        // line 390
        echo "    
    ";
        // line 391
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["object"]) ? $context["object"] : null), 1 => "page_images"), "method")) {
            // line 392
            echo "    ";
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array())) {
                // line 393
                echo "        <h1 id=\"image\"><i class=\"fa fa-photo\"></i>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zdjęcia i filmy"), "html", null, true);
                echo "</h1>
        <div class=\"content\">
            <p>
            ";
                // line 396
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wybierz zdjęcie profilowe klikając w ikonę na zdjęciu:"), "html", null, true);
                echo " <span class=\"button-def\"></span> 
            </p>
            <div class=\"drop-wrapper\">
            <form action=\"";
                // line 399
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "schemeAndHttpHost", array()) . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "requestUri", array())), "html", null, true);
                echo "\" data-edit=\"";
                echo $this->env->getExtension('routing')->getPath("image_form");
                echo "\" data-sort=\"";
                echo $this->env->getExtension('routing')->getPath("image_sort");
                echo "\" method=\"post\" class=\"drop\" id=\"drop\">
               
                <div class=\"dz-message\">
                    ";
                // line 402
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Aby dodać nowe zdjęcia upuść je tutaj albo kliknij i wybierz je ze swojego urządzenia."), "html", null, true);
                echo "<br>
                </div>

                    
                ";
                // line 406
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "getImagesSort", array(), "method"));
                foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                    // line 407
                    echo "                    <div class=\"dz-preview dz-processing dz-image-preview dz-success dz-complete exists\" data-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "getId", array(), "method"), "html", null, true);
                    echo "\">
                        <div class=\"dz-image\" style=\"background-image: url(";
                    // line 408
                    echo twig_escape_filter($this->env, $this->env->getExtension('app_extension')->productionFilter($this->env->getExtension('routing')->getPath("thumbnail", array("resolution" => "160x120", "file" => $this->getAttribute($context["image"], "webPath", array())))), "html", null, true);
                    echo "); background-size: cover; background-repeat: no-repeat;\"></div>
                        <div class=\"dz-details\">
                            ";
                    // line 410
                    if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["object"]) ? $context["object"] : null), 1 => "page_image"), "method") || ($this->getAttribute($context["image"], "id", array()) != $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "image", array()), "id", array())))) {
                        echo "<span data-id=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "id", array()), "html", null, true);
                        echo "\" class=\"btn-del tip\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usuń zdjęcie"), "html", null, true);
                        echo "\" ></span>";
                    }
                    // line 411
                    echo "                            ";
                    if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["object"]) ? $context["object"] : null), 1 => "page_image"), "method")) {
                        echo "<span data-id=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "id", array()), "html", null, true);
                        echo "\" class=\"btn-def tip\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ustaw jako zdjęcie profilowe dla tej strony"), "html", null, true);
                        echo "\"></span>";
                    }
                    // line 412
                    echo "                            <span data-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "id", array()), "html", null, true);
                    echo "\" class=\"btn-edit tip\" title=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edytuj zdjęcie"), "html", null, true);
                    echo "\"></span>
                        </div>
                        <span class=\"is-def tip ";
                    // line 414
                    if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "image", array()) && ($this->getAttribute($context["image"], "id", array()) == $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "image", array()), "id", array())))) {
                        echo "show";
                    }
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Zdjęcie profilowe dla tej strony"), "html", null, true);
                    echo "\" ></span>
                    </div>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 417
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
                    maxFilesize: 12,
                    acceptedFiles: 'image/jpg,image/png,image/jpeg' ,
                    dictInvalidFileType: '";
                // line 495
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Niewłaściwy format pliku, dozwolone pliki to jpg lub png."), "html", null, true);
                echo "',
                    dictFileTooBig: '";
                // line 496
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Plik jest za duży. Dozwolony rozmiar to:"), "html", null, true);
                echo " ";
                echo "{{";
                echo "maxFilesize";
                echo "}}";
                echo " MB.',
                    dictResponseError: '";
                // line 497
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wystąpił błąd."), "html", null, true);
                echo "',
                    dictMaxFilesExceeded: '";
                // line 498
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
                      
                      \$(file.previewElement).attr('data-id',obj.id);
                      \$(file.previewElement).append('<span class=\"is-def tip '+def_class+'\" title=\"Zdjęcie profilowe\" ></span>')
                        .find('.dz-details').html(''+
                        '<span data-id=\"'+obj.id+'\" class=\"btn-del tip\" title=\"";
                // line 524
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usuń zdjęcie"), "html", null, true);
                echo "\" ></span>'+
                        ";
                // line 525
                if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["object"]) ? $context["object"] : null), 1 => "page_image"), "method")) {
                    echo "'<span data-id=\"'+obj.id+'\" class=\"btn-def tip\" title=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ustaw jako zdjęcie profilowe dla tej strony"), "html", null, true);
                    echo "\"></span>'+";
                }
                // line 526
                echo "                        '<span data-id=\"'+obj.id+'\" class=\"btn-edit tip\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edytuj zdjęcie"), "html", null, true);
                echo "\"></span>');

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
                // line 600
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Twoja przeglądarka nie obsługuje dodawania wielu plików jednocześnie"), "html", null, true);
                echo "</p>  
          <form action=\"";
                // line 601
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "schemeAndHttpHost", array()) . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "requestUri", array())), "html", null, true);
                echo "\" style=\"\" enctype=\"multipart/form-data\"  method=\"post\">

          <div class=\"widget\">
            <label>";
                // line 604
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wybierz plik"), "html", null, true);
                echo "</label>
            <div class=\"field\">
            <input name=\"file\" type=\"file\" />
            </div>
          </div>
          <div>
              <button type=\"submit\" id=\"page_save\" name=\"page[save]\" >";
                // line 610
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj zdjęcie"), "html", null, true);
                echo "</button>
          </div>
          </form>  
        </div>      
            
          
        <div class=\"content\" >
            
          <p>";
                // line 618
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Możesz dodać film wklejając do niego linka z serwisu YouTube lub Vimeo"), "html", null, true);
                echo "</p>  
          <form action=\"";
                // line 619
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "schemeAndHttpHost", array()) . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "requestUri", array())), "html", null, true);
                echo "\" style=\"\" method=\"post\">

          <div class=\"widget\">
            <label>";
                // line 622
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Link do filmu"), "html", null, true);
                echo "</label>
            <div class=\"field\">
                <input name=\"video\" required=\"true\" type=\"text\" />
            </div>
          </div>
          <div>
              <button type=\"submit\" id=\"page_save\" name=\"page[save]\" >";
                // line 628
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj film"), "html", null, true);
                echo "</button>
          </div>
          </form> 
          
        </div>   

    ";
            }
            // line 635
            echo "    ";
        }
        // line 636
        echo "

    ";
        // line 638
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array())) {
            echo " 
        
        <h1><i class=\"fa fa-lock\"></i>";
            // line 640
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Uprawnienia"), "html", null, true);
            echo "</h1>
        ";
            // line 641
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "credentials", array()))) {
                // line 642
                echo "            <div class=\"content list\">  
              ";
                // line 643
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "credentials", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                    // line 644
                    echo "                <div class=\"element\">
                    ";
                    // line 645
                    if ($this->getAttribute($this->getAttribute($context["c"], "user", array()), "avatar", array())) {
                        // line 646
                        echo "                    <div class=\"avatar\" style=\" background-image:url('/";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "user", array()), "avatar", array()), "html", null, true);
                        echo "');\"></div>
                    ";
                    }
                    // line 648
                    echo "                    <div class=\"data\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "user", array()), "fullname", array()), "html", null, true);
                    echo "</div>
                    <div class=\"data\">";
                    // line 649
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "permissiontype", array(0 => $this->getAttribute($context["c"], "type", array())), "method")), "html", null, true);
                    echo "</div>
                    ";
                    // line 650
                    if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["object"]) ? $context["object"] : null), 1 => "admin"), "method")) {
                        // line 651
                        echo "                    <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("permission", array("id" => $this->getAttribute($context["c"], "id", array()))), "html", null, true);
                        echo "\" class=\"button tip\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edytuj uprawnienia"), "html", null, true);
                        echo "\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>
                    <a href=\"";
                        // line 652
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("permission", array("id" => $this->getAttribute($context["c"], "id", array()), "delete" => 1)), "html", null, true);
                        echo "\" class=\"button tip\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usuń uprawnieania"), "html", null, true);
                        echo "\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
                    ";
                    }
                    // line 654
                    echo "                </div>
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 656
                echo "            </div>  
        ";
            }
            // line 657
            echo " 
        ";
            // line 658
            if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "havepagepermission", array(0 => (isset($context["object"]) ? $context["object"] : null), 1 => "admin"), "method")) {
                // line 659
                echo "        <div class=\"content\">    
            <form action=\"";
                // line 660
                echo $this->env->getExtension('routing')->getPath("permission");
                echo "\" method=\"post\">
                <p>";
                // line 661
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Możesz nadać uprawnienia wybranym osobom. Administratorzy mogą nadawać nowe uprawnienia a redaktorzy mogą mieć dostęp tylko do zmiany wybranych danych. Podaj adres email osoby której chcesz nadać uprawnienia. Osoba ta musi posiadać konto w Epado."), "html", null, true);
                echo "</p>
                <input type=\"hidden\" name=\"page_id\" value=\"";
                // line 662
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
                echo "\" >
                <input type=\"email\" name=\"email\" placeholder=\"";
                // line 663
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adres email osoby"), "html", null, true);
                echo "\" value=\"\">
                <input type=\"submit\" value=\"";
                // line 664
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dodaj uprawnienia"), "html", null, true);
                echo "\">
            </form>
        </div>
        ";
            }
            // line 667
            echo "        
    ";
        }
        // line 669
        echo "    

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Page:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1482 => 669,  1478 => 667,  1471 => 664,  1467 => 663,  1463 => 662,  1459 => 661,  1455 => 660,  1452 => 659,  1450 => 658,  1447 => 657,  1443 => 656,  1436 => 654,  1429 => 652,  1422 => 651,  1420 => 650,  1416 => 649,  1411 => 648,  1405 => 646,  1403 => 645,  1400 => 644,  1396 => 643,  1393 => 642,  1391 => 641,  1387 => 640,  1382 => 638,  1378 => 636,  1375 => 635,  1365 => 628,  1356 => 622,  1350 => 619,  1346 => 618,  1335 => 610,  1326 => 604,  1320 => 601,  1316 => 600,  1238 => 526,  1232 => 525,  1228 => 524,  1199 => 498,  1195 => 497,  1187 => 496,  1183 => 495,  1103 => 417,  1090 => 414,  1082 => 412,  1073 => 411,  1065 => 410,  1060 => 408,  1055 => 407,  1051 => 406,  1044 => 402,  1034 => 399,  1028 => 396,  1021 => 393,  1018 => 392,  1016 => 391,  1013 => 390,  1004 => 384,  994 => 377,  984 => 370,  978 => 367,  974 => 365,  965 => 360,  951 => 356,  945 => 355,  935 => 352,  929 => 351,  923 => 348,  918 => 346,  915 => 345,  911 => 344,  907 => 343,  889 => 327,  887 => 326,  881 => 324,  879 => 323,  876 => 322,  873 => 321,  871 => 320,  866 => 319,  864 => 318,  844 => 313,  839 => 311,  834 => 310,  817 => 309,  814 => 308,  797 => 307,  780 => 306,  774 => 305,  763 => 298,  746 => 296,  728 => 295,  726 => 294,  719 => 292,  714 => 289,  680 => 256,  674 => 253,  670 => 252,  666 => 251,  662 => 250,  657 => 247,  655 => 246,  652 => 245,  639 => 241,  629 => 240,  625 => 238,  623 => 237,  618 => 234,  614 => 232,  603 => 230,  599 => 229,  596 => 228,  590 => 225,  585 => 223,  579 => 220,  576 => 219,  572 => 218,  565 => 216,  562 => 215,  554 => 214,  552 => 213,  547 => 211,  543 => 210,  539 => 208,  532 => 206,  529 => 205,  522 => 204,  516 => 203,  512 => 202,  508 => 200,  506 => 199,  502 => 197,  499 => 196,  491 => 194,  479 => 184,  475 => 183,  471 => 182,  467 => 181,  458 => 175,  454 => 174,  450 => 173,  447 => 172,  439 => 167,  435 => 166,  431 => 165,  427 => 164,  422 => 162,  416 => 159,  413 => 158,  411 => 157,  407 => 156,  405 => 155,  403 => 154,  401 => 153,  397 => 152,  391 => 148,  387 => 146,  377 => 139,  373 => 138,  369 => 137,  365 => 136,  354 => 128,  350 => 127,  346 => 126,  342 => 125,  337 => 123,  331 => 120,  328 => 119,  325 => 118,  322 => 117,  317 => 111,  313 => 105,  309 => 104,  305 => 103,  300 => 102,  297 => 100,  295 => 99,  292 => 98,  285 => 93,  281 => 92,  278 => 91,  272 => 89,  270 => 88,  267 => 87,  264 => 86,  256 => 80,  251 => 78,  247 => 77,  243 => 76,  239 => 75,  235 => 74,  231 => 73,  227 => 72,  222 => 70,  219 => 69,  216 => 68,  198 => 60,  191 => 58,  184 => 57,  181 => 56,  179 => 55,  165 => 52,  158 => 50,  151 => 49,  148 => 48,  146 => 47,  132 => 44,  125 => 42,  118 => 41,  115 => 40,  113 => 39,  107 => 36,  103 => 34,  94 => 29,  83 => 27,  76 => 25,  73 => 24,  66 => 20,  63 => 19,  61 => 18,  56 => 16,  52 => 15,  48 => 14,  44 => 12,  41 => 10,  38 => 9,  34 => 1,  32 => 4,  11 => 1,);
    }
}
/* {% extends "admin.html.twig" %}*/
/* {#{% form_theme form 'AppBundle:Form:base.html.twig' %}#}*/
/* */
/* {% form_theme form _self %}*/
/* */
/* */
/* */
/* */
/* {% block _page_file_row %}*/
/* */
/* {#{{ dump() }}#}*/
/*         <div class="widget" id="background">*/
/*             */
/*             {{ form_label(form) }}*/
/*             {{ form_widget(form) }}*/
/*             {{ form_errors(form) }}*/
/*         </div> */
/*         {% if(attr['data-path']!='') %}*/
/*         <div class="widget">   */
/*             <label>{{ 'Twoje zdjęcie w tle'|trans }}</label>*/
/*             <div class="field background">*/
/*                 */
/*                 <div class="effect">*/
/*                 <label for="bg0" class="img" style="{#background-image:url(/{{ attr['data-path'] }});#}">*/
/*                     <span class="zoom tip" title="{{ 'Powiększ zdjęcie'|trans }}"><a href="/{{ attr['data-path'] }}" style="position:absolute; top:0; left:0; width:100%; height:100%; display:block;"></a></span> */
/*                     */
/*                     <div class="input" style="z-index:1;"><input id="bg0" {% if(attr['data-path']==attr['data-background']) %}checked="checked"{% endif %} type="radio" name="background" data-image="{{ attr['data-path'] }}" value="{{ attr['data-path'] }}"></div>*/
/*                 </label>*/
/*                 <div class="custom" style="position:absolute; width:100%; height:100%; background-size:cover; background-image:url(/{{ attr['data-path'] }}); z-index:0;"></div>*/
/*                 </div>*/
/*                 */
/*             </div>*/
/*         </div>*/
/*         {% endif %}         */
/*         <div class="widget">  */
/*             <label>{{ 'Możesz też wybrać gotowe zdjęcie w tle'|trans }}</label> */
/*             */
/*             <div class="field background">  */
/*                 {% set bg='uploads/backgrounds/1.jpg' %}*/
/*                 {% set nr='1' %}*/
/*                 <label for="bg{{nr}}" class="img" style="background-image:url(/{{bg}});">*/
/*                     <span class="zoom tip" title="{{ 'Powiększ zdjęcie'|trans }}"><a href="/{{bg}}" style="position:absolute; top:0; left:0; width:100%; height:100%; display:block;"></a></span> */
/*                     */
/*                     <div class="input"><input id="bg{{nr}}" {% if(bg==attr['data-background']) %}checked="checked"{% endif %} type="radio" name="background" data-image="{{bg}}" value="{{bg}}"></div>*/
/*                 </label>*/
/*                 */
/*                 {% set bg='uploads/backgrounds/2.jpg' %}*/
/*                 {% set nr='2' %}*/
/*                 <label for="bg{{nr}}" class="img" style="background-image:url(/{{bg}});">*/
/*                     <span class="zoom tip" title="{{ 'Powiększ zdjęcie'|trans }}"><a href="/{{bg}}" style="position:absolute; top:0; left:0; width:100%; height:100%; display:block;"></a></span> */
/*                     */
/*                     <div class="input"><input id="bg{{nr}}" {% if(bg==attr['data-background']) %}checked="checked"{% endif %} type="radio" name="background" data-image="{{bg}}" value="{{bg}}"></div>*/
/*                 </label>*/
/*                 */
/*                 {% set bg='uploads/backgrounds/3.jpg' %}*/
/*                 {% set nr='3' %}*/
/*                 <label for="bg{{nr}}" class="img" style="background-image:url(/{{bg}});">*/
/*                     <span class="zoom tip" title="{{ 'Powiększ zdjęcie'|trans }}"><a href="/{{bg}}" style="position:absolute; top:0; left:0; width:100%; height:100%; display:block;"></a></span> */
/*                     */
/*                     <div class="input"><input id="bg{{nr}}" {% if(bg==attr['data-background']) %}checked="checked"{% endif %} type="radio" name="background" data-image="{{bg}}" value="{{bg}}"></div>*/
/*                 </label>*/
/* */
/*             </div>*/
/*         </div>         */
/* {% endblock %}*/
/* */
/* */
/* {% block _page_localisation_map_row %}*/
/*     <div class="widget">*/
/*         {{ form_label(form) }}*/
/*         <div class="field withlocalisation">*/
/*         {{ form_widget(form) }}*/
/*         {{ form_errors(form) }}*/
/*         <p class="mapdefault">{{ 'Jeżeli znajdujesz się przy tym miejscu możesz zlokalizować je za pomocą Twojego urządzenia klikając w poniższy przycisk.'|trans }}</p>*/
/*         <p class="mapwait hidden">{{ 'Poczekaj. Trwa lokalizowanie Twojego urządzenia.'|trans }}</p>*/
/*         <p class="maperror hidden">{{ 'Niestety Twoje urządzenie nie wspiera funkcji lokalizacyjnych.'|trans }}</p>*/
/*         <p class="mapwarning hidden">{{ 'Twoje urządzenie wspiera funkcje lokalizacji ale niestety nie mogło jej znaleźć. Upewnij się że masz włączony GPS i dałeś stronie pozwolenie na korzystanie z geolokalizacji.'|trans }}</p>*/
/*         <p class="mapsuccess hidden">{{ 'Udało się zlokalizować Twoje urządzenie, sprawdź czy pozycja na mapie się zgadza. Kolorem niebieskim zaznaczony jest obszar wyznaczający dokładność pomiaru. Jeżeli urządzenie błędnie wskazało lokalizacje to spróbuj zlokalizować je ponownie lub przeciągnij i upuść marker na właściwe miejsce.'|trans }}</p>*/
/*         */
/*         <a href="" class="button getlocalisation"><i class="fa fa-map-marker"></i> {{ 'Twoja lokalizacja'|trans }}</a>*/
/*         </div>*/
/*     </div> */
/* {% endblock %}*/
/* */
/* */
/* {% block _page_translations_row %}*/
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
/* */
/* {%- block date_widget -%}*/
/*     {%- if widget == 'single_text' -%}*/
/*         {{ block('form_widget_simple') }}*/
/*     {%- else -%}*/
/*         <div {{ block('widget_container_attributes') }}>*/
/*             <div>{{ form_widget(form.year) }}</div>*/
/*             <div>{{ form_widget(form.month) }}</div>*/
/*             <div>{{ form_widget(form.day) }}</div>*/
/*             {#{{- date_pattern|replace({*/
/*                 '{{ year }}':  form_widget(form.year),*/
/*                 '{{ month }}': form_widget(form.month),*/
/*                 '{{ day }}':   form_widget(form.day),*/
/*             })|raw -}}#}*/
/*         </div>*/
/*     {%- endif -%}*/
/* {%- endblock date_widget -%}*/
/* */
/* */
/* */
/* {% block textarea_row  %}*/
/*     {% if attr['data-bio'] is defined and name=='description' %}*/
/*     <div class="widget">*/
/*         <label>{{ 'Gotowa biografia'|trans }}</label>*/
/*         <div class="field">*/
/*             <select class="preset" data-target="description">*/
/*             <option value="">{{ 'Wybierz z listy'|trans }}</option>*/
/*             <option value=""></option>*/
/*             <option value="tata">{{ 'Tata'|trans }}</option>*/
/*             <option value="mama">{{ 'Mama'|trans }}</option>*/
/*             <option value="babcia">{{ 'Babcia'|trans }}</option>*/
/*             <option value="dziadek">{{ 'Dziadek'|trans }}</option>*/
/*             </select>*/
/*         </div>*/
/*     </div> */
/*     <script>*/
/*     $('select.preset').on('change',function(){ */
/* */
/*       var preset='';*/
/*       if($(this).val().toLowerCase()=='mama') preset='{{ 'Moja mama była osobą niezwykle drogą memu sercu - kochającą, dobrą i mądrą. Z wielką pokorą znosiła wszelkie przeciwności losu, do ostatniej chwili cieszyła się życiem, zawsze na pierwszym miejscu stawiając dzieci i wnuki, którym bezgranicznie się poświęcała. To ona nauczyła mnie wrażliwości na drugiego człowieka i szacunku dla historii, to dzięki niej nasza rodzina potrafi trzymać się razem. Okazywała nam miłość i czułość, ale potrafiła być także wymagająca, wyrażając troskę o  naszą przyszłość. To dzięki niej nauczyłam się życia. Dziękuję Ci za to, kochana Mamusiu...'|trans }}'; */
/*       if($(this).val().toLowerCase()=='tata') preset='{{ 'Mój ojciec był wspaniałym człowiekiem, który ofiarował mi wspaniałe dzieciństwo, wykształcił i wychował mnie na człowieka, którym jestem dzisiaj. Żył pięknie i szczerze, potrafił być współczujący i wrażliwy, a równocześnie umiał także wymagać. Niósł pomoc w trudnych chwilach, wspierał całą naszą rodzinę i przyjaciół ciepłem, mądrością oraz dobrym słowem. Jego sprawiedliwość i wyrozumiałość dawała poczucie bezpieczeństwa, bo zawsze trzeźwo oceniał, ale nigdy nie był krzywdzący w swoich osądach. Zasiał ziarno kultury i dobrego wychowania, za co dozgonnie będę mu wdzięczny. Żegnaj, Tato...'|trans }}'; */
/*       if($(this).val().toLowerCase()=='babcia') preset='{{ 'Moja babcia była osobą niezwykle drogą memu sercu - kochającą, dobrą i mądrą. Z wielką pokorą znosiła wszelkie przeciwności losu, do ostatniej chwili cieszyła się życiem, zawsze na pierwszym miejscu stawiając dzieci i wnuki, którym bezgranicznie się poświęcała. To ona nauczyła mnie wrażliwości na drugiego człowieka i szacunku dla historii, to dzięki niej nasza rodzina potrafi trzymać się razem. Okazywała nam miłość i czułość, ale potrafiła być także wymagająca, wyrażając troskę o naszą przyszłość. To dzięki niej nauczyłam się życia. Dziękuję Ci za to, kochana Babciu...'|trans }}'; */
/*       if($(this).val().toLowerCase()=='dziadek') preset='{{ 'Mój dziadek do końca pozostał szlachetnym człowiekiem, autorytetem dla mnie i całej naszej rodziny. Mimo że wiele przeżył, zawsze potrafił zachować pogodę ducha i nigdy nie szczędził dobrego słowa, dzieląc się swoim doświadczeniem i mądrością. Zapamiętam go jako szlachetnego, sprawiedliwego i życzliwego wszystkim człowieka, który przez całe życie starał się uczyć nas siły, wiary oraz pracowitości. Jako oddany patriota, ojciec i dziadek zdobył szacunek wielu i pozostawił moc wspaniałych wspomnień, które na zawsze pozostaną w naszych sercach. To dzięki niemu nauczyłam się życia. Dziękuję Ci za to, ukochany Dziadku...'|trans }}'; */
/*       */
/*       if(preset) $(this).parent().parent().parent().find('textarea').val(preset).keyup();*/
/* */
/*     });*/
/*     </script>     */
/*     {% endif %}*/
/* */
/*     */
/*     {{ block('form_row') }}*/
/* {% endblock %}*/
/* */
/* {#{% block _page_translations_pl_description_row  %}#}*/
/* {% block _translations_artgate_description_row  %} {#to nie dziala ale podmienilem ogolnym sprawdzaniem wyzej#}*/
/*     {#{{dump(object)}}#}*/
/*     {#{% if object.id %} {% endif %}#}*/
/*     {#{% if(object.type.id==1) %}#}*/
/*     {#{% if object.id %}#}   */
/*     {% if attr['data-bio'] is defined %}*/
/*     <div class="widget">*/
/*         <label>{{ 'Gotowa biografia'|trans }}</label>*/
/*         <div class="field">*/
/*             <select class="preset" data-target="description">*/
/*             <option value="">{{ 'Wybierz z listy'|trans }}</option>*/
/*             <option value=""></option>*/
/*             <option value="Tata">{{ 'Tata'|trans }}</option>*/
/*             <option value="Mama">{{ 'Mama'|trans }}</option>*/
/*             <option value="Babcia">{{ 'Babcia'|trans }}</option>*/
/*             <option value="Dziadek">{{ 'Dziadek'|trans }}</option>*/
/*             </select>*/
/*         </div>*/
/*     </div> */
/*     {% endif %}*/
/*     <div class="widget">*/
/*         {{ form_label(form) }}*/
/*         <div class="field">{{ form_widget(form) }}</div>*/
/*         {{ form_errors(form) }}*/
/*     </div> */
/*     <script>*/
/*     $('select.preset').on('change',function(){ */
/* */
/*       var preset='';*/
/*       if($(this).val().toLowerCase()=='mama') preset='{{ 'Moja mama była osobą niezwykle drogą memu sercu - kochającą, dobrą i mądrą. Z wielką pokorą znosiła wszelkie przeciwności losu, do ostatniej chwili cieszyła się życiem, zawsze na pierwszym miejscu stawiając dzieci i wnuki, którym bezgranicznie się poświęcała. To ona nauczyła mnie wrażliwości na drugiego człowieka i szacunku dla historii, to dzięki niej nasza rodzina potrafi trzymać się razem. Okazywała nam miłość i czułość, ale potrafiła być także wymagająca, wyrażając troskę o  naszą przyszłość. To dzięki niej nauczyłam się życia. Dziękuję Ci za to, kochana Mamusiu...'|trans }}'; */
/*       if($(this).val().toLowerCase()=='tata') preset='{{ 'Mój ojciec był wspaniałym człowiekiem, który ofiarował mi wspaniałe dzieciństwo, wykształcił i wychował mnie na człowieka, którym jestem dzisiaj. Żył pięknie i szczerze, potrafił być współczujący i wrażliwy, a równocześnie umiał także wymagać. Niósł pomoc w trudnych chwilach, wspierał całą naszą rodzinę i przyjaciół ciepłem, mądrością oraz dobrym słowem. Jego sprawiedliwość i wyrozumiałość dawała poczucie bezpieczeństwa, bo zawsze trzeźwo oceniał, ale nigdy nie był krzywdzący w swoich osądach. Zasiał ziarno kultury i dobrego wychowania, za co dozgonnie będę mu wdzięczny. Żegnaj, Tato...'|trans }}'; */
/*       if($(this).val().toLowerCase()=='babcia') preset='{{ 'Moja babcia była osobą niezwykle drogą memu sercu - kochającą, dobrą i mądrą. Z wielką pokorą znosiła wszelkie przeciwności losu, do ostatniej chwili cieszyła się życiem, zawsze na pierwszym miejscu stawiając dzieci i wnuki, którym bezgranicznie się poświęcała. To ona nauczyła mnie wrażliwości na drugiego człowieka i szacunku dla historii, to dzięki niej nasza rodzina potrafi trzymać się razem. Okazywała nam miłość i czułość, ale potrafiła być także wymagająca, wyrażając troskę o naszą przyszłość. To dzięki niej nauczyłam się życia. Dziękuję Ci za to, kochana Babciu...'|trans }}'; */
/*       if($(this).val().toLowerCase()=='dziadek') preset='{{ 'Mój dziadek do końca pozostał szlachetnym człowiekiem, autorytetem dla mnie i całej naszej rodziny. Mimo że wiele przeżył, zawsze potrafił zachować pogodę ducha i nigdy nie szczędził dobrego słowa, dzieląc się swoim doświadczeniem i mądrością. Zapamiętam go jako szlachetnego, sprawiedliwego i życzliwego wszystkim człowieka, który przez całe życie starał się uczyć nas siły, wiary oraz pracowitości. Jako oddany patriota, ojciec i dziadek zdobył szacunek wielu i pozostawił moc wspaniałych wspomnień, które na zawsze pozostaną w naszych sercach. To dzięki niemu nauczyłam się życia. Dziękuję Ci za to, ukochany Dziadku...'|trans }}'; */
/* */
/*       if(preset) $(this).parent().parent().next().find('textarea').val(preset).keyup();*/
/* */
/*     });*/
/*     </script>*/
/*         */
/* {% endblock %}*/
/* */
/* */
/* {% block header %}<h1><i class="fa fa-newspaper-o"></i>{{ 'Strona'|trans }}</h1>{% endblock %}*/
/* */
/* {% block content %}*/
/*     */
/* */
/*     {% if object.id %}*/
/*     <div class="content">*/
/*         <div class="options">*/
/*         {% if object.code %}    */
/*         <a href="{{ path_page(object.code) }}" class="button">{{ 'Przejdź do strony'|trans }}</a>    */
/*         <a href="{{ path('page_code',{'id':object.id}) }}" class="button">{{ 'Wygeneruj kod QR'|trans }}</a>   */
/*         {% else %}      */
/*         <a href="{{ path('page_preview',{'id':object.id}) }}" class="button">{{ 'Podgląd strony'|trans }}</a>*/
/*         {% endif %}*/
/*         </div>*/
/* */
/*         {% if object.code %}    */
/*         <p>{{ 'Strona posiada aktywny kod Epado.'|trans }}</p> */
/*         */
/*             {% if object.expired<nowObject() %}*/
/*                 <p style="color:red;">{{ 'Strona wygasła dnia:'|trans }} {{ object.expired|mydate }}</p>*/
/*             {% else %}   */
/*                 <p>{{ 'Strona opłacona do dnia:'|trans }} {{ object.expired|mydate }}</p>*/
/*             {% endif %}*/
/*         */
/*         {% else %}      */
/*         <p>{{ 'Podaj kod aktywacyjny, który znajduje się w liście. Jeżeli nie posiadasz kodu epado możesz zakupić jeden z pakietów online, zostanie on wysłany do Ciebie pocztą. W przesyłce będzie znajdował się kod aktywacyjny, który trzeba będzie wpisać w poniższe pole. Istnieje również możliwość zakupu kodu u jednego z naszych partnerów.'|trans }}</p>*/
/*         <form action="" method="get">*/
/*             <div class="widget">*/
/*             <input type="text" name="password" placeholder="{{ 'Podaj kod aktywacyjny'|trans }}"> */
/*             </div>*/
/*             <button class="small" type="submit">{{ 'Aktywuj stronę'|trans }}</button>*/
/*         </form> */
/*         {% endif %}*/
/*         */
/*         {% if object.remind and not object.creator.phone and object.type.id==1 %}  */
/*             <p>{{ 'Masz ustawione przypomnienie o rocznicy, jeżeli chcesz żeby przypomnienie było wysyłane do Ciebie jako SMS musisz podać swój nr telefonu. Możesz to zrobić tutaj:'|trans }} <a href="{{ path('profile_edit') }}">{{ 'tutaj'|trans }}</a>. {{ 'Przypomnienie będzie wysyłane również na Twój adres email.'|trans }}</p>*/
/*         {% endif %}*/
/*     </div>*/
/*     {% endif %}*/
/*     */
/* */
/* */
/*     {% if(type is not null ) %}*/
/*     <div class="content">*/
/*         <div class="pageselect boxes">    */
/*             <a href="{{ extend({'type':1}) }}" class="element box{% if(type==1) %} active{% endif %}"><i class="fa fa-fw fa-user"></i>{{ 'Upamiętnienie osoby'|trans }}</a>*/
/*             <a href="{{ extend({'type':2}) }}" class="element box{% if(type==2) %} active{% endif %}"><i class="fa fa-fw fa-map-marker"></i>{{ 'Upamiętnienie miejsca'|trans }}</a>*/
/*         </div>  */
/*     </div>*/
/*     {% endif %}*/
/* */
/*     {% if app.user.havepagepermission(object,'page_edit') or app.user.havepagepermission(object,'page_background') %}*/
/*     <div class="content">*/
/* */
/*         */
/*         {{ form_start(form) }}*/
/*         {{ form_errors(form) }}*/
/*         {{ form_widget(form,{'test':4}) }}*/
/*         {{ form_end(form) }}*/
/*     </div>*/
/*     {% endif %}*/
/*     */
/*     <script type="text/javascript">*/
/*         $(document).ready(function () {*/
/*             $('#page_cemetery_object').change(function(){*/
/*                 */
/*                 if($(this).val()!=''){*/
/*                     var object_data=JSON.parse($(this).val());*/
/*                     */
/*                     if(object_data.address)*/
/*                     {*/
/*                         $(this).parents('form').find('.city').val(object_data.address.city);*/
/*                         $(this).parents('form').find('.address').val(object_data.address.address);*/
/*                         $(this).parents('form').find('#page_address_postal_code').val(object_data.address.postalcode);*/
/*                         $(this).parents('form').find('.country').val(object_data.address.country);*/
/*                         */
/*                     }*/
/*                     */
/*                     if(object_data.localisation)*/
/*                     {    */
/*                         $(this).parents('form').find('.longitude').val(object_data.localisation.longitude);*/
/*                         $(this).parents('form').find('.latitude').val(object_data.localisation.latitude);*/
/*                         $(this).parents('form').find('.latitude').change();*/
/*                     }*/
/*                     */
/* */
/*                         */
/*                 }*/
/*             });*/
/* */
/*         }); */
/*     </script>*/
/* */
/*     {#{% endif %}#}*/
/*     */
/*     <div class="hidden page_cemetery_search">*/
/*         <ul class="result">*/
/*             <li><a href="{{ path('cemetery_form') }}" class="element add"><i class="fa fa-plus-circle"></i>{{ 'Dodaj nowy cmentarz'|trans }} <span style="display:none;" class="name"></span></a></li>*/
/*             */
/*             {% if(app.user.cemeteries|length <20) %}*/
/*               {% for cemetery in app.user.cemeteries %}*/
/*                 {{ include ('AppBundle:Cemetery:element.html.twig', {'object':cemetery}) }}*/
/*               {% endfor %}*/
/*             {% endif %}    */
/*             */
/*         </li>*/
/*     </div>*/
/*             */
/*     <div class="hidden page_family_search">*/
/*         <ul class="result">*/
/*             <li><a href="{{ path('family_form') }}" class="element add"><i class="fa fa-plus-circle"></i>{{ 'Dodaj rodzinę'|trans }} <span class="name"></span></a></li>*/
/*             {% for family in app.user.families %}*/
/*             {{ include ('AppBundle:Family:element.html.twig', {'object':family}) }}   */
/*             {% endfor %}    */
/*             {% for c in app.user.credentials %}*/
/*               {% if c.family is not null %}  */
/*               {{ include ('AppBundle:Family:element.html.twig', {'object':c.family}) }}   */
/*               {% endif %}*/
/*             {% endfor %}   */
/*             */
/*         </ul>*/
/*     </div>   */
/*             */
/*     {% if products %}*/
/*         <h1><i class="fa fa-cube"></i>{{ 'Produkty i usługi'|trans }}</h1>*/
/*         {% include 'AppBundle:Product:products.html.twig' with {'products': products, 'page': object } only %}*/
/*     {% endif %}*/
/*     */
/*     {% if object.id and object.type.id==2 %}*/
/*         <h1><i class="fa fa-music"></i>{{ 'Audiobooki'|trans }}</h1>*/
/*         */
/*         {% if object.audiobooks|length %}*/
/*             <div class="content">*/
/*                 <script src="/js/soundmanager/script/soundmanager2-jsmin.js"></script>*/
/*                 <script type="text/javascript">*/
/*                     soundManager.setup({*/
/*                       // path to directory containing SM2 SWF*/
/*                       url: '/js/soundmanager/swf/'*/
/*                     });*/
/*                     */
/*                     soundManager.debugMode = false;*/
/*                 </script>*/
/* */
/*                 <script type="text/javascript" src="/js/soundmanager/demo/360-player/script/berniecode-animator.js"></script>*/
/*                 <script type="text/javascript" src="/js/soundmanager/demo/360-player/script/360player.js"></script>*/
/*                 <link rel="stylesheet" href="/js/soundmanager/demo/360-player/360player.css" />*/
/*                 */
/* */
/*                 <form action="{{ path('page_audiobook',{'id':object.id}) }}" method="post">*/
/*                 {% for audiobook in object.audiobooks %}*/
/*                 <div class="audiorow">   */
/*                     <a href="{{ path('page_audiobook',{'id':object.id,'delete_id':audiobook.id}) }}" class="btn-del"></a>*/
/*                     <div class="ui360" >*/
/*                      <a href="/{{audiobook.webpath}}"></a>*/
/*                     </div>*/
/*                     <div class="fieldwrapper f_name">*/
/*                       <label for="name{{audiobook.id}}">{{ 'Nazwa'|trans }}</label><br>*/
/*                       <input name="edits[{{audiobook.id}}][name]" id="name{{audiobook.id}}" value="{{audiobook.name}}" required="true" type="text" />*/
/*                     </div>  */
/*                     <div class="fieldwrapper f_sort">*/
/*                       <label for="sort{{audiobook.id}}">{{ 'Nr na liście'|trans }}</label><br>*/
/*                       <input name="edits[{{audiobook.id}}][sort]" id="sort{{audiobook.id}}" value="{{audiobook.sort}}" required="true" type="text" />*/
/*                     </div>  */
/*                 </div>   */
/*                 {% endfor %}*/
/*                 <button type="submit" id="audibook_edit" name="audiobook_save" >{{ 'Zapisz zmiany'|trans }}</button>*/
/*                 */
/*                 </form>*/
/*             </div>  */
/*         {% endif %}*/
/*         */
/*         <div class="content">*/
/*           <form action="{{ path('page_audiobook',{'id':object.id}) }}"   enctype="multipart/form-data" method="post">*/
/* */
/*           <div class="widget">*/
/*             <label>{{ 'Nazwa'|trans }}</label>*/
/*             <div class="field">*/
/*                 <input name="audiobook[name][1]" required="true" type="text" />*/
/*             </div>*/
/*           </div>*/
/*               */
/*           <div class="widget audio">*/
/*             <label>{{ 'Audiobook (w formacie wav lub mp3)'|trans }}</label>*/
/*             <div class="field">*/
/*                 <input name="audiobook[file][1]" accept=".mp3,.wav,audio/mp3,audio/mpeg,audio/x-wav" required="true" type="file" />*/
/*             </div>*/
/*           </div>  */
/*               */
/*           <div>*/
/*               <button type="submit" id="page_save" name="audiobook_save" >{{ 'Dodaj audiobook'|trans }}</button>*/
/*           </div>*/
/*           </form> */
/*         </div>    */
/*             */
/*     {% endif %}*/
/*     */
/*     {% if app.user.havepagepermission(object,'page_images') %}*/
/*     {% if object.id %}*/
/*         <h1 id="image"><i class="fa fa-photo"></i>{{ 'Zdjęcia i filmy'|trans }}</h1>*/
/*         <div class="content">*/
/*             <p>*/
/*             {{ 'Wybierz zdjęcie profilowe klikając w ikonę na zdjęciu:'|trans }} <span class="button-def"></span> */
/*             </p>*/
/*             <div class="drop-wrapper">*/
/*             <form action="{{ app.request.schemeAndHttpHost~app.request.requestUri }}" data-edit="{{ path('image_form')}}" data-sort="{{ path('image_sort')}}" method="post" class="drop" id="drop">*/
/*                */
/*                 <div class="dz-message">*/
/*                     {{ 'Aby dodać nowe zdjęcia upuść je tutaj albo kliknij i wybierz je ze swojego urządzenia.'|trans }}<br>*/
/*                 </div>*/
/* */
/*                     */
/*                 {% for image in object.getImagesSort() %}*/
/*                     <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete exists" data-id="{{ image.getId() }}">*/
/*                         <div class="dz-image" style="background-image: url({{ path('thumbnail', {'resolution': '160x120', 'file': image.webPath    })|production }}); background-size: cover; background-repeat: no-repeat;"></div>*/
/*                         <div class="dz-details">*/
/*                             {% if app.user.havepagepermission(object,'page_image') or image.id!=object.image.id %}<span data-id="{{image.id}}" class="btn-del tip" title="{{ 'Usuń zdjęcie'|trans }}" ></span>{% endif %}*/
/*                             {% if app.user.havepagepermission(object,'page_image') %}<span data-id="{{image.id}}" class="btn-def tip" title="{{ 'Ustaw jako zdjęcie profilowe dla tej strony'|trans }}"></span>{% endif %}*/
/*                             <span data-id="{{image.id}}" class="btn-edit tip" title="{{ 'Edytuj zdjęcie'|trans }}"></span>*/
/*                         </div>*/
/*                         <span class="is-def tip {% if object.image and image.id==object.image.id %}show{% endif %}" title="{{ 'Zdjęcie profilowe dla tej strony'|trans }}" ></span>*/
/*                     </div>*/
/*                 {% endfor %}*/
/*             */
/* */
/*             </form>*/
/*             </div>*/
/*             */
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
/*                 buttonsBind($('body'));*/
/* */
/*                 var url=$('#drop').attr('action');*/
/* */
/*                 $('#drop').dropzone({ */
/*                     url: url, */
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
/*                     */
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
/*                       */
/*                       $(file.previewElement).attr('data-id',obj.id);*/
/*                       $(file.previewElement).append('<span class="is-def tip '+def_class+'" title="Zdjęcie profilowe" ></span>')*/
/*                         .find('.dz-details').html(''+*/
/*                         '<span data-id="'+obj.id+'" class="btn-del tip" title="{{ 'Usuń zdjęcie'|trans }}" ></span>'+*/
/*                         {% if app.user.havepagepermission(object,'page_image') %}'<span data-id="'+obj.id+'" class="btn-def tip" title="{{ 'Ustaw jako zdjęcie profilowe dla tej strony'|trans }}"></span>'+{% endif %}*/
/*                         '<span data-id="'+obj.id+'" class="btn-edit tip" title="{{ 'Edytuj zdjęcie'|trans }}"></span>');*/
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
/* */
/*             */
/*             <link rel="stylesheet" href="/css/dropzone.css" />   */
/* */
/*         </div>*/
/*             */
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
/*           */
/*         <div class="content" >*/
/*             */
/*           <p>{{ 'Możesz dodać film wklejając do niego linka z serwisu YouTube lub Vimeo'|trans }}</p>  */
/*           <form action="{{ app.request.schemeAndHttpHost~app.request.requestUri }}" style="" method="post">*/
/* */
/*           <div class="widget">*/
/*             <label>{{ 'Link do filmu'|trans }}</label>*/
/*             <div class="field">*/
/*                 <input name="video" required="true" type="text" />*/
/*             </div>*/
/*           </div>*/
/*           <div>*/
/*               <button type="submit" id="page_save" name="page[save]" >{{ 'Dodaj film'|trans }}</button>*/
/*           </div>*/
/*           </form> */
/*           */
/*         </div>   */
/* */
/*     {% endif %}*/
/*     {% endif %}*/
/* */
/* */
/*     {% if object.id %} */
/*         */
/*         <h1><i class="fa fa-lock"></i>{{ 'Uprawnienia'|trans }}</h1>*/
/*         {% if object.credentials|length %}*/
/*             <div class="content list">  */
/*               {% for c in object.credentials %}*/
/*                 <div class="element">*/
/*                     {% if(c.user.avatar) %}*/
/*                     <div class="avatar" style=" background-image:url('/{{ c.user.avatar }}');"></div>*/
/*                     {% endif %}*/
/*                     <div class="data">{{ c.user.fullname }}</div>*/
/*                     <div class="data">{{ app.user.permissiontype(c.type)|trans }}</div>*/
/*                     {% if(app.user.havepagepermission(object,'admin')) %}*/
/*                     <a href="{{ path('permission',{'id':c.id}) }}" class="button tip" title="{{ 'Edytuj uprawnienia'|trans }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>*/
/*                     <a href="{{ path('permission',{'id':c.id,'delete':1}) }}" class="button tip" title="{{ 'Usuń uprawnieania'|trans }}"><i class="fa fa-trash" aria-hidden="true"></i></a>*/
/*                     {% endif %}*/
/*                 </div>*/
/*               {% endfor %}*/
/*             </div>  */
/*         {% endif %} */
/*         {% if(app.user.havepagepermission(object,'admin')) %}*/
/*         <div class="content">    */
/*             <form action="{{ path('permission') }}" method="post">*/
/*                 <p>{{ 'Możesz nadać uprawnienia wybranym osobom. Administratorzy mogą nadawać nowe uprawnienia a redaktorzy mogą mieć dostęp tylko do zmiany wybranych danych. Podaj adres email osoby której chcesz nadać uprawnienia. Osoba ta musi posiadać konto w Epado.'|trans }}</p>*/
/*                 <input type="hidden" name="page_id" value="{{ object.id }}" >*/
/*                 <input type="email" name="email" placeholder="{{ 'Adres email osoby'|trans }}" value="">*/
/*                 <input type="submit" value="{{ 'Dodaj uprawnienia'|trans }}">*/
/*             </form>*/
/*         </div>*/
/*         {% endif %}        */
/*     {% endif %}*/
/*     */
/* */
/* {% endblock %}*/
