import  {addFields, removeFields}  from "../field_actions";
addFields(
    $('.addMarkFields'),
    $('.mark-content'),
    'input[name="date_of_mark[]"]',
    'd-flex mt-2 mark-content'
)
removeFields(
    '.removeMarkFields',
    '.mark-wrapper .mark-content',
    '.mark-wrapper .mark-content:last-child',
);

