// fonction action 

jQuery.post(
    ajaxurl,
    {
        'action': 'mon_action'
        // 'param': 'coucou'
    },
    
    function(response){
        console.log(response);
        jQuery('.somewhere').append(response);
    }       
);

// fonction load_more

var offset = 9;

jQuery(window).scroll(function() {
    if (jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()){
    console.log('OUAI');

        jQuery.post(
            ajaxurl,
            {
                'action': 'load_more',
                'offset': offset
            },

            function(response){
                offset = offset +3;
                jQuery('.alasuite').append(response);
                // console.log(response);
            }
        );    
    }
}); 