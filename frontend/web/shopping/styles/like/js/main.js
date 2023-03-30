
function addLike(param){
    var id = $(param).data('id');
    var put_image = $(param).data('put-image');
    $.ajax({
        url: $(param).data('url'),
        type: 'GET',
        data: {id: id},
        dataType: 'json',
        success: function (res) {
            if (res !== null) {
                notify(res.name, res.image, res.price, put_image);
                $( ".fadeInDown" ).addClass( 'fadeInDown-success');
                like(res.like, res.count_qty);
            } else {
                Notnotify('не удалось загрузить товар в корзину.');
                $( ".fadeInDown" ).addClass( 'fadeInDown-error');
            }
        },
        error: function () {
            Notnotify('не удалось загрузить товар в корзину.');
            $( ".fadeInDown" ).addClass( 'fadeInDown-error');
        }
    });
}

function likeShow(param){
    $.ajax({
        url: $(param).data('url'),
        type: 'GET',
        success: function (res) {
            $('.cart-container').html(res.like);
        },
        error: function () {
            Notnotify('ошибка');
            $( ".fadeInDown" ).addClass( 'fadeInDown-error');
        }
    });
}

function removeLike(param){
    var id = $(param).data('prod-id');
    var qty_input = $(param).data('qty-input');
    $.ajax({
        url: $(param).data('url'),
        type: 'GET',
        data: {id: id, qty_input: qty_input},
        dataType: 'json',
        success: function (res) {
            if (res !== null) {
                $('.cart-container').html(res.like);
                $('#checkout-page').html(res.like);
                params(res.count_qty, null);
            } else {
                Notnotify('такого продукта не существует');
            }
        },
        error: function () {
            Notnotify('такого продукта не существует');
        }
    });
}

function params(count_qty = null, sum = null){
    if (count_qty !== null){
        $('.cart_product_qty').text(count_qty);
        $('.counter-number-qty').text(count_qty);
    }
    if (sum !== null){
        $('.cart_product_sum').text(sum);
    }
    if (count_qty === 0){
        $(".checkout-zakas").attr("disabled", true);
    }else {
        $(".checkout-zakas").attr("disabled", false);
    }
}

function like(like, count_qty) {
    $('.cart-container').html(like);
    $('.counter-number-qty').text(count_qty);
}