 <?php
/*
Template Name: Profiles Page
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
				<section class="module profiles">
					<?php if (function_exists('bnk_breadcrumbs')) bnk_breadcrumbs(); ?>

					<?php  $wp_query = new WP_Query( array ( 'post_type'=> 'profile', 'paged'=>$paged) );	?>
					<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <header class="entry-header">
                                <?php if ( is_sticky() ) : ?>
                                    <hgroup>
                                        <h3 class="entry-format"><?php _e( 'Featured', 'bhinneka' ); ?></h3>
                                        <h2 class="entry-title replace"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bhinneka' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                    </hgroup>
                                <?php else : ?>
                                <h2 class="entry-title replace"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bhinneka' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                <?php endif; ?>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
                                <div class="profile-thumbnail"><?php the_post_thumbnail( 'large-thumbnail' ); ?></div>
                                <?php  } ?>
                                <div class="profile-content">
                                    <?php the_excerpt(); ?>
                                </div>
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