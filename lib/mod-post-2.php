<!-- MAIN CONTENT BEGIN -->
<section class="home-page-content row">
	<div class="col_5b article">
			<?php 
				if ( $smof_data['bnk_homepage_post_1'] ) { $the_query = new WP_Query( $smof_data['bnk_homepage_post_1'] ); 
				} else { 
				$the_query = new WP_Query( '&posts_per_page=1' ); 
				} 
				while ( $the_query->have_posts() ) : $the_query->the_post();?>
				<h3 class="replace vintage-type"><?php the_title(); ?></h3>
                <?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
                	<div class="figure"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'post-image-home' ); ?> </a></div>
				<?php }; 
				the_excerpt(); 
				endwhile; wp_reset_postdata();
			?>
	</div>
	<div class="col_5b article">
			<?php 
				if ( $smof_data['bnk_homepage_post_2'] ) { $the_query = new WP_Query( $smof_data['bnk_homepage_post_2'] ); 
				} else { 
				$the_query = new WP_Query( '&posts_per_page=1' ); 
				} 
				while ( $the_query->have_posts() ) : $the_query->the_post();?>
				<h3 class="replace vintage-type"><?php the_title(); ?></h3>
                <?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
                	<div class="figure"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'post-image-home' ); ?> </a></div>
				<?php }; 
				the_excerpt(); 
				endwhile; wp_reset_postdata();
			?>
	</div>

    <div class="col_5b article last">
			<?php 
				if ( $smof_data['bnk_homepage_post_3'] ) { $the_query = new WP_Query( $smof_data['bnk_homepage_post_3'] ); 
				} else { 
				$the_query = new WP_Query( '&posts_per_page=1' ); 
				} 
				while ( $the_query->have_posts() ) : $the_query->the_post();?>
				<h3 class="replace vintage-type"><?php the_title(); ?></h3>
                <?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
                	<div class="figure"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'post-image-home' ); ?> </a></div>
				<?php }; 
				the_excerpt(); 
				endwhile; wp_reset_postdata();
			?>
	</div>
</section>
<!-- MAIN CONTENT END --> 