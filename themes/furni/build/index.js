/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/Like.js":
/*!*****************************!*\
  !*** ./src/modules/Like.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class Like {
  constructor() {
    this.events();
  }
  events() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(".like-box").on("click", this.ourClickDispatcher.bind(this));
  }
  ourClickDispatcher(e) {
    var currentLikeBox = jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).closest(".like-box");
    // console.log(currentLikeBox.data("professor"));

    if (currentLikeBox.data("exists") == "yes") {
      this.deleteLike(currentLikeBox);
    } else {
      this.createLike(currentLikeBox);
    }
  }
  createLike(currentLikeBox) {
    //  alert("create test message")
    jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-Nonce", furniData.nonce);
      },
      url: furniData.root_url + "/wp-json/furni/v1/manageLike",
      type: "POST",
      data: {
        "professorId": currentLikeBox.data("professor")
      },
      success: response => {
        currentLikeBox.attr("data-exists", "yes");
        var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10);
        likeCount++;
        currentLikeBox.find(".like-count").html(likeCount);
        currentLikeBox.attr("data-like", response);
        console.log(response);
      },
      error: response => {
        console.log(response);
      }
    });
  }
  deleteLike(currentLikeBox) {
    jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-Nonce", furniData.nonce);
      },
      url: furniData.root_url + "/wp-json/furni/v1/manageLike",
      data: {
        "like": currentLikeBox.attr("data-like")
      },
      type: "DELETE",
      success: response => {
        currentLikeBox.attr("data-exists", "no");
        var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10);
        likeCount--;
        currentLikeBox.find(".like-count").html(likeCount);
        currentLikeBox.attr("data-like", "");
        console.log(response);
      },
      error: response => {
        console.log(response);
      }
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Like);

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ ((module) => {

module.exports = window["jQuery"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_Like__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/Like */ "./src/modules/Like.js");
// import "../scss/style.scss"

// Our modules / classes


// Instantiate a new object using our modules/classes
const like = new _modules_Like__WEBPACK_IMPORTED_MODULE_0__["default"]();
})();

/******/ })()
;
//# sourceMappingURL=index.js.map