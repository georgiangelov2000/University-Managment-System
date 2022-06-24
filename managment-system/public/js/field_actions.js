/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
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
/*!***************************************!*\
  !*** ./resources/js/field_actions.js ***!
  \***************************************/
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


/******/ })()
;