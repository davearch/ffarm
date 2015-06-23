<?php
/*
 * The template used for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	<div class="entry-content">
		<?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
			<div class="landing_image"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'landing-image' ); ?> </a></div>
		<?php } ?>
		<?php the_content(); ?>
	</div><!-- .entry-content -->
    <?php if (function_exists('wp_link_pages')) { ?>
	<footer class="entry-meta">
    	<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'bhinneka' ), 'after' => '' ) ); ?>
	</footer><!-- .entry-meta -->
    <?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
