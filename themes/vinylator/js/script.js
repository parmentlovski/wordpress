// SCROLL POST 

// fonction action

jQuery.post(
    ajaxurl,
    {
        'action': 'mon_action'
        // 'param': 'coucou'
    },

    function (response) {
        // console.log(response);
        jQuery('.somewhere').append(response);
    }
);

// fonction load_more

var offset = 3;

jQuery(window).scroll(function () {
    console.log('aaaaa');
    console.log(jQuery(document).height());
    console.log(jQuery(window).height())
console.log('WINDOWS SCROLL TOP --> '+jQuery(window).scrollTop());
console.log('DOCUMENT HEIGHT --> '+ (jQuery(document).height() - jQuery(window).height())); 
    
if (jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()) {
        jQuery.post(
            ajaxurl,
            {
                'action': 'load_more',
                'offset': offset
            },

            function (response) {
                offset = offset + 1;
                jQuery('.alasuite').append(response);
                // console.log(response);
            }
        );
    }
});

// SCROLL ALBUM

jQuery.post(
    ajaxurl,
    {
        'action': 'mon_action_album',
        // 'param': 'coucou'
    },

    function (response) {
        jQuery('.somewhere-album').append(response);
    }
);

// fonction load_more

var offsetAlbum = 9;

jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()) {
        console.log('OUAI');

        jQuery.post(
            ajaxurl,
            {
                'action': 'load_more_album',
                'offset': offsetAlbum
            },

            function (response) {
                offsetAlbum = offsetAlbum + 3;
                jQuery('.alasuite-album').append(response);
                // console.log(response);
            }
        );
    }
});


    
