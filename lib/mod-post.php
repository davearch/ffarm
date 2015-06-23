<!-- MAIN CONTENT BEGIN -->
<section class="home-page-content row">
	<div class="col_8 article">
			<?php 
				if ( $smof_data['bnk_homepage_post_1'] ) { $the_query = new WP_Query( $smof_data['bnk_homepage_post_1'] ); 
				} else { 
				$the_query = new WP_Query( '&posts_per_page=1' ); 
				} 
				while ( $the_query->have_posts() ) : $the_query->the_post();?>
				<h2 class="entry-title replace vintage-type"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bhinneka' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>                
                <?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
                	<div class="figure"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'post-image-home' ); ?> </a></div>
				<?php };  
				the_excerpt(); 
				endwhile; wp_reset_postdata();
			?>
	</div>
    
	<div class="col_8 article last">
			<?php 
				if ( $smof_data['bnk_homepage_post_2'] ) { $the_query = new WP_Query( $smof_data['bnk_homepage_post_2'] ); 
				} else { 
				$the_query = new WP_Query( '&posts_per_page=1' ); 
				} 
				while ( $the_query->have_posts() ) : $the_query->the_post();?>
				<h2 class="entry-title replace vintage-type"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bhinneka' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>                
				<?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
	                <div class="figure"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'post-image-home' ); ?> </a></div>
				<?php };
				the_excerpt(); 
				endwhile; wp_reset_postdata();
			?>
	</div>
</section>
<!-- MAIN CONTENT END --> 