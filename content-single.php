<?php
/*
 * The template for displaying content in the single.php template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title replace"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php 
            if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
            <div class="post_image"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'single-image', array('class' => 'image-border') ); ?> </a></div>
        <?php  } ?>
		<?php the_content(); ?>
	</div><!-- .entry-content -->
<hr class="thin"/>


	<footer class="entry-meta">
	
		<?php bnk_posted_in(); ?>
		<?php if (function_exists('bnk_addthis')) bnk_addthis(); ?>

		<?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
		<div id="author-info">
			<div id="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bhinneka_author_bio_avatar_size', 60 ) ); ?>
			</div><!-- #author-avatar -->
			<div id="author-description">
				<h2><?php the_author(); ?></h2>
				<?php the_author_meta( 'description' ); ?>
				<div id="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( 'View all posts by %s', 'bhinneka' ), get_the_author() ); ?>
					</a>
				</div><!-- #author-link	-->
			</div><!-- #author-description -->
		</div><!-- #entry-author-info -->
		<?php endif; ?>
	</footer><!-- .entry-meta -->
	<hr/>	

</article><!-- #post-<?php the_ID(); ?> -->