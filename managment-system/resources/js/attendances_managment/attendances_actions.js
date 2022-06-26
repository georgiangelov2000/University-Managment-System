
import  {addFields, removeFields}  from "../field_actions";

addFields(
    $('.addAttendanceFields'),
    $('.attendance-content'),
    'input[name="date_attendance[]"]',
    'd-flex mt-2 attendance-content'
)
removeFields(
    '.removeAttendanceFields',
    '.attendance-wrapper .attendance-content',
    '.attendance-wrapper .attendance-content:last-child',
);
