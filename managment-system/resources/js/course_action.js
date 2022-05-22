$(document).ready(function () {

    $('.bootbox').on('click', function () {
        let $currentId = $(this).attr('data-id');
        let html = '';
        $.ajax({
            method: "GET",
            url: COURSEDETAILS.replace(':id', $currentId),
            success: function (data) {
                if (data.length <= 0) {
                    html+='<p class="no-available-data p-2"><i class="fa fa-warning text-warning"> </i> No data available for this course.</p>'
                } else {
                    data.forEach(element => {
                        html += `
                        <div class="bootbox-wrapper rounded p-2">
                                <ul class="mb-0">
                                    <li>First Name: ${element.first_name}</li>
                                    <li>Last Name: ${element.last_name}</li>
                                    <li>Email: ${element.email}</li>
                                    <li>Role: ${element.role}</li>
                                    <li>Age: ${element.age}</li>
                                </ul>
                            </div>
                        `
                    });
                }
                bootbox.alert({
                    size: "lg",
                    title: "Users",
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
                    url: DELTECOURSE.replace(':id', $currentId),
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
