$(document).ready(function() {
    $(document).on("popoverShow", function(event, element){
        if (element.attr('data-type') != 'FacebookLikeButton') {
            return;
        }
        
        $('#rk-facebook-editor-tabs').tab('show');
        
        $('.al_editor_save').unbind().click(function()
        {
            var data = $('#al_like_form').serialize() + '&' + $('#al_graph_form').serialize();
            $(document).EditBlock('Content', data, null, function(){
                $('body').find('.fb-like').each(function(){
                    try {
                        FB.XFBML.parse();
                    } catch(e){
                        // // prevents an error when facebook is not available, i.e. when working offline
                    }    
                });
            });

            return false;
        });
    });
});