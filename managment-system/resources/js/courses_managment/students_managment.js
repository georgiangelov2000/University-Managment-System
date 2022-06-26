$(document).ready(function () {

    var courseId = $('.studentTable').attr('data-id');

    console.log($('.studentTable'));

    $('.studentTable').DataTable({
        ajax:USER_DATA.replace(':id', courseId),
        processing: true,
        serverSide: true,
        columns: [
            {
                name: 'id',
                render: function (data, type, row) {
                    return row.id;
                }
            },
            {
                data:'picture',
                render:function(data,type,row) {
                    return '<div class="text-center w-100 m-auto"><img class="rounded w-100" src="'+row.picture+'" /> </div>';
                }
            },
            {
                name: 'first_name',
                render: function (data, type, row) {
                    return row.first_name;
                }
            },
            {
                name: 'last_name',
                render: function (data, type, row) {
                    return row.last_name;
                }
            },
            {
                name: 'email',
                render: function (data, type, row) {
                    return row.email;
                }
            },
            {
                name: 'age',
                render: function (data, type, row) {
                    return row.age;
                }
            },
            {
                name: 'role',
                render: function (data, type, row) {
                    return row.role;
                }
            },
            {
                render:function (data, type, row) {
                    var USER_DELETE = "<button class='mr-1 btn btn-danger btn-sm' title='Delete'><i class='fa fa-trash'></i></button>";
                    var USER_PROFILE = "<a class='mr-1 btn btn-info btn-sm' title='User'><i class='fa fa-user'></i></a>"
                    var USER_COURSE_MARKS = "<a class='btn btn-success btn-sm title='Marks''><i class='fa fa-check'></i></a>"
                    return USER_DELETE + USER_PROFILE + USER_COURSE_MARKS;
                }
            }
        ],
        'columnDefs': [ {
            'targets': [1,7],
            'orderable': false,
         }]
    });

});
