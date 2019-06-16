var offset = 1;

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
    offset= offset ++;
    jQuery('.alasuite').append(response);
    }
    );
    }
    }); 