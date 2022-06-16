$(document).ready(function () {
    var table = $('.attendanceTable');
    table.on('preXhr.dt', function (e, settings, data) {
        data.user_id = $('select[name=user_id]').val();
        data.subject_id = $('select[name=subject_id]').val();
    })

    $('.generate').on('click', function () {
        table.DataTable().ajax.reload(null, false);
        return false;
    })

    $('.attendanceTable').DataTable({
        ajax: ATTENDANCES_API_INDEX,
        processing: true,
        serverSide: true,
        columns: [{
                name: 'is_attendance',
                render: function (data, type, row) {
                    if (row.is_attendance) {
                        return '<i class="text-danger fa fa-remove"></i>'
                    } else {
                        return '<i class="text-success fa fa-check"></i>'
                    }
                }
            },
            {
                name: 'date_attendance',
                render: function (data, type, row) {
                    return row.date_attendance;
                }
            },
            {
                render: function (data, type, row) {
                    var DELETE_ATTENDANCE = '<button data-id="' + row.id + '" type="button" class="btn btn-danger btn-sm deleteAttendance" title="Delete"><i class="fa fa-trash"></i></button>'
                    return DELETE_ATTENDANCE;
                }
            },
        ],
        'columnDefs': [{
            'targets': [2],
            'orderable': false,
        }]
    })

    $('.resetFilters').on('click', function () {
        $('select[name=user_id]').val('');
        $('select[name=subject_id]').val('');
        table.DataTable().ajax.reload(null, false);
    })

    $(document).on("click", ".deleteAttendance", function () {
        const currentId = $(this).attr("data-id");
        console.log(currentId)
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
                $.ajax({
                    method: "GET",
                    url: ATTENDANCE_DELETE,
                    data: {
                        mark: currentId
                    },
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

})
