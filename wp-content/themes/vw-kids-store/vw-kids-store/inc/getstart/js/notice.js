jQuery(document).ready(function($){
	
    $(document).on('click', '#vw-kids-store-welcome-notice .notice-dismiss', function(){

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'vw_kids_store_dismiss_notice'
            }
        });

    });

});