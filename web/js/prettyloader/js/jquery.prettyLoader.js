/* ------------------------------------------------------------------------
 * Class: prettyLoader
 * Use: A unified solution for AJAX loader
 * Author: Stephane Caron (http://www.no-margin-for-errors.com)
 * Version: 1.0.1
 * ------------------------------------------------------------------------- */

var matched, browser;

// Use of jQuery.browser is frowned upon.
// More details: http://api.jquery.com/jQuery.browser
// jQuery.uaMatch maintained for back-compat
jQuery.uaMatch = function( ua ) {
	ua = ua.toLowerCase();

	var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
		/(webkit)[ \/]([\w.]+)/.exec( ua ) ||
		/(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
		/(msie) ([\w.]+)/.exec( ua ) ||
		ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
		[];

	return {
		browser: match[ 1 ] || "",
		version: match[ 2 ] || "0"
	};
};

matched = jQuery.uaMatch( navigator.userAgent );
browser = {};

if ( matched.browser ) {
	browser[ matched.browser ] = true;
	browser.version = matched.version;
}

// Chrome is Webkit, but Webkit is also Safari.
if ( browser.chrome ) {
	browser.webkit = true;
} else if ( browser.webkit ) {
	browser.safari = true;
}

jQuery.browser = browser;


(function($){$.prettyLoader={version:'1.0.1'};$.prettyLoader=function(settings){settings=jQuery.extend({animation_speed:'fast',bind_to_ajax:true,delay:false,loader:'/js/prettyloader/images/prettyLoader/ajax-loader.gif',offset_top:13,offset_left:10},settings);scrollPos=_getScroll();imgLoader=new Image();imgLoader.onerror=function(){alert('Preloader image cannot be loaded. Make sure the path is correct in the settings and that the image is reachable.');};imgLoader.src=settings.loader;if(settings.bind_to_ajax)
jQuery(document).ajaxStart(function(){$.prettyLoader.show()}).ajaxStop(function(){$.prettyLoader.hide()});$.prettyLoader.positionLoader=function(e){e=e?e:window.event;cur_x=(e.clientX)?e.clientX:cur_x;cur_y=(e.clientY)?e.clientY:cur_y;left_pos=cur_x+settings.offset_left+scrollPos['scrollLeft'];top_pos=cur_y+settings.offset_top+scrollPos['scrollTop'];$('.prettyLoader').css({'top':top_pos,'left':left_pos});}
$.prettyLoader.show=function(delay){if($('.prettyLoader').size()>0)return;scrollPos=_getScroll();$('<div></div>').addClass('prettyLoader').addClass('prettyLoader_'+settings.theme).appendTo('body').hide();if($.browser.msie&&$.browser.version==6)
$('.prettyLoader').addClass('pl_ie6');$('<img />').attr('src',settings.loader).appendTo('.prettyLoader');$('.prettyLoader').fadeIn(settings.animation_speed);$(document).bind('click',$.prettyLoader.positionLoader);$(document).bind('mousemove',$.prettyLoader.positionLoader);$(window).scroll(function(){scrollPos=_getScroll();$(document).triggerHandler('mousemove');});delay=(delay)?delay:settings.delay;if(delay){setTimeout(function(){$.prettyLoader.hide()},delay);}};$.prettyLoader.hide=function(){$(document).unbind('click',$.prettyLoader.positionLoader);$(document).unbind('mousemove',$.prettyLoader.positionLoader);$(window).unbind('scroll');$('.prettyLoader').fadeOut(settings.animation_speed,function(){$(this).remove();});};function _getScroll(){if(self.pageYOffset){return{scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset};}else if(document.documentElement&&document.documentElement.scrollTop){return{scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};}else if(document.body){return{scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};};};return this;};})(jQuery);
