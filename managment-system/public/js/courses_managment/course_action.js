/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/js/courses_managment/course_action.js ***!
  \*********************************************************/
$(document).ready(function () {
  var addField = $('.addField');
  var removeField = $('.removeField');
  var programWrapper = $('.programWrapper');
  $(addField).on('click', function () {
    $(programWrapper).append($('.programContent:first').clone(true));
  });
  $(removeField).on('click', function () {
    if ($('.programWrapper .programContent').length == 1) {
      return false;
    } else {
      $('.programWrapper .programContent:last-child').remove();
    }
  });
});
/******/ })()
;