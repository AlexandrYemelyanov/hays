/******/
(function (modules) { // webpackBootstrap
	/******/  // The module cache
	/******/
	var installedModules = {};
	/******/
	/******/  // The require function
	/******/
	function __webpack_require__(moduleId) {
		/******/
		/******/    // Check if module is in cache
		/******/
		if (installedModules[moduleId]) {
			/******/
			return installedModules[moduleId].exports;
			/******/
		}
		/******/    // Create a new module (and put it into the cache)
		/******/
		var module = installedModules[moduleId] = {
			/******/      i: moduleId,
			/******/      l: false,
			/******/      exports: {}
			/******/
		};
		/******/
		/******/    // Execute the module function
		/******/
		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
		/******/
		/******/    // Flag the module as loaded
		/******/
		module.l = true;
		/******/
		/******/    // Return the exports of the module
		/******/
		return module.exports;
		/******/
	}

	/******/
	/******/
	/******/  // expose the modules object (__webpack_modules__)
	/******/
	__webpack_require__.m = modules;
	/******/
	/******/  // expose the module cache
	/******/
	__webpack_require__.c = installedModules;
	/******/
	/******/  // define getter function for harmony exports
	/******/
	__webpack_require__.d = function (exports, name, getter) {
		/******/
		if (!__webpack_require__.o(exports, name)) {
			/******/
			Object.defineProperty(exports, name, {
				/******/        configurable: false,
				/******/        enumerable: true,
				/******/        get: getter
				/******/
			});
			/******/
		}
		/******/
	};
	/******/
	/******/  // getDefaultExport function for compatibility with non-harmony modules
	/******/
	__webpack_require__.n = function (module) {
		/******/
		var getter = module && module.__esModule ?
			/******/      function getDefault() {
				return module['default'];
			} :
			/******/      function getModuleExports() {
				return module;
			};
		/******/
		__webpack_require__.d(getter, 'a', getter);
		/******/
		return getter;
		/******/
	};
	/******/
	/******/  // Object.prototype.hasOwnProperty.call
	/******/
	__webpack_require__.o = function (object, property) {
		return Object.prototype.hasOwnProperty.call(object, property);
	};
	/******/
	/******/  // __webpack_public_path__
	/******/
	__webpack_require__.p = "";
	/******/
	/******/  // Load entry module and return exports
	/******/
	return __webpack_require__(__webpack_require__.s = 20);
	/******/
})
/************************************************************************/
/******/([
	/* 0 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var bind = __webpack_require__(14);
		var isBuffer = __webpack_require__(39);

		/*global toString:true*/

// utils is a library of generic helper functions non-specific to axios

		var toString = Object.prototype.toString;

		/**
		 * Determine if a value is an Array
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is an Array, otherwise false
		 */
		function isArray(val) {
			return toString.call(val) === '[object Array]';
		}

		/**
		 * Determine if a value is an ArrayBuffer
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is an ArrayBuffer, otherwise false
		 */
		function isArrayBuffer(val) {
			return toString.call(val) === '[object ArrayBuffer]';
		}

		/**
		 * Determine if a value is a FormData
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is an FormData, otherwise false
		 */
		function isFormData(val) {
			return (typeof FormData !== 'undefined') && (val instanceof FormData);
		}

		/**
		 * Determine if a value is a view on an ArrayBuffer
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is a view on an ArrayBuffer, otherwise false
		 */
		function isArrayBufferView(val) {
			var result;
			if ((typeof ArrayBuffer !== 'undefined') && (ArrayBuffer.isView)) {
				result = ArrayBuffer.isView(val);
			} else {
				result = (val) && (val.buffer) && (val.buffer instanceof ArrayBuffer);
			}
			return result;
		}

		/**
		 * Determine if a value is a String
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is a String, otherwise false
		 */
		function isString(val) {
			return typeof val === 'string';
		}

		/**
		 * Determine if a value is a Number
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is a Number, otherwise false
		 */
		function isNumber(val) {
			return typeof val === 'number';
		}

		/**
		 * Determine if a value is undefined
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if the value is undefined, otherwise false
		 */
		function isUndefined(val) {
			return typeof val === 'undefined';
		}

		/**
		 * Determine if a value is an Object
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is an Object, otherwise false
		 */
		function isObject(val) {
			return val !== null && typeof val === 'object';
		}

		/**
		 * Determine if a value is a Date
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is a Date, otherwise false
		 */
		function isDate(val) {
			return toString.call(val) === '[object Date]';
		}

		/**
		 * Determine if a value is a File
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is a File, otherwise false
		 */
		function isFile(val) {
			return toString.call(val) === '[object File]';
		}

		/**
		 * Determine if a value is a Blob
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is a Blob, otherwise false
		 */
		function isBlob(val) {
			return toString.call(val) === '[object Blob]';
		}

		/**
		 * Determine if a value is a Function
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is a Function, otherwise false
		 */
		function isFunction(val) {
			return toString.call(val) === '[object Function]';
		}

		/**
		 * Determine if a value is a Stream
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is a Stream, otherwise false
		 */
		function isStream(val) {
			return isObject(val) && isFunction(val.pipe);
		}

		/**
		 * Determine if a value is a URLSearchParams object
		 *
		 * @param {Object} val The value to test
		 * @returns {boolean} True if value is a URLSearchParams object, otherwise false
		 */
		function isURLSearchParams(val) {
			return typeof URLSearchParams !== 'undefined' && val instanceof URLSearchParams;
		}

		/**
		 * Trim excess whitespace off the beginning and end of a string
		 *
		 * @param {String} str The String to trim
		 * @returns {String} The String freed of excess whitespace
		 */
		function trim(str) {
			return str.replace(/^\s*/, '').replace(/\s*$/, '');
		}

		/**
		 * Determine if we're running in a standard browser environment
		 *
		 * This allows axios to run in a web worker, and react-native.
		 * Both environments support XMLHttpRequest, but not fully standard globals.
		 *
		 * web workers:
		 *  typeof window -> undefined
		 *  typeof document -> undefined
		 *
		 * react-native:
		 *  navigator.product -> 'ReactNative'
		 */
		function isStandardBrowserEnv() {
			if (typeof navigator !== 'undefined' && navigator.product === 'ReactNative') {
				return false;
			}
			return (
				typeof window !== 'undefined' &&
				typeof document !== 'undefined'
			);
		}

		/**
		 * Iterate over an Array or an Object invoking a function for each item.
		 *
		 * If `obj` is an Array callback will be called passing
		 * the value, index, and complete array for each item.
		 *
		 * If 'obj' is an Object callback will be called passing
		 * the value, key, and complete object for each property.
		 *
		 * @param {Object|Array} obj The object to iterate
		 * @param {Function} fn The callback to invoke for each item
		 */
		function forEach(obj, fn) {
			// Don't bother if no value provided
			if (obj === null || typeof obj === 'undefined') {
				return;
			}

			// Force an array if not already something iterable
			if (typeof obj !== 'object') {
				/*eslint no-param-reassign:0*/
				obj = [obj];
			}

			if (isArray(obj)) {
				// Iterate over array values
				for (var i = 0, l = obj.length; i < l; i++) {
					fn.call(null, obj[i], i, obj);
				}
			} else {
				// Iterate over object keys
				for (var key in obj) {
					if (Object.prototype.hasOwnProperty.call(obj, key)) {
						fn.call(null, obj[key], key, obj);
					}
				}
			}
		}

		/**
		 * Accepts varargs expecting each argument to be an object, then
		 * immutably merges the properties of each object and returns result.
		 *
		 * When multiple objects contain the same key the later object in
		 * the arguments list will take precedence.
		 *
		 * Example:
		 *
		 * ```js
		 * var result = merge({foo: 123}, {foo: 456});
		 * console.log(result.foo); // outputs 456
		 * ```
		 *
		 * @param {Object} obj1 Object to merge
		 * @returns {Object} Result of all merge properties
		 */
		function merge(/* obj1, obj2, obj3, ... */) {
			var result = {};

			function assignValue(val, key) {
				if (typeof result[key] === 'object' && typeof val === 'object') {
					result[key] = merge(result[key], val);
				} else {
					result[key] = val;
				}
			}

			for (var i = 0, l = arguments.length; i < l; i++) {
				forEach(arguments[i], assignValue);
			}
			return result;
		}

		/**
		 * Extends object a by mutably adding to it the properties of object b.
		 *
		 * @param {Object} a The object to be extended
		 * @param {Object} b The object to copy properties from
		 * @param {Object} thisArg The object to bind function to
		 * @return {Object} The resulting value of object a
		 */
		function extend(a, b, thisArg) {
			forEach(b, function assignValue(val, key) {
				if (thisArg && typeof val === 'function') {
					a[key] = bind(val, thisArg);
				} else {
					a[key] = val;
				}
			});
			return a;
		}

		module.exports = {
			isArray: isArray,
			isArrayBuffer: isArrayBuffer,
			isBuffer: isBuffer,
			isFormData: isFormData,
			isArrayBufferView: isArrayBufferView,
			isString: isString,
			isNumber: isNumber,
			isObject: isObject,
			isUndefined: isUndefined,
			isDate: isDate,
			isFile: isFile,
			isBlob: isBlob,
			isFunction: isFunction,
			isStream: isStream,
			isURLSearchParams: isURLSearchParams,
			isStandardBrowserEnv: isStandardBrowserEnv,
			forEach: forEach,
			merge: merge,
			extend: extend,
			trim: trim
		};

		/***/
	}),
	/* 1 */
	/***/ (function (module, exports) {

		module.exports = Vue;

		/***/
	}),
	/* 2 */
	/***/ (function (module, exports) {

		module.exports = function WidgetFilter(data) {
			'use strict';

			this.id = data ? data.id : null;
			this.name = data ? data.name : null;
		};

		/***/
	}),
	/* 3 */
	/***/ (function (module, exports) {

// shim for using process in browser
		var process = module.exports = {};

// cached from whatever global is present so that test runners that stub it
// don't break things.  But we need to wrap it in a try catch in case it is
// wrapped in strict mode code which doesn't define any globals.  It's inside a
// function because try/catches deoptimize in certain engines.

		var cachedSetTimeout;
		var cachedClearTimeout;

		function defaultSetTimout() {
			throw new Error('setTimeout has not been defined');
		}

		function defaultClearTimeout() {
			throw new Error('clearTimeout has not been defined');
		}

		(function () {
			try {
				if (typeof setTimeout === 'function') {
					cachedSetTimeout = setTimeout;
				} else {
					cachedSetTimeout = defaultSetTimout;
				}
			} catch (e) {
				cachedSetTimeout = defaultSetTimout;
			}
			try {
				if (typeof clearTimeout === 'function') {
					cachedClearTimeout = clearTimeout;
				} else {
					cachedClearTimeout = defaultClearTimeout;
				}
			} catch (e) {
				cachedClearTimeout = defaultClearTimeout;
			}
		}())

		function runTimeout(fun) {
			if (cachedSetTimeout === setTimeout) {
				//normal enviroments in sane situations
				return setTimeout(fun, 0);
			}
			// if setTimeout wasn't available but was latter defined
			if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
				cachedSetTimeout = setTimeout;
				return setTimeout(fun, 0);
			}
			try {
				// when when somebody has screwed with setTimeout but no I.E. maddness
				return cachedSetTimeout(fun, 0);
			} catch (e) {
				try {
					// When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
					return cachedSetTimeout.call(null, fun, 0);
				} catch (e) {
					// same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
					return cachedSetTimeout.call(this, fun, 0);
				}
			}

		}

		function runClearTimeout(marker) {
			if (cachedClearTimeout === clearTimeout) {
				//normal enviroments in sane situations
				return clearTimeout(marker);
			}
			// if clearTimeout wasn't available but was latter defined
			if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
				cachedClearTimeout = clearTimeout;
				return clearTimeout(marker);
			}
			try {
				// when when somebody has screwed with setTimeout but no I.E. maddness
				return cachedClearTimeout(marker);
			} catch (e) {
				try {
					// When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
					return cachedClearTimeout.call(null, marker);
				} catch (e) {
					// same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
					// Some versions of I.E. have different rules for clearTimeout vs setTimeout
					return cachedClearTimeout.call(this, marker);
				}
			}

		}

		var queue = [];
		var draining = false;
		var currentQueue;
		var queueIndex = -1;

		function cleanUpNextTick() {
			if (!draining || !currentQueue) {
				return;
			}
			draining = false;
			if (currentQueue.length) {
				queue = currentQueue.concat(queue);
			} else {
				queueIndex = -1;
			}
			if (queue.length) {
				drainQueue();
			}
		}

		function drainQueue() {
			if (draining) {
				return;
			}
			var timeout = runTimeout(cleanUpNextTick);
			draining = true;

			var len = queue.length;
			while (len) {
				currentQueue = queue;
				queue = [];
				while (++queueIndex < len) {
					if (currentQueue) {
						currentQueue[queueIndex].run();
					}
				}
				queueIndex = -1;
				len = queue.length;
			}
			currentQueue = null;
			draining = false;
			runClearTimeout(timeout);
		}

		process.nextTick = function (fun) {
			var args = new Array(arguments.length - 1);
			if (arguments.length > 1) {
				for (var i = 1; i < arguments.length; i++) {
					args[i - 1] = arguments[i];
				}
			}
			queue.push(new Item(fun, args));
			if (queue.length === 1 && !draining) {
				runTimeout(drainQueue);
			}
		};

// v8 likes predictible objects
		function Item(fun, array) {
			this.fun = fun;
			this.array = array;
		}

		Item.prototype.run = function () {
			this.fun.apply(null, this.array);
		};
		process.title = 'browser';
		process.browser = true;
		process.env = {};
		process.argv = [];
		process.version = ''; // empty string to avoid regexp issues
		process.versions = {};

		function noop() {
		}

		process.on = noop;
		process.addListener = noop;
		process.once = noop;
		process.off = noop;
		process.removeListener = noop;
		process.removeAllListeners = noop;
		process.emit = noop;
		process.prependListener = noop;
		process.prependOnceListener = noop;

		process.listeners = function (name) {
			return []
		}

		process.binding = function (name) {
			throw new Error('process.binding is not supported');
		};

		process.cwd = function () {
			return '/'
		};
		process.chdir = function (dir) {
			throw new Error('process.chdir is not supported');
		};
		process.umask = function () {
			return 0;
		};

		/***/
	}),
	/* 4 */
	/***/ (function (module, exports) {

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

		module.exports = function _customEach(arr=[], callback) {
			//'use strict';
			var l = arr.length;
			for (var i = 0; i < l; i++) {
				callback(arr[i], i, arr);
			}

		};

		/***/
	}),
	/* 5 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";
		/**
		 * Vue Simple Popup object with on, off, toggle, close on 'Esc' functionality.
		 */


		var Vue = __webpack_require__(1);

		/**
		 * Returns the default OnOff Vue setup base object
		 * for further custom extensions & eventual VM binding.
		 * @return {Vue setup object} The Vue compliant object prototype with OnOff ViewModel functionality.
		 */

		/**
		 * The ON/OFF state manager.
		 * @param string    sel       HTML selector
		 * @param bool      state     Initial state of the manager (ON - true, OFF - false (default))
		 * @param bool      watchbody Whether watch the click on body to change the manger's state or not.
		 *                            Default: false.
		 * @param bool      watchesc  Same as watchbody but for Esc key.
		 */
		var OnOffVueSetupPrototype = function (sel, state, watchbody, watchesc) {
			const wbody = (typeof watchbody !== 'undefined' ? watchbody : true),
				wesc = (typeof watchesc !== 'undefined' ? watchesc : true);
			this.el = sel;
			this.data = {
				ison: state ? true : false,
				settings: this.settings
			};
			this.methods = {
				_on: function () {
					this.ison = true;
				},
				_off: function () {
					this.ison = false;
				},
				_toggle: function () {
					this.ison = !this.ison;
				}
			};
			this.watch = {
				ison: function (state) {
					wbody && OnOffVueSetupPrototype.prototype.manageEsc(state, this);
					wesc && OnOffVueSetupPrototype.prototype.manageBodyClick(state, this);
				}
			};
		};

		OnOffVueSetupPrototype.prototype.manageEsc = function (state, vm) {
			if (state) {
				document.addEventListener('keyup', _escHandler);
			} else {
				document.removeEventListener('keyup', _escHandler);
			}

			function _escHandler(evt) {
				if (evt.keyCode === 27) {
					vm._off();
				}
			}
		};

		OnOffVueSetupPrototype.prototype.manageBodyClick = function (state, vm) {
			if (state) {
				document.body.addEventListener('click', _bodyClickHandler);
			} else {
				document.body.removeEventListener('click', _bodyClickHandler);
			}

			function _bodyClickHandler() {
				vm._off();
			}
		};

		/**
		 * Returns the OnOff ViewModel instance bound to the provided selector.
		 * @param  {String}                 sel     DOM selector string
		 * @return {Vue instance object}            The configured OnOff ViewModel instance
		 *                                          mounted on the 'sel' DOM element.
		 */
		function _init(sel, state, wbody, wesc) {
			return new Vue(new OnOffVueSetupPrototype(sel, state, wbody, wesc));
		}

		module.exports = {
			init: _init,
			OnOffVueSetupPrototype: OnOffVueSetupPrototype
		};

		/***/
	}),
	/* 6 */
	/***/ (function (module, exports, __webpack_require__) {

		module.exports = __webpack_require__(38);

		/***/
	}),
	/* 7 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";
		/* WEBPACK VAR INJECTION */
		(function (process) {

			var utils = __webpack_require__(0);
			var normalizeHeaderName = __webpack_require__(41);

			var DEFAULT_CONTENT_TYPE = {
				'Content-Type': 'application/x-www-form-urlencoded'
			};

			function setContentTypeIfUnset(headers, value) {
				if (!utils.isUndefined(headers) && utils.isUndefined(headers['Content-Type'])) {
					headers['Content-Type'] = value;
				}
			}

			function getDefaultAdapter() {
				var adapter;
				if (typeof XMLHttpRequest !== 'undefined') {
					// For browsers use XHR adapter
					adapter = __webpack_require__(15);
				} else if (typeof process !== 'undefined') {
					// For node use HTTP adapter
					adapter = __webpack_require__(15);
				}
				return adapter;
			}

			var defaults = {
				adapter: getDefaultAdapter(),

				transformRequest: [function transformRequest(data, headers) {
					normalizeHeaderName(headers, 'Content-Type');
					if (utils.isFormData(data) ||
						utils.isArrayBuffer(data) ||
						utils.isBuffer(data) ||
						utils.isStream(data) ||
						utils.isFile(data) ||
						utils.isBlob(data)
					) {
						return data;
					}
					if (utils.isArrayBufferView(data)) {
						return data.buffer;
					}
					if (utils.isURLSearchParams(data)) {
						setContentTypeIfUnset(headers, 'application/x-www-form-urlencoded;charset=utf-8');
						return data.toString();
					}
					if (utils.isObject(data)) {
						setContentTypeIfUnset(headers, 'application/json;charset=utf-8');
						return JSON.stringify(data);
					}
					return data;
				}],

				transformResponse: [function transformResponse(data) {
					/*eslint no-param-reassign:0*/
					if (typeof data === 'string') {
						try {
							data = JSON.parse(data);
						} catch (e) { /* Ignore */
						}
					}
					return data;
				}],

				/**
				 * A timeout in milliseconds to abort a request. If set to 0 (default) a
				 * timeout is not created.
				 */
				timeout: 0,

				xsrfCookieName: 'XSRF-TOKEN',
				xsrfHeaderName: 'X-XSRF-TOKEN',

				maxContentLength: -1,

				validateStatus: function validateStatus(status) {
					return status >= 200 && status < 300;
				}
			};

			defaults.headers = {
				common: {
					'Accept': 'application/json, text/plain, */*'
				}
			};

			utils.forEach(['delete', 'get', 'head'], function forEachMethodNoData(method) {
				defaults.headers[method] = {};
			});

			utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
				defaults.headers[method] = utils.merge(DEFAULT_CONTENT_TYPE);
			});

			module.exports = defaults;

			/* WEBPACK VAR INJECTION */
		}.call(exports, __webpack_require__(3)))

		/***/
	}),
	/* 8 */
	/***/ (function (module, exports, __webpack_require__) {

		var WidgetFilter = __webpack_require__(2);

		module.exports = function ControlbarFilter(data) {
			'use strict';

			WidgetFilter.call(this, data);
		};

		/***/
	}),
	/* 9 */
	/***/ (function (module, exports, __webpack_require__) {

		var WidgetFilter = __webpack_require__(2),
			PaymentRange = __webpack_require__(19);

		module.exports = function PaymentFilter(data) {
			'use strict';

			WidgetFilter.call(this, data);
			this.range = data && data.range ? data.range : new PaymentRange();
		};

		/***/
	}),
	/* 10 */
	/***/ (function (module, exports) {

		module.exports = function () {
			'use strict';

			return {
				w: window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth,
				h: window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight,
				ratio: window.devicePixelRatio
			};
		}();

		/***/
	}),
	/* 11 */
	/***/ (function (module, exports, __webpack_require__) {

		!function (t, e) {
			true ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : t.scrollDetector = e()
		}(this, function () {
			"use strict";

			function t() {
				return r.scrollTop || l.scrollTop
			}

			function e() {
				if (!d) {
					if (u = t(), !s) return s = u, void o.emit({type: "scroll"});
					var l = r.scrollHeight, m = window.innerHeight, h = l - m, y = Date.now(),
						w = u <= 100 || h <= u + 100 ? 0 : 100;
					if (p && y < p + w) return clearTimeout(v), void (v = setTimeout(function () {
						p = y, e()
					}, w));
					p = y;
					var g = u <= 0, T = h <= u;
					if (!(Math.abs(u - s) <= 1) || g || T) {
						if (o.emit({type: "scroll"}), g) return c !== n && (o.emit({type: "at:top"}), c = n), void (s = 0);
						if (T) return c !== i && (o.emit({type: "at:bottom"}), c = i), void (s = h);
						c = null;
						var x = m !== f;
						if (f = m, x) s = u; else {
							var _ = a;
							a = u - s < 0, s = u;
							null !== _ && _ !== a && (a && o.emit({type: "change:up"}), a || o.emit({type: "change:down"})), a && o.emit({type: "scroll:up"}), a || o.emit({type: "scroll:down"})
						}
					}
				}
			}

			var n = 0, i = 1, o = new (function () {
					function t() {
						!function (t, e) {
							if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
						}(this, t), this._listeners = {}
					}

					return t.prototype.on = function (t, e) {
						var n = this._listeners;
						void 0 === n[t] && (n[t] = []), -1 === n[t].indexOf(e) && n[t].push(e)
					}, t.prototype.hasListener = function (t, e) {
						var n = this._listeners;
						return void 0 !== n[t] && -1 !== n[t].indexOf(e)
					}, t.prototype.off = function (t, e) {
						var n = this._listeners[t];
						if (void 0 !== n) {
							var i = n.indexOf(e);
							-1 !== i && n.splice(i, 1)
						}
					}, t.prototype.emit = function (t) {
						var e = this._listeners[t.type];
						if (void 0 !== e) {
							t.target = this;
							var n = [], i = 0, o = e.length;
							for (i = 0; i < o; i++) n[i] = e[i];
							for (i = 0; i < o; i++) n[i].call(this, t)
						}
					}, t
				}()), r = document.documentElement, l = document.body, u = null, s = null, f = window.innerHeight, c = null,
				d = !1, a = null, p = void 0, v = void 0;
			return o.mute = function () {
				d = !0
			}, o.unmute = function () {
				s = t(), d = !1
			}, o.getScrollTop = function () {
				return u
			}, window.addEventListener("scroll", e), o
		});

		/***/
	}),
	/* 12 */
	/***/ (function (module, exports, __webpack_require__) {

		/*!
 * in-view 0.6.1 - Get notified when a DOM element enters or exits the viewport.
 * Copyright (c) 2016 Cam Wiegert <cam@camwiegert.com> - https://camwiegert.github.io/in-view
 * License: MIT
 */
		!function (t, e) {
			true ? module.exports = e() : "function" == typeof define && define.amd ? define([], e) : "object" == typeof exports ? exports.inView = e() : t.inView = e()
		}(this, function () {
			return function (t) {
				function e(r) {
					if (n[r]) return n[r].exports;
					var i = n[r] = {exports: {}, id: r, loaded: !1};
					return t[r].call(i.exports, i, i.exports, e), i.loaded = !0, i.exports
				}

				var n = {};
				return e.m = t, e.c = n, e.p = "", e(0)
			}([function (t, e, n) {
				"use strict";

				function r(t) {
					return t && t.__esModule ? t : {"default": t}
				}

				var i = n(2), o = r(i);
				t.exports = o["default"]
			}, function (t, e) {
				function n(t) {
					var e = typeof t;
					return null != t && ("object" == e || "function" == e)
				}

				t.exports = n
			}, function (t, e, n) {
				"use strict";

				function r(t) {
					return t && t.__esModule ? t : {"default": t}
				}

				Object.defineProperty(e, "__esModule", {value: !0});
				var i = n(9), o = r(i), u = n(3), f = r(u), s = n(4), c = function () {
					if ("undefined" != typeof window) {
						var t = 100, e = ["scroll", "resize", "load"], n = {history: []},
							r = {offset: {}, threshold: 0, test: s.inViewport}, i = (0, o["default"])(function () {
								n.history.forEach(function (t) {
									n[t].check()
								})
							}, t);
						e.forEach(function (t) {
							return addEventListener(t, i)
						}), window.MutationObserver && addEventListener("DOMContentLoaded", function () {
							new MutationObserver(i).observe(document.body, {attributes: !0, childList: !0, subtree: !0})
						});
						var u = function (t) {
							if ("string" == typeof t) {
								var e = [].slice.call(document.querySelectorAll(t));
								return n.history.indexOf(t) > -1 ? n[t].elements = e : (n[t] = (0, f["default"])(e, r), n.history.push(t)), n[t]
							}
						};
						return u.offset = function (t) {
							if (void 0 === t) return r.offset;
							var e = function (t) {
								return "number" == typeof t
							};
							return ["top", "right", "bottom", "left"].forEach(e(t) ? function (e) {
								return r.offset[e] = t
							} : function (n) {
								return e(t[n]) ? r.offset[n] = t[n] : null
							}), r.offset
						}, u.threshold = function (t) {
							return "number" == typeof t && t >= 0 && t <= 1 ? r.threshold = t : r.threshold
						}, u.test = function (t) {
							return "function" == typeof t ? r.test = t : r.test
						}, u.is = function (t) {
							return r.test(t, r)
						}, u.offset(0), u
					}
				};
				e["default"] = c()
			}, function (t, e) {
				"use strict";

				function n(t, e) {
					if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
				}

				Object.defineProperty(e, "__esModule", {value: !0});
				var r = function () {
					function t(t, e) {
						for (var n = 0; n < e.length; n++) {
							var r = e[n];
							r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(t, r.key, r)
						}
					}

					return function (e, n, r) {
						return n && t(e.prototype, n), r && t(e, r), e
					}
				}(), i = function () {
					function t(e, r) {
						n(this, t), this.options = r, this.elements = e, this.current = [], this.handlers = {
							enter: [],
							exit: []
						}, this.singles = {enter: [], exit: []}
					}

					return r(t, [{
						key: "check", value: function () {
							var t = this;
							return this.elements.forEach(function (e) {
								var n = t.options.test(e, t.options), r = t.current.indexOf(e), i = r > -1, o = n && !i,
									u = !n && i;
								o && (t.current.push(e), t.emit("enter", e)), u && (t.current.splice(r, 1), t.emit("exit", e))
							}), this
						}
					}, {
						key: "on", value: function (t, e) {
							return this.handlers[t].push(e), this
						}
					}, {
						key: "once", value: function (t, e) {
							return this.singles[t].unshift(e), this
						}
					}, {
						key: "emit", value: function (t, e) {
							for (; this.singles[t].length;) this.singles[t].pop()(e);
							for (var n = this.handlers[t].length; --n > -1;) this.handlers[t][n](e);
							return this
						}
					}]), t
				}();
				e["default"] = function (t, e) {
					return new i(t, e)
				}
			}, function (t, e) {
				"use strict";

				function n(t, e) {
					var n = t.getBoundingClientRect(), r = n.top, i = n.right, o = n.bottom, u = n.left, f = n.width,
						s = n.height, c = {t: o, r: window.innerWidth - u, b: window.innerHeight - r, l: i},
						a = {x: e.threshold * f, y: e.threshold * s};
					return c.t > e.offset.top + a.y && c.r > e.offset.right + a.x && c.b > e.offset.bottom + a.y && c.l > e.offset.left + a.x
				}

				Object.defineProperty(e, "__esModule", {value: !0}), e.inViewport = n
			}, function (t, e) {
				(function (e) {
					var n = "object" == typeof e && e && e.Object === Object && e;
					t.exports = n
				}).call(e, function () {
					return this
				}())
			}, function (t, e, n) {
				var r = n(5), i = "object" == typeof self && self && self.Object === Object && self,
					o = r || i || Function("return this")();
				t.exports = o
			}, function (t, e, n) {
				function r(t, e, n) {
					function r(e) {
						var n = x, r = m;
						return x = m = void 0, E = e, w = t.apply(r, n)
					}

					function a(t) {
						return E = t, j = setTimeout(h, e), M ? r(t) : w
					}

					function l(t) {
						var n = t - O, r = t - E, i = e - n;
						return _ ? c(i, g - r) : i
					}

					function d(t) {
						var n = t - O, r = t - E;
						return void 0 === O || n >= e || n < 0 || _ && r >= g
					}

					function h() {
						var t = o();
						return d(t) ? p(t) : void (j = setTimeout(h, l(t)))
					}

					function p(t) {
						return j = void 0, T && x ? r(t) : (x = m = void 0, w)
					}

					function v() {
						void 0 !== j && clearTimeout(j), E = 0, x = O = m = j = void 0
					}

					function y() {
						return void 0 === j ? w : p(o())
					}

					function b() {
						var t = o(), n = d(t);
						if (x = arguments, m = this, O = t, n) {
							if (void 0 === j) return a(O);
							if (_) return j = setTimeout(h, e), r(O)
						}
						return void 0 === j && (j = setTimeout(h, e)), w
					}

					var x, m, g, w, j, O, E = 0, M = !1, _ = !1, T = !0;
					if ("function" != typeof t) throw new TypeError(f);
					return e = u(e) || 0, i(n) && (M = !!n.leading, _ = "maxWait" in n, g = _ ? s(u(n.maxWait) || 0, e) : g, T = "trailing" in n ? !!n.trailing : T), b.cancel = v, b.flush = y, b
				}

				var i = n(1), o = n(8), u = n(10), f = "Expected a function", s = Math.max, c = Math.min;
				t.exports = r
			}, function (t, e, n) {
				var r = n(6), i = function () {
					return r.Date.now()
				};
				t.exports = i
			}, function (t, e, n) {
				function r(t, e, n) {
					var r = !0, f = !0;
					if ("function" != typeof t) throw new TypeError(u);
					return o(n) && (r = "leading" in n ? !!n.leading : r, f = "trailing" in n ? !!n.trailing : f), i(t, e, {
						leading: r,
						maxWait: e,
						trailing: f
					})
				}

				var i = n(7), o = n(1), u = "Expected a function";
				t.exports = r
			}, function (t, e) {
				function n(t) {
					return t
				}

				t.exports = n
			}])
		});

		/***/
	}),
	/* 13 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var Vue = __webpack_require__(1),
			axios = __webpack_require__(6);

		var ContextFieldDropDown = __webpack_require__(56);

		var template = __webpack_require__(60);

		var FormVacancySearch = function FormVacancySearch() {
			var self = this;
			this.settings = {
				api: window.haysApp.variables.apilookup
			};
			this.template = template;
			this.components = {
				'context-field-drop-down': ContextFieldDropDown
			};
			this.props = {
				init: Object
			};

			this.mounted = function () {
				if (this.$props && this.$props.init) {
					this.$data.contextsearch.text = this.$props.init.text;
					this.$data.contextsearch.location = this.$props.init.location;
				} // if (this.$props.init && this.$props.init.text) {
				//     this.$data.firstrun = true;
				// }

				this.$on('cfdropdown:input', function (payload) {
					this.$data.contextsearch[payload.field] = payload.value;
				});
			};

			this.data = function () {
				return {
					api: window.haysApp.variables.apilookup,
					contextsearch: {
						text: null,
						location: null
					},
					hrefstring: null
				};
			};

			this.computed = {
				isdisabled: function isdisabled() {
					return (!this.$data.contextsearch.text || this.$data.contextsearch.text === '') && (!this.$data.contextsearch.location || this.$data.contextsearch.location === '');
				}
			};
			this.watch = {
				contextsearch: {
					handler: function handler(newValue) {
						var istext = newValue.text && newValue.text !== '',
							islocation = newValue.location && newValue.location !== '';
						var text = istext ? "&text=".concat(newValue.text) : '';
						var location = islocation ? "&location=".concat(newValue.location) : '';
						this.$data.hrefstring = "search?".concat(text).concat(location);

						if (!istext && !islocation) {
							this.$root.$emit('contextsearch:changed', {
								text: null,
								location: null
							});
						}
					},
					deep: true
				}
			};
			this.methods = {
				changeFields: function changeFields(text, location) {
					var fields = {
						text: text,
						location: location
					};
					this.$root.$emit('contextsearch:changed', fields);
				}
			}; // console.dir(this);
			// Vue.component('form-vacancy-search', this);
		};

		module.exports = new FormVacancySearch();

		/***/
	}),
	/* 14 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		module.exports = function bind(fn, thisArg) {
			return function wrap() {
				var args = new Array(arguments.length);
				for (var i = 0; i < args.length; i++) {
					args[i] = arguments[i];
				}
				return fn.apply(thisArg, args);
			};
		};

		/***/
	}),
	/* 15 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";
		/* WEBPACK VAR INJECTION */
		(function (process) {

			var utils = __webpack_require__(0);
			var settle = __webpack_require__(42);
			var buildURL = __webpack_require__(44);
			var parseHeaders = __webpack_require__(45);
			var isURLSameOrigin = __webpack_require__(46);
			var createError = __webpack_require__(16);
			var btoa = (typeof window !== 'undefined' && window.btoa && window.btoa.bind(window)) || __webpack_require__(47);

			module.exports = function xhrAdapter(config) {
				return new Promise(function dispatchXhrRequest(resolve, reject) {
					var requestData = config.data;
					var requestHeaders = config.headers;

					if (utils.isFormData(requestData)) {
						delete requestHeaders['Content-Type']; // Let the browser set it
					}

					var request = new XMLHttpRequest();
					var loadEvent = 'onreadystatechange';
					var xDomain = false;

					// For IE 8/9 CORS support
					// Only supports POST and GET calls and doesn't returns the response headers.
					// DON'T do this for testing b/c XMLHttpRequest is mocked, not XDomainRequest.
					if (process.env.NODE_ENV !== 'test' &&
						typeof window !== 'undefined' &&
						window.XDomainRequest && !('withCredentials' in request) &&
						!isURLSameOrigin(config.url)) {
						request = new window.XDomainRequest();
						loadEvent = 'onload';
						xDomain = true;
						request.onprogress = function handleProgress() {
						};
						request.ontimeout = function handleTimeout() {
						};
					}

					// HTTP basic authentication
					if (config.auth) {
						var username = config.auth.username || '';
						var password = config.auth.password || '';
						requestHeaders.Authorization = 'Basic ' + btoa(username + ':' + password);
					}

					request.open(config.method.toUpperCase(), buildURL(config.url, config.params, config.paramsSerializer), true);

					// Set the request timeout in MS
					request.timeout = config.timeout;

					// Listen for ready state
					request[loadEvent] = function handleLoad() {
						if (!request || (request.readyState !== 4 && !xDomain)) {
							return;
						}

						// The request errored out and we didn't get a response, this will be
						// handled by onerror instead
						// With one exception: request that using file: protocol, most browsers
						// will return status as 0 even though it's a successful request
						if (request.status === 0 && !(request.responseURL && request.responseURL.indexOf('file:') === 0)) {
							return;
						}

						// Prepare the response
						var responseHeaders = 'getAllResponseHeaders' in request ? parseHeaders(request.getAllResponseHeaders()) : null;
						var responseData = !config.responseType || config.responseType === 'text' ? request.responseText : request.response;
						var response = {
							data: responseData,
							// IE sends 1223 instead of 204 (https://github.com/axios/axios/issues/201)
							status: request.status === 1223 ? 204 : request.status,
							statusText: request.status === 1223 ? 'No Content' : request.statusText,
							headers: responseHeaders,
							config: config,
							request: request
						};

						settle(resolve, reject, response);

						// Clean up request
						request = null;
					};

					// Handle low level network errors
					request.onerror = function handleError() {
						// Real errors are hidden from us by the browser
						// onerror should only fire if it's a network error
						reject(createError('Network Error', config, null, request));

						// Clean up request
						request = null;
					};

					// Handle timeout
					request.ontimeout = function handleTimeout() {
						reject(createError('timeout of ' + config.timeout + 'ms exceeded', config, 'ECONNABORTED',
							request));

						// Clean up request
						request = null;
					};

					// Add xsrf header
					// This is only done if running in a standard browser environment.
					// Specifically not if we're in a web worker, or react-native.
					if (utils.isStandardBrowserEnv()) {
						var cookies = __webpack_require__(48);

						// Add xsrf header
						var xsrfValue = (config.withCredentials || isURLSameOrigin(config.url)) && config.xsrfCookieName ?
							cookies.read(config.xsrfCookieName) :
							undefined;

						if (xsrfValue) {
							requestHeaders[config.xsrfHeaderName] = xsrfValue;
						}
					}

					// Add headers to the request
					if ('setRequestHeader' in request) {
						utils.forEach(requestHeaders, function setRequestHeader(val, key) {
							if (typeof requestData === 'undefined' && key.toLowerCase() === 'content-type') {
								// Remove Content-Type if data is undefined
								delete requestHeaders[key];
							} else {
								// Otherwise add header to the request
								request.setRequestHeader(key, val);
							}
						});
					}

					// Add withCredentials to request if needed
					if (config.withCredentials) {
						request.withCredentials = true;
					}

					// Add responseType to request if needed
					if (config.responseType) {
						try {
							request.responseType = config.responseType;
						} catch (e) {
							// Expected DOMException thrown by browsers not compatible XMLHttpRequest Level 2.
							// But, this can be suppressed for 'json' type as it can be parsed by default 'transformResponse' function.
							if (config.responseType !== 'json') {
								throw e;
							}
						}
					}

					// Handle progress if needed
					if (typeof config.onDownloadProgress === 'function') {
						request.addEventListener('progress', config.onDownloadProgress);
					}

					// Not all browsers support upload events
					if (typeof config.onUploadProgress === 'function' && request.upload) {
						request.upload.addEventListener('progress', config.onUploadProgress);
					}

					if (config.cancelToken) {
						// Handle cancellation
						config.cancelToken.promise.then(function onCanceled(cancel) {
							if (!request) {
								return;
							}

							request.abort();
							reject(cancel);
							// Clean up request
							request = null;
						});
					}

					if (requestData === undefined) {
						requestData = null;
					}

					// Send the request
					request.send(requestData);
				});
			};

			/* WEBPACK VAR INJECTION */
		}.call(exports, __webpack_require__(3)))

		/***/
	}),
	/* 16 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var enhanceError = __webpack_require__(43);

		/**
		 * Create an Error with the specified message, config, error code, request and response.
		 *
		 * @param {string} message The error message.
		 * @param {Object} config The config.
		 * @param {string} [code] The error code (for example, 'ECONNABORTED').
		 * @param {Object} [request] The request.
		 * @param {Object} [response] The response.
		 * @returns {Error} The created error.
		 */
		module.exports = function createError(message, config, code, request, response) {
			var error = new Error(message);
			return enhanceError(error, config, code, request, response);
		};

		/***/
	}),
	/* 17 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		module.exports = function isCancel(value) {
			return !!(value && value.__CANCEL__);
		};

		/***/
	}),
	/* 18 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		/**
		 * A `Cancel` is an object that is thrown when an operation is canceled.
		 *
		 * @class
		 * @param {string=} message The message.
		 */
		function Cancel(message) {
			this.message = message;
		}

		Cancel.prototype.toString = function toString() {
			return 'Cancel' + (this.message ? ': ' + this.message : '');
		};

		Cancel.prototype.__CANCEL__ = true;

		module.exports = Cancel;

		/***/
	}),
	/* 19 */
	/***/ (function (module, exports, __webpack_require__) {

		var WidgetFilter = __webpack_require__(2);

		module.exports = function PaymentRange(data) {
			'use strict';

			WidgetFilter.call(this, data);
		};

		/***/
	}),
	/* 20 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var dclhandler = false;

		var RhyApp = __webpack_require__(21),
			toast = __webpack_require__(23),
			// loadScript = require('Node/load-script/index'), // Needed to load Google Maps API
// inView = require('Node/in-view/dist/in-view.min'),
// delay = require('GeneralLib/async/_delay'),
// OnScreen = require('Node/onscreen/dist/on-screen.umd.min'),
			deepmerge = __webpack_require__(24);

		__webpack_require__(25);
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

				if (window.rhyApp.project && window.rhyApp.project.env) {
					window.rhyApp.init.libs.vue = window.rhyApp.settings.vue[window.rhyApp.project.env];
				} else {
					window.rhyApp.init.libs.vue = window.rhyApp.settings.vue.prod;
				}
			} else {
				window.rhyApp = app;
				window.rhyApp.init.libs.vue = window.rhyApp.settings.vue.prod;
			}
			/**
			 * Setup the event to signal VueJS is loaded and its handler.
			 */


			document.addEventListener('vueready', vueReady);
			toast(window.rhyApp.init.libs.vue, function () {
				document.dispatchEvent(window.rhyApp.events.vueready);
			});

			__webpack_require__(28)(1000);
		}

		/**
		 * Load VueJS-dependent modules.
		 */


		function vueReady() {
			console.log('vueReady worked...');

			__webpack_require__(30);

			document.querySelector('#vm-site-menu-directions') && __webpack_require__(32);
			document.querySelector('#vm-widget-practices') && __webpack_require__(33);
			document.querySelector('#vm-collapser') && __webpack_require__(5).init('#vm-collapser', false, false, false);
			document.querySelector('#vm-search') && __webpack_require__(34);
			document.querySelector('#vm-banner-vs') && __webpack_require__(66);

			__webpack_require__(67);
		}

		/***/
	}),
	/* 21 */
	/***/ (function (module, exports, __webpack_require__) {

		/**
		 * The RhyApp application main setup object
		 */

		var createEvents = __webpack_require__(22);

		module.exports = function RhyApp() {
			'use strict';
			// this.name = name;
			this.events = {
				koready: createEvents('koready'),
				vueready: createEvents('vueready'),
				atfloaded: createEvents('atfloaded'),
				loadedpagescount: createEvents('loadedpagescount', {data: null}),
				loadedpagecontent: createEvents('loadedpagecontent', {data: null})
			};
			this.settings = {
				mode: 'dev',
				vue: {
					dev: '//cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js',
					stage: '//cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js',
					prod: '//cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js'
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

		/***/
	}),
	/* 22 */
	/***/ (function (module, exports) {

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

		/***/
	}),
	/* 23 */
	/***/ (function (module, exports, __webpack_require__) {

		var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;
		!function (e, t) {
			true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
				return e.toast = t()
			}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
			__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : "object" == typeof exports ? module.exports = t() : e.toast = t()
		}(this, function () {
			function e() {
				var e = document.getElementsByTagName("head")[0], n = function (t) {
					if (e) {
						if (t.length) {
							for (var a, r, c = -1; a = t[++c];) if ("string" == typeof a) o(a); else if ("function" == typeof a) {
								r = a;
								break
							}
							i(r, Array.prototype.slice.call(t, c + 1))
						}
					} else setTimeout(function () {
						n(t)
					}, 50)
				}, o = function (n) {
					var o, i, r = /\.(\w+)$/.exec(n), c = /^\[(\w+)\](.+)/.exec(n);
					if (null !== c) o = c[1], n = c[2]; else {
						if (null === r) return;
						o = r[1]
					}
					if (!(n in t)) switch (t[n] = !1, o) {
						case"js":
							i = document.createElement("script"), i.src = n, i.async = !1, e.appendChild(i);
							var f = navigator.appVersion.match(/MSIE (\d)/);
							null !== f && parseInt(f[1], 10) < 9 ? i.onreadystatechange = function () {
								/ded|co/.test(this.readyState) && (t[n] = !0, i.onreadystatechange = null)
							} : i.onload = function () {
								t[n] = !0, i.onload = null
							};
							break;
						case"css":
							i = document.createElement("link"), i.rel = "styleSheet", i.href = n, e.appendChild(i), a(i, n);
							break;
						default:
							return void delete t[n]
					}
				}, i = function (e, o) {
					for (var a in t) if (!t[a]) return void setTimeout(function () {
						i(e, o)
					}, 50);
					"function" == typeof e && e(), n(o)
				}, a = function (e, n) {
					e.sheet || e.styleSheet ? t[n] = !0 : setTimeout(function () {
						a(e, n)
					}, 50)
				};
				n(arguments)
			}

			var t = {};
			return e
		});

		/***/
	}),
	/* 24 */
	/***/ (function (module, exports, __webpack_require__) {

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
			source.forEach(function (e, i) {
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
				Object.keys(target).forEach(function (key) {
					destination[key] = cloneIfNecessary(target[key], optionsArgument);
				});
			}
			Object.keys(source).forEach(function (key) {
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
			var options = optionsArgument || {arrayMerge: defaultArrayMerge};
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
			return array.reduce(function (prev, next) {
				return deepmerge(prev, next, optionsArgument)
			})
		};

		var deepmerge_1 = deepmerge;

		module.exports = deepmerge_1;

		/***/
	}),
	/* 25 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";
// This file can be required in Browserify and Node.js for automatic polyfill
// To use it:  require('es6-promise/auto');

		module.exports = __webpack_require__(26).polyfill();

		/***/
	}),
	/* 26 */
	/***/ (function (module, exports, __webpack_require__) {

		/* WEBPACK VAR INJECTION */
		(function (process, global) {/*!
 * @overview es6-promise - a tiny implementation of Promises/A+.
 * @copyright Copyright (c) 2014 Yehuda Katz, Tom Dale, Stefan Penner and contributors (Conversion to ES6 API by Jake Archibald)
 * @license   Licensed under MIT license
 *            See https://raw.githubusercontent.com/stefanpenner/es6-promise/master/LICENSE
 * @version   v4.2.4+314e4831
 */

			(function (global, factory) {
				true ? module.exports = factory() :
					typeof define === 'function' && define.amd ? define(factory) :
						(global.ES6Promise = factory());
			}(this, (function () {
				'use strict';

				function objectOrFunction(x) {
					var type = typeof x;
					return x !== null && (type === 'object' || type === 'function');
				}

				function isFunction(x) {
					return typeof x === 'function';
				}

				var _isArray = void 0;
				if (Array.isArray) {
					_isArray = Array.isArray;
				} else {
					_isArray = function (x) {
						return Object.prototype.toString.call(x) === '[object Array]';
					};
				}

				var isArray = _isArray;

				var len = 0;
				var vertxNext = void 0;
				var customSchedulerFn = void 0;

				var asap = function asap(callback, arg) {
					queue[len] = callback;
					queue[len + 1] = arg;
					len += 2;
					if (len === 2) {
						// If len is 2, that means that we need to schedule an async flush.
						// If additional callbacks are queued before the queue is flushed, they
						// will be processed by this flush that we are scheduling.
						if (customSchedulerFn) {
							customSchedulerFn(flush);
						} else {
							scheduleFlush();
						}
					}
				};

				function setScheduler(scheduleFn) {
					customSchedulerFn = scheduleFn;
				}

				function setAsap(asapFn) {
					asap = asapFn;
				}

				var browserWindow = typeof window !== 'undefined' ? window : undefined;
				var browserGlobal = browserWindow || {};
				var BrowserMutationObserver = browserGlobal.MutationObserver || browserGlobal.WebKitMutationObserver;
				var isNode = typeof self === 'undefined' && typeof process !== 'undefined' && {}.toString.call(process) === '[object process]';

// test for web worker but not in IE10
				var isWorker = typeof Uint8ClampedArray !== 'undefined' && typeof importScripts !== 'undefined' && typeof MessageChannel !== 'undefined';

// node
				function useNextTick() {
					// node version 0.10.x displays a deprecation warning when nextTick is used recursively
					// see https://github.com/cujojs/when/issues/410 for details
					return function () {
						return process.nextTick(flush);
					};
				}

// vertx
				function useVertxTimer() {
					if (typeof vertxNext !== 'undefined') {
						return function () {
							vertxNext(flush);
						};
					}

					return useSetTimeout();
				}

				function useMutationObserver() {
					var iterations = 0;
					var observer = new BrowserMutationObserver(flush);
					var node = document.createTextNode('');
					observer.observe(node, {characterData: true});

					return function () {
						node.data = iterations = ++iterations % 2;
					};
				}

// web worker
				function useMessageChannel() {
					var channel = new MessageChannel();
					channel.port1.onmessage = flush;
					return function () {
						return channel.port2.postMessage(0);
					};
				}

				function useSetTimeout() {
					// Store setTimeout reference so es6-promise will be unaffected by
					// other code modifying setTimeout (like sinon.useFakeTimers())
					var globalSetTimeout = setTimeout;
					return function () {
						return globalSetTimeout(flush, 1);
					};
				}

				var queue = new Array(1000);

				function flush() {
					for (var i = 0; i < len; i += 2) {
						var callback = queue[i];
						var arg = queue[i + 1];

						callback(arg);

						queue[i] = undefined;
						queue[i + 1] = undefined;
					}

					len = 0;
				}

				function attemptVertx() {
					try {
						var vertx = Function('return this')().require('vertx');
						vertxNext = vertx.runOnLoop || vertx.runOnContext;
						return useVertxTimer();
					} catch (e) {
						return useSetTimeout();
					}
				}

				var scheduleFlush = void 0;
// Decide what async method to use to triggering processing of queued callbacks:
				if (isNode) {
					scheduleFlush = useNextTick();
				} else if (BrowserMutationObserver) {
					scheduleFlush = useMutationObserver();
				} else if (isWorker) {
					scheduleFlush = useMessageChannel();
				} else if (browserWindow === undefined && "function" === 'function') {
					scheduleFlush = attemptVertx();
				} else {
					scheduleFlush = useSetTimeout();
				}

				function then(onFulfillment, onRejection) {
					var parent = this;

					var child = new this.constructor(noop);

					if (child[PROMISE_ID] === undefined) {
						makePromise(child);
					}

					var _state = parent._state;

					if (_state) {
						var callback = arguments[_state - 1];
						asap(function () {
							return invokeCallback(_state, child, callback, parent._result);
						});
					} else {
						subscribe(parent, child, onFulfillment, onRejection);
					}

					return child;
				}

				/**
				 `Promise.resolve` returns a promise that will become resolved with the
				 passed `value`. It is shorthand for the following:

				 ```javascript
				 let promise = new Promise(function(resolve, reject){
    resolve(1);
  });

				 promise.then(function(value){
    // value === 1
  });
				 ```

				 Instead of writing the above, your code now simply becomes the following:

				 ```javascript
				 let promise = Promise.resolve(1);

				 promise.then(function(value){
    // value === 1
  });
				 ```

				 @method resolve
				 @static
				 @param {Any} value value that the returned promise will be resolved with
				 Useful for tooling.
				 @return {Promise} a promise that will become fulfilled with the given
				 `value`
				 */
				function resolve$1(object) {
					/*jshint validthis:true */
					var Constructor = this;

					if (object && typeof object === 'object' && object.constructor === Constructor) {
						return object;
					}

					var promise = new Constructor(noop);
					resolve(promise, object);
					return promise;
				}

				var PROMISE_ID = Math.random().toString(36).substring(2);

				function noop() {
				}

				var PENDING = void 0;
				var FULFILLED = 1;
				var REJECTED = 2;

				var TRY_CATCH_ERROR = {error: null};

				function selfFulfillment() {
					return new TypeError("You cannot resolve a promise with itself");
				}

				function cannotReturnOwn() {
					return new TypeError('A promises callback cannot return that same promise.');
				}

				function getThen(promise) {
					try {
						return promise.then;
					} catch (error) {
						TRY_CATCH_ERROR.error = error;
						return TRY_CATCH_ERROR;
					}
				}

				function tryThen(then$$1, value, fulfillmentHandler, rejectionHandler) {
					try {
						then$$1.call(value, fulfillmentHandler, rejectionHandler);
					} catch (e) {
						return e;
					}
				}

				function handleForeignThenable(promise, thenable, then$$1) {
					asap(function (promise) {
						var sealed = false;
						var error = tryThen(then$$1, thenable, function (value) {
							if (sealed) {
								return;
							}
							sealed = true;
							if (thenable !== value) {
								resolve(promise, value);
							} else {
								fulfill(promise, value);
							}
						}, function (reason) {
							if (sealed) {
								return;
							}
							sealed = true;

							reject(promise, reason);
						}, 'Settle: ' + (promise._label || ' unknown promise'));

						if (!sealed && error) {
							sealed = true;
							reject(promise, error);
						}
					}, promise);
				}

				function handleOwnThenable(promise, thenable) {
					if (thenable._state === FULFILLED) {
						fulfill(promise, thenable._result);
					} else if (thenable._state === REJECTED) {
						reject(promise, thenable._result);
					} else {
						subscribe(thenable, undefined, function (value) {
							return resolve(promise, value);
						}, function (reason) {
							return reject(promise, reason);
						});
					}
				}

				function handleMaybeThenable(promise, maybeThenable, then$$1) {
					if (maybeThenable.constructor === promise.constructor && then$$1 === then && maybeThenable.constructor.resolve === resolve$1) {
						handleOwnThenable(promise, maybeThenable);
					} else {
						if (then$$1 === TRY_CATCH_ERROR) {
							reject(promise, TRY_CATCH_ERROR.error);
							TRY_CATCH_ERROR.error = null;
						} else if (then$$1 === undefined) {
							fulfill(promise, maybeThenable);
						} else if (isFunction(then$$1)) {
							handleForeignThenable(promise, maybeThenable, then$$1);
						} else {
							fulfill(promise, maybeThenable);
						}
					}
				}

				function resolve(promise, value) {
					if (promise === value) {
						reject(promise, selfFulfillment());
					} else if (objectOrFunction(value)) {
						handleMaybeThenable(promise, value, getThen(value));
					} else {
						fulfill(promise, value);
					}
				}

				function publishRejection(promise) {
					if (promise._onerror) {
						promise._onerror(promise._result);
					}

					publish(promise);
				}

				function fulfill(promise, value) {
					if (promise._state !== PENDING) {
						return;
					}

					promise._result = value;
					promise._state = FULFILLED;

					if (promise._subscribers.length !== 0) {
						asap(publish, promise);
					}
				}

				function reject(promise, reason) {
					if (promise._state !== PENDING) {
						return;
					}
					promise._state = REJECTED;
					promise._result = reason;

					asap(publishRejection, promise);
				}

				function subscribe(parent, child, onFulfillment, onRejection) {
					var _subscribers = parent._subscribers;
					var length = _subscribers.length;

					parent._onerror = null;

					_subscribers[length] = child;
					_subscribers[length + FULFILLED] = onFulfillment;
					_subscribers[length + REJECTED] = onRejection;

					if (length === 0 && parent._state) {
						asap(publish, parent);
					}
				}

				function publish(promise) {
					var subscribers = promise._subscribers;
					var settled = promise._state;

					if (subscribers.length === 0) {
						return;
					}

					var child = void 0,
						callback = void 0,
						detail = promise._result;

					for (var i = 0; i < subscribers.length; i += 3) {
						child = subscribers[i];
						callback = subscribers[i + settled];

						if (child) {
							invokeCallback(settled, child, callback, detail);
						} else {
							callback(detail);
						}
					}

					promise._subscribers.length = 0;
				}

				function tryCatch(callback, detail) {
					try {
						return callback(detail);
					} catch (e) {
						TRY_CATCH_ERROR.error = e;
						return TRY_CATCH_ERROR;
					}
				}

				function invokeCallback(settled, promise, callback, detail) {
					var hasCallback = isFunction(callback),
						value = void 0,
						error = void 0,
						succeeded = void 0,
						failed = void 0;

					if (hasCallback) {
						value = tryCatch(callback, detail);

						if (value === TRY_CATCH_ERROR) {
							failed = true;
							error = value.error;
							value.error = null;
						} else {
							succeeded = true;
						}

						if (promise === value) {
							reject(promise, cannotReturnOwn());
							return;
						}
					} else {
						value = detail;
						succeeded = true;
					}

					if (promise._state !== PENDING) {
						// noop
					} else if (hasCallback && succeeded) {
						resolve(promise, value);
					} else if (failed) {
						reject(promise, error);
					} else if (settled === FULFILLED) {
						fulfill(promise, value);
					} else if (settled === REJECTED) {
						reject(promise, value);
					}
				}

				function initializePromise(promise, resolver) {
					try {
						resolver(function resolvePromise(value) {
							resolve(promise, value);
						}, function rejectPromise(reason) {
							reject(promise, reason);
						});
					} catch (e) {
						reject(promise, e);
					}
				}

				var id = 0;

				function nextId() {
					return id++;
				}

				function makePromise(promise) {
					promise[PROMISE_ID] = id++;
					promise._state = undefined;
					promise._result = undefined;
					promise._subscribers = [];
				}

				function validationError() {
					return new Error('Array Methods must be provided an Array');
				}

				var Enumerator = function () {
					function Enumerator(Constructor, input) {
						this._instanceConstructor = Constructor;
						this.promise = new Constructor(noop);

						if (!this.promise[PROMISE_ID]) {
							makePromise(this.promise);
						}

						if (isArray(input)) {
							this.length = input.length;
							this._remaining = input.length;

							this._result = new Array(this.length);

							if (this.length === 0) {
								fulfill(this.promise, this._result);
							} else {
								this.length = this.length || 0;
								this._enumerate(input);
								if (this._remaining === 0) {
									fulfill(this.promise, this._result);
								}
							}
						} else {
							reject(this.promise, validationError());
						}
					}

					Enumerator.prototype._enumerate = function _enumerate(input) {
						for (var i = 0; this._state === PENDING && i < input.length; i++) {
							this._eachEntry(input[i], i);
						}
					};

					Enumerator.prototype._eachEntry = function _eachEntry(entry, i) {
						var c = this._instanceConstructor;
						var resolve$$1 = c.resolve;

						if (resolve$$1 === resolve$1) {
							var _then = getThen(entry);

							if (_then === then && entry._state !== PENDING) {
								this._settledAt(entry._state, i, entry._result);
							} else if (typeof _then !== 'function') {
								this._remaining--;
								this._result[i] = entry;
							} else if (c === Promise$1) {
								var promise = new c(noop);
								handleMaybeThenable(promise, entry, _then);
								this._willSettleAt(promise, i);
							} else {
								this._willSettleAt(new c(function (resolve$$1) {
									return resolve$$1(entry);
								}), i);
							}
						} else {
							this._willSettleAt(resolve$$1(entry), i);
						}
					};

					Enumerator.prototype._settledAt = function _settledAt(state, i, value) {
						var promise = this.promise;

						if (promise._state === PENDING) {
							this._remaining--;

							if (state === REJECTED) {
								reject(promise, value);
							} else {
								this._result[i] = value;
							}
						}

						if (this._remaining === 0) {
							fulfill(promise, this._result);
						}
					};

					Enumerator.prototype._willSettleAt = function _willSettleAt(promise, i) {
						var enumerator = this;

						subscribe(promise, undefined, function (value) {
							return enumerator._settledAt(FULFILLED, i, value);
						}, function (reason) {
							return enumerator._settledAt(REJECTED, i, reason);
						});
					};

					return Enumerator;
				}();

				/**
				 `Promise.all` accepts an array of promises, and returns a new promise which
				 is fulfilled with an array of fulfillment values for the passed promises, or
				 rejected with the reason of the first passed promise to be rejected. It casts all
				 elements of the passed iterable to promises as it runs this algorithm.

				 Example:

				 ```javascript
				 let promise1 = resolve(1);
				 let promise2 = resolve(2);
				 let promise3 = resolve(3);
				 let promises = [ promise1, promise2, promise3 ];

				 Promise.all(promises).then(function(array){
    // The array here would be [ 1, 2, 3 ];
  });
				 ```

				 If any of the `promises` given to `all` are rejected, the first promise
				 that is rejected will be given as an argument to the returned promises's
				 rejection handler. For example:

				 Example:

				 ```javascript
				 let promise1 = resolve(1);
				 let promise2 = reject(new Error("2"));
				 let promise3 = reject(new Error("3"));
				 let promises = [ promise1, promise2, promise3 ];

				 Promise.all(promises).then(function(array){
    // Code here never runs because there are rejected promises!
  }, function(error) {
    // error.message === "2"
  });
				 ```

				 @method all
				 @static
				 @param {Array} entries array of promises
				 @param {String} label optional string for labeling the promise.
				 Useful for tooling.
				 @return {Promise} promise that is fulfilled when all `promises` have been
				 fulfilled, or rejected if any of them become rejected.
				 @static
				 */
				function all(entries) {
					return new Enumerator(this, entries).promise;
				}

				/**
				 `Promise.race` returns a new promise which is settled in the same way as the
				 first passed promise to settle.

				 Example:

				 ```javascript
				 let promise1 = new Promise(function(resolve, reject){
    setTimeout(function(){
      resolve('promise 1');
    }, 200);
  });

				 let promise2 = new Promise(function(resolve, reject){
    setTimeout(function(){
      resolve('promise 2');
    }, 100);
  });

				 Promise.race([promise1, promise2]).then(function(result){
    // result === 'promise 2' because it was resolved before promise1
    // was resolved.
  });
				 ```

				 `Promise.race` is deterministic in that only the state of the first
				 settled promise matters. For example, even if other promises given to the
				 `promises` array argument are resolved, but the first settled promise has
				 become rejected before the other promises became fulfilled, the returned
				 promise will become rejected:

				 ```javascript
				 let promise1 = new Promise(function(resolve, reject){
    setTimeout(function(){
      resolve('promise 1');
    }, 200);
  });

				 let promise2 = new Promise(function(resolve, reject){
    setTimeout(function(){
      reject(new Error('promise 2'));
    }, 100);
  });

				 Promise.race([promise1, promise2]).then(function(result){
    // Code here never runs
  }, function(reason){
    // reason.message === 'promise 2' because promise 2 became rejected before
    // promise 1 became fulfilled
  });
				 ```

				 An example real-world use case is implementing timeouts:

				 ```javascript
				 Promise.race([ajax('foo.json'), timeout(5000)])
				 ```

				 @method race
				 @static
				 @param {Array} promises array of promises to observe
				 Useful for tooling.
				 @return {Promise} a promise which settles in the same way as the first passed
				 promise to settle.
				 */
				function race(entries) {
					/*jshint validthis:true */
					var Constructor = this;

					if (!isArray(entries)) {
						return new Constructor(function (_, reject) {
							return reject(new TypeError('You must pass an array to race.'));
						});
					} else {
						return new Constructor(function (resolve, reject) {
							var length = entries.length;
							for (var i = 0; i < length; i++) {
								Constructor.resolve(entries[i]).then(resolve, reject);
							}
						});
					}
				}

				/**
				 `Promise.reject` returns a promise rejected with the passed `reason`.
				 It is shorthand for the following:

				 ```javascript
				 let promise = new Promise(function(resolve, reject){
    reject(new Error('WHOOPS'));
  });

				 promise.then(function(value){
    // Code here doesn't run because the promise is rejected!
  }, function(reason){
    // reason.message === 'WHOOPS'
  });
				 ```

				 Instead of writing the above, your code now simply becomes the following:

				 ```javascript
				 let promise = Promise.reject(new Error('WHOOPS'));

				 promise.then(function(value){
    // Code here doesn't run because the promise is rejected!
  }, function(reason){
    // reason.message === 'WHOOPS'
  });
				 ```

				 @method reject
				 @static
				 @param {Any} reason value that the returned promise will be rejected with.
				 Useful for tooling.
				 @return {Promise} a promise rejected with the given `reason`.
				 */
				function reject$1(reason) {
					/*jshint validthis:true */
					var Constructor = this;
					var promise = new Constructor(noop);
					reject(promise, reason);
					return promise;
				}

				function needsResolver() {
					throw new TypeError('You must pass a resolver function as the first argument to the promise constructor');
				}

				function needsNew() {
					throw new TypeError("Failed to construct 'Promise': Please use the 'new' operator, this object constructor cannot be called as a function.");
				}

				/**
				 Promise objects represent the eventual result of an asynchronous operation. The
				 primary way of interacting with a promise is through its `then` method, which
				 registers callbacks to receive either a promise's eventual value or the reason
				 why the promise cannot be fulfilled.

				 Terminology
				 -----------

				 - `promise` is an object or function with a `then` method whose behavior conforms to this specification.
				 - `thenable` is an object or function that defines a `then` method.
				 - `value` is any legal JavaScript value (including undefined, a thenable, or a promise).
				 - `exception` is a value that is thrown using the throw statement.
				 - `reason` is a value that indicates why a promise was rejected.
				 - `settled` the final resting state of a promise, fulfilled or rejected.

				 A promise can be in one of three states: pending, fulfilled, or rejected.

				 Promises that are fulfilled have a fulfillment value and are in the fulfilled
				 state.  Promises that are rejected have a rejection reason and are in the
				 rejected state.  A fulfillment value is never a thenable.

				 Promises can also be said to *resolve* a value.  If this value is also a
				 promise, then the original promise's settled state will match the value's
				 settled state.  So a promise that *resolves* a promise that rejects will
				 itself reject, and a promise that *resolves* a promise that fulfills will
				 itself fulfill.


				 Basic Usage:
				 ------------

				 ```js
				 let promise = new Promise(function(resolve, reject) {
    // on success
    resolve(value);

    // on failure
    reject(reason);
  });

				 promise.then(function(value) {
    // on fulfillment
  }, function(reason) {
    // on rejection
  });
				 ```

				 Advanced Usage:
				 ---------------

				 Promises shine when abstracting away asynchronous interactions such as
				 `XMLHttpRequest`s.

				 ```js
				 function getJSON(url) {
    return new Promise(function(resolve, reject){
      let xhr = new XMLHttpRequest();

      xhr.open('GET', url);
      xhr.onreadystatechange = handler;
      xhr.responseType = 'json';
      xhr.setRequestHeader('Accept', 'application/json');
      xhr.send();

      function handler() {
        if (this.readyState === this.DONE) {
          if (this.status === 200) {
            resolve(this.response);
          } else {
            reject(new Error('getJSON: `' + url + '` failed with status: [' + this.status + ']'));
          }
        }
      };
    });
  }

				 getJSON('/posts.json').then(function(json) {
    // on fulfillment
  }, function(reason) {
    // on rejection
  });
				 ```

				 Unlike callbacks, promises are great composable primitives.

				 ```js
				 Promise.all([
				 getJSON('/posts'),
				 getJSON('/comments')
				 ]).then(function(values){
    values[0] // => postsJSON
    values[1] // => commentsJSON

    return values;
  });
				 ```

				 @class Promise
				 @param {Function} resolver
				 Useful for tooling.
				 @constructor
				 */

				var Promise$1 = function () {
					function Promise(resolver) {
						this[PROMISE_ID] = nextId();
						this._result = this._state = undefined;
						this._subscribers = [];

						if (noop !== resolver) {
							typeof resolver !== 'function' && needsResolver();
							this instanceof Promise ? initializePromise(this, resolver) : needsNew();
						}
					}

					/**
					 The primary way of interacting with a promise is through its `then` method,
					 which registers callbacks to receive either a promise's eventual value or the
					 reason why the promise cannot be fulfilled.
					 ```js
					 findUser().then(function(user){
    // user is available
  }, function(reason){
    // user is unavailable, and you are given the reason why
  });
					 ```
					 Chaining
					 --------
					 The return value of `then` is itself a promise.  This second, 'downstream'
					 promise is resolved with the return value of the first promise's fulfillment
					 or rejection handler, or rejected if the handler throws an exception.
					 ```js
					 findUser().then(function (user) {
    return user.name;
  }, function (reason) {
    return 'default name';
  }).then(function (userName) {
    // If `findUser` fulfilled, `userName` will be the user's name, otherwise it
    // will be `'default name'`
  });
					 findUser().then(function (user) {
    throw new Error('Found user, but still unhappy');
  }, function (reason) {
    throw new Error('`findUser` rejected and we're unhappy');
  }).then(function (value) {
    // never reached
  }, function (reason) {
    // if `findUser` fulfilled, `reason` will be 'Found user, but still unhappy'.
    // If `findUser` rejected, `reason` will be '`findUser` rejected and we're unhappy'.
  });
					 ```
					 If the downstream promise does not specify a rejection handler, rejection reasons will be propagated further downstream.
					 ```js
					 findUser().then(function (user) {
    throw new PedagogicalException('Upstream error');
  }).then(function (value) {
    // never reached
  }).then(function (value) {
    // never reached
  }, function (reason) {
    // The `PedgagocialException` is propagated all the way down to here
  });
					 ```
					 Assimilation
					 ------------
					 Sometimes the value you want to propagate to a downstream promise can only be
					 retrieved asynchronously. This can be achieved by returning a promise in the
					 fulfillment or rejection handler. The downstream promise will then be pending
					 until the returned promise is settled. This is called *assimilation*.
					 ```js
					 findUser().then(function (user) {
    return findCommentsByAuthor(user);
  }).then(function (comments) {
    // The user's comments are now available
  });
					 ```
					 If the assimliated promise rejects, then the downstream promise will also reject.
					 ```js
					 findUser().then(function (user) {
    return findCommentsByAuthor(user);
  }).then(function (comments) {
    // If `findCommentsByAuthor` fulfills, we'll have the value here
  }, function (reason) {
    // If `findCommentsByAuthor` rejects, we'll have the reason here
  });
					 ```
					 Simple Example
					 --------------
					 Synchronous Example
					 ```javascript
					 let result;
					 try {
    result = findResult();
    // success
  } catch(reason) {
    // failure
  }
					 ```
					 Errback Example
					 ```js
					 findResult(function(result, err){
    if (err) {
      // failure
    } else {
      // success
    }
  });
					 ```
					 Promise Example;
					 ```javascript
					 findResult().then(function(result){
    // success
  }, function(reason){
    // failure
  });
					 ```
					 Advanced Example
					 --------------
					 Synchronous Example
					 ```javascript
					 let author, books;
					 try {
    author = findAuthor();
    books  = findBooksByAuthor(author);
    // success
  } catch(reason) {
    // failure
  }
					 ```
					 Errback Example
					 ```js
					 function foundBooks(books) {
   }
					 function failure(reason) {
   }
					 findAuthor(function(author, err){
    if (err) {
      failure(err);
      // failure
    } else {
      try {
        findBoooksByAuthor(author, function(books, err) {
          if (err) {
            failure(err);
          } else {
            try {
              foundBooks(books);
            } catch(reason) {
              failure(reason);
            }
          }
        });
      } catch(error) {
        failure(err);
      }
      // success
    }
  });
					 ```
					 Promise Example;
					 ```javascript
					 findAuthor().
					 then(findBooksByAuthor).
					 then(function(books){
      // found books
  }).catch(function(reason){
    // something went wrong
  });
					 ```
					 @method then
					 @param {Function} onFulfilled
					 @param {Function} onRejected
					 Useful for tooling.
					 @return {Promise}
					 */

					/**
					 `catch` is simply sugar for `then(undefined, onRejection)` which makes it the same
					 as the catch block of a try/catch statement.
					 ```js
					 function findAuthor(){
  throw new Error('couldn't find that author');
  }
					 // synchronous
					 try {
  findAuthor();
  } catch(reason) {
  // something went wrong
  }
					 // async with promises
					 findAuthor().catch(function(reason){
  // something went wrong
  });
					 ```
					 @method catch
					 @param {Function} onRejection
					 Useful for tooling.
					 @return {Promise}
					 */


					Promise.prototype.catch = function _catch(onRejection) {
						return this.then(null, onRejection);
					};

					/**
					 `finally` will be invoked regardless of the promise's fate just as native
					 try/catch/finally behaves

					 Synchronous example:

					 ```js
					 findAuthor() {
      if (Math.random() > 0.5) {
        throw new Error();
      }
      return new Author();
    }

					 try {
      return findAuthor(); // succeed or fail
    } catch(error) {
      return findOtherAuther();
    } finally {
      // always runs
      // doesn't affect the return value
    }
					 ```

					 Asynchronous example:

					 ```js
					 findAuthor().catch(function(reason){
      return findOtherAuther();
    }).finally(function(){
      // author was either found, or not
    });
					 ```

					 @method finally
					 @param {Function} callback
					 @return {Promise}
					 */


					Promise.prototype.finally = function _finally(callback) {
						var promise = this;
						var constructor = promise.constructor;

						return promise.then(function (value) {
							return constructor.resolve(callback()).then(function () {
								return value;
							});
						}, function (reason) {
							return constructor.resolve(callback()).then(function () {
								throw reason;
							});
						});
					};

					return Promise;
				}();

				Promise$1.prototype.then = then;
				Promise$1.all = all;
				Promise$1.race = race;
				Promise$1.resolve = resolve$1;
				Promise$1.reject = reject$1;
				Promise$1._setScheduler = setScheduler;
				Promise$1._setAsap = setAsap;
				Promise$1._asap = asap;

				/*global self*/
				function polyfill() {
					var local = void 0;

					if (typeof global !== 'undefined') {
						local = global;
					} else if (typeof self !== 'undefined') {
						local = self;
					} else {
						try {
							local = Function('return this')();
						} catch (e) {
							throw new Error('polyfill failed because global object is unavailable in this environment');
						}
					}

					var P = local.Promise;

					if (P) {
						var promiseToString = null;
						try {
							promiseToString = Object.prototype.toString.call(P.resolve());
						} catch (e) {
							// silently ignored
						}

						if (promiseToString === '[object Promise]' && !P.cast) {
							return;
						}
					}

					local.Promise = Promise$1;
				}

// Strange compat..
				Promise$1.polyfill = polyfill;
				Promise$1.Promise = Promise$1;

				return Promise$1;

			})));

//# sourceMappingURL=es6-promise.map

			/* WEBPACK VAR INJECTION */
		}.call(exports, __webpack_require__(3), __webpack_require__(27)))

		/***/
	}),
	/* 27 */
	/***/ (function (module, exports) {

		var g;

// This works in non-strict mode
		g = (function () {
			return this;
		})();

		try {
			// This works if eval is allowed (see CSP)
			g = g || Function("return this")() || (1, eval)("this");
		} catch (e) {
			// This works if the window reference is available
			if (typeof window === "object")
				g = window;
		}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

		module.exports = g;

		/***/
	}),
	/* 28 */
	/***/ (function (module, exports, __webpack_require__) {

		var smoothScroll = __webpack_require__(29);
		module.exports = function _smoother(time, offset) {
			'use strict';
			if ((typeof time !== "number") || (time > 15000)) {
				time = 2000; // set default time for animation
			}
			// Если клик по линку с аттрибутом 'a[href^="#jump-"]', то вызвать processJumpLink
			document.addEventListener('click', function (evt) {
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

		/***/
	}),
	/* 29 */
	/***/ (function (module, exports, __webpack_require__) {

		var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;
		(function (root, smoothScroll) {
			"use strict";
			if (true) {
				!(__WEBPACK_AMD_DEFINE_FACTORY__ = (smoothScroll),
					__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
						(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
						__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__))
			} else if (typeof exports === "object" && typeof module === "object") {
				module.exports = smoothScroll()
			} else {
				root.smoothScroll = smoothScroll()
			}
		})(this, function () {
			"use strict";
			if (typeof window !== "object") return;
			if (document.querySelectorAll === void 0 || window.pageYOffset === void 0 || history.pushState === void 0) {
				return
			}
			var getTop = function (element, start) {
				if (element.nodeName === "HTML") return -start;
				return element.getBoundingClientRect().top + start
			};
			var easeInOutCubic = function (t) {
				return t < .5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1
			};
			var position = function (start, end, elapsed, duration) {
				if (elapsed > duration) return end;
				return start + (end - start) * easeInOutCubic(elapsed / duration)
			};
			var smoothScroll = function (el, duration, callback, context) {
				duration = duration || 500;
				context = context || window;
				var start = context.scrollTop || window.pageYOffset;
				if (typeof el === "number") {
					var end = parseInt(el)
				} else {
					var end = getTop(el, start)
				}
				var clock = Date.now();
				var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || function (fn) {
					window.setTimeout(fn, 15)
				};
				var step = function () {
					var elapsed = Date.now() - clock;
					if (context !== window) {
						context.scrollTop = position(start, end, elapsed, duration)
					} else {
						window.scroll(0, position(start, end, elapsed, duration))
					}
					if (elapsed > duration) {
						if (typeof callback === "function") {
							callback(el)
						}
					} else {
						requestAnimationFrame(step)
					}
				};
				step()
			};
			var linkHandler = function (ev) {
				if (!ev.defaultPrevented) {
					ev.preventDefault();
					if (location.hash !== this.hash) window.history.pushState(null, null, this.hash);
					var node = document.getElementById(this.hash.substring(1));
					if (!node) return;
					smoothScroll(node, 500, function (el) {
						location.replace("#" + el.id)
					})
				}
			};
			document.addEventListener("DOMContentLoaded", function () {
				var internal = document.querySelectorAll('a[href^="#"]:not([href="#"])'), a;
				for (var i = internal.length; a = internal[--i];) {
					a.addEventListener("click", linkHandler, false)
				}
			});
			return smoothScroll
		});

		/***/
	}),
	/* 30 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var Vue = __webpack_require__(1),
			customEach = __webpack_require__(4),
			viewport = __webpack_require__(10),
			scrollDetector = __webpack_require__(11);
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
					},
					about: {
						ison: false
					}
				},
				isfloating: false,
				isatoggleropen: false,
				ismobileopen: false,
				searchison: false,
				collapsed: false
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
				},

				/**
				 * Burger icon mobile menu toggler.
				 */
				toggleMobileMenu: function toggleMobileMenu() {
					this.$data.ismobileopen = true;
					self.main_wrapper.classList.toggle('wj-expanded');
				},

				/**
				 * Toggle site search block on mobiles.
				 */
				toggleSearch: function toggleSearch() {
					this.$data.searchison = !this.$data.searchison;
				}
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
						var floating_menu = __webpack_require__(31);
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

		/***/
	}),
	/* 31 */
	/***/ (function (module, exports, __webpack_require__) {

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

		/***/
	}),
	/* 32 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var Vue = __webpack_require__(1);

		var OnOff = __webpack_require__(5);

		var elt = '#vm-site-menu-directions';

		var MenuDirections = function MenuDirections(sel) {
			if (!sel) {
				throw 'MenuDirections "sel" not defined';
			}

			OnOff.OnOffVueSetupPrototype.call(this);
			this.el = sel;
			this.data.isloading = false;
			this.data.hasloaded = false;
			this.data.content = {
				title: null,
				text: null
			};
		};

		MenuDirections.prototype = Object.create(OnOff.OnOffVueSetupPrototype.prototype);
		MenuDirections.prototype.constructor = MenuDirections;
		var menu = new Vue(new MenuDirections(elt));

		/***/
	}),
	/* 33 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var viewport = __webpack_require__(10);

		var initialstate = false;

		if (viewport.w / viewport.ratio > 980) {
			initialstate = true;
		}

		__webpack_require__(5).init('#vm-widget-practices', initialstate, false, false);

		/***/
	}),
	/* 34 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var Vue = __webpack_require__(1),
			customEach = __webpack_require__(4),
			findPropValueIndex = __webpack_require__(35),
			viewportV2 = __webpack_require__(36),
			// axios = require('Node/axios/dist/axios.min.js'),
			PerfectScrollbar = __webpack_require__(37);

		var FormVacancySearch = __webpack_require__(13);

		var WidgetFilter = __webpack_require__(2),
			ControlbarFilter = __webpack_require__(8),
			PaymentRange = __webpack_require__(19),
			PaymentFilter = __webpack_require__(9),
			ModelData = __webpack_require__(61),
			Storage = __webpack_require__(62),
			Search = __webpack_require__(64),
			storage = new Storage().init();

		var SearchVM = function SearchVM() {
			Search.call(this);
			var self = this;
			/**
			 * To access storage data in prototype methods.
			 */

			this.wj = {
				storage: storage
			};
			this.el = '#vm-search';
			this.components = {
				'form-vacancy-search': FormVacancySearch
			};
			this.data = new ModelData(storage);
			this.computed = {
				iscontrolbaron: function iscontrolbaron() {
					var _this = this;

					return Object.keys(this.togglers.controlbar).some(function (item) {
						return _this.togglers.controlbar[item] === true;
					});
				},
				hasfiltersactive: function hasfiltersactive() {
					var _this2 = this;

					return Object.keys(this.$data.requestdata.filters).filter(function (item) {
						return 'sorting,text,location'.indexOf(item) === -1;
					}).some(function (filtername) {
						return _this2.$data.requestdata.filters[filtername].id !== null;
					});
				},
				hascontextsearchinput: function hascontextsearchinput() {
					var res = this.$data.contextsearch.text !== null && this.$data.contextsearch.text !== '' || this.$data.contextsearch.location !== null && this.$data.contextsearch.location !== '';
					return res;
				}
			};
			this.methods = {
				toggle: function toggle(sectionname, unitname) {
					var vm = this;

					if (sectionname === 'controlbar' && !this.$data.togglers[sectionname][unitname]) {
						/**
						 * Toggle off all togglers before toggling on the one clicked
						 * for the control bar buttons.
						 */
						customEach(Object.keys(this.$data.togglers[sectionname]), function (item) {
							vm.$data.togglers[sectionname][item] = false;
						});
					}

					this.$data.togglers[sectionname][unitname] = !this.$data.togglers[sectionname][unitname];
				},
				setFilter: function setFilter(sectionname, filtername, id, name) {
					this.setSearchUrl(filtername, id);
					if (sectionname === 'widgets') {
						this.requestdata.filters[filtername] = new WidgetFilter({
							id: id,
							name: name
						});
					}

					if (sectionname === 'controlbar') {
						this.requestdata.filters[filtername] = new ControlbarFilter({
							id: id,
							name: name
						});
					}
				},
				setSearchUrl: function (name, val) {
					var queryString = window.location.search.slice(1),
						arr = queryString.split('&'),
						param = [],
						newQueryString = '';
					if (arr[0] != '') {
						for (var i=0; i<arr.length; i++) {
							var a = arr[i].split('=');
							param[a[0]] = a[1];
						}
					}						

					param[name] = val;

					for (var key in param) {
						newQueryString += key + '=' + param[key] + '&';
					}
					newQueryString = newQueryString.substring(0, newQueryString.length - 1);
					history.pushState(null, null, '/search/?' + newQueryString);
				},
				parseSearchUrl: function (name, val) {
					var queryString = window.location.search.slice(1),
						arr = queryString.split('&'),
						param = [],
						newQueryString = '';
					if (arr[0] != '') {
						for (var i=0; i<arr.length; i++) {
							var a = arr[i].split('=');
							param[a[0]] = a[1];
						}
					}

					param[name] = val;

					for (var key in param) {
						newQueryString += key + '=' + param[key] + '&';
					}
					newQueryString = newQueryString.substring(0, newQueryString.length - 1);
					history.pushState(null, null, '/search/?' + newQueryString);
				},
				updateSearchUrl: function(name) {
					var queryString = window.location.search.slice(1),
						arr = queryString.split('&'),
						param = [],
						newQueryString = '';
					if (arr[0] != '') {
						for (var i=0; i<arr.length; i++) {
							var a = arr[i].split('=');
							if (a[0] != name) {
								param[a[0]] = a[1];
							}

						}
					}

					for (var key in param) {
						newQueryString += key + '=' + param[key] + '&';
					}
					if (newQueryString.length > 0) {
						newQueryString = newQueryString.substring(0, newQueryString.length - 1);
						history.pushState(null, null, '/search/?' + newQueryString);
					} else {
						history.pushState(null, null, '/search/');
					}

				},
				setPaymentFilter: function setPaymentFilter() {
					/**
					 * Set both parts of payment filter: payment type, payment range.
					 */
					var typeselectedid = this.$data.controlbar.lists.payment.typeselected;
					var rangeselectedid = this.$data.controlbar.lists.payment.rangeselected;
					var typeselectedindex = findPropValueIndex(this.$data.controlbar.lists.payment.type, 'id', typeselectedid);
					var rangeselectedindex = findPropValueIndex(this.$data.controlbar.lists.payment.range, 'id', rangeselectedid);

					this.setSearchUrl('payment', this.$data.controlbar.lists.payment.type[typeselectedindex].id);
					this.setSearchUrl('paymentrange', rangeselectedid);

					this.requestdata.filters.payment = new PaymentFilter({
						id: this.$data.controlbar.lists.payment.type[typeselectedindex].id,
						name: this.$data.controlbar.lists.payment.type[typeselectedindex].name,
						range: new PaymentRange(storage.controlbar.payment[typeselectedindex].ranges[rangeselectedindex])
					});
					/**
					 * And close the payment filter popup.
					 */

					this.$data.togglers.controlbar.payment = false;
				},
				clearFilters: function clearFilters() {
					self.clearFilters(this);
				},
				resetFilter: function resetFilter(filtertype, filtername) {
					this.updateSearchUrl(filtername);
					self.resetFilter(filtertype, filtername, this);
				},
				changePaymentType: function changePaymentType() {
					var typeselectedid = this.$data.controlbar.lists.payment.typeselected;
					var typeselectedindex = findPropValueIndex(this.$data.controlbar.lists.payment.type, 'id', typeselectedid);
					/**
					 * Replace the payment range with one matching the newly user set
					 * payment type.
					 */

					this.$data.controlbar.lists.payment.range = storage.controlbar.payment[typeselectedindex].ranges;
					this.$data.controlbar.lists.payment.rangeselected = storage.controlbar.payment[typeselectedindex].ranges[0].id;
				},
				searchContext: function searchContext() {
					/**
					 * Add context filters to query that changes the hasfiltersactive.
					 */
					console.log('searchContext works...');
					this.$data.requestdata.filters.text = this.$data.contextsearch.text;
					this.$data.requestdata.filters.location = this.$data.contextsearch.location;
				},
				noNumber: function (evt) {
					var regex = new RegExp("^[а-яА-Яa-zA-Z ]+$");
					var key = String.fromCharCode(!evt.charCode ? evt.which : evt.charCode);
					if (!regex.test(key)) {
						event.preventDefault();
						return false;
					}
				}
			};
			this.watch = {
				iscontrolbaron: function iscontrolbaron(newVal) {
					/**
					 * If any of the controlbar items is switched on (newVal===true),
					 * assign body click handler. The handler has to switch off all of
					 * them and remove itself from body listeners list.
					 */
					var vm = this;

					if (newVal) {
						document.body.addEventListener('click', manageBodyClick);
					}

					function manageBodyClick() {
						document.body.removeEventListener('click', manageBodyClick);
						customEach(Object.keys(vm.$data.togglers.controlbar), function (item) {
							vm.$data.togglers.controlbar[item] = false;
						});
					}
				},
				'requestdata.filters': {
					handler: function handler(filters) {
						this.$data.requestdata.query = self.rebuildQueryVars(filters);
						this.$data.requestdata.triggers.new = true;
					},
					deep: true
				},
				'sidebar.filters.city': self.createFilterWatcher('city'),
				'sidebar.filters.country': self.createFilterWatcher('country'),
				'sidebar.filters.industry': self.createFilterWatcher('industry'),
				'sidebar.filters.specialism': self.createFilterWatcher('specialism'),
				'requestdata.triggers.more': function requestdataTriggersMore(newVal) {
					if (newVal) {
						this.$data.requestdata.triggers.more = false;
						var query = this.$data.requestdata.query ? "".concat(this.$data.requestdata.query) : '';
						query += "&more=true&page=".concat(this.$data.requestdata.page);
						var request = "".concat(this.$data.requestdata.api).concat(query);
						storage.getData(this, request, self.processResultMore.bind(this));
					}
				},
				'requestdata.triggers.new': function requestdataTriggersNew(newVal) {
					var vm = this;

					if (newVal) {
						this.$data.requestdata.triggers.new = false;
						this.$data.requestdata.isloading = true;
						var request = "".concat(this.$data.requestdata.api).concat(this.$data.requestdata.query);
						storage.getData(this, request, self.processNewData.bind(this));
					}
				}
			};

			this.mounted = function () {
				var vm = this;

				this.$nextTick(function () {
					/**
					 * Assign 'contextsearch:changed' Vue event handler to update the
					 * ViewModel contextsearch filters.
					 */
					vm.$on('contextsearch:changed', function (fields) {
						console.dir(fields);
						vm.$data.requestdata.filters.text = fields.text;
						vm.$data.requestdata.filters.location = fields.location;
					});
					/**
					 * Initialize contextsearch filters if presented.
					 */


					//////////////////
					// parseSearchUrl
					/////////////////
					var queryString = window.location.search.slice(1),
						arr = queryString.split('&'),
						param = [];
					if (arr[0] != '') {
						for (var i=0; i<arr.length; i++) {
							var a = arr[i].split('=');
							param[a[0]] = a[1];
						}

						for (var key in param) {
							var __filter = this.$data.requestdata.filters[key];

							if (key.indexOf('payment') == -1) {
								var __lists = vm.$data.sidebar.lists[key] == undefined ? vm.$data.controlbar.lists[key] : vm.$data.sidebar.lists[key];
								customEach(__lists, function (item) {
									if (item.id == param[key]) {
										__filter.id = item.id;
										__filter.name = item.name;
									}
								});
								this.$data.requestdata.filters[key] = __filter;
							} else {
								if (key == 'payment') {
									customEach(vm.$data.controlbar.lists.payment.type, function (item) {
										if (item.id == param[key]) {
											__filter.id = item.id;
											__filter.name = item.name;
										}
									});
									this.$data.requestdata.filters[key] = __filter;
								}
								if (key == 'paymentrange') {
									__filter = this.$data.requestdata.filters.payment.range;
									customEach(vm.$data.controlbar.lists.payment.range, function (item) {
										if (item.id == param[key]) {
											__filter.id = item.id;
											__filter.name = item.name;
										}
									});
									this.$data.requestdata.filters.payment.range = __filter;
								}
							}
						}

					}

					this.$data.requestdata.query = self.rebuildQueryVars(this.$data.requestdata.filters);

					customEach(Object.keys(vm.$refs), function (item) {
						// new PerfectScrollbar(vm.$refs[item]);
						self.fuses[item] = Search.prototype.initFuse(vm.$data.sidebar.lists[item]);
					});
					self.setEndPageWatcher(this);
					this.$data.requestdata.haspagestarted = true;

					/**
					 * Toggle the widget filters off when screen width is less than
					 * 560px. Forced close widgets at page load if width match the
					 * limit.
					 */

					closeWidgets();
					window.addEventListener('resize', closeWidgets);

					function closeWidgets() {
						var viewport = viewportV2();

						if (viewport.w <= 560) {
							Object.keys(vm.$data.togglers.sidebar).map(function (togglername) {
								vm.$data.togglers.sidebar[togglername] = false;
							});
						} else {
							Object.keys(vm.$data.togglers.sidebar).map(function (togglername) {
								vm.$data.togglers.sidebar[togglername] = true;
							});
						}
					}
				});
			};
		};

		SearchVM.prototype = Object.create(Search.prototype);
		SearchVM.prototype.constructor = SearchVM;

		SearchVM.prototype.processResultMore = function (response) {
			var _this3 = this;

			// console.dir(response.data.dt.results);
			// if (response.data.dt.results) {
			//   this.$data.requestdata.page++;
			//   customEach(response.data.dt.results, function (item) {
			//     return _this3.$data.results.push(item);
			//   });
			// }

			var vm = this;

			if (response.data.dt.results.length) {
				this.$data.requestdata.page++;
				customEach(response.data.dt.results, function (item) {
					return _this3.$data.results.push(item);
				});
			} else if (!response.data.success && response.data.status === 204 && !$('.svc-search-results__content li').length) {
				vm.$data.requestdata.isnotfound = true;
			}

			if (_this3.$data.results.length > 0) {
				$('.save-job-alert-container').show();
			}
		};

		SearchVM.prototype.processNewData = function (response) {
			var vm = this;
			console.dir(response.data);
			/**
			 * Not found case.
			 */

			if (!response.data.success && response.data.status === 204) {
				vm.$data.requestdata.isnotfound = true;
			}
			/**
			 * New data arrived.
			 *
			 * Update 'storage.sidebar.*' and 'storage.results'.
			 *
			 * The update 'vm.$data.sidebar.lists' and 'vm.$data.results' with pointers
			 * to the respective storage items.
			 */

			if (response.data.success && response.data.status === 200) {
				/**
				 * Reset flags.
				 */
				vm.$data.requestdata.isnotfound = false;
				vm.$data.requestdata.page = 1;
				/**
				 * Save the new data to the storage.
				 */

				storage.results = response.data.dt.results;
				storage.sidebar.city = response.data.dt.city;
				storage.sidebar.country = response.data.dt.country;
				storage.sidebar.specialism = response.data.dt.specialism;
				/**
				 * Update the data in the ViewModel.
				 */

				vm.$data.results = response.data.dt.results;
				vm.$data.sidebar.lists.city = response.data.dt.city;
				vm.$data.sidebar.lists.country = response.data.dt.country;
				vm.$data.sidebar.lists.industry = response.data.dt.industry;
				vm.$data.sidebar.lists.specialism = response.data.dt.specialism;

			}
		};

		var search = new Vue(new SearchVM());
		console.dir(search);

		/***/
	}),
	/* 35 */
	/***/ (function (module, exports) {

		/**
		 * Searches the array of objects for a property with matching value.Returns the
		 * object's index in the array or 'false' if not found.
		 * @param  array array  The array of objects to iterate.
		 * @param  string prop  The property name to find value in.
		 * @param  mixed value  The value that is expected to be found.
		 * @return mixed        Integer object's index in the array, false if not found.
		 */
		module.exports = function (array, prop, value) {
			'use strict';

			var index = false;
			array.map(function (item, idx) {
				if (item[prop] === value) {
					index = idx;
				}

				return false;
			});
			return index;
		};

		/***/
	}),
	/* 36 */
	/***/ (function (module, exports) {

		module.exports = function () {
			'use strict';

			return {
				w: window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth,
				h: window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight,
				ratio: window.devicePixelRatio
			};
		};

		/***/
	}),
	/* 37 */
	/***/ (function (module, exports, __webpack_require__) {

		/*!
 * perfect-scrollbar v1.4.0
 * (c) 2018 Hyunje Jun
 * @license MIT
 */
		!function (t, e) {
			true ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : t.PerfectScrollbar = e()
		}(this, function () {
			"use strict";

			function t(t) {
				return getComputedStyle(t)
			}

			function e(t, e) {
				for (var i in e) {
					var r = e[i];
					"number" == typeof r && (r += "px"), t.style[i] = r
				}
				return t
			}

			function i(t) {
				var e = document.createElement("div");
				return e.className = t, e
			}

			function r(t, e) {
				if (!v) throw new Error("No element matching method supported");
				return v.call(t, e)
			}

			function l(t) {
				t.remove ? t.remove() : t.parentNode && t.parentNode.removeChild(t)
			}

			function n(t, e) {
				return Array.prototype.filter.call(t.children, function (t) {
					return r(t, e)
				})
			}

			function o(t, e) {
				var i = t.element.classList, r = m.state.scrolling(e);
				i.contains(r) ? clearTimeout(Y[e]) : i.add(r)
			}

			function s(t, e) {
				Y[e] = setTimeout(function () {
					return t.isAlive && t.element.classList.remove(m.state.scrolling(e))
				}, t.settings.scrollingThreshold)
			}

			function a(t, e) {
				o(t, e), s(t, e)
			}

			function c(t) {
				if ("function" == typeof window.CustomEvent) return new CustomEvent(t);
				var e = document.createEvent("CustomEvent");
				return e.initCustomEvent(t, !1, !1, void 0), e
			}

			function h(t, e, i, r, l) {
				var n = i[0], o = i[1], s = i[2], h = i[3], u = i[4], d = i[5];
				void 0 === r && (r = !0), void 0 === l && (l = !1);
				var f = t.element;
				t.reach[h] = null, f[s] < 1 && (t.reach[h] = "start"), f[s] > t[n] - t[o] - 1 && (t.reach[h] = "end"), e && (f.dispatchEvent(c("ps-scroll-" + h)), e < 0 ? f.dispatchEvent(c("ps-scroll-" + u)) : e > 0 && f.dispatchEvent(c("ps-scroll-" + d)), r && a(t, h)), t.reach[h] && (e || l) && f.dispatchEvent(c("ps-" + h + "-reach-" + t.reach[h]))
			}

			function u(t) {
				return parseInt(t, 10) || 0
			}

			function d(t) {
				return r(t, "input,[contenteditable]") || r(t, "select,[contenteditable]") || r(t, "textarea,[contenteditable]") || r(t, "button,[contenteditable]")
			}

			function f(e) {
				var i = t(e);
				return u(i.width) + u(i.paddingLeft) + u(i.paddingRight) + u(i.borderLeftWidth) + u(i.borderRightWidth)
			}

			function p(t, e) {
				return t.settings.minScrollbarLength && (e = Math.max(e, t.settings.minScrollbarLength)), t.settings.maxScrollbarLength && (e = Math.min(e, t.settings.maxScrollbarLength)), e
			}

			function b(t, i) {
				var r = {width: i.railXWidth}, l = Math.floor(t.scrollTop);
				i.isRtl ? r.left = i.negativeScrollAdjustment + t.scrollLeft + i.containerWidth - i.contentWidth : r.left = t.scrollLeft, i.isScrollbarXUsingBottom ? r.bottom = i.scrollbarXBottom - l : r.top = i.scrollbarXTop + l, e(i.scrollbarXRail, r);
				var n = {top: l, height: i.railYHeight};
				i.isScrollbarYUsingRight ? i.isRtl ? n.right = i.contentWidth - (i.negativeScrollAdjustment + t.scrollLeft) - i.scrollbarYRight - i.scrollbarYOuterWidth : n.right = i.scrollbarYRight - t.scrollLeft : i.isRtl ? n.left = i.negativeScrollAdjustment + t.scrollLeft + 2 * i.containerWidth - i.contentWidth - i.scrollbarYLeft - i.scrollbarYOuterWidth : n.left = i.scrollbarYLeft + t.scrollLeft, e(i.scrollbarYRail, n), e(i.scrollbarX, {
					left: i.scrollbarXLeft,
					width: i.scrollbarXWidth - i.railBorderXWidth
				}), e(i.scrollbarY, {top: i.scrollbarYTop, height: i.scrollbarYHeight - i.railBorderYWidth})
			}

			function g(t, e) {
				function i(e) {
					b[d] = g + Y * (e[a] - v), o(t, f), R(t), e.stopPropagation(), e.preventDefault()
				}

				function r() {
					s(t, f), t[p].classList.remove(m.state.clicking), t.event.unbind(t.ownerDocument, "mousemove", i)
				}

				var l = e[0], n = e[1], a = e[2], c = e[3], h = e[4], u = e[5], d = e[6], f = e[7], p = e[8],
					b = t.element, g = null, v = null, Y = null;
				t.event.bind(t[h], "mousedown", function (e) {
					g = b[d], v = e[a], Y = (t[n] - t[l]) / (t[c] - t[u]), t.event.bind(t.ownerDocument, "mousemove", i), t.event.once(t.ownerDocument, "mouseup", r), t[p].classList.add(m.state.clicking), e.stopPropagation(), e.preventDefault()
				})
			}

			var v = "undefined" != typeof Element && (Element.prototype.matches || Element.prototype.webkitMatchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.msMatchesSelector),
				m = {
					main: "ps", element: {
						thumb: function (t) {
							return "ps__thumb-" + t
						}, rail: function (t) {
							return "ps__rail-" + t
						}, consuming: "ps__child--consume"
					}, state: {
						focus: "ps--focus", clicking: "ps--clicking", active: function (t) {
							return "ps--active-" + t
						}, scrolling: function (t) {
							return "ps--scrolling-" + t
						}
					}
				}, Y = {x: null, y: null}, X = function (t) {
					this.element = t, this.handlers = {}
				}, w = {isEmpty: {configurable: !0}};
			X.prototype.bind = function (t, e) {
				void 0 === this.handlers[t] && (this.handlers[t] = []), this.handlers[t].push(e), this.element.addEventListener(t, e, !1)
			}, X.prototype.unbind = function (t, e) {
				var i = this;
				this.handlers[t] = this.handlers[t].filter(function (r) {
					return !(!e || r === e) || (i.element.removeEventListener(t, r, !1), !1)
				})
			}, X.prototype.unbindAll = function () {
				var t = this;
				for (var e in t.handlers) t.unbind(e)
			}, w.isEmpty.get = function () {
				var t = this;
				return Object.keys(this.handlers).every(function (e) {
					return 0 === t.handlers[e].length
				})
			}, Object.defineProperties(X.prototype, w);
			var y = function () {
				this.eventElements = []
			};
			y.prototype.eventElement = function (t) {
				var e = this.eventElements.filter(function (e) {
					return e.element === t
				})[0];
				return e || (e = new X(t), this.eventElements.push(e)), e
			}, y.prototype.bind = function (t, e, i) {
				this.eventElement(t).bind(e, i)
			}, y.prototype.unbind = function (t, e, i) {
				var r = this.eventElement(t);
				r.unbind(e, i), r.isEmpty && this.eventElements.splice(this.eventElements.indexOf(r), 1)
			}, y.prototype.unbindAll = function () {
				this.eventElements.forEach(function (t) {
					return t.unbindAll()
				}), this.eventElements = []
			}, y.prototype.once = function (t, e, i) {
				var r = this.eventElement(t), l = function (t) {
					r.unbind(e, l), i(t)
				};
				r.bind(e, l)
			};
			var W = function (t, e, i, r, l) {
				void 0 === r && (r = !0), void 0 === l && (l = !1);
				var n;
				if ("top" === e) n = ["contentHeight", "containerHeight", "scrollTop", "y", "up", "down"]; else {
					if ("left" !== e) throw new Error("A proper axis should be provided");
					n = ["contentWidth", "containerWidth", "scrollLeft", "x", "left", "right"]
				}
				h(t, i, n, r, l)
			}, L = {
				isWebKit: "undefined" != typeof document && "WebkitAppearance" in document.documentElement.style,
				supportsTouch: "undefined" != typeof window && ("ontouchstart" in window || window.DocumentTouch && document instanceof window.DocumentTouch),
				supportsIePointer: "undefined" != typeof navigator && navigator.msMaxTouchPoints,
				isChrome: "undefined" != typeof navigator && /Chrome/i.test(navigator && navigator.userAgent)
			}, R = function (t) {
				var e = t.element, i = Math.floor(e.scrollTop);
				t.containerWidth = e.clientWidth, t.containerHeight = e.clientHeight, t.contentWidth = e.scrollWidth, t.contentHeight = e.scrollHeight, e.contains(t.scrollbarXRail) || (n(e, m.element.rail("x")).forEach(function (t) {
					return l(t)
				}), e.appendChild(t.scrollbarXRail)), e.contains(t.scrollbarYRail) || (n(e, m.element.rail("y")).forEach(function (t) {
					return l(t)
				}), e.appendChild(t.scrollbarYRail)), !t.settings.suppressScrollX && t.containerWidth + t.settings.scrollXMarginOffset < t.contentWidth ? (t.scrollbarXActive = !0, t.railXWidth = t.containerWidth - t.railXMarginWidth, t.railXRatio = t.containerWidth / t.railXWidth, t.scrollbarXWidth = p(t, u(t.railXWidth * t.containerWidth / t.contentWidth)), t.scrollbarXLeft = u((t.negativeScrollAdjustment + e.scrollLeft) * (t.railXWidth - t.scrollbarXWidth) / (t.contentWidth - t.containerWidth))) : t.scrollbarXActive = !1, !t.settings.suppressScrollY && t.containerHeight + t.settings.scrollYMarginOffset < t.contentHeight ? (t.scrollbarYActive = !0, t.railYHeight = t.containerHeight - t.railYMarginHeight, t.railYRatio = t.containerHeight / t.railYHeight, t.scrollbarYHeight = p(t, u(t.railYHeight * t.containerHeight / t.contentHeight)), t.scrollbarYTop = u(i * (t.railYHeight - t.scrollbarYHeight) / (t.contentHeight - t.containerHeight))) : t.scrollbarYActive = !1, t.scrollbarXLeft >= t.railXWidth - t.scrollbarXWidth && (t.scrollbarXLeft = t.railXWidth - t.scrollbarXWidth), t.scrollbarYTop >= t.railYHeight - t.scrollbarYHeight && (t.scrollbarYTop = t.railYHeight - t.scrollbarYHeight), b(e, t), t.scrollbarXActive ? e.classList.add(m.state.active("x")) : (e.classList.remove(m.state.active("x")), t.scrollbarXWidth = 0, t.scrollbarXLeft = 0, e.scrollLeft = 0), t.scrollbarYActive ? e.classList.add(m.state.active("y")) : (e.classList.remove(m.state.active("y")), t.scrollbarYHeight = 0, t.scrollbarYTop = 0, e.scrollTop = 0)
			}, T = {
				"click-rail": function (t) {
					t.event.bind(t.scrollbarY, "mousedown", function (t) {
						return t.stopPropagation()
					}), t.event.bind(t.scrollbarYRail, "mousedown", function (e) {
						var i = e.pageY - window.pageYOffset - t.scrollbarYRail.getBoundingClientRect().top > t.scrollbarYTop ? 1 : -1;
						t.element.scrollTop += i * t.containerHeight, R(t), e.stopPropagation()
					}), t.event.bind(t.scrollbarX, "mousedown", function (t) {
						return t.stopPropagation()
					}), t.event.bind(t.scrollbarXRail, "mousedown", function (e) {
						var i = e.pageX - window.pageXOffset - t.scrollbarXRail.getBoundingClientRect().left > t.scrollbarXLeft ? 1 : -1;
						t.element.scrollLeft += i * t.containerWidth, R(t), e.stopPropagation()
					})
				}, "drag-thumb": function (t) {
					g(t, ["containerWidth", "contentWidth", "pageX", "railXWidth", "scrollbarX", "scrollbarXWidth", "scrollLeft", "x", "scrollbarXRail"]), g(t, ["containerHeight", "contentHeight", "pageY", "railYHeight", "scrollbarY", "scrollbarYHeight", "scrollTop", "y", "scrollbarYRail"])
				}, keyboard: function (t) {
					function e(e, r) {
						var l = Math.floor(i.scrollTop);
						if (0 === e) {
							if (!t.scrollbarYActive) return !1;
							if (0 === l && r > 0 || l >= t.contentHeight - t.containerHeight && r < 0) return !t.settings.wheelPropagation
						}
						var n = i.scrollLeft;
						if (0 === r) {
							if (!t.scrollbarXActive) return !1;
							if (0 === n && e < 0 || n >= t.contentWidth - t.containerWidth && e > 0) return !t.settings.wheelPropagation
						}
						return !0
					}

					var i = t.element, l = function () {
						return r(i, ":hover")
					}, n = function () {
						return r(t.scrollbarX, ":focus") || r(t.scrollbarY, ":focus")
					};
					t.event.bind(t.ownerDocument, "keydown", function (r) {
						if (!(r.isDefaultPrevented && r.isDefaultPrevented() || r.defaultPrevented) && (l() || n())) {
							var o = document.activeElement ? document.activeElement : t.ownerDocument.activeElement;
							if (o) {
								if ("IFRAME" === o.tagName) o = o.contentDocument.activeElement; else for (; o.shadowRoot;) o = o.shadowRoot.activeElement;
								if (d(o)) return
							}
							var s = 0, a = 0;
							switch (r.which) {
								case 37:
									s = r.metaKey ? -t.contentWidth : r.altKey ? -t.containerWidth : -30;
									break;
								case 38:
									a = r.metaKey ? t.contentHeight : r.altKey ? t.containerHeight : 30;
									break;
								case 39:
									s = r.metaKey ? t.contentWidth : r.altKey ? t.containerWidth : 30;
									break;
								case 40:
									a = r.metaKey ? -t.contentHeight : r.altKey ? -t.containerHeight : -30;
									break;
								case 32:
									a = r.shiftKey ? t.containerHeight : -t.containerHeight;
									break;
								case 33:
									a = t.containerHeight;
									break;
								case 34:
									a = -t.containerHeight;
									break;
								case 36:
									a = t.contentHeight;
									break;
								case 35:
									a = -t.contentHeight;
									break;
								default:
									return
							}
							t.settings.suppressScrollX && 0 !== s || t.settings.suppressScrollY && 0 !== a || (i.scrollTop -= a, i.scrollLeft += s, R(t), e(s, a) && r.preventDefault())
						}
					})
				}, wheel: function (e) {
					function i(t, i) {
						var r = Math.floor(o.scrollTop), l = 0 === o.scrollTop,
							n = r + o.offsetHeight === o.scrollHeight, s = 0 === o.scrollLeft,
							a = o.scrollLeft + o.offsetWidth === o.scrollWidth;
						return !(Math.abs(i) > Math.abs(t) ? l || n : s || a) || !e.settings.wheelPropagation
					}

					function r(t) {
						var e = t.deltaX, i = -1 * t.deltaY;
						return void 0 !== e && void 0 !== i || (e = -1 * t.wheelDeltaX / 6, i = t.wheelDeltaY / 6), t.deltaMode && 1 === t.deltaMode && (e *= 10, i *= 10), e !== e && i !== i && (e = 0, i = t.wheelDelta), t.shiftKey ? [-i, -e] : [e, i]
					}

					function l(e, i, r) {
						if (!L.isWebKit && o.querySelector("select:focus")) return !0;
						if (!o.contains(e)) return !1;
						for (var l = e; l && l !== o;) {
							if (l.classList.contains(m.element.consuming)) return !0;
							var n = t(l);
							if ([n.overflow, n.overflowX, n.overflowY].join("").match(/(scroll|auto)/)) {
								var s = l.scrollHeight - l.clientHeight;
								if (s > 0 && !(0 === l.scrollTop && r > 0 || l.scrollTop === s && r < 0)) return !0;
								var a = l.scrollWidth - l.clientWidth;
								if (a > 0 && !(0 === l.scrollLeft && i < 0 || l.scrollLeft === a && i > 0)) return !0
							}
							l = l.parentNode
						}
						return !1
					}

					function n(t) {
						var n = r(t), s = n[0], a = n[1];
						if (!l(t.target, s, a)) {
							var c = !1;
							e.settings.useBothWheelAxes ? e.scrollbarYActive && !e.scrollbarXActive ? (a ? o.scrollTop -= a * e.settings.wheelSpeed : o.scrollTop += s * e.settings.wheelSpeed, c = !0) : e.scrollbarXActive && !e.scrollbarYActive && (s ? o.scrollLeft += s * e.settings.wheelSpeed : o.scrollLeft -= a * e.settings.wheelSpeed, c = !0) : (o.scrollTop -= a * e.settings.wheelSpeed, o.scrollLeft += s * e.settings.wheelSpeed), R(e), (c = c || i(s, a)) && !t.ctrlKey && (t.stopPropagation(), t.preventDefault())
						}
					}

					var o = e.element;
					void 0 !== window.onwheel ? e.event.bind(o, "wheel", n) : void 0 !== window.onmousewheel && e.event.bind(o, "mousewheel", n)
				}, touch: function (e) {
					function i(t, i) {
						var r = Math.floor(h.scrollTop), l = h.scrollLeft, n = Math.abs(t), o = Math.abs(i);
						if (o > n) {
							if (i < 0 && r === e.contentHeight - e.containerHeight || i > 0 && 0 === r) return 0 === window.scrollY && i > 0 && L.isChrome
						} else if (n > o && (t < 0 && l === e.contentWidth - e.containerWidth || t > 0 && 0 === l)) return !0;
						return !0
					}

					function r(t, i) {
						h.scrollTop -= i, h.scrollLeft -= t, R(e)
					}

					function l(t) {
						return t.targetTouches ? t.targetTouches[0] : t
					}

					function n(t) {
						return !(t.pointerType && "pen" === t.pointerType && 0 === t.buttons || (!t.targetTouches || 1 !== t.targetTouches.length) && (!t.pointerType || "mouse" === t.pointerType || t.pointerType === t.MSPOINTER_TYPE_MOUSE))
					}

					function o(t) {
						if (n(t)) {
							var e = l(t);
							u.pageX = e.pageX, u.pageY = e.pageY, d = (new Date).getTime(), null !== p && clearInterval(p)
						}
					}

					function s(e, i, r) {
						if (!h.contains(e)) return !1;
						for (var l = e; l && l !== h;) {
							if (l.classList.contains(m.element.consuming)) return !0;
							var n = t(l);
							if ([n.overflow, n.overflowX, n.overflowY].join("").match(/(scroll|auto)/)) {
								var o = l.scrollHeight - l.clientHeight;
								if (o > 0 && !(0 === l.scrollTop && r > 0 || l.scrollTop === o && r < 0)) return !0;
								var s = l.scrollLeft - l.clientWidth;
								if (s > 0 && !(0 === l.scrollLeft && i < 0 || l.scrollLeft === s && i > 0)) return !0
							}
							l = l.parentNode
						}
						return !1
					}

					function a(t) {
						if (n(t)) {
							var e = l(t), o = {pageX: e.pageX, pageY: e.pageY}, a = o.pageX - u.pageX,
								c = o.pageY - u.pageY;
							if (s(t.target, a, c)) return;
							r(a, c), u = o;
							var h = (new Date).getTime(), p = h - d;
							p > 0 && (f.x = a / p, f.y = c / p, d = h), i(a, c) && t.preventDefault()
						}
					}

					function c() {
						e.settings.swipeEasing && (clearInterval(p), p = setInterval(function () {
							e.isInitialized ? clearInterval(p) : f.x || f.y ? Math.abs(f.x) < .01 && Math.abs(f.y) < .01 ? clearInterval(p) : (r(30 * f.x, 30 * f.y), f.x *= .8, f.y *= .8) : clearInterval(p)
						}, 10))
					}

					if (L.supportsTouch || L.supportsIePointer) {
						var h = e.element, u = {}, d = 0, f = {}, p = null;
						L.supportsTouch ? (e.event.bind(h, "touchstart", o), e.event.bind(h, "touchmove", a), e.event.bind(h, "touchend", c)) : L.supportsIePointer && (window.PointerEvent ? (e.event.bind(h, "pointerdown", o), e.event.bind(h, "pointermove", a), e.event.bind(h, "pointerup", c)) : window.MSPointerEvent && (e.event.bind(h, "MSPointerDown", o), e.event.bind(h, "MSPointerMove", a), e.event.bind(h, "MSPointerUp", c)))
					}
				}
			}, H = function (r, l) {
				var n = this;
				if (void 0 === l && (l = {}), "string" == typeof r && (r = document.querySelector(r)), !r || !r.nodeName) throw new Error("no element is specified to initialize PerfectScrollbar");
				this.element = r, r.classList.add(m.main), this.settings = {
					handlers: ["click-rail", "drag-thumb", "keyboard", "wheel", "touch"],
					maxScrollbarLength: null,
					minScrollbarLength: null,
					scrollingThreshold: 1e3,
					scrollXMarginOffset: 0,
					scrollYMarginOffset: 0,
					suppressScrollX: !1,
					suppressScrollY: !1,
					swipeEasing: !0,
					useBothWheelAxes: !1,
					wheelPropagation: !0,
					wheelSpeed: 1
				};
				for (var o in l) n.settings[o] = l[o];
				this.containerWidth = null, this.containerHeight = null, this.contentWidth = null, this.contentHeight = null;
				var s = function () {
					return r.classList.add(m.state.focus)
				}, a = function () {
					return r.classList.remove(m.state.focus)
				};
				this.isRtl = "rtl" === t(r).direction, this.isNegativeScroll = function () {
					var t = r.scrollLeft, e = null;
					return r.scrollLeft = -1, e = r.scrollLeft < 0, r.scrollLeft = t, e
				}(), this.negativeScrollAdjustment = this.isNegativeScroll ? r.scrollWidth - r.clientWidth : 0, this.event = new y, this.ownerDocument = r.ownerDocument || document, this.scrollbarXRail = i(m.element.rail("x")), r.appendChild(this.scrollbarXRail), this.scrollbarX = i(m.element.thumb("x")), this.scrollbarXRail.appendChild(this.scrollbarX), this.scrollbarX.setAttribute("tabindex", 0), this.event.bind(this.scrollbarX, "focus", s), this.event.bind(this.scrollbarX, "blur", a), this.scrollbarXActive = null, this.scrollbarXWidth = null, this.scrollbarXLeft = null;
				var c = t(this.scrollbarXRail);
				this.scrollbarXBottom = parseInt(c.bottom, 10), isNaN(this.scrollbarXBottom) ? (this.isScrollbarXUsingBottom = !1, this.scrollbarXTop = u(c.top)) : this.isScrollbarXUsingBottom = !0, this.railBorderXWidth = u(c.borderLeftWidth) + u(c.borderRightWidth), e(this.scrollbarXRail, {display: "block"}), this.railXMarginWidth = u(c.marginLeft) + u(c.marginRight), e(this.scrollbarXRail, {display: ""}), this.railXWidth = null, this.railXRatio = null, this.scrollbarYRail = i(m.element.rail("y")), r.appendChild(this.scrollbarYRail), this.scrollbarY = i(m.element.thumb("y")), this.scrollbarYRail.appendChild(this.scrollbarY), this.scrollbarY.setAttribute("tabindex", 0), this.event.bind(this.scrollbarY, "focus", s), this.event.bind(this.scrollbarY, "blur", a), this.scrollbarYActive = null, this.scrollbarYHeight = null, this.scrollbarYTop = null;
				var h = t(this.scrollbarYRail);
				this.scrollbarYRight = parseInt(h.right, 10), isNaN(this.scrollbarYRight) ? (this.isScrollbarYUsingRight = !1, this.scrollbarYLeft = u(h.left)) : this.isScrollbarYUsingRight = !0, this.scrollbarYOuterWidth = this.isRtl ? f(this.scrollbarY) : null, this.railBorderYWidth = u(h.borderTopWidth) + u(h.borderBottomWidth), e(this.scrollbarYRail, {display: "block"}), this.railYMarginHeight = u(h.marginTop) + u(h.marginBottom), e(this.scrollbarYRail, {display: ""}), this.railYHeight = null, this.railYRatio = null, this.reach = {
					x: r.scrollLeft <= 0 ? "start" : r.scrollLeft >= this.contentWidth - this.containerWidth ? "end" : null,
					y: r.scrollTop <= 0 ? "start" : r.scrollTop >= this.contentHeight - this.containerHeight ? "end" : null
				}, this.isAlive = !0, this.settings.handlers.forEach(function (t) {
					return T[t](n)
				}), this.lastScrollTop = Math.floor(r.scrollTop), this.lastScrollLeft = r.scrollLeft, this.event.bind(this.element, "scroll", function (t) {
					return n.onScroll(t)
				}), R(this)
			};
			return H.prototype.update = function () {
				this.isAlive && (this.negativeScrollAdjustment = this.isNegativeScroll ? this.element.scrollWidth - this.element.clientWidth : 0, e(this.scrollbarXRail, {display: "block"}), e(this.scrollbarYRail, {display: "block"}), this.railXMarginWidth = u(t(this.scrollbarXRail).marginLeft) + u(t(this.scrollbarXRail).marginRight), this.railYMarginHeight = u(t(this.scrollbarYRail).marginTop) + u(t(this.scrollbarYRail).marginBottom), e(this.scrollbarXRail, {display: "none"}), e(this.scrollbarYRail, {display: "none"}), R(this), W(this, "top", 0, !1, !0), W(this, "left", 0, !1, !0), e(this.scrollbarXRail, {display: ""}), e(this.scrollbarYRail, {display: ""}))
			}, H.prototype.onScroll = function (t) {
				this.isAlive && (R(this), W(this, "top", this.element.scrollTop - this.lastScrollTop), W(this, "left", this.element.scrollLeft - this.lastScrollLeft), this.lastScrollTop = Math.floor(this.element.scrollTop), this.lastScrollLeft = this.element.scrollLeft)
			}, H.prototype.destroy = function () {
				this.isAlive && (this.event.unbindAll(), l(this.scrollbarX), l(this.scrollbarY), l(this.scrollbarXRail), l(this.scrollbarYRail), this.removePsClasses(), this.element = null, this.scrollbarX = null, this.scrollbarY = null, this.scrollbarXRail = null, this.scrollbarYRail = null, this.isAlive = !1)
			}, H.prototype.removePsClasses = function () {
				this.element.className = this.element.className.split(" ").filter(function (t) {
					return !t.match(/^ps([-_].+|)$/)
				}).join(" ")
			}, H
		});

		/***/
	}),
	/* 38 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var utils = __webpack_require__(0);
		var bind = __webpack_require__(14);
		var Axios = __webpack_require__(40);
		var defaults = __webpack_require__(7);

		/**
		 * Create an instance of Axios
		 *
		 * @param {Object} defaultConfig The default config for the instance
		 * @return {Axios} A new instance of Axios
		 */
		function createInstance(defaultConfig) {
			var context = new Axios(defaultConfig);
			var instance = bind(Axios.prototype.request, context);

			// Copy axios.prototype to instance
			utils.extend(instance, Axios.prototype, context);

			// Copy context to instance
			utils.extend(instance, context);

			return instance;
		}

// Create the default instance to be exported
		var axios = createInstance(defaults);

// Expose Axios class to allow class inheritance
		axios.Axios = Axios;

// Factory for creating new instances
		axios.create = function create(instanceConfig) {
			return createInstance(utils.merge(defaults, instanceConfig));
		};

// Expose Cancel & CancelToken
		axios.Cancel = __webpack_require__(18);
		axios.CancelToken = __webpack_require__(54);
		axios.isCancel = __webpack_require__(17);

// Expose all/spread
		axios.all = function all(promises) {
			return Promise.all(promises);
		};
		axios.spread = __webpack_require__(55);

		module.exports = axios;

// Allow use of default import syntax in TypeScript
		module.exports.default = axios;

		/***/
	}),
	/* 39 */
	/***/ (function (module, exports) {

		/*!
 * Determine if an object is a Buffer
 *
 * @author   Feross Aboukhadijeh <https://feross.org>
 * @license  MIT
 */

// The _isBuffer check is for Safari 5-7 support, because it's missing
// Object.prototype.constructor. Remove this eventually
		module.exports = function (obj) {
			return obj != null && (isBuffer(obj) || isSlowBuffer(obj) || !!obj._isBuffer)
		}

		function isBuffer(obj) {
			return !!obj.constructor && typeof obj.constructor.isBuffer === 'function' && obj.constructor.isBuffer(obj)
		}

// For Node v0.10 support. Remove this eventually.
		function isSlowBuffer(obj) {
			return typeof obj.readFloatLE === 'function' && typeof obj.slice === 'function' && isBuffer(obj.slice(0, 0))
		}

		/***/
	}),
	/* 40 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var defaults = __webpack_require__(7);
		var utils = __webpack_require__(0);
		var InterceptorManager = __webpack_require__(49);
		var dispatchRequest = __webpack_require__(50);

		/**
		 * Create a new instance of Axios
		 *
		 * @param {Object} instanceConfig The default config for the instance
		 */
		function Axios(instanceConfig) {
			this.defaults = instanceConfig;
			this.interceptors = {
				request: new InterceptorManager(),
				response: new InterceptorManager()
			};
		}

		/**
		 * Dispatch a request
		 *
		 * @param {Object} config The config specific for this request (merged with this.defaults)
		 */
		Axios.prototype.request = function request(config) {
			/*eslint no-param-reassign:0*/
			// Allow for axios('example/url'[, config]) a la fetch API
			if (typeof config === 'string') {
				config = utils.merge({
					url: arguments[0]
				}, arguments[1]);
			}

			config = utils.merge(defaults, {method: 'get'}, this.defaults, config);
			config.method = config.method.toLowerCase();

			// Hook up interceptors middleware
			var chain = [dispatchRequest, undefined];
			var promise = Promise.resolve(config);

			this.interceptors.request.forEach(function unshiftRequestInterceptors(interceptor) {
				chain.unshift(interceptor.fulfilled, interceptor.rejected);
			});

			this.interceptors.response.forEach(function pushResponseInterceptors(interceptor) {
				chain.push(interceptor.fulfilled, interceptor.rejected);
			});

			while (chain.length) {
				promise = promise.then(chain.shift(), chain.shift());
			}

			return promise;
		};

// Provide aliases for supported request methods
		utils.forEach(['delete', 'get', 'head', 'options'], function forEachMethodNoData(method) {
			/*eslint func-names:0*/
			Axios.prototype[method] = function (url, config) {
				return this.request(utils.merge(config || {}, {
					method: method,
					url: url
				}));
			};
		});

		utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
			/*eslint func-names:0*/
			Axios.prototype[method] = function (url, data, config) {
				return this.request(utils.merge(config || {}, {
					method: method,
					url: url,
					data: data
				}));
			};
		});

		module.exports = Axios;

		/***/
	}),
	/* 41 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var utils = __webpack_require__(0);

		module.exports = function normalizeHeaderName(headers, normalizedName) {
			utils.forEach(headers, function processHeader(value, name) {
				if (name !== normalizedName && name.toUpperCase() === normalizedName.toUpperCase()) {
					headers[normalizedName] = value;
					delete headers[name];
				}
			});
		};

		/***/
	}),
	/* 42 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var createError = __webpack_require__(16);

		/**
		 * Resolve or reject a Promise based on response status.
		 *
		 * @param {Function} resolve A function that resolves the promise.
		 * @param {Function} reject A function that rejects the promise.
		 * @param {object} response The response.
		 */
		module.exports = function settle(resolve, reject, response) {
			var validateStatus = response.config.validateStatus;
			// Note: status is not exposed by XDomainRequest
			if (!response.status || !validateStatus || validateStatus(response.status)) {
				resolve(response);
			} else {
				reject(createError(
					'Request failed with status code ' + response.status,
					response.config,
					null,
					response.request,
					response
				));
			}
		};

		/***/
	}),
	/* 43 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		/**
		 * Update an Error with the specified config, error code, and response.
		 *
		 * @param {Error} error The error to update.
		 * @param {Object} config The config.
		 * @param {string} [code] The error code (for example, 'ECONNABORTED').
		 * @param {Object} [request] The request.
		 * @param {Object} [response] The response.
		 * @returns {Error} The error.
		 */
		module.exports = function enhanceError(error, config, code, request, response) {
			error.config = config;
			if (code) {
				error.code = code;
			}
			error.request = request;
			error.response = response;
			return error;
		};

		/***/
	}),
	/* 44 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var utils = __webpack_require__(0);

		function encode(val) {
			return encodeURIComponent(val).replace(/%40/gi, '@').replace(/%3A/gi, ':').replace(/%24/g, '$').replace(/%2C/gi, ',').replace(/%20/g, '+').replace(/%5B/gi, '[').replace(/%5D/gi, ']');
		}

		/**
		 * Build a URL by appending params to the end
		 *
		 * @param {string} url The base of the url (e.g., http://www.google.com)
		 * @param {object} [params] The params to be appended
		 * @returns {string} The formatted url
		 */
		module.exports = function buildURL(url, params, paramsSerializer) {
			/*eslint no-param-reassign:0*/
			if (!params) {
				return url;
			}

			var serializedParams;
			if (paramsSerializer) {
				serializedParams = paramsSerializer(params);
			} else if (utils.isURLSearchParams(params)) {
				serializedParams = params.toString();
			} else {
				var parts = [];

				utils.forEach(params, function serialize(val, key) {
					if (val === null || typeof val === 'undefined') {
						return;
					}

					if (utils.isArray(val)) {
						key = key + '[]';
					} else {
						val = [val];
					}

					utils.forEach(val, function parseValue(v) {
						if (utils.isDate(v)) {
							v = v.toISOString();
						} else if (utils.isObject(v)) {
							v = JSON.stringify(v);
						}
						parts.push(encode(key) + '=' + encode(v));
					});
				});

				serializedParams = parts.join('&');
			}

			if (serializedParams) {
				url += (url.indexOf('?') === -1 ? '?' : '&') + serializedParams;
			}

			return url;
		};

		/***/
	}),
	/* 45 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var utils = __webpack_require__(0);

// Headers whose duplicates are ignored by node
// c.f. https://nodejs.org/api/http.html#http_message_headers
		var ignoreDuplicateOf = [
			'age', 'authorization', 'content-length', 'content-type', 'etag',
			'expires', 'from', 'host', 'if-modified-since', 'if-unmodified-since',
			'last-modified', 'location', 'max-forwards', 'proxy-authorization',
			'referer', 'retry-after', 'user-agent'
		];

		/**
		 * Parse headers into an object
		 *
		 * ```
		 * Date: Wed, 27 Aug 2014 08:58:49 GMT
		 * Content-Type: application/json
		 * Connection: keep-alive
		 * Transfer-Encoding: chunked
		 * ```
		 *
		 * @param {String} headers Headers needing to be parsed
		 * @returns {Object} Headers parsed into an object
		 */
		module.exports = function parseHeaders(headers) {
			var parsed = {};
			var key;
			var val;
			var i;

			if (!headers) {
				return parsed;
			}

			utils.forEach(headers.split('\n'), function parser(line) {
				i = line.indexOf(':');
				key = utils.trim(line.substr(0, i)).toLowerCase();
				val = utils.trim(line.substr(i + 1));

				if (key) {
					if (parsed[key] && ignoreDuplicateOf.indexOf(key) >= 0) {
						return;
					}
					if (key === 'set-cookie') {
						parsed[key] = (parsed[key] ? parsed[key] : []).concat([val]);
					} else {
						parsed[key] = parsed[key] ? parsed[key] + ', ' + val : val;
					}
				}
			});

			return parsed;
		};

		/***/
	}),
	/* 46 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var utils = __webpack_require__(0);

		module.exports = (
			utils.isStandardBrowserEnv() ?

				// Standard browser envs have full support of the APIs needed to test
				// whether the request URL is of the same origin as current location.
				(function standardBrowserEnv() {
					var msie = /(msie|trident)/i.test(navigator.userAgent);
					var urlParsingNode = document.createElement('a');
					var originURL;

					/**
					 * Parse a URL to discover it's components
					 *
					 * @param {String} url The URL to be parsed
					 * @returns {Object}
					 */
					function resolveURL(url) {
						var href = url;

						if (msie) {
							// IE needs attribute set twice to normalize properties
							urlParsingNode.setAttribute('href', href);
							href = urlParsingNode.href;
						}

						urlParsingNode.setAttribute('href', href);

						// urlParsingNode provides the UrlUtils interface - http://url.spec.whatwg.org/#urlutils
						return {
							href: urlParsingNode.href,
							protocol: urlParsingNode.protocol ? urlParsingNode.protocol.replace(/:$/, '') : '',
							host: urlParsingNode.host,
							search: urlParsingNode.search ? urlParsingNode.search.replace(/^\?/, '') : '',
							hash: urlParsingNode.hash ? urlParsingNode.hash.replace(/^#/, '') : '',
							hostname: urlParsingNode.hostname,
							port: urlParsingNode.port,
							pathname: (urlParsingNode.pathname.charAt(0) === '/') ?
								urlParsingNode.pathname :
								'/' + urlParsingNode.pathname
						};
					}

					originURL = resolveURL(window.location.href);

					/**
					 * Determine if a URL shares the same origin as the current location
					 *
					 * @param {String} requestURL The URL to test
					 * @returns {boolean} True if URL shares the same origin, otherwise false
					 */
					return function isURLSameOrigin(requestURL) {
						var parsed = (utils.isString(requestURL)) ? resolveURL(requestURL) : requestURL;
						return (parsed.protocol === originURL.protocol &&
							parsed.host === originURL.host);
					};
				})() :

				// Non standard browser envs (web workers, react-native) lack needed support.
				(function nonStandardBrowserEnv() {
					return function isURLSameOrigin() {
						return true;
					};
				})()
		);

		/***/
	}),
	/* 47 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

// btoa polyfill for IE<10 courtesy https://github.com/davidchambers/Base64.js

		var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';

		function E() {
			this.message = 'String contains an invalid character';
		}

		E.prototype = new Error;
		E.prototype.code = 5;
		E.prototype.name = 'InvalidCharacterError';

		function btoa(input) {
			var str = String(input);
			var output = '';
			for (
				// initialize result and counter
				var block, charCode, idx = 0, map = chars;
				// if the next str index does not exist:
				//   change the mapping table to "="
				//   check if d has no fractional digits
				str.charAt(idx | 0) || (map = '=', idx % 1);
				// "8 - idx % 1 * 8" generates the sequence 2, 4, 6, 8
				output += map.charAt(63 & block >> 8 - idx % 1 * 8)
			) {
				charCode = str.charCodeAt(idx += 3 / 4);
				if (charCode > 0xFF) {
					throw new E();
				}
				block = block << 8 | charCode;
			}
			return output;
		}

		module.exports = btoa;

		/***/
	}),
	/* 48 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var utils = __webpack_require__(0);

		module.exports = (
			utils.isStandardBrowserEnv() ?

				// Standard browser envs support document.cookie
				(function standardBrowserEnv() {
					return {
						write: function write(name, value, expires, path, domain, secure) {
							var cookie = [];
							cookie.push(name + '=' + encodeURIComponent(value));

							if (utils.isNumber(expires)) {
								cookie.push('expires=' + new Date(expires).toGMTString());
							}

							if (utils.isString(path)) {
								cookie.push('path=' + path);
							}

							if (utils.isString(domain)) {
								cookie.push('domain=' + domain);
							}

							if (secure === true) {
								cookie.push('secure');
							}

							document.cookie = cookie.join('; ');
						},

						read: function read(name) {
							var match = document.cookie.match(new RegExp('(^|;\\s*)(' + name + ')=([^;]*)'));
							return (match ? decodeURIComponent(match[3]) : null);
						},

						remove: function remove(name) {
							this.write(name, '', Date.now() - 86400000);
						}
					};
				})() :

				// Non standard browser env (web workers, react-native) lack needed support.
				(function nonStandardBrowserEnv() {
					return {
						write: function write() {
						},
						read: function read() {
							return null;
						},
						remove: function remove() {
						}
					};
				})()
		);

		/***/
	}),
	/* 49 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var utils = __webpack_require__(0);

		function InterceptorManager() {
			this.handlers = [];
		}

		/**
		 * Add a new interceptor to the stack
		 *
		 * @param {Function} fulfilled The function to handle `then` for a `Promise`
		 * @param {Function} rejected The function to handle `reject` for a `Promise`
		 *
		 * @return {Number} An ID used to remove interceptor later
		 */
		InterceptorManager.prototype.use = function use(fulfilled, rejected) {
			this.handlers.push({
				fulfilled: fulfilled,
				rejected: rejected
			});
			return this.handlers.length - 1;
		};

		/**
		 * Remove an interceptor from the stack
		 *
		 * @param {Number} id The ID that was returned by `use`
		 */
		InterceptorManager.prototype.eject = function eject(id) {
			if (this.handlers[id]) {
				this.handlers[id] = null;
			}
		};

		/**
		 * Iterate over all the registered interceptors
		 *
		 * This method is particularly useful for skipping over any
		 * interceptors that may have become `null` calling `eject`.
		 *
		 * @param {Function} fn The function to call for each interceptor
		 */
		InterceptorManager.prototype.forEach = function forEach(fn) {
			utils.forEach(this.handlers, function forEachHandler(h) {
				if (h !== null) {
					fn(h);
				}
			});
		};

		module.exports = InterceptorManager;

		/***/
	}),
	/* 50 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var utils = __webpack_require__(0);
		var transformData = __webpack_require__(51);
		var isCancel = __webpack_require__(17);
		var defaults = __webpack_require__(7);
		var isAbsoluteURL = __webpack_require__(52);
		var combineURLs = __webpack_require__(53);

		/**
		 * Throws a `Cancel` if cancellation has been requested.
		 */
		function throwIfCancellationRequested(config) {
			if (config.cancelToken) {
				config.cancelToken.throwIfRequested();
			}
		}

		/**
		 * Dispatch a request to the server using the configured adapter.
		 *
		 * @param {object} config The config that is to be used for the request
		 * @returns {Promise} The Promise to be fulfilled
		 */
		module.exports = function dispatchRequest(config) {
			throwIfCancellationRequested(config);

			// Support baseURL config
			if (config.baseURL && !isAbsoluteURL(config.url)) {
				config.url = combineURLs(config.baseURL, config.url);
			}

			// Ensure headers exist
			config.headers = config.headers || {};

			// Transform request data
			config.data = transformData(
				config.data,
				config.headers,
				config.transformRequest
			);

			// Flatten headers
			config.headers = utils.merge(
				config.headers.common || {},
				config.headers[config.method] || {},
				config.headers || {}
			);

			utils.forEach(
				['delete', 'get', 'head', 'post', 'put', 'patch', 'common'],
				function cleanHeaderConfig(method) {
					delete config.headers[method];
				}
			);

			var adapter = config.adapter || defaults.adapter;

			return adapter(config).then(function onAdapterResolution(response) {
				throwIfCancellationRequested(config);

				// Transform response data
				response.data = transformData(
					response.data,
					response.headers,
					config.transformResponse
				);

				return response;
			}, function onAdapterRejection(reason) {
				if (!isCancel(reason)) {
					throwIfCancellationRequested(config);

					// Transform response data
					if (reason && reason.response) {
						reason.response.data = transformData(
							reason.response.data,
							reason.response.headers,
							config.transformResponse
						);
					}
				}

				return Promise.reject(reason);
			});
		};

		/***/
	}),
	/* 51 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var utils = __webpack_require__(0);

		/**
		 * Transform the data for a request or a response
		 *
		 * @param {Object|String} data The data to be transformed
		 * @param {Array} headers The headers for the request or response
		 * @param {Array|Function} fns A single function or Array of functions
		 * @returns {*} The resulting transformed data
		 */
		module.exports = function transformData(data, headers, fns) {
			/*eslint no-param-reassign:0*/
			utils.forEach(fns, function transform(fn) {
				data = fn(data, headers);
			});

			return data;
		};

		/***/
	}),
	/* 52 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		/**
		 * Determines whether the specified URL is absolute
		 *
		 * @param {string} url The URL to test
		 * @returns {boolean} True if the specified URL is absolute, otherwise false
		 */
		module.exports = function isAbsoluteURL(url) {
			// A URL is considered absolute if it begins with "<scheme>://" or "//" (protocol-relative URL).
			// RFC 3986 defines scheme name as a sequence of characters beginning with a letter and followed
			// by any combination of letters, digits, plus, period, or hyphen.
			return /^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(url);
		};

		/***/
	}),
	/* 53 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		/**
		 * Creates a new URL by combining the specified URLs
		 *
		 * @param {string} baseURL The base URL
		 * @param {string} relativeURL The relative URL
		 * @returns {string} The combined URL
		 */
		module.exports = function combineURLs(baseURL, relativeURL) {
			return relativeURL
				? baseURL.replace(/\/+$/, '') + '/' + relativeURL.replace(/^\/+/, '')
				: baseURL;
		};

		/***/
	}),
	/* 54 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var Cancel = __webpack_require__(18);

		/**
		 * A `CancelToken` is an object that can be used to request cancellation of an operation.
		 *
		 * @class
		 * @param {Function} executor The executor function.
		 */
		function CancelToken(executor) {
			if (typeof executor !== 'function') {
				throw new TypeError('executor must be a function.');
			}

			var resolvePromise;
			this.promise = new Promise(function promiseExecutor(resolve) {
				resolvePromise = resolve;
			});

			var token = this;
			executor(function cancel(message) {
				if (token.reason) {
					// Cancellation has already been requested
					return;
				}

				token.reason = new Cancel(message);
				resolvePromise(token.reason);
			});
		}

		/**
		 * Throws a `Cancel` if cancellation has been requested.
		 */
		CancelToken.prototype.throwIfRequested = function throwIfRequested() {
			if (this.reason) {
				throw this.reason;
			}
		};

		/**
		 * Returns an object that contains a new `CancelToken` and a function that, when called,
		 * cancels the `CancelToken`.
		 */
		CancelToken.source = function source() {
			var cancel;
			var token = new CancelToken(function executor(c) {
				cancel = c;
			});
			return {
				token: token,
				cancel: cancel
			};
		};

		module.exports = CancelToken;

		/***/
	}),
	/* 55 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		/**
		 * Syntactic sugar for invoking a function and expanding an array for arguments.
		 *
		 * Common use case would be to use `Function.prototype.apply`.
		 *
		 *  ```js
		 *  function f(x, y, z) {}
		 *  var args = [1, 2, 3];
		 *  f.apply(null, args);
		 *  ```
		 *
		 * With `spread` this example can be re-written.
		 *
		 *  ```js
		 *  spread(function(x, y, z) {})([1, 2, 3]);
		 *  ```
		 *
		 * @param {Function} callback
		 * @returns {Function}
		 */
		module.exports = function spread(callback) {
			return function wrap(arr) {
				return callback.apply(null, arr);
			};
		};

		/***/
	}),
	/* 56 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var Vue = __webpack_require__(1),
			OnOff = __webpack_require__(57),
			template = __webpack_require__(59),
			axios = __webpack_require__(6);

		var CFDDNew = function CFDDNew() {
			var self = this;
			OnOff.call(this);
			this.template = template;
			/**
			 * The required prop 'searchfield' to build HTTP query string.
			 */

			this.props = {
				searchconfig: {
					type: Object,
					required: true
				}
			};

			this.data = function () {
				var vm = this;
				return {
					ison: false,
					isloading: false,
					isfound: false,
					isjustselected: false,
					searchvalue: vm.$props.searchconfig.initial,
					foundlist: null
				};
			};
			/**
			 * Monitor the 'searchvalue' field and send the HTTP request
			 * @param  string searchtext The search form 'vacancy' field to send as
			 * the HTTP request value.
			 * @param string searchvalue The value to search.
			 */


			this.watch.searchvalue = function (searchvalue) {
				var vm = this;
				/**
				 * The case when the value is just selected from the lookup list.
				 */

				this.$data.isfound = this.$data.isjustselected;
				this.$data.isjustselected = false;
				/**
				 * Notify the parent that the field content has changed.
				 */

				this.$parent.$emit('cfdropdown:input', {
					field: this.$props.searchconfig.field,
					value: searchvalue
				});

				if (searchvalue.length > 2) {
					this.$data.isloading = true;
					self.searchDB(this, this.$props.searchconfig.field, searchvalue, resultProcessor);

					console.log('searchvalue2 = ' + searchvalue);


				} else {
					this.$data.isfound = false;
				}

				function resultProcessor(result) {
					var r = result.data.dt.results;

					if (r) {
						vm.$data.foundlist = r ? r : null;
						vm.$data.isfound = r ? true : false;
					} else {
						vm.$data.isfound = false;
					}
				}
			};

			this.watch.isfound = function (status) {
				this.$data.ison = status;
			};

			this.methods.selectItem = function (value) {
				this.$data.searchvalue = value;
				this.$data.isjustselected = true;
			};

			console.dir(this);
			Vue.component('context-field-drop-down', this);
		};

		CFDDNew.prototype = Object.create(OnOff.prototype);
		CFDDNew.prototype.constructor = CFDDNew;
		/**
		 * Search the database via HTTP request for text and location.
		 * @param  Vue vm                       The ViewModel
		 * @param  string searchfield           The field to query the backend.
		 * @param  string searchvalue           The search value for the query.
		 * @param  function resultProcessor     The result processor callback.
		 */

		CFDDNew.prototype.searchDB = function (vm, searchfield, searchvalue, resultProcessor) {
			var api = vm.$props.searchconfig.api;
			searchvalue = encodeURIComponent(searchvalue);
			console.log('searchvalue1 = ' + searchvalue);
			var request = "".concat(api, "&queryvars[").concat(searchfield, "]=").concat(searchvalue);
			console.log("Sending request to: ".concat(request));
			axios.get(request).then(resultProcessor).catch(function (err) {
				console.dir(err);
			}).then(function () {
				vm.$data.isloading = false;
			});
		};

		module.exports = new CFDDNew();

		/***/
	}),
	/* 57 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";
		/**
		 * The prototype of the On / Off object to use in On / Off Vue components.
		 */


		var deepmerge = __webpack_require__(58);
		/**
		 * The ON/OFF state manager for Vue components.
		 * @param string    sel       HTML selector (optional).
		 */


		var OnOff = function OnOff(sel) {
			var self = this;
			this.settings = {
				toggleoff: {
					onbody: true,
					onesc: true,
					onother: true
				},

				/**
				 * Can be overwritten with 'ison: true' set on child object's data.
				 */
				onstart: false,
				name: null
			};

			if (sel) {
				/**
				 * For use as a standalone Vue instance, not in the component.
				 */
				this.el = sel;
			}

			this.data = function () {
				return {
					ison: false
				};
			};

			this.methods = {
				_on: function _on() {
					this.ison = true;
				},
				_off: function _off() {
					this.ison = false;
				},
				_toggle: function _toggle() {
					this.ison = !this.ison;
				}
			};
			this.props = {
				/**
				 * Passed from the custom element's markup.
				 * @see this.settings
				 * @see this.created, the part with config initialization.
				 */
				config: Object
			};
			this.watch = {
				ison: function ison(state) {
					/**
					 * Manage the conditional engage the several toggle off triggers.
					 */
					this.settings.toggleoff.onesc && self.manageEsc(state, this);
					this.settings.toggleoff.onbody && self.manageBodyClick(state, this);

					if (state) {
						/**
						 * Announce to the $root Vue event bus that the 'this._uid'
						 * OnOff comoponent has been toggled on.
						 */
						this.settings.toggleoff.onother && this.$root.$emit('onoff:on', {
							uid: this._uid
						});
					}
				}
			};

			this.created = function () {
				/**
				 * Creates the run-time config from props passed in the component
				 * markup. It defines if the a particular OnOff instance should get
				 * toggled off on either body click, Esc key or other OnOff instance
				 * is toggled on within the boundaries of the current Vue instance.
				 */
				if (this.$props.config !== undefined) {
					this.settings = deepmerge(self.settings, this.$props.config);
				} else {
					this.settings = self.settings;
				}
			};

			this.mounted = function () {
				this.$nextTick(function () {
					var _this = this;

					/**
					 * Set the initial ison state based on the OnOff settings & user
					 * config passed with props. The behaviour can be overwritten in
					 * child object's data.
					 * @see this.settings.
					 */
					this.settings.onstart && this._on();
					/**
					 * The 'toggler:on' event handler toggles off all the OnOff
					 * components within the current $root Vue instance other than the
					 * component that fired the event.
					 */

					this.$root.$on('onoff:on', function (data) {
						if (data.uid !== _this._uid) {
							_this._off();
						}
					});
					/**
					 * NB!: If use the this.$root.$emit(), the event handler is called
					 * in power 2 of the number of the instantiated components. Safe use
					 * is fire event on the component base (this.$emit() and this.$on()).
					 *
					 * Signal to child objects that parent OnOff Vue instance is
					 * mounted. Children objects cannot use their own 'mounted' hook
					 * straight away. They have to save the parent's 'mounted' hook and
					 * call it within their 'mounted' hooks. Then they can attach the
					 * Vue $root listener tp 'onoff:mounted' event to make sure they
					 * conduct DOM and other things when the parent Vue instance is
					 * mounted.
					 * @see ComponentFilterWidget.mounted().
					 */

					this.$emit('onoff:mounted', {
						name: 'testname'
					}); // console.log('onoff:mounted event is fired...');
				});
			};
		};

		OnOff.prototype.manageEsc = function (state, vm) {
			if (state) {
				document.addEventListener('keyup', _escHandler);
			} else {
				document.removeEventListener('keyup', _escHandler);
			}

			function _escHandler(evt) {
				if (evt.keyCode === 27) {
					vm._off();
				}
			}
		};

		OnOff.prototype.manageBodyClick = function (state, vm) {
			if (state) {
				document.body.addEventListener('click', _bodyClickHandler);
			} else {
				document.body.removeEventListener('click', _bodyClickHandler);
			}

			function _bodyClickHandler() {
				vm._off();
			}
		};

		module.exports = OnOff;

		/***/
	}),
	/* 58 */
	/***/ (function (module, exports, __webpack_require__) {

		(function (global, factory) {
			true ? module.exports = factory() :
				typeof define === 'function' && define.amd ? define(factory) :
					(global.deepmerge = factory());
		}(this, (function () {
			'use strict';

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
				source.forEach(function (e, i) {
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
					Object.keys(target).forEach(function (key) {
						destination[key] = cloneIfNecessary(target[key], optionsArgument);
					});
				}
				Object.keys(source).forEach(function (key) {
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
				var options = optionsArgument || {arrayMerge: defaultArrayMerge};
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
				return array.reduce(function (prev, next) {
					return deepmerge(prev, next, optionsArgument)
				})
			};

			var deepmerge_1 = deepmerge;

			return deepmerge_1;

		})));

		/***/
	}),
	/* 59 */
	/***/ (function (module, exports) {

		module.exports = "<div class=wj-drop-down-wrapper v-bind:class=\"{'wj-expanded': ison}\"> <slot name=toggler v-bind:self=this><p>FormVacancySearch Componenet: place toggler element|block here</p></slot> <slot name=content v-bind:self=this><p>FormVacancySearch Componenet: place content block here</p></slot> </div> ";

		/***/
	}),
	/* 60 */
	/***/ (function (module, exports) {

		module.exports = "<div> <slot name=markup v-bind:self=this></slot> </div> ";

		/***/
	}),
	/* 61 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var WidgetFilter = __webpack_require__(2),
			ControlbarFilter = __webpack_require__(8),
			// PaymentRange = require('./PaymentRange.es6'),
			PaymentFilter = __webpack_require__(9); // const api = '../server/api/search/vacancy/?';

		/**
		 * The Vue data object.
		 *
		 * NB!: String values in the object propertias are given for documenting the
		 * initialization values.
		 *
		 * @var Object togglers         Boolean keys denoting a toggler's ON state when
		 * 'true', otherwise 'false'.
		 * @var Object sidebar.lists    The actual sidebar lists content changeable with
		 * requests to the server DB or with user filtering.
		 * @var Object sidebar.filters  The respective sidebar filter fields content at
		 * each moment of time.
		 * @var bool request.trigger    The request trigger that fires the watcher to
		 * get the data from WP DB.
		 * @var string request.query    The pre-populater query string to send to the
		 * server.
		 * @var object request.filters  The content of each request filter currently set
		 * by user.
		 */


		var ModelData = function ModelData(storage) {
			console.log('storage');
			console.log(storage);


			this.init = {
				text: storage.contextsearch.text,
				location: storage.contextsearch.location
			};
			this.togglers = {
				sidebar: {
					city: true,
					country: true,
					industry: true,
					specialism: true
				},
				controlbar: {
					payment: false,
					vactype: false,
					sorting: false,
					source: false
				}
			};
			this.sidebar = {
				lists: {
					city: storage.sidebar.city,
					country: storage.sidebar.country,
					industry: storage.sidebar.industry,
					specialism: storage.sidebar.specialism,
				},
				filters: {
					city: null,
					country: null,
					industry: null,
					specialism: null
				}
			};
			this.controlbar = {
				lists: {
					vactype: storage.controlbar.vactype,
					source: storage.controlbar.source,
					sorting: storage.controlbar.sorting,
					payment: {
						type: storage.controlbar.payment,
						typeselected: storage.controlbar.payment[0].id,
						range: storage.controlbar.payment[0].ranges,
						rangeselected: storage.controlbar.payment[0].ranges[0].id
					}
				}
			};
			this.contextsearch = {
				text: storage.contextsearch.text,
				location: storage.contextsearch.location
			};
			this.results = storage.results;
			this.requestdata = {
				api: storage.requestdata.api,
				triggers: {
					more: false,
					new: false
				},
				isloading: false,
				isnotfound: false,
				haspagestarted: false,
				query: null,
				page: 1,
				filters: {
					city: new WidgetFilter(),
					country: new WidgetFilter(),
					industry: new WidgetFilter(storage.contextsearch.industry ? storage.sidebar.industry.filter(i => i.id == storage.contextsearch.industry).pop() : false),
					specialism: new WidgetFilter(storage.contextsearch.specialism ? storage.sidebar.specialism.filter(i => i.id == storage.contextsearch.specialism).pop() : false),
					vactype: new ControlbarFilter(),
					source: new ControlbarFilter(storage.contextsearch.source ? storage.controlbar.source.filter(i => i.name == storage.contextsearch.source).pop() : false),
					sorting: new ControlbarFilter(storage.controlbar.sorting[0]),
					payment: new PaymentFilter(),
					text: storage.contextsearch.text,
					location: storage.contextsearch.location
				}
			};
		};

		module.exports = ModelData;

		/***/
	}),
	/* 62 */
	/***/ (function (module, exports, __webpack_require__) {

		/**
		 * The storage for the data received after the request. As should accumulate the
		 * data after the initial page load. Used by Search module to populate the
		 * initial ViewModel state.
		 */
		var axios = __webpack_require__(63);
		/**
		 * The storage to keep the original non-modified data received from DB and
		 * links to some instantiated instruments (e.g. Fuse).
		 * @var Object sidebar The data for the sidebar widged received with the
		 * latest request to DB.
		 * @var Object fuses Keeps the pointers to the Fuse instances for each
		 * sidebar list.
		 * @var object widgetfilter The empty widget filter template to (re)initize
		 * the sidebar widget filters.
		 */


		var Storage = function Storage() {
			'use strict';

			this.sidebar = {
				city: null,
				country: null,
				industry: null,
				specialism: null
			};
			this.controlbar = {
				vactype: null,
				sorting: null,
				payment: null
			};
			this.contextsearch = {
				text: null,
				location: null,
				industry: null,
				specialism: null
			};
			this.requestdata = {
				api: null
			};
		};
		/**
		 * The method expects the search data are give in the 'window.haysApp.vacsearch'
		 * JSON at the initial search page load.
		 */


		Storage.prototype.init = function () {
			'use strict';

			this.sidebar.city = window.haysApp.vacsearch.city;
			this.sidebar.country = window.haysApp.vacsearch.country;
			this.sidebar.industry = window.haysApp.vacsearch.industry;
			this.sidebar.specialism = window.haysApp.vacsearch.specialism;
			this.controlbar.vactype = window.haysApp.vacsearch.vactype;
			this.controlbar.source = window.haysApp.vacsearch.source;
			this.controlbar.sorting = window.haysApp.vacsearch.sorting;
			this.controlbar.payment = window.haysApp.vacsearch.payment;
			this.contextsearch.text = window.haysApp.vacsearch.contextsearch.text;
			this.contextsearch.location = window.haysApp.vacsearch.contextsearch.location;
			this.contextsearch.industry = window.haysApp.vacsearch.contextsearch.industry;
			this.contextsearch.specialism = window.haysApp.vacsearch.contextsearch.specialism;
			this.contextsearch.source = window.haysApp.vacsearch.contextsearch.source;
			this.results = window.haysApp.vacsearch.results;
			this.requestdata.api = window.haysApp.variables.apiuri;
			return this;
		};

		Storage.prototype.getData = function (vm, request, resultProcessor) {
			'use strict';

			console.log("Sending request to: ".concat(request));
			axios.get(request).then(resultProcessor).catch(function (err) {
				console.dir(err);
			}).then(function () {
				vm.$data.requestdata.isloading = false;
			});
		};

		module.exports = Storage;

		/***/
	}),
	/* 63 */
	/***/ (function (module, exports, __webpack_require__) {

		/* WEBPACK VAR INJECTION */
		(function (process) {/* axios v0.18.0 | (c) 2018 by Matt Zabriskie */
			!function (e, t) {
				true ? module.exports = t() : "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? exports.axios = t() : e.axios = t()
			}(this, function () {
				return function (e) {
					function t(r) {
						if (n[r]) return n[r].exports;
						var o = n[r] = {exports: {}, id: r, loaded: !1};
						return e[r].call(o.exports, o, o.exports, t), o.loaded = !0, o.exports
					}

					var n = {};
					return t.m = e, t.c = n, t.p = "", t(0)
				}([function (e, t, n) {
					e.exports = n(1)
				}, function (e, t, n) {
					"use strict";

					function r(e) {
						var t = new s(e), n = i(s.prototype.request, t);
						return o.extend(n, s.prototype, t), o.extend(n, t), n
					}

					var o = n(2), i = n(3), s = n(5), u = n(6), a = r(u);
					a.Axios = s, a.create = function (e) {
						return r(o.merge(u, e))
					}, a.Cancel = n(23), a.CancelToken = n(24), a.isCancel = n(20), a.all = function (e) {
						return Promise.all(e)
					}, a.spread = n(25), e.exports = a, e.exports.default = a
				}, function (e, t, n) {
					"use strict";

					function r(e) {
						return "[object Array]" === R.call(e)
					}

					function o(e) {
						return "[object ArrayBuffer]" === R.call(e)
					}

					function i(e) {
						return "undefined" != typeof FormData && e instanceof FormData
					}

					function s(e) {
						var t;
						return t = "undefined" != typeof ArrayBuffer && ArrayBuffer.isView ? ArrayBuffer.isView(e) : e && e.buffer && e.buffer instanceof ArrayBuffer
					}

					function u(e) {
						return "string" == typeof e
					}

					function a(e) {
						return "number" == typeof e
					}

					function c(e) {
						return "undefined" == typeof e
					}

					function f(e) {
						return null !== e && "object" == typeof e
					}

					function p(e) {
						return "[object Date]" === R.call(e)
					}

					function d(e) {
						return "[object File]" === R.call(e)
					}

					function l(e) {
						return "[object Blob]" === R.call(e)
					}

					function h(e) {
						return "[object Function]" === R.call(e)
					}

					function m(e) {
						return f(e) && h(e.pipe)
					}

					function y(e) {
						return "undefined" != typeof URLSearchParams && e instanceof URLSearchParams
					}

					function w(e) {
						return e.replace(/^\s*/, "").replace(/\s*$/, "")
					}

					function g() {
						return ("undefined" == typeof navigator || "ReactNative" !== navigator.product) && ("undefined" != typeof window && "undefined" != typeof document)
					}

					function v(e, t) {
						if (null !== e && "undefined" != typeof e) if ("object" != typeof e && (e = [e]), r(e)) for (var n = 0, o = e.length; n < o; n++) t.call(null, e[n], n, e); else for (var i in e) Object.prototype.hasOwnProperty.call(e, i) && t.call(null, e[i], i, e)
					}

					function x() {
						function e(e, n) {
							"object" == typeof t[n] && "object" == typeof e ? t[n] = x(t[n], e) : t[n] = e
						}

						for (var t = {}, n = 0, r = arguments.length; n < r; n++) v(arguments[n], e);
						return t
					}

					function b(e, t, n) {
						return v(t, function (t, r) {
							n && "function" == typeof t ? e[r] = E(t, n) : e[r] = t
						}), e
					}

					var E = n(3), C = n(4), R = Object.prototype.toString;
					e.exports = {
						isArray: r,
						isArrayBuffer: o,
						isBuffer: C,
						isFormData: i,
						isArrayBufferView: s,
						isString: u,
						isNumber: a,
						isObject: f,
						isUndefined: c,
						isDate: p,
						isFile: d,
						isBlob: l,
						isFunction: h,
						isStream: m,
						isURLSearchParams: y,
						isStandardBrowserEnv: g,
						forEach: v,
						merge: x,
						extend: b,
						trim: w
					}
				}, function (e, t) {
					"use strict";
					e.exports = function (e, t) {
						return function () {
							for (var n = new Array(arguments.length), r = 0; r < n.length; r++) n[r] = arguments[r];
							return e.apply(t, n)
						}
					}
				}, function (e, t) {
					function n(e) {
						return !!e.constructor && "function" == typeof e.constructor.isBuffer && e.constructor.isBuffer(e)
					}

					function r(e) {
						return "function" == typeof e.readFloatLE && "function" == typeof e.slice && n(e.slice(0, 0))
					}/*!
   * Determine if an object is a Buffer
   *
   * @author   Feross Aboukhadijeh <https://feross.org>
   * @license  MIT
   */
					e.exports = function (e) {
						return null != e && (n(e) || r(e) || !!e._isBuffer)
					}
				}, function (e, t, n) {
					"use strict";

					function r(e) {
						this.defaults = e, this.interceptors = {request: new s, response: new s}
					}

					var o = n(6), i = n(2), s = n(17), u = n(18);
					r.prototype.request = function (e) {
						"string" == typeof e && (e = i.merge({url: arguments[0]}, arguments[1])), e = i.merge(o, {method: "get"}, this.defaults, e), e.method = e.method.toLowerCase();
						var t = [u, void 0], n = Promise.resolve(e);
						for (this.interceptors.request.forEach(function (e) {
							t.unshift(e.fulfilled, e.rejected)
						}), this.interceptors.response.forEach(function (e) {
							t.push(e.fulfilled, e.rejected)
						}); t.length;) n = n.then(t.shift(), t.shift());
						return n
					}, i.forEach(["delete", "get", "head", "options"], function (e) {
						r.prototype[e] = function (t, n) {
							return this.request(i.merge(n || {}, {method: e, url: t}))
						}
					}), i.forEach(["post", "put", "patch"], function (e) {
						r.prototype[e] = function (t, n, r) {
							return this.request(i.merge(r || {}, {method: e, url: t, data: n}))
						}
					}), e.exports = r
				}, function (e, t, n) {
					"use strict";

					function r(e, t) {
						!i.isUndefined(e) && i.isUndefined(e["Content-Type"]) && (e["Content-Type"] = t)
					}

					function o() {
						var e;
						return "undefined" != typeof XMLHttpRequest ? e = n(8) : "undefined" != typeof process && (e = n(8)), e
					}

					var i = n(2), s = n(7), u = {"Content-Type": "application/x-www-form-urlencoded"}, a = {
						adapter: o(),
						transformRequest: [function (e, t) {
							return s(t, "Content-Type"), i.isFormData(e) || i.isArrayBuffer(e) || i.isBuffer(e) || i.isStream(e) || i.isFile(e) || i.isBlob(e) ? e : i.isArrayBufferView(e) ? e.buffer : i.isURLSearchParams(e) ? (r(t, "application/x-www-form-urlencoded;charset=utf-8"), e.toString()) : i.isObject(e) ? (r(t, "application/json;charset=utf-8"), JSON.stringify(e)) : e
						}],
						transformResponse: [function (e) {
							if ("string" == typeof e) try {
								e = JSON.parse(e)
							} catch (e) {
							}
							return e
						}],
						timeout: 0,
						xsrfCookieName: "XSRF-TOKEN",
						xsrfHeaderName: "X-XSRF-TOKEN",
						maxContentLength: -1,
						validateStatus: function (e) {
							return e >= 200 && e < 300
						}
					};
					a.headers = {common: {Accept: "application/json, text/plain, */*"}}, i.forEach(["delete", "get", "head"], function (e) {
						a.headers[e] = {}
					}), i.forEach(["post", "put", "patch"], function (e) {
						a.headers[e] = i.merge(u)
					}), e.exports = a
				}, function (e, t, n) {
					"use strict";
					var r = n(2);
					e.exports = function (e, t) {
						r.forEach(e, function (n, r) {
							r !== t && r.toUpperCase() === t.toUpperCase() && (e[t] = n, delete e[r])
						})
					}
				}, function (e, t, n) {
					"use strict";
					var r = n(2), o = n(9), i = n(12), s = n(13), u = n(14), a = n(10),
						c = "undefined" != typeof window && window.btoa && window.btoa.bind(window) || n(15);
					e.exports = function (e) {
						return new Promise(function (t, f) {
							var p = e.data, d = e.headers;
							r.isFormData(p) && delete d["Content-Type"];
							var l = new XMLHttpRequest, h = "onreadystatechange", m = !1;
							if ("undefined" == typeof window || !window.XDomainRequest || "withCredentials" in l || u(e.url) || (l = new window.XDomainRequest, h = "onload", m = !0, l.onprogress = function () {
							}, l.ontimeout = function () {
							}), e.auth) {
								var y = e.auth.username || "", w = e.auth.password || "";
								d.Authorization = "Basic " + c(y + ":" + w)
							}
							if (l.open(e.method.toUpperCase(), i(e.url, e.params, e.paramsSerializer), !0), l.timeout = e.timeout, l[h] = function () {
								if (l && (4 === l.readyState || m) && (0 !== l.status || l.responseURL && 0 === l.responseURL.indexOf("file:"))) {
									var n = "getAllResponseHeaders" in l ? s(l.getAllResponseHeaders()) : null,
										r = e.responseType && "text" !== e.responseType ? l.response : l.responseText,
										i = {
											data: r,
											status: 1223 === l.status ? 204 : l.status,
											statusText: 1223 === l.status ? "No Content" : l.statusText,
											headers: n,
											config: e,
											request: l
										};
									o(t, f, i), l = null
								}
							}, l.onerror = function () {
								f(a("Network Error", e, null, l)), l = null
							}, l.ontimeout = function () {
								f(a("timeout of " + e.timeout + "ms exceeded", e, "ECONNABORTED", l)), l = null
							}, r.isStandardBrowserEnv()) {
								var g = n(16),
									v = (e.withCredentials || u(e.url)) && e.xsrfCookieName ? g.read(e.xsrfCookieName) : void 0;
								v && (d[e.xsrfHeaderName] = v)
							}
							if ("setRequestHeader" in l && r.forEach(d, function (e, t) {
								"undefined" == typeof p && "content-type" === t.toLowerCase() ? delete d[t] : l.setRequestHeader(t, e)
							}), e.withCredentials && (l.withCredentials = !0), e.responseType) try {
								l.responseType = e.responseType
							} catch (t) {
								if ("json" !== e.responseType) throw t
							}
							"function" == typeof e.onDownloadProgress && l.addEventListener("progress", e.onDownloadProgress), "function" == typeof e.onUploadProgress && l.upload && l.upload.addEventListener("progress", e.onUploadProgress), e.cancelToken && e.cancelToken.promise.then(function (e) {
								l && (l.abort(), f(e), l = null)
							}), void 0 === p && (p = null), l.send(p)
						})
					}
				}, function (e, t, n) {
					"use strict";
					var r = n(10);
					e.exports = function (e, t, n) {
						var o = n.config.validateStatus;
						n.status && o && !o(n.status) ? t(r("Request failed with status code " + n.status, n.config, null, n.request, n)) : e(n)
					}
				}, function (e, t, n) {
					"use strict";
					var r = n(11);
					e.exports = function (e, t, n, o, i) {
						var s = new Error(e);
						return r(s, t, n, o, i)
					}
				}, function (e, t) {
					"use strict";
					e.exports = function (e, t, n, r, o) {
						return e.config = t, n && (e.code = n), e.request = r, e.response = o, e
					}
				}, function (e, t, n) {
					"use strict";

					function r(e) {
						return encodeURIComponent(e).replace(/%40/gi, "@").replace(/%3A/gi, ":").replace(/%24/g, "$").replace(/%2C/gi, ",").replace(/%20/g, "+").replace(/%5B/gi, "[").replace(/%5D/gi, "]")
					}

					var o = n(2);
					e.exports = function (e, t, n) {
						if (!t) return e;
						var i;
						if (n) i = n(t); else if (o.isURLSearchParams(t)) i = t.toString(); else {
							var s = [];
							o.forEach(t, function (e, t) {
								null !== e && "undefined" != typeof e && (o.isArray(e) ? t += "[]" : e = [e], o.forEach(e, function (e) {
									o.isDate(e) ? e = e.toISOString() : o.isObject(e) && (e = JSON.stringify(e)), s.push(r(t) + "=" + r(e))
								}))
							}), i = s.join("&")
						}
						return i && (e += (e.indexOf("?") === -1 ? "?" : "&") + i), e
					}
				}, function (e, t, n) {
					"use strict";
					var r = n(2),
						o = ["age", "authorization", "content-length", "content-type", "etag", "expires", "from", "host", "if-modified-since", "if-unmodified-since", "last-modified", "location", "max-forwards", "proxy-authorization", "referer", "retry-after", "user-agent"];
					e.exports = function (e) {
						var t, n, i, s = {};
						return e ? (r.forEach(e.split("\n"), function (e) {
							if (i = e.indexOf(":"), t = r.trim(e.substr(0, i)).toLowerCase(), n = r.trim(e.substr(i + 1)), t) {
								if (s[t] && o.indexOf(t) >= 0) return;
								"set-cookie" === t ? s[t] = (s[t] ? s[t] : []).concat([n]) : s[t] = s[t] ? s[t] + ", " + n : n
							}
						}), s) : s
					}
				}, function (e, t, n) {
					"use strict";
					var r = n(2);
					e.exports = r.isStandardBrowserEnv() ? function () {
						function e(e) {
							var t = e;
							return n && (o.setAttribute("href", t), t = o.href), o.setAttribute("href", t), {
								href: o.href,
								protocol: o.protocol ? o.protocol.replace(/:$/, "") : "",
								host: o.host,
								search: o.search ? o.search.replace(/^\?/, "") : "",
								hash: o.hash ? o.hash.replace(/^#/, "") : "",
								hostname: o.hostname,
								port: o.port,
								pathname: "/" === o.pathname.charAt(0) ? o.pathname : "/" + o.pathname
							}
						}

						var t, n = /(msie|trident)/i.test(navigator.userAgent), o = document.createElement("a");
						return t = e(window.location.href), function (n) {
							var o = r.isString(n) ? e(n) : n;
							return o.protocol === t.protocol && o.host === t.host
						}
					}() : function () {
						return function () {
							return !0
						}
					}()
				}, function (e, t) {
					"use strict";

					function n() {
						this.message = "String contains an invalid character"
					}

					function r(e) {
						for (var t, r, i = String(e), s = "", u = 0, a = o; i.charAt(0 | u) || (a = "=", u % 1); s += a.charAt(63 & t >> 8 - u % 1 * 8)) {
							if (r = i.charCodeAt(u += .75), r > 255) throw new n;
							t = t << 8 | r
						}
						return s
					}

					var o = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
					n.prototype = new Error, n.prototype.code = 5, n.prototype.name = "InvalidCharacterError", e.exports = r
				}, function (e, t, n) {
					"use strict";
					var r = n(2);
					e.exports = r.isStandardBrowserEnv() ? function () {
						return {
							write: function (e, t, n, o, i, s) {
								var u = [];
								u.push(e + "=" + encodeURIComponent(t)), r.isNumber(n) && u.push("expires=" + new Date(n).toGMTString()), r.isString(o) && u.push("path=" + o), r.isString(i) && u.push("domain=" + i), s === !0 && u.push("secure"), document.cookie = u.join("; ")
							}, read: function (e) {
								var t = document.cookie.match(new RegExp("(^|;\\s*)(" + e + ")=([^;]*)"));
								return t ? decodeURIComponent(t[3]) : null
							}, remove: function (e) {
								this.write(e, "", Date.now() - 864e5)
							}
						}
					}() : function () {
						return {
							write: function () {
							}, read: function () {
								return null
							}, remove: function () {
							}
						}
					}()
				}, function (e, t, n) {
					"use strict";

					function r() {
						this.handlers = []
					}

					var o = n(2);
					r.prototype.use = function (e, t) {
						return this.handlers.push({fulfilled: e, rejected: t}), this.handlers.length - 1
					}, r.prototype.eject = function (e) {
						this.handlers[e] && (this.handlers[e] = null)
					}, r.prototype.forEach = function (e) {
						o.forEach(this.handlers, function (t) {
							null !== t && e(t)
						})
					}, e.exports = r
				}, function (e, t, n) {
					"use strict";

					function r(e) {
						e.cancelToken && e.cancelToken.throwIfRequested()
					}

					var o = n(2), i = n(19), s = n(20), u = n(6), a = n(21), c = n(22);
					e.exports = function (e) {
						r(e), e.baseURL && !a(e.url) && (e.url = c(e.baseURL, e.url)), e.headers = e.headers || {}, e.data = i(e.data, e.headers, e.transformRequest), e.headers = o.merge(e.headers.common || {}, e.headers[e.method] || {}, e.headers || {}), o.forEach(["delete", "get", "head", "post", "put", "patch", "common"], function (t) {
							delete e.headers[t]
						});
						var t = e.adapter || u.adapter;
						return t(e).then(function (t) {
							return r(e), t.data = i(t.data, t.headers, e.transformResponse), t
						}, function (t) {
							return s(t) || (r(e), t && t.response && (t.response.data = i(t.response.data, t.response.headers, e.transformResponse))), Promise.reject(t)
						})
					}
				}, function (e, t, n) {
					"use strict";
					var r = n(2);
					e.exports = function (e, t, n) {
						return r.forEach(n, function (n) {
							e = n(e, t)
						}), e
					}
				}, function (e, t) {
					"use strict";
					e.exports = function (e) {
						return !(!e || !e.__CANCEL__)
					}
				}, function (e, t) {
					"use strict";
					e.exports = function (e) {
						return /^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(e)
					}
				}, function (e, t) {
					"use strict";
					e.exports = function (e, t) {
						return t ? e.replace(/\/+$/, "") + "/" + t.replace(/^\/+/, "") : e
					}
				}, function (e, t) {
					"use strict";

					function n(e) {
						this.message = e
					}

					n.prototype.toString = function () {
						return "Cancel" + (this.message ? ": " + this.message : "")
					}, n.prototype.__CANCEL__ = !0, e.exports = n
				}, function (e, t, n) {
					"use strict";

					function r(e) {
						if ("function" != typeof e) throw new TypeError("executor must be a function.");
						var t;
						this.promise = new Promise(function (e) {
							t = e
						});
						var n = this;
						e(function (e) {
							n.reason || (n.reason = new o(e), t(n.reason))
						})
					}

					var o = n(23);
					r.prototype.throwIfRequested = function () {
						if (this.reason) throw this.reason
					}, r.source = function () {
						var e, t = new r(function (t) {
							e = t
						});
						return {token: t, cancel: e}
					}, e.exports = r
				}, function (e, t) {
					"use strict";
					e.exports = function (e) {
						return function (t) {
							return e.apply(null, t)
						}
					}
				}])
			});
//# sourceMappingURL=axios.min.map
			/* WEBPACK VAR INJECTION */
		}.call(exports, __webpack_require__(3)))

		/***/
	}),
	/* 64 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var customEach = __webpack_require__(4),
			inView = __webpack_require__(12);

		var WidgetFilter = __webpack_require__(2),
			ControlbarFilter = __webpack_require__(8),
			PaymentFilter = __webpack_require__(9); // Storage = require('../Storage.es6');
// storage = new Storage().init();

		/**
		 * Base Search object for SearchVM ViewModel to hold prototype methods and some
		 * non-ViewModel properties.
		 *
		 * NB!: The prototype methods access the SearchVM object data. So not use of
		 * Search object outsides of SearchVM object context.
		 */

		console.log('WidgetFilter');
		console.log(WidgetFilter);


		var Search = function Search() {
			this.fuses = {
				city: null,
				country: null,
				industry: null,
				specialism: null
			};
		};

		module.exports = Search;
		/**
		 * Clear all filters set by user.
		 * @param Vue3 object vm        The Vue ViewModel.
		 */

		Search.prototype.clearFilters = function (vm) {
			var _this = this;

			if (!vm.hasfiltersactive) {
				return;
			}
			/**
			 * The dictionary to find the filter type by filter name.
			 */


			var types = {
				widgets: 'city,country,industry,specialsm',
				controlbar: 'vactype,sorting',
				payment: 'payment'
			};
			/**
			 * Find the correct filtertype for each filtername and call the
			 * 'resetFilter'.
			 */

			customEach(Object.keys(vm.$data.requestdata.filters), function (filtername) {
				if (filtername === 'sorting') {
					return;
				}

				var filtertype = Object.keys(types).filter(function (item) {
					return types[item].indexOf(filtername) !== -1;
				})[0];

				_this.resetFilter(filtertype, filtername, vm);
			});
		};
		/**
		 * Clear filter using the correct filter constructor object.
		 * @param  string   filtertype  The one of 'widgets', 'controlbar', 'payment'.
		 * @param  string   filtername  The one of 'city', 'country', 'industry',
		 *                              'vactype', 'sorting', 'payment'.
		 * @param  Vue3     vm          The Vue ViewModel;
		 */


		Search.prototype.resetFilter = function (filtertype, filtername, vm) {
			/**
			 * The dictionary to find the filter constructor by filter type.
			 */
			var protos = {
				widgets: WidgetFilter,
				controlbar: ControlbarFilter,
				payment: PaymentFilter
			};
			/**
			 * Actually replace current filter data in the request data with the correct
			 * type empty object. Context search filters should be kept with user input
			 * if any till the page reload.
			 */

			if ('text,location'.indexOf(filtername) === -1) {
				vm.$data.requestdata.filters[filtername] = new protos[filtertype]();
			}
		};
		/**
		 * Widget filter watcher watches if the widget's list filter field input value
		 * is changed after user input. If yes, the watcher creates and assigns the new
		 * filtered widget's list to the ViewModel list property.
		 * @param  string listname  The widget's (list) name.
		 * @return function         The concrete watcher function closure.
		 */


		Search.prototype.createFilterWatcher = function (listname) {
			var self = this;
			return function (newVal) {
				this.$data.sidebar.lists[listname] = self.applyFuse(listname, newVal, this);
			};
		};

		Search.prototype.applyFuse = function (listname, val) {
			if (val.length >= 2) {
				return this.fuses[listname].search(val);
			} else {
				return this.wj.storage.sidebar[listname];
			}
		};

		Search.prototype.initFuse = function (list) {
			var Fuse = __webpack_require__(65);

			var options = {
				shouldSort: true,
				threshold: 0.6,
				location: 0,
				distance: 100,
				maxPatternLength: 32,
				minMatchCharLength: 2,
				keys: ["name"]
			};
			return new Fuse(list, options);
		};

		Search.prototype.setEndPageWatcher = function (vm) {
			inView.offset(10);
			inView('#js-page-end').on('enter', triggerMoreResults); // .on('exit', () => console.log('exiting view...'));

			function triggerMoreResults() {
				// console.log('triggerMoreResults works...');
				if (!vm.$data.requestdata.isloading) {
					vm.$data.requestdata.isloading = true;
					vm.$data.requestdata.triggers.more = true;
				}
			}
		};
		/**
		 * Iterate over the updated filters object and build query
		 * string of non-null filters in the form of JSON string
		 * '"filtername:filterid"'.
		 * @param  Object filters The vm.$data.requestdata.filters
		 * object.
		 * @return string         Query string.
		 */


		Search.prototype.rebuildQueryVars = function (filters) {
			var queryvars = '';
			Object.keys(filters).map(function (filtername) {
				/**
				 * For all filters,except context search filters.
				 */
				if ('text,location'.indexOf(filtername) === -1 && filters[filtername].id) {
					// queryvars += `\{"${filtername}":${filters[filtername].id}\},`;
					queryvars += "&queryvars[".concat(filtername, "]=").concat(filters[filtername].id);
					/**
					 * Add the payment range in case of 'payment' filter.
					 */

					if (filtername === 'payment') {
						queryvars += "&queryvars[paymentrange]=".concat(filters[filtername].range.id);
					}
				}
				/**
				 * For context search filters: text and location if they are not null.
				 */

				if ('text,location'.indexOf(filtername) !== -1 && filters[filtername]) {
					queryvars += "&queryvars[".concat(filtername, "]=").concat(filters[filtername]);
				}

				return false;
			});
			/**
			 * Remove closing comma if any.
			 */
			// if (queryvars[queryvars.length - 1] === '&') {
			//     queryvars = queryvars.substring(0, queryvars.length - 1);
			// }

			return queryvars;
		};

		/***/
	}),
	/* 65 */
	/***/ (function (module, exports, __webpack_require__) {

		/*!
 * Fuse.js v3.2.1 - Lightweight fuzzy-search (http://fusejs.io)
 *
 * Copyright (c) 2012-2017 Kirollos Risk (http://kiro.me)
 * All Rights Reserved. Apache Software License 2.0
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 */
		!function (e, t) {
			true ? module.exports = t() : "function" == typeof define && define.amd ? define("Fuse", [], t) : "object" == typeof exports ? exports.Fuse = t() : e.Fuse = t()
		}(this, function () {
			return function (e) {
				function t(n) {
					if (r[n]) return r[n].exports;
					var o = r[n] = {i: n, l: !1, exports: {}};
					return e[n].call(o.exports, o, o.exports, t), o.l = !0, o.exports
				}

				var r = {};
				return t.m = e, t.c = r, t.i = function (e) {
					return e
				}, t.d = function (e, r, n) {
					t.o(e, r) || Object.defineProperty(e, r, {configurable: !1, enumerable: !0, get: n})
				}, t.n = function (e) {
					var r = e && e.__esModule ? function () {
						return e.default
					} : function () {
						return e
					};
					return t.d(r, "a", r), r
				}, t.o = function (e, t) {
					return Object.prototype.hasOwnProperty.call(e, t)
				}, t.p = "", t(t.s = 8)
			}([function (e, t, r) {
				"use strict";
				e.exports = function (e) {
					return Array.isArray ? Array.isArray(e) : "[object Array]" === Object.prototype.toString.call(e)
				}
			}, function (e, t, r) {
				"use strict";

				function n(e, t) {
					if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
				}

				var o = function () {
					function e(e, t) {
						for (var r = 0; r < t.length; r++) {
							var n = t[r];
							n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
						}
					}

					return function (t, r, n) {
						return r && e(t.prototype, r), n && e(t, n), t
					}
				}(), i = r(5), a = r(7), s = r(4), c = function () {
					function e(t, r) {
						var o = r.location, i = void 0 === o ? 0 : o, a = r.distance, c = void 0 === a ? 100 : a,
							h = r.threshold, l = void 0 === h ? .6 : h, u = r.maxPatternLength,
							f = void 0 === u ? 32 : u, d = r.isCaseSensitive, v = void 0 !== d && d,
							p = r.tokenSeparator, g = void 0 === p ? / +/g : p, y = r.findAllMatches,
							m = void 0 !== y && y, k = r.minMatchCharLength, x = void 0 === k ? 1 : k;
						n(this, e), this.options = {
							location: i,
							distance: c,
							threshold: l,
							maxPatternLength: f,
							isCaseSensitive: v,
							tokenSeparator: g,
							findAllMatches: m,
							minMatchCharLength: x
						}, this.pattern = this.options.isCaseSensitive ? t : t.toLowerCase(), this.pattern.length <= f && (this.patternAlphabet = s(this.pattern))
					}

					return o(e, [{
						key: "search", value: function (e) {
							if (this.options.isCaseSensitive || (e = e.toLowerCase()), this.pattern === e) return {
								isMatch: !0,
								score: 0,
								matchedIndices: [[0, e.length - 1]]
							};
							var t = this.options, r = t.maxPatternLength, n = t.tokenSeparator;
							if (this.pattern.length > r) return i(e, this.pattern, n);
							var o = this.options, s = o.location, c = o.distance, h = o.threshold, l = o.findAllMatches,
								u = o.minMatchCharLength;
							return a(e, this.pattern, this.patternAlphabet, {
								location: s,
								distance: c,
								threshold: h,
								findAllMatches: l,
								minMatchCharLength: u
							})
						}
					}]), e
				}();
				e.exports = c
			}, function (e, t, r) {
				"use strict";
				var n = r(0), o = function e(t, r, o) {
					if (r) {
						var i = r.indexOf("."), a = r, s = null;
						-1 !== i && (a = r.slice(0, i), s = r.slice(i + 1));
						var c = t[a];
						if (null !== c && void 0 !== c) if (s || "string" != typeof c && "number" != typeof c) if (n(c)) for (var h = 0, l = c.length; h < l; h += 1) e(c[h], s, o); else s && e(c, s, o); else o.push(c.toString())
					} else o.push(t);
					return o
				};
				e.exports = function (e, t) {
					return o(e, t, [])
				}
			}, function (e, t, r) {
				"use strict";
				e.exports = function () {
					for (var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [], t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 1, r = [], n = -1, o = -1, i = 0, a = e.length; i < a; i += 1) {
						var s = e[i];
						s && -1 === n ? n = i : s || -1 === n || (o = i - 1, o - n + 1 >= t && r.push([n, o]), n = -1)
					}
					return e[i - 1] && i - n >= t && r.push([n, i - 1]), r
				}
			}, function (e, t, r) {
				"use strict";
				e.exports = function (e) {
					for (var t = {}, r = e.length, n = 0; n < r; n += 1) t[e.charAt(n)] = 0;
					for (var o = 0; o < r; o += 1) t[e.charAt(o)] |= 1 << r - o - 1;
					return t
				}
			}, function (e, t, r) {
				"use strict";
				e.exports = function (e, t) {
					var r = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : / +/g,
						n = new RegExp(t.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&").replace(r, "|")),
						o = e.match(n), i = !!o, a = [];
					if (i) for (var s = 0, c = o.length; s < c; s += 1) {
						var h = o[s];
						a.push([e.indexOf(h), h.length - 1])
					}
					return {score: i ? .5 : 1, isMatch: i, matchedIndices: a}
				}
			}, function (e, t, r) {
				"use strict";
				e.exports = function (e, t) {
					var r = t.errors, n = void 0 === r ? 0 : r, o = t.currentLocation, i = void 0 === o ? 0 : o,
						a = t.expectedLocation, s = void 0 === a ? 0 : a, c = t.distance, h = void 0 === c ? 100 : c,
						l = n / e.length, u = Math.abs(s - i);
					return h ? l + u / h : u ? 1 : l
				}
			}, function (e, t, r) {
				"use strict";
				var n = r(6), o = r(3);
				e.exports = function (e, t, r, i) {
					for (var a = i.location, s = void 0 === a ? 0 : a, c = i.distance, h = void 0 === c ? 100 : c, l = i.threshold, u = void 0 === l ? .6 : l, f = i.findAllMatches, d = void 0 !== f && f, v = i.minMatchCharLength, p = void 0 === v ? 1 : v, g = s, y = e.length, m = u, k = e.indexOf(t, g), x = t.length, S = [], M = 0; M < y; M += 1) S[M] = 0;
					if (-1 !== k) {
						var b = n(t, {errors: 0, currentLocation: k, expectedLocation: g, distance: h});
						if (m = Math.min(b, m), -1 !== (k = e.lastIndexOf(t, g + x))) {
							var _ = n(t, {errors: 0, currentLocation: k, expectedLocation: g, distance: h});
							m = Math.min(_, m)
						}
					}
					k = -1;
					for (var L = [], w = 1, A = x + y, C = 1 << x - 1, I = 0; I < x; I += 1) {
						for (var O = 0, F = A; O < F;) {
							n(t, {
								errors: I,
								currentLocation: g + F,
								expectedLocation: g,
								distance: h
							}) <= m ? O = F : A = F, F = Math.floor((A - O) / 2 + O)
						}
						A = F;
						var P = Math.max(1, g - F + 1), j = d ? y : Math.min(g + F, y) + x, z = Array(j + 2);
						z[j + 1] = (1 << I) - 1;
						for (var T = j; T >= P; T -= 1) {
							var E = T - 1, K = r[e.charAt(E)];
							if (K && (S[E] = 1), z[T] = (z[T + 1] << 1 | 1) & K, 0 !== I && (z[T] |= (L[T + 1] | L[T]) << 1 | 1 | L[T + 1]), z[T] & C && (w = n(t, {
								errors: I,
								currentLocation: E,
								expectedLocation: g,
								distance: h
							})) <= m) {
								if (m = w, (k = E) <= g) break;
								P = Math.max(1, 2 * g - k)
							}
						}
						if (n(t, {errors: I + 1, currentLocation: g, expectedLocation: g, distance: h}) > m) break;
						L = z
					}
					return {isMatch: k >= 0, score: 0 === w ? .001 : w, matchedIndices: o(S, p)}
				}
			}, function (e, t, r) {
				"use strict";

				function n(e, t) {
					if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
				}

				var o = function () {
					function e(e, t) {
						for (var r = 0; r < t.length; r++) {
							var n = t[r];
							n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
						}
					}

					return function (t, r, n) {
						return r && e(t.prototype, r), n && e(t, n), t
					}
				}(), i = r(1), a = r(2), s = r(0), c = function () {
					function e(t, r) {
						var o = r.location, i = void 0 === o ? 0 : o, s = r.distance, c = void 0 === s ? 100 : s,
							h = r.threshold, l = void 0 === h ? .6 : h, u = r.maxPatternLength,
							f = void 0 === u ? 32 : u, d = r.caseSensitive, v = void 0 !== d && d, p = r.tokenSeparator,
							g = void 0 === p ? / +/g : p, y = r.findAllMatches, m = void 0 !== y && y,
							k = r.minMatchCharLength, x = void 0 === k ? 1 : k, S = r.id, M = void 0 === S ? null : S,
							b = r.keys, _ = void 0 === b ? [] : b, L = r.shouldSort, w = void 0 === L || L, A = r.getFn,
							C = void 0 === A ? a : A, I = r.sortFn, O = void 0 === I ? function (e, t) {
								return e.score - t.score
							} : I, F = r.tokenize, P = void 0 !== F && F, j = r.matchAllTokens, z = void 0 !== j && j,
							T = r.includeMatches, E = void 0 !== T && T, K = r.includeScore, $ = void 0 !== K && K,
							J = r.verbose, N = void 0 !== J && J;
						n(this, e), this.options = {
							location: i,
							distance: c,
							threshold: l,
							maxPatternLength: f,
							isCaseSensitive: v,
							tokenSeparator: g,
							findAllMatches: m,
							minMatchCharLength: x,
							id: M,
							keys: _,
							includeMatches: E,
							includeScore: $,
							shouldSort: w,
							getFn: C,
							sortFn: O,
							verbose: N,
							tokenize: P,
							matchAllTokens: z
						}, this.setCollection(t)
					}

					return o(e, [{
						key: "setCollection", value: function (e) {
							return this.list = e, e
						}
					}, {
						key: "search", value: function (e) {
							this._log('---------\nSearch pattern: "' + e + '"');
							var t = this._prepareSearchers(e), r = t.tokenSearchers, n = t.fullSearcher,
								o = this._search(r, n), i = o.weights, a = o.results;
							return this._computeScore(i, a), this.options.shouldSort && this._sort(a), this._format(a)
						}
					}, {
						key: "_prepareSearchers", value: function () {
							var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "", t = [];
							if (this.options.tokenize) for (var r = e.split(this.options.tokenSeparator), n = 0, o = r.length; n < o; n += 1) t.push(new i(r[n], this.options));
							return {tokenSearchers: t, fullSearcher: new i(e, this.options)}
						}
					}, {
						key: "_search", value: function () {
							var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [],
								t = arguments[1], r = this.list, n = {}, o = [];
							if ("string" == typeof r[0]) {
								for (var i = 0, a = r.length; i < a; i += 1) this._analyze({
									key: "",
									value: r[i],
									record: i,
									index: i
								}, {resultMap: n, results: o, tokenSearchers: e, fullSearcher: t});
								return {weights: null, results: o}
							}
							for (var s = {}, c = 0, h = r.length; c < h; c += 1) for (var l = r[c], u = 0, f = this.options.keys.length; u < f; u += 1) {
								var d = this.options.keys[u];
								if ("string" != typeof d) {
									if (s[d.name] = {weight: 1 - d.weight || 1}, d.weight <= 0 || d.weight > 1) throw new Error("Key weight has to be > 0 and <= 1");
									d = d.name
								} else s[d] = {weight: 1};
								this._analyze({
									key: d,
									value: this.options.getFn(l, d),
									record: l,
									index: c
								}, {resultMap: n, results: o, tokenSearchers: e, fullSearcher: t})
							}
							return {weights: s, results: o}
						}
					}, {
						key: "_analyze", value: function (e, t) {
							var r = e.key, n = e.arrayIndex, o = void 0 === n ? -1 : n, i = e.value, a = e.record,
								c = e.index, h = t.tokenSearchers, l = void 0 === h ? [] : h, u = t.fullSearcher,
								f = void 0 === u ? [] : u, d = t.resultMap, v = void 0 === d ? {} : d, p = t.results,
								g = void 0 === p ? [] : p;
							if (void 0 !== i && null !== i) {
								var y = !1, m = -1, k = 0;
								if ("string" == typeof i) {
									this._log("\nKey: " + ("" === r ? "-" : r));
									var x = f.search(i);
									if (this._log('Full text: "' + i + '", score: ' + x.score), this.options.tokenize) {
										for (var S = i.split(this.options.tokenSeparator), M = [], b = 0; b < l.length; b += 1) {
											var _ = l[b];
											this._log('\nPattern: "' + _.pattern + '"');
											for (var L = !1, w = 0; w < S.length; w += 1) {
												var A = S[w], C = _.search(A), I = {};
												C.isMatch ? (I[A] = C.score, y = !0, L = !0, M.push(C.score)) : (I[A] = 1, this.options.matchAllTokens || M.push(1)), this._log('Token: "' + A + '", score: ' + I[A])
											}
											L && (k += 1)
										}
										m = M[0];
										for (var O = M.length, F = 1; F < O; F += 1) m += M[F];
										m /= O, this._log("Token score average:", m)
									}
									var P = x.score;
									m > -1 && (P = (P + m) / 2), this._log("Score average:", P);
									var j = !this.options.tokenize || !this.options.matchAllTokens || k >= l.length;
									if (this._log("\nCheck Matches: " + j), (y || x.isMatch) && j) {
										var z = v[c];
										z ? z.output.push({
											key: r,
											arrayIndex: o,
											value: i,
											score: P,
											matchedIndices: x.matchedIndices
										}) : (v[c] = {
											item: a,
											output: [{
												key: r,
												arrayIndex: o,
												value: i,
												score: P,
												matchedIndices: x.matchedIndices
											}]
										}, g.push(v[c]))
									}
								} else if (s(i)) for (var T = 0, E = i.length; T < E; T += 1) this._analyze({
									key: r,
									arrayIndex: T,
									value: i[T],
									record: a,
									index: c
								}, {resultMap: v, results: g, tokenSearchers: l, fullSearcher: f})
							}
						}
					}, {
						key: "_computeScore", value: function (e, t) {
							this._log("\n\nComputing score:\n");
							for (var r = 0, n = t.length; r < n; r += 1) {
								for (var o = t[r].output, i = o.length, a = 1, s = 1, c = 0; c < i; c += 1) {
									var h = e ? e[o[c].key].weight : 1, l = 1 === h ? o[c].score : o[c].score || .001,
										u = l * h;
									1 !== h ? s = Math.min(s, u) : (o[c].nScore = u, a *= u)
								}
								t[r].score = 1 === s ? a : s, this._log(t[r])
							}
						}
					}, {
						key: "_sort", value: function (e) {
							this._log("\n\nSorting...."), e.sort(this.options.sortFn)
						}
					}, {
						key: "_format", value: function (e) {
							var t = [];
							this.options.verbose && this._log("\n\nOutput:\n\n", JSON.stringify(e));
							var r = [];
							this.options.includeMatches && r.push(function (e, t) {
								var r = e.output;
								t.matches = [];
								for (var n = 0, o = r.length; n < o; n += 1) {
									var i = r[n];
									if (0 !== i.matchedIndices.length) {
										var a = {indices: i.matchedIndices, value: i.value};
										i.key && (a.key = i.key), i.hasOwnProperty("arrayIndex") && i.arrayIndex > -1 && (a.arrayIndex = i.arrayIndex), t.matches.push(a)
									}
								}
							}), this.options.includeScore && r.push(function (e, t) {
								t.score = e.score
							});
							for (var n = 0, o = e.length; n < o; n += 1) {
								var i = e[n];
								if (this.options.id && (i.item = this.options.getFn(i.item, this.options.id)[0]), r.length) {
									for (var a = {item: i.item}, s = 0, c = r.length; s < c; s += 1) r[s](i, a);
									t.push(a)
								} else t.push(i.item)
							}
							return t
						}
					}, {
						key: "_log", value: function () {
							if (this.options.verbose) {
								var e;
								(e = console).log.apply(e, arguments)
							}
						}
					}]), e
				}();
				e.exports = c
			}])
		});

		/***/
	}),
	/* 66 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		console.log('vm-banner-vs.es6 works...');

		var Vue = __webpack_require__(1),
			axios = __webpack_require__(6);

		var FormVacancySearch = __webpack_require__(13);

		var vm = new Vue({
			el: '#vm-banner-vs',
			data: {
				init: {
					text: null,
					location: null
				}
			},
			components: {
				'form-vacancy-search': FormVacancySearch
			}
		});
		console.dir(vm);

		/***/
	}),
	/* 67 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		var Vue = __webpack_require__(1),
			loadScript = __webpack_require__(68);

		var sel = '#vm-send-resume';

		var SendResume = function SendResume() {
			var self = this;
			var drboxopts = {
				success: SendResume.prototype.putDropBoxfilename.bind(self),
				linkType: "direct",
				// or "direct"
				extensions: ['.rtf', '.txt', '.pdf', '.doc', '.docx'],
				sizeLimit: 1024 * 800
			};
			this.el = document.querySelector(sel);
			this.data = {
				source: '',
				cloudfile: null,
				filename: '',
				fileselected: false
			};

			function validateContact() {
				var valid = true;
				$(".demoInputBox").css('background-color', '');
				$(".info").html('');

				if (!$("#userName").val()) {
					$("#userName-info").html("(required)");
					$("#userName").css('background-color', '#FFFFDF');
					valid = false;
				}
				if (!$("#userSurName").val()) {
					$("#userSurName-info").html("(required)");
					$("#userSurName").css('background-color', '#FFFFDF');
					valid = false;
				}
				if (!$("#userEmail").val()) {
					$("#userEmail-info").html("(required)");
					$("#userEmail").css('background-color', '#FFFFDF');
					valid = false;
				}
				if (!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
					$("#userEmail-info").html("(invalid)");
					$("#userEmail").css('background-color', '#FFFFDF');
					valid = false;
				}
				
				return valid;
			}

			this.methods = {
				_dropbox: function _dropbox() {
					window.runDropBoxChooser();
				},
				_gdrive: function _gdrive() {
					window.runGDrivePicker();
				},
				_localFile: function _localFile(evt) {
					//console.dir(evt);
					//console.dir(this);

					if (evt.target.files[0] == undefined) {
						this.$data.fileselected = false;
						this.$data.source = '';
						return;
					}

					this.$data.source = 'local';
					this.$data.cloudfile = null;
					this.$data.filename = evt.target.files[0].name;
					this.$data.filesize = evt.target.files[0].size;

					console.dir(this.$data.filename);
					console.dir(this.$data.filesize);

					var oFile = this.$data.filename; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>

					var myfilesize = this.$data.filesize;
					var myfile = this.$data.filename;
					var ext = myfile.split('.').pop();
					//.doc, .docx, .rtf, .txt, .pdf

					this.$data.fileselected = true;

					if (ext == "pdf" || ext == "docx" || ext == "doc" || ext == "rtf" || ext == "txt") {

						if (myfilesize > 4194304) {
							this.$data.fileselected = false;
							this.$data.filename += '. Максимальный размер файла 4 МБ';
							alert('Максимальный объем 4МБ');
						}
						if (myfilesize < 10 ) {
							this.$data.fileselected = false;
							this.$data.filename += '. Ошибка при загрузке файла';
							alert('Ошибка при загрузке файла');
						}

					} else {
						this.$data.fileselected = false;
						this.$data.filename = 'Выбранный файл в формате: ' + ext + '.\r\n Загрузите своё резюме в одном из форматов: .doc, .docx, .rtf, .txt, .pdf.';
					}

					//this.$data.fileselected = true;
				},
				_submit: function (evt) {
					$('#loader-icon').show();
					var valid;
					valid = validateContact();

					if (this.$data.filename != "" && this.$data.fileselected == true) {

						if (valid) {
							//alert('All right - sending');

							var formData = new FormData(evt.target);
							formData.append('source', this.$data.source);
							formData.append('cloudfile', this.$data.cloudfile);
							formData.append('filename', this.$data.filename);
							formData.append('fileselected', this.$data.fileselected);
							formData.append('oauthtoken', window.googleOAuthToken || null);
							formData.append('action', 'handle_send_resume');
							
							formData.append('doctype', this.$data.doctype);
							formData.append('docid', this.$data.docid);
							formData.append('serviceid', this.$data.serviceid);
							//formData.append('cons_id', this.$data.cons_id); 
							
							 
							

							$.ajax({
								url: "/wp-admin/admin-ajax.php",
								//url: "/wp-content/themes/hays-careers/contact_send_mail.php",
								type: "POST",
								data: formData,
								contentType: false,
								//contentType: "application/x-www-form-urlencoded",
								cache: false,
								processData: false,
								beforeSend: function () {
									getApi($(evt.target).serialize()+'&_=resume');

									$('#frmContact').hide();
									$('#loader-icon').show();
								},
								complete: function () {
									$('#loader-icon').hide();
									$('#frmContact').show();
								},
								success: function (data) {
									if(data.slice(-1) == "0") {
										data = data.substr(0, data.length-1);
									}

									$("#mail-status").html(data);
									$('#loader-icon').hide();
								},
								error: function () {
								}

							});
						}

					} else {

						alert('Загрузите своё резюме в одном из форматов: .doc, .docx, .rtf, .txt, .pdf. Максимальный объем 4МБ');

						$('#loader-icon').hide();

					}
				}

			};

			window.runDropBoxChooser = function () {
			};

			function onDropBoxLoad() {
				window.runDropBoxChooser = function () {
					window.Dropbox.choose(drboxopts);
				}
			}

			this.mounted = function () {
				this.$nextTick(function () {

					if (!cookieEnabled('functionality'))
						return;
					/**
					 * Load external API's scripts.
					 */
					loadScript('https://www.dropbox.com/static/api/2/dropins.js', {
						'attrs': {
							'id': "dropboxjs",
							'data-app-key': "5u0krq3q5o7rlqw"
						}
					}, onDropBoxLoad);
					/**
					 * The Google API must be loaded only after the
					 * 'google-drive-api.es6' module sets up all the handlers.
					 */

					loadScript('https://apis.google.com/js/api.js?onload=onGoogleApiLoad');
					$('#userSpecialism, #userIndustry, #city').select2({width: "100%"});

				/*	$('#userGrade').select2({
						width: "100%",
						tags: true
					});
					*/
					$('#wrap_resume_link').on('click', function(e) {
						var obj = $(e.target);
						if( obj.attr('id') != 'resume_link') {
							$('#resume_link').click();
						}

					});

				});
			};
			/**
			 * Set up the Google Drive Piker API handlers.
			 */


			__webpack_require__(69)(pickerCallback);

			/**
			 * A simple callback implementation for Google Picker to attach the Google
			 * Drive document.
			 */


			function pickerCallback(data) {
				console.log('Picker callback');
				var url = 'nothing';

				if (data[google.picker.Response.ACTION] == google.picker.Action.PICKED) {
					var doc = data[google.picker.Response.DOCUMENTS][0];
					// url = doc[google.picker.Document.URL]; // var message = 'You picked: ' + url;
					// document.getElementById('result').innerHTML = message;

					var fileId = doc[google.picker.Document.ID];
					var url = 'https://www.googleapis.com/drive/v2/files/' + fileId + '?alt=media';

					console.dir(doc);
					self.data.source = 'gdrive';
					self.data.cloudfile = url;
					self.data.filename = doc.name;
					self.data.fileselected = true;
					
					self.data.doctype = doc.type;
					self.data.docid = fileId;
					self.data.serviceid = doc.serviceId;
				}
			}
		};

		SendResume.prototype.putDropBoxfilename = function (files) {
			// console.dir(files);
			this.data.source = 'dbox';
			this.data.cloudfile = files[0].link;
			this.data.filename = files[0].name;
			this.data.fileselected = true;
		};

		function _init() {
			if (!document.querySelector(sel)) {
				return;
			}

			var sr = new Vue(new SendResume());
			console.dir(sr);
		}

		_init();

		/***/
	}),
	/* 68 */
	/***/ (function (module, exports) {

		module.exports = function load(src, opts, cb) {
			var head = document.head || document.getElementsByTagName('head')[0]
			var script = document.createElement('script')

			if (typeof opts === 'function') {
				cb = opts
				opts = {}
			}

			opts = opts || {}
			cb = cb || function () {
			}

			script.type = opts.type || 'text/javascript'
			script.charset = opts.charset || 'utf8';
			script.async = 'async' in opts ? !!opts.async : true
			script.src = src

			if (opts.attrs) {
				setAttributes(script, opts.attrs)
			}

			if (opts.text) {
				script.text = '' + opts.text
			}

			var onend = 'onload' in script ? stdOnEnd : ieOnEnd
			onend(script, cb)

			// some good legacy browsers (firefox) fail the 'in' detection above
			// so as a fallback we always set onload
			// old IE will ignore this and new IE will set onload
			if (!script.onload) {
				stdOnEnd(script, cb);
			}

			head.appendChild(script)
		}

		function setAttributes(script, attrs) {
			for (var attr in attrs) {
				script.setAttribute(attr, attrs[attr]);
			}
		}

		function stdOnEnd(script, cb) {
			script.onload = function () {
				this.onerror = this.onload = null
				cb(null, script)
			}
			script.onerror = function () {
				// this.onload = null here is necessary
				// because even IE9 works not like others
				this.onerror = this.onload = null
				cb(new Error('Failed to load ' + this.src), script)
			}
		}

		function ieOnEnd(script, cb) {
			script.onreadystatechange = function () {
				if (this.readyState != 'complete' && this.readyState != 'loaded') return
				this.onreadystatechange = null
				cb(null, script) // there is no way to catch loading errors in IE8
			}
		}

		/***/
	}),
	/* 69 */
	/***/ (function (module, exports, __webpack_require__) {

		"use strict";

		module.exports = function _init(pickercb) {
			// The Browser API key obtained from the Google API Console.
			//Закоменчены старые данные от API 10.01.2020
			//var developerKey = 'AIzaSyBB-WF0ZxFgtaGPSt8tzKV8OCErFx1_GTM'; // The Client ID obtained from the Google API Console. Replace with your own Client ID.
			//var clientId = '131813863459-n6iij78kksunjj7pdmqjrnnq5uumbnjf.apps.googleusercontent.com'; // Scope to use to access user's photos.
			var developerKey = 'AIzaSyBB-WF0ZxFgtaGPSt8tzKV8OCErFx1_GTM'; // The Client ID obtained from the Google API Console. Replace with your own Client ID.

			var clientId = '232532617844-rp3hnsib9akvp5rqua4ubico7lh633qv.apps.googleusercontent.com'; // Scope to use to access user's photos.
			// var scope = 'https://www.googleapis.com/auth/photos';

			var scope = 'https://www.googleapis.com/auth/drive.readonly';
			var pickerApiLoaded = false;
			var oauthToken; // Use the API Loader script to load google.picker and gapi.auth.

			function onApiLoad() {
				window.gapi.load('auth2', onAuthApiLoad);
				window.gapi.load('picker', onPickerApiLoad);
			}

			/**
			 * The actual entry point of the module that is called after the Google API
			 * script is loaded after Vue SendResume ViewModel is mounted.
			 * @see 'vm-send-resume.es6'
			 */


			window.onGoogleApiLoad = onApiLoad;

			function onAuthApiLoad() {
				console.log('onAuthApiLoad worked...');
				var authBtn = document.getElementById('wj-gdrive-button');
				if( authBtn != null ) {
                    authBtn.disabled = false;
                    authBtn.addEventListener('click', function () {
                        window.gapi.auth2.authorize({
                            client_id: clientId,
                            scope: scope
                        }, handleAuthResult);
                    });
                }
			}

			function onPickerApiLoad() {
				pickerApiLoaded = true;
				createPicker();
			}
			//10.01.2020
			function handleAuthResult(authResult) {
				if (authResult && !authResult.error) {
					oauthToken = authResult.access_token;
					window.googleOAuthToken = oauthToken;
					createPicker();
				}
			} // Create and render a Picker object for picking user Photos.

			function createPicker() {
				if (pickerApiLoaded && oauthToken) {
					var picker = new google.picker.PickerBuilder().// addView(google.picker.ViewId.PHOTOS).
					// addView(google.picker.ViewId.DOCS).
					//Удалил, из-за него пишет ключ API недействителен ниже .setDeveloperKey(developerKey)
				//	addView(google.picker.ViewId.DOCUMENTS).setOAuthToken(oauthToken).setDeveloperKey(developerKey).setCallback(pickercb).build();
					addView(google.picker.ViewId.DOCUMENTS).setOAuthToken(oauthToken).setCallback(pickercb).build();
					picker.setVisible(true);
				}
			}
		};

		/***/
	})
	/******/]);

setTimeout(function () {
	$('html, body').scrollTop(1);
}, 500);

$(function () {
	$('body').on('click', '.scv-sidebar-widget-body__show-toggler', function () {
		var li = $(this).prev().find('li.hide');
		for (i = 0; i < 7; i++) {
			if (li[i] != undefined)
				$(li[i]).removeClass('hide').show();
		}
		if (!$(this).prev().find('li.hide').length)
			$(this).hide();
	});
	
	
	setInterval(function () {
		if ($('body').width() < 560) {
			$.each($('.scv-sidebar-widget-body__data li.hide'), function () {
				$(this).removeClass('hide').show();
			})
			return;
		}
		
		$('#header-banner-close').click(function(){
			$('#header-banner').fadeOut();
			alert('gg');
		});
	
	
		$.each($('.scv-sidebar-widget-body__data'), function () {
			if ($(this).hasClass('shows'))
				return;

			$(this).addClass('shows')

			li = $(this).find('li');
			if ($(li).length < 8) {
				$(this).next().hide();
				return;
			}

			$(this).next().show();

			for (i = 0; i < $(li).length; i++) {
				if (i > 7)
					$(li[i]).hide().addClass('hide');
			}

			$(this).next().show();
		})
	}, 500);

	const $surveyModal = $('.survey-modal')
	const $surveyTrigger = $('.survey-trigger')

	const state = {
		surveyOpened: false
	}

	function openSurvey() {
		if (state.surveyOpened) return false

		state.surveyOpened = true

		$surveyModal.fadeIn()
		$surveyTrigger.addClass('opened')
	}

	function closeSurvey() {
		if (!state.surveyOpened) return false

		state.surveyOpened = false

		$surveyModal.fadeOut('fast')
		$surveyTrigger.removeClass('opened')
	}

	function toggleSurvey() {
		if (state.surveyOpened) {
			closeSurvey()
		} else {
			openSurvey()
		}
	}

	$surveyModal.on('click', (e) => {
		if (e.target === e.currentTarget) {
			closeSurvey()
		}
	})

	$surveyTrigger.on('click', () => {
		toggleSurvey()
	})

	jQuery(document).on( 'click', ".qsm-submit-btn", function( event ) {
		setTimeout(() => {
			closeSurvey()
		}, 2200)
	});

	// mindbox
	var curUrl = window.location.pathname,
		jobMatch  = curUrl.match(/([0-9]+)/gi),
		jobId;
	jobId = jobMatch==null?0:jobMatch[0];
	//--- Факт просмотра вакансии
	if (curUrl.indexOf('/jobs/')!=-1) {
		getApi({"_":"viewjob", "id":jobId});
	}

	//--- Факт просмотра вакансии
	$('body').on('click', '.cpc-body__text a.wj-btn-standard.orange, .cpc-widget__vacancy-details-list a.wj-btn-standard.orange', function(e){
		getApi({"_":"otklikjob", "id":jobId});
	});

	//--- Заполнение формы отклика “Отправить резюме” на конкретную вакансию
	// см. функцию SendResume

    //--- В блоке “Услуги Hays” переход на направления (категории)
    if (curUrl.indexOf('/hays-services/')!=-1 || curUrl.indexOf('/hts-services/')!=-1) {
        var len = 0;
        $(curUrl.split('/')).each(function(i,el){
            if (el!="") {
                len++;
            }
        });
        if (len>=2) {
            getApi({"_":"gotodiruslugi", "url":window.location.href});
        }
    }

    //--- Переход на страницу “Услуги Hays” (клиенты)
    if (curUrl == '/hays-services/') {
        getApi({"_":"gotouslugi"});
    }

    //--- Переход на страницу “Направления работы”
	if (curUrl.indexOf('/podbor-personala/')!=-1) {
		getApi({"_":"gotopodbor"});
	}

	//--- Переход на страницу “Исследования Hays”
	if (curUrl.indexOf('/research/')!=-1) {
		getApi({"_":"gotoresearch"});
	}

	//--- Переход по кнопке “Предложить тему” на странице “Исследования Hays”
	$('body').on('click', '#research', function(){
		getApi({"_":"offertheme"});
	});

	//--- Переход по кнопке “Узнать больше об исследованиях Hays” (2) на странице “Исследования”
	if (curUrl.indexOf('/hays-services/hays-mapping/')!=-1) {
		getApi({"_":"gotoresearchmore"});
	}
	
	//--- Заполнение формы “Предложить тему” (1) на странице “Исследования Hays”
	$('body').on('click', '#pum-61743 form [type="submit"]', function(){
		var form = $(this).closest('form');
		if (checkFormApi(form)) {
			getApi(form.serialize() + "&_=formoffertheme");
		}
	});

	//--- Заявка на услуги Hays
	$('body').on('click', '#wpcf7-f39155-p37936-o92 form [type="submit"]', function(){
		var form = $(this).closest('form');
		if (checkFormApi($(this).closest('form'))) {
			getApi(form.serialize() + "&_=formservice");
		}
	});

	//--- Форма для клиентов
	$('body').on('click', '#wpcf7-f39155-p37936-o100 form [type="submit"], #wpcf7-f78034-o3 form [type="submit"]', function(){
		var form = $(this).closest('form');
		getApi(form.serialize() + "&_=formclient");
	});

	function initRate() {
		var li = $('#grade-form .rate ul li');

		li.on('mouseover', function(){
			var onStar = parseInt($(this).data('value'), 10);

			$(this).parent().children('li.star').each(function(e){
				if (e < onStar) {
					$(this).addClass('hover');
				}
				else {
					$(this).removeClass('hover');
				}
			});

		}).on('mouseout', function(){
			$(this).parent().children('li.star').each(function(e){
				$(this).removeClass('hover');
			});
		});

		li.on('click', function(){
			var onStar = parseInt($(this).data('value'), 10);
			var stars = $(this).parent().children('li.star');

			for (i = 0; i < stars.length; i++) {
				$(stars[i]).removeClass('selected');
			}

			for (i = 0; i < onStar; i++) {
				$(stars[i]).addClass('selected');
			}

			var ratingValue = parseInt($('#grade-form .rate ul li.selected').last().data('value'), 10);
			$('#site-rate').val( ratingValue );


		});
	}
	function initGradeForm()
	{
		$('#grade-form__send').click(function(e){

			e.preventDefault();
			var obj = $(this);

			if (obj.hasClass('active') ) {

				if (obj.data('step') == 1) {
					obj.data('step', 2);
					$('#grade-form .step-1').hide();
					$('#grade-form .step-2').show();
					obj.text('Отправить');
				} else {
					$.ajax({
						url: '/wp-admin/admin-ajax.php',
						type: 'POST',
						data: {
							action: "career_send_grade_site",
							rate: $('#site-rate').val(),
							recom: $('#grade-form__text').val()
						},
						success: function (data) {
							$('.grade-form--close').click();
						}
					});
				}

			}

		});

	}
	initRate();
	initGradeForm();


	if ($.cookie('spend_time') == undefined) {
		$.cookie('spend_time', (new Date()).getTime(), { expires: 30, path: '/' });
		$.cookie('spend_time_stop', 0, { expires: 180, path: '/' });
	}

	var dedtime = 30000, // время в мс через которое будет открыто окно оценки
		startSpentTime = $.cookie('spend_time'),
		stopSpentTime = $.cookie('spend_time_stop');

	setInterval(function() {
		if (((new Date()).getTime() - startSpentTime) >= dedtime && stopSpentTime < 1) {
			gradeFormShowAnimate();
		}
	}, 5000);

	$('#grade-form .grade-form--close').on('click', function(){
		var obj = $(this);
		if (obj.hasClass('up')) {
			gradeFormShowAnimate();
		} else {
			gradeFormHideAnimate();
		}
	});

	function gradeFormShowAnimate()
	{
		$('#grade-form').animate({
			bottom: "0"
		}, 1000, function() {
			$('#grade-form .grade-form--close').removeClass('up');
			stopSpentTime = 1;
			$.cookie('spend_time', '', { expires: 30, path: '/' });
			$.cookie('spend_time_stop', 1, { expires: 180, path: '/' });
		});
	}
	function gradeFormHideAnimate()
	{
		$('.grade.active').removeClass('active');
		$('#grade-form .step-1').show();
		$('#grade-form .step-2').hide();
		$('#grade-form__send').removeClass('active').data('step', 1).text('Далее');
		$('#grade-form').animate({
			bottom: "-188px"
		}, 1000, function() {
			$('#grade-form .grade-form--close').addClass('up');
			$.cookie('spend_time', '', { expires: 30, path: '/' });
			$.cookie('spend_time_stop', 1, { expires: 180, path: '/' });
		});
	}

	$('#grade-form .rate').on('click', 'li.grade', function() {
		var obj = $(this),
			form = obj.closest('form');
		$('li.grade').removeClass('active');
		obj.addClass('active');
		form.find('button').addClass('active');
		form.find('#site-rate').val( obj.text() );
	});

});

function getApi($param = {}) {
	var apiUrl = '/wp-content/themes/hays-careers/server/api/mindbox/events/';
	$.ajax({
		type: "GET",
		url: apiUrl,
		data: $param
	});
}

function checkFormApi(form) {
	check = true;
	form.find('[type="text"],[type="tel"],[type="email"]').each(function(i,el){
		if ( $(el).val() == '' ) {
			check = false;
		}
	});

	return check;
}