;

$(document).ready(function () {
    let $openModal = $('.openModal');;
    let $openModalCourse = $('.openCourseUsersModal');

    $openModal.on('click', function () {
        let $currentId = $(this).attr('data-id');
        $.ajax({
            method: "GET",
            url: USERDETAILS.replace(':id', $currentId),
            success: function (data) {
                toastr.success('Successfully retrieved details')
                $('.modal-title').html(data.title);
                $('.modal-body').children().eq(0).html('<span>Course year: </span>' + data.year_of_course + '<br>');
                $('.modal-body').children().eq(1).html('<span>Course fee: </span>' + data.fee + '<br>');
            },
            error: function (errors) {
                toastr.danger('Unsuccessfully retrieved details')
                console.log(errors);
            },
        });
    })

    $openModalCourse.on('click', function () {
        let $currentId = $(this).attr('data-id');
        $.ajax({
            method: "GET",
            url: COURSEDETAILS.replace(':id', $currentId),
            success: function (data) {
                // toastr.success('Successfully retrieved details')
                $('.modal-title').html('Students');
                data.forEach(element => {
                    $('.modal-body').children().eq(0).html('<span>First Name: </span>' + element.first_name + '<br>');
                    $('.modal-body').children().eq(1).html('<span>Last Name: </span>' + element.last_name + '<br>');
                    $('.modal-body').children().eq(2).html('<span>Role: </span>' + element.role + '<br>');
                });
            },
            error: function (errors) {
                // toastr.danger('Unsuccessfully retrieved details')
                console.log(errors);
            },
        });
    })

})
