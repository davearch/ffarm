<?php
/*
 * The default template for displaying content
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<header class="entry-header">
			<?php if ( is_sticky() ) : ?>
				<hgroup>
					<h3 class="entry-format"><?php _e( 'Featured', 'bhinneka' ); ?></h3>
					<h2 class="entry-title replace"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bhinneka' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				</hgroup>
			<?php else : ?>
			<h2 class="entry-title replace"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bhinneka' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php endif; ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php bnk_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() || is_archive() ) : // How to display posts in the Search and Archive Page. ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php elseif ( is_home() ) : // How to display posts in the Blog Page. ?>
			<div class="entry-content">
				<?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
					<div class="post_image"><?php the_post_thumbnail( 'post-image', array('class' => 'image-border') ); ?></div>
				<?php } ?>
				<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bhinneka' ) ); ?>
			</div><!-- .entry-content -->
		<?php else: // How to display all other posts. ?>
			<div class="entry-content">
				<?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
					<div class="post_image"><?php the_post_thumbnail( 'post-image', array('class' => 'image-border') ); ?></div>
				<?php }  ?>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bhinneka' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>
		
		<footer class="entry-meta">
			<?php $show_sep = false; ?>
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ' ', 'bhinneka' ) );
				if ( $categories_list ):
			?>
			<span class="cat-links">
				<?php printf( __( '<span class="%1$s">Category:</span> %2$s', 'bhinneka' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if categories ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ' ', 'bhinneka' ) );
				if ( $tags_list ):
				if ( $show_sep ) : ?>
			<span class="sep"> | </span>
				<?php endif; // End if $show_sep ?>
			<span class="tag-links">
				<?php printf( __( '<span class="%1$s">Tags:</span> %2$s', 'bhinneka' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php if ( comments_open() ) : ?>
			<?php if ( $show_sep ) : ?>
			<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'bhinneka' ) . '</span>', __( '<b>1</b> Reply', 'bhinneka' ), __( '<b>%</b> Replies', 'bhinneka' ) ); ?></span>
			<?php endif; // End if comments_open() ?>
            
    		<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'bhinneka' ), 'after' => '' ) ); ?>
		</footer><!-- #entry-meta -->

	<hr class="thin"/>
	</article><!-- #post-<?php the_ID(); ?> -->