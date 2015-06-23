<?php
/**
 * The template for displaying posts in the Aside Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * An aside is a short piece of text - usually no more than a paragraph. It appears withouth a title.
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<hgroup>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bhinneka' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 class="entry-format"><?php _e( 'Aside', 'bhinneka' ); ?></h3>
			</hgroup>			
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bhinneka' ) ); ?>			
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php bnk_posted_on(); ?>
			<?php if ( comments_open() ) : ?>
			<span class="sep"> | </span>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'bhinneka' ) . '</span>', __( '<b>1</b> Reply', 'bhinneka' ), __( '<b>%</b> Replies', 'bhinneka' ) ); ?></span>
			<?php endif; ?>
		</footer><!-- #entry-meta -->
		<hr class="thin" />
	</article><!-- #post-<?php the_ID(); ?> -->
