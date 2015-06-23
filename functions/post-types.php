<?php

/*-----------------------------------------------------------------------------------*/
/*	Create a new post type called slides
/*-----------------------------------------------------------------------------------*/

function bnk_register_post_type_slides()
{
	$labels = array(
		'name' => __( 'Slides','bhinneka'),
		'singular_name' => __( 'Slide','bhinneka' ),
		'rewrite' => array('slug' => __( 'Slides','bhinneka' )),
		'add_new' => _x('Add New', 'Slide'),
		'add_new_item' => __('Add New Slide','bhinneka'),
		'edit_item' => __('Edit Slide','bhinneka'),
		'new_item' => __('New Slide','bhinneka'),
		'view_item' => __('View Slide','bhinneka'),
		'search_items' => __('Search Slides','bhinneka'),
		'not_found' =>  __('No slides found','bhinneka'),
		'not_found_in_trash' => __('No slides found in Trash','bhinneka'),
		'parent_item_colon' => ''
	  );

	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','thumbnail','custom-fields')
	  );

	  register_post_type(__( 'slide','bhinneka' ),$args);
}


/*-----------------------------------------------------------------------------------*/
/*	Create a new post type called Testimonial
/*-----------------------------------------------------------------------------------*/

function bnk_register_post_type_testimonial()
{
	$labels = array(
		'name' => __( 'Testimonials','bhinneka'),
		'singular_name' => __( 'Testimonial','bhinneka' ),
		'rewrite' => array('slug' => __( 'Testimonials','bhinneka' )),
		'add_new' => _x('Add New', 'Testimonial'),
		'add_new_item' => __('Add New Testimonial','bhinneka'),
		'edit_item' => __('Edit Testimonial','bhinneka'),
		'new_item' => __('New Testimonial','bhinneka'),
		'view_item' => __('View Testimonial','bhinneka'),
		'search_items' => __('Search Testimonials','bhinneka'),
		'not_found' =>  __('No testimonials found','bhinneka'),
		'not_found_in_trash' => __('No testimonials found in Trash','bhinneka'),
		'parent_item_colon' => ''
	  );

	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title', 'custom-fields', 'editor' )
	  );

	  register_post_type(__( 'testimonial','bhinneka' ),$args);
}


/*-----------------------------------------------------------------------------------*/
/*	Create a new post type called gallery
/*-----------------------------------------------------------------------------------*/

function bnk_reg_post_type_gallery()
{
	$labels = array(
		'name' => __( 'Gallery','bhinneka'),
		'singular_name' => __( 'Gallery','bhinneka' ),
		'rewrite' => array('slug' => __( 'gallery','bhinneka' )),
		'add_new' => _x('Add New', 'slide'),
		'add_new_item' => __('Add New Gallery','bhinneka'),
		'edit_item' => __('Edit Gallery','bhinneka'),
		'new_item' => __('New Gallery','bhinneka'),
		'view_item' => __('View Gallery','bhinneka'),
		'search_items' => __('Search Gallery','bhinneka'),
		'not_found' =>  __('No gallery found','bhinneka'),
		'not_found_in_trash' => __('No gallery found in Trash','bhinneka'),
		'parent_item_colon' => ''
	  );

	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','custom-fields','excerpt')
	  );

	  register_post_type(__( 'gallery','bhinneka' ),$args);
}

/*-----------------------------------------------------------------------------------*/
/*	Create a new post type called Profiles
/*-----------------------------------------------------------------------------------*/

function bnk_register_post_type_profile()
{
	$labels = array(
		'name' => __( 'Profiles','bhinneka'),
		'singular_name' => __( 'Profile','bhinneka' ),
		'rewrite' => array('slug' => __( 'Profiles','bhinneka' )),
		'add_new' => _x('Add New', 'Profile'),
		'add_new_item' => __('Add New Profile','bhinneka'),
		'edit_item' => __('Edit Profile','bhinneka'),
		'new_item' => __('New Profile','bhinneka'),
		'view_item' => __('View Profile','bhinneka'),
		'search_items' => __('Search Profiles','bhinneka'),
		'not_found' =>  __('No profiles found','bhinneka'),
		'not_found_in_trash' => __('No profiles found in Trash','bhinneka'),
		'parent_item_colon' => ''
	  );

	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 6,
		'supports' => array('title', 'custom-fields', 'editor','thumbnail','excerpt' )
	  );

	  register_post_type(__( 'profile','bhinneka' ),$args);
}


/*-----------------------------------------------------------------------------------*/
/*	All the pre-made messages for the slide post type
/*-----------------------------------------------------------------------------------*/

function bnk_slide_updated_messages( $messages ) {
global $post;

  $messages[__( 'slide' )] =
  	array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Slide updated. <a href="%s">View slide</a>'), esc_url( get_permalink() ) ),
		2 => __('Custom field updated.','bhinneka'),
		3 => __('Custom field deleted.','bhinneka'),
		4 => __('Slide updated.','bhinneka'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Slide restored to revision from %s','bhinneka'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Slide published. <a href="%s">View slide</a>'), esc_url( get_permalink() ) ),
		7 => __('Slide saved.','bhinneka'),
		8 => sprintf( __('Slide submitted. <a target="_blank" href="%s">Preview slide</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink() ) ) ),
		9 => sprintf( __('Slide scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview slide</a>'),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i','bhinneka' ), strtotime( $post->post_date ) ), esc_url( get_permalink() ) ),
		10 => sprintf( __('Slide draft updated. <a target="_blank" href="%s">Preview slide</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink() ) ) ),
  );

  return $messages;

}

/*-----------------------------------------------------------------------------------*/
/*	All the pre-made messages for the testimonial post type
/*-----------------------------------------------------------------------------------*/

function bnk_testimonial_updated_messages( $messages ) {
global $post;

  $messages[__( 'testimonial' )] =
  	array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Testimonial updated. <a href="%s">View testimonial</a>'), esc_url( get_permalink() ) ),
		2 => __('Custom field updated.','bhinneka'),
		3 => __('Custom field deleted.','bhinneka'),
		4 => __('Testimonial updated.','bhinneka'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Testimonial restored to revision from %s','bhinneka'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Testimonial published. <a href="%s">View Testimonial</a>'), esc_url( get_permalink() ) ),
		7 => __('Testimonial saved.','bhinneka'),
		8 => sprintf( __('Testimonial submitted. <a target="_blank" href="%s">Preview Testimonial</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink() ) ) ),
		9 => sprintf( __('Testimonial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Testimonial</a>'),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i','bhinneka' ), strtotime( $post->post_date ) ), esc_url( get_permalink() ) ),
		10 => sprintf( __('Testimonial draft updated. <a target="_blank" href="%s">Preview Testimonial</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink() ) ) ),
  );

  return $messages;

}

/*-----------------------------------------------------------------------------------*/
/*	All the pre-made messages for the gallery post type
/*-----------------------------------------------------------------------------------*/

function bnk_gallery_updated_messages( $messages ) {
global $post;

  $messages[__( 'gallery','bhinneka' )] =
  	array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Gallery updated. <a href="%s">View gallery</a>'), esc_url( get_permalink() ) ),
		2 => __('Custom field updated.','bhinneka'),
		3 => __('Custom field deleted.','bhinneka'),
		4 => __('Gallery updated.','bhinneka'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Gallery restored to revision from %s','bhinneka'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Gallery published. <a href="%s">View gallery</a>'), esc_url( get_permalink() ) ),
		7 => __('Gallery saved.','bhinneka'),
		8 => sprintf( __('Gallery submitted. <a target="_blank" href="%s">Preview gallery</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink() ) ) ),
		9 => sprintf( __('Gallery scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview gallery</a>'),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i','bhinneka' ), strtotime( $post->post_date ) ), esc_url( get_permalink() ) ),
		10 => sprintf( __('Gallery draft updated. <a target="_blank" href="%s">Preview gallery</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink() ) ) ),
  );

  return $messages;

}

/*-----------------------------------------------------------------------------------*/
/*	All the pre-made messages for the profile post type
/*-----------------------------------------------------------------------------------*/

function bnk_profile_updated_messages( $messages ) {
global $post;

  $messages[__( 'profile' )] =
  	array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Profile updated. <a href="%s">View profile</a>'), esc_url( get_permalink() ) ),
		2 => __('Custom field updated.','bhinneka'),
		3 => __('Custom field deleted.','bhinneka'),
		4 => __('Profile updated.','bhinneka'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Profile restored to revision from %s','bhinneka'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Profile published. <a href="%s">View Profile</a>'), esc_url( get_permalink() ) ),
		7 => __('Profile saved.','bhinneka'),
		8 => sprintf( __('Profile submitted. <a target="_blank" href="%s">Preview Profile</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink() ) ) ),
		9 => sprintf( __('Profile scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Profile</a>'),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i','bhinneka' ), strtotime( $post->post_date ) ), esc_url( get_permalink() ) ),
		10 => sprintf( __('Profile draft updated. <a target="_blank" href="%s">Preview Profile</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink() ) ) ),
  );

  return $messages;

}

/*-----------------------------------------------------------------------------------*/
/*	Edit the slides columns
/*-----------------------------------------------------------------------------------*/
function bnk_slide_edit_columns($columns){

        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __( 'Slide Title','bhinneka' )
        );

        return $columns;
}


/*-----------------------------------------------------------------------------------*/
/*	Edit the testimonials columns
/*-----------------------------------------------------------------------------------*/

function bnk_testimonial_edit_columns($columns){

        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __( 'Testimonial Title','bhinneka' )
        );

        return $columns;
}

/*-----------------------------------------------------------------------------------*/
/*	Edit the profile columns
/*-----------------------------------------------------------------------------------*/

function bnk_profile_edit_columns($columns){

        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __( 'Profile Title','bhinneka' )
        );

        return $columns;
}

/*-----------------------------------------------------------------------------------*/
/*	Create custom taxonomies for the gallery post type
/*-----------------------------------------------------------------------------------*/

function bnk_build_taxonomies(){
	register_taxonomy(__( 'media-type','bhinneka' ), array(__( 'gallery','bhinneka' )), array("hierarchical" => true, "label" => __( 'Item Categories','bhinneka' ), "singular_label" => __( 'Item Categories','bhinneka' ), "rewrite" => array('slug' => 'media-type', 'hierarchical' => true)));
}


/*-----------------------------------------------------------------------------------*/
/*	Edit the gallery columns
/*-----------------------------------------------------------------------------------*/

function bnk_gallery_edit_columns($columns){

        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __( 'Gallery Item Title','bhinneka' ),
            "type" => __( 'type','bhinneka' )
        );

        return $columns;
}

add_action( 'init', 'bnk_register_post_type_slides' );
add_action( 'init',  'bnk_register_post_type_testimonial' );
add_action( 'init',  'bnk_register_post_type_profile' );
add_action( 'init',  'bnk_reg_post_type_gallery' );
add_action( 'init',  'bnk_build_taxonomies' );

add_filter( 'post_updated_messages', 'bnk_slide_updated_messages' );
add_filter( 'post_updated_messages', 'bnk_testimonial_updated_messages' );
add_filter( 'post_updated_messages', 'bnk_gallery_updated_messages' );
add_filter( 'post_updated_messages', 'bnk_profile_updated_messages' );

add_filter('manage_edit_slide_columns', 'bnk_slide_edit_columns');
add_filter( 'manage_edit_testimonial_columns', 'bnk_testimonial_edit_columns' );
add_filter( 'manage_edit_gallery_columns', 'bnk_gallery_edit_columns' );
add_filter( 'manage_edit_profile_columns', 'bnk_profile_edit_columns' );

?>