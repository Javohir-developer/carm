
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

function deleteProductFromCache(obj){
    $.ajax({
        url: $(obj).data('url'),
        type: 'POST',
        data: {id: $(obj).data('id')},
        dataType: 'json',
        success: function (data) {
            if (data.status) {
                success();
                $('#_cache-index').html(data.result);
            }
        },
        error: function (request) {
            alert('ошибка')
            console.log(request.responseText);
        }
    });
    return false;
}

function saveCacheProducts(obj){
    $.ajax({
        url: $(obj).data('url'),
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            if (data.status) {
                $('#_cache-index').html(data.result);
            }
        },
        error: function (request) {
            alert('ошибка')
            console.log(request.responseText);
        }
    });
}


