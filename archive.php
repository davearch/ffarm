<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>

	<!-- CONTAINER BEGIN -->
	<div class="container"> 
		<div class="row"><div class="col_16">
			<h1 class="page-title replace">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives', 'bhinneka' ) ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives', 'bhinneka' ) ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives', 'bhinneka' ) ); ?>
				<?php else : ?>
					<?php _e( 'Archives', 'bhinneka' ); ?>
				<?php endif; ?>
			</h1>
		</div></div>
		
		<!-- PAGE CONTENT BEGIN -->
		<div class="page-content row">
			<div class="col_12">
				<section class="module">
				
				<?php if ( have_posts() ) : ?>
				
					<h4>
						<?php if ( is_day() ) : ?>
							<?php printf(  '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php echo(  '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bhinneka' ) ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bhinneka' ) ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'bhinneka' ); ?>
						<?php endif; ?>
					</h4>
					<hr/>
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
	
				<?php else : ?>
						
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'bhinneka' ); ?></h1>				
						<?php if ( $smof_data['bnk_custom_404_msg'] != '' ) {
							echo '<p>';
							echo $smof_data['bnk_custom_404_msg'];
							echo '</p>';
						}
						else { 
							echo '<p>';
							_e('Apologies, it appears the page you are looking for no longer exists. Perhaps searching will help.', 'bhinneka');
							echo '</p>';
						 } ?>	
						<?php get_search_form(); ?>
	
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