<?php
/*
 * Template Name: Landing Page
 * Description: A Landing Page Template
 */
get_header(); ?>

<!-- CONTAINER BEGIN -->
<div class="container">

    <!-- LANDING PAGE IMAGE BEGIN -->
    <div class="row">
        <div class="col_16">
			 <?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
             <div class="landing_image"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'landing-page-image' ); ?> </a></div>
             <?php  } ?>
    	</div>
    </div>
    <!-- LANDING PAGE IMAGE END -->

    <!-- LANDING PAGE CONTENT BEGIN -->
    <section class="landing-page-content row">
        <div class="col_16">
            <h1 class="landing-title replace vintage-type"><?php the_title(); ?></h1>
            <?php while ( have_posts() ) : the_post(); ?>
            <hr class="thin" />
            <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
        </div>
    </section>
    <!-- LANDING PAGE CONTENT END -->

    <!-- LANDING PAGE MOD BEGIN -->
    <?php if ( $smof_data['bnk_landing_mod_control'] == 1 ) { ?>
	<section class="landing-mod-container row">
	    <div class="col_16">
			<?php
                $menus = $smof_data['bnk_landing_mod']; 
                $count = 0;
                foreach ($menus as $menu) {
                    $menutitle = $menu['title'];
                    $menuurl = $menu['url'];
                    $menulink = $menu['link'];
                    $menudesc = $menu['description'];
                    $count = $count + 1;
				if ( $menutitle ) { 	
	                if ( $count % 2 == 0 ) { 
	                    echo '<div class="col_two omega"><div class="landing-mod round-4">';
	                } else {
	                    echo '<div class="col_two "><div class="landing-mod round-4">';
	                }
	                echo '<div class="thumbnail-image fleft "><img src="'.$menuurl.'" alt="'.$menutitle.'"/></div>';
	                echo '<h3 class="replace">'.$menutitle.'</h3> ';
	                echo '<p>'.$menudesc.'</p>';
	                echo '<p><a class="cta" href="'.$menulink.'"> '.__( 'Read More', 'bhinneka' ).' </a></p>';			
	                echo '</div></div>';
				}
            } ?>
		</div>
	</section>
   <?php }; ?>
    
    <!-- LANDING PAGE MOD END -->

</div>
<!-- CONTAINER END -->
<?php get_footer(); ?>