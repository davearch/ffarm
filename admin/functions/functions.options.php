<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		$shortname = "bnk";

		//Access the WordPress Categories via an Array
		$of_categories = array();
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp = array_unshift($of_categories, "Select a category:");


		// Pull all the pages into an array (Custom)
		$options_pages = array();
		$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
		$options_pages[''] = 'Select a page:';
		foreach ($options_pages_obj as $page) {
			$options_pages[$page->ID] = $page->post_title;
		}


		//Testing
		$of_options_select = array("one","two","three","four","five");
		$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");

		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		(
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			),
			"enabled" => array (
				"placebo" => "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);

		//Homepage Mod
		$of_options_homepage_mods = array
		(
			"disabled" => array (
				"placebo" 			=> "placebo", //REQUIRED!
				"post_mod_2"		=> "Posts 3 Col"
			),
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"cta_mod"		=> "Call to Actions",
				"intro_mod"		=> "Intro",
				"post_mod"		=> "Posts 2 Col",
				"profile_mod"	=> "Profiles",
				"donation_mod"	=> "Donation"
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();

		if ( is_dir($alt_stylesheet_path) )
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) )
		    {
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false )
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }
		    }
		}


		//Background Images Reader
		$bg_images_path = STYLESHEETPATH. '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_bloginfo('template_url').'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();

		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) {
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }
		    }
		}

		//Theme image path
		$imagepath =  get_template_directory_uri() . '/admin/images/';


		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/

		//More Options
		$uploads_arr = wp_upload_dir();
		$all_uploads_path = $uploads_arr['path'];
		$all_uploads = get_option('of_uploads');
		$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center");

		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post");




/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


/*====== GENERAL =====*/

$of_options[] = array( "name" => __('General','bhinneka'),
					"type" => "heading");

$of_options[] = array( "name" => __('FeedBurner URL','bhinneka'),
					"desc" => __('Enter FeedBurner URL e.g. http://feeds.feedburner.com/YOUR_FEED_URL','bhinneka'),
					"id" => $shortname."_feedburner",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __('Contact form email','bhinneka'),
					"desc" => __('E-mail address where messages from contact form will be sent','bhinneka'),
					"id" => $shortname."_email",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __('Addthis','bhinneka'),
					"desc" => __('Display Addthis in Single Posts.','bhinneka'),
					"id" => $shortname."_addthis_bar",
					"std" => 0,
					"type" => "checkbox");

$of_options[] = array( "name" => __('Sub-pages navigation','bhinneka'),
					"desc" => __('Display sub-pages navigation.','bhinneka'),
					"id" => $shortname."_subpages_nav",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => __('Footer text','bhinneka'),
					"desc" => __('Copyright note in the footer','bhinneka'),
					"id" => $shortname."_credit",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __('Scroll to top','bhinneka'),
					"desc" => __('Display Scroll to Top button in Footer','bhinneka'),
					"id" => $shortname."_totop",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => __('Tracking code','bhinneka'),
					"desc" => __('Enter the tracking code, e.g., Google Analytics, with the &lt;script&gt; tag.','bhinneka'),
					"id" =>  $shortname."_ga_code",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __('Custom read more text','bhinneka'),
					"desc" => __('Replace Read More with custom text.','bhinneka'),
					"id" => $shortname."_more_link",
					"std" => "",
					"type" => "text");


/*====== Appearance =====*/

$of_options[] = array( "name" => __('Appearance','bhinneka'),
					"type" => "heading");

$of_options[] = array( "name" => __('Color scheme','bhinneka'),
					"desc" =>  __('Select color scheme','bhinneka'),
					"id" => $shortname."_stylesheet",
					"std" => "",
					"type" => "select",
					"options" => array( "style-default.css","style-clean.css","style-vibrant.css"
						)
					);

$of_options[] = array( "name" => __('Header background image','bhinneka'),
					"desc" => __('Upload the header background image','bhinneka'),
					"id" => $shortname."_bg_image",
					"type" => "media");

$of_options[] = array( "name" => __('Background image','bhinneka'),
					"desc" => __('Upload the body background image','bhinneka'),
					"id" => $shortname."_body_bg_image",
					"type" => "media");

$of_options[] = array( "name" => __('Footer background color','bhinneka'),
					"desc" => __('Select the color of footer background. No color selected by default.','bhinneka'),
					"id" => $shortname."_footer_bg_color",
					"type" => "color");

$of_options[] = array( "name" => __('Logo','bhinneka'),
					"desc" => __('Upload custom logo image','bhinneka'),
					"id" => $shortname."_custom_logo",
					"type" => "media");

$of_options[] = array( "name" => __('Login logo','bhinneka'),
					"desc" => __('Upload custom WordPress login image. Max 80px x 80px.','bhinneka'),
					"id" => $shortname."_custom_login",
					"type" => "media");

$of_options[] = array( "name" => __('Custom favicon','bhinneka'),
					"desc" => __('Upload custom favicon image (.ico)','bhinneka'),
					"id" => $shortname."_custom_favicon",
					"type" => "upload");


$of_options[] = array( "name" => __('Custom CSS','bhinneka'),
					"desc" => __('Enter custom CSS style.','bhinneka'),
					"id" =>  $shortname."_custom_css",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __('Body font style','bhinneka'),
					"desc" =>  __('Size and color of body font. Default: 16px #444','bhinneka'),
					"id" => $shortname."_body_type",
					"std" => array('size' => '16px','color' => '#444'),
					"type" => "typography");

$of_options[] = array( "name" => __('Main heading color','bhinneka'),
					"desc" => __('Select the color of headings in the Main page. No color selected by default.','bhinneka'),
					"id" => $shortname."_main_heading_color",
					"std" => "",
					"type" => "color");

$of_options[] = array( "name" => __('Footer heading color','bhinneka'),
					"desc" => __('Select the color of headings in the footer. No color selected by default.','bhinneka'),
					"id" => $shortname."_footer_heading_color",
					"std" => "",
					"type" => "color");

$of_options[] = array( "name" => __('Page title background color','bhinneka'),
					"desc" => __('Background color of the page title in Pages.','bhinneka'),
					"id" => $shortname."_pagetitle_bg_color",
					"std" => "",
					"type" => "color");

$of_options[] = array( "name" => __('Google Web Fonts','bhinneka'),
					"desc" => __('Insert the font type for the headings, e.g, Dosis, Berkshire Swash, Londrina Solid, etc. <a href="http://goo.gl/v2hiB" taret="_blank">Google Web Fonts</a> will replace the default Font Face.','bhinneka'),
					"id" => $shortname."_google_font",
					"std" => "",
					"type" => "text");


/*====== SLIDER =====*/

$of_options[] = array( "name" => __('Slider','bhinneka'),
					"type" => "heading");

$of_options[] = array( "name" => __('Alternate text','bhinneka'),
					"desc" => __('Display slider alternate text on mobile devices.','bhinneka'),
					"id" => $shortname."_slider_alt_control",
					"std" => 0,
					"folds" => 0,
					"type" => "checkbox");

$of_options[] = array( "name" => __('Slider text','bhinneka'),
					"desc" => __('This text will replace the slider on mobile version when enabled.','bhinneka'),
					"id" => $shortname."_slider_alt",
					"std" => "",
					"fold" => $shortname."_slider_alt_control",
					"type" => "text");

$of_options[] = array( "name" => __('Animation type','bhinneka'),
					"desc" => __('Select the animation type.','bhinneka'),
					"id" => $shortname."_slide_animation",
					"type" => "select",
					"std" => "fade",
					"options" => array(
						'fade' => 'fade',
						'slide' => 'slide')
					);

$of_options[] = array( "name" => __('Slide direction','bhinneka'),
					"desc" => __('Select the sliding direction.','bhinneka'),
					"id" => $shortname."_slide_direction",
					"type" => "select",
					"std" => "horizontal",
					"options" => array(
						'horizontal' => 'horizontal',
						'vertical' => 'vertical')
					);

$of_options[] = array( "name" => __('Slideshow speed','bhinneka'),
					"desc" => __('Set the speed of the slideshow, in milliseconds. Default: 3000.','bhinneka'),
					"id" => $shortname."_slide_speed",
					"class" => 'mini',
					"std" => "3000",
					"type" => "text");

$of_options[] = array( "name" => __('Animation speed','bhinneka'),
					"desc" => __('Set the speed of animations	, in milliseconds. Default: 600.','bhinneka'),
					"id" => $shortname."_slide_animduration",
					"class" => 'mini',
					"std" => "600",
					"type" => "text");

$of_options[] = array( "name" => __('Direction navigation','bhinneka'),
					"desc" => __('Display previous and next navigation','bhinneka'),
					"id" => $shortname."_slide_dirnav",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => __('Control navigation','bhinneka'),
					"desc" => __('Display navigation for each slide','bhinneka'),
					"id" => $shortname."_slide_control",
					"std" => 0,
					"type" => "checkbox");





/*====== HOMEPAGE =====*/

$of_options[] = array( "name" => __('Home Page','bhinneka'),
					"type" => "heading");

$of_options[] = array( "name" => __('Homepage layout manager','bhinneka'),
					"desc" => __('Organize how you want the layout to appear on the homepage','bhinneka'),
					"id" => "homepage_mods",
					"std" => $of_options_homepage_mods,
					"type" => "sorter");



/*====== CTA MOD =====*/

$of_options[] = array( "name" => __('- CTA','bhinneka'),
					"type" => "heading");

$of_options[] = array( "name" => __('Call to Action title','bhinneka'),
					"desc" => __('Section title.','bhinneka'),
					"id" => $shortname."_action_title",
					"std" => '',
					"type" => "text");

$of_options[] = array( "name" => __('Call to Action items','bhinneka'),
					"desc" => __('Amount of Call to Action Navigation items. Set the menu items from Appearance > Menus','bhinneka'),
					"id" => $shortname."_action_items",
					"std" => '4 Items',
					"type" => "select",
					"options" => array( "4 Items","3 Items"),
					);


/*====== INTRO MOD =====*/

$of_options[] = array( "name" => __('- Intro','bhinneka'),
					"type" => "heading");

$of_options[] = array( "name" => __('Intro title','bhinneka'),
					"desc" => __('Section title.','bhinneka'),
					"id" => $shortname."_intro_title",
					"std" => '',
					"type" => "text");

$of_options[] = array( "name" => __('Intro content','bhinneka'),
					"desc" => __('Intro section content.','bhinneka'),
					"id" => $shortname."_intro_content",
					"std" => '',
					"type" => "textarea");

$of_options[] = array( "name" => __('Intro button','bhinneka'),
					"desc" => __('Intro section button text.','bhinneka'),
					"id" => $shortname."_intro_button",
					"std" => '',
					"type" => "text");

$of_options[] = array( "name" => __('Intro page','bhinneka'),
					"desc" => __('Select a page where the button linked to.','bhinneka'),
					"id" => $shortname."_intro_page",
					"std" => 'Select a page:',
					"type" => "selectpage",
					"options" => $options_pages);




/*====== POSTS MOD =====*/

$of_options[] = array( "name" => __('- Posts','bhinneka'),
					"type" => "heading");

$of_options[] = array( "name" => __('Column 1 query','bhinneka'),
					"desc" => __('Enter the query parameter for the first column ,e.g., page_id=7, p=7, etc. <a href="http://goo.gl/7pPJ4" target="_blank">More Info</a>.','bhinneka'),
					"id" => $shortname."_homepage_post_1",
					"std" => '',
					"type" => "text");

$of_options[] = array( "name" => __('Column 2 query','bhinneka'),
					"desc" => __('Enter the query parameter for the second column ,e.g., page_id=7, p=7, etc. <a href="http://goo.gl/7pPJ4" target="_blank">More Info</a>.','bhinneka'),
					"id" => $shortname."_homepage_post_2",
					"std" => '',
					"type" => "text");

$of_options[] = array( "name" => __('Column 3 query','bhinneka'),
					"desc" => __('Enter the query parameter for the first column ,e.g., page_id=7, p=7, etc. <a href="http://goo.gl/7pPJ4" target="_blank">More Info</a>.','bhinneka'),
					"id" => $shortname."_homepage_post_3",
					"std" => '',
					"type" => "text");

/*====== PROFILES MOD =====*/

$of_options[] = array( "name" => __('- Profiles','bhinneka'),
					"type" => "heading");

$of_options[] = array( "name" => __('Profiles title','bhinneka'),
					"desc" => __('Section title.','bhinneka'),
					"id" => $shortname."_profiles_title",
					"std" => '',
					"type" => "text");

/*====== DONATION MOD =====*/

$of_options[] = array( "name" => __('- Donation','bhinneka'),
					"type" => "heading");
$of_options[] = array( "name" => __('Donation mod title','bhinneka'),
					"desc" => __('Section title.','bhinneka'),
					"id" => $shortname."_donation_title",
					"std" => '',
					"type" => "text");
$of_options[] = array( "name" => __('Donation image','bhinneka'),
					"desc" =>  __('Upload image. Max width 290px.','bhinneka'),
					"id" => $shortname."_donation_img",
					"std" => "",
					"type" => "slider");
$of_options[] = array( "name" => __('Donation other','bhinneka'),
					"desc" =>  __('Text below the donation images.','bhinneka'),
					"id" => $shortname."_donation_other",
					"std" => "",
					"type" => "text");
$of_options[] = array( "name" => __('Donation other link','bhinneka'),
					"desc" => __('Select the page where the text linked to.','bhinneka'),
					"id" => $shortname."_donation_other_link",
					"std" => 'Select a page:',
					"type" => "selectpage",
					"options" => $options_pages);

/*====== LANDING PAGE =====*/

$of_options[] = array( "name" => __('Landing Page','bhinneka'),
					"type" => "heading");
$of_options[] = array( "name" => __('Display menu','bhinneka'),
					"desc" => __('Display Landing Page Menu Items','bhinneka'),
					"id" => $shortname."_landing_mod_control",
					"std" => 1,
					"folds" => 1,
					"type" => "checkbox");
$of_options[] = array( "name" => __('Landing page menu items','bhinneka'),
					"desc" =>  __('Menu items. Upload image at 85px x 85px.','bhinneka'),
					"id" => $shortname."_landing_mod",
					"std" => "",
					"fold" => $shortname."_landing_mod_control",
					"type" => "slider");


/*====== BREADCRUMBS =====*/
$of_options[] = array( "name" => __('Breadcrumbs','bhinneka'),
					"type" => "heading");

$of_options[] = array( "name" => __('Breadcrumbs','bhinneka'),
					"desc" => __('Display breadcrumbs.','bhinneka'),
					"id" => $shortname."_breadcrumbs_bar",
					"std" => 1,
					"folds" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => __('Profile page','bhinneka'),
					"desc" => __('Select a page for Profile Root Page.','bhinneka'),
					"id" => $shortname."_profile_page",
					"std" => 'Select a page:',
					"fold" => $shortname."_breadcrumbs_bar",
					"type" => "selectpage",
					"options" => $options_pages);

$of_options[] = array( "name" => __('Testimonial page','bhinneka'),
					"desc" => __('Select a page for Testimonial Root Page.','bhinneka'),
					"id" => $shortname."_testimonial_page",
					"std" => 'Select a page:',
					"fold" => $shortname."_breadcrumbs_bar",
					"type" => "selectpage",
					"options" => $options_pages);

$of_options[] = array( "name" => __('Gallery page','bhinneka'),
					"desc" => __('Select a page for Gallery Root Page.','bhinneka'),
					"id" => $shortname."_gallery_page",
					"std" => 'Select a page:',
					"fold" => $shortname."_breadcrumbs_bar",
					"type" => "selectpage",
					"options" => $options_pages);


/*====== MISC =====*/
$of_options[] = array( "name" => __('Miscellaneous','bhinneka'),
					"type" => "heading");

$of_options[] = array( "name" => __('404 page title','bhinneka'),
					"desc" => __('Page Title of the 404 Error Page.','bhinneka'),
					"id" => $shortname."_custom_404_title",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __('404 Page message','bhinneka'),
					"desc" => __('Content of the 404 Error Page.','bhinneka'),
					"id" => $shortname."_custom_404_msg",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __('Succes message','bhinneka'),
					"desc" => __('Message that will be displayed after success sending a message. Default: "Your message was sent!"','bhinneka'),
					"id" => $shortname."_msg_success",
					"std" => "Your message was sent!",
					"type" => "text");

$of_options[] = array( "name" => __('Fail message','bhinneka'),
					"desc" => __('Message that will be displayed after fail sending a message. Default: "Sorry, an error occured while sending your message."','bhinneka'),
					"id" => $shortname."_msg_fail",
					"std" => "Sorry, an error occured while sending your message.",
					"type" => "text");

$of_options[] = array( "name" => __('Search page title','bhinneka'),
					"desc" => __('Page Title of the Search Page when there is no results.','bhinneka'),
					"id" => $shortname."_custom_search_title",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => __('Search page message','bhinneka'),
					"desc" => __('Content of the Search Page when there is no results.','bhinneka'),
					"id" => $shortname."_custom_search_msg",
					"std" => "",
					"type" => "textarea");


/*====== SOCIAL MEDIA =====*/
$of_options[] = array( "name" => __('Social Media','bhinneka'),
					"type" => "heading");

$of_options[] = array( "name" => __('Social Media URL','bhinneka'),
					"desc" => __('RSS URL.','bhinneka'),
					"id" => $shortname."_sm_rss",
					"std" => "",
					"type" => "text");

$of_options[] = array( "desc" => __('Email address.','bhinneka'),
					"id" => $shortname."_sm_email",
					"std" => "",
					"type" => "text");

$of_options[] = array( "desc" => __('Facebook URL.','bhinneka'),
					"id" => $shortname."_sm_facebook",
					"std" => "",
					"type" => "text");

$of_options[] = array( "desc" => __('Google+ URL.','bhinneka'),
					"id" => $shortname."_sm_gplus",
					"std" => "",
					"type" => "text");

$of_options[] = array( "desc" => __('Flickr URL.','bhinneka'),
					"id" => $shortname."_sm_flickr",
					"std" => "",
					"type" => "text");

$of_options[] = array( "desc" => __('Instagram URL.','bhinneka'),
                    "id" => $shortname."_sm_instagram",
                    "std" => "",
                    "type" => "text");

$of_options[] = array( "desc" => __('Pinterest URL.','bhinneka'),
                    "id" => $shortname."_sm_pinterest",
                    "std" => "",
                    "type" => "text");

$of_options[] = array( "desc" => __('Twitter URL.','bhinneka'),
					"id" => $shortname."_sm_twitter",
					"std" => "",
					"type" => "text");

$of_options[] = array( "desc" => __('Vimeo URL.','bhinneka'),
					"id" => $shortname."_sm_vimeo",
					"std" => "",
					"type" => "text");

$of_options[] = array( "desc" => __('Youtube URL.','bhinneka'),
					"id" => $shortname."_sm_youtube",
					"std" => "",
					"type" => "text");


// Backup Options
$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");

$of_options[] = array( "name" => "Backup and Restore Options",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);

$of_options[] = array( "name" => "Transfer Theme Options Data",
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						',
					);

	}
}
?>
