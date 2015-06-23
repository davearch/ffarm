<?php
get_header(); ?>

<!-- CONTAINER BEGIN -->
<div class="container">

	<!-- PAGE CONTENT BEGIN -->
	<div class="page-content row"><div class="col_16">

        <!-- MODULE BEGIN -->
        <section class="module">

        <?php if (function_exists('bnk_breadcrumbs')) bnk_breadcrumbs(); ?>

        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title replace"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">

					<?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
                    <div class="profile-thumbnail"><?php the_post_thumbnail( 'large-thumbnail' ); ?></div>
                    <?php  } ?>
                    
                    <div class="profile-content">
                        <?php the_content(); ?>
                        <div class="entry-meta">
							<?php echo get_the_term_list($post->ID, 'media-type', '<ul class="unstyled gallery-cat"><li>', '</li><li>', '</li></ul>'); ?>
                            <?php if (function_exists('bnk_addthis')) bnk_addthis(); ?>
                        </div><!-- .entry-meta -->
                    </div>
                </div><!-- .entry-content -->
                <hr/>
            </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; // end of the loop. ?>
        </section>
        <!-- MODULE END -->

	   </div>
    </div>
<!-- PAGE CONTENT END -->

</div>
<!-- CONTAINER END -->

<?php get_footer(); ?>