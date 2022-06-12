/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************************!*\
  !*** ./resources/js/exams_managment/user_has_exams.js ***!
  \********************************************************/
$(document).ready(function () {
  var table = $('.userHasExams');
  var EXAM_ID = $('.userHasExams').attr('data-exam-id');
  $('.userHasExams').DataTable({
    ajax: USER_VIEW.replace(':id', EXAM_ID),
    processing: true,
    serverSide: true,
    order: [[1, 'desc']],
    columns: [{
      render: function render(data, type, row) {
        return '<div class="text-center"><img class="rounded w-50" src="' + row.picture + '" /> </div>';
      }
    }, {
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
      "width": "25%",
      render: function render(date, type, row) {
        var FAILED_EXAM;
        var TAKEN_EXAM;
        var DETATCH_USER = "<button type='button' data-id=" + row.id + " class='btn btn-danger btn-sm detachUser'>Remove</button>";

        if (row.exam_is_taken) {
          FAILED_EXAM = "<div class='form-check'>" + "<input  data-id=" + row.id + " type='checkbox' class='form-check-input' name='exam_is_taken' value='0' id='failed_exam'>" + "<label class='form-check-label' for='failed_exam'>Exam failed</label>" + "</div>";
          TAKEN_EXAM = "<div class='form-check'>" + "<input checked data-id=" + row.id + " type='checkbox' class='form-check-input' name='exam_is_taken' value='1' id='taken_exam'>" + "<label class='form-check-label' for='taken_exam'>Exam taken</label>" + "</div>";
        } else {
          FAILED_EXAM = "<div class='form-check'>" + "<input checked data-id=" + row.id + " type='checkbox' class='form-check-input' name='exam_is_taken' value='0' id='failed_exam'>" + "<label class='form-check-label' for='failed_exam'>Exam failed</label>" + "</div>";
          TAKEN_EXAM = "<div class='form-check'>" + "<input  data-id=" + row.id + " type='checkbox' class='form-check-input' name='exam_is_taken' value='1' id='taken_exam'>" + "<label class='form-check-label' for='taken_exam'>Exam taken</label>" + "</div>";
        }

        return "<div class=\"d-flex align-items-center justify-content-between form-group\">".concat(DETATCH_USER, " ").concat(FAILED_EXAM, " ").concat(TAKEN_EXAM, "</div>");
      }
    }],
    'columnDefs': [{
      'targets': [0, 5, 6, 7],
      'orderable': false
    }]
  });
  $(document).on('click', 'input[name="exam_is_taken"]', function (e) {
    var user_id = $(this).attr('data-id');
    var is_taken_value = $(this).val();
    e.preventDefault();
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      background: '#fff',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, updated it!'
    }).then(function (result) {
      if (result.isConfirmed) {
        $.ajax({
          method: 'POST',
          url: USER_IS_TAKEN_EXAM.replace(':id', user_id),
          data: {
            'exam_is_taken': is_taken_value
          },
          success: function success(data) {
            toastr['success']('Data has been updated');
          },
          error: function error(errors) {
            toastr['error']('Data has not been updated');
          }
        });
        table.DataTable().ajax.reload(null, false);
      }
    });
  });
  $(document).on("click", ".detachUser", function (e) {
    var user_id = $(this).attr('data-id');
    e.preventDefault();
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
        $.ajax({
          method: "GET",
          url: STUDENT_DETACH.replace(':id', EXAM_ID),
          data: {
            'user_id': user_id
          },
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