	 <div class="slider-container row">
        <!-- SLIDER BEGIN -->

        <?php if ($smof_data['bnk_slider_alt_control'] == '0') { ?>
            <div class="flexslider col_16">
		<?php } else { ?>
            <div class="flexslider mobile-hide col_16">
		<?php } ?>

                <ul class="slides">
                    <?php
                    $query = new WP_Query();
                    $query->query('post_type='.__( 'slide' ).'&posts_per_page=-1');
                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                    	$caption = get_post_meta(get_the_ID(), 'bnk_image_caption', true) ;
                    	$url = get_post_meta(get_the_ID(), 'bnk_image_url', true) ;
                    	if ($url != "" ) { ?>
                            <li>
                            	<a href="<?php echo $url; ?>" ><?php the_post_thumbnail( 'slide-image' , array('title' => $caption) ); ?></a>
                                <?php if ($caption ) { ?>
                                <p class="flex-caption"><?php echo $caption; ?></p>
                                <?php }  ?>
                            </li>
						<?php } else { ?>
                            <li>
								<?php the_post_thumbnail( 'slide-image' , array('title' => $caption) ); ?>
                                <?php if ($caption ) { ?>
                                <p class="flex-caption"><?php echo $caption; ?></p>
                                <?php }  ?>
                            </li>
						<?php } ?>
                	<?php endwhile;  endif; // loop end?>
                </ul>
        	</div>
        <!-- SLIDER END -->

        <?php if ($smof_data['bnk_slider_alt_control'] == '1' ) { ?>
            <!-- ALTERNATIVE TEXT BEGIN
            This will replace the Slider on mobile version -->
            <div class="mobile-only col_16" id="slider-mobile">
                <h1 class="seriftype respond_1 textcenter"><?php echo $smof_data['bnk_slider_alt']  ?></h1>
            </div>
            <!-- ALTERNATIVE TEXT END -->
        <?php } ?>

    </div>


