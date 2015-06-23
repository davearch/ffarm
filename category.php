<?php
/**
 * The template for displaying Category Archive pages.
 */

get_header(); ?>

	<!-- CONTAINER BEGIN -->
	<div class="container"> 

		<!-- PAGE TITLE BEGIN -->
		<div class="row"><div class="col_16">
			<h1 class="page-title replace">
				<?php single_cat_title( ); ?>			
			</h1>
		</div></div>
		<!-- PAGE TITLE END -->
		
		<!-- PAGE CONTENT BEGIN -->
		<div class="page-content row">
			<div class="col_12">
			
				<!-- MODULE BEGIN -->
				<section class="module">
					<?php if ( have_posts() ) : ?>	
					
						<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>
						
					<?php else : ?>
		
						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'Nothing Found', 'bhinneka' ); ?></h1>
							</header><!-- .entry-header -->
		
							<div class="entry-content">
								<p><?php _e( 'Apologies, it appears the page you are looking for no longer exists. Perhaps searching will help.', 'bhinneka' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post-0 -->
		
					<?php endif; ?>

					<?php if (function_exists("bnk_pagination")) { 	bnk_pagination(); } ?>

				</section>
				<!-- MODULE END -->
			</div>
			
			<?php get_sidebar(); ?>

			
		</div>
		<!-- PAGE CONTENT END -->
		
	</div>
	<!-- CONTAINER END -->

<?php get_footer(); ?>