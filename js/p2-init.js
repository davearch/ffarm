/*jQuery.noConflict();*/
jQuery(document).ready(function($){

/*-----------------------------------------------------------------------------------*/
/* Tooltip
/*-----------------------------------------------------------------------------------*/
	if($().tipTip) {
		$(".tooltip").tipTip({maxWidth: 'auto', edgeOffset: 10 });
	}

/*-----------------------------------------------------------------------------------*/
/* Fittext
/*-----------------------------------------------------------------------------------*/
	if($().fitText) {
		$(".respond_1").fitText(0.7);
	}

/*-----------------------------------------------------------------------------------*/
/* Superfish
/*-----------------------------------------------------------------------------------*/
	$("ul.sf-menu").supersubs({
		minWidth:    12,   // minimum width of sub-menus in em units
		maxWidth:    45,   // maximum width of sub-menus in em units
		extraWidth:  1     // extra width can ensure lines don't sometimes turn over
						   // due to slight rounding differences and font-family
	}).superfish({

		dropShadows:    false
	});  // call supersubs first, then superfish, so that subs are
					 // not display:none when measuring. Call before initialising
					 // containing tabs for same reason.

/*-----------------------------------------------------------------------------------*/
/* Mobile Menu
/*-----------------------------------------------------------------------------------*/
	$('ul.sf-menu').mobileMenu();

/*-----------------------------------------------------------------------------------*/
/* Remove Image Attributes
/*-----------------------------------------------------------------------------------*/
	$('img').each(function(){
			$(this).removeAttr('width')
			$(this).removeAttr('height');
	});


/*-----------------------------------------------------------------------------------*/
/* Scroll to Top
/*-----------------------------------------------------------------------------------*/
	$("#back-top").hide(); // Hide #back-top first
	$(function () { // fade in #back-top
		$(window).scroll(function () {
			if ($(this).scrollTop() > 150) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
	});

/*-----------------------------------------------------------------------------------*/
/* Clickable Div
/*-----------------------------------------------------------------------------------*/
	$(".clickable, .landing-mod").click(function(){
		window.location=$(this).find("a").attr("href");
		return false;
	});

/*===================================================================================*/
/*	ColorBox
/*===================================================================================*/
	if($().colorbox) {

	$(".video_modal").colorbox({iframe:true, innerWidth:"50%", innerHeight:"50%", opacity:"0.7"});
	$("a[rel='cb-image'], a[rel='cb-thumb'], .cb-single, .cb").colorbox({transition:"fade", opacity:"0.7"});
	};


/*-----------------------------------------------------------------------------------*/
/* Tabs Shortcode
/*-----------------------------------------------------------------------------------*/
	if($().tabs) {
		$(".tabs").tabs({
			fx: { opacity: 'toggle', duration: 100}
		});
	};

/*-----------------------------------------------------------------------------------*/
/* Features Shortcode
/*-----------------------------------------------------------------------------------*/
	if($().tabs) {
		$('.features .nav a').click( function (e) {
			e.preventDefault();
		});
		$(".features").tabs({
			fx: { opacity: 'toggle', duration: 150}
		});
	}

/*-----------------------------------------------------------------------------------*/
/* Accordion Shortcode
/*-----------------------------------------------------------------------------------*/

	//Set default open/close settings
	$('.acc_inner').hide(); //Hide/close all containers
	$('.acc_toggler:first').addClass('active').next().show();

	//On Click
	$('.acc_toggler').click(function(){
		if( $(this).next().is(':hidden') ) {
			$('.acc_toggler').removeClass('active').next().slideUp();
			$(this).toggleClass('active').next().slideDown();
		}
		return false;
	});

/*-----------------------------------------------------------------------------------*/
/* Toggle Shortcode
/*-----------------------------------------------------------------------------------*/

	$(".toggle_inner").hide(); //Hide on load

	$("h4.toggler").click(function(){
	$(this).toggleClass("active").next().slideToggle();
	return false; //Prevent the browser jump to the link anchor
	});

/*-----------------------------------------------------------------------------------*/
/* Gallery hover effect
/*-----------------------------------------------------------------------------------*/

	$('.gallery_module').mouseenter(function(e) {
		$('a span', this).fadeIn(300, "swing");
    }).mouseleave(function(e) {
    	$('a span', this).fadeOut(300);
    });


});