
function addProductToCache(obj) {
    $.ajax({
        url: $(obj).data('url'),
        type: 'POST',
        data: $(obj).serialize(),
        dataType: 'json',
        success: function (data) {
            if (data.status) {
                success();
                $('#_cache-index').html(data.result);
            }else {
                validateErrors(data.result);
            }
        },
        error: function () {
            alert('ERROR');
        },
        complete: function () {

        }
    });
    return false;
}


