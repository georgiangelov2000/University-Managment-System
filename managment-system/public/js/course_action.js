/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/course_action.js ***!
  \***************************************/
$(document).ready(function () {
  $('.bootbox').on('click', function () {
    var $currentId = $(this).attr('data-id');
    var html = '';
    $.ajax({
      method: "GET",
      url: COURSEDETAILS.replace(':id', $currentId),
      success: function success(data) {
        if (data.length <= 0) {
          html += '<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this course.</p>';
        } else {
          data.forEach(function (element) {
            html += "\n                        <div class=\"users-bootbox rounded p-2\">\n                                <ul class=\"mb-0\">\n                                    <li>First Name: ".concat(element.first_name, "</li>\n                                    <li>Last Name: ").concat(element.last_name, "</li>\n                                    <li>Email: ").concat(element.email, "</li>\n                                    <li>Role: ").concat(element.role, "</li>\n                                    <li>Age: ").concat(element.age, "</li>\n                                </ul>\n                            </div>\n                        ");
          });
        }

        bootbox.alert({
          size: "medium",
          title: "Users",
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
          url: DELTECOURSE.replace(':id', $currentId),
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
/******/ })()
;