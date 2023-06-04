
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
        dataType: 'json',
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
        dataType: 'json',
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

function clearProductsFromCache(obj){
    $.ajax({
        url: $(obj).data('url'),
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            if (data) {
                $.pjax.reload('#products-cache-index');
                Notnotify('Продукт успешно удалено !', 'success');
            }else {
                Notnotify('Нет товаров для провести', 'danger');
            }
        },
        error: function (request) {
            Notnotify('что произошло не так !', 'danger');
        }
    });
}

function searchBarcode(obj){
    if ($('#products-barcode').val() !== ''){
        $.ajax({
            url: $(obj).data('url'),
            type: 'GET',
            data: {barcode: $('#products-barcode').val(), barCodeType: $(obj).data('bar-code-type')},
            dataType: 'json',
            success: function (data) {
                if (data.status) {
                    $.each(data.result, function(key, val) {
                        $('#products-'+key).val(val);
                    });
                    $("#products-product_types_id").val(data.result.product_types_id).change();
                    $("#products-evaluation").removeAttr('disabled');
                    $("#products-size_type").removeAttr('disabled');
                }else {
                    Notnotify('Ничего не найдено для этого штрих-кода !', 'danger');
                }
            },
            error: function () {
                Notnotify('что произошло не так !', 'danger');
            }
        });
    }else {
        Notnotify('"Бар код" не должен быть пустым !', 'danger');
    }

}

$("#products-entry_price").on("keyup", function(e) {
    if ($('#products-entry_price').val() !== ''){
        $("#products-evaluation").removeAttr('disabled');
        if ($('#products-evaluation').val() !== ''){
            var evaluation = (Number($("#products-evaluation").val()) + 100) / 100;
            var sum =  evaluation * $('#products-entry_price').val();
            $('#products-exit_price').val(number_format(sum,2,'.',''));
        }
    }else {
        $("#products-evaluation").attr('disabled','disabled');
    }
});

$("#products-evaluation").on("keyup", function(e) {
    if ($('#products-entry_price').val() !== ''){
        evaluation = (Number($("#products-evaluation").val()) + 100) / 100;
        var sum =  evaluation * $('#products-entry_price').val();
        $('#products-exit_price').val(number_format(sum,2,'.',''));
    }else {
        Notnotify('"Цена прх." не должен быть пустым', 'danger');
    }
});

$("#products-exit_price").on("keyup", function(e) {
    if ($('#products-entry_price').val() !== '' && $('#products-evaluation').val() !== '' ){
        evaluation = (Number($('#products-exit_price').val()) / Number($('#products-entry_price').val())) * 100 - 100;
        $('#products-evaluation').val(number_format(evaluation,1,'.',''));
    }else {
        Notnotify('"Цена прх." и "Оценка" не должен быть пустым', 'danger');
    }
});

$("#products-size_num").on("keyup", function(e) {
    var id = $("#products-size_type");
    if ($('#products-size_num').val() != '') {
        id.removeAttr('disabled');
        id.attr('required', true);
    }else {
        id.attr('disabled', true);
        id.removeAttr('required');
    }
});

function validateErrors(data){
    $('.help-block').addClass('help-block1');
    $('.form-group').addClass('form-group1');
    $.each(data, function(key, val) {
        $('#'+key).parent().parent().find('.help-block').html(val);
    });
}

function success(){
    $('.help-block').empty();
    $('.help-block').removeClass('help-block1');
    $('.form-group').removeClass('form-group1');
    // $("#products-form-send-ajax").trigger('reset');
}


function generateBarcode(){
    var value = Date.now().toString();
    var btype = 'code128';
    var renderer = 'css';
    var settings = {
        output:renderer,
        bgColor: '#FFFFFF',
        color: '#000000',
        barWidth: '2',
        barHeight: '60',
        moduleSize: '5',
        posX: '10',
        posY: '20',
        addQuietZone: '1'
    };
    $("#bar-cod-class").html("").show().barcode(value, btype, settings);
    $('#barcode-generate-input').val(value);
    $('#bar-code-modal').modal('show');
}

function generateBarcodeForWeight(){
    var value = Date.now().toString();
    var btype = 'code128';
    var renderer = 'css';
    var settings = {
        output:renderer,
        bgColor: '#FFFFFF',
        color: '#000000',
        barWidth: '2',
        barHeight: '60',
        moduleSize: '5',
        posX: '10',
        posY: '20',
        addQuietZone: '1'
    };
    $("#bar-cod-class").html("").show().barcode(value, btype, settings);
    $('#barcode-generate-input').val(value);
}
function generateBarcodeForPiece(){
    var value = Date.now().toString();
    var btype = 'code128';
    var renderer = 'css';
    var settings = {
        output:renderer,
        bgColor: '#FFFFFF',
        color: '#000000',
        barWidth: '2',
        barHeight: '60',
        moduleSize: '5',
        posX: '10',
        posY: '20',
        addQuietZone: '1'
    };
    $("#bar-cod-class").html("").show().barcode(value, btype, settings);
    $('#barcode-generate-input').val(value);
}

function addToTheInput(){
    $('#products-barcode').val($('#barcode-generate-input').val());
    $('#bar-code-modal').modal('hide');
}





