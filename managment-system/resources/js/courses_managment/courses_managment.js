$(document).ready(function () {
    var table = $('.coursesTable');

    $('.coursesTable').DataTable({
        ajax: COURSE_DATA,
        processing: true,
        serverSide: true,
        columns: [{
                "width": "10%",
                data: 'title',
                name: 'title',
            },
            {
                "width": "10%",
                data: 'year_of_course',
                name: 'year_of_course',
            },
            {
                "width": "10%",
                data: 'fee',
                name: 'fee',
            },
            {
                data: 'created_at',
                data: 'created_at',
                render: function (data, type, row) {
                    return moment(row.updated_at, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
                }
            },
            {
                data: 'updated_at',
                data: 'updated_at',
                render: function (data, type, row) {
                    return moment(row.updated_at, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
                }
            },
            {
                "width": "20%",
                render: function (data, type, row) {
                    var EDIT_COURSE = '<a href=' + COURSE_EDIT.replace(':id', row.id) + ' class="mr-1 btn btn-sm btn-warning editUser">Edit</a>';
                    var DELETE_COURSE = '<a data-id=' + row.id + ' class="btn btn-danger btn-sm deleteCourse">Delete</a>';
                    var USERS_VIEW = '<button data-id="' + row.id + '" class="mr-1 btn btn-sm btn-primary userBootbox">Users</button>';
                    return `<div class="text-center">${EDIT_COURSE}  ${DELETE_COURSE}  ${USERS_VIEW}</div>`;;

                }
            }
        ],
        'columnDefs': [ {
            'targets': [3,4,5],
            'orderable': false,
         }]
    })

    //AJAX ACTIONS

    $(document).on("click", ".userBootbox", function () {
        let $currentId = $(this).attr('data-id');
        let html = '';
        $.ajax({
            method: "GET",
            url: COURSE_DETAILS.replace(':id', $currentId),
            success: function (data) {
                if (data.length <= 0) {
                    html += '<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this subject.</p>'
                } else {
                    data.forEach(element => {
                        html += `
                        <div class="bootbox-wrapper rounded p-2">
                                <ul class="mb-0">
                                    <li>Title: ${element.first_name}</li>
                                    <li>Course year: ${element.last_name}</li>
                                    <li>Course fee: ${element.age}</li>
                                </ul>
                            </div>
                        `
                    });
                }
                bootbox.alert({
                    size: "lg",
                    title: "Courses",
                    message: html,
                })
            },
            error: function (errors) {
                console.log(errors);
            },
        });
    });


    $(document).on("click", ".deleteCourse", function () {
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
                    url: COURSE_DELETE.replace(':id', $currentId),
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
