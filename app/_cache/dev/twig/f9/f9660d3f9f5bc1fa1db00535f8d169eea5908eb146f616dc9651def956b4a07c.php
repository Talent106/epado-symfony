<?php

/* @WebProfiler/Profiler/toolbar.css.twig */
class __TwigTemplate_c38e442fbe362f7d8b5239dbedb82f9ce88a60f13736c27255a0155fc6c05859 extends Twig_Template
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
        echo ".sf-minitoolbar {
    display: none;

    position: fixed;
    bottom: 0;
    right: 0;

    padding: 5px 5px 0;

    background-color: #f7f7f7;
    background-image: -moz-linear-gradient(top, #e4e4e4, #ffffff);
    background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e4e4e4), to(#ffffff));
    background-image: -o-linear-gradient(top, #e4e4e4, #ffffff);
    background: linear-gradient(top, #e4e4e4, #ffffff);

    border-radius: 16px 0 0 0;

    z-index: 6000000;
}

.sf-toolbarreset * {
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    vertical-align: baseline;
}

.sf-toolbarreset {
    position: fixed;
    background-color: #f7f7f7;
    left: 0;
    right: 0;
    margin: 0;
    padding: 0 40px 0 0;
    z-index: 6000000;
    font: 11px Verdana, Arial, sans-serif;
    text-align: left;
    color: #2f2f2f;

    background-image: -moz-linear-gradient(top, #e4e4e4, #ffffff);
    background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e4e4e4), to(#ffffff));
    background-image: -o-linear-gradient(top, #e4e4e4, #ffffff);
    background: linear-gradient(top, #e4e4e4, #ffffff);

    bottom: 0;
    border-top: 1px solid #bbb;
}
.sf-toolbarreset abbr {
    border-bottom: 1px dotted #000000;
    cursor: help;
}
.sf-toolbarreset span,
.sf-toolbarreset div,
.sf-toolbarreset td,
.sf-toolbarreset th {
    font-size: 11px;
}
.sf-toolbarreset img {
    width: auto;
    display: inline;
}
.sf-toolbarreset table {
    border-collapse: collapse;
    border-spacing: 0;
    background-color: #000;
    margin: 0;
    padding: 0;
    border: 0;
    width: 100%;
    table-layout: auto;
}
.sf-toolbarreset .hide-button {
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    width: 40px;
    height: 40px;
    cursor: pointer;
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAMAAAAMCGV4AAAAllBMVEXDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PExMTPz8/Q0NDR0dHT09Pb29vc3Nzf39/h4eHi4uLj4+P6+vr7+/v8/Pz9/f3///+Nh2QuAAAAIXRSTlMABgwPGBswMzk8QktRV4SKjZOWmaKlq7TAxszb3urt+fy1vNEpAAAAiklEQVQIHUXBBxKCQBREwRFzDqjoGh+C2YV//8u5Sll2S0E/dof1tKdKM6GyqCto7PjZRJIS/mbSELgXOSd/BzpKIH1ZefVWpDDTHsi8mZVnwImPi5ndCLbaAZk3M58Bay0h9VbeSvMpjDUAHj4jL55AW1rxN5fU2PLjIgVRzNdxVFOlGzvnJi0Fb1XNGBHA9uQOAAAAAElFTkSuQmCC');
    background-repeat: no-repeat;
    background-position: 13px 11px;
}

.sf-toolbar-block {
    white-space: nowrap;
    color: #2f2f2f;
    display: block;
    min-height: 28px;
    border-bottom: 1px solid #e4e4e4;
    border-right: 1px solid #e4e4e4;
    padding: 0;
    float: left;
    cursor: default;
}

.sf-toolbar-block span {
    display: inline-block;
}

.sf-toolbar-block .sf-toolbar-info-piece {
    line-height: 19px;
    margin-bottom: 5px;
}

.sf-toolbar-block .sf-toolbar-info-piece .sf-toolbar-status {
    padding: 0px 5px;
    border-radius: 5px;
    margin-bottom: 0px;
    vertical-align: top;
}

.sf-toolbar-block .sf-toolbar-info-piece:last-child {
    margin-bottom: 0;
}

.sf-toolbar-block .sf-toolbar-info-piece a,
.sf-toolbar-block .sf-toolbar-info-piece abbr {
    color: #2f2f2f;
}

.sf-toolbar-block .sf-toolbar-info-piece b {
    display: inline-block;
    width: 110px;
    vertical-align: top;
}

.sf-toolbar-block .sf-toolbar-info-with-next-pointer:after {
    content: ' :: ';
    color: #999;
}

.sf-toolbar-block .sf-toolbar-info-with-delimiter {
    border-right: 1px solid #999;
    padding-right: 5px;
    margin-right: 5px;
}

.sf-toolbar-block .sf-toolbar-info {
    display: none;
    position: absolute;
    background-color: #fff;
    border: 1px solid #bbb;
    padding: 9px 0;
    margin-left: -1px;

    bottom: 38px;
    border-bottom-width: 0;
    border-bottom: 1px solid #bbb;
    border-radius: 4px 4px 0 0;
}

.sf-toolbar-block .sf-toolbar-info:empty {
    visibility: hidden;
}

.sf-toolbar-block .sf-toolbar-status {
    display: inline-block;
    color: #fff;
    background-color: #666;
    padding: 3px 6px;
    border-radius: 3px;
    margin-bottom: 2px;
    vertical-align: middle;
    min-width: 6px;
    min-height: 13px;
}

.sf-toolbar-block .sf-toolbar-status abbr {
    color: #fff;
    border-bottom: 1px dotted black;
}

.sf-toolbar-block .sf-toolbar-status-green {
    background-color: #759e1a;
}

.sf-toolbar-block .sf-toolbar-status-red {
    background-color: #a33;
}

.sf-toolbar-block .sf-toolbar-status-yellow {
    background-color: #ffcc00;
    color: #000;
}

.sf-toolbar-block .sf-toolbar-status-black {
    background-color: #000;
}

.sf-toolbar-block .sf-toolbar-icon {
    display: block;
}

.sf-toolbar-block .sf-toolbar-icon > a,
.sf-toolbar-block .sf-toolbar-icon > span {
    display: block;
    font-weight: normal;
    text-decoration: none;
    margin: 0;
    padding: 5px 8px;
    min-width: 20px;
    text-align: center;
    vertical-align: middle;
}

.sf-toolbar-block .sf-toolbar-icon > a,
.sf-toolbar-block .sf-toolbar-icon > a:link
.sf-toolbar-block .sf-toolbar-icon > a:hover {
    color: black !important;
}

.sf-toolbar-block .sf-toolbar-icon > a[href]:after {
    content: \"\";
}

.sf-toolbar-block .sf-toolbar-icon img {
    border-width: 0;
    vertical-align: middle;
}

.sf-toolbar-block .sf-toolbar-icon img + span {
    margin-left: 5px;
    margin-top: 2px;
}

.sf-toolbar-block .sf-toolbar-icon .sf-toolbar-status {
    border-radius: 12px;
    border-bottom-left-radius: 0;
    margin-top: 0;
}

.sf-toolbar-block .sf-toolbar-info-method {
    border-bottom: 1px dashed #ccc;
    cursor: help;
}

.sf-toolbar-block .sf-toolbar-info-method[onclick=\"\"] {
    border-bottom: none;
    cursor: inherit;
}

.sf-toolbar-info-php {}
.sf-toolbar-info-php-ext {}

.sf-toolbar-info-php-ext .sf-toolbar-status {
    margin-left: 2px;
}

.sf-toolbar-info-php-ext .sf-toolbar-status:first-child {
    margin-left: 0;
}

.sf-toolbar-block a .sf-toolbar-info-piece-additional,
.sf-toolbar-block a .sf-toolbar-info-piece-additional-detail {
    display: inline-block;
}

.sf-toolbar-block a .sf-toolbar-info-piece-additional:empty,
.sf-toolbar-block a .sf-toolbar-info-piece-additional-detail:empty {
    display: none;
}

.sf-toolbarreset:hover {
    box-shadow: rgba(0, 0, 0, 0.3) 0 0 50px;
}

.sf-toolbar-block:hover {
    box-shadow: rgba(0, 0, 0, 0.35) 0 0 5px;
    border-right: none;
    margin-right: 1px;
    position: relative;
}

.sf-toolbar-block:hover .sf-toolbar-icon {
    background-color: #fff;
    border-top: 1px dotted #DDD;
    position: relative;
    margin-top: -1px;
    z-index: 10002;
}

.sf-toolbar-block:hover .sf-toolbar-info {
    display: block;
    min-width: -webkit-calc(100% + 2px);
    min-width: calc(100% + 2px);
    z-index: 10001;
    box-sizing: border-box;
    padding: 9px;
    line-height: 19px;

    max-width: 480px;
    max-height: 480px;
    word-wrap: break-word;
    overflow: hidden;
    overflow-y: auto;
}

.sf-toolbar-ajax-requests th, .sf-toolbar-ajax-requests td {
    border-bottom: 1px solid #ddd;
    padding: 0 4px;
    color: #2f2f2f;
    background-color: #fff;
}
.sf-toolbar-ajax-requests th {
    background-color: #eee;
}
.sf-ajax-request-url {
    max-width: 300px;
    line-height: 9px;
    overflow: hidden;
    text-overflow: ellipsis;
}
.sf-ajax-request-duration {
    text-align: right;
}
.sf-ajax-request-error {
    color: #a33;
}
.sf-ajax-request-loading {
    -webkit-animation: sf-blink .5s ease-in-out infinite;
    -o-animation: sf-blink .5s ease-in-out infinite;
    -moz-animation: sf-blink .5s ease-in-out infinite;
    animation: sf-blink .5s ease-in-out infinite;
}
@-webkit-keyframes sf-blink {
    0% { color: black; }
    50% { color: #bbb; }
    100% { color: black; }
}
@-moz-keyframes sf-blink {
    0% { color: black; }
    50% { color: #bbb; }
    100% { color: black; }
}
@-o-keyframes sf-blink {
    0% { color: black; }
    50% { color: #bbb; }
    100% { color: black; }
}
@keyframes sf-blink {
    0% { color: black; }
    50% { color: #bbb; }
    100% { color: black; }
}

/***** Override the setting when the toolbar is on the top *****/
";
        // line 348
        if (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "top")) {
            // line 349
            echo "    .sf-minitoolbar {
        top: 0;
        bottom: auto;
        right: 0;

        background-color: #f7f7f7;

        background-image: -moz-linear-gradient(225deg, #e4e4e4, #ffffff);
        background-image: -webkit-gradient(linear, 100% 0%, 0% 0%, from(#e4e4e4), to(#ffffff));
        background-image: -o-linear-gradient(135deg, #e4e4e4, #ffffff);
        background: linear-gradient(225deg, #e4e4e4, #ffffff);

        border-radius: 0 0 0 16px;
    }

    .sf-toolbarreset {
        background-image: -moz-linear-gradient(225deg, #e4e4e4, #ffffff);
        background-image: -webkit-gradient(linear, 100% 0%, 0% 0%, from(#e4e4e4), to(#ffffff));
        background-image: -o-linear-gradient(135deg, #e4e4e4, #ffffff);
        background: linear-gradient(225deg, #e4e4e4, #ffffff);

        top: 0;
        bottom: auto;
        border-bottom: 1px solid #bbb;
    }

    .sf-toolbar-block .sf-toolbar-info {
        top: 39px;
        bottom: auto;
        border-top-width: 0;
        border-radius: 0 0 4px 4px;
    }

    .sf-toolbar-block:hover .sf-toolbar-icon {
        border-top: none;
        border-bottom: 1px dotted #DDD;
        margin-top: 0;
        margin-bottom: -1px;
    }
";
        }
        // line 389
        echo "
";
        // line 390
        if ( !(isset($context["floatable"]) ? $context["floatable"] : $this->getContext($context, "floatable"))) {
            // line 391
            echo "    .sf-toolbarreset {
        position: static;
        background: #cbcbcb;

        background-image: -moz-linear-gradient(90deg, #cbcbcb, #e8e8e8) !important;
        background-image: -webkit-gradient(linear, 0% 0%, 100% 0%, from(#cbcbcb), to(#e8e8e8)) !important;
        background-image: -o-linear-gradient(180deg, #cbcbcb, #e8e8e8) !important;
        background: linear-gradient(90deg, #cbcbcb, #e8e8e8) !important;
    }
";
        }
        // line 401
        echo "
/***** Media query *****/
@media screen and (max-width: 779px) {
    .sf-toolbar-block .sf-toolbar-icon > * > :first-child ~ * {
        display: none;
    }

    .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional,
    .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional-detail {
        display: none !important;
    }
}

@media screen and (min-width: 880px) {
    .sf-toolbar-block .sf-toolbar-icon a[href\$=\"config\"] .sf-toolbar-info-piece-additional {
        display: inline-block;
    }
}

@media screen and (min-width: 980px) {
    .sf-toolbar-block .sf-toolbar-icon a[href\$=\"security\"] .sf-toolbar-info-piece-additional {
        display: inline-block;
    }
}

@media screen and (max-width: 1179px) {
    .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional {
        display: none;
    }
}

@media screen and (max-width: 1439px) {
    .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional-detail {
        display: none;
    }
}

/***** Media query print: Do not print the Toolbar. *****/
@media print {
    .sf-toolbar {
        display: none;
        visibility: hidden;
    }
}
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/toolbar.css.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  429 => 401,  417 => 391,  415 => 390,  412 => 389,  370 => 349,  368 => 348,  19 => 1,);
    }
}
/* .sf-minitoolbar {*/
/*     display: none;*/
/* */
/*     position: fixed;*/
/*     bottom: 0;*/
/*     right: 0;*/
/* */
/*     padding: 5px 5px 0;*/
/* */
/*     background-color: #f7f7f7;*/
/*     background-image: -moz-linear-gradient(top, #e4e4e4, #ffffff);*/
/*     background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e4e4e4), to(#ffffff));*/
/*     background-image: -o-linear-gradient(top, #e4e4e4, #ffffff);*/
/*     background: linear-gradient(top, #e4e4e4, #ffffff);*/
/* */
/*     border-radius: 16px 0 0 0;*/
/* */
/*     z-index: 6000000;*/
/* }*/
/* */
/* .sf-toolbarreset * {*/
/*     -webkit-box-sizing: content-box;*/
/*     -moz-box-sizing: content-box;*/
/*     box-sizing: content-box;*/
/*     vertical-align: baseline;*/
/* }*/
/* */
/* .sf-toolbarreset {*/
/*     position: fixed;*/
/*     background-color: #f7f7f7;*/
/*     left: 0;*/
/*     right: 0;*/
/*     margin: 0;*/
/*     padding: 0 40px 0 0;*/
/*     z-index: 6000000;*/
/*     font: 11px Verdana, Arial, sans-serif;*/
/*     text-align: left;*/
/*     color: #2f2f2f;*/
/* */
/*     background-image: -moz-linear-gradient(top, #e4e4e4, #ffffff);*/
/*     background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e4e4e4), to(#ffffff));*/
/*     background-image: -o-linear-gradient(top, #e4e4e4, #ffffff);*/
/*     background: linear-gradient(top, #e4e4e4, #ffffff);*/
/* */
/*     bottom: 0;*/
/*     border-top: 1px solid #bbb;*/
/* }*/
/* .sf-toolbarreset abbr {*/
/*     border-bottom: 1px dotted #000000;*/
/*     cursor: help;*/
/* }*/
/* .sf-toolbarreset span,*/
/* .sf-toolbarreset div,*/
/* .sf-toolbarreset td,*/
/* .sf-toolbarreset th {*/
/*     font-size: 11px;*/
/* }*/
/* .sf-toolbarreset img {*/
/*     width: auto;*/
/*     display: inline;*/
/* }*/
/* .sf-toolbarreset table {*/
/*     border-collapse: collapse;*/
/*     border-spacing: 0;*/
/*     background-color: #000;*/
/*     margin: 0;*/
/*     padding: 0;*/
/*     border: 0;*/
/*     width: 100%;*/
/*     table-layout: auto;*/
/* }*/
/* .sf-toolbarreset .hide-button {*/
/*     display: block;*/
/*     position: absolute;*/
/*     top: 0;*/
/*     right: 0;*/
/*     width: 40px;*/
/*     height: 40px;*/
/*     cursor: pointer;*/
/*     background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAMAAAAMCGV4AAAAllBMVEXDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PExMTPz8/Q0NDR0dHT09Pb29vc3Nzf39/h4eHi4uLj4+P6+vr7+/v8/Pz9/f3///+Nh2QuAAAAIXRSTlMABgwPGBswMzk8QktRV4SKjZOWmaKlq7TAxszb3urt+fy1vNEpAAAAiklEQVQIHUXBBxKCQBREwRFzDqjoGh+C2YV//8u5Sll2S0E/dof1tKdKM6GyqCto7PjZRJIS/mbSELgXOSd/BzpKIH1ZefVWpDDTHsi8mZVnwImPi5ndCLbaAZk3M58Bay0h9VbeSvMpjDUAHj4jL55AW1rxN5fU2PLjIgVRzNdxVFOlGzvnJi0Fb1XNGBHA9uQOAAAAAElFTkSuQmCC');*/
/*     background-repeat: no-repeat;*/
/*     background-position: 13px 11px;*/
/* }*/
/* */
/* .sf-toolbar-block {*/
/*     white-space: nowrap;*/
/*     color: #2f2f2f;*/
/*     display: block;*/
/*     min-height: 28px;*/
/*     border-bottom: 1px solid #e4e4e4;*/
/*     border-right: 1px solid #e4e4e4;*/
/*     padding: 0;*/
/*     float: left;*/
/*     cursor: default;*/
/* }*/
/* */
/* .sf-toolbar-block span {*/
/*     display: inline-block;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-info-piece {*/
/*     line-height: 19px;*/
/*     margin-bottom: 5px;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-info-piece .sf-toolbar-status {*/
/*     padding: 0px 5px;*/
/*     border-radius: 5px;*/
/*     margin-bottom: 0px;*/
/*     vertical-align: top;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-info-piece:last-child {*/
/*     margin-bottom: 0;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-info-piece a,*/
/* .sf-toolbar-block .sf-toolbar-info-piece abbr {*/
/*     color: #2f2f2f;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-info-piece b {*/
/*     display: inline-block;*/
/*     width: 110px;*/
/*     vertical-align: top;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-info-with-next-pointer:after {*/
/*     content: ' :: ';*/
/*     color: #999;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-info-with-delimiter {*/
/*     border-right: 1px solid #999;*/
/*     padding-right: 5px;*/
/*     margin-right: 5px;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-info {*/
/*     display: none;*/
/*     position: absolute;*/
/*     background-color: #fff;*/
/*     border: 1px solid #bbb;*/
/*     padding: 9px 0;*/
/*     margin-left: -1px;*/
/* */
/*     bottom: 38px;*/
/*     border-bottom-width: 0;*/
/*     border-bottom: 1px solid #bbb;*/
/*     border-radius: 4px 4px 0 0;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-info:empty {*/
/*     visibility: hidden;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-status {*/
/*     display: inline-block;*/
/*     color: #fff;*/
/*     background-color: #666;*/
/*     padding: 3px 6px;*/
/*     border-radius: 3px;*/
/*     margin-bottom: 2px;*/
/*     vertical-align: middle;*/
/*     min-width: 6px;*/
/*     min-height: 13px;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-status abbr {*/
/*     color: #fff;*/
/*     border-bottom: 1px dotted black;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-status-green {*/
/*     background-color: #759e1a;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-status-red {*/
/*     background-color: #a33;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-status-yellow {*/
/*     background-color: #ffcc00;*/
/*     color: #000;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-status-black {*/
/*     background-color: #000;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-icon {*/
/*     display: block;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-icon > a,*/
/* .sf-toolbar-block .sf-toolbar-icon > span {*/
/*     display: block;*/
/*     font-weight: normal;*/
/*     text-decoration: none;*/
/*     margin: 0;*/
/*     padding: 5px 8px;*/
/*     min-width: 20px;*/
/*     text-align: center;*/
/*     vertical-align: middle;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-icon > a,*/
/* .sf-toolbar-block .sf-toolbar-icon > a:link*/
/* .sf-toolbar-block .sf-toolbar-icon > a:hover {*/
/*     color: black !important;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-icon > a[href]:after {*/
/*     content: "";*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-icon img {*/
/*     border-width: 0;*/
/*     vertical-align: middle;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-icon img + span {*/
/*     margin-left: 5px;*/
/*     margin-top: 2px;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-icon .sf-toolbar-status {*/
/*     border-radius: 12px;*/
/*     border-bottom-left-radius: 0;*/
/*     margin-top: 0;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-info-method {*/
/*     border-bottom: 1px dashed #ccc;*/
/*     cursor: help;*/
/* }*/
/* */
/* .sf-toolbar-block .sf-toolbar-info-method[onclick=""] {*/
/*     border-bottom: none;*/
/*     cursor: inherit;*/
/* }*/
/* */
/* .sf-toolbar-info-php {}*/
/* .sf-toolbar-info-php-ext {}*/
/* */
/* .sf-toolbar-info-php-ext .sf-toolbar-status {*/
/*     margin-left: 2px;*/
/* }*/
/* */
/* .sf-toolbar-info-php-ext .sf-toolbar-status:first-child {*/
/*     margin-left: 0;*/
/* }*/
/* */
/* .sf-toolbar-block a .sf-toolbar-info-piece-additional,*/
/* .sf-toolbar-block a .sf-toolbar-info-piece-additional-detail {*/
/*     display: inline-block;*/
/* }*/
/* */
/* .sf-toolbar-block a .sf-toolbar-info-piece-additional:empty,*/
/* .sf-toolbar-block a .sf-toolbar-info-piece-additional-detail:empty {*/
/*     display: none;*/
/* }*/
/* */
/* .sf-toolbarreset:hover {*/
/*     box-shadow: rgba(0, 0, 0, 0.3) 0 0 50px;*/
/* }*/
/* */
/* .sf-toolbar-block:hover {*/
/*     box-shadow: rgba(0, 0, 0, 0.35) 0 0 5px;*/
/*     border-right: none;*/
/*     margin-right: 1px;*/
/*     position: relative;*/
/* }*/
/* */
/* .sf-toolbar-block:hover .sf-toolbar-icon {*/
/*     background-color: #fff;*/
/*     border-top: 1px dotted #DDD;*/
/*     position: relative;*/
/*     margin-top: -1px;*/
/*     z-index: 10002;*/
/* }*/
/* */
/* .sf-toolbar-block:hover .sf-toolbar-info {*/
/*     display: block;*/
/*     min-width: -webkit-calc(100% + 2px);*/
/*     min-width: calc(100% + 2px);*/
/*     z-index: 10001;*/
/*     box-sizing: border-box;*/
/*     padding: 9px;*/
/*     line-height: 19px;*/
/* */
/*     max-width: 480px;*/
/*     max-height: 480px;*/
/*     word-wrap: break-word;*/
/*     overflow: hidden;*/
/*     overflow-y: auto;*/
/* }*/
/* */
/* .sf-toolbar-ajax-requests th, .sf-toolbar-ajax-requests td {*/
/*     border-bottom: 1px solid #ddd;*/
/*     padding: 0 4px;*/
/*     color: #2f2f2f;*/
/*     background-color: #fff;*/
/* }*/
/* .sf-toolbar-ajax-requests th {*/
/*     background-color: #eee;*/
/* }*/
/* .sf-ajax-request-url {*/
/*     max-width: 300px;*/
/*     line-height: 9px;*/
/*     overflow: hidden;*/
/*     text-overflow: ellipsis;*/
/* }*/
/* .sf-ajax-request-duration {*/
/*     text-align: right;*/
/* }*/
/* .sf-ajax-request-error {*/
/*     color: #a33;*/
/* }*/
/* .sf-ajax-request-loading {*/
/*     -webkit-animation: sf-blink .5s ease-in-out infinite;*/
/*     -o-animation: sf-blink .5s ease-in-out infinite;*/
/*     -moz-animation: sf-blink .5s ease-in-out infinite;*/
/*     animation: sf-blink .5s ease-in-out infinite;*/
/* }*/
/* @-webkit-keyframes sf-blink {*/
/*     0% { color: black; }*/
/*     50% { color: #bbb; }*/
/*     100% { color: black; }*/
/* }*/
/* @-moz-keyframes sf-blink {*/
/*     0% { color: black; }*/
/*     50% { color: #bbb; }*/
/*     100% { color: black; }*/
/* }*/
/* @-o-keyframes sf-blink {*/
/*     0% { color: black; }*/
/*     50% { color: #bbb; }*/
/*     100% { color: black; }*/
/* }*/
/* @keyframes sf-blink {*/
/*     0% { color: black; }*/
/*     50% { color: #bbb; }*/
/*     100% { color: black; }*/
/* }*/
/* */
/* /***** Override the setting when the toolbar is on the top *****//* */
/* {% if position == 'top' %}*/
/*     .sf-minitoolbar {*/
/*         top: 0;*/
/*         bottom: auto;*/
/*         right: 0;*/
/* */
/*         background-color: #f7f7f7;*/
/* */
/*         background-image: -moz-linear-gradient(225deg, #e4e4e4, #ffffff);*/
/*         background-image: -webkit-gradient(linear, 100% 0%, 0% 0%, from(#e4e4e4), to(#ffffff));*/
/*         background-image: -o-linear-gradient(135deg, #e4e4e4, #ffffff);*/
/*         background: linear-gradient(225deg, #e4e4e4, #ffffff);*/
/* */
/*         border-radius: 0 0 0 16px;*/
/*     }*/
/* */
/*     .sf-toolbarreset {*/
/*         background-image: -moz-linear-gradient(225deg, #e4e4e4, #ffffff);*/
/*         background-image: -webkit-gradient(linear, 100% 0%, 0% 0%, from(#e4e4e4), to(#ffffff));*/
/*         background-image: -o-linear-gradient(135deg, #e4e4e4, #ffffff);*/
/*         background: linear-gradient(225deg, #e4e4e4, #ffffff);*/
/* */
/*         top: 0;*/
/*         bottom: auto;*/
/*         border-bottom: 1px solid #bbb;*/
/*     }*/
/* */
/*     .sf-toolbar-block .sf-toolbar-info {*/
/*         top: 39px;*/
/*         bottom: auto;*/
/*         border-top-width: 0;*/
/*         border-radius: 0 0 4px 4px;*/
/*     }*/
/* */
/*     .sf-toolbar-block:hover .sf-toolbar-icon {*/
/*         border-top: none;*/
/*         border-bottom: 1px dotted #DDD;*/
/*         margin-top: 0;*/
/*         margin-bottom: -1px;*/
/*     }*/
/* {% endif %}*/
/* */
/* {% if not floatable %}*/
/*     .sf-toolbarreset {*/
/*         position: static;*/
/*         background: #cbcbcb;*/
/* */
/*         background-image: -moz-linear-gradient(90deg, #cbcbcb, #e8e8e8) !important;*/
/*         background-image: -webkit-gradient(linear, 0% 0%, 100% 0%, from(#cbcbcb), to(#e8e8e8)) !important;*/
/*         background-image: -o-linear-gradient(180deg, #cbcbcb, #e8e8e8) !important;*/
/*         background: linear-gradient(90deg, #cbcbcb, #e8e8e8) !important;*/
/*     }*/
/* {% endif %}*/
/* */
/* /***** Media query *****//* */
/* @media screen and (max-width: 779px) {*/
/*     .sf-toolbar-block .sf-toolbar-icon > * > :first-child ~ * {*/
/*         display: none;*/
/*     }*/
/* */
/*     .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional,*/
/*     .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional-detail {*/
/*         display: none !important;*/
/*     }*/
/* }*/
/* */
/* @media screen and (min-width: 880px) {*/
/*     .sf-toolbar-block .sf-toolbar-icon a[href$="config"] .sf-toolbar-info-piece-additional {*/
/*         display: inline-block;*/
/*     }*/
/* }*/
/* */
/* @media screen and (min-width: 980px) {*/
/*     .sf-toolbar-block .sf-toolbar-icon a[href$="security"] .sf-toolbar-info-piece-additional {*/
/*         display: inline-block;*/
/*     }*/
/* }*/
/* */
/* @media screen and (max-width: 1179px) {*/
/*     .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional {*/
/*         display: none;*/
/*     }*/
/* }*/
/* */
/* @media screen and (max-width: 1439px) {*/
/*     .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional-detail {*/
/*         display: none;*/
/*     }*/
/* }*/
/* */
/* /***** Media query print: Do not print the Toolbar. *****//* */
/* @media print {*/
/*     .sf-toolbar {*/
/*         display: none;*/
/*         visibility: hidden;*/
/*     }*/
/* }*/
/* */
