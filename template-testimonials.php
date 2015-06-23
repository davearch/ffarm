 <?php
/*
Template Name: Testimonials Page
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
			<div class="col_12">
			
				<!-- MODULE BEGIN -->
				<section class="module testimonials">
					<?php if (function_exists('bnk_breadcrumbs')) bnk_breadcrumbs(); ?>
                                                
					<?php  $wp_query = new WP_Query( array ( 'post_type'=> 'testimonial', 'paged'=>$paged) );	?>
					<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?> 				
                                       
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                            <div class="entry-content">
                                <?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
                                    <div class="post_image"><?php the_post_thumbnail( 'post-image', array('class' => 'image-border') ); ?></div>
                                <?php }  ?>
                                <blockquote>
                                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bhinneka' ) ); ?>
                                </blockquote>
								<?php if(get_post_meta(get_the_ID(), 'bnk_author_name', true) || get_post_meta(get_the_ID(), 'bnk_author_title', true)): ?>
                                    <p class="quote-author">
                                        <?php if(get_post_meta(get_the_ID(), 'bnk_author_name', true)): ?>
                                            <?php echo get_post_meta(get_the_ID(), 'bnk_author_name', true); ?>
                                        <?php endif; ?>
                                        <?php if(get_post_meta(get_the_ID(), 'bnk_author_title', true)): ?>
                                            <span class="costumer-title"> - <?php echo get_post_meta(get_the_ID(), 'bnk_author_title', true); ?></span>
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>

                            </div><!-- .entry-content -->
                        
                            <hr class="thin"/>
                        </article><!-- #post-<?php the_ID(); ?> -->

			    	<?php endwhile; endif;?>
                    
					<?php if (function_exists("bnk_pagination")) { 	bnk_pagination(); } ?>
                  
				</section>
				<!-- MODULE END -->
				<?php wp_reset_query(); ?>		
			</div>
			<?php get_sidebar(); ?>
			
		</div>
		<!-- PAGE CONTENT END -->
		
	</div>
	<!-- CONTAINER END -->

<?php get_footer(); ?>