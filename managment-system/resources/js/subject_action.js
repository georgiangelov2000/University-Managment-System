$(document).ready(function () {


    $('.bootbox-courses').on('click', function () {
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

    $('.bootbox-detach-course').on('click', function () {
        let currentId = $(this).attr('data-id');
        let html = '';
        $.ajax({
            method: "GET",
            url: GET_DETACH_COURSES.replace(':id', currentId),
            success: function (data) {
                if (data.length <= 0) {
                    html += '<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this subject.</p>'
                } else {
                    html += "<form class='p-2 detachForm' method='post' action='"+POST_DETACH_COURSES.replace(':id',currentId)+"'>"
                    +"<div class='form-group mb-2'>"+
                        '<select class="form-select" multiple aria-label="multiple select example" name="course_id[]" >'
                    data.forEach(element => {
                        html += "<option value='"+element.id+"'>"+element.title+"</option>";
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
    });




    $('.delete').on('click', function () {
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
                    url: DELETE_SUBJECT.replace(':id', $currentId),
                    success: function (data) {
                        location.reload();
                    },
                    error: function (errors) {
                        console.log(errors);
                    }
                });
            }
        })
    })


});

window.onSubmit = function (e) {
    e.preventDefault();
    let form = $('.detachForm');
    $.ajax({
        url:form.attr('action'),
        type:form.attr('method'),
        data:form.serialize(),
        success: function (data) {
            toastr.success('Successfully detached data');
            setTimeout(() => {
                location.reload();
            }, 500);
        },
        error:function (error) {
            console.log(error);
            toastr.error('Unsuccessfully detached data');
        }
    })
}
