/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/field_actions.js":
/*!***************************************!*\
  !*** ./resources/js/field_actions.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "addFields": () => (/* binding */ addFields),
/* harmony export */   "addFieldsDateTimePicker": () => (/* binding */ addFieldsDateTimePicker),
/* harmony export */   "removeFields": () => (/* binding */ removeFields),
/* harmony export */   "removeFieldsDateTimePicker": () => (/* binding */ removeFieldsDateTimePicker)
/* harmony export */ });
// with date picker
function addFields(addField, wrapper, datePickerField, classElement) {
  $(addField).on('click', function () {
    wrapper.find(datePickerField).datepicker();
    var newClone = wrapper.clone(false).attr('class', classElement).insertAfter(wrapper);
    newClone.find(datePickerField).removeClass('datepicker').removeData('datepicker').unbind().datepicker({
      format: 'dd-mm-yy'
    });
  });
}

function removeFields(removeField, element, elementLastChild) {
  $(removeField).on('click', function () {
    if ($(element).length == 1) {
      return false;
    } else {
      $(elementLastChild).remove();
    }
  });
} //with date date time picker


function addFieldsDateTimePicker(addField, wrapper, datePickerField, classElement) {
  $(addField).on('click', function () {
    $(wrapper).find(datePickerField).datetimepicker();
    var newClone = $(wrapper).clone(false).attr('class', classElement).insertAfter($(wrapper));
    newClone.find(datePickerField).removeClass('datetimepicker').removeData('datetimepicker').unbind().datetimepicker({
      format: 'LT'
    });
  });
}

function removeFieldsDateTimePicker(removeField, element, elementLastChild) {
  $(removeField).on('click', function () {
    if ($(element).length == 1) {
      return false;
    } else {
      $(elementLastChild).remove();
    }
  });
}



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
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*********************************************************!*\
  !*** ./resources/js/courses_managment/course_action.js ***!
  \*********************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _field_actions__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../field_actions */ "./resources/js/field_actions.js");

(0,_field_actions__WEBPACK_IMPORTED_MODULE_0__.addFieldsDateTimePicker)($('.addField'), $('.programContent'), 'input[name="date[]"]', 'form-group mb-0 d-flex programContent');
(0,_field_actions__WEBPACK_IMPORTED_MODULE_0__.removeFieldsDateTimePicker)('.removeField', '.programWrapper .programContent', '.programWrapper .programContent:last-child');
})();

/******/ })()
;