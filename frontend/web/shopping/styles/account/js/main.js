const tabs = document.querySelectorAll("[data-target]"),
    tabContents = document.querySelectorAll("[data-content]");

tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
        const target = document.querySelector(tab.dataset.target);

        tabContents.forEach((tc) => {
            tc.classList.remove("is-active");
        });
        target.classList.add("is-active");

        tabs.forEach((t) => {
            t.classList.remove("is-active");
        });
        tab.classList.add("is-active");
    });
});



function openCategoryModal(param){
    $.ajax({
        url: $(param).data('url') + '/create-user-products/categories',
        type: 'GET',
        dataType: 'json',
        success: function (res) {
            if (res.success === true) {
                $('.example-modal-body').html(res.result);
            } else {
                Notnotify('не удалось получить категории, пожалуйста, свяжитесь с администраторами по этому поводу');
                $( ".fadeInDown" ).addClass( 'fadeInDown-error');
            }

        }
    });
    $('#categoryModalParams').modal('show');
}
function accountCategory(param){
    $.ajax({
        url: $(param).data('url') + '/create-user-products/sub-categories',
        type: 'GET',
        data: {id: $(param).data('id')},
        dataType: 'json',
        success: function (res) {
            if (res.image){
                $('#category-card-photo-id').attr("src", $(param).data('image-url') + '/images/categories-images/' + res.image);
                $('#category-card-title-id').html(res.name);
                $('#createuserproducts-category_id').val(res.id);
            }
            if (res.success === true) {
                $('.example-modal-body').html(res.result);
            }else if(res.success === false){
                $('#categoryModalParams').modal('hide');
            } else {
                Notnotify('не удалось получить категории');
                $( ".fadeInDown" ).addClass( 'fadeInDown-error');
            }

        }
    });
}

function closeModal(){
    $('#categoryModalParams').modal('hide');
}

function userProductTabs(param){
    $.ajax({
        url: $(param).data('url') + '/create-user-products/sub-categories',
        type: 'GET',
        data: {id: $(param).data('id')},
        dataType: 'json',
        success: function (res) {
            if (res.success === true) {

            } else {
                Notnotify('не удалось получить продукты');
                $( ".fadeInDown" ).addClass( 'fadeInDown-error');
            }
        }
    });
}