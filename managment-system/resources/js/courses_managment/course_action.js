import  {addFieldsDateTimePicker, removeFieldsDateTimePicker}  from "../field_actions";

addFieldsDateTimePicker(
    $('.addField'),
    $('.programContent'),
    'input[name="date[]"]',
    'form-group mb-0 d-flex programContent'
)

removeFieldsDateTimePicker(
    '.removeField',
    '.programWrapper .programContent',
    '.programWrapper .programContent:last-child',
)
