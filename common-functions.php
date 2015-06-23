<?php

/*-----------------------------------------------------------------------------------*/
/* Custom Pagination
/*-----------------------------------------------------------------------------------*/
function bnk_pagination ($pages = '', $range = 3) {
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages) {
             $pages = 1;
         }
     }

     if(1 != $pages) {
         echo "<div class=\"pagination\"><span class=\"mobile-hide\">Page ".$paged." of ".$pages."</span><ul>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a><li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

         for ($i=1; $i <= $pages; $i++) {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                 echo ($paged == $i)? "<li class=\"active\"><a href='".get_pagenum_link($i)."'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' >".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">&rsaquo;</a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";

		 echo "</ul></div>\n";
     }
}


/*-----------------------------------------------------------------------------------*/
/* Custom Meta Info
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'bnk_posted_on' ) ) :
function bnk_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'bhinneka' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'bhinneka' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'bnk_caldate_on' ) ) :
function bnk_caldate_on() {
	printf( __( '<li><img src="%2$s/img/icon-cal.png" alt="Calendar icon"/> %1$s</li>', 'bhinneka' ),
		get_the_date(),
		get_stylesheet_directory_uri()
	);
}
endif;

if ( ! function_exists( 'bnk_posted_in' ) ) :
function bnk_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );

	if ( $tag_list ) {
		$posted_in = __( '<li><img src="%3$s/img/icon-cat.png" alt="Category icon"/> %1$s</li><li><img src="%3$s/img/icon-tags.png" alt="Tags icon"/> %2$s</li>', 'bhinneka' );
	}  else {
		$posted_in = __( '<li><img src="%3$s/img/icon-cat.png" alt="Category icon"/> %1$s</li>', 'bhinneka' );
	}

	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_stylesheet_directory_uri()
	);
}
endif;

function bnk_posted_in() {
			$show_sep = false;
			if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ' ', 'bhinneka' ) );
				if ( $categories_list ):
			echo '<span class="cat-links">';
				printf( __( '<span class="%1$s">Category:</span> %2$s', 'bhinneka' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				$show_sep = true;
			echo '</span>';
			endif; // End if categories

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ' ', 'bhinneka' ) );
				if ( $tags_list ):
				if ( $show_sep ) :
			echo '<span class="sep"> | </span>';
				endif; // End if $show_sep
			echo '<span class="tag-links">';
				printf( __( '<span class="%1$s">Tags:</span> %2$s', 'bhinneka' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				$show_sep = true;
			echo '</span>';
			endif; // End if $tags_list
			endif; // End if 'post' == get_post_type()

			if ( comments_open() ) :
			if ( $show_sep ) :
			echo '<span class="sep"> | </span>';
			endif; // End if $show_sep
			echo '<span class="comments-link">';
			comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'bhinneka' ) . '</span>', __( '<b>1</b> Reply', 'bhinneka' ), __( '<b>%</b> Replies', 'bhinneka' ) );

			echo '</span>';
			endif; // End if comments_open()
}


/*-----------------------------------------------------------------------------------*/
/*	Add this
/*-----------------------------------------------------------------------------------*/
function bnk_addthis() {
		global $smof_data;
		if( $smof_data['bnk_addthis_bar'] ==  1 ){
		echo '<div class="addthis_toolbox addthis_default_style addthis_article ">
		<a class="addthis_button_preferred_1"></a>
		<a class="addthis_button_preferred_2"></a>
		<a class="addthis_button_preferred_3"></a>
		<a class="addthis_button_preferred_4"></a>
		<a class="addthis_button_compact"></a>
		<a class="addthis_counter addthis_bubble_style"></a>
		</div>';
		};
};


/*-----------------------------------------------------------------------------------*/
/*	Breadcrumbs
/*-----------------------------------------------------------------------------------*/
function bnk_breadcrumbs() {
	global $smof_data;

	if( $smof_data['bnk_breadcrumbs_bar'] == 1 ){

		$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter = '<span class="divider">&nbsp;</span>'; // delimiter between crumbs
		$home = 'Home'; // text for the 'Home' link
		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before = '<span class="current">'; // tag before the current crumb
		$after = '</span>'; // tag after the current crumb

		$pageprofile =  '?page_id='.$smof_data['bnk_profile_page'];
		$pagetestimonial =  '?page_id='.$smof_data['bnk_testimonial_page'];
		$pagegallery =  '?page_id='.$smof_data['bnk_gallery_page'];

		global $post;
		$homeLink = get_bloginfo('url');

		if (is_home() || is_front_page()) {

		if ($showOnHome == 1) echo '<div id="bnk-crumbs" class="mobile-hide"><a href="' . $homeLink . '">' . $home . '</a></div>';

		} else {

		echo '<div id="bnk-crumbs" class="mobile-hide"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

		if ( is_category() ) {
		  $thisCat = get_category(get_query_var('cat'), false);
		  if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
		  echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

		} elseif ( is_search() ) {
		  echo $before . 'Search results for "' . get_search_query() . '"' . $after;

		} elseif ( is_day() ) {
		  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		  echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
		  echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
		  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		  echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
		  echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
		  if ( get_post_type() == 'profile' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . '/' . $pageprofile . '/">' . $post_type->labels->singular_name . '</a>';
			if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
		  } elseif ( get_post_type() == 'testimonial' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . '/' . $pagetestimonial . '/">' . $post_type->labels->singular_name . '</a>';
			if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
		  } elseif ( get_post_type() == 'gallery' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . '/' . $pagegallery . '/">' . $post_type->labels->singular_name . '</a>';
			if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
		  } elseif ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
			if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
		  } else {
			$cat = get_the_category(); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			if ($showCurrent == 0) $cats = preg_replace("/^(.+)\s$delimiter\s$/", "$1", $cats);
			echo $cats;
			if ($showCurrent == 1) echo $before . get_the_title() . $after;
		  }

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		  $post_type = get_post_type_object(get_post_type());
		  echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
		  $parent = get_post($post->post_parent);

		  $cat = get_the_category($parent->ID); $cat = $cat[0];
		  echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		  echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
		  if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

		} elseif ( is_page() && !$post->post_parent ) {
		  if ($showCurrent == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $post->post_parent ) {
		  $parent_id  = $post->post_parent;
		  $breadcrumbs = array();
		  while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id  = $page->post_parent;
		  }
		  $breadcrumbs = array_reverse($breadcrumbs);
		  for ($i = 0; $i < count($breadcrumbs); $i++) {
			echo $breadcrumbs[$i];
			if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
		  }
		  if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

		} elseif ( is_tag() ) {
		  echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

		} elseif ( is_author() ) {
		   global $author;
		  $userdata = get_userdata($author);

		  echo $before . 'Articles posted by ' . $userdata->display_name . $after;

		} elseif ( is_404() ) {
		  echo $before . 'Error 404' . $after;
		}

		if ( get_query_var('paged') ) {
		  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		  echo __('Page') . ' ' . get_query_var('paged');
		  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</div>';

		}
	}
}


/*-----------------------------------------------------------------------------------*/
/* Slide
/*-----------------------------------------------------------------------------------*/
function bnk_slider() {
	if (is_page_template('template-home.php') || is_single() ) {

		global $smof_data;
		$animation = $smof_data['bnk_slide_animation'];
		$slideDirection = $smof_data['bnk_slide_direction'];
		$slideshowSpeed = $smof_data['bnk_slide_speed'];
		$animationDuration = $smof_data['bnk_slide_animduration'];
		$directionNav = $smof_data['bnk_slide_dirnav'];
		$controlNav = $smof_data['bnk_slide_control'];
		?>
		<script type="text/javascript">
            jQuery(window).load(function() {
				if (jQuery().flexslider) {
					jQuery('.flexslider').flexslider({
						<?php if($animation ) : ?> animation: "<?php echo $animation; ?>", <?php endif; ?>
						<?php if($slideDirection ) : ?> slideDirection: "<?php echo $slideDirection; ?>", <?php endif; ?>
						<?php if($slideshowSpeed ) : ?> slideshowSpeed: <?php echo $slideshowSpeed; ?>, <?php endif; ?>
						<?php if($animationDuration ) : ?> animationDuration: <?php echo $animationDuration; ?>, <?php endif; ?>
						<?php if($directionNav == 0 ) : ?> directionNav: false, <?php endif; ?>
						<?php if($controlNav == 0 ) : ?> controlNav: false <?php endif; ?>
					 });
				};
			});
		</script>
		<?php
	}
}
add_action('wp_head', 'bnk_slider');


/*-----------------------------------------------------------------------------------*/
/* Colorbox
/*-----------------------------------------------------------------------------------*/
function bnk_colorbox($postid, $thumb_size) {

	$link = get_post_meta($postid, 'bnk_upload_image', true);
	$video = get_post_meta($postid, 'bnk_video_url', true);
	$thumb = bnk_remove_imgattr (get_the_post_thumbnail($postid, $thumb_size));
	$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id($postid), 'single-image', false, '' );

		/*Display single-gallery.php if video URL or featured images is availabe*/
		if( $thumb_url != '' || $video != '' ) {
			$output = '<a href="'.get_permalink($postid). '" title="'.get_the_title($postid).'" ><span class="dark-background">'.get_the_title($postid).'</span>'.$thumb.'</a>';
		}
		/*Display the image / video in modal if there is video URL or Slideshow Images*/
		else {
			$output = '<a title="'.get_the_title($postid).'" href="'.get_permalink($postid).'" class="cb-image">'.$thumb.'</a>';
		}
	echo $output;
}


/*-----------------------------------------------------------------------------------*/
/*  Check video url functions
/*-----------------------------------------------------------------------------------*/
function bnk_video($postid) {

	$video_url = get_post_meta($postid, 'bnk_video_url', true);

	if(preg_match('/youtube/', $video_url)) {

		if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches)) {
			$output = '<iframe title="YouTube video player" class="youtube-player" type="text/html" width="645" height="514" src="http://www.youtube.com/embed/'.$matches[1].'" frameborder="0" allowFullScreen></iframe>';
		}
		else {
			$output = __('Invalid <strong>Youtube</strong> URL.', 'bhinneka');
		}

	}
	elseif(preg_match('/vimeo/', $video_url)) {

		if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $video_url, $matches))	{
			$output = '<iframe src="http://player.vimeo.com/video/'.$matches[1].'" width="645" height="363" frameborder="0"></iframe>';
		}
		else {
			$output = __('Invalid <strong>Vimeo</strong> URL.', 'bhinneka');
		}

	}
	else {
		$output = stripslashes(htmlspecialchars_decode($video_url));
	}
	echo $output;
}


/*-----------------------------------------------------------------------------------*/
/*	Custom walker for CTA Mod 4 Columns
/*-----------------------------------------------------------------------------------*/
class quickmenu_nav_walker_4 extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="col_4 ' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<div class="intro-widget round-4" ><a '. $attributes .'><div class="intro-img mobile-hide"></div>
<div class="intro-content">';
        $item_output .= $args->link_before . '<h3 class="replace tshadow">' . apply_filters( 'the_title', $item->title, $item->ID ) . '</h3>' . $args->link_after;
        $item_output .= '<p class="mobile-hide">' . $item->attr_title . '</p>';
        $item_output .= '</div></a></div>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}


/*-----------------------------------------------------------------------------------*/
/*	Custom walker for CTA Mod 3 Columns
/*-----------------------------------------------------------------------------------*/
class quickmenu_nav_walker_3 extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="col_5b ' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<div class="intro-widget round-4" ><a '. $attributes .'><div class="intro-img mobile-hide"></div>
<div class="intro-content">';
        $item_output .= $args->link_before . '<h3 class="replace tshadow">' . apply_filters( 'the_title', $item->title, $item->ID ) . '</h3>' . $args->link_after;
        $item_output .= '<p class="mobile-hide">' . $item->attr_title . '</p>';
        $item_output .= '</div></a></div>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}


/*-----------------------------------------------------------------------------------*/
/*	Custom walker for gallery filter
/*-----------------------------------------------------------------------------------*/
class Walker_Category_Filter extends Walker_Category {
   function start_el(&$output, $term, $depth = 0, $args = array(), $current_object_id = 0) {

      extract($args);
      $cat_name = esc_attr( $category->name);
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
      $link = '<a href="#" data-option-value=".'.strtolower(preg_replace('/\s+/', '-', $cat_name)).'" ';
      if ( $use_desc_for_title == 0 || empty($category->description) )
         $link .= 'title="' . sprintf(__( 'View all posts filed under %s', 'bhinneka' ), $cat_name) . '"';
      else
         $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
      $link .= '>';
      // $link .= $cat_name . '</a>';
      $link .= $cat_name;
      if(!empty($category->description)) {
         $link .= ' <span>'.$category->description.'</span>';
      }
      $link .= '</a>';
      if ( (! empty($feed_image)) || (! empty($feed)) ) {
         $link .= ' ';
         if ( empty($feed_image) )
            $link .= '(';
         $link .= '<a href="' . get_category_feed_link($category->term_id, $feed_type) . '"';
         if ( empty($feed) )
            $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s', 'bhinneka' ), $cat_name ) . '"';
         else {
            $title = ' title="' . $feed . '"';
            $alt = ' alt="' . $feed . '"';
            $name = $feed;
            $link .= $title;
         }
         $link .= '>';
         if ( empty($feed_image) )
            $link .= $name;
         else
            $link .= "<img src='$feed_image'$alt$title" . ' />';
         $link .= '</a>';
         if ( empty($feed_image) )
            $link .= ')';
      }
      if ( isset($show_count) && $show_count )
         $link .= ' (' . intval($category->count) . ')';
      if ( isset($show_date) && $show_date ) {
         $link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);
      }
      if ( isset($current_category) && $current_category )
         $_current_category = get_category( $current_category );
      if ( 'list' == $args['style'] ) {
          $output .= '<li class="segment-'.rand(2, 99).'"';
          $class = 'cat-item cat-item-'.$category->term_id;
          if ( isset($current_category) && $current_category && ($category->term_id == $current_category) )
             $class .=  ' current-cat';
          elseif ( isset($_current_category) && $_current_category && ($category->term_id == $_current_category->parent) )
             $class .=  ' current-cat-parent';
          $output .=  '';
          $output .= ">$link\n";
       } else {
          $output .= "\t$link<br />\n";
       }
   }
}


/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/
function bnk_favicon() {
	global $smof_data;
	if ( $smof_data['bnk_custom_favicon'] != '') {
	echo '<link rel="shortcut icon" href="'. $smof_data['bnk_custom_favicon'] .'"/>'."\n";
	}
	else { ?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" />
	<?php }
}
add_action('wp_head', 'bnk_favicon');


/*-----------------------------------------------------------------------------------*/
/* Google Analytics
/*-----------------------------------------------------------------------------------*/
function bnk_analytics(){
	global $smof_data;
	if ( $smof_data['bnk_ga_code'] != '') {
	echo  stripslashes($smof_data['bnk_ga_code'])  ;
	}
}
add_action('wp_footer','bnk_analytics');


/*-----------------------------------------------------------------------------------*/
/* Custom CSS */
/*-----------------------------------------------------------------------------------*/
function bnk_custom_css(){
global $smof_data;

$css_script_container = array();
$css_array = array();

$custom_css = $smof_data['bnk_custom_css'];
$google_font = $smof_data['bnk_google_font'];
$heading_color = $smof_data['bnk_main_heading_color'];
$footer_color = $smof_data['bnk_footer_heading_color'];
$custom_bg_img = $smof_data['bnk_bg_image'];
$custom_body_bg_img = $smof_data['bnk_body_bg_image'];
$footer_bg_color = $smof_data['bnk_footer_bg_color'];
$pagetitle_bg_color = $smof_data['bnk_pagetitle_bg_color'];
$bodyfont = $smof_data['bnk_body_type']; //get the custom_type array

    //custom css
	if(!empty($custom_css)){
     array_push(          $css_array,$custom_css);
	}

	//body type color
    if( $bodyfont ){
			$bodyfont_size = $bodyfont['size'];
			$bodyfont_color = $bodyfont['color'];
			$body_font_code = ' body { font-size:'.$bodyfont_size .'; color: '.$bodyfont_color.'; } '."\n";
			array_push($css_array,$body_font_code);
	}

	//google web fonts
    if( $google_font ){
	        $google_font_link = '<link href="http://fonts.googleapis.com/css?family='.$google_font.'" rel="stylesheet" type="text/css" />'."\n";
			$google_font_code = '.replace, .sidebar-widget h4 {font-family:\''.$google_font.'\', Helvetica, Arial, sans-serif;}'."\n";
			array_push($css_script_container,$google_font_link);
			array_push($css_array,$google_font_code);
	}


	//heading color
    if( $heading_color ){
			$heading_color_code = ' .container h1,  .container h2,  .container h3,  .container h4,  .container h5,  .container h6 	{  color:'.$heading_color.'; } '."\n";
			array_push($css_array,$heading_color_code);
	}


	//footer color
    if( $footer_color ){
			$footer_color_code = '#footer h1, #footer h2, #footer h3, #footer h4, #footer h5, #footer h6 	{  color:'.$footer_color.'; }'."\n";
			array_push($css_array,$footer_color_code);
	}

	//add custom header background
    if( $custom_bg_img ){
			$background_code = 	'#header  { background:  url('.$custom_bg_img.') repeat top center; }'."\n";
			array_push($css_array,$background_code);
	}

	//add custom body background
    if( $custom_body_bg_img  ){
			$body_background_code =  'body  { background:  url('.$custom_body_bg_img.') repeat; }'."\n";
			array_push($css_array,$body_background_code);
	}

	//add footer background color
    if( $footer_bg_color ){
			$footer_bg_color_code = '#footer { background:'.$footer_bg_color.'; }'."\n";
			array_push($css_array,$footer_bg_color_code);
	}
	//add page title background color
    if( $pagetitle_bg_color ){
			$pagetitle_bg_color_code = '.page-title { background:'.$pagetitle_bg_color.'; }'."\n";
			array_push($css_array,$pagetitle_bg_color_code);
	}

	//print <head>
	if(!empty($css_array)){
	  echo"<style type='text/css'>\n";
			foreach($css_array as $css_item){
			 echo $css_item."\n";
			}
	  echo"</style>\n";
	}

	if(!empty($css_script_container)){
	   foreach($css_script_container as $css_link){
		echo $css_link."\n";
	   }
	}

}
add_action('wp_head','bnk_custom_css',30);

?>