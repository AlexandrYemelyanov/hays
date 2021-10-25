/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var dclhandler = false;

var RhyApp = __webpack_require__(1),
    toast = __webpack_require__(3),

// loadScript = require('Node/load-script/index'), // Needed to load Google Maps API
// inView = require('Node/in-view/dist/in-view.min'),
// delay = require('GeneralLib/async/_delay'),
// OnScreen = require('Node/onscreen/dist/on-screen.umd.min'),
deepmerge = __webpack_require__(4);

/**
 * Set the main JS to execute after DOM content is loaded.
 */
if (document.readyState !== 'loading') {
    start();
} else {
    dclhandler = true;
    document.addEventListener('DOMContentLoaded', start);
}

/**
 * The site's main JS.
 */
function start() {
    var app = new RhyApp();

    if (dclhandler) {
        document.removeEventListener('DOMContentLoaded', start);
    }

    /**
     * Initialize my global app container.
     * @var  Object window.rhyApp Should be created by backend. See backend
     * 'Enqueue.php' for details.
     */
    if (window.rhyApp) {
        window.rhyApp = deepmerge(window.rhyApp, app);
        window.rhyApp.init.libs.vue = window.rhyApp.settings.vue[window.rhyApp.project.env];
    } else {
        window.rhyApp = app;
        window.rhyApp.init.libs.vue = window.rhyApp.settings.vue.dev;
    }

    /**
     * Setup the event to signal VueJS is loaded and its handler.
     */
    document.addEventListener('vueready', vueReady);

    toast(window.rhyApp.init.libs.vue, function () {
        document.dispatchEvent(window.rhyApp.events.vueready);
    });
    __webpack_require__(5)(1000);
}

/**
 * Load VueJS-dependent modules.
 */
function vueReady() {
    console.log('vueReady worked...');
    __webpack_require__(7);
    // document.querySelector('#vm-site-menu-directions') && require('VueLib/popup/_obj-on-off.vue').init('#vm-site-menu-directions');
    // document.querySelector('#vm-site-menu-directions') && require('FluidModules/vm/vm-site-menu-directions.es6');
    // document.querySelector('#vm-widget-practices') && require('FluidModules/vm/vm-widget-practices.es6');
    // document.querySelector('#vm-collapser') && require('VueLib/popup/_obj-on-off.vue').init('#vm-collapser', false, false, false);
    // require('FluidModules/vm/vm-send-resume.es6');
}

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * The RhyApp application main setup object
 */

var createEvents = __webpack_require__(2);

module.exports = function RhyApp() {
    'use strict';
    // this.name = name;
    this.events = {
        koready: createEvents('koready'),
        vueready: createEvents('vueready'),
        atfloaded: createEvents('atfloaded'),
        loadedpagescount: createEvents('loadedpagescount', { data: null }),
        loadedpagecontent: createEvents('loadedpagecontent', { data: null })
    };
    this.settings = {
        mode: 'dev',
        vue: {
            dev: '//cdn.jsdelivr.net/npm/vue@2.5.12/dist/vue.js',
            stage: '//cdn.jsdelivr.net/npm/vue@2.5.12/dist/vue.js',
            prod: '//cdn.jsdelivr.net/npm/vue@2.5.12/dist/vue.min.js'
        },
        paths: {
            wp: {
                style: '/style.css',
                dir: 'wp'
            },
            php: {
                style: 'assets/css/styles.css',
                dir: 'php'
            },
            local: 'localhost:3000'
        }
    };
    this.init = {
        libs: {
            vue: null
        }
    };
};

/***/ }),
/* 2 */
/***/ (function(module, exports) {

/**
 * Cross-browser create event helper with fallback for IE 10.
 * @param  String    type       type of custom event e.g. 'mapready'.
 * @param  Object    detail     (optioanal) triggers the creation of the CustomEvent with arguments.
 * @return Event              new DOM event object.
 */

module.exports = function _createEvent(type, detail) {
    'use strict';
    var evt;
    if (typeof Event === 'function') {
        evt = (!detail ? new Event(type, {
            bubbles: true,
            cancelable: true
        }) : new CustomEvent(type, {
            detail: detail,
            bubbles: true,
            cancelable: true
        }));
    } else {
        // IE9-11 case
        if (!detail || typeof detail !== 'object') {
            evt = document.createEvent('Event');
            evt.initEvent(type, true, true);
        } else {
            evt = document.createEvent('CustomEvent');
            evt.initCustomEvent(type, true, true, detail);
        }
    }
    return evt;
};

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;!function(e,t){ true?!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function(){return e.toast=t()}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)):"object"==typeof exports?module.exports=t():e.toast=t()}(this,function(){function e(){var e=document.getElementsByTagName("head")[0],n=function(t){if(e){if(t.length){for(var a,r,c=-1;a=t[++c];)if("string"==typeof a)o(a);else if("function"==typeof a){r=a;break}i(r,Array.prototype.slice.call(t,c+1))}}else setTimeout(function(){n(t)},50)},o=function(n){var o,i,r=/\.(\w+)$/.exec(n),c=/^\[(\w+)\](.+)/.exec(n);if(null!==c)o=c[1],n=c[2];else{if(null===r)return;o=r[1]}if(!(n in t))switch(t[n]=!1,o){case"js":i=document.createElement("script"),i.src=n,i.async=!1,e.appendChild(i);var f=navigator.appVersion.match(/MSIE (\d)/);null!==f&&parseInt(f[1],10)<9?i.onreadystatechange=function(){/ded|co/.test(this.readyState)&&(t[n]=!0,i.onreadystatechange=null)}:i.onload=function(){t[n]=!0,i.onload=null};break;case"css":i=document.createElement("link"),i.rel="styleSheet",i.href=n,e.appendChild(i),a(i,n);break;default:return void delete t[n]}},i=function(e,o){for(var a in t)if(!t[a])return void setTimeout(function(){i(e,o)},50);"function"==typeof e&&e(),n(o)},a=function(e,n){e.sheet||e.styleSheet?t[n]=!0:setTimeout(function(){a(e,n)},50)};n(arguments)}var t={};return e});

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var isMergeableObject = function isMergeableObject(value) {
	return isNonNullObject(value)
		&& !isSpecial(value)
};

function isNonNullObject(value) {
	return !!value && typeof value === 'object'
}

function isSpecial(value) {
	var stringValue = Object.prototype.toString.call(value);

	return stringValue === '[object RegExp]'
		|| stringValue === '[object Date]'
		|| isReactElement(value)
}

// see https://github.com/facebook/react/blob/b5ac963fb791d1298e7f396236383bc955f916c1/src/isomorphic/classic/element/ReactElement.js#L21-L25
var canUseSymbol = typeof Symbol === 'function' && Symbol.for;
var REACT_ELEMENT_TYPE = canUseSymbol ? Symbol.for('react.element') : 0xeac7;

function isReactElement(value) {
	return value.$$typeof === REACT_ELEMENT_TYPE
}

function emptyTarget(val) {
    return Array.isArray(val) ? [] : {}
}

function cloneIfNecessary(value, optionsArgument) {
    var clone = optionsArgument && optionsArgument.clone === true;
    return (clone && isMergeableObject(value)) ? deepmerge(emptyTarget(value), value, optionsArgument) : value
}

function defaultArrayMerge(target, source, optionsArgument) {
    var destination = target.slice();
    source.forEach(function(e, i) {
        if (typeof destination[i] === 'undefined') {
            destination[i] = cloneIfNecessary(e, optionsArgument);
        } else if (isMergeableObject(e)) {
            destination[i] = deepmerge(target[i], e, optionsArgument);
        } else if (target.indexOf(e) === -1) {
            destination.push(cloneIfNecessary(e, optionsArgument));
        }
    });
    return destination
}

function mergeObject(target, source, optionsArgument) {
    var destination = {};
    if (isMergeableObject(target)) {
        Object.keys(target).forEach(function(key) {
            destination[key] = cloneIfNecessary(target[key], optionsArgument);
        });
    }
    Object.keys(source).forEach(function(key) {
        if (!isMergeableObject(source[key]) || !target[key]) {
            destination[key] = cloneIfNecessary(source[key], optionsArgument);
        } else {
            destination[key] = deepmerge(target[key], source[key], optionsArgument);
        }
    });
    return destination
}

function deepmerge(target, source, optionsArgument) {
    var sourceIsArray = Array.isArray(source);
    var targetIsArray = Array.isArray(target);
    var options = optionsArgument || { arrayMerge: defaultArrayMerge };
    var sourceAndTargetTypesMatch = sourceIsArray === targetIsArray;

    if (!sourceAndTargetTypesMatch) {
        return cloneIfNecessary(source, optionsArgument)
    } else if (sourceIsArray) {
        var arrayMerge = options.arrayMerge || defaultArrayMerge;
        return arrayMerge(target, source, optionsArgument)
    } else {
        return mergeObject(target, source, optionsArgument)
    }
}

deepmerge.all = function deepmergeAll(array, optionsArgument) {
    if (!Array.isArray(array) || array.length < 2) {
        throw new Error('first argument should be an array with at least two elements')
    }

    // we are sure there are at least 2 values, so it is safe to have no initial value
    return array.reduce(function(prev, next) {
        return deepmerge(prev, next, optionsArgument)
    })
};

var deepmerge_1 = deepmerge;

module.exports = deepmerge_1;


/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

var smoothScroll = __webpack_require__(6);
module.exports = function _smoother(time, offset) {
    'use strict';
    if ((typeof time !== "number") || (time > 15000)) {
        time = 2000; // set default time for animation
    }
    // Если клик по линку с аттрибутом 'a[href^="#jump-"]', то вызвать processJumpLink
    document.addEventListener('click', function(evt) {
        // Случай 1: evt.target.tagName === `A`:
        // - проверить evt.target.hash.indexOf('#jump-') > -1
        // - если нет, вывалиться по-тихому
        // - если да, вызвать processJumpLink() c указателем
        // на элемент (переписать processJumpLink() под это)

        // Случай 2:
        // Если имя тега элемента !== 'A', проверить, есть ли 
        // у него предок с тегом `A. 
        // Если нет, то вывалиться по-тихому.
        // Если есть, то 
        // 

        // Call the scroll animation on link's
        // prefixed '#jump-' click
        if (evt.target.tagName === "A" &&
            evt.target.hash.indexOf('#jump-') > -1) {
            processJumpLink(evt, evt.target);
        } else {
            // Find closest ancestor link
            var link = findAncestorAnchor(evt.target);
            if (link && link.hash.indexOf('#jump-') > -1) {
                processJumpLink(evt, link);
            }
        }
    });

    function processJumpLink(evt, link_elt) {
        var id = link_elt.hash,
            idtop, bodytop;
        var $targetid = document.querySelector(id);
        if ($targetid.length === 0) {
            return;
        }
        // prevent standard hash navigation (avoid blinking in IE)
        evt.preventDefault();
        if (offset) {
            // smoothScroll() can take simple numeric 
            // offset to sctoll to within document
            // I use this feature for the case when I bind local hash navgation to 
            // a `floating / sticky` fixed menu bar floating forth and back over the document.
            // The `offset` parameter is the hight of the menu that should be subtracted from the target 
            // scroll position to prevent the menu overlaying the top part of the target element. 
            idtop = $targetid.getBoundingClientRect().top;
            bodytop = document.body.getBoundingClientRect().top;
            // console.log('Body top: ' + bodytop);
            // console.log('Element top: ' + idtop);
            smoothScroll(idtop - bodytop - offset, time);
        } else {
            // General case when scroll is made to the top of the element
            smoothScroll($targetid, time);
        }
    }
    // --- end processJumpLinks()

    function findAncestorAnchor(el) {
        // Just saved this for future purposes
        // while ((el = el.parentElement) && !el.classList.contains(cls));
        // while ((el = el.parentElement) && !el.tagname === 'A');

        // debugger;
        while (el.tagName !== 'A') {
            el = el.parentElement;
            if (el === null) {
                return false;
            }
        }
        return el;
    }
};

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;(function(root,smoothScroll){"use strict";if(true){!(__WEBPACK_AMD_DEFINE_FACTORY__ = (smoothScroll),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__))}else if(typeof exports==="object"&&typeof module==="object"){module.exports=smoothScroll()}else{root.smoothScroll=smoothScroll()}})(this,function(){"use strict";if(typeof window!=="object")return;if(document.querySelectorAll===void 0||window.pageYOffset===void 0||history.pushState===void 0){return}var getTop=function(element,start){if(element.nodeName==="HTML")return-start;return element.getBoundingClientRect().top+start};var easeInOutCubic=function(t){return t<.5?4*t*t*t:(t-1)*(2*t-2)*(2*t-2)+1};var position=function(start,end,elapsed,duration){if(elapsed>duration)return end;return start+(end-start)*easeInOutCubic(elapsed/duration)};var smoothScroll=function(el,duration,callback,context){duration=duration||500;context=context||window;var start=context.scrollTop||window.pageYOffset;if(typeof el==="number"){var end=parseInt(el)}else{var end=getTop(el,start)}var clock=Date.now();var requestAnimationFrame=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||function(fn){window.setTimeout(fn,15)};var step=function(){var elapsed=Date.now()-clock;if(context!==window){context.scrollTop=position(start,end,elapsed,duration)}else{window.scroll(0,position(start,end,elapsed,duration))}if(elapsed>duration){if(typeof callback==="function"){callback(el)}}else{requestAnimationFrame(step)}};step()};var linkHandler=function(ev){if(!ev.defaultPrevented){ev.preventDefault();if(location.hash!==this.hash)window.history.pushState(null,null,this.hash);var node=document.getElementById(this.hash.substring(1));if(!node)return;smoothScroll(node,500,function(el){location.replace("#"+el.id)})}};document.addEventListener("DOMContentLoaded",function(){var internal=document.querySelectorAll('a[href^="#"]:not([href="#"])'),a;for(var i=internal.length;a=internal[--i];){a.addEventListener("click",linkHandler,false)}});return smoothScroll});


/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var Vue = __webpack_require__(8),
    customEach = __webpack_require__(9);
// viewport = require('Helpers/_viewport.es6'),
// scrollDetector = require('Node/scroll-detector/dist/scroll-detector.min.js');

/**
 * The ViewModel for managing the entire site header behaviour.
 *
 * Namely:
 * - toggle on/off the drop down sub menus in the main menu;
 * - toggle on/off main menu on mobile screens;
 * - toggle on/off the site search bar.  
 */
var Header = function Header() {
    var self = this;
    this.el = '#vm-header';
    this.main_wrapper = document.querySelector('#jump-site-top');

    this.data = {
        togglers: {
            applicants: {
                ison: false
            },
            employers: {
                ison: false
            },
            international: {
                ison: false
            }
        },
        isfloating: false,
        isatoggleropen: false,
        ismobileopen: false,
        searchison: false
    };

    this.methods = {

        /**
         * Toggle the model's parts depending on the 'subject' argument passed from the view.
         * @param  string subject The name of the model's part to be toggled.
         */
        toggler: function toggler(subject) {

            /**
             * If the clicked toggler is not currently on, switch off all of them.
             */
            if (!this.$data.togglers[subject].ison) {
                self.offTogglers.call(this);
            }
            this.$data.togglers[subject].ison = !this.$data.togglers[subject].ison;
            this.$data.isatoggleropen = this.$data.togglers[subject].ison;
        }

        /**
         * Burger icon mobile menu toggler.
         */
        // toggleMobileMenu: function() {
        //     this.$data.ismobileopen = true;
        //     self.main_wrapper.classList.toggle('wj-expanded');
        // },

        /**
         * Toggle site search block on mobiles.
         */
        // toggleSearch: function() {
        //     this.$data.searchison = !this.$data.searchison;
        // }
    };

    this.watch = {
        isatoggleropen: function isatoggleropen(state) {
            Header.prototype.manageBodyClick.call(this, state, self);
        },
        ismobileopen: function ismobileopen(state) {
            if (state) {
                document.addEventListener('click', bodyClick);
            } else {
                document.removeEventListener('click', bodyClick);
            }

            function bodyClick() {
                self.main_wrapper.classList.remove('wj-expanded');
            }
        }
    };

    this.mounted = function () {
        var vm = this;
        this.$nextTick(function () {
            if (viewport.w / viewport.ratio > 980) {
                var floating_menu = __webpack_require__(10);
            }
            scrollDetector.on('scroll:up', function () {
                if (!vm.$data.isfloating) {
                    vm.$data.isfloating = true;
                }
            });
            scrollDetector.on('scroll:down', function () {
                if (vm.$data.isfloating) {
                    vm.$data.isfloating = false;
                }
            });
            scrollDetector.on('at:top', function () {
                vm.$data.isfloating = false;
            });
        });
    };
};

/**
 * Toggle off all the toggled items in the View.
 * Required to show only one item being toggled on.
 */
Header.prototype.offTogglers = function () {
    // console.log('offTogglers...');
    var self = this;
    customEach(Object.keys(this.$data.togglers), function (item) {
        // console.dir(self);
        // console.dir(item);
        self.$data.togglers[item].ison = false;
    });
};

/**
 * Switch off all togglers if any of them is open if a click on body has happened.
 * @param  bool     state   True if any of model's togglers is open. 
 * @param  Header   model   Header object.
 */
Header.prototype.manageBodyClick = function (state, model) {
    var vm = this;
    if (state) {
        document.body.addEventListener('click', _bodyClickHandler);
    } else {
        document.body.removeEventListener('click', _bodyClickHandler);
    }

    function _bodyClickHandler() {
        model.offTogglers.call(vm);
    }
};

var header = new Vue(new Header());

/***/ }),
/* 8 */
/***/ (function(module, exports) {

module.exports = Vue;

/***/ }),
/* 9 */
/***/ (function(module, exports) {

/**
 * The custom loop helper: where your request goes.
 * Marked as 4 times faster than named Underscore .each loop 
 * and equally fast as asm.js custom loop.
 * See here: https://jsperf.com/jquery-each-vs-underscore-each-vs-for-loops/11
 * 
 * @usage: see below.
 *
 * @param {Array | Array-like} [arr] - the array to process
 * @param {Function} [callback] - the callback function to process an array item.
 * The customEach passes `item` and `idx` (index) arguments to the callback. 
 * @returns {none}
 */

/* Usage:
    
// Get an array-like list of elements
elements = parent.querySelectorAll(par.clicktargets);

// Call the customEach via `ce` module defined earlier.
// Pass callback function clearSelected to process an elements' item.
// customEach ce.customEach(elements, clearSelected);

// The callback itself definition same as standard JS forEach.
function clearSelected(item, idx, arr) {
    console.log('Item: ' + item + ', index: ' + idx);
    console.dir(item.attributes);
}

*/

module.exports = function _customEach(arr, callback) {
    'use strict';
    var l = arr.length;
    for (var i = 0; i < l; i++) {
        callback(arr[i], i, arr);
    }

};

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var scrollDetector = __webpack_require__(11),
    inView = __webpack_require__(12);

var bar = document.getElementById('js-floating-menu-bar');
var placeholder = document.querySelector('.wj-menu-line-floating-wrapper');
inView.offset(-500);

scrollDetector.on('scroll:up', function () {
    if (inView.is(placeholder)) {
        bar.classList.remove('header-wrapper__menuline--floating');
        bar.classList.remove('wj-visible');
    } else {
        if (!bar.classList.contains('wj-visible')) {
            bar.classList.add('wj-visible');
        }
        if (!bar.classList.contains('header-wrapper__menuline--floating')) {
            bar.classList.add('header-wrapper__menuline--floating');
        }
    }
});

scrollDetector.on('scroll:down', function () {
    if (bar.classList.contains('wj-visible')) {
        bar.classList.remove('wj-visible');
    }
});

/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

!function(t,e){ true?module.exports=e():"function"==typeof define&&define.amd?define(e):t.scrollDetector=e()}(this,function(){"use strict";function t(){return r.scrollTop||l.scrollTop}function e(){if(!d){if(u=t(),!s)return s=u,void o.emit({type:"scroll"});var l=r.scrollHeight,m=window.innerHeight,h=l-m,y=Date.now(),w=u<=100||h<=u+100?0:100;if(p&&y<p+w)return clearTimeout(v),void(v=setTimeout(function(){p=y,e()},w));p=y;var g=u<=0,T=h<=u;if(!(Math.abs(u-s)<=1)||g||T){if(o.emit({type:"scroll"}),g)return c!==n&&(o.emit({type:"at:top"}),c=n),void(s=0);if(T)return c!==i&&(o.emit({type:"at:bottom"}),c=i),void(s=h);c=null;var x=m!==f;if(f=m,x)s=u;else{var _=a;a=u-s<0,s=u;null!==_&&_!==a&&(a&&o.emit({type:"change:up"}),a||o.emit({type:"change:down"})),a&&o.emit({type:"scroll:up"}),a||o.emit({type:"scroll:down"})}}}}var n=0,i=1,o=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this._listeners={}}return t.prototype.on=function(t,e){var n=this._listeners;void 0===n[t]&&(n[t]=[]),-1===n[t].indexOf(e)&&n[t].push(e)},t.prototype.hasListener=function(t,e){var n=this._listeners;return void 0!==n[t]&&-1!==n[t].indexOf(e)},t.prototype.off=function(t,e){var n=this._listeners[t];if(void 0!==n){var i=n.indexOf(e);-1!==i&&n.splice(i,1)}},t.prototype.emit=function(t){var e=this._listeners[t.type];if(void 0!==e){t.target=this;var n=[],i=0,o=e.length;for(i=0;i<o;i++)n[i]=e[i];for(i=0;i<o;i++)n[i].call(this,t)}},t}()),r=document.documentElement,l=document.body,u=null,s=null,f=window.innerHeight,c=null,d=!1,a=null,p=void 0,v=void 0;return o.mute=function(){d=!0},o.unmute=function(){s=t(),d=!1},o.getScrollTop=function(){return u},window.addEventListener("scroll",e),o});


/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

/*!
 * in-view 0.6.1 - Get notified when a DOM element enters or exits the viewport.
 * Copyright (c) 2016 Cam Wiegert <cam@camwiegert.com> - https://camwiegert.github.io/in-view
 * License: MIT
 */
!function(t,e){ true?module.exports=e():"function"==typeof define&&define.amd?define([],e):"object"==typeof exports?exports.inView=e():t.inView=e()}(this,function(){return function(t){function e(r){if(n[r])return n[r].exports;var i=n[r]={exports:{},id:r,loaded:!1};return t[r].call(i.exports,i,i.exports,e),i.loaded=!0,i.exports}var n={};return e.m=t,e.c=n,e.p="",e(0)}([function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}var i=n(2),o=r(i);t.exports=o["default"]},function(t,e){function n(t){var e=typeof t;return null!=t&&("object"==e||"function"==e)}t.exports=n},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}Object.defineProperty(e,"__esModule",{value:!0});var i=n(9),o=r(i),u=n(3),f=r(u),s=n(4),c=function(){if("undefined"!=typeof window){var t=100,e=["scroll","resize","load"],n={history:[]},r={offset:{},threshold:0,test:s.inViewport},i=(0,o["default"])(function(){n.history.forEach(function(t){n[t].check()})},t);e.forEach(function(t){return addEventListener(t,i)}),window.MutationObserver&&addEventListener("DOMContentLoaded",function(){new MutationObserver(i).observe(document.body,{attributes:!0,childList:!0,subtree:!0})});var u=function(t){if("string"==typeof t){var e=[].slice.call(document.querySelectorAll(t));return n.history.indexOf(t)>-1?n[t].elements=e:(n[t]=(0,f["default"])(e,r),n.history.push(t)),n[t]}};return u.offset=function(t){if(void 0===t)return r.offset;var e=function(t){return"number"==typeof t};return["top","right","bottom","left"].forEach(e(t)?function(e){return r.offset[e]=t}:function(n){return e(t[n])?r.offset[n]=t[n]:null}),r.offset},u.threshold=function(t){return"number"==typeof t&&t>=0&&t<=1?r.threshold=t:r.threshold},u.test=function(t){return"function"==typeof t?r.test=t:r.test},u.is=function(t){return r.test(t,r)},u.offset(0),u}};e["default"]=c()},function(t,e){"use strict";function n(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(e,"__esModule",{value:!0});var r=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}(),i=function(){function t(e,r){n(this,t),this.options=r,this.elements=e,this.current=[],this.handlers={enter:[],exit:[]},this.singles={enter:[],exit:[]}}return r(t,[{key:"check",value:function(){var t=this;return this.elements.forEach(function(e){var n=t.options.test(e,t.options),r=t.current.indexOf(e),i=r>-1,o=n&&!i,u=!n&&i;o&&(t.current.push(e),t.emit("enter",e)),u&&(t.current.splice(r,1),t.emit("exit",e))}),this}},{key:"on",value:function(t,e){return this.handlers[t].push(e),this}},{key:"once",value:function(t,e){return this.singles[t].unshift(e),this}},{key:"emit",value:function(t,e){for(;this.singles[t].length;)this.singles[t].pop()(e);for(var n=this.handlers[t].length;--n>-1;)this.handlers[t][n](e);return this}}]),t}();e["default"]=function(t,e){return new i(t,e)}},function(t,e){"use strict";function n(t,e){var n=t.getBoundingClientRect(),r=n.top,i=n.right,o=n.bottom,u=n.left,f=n.width,s=n.height,c={t:o,r:window.innerWidth-u,b:window.innerHeight-r,l:i},a={x:e.threshold*f,y:e.threshold*s};return c.t>e.offset.top+a.y&&c.r>e.offset.right+a.x&&c.b>e.offset.bottom+a.y&&c.l>e.offset.left+a.x}Object.defineProperty(e,"__esModule",{value:!0}),e.inViewport=n},function(t,e){(function(e){var n="object"==typeof e&&e&&e.Object===Object&&e;t.exports=n}).call(e,function(){return this}())},function(t,e,n){var r=n(5),i="object"==typeof self&&self&&self.Object===Object&&self,o=r||i||Function("return this")();t.exports=o},function(t,e,n){function r(t,e,n){function r(e){var n=x,r=m;return x=m=void 0,E=e,w=t.apply(r,n)}function a(t){return E=t,j=setTimeout(h,e),M?r(t):w}function l(t){var n=t-O,r=t-E,i=e-n;return _?c(i,g-r):i}function d(t){var n=t-O,r=t-E;return void 0===O||n>=e||n<0||_&&r>=g}function h(){var t=o();return d(t)?p(t):void(j=setTimeout(h,l(t)))}function p(t){return j=void 0,T&&x?r(t):(x=m=void 0,w)}function v(){void 0!==j&&clearTimeout(j),E=0,x=O=m=j=void 0}function y(){return void 0===j?w:p(o())}function b(){var t=o(),n=d(t);if(x=arguments,m=this,O=t,n){if(void 0===j)return a(O);if(_)return j=setTimeout(h,e),r(O)}return void 0===j&&(j=setTimeout(h,e)),w}var x,m,g,w,j,O,E=0,M=!1,_=!1,T=!0;if("function"!=typeof t)throw new TypeError(f);return e=u(e)||0,i(n)&&(M=!!n.leading,_="maxWait"in n,g=_?s(u(n.maxWait)||0,e):g,T="trailing"in n?!!n.trailing:T),b.cancel=v,b.flush=y,b}var i=n(1),o=n(8),u=n(10),f="Expected a function",s=Math.max,c=Math.min;t.exports=r},function(t,e,n){var r=n(6),i=function(){return r.Date.now()};t.exports=i},function(t,e,n){function r(t,e,n){var r=!0,f=!0;if("function"!=typeof t)throw new TypeError(u);return o(n)&&(r="leading"in n?!!n.leading:r,f="trailing"in n?!!n.trailing:f),i(t,e,{leading:r,maxWait:e,trailing:f})}var i=n(7),o=n(1),u="Expected a function";t.exports=r},function(t,e){function n(t){return t}t.exports=n}])});

/***/ })
/******/ ]);