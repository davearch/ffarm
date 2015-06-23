<?php
/*
 * Bhinneka functions
 */

/*-----------------------------------------------------------------------------------*/
/*	Register scripts
/*-----------------------------------------------------------------------------------*/
function bnk_reg_script() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2');
		wp_register_script('fittext', get_template_directory_uri() . '/js/jquery.fittext.js', 'jquery');
		wp_register_script('mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', 'jquery');
		wp_register_script('superfish', get_template_directory_uri() . '/js/superfish-compile.js', 'jquery');
		wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.min.js', 'jquery');
		wp_register_script('jqvalid', get_template_directory_uri() . '/js/jquery.validate.min.js', 'jquery');
		wp_register_script('colorbox', get_template_directory_uri() . '/js/jquery.colorbox-min.js', 'jquery');
		wp_register_script('tooltip', get_template_directory_uri() . '/js/jquery.tipTip.minified.js', 'jquery');
		wp_register_script('jqueryui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', 'jquery');


		wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery');
		wp_register_script('addthis', 'http://s7.addthis.com/js/250/addthis_widget.js', '', '', true);
		wp_register_script('custom', get_template_directory_uri() . '/js/p2-init.js', 'jquery', '', true);

		//IE only
		wp_register_script('selectivizr', get_template_directory_uri() . '/js/selectivizr-min.js', 'jquery');

		//Home only
		wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', 'jquery');

		//All
		wp_enqueue_script('jquery');
		wp_enqueue_script('fittext');
		wp_enqueue_script('mobilemenu');
		wp_enqueue_script('superfish');
		wp_enqueue_script('colorbox');
		wp_enqueue_script('tooltip');
		wp_enqueue_script('jqueryui');
		wp_enqueue_script('flexslider');

		wp_enqueue_script('custom');
	}
}
add_action('init', 'bnk_reg_script');

// IE scripts
function bnk_ie() {
	global $is_IE;
	if($is_IE) {
		wp_enqueue_script('selectivizr'); //CSS3 pseudo-classes and attribute selectors in IE.
		wp_enqueue_script('modernizr');
	}
}
add_action('wp_print_scripts', 'bnk_ie');

// Flexslider scripts
function bnk_flexslider_script() {
	if ( is_page_template('template-home.php') || is_single() ) {
 	wp_enqueue_script('flexslider'); }
}
add_action('wp_print_scripts', 'bnk_flexslider_script');

// Addthis scripts
function bnk_addthis_script() {
	//if (is_single() && ( $smof_data['bnk_addthis_bar'] = 1 )) {
	if (is_single()  ) {
	wp_enqueue_script('addthis');
	}
}
add_action('wp_print_scripts', 'bnk_addthis_script');

// Contact page scripts for validation
function bnk_contact_script() {
	if (is_page_template('template-contact.php')) {
		wp_enqueue_script('jqvalid'); }
}
add_action('wp_print_scripts', 'bnk_contact_script');
function bnk_contact_validate() {
	if (is_page_template('template-contact.php')) { ?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("#contacform").validate();
			});
		</script>
	<?php }
}
add_action('wp_head', 'bnk_contact_validate');

// Comment scripts for the threaded comment reply functionality.
function bnk_comment_script() {
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' ); }
}
add_action('wp_print_scripts', 'bnk_comment_script');


/*-----------------------------------------------------------------------------------*/
/*	Browser detection
/*-----------------------------------------------------------------------------------*/
add_filter('body_class','bnk_browser_class');
function bnk_browser_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}


/*-----------------------------------------------------------------------------------*/
/*	Set content width
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) )
	$content_width = 640;
add_action( 'after_setup_theme', 'bnk_setup' );


/*-----------------------------------------------------------------------------------*/
/*	Initial setup
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'bnk_setup' ) ):
function bnk_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Add Thumbnails
	add_theme_support( 'post-thumbnails' );
	add_action( 'init', 'bnk_register_img_sizes' );
	function bnk_register_img_sizes() {
		add_image_size( 'post-image-home', 640, 250, true ); 	//Home Page post thumbnail.
		add_image_size( 'post-image', 640, 250, true ); 		//Regular post thumbnail.
		add_image_size( 'single-image', 640, 9999 ); 			//Single page thumbnail.
		add_image_size( 'landing-image', 640, 200, true ); 		//Page thumbnail.
		add_image_size( 'slide-image', 960, 390, true ); 		//Home page slide image.
		add_image_size( 'profile-thumbnail', 60, 60, true ); 	//Profile image.
		add_image_size( 'large-thumbnail', 680, 453, true ); 	//Profile image.
		add_image_size( 'profile-thumbnail-single', 380, 999 ); //Profile image.
		add_image_size( 'small-thumbnail', 50, 50, true ); 		//Latest posts widget thumbnail.
		add_image_size( 'gallery-thumbnail-m', 345, 230, true ); //Gallery page thumbnail.
		add_image_size( 'gallery-thumbnail-l', 440, 293, true ); //Gallery page thumbnail.
		add_image_size( 'gallery-single-image', 640, 426, true ); //Gallery single page thumbnail.
		add_image_size( 'landing-page-image', 940, 99999 ); 	//Landing page header.
		add_image_size( 'landing-mod-thumbnail', 85, 85, true );  //Landing page thumbnail.
	}

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Add excerpts to Pages.
	add_post_type_support( 'page', 'excerpt' );

	// Available for translation
	load_theme_textdomain( 'bhinneka', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	//Register Wordpress 3.0+ Menus
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'bhinneka' ),
		'secondary' => __( 'Secondary Navigation', 'bhinneka' ),
		'ctanav' => __( 'Call to Action Navigation', 'bhinneka' ),
	) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'quote' ) );

}
endif;


/*-----------------------------------------------------------------------------------*/
/* WP Title
/*-----------------------------------------------------------------------------------*/
function bnk_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'bhinneka' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'bhinneka' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'bhinneka' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'bnk_filter_wp_title', 10, 2 );


/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/
function bnk_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'bnk_page_menu_args' );


/*-----------------------------------------------------------------------------------*/
/*	Change Default Excerpt Length
/*-----------------------------------------------------------------------------------*/
function bnk_excerpt_length( $length ) {
	return 64;
}
add_filter( 'excerpt_length', 'bnk_excerpt_length' );


/*-----------------------------------------------------------------------------------*/
/* Returns a "Read More" link for excerpts
/*-----------------------------------------------------------------------------------*/
function bnk_continue_reading_link() {
	global $smof_data;
	if ( $smof_data['bnk_more_link'] != "" ) {
	return '<br/><a class="cta" href="'. get_permalink() . '">'. $smof_data['bnk_more_link'] .'</a>';
	}
	else {
	return '<p><a class="cta" href="'. get_permalink() . '">'.  __( 'Read More &raquo;', 'bhinneka' ) .'</a></p>';
	}
}


/*-----------------------------------------------------------------------------------*/
/* Replaces "[...]" with an ellipsis and bnk_continue_reading_link().
/*-----------------------------------------------------------------------------------*/
function bnk_auto_excerpt_more( $more ) {
	/*if ( is_front_page() ) {
	return bnk_continue_reading_button();
	}
	else {
	return ' &hellip;' . bnk_continue_reading_link();
	}*/

		return bnk_continue_reading_link();

}
add_filter( 'excerpt_more', 'bnk_auto_excerpt_more' );


/*-----------------------------------------------------------------------------------*/
/* Add a pretty "Continue Reading" link to custom post excerpts.
/*-----------------------------------------------------------------------------------*/
function bnk_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= bnk_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'bnk_custom_excerpt_more' );


/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/* Galleries are styled by the theme in style.css.
/*-----------------------------------------------------------------------------------*/
function bnk_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'bnk_remove_gallery_css' );


/*-----------------------------------------------------------------------------------*/
/* Template for comments and pingbacks.
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'bnk_comment' ) ) :
function bnk_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'bhinneka' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'bhinneka' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 40;
						echo get_avatar( $comment, $avatar_size );
					?>
					<div class="author-meta">
					<?php
						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s %2$s', 'bhinneka' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'bhinneka' ), get_comment_date(), get_comment_time() )
							)
						);
					?>
                    </div>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bhinneka' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'bhinneka' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for bnk_comment()


/*-----------------------------------------------------------------------------------*/
/*	Register Sidebars
/*-----------------------------------------------------------------------------------*/
function bnk_widgets_init() {
	// Primary Sidebar
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'bhinneka' ),
		'id' => 'sidebar-main',
		'description' => __( 'The primary sidebar widget area', 'bhinneka' ),
		'before_widget' => '<aside id="%1$s" class="bnk-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title replace inset-light">',
		'after_title' => '</h3>',
	) );

	// Secondary Sidebar - (template-secondary-sidebar.php)
	register_sidebar( array(
		'name' => __( 'Secondary Sidebar', 'bhinneka' ),
		'id' => 'sidebar-secondary',
		'description' => __( 'The secondary sidebar widget area', 'bhinneka' ),
		'before_widget' => '<aside id="%1$s" class="bnk-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title replace inset-light">',
		'before_title' => '<h3 class="widget-title replace inset-light">',
		'after_title' => '</h3>',
	) );

	// Footer - Col 1. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer', 'bhinneka' ),
		'id' => 'first-footer-widget',
		'description' => __( 'The first footer widget area', 'bhinneka' ),
		'before_widget' => '<aside id="%1$s" class="bnk-footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title replace inset-light">',
		'after_title' => '</h4>',

	) );

	// Footer - Col 2. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer', 'bhinneka' ),
		'id' => 'second-footer-widget',
		'description' => __( 'The second footer widget area', 'bhinneka' ),
		'before_widget' => '<aside id="%1$s" class="bnk-footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title replace inset-light">',
		'after_title' => '</h4>',
	) );

	// Footer - Col 3. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer', 'bhinneka' ),
		'id' => 'third-footer-widget',
		'description' => __( 'The third footer widget area', 'bhinneka' ),
		'before_widget' => '<aside id="%1$s" class="bnk-footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title replace inset-light">',
		'after_title' => '</h4>',
	) );

	// Footer - Col 4. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer', 'bhinneka' ),
		'id' => 'fourth-footer-widget',
		'description' => __( 'The fourth footer widget area', 'bhinneka' ),
		'before_widget' => '<aside id="%1$s" class="bnk-footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title replace inset-light">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'bnk_widgets_init' );


/*-----------------------------------------------------------------------------------*/
/* Removes the default styles that are packaged with the Recent Comments widget.
/*-----------------------------------------------------------------------------------*/
function bnk_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'bnk_remove_recent_comments_style' );


/*-----------------------------------------------------------------------------------*/
/* Removes width and heigh attribut from images
/*-----------------------------------------------------------------------------------*/
function bnk_remove_imgattr($string){
	return preg_replace('/\<(.*?)(width="(.*?)")(.*?)(height="(.*?)")(.*?)\>/i', '<$1$4$7>',$string);
}


/*-----------------------------------------------------------------------------------*/
/*	Admin Footer
/*-----------------------------------------------------------------------------------*/
function bnk_admin_footer_text( $default_text) {
    echo 'Bhinneka theme by <a href="http://themeforest.net/user/population2?ref=population2">Population2</a> | Powered by <a href="http://www.wordpress.org">WordPress</a>. <a href="http://codex.wordpress.org/">Documentation</a>'  ;
}
add_filter('admin_footer_text', 'bnk_admin_footer_text');


/*-----------------------------------------------------------------------------------*/
/*	Custom WP Admin Login Logo
/*-----------------------------------------------------------------------------------*/
function bnk_custom_login_logo() {
	global $smof_data;
	if ( $smof_data['bnk_custom_login'] )   {
	echo '<style type="text/css">h1 a { background-image:url('.$smof_data['bnk_custom_login'].') !important; } </style>'; }
}

add_action('login_head', 'bnk_custom_login_logo');


/*-----------------------------------------------------------------------------------*/
/*	Widgets & Shortcodes
/*-----------------------------------------------------------------------------------*/
//Widgets
include("functions/widget-video.php");
include("functions/twitter/widget-twitter.php");
include("functions/widget-testimonial.php");
include("functions/widget-map.php");
include("functions/widget-latest-post.php");
include("functions/widget-popular.php");
include("functions/widget-single-post.php");
include("functions/widget-newsletter.php");
include("functions/widget-donation.php");
//Shortcode
include("functions/tinymce/tinymce.php");
include("functions/shortcodes.php");
//Custom Post Types
include("functions/testimonial-fields.php");
include("functions/slide-fields.php");
include("functions/gallery-fields.php");
include("functions/post-types.php");

require_once TEMPLATEPATH . '/common-functions.php';


/*-----------------------------------------------------------------------------------*/
// Options Framework
/*-----------------------------------------------------------------------------------*/

/**
 * Slightly Modified Options Framework
 */
require_once ('admin/index.php');


?>