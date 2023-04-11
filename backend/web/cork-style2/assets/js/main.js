function validateErrors(data){
    $('.h6-size').hide();
    $.each(data, function(key, val) {
        $('#'+key).next().html(val);
    });
}

function success(){
    $('.help-block').empty();
    $('.h6-size').show();
    // $("#products-form-send-ajax").trigger('reset');
}


function Notnotify(notification, type){
    $.notify(
        {
            // title: title,
            message: notification,
            icon: 'bi bi-emoji-frown icon-error'
        },
        {
            type: type,
            allow_dismiss: true,
            delay: 2000,
            placement: {
                from: "top",
                align: "right"
            },
        }
    );
}


