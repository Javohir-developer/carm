
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
                Notnotify('данных недостаточно !', 'danger');
                validateErrors(data.result);
            }
        },
        error: function () {
            Notnotify('что произошло не так !', 'danger');
            console.log(request.responseText);
        }
    });
    return false;
}

function updateProductFromCache(obj) {
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
                Notnotify('данных недостаточно !', 'danger');
                validateErrors(data.result);
            }
        },
        error: function () {
            Notnotify('что произошло не так !', 'danger');
            console.log(request.responseText);
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
            Notnotify('что произошло не так !', 'danger');
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
                Notnotify('Товар успешно провести', 'success');
            }else {
                Notnotify(data.notification, 'danger');
            }
        },
        error: function (request) {
            Notnotify('что произошло не так !', 'danger');
            console.log(request.responseText);
        }
    });
}


