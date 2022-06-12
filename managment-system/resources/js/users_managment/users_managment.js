$(document).ready(function () {
    var table = $('.userTable');

    $('.userTable').DataTable({
        ajax: USER_DATA,
        processing: true,
        serverSide: true,
        order: [[1, 'desc']],
        columns: [
            {
                data:'picture',
                render:function(data,type,row) {
                    return '<div class="text-center w-100 m-auto"><img class="rounded w-100" src="'+row.picture+'" /> </div>';
                }
            },
            {
                "width": "10%",
                data: 'first_name',
                name: 'first_name',
            },
            {
                "width": "10%",
                data: 'last_name',
                name: 'last_name',
            },
            {
                data: 'email',
                name: 'email',
            },
            {
                data: 'age',
                "width": "8%",
                render: function(data,type,row) {
                    return row.age;
                }
            },
            {
                "width": "10%",
                data: 'role',
                name: 'role',
            },
            {
                "width": "10%",
                data: 'course',
                name: 'course',
            },
            {
                "width": "10%",
                data: 'created_at',
                render: function(data,type,row) {
                    return moment(row.updated_at.date, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
                }
            },
            {
                "width": "10%",
                data: 'updated_at',
                render: function(data,type,row) {
                    return moment(row.updated_at.date, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
                }
            },
            {
                "width": "15%",
                render: function (data, type, row) {
                    var EDIT_USER = '<a href=' + USER_EDIT.replace(':id', row.id) + ' class="mr-1 btn btn-sm btn-warning editUser">Edit</a>';
                    var DELETE_USER = '<a data-id=' + row.id + ' class="btn btn-danger btn-sm deleteUser">Delete</a>';
                    var COURSE_VIEW = '<button data-id="' + row.id + '" class="mr-1 btn btn-sm btn-primary courseBootbox">Courses</button>';
                    return `<div class="text-center">${EDIT_USER}  ${DELETE_USER}  ${COURSE_VIEW}</div>`;;

                }
            }
        ],
        'columnDefs': [ {
            'targets': [0,6,7,8,9],
            'orderable': false,
         }]
    });

    //AJAX ACTIONS

    $(document).on("click", ".courseBootbox", function () {
        let $currentId = $(this).attr('data-id');
        let html = '';
        $.ajax({
            method: "GET",
            url: USERDETAILS.replace(':id', $currentId),
            success: function (data) {
                if (data.length <= 0) {
                    html += '<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this course.</p>'
                } else {
                    data.forEach(element => {
                        html += `
                        <div class="bootbox-wrapper rounded p-2">
                                <ul class="mb-0">
                                    <li>Title: ${element.title}</li>
                                    <li>Course year: ${element.year_of_course}</li>
                                    <li>Course fee: ${element.fee}</li>
                                </ul>
                            </div>
                        `
                    });
                }
                bootbox.alert({
                    size: "lg",
                    title: "Course",
                    message: html,
                })
            },
            error: function (errors) {
                console.log(errors);
            },
        });
    });

    $(document).on("click", ".deleteUser", function () {
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
                    url: DELETEUSER.replace(':id', $currentId),
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
