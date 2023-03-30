$(function (){

    // Популярные бренды hide
    $('.brands_hide').hide();
    if ($('.status_for_brands').html() !== undefined){
        $('.brands_hide').show();
    }

    // Популярные товары title hide
    $('.title_popularne_product_hide').hide();
    if ($('.status_for_title_popularne_product').html() !== undefined){
        $('.title_popularne_product_hide').show();
    }

    // Новинки товары title hide
    $('.title_new_hide').hide();
    if ($('.status_for_title_new').html() !== undefined){
        $('.title_new_hide').show();
    }

    // Распродажа товары title hide
    $('.title_sale_hide').hide();
    if ($('.status_for_title_sale').html() !== undefined){
        $('.title_sale_hide').show();
    }

    // Акции товары hide
    $('.promation_hide').hide();
    if ($('.status_for_title_promation').html() !== undefined){
        $('.promation_hide').show();
    }

    $('.myactive').css('background-color', 'red');
    $('.myactive > .page').css('color', '#fff');

});