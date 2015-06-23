<?php
/*
 * The template for displaying Search Results pages.
 */
get_header(); ?>

	<!-- CONTAINER BEGIN -->
	<div class="container"> 
		<div class="row"><div class="col_16">
			<h1 class="page-title replace">
				<?php printf( __( 'Search Results for: %s', 'bhinneka' ), '<span>' . get_search_query() . '</span>' ); ?>
            </h1>            
		</div></div>
		
		<!-- PAGE CONTENT BEGIN -->
		<div class="page-content row">
			<div class="col_12">
				<section class="module">
				
				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
	
				<?php else : ?>				
                        
                    <article id="post-0" class="post no-results not-found">
                        <header class="entry-header">
                            
							<?php if ( $smof_data['bnk_custom_search_title'] ) {
                                echo ' <h1 class="entry-title">';
                                echo $smof_data['bnk_custom_search_title'] ;
                                echo '</h1>';
                            }
                            else { 		
                                echo ' <h1 class="entry-title">';
                                echo _e( 'Nothing Found', 'bhinneka' );
                                echo '</h1>';
                            } ?>
                                                        
                        </header><!-- .entry-header -->
    
                        <div class="entry-content">
                           
							<?php if ( $smof_data['bnk_custom_search_msg'] ) {
                                echo '<p>';
                                echo $smof_data['bnk_custom_search_msg'] ;
                                echo '</p>';
                            }
                            else { 		
                                echo '<p>';
                                echo _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'bhinneka' );
                                echo '</p>';
                            } ?>	
                            
                            <?php get_search_form(); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-0 -->
        
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