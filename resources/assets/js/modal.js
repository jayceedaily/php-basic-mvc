    // ==================================================
    // Component: Modal
    // ==================================================

    $('[uis-modal]').on('click', function(){
        modal($(this).attr("uis-modal"));
    });

    this.modal = function(data){
        modal(data);
    };

    $('.uis-modal-dialog').on('click', function(e){
        e.stopPropagation();
    });

    $('.uis-modal').on('click', function(){
        var currentID = $('.uis-modal').attr('id');
        modal('close: #' + currentID);
    });

    /**
     * Dynamic toggle of `Off-canvas`
     * @param array[0] action (open, close)
     * @param array[1] unique id
     */

    function modal(data){
        console.log(data);
        var value = data.replace(/ /g, "").split(":");

        if(value[0] == 'open'){
            $(value[1]).css('display', 'flex');
            setTimeout(function(){
                $(value[1]).addClass('uis-open');
            }, 50);
        }else if(value[0] == 'close'){
            $(value[1]).removeClass('uis-open');
            setTimeout(function(){
                $(value[1]).css('display', '');
            }, 300);
        }
    }