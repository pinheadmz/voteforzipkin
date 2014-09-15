/*!
 * Start Bootstrap - Grayscale Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

$('#form').submit(function(ev) {
    ev.preventDefault(); // to stop the form from submitting

	var info = {};
	$('#form input[type!=checkbox]').each( function(i, v){
		var input = $(this).attr('id');
		var val = $(this).val();
		info[input] = val;	
	});
	$('#form input[type=checkbox]').each( function(i, v){
		var input = $(this).attr('id');
		var val = $(this).prop('checked');
		info[input] = (val ? "YES" : "NO");	
	});

	$.ajax({
  		type: 'post',
  		data: info,
  		url: 'support.php',
  		success: function(res) {
  			if(res == "true") {
  				$('#form').slideUp();
				$("#success").slideDown();
				$("#validation").slideUp();
  			} else {
  				$("#validation").slideDown();
				$("#name, #email").addClass("formError");
  			}
  		}
  	});


});
