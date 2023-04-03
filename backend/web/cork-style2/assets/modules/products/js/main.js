function addProductToCache(param) {
    $.ajax({
        url: $(param).data('url'),
        type: 'POST',
        // data: $(param).serializeArray(),
        data: $(param).serialize(),
        datatype: 'json',
        success: function (data) {
            if (data !== null){
                $('#_cache-index').html(data);
            }
        },
        error: function () {
            alert('ERROR');
        },
    });
    return false;
}