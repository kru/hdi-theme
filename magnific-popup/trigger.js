jQuery(document).ready(function($) {
    $('a[href*="page_id=68"], a[href*="page_id=37"], a[href*="page_id=93"], a[href*="page_id=104"], a[href*="page_id=109"]').each(function(){
        if ($(this).parents('.gallery').length == 0) {
            $(this).magnificPopup({
                type:'ajax',
                closeOnContentClick: true,
                });
            }
        });
    $('.gallery').each(function() {
        $(this).magnificPopup({
            delegate: 'a',
            type: 'ajax',
            gallery: {enabled: true}
            });
        });
    });