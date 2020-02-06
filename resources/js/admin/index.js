$('[data-img-delete]').on('click', function () {

    let sendData = {
        imageId: $(this).attr('data-id'),
        editId: $(this).attr('data-edit-id')
    };

    let thisItem = $(this);


    $.ajax('/admin/ajax/delete-image', {
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: sendData,
        success: function () {
            let image = thisItem.parents('.image-actions').find('.upload-image-class')
            image.attr('src', window.origin + '/default.png')
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
    time_24hr: true,
    enableTime: true,
    locale: Russian,
    altInput: true,
    dateFormat: "Y-m-d H:i:s",
});
flatpickr("[flatpicker-date]", {
    altInput: true,
    dateFormat: "Y-m-d",
});

flatpickr("[flatpicker-date-inline]", {
    altInput: true,
    dateFormat: "Y-m-d",
    inline: true
});


const getDataFromTable = (id, userInformation, subservice, dateTime, editUrl, deleteUrl,token) => {
    return `<tr>

                <th>${id}</th>
                <td>${userInformation}</td>
                <td>${subservice}</td>
                <td>${dateTime}</td>
                <td class="text-primary text-right">
                    <div class="dropdown menu_drop">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="dropdownMenuButton_1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">menu</i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                            <a href="${editUrl}"
                               class="dropdown-item">Edit</a>
                            <form method="POST" action="${deleteUrl}"
                                  accept-charset="UTF-8"
                                  onsubmit="return confirm(&quot;Are you sure you want to delete the entry?&quot;)">
                                    <input type="hidden" name="_token" "${token}">
                                    <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="dropdown-item">Delete</button>
                            </form>

                        </div>
                    </div>
                </td>

            </tr>`
};

const sendDateTimeBooking = (url, date, time) => {
    let serviceLoadData = $('#services-load-data');
    serviceLoadData.html('');
    let createUrl = $('#make-bookie').attr('data-url');
    $('#make-bookie').attr('href',createUrl+"?date="+date);
    $.get(url, {date, time: (time !== undefined ? time : null)})
        .done(function (data) {
            // console.log(data);
            data.map((item)=>{

               serviceLoadData.append(getDataFromTable(item.id, item.userInformation, item.subservice, item.dateTime, item.editUrl, item.deleteUrl,item.token))
            });
        });
    // for (let i = 0; i < 10; i++) {
    //
    // }
};

const enabledDatepicker = $('[data-selected-datepicker=true]');
if (enabledDatepicker.length) {
    enabledDatepicker.datepicker({
        onRenderCell: function (date, cellType) {
            var currentDate = date.getDate();
            // console.log(currentDate);
            // // Добавляем вспомогательный элемент, если число содержится в `eventDates`
            // console.log(cellType == 'day' && eventDates.indexOf(currentDate) != -1);
            // if (cellType == 'day' ) {
            //     return {
            //         html: '<span class="red">'+currentDate+'</span>'
            //     }
            // }
        },
        onShow: (inst, animationCompleted) => {
            console.log(inst);
        },
        onSelect: (formattedDate, date, inst) => {
            let url = enabledDatepicker.attr('data-url');
            sendDateTimeBooking(url, enabledDatepicker[0].value);
        }
    });

    const currentDate = new Date();
    enabledDatepicker.data('datepicker').selectDate(currentDate);
}

$('div[data-selectable-time=true]').on('click', function (obj) {
    let url = $('div[data-url-time]').attr('data-url-time');
    let time = $(this).attr('data-time');
    let date = enabledDatepicker[0].value;
    sendDateTimeBooking(url, date, time);
});


const valueOnHideInputForDate = $('div[data-hidden-input=true]');
if (valueOnHideInputForDate.length) {
    valueOnHideInputForDate.datepicker({
        // Можно выбрать тольо даты, идущие за сегодняшним днем, включая сегодня
        minDate: new Date()
    })
    $('.time-selector').select2({width: '100%'});
    valueOnHideInputForDate.datepicker({
        onSelect: (formattedDate, date, inst) => {
            let dateInput = $('input[data-hidden-date]');
            let currentSelectDate = valueOnHideInputForDate[0].value;
            dateInput.val(currentSelectDate);
            let timeSelector = $('.time-selector');
            let timesUrl = valueOnHideInputForDate.attr('data-times-url');
            let sendData ={date: currentSelectDate};

            let selectedTimeForEdit = timeSelector.attr('data-select-time');

            $.get(timesUrl, sendData)
                .done(function (times) {
                    // console.log(times);
                    timeSelector.html("");
                    if(selectedTimeForEdit !== undefined)
                    {
                        let newOption = new Option(selectedTimeForEdit, selectedTimeForEdit, false, false);
                        timeSelector.append(newOption).trigger('change');
                    }
                    times.map((time) => {
                        // console.log(time);
                        let newOption = new Option(time, time, false, false);
                        timeSelector.append(newOption).trigger('change');
                        // timeSelector.trigger('change');
                    });
                });



        }
    });
    const currentDate = new Date(valueOnHideInputForDate.attr('data-selected-day'));
    valueOnHideInputForDate.data('datepicker').selectDate(currentDate);
}

// var currentDate = currentDate = new Date();
// $('[data-selected-datepicker=true]').data('datepicker').selectDate(new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDay()))


//Activate language on dashboard Language Management
$(document).ready(function () {
    $('.active-lang').on('change', function () {
        let that = this;
        let url = $('tbody[data-url-changed]').attr('data-url-changed');
        let dataId = $(that).attr('data-id');
        let active = $(that).children("option:selected").val();
        $.get(url, {dataId, active}).done(function (data) {
            message('Success updated', 'success');
        });
    });
});

