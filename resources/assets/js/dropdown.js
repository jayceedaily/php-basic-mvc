    // ==================================================
    // Name:                Dropdown
    // Description:         Scripts for dropdown
    //
    // Component:           `[uis-dropdown-*]`
    //
    // Modifiers:           `[uis-dropdown-click]`
    //                      `[uis-dropdown-hover]`
    //
    // States:              `.uis-active`
    // ==================================================

    //  ==================================================
    //  Variables
    //  ==================================================

    var dropdownHoverAttr   =   "[uis-dropdown-hover]",
        dropdown            =   ".uis-dropdown",
        currentOpen         =   "",
        dropdownArea        =   ".uis-dropdown-area";

    
    /* Style modifiers
   ================================================== */
    $('.uis-navbar-nav > li').mouseenter(function(){
        $(this).children('.uis-navbar-dropdown')
                .addClass('uis-open');
    }).mouseleave(function(){
        $(this).children('.uis-navbar-dropdown')
                .removeClass('uis-open');
    });


    
    // On Click Dropdown
    $('[uis-dropdown-click ]').on('click', function(){
        if($(this).hasClass('uis-open')){
            closeDropdown(this);
        }else{
            openDropdown(this);
        }
    });

    // On Click Dropdown
    $(document).on('mouseenter', dropdownHoverAttr, function(){
        openDropdown(this);
        currentOpen = this;
    })
    $(document).on('mouseleave', dropdownArea, function(){
        closeDropdown(currentOpen);
    });

    function openDropdown(data){
        $(data).addClass('uis-open');
        $(data).siblings('.uis-dropdown').addClass('uis-open');
    };

    function closeDropdown(data){
        $(data).removeClass('uis-open');
        $(data).siblings('.uis-dropdown').removeClass('uis-open');
    }