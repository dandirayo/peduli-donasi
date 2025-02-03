$(document).ready(function() {
    resizeLeftMenu();
    $('.addImage').click(function() {
        $(this).parent('.imageContainer').children('.inputImage').click();
    });

    $('.editImage').click(function(){
        $(this).closest('.imageContainer').children('.inputImage').prop('disabled', false);
        $(this).parent('.imageContainer').children('.inputImage').click();
    });

    $('.removeImage').click(function(e) {
        e.preventDefault();
        $(this).closest('.imageContainer').children('.inputImage').prop('disabled', true);
        // $(this).closest('.imageContainer').children('.addImage').children('.imageHover').css('display','none');
        // $(this).closest('.imageContainer').children('.addImage').unbind('mouseenter mouseleave');
        $(this).closest('.imageContainer').children('.addImage').children('.overlay').children('.newImage').attr('src', null); //clear image src
        $(this).closest('.imageContainer').children('.inputImage').val(null); // clear image input value

        $(this).closest('.imageContainer').children('.inputImage').prop('disabled', false);
    });

    $('.inputImage').each(function(i, obj) {
        imageOnHover(this);
    });
});

function resizeLeftMenu(){
    //
    // var right = $('.donationContent').position().left + 30;
    // $('.donationMenu').css('right',0);
    // $( window ).resize(function() {
    //     right = $('.donationContent').position().left;
    //      $('.donationMenu').css('right',0);
    // });

    var originalBottom = 30;
    var footerHeight= $('.site-footer').height(); // get this depending on your circumstances
    $(window).scroll(function () { // start to scroll
        // calculating the distance from bottom
        var distanceToBottom = $(document).height() - $(window).height() - $(window).scrollTop();
        if (distanceToBottom <= footerHeight) // when reaching the footer
            $(".donationMenu").css('bottom', (footerHeight - distanceToBottom)*2.3 + 'px');
        else // when distancing from the footer
            $(".donationMenu").css('bottom', originalBottom + 'px'); /// only need to specify 'px' (or other unit) if the number is not 0
    });


}

function changeImage(t){
    if (t.files && t.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            $(t).parent('.imageContainer').children('.addImage').children('.overlay').children('.newImage').attr('src', e.target.result);
        };

        reader.readAsDataURL(t.files[0]);

        $(t).closest('.imageContainer').children('.inputImage').prop('disabled', true);
        imageOnHover(t);
    }
}

function imageOnHover(t){
    // console.log(t);
    $(t).parent('.imageContainer').children('.addImage').mouseenter(function() {
        $(t).parent('.imageContainer').children('.addImage').children('.imageHover').css('display','flex');
    });

    $(t).parent('.imageContainer').children('.addImage').mouseleave(function() {
        $(t).parent('.imageContainer').children('.addImage').children('.imageHover').hide();
    });
}







