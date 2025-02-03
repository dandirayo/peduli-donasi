$(document).ready(function() {
    $('.addImage').click(function() {
        $(this).parent('.imageContainer').children('.inputImage').click();
    });

    $('.editImage').click(function(){
        $(this).closest('.imageContainer').children('.inputImage').prop('disabled', false);
        $(this).parent('.imageContainer').children('.inputImage').click();
    });

    $('.removeImage').click(function(e) {
        $(this).closest('.imageContainer').children('.inputImage').prop('disabled', true);
        e.preventDefault(); // prevent default action of link
        $(this).closest('.imageContainer').children('.addImage').children('.imageHover').css('display','none');
        $(this).closest('.imageContainer').children('.addImage').unbind('mouseenter mouseleave');
        $(this).closest('.imageContainer').children('.addImage').children('.overlay').children('.newImage').attr('src', null); //clear image src
        $(this).closest('.imageContainer').children('.inputImage').val(null); // clear image input value
    });
});





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
    $(t).parent('.imageContainer').children('.addImage').mouseenter(function() {
        $(t).parent('.imageContainer').children('.addImage').children('.imageHover').css('display','flex');
    });

    $(t).parent('.imageContainer').children('.addImage').mouseleave(function() {
        $(t).parent('.imageContainer').children('.addImage').children('.imageHover').hide();
    });
}






