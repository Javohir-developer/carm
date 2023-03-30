function subCategories(param){

    $.ajax({
        url: $(param).data('url') + '/categories/sub-categories',
        type: 'GET',
        data: {id: $(param).data('id')},
        dataType: 'json',
        success: function (res) {
            if (res.success === true) {
                $( ".sub_categoreis" ).remove();
                $('.category-' + lastLineNumber($(param).data('check-num'), $(param).data('id'))).after(res.result);
            }else if(res.success === false){
                return window.location.href = $(param).data('url') + '/categories/category-products?id=' + $(param).data('id');
            }
            else {
                Notnotify('не удалось получить категории');
                $( ".fadeInDown" ).addClass( 'fadeInDown-error');
            }
        }
    });
}

function lastLineNumber(check_num, id){
    let array = Array.from({length: $('input[name="count-number"]').val()}, (v, i) => i+1);
    let sub_array = [];
    if ($(window).width() >= 1200) {
        while(array.length) {
            sub_array.push(array.splice(0, 8));
        }
    }
    else if ($(window).width() >= 992) {
        while(array.length) {
            sub_array.push(array.splice(0, 6));
        }
    }
    else if ($(window).width() >= 576) {
        while(array.length) {
            sub_array.push(array.splice(0, 4));
        }
    }
    else {
        return window.location.href = $('.multi-shop-class-width').data('url') + '/categories/category-products?parentId=' +id;
    }

    return sub_array.filter(item => item.includes(check_num)).at(-1).pop();
}


function submitForm(obj){
    $('#multi-sub-category-allId').submit();
}
