function validateErrors(data){
    $.each(data, function(key, val) {
        $('#'+key).next().html(val);
    });
}

function success(){
    $('.help-block').empty();
    // $("#products-form-send-ajax").trigger('reset');
}



