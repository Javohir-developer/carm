
function addBasket(param){
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
                basket(res.cart, res.count_qty);
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

function basketShow(param){
    $.ajax({
        url: $(param).data('url'),
        type: 'GET',
        success: function (res) {
            $('.cart-container').html(res.cart);
        },
        error: function () {
            Notnotify('ошибка');
            $( ".fadeInDown" ).addClass( 'fadeInDown-error');
        }
    });
}

function plusBasket(param){
    var val = $(param).parent('.field2').children('.quantity');
    var id = $(param).data('id');
    var parent1 = $(param).closest('.item-info').children('.item-info-input').find('.delete-prod');
    $.ajax({
        url: $(param).data('url'),
        type: 'GET',
        data: {id: id},
        dataType: 'json',
        success: function (res) {
            if (res !== null) {
                val.val(res.cart_id_qty);
                parent1.attr('data-qty-input', res.cart_id_qty);
                params(res.count_qty, res.sum);
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

function minusBasket(param){
    var val = $(param).parent().children('.quantity');
    var id = $(param).data('id');
    var parent1 = $(param).closest('.item-info').children('.item-info-input').find('.delete-prod');
    $.ajax({
        url: $(param).data('url'),
        type: 'GET',
        data: {id: id},
        dataType: 'json',
        success: function (res) {
            if (res !== null) {
                val.val(res.cart_id_qty);
                parent1.attr('data-qty-input', res.cart_id_qty);
                params(res.count_qty, res.sum);
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

function removeBasket(param){
    var id = $(param).data('prod-id');
    var qty_input = $(param).data('qty-input');
    $.ajax({
        url: $(param).data('url'),
        type: 'GET',
        data: {id: id, qty_input: qty_input},
        dataType: 'json',
        success: function (res) {
            if (res !== null) {
                $('.cart-container').html(res.cart);
                $('#checkout-page').html(res.cart);
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

function basket(cart, count_qty) {
    $('.cart-container').html(cart);
    $('.counter-number-qty').text(count_qty);
}