
// with date picker

function addFields(addField,wrapper,datePickerField,classElement){

    $(addField).on('click', function(){
        wrapper.find(datePickerField).datepicker();

        var newClone = wrapper
        .clone(false)
        .attr('class',classElement)
        .insertAfter(wrapper);

        newClone
        .find(datePickerField)
        .removeClass('datepicker')
        .removeData('datepicker')
        .unbind()
        .datepicker({
            format: 'dd-mm-yy',
        });

    })

}

function removeFields(removeField,element,elementLastChild) {
    $(removeField).on('click', function () {
        if ($(element).length == 1) {
            return false;
        } else {
            $(elementLastChild).remove();
        }
    })
}

//with date date time picker

function addFieldsDateTimePicker(addField,wrapper,datePickerField,classElement){

    $(addField).on('click', function(){
        $(wrapper).find(datePickerField).datetimepicker();

        var newClone = $(wrapper)
        .clone(false)
        .attr('class',classElement)
        .insertAfter($(wrapper));

        newClone
        .find(datePickerField)
        .removeClass('datetimepicker')
        .removeData('datetimepicker')
        .unbind()
        .datetimepicker({
            format: 'LT'
        });

    })

}

function removeFieldsDateTimePicker(removeField,element,elementLastChild) {
    $(removeField).on('click', function () {
        if ($(element).length == 1) {
            return false;
        } else {
            $(elementLastChild).remove();
        }
    })
}

export {addFields,removeFields,addFieldsDateTimePicker,removeFieldsDateTimePicker};
