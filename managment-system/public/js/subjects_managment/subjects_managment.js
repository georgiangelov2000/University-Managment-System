/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************************!*\
  !*** ./resources/js/subjects_managment/subjects_managment.js ***!
  \***************************************************************/
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

$(document).ready(function () {
  var _ref;

  var table = $('.subjectsTable');
  var subject = $('select[name=subject_id]');
  var description = $('input[name=description]');
  $(subject).change(function () {
    {
      table.DataTable().ajax.reload(null, false);
    }
  });
  $(description).keyup(function () {
    table.DataTable().ajax.reload(null, false);
  });
  $('.subjectsTable').DataTable({
    ajax: {
      url: SUBJECT_INDEX,
      data: function data(_data) {
        _data.subject = $('select[name=subject_id]').val();
        _data.description = $('input[name=description]').val();
        _data.search = $('input[type=search]').val();
      }
    },
    processing: true,
    serverSide: true,
    columns: [{
      "width": "10%",
      data: 'title',
      name: 'title'
    }, {
      "width": "15%",
      data: 'description',
      name: 'description'
    }, (_ref = {
      data: 'created_at'
    }, _defineProperty(_ref, "data", 'created_at'), _defineProperty(_ref, "render", function render(data, type, row) {
      return moment(row.created_at, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
    }), _ref), {
      data: 'updated_at',
      render: function render(data, type, row) {
        return moment(row.updated_at, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
      }
    }, {
      "width": "30%",
      render: function render(data, type, row) {
        var COURSES = '<a data-id=' + row.id + ' class="btn btn-primary btn-sm bootbox-courses" title="Courses"><i class="nav-icon fas fa-book"></i></a>';
        var EDIT_SUBJECT = '<a href=' + SUBJECT_EDIT.replace(':id', row.id) + ' class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>';
        var DETACH_COURSE = '<button data-id="' + row.id + '" class="btn btn-sm btn-secondary bootbox-detach-course"><i class="fas fa-unlink"></i></button>';
        var DELETE_SUBJECT = '<a data-id=' + row.id + ' class="btn btn-danger btn-sm deleteSubject" title="Delete"><i class="fa fa-trash"></i></a>';
        var USER_SUBJECT_ATTENDANCE = "<a class='btn btn-success btn-sm' title='Attendances'><i class='fa fa-walking'></i></a>";
        return "<div class=\"text-center\">".concat(COURSES, " ").concat(EDIT_SUBJECT, "  ").concat(DELETE_SUBJECT, "  ").concat(DETACH_COURSE, " ").concat(USER_SUBJECT_ATTENDANCE, "</div>");
      }
    }],
    'columnDefs': [{
      'targets': [2, 3, 4],
      'orderable': false
    }]
  }); // AJAX ACTIONS

  $(document).on("click", ".bootbox-courses", function () {
    var $currentId = $(this).attr('data-id');
    var html = '';
    $.ajax({
      method: "GET",
      url: COURSE_DATA.replace(':id', $currentId),
      success: function success(data) {
        if (data.length <= 0) {
          html += '<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this subject.</p>';
        } else {
          data.forEach(function (element) {
            html += "\n                        <div class=\"bootbox-wrapper rounded p-2\">\n                                <ul class=\"mb-0\">\n                                    <li>Title: ".concat(element.title, "</li>\n                                    <li>Course year: ").concat(element.year_of_course, "</li>\n                                    <li>Course fee: ").concat(element.fee, "</li>\n                                </ul>\n                            </div>\n                        ");
          });
        }

        bootbox.alert({
          size: "lg",
          title: "Courses",
          message: html
        });
      },
      error: function error(errors) {
        console.log(errors);
      }
    });
  });
  $(document).on("click", ".bootbox-detach-course", function () {
    var currentId = $(this).attr('data-id');
    var html = '';
    $.ajax({
      method: "GET",
      url: GET_DETACH_COURSES.replace(':id', currentId),
      success: function success(data) {
        if (data.length <= 0) {
          html += '<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this subject.</p>';
        } else {
          html += "<form class='p-2 detachForm' method='post' action='" + POST_DETACH_COURSES.replace(':id', currentId) + "'>" + "<div class='form-group mb-2'>" + '<select class="form-control form-control-sm" multiple aria-label="multiple select example" name="course_id[]" >';
          data.forEach(function (element) {
            html += "<option value='" + element.id + "'>" + element.title + "</option>";
          });
          html += "</select></div><button class='btn btn-sm btn-primary' type='submit' onclick='onSubmit(event)'>Save</button></form>";
        }

        bootbox.alert({
          size: "lg",
          title: "Detach Course",
          message: html
        });
      },
      error: function error(errors) {
        console.log(errors);
      }
    });
    table.DataTable().ajax.reload(null, false);
  });
  $(document).on("click", ".deleteSubject", function () {
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
          url: SUBJECT_DELETE.replace(':id', $currentId),
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