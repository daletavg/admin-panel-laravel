$('[data-img-delete]').on('click', function () {

    let sendData = {
        imageId: $(this).attr('data-id'),
        editId:$(this).attr('data-edit-id')
    };
    console.log(sendData);
    let imageName=$(this).attr('data-name');
    let thisItem = $(this);

    $.ajax('/admin/ajax/delete-image', {
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: sendData,
        success: function () {
            $('#'+imageName).attr('src',window.origin+'/img/header-logo.svg');
            thisItem.remove();
            alert('Изображение успешно удалено!')
        },
        error: function () {
            alert('Что-то пошло не так')
        }
    });
});
const flatpickr = require("flatpickr");

// es modules are recommended, if available, especially for typescript
const Russian = require("flatpickr/dist/l10n/ru.js").default.ru;
flatpickr("[flatpicker-date-time]", {
    time_24hr:true,
    enableTime: true,
    locale: Russian,
    altInput: true,
    dateFormat: "Y-m-d H:i:s",
});
flatpickr("[flatpicker-date]", {
    altInput: true,
    dateFormat: "Y-m-d",
});
// $("[flatpicker-date]").flatpickr({
//     enableTime: true,
//     dateFormat: "Y-m-d H:i",
// });
// $("[flatpicker-date-time]").flatpickr({
//     altInput: true,
//     altFormat: "F j, Y",
//     dateFormat: "Y-m-d",
// });


