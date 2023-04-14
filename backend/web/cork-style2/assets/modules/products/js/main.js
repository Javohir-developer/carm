
function addProductToCache(obj) {
    $.ajax({
        url: $(obj).data('url'),
        type: 'POST',
        data: $(obj).serializeArray(),
        dataType: 'json',
        success: function (data) {
            if (data.status) {
                success();
                $.pjax.reload('#products-cache-index');
                Notnotify('Продукт успешно обновлен', 'success');
            }else {
                Notnotify('данных недостаточно !', 'danger');
                validateErrors(data.result);
            }
        },
        error: function () {
            Notnotify('что произошло не так !', 'danger');
        }
    });
    return false;
}

function updateProductFromCache(obj) {
    $.ajax({
        url: $(obj).data('url'),
        type: 'POST',
        data: $(obj).serializeArray(),
        dataType: 'html',
        success: function (data) {
            if (data) {
                $.pjax.reload('#products-cache-index');
                Notnotify('Продукт успешно обновлен', 'success');
            }else {
                Notnotify('что произошло не так !', 'danger');
            }
        },
        error: function () {
            Notnotify('что произошло не так !', 'danger');
        }
    });
    return false;
}

function deleteProductFromCache(obj){
    $.ajax({
        url: $(obj).data('url'),
        type: 'POST',
        data: {id: $(obj).data('id')},
        dataType: 'html',
        success: function (data) {
            if (data){
                $.pjax.reload('#products-cache-index');
                Notnotify('Продукт успешно удалено !', 'success');
            }
        },
        error: function (request) {
            Notnotify('что произошло не так !', 'danger');
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
            if (data) {
                $.pjax.reload('#products-cache-index');
                Notnotify('Товар успешно провести', 'success');
            }else {
                Notnotify('Нет товаров для провести', 'danger');
            }
        },
        error: function (request) {
            Notnotify('что произошло не так !', 'danger');
        }
    });
}




