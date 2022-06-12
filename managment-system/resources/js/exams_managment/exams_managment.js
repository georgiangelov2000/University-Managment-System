$(document).ready(function () {
    var table = $('.examsTable');

    $('.examsTable').DataTable({
        ajax: EXAM_API_INDEX,
        processing: true,
        serverSide: true,
        columns: [
            {
                name: 'title',
                render:function(data,type,row) {
                  return row.subjects.title;
                }
            },
            {
                name: 'date_start_exam',
                render:function(data,type,row) {
                  return row.date_start_exam;
                }
            },
            {
                name: 'date_end_exam',
                render:function(data,type,row) {
                  return row.date_end_exam;
                }
            },
            {
                'width':'15%',
                render:function(data,type,row) {
                    var STUDENTS_VIEW = '<a href='+EXAM_SHOW.replace(':id',row.id)+' class="btn btn-primary btn-sm">Students</a>'
                    var EDIT_EXAM = '<a href='+EXAM_EDIT.replace(':id',row.id)+' class="btn btn-warning btn-sm">Edit</a>';
                    var DELETE_EXAM = '<a a data-id=' + row.id + ' type="button" class="btn btn-danger btn-sm deleteExam">Delete</a>';
                    return `<div> ${STUDENTS_VIEW} ${EDIT_EXAM} ${DELETE_EXAM} </div>`
                }
            }
        ],
        'columnDefs': [ {
            'targets': [3],
            'orderable': false,
         }]
    });

    $(document).on("click", ".deleteExam", function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            background: '#fff',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let $currentId = $(this).attr('data-id');
                $.ajax({
                    method: "GET",
                    url: EXAM_DELETE.replace(':id', $currentId),
                    success: function (data) {
                        toastr['success']('Data has been deleted');
                    },
                    error: function (errors) {
                        toastr['error']('Data has not been deleted');
                    }
                });
                table.DataTable().ajax.reload(null, false);
            }
        })
    });

});
