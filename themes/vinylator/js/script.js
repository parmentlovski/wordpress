console.log('broly');
jQuery.post(
ajaxurl,
{
'action': 'mon_action',
'param': 'coucou'
},
function(response){
console.log(response);
jQuery('.somewhere').append(response);
}
);

var offset =6;
jQuery('body').on('click', '.load-more', function() {

jQuery.post(
ajaxurl,
{
'action': 'load_more',
'offset': offset
},
function(response){
offset= + 1;
jQuery('.alasuite').append(response);
}
);
}); 


