
/*!
 * hoverIntent v1.8.0 // 2014.06.29 // jQuery v1.9.1+
 * http://cherne.net/brian/resources/jquery.hoverIntent.html
 *
 * You may use hoverIntent under the terms of the MIT license. Basically that
 * means you are free to use hoverIntent as long as this header is left intact.
 * Copyright 2007, 2014 Brian Cherne
 */
(function($){$.fn.hoverIntent=function(handlerIn,handlerOut,selector){var cfg={interval:100,sensitivity:6,timeout:0};if(typeof handlerIn==="object"){cfg=$.extend(cfg,handlerIn)}else{if($.isFunction(handlerOut)){cfg=$.extend(cfg,{over:handlerIn,out:handlerOut,selector:selector})}else{cfg=$.extend(cfg,{over:handlerIn,out:handlerIn,selector:handlerOut})}}var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if(Math.sqrt((pX-cX)*(pX-cX)+(pY-cY)*(pY-cY))<cfg.sensitivity){$(ob).off("mousemove.hoverIntent",track);ob.hoverIntent_s=true;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=false;return cfg.out.apply(ob,[ev])};var handleHover=function(e){var ev=$.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t)}if(e.type==="mouseenter"){pX=ev.pageX;pY=ev.pageY;$(ob).on("mousemove.hoverIntent",track);if(!ob.hoverIntent_s){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}}else{$(ob).off("mousemove.hoverIntent",track);if(ob.hoverIntent_s){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}}};return this.on({"mouseenter.hoverIntent":handleHover,"mouseleave.hoverIntent":handleHover},cfg.selector)}})(jQuery);


/*
    jQuery Masked Input Plugin
    Copyright (c) 2007 - 2015 Josh Bush (digitalbush.com)
    Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license)
    Version: 1.4.1
*/
//!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){var b,c=navigator.userAgent,d=/iphone/i.test(c),e=/chrome/i.test(c),f=/android/i.test(c);a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},a.fn.extend({caret:function(a,b){var c;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof a?(b="number"==typeof b?b:a,this.each(function(){this.setSelectionRange?this.setSelectionRange(a,b):this.createTextRange&&(c=this.createTextRange(),c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select())})):(this[0].setSelectionRange?(a=this[0].selectionStart,b=this[0].selectionEnd):document.selection&&document.selection.createRange&&(c=document.selection.createRange(),a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length),{begin:a,end:b})},unmask:function(){return this.trigger("unmask")},mask:function(c,g){var h,i,j,k,l,m,n,o;if(!c&&this.length>0){h=a(this[0]);var p=h.data(a.mask.dataName);return p?p():void 0}return g=a.extend({autoclear:a.mask.autoclear,placeholder:a.mask.placeholder,completed:null},g),i=a.mask.definitions,j=[],k=n=c.length,l=null,a.each(c.split(""),function(a,b){"?"==b?(n--,k=a):i[b]?(j.push(new RegExp(i[b])),null===l&&(l=j.length-1),k>a&&(m=j.length-1)):j.push(null)}),this.trigger("unmask").each(function(){function h(){if(g.completed){for(var a=l;m>=a;a++)if(j[a]&&C[a]===p(a))return;g.completed.call(B)}}function p(a){return g.placeholder.charAt(a<g.placeholder.length?a:0)}function q(a){for(;++a<n&&!j[a];);return a}function r(a){for(;--a>=0&&!j[a];);return a}function s(a,b){var c,d;if(!(0>a)){for(c=a,d=q(b);n>c;c++)if(j[c]){if(!(n>d&&j[c].test(C[d])))break;C[c]=C[d],C[d]=p(d),d=q(d)}z(),B.caret(Math.max(l,a))}}function t(a){var b,c,d,e;for(b=a,c=p(a);n>b;b++)if(j[b]){if(d=q(b),e=C[b],C[b]=c,!(n>d&&j[d].test(e)))break;c=e}}function u(){var a=B.val(),b=B.caret();if(o&&o.length&&o.length>a.length){for(A(!0);b.begin>0&&!j[b.begin-1];)b.begin--;if(0===b.begin)for(;b.begin<l&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}else{for(A(!0);b.begin<n&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}h()}function v(){A(),B.val()!=E&&B.change()}function w(a){if(!B.prop("readonly")){var b,c,e,f=a.which||a.keyCode;o=B.val(),8===f||46===f||d&&127===f?(b=B.caret(),c=b.begin,e=b.end,e-c===0&&(c=46!==f?r(c):e=q(c-1),e=46===f?q(e):e),y(c,e),s(c,e-1),a.preventDefault()):13===f?v.call(this,a):27===f&&(B.val(E),B.caret(0,A()),a.preventDefault())}}function x(b){if(!B.prop("readonly")){var c,d,e,g=b.which||b.keyCode,i=B.caret();if(!(b.ctrlKey||b.altKey||b.metaKey||32>g)&&g&&13!==g){if(i.end-i.begin!==0&&(y(i.begin,i.end),s(i.begin,i.end-1)),c=q(i.begin-1),n>c&&(d=String.fromCharCode(g),j[c].test(d))){if(t(c),C[c]=d,z(),e=q(c),f){var k=function(){a.proxy(a.fn.caret,B,e)()};setTimeout(k,0)}else B.caret(e);i.begin<=m&&h()}b.preventDefault()}}}function y(a,b){var c;for(c=a;b>c&&n>c;c++)j[c]&&(C[c]=p(c))}function z(){B.val(C.join(""))}function A(a){var b,c,d,e=B.val(),f=-1;for(b=0,d=0;n>b;b++)if(j[b]){for(C[b]=p(b);d++<e.length;)if(c=e.charAt(d-1),j[b].test(c)){C[b]=c,f=b;break}if(d>e.length){y(b+1,n);break}}else C[b]===e.charAt(d)&&d++,k>b&&(f=b);return a?z():k>f+1?g.autoclear||C.join("")===D?(B.val()&&B.val(""),y(0,n)):z():(z(),B.val(B.val().substring(0,f+1))),k?b:l}var B=a(this),C=a.map(c.split(""),function(a,b){return"?"!=a?i[a]?p(b):a:void 0}),D=C.join(""),E=B.val();B.data(a.mask.dataName,function(){return a.map(C,function(a,b){return j[b]&&a!=p(b)?a:null}).join("")}),B.one("unmask",function(){B.off(".mask").removeData(a.mask.dataName)}).on("focus.mask",function(){if(!B.prop("readonly")){clearTimeout(b);var a;E=B.val(),a=A(),b=setTimeout(function(){B.get(0)===document.activeElement&&(z(),a==c.replace("?","").length?B.caret(0,a):B.caret(a))},10)}}).on("blur.mask",v).on("keydown.mask",w).on("keypress.mask",x).on("input.mask paste.mask",function(){B.prop("readonly")||setTimeout(function(){var a=A(!0);B.caret(a),h()},0)}),e&&f&&B.off("input.mask").on("input.mask",u),A()})}})});
!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e("object"==typeof exports?require("jquery"):jQuery)}(function(e){var t,n=navigator.userAgent,a=/iphone/i.test(n),i=/chrome/i.test(n),r=/android/i.test(n);e.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},e.fn.extend({caret:function(e,t){var n;if(0!==this.length&&!this.is(":hidden")&&this.get(0)===document.activeElement)return"number"==typeof e?(t="number"==typeof t?t:e,this.each(function(){this.setSelectionRange?this.setSelectionRange(e,t):this.createTextRange&&(n=this.createTextRange(),n.collapse(!0),n.moveEnd("character",t),n.moveStart("character",e),n.select())})):(this[0].setSelectionRange?(e=this[0].selectionStart,t=this[0].selectionEnd):document.selection&&document.selection.createRange&&(n=document.selection.createRange(),e=0-n.duplicate().moveStart("character",-1e5),t=e+n.text.length),{begin:e,end:t})},unmask:function(){return this.trigger("unmask")},mask:function(n,o){var c,l,u,f,s,g,h,m;if(!n&&this.length>0){c=e(this[0]);var d=c.data(e.mask.dataName);return d?d():void 0}return o=e.extend({autoclear:e.mask.autoclear,placeholder:e.mask.placeholder,completed:null},o),l=e.mask.definitions,u=[],f=h=n.length,s=null,n=String(n),e.each(n.split(""),function(e,t){"?"==t?(h--,f=e):l[t]?(u.push(new RegExp(l[t])),null===s&&(s=u.length-1),f>e&&(g=u.length-1)):u.push(null)}),this.trigger("unmask").each(function(){function c(){if(o.completed){for(var e=s;g>=e;e++)if(u[e]&&E[e]===d(e))return;o.completed.call(w)}}function d(e){return e<o.placeholder.length?o.placeholder.charAt(e):o.placeholder.charAt(0)}function p(e){for(;++e<h&&!u[e];);return e}function v(e){for(;--e>=0&&!u[e];);return e}function b(e,t){var n,a;if(!(0>e)){for(n=e,a=p(t);h>n;n++)if(u[n]){if(!(h>a&&u[n].test(E[a])))break;E[n]=E[a],E[a]=d(a),a=p(a)}S(),w.caret(Math.max(s,e))}}function k(e){var t,n,a,i;for(t=e,n=d(e);h>t;t++)if(u[t]){if(a=p(t),i=E[t],E[t]=n,!(h>a&&u[a].test(i)))break;n=i}}function y(e){var t=w.val(),n=w.caret();if(m&&m.length&&m.length>t.length){for(T(!0);n.begin>0&&!u[n.begin-1];)n.begin--;if(0===n.begin)for(;n.begin<s&&!u[n.begin];)n.begin++;w.caret(n.begin,n.begin)}else{var a=(T(!0),t.charAt(n.begin));n.begin<h&&(u[n.begin]?u[n.begin].test(a)&&n.begin++:(n.begin++,u[n.begin].test(a)&&n.begin++)),w.caret(n.begin,n.begin)}c()}function x(e){T(),w.val()!=D&&w.change()}function j(e){if(!w.prop("readonly")){var t,n,i,r=e.which||e.keyCode;m=w.val(),8===r||46===r||a&&127===r?(t=w.caret(),n=t.begin,i=t.end,i-n===0&&(n=46!==r?v(n):i=p(n-1),i=46===r?p(i):i),R(n,i),b(n,i-1),e.preventDefault()):13===r?x.call(this,e):27===r&&(w.val(D),w.caret(0,T()),e.preventDefault())}}function A(t){if(!w.prop("readonly")){var n,a,i,o=t.which||t.keyCode,l=w.caret();if(!(t.ctrlKey||t.altKey||t.metaKey||32>o)&&o&&13!==o){if(l.end-l.begin!==0&&(R(l.begin,l.end),b(l.begin,l.end-1)),n=p(l.begin-1),h>n&&(a=String.fromCharCode(o),u[n].test(a))){if(k(n),E[n]=a,S(),i=p(n),r){var f=function(){e.proxy(e.fn.caret,w,i)()};setTimeout(f,0)}else w.caret(i);l.begin<=g&&c()}t.preventDefault()}}}function R(e,t){var n;for(n=e;t>n&&h>n;n++)u[n]&&(E[n]=d(n))}function S(){w.val(E.join(""))}function T(e){var t,n,a,i=w.val(),r=-1;for(t=0,a=0;h>t;t++)if(u[t]){for(E[t]=d(t);a++<i.length;)if(n=i.charAt(a-1),u[t].test(n)){E[t]=n,r=t;break}if(a>i.length){R(t+1,h);break}}else E[t]===i.charAt(a)&&a++,f>t&&(r=t);return e?S():f>r+1?o.autoclear||E.join("")===C?(w.val()&&w.val(""),R(0,h)):S():(S(),w.val(w.val().substring(0,r+1))),f?t:s}var w=e(this),E=e.map(n.split(""),function(e,t){return"?"!=e?l[e]?d(t):e:void 0}),C=E.join(""),D=w.val();w.data(e.mask.dataName,function(){return e.map(E,function(e,t){return u[t]&&e!=d(t)?e:null}).join("")}),w.one("unmask",function(){w.off(".mask").removeData(e.mask.dataName)}).on("focus.mask",function(){if(!w.prop("readonly")){clearTimeout(t);var e;D=w.val(),e=T(),t=setTimeout(function(){w.get(0)===document.activeElement&&(S(),e==n.replace("?","").length?w.caret(0,e):w.caret(e))},10)}}).on("blur.mask",x).on("keydown.mask",j).on("keypress.mask",A).on("input.mask paste.mask",function(){w.prop("readonly")||setTimeout(function(){var e=T(!0);w.caret(e),c()},0)}),i&&r&&w.off("input.mask").on("input.mask",y),T()})}})});


    function createModal(clas){
        $('body').append('<div class="modal-bg" style="display:none;"></div><div class="modal '+clas+'" style="display:none;"><header><div class="icon close"><i class="fa fa-times"></i></div></header><div class="container"></div><footer><div class="button icon small close"><i class="fa fa-times"></i></div></footer></div>');
        $('.modal-bg').last().one('click',function(){
            $('.modal-bg').last().fadeOut(function(){ $(this).remove(); });
            $('.modal').last().fadeOut(function(){ $(this).remove(); });
        });
        
        $('.modal').last().find('.close').one('click',function(){
            $('.modal-bg').last().fadeOut(function(){ $(this).remove(); });
            $('.modal').last().fadeOut(function(){ $(this).remove(); });
        });
        
        return $('.modal').last().find('.container');
    }
    
    function initModal(modal){
            modal.find('h1').first().detach().appendTo(modal.find('header'));
            if(modal.find('form button').first().length)
            {    
                modal.find('form button').first().prependTo(modal.find('footer'));
                modal.find('footer button').on('click',function(){
                    modal.find('form').submit();
                })
            }

            modal.prev().fadeIn();
            modal.fadeIn();
            
           
            resizeModal();
             
           
            
    }
    
    function resizeModal(){
        $('.modal').each(function(){
            var modal=$(this);
            
            modal.find('.container').height(modal.outerHeight()-(modal.find('footer').outerHeight()+modal.find('header').outerHeight()));
        });
    }
    

    function ajaxForm(data, options){
        //console.log(options);
        //console.log(data);
   
        data=JSON.parse(data);
        //console.log(data);

        if(data.response=='form')
        {
            var modal_container=createModal('small');
            modal_container.html(data.content);
            var modal=modal_container.parent();
            initModal(modal);
            
            
            initForms(modal);
            //alert('a');
            $('form',modal).submit({options:options},function(event) {
                //console.log('submit');
                //console.log(event.data.options);
                //alert('b');
                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : $(this).attr('action'), // the url where we want to POST
                    data        : $(this).serialize(), // our data object
                    //dataType    : 'json', // what type of data do we expect back from the server
                    //encode          : true
                })
                .done(function(data) {
                    //alert('c');
                    //console.log(data); 
                    ajaxForm(data, event.data.options);
                });

                // stop the form from submitting the normal way and refreshing the page
                event.preventDefault();

            });
        }
        if(data.response=='error')
        {
            $('.modal-bg').last().click();
            
            var modal_container=createModal('small');
            modal_container.html(data.content);
            var modal=modal_container.parent();
            initModal(modal);
            
            
            initForms(modal);
            //alert('a');
            $('form',modal).submit({options:options},function(event) {
                //console.log('submit');
                //console.log(event.data.options);
                //alert('b');
                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : $(this).attr('action'), // the url where we want to POST
                    data        : $(this).serialize(), // our data object
                    //dataType    : 'json', // what type of data do we expect back from the server
                    //encode          : true
                })
                .done(function(data) {
                    //alert('c');
                    //console.log(data); 
                    ajaxForm(data, event.data.options);
                });

                // stop the form from submitting the normal way and refreshing the page
                event.preventDefault();

            });
        }
        if(data.response=='close')
        {
            $('.modal-bg').last().click();
            if(options.elementto && data.element) {
                search_name=options.elementto.parents('.field').find('.findoradd').attr('id')
                var ul=options.elementto;
                var ul_template=$('.'+search_name+' ul');   

                if(ul_template){
                    ul_template.append(data.element);
                    var element_template=ul_template.find('li').last();

                    var prev_template=ul_template.find("[data-id='" + element_template.data('id') + "']");
                    if(prev_template.length>1){
                        element_template=element_template.insertAfter(prev_template.first());
                        prev_template.first().remove();
                        //element_template.find('a.element').click();  
                    }
                }

                if(ul){
                    ul.append(data.element);
                    var element=ul.find('li').last();

                    var prev=options.elementto.find("[data-id='" + element.data('id') + "']");
                    if(prev.length>1){
                        element=element.insertAfter(prev.first());
                        prev.first().remove();
                        element.find('a.element').click();  
                    }
                    else element.find('a.element').click();
                }

            }
        }


    }



/*
autogrow.js - Copyright (C) 2014, Jason Edelman <edelman.jason@gmail.com>
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and 
associated documentation files (the "Software"), to deal in the Software without restriction, including 
without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
sell copies of the Software, and to permit persons to whom the Software is furnished to 
do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT
LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL 
THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF 
CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER 
DEALINGS IN THE SOFTWARE.
ArtGate Mod animate({height:s+20}
*/
;(function(e){e.fn.autogrow=function(t){function s(n){var r=e(this),i=r.innerHeight(),s=this.scrollHeight,o=r.data("autogrow-start-height")||0,u;if(i<s){/*expand*/ this.scrollTop=0;t.animate?r.stop().animate({height:s+20},t.speed):r.innerHeight(s+20)}else if(!n||n.which==8||n.which==46||n.ctrlKey&&n.which==88){if(i>o){u=r.clone().addClass(t.cloneClass).css({position:"absolute",zIndex:-10,height:""}).val(r.val());r.after(u);do{s=u[0].scrollHeight-1;u.innerHeight(s)}while(s===u[0].scrollHeight);s++;u.remove(); /*alert(r.css('width'));*/ r.focus();s<o&&(s=o);i>s&&t.animate?r.stop().animate({height:s+20},t.speed):r.innerHeight(s+20); /*condens*/ }else{r.innerHeight(o)}}}var n=e(this).css({overflow:"hidden",resize:"none"}),r=n.selector,i={context:e(document),animate:true,speed:200,fixMinHeight:true,cloneClass:"autogrowclone",onInitialize:false};t=e.isPlainObject(t)?t:{context:t?t:e(document)};t=e.extend({},i,t);n.each(function(n,r){var i,o;r=e(r);if(r.is(":visible")||parseInt(r.css("height"),10)>0){i=parseInt(r.css("height"),10)||r.innerHeight()}else{o=r.clone().addClass(t.cloneClass).val(r.val()).css({position:"absolute",visibility:"hidden",display:"block"});e("body").append(o);i=o.innerHeight();o.remove()}if(t.fixMinHeight){r.data("autogrow-start-height",i)}r.css("height",i);if(t.onInitialize&&r.length){s.call(r[0])}});t.context.on("keyup paste",r,s);return n}})(jQuery);


    $.ajaxSetup ({
        // Disable caching of AJAX responses
        cache: false
    });

    $(function() {

        
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
        	$(input).parent().find('img').remove();
        	$(input).parent().next().find('img').remove();
        	$(input).parent().append('<img style="max-width:100%; border: 1px solid #CCD; margin-bottom:20px; margin-top:20px;" src="'+e.target.result+'">');
        	//$(input).parent().next().append('<img style="max-width:300px;" src="'+e.target.result+'">');
        	//alert('<img src="'+e.target.result+'">');
        	//$('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
          }else{
        
          }
        }
        
        $("input[type=file]").change(function() {
          readURL(this);
        });

        $('.longdescription-show').click(function(e){
            //$('.longdescription').removeClass('hidden');
            //$('.longdescription').css('height','auto'); 
            $('.longdescription').slideDown(function(){$(this).css('display', 'block');});
            
            $(this).hide();
            e.preventDefault();
            $('.longdescription-hide').show();
        });
        
        $('.longdescription-hide').hide();

        $('.longdescription-hide').click(function(e){
            $(this).hide();
            
            $('.longdescription').removeClass('hidden');
            $('.longdescription').slideUp();
            $(this).hide();
            e.preventDefault();
            
            $('.longdescription-show').show();
        });

        

        $('.getdateandcity').click(function(e){
            
            document.location=$(this).attr('href')+'&city='+$(this).parent().find('[name=city]').val()+'&date='+$(this).parent().find('[name=date]').val();
            
            e.preventDefault();
        });

        $('.badge-link .badge').click(function(e){
            
            document.location=$(this).parent().data('badge-link');
            e.preventDefault();
        });
        $('textarea').autogrow({fixMinHeight:true});
        $('textarea').trigger('keyup');
      
        $('input[data-placeholder]').each(function(){
            if($(this).val()=='') $(this).val($(this).data('placeholder')  );
        });
        $('input[data-placeholder]').focus(function(){
            if($(this).val()==$(this).data('placeholder')) $(this).val('');
        });
        $('input[data-placeholder]').blur(function(){
            if($(this).val()=='') $(this).val($(this).data('placeholder'));
        });
       

        var delay = (function(){
          var timer = 0;
          return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
          };
        })();
        if($('.orderform input').length){
            
        $('.orderform input').keyup(function(e){
        
            
            
            var search=$(this);
            var name=$(this).attr('name');
            var val=$(this).val();
            var id=$(this).data('product');
            
            if(search.data('prev')!=search.val()){
            
             search.parent().find('.result').html('');
             
             delay(function(){
                 if(search.val()!='')    
                 {
                     $.ajax({
                       url: '?'+name+'='+val+'&product_id='+id,
                     })
                     .done(function( data ) {
                       search.parent().find('.result').html(data);
                       preapareContent(search.parent().find('.result'));
                     });
                 }
                 search.data('prev',search.val());
             }, 500 );

            }

        });
        if($('.orderform input').val()!='')
            $('.orderform input').keyup();
        }
        

        $('.top input[name=search]').keyup(function(e){
           var search=$(this);
           
           if(search.data('prev')!=search.val()){
            
            delay(function(){
                if(search.val()!='')    
                {
                    
                    $.ajax({
                      url: search.data('url')+'?'+search.attr('name')+'='+search.val(),
                      beforeSend: function( xhr ) {
                      }
                    })
                    .done(function( data ) {
                     
                      search.parent().parent().find('.result .inner').html(data);
                      
                      if($('.top .inner')[0].scrollHeight > ($(window).height()-($('.top .inner').offset().top - $(window).scrollTop())-50)  ){
                          $('.top .inner').css('max-height',($(window).height()-($('.top .inner').offset().top - $(window).scrollTop())-50)+'px' ).css('padding-right','20px');
                      }else{
                          $('.top .inner').css('max-height','none').css('padding-right','0');
                      }
                      
                    });

                }

                search.data('prev',search.val());
            }, 500 );

           }

        });

        $(window).bind("load", function() {
            
                function hashGo(){
                        
                      if($('.homepage').length>0){
                          $('a[href*=#]').on('click', function(event){     
                              
                              var href = $.attr(this, 'href');
                              
                              if(href!='#')
                              if ( /(#.*)/.test(href) ){
                                  var hash = href.match(/(#.*)/)[0];
                                  var path = href.match(/([^#]*)/)[0];
                                  
                                  //alert(this.hash);
                                  if(this.hash==''){
                                    event.preventDefault();  
                                    $('html,body').animate({scrollTop:0 }, 500 , function(){});
                                  } 
                                  else
                                  if($(this.hash).length){
                                  $('html,body').animate({scrollTop:$(this.hash).offset().top-$('.top').height() }, 500 , function(){
                                      window.location.hash = hash;   
                                  });
                                  event.preventDefault();
                                  }
                              }
                          });
                      }else{
                          $('a[href*=#]').on('click', function(event){     
                              var href = $.attr(this, 'href');
                              
                              if(href!='#')
                              if ( /(#.*)/.test(href) ){
                                  var hash = href.match(/(#.*)/)[0];
                                  var path = href.match(/([^#]*)/)[0];
                                  
                                  
                                  //alert(this.hash);
                                  if(this.hash==''){
                                    event.preventDefault();  
                                    $('html,body').animate({scrollTop:0 }, 500 , function(){});
                                  }  
                                  else
                                  if($(this.hash).length){
                                  $('html,body').animate({scrollTop:$(this.hash).offset().top-$('.top').height() }, 500 , function(){
                                      window.location.hash = hash;   
                                  });
                                  event.preventDefault();
                                  }
                              }
                          });
                      }
                      
                      if(href!='#')
                      if($('.homepage').length>0){          
                          var href=document.location+'';

                          if ( /(#.*)/.test(href) ){
                              var hash = href.match(/(#.*)/)[0];
                              var path = href.match(/([^#]*)/)[0];
                              setTimeout(function() {

                                  //window.scrollTo(0, 0);
                                  if($(hash).length)
                                  $('html,body').animate({scrollTop:$(hash).offset().top-$('.top').height() }, 0 , function(){

                                      //alert(hash);
                                      //window.location.hash = hash;   
                                  });
                              }, 0);
                          }
                      }else{


                          var href=document.location+'';
                          if ( /(#.*)/.test(href) ){
                              var hash = href.match(/(#.*)/)[0];
                              var path = href.match(/([^#]*)/)[0];
                              setTimeout(function() {

                                  //window.scrollTo(0, 0);
                                  if($(hash).length)
                                  $('html,body').animate({scrollTop:$(hash).offset().top-$('.top').height()-20 }, 0 , function(){

                                      //alert(hash);
                                      //window.location.hash = hash;   
                                  });
                              }, 0);
                          }   
                      }
                }  


                function boxes(){
                    $('.boxes').each(function(){
                        var height=0;
                        $(this).find('.box').height('auto');
                        $(this).find('.box').each(function(){
                            //console.log($(this).height());
                            if($(this).height()>height) height=$(this).height();
                        })
                        //console.log(' '+height);
                        $(this).find('.box').height(height); 
                    });
                }

                boxes();
                hashGo();
                
                $('.top .main .nav ul').css('max-height',( $(window).height()-$('.top').height() )+'px');
                
                if($('.right-navigation').length){
                    if($('.right-navigation').css('display')!='none'){
                       $('.right-navigation').parent().css('min-height',($('.right-navigation').height()+$('.notifications').height()+120+$('h1').first().height())+'px'); 
                    }else{
                       $('.right-navigation').parent().css('min-height', 'auto');
                    }
                }
                    
                $( window ).resize(function() {

                    if($('.modal').length){
                       resizeModal();    
                    }
                    
                    if($('.right-navigation').length){
                        if($('.right-navigation').css('display')!='none'){
                           $('.right-navigation').parent().css('min-height',($('.right-navigation').height()+120+$('h1').first().height())+'px'); 
                        }else{
                           $('.right-navigation').parent().css('min-height', 'auto');
                        }
                    }

                    $('.top .main .nav ul').css('max-height',( $(window).height()-$('.top').height() )+'px');
                    
                    //console.log($(window).height()+' - '+$('.top').height());
                    /*
                    if($('.top .main .nav ul')[0].scrollHeight > ($(window).height()-($('.top .inner').offset().top - $(window).scrollTop())-80)  ){
                        //console.log('not ok' );
                        $('.top .main .nav ul').css('max-height',($(window).height()-($('.top .inner').offset().top - $(window).scrollTop())-80)+'px' );
                    }else{
                        //console.log('ok' );
                        $('.top .main .nav ul').css('max-height','none').css('padding-right','0');
                    }
                    */
                    
                      if($('.top .inner')[0].scrollHeight > ($(window).height()-($('.top .inner').offset().top - $(window).scrollTop())-50)  ){
                          $('.top .inner').css('max-height',($(window).height()-($('.top .inner').offset().top - $(window).scrollTop())-50)+'px' ).css('padding-right','20px');
                      }else{
                          $('.top .inner').css('max-height','none').css('padding-right','0');
                      }
                    
                    

                    boxes();
                });     
        });   
      
            
        if ($(".triggerAnimation")[0]) {
            $('.triggerAnimation').css('opacity', '0');
        }
        var offset=80;
        $('.triggerAnimation').waypoint(function() {
            var animation = $(this).attr('data-animate');
            $(this).css('opacity', '1');
            $(this).addClass("animated " + animation);
            $(this).trigger('animating');
            var offset=80;

        },
                {
                    offset: '85%',
                    triggerOnce: false
                }
        );


        $('.triggerMany').waypoint(function(event,direction) {
            //console.log(direction);
            if (direction === 'down') {
                var animation = $(this).data('animate');
                $(this).css('opacity', '1');
                $(this).addClass("animated " + animation);
                $(this).trigger('animating');
                var offset=80;
            }

        },
                {
                    offset: 'bottom-in-view',
                    triggerOnce: false
                }
        );
    
        $('.triggerMany').on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass($(this).data('animate'));
        });
        
        

        if (window.location.hash && window.location.hash == '#_=_') {
            if (window.history && history.pushState) {
                window.history.pushState("", document.title, window.location.pathname);
            } else {
                // Prevent scrolling by storing the page's current scroll offset
                var scroll = {
                    top: document.body.scrollTop,
                    left: document.body.scrollLeft
                };
                window.location.hash = '';
                // Restore the scroll offset, should be flicker free
                document.body.scrollTop = scroll.top;
                document.body.scrollLeft = scroll.left;
            }
        }
        
        
        
        
        
        
        
        $( window ).scroll(function() {
            var height=100;
            if($('.homepage').length>0) height=400;
                
            
            if($(window).scrollTop() > height) {
                $('.top .main').addClass('dark');
            } else {
                $('.top .main').removeClass('dark');
            }
            
            if($(window).scrollTop()<50){
                $('.up').hide();
            }
            else{
               $('.up').show(); 
            }
        });
        
        
        $('.nav .ico.navmobile').click(function(){
            $('.nav ul').toggle();
        });
        
        if($('.intro video').length && $( window ).width()>1050) {
            
            $('.intro video').attr('autoplay',true).attr('preload','auto');
            
            $('.intro video').get(0).load();
            $('.intro video').get(0).play();
        }
        
        if($('.intro video').length && $( window ).width()<645) {   
            $('.intro video').attr('poster','');
        }
        

        //$('.tab-pane').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){ $(this).removeClass('fadeInLeft'); if($(this).hasClass('fadeOutRight')) $(this).removeClass('fadeOutRight'); });


        $('ul.translation-locales').on('click', 'a', function(evt) {
            evt.preventDefault();

            //$('.tab-pane.active').addClass('fadeOutRight');
            var target = $(this).attr('data-target');
            $('li:has(a[data-target="' + target + '"]), div' + target, 'div.translation').addClass('active').siblings().removeClass('active');


        });

        $('div.translation-locales-selector').on('change', 'input', function(evt) {
            var $tabs = $('ul.translation-locales');

            $('div.translation-locales-selector').find('input').each(function() {
                $tabs.find('li:has(a[data-target=".translation-fields-' + this.value + '"])').toggle(this.checked);
            });

            $('ul.translation-locales li:visible:first').find('a').trigger('click');
        }).trigger('change');
    });

    var map=new Array();
    var marker=new Array();
    var map_number=0;
    var geocoder = new google.maps.Geocoder();
    
    function positionChanged(position,form){
        console.log(position.lat());
        console.log(position.lng());
        console.log('');
        form.find('.latitude').val(position.lat());
        form.find('.longitude').val(position.lng());
    }


    function codeAddress(address,map,marker,form) {

      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
          map.setZoom(15);
          marker.setPosition(results[0].geometry.location);
          positionChanged(results[0].geometry.location,form);

        } else return false;  

      });
    }
    var circle;
    
    function browserAddress(map,marker,form) {
        if (navigator.geolocation) {
          var options = {
              enableHighAccuracy: true,
              timeout: 600000,
              maximumAge: 0
          };
          //watchPosition
          //getCurrentPosition
          var watchId=navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            //alert(position.coords.accuracy);
            
            map.setCenter(pos);
            map.setZoom(15);
            
            marker.setPosition(pos);
            positionChanged( marker.getPosition(),form);
            //infoWindow.setPosition(pos);
            //infoWindow.setContent('Location found.');
            //map.setCenter(pos);
            if(circle)
            circle.setMap(null);
            
            circle = new google.maps.Circle({
                center: marker.getPosition(),
                radius: position.coords.accuracy,
                map: map,//your map,
                strokeColor: '#006cff',
                strokeOpacity: 0.45,
                strokeWeight: 0.5,
                fillColor: '#006cff',
                fillOpacity: 0.25,
            });

            //set the zoom level to the circle's size
            map.fitBounds(circle.getBounds());
            
            
            form.find('.mapdefault').hide();
            form.find('.mapsuccess').show();
            form.find('.maperror').hide();
            form.find('.mapwarning').hide();
            form.find('.mapwait').hide();
            
            
          }, function() {
              
            form.find('.mapdefault').hide();
            form.find('.mapsuccess').hide();
            form.find('.maperror').hide();
            form.find('.mapwarning').show();
            form.find('.mapwait').hide();
            //handleLocationError(true, infoWindow, map.getCenter());
          }, options);
        } else {
            
            form.find('.mapdefault').hide();
            form.find('.mapsuccess').hide();
            form.find('.maperror').show();
            form.find('.mapwarning').hide();
            form.find('.mapwait').hide();
          //Browser doesn't support Geolocation
          //handleLocationError(false, infoWindow, map.getCenter());
        }
    }
    
    
    function initForms(container){
        container.find('textarea.tags').hide();
        container.find('textarea.tags').tagEditor({
//            autocomplete: {
//                delay: 0, // show suggestions immediately
//                position: { collision: 'flip' }, // automatic menu position up/down
//                source: ['ActionScript', 'AppleScript', 'Asp', 'Python', 'Ruby']
//            },
            sortable: true,
            
            forceLowercase: false,

        });
        
        container.find('.localisation').each(function(){
            map_number=map_number+1;
            
            var form=$(this).parents('form');
            var lat=form.find('.latitude');
            var lng=form.find('.longitude');
            
            $(this).data('number',map_number);
            form.data('number',map_number);
            
            
            $(this).find('.insert-map').parent().prepend('<div class="map"></div>');
            

                
            var latlng = new google.maps.LatLng(52.17393169256846,19.434814453125);
            var options = { zoom: 5, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP };
            map[map_number] = new google.maps.Map(form.find('.map')[0], options); 

            marker[map_number] = new google.maps.Marker(
            {
                map:map[map_number],
                draggable:true,
                animation: google.maps.Animation.DROP,
            });

            with ({ marker: marker[map_number], map: map[map_number], form:form }) {
      
                google.maps.event.addListener(marker, 'dragend', function() 
                {
                    positionChanged(marker.getPosition(), form);
                });

                google.maps.event.addListener(map, 'click', function(event) {
                    marker.setPosition(event.latLng);
                    positionChanged(event.latLng, form);
                });
                
                if(form.find('.country,.city,.address').length)
                form.find('.country,.city,.address').change(function(){
                    var form=$(this).parents('form');
                    codeAddress(form.find('.country option:selected').text()+' '+form.find('.city').val()+' '+form.find('.address').val(),map,marker, form);
                    console.log(form.find('.country option:selected').text()+' '+form.find('.city').val()+' '+form.find('.address').val());
                });
            
                form.find('.latitude,.longitude').change(function(){
                  var latlng = new google.maps.LatLng(lat.val(),lng.val());  
                  marker.setPosition(latlng);
                  map.setCenter(latlng);  
                });

                if(lat.val() && lng.val()){
                  var latlng = new google.maps.LatLng(lat.val(),lng.val());  
                  marker.setPosition(latlng);
                  map.setCenter(latlng);
                  map.setZoom(15);
                }else{
                    //form.find('.country').change();
                }
                if(form.find('.getlocalisation').length){
                   form.find('.getlocalisation').click(function(event){
                       
                        form.find('.mapdefault').hide();
                        form.find('.mapsuccess').hide();
                        form.find('.maperror').hide();
                        form.find('.mapwarning').hide();
                        form.find('.mapwait').show();

                       browserAddress(map,marker,form);
                       event.preventDefault();
                   });  
                }
                
            }



            
        });
        
        
        ;(function($){
            $.fn.datepicker.dates['pl'] = {
                days: ["niedziela", "poniedziałek", "wtorek", "środa", "czwartek", "piątek", "sobota"],
                daysShort: ["niedz.", "pon.", "wt.", "śr.", "czw.", "piąt.", "sob."],
                daysMin: ["ndz.", "pn.", "wt.", "śr.", "czw.", "pt.", "sob."],
                months: ["styczeń", "luty", "marzec", "kwiecień", "maj", "czerwiec", "lipiec", "sierpień", "wrzesień", "październik", "listopad", "grudzień"],
                monthsShort: ["sty.", "lut.", "mar.", "kwi.", "maj", "cze.", "lip.", "sie.", "wrz.", "paź.", "lis.", "gru."],
                today: "dzisiaj",
                weekStart: 1,
                clear: "wyczyść",
                format: "dd.mm.yyyy"
            };
        }(jQuery));
        
        container.find('.datepicker').datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            language: 'pl'
        });
        
//        container.find(".button, button, label").addClass('rippler').addClass('rippler-default');
//        container.find(".button, button, label").rippler({
//          effectClass      :  'rippler-effect'
//          ,effectSize      :  0      // Default size (width & height)
//          ,addElement      :  'div'   // e.g. 'svg'(feature)
//          ,duration        :  400
//        });
        
        
        //container.find('.dateselect').mask("9999-99-99",{placeholder:"____-__-__"});
        container.find('.dateselect').mask("9999-99-99",{placeholder:"____-__-__"});
        container.find('.postalcode').mask("99-999",{placeholder:"__-___"});
        if($('body').data('language')=='pl')
        container.find('.phone').attr('autocomplete','off').mask("+48.999999999",{placeholder:"+48._________"});
        
        container.find('input[type=file]').each(function(){

            
            $(this).parent().append('<div class="file field"><input readonly="true" type="text" value=""></div>');
            $(this).on('change',function(){
                var filePath     = $(this).val();
                // check for IE's lovely security speil
                if(filePath.match(/fakepath/)) {
                    // update the file-path text using case-insensitive regex
                   filePath = filePath.replace(/C:\\fakepath\\/i, '');
                } 
               $(this).parent().find('input[type=text]').val(filePath);
            })
        });
        
        
        container.find('select').each(function(){
           
            var source = $(this);
            var selected = source.find("option[selected]"); 
            var options = $("option", source);  

            var text ='';        
            $(this).find('option:selected').each(function(){
                text=$(this).html()+', '+text
            });
            if(text!='') text=text.slice(0,-2);

            source.parent().append('<dl  class="dropdown dd-hidden"></dl>')
            source.parent().find('dl').append('<dt><span class="caret">▼</span><input readonly="true" type="text" value="'+ text +'"></dt>')
            source.parent().find('dl').append('<dd><ul></ul></dd>')

            options.each(function(){
                var clas=''
                //if(selected.text()==$(this).text()) clas=' class="active" ';
                if($(this).val())
                if($(this).parent().find('option[value='+$(this).val()+']:selected').length) clas=' class="selected" '; 
                //if($(this).text()=='') $(this).html('')
                source.parent().find('ul').append('<li><a href="#" data-value="'+$(this).val()+'" '+clas+'>' + $(this).text() + '</a></li>');
            });


            $(this).bind('change',function(){
                $(this).parent().find('input').val($(this).find('option:selected').html());
                return true;
            });
        });
        
        function dropdownHide(element){
            element.parents('.dropdown').addClass('dd-hidden');
            //element.parents('.dropdown').find('input').attr('readonly',true);
            $(window).unbind('keydown');
            element.hide();
        }

        function dropdownShow(element){
            element.parents('.dropdown').removeClass('dd-hidden');
            //element.parents('.dropdown').find('input').first().attr('readonly',false);
            
            element.show();
            
            element.parents('.dropdown').find('input').first().focus();
            
            if(!element.parents('.dropdown').find('ul li a.active').length){
                element.parents('.dropdown').find('ul li a').first().addClass('active');
            }
            
            element.parents('.dropdown').keydown({element:element},function(e) {
               var key = e.which;
               var element=e.data.element;
               var char=String.fromCharCode(e.keyCode);
               console.log(char+' '+key);
               
               var e=false;
               
               if(key==13){
                   element.parents('.dropdown').find('ul li a.active').click();
                   return false;
               }
               if(key==38){
                   e=element.parents('.dropdown').find('ul li a.active').parent().prev().find('a');
               }
               if(key==40){
                   e=element.parents('.dropdown').find('ul li a.active').parent().next().find('a');
               } 
             
               var match=element.parents('.dropdown').find('ul li a').filter(function() { return $(this).text().toLowerCase().indexOf(char.toLowerCase()) === 0; });//.css('background-color','red');
               
               if(match.length>0){
                    var active=match.filter(function() { return $(this).hasClass('active'); });
                    if(active.length){
                        e=active.first().parent().next().find('a').filter(function() { return $(this).text().toLowerCase().indexOf(char.toLowerCase()) === 0; });
                        if(e.length==0) e=match.first();
                        
                    }else{
                        e=match.first();
                    }
               }
               
               if(e.length){
                    element.parents('.dropdown').find('ul li a.active').removeClass('active');
                    e.addClass('active');
                    
                    var parentTop=element.parents('.dropdown').find('ul').offset().top;
                    var eTop=e.position().top;
                    var scrollTop=eTop+element.parents('.dropdown').find('ul').scrollTop()-((element.parents('.dropdown').find('ul').height()/2)-15);
        
                    element.parents('.dropdown').find('ul').animate({
                         scrollTop: scrollTop
                    }, 0);   
               }
               
                
               if(key==38){
                   return false;
               }
               if(key==40){
                   return false;
               } 

            });
            
        }
        
        container.find(".dropdown dt input").keyup(function(){
            
        });
        
        
        container.find(".dropdown dt input").click(function() {
            if($(this).parents('.dropdown').hasClass('dd-hidden'))
            dropdownShow($(this).parents('.dropdown').find('ul'));
            else
            dropdownHide($(this).parents('.dropdown').find('ul'));    
            
            var it=$(this).parents('.dropdown').find('ul');
            $('.dropdown dd ul').each(function(){
                if($(this)[0]!=it[0]) dropdownHide($(this));
            });
            
            
            //return false;
        });
        
        container.find(".dropdown dd ul li a").on('click',function(event) {
            
            if($(this).parents('.dropdown').parent().find('select').attr('multiple')!='multiple' || !event.ctrlKey) 
                $(this).parent().parent().find('a.selected').removeClass('selected');


            if($(this).parents('.dropdown').parent().find('select').attr('multiple')!='multiple')
            dropdownHide($(this).parents('.dropdown').find('ul'));
            
            
            if($(this).parents('.dropdown').parent().find('select').attr('multiple')=='multiple' && event.ctrlKey) 
            {
                var set=true;
                if($(this).hasClass('selected') ) {set=false; $(this).removeClass('selected'); }
                else $(this).addClass('selected');
                
                $(this).parents('.dropdown').parent().find('select option[value=' + $(this).data('value') + ']').attr('selected', set);
               
               
            }
            else
            {
                if($(this).parents('.dropdown').parent().find('select').attr('multiple')!='multiple' || !event.ctrlKey) 
                $(this).parents('.dropdown').parent().find('select').val($(this).data('value'))    
                else    
                $(this).parents('.dropdown').parent().find('select option[value=' + $(this).data('value') + ']').attr('selected', true);
                
                $(this).addClass('selected'); 
            }
            
            $(this).parents('.dropdown').parent().find('select').change();
            
            var text ='';        
            $(this).parents('.dropdown').parent().find('select option:selected').each(function(){
                text=$(this).html()+', '+text
            });
            if(text!='') text=text.slice(0,-2);
            $(this).parents('.dropdown').find('dt input').val(text); 
            
            
            //$(this).parents('.dropdown').parent().find('select').val($(this).data('value'))
            //return false;
            event.preventDefault();
        });
        
        //fix iphone background click
        /iP/i.test(navigator.userAgent) && $('*').css('cursor', 'pointer');
        
        $(document).bind('click', function(e) {
            var $clicked = $(e.target);
            if ($clicked.hasClass("modal-bg") ){ //$clicked.parents().hasClass("modal")
                return true;  
            }
            
            
            
            if (! $clicked.parents().hasClass("navmobile") && ! $clicked.hasClass("navmobile") && $('.ico.navmobile').css('display')!='none' )
            //if (! $clicked.parents().hasClass(".nav ul")){
                $('.nav ul').hide();
                
            //}
            
            if ( !$clicked.parents().hasClass('bg') && !$clicked.parents().hasClass('result') && !$clicked.hasClass('result') ){
                $('.top .result').fadeOut();
            }else{
               if ( $clicked.parents().hasClass('bg') ){
                $('.top .result').fadeIn();
               }
            }
            
          
          
            
            if (! $clicked.parents().hasClass("dropdown")){
                
                //console.log('click outside dropdown');
                $(".dropdown dd ul").each(function(){
                           dropdownHide($(this)); 
                });
            

            }//else  console.log('click inside dropdown');
            
            if (! $clicked.parents().hasClass("search-result")){
                
                //console.log('click outside search-result');
                $(".search-result dd ul").each(function(){
                           searchHide($(this));
                    
                });
            }//else  console.log('click inside search-result');    
        });
        
        function searchHide(obj){
            obj.hide();
            var search=obj.parents('.field').first().find('.findoradd')
            var object=$('#'+search.data('object')+'');
            var id=$('#'+search.data('id')+'');
            //alert(object.val());
            if(object.val()!=''){
                //console.log(object.val());
                var search_name=search.attr('id');
                var ul=search.parent().find('ul').first();
                var ul_template=$('.'+search_name+' ul');
                
                var object_data=JSON.parse(object.val());  
                obj.parents('dl').find('dt input').val(object_data.name).data('prev',object_data.name).keyup();
                ul.html(ul_template.html())
                
                if(id.val())
                ul.find('li').each(function(){
                   if($(this).data('id')==id.val()) $(this).find('a.element').addClass('selected'); 
                });
                
            }
        }
        
        function searchShow(obj){
            obj.show();  
        }
        
        //ajaxForm and modal previously
        
        container.find('.findoradd').each(function(){
           var id_name=$(this).data('id');
           var object_name=$(this).data('object');
           var search_name=$(this).attr('id');
           var id=$('#'+id_name+'');
           var object=$('#'+object_name+'');
           var search=$('#'+search_name+'');
           var copy=$(this).parent().html();
           

           search.parent().append('<dl  class="search-result dd-hidden"></dl>')
           search.parent().find('dl').append('<dt><input type="text" title="'+search.attr('title')+'"   class="'+search.attr('class')+'" value=""></dt>')
           search.parent().find('dl').append('<dd><ul></ul></dd>')
           
           var ul=search.parent().find('ul').first();
           var ul_template=$('.'+search_name+' ul');
           
           ul.html( ul_template.html() );
           
           search.hide();
           
            if(object.val()!=''){
                var object_data=JSON.parse(object.val());  
                $(this).parents('.field').first().find('dt input').val(object_data.name);
            }
           
           
           var obj=search.parent().find('dt input');
           
           obj.focus(function(e){
               searchShow($(this).parents('.search-result').find('ul'));
               $(this).keyup();
               
               var it=$(this).parents('.search-result').find('ul');
               $('.search-result dd ul').each(function(){
                    if($(this)[0]!=it[0]) searchHide($(this));
               });
               
               //console.log('show');
           });
           
           obj.blur(function(){
               //searchHide($(this).parents('.search-result').find('ul'));
               //console.log('blur');
           });
           
           obj.data('prev',obj.val());
           



            var delay = (function(){
              var timer = 0;
              return function(callback, ms){
                clearTimeout (timer);
                timer = setTimeout(callback, ms);
              };
            })();
           
           obj.keyup({search_name:search_name, ul:ul, ul_template:ul_template, id:id}, function(e){
               
              var search=$(this);
              
              if($(this).val()!='')
              $(this).parents('dl').find('.add .name').html('"'+obj.val()+'"');
              else 
              $(this).parents('dl').find('.add .name').html(''); 
              
              if($(this).data('prev')!=$(this).val()){

                    delay(function(){

                        if(search.val()!='')    
                        {

                            $.ajax({
                              url: updateQueryString(e.data.search_name,search.val(),window.location.search),
                              //dataType    : 'json',
                              beforeSend: function( xhr ) {
                                //xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
                              }
                            })
                            .done(function( data ) {
                              //console.log(data);
                              e.data.ul.find('li.element').remove();  
                              e.data.ul.append(data);
                              if(e.data.id.val())
                              e.data.ul.find('li').each(function(){
                                 if(search.data('id')==e.data.id.val()) search.find('a.element').addClass('selected'); 
                              });

                            });


                        }

                        search.data('prev',search.val());

                    }, 500 );   

              }
              
           });
           
           if(id.val())
           obj.parents('dl').find('ul li').each(function(){
              if($(this).data('id')==id.val()) $(this).find('a.element').addClass('selected'); 
           });
           
           //obj.parents('dl').find('ul a').on('click',function(e){
           obj.parents('dl').first().on('click' ,'ul a', function(e){
           //obj.parents('dl').find('ul a').on( 'click', obj.parents('dl'), function(e){   
           //obj.parents('dl').on( "click", "ul a", function() {    
               if($(this).parent().find('textarea').length)
               {    
                var object_data=JSON.parse($(this).parent().find('textarea').html());  
               }
               var list=$(this).parents('ul').first();
               var search=$(this).parents('.field').first().find('.findoradd')
               var object=$('#'+search.data('object')+'');
               var id=$('#'+search.data('id')+'');
               //console.log(object);
               
               if($(this).hasClass('add') || $(this).hasClass('edit')){
                   
                   
                    $.ajax({
                      url: $(this).attr('href'),
                      //dataType    : 'json',
                      beforeSend: function( xhr ) {
                        //xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
                      }
                    })
                    .done(function( data ) {
                      //if ( console && console.log ) {
                      //   console.log( "Sample of data:", data.slice( 0, 100 ) );
                      //}
                      //data='Test';
                      ajaxForm(data, { elementto: list });
                    });
                   
                    e.preventDefault();
               }
               else{
                $(this).parents('dl').find('dt input').val(object_data.name);
                
                //alert($(this).parent().find('textarea').html());
                
                object.val($(this).parent().find('textarea').html());
                object.change();
                id.val(object_data.id);

                searchHide($(this).parents('.search-result').find('ul'));
                
                $(this).parents('.search-result').find('a.element').removeClass('selected');
                $(this).addClass('selected');
               }
               
               
               
               e.preventDefault();
               //return false;
           });
           
           
        });
    }
 
 
(function ( $ ) {
            

            $.fn.multify = function( options ) {

                var settings = $.extend({
                    name: "Dodaj element",
                }, options );

                var $collectionHolder=this;
                var $addTagLink = $('<a href="#" class="add_tag_link">'+settings.name+'</a>');
                var $newLinkLi = $('<li></li>').append($addTagLink);

                $collectionHolder.append($newLinkLi);

                // count the current form inputs we have (e.g. 2), use that as the new index when inserting a new item (e.g. 2)
                //$collectionHolder.data('index', $collectionHolder.find(':input').length);
                $collectionHolder.data('index', $collectionHolder.find('li').length-1);

                $addTagLink.on('click', function(e) {
                    // prevent the link from creating a "#" on the URL
                    e.preventDefault();
                    // add a new tag form (see next code block)
                    $.fn.multify.addForm($collectionHolder, $newLinkLi);
                }); 
            };

            $.fn.multify.addForm = function( $collectionHolder, $newLinkLi ) {
                // Get the data-prototype explained earlier
                var prototype = $collectionHolder.data('prototype');
                // get the new index
                var index = $collectionHolder.data('index');
                // Replace '__name__' in the prototype's HTML to
                // instead be a number based on how many items we have
                var newForm = prototype.replace(/__name__/g, index);
                // increase the index with one for the next item
                $collectionHolder.data('index', index + 1);
                // Display the form in the page in an li, before the "Add a tag" link li
                var $newFormLi = $('<li></li>').append(newForm);
                $newLinkLi.before($newFormLi);
            }

}( jQuery ));


jQuery.fn.center = function () {
    this.css("position","absolute");
    if(((($(window).height() - this.outerHeight()) / 2) + $(window).scrollTop()>10))
    this.css("top", (($(window).height() - this.outerHeight()) / 2) + $(window).scrollTop() + "px");
    else
    this.css("top", "10px");    
    this.css("left", (($(window).width() - this.outerWidth()) / 2) + $(window).scrollLeft() + "px");
    return this;
}

jQuery.fn.centerHorizontal = function () {
    this.css("position","absolute");
    //alert($(window).width()+" - "+this.outerWidth());
    this.css("left", (($(window).width() - this.outerWidth()) / 2)  + "px");
    if((($(window).width() - this.outerWidth()) / 2)<0)  this.css("left", "0px");

    return this;
}

jQuery.fn.centerIn = function () {
    this.css("position","absolute");
    if(((($(window).height() - this.outerHeight()) / 2) + $(window).scrollTop()>10))
    this.css("top", (($(window).height() - this.outerHeight()) / 2) + $(window).scrollTop() + "px");
    else
    this.css("top", "10px");    
    this.css("left", (($('#cms-panel').outerWidth()-this.outerWidth()) / 2) + "px");
     
    return this;
}

jQuery.fn.outerHtml = function(s) {
    return s
        ? this.before(s).remove()
        : jQuery("<p>").append(this.eq(0).clone()).html();
};


function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function ajaxEnd(){
  //$('.prettyLoader').hide();
}

function preapareContent(content){
   $('.gallery').lightGallery({
    thumbnail:false,
    //videoAutoplay : false,  
    //autoplay:true,
    preload: 3,
    download: false,
    }); 
    
   $('.drop-wrapper').lightGallery({
    thumbnail:false,
    videoAutoplay : false,  
    //autoplay:true,
    preload: 3,
    selector: '.zoom a',
    download: false,
    }); 
    
   $('.widget').lightGallery({
    thumbnail:false,
    videoAutoplay : false,  
    //autoplay:true,
    preload: 3,
    selector: '.zoom a',
    download: false,
    }); 
    
    
    
    
   if($('.page .gallery').length){
     if($('.page .gallery .video').length){
         
         $('h1 .vid').css('color','#777').css('cursor','pointer').click(function(){
                   $('a.photo').toggle();
                   $('h1 .vid').toggleClass('marked');
                   $('h1 .pho').toggleClass('marked');
         });
         
         
     } 
       
   }   

   $('a.confirm').click(function(event) {
           event.preventDefault();
           var url = $(this).attr('href');
           var confirm_box = confirm('Czy jesteś pewny że chcesz wykonać tą akcje?');
           if (confirm_box) {
              window.location = url;
           }
    });        

    var noti=$(content).find('.ajaxnotifications').html();
    if(noti) { $('.notifications').append(noti); $("html, body").animate({ scrollTop: 0 }, "fast");  }

    $(content).find('.add-product').submit(function(event){
        var container=$(this).parent().parent().find('.avatar').parent();
        var avatar=$(this).parent().parent().find('.avatar');
        
        event.preventDefault();
        
        if(!isNumber($(this).find('input.amount').val())) location.reload();
        else{
            if($(this).find('input.tip').length){
               $(this).find('input.tip').val(parseInt($(this).find('input.tip').val())+parseInt($(this).find('input.amount').val())); 
            }

            if(avatar.length){
                var new_avatar=$('<div></div>').addClass('avatar').addClass('fly').css('background-image',avatar.css('background-image')).css('z-index',3100);
                var position = avatar.offset();
                var scroll = $(window).scrollTop();

                $('body').append(new_avatar);
                $('.fly').css('position','fixed').css('top', position.top-scroll).css('left', position.left);

                var target = $('.person .avatar').offset();
                $('.fly').animate(
                {
                   opacity: 1,
                   top: 42,//target.top-scroll,
                   left: target.left+10,
                }, 
                {
                duration: 1000,
                easing: "easeInOutExpo", // nawet ok easeInOutBack slabsze easeOutBack
                specialEasingNot: {
                  width: "easeOutBounce",
                  height: "easeOutBounce"
                }, 
                complete: function() {
                     $(this).fadeOut(200,function(){ $(this).remove(); });
                }
                });
            }



            
            var form=$(this);
            $.post( $(this).attr('action'), $( this ).serialize() ).done(function(data) {   
                        var element=$('.person');

                        form.find('input[name=amount]').val('1');

                        $( element ).animate({
                           opacity: 0,
                           top: "-=50",
                           //height: "toggle"
                         }, 300, function() {
                            $(element).css('top','+=100');

                            $(element).html(data);

                            $( element ).animate({
                               opacity: 1,
                               top: "-=50",
                               //height: "toggle"
                             }, 300, function() {
                                 preapareContent(element);
                             });

                         });


            });
        }
    });


    content.find('.tip').each(function(){
       if($(this).parents('.hidden').length==0 && !$(this).hasClass('tooltipstered'))
       if($(this).attr('data-class')){

         var position='left';
         if($(this).attr('data-position')) position=$(this).attr('data-position');

         $(this).tooltipster({
          content: $('.'+$(this).attr('data-class')).html(),
          theme: 'tooltipster-light',
          contentAsHTML: true,
          position: position,
         });  
       }else{ 
         var position='top';
         if($(this).attr('data-position')) position=$(this).attr('data-position');

         if($(this).attr('title') )
         {        
            $(this).tooltipster({
             content: $(this).attr('title'),
             theme: 'tooltipster-light',
             contentAsHTML: false,
             position: position,
            }); 
         }

       }
    });
}




/*

function simpleModal(content){
    $('.modal-bg,.modal').remove();
    $('body').append('<div class="modal-bg" style="display:none"></div>');
    $('body').append('<div class="modal" style="display:none"><div class="close"></div><div class="data mod">'+content+'</div></div>');
    $('.modal').center();
    $('.modal-bg,.modal').fadeIn();
    $('.modal').center();
    $('.modal .close, .modal-bg').click(function(){
       $('.modal-bg,.modal').fadeOut();
    });

    return $('.modal');
}
*/


function updateQueryString(key, value, url) {
    if (!url) url = window.location.href;
    var url_start = [location.protocol, '//', location.host, location.pathname].join('');
    url_start='';
    
    var re = new RegExp("([?&])" + key + "=.*?(&|#|$)(.*)", "gi"),
        hash;

    if (re.test(url)) {
        if (typeof value !== 'undefined' && value !== null)
            return url_start+url.replace(re, '$1' + key + "=" + value + '$2$3');
        else {
            hash = url.split('#');
            url = hash[0].replace(re, '$1$3').replace(/(&|\?)$/, '');
            if (typeof hash[1] !== 'undefined' && hash[1] !== null) 
                url += '#' + hash[1];
            return url_start+url;
        }
    }
    else {
        if (typeof value !== 'undefined' && value !== null) {
            var separator = url.indexOf('?') !== -1 ? '&' : '?';
            hash = url.split('#');
            url = hash[0] + separator + key + '=' + value;
            if (typeof hash[1] !== 'undefined' && hash[1] !== null) 
                url += '#' + hash[1];
            return url_start+url;
        }
        else
            return url_start+url;
    }
}



function initRefresh(content){

    content.find('.refresh').click(function(event) {
        
        var element=$(this);
        var parent=$(this).parent();
        
        element.find('i').addClass('fa-spin');
        
        $.ajax({
            type        : 'GET',
            url         : $(this).attr('href'),
        })
        .done(function(data) {
            parent.parent().append(data);
            initRefresh(parent.parent());
            parent.slideUp();
        });

        event.preventDefault();

    });
}




jQuery(document).ready(function() {
initForms($('body'));
initRefresh($('body'));


$('.contactus').click(function(event){
    
    var modal=createModal('contact');
    
    modal.append($(this).next().html());
    initModal(modal.parent());
    
    if(modal.find('.captcha').length)
    {
        var div=modal.find('.captcha');
        var size='normal';
        if($(window).width()<390) size='compact';
        
        div.attr('id','newcaptcha');
        grecaptcha.render('newcaptcha', {
            sitekey: '6LcGnyUTAAAAAEH3iYG1RU2lh3_fggse-hKd9pNa',
            size: size,
            callback: function(response) {
                //console.log(response);
            }
        });
      
        

    }
    
    modal.find('form').submit(function(event) {
        
        var valid=true;
        
        $(this).find('input[type=text],textarea').each(function(){
           if($(this).val()==''){
                if($(this).parent().find('.errors').length){
                    valid=false;
                    $(this).css('border','1px solid red');
                    $(this).parent().find('.errors').show();
                }
           }else{
             
                if($(this).parent().find('.errors').length){
                    $(this).css('border','');
                    $(this).parent().find('.errors').hide();
                }
               
           }    
        });
        
        if(valid){
            $.ajax({
                type        : 'POST',
                url         : $(this).attr('action'),
                data        : $(this).serialize(),
            })
            .done(function(data) {
                modal.parent().find('footer button').remove();
                modal.find('.content').html(data);

            });   
        }
        
        event.preventDefault();
     

    });    
    
    event.preventDefault();
});

if($('.contactus').hasClass('show')){

    function showcontact(){
    	$('.contactus.show').click();
    }
	setTimeout(showcontact, 2000);
}



$('.showproduct').click(function(event){
   
    var modal=createModal('contact');
    
    modal.append($(this).parent().find('.showproductdiv').html());
    initModal(modal.parent());
    
    event.preventDefault();
});



//
//            $('ul.a2lix_translationsLocales').on('click', 'a', function(evt) {
//                
//                //alert('a');
//                $(this).tab('show');
//                evt.preventDefault();
//            });
//
//            $('div.a2lix_translationsLocalesSelector').on('change', 'input', function(evt) {
//                var $tabs = $('ul.a2lix_translationsLocales');
//
//                $('div.a2lix_translationsLocalesSelector').find('input').each(function() {
//                    $tabs.find('li:has(a[data-target=".a2lix_translationsFields-' + this.value + '"])').toggle(this.checked);
//                });
//
//                $('ul.a2lix_translationsLocales li:visible:first').find('a').tab('show');
//            }).trigger('change');
//
//            // Manage focus on right bootstrap tab when invalid event (A2lixTranslation tab or not, and inner tabs include)
//            $(':input', 'div.tab-content').on('invalid', function(e) {
//                var $tabPanes = $(this).parents('div.tab-pane');
//
//                $tabPanes.each(function() {
//                    var $tabPane = $(this);
//
//                    if (!$tabPane.hasClass('active')) {
//                        var $tabNavs = $tabPane.parent('.tab-content')
//                                               .siblings('ul.nav.nav-tabs');
//
//                        // Tab target by id
//                        if (this.id) {
//                            $tabNavs.find('a[href="#'+ this.id +'"], a[data-target="#'+ this.id +'"]')
//                                    .trigger('click');
//
//                            return true;
//                        }
//
//                        // Tab target by class for a2lixTranslation
//                        var a2lixTranslClass = /a2lix_translationsFields-[\S]+/.exec(this.className);
//                        if (a2lixTranslClass.length) {
//                            $tabNavs.find('a[data-target=".'+ a2lixTranslClass[0] +'"]')
//                                    .trigger('click');
//
//                            return true;
//                        }
//                    }
//                });
//
//                return true;
//            });

            $(".fancybox a").fancybox({});


            
            

            $('body').append('<div class="prettyLoader" style="display: none; top: 0px; left: 0px; opacity: 1;"><img src="/js/prettyloader/images/prettyLoader/ajax-loader.gif"></div>');

            $( document ).ajaxStart(function() {
               $('.prettyLoader').fadeIn(300);
            });
            $( document ).ajaxComplete(function() {
               $('.prettyLoader').fadeOut(300);
            });

            $(document).on('mousemove', function(e){
                $('.prettyLoader').css({
                   left:  e.pageX+10,
                   top:   e.pageY+10
                });
            });

            
            
            function ajaxifyProductConnection(){
                $('.connect-result a.btn-def').unbind('click').click(function(event){
                        event.preventDefault();
                        var element=$(this);
                        $.ajax({
                          url: $(this).attr('href'),
                        }).done(function(data) {   
                            //console.log(data);
                            $('.connected').show().append(data);
                            $('.not-connected').hide();
                            ajaxifyProductConnection();
                            preapareContent($('.connected'));
                            element.parent().slideUp('fast');
                        });
                }); 
                
                $('.connected a.btn-del').unbind('click').click(function(event){
                        event.preventDefault();
                        var element=$(this);
                        $.ajax({
                          url: $(this).attr('href'),
                        }).done(function(data) {   
                            //console.log(data);
                            element.parent().parent().remove();
                            if($('.connected tr').length==1){
                                $('.connected').hide();
                                $('.not-connected').show();  
                            }
                            
                            ajaxEnd();
                                
                        });
                });   
            }
            //product form

            ajaxifyProductConnection();
            
            var timerConnect;
            $('input[name=connect]').keyup(function(){
                clearTimeout(timerConnect);
                var ms = 600; // milliseconds
                var value=$(this).val();
                var element=$(this);
                if(element.attr('data-prev')!==value ){
                    if(value.length>2){


                    timerConnect = setTimeout(function() {
                        $.ajax({
                          url: updateQueryString('connect',value,window.location.search),
                        }).done(function(data) {
                          $('.connect-result').html(data);
                          preapareContent($('.connect-result'));
                          
                          element.attr('data-prev',value);  
                          
                          ajaxifyProductConnection();
                          ajaxEnd();
                        });        
                    }, ms); 


                    }else{
                      $('.connect-result').html('<p>Aby wyszukać produkt trzeba wprowadzić minimum 3 znaki.</p>');   
                    }
                }
            });
            
            if($('.connected tr').length==1){
                $('.connected').hide();
                $('.not-connected').show();  
            } 
            
            setInterval(function(){
            if($('.avatar.unread').css('background-image')=='none')  $('.avatar.unread').css('background-image','');    
            else $('.avatar.unread').css('background-image','none');
            },600);

            var timerUser;
            $('input[name=user]').keyup(function(){
                clearTimeout(timerUser);
                var ms = 600; // milliseconds
                
                var value=$(this).val();
                var element=$(this);
                if(element.attr('data-prev')!==value ){
                    if(value.length>2){


                        timerUser = setTimeout(function() {
  
                            $.ajax({
                              url: updateQueryString('user',value,window.location.search),
                            }).done(function(data) {
                              $('.new-message .result').html(data);
                              preapareContent($('.new-message .result')); 

                              element.attr('data-prev',value);  


                              $('.new-message .result input[type=radio]').change(function(){
                                 $('.new-message .result .element').removeClass('on');
                                 $(this).parents('label').addClass('on');
                              });

                              if( $('.new-message .result input[type=radio]').length>0 ) $('.new-message .result input[type=radio]').first().click();
                              
                              ajaxEnd();
                              
                            });  

                        }, ms); 


                    }else{
                      $('.new-message .result').html('<br />Aby wyszukać odbiorce trzeba wprowadzić minimum 3 znaki.');   
                    }
                }
            });
            if($('input[name=user]').val())
            $('input[name=user]').keyup();
            
          
            preapareContent($('body')); 
            
            $('.notification').click(function(){
               $(this).animate({opacity: 0},500, function(){ $(this).slideUp(); } ); 
            });
            
            $(".dropwrapper .click").click(function(){
                $(this).parent().find('.dropmenu').toggle();
                //alert('a');
            });
            
          
            
            
            /*
            $(".dropwrapper .click").hover(function(){
                    //$(this).parent().find('.dropmenu').show();
            },function(){});
            */

});