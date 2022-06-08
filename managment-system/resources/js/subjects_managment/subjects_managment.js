$(document).ready(function () {
    var table = $('.subjectsTable');

    $('.subjectsTable').DataTable({
        ajax: SUBJECT_INDEX,
        processing: true,
        serverSide: true,
        columns: [{
                "width": "10%",
                data: 'title',
                name: 'title',
            },
            {
                "width": "15%",
                data: 'description',
                name: 'description',
            },
            {
                data: 'created_at',
                data: 'created_at',
                render: function (data, type, row) {
                    return moment(row.created_at, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
                }
            },
            {
                data: 'updated_at',
                render: function (data, type, row) {
                    return moment(row.updated_at, "HH:mm:ss").format("YYYY-MM-DD h:mm:ss");
                }
            },
            {
                "width": "30%",
                render: function (data, type, row) {
                    var COURSES = '<a data-id=' + row.id + ' class="btn btn-primary btn-sm bootbox-courses">Courses</a>';
                    var EDIT_SUBJECT = '<a href=' + SUBJECT_EDIT.replace(':id', row.id) + ' class="btn btn-secondary btn-sm">Edit</a>';
                    var DETACH_COURSE = '<button data-id="' + row.id + '" class="mr-1 btn btn-sm btn-warning bootbox-detach-course">Detach Course</button>';
                    var DELETE_SUBJECT = '<a data-id=' + row.id + ' class="btn btn-danger btn-sm deleteSubject">Delete</a>';
                    return `<div class="text-center">${COURSES} ${EDIT_SUBJECT}  ${DELETE_SUBJECT}  ${DETACH_COURSE}</div>`;;

                }
            }
        ]
    });


    // AJAX ACTIONS
    $(document).on("click", ".bootbox-courses", function () {
        let $currentId = $(this).attr('data-id');
        let html = '';
        $.ajax({
            method: "GET",
            url: COURSE_DATA.replace(':id', $currentId),
            success: function (data) {
                if (data.length <= 0) {
                    html += '<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this subject.</p>'
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
                    title: "Courses",
                    message: html,
                })
            },
            error: function (errors) {
                console.log(errors);
            },
        });
    });

    $(document).on("click", ".bootbox-detach-course", function () {
        let currentId = $(this).attr('data-id');
        let html = '';
        $.ajax({
            method: "GET",
            url: GET_DETACH_COURSES.replace(':id', currentId),
            success: function (data) {
                if (data.length <= 0) {
                    html += '<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this subject.</p>'
                } else {
                    html += "<form class='p-2 detachForm' method='post' action='" + POST_DETACH_COURSES.replace(':id', currentId) + "'>" +
                        "<div class='form-group mb-2'>" +
                        '<select class="form-control form-control-sm" multiple aria-label="multiple select example" name="course_id[]" >'
                    data.forEach(element => {
                        html += "<option value='" + element.id + "'>" + element.title + "</option>";
                    });
                    html += "</select></div><button class='btn btn-sm btn-primary' type='submit' onclick='onSubmit(event)'>Save</button></form>";
                }
                bootbox.alert({
                    size: "lg",
                    title: "Detach Course",
                    message: html,
                })
            },
            error: function (errors) {
                console.log(errors);
            },
        });
        table.DataTable().ajax.reload(null, false);
    });




    $(document).on("click", ".deleteSubject", function () {
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
                    url: SUBJECT_DELETE.replace(':id', $currentId),
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
    })


});
