jQuery(document).ready(function($){

    $(document).on('click', '#vw-kids-welcome-notice .notice-dismiss', function(){

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'vw_kids_dismiss_notice'
            }
        });

    });

});