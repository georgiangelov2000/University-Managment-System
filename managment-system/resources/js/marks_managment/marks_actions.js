$(document).ready(function () {

    var addFields = $('.addMarkFields');
    var removeFields = $('.removeMarkFields');

    var wrapper = $('.mark-wrapper');

    $(addFields).on('click', function(){
        $(wrapper).append($('.mark-content:first').clone(true))
    })

    $(removeFields).on('click', function(){
        if ($('.mark-wrapper .mark-content').length == 1) {
            return false;
        } else {
            $('.mark-wrapper .mark-content:last-child').remove();
        }
    })

})
