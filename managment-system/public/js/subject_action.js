/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/subject_action.js ***!
  \****************************************/
$(document).ready(function () {
  $('.bootbox-courses').on('click', function () {
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
  $('.bootbox-detach-course').on('click', function () {
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
  });
  $('.delete').on('click', function () {
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
          url: DELETE_SUBJECT.replace(':id', $currentId),
          success: function success(data) {
            location.reload();
          },
          error: function error(errors) {
            console.log(errors);
          }
        });
      }
    });
  });
});

window.onSubmit = function (e) {
  e.preventDefault();
  var form = $('.detachForm');
  $.ajax({
    url: form.attr('action'),
    type: form.attr('method'),
    data: form.serialize(),
    success: function success(data) {
      toastr.success('Successfully detached data');
      setTimeout(function () {
        location.reload();
      }, 500);
    },
    error: function error(_error) {
      console.log(_error);
      toastr.error('Unsuccessfully detached data');
    }
  });
};
/******/ })()
;