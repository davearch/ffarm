<?php
/*
 * Template Name: Home Page
 * Description: A Page Template for Home Page
 */
?>

<?php get_header(); ?>

<!-- PAGE CONTENT BEGIN -->
<div class="container">

	<?php
	$layout = $smof_data['homepage_mods']['enabled'];
	
	if ($layout):
	
	foreach ($layout as $key=>$value) {
	
	    switch($key) {
	    case 'cta_mod':
			if ( has_nav_menu( 'ctanav' ) ) { 
				include 'lib/mod-cta.php';
			};
	    break;
	    case 'intro_mod':
			include 'lib/mod-intro.php';
	    break;
	    case 'post_mod':
			include 'lib/mod-post.php';
	
	    break;
	    case 'post_mod_2':
			include 'lib/mod-post-2.php';
	    break;
	    case 'profile_mod':
			include 'lib/mod-profiles.php';
	
	    break;
	    case 'donation_mod':
			include 'lib/mod-donation.php';
	
	    break;
	    //repeat as many times necessary
	    }
	}
	endif; ?>

</div>
<!-- PAGE CONTENT END -->

<?php get_footer(); ?>