    // ==================================================
    // Component: Toolip
    // ==================================================

    // var currentTooltip = this;
    // On hover
    $('[uis-tooltip]')
    .mouseenter(function(){
        // get the position of element that triggers the tooltip
        var position = $(this).position();
        
        $tooltipContainer = $("<div class='uis-tooltip'>");
        $tooltipContainer.text($(this).attr('uis-tooltip'));

        // current position of element that triggers the tooltip + 30px
        $tooltipContainer.css({"left" : + (position.left - 60) ,"top" : + (position.top - 30)});
        // $tooltipContainer.css({"left" : "0" ,"top" : "0", "-webkit-transform":"translate3d(188.578125px, 125.4375px, 0)"});

        $($tooltipContainer).appendTo("body").fadeIn();
    })
    .mouseleave(function(){
        $('div.uis-tooltip').fadeOut(300, function(){ $(this).remove(); });
    });