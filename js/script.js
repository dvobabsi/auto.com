$(document).ready(function() {
    $('.faq_spoiler_title').click(function(event) {
        if($('.faq_spoiler_block').hasClass('one')) {
            $('.faq_spoiler_title').not($(this)).removeClass('active');
            $('.faq_spoiler_text').not($(this).next()).slideUp(300);
        }
        $(this).toggleClass('active').next().slideToggle(300);
    });
});