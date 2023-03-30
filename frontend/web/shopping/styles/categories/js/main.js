$(function() {
    var products_property = $('input[name=products_property]');
    if(products_property.is(':checked')) {
        products_property.prop('checked', false).removeAttr('checked');
    }
});

// function paginationClick(param){
//     var arr = [];
//     var id =  $(param).data('id');
//     $('input[name=products_property]:checked').each(function() {
//         arr.push($(this).data('param'));
//     });
//     if (id.toString().includes(',')){
//         id = id.split(',');
//     }
//     $.ajax({
//         url: $(param).data('url'),
//         type: 'GET',
//         data: {product_params: arr, id: id, pageSize: $(param).data('page-size')},
//         dataType: 'json',
//         success: function (res) {
//             if (res.success === true){
//                 $('#category-products-param').empty().html(res.result);
//             }
//         },
//         error: function () {
//             Notnotify('ошибка');
//         }
//     });
//     $('.pagination-click').attr('href', '#');
// }

function SearchProductsProperty(param){
    var arr = [];
    var id =  $(param).data('id');
    $('input[name=products_property]:checked').each(function() {
        arr.push($(this).data('param'));
    });
    if (id.toString().includes(',')){
       id = id.split(',');
    }
    $.ajax({
        url: $(param).data('url'),
        type: 'GET',
        data: {product_params: arr, id: id, pageSize: $(param).data('page-size')},
        dataType: 'json',
        success: function (res) {
            if (res.success === true){
                $('#category-products-param').empty().html(res.result);
            }
        },
        error: function () {
            Notnotify('ошибка');
        }
    });
}


function PaginationShowMore(param){
    var arr = [];
    var id =  $(param).data('id');
    var pageSize = $(param).val();
    var row_count= $('#poduct-param-id').children('.class-for-add-after').length;
    $('input[name=products_property]:checked').each(function() {
        arr.push($(this).data('param'));
    });
    if (id.toString().includes(',')){
        id = id.split(',');
    }
    $.ajax({
        url: $(param).data('url'),
        type: 'GET',
        data: {product_params: arr, id: id, pageSize: pageSize},
        dataType: 'json',
        success: function (res) {
            if (res.success === true && row_count < res.count){
                $('#category-products-param').empty().html(res.result);
                $( "#button-add-product-params" ).val(parseInt(pageSize) + res.pageSize);
            }
        },
        error: function () {
            Notnotify('ошибка');
        }
    });

}

// function Notnotify(note){
//     $.notify(
//         {
//             title: 'Ошибка',
//             message: note,
//             icon: 'bi bi-emoji-frown icon-error'
//         },
//         {
//             type: "danger",
//             allow_dismiss: true,
//             delay: 2000,
//             placement: {
//                 from: "top",
//                 align: "right"
//             },
//         }
//     );
// }


