/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************************!*\
  !*** ./resources/js/exams_managment/user_has_exams.js ***!
  \********************************************************/
$(document).ready(function () {
  var EXAM_ID = $('.userHasExams').attr('data-exam-id');
  console.log(USER_VIEW.replace(':id', EXAM_ID));
  $('.userHasExams').DataTable({
    ajax: USER_VIEW.replace(':id', EXAM_ID),
    processing: true,
    serverSide: true,
    columns: [{
      render: function render(data, type, row) {
        return row.first_name;
      }
    }, {
      render: function render(data, type, row) {
        return row.last_name;
      }
    }, {
      render: function render(data, type, row) {
        return row.age;
      }
    }, {
      render: function render(data, type, row) {
        return row.course;
      }
    }, {
      render: function render(data, type, row) {
        return moment(row.created_at.date, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
      }
    }, {
      render: function render(data, type, row) {
        return moment(row.updated_at.date, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
      }
    }, {
      "width": "30%",
      render: function render(date, type, row) {
        var STUDENT_DETACH = "<a class='btn btn-danger btn-sm'>Remove</a>";
        var FAILED_EXAM = "<div class='form-check'>" + "<input type='checkbox' class='form-check-input' id='exampleCheck1'>" + "<label class='form-check-label' for='exampleCheck1'>Exam failed</label>" + "</div>";
        var TAIKEN_EXAM = "<div class='form-check'>" + "<input type='checkbox' class='form-check-input' id='exampleCheck1'>" + "<label class='form-check-label' for='exampleCheck1'>Exam taken</label>" + "</div>";
        return "<div class=\"d-flex align-items-center justify-content-between\">".concat(STUDENT_DETACH, " ").concat(FAILED_EXAM, " ").concat(TAIKEN_EXAM, "</div>");
      }
    }]
  });
});
/******/ })()
;