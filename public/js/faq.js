$(document).ready(function() {

    $('.questionFaq').click(function(){
        var parent = $(this).closest('.questionFaq');
        if(parent.hasClass('active')){
            parent.children('.iconFaq').children('.fa-solid').removeClass('fa-minus');
            parent.children('.iconFaq').children('.fa-solid').addClass('fa-plus');
            parent.children('.faqContent').children('.answerFaq').slideUp("slow");
            parent.removeClass('active');
        }
        else{
            parent.children('.iconFaq').children('.fa-solid').removeClass('fa-plus');
            parent.children('.iconFaq').children('.fa-solid').addClass('fa-minus');
            parent.children('.faqContent').children('.answerFaq').slideDown("slow");
            parent.addClass('active');
        }
    });


});


