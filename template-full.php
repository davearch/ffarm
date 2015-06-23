<?php
/*
 * Template Name: Full Width Page
 * Description: A Page Template without sidebar
 */
get_header(); ?>

	<!-- CONTAINER BEGIN -->
	<div class="container"> 

		<!-- PAGE TITLE BEGIN -->
		<div class="row"><div class="col_16">
			<h1 class="page-title replace">
				<?php the_title(); ?>
			</h1>
		</div></div>
		<!-- PAGE TITLE END -->
		
		<!-- PAGE CONTENT BEGIN -->
		<div class="page-content row">
			<div class="col_16">
			
				<!-- MODULE BEGIN -->
				<section class="module">
				  <?php if (function_exists('bnk_breadcrumbs')) bnk_breadcrumbs(); ?>
				  <?php while ( have_posts() ) : the_post(); ?>
                      <?php get_template_part( 'content', 'page' ); ?>
                  <?php endwhile; // end of the loop. ?>
				</section>
				<!-- MODULE END -->
                
			</div>			
		</div>
		<!-- PAGE CONTENT END -->
		
	</div>
	<!-- CONTAINER END -->
<?php get_footer(); ?>