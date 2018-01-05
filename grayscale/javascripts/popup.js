$(function() {
    //----- OPEN
    $('[data-popup-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
		
        e.preventDefault();
    });
 
    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
 
        e.preventDefault();
    });
});

$(document).mouseup(function (e)
{
    var container = $(".popup");
	var container1=$(".popup-inner");

    if (!container1.is(e.target) // if the target of the click isn't the container...
        && container1.has(e.target).length === 0)// ... nor a descendant of the container
    {
        container.fadeOut();
    }
})