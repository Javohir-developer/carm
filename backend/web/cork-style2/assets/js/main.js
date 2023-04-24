function validateErrors(data){
    // $('.h6-size').hide();
    $('.help-block').addClass('help-block1');
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
                align: "left"
                // align: "right"
            },
        }
    );
}

function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}


