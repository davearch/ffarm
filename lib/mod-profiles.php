<!-- PROFILES BEGIN -->
<section id="profiles" >
    <div class="row divider-line">
        <div class="fancy-ribbon-wrapper seriftype">
            <div class="fancy-ribbon"><span>
			<?php if ($smof_data['bnk_profiles_title']) {
				echo stripslashes($smof_data['bnk_profiles_title']);				
			} else {
				_e('Featured Profiles','bhinneka');	
			}?>
            </span> </div>
        </div>
    </div>
    <div class="profiles-content row ">
		<?php 
        $the_query = new WP_Query( 'post_type=profile&posts_per_page=4' ); 
        while ( $the_query->have_posts() ) : $the_query->the_post();?>
        <div class="profile-post col_4">
			<?php if ( (has_post_thumbnail() && function_exists('has_post_thumbnail'))) { ?>
                <div class="profile-image fleft boxshadow"><?php the_post_thumbnail( 'profile-thumbnail' ); ?></div>
            <?php } ?>
           
            <div class="profile-post-content">
                <h4 class="replace inset"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bhinneka'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                <?php the_excerpt();?>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata();?>
    </div>
</section>
<!-- PROFILES END --> 