/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************************************!*\
  !*** ./resources/js/attendances_managment/attendances_actions.js ***!
  \*******************************************************************/
$(document).ready(function () {
  var addFields = $('.addAttendanceFields');
  var removeFields = $('.removeAttendanceFields');
  var wrapper = $('.attendance-wrapper');
  $(addFields).on('click', function () {
    $(wrapper).append($('.attendance-content:first').clone(true));
  });
  $(removeFields).on('click', function () {
    if ($('.attendance-wrapper .attendance-content').length == 1) {
      return false;
    } else {
      $('.attendance-wrapper .attendance-content:last-child').remove();
    }
  });
});
/******/ })()
;