function updateProductForm(obj) {
    $.ajax({
        url: $(obj).data('url'),
        type: 'GET',
        data: {id: $(obj).data('id')},
        dataType: 'json',
        success: function (data) {
            if (data) {
                $('#id-modal-body').html(data);
                $("link[href='/assets/dd6bf345/css/bootstrap.css']").remove();
                $('#update-product-form-modal').modal('show');
            }
        },
        error: function () {
            Notnotify('что произошло не так !', 'danger');
        }
    });
    return false;
}



function searchBarcode(obj){
    if ($('#listoftransitions-barcode').val() !== ''){
        $.ajax({
            url: $(obj).data('url'),
            type: 'GET',
            data: {barcode: $('#listoftransitions-barcode').val()},
            dataType: 'json',
            success: function (data) {
                if (data.status) {
                    $.each(data.result, function(key, val) {
                        $('#listoftransitions-'+key).val(val);
                    });
                    $("#listoftransitions-product_types_id").val(data.result.product_types_id).change();
                    $("#listoftransitions-evaluation").removeAttr('disabled');
                    $("#listoftransitions-size_type").removeAttr('disabled');
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

function listoftransitionsEntryPrice(obj) {
    if ($('#listoftransitions-entry_price').val() !== ''){
        $("#listoftransitions-evaluation").removeAttr('disabled');
        if ($('#listoftransitions-evaluation').val() !== ''){
            var evaluation = (Number($("#listoftransitions-evaluation").val()) + 100) / 100;
            var sum =  evaluation * $('#listoftransitions-entry_price').val();
            $('#listoftransitions-exit_price').val(number_format(sum,2,'.',''));
        }
    }else {
        $("#listoftransitions-evaluation").attr('disabled','disabled');
    }
};

function listoftransitionsEvaluation(obj) {
    if ($('#listoftransitions-entry_price').val() !== ''){
        evaluation = (Number($("#listoftransitions-evaluation").val()) + 100) / 100;
        var sum =  evaluation * $('#listoftransitions-entry_price').val();
        $('#listoftransitions-exit_price').val(number_format(sum,2,'.',''));
    }else {
        Notnotify('"Цена прх." не должен быть пустым', 'danger');
    }
};

function listoftransitionsExitPrice(obj) {
    if ($('#listoftransitions-entry_price').val() !== '' && $('#listoftransitions-evaluation').val() !== '' ){
        evaluation = (Number($('#listoftransitions-exit_price').val()) / Number($('#listoftransitions-entry_price').val())) * 100 - 100;
        $('#listoftransitions-evaluation').val(number_format(evaluation,1,'.',''));
    }else {
        Notnotify('"Цена прх." и "Оценка" не должен быть пустым', 'danger');
    }
};

function listoftransitionsSizeNum(obj) {
    var id = $("#listoftransitions-size_type");
    if ($('#listoftransitions-size_num').val() != '') {
        id.removeAttr('disabled');
        id.attr('required', true);
    }else {
        id.attr('disabled', true);
        id.removeAttr('required');
    }
};

function generateBarcode(){
    var value = Date.now().toString();
    var btype = 'code128';
    var renderer = 'css';
    var settings = {
        output:renderer,
        bgColor: '#FFFFFF',
        color: '#000000',
        barWidth: '1',
        barHeight: '50',
        moduleSize: '5',
        posX: '10',
        posY: '20',
        addQuietZone: '1'
    };
    // $("#barcodeTarget").html("").show().barcode(value, btype, settings);
    $('#listoftransitions-barcode').val(value);
}
