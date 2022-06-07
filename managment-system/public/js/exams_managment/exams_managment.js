/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/js/exams_managment/exams_managment.js ***!
  \*********************************************************/
$(document).ready(function () {
  var table = $('.examsTable');
  $('.examsTable').DataTable({
    ajax: EXAM_API_INDEX,
    processing: true,
    serverSide: true,
    columns: [{
      name: 'title',
      render: function render(data, type, row) {
        return row.subjects.title;
      }
    }, {
      name: 'date_start_exam',
      render: function render(data, type, row) {
        return row.date_start_exam;
      }
    }, {
      name: 'date_end_exam',
      render: function render(data, type, row) {
        return row.date_end_exam;
      }
    }, {
      render: function render(data, type, row) {
        var STUDENTS_VIEW = '<a href=' + EXAM_SHOW.replace(':id', row.id) + ' class="btn btn-primary btn-sm">Students</a>';
        var EDIT_EXAM = '<a href=' + EXAM_EDIT.replace(':id', row.id) + ' class="btn btn-warning btn-sm">Edit</a>';
        var DELETE_EXAM = '<a a data-id=' + row.id + ' type="button" class="btn btn-danger btn-sm deleteExam">Delete</a>';
        return "<div> ".concat(STUDENTS_VIEW, " ").concat(EDIT_EXAM, " ").concat(DELETE_EXAM, " </div>");
      }
    }]
  });
  $(document).on("click", ".deleteExam", function () {
    var _this = this;

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      background: '#fff',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function (result) {
      if (result.isConfirmed) {
        var $currentId = $(_this).attr('data-id');
        $.ajax({
          method: "GET",
          url: EXAM_DELETE.replace(':id', $currentId),
          success: function success(data) {
            toastr['success']('Data has been deleted');
          },
          error: function error(errors) {
            toastr['error']('Data has not been deleted');
          }
        });
        table.DataTable().ajax.reload(null, false);
      }
    });
  });
});
/******/ })()
;