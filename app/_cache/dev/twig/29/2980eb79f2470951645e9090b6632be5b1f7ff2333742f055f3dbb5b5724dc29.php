<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_49895b1e1717d3d617f73da913e0f26c9f10c4b2a2f55f1c77918bdca867353f extends Twig_Template
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
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            collectionToArray = function (collection) {
                var length = collection.length || 0,
                    results = new Array(length);

                while (length--) {
                    results[length] = collection[length];
                }

                return results;
            },

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                options.maxTries = options.maxTries || 0;
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 !== xhr.readyState) {
                        return null;
                    }

                    if (xhr.status == 404 && options.maxTries > 1) {
                        setTimeout(function(){
                            options.maxTries--;
                            request(url, onSuccess, onError, payload, options);
                        }, 500);

                        return null;
                    }

                    if (200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className && el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                if (el.className) {
                    el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
                }
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) {
                    el.className += \" \" + klass;
                }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            },

            requestStack = [],

            renderAjaxRequests = function() {
                var requestCounter = document.querySelectorAll('.sf-toolbar-ajax-requests');
                if (!requestCounter.length) {
                    return;
                }

                var tbodies = document.querySelectorAll('.sf-toolbar-ajax-request-list');
                var state = 'ok';
                if (tbodies.length) {
                    var tbody = tbodies[0];

                    var rows = document.createDocumentFragment();

                    if (requestStack.length) {
                        for (var i = 0; i < requestStack.length; i++) {
                            var request = requestStack[i];

                            var row = document.createElement('tr');
                            rows.appendChild(row);

                            var methodCell = document.createElement('td');
                            methodCell.textContent = request.method;
                            row.appendChild(methodCell);

                            var pathCell = document.createElement('td');
                            pathCell.className = 'sf-ajax-request-url';
                            pathCell.textContent = request.url;
                            pathCell.setAttribute('title', request.url);
                            row.appendChild(pathCell);

                            var durationCell = document.createElement('td');
                            durationCell.className = 'sf-ajax-request-duration';

                            if (request.duration) {
                                durationCell.textContent = request.duration + \"ms\";
                            } else {
                                durationCell.textContent = '-';
                            }
                            row.appendChild(durationCell);

                            row.appendChild(document.createTextNode(' '));
                            var profilerCell = document.createElement('td');

                            if (request.profilerUrl) {
                                var profilerLink = document.createElement('a');
                                profilerLink.setAttribute('href', request.profilerUrl);
                                profilerLink.textContent = request.profile;
                                profilerCell.appendChild(profilerLink);
                            } else {
                                profilerCell.textContent = 'n/a';
                            }

                            row.appendChild(profilerCell);

                            var requestState = 'ok';
                            if (request.error) {
                                requestState = 'error';
                                if (state != \"loading\" && i > requestStack.length - 4) {
                                    state = 'error';
                                }
                            } else if (request.loading) {
                                requestState = 'loading';
                                state = 'loading';
                            }
                            row.className = 'sf-ajax-request sf-ajax-request-' + requestState;
                        }

                        var infoSpan = document.querySelectorAll(\".sf-toolbar-ajax-info\")[0];
                        var children = collectionToArray(tbody.children);
                        for (var i = 0; i < children.length; i++) {
                            tbody.removeChild(children[i]);
                        }
                        tbody.appendChild(rows);

                        if (infoSpan) {
                            var text = requestStack.length + ' call' + (requestStack.length > 1 ? 's' : '');
                            infoSpan.textContent = text;
                        }
                    } else {
                        var cell = document.createElement('td');
                        cell.setAttribute('colspan', '4');
                        cell.textContent = \"No AJAX requests yet.\";
                        var row = document.createElement('tr');
                        row.appendChild(cell);
                        tbody.appendChild(row);
                    }
                }

                requestCounter[0].textContent = requestStack.length;

                var className = 'sf-toolbar-ajax-requests sf-toolbar-status';
                if (state == 'ok') {
                    className += ' sf-toolbar-status-green';
                } else if (state == 'error') {
                    className += ' sf-toolbar-status-red';
                } else {
                    className += ' sf-ajax-request-loading';
                }

                requestCounter[0].className = className;
            };

        var addEventListener;

        var el = document.createElement('div');
        if (!'addEventListener' in el) {
            addEventListener = function (element, eventName, callback) {
                element.attachEvent('on' + eventName, callback);
            };
        } else {
            addEventListener = function (element, eventName, callback) {
                element.addEventListener(eventName, callback, false);
            };
        }

        ";
        // line 198
        if (array_key_exists("excluded_ajax_paths", $context)) {
            // line 199
            echo "            if (window.XMLHttpRequest && XMLHttpRequest.prototype.addEventListener) {
                var proxied = XMLHttpRequest.prototype.open;

                XMLHttpRequest.prototype.open = function(method, url, async, user, pass) {
                    var self = this;

                    /* prevent logging AJAX calls to static and inline files, like templates */
                    var path = url;
                    if (url.substr(0, 1) === '/') {
                        if (0 === url.indexOf('";
            // line 208
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "basePath", array()), "js"), "html", null, true);
            echo "')) {
                            path = url.substr(";
            // line 209
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "basePath", array())), "html", null, true);
            echo ");
                        }
                    }
                    else if (0 === url.indexOf('";
            // line 212
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, ($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "schemeAndHttpHost", array()) . $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "basePath", array())), "js"), "html", null, true);
            echo "')) {
                        path = url.substr(";
            // line 213
            echo twig_escape_filter($this->env, twig_length_filter($this->env, ($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "schemeAndHttpHost", array()) . $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "basePath", array()))), "html", null, true);
            echo ");
                    }

                    if (path.substr(0, 1) === '/' && !path.match(new RegExp(";
            // line 216
            echo twig_jsonencode_filter((isset($context["excluded_ajax_paths"]) ? $context["excluded_ajax_paths"] : $this->getContext($context, "excluded_ajax_paths")));
            echo "))) {
                        var stackElement = {
                            loading: true,
                            error: false,
                            url: url,
                            method: method,
                            start: new Date()
                        };

                        requestStack.push(stackElement);

                        this.addEventListener('readystatechange', function() {
                            if (self.readyState == 4) {
                                stackElement.duration = new Date() - stackElement.start;
                                stackElement.loading = false;
                                stackElement.error = self.status < 200 || self.status >= 400;
                                stackElement.profile = self.getResponseHeader(\"X-Debug-Token\");
                                stackElement.profilerUrl = self.getResponseHeader(\"X-Debug-Token-Link\");

                                Sfjs.renderAjaxRequests();
                            }
                        }, false);

                        Sfjs.renderAjaxRequests();
                    }

                    proxied.apply(this, Array.prototype.slice.call(arguments));
                };
            }
        ";
        }
        // line 246
        echo "
        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            addEventListener: addEventListener,

            request: request,

            renderAjaxRequests: renderAjaxRequests,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        '',
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 246,  251 => 216,  245 => 213,  241 => 212,  235 => 209,  231 => 208,  220 => 199,  218 => 198,  19 => 1,);
    }
}
/* <script>/*<![CDATA[*//* */
/*     Sfjs = (function() {*/
/*         "use strict";*/
/* */
/*         var noop = function() {},*/
/* */
/*             collectionToArray = function (collection) {*/
/*                 var length = collection.length || 0,*/
/*                     results = new Array(length);*/
/* */
/*                 while (length--) {*/
/*                     results[length] = collection[length];*/
/*                 }*/
/* */
/*                 return results;*/
/*             },*/
/* */
/*             profilerStorageKey = 'sf2/profiler/',*/
/* */
/*             request = function(url, onSuccess, onError, payload, options) {*/
/*                 var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');*/
/*                 options = options || {};*/
/*                 options.maxTries = options.maxTries || 0;*/
/*                 xhr.open(options.method || 'GET', url, true);*/
/*                 xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');*/
/*                 xhr.onreadystatechange = function(state) {*/
/*                     if (4 !== xhr.readyState) {*/
/*                         return null;*/
/*                     }*/
/* */
/*                     if (xhr.status == 404 && options.maxTries > 1) {*/
/*                         setTimeout(function(){*/
/*                             options.maxTries--;*/
/*                             request(url, onSuccess, onError, payload, options);*/
/*                         }, 500);*/
/* */
/*                         return null;*/
/*                     }*/
/* */
/*                     if (200 === xhr.status) {*/
/*                         (onSuccess || noop)(xhr);*/
/*                     } else {*/
/*                         (onError || noop)(xhr);*/
/*                     }*/
/*                 };*/
/*                 xhr.send(payload || '');*/
/*             },*/
/* */
/*             hasClass = function(el, klass) {*/
/*                 return el.className && el.className.match(new RegExp('\\b' + klass + '\\b'));*/
/*             },*/
/* */
/*             removeClass = function(el, klass) {*/
/*                 if (el.className) {*/
/*                     el.className = el.className.replace(new RegExp('\\b' + klass + '\\b'), ' ');*/
/*                 }*/
/*             },*/
/* */
/*             addClass = function(el, klass) {*/
/*                 if (!hasClass(el, klass)) {*/
/*                     el.className += " " + klass;*/
/*                 }*/
/*             },*/
/* */
/*             getPreference = function(name) {*/
/*                 if (!window.localStorage) {*/
/*                     return null;*/
/*                 }*/
/* */
/*                 return localStorage.getItem(profilerStorageKey + name);*/
/*             },*/
/* */
/*             setPreference = function(name, value) {*/
/*                 if (!window.localStorage) {*/
/*                     return null;*/
/*                 }*/
/* */
/*                 localStorage.setItem(profilerStorageKey + name, value);*/
/*             },*/
/* */
/*             requestStack = [],*/
/* */
/*             renderAjaxRequests = function() {*/
/*                 var requestCounter = document.querySelectorAll('.sf-toolbar-ajax-requests');*/
/*                 if (!requestCounter.length) {*/
/*                     return;*/
/*                 }*/
/* */
/*                 var tbodies = document.querySelectorAll('.sf-toolbar-ajax-request-list');*/
/*                 var state = 'ok';*/
/*                 if (tbodies.length) {*/
/*                     var tbody = tbodies[0];*/
/* */
/*                     var rows = document.createDocumentFragment();*/
/* */
/*                     if (requestStack.length) {*/
/*                         for (var i = 0; i < requestStack.length; i++) {*/
/*                             var request = requestStack[i];*/
/* */
/*                             var row = document.createElement('tr');*/
/*                             rows.appendChild(row);*/
/* */
/*                             var methodCell = document.createElement('td');*/
/*                             methodCell.textContent = request.method;*/
/*                             row.appendChild(methodCell);*/
/* */
/*                             var pathCell = document.createElement('td');*/
/*                             pathCell.className = 'sf-ajax-request-url';*/
/*                             pathCell.textContent = request.url;*/
/*                             pathCell.setAttribute('title', request.url);*/
/*                             row.appendChild(pathCell);*/
/* */
/*                             var durationCell = document.createElement('td');*/
/*                             durationCell.className = 'sf-ajax-request-duration';*/
/* */
/*                             if (request.duration) {*/
/*                                 durationCell.textContent = request.duration + "ms";*/
/*                             } else {*/
/*                                 durationCell.textContent = '-';*/
/*                             }*/
/*                             row.appendChild(durationCell);*/
/* */
/*                             row.appendChild(document.createTextNode(' '));*/
/*                             var profilerCell = document.createElement('td');*/
/* */
/*                             if (request.profilerUrl) {*/
/*                                 var profilerLink = document.createElement('a');*/
/*                                 profilerLink.setAttribute('href', request.profilerUrl);*/
/*                                 profilerLink.textContent = request.profile;*/
/*                                 profilerCell.appendChild(profilerLink);*/
/*                             } else {*/
/*                                 profilerCell.textContent = 'n/a';*/
/*                             }*/
/* */
/*                             row.appendChild(profilerCell);*/
/* */
/*                             var requestState = 'ok';*/
/*                             if (request.error) {*/
/*                                 requestState = 'error';*/
/*                                 if (state != "loading" && i > requestStack.length - 4) {*/
/*                                     state = 'error';*/
/*                                 }*/
/*                             } else if (request.loading) {*/
/*                                 requestState = 'loading';*/
/*                                 state = 'loading';*/
/*                             }*/
/*                             row.className = 'sf-ajax-request sf-ajax-request-' + requestState;*/
/*                         }*/
/* */
/*                         var infoSpan = document.querySelectorAll(".sf-toolbar-ajax-info")[0];*/
/*                         var children = collectionToArray(tbody.children);*/
/*                         for (var i = 0; i < children.length; i++) {*/
/*                             tbody.removeChild(children[i]);*/
/*                         }*/
/*                         tbody.appendChild(rows);*/
/* */
/*                         if (infoSpan) {*/
/*                             var text = requestStack.length + ' call' + (requestStack.length > 1 ? 's' : '');*/
/*                             infoSpan.textContent = text;*/
/*                         }*/
/*                     } else {*/
/*                         var cell = document.createElement('td');*/
/*                         cell.setAttribute('colspan', '4');*/
/*                         cell.textContent = "No AJAX requests yet.";*/
/*                         var row = document.createElement('tr');*/
/*                         row.appendChild(cell);*/
/*                         tbody.appendChild(row);*/
/*                     }*/
/*                 }*/
/* */
/*                 requestCounter[0].textContent = requestStack.length;*/
/* */
/*                 var className = 'sf-toolbar-ajax-requests sf-toolbar-status';*/
/*                 if (state == 'ok') {*/
/*                     className += ' sf-toolbar-status-green';*/
/*                 } else if (state == 'error') {*/
/*                     className += ' sf-toolbar-status-red';*/
/*                 } else {*/
/*                     className += ' sf-ajax-request-loading';*/
/*                 }*/
/* */
/*                 requestCounter[0].className = className;*/
/*             };*/
/* */
/*         var addEventListener;*/
/* */
/*         var el = document.createElement('div');*/
/*         if (!'addEventListener' in el) {*/
/*             addEventListener = function (element, eventName, callback) {*/
/*                 element.attachEvent('on' + eventName, callback);*/
/*             };*/
/*         } else {*/
/*             addEventListener = function (element, eventName, callback) {*/
/*                 element.addEventListener(eventName, callback, false);*/
/*             };*/
/*         }*/
/* */
/*         {% if excluded_ajax_paths is defined %}*/
/*             if (window.XMLHttpRequest && XMLHttpRequest.prototype.addEventListener) {*/
/*                 var proxied = XMLHttpRequest.prototype.open;*/
/* */
/*                 XMLHttpRequest.prototype.open = function(method, url, async, user, pass) {*/
/*                     var self = this;*/
/* */
/*                     /* prevent logging AJAX calls to static and inline files, like templates *//* */
/*                     var path = url;*/
/*                     if (url.substr(0, 1) === '/') {*/
/*                         if (0 === url.indexOf('{{ request.basePath|e('js') }}')) {*/
/*                             path = url.substr({{ request.basePath|length }});*/
/*                         }*/
/*                     }*/
/*                     else if (0 === url.indexOf('{{ (request.schemeAndHttpHost ~ request.basePath)|e('js') }}')) {*/
/*                         path = url.substr({{ (request.schemeAndHttpHost ~ request.basePath)|length }});*/
/*                     }*/
/* */
/*                     if (path.substr(0, 1) === '/' && !path.match(new RegExp({{ excluded_ajax_paths|json_encode|raw }}))) {*/
/*                         var stackElement = {*/
/*                             loading: true,*/
/*                             error: false,*/
/*                             url: url,*/
/*                             method: method,*/
/*                             start: new Date()*/
/*                         };*/
/* */
/*                         requestStack.push(stackElement);*/
/* */
/*                         this.addEventListener('readystatechange', function() {*/
/*                             if (self.readyState == 4) {*/
/*                                 stackElement.duration = new Date() - stackElement.start;*/
/*                                 stackElement.loading = false;*/
/*                                 stackElement.error = self.status < 200 || self.status >= 400;*/
/*                                 stackElement.profile = self.getResponseHeader("X-Debug-Token");*/
/*                                 stackElement.profilerUrl = self.getResponseHeader("X-Debug-Token-Link");*/
/* */
/*                                 Sfjs.renderAjaxRequests();*/
/*                             }*/
/*                         }, false);*/
/* */
/*                         Sfjs.renderAjaxRequests();*/
/*                     }*/
/* */
/*                     proxied.apply(this, Array.prototype.slice.call(arguments));*/
/*                 };*/
/*             }*/
/*         {% endif %}*/
/* */
/*         return {*/
/*             hasClass: hasClass,*/
/* */
/*             removeClass: removeClass,*/
/* */
/*             addClass: addClass,*/
/* */
/*             getPreference: getPreference,*/
/* */
/*             setPreference: setPreference,*/
/* */
/*             addEventListener: addEventListener,*/
/* */
/*             request: request,*/
/* */
/*             renderAjaxRequests: renderAjaxRequests,*/
/* */
/*             load: function(selector, url, onSuccess, onError, options) {*/
/*                 var el = document.getElementById(selector);*/
/* */
/*                 if (el && el.getAttribute('data-sfurl') !== url) {*/
/*                     request(*/
/*                         url,*/
/*                         function(xhr) {*/
/*                             el.innerHTML = xhr.responseText;*/
/*                             el.setAttribute('data-sfurl', url);*/
/*                             removeClass(el, 'loading');*/
/*                             (onSuccess || noop)(xhr, el);*/
/*                         },*/
/*                         function(xhr) { (onError || noop)(xhr, el); },*/
/*                         '',*/
/*                         options*/
/*                     );*/
/*                 }*/
/* */
/*                 return this;*/
/*             },*/
/* */
/*             toggle: function(selector, elOn, elOff) {*/
/*                 var tmp = elOn.style.display,*/
/*                     el = document.getElementById(selector);*/
/* */
/*                 elOn.style.display = elOff.style.display;*/
/*                 elOff.style.display = tmp;*/
/* */
/*                 if (el) {*/
/*                     el.style.display = 'none' === tmp ? 'none' : 'block';*/
/*                 }*/
/* */
/*                 return this;*/
/*             }*/
/*         }*/
/*     })();*/
/* /*]]>*//* </script>*/
/* */
