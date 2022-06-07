/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/js/users_managment/users_managment.js ***!
  \*********************************************************/
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

$(document).ready(function () {
  var _ref;

  var table = $('.userTable');
  $('.userTable').DataTable({
    ajax: USER_DATA,
    processing: true,
    serverSide: true,
    columns: [{
      "width": "10%",
      data: 'first_name',
      name: 'first_name'
    }, {
      "width": "10%",
      data: 'last_name',
      name: 'last_name'
    }, {
      data: 'email',
      name: 'email'
    }, {
      data: 'age',
      "width": "8%",
      render: function render(data, type, row) {
        return row.age;
      }
    }, {
      "width": "10%",
      data: 'role',
      name: 'role'
    }, (_ref = {
      data: 'created_at'
    }, _defineProperty(_ref, "data", 'created_at'), _defineProperty(_ref, "render", function render(data, type, row) {
      return moment(row.updated_at, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
    }), _ref), {
      data: 'updated_at',
      render: function render(data, type, row) {
        return moment(row.updated_at, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
      }
    }, {
      "width": "20%",
      render: function render(data, type, row) {
        var EDIT_USER = '<a href=' + USER_EDIT.replace(':id', row.id) + ' class="mr-1 btn btn-sm btn-warning editUser">Edit</a>';
        var DELETE_USER = '<a data-id=' + row.id + ' class="btn btn-danger btn-sm deleteUser">Delete</a>';
        var COURSE_VIEW = '<button data-id="' + row.id + '" class="mr-1 btn btn-sm btn-primary courseBootbox">Courses</button>';
        return "<div class=\"text-center\">".concat(EDIT_USER, "  ").concat(DELETE_USER, "  ").concat(COURSE_VIEW, "</div>");
        ;
      }
    }]
  }); //AJAX ACTIONS

  $(document).on("click", ".courseBootbox", function () {
    var $currentId = $(this).attr('data-id');
    var html = '';
    $.ajax({
      method: "GET",
      url: USERDETAILS.replace(':id', $currentId),
      success: function success(data) {
        if (data.length <= 0) {
          html += '<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this course.</p>';
        } else {
          data.forEach(function (element) {
            html += "\n                        <div class=\"bootbox-wrapper rounded p-2\">\n                                <ul class=\"mb-0\">\n                                    <li>Title: ".concat(element.title, "</li>\n                                    <li>Course year: ").concat(element.year_of_course, "</li>\n                                    <li>Course fee: ").concat(element.fee, "</li>\n                                </ul>\n                            </div>\n                        ");
          });
        }

        bootbox.alert({
          size: "lg",
          title: "Course",
          message: html
        });
      },
      error: function error(errors) {
        console.log(errors);
      }
    });
  });
  $(document).on("click", ".deleteUser", function () {
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
          url: DELETEUSER.replace(':id', $currentId),
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