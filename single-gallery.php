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

                    <div class="gallery-image">
                        <?php
                        $video_url = get_post_meta(get_the_ID(), 'bnk_video_url', true);
                        $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id ($post->ID), 'gallery-single-image', false, '' );
                        if($video_url !='' ) : ?>
                            <div class="video-container"><?php bnk_video(get_the_ID()); ?></div>
                        <?php else: ?>
                            <div id="image_slideshow" class="flexslider clearfix">
                                <ul class="slides">

                                    <?php
                                    $image1 = get_post_meta(get_the_ID(), 'bnk_upload_image', true);
                                    $image2 = get_post_meta(get_the_ID(), 'bnk_upload_image2', true);
                                    $image3 = get_post_meta(get_the_ID(), 'bnk_upload_image3', true);
                                    $image4 = get_post_meta(get_the_ID(), 'bnk_upload_image4', true);
                                    $image5 = get_post_meta(get_the_ID(), 'bnk_upload_image5', true);
                                    $image6 = get_post_meta(get_the_ID(), 'bnk_upload_image6', true);
                                    ?>

                                    <?php if($thumb_url != '') : ?>
                                    <li><img src="<?php echo $thumb_url[0]; ?>" alt="<?php the_title(); ?>"></li>
                                    <?php endif; ?>

                                    <?php if($image1 != '') : ?>
                                    <li><img src="<?php echo $image1; ?>" alt="image 1"></li>
                                    <?php endif; ?>

                                    <?php if($image2 != '') : ?>
                                    <li><img src="<?php echo $image2; ?>" alt="image 2"></li>
                                    <?php endif; ?>

                                    <?php if($image3 != '') : ?>
                                    <li><img src="<?php echo $image3; ?>" alt="image 3"></li>
                                    <?php endif; ?>

                                    <?php if($image4 != '') : ?>
                                    <li><img src="<?php echo $image4; ?>" alt="image 4"></li>
                                    <?php endif; ?>

                                    <?php if($image5 != '') : ?>
                                    <li><img src="<?php echo $image5; ?>" alt="image 5"></li>
                                    <?php endif; ?>

                                    <?php if($image6 != '') : ?>
                                    <li><img src="<?php echo $image6; ?>" alt="image 6"></li>
                                    <?php endif; ?>
                                </ul>
                                
                            </div>

                        <?php endif; ?>

                    </div> <!-- end gallery image -->
                    
                    <div class="gallery-content">
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