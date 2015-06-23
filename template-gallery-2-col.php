<?php
/*
Template Name: Gallery Page - 2 columns
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

				    <?php  $wp_query = new WP_Query();
						   $wp_query->query('post_type=gallery&posts_per_page=-1'); ?>

					<!-- GALLERY WRAP BEGIN -->
					<div id="gallery-wrapper">

						<!-- Module Wrapper begin-->
						<ul id="module-wrapper">
							<?php $count = 1; ?>
							<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
								  $terms = get_the_terms( get_the_ID(), 'media-type' );  ?>

							<li class="<?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } ?> gallery_col_two module-box <?php if ( $count % 2 == 0 ) echo' omega';?>" data-id="id-<?php echo $count; ?>">
								<!-- Post begin -->
								<div  id="post-<?php the_ID(); ?>" <?php post_class('gallery_module'); ?> >
									<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
										<?php bnk_colorbox(get_the_ID(), 'gallery-thumbnail-l'); ?>
									<?php } ?>
								</div>
								<!-- Post end -->
							</li>
							<?php $count++; ?>
							<?php endwhile; endif; ?>
						</ul>
						<!-- Module Wrapper end-->
					<?php wp_reset_query(); ?>
					</div>
					<!-- GALLERY WRAP END -->

				</section>
				<!-- MODULE END -->

			</div>
		</div>
		<!-- PAGE CONTENT END -->

	</div>
	<!-- CONTAINER END -->
<?php get_footer(); ?>