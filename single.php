<?php
/*
 * The Template for displaying all single posts.
 */
get_header(); ?>

	<!-- CONTAINER BEGIN -->
	<div class="container"> 
		
		<!-- PAGE CONTENT BEGIN -->
		<div class="page-content row">
			<div class="col_12">
			
                <!-- MODULE BEGIN -->
                <section class="module">
                <?php if (function_exists('bnk_breadcrumbs')) bnk_breadcrumbs(); ?>
                
                <?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'single' ); ?>
					<?php comments_template( '', true ); ?>
                <?php endwhile; // end of the loop. ?>
                </section>
                <!-- MODULE END -->
				
			</div>
			<?php get_sidebar(); ?>
			
		</div>
		<!-- PAGE CONTENT END -->
		
	</div>
	<!-- CONTAINER END -->

<?php get_footer(); ?>