<?php
/**
 * The template for displaying Author Archive pages.
 */

get_header(); ?>

	<!-- CONTAINER BEGIN -->
	<div class="container"> 

		<div class="row"><div class="col_16">
			<h1 class="page-title replace author">
				<?php  _e( 'Author Archives', 'bhinneka' ); ?>	
			</h1>
		</div></div>
		
		<!-- PAGE CONTENT BEGIN -->
		<div class="page-content row">
			<div class="col_12">
				<section class="module">
		
					<?php if ( have_posts() ) : ?>

						<?php the_post(); ?>		
						<?php rewind_posts(); ?>
		
						<?php
						// If a user has filled out their description, show a bio on their entries.
						if ( get_the_author_meta( 'description' ) ) : ?>
						<div id="author-info">
							<div id="author-avatar">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bnk_author_bio_avatar_size', 60 ) ); ?>
							</div>
							<div id="author-description">
								<h2><?php printf( __( 'About %s', 'bhinneka' ), get_the_author() ); ?></h2>
								<?php the_author_meta( 'description' ); ?>
							</div>
						</div>
						
						<hr/>
						<?php endif; ?>
		
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>
		
					<?php else : ?>
		
						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'Nothing Found', 'bhinneka' ); ?></h1>
							</header>
		
							<div class="entry-content">
								<p><?php _e( 'Apologies, it appears the page you are looking for no longer exists. Perhaps searching will help.', 'bhinneka' ); ?></p>
								<?php get_search_form(); ?>
							</div>
						</article>
		
					<?php endif; ?>
					
					<?php if (function_exists("bnk_pagination")) { 	bnk_pagination(); } ?>

				</section>
			</div>
			
			<?php get_sidebar(); ?>
			
		</div>
		<!-- PAGE CONTENT END -->
		
	</div>
	<!-- CONTAINER END -->
		
<?php get_footer(); ?>