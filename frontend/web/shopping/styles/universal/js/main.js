$(function() {

    window.onload = function() {
        setInterval(function() {
            // Seconds
            var seconds = new Date().getSeconds();
            document.getElementById("seconds").innerHTML = (seconds < 10 ? '0' : '') + seconds;

            // Minutes
            var minutes = new Date().getMinutes();
            document.getElementById("minutes").innerHTML = (minutes < 10 ? '0' : '') + minutes;

            // Hours
            var hours = new Date().getHours();
            document.getElementById("hours").innerHTML = (hours < 10 ? '0' : '') + hours;
        }, 1000);
    }


    // menu mobilne
    $("#menu-mobile-tab").click(function() {
        $(".tab-panel").removeClass('show').removeClass('active');
        $("#menu-mobile").addClass('show').addClass('active');
    });
    $( "#my-account-mobile-tab").click(function() {
        $(".tab-panel").removeClass('show').removeClass( 'active');
        $("#account-mobile").addClass('show').addClass( 'active');
    });
    $( "#setting-mobile-tab").click(function() {
        $(".tab-panel").removeClass( 'show').removeClass( 'active');
        $("#setting-mobile").addClass( 'show').addClass( 'active');
    });


    //slayder menu promation
    $('#recipeCarousel #recipeCarousel1 #recipeCarousel2').carousel({
        interval: 4000
    });
    $('.carousel .carousel-item1').each(function(){
        var minPerSlide = 15;
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));
        for (var i=0;i<minPerSlide;i++) {
            next=next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
        }
    });

});

function closeMobileMenu(param){
    $('.enable-ladyloading').removeClass('show-sidebar-nav');
}
function showMobileMenu(param){
    $('.enable-ladyloading').addClass('show-sidebar-nav');
}
function showMobileMenuButtm(param){
    var classParam = $('.enable-ladyloading');
    if (classParam.hasClass('show-sidebar-nav')){
        classParam.removeClass('show-sidebar-nav');
    }else {
        classParam.addClass('show-sidebar-nav');
    }
}
function menuTab(parma){
    if($(parma).find('.classMenuTab').is(":visible"))
    {
        $('.classMenuTab').hide();
    }else {
        $('.classMenuTab').hide();
        $(parma).find('.classMenuTab').show();
    }
}



function notify(name, image, price, put_image){
    $.notify(
        {
            message: '<div class="card" style="border: none">\n' +
                '    <div class="card-horizontal">\n' +
                '        <div class="img-square-wrapper">\n' +
                '            <img style="max-width: 100px;" src="'+ put_image +'/images/products-images/'+ image +'">\n' +
                '        </div>\n' +
                '        <div class="card-body" >\n' +
                '            <h4 class="card-title alert_title">'+ name + '</h4>\n' +
                '            <p class="card-text alert_price"><strong>'+ price + ' Сум</strong></p>\n' +
                '        </div>\n' +
                '    </div>\n' +
                '</div>',
        },
        {
            type: "light",
            allow_dismiss: true,
            delay: 2000,
            placement: {
                from: "top",
                align: "right"
            },
        }
    );
}
function Notnotify(note){
    $.notify(
        {
            title: 'Ошибка',
            message: note,
            icon: 'bi bi-emoji-frown icon-error'
        },
        {
            type: "danger",
            allow_dismiss: true,
            delay: 2000,
            placement: {
                from: "top",
                align: "right"
            },
        }
    );
}





