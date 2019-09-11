    // ==================================================
    // Component: Notification
    // ==================================================
    this.notification = function(data){
        $(document).on('click', '[uis-close]', function(){
            $(this).parent().fadeOut();
		});
		
		$icon = "";
		if(data.type == 'success'){
			$icon = "check";
		}else if(data.type == 'warning'){
			$icon = "exclamation";
		}else if(data.type == 'danger'){
			$icon = "close";
		}

        if($('body').find('div.uis-notification').length !== 0){
            $notification_container = $("<div class='uis-notification-message uis-notification-with-icon uis-notification-message-"+ data.type +"'>");
            
            // Side Icon
			$notification_icon_container = $("<div class='uis-notification-icon'>");
            $notification_icon = $("<i class='li li-circle-"+ $icon +"'>");

            // Content
            $notification_content = $("<div class='uis-notification-content'>");
            $notification_content.text(data.message);
    
            $notification_button_close = $("<button class='uis-close uis-close-inverse-color uis-notification-close uis-notification-button-close' uis-close>")
            $notification_button_close_icon = $("<i class='li li-close'>")


            $notification_icon_container.append($notification_icon);

            $notification_button_close.append($notification_button_close_icon)

            $notification_container.append($notification_icon_container);
            $notification_container.append($notification_content);
            $notification_container.append($notification_button_close);

            $uis_container.append($notification_container);
    
            $('div.uis-notification').prepend($notification_container);

            assignTimeOut($notification_container);
    
        }else{
            $uis_container = $("<div class='uis-notification uis-notification-top-center uis-open' />");

			$notification_container = $("<div class='uis-notification-message uis-notification-with-icon uis-notification-message-"+ data.type +"'>");
			console.log($notification_container);
            
            // Side Icon
            $notification_icon_container = $("<div class='uis-notification-icon'>");
            $notification_icon = $("<i class='li li-circle-"+ $icon +"'>");

            // Content
            $notification_content = $("<div class='uis-notification-content'>");
            $notification_content.text(data.message);
    
            $notification_button_close = $("<button class='uis-close uis-close-inverse-color uis-notification-close uis-notification-button-close' uis-close>")
            $notification_button_close_icon = $("<i class='li li-close'>")


            $notification_icon_container.append($notification_icon);

            $notification_button_close.append($notification_button_close_icon)

            $notification_container.append($notification_icon_container);
            $notification_container.append($notification_content);
            $notification_container.append($notification_button_close);

            $uis_container.append($notification_container);
            
            $('body').prepend($uis_container);


            assignTimeOut($notification_container);
        }

        function assignTimeOut(notification){
            setTimeout(function(){
                notification.fadeOut();
            }, 3000);
        };
    };