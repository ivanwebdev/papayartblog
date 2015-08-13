var thb_easing = [0.75, 0, 0.175, 1];

// Accordion

;(function ($, window, undefined){
  'use strict';

  $.fn.foundationAccordion = function (options) {
  	
    $('.accordion', this).each(function() {
    	var that = $(this),
    			active = ( !(that.data('active-tab')) ? 1 : that.data('active-tab'));
    	
    	that.find('li').eq(active -1).addClass('active');
    	
    	that.find('li').on('click.fndtn', function () {
    		var p = $(this).parent(),
    				flyout = $(this).children('.content').first(),
    				active = p.data('active');
    	  $('.content', p).not(flyout).slideUp(400, $.bez(thb_easing), function() {
    	  	$(this).parent('li').removeClass('active'); //changed this
    	  });
    	  flyout.slideDown({ 
    	  	duration: '400',
    	  	easing: $.bez(thb_easing)
    	  }).parent('li').addClass('active');
    	});
    });

  };

})( jQuery, this );

// Alerts

;(function ($, window, undefined) {
  'use strict';
  
  $.fn.foundationAlerts = function (options) {
    var settings = $.extend({
      callback: $.noop
    }, options);
    
    $(document).on("click", ".notification-box a.close", function (e) {
      e.preventDefault();
      $(this).closest(".notification-box").fadeOut(function () {
        $(this).remove();
        // Do something else after the alert closes
        settings.callback();
      });
    });
    
  };

})(jQuery, this);


// Tabs

;(function ($, window, undefined) {
  'use strict';

  $.fn.foundationTabs = function (options) {

    var settings = $.extend({
      callback: $.noop
    }, options);

    var activateTab = function ($tab) {
      var $activeTab = $tab.closest('dl').find('dd.active'),
          target = $tab.children('a').attr("href"),
          hasHash = /^#/.test(target),
          contentLocation = '';

      if (hasHash) {
        contentLocation = target + 'Tab';

        // Strip off the current url that IE adds
        contentLocation = contentLocation.replace(/^.+#/, '#');

        //Show Tab Content
        $(contentLocation).closest('.tabs-content').children('li').removeClass('active').hide();
        $(contentLocation).css('display', 'block').addClass('active');
      }

      //Make Tab Active
      $activeTab.removeClass('active');
      $tab.addClass('active');
    };

    $(document).on('click.fndtn', 'dl.tabs dd a', function (event){
      activateTab($(this).parent('dd'));
    });

	$(document).find('dl.tabs').each(function() {
		activateTab($(this).find('dd:eq(0)'));
	});
  };

})(jQuery, this);

jQuery(document).ready(function($) {
	
	$.fn.foundationAlerts					? $(document).foundationAlerts() : null;
	$.fn.foundationAccordion			? $(document).foundationAccordion() : null;
	$.fn.foundationTabs						? $(document).foundationTabs() : null;

});

/*
 * Viewport - jQuery selectors for finding elements in viewport
 *
 * Copyright (c) 2008-2009 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *  http://www.appelsiini.net/projects/viewport
 *
 */
(function($) {
    
    $.belowthefold = function(element, settings) {
        var fold = $(window).height() + $(window).scrollTop();
        return fold <= $(element).offset().top - settings.threshold;
    };

    $.abovethetop = function(element, settings) {
        var top = $(window).scrollTop();
        return top >= $(element).offset().top + $(element).height() - settings.threshold;
    };
    
    $.rightofscreen = function(element, settings) {
        var fold = $(window).width() + $(window).scrollLeft();
        return fold <= $(element).offset().left - settings.threshold;
    };
    
    $.leftofscreen = function(element, settings) {
        var left = $(window).scrollLeft();
        return left >= $(element).offset().left + $(element).width() - settings.threshold;
    };
    
    $.inviewport = function(element, settings) {
        return !$.rightofscreen(element, settings) && !$.leftofscreen(element, settings) && !$.belowthefold(element, settings) && !$.abovethetop(element, settings);
    };
    
    $.extend($.expr[':'], {
        "below-the-fold": function(a, i, m) {
            return $.belowthefold(a, {threshold : 0});
        },
        "above-the-top": function(a, i, m) {
            return $.abovethetop(a, {threshold : 0});
        },
        "left-of-screen": function(a, i, m) {
            return $.leftofscreen(a, {threshold : 0});
        },
        "right-of-screen": function(a, i, m) {
            return $.rightofscreen(a, {threshold : 0});
        },
        "in-viewport": function(a, i, m) {
            return $.inviewport(a, {threshold : 0});
        }
    });

    
})(jQuery);

// Images Loaded
(function(c,q){var m="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";c.fn.imagesLoaded=function(f){function n(){var b=c(j),a=c(h);d&&(h.length?d.reject(e,b,a):d.resolve(e));c.isFunction(f)&&f.call(g,e,b,a)}function p(b){k(b.target,"error"===b.type)}function k(b,a){b.src===m||-1!==c.inArray(b,l)||(l.push(b),a?h.push(b):j.push(b),c.data(b,"imagesLoaded",{isBroken:a,src:b.src}),r&&d.notifyWith(c(b),[a,e,c(j),c(h)]),e.length===l.length&&(setTimeout(n),e.unbind(".imagesLoaded",
p)))}var g=this,d=c.isFunction(c.Deferred)?c.Deferred():0,r=c.isFunction(d.notify),e=g.find("img").add(g.filter("img")),l=[],j=[],h=[];c.isPlainObject(f)&&c.each(f,function(b,a){if("callback"===b)f=a;else if(d)d[b](a)});e.length?e.bind("load.imagesLoaded error.imagesLoaded",p).each(function(b,a){var d=a.src,e=c.data(a,"imagesLoaded");if(e&&e.src===d)k(a,e.isBroken);else if(a.complete&&a.naturalWidth!==q)k(a,0===a.naturalWidth||0===a.naturalHeight);else if(a.readyState||a.complete)a.src=m,a.src=d}):
n();return d?d.promise(g):g}})(jQuery);

/*! waitForImages jQuery Plugin 2014-10-27 */
!function(a){var b="waitForImages";a.waitForImages={hasImageProperties:["backgroundImage","listStyleImage","borderImage","borderCornerImage","cursor"]},a.expr[":"].uncached=function(b){if(!a(b).is('img[src][src!=""]'))return!1;var c=new Image;return c.src=b.src,!c.complete},a.fn.waitForImages=function(c,d,e){var f=0,g=0;if(a.isPlainObject(arguments[0])&&(e=arguments[0].waitForAll,d=arguments[0].each,c=arguments[0].finished),c=c||a.noop,d=d||a.noop,e=!!e,!a.isFunction(c)||!a.isFunction(d))throw new TypeError("An invalid callback was supplied.");return this.each(function(){var h=a(this),i=[],j=a.waitForImages.hasImageProperties||[],k=/url\(\s*(['"]?)(.*?)\1\s*\)/g;e?h.find("*").addBack().each(function(){var b=a(this);b.is("img:uncached")&&i.push({src:b.attr("src"),element:b[0]}),a.each(j,function(a,c){var d,e=b.css(c);if(!e)return!0;for(;d=k.exec(e);)i.push({src:d[2],element:b[0]})})}):h.find("img:uncached").each(function(){i.push({src:this.src,element:this})}),f=i.length,g=0,0===f&&c.call(h[0]),a.each(i,function(e,i){var j=new Image,k="load."+b+" error."+b;a(j).on(k,function l(b){return g++,d.call(i.element,g,f,"load"==b.type),a(this).off(k,l),g==f?(c.call(h[0]),!1):void 0}),j.src=i.src})})}}(jQuery);

/*!
 * Bez @VERSION
 * http://github.com/rdallasgray/bez
 * 
 * A plugin to convert CSS3 cubic-bezier co-ordinates to jQuery-compatible easing functions
 * 
 * With thanks to Nikolay Nemshilov for clarification on the cubic-bezier maths
 * See http://st-on-it.blogspot.com/2011/05/calculating-cubic-bezier-function.html
 * 
 * Copyright @YEAR Robert Dallas Gray. All rights reserved.
 * Provided under the FreeBSD license: https://github.com/rdallasgray/bez/blob/master/LICENSE.txt
*/
jQuery.extend({ bez: function(coOrdArray) {
	var encodedFuncName = "bez_" + jQuery.makeArray(arguments).join("_").replace(/\./g, "p");
	if (typeof jQuery.easing[encodedFuncName] !== "function") {
		var	polyBez = function(p1, p2) {
			var A = [null, null], B = [null, null], C = [null, null],
				bezCoOrd = function(t, ax) {
					C[ax] = 3 * p1[ax], B[ax] = 3 * (p2[ax] - p1[ax]) - C[ax], A[ax] = 1 - C[ax] - B[ax];
					return t * (C[ax] + t * (B[ax] + t * A[ax]));
				},
				xDeriv = function(t) {
					return C[0] + t * (2 * B[0] + 3 * A[0] * t);
				},
				xForT = function(t) {
					var x = t, i = 0, z;
					while (++i < 14) {
						z = bezCoOrd(x, 0) - t;
						if (Math.abs(z) < 1e-3) break;
						x -= z / xDeriv(x);
					}
					return x;
				};
				return function(t) {
					return bezCoOrd(xForT(t), 1);
				}
		};
		jQuery.easing[encodedFuncName] = function(x, t, b, c, d) {
			return c * polyBez([coOrdArray[0], coOrdArray[1]], [coOrdArray[2], coOrdArray[3]])(t/d) + b;
		}
	}
	return encodedFuncName;
}});

/**
* jquery.matchHeight-min.js v0.5.1
* http://brm.io/jquery-match-height/
* License: MIT
*/
(function(b){b.fn.matchHeight=function(a){if("remove"===a){var d=this;this.css("height","");b.each(b.fn.matchHeight._groups,function(b,a){a.elements=a.elements.not(d)});return this}if(1>=this.length)return this;a="undefined"!==typeof a?a:!0;b.fn.matchHeight._groups.push({elements:this,byRow:a});b.fn.matchHeight._apply(this,a);return this};b.fn.matchHeight._apply=function(a,d){var c=b(a),e=[c];d&&(c.css({display:"block","padding-top":"0","padding-bottom":"0","border-top":"0","border-bottom":"0",height:"100px"}),
e=k(c),c.css({display:"","padding-top":"","padding-bottom":"","border-top":"","border-bottom":"",height:""}));b.each(e,function(a,c){var d=b(c),e=0;d.each(function(){var a=b(this);a.css({display:"block",height:""});a.outerHeight(!1)>e&&(e=a.outerHeight(!1));a.css({display:""})});d.each(function(){var a=b(this),c=0;"border-box"!==a.css("box-sizing")&&(c+=g(a.css("border-top-width"))+g(a.css("border-bottom-width")),c+=g(a.css("padding-top"))+g(a.css("padding-bottom")));a.css("height",e-c)})});return this};
b.fn.matchHeight._applyDataApi=function(){var a={};b("[data-match-height], [data-mh]").each(function(){var d=b(this),c=d.attr("data-match-height");a[c]=c in a?a[c].add(d):d});b.each(a,function(){this.matchHeight(!0)})};b.fn.matchHeight._groups=[];b.fn.matchHeight._throttle=80;var h=-1,f=-1;b.fn.matchHeight._update=function(a){if(a&&"resize"===a.type){a=b(window).width();if(a===h)return;h=a}-1===f&&(f=setTimeout(function(){b.each(b.fn.matchHeight._groups,function(){b.fn.matchHeight._apply(this.elements,
this.byRow)});f=-1},b.fn.matchHeight._throttle))};b(b.fn.matchHeight._applyDataApi);b(window).bind("load resize orientationchange",b.fn.matchHeight._update);var k=function(a){var d=null,c=[];b(a).each(function(){var a=b(this),f=a.offset().top-g(a.css("margin-top")),h=0<c.length?c[c.length-1]:null;null===h?c.push(a):1>=Math.floor(Math.abs(d-f))?c[c.length-1]=h.add(a):c.push(a);d=f});return c},g=function(a){return parseFloat(a)||0}})(jQuery);

/*
Firefox super responsive scroll (c) Keith Clark - MIT Licensed
*/
(function(doc) {

  var root = doc.documentElement;

  // Not ideal, but better than UA sniffing.
  if ("MozAppearance" in root.style) {

    // determine the vertical scrollbar width
    var scrollbarWidth = root.clientWidth;
    root.style.overflow = "scroll";
    scrollbarWidth -= root.clientWidth;
    root.style.overflow = "";
    
    // create a synthetic scroll event
    var scrollEvent = doc.createEvent("UIEvent")
    scrollEvent.initEvent("scroll", true, true);
    
    // event dispatcher
    function scrollHandler() {
      doc.dispatchEvent(scrollEvent)
    }

    // detect mouse events in the document scrollbar track
    doc.addEventListener("mousedown", function(e) {
      if (e.clientX > root.clientWidth - scrollbarWidth) {
        doc.addEventListener("mousemove", scrollHandler, false);
        doc.addEventListener("mouseup", function() {
          doc.removeEventListener("mouseup", arguments.callee, false);
          doc.removeEventListener("mousemove", scrollHandler, false);
        }, false)
      }
    }, false)

    // override mouse wheel behaviour.
    doc.addEventListener("DOMMouseScroll", function(e) {
      // Don't disable hot key behaviours
      if (!e.ctrlKey && !e.shiftKey) {
        root.scrollTop += e.detail * 16;
        scrollHandler.call(this, e);
        e.preventDefault()
      }
    }, false)
 
  }
})(document);

 /*!
  * hoverIntent v1.8.1 // 2014.08.11 // jQuery v1.9.1+
  * http://cherne.net/brian/resources/jquery.hoverIntent.html
  *
  * You may use hoverIntent under the terms of the MIT license. Basically that
  * means you are free to use hoverIntent as long as this header is left intact.
  * Copyright 2007, 2014 Brian Cherne
  */
 
 /* hoverIntent is similar to jQuery's built-in "hover" method except that
  * instead of firing the handlerIn function immediately, hoverIntent checks
  * to see if the user's mouse has slowed down (beneath the sensitivity
  * threshold) before firing the event. The handlerOut function is only
  * called after a matching handlerIn.
  *
  * // basic usage ... just like .hover()
  * .hoverIntent( handlerIn, handlerOut )
  * .hoverIntent( handlerInOut )
  *
  * // basic usage ... with event delegation!
  * .hoverIntent( handlerIn, handlerOut, selector )
  * .hoverIntent( handlerInOut, selector )
  *
  * // using a basic configuration object
  * .hoverIntent( config )
  *
  * @param  handlerIn   function OR configuration object
  * @param  handlerOut  function OR selector for delegation OR undefined
  * @param  selector    selector OR undefined
  * @author Brian Cherne <brian(at)cherne(dot)net>
  */
 
 (function(factory) {
     'use strict';
     if (typeof define === 'function' && define.amd) {
         define(['jquery'], factory);
     } else if (jQuery && !jQuery.fn.hoverIntent) {
         factory(jQuery);
     }
 })(function($) {
     'use strict';
 
     // default configuration values
     var _cfg = {
         interval: 100,
         sensitivity: 6,
         timeout: 0
     };
 
     // counter used to generate an ID for each instance
     var INSTANCE_COUNT = 0;
 
     // current X and Y position of mouse, updated during mousemove tracking (shared across instances)
     var cX, cY;
 
     // saves the current pointer position coordinated based on the given mouse event
     var track = function(ev) {
         cX = ev.pageX;
         cY = ev.pageY;
     };
 
     // compares current and previous mouse positions
     var compare = function(ev,$el,s,cfg) {
         // compare mouse positions to see if pointer has slowed enough to trigger `over` function
         if ( Math.sqrt( (s.pX-cX)*(s.pX-cX) + (s.pY-cY)*(s.pY-cY) ) < cfg.sensitivity ) {
             $el.off('mousemove.hoverIntent'+s.namespace,track);
             delete s.timeoutId;
             // set hoverIntent state as active for this element (so `out` handler can eventually be called)
             s.isActive = true;
             // clear coordinate data
             delete s.pX; delete s.pY;
             return cfg.over.apply($el[0],[ev]);
         } else {
             // set previous coordinates for next comparison
             s.pX = cX; s.pY = cY;
             // use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
             s.timeoutId = setTimeout( function(){compare(ev, $el, s, cfg);} , cfg.interval );
         }
     };
 
     // triggers given `out` function at configured `timeout` after a mouseleave and clears state
     var delay = function(ev,$el,s,out) {
         delete $el.data('hoverIntent')[s.id];
         return out.apply($el[0],[ev]);
     };
 
     $.fn.hoverIntent = function(handlerIn,handlerOut,selector) {
         // instance ID, used as a key to store and retrieve state information on an element
         var instanceId = INSTANCE_COUNT++;
 
         // extend the default configuration and parse parameters
         var cfg = $.extend({}, _cfg);
         if ( $.isPlainObject(handlerIn) ) {
             cfg = $.extend(cfg, handlerIn );
         } else if ($.isFunction(handlerOut)) {
             cfg = $.extend(cfg, { over: handlerIn, out: handlerOut, selector: selector } );
         } else {
             cfg = $.extend(cfg, { over: handlerIn, out: handlerIn, selector: handlerOut } );
         }
 
         // A private function for handling mouse 'hovering'
         var handleHover = function(e) {
             // cloned event to pass to handlers (copy required for event object to be passed in IE)
             var ev = $.extend({},e);
 
             // the current target of the mouse event, wrapped in a jQuery object
             var $el = $(this);
 
             // read hoverIntent data from element (or initialize if not present)
             var hoverIntentData = $el.data('hoverIntent');
             if (!hoverIntentData) { $el.data('hoverIntent', (hoverIntentData = {})); }
 
             // read per-instance state from element (or initialize if not present)
             var state = hoverIntentData[instanceId];
             if (!state) { hoverIntentData[instanceId] = state = { id: instanceId }; }
 
             // state properties:
             // id = instance ID, used to clean up data
             // timeoutId = timeout ID, reused for tracking mouse position and delaying "out" handler
             // isActive = plugin state, true after `over` is called just until `out` is called
             // pX, pY = previously-measured pointer coordinates, updated at each polling interval
             // namespace = string used as namespace for per-instance event management
 
             // clear any existing timeout
             if (state.timeoutId) { state.timeoutId = clearTimeout(state.timeoutId); }
 
             // event namespace, used to register and unregister mousemove tracking
             var namespace = state.namespace = '.hoverIntent'+instanceId;
 
             // handle the event, based on its type
             if (e.type === 'mouseenter') {
                 // do nothing if already active
                 if (state.isActive) { return; }
                 // set "previous" X and Y position based on initial entry point
                 state.pX = ev.pageX; state.pY = ev.pageY;
                 // update "current" X and Y position based on mousemove
                 $el.on('mousemove.hoverIntent'+namespace,track);
                 // start polling interval (self-calling timeout) to compare mouse coordinates over time
                 state.timeoutId = setTimeout( function(){compare(ev,$el,state,cfg);} , cfg.interval );
             } else { // "mouseleave"
                 // do nothing if not already active
                 if (!state.isActive) { return; }
                 // unbind expensive mousemove event
                 $el.off('mousemove.hoverIntent'+namespace,track);
                 // if hoverIntent state is true, then call the mouseOut function after the specified delay
                 state.timeoutId = setTimeout( function(){delay(ev,$el,state,cfg.out);} , cfg.timeout );
             }
         };
 
         // listen for mouseenter and mouseleave
         return this.on({'mouseenter.hoverIntent':handleHover,'mouseleave.hoverIntent':handleHover}, cfg.selector);
     };
 });