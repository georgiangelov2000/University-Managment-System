/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************************************!*\
  !*** ./resources/js/courses_managment/courses_managment.js ***!
  \*************************************************************/
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

$(document).ready(function () {
  var _ref, _ref2;

  var table = $('.coursesTable');
  var filterYear = $('select[name=year]');
  var filterFee = $('input[name=fee]');
  $(filterYear).change(function () {
    table.DataTable().ajax.reload(null, false);
  });
  $(filterFee).keyup(function () {
    table.DataTable().ajax.reload(null, false);
  });
  $('.coursesTable').DataTable({
    ajax: {
      url: COURSE_DATA,
      data: function data(_data) {
        _data.search = $('input[type=search]').val();
        _data.year = $('select[name=year]').val();
        _data.fee = $('input[name=fee]').val();
      }
    },
    processing: true,
    serverSide: true,
    columns: [{
      "width": "10%",
      data: 'title',
      name: 'title'
    }, {
      "width": "10%",
      data: 'year_of_course',
      name: 'year_of_course'
    }, {
      "width": "10%",
      data: 'fee',
      name: 'fee'
    }, (_ref = {
      data: 'created_at'
    }, _defineProperty(_ref, "data", 'created_at'), _defineProperty(_ref, "render", function render(data, type, row) {
      return moment(row.updated_at, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
    }), _ref), (_ref2 = {
      data: 'updated_at'
    }, _defineProperty(_ref2, "data", 'updated_at'), _defineProperty(_ref2, "render", function render(data, type, row) {
      return moment(row.updated_at, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
    }), _ref2), {
      "width": "20%",
      render: function render(data, type, row) {
        var EDIT_COURSE = '<a href=' + COURSE_EDIT.replace(':id', row.id) + ' class="btn btn-sm btn-warning editUser" title="Edit"><i class="fa fa-edit"></i></a>';
        var DELETE_COURSE = '<a data-id=' + row.id + ' class="btn btn-danger btn-sm deleteCourse" title="Delete"><i class="fa fa-trash"></i></a>';
        var USERS_VIEW = '<a href=' + STUDENTS.replace(':id', row.id) + ' data-id="' + row.id + '" class="btn btn-sm btn-primary userBootbox" title="Students"><i class="fa fa-users"></i></a>';
        var CREATE_PROGRAM = '<a href= ' + COURSE_PROGRAM_CREATE.replace(':id', row.id) + ' class="btn btn-sm btn-info" title="Create Program" ><i class="fa fa-calendar"></i></a>';
        var PROGRAM = '<a class="btn btn-sm btn-secondary" title="View Program"><i class="fa fa-search"></i></a>';
        return "<div class=\"text-center\">".concat(EDIT_COURSE, "  ").concat(DELETE_COURSE, "  ").concat(USERS_VIEW, " ").concat(CREATE_PROGRAM, " ").concat(PROGRAM, "</div>");
        ;
      }
    }],
    'columnDefs': [{
      'targets': [3, 4, 5],
      'orderable': false
    }]
  }); //AJAX ACTIONS

  $(document).on("click", ".userBootbox", function () {
    var $currentId = $(this).attr('data-id');
    var html = '';
    $.ajax({
      method: "GET",
      url: COURSE_DETAILS.replace(':id', $currentId),
      success: function success(data) {
        if (data.length <= 0) {
          html += '<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this subject.</p>';
        } else {
          data.forEach(function (element) {
            html += "\n                        <div class=\"bootbox-wrapper rounded p-2\">\n                                <ul class=\"mb-0\">\n                                    <li>Title: ".concat(element.first_name, "</li>\n                                    <li>Course year: ").concat(element.last_name, "</li>\n                                    <li>Course fee: ").concat(element.age, "</li>\n                                </ul>\n                            </div>\n                        ");
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
  $(document).on("click", ".deleteCourse", function () {
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
          url: COURSE_DELETE.replace(':id', $currentId),
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