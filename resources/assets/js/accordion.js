    // ==================================================
    // Component: Accordion
    // ==================================================

    $('.uis-accordion > li').on('click', function(){
        if($(this).children('.uis-accordion-content').hasClass('uis-open')){
            $(this).children('.uis-accordion-content').slideToggle().removeClass('uis-open');
            $(this).find('a > i').removeClass('accordion-icon-rotate');
        }else{
            $(this).children('.uis-accordion-content').slideToggle().addClass('uis-open');
            $(this).find('a > i').addClass('accordion-icon-rotate');
        }
    });