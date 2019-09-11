    // ==================================================
    // Component: Offcanvas
    // ==================================================



    /**
     * Open Offcanvas
     */

    // On click
    $('[uis-offcanvas]').on('click', function() {
        offCanvas($(this).attr("uis-offcanvas"));
    });

    // On Load
    this.offcanvas = (function(data){
        offCanvas(data);
    });


    /**
     * Close Offcanvas
     */

    // Stop any event when user clicks inside of the offcanvas
    $('.uis-offcanvas-bar').on('click', function(e){
        e.stopPropagation();
    });

    //close element
    $('.uis-offcanvas').on('click', function(e){
        if($('.uis-offcanvas-overlay').hasClass('uis-open')){
            offCanvas('close');
            $('.uis-floating-button').fadeIn();
        }
    });



    
    /**
     * Dynamic toggle of `Off-canvas`
     * @param array[0] action (open, close)
     * @param array[1] unique id
     */
    function offCanvas(data){
        var value = data.replace(/ /g,"").split(":");      

        if(value[0] == 'open'){
            $('.uis-floating-button').fadeOut();
            // check if it's flip or not
			if($(value[1]).hasClass('uis-offcanvas-flip')){
				$('body').addClass('uis-offcanvas-container uis-offcanvas-overlay uis-offcanvas-flip');
			}else{
				$('body').addClass('uis-offcanvas-container uis-offcanvas-overlay');
            }
            
			
			$(value[1]).css('display', 'block'); // show black background overlay
			
	
			setTimeout(function(){
                $(value[1]).addClass('uis-open');
                $('.uis-offcanvas-content').addClass('uis-offcanvas-content-animation');
            }, 200);
            
            setTimeout(function(){
                $('body').css('overflow', 'hidden'); // remove scrollbar when off-canvas appear
            });
        }
        else if(value[0] == 'close'){
            $('.uis-floating-button').fadeIn();
            if($('.uis-offcanvas-overlay').hasClass('uis-open')){

				// close the offcanvas
                $('.uis-offcanvas').removeClass('uis-open');
                	
				
				// remove the left space in content
				setTimeout(function(){
					$('.uis-offcanvas-content').removeClass('uis-offcanvas-content-animation');
					$('body').css('overflow', ''); // remove scrollbar when off-canvas appear
				});

				// clean the temporary class added
				setTimeout(function(){
					if($('.uis-offcanvas').hasClass('uis-offcanvas-flip')){
						$('body').removeClass('uis-offcanvas-container uis-offcanvas-overlay uis-offcanvas-flip');
					}else{
						$('body').removeClass('uis-offcanvas-container uis-offcanvas-overlay');
					}
					$('.uis-offcanvas').css('display', ''); // show black background overlay
				}, 200);		
			}
        }
    };

