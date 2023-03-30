function thisRegionCity(param){
    $.ajax({
        url: $(param).data('url'),
        type: 'GET',
        data: {id: param.value},
        success: function (res) {
            $('#orders-city').html(res);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
            Notnotify('пожалуйста, отправьте проблему администратору');
            $( ".fadeInDown" ).addClass( 'fadeInDown-error');
        }
    });
}

// function Notnotify(note){
//     $.notify(
//         {
//             title: 'Ошибка',
//             message: note,
//             icon: 'bi bi-emoji-frown icon-error'
//         },
//         {
//             type: "danger",
//             allow_dismiss: true,
//             delay: 10000,
//             placement: {
//                 from: "top",
//                 align: "right"
//             },
//         }
//     );
// }

function successNotify(note){
    $.notify(
        {
            title: '',
            message: note,
            icon: 'bi bi-emoji-heart-eyes icon-error'
        },
        {
            type: "success",
            allow_dismiss: true,
            delay: 10000,
            placement: {
                from: "top",
                align: "right"
            },
        }
    );
}


function ajaxSendOneClick(param){
    $.ajax({
        url: $(param).data('url'),
        type: 'POST',
        data: $(param).serializeArray(),
        success: function (data) {
            if (data !== null){
                $("#oneClick").modal('hide');
                $('#send-one-click')[0].reset();
                successNotify('Спасибо за покупку, Номер вашей покупки: ' + data);
            }
        },
    });
    return false;
}