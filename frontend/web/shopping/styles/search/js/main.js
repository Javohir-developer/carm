function SearchPaginationShowMore(param){
    var pageSize = $(param).val();
    var searchParam = $(param).data('search-param');
    var row_count= $('#poduct-param-id').children('.class-for-add-after').length;
    $.ajax({
        url: $(param).data('url'),
        type: 'GET',
        data: { searchParam: searchParam, pageSize: pageSize},
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