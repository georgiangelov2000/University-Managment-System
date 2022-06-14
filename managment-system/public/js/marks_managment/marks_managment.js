/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/js/marks_managment/marks_managment.js ***!
  \*********************************************************/
$(document).ready(function () {
  var table = $('.markTable');
  table.on('preXhr.dt', function (e, settings, data) {
    data.user_id = $('select[name=user_id]').val();
    data.subject_id = $('select[name=subject_id]').val();
  });
  $('.generate').on('click', function () {
    table.DataTable().ajax.reload(null, false);
    return false;
  });
  $('.markTable').DataTable({
    ajax: MARKS_API_INDEX,
    processing: true,
    serverSide: true,
    columns: [{
      name: 'mark',
      render: function render(data, type, row) {
        return row.mark;
      }
    }, {
      name: 'date_of_mark',
      render: function render(data, type, row) {
        return row.date_of_mark;
      }
    }, {
      render: function render(data, type, row) {
        var DELETE_MARK = '<button data-id="' + row.id + '" type="button" class="btn btn-danger btn-sm deleteMark" title="Delete"><i class="fa fa-trash"></i></button>';
        return DELETE_MARK;
      }
    }],
    'columnDefs': [{
      'targets': [2],
      'orderable': false
    }]
  });
  $('.resetFilters').on('click', function () {
    $('select[name=user_id]').val('');
    $('select[name=subject_id]').val('');
    table.DataTable().ajax.reload(null, false);
  });
  $(document).on("click", ".deleteMark", function () {
    var currentId = $(this).attr("data-id");
    console.log(currentId);
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
          url: MARK_DELETE,
          data: {
            mark: currentId
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