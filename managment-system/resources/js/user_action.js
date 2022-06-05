$(document).ready(function () {

    $('.bootbox').on('click', function () {
        let $currentId = $(this).attr('data-id');
        let html = '';
        $.ajax({
            method: "GET",
            url: USERDETAILS.replace(':id', $currentId),
            success: function (data) {
                if (data.length <= 0) {
                    html+='<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this course.</p>'
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
                    url: DELETEUSER.replace(':id', $currentId),
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


})
