/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/user_action.js ***!
  \*************************************/
$(document).ready(function () {
  $('.bootbox').on('click', function () {
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
          url: DELETEUSER.replace(':id', $currentId),
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