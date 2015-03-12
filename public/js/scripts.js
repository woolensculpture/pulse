// Drop down menu functionality
$(document).ready(function() {

    $('#nav li').hover(
        function () {
            //show its submenu
			$(this).addClass('selected');
            $('ul', this).slideDown(100);

        },
        function () {
            //hide its submenu
            $('ul', this).slideUp(100);
			$(this).removeClass('selected');
       	}
	);

	$('#player_popup a').click(function() {
		$('#player_popup').fadeOut('normal');
	});
	
	$("#player_link[rel]").overlay();

});