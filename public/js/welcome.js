$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: 1000,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 1
            },
            800: {
                items: 2,
            },
            1000: {
                items: 3,
                loop: false
            }
        }
    });
});

$('.element').each(function() {
    $(this).mouseover(function() {
        $(this).addClass('active');
        $(this).find(".testimonyText1").css({display: "flex"});
        $(this).find(".testimony1").css({height: "100%"});
        $(this).find(".testimony1").css({display: "flex"});
        $('.stage').children('.element').not('.active').addClass('inactive');
    });
    $(this).mouseleave(function() {
        $(this).removeClass('active');
        $(this).find(".testimonyText1").css({display: "none"});
        $(this).find(".testimony1").css({height: "max-content"});
        $(this).find(".testimony1").css({display: "none"});
        $('.stage').children('.element').not('.active').removeClass('inactive');
    });
});

function searchFromHome(){
    let searchText = $('#searchHomeText').val();
    let url = window.location.href + 'business';
    let modified = '?search=' + searchText;

    if(searchText==""){
        window.location = url;
    }
    else window.location = url + modified;

}
