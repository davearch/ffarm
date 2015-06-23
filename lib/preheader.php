<!-- ADDTHIS BEGIN -->
<?php
		$rss =  $smof_data['bnk_sm_rss'];
		$email =  $smof_data['bnk_sm_email'];
		$facebook =  $smof_data['bnk_sm_facebook'];
		$flickr =  $smof_data['bnk_sm_flickr'];
        $instagram =  $smof_data['bnk_sm_instagram'];
        $pinterest =  $smof_data['bnk_sm_pinterest'];
		$twitter =  $smof_data['bnk_sm_twitter'];
		$vimeo =  $smof_data['bnk_sm_vimeo'];
		$youtube =  $smof_data['bnk_sm_youtube'];
		$gplus =  $smof_data['bnk_sm_gplus'];

	if ( $rss || $email || $facebook || $flickr || $instagram || $pinterest || $twitter || $vimeo || $youtube || $gplus != '' )

	{
	echo '<div class="col_3"><ul class="social_toolbox fleft">'	;


		if ( $rss != '') {
			?><li><a href="<?php echo $rss; ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri() ?>/img/icons/rss.png" alt="RSS icon" />
				</a></li><?php
		} else  {
			echo ''; //If no URL inputed
		}
		if ( $email != '') {
			?><li><a href="mailto:<?php echo $email; ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri() ?>/img/icons/email.png" alt="Email icon" />
				</a></li><?php
		} else {
			echo ''; //If no URL inputed
		}

		if ( $facebook != '') {
			?><li><a href="<?php echo $facebook; ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri() ?>/img/icons/facebook.png" alt="Facebook icon" />
				</a></li><?php
		} else {
			echo ''; //If no URL inputed
		}

		if ( $flickr != '') {
			?><li><a href="<?php echo $flickr; ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri() ?>/img/icons/flickr.png" alt="Flickr icon" />
				</a></li><?php
		} else {
			echo ''; //If no URL inputed
		}

        if ( $instagram != '') {
        ?><li><a href="<?php echo $instagram; ?>" target="_blank">
            <img src="<?php echo get_template_directory_uri() ?>/img/icons/instagram.png" alt="instagram icon" />
            </a></li><?php
        } else {
            echo ''; //If no URL inputed
        }

        if ( $pinterest != '') {
            ?><li><a href="<?php echo $pinterest; ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/img/icons/pinterest.png" alt="pinterest icon" />
                </a></li><?php
        } else {
            echo ''; //If no URL inputed
        }

		if ( $twitter != '') {
			?><li><a href="<?php echo $twitter; ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri() ?>/img/icons/twitter.png" alt="Twitter icon" />
				</a></li><?php
		} else {
			echo ''; //If no URL inputed
		}

		if ( $vimeo != '') {
			?><li><a href="<?php echo $vimeo; ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri() ?>/img/icons/vimeo.png" alt="Vimeo icon" />
				</a></li><?php
		} else {
			echo ''; //If no URL inputed
		}

		if ( $youtube != '') {
			?><li><a href="<?php echo $youtube; ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri() ?>/img/icons/youtube.png" alt="Youtube icon" />
				</a></li><?php
		} else {
			echo ''; //If no URL inputed
		}

		if ( $gplus != '') {
			?><li><a href="<?php echo $gplus; ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri() ?>/img/icons/googleplus.png" alt="Google+ icon" />
				</a></li><?php
		} else {
			echo ''; //If no URL inputed
		}


		echo '</ul></div>';
		echo '<div class="col_5 pre_8 last" id="secondary-nav" role="navigation">';

	} else { ?>
		<div class="col_16" id="secondary-nav" role="navigation">
	<?php } ?>


	<?php if ( has_nav_menu( 'secondary' ) ) { /* if menu 'Secondary' menu exists then use Custom Menu */ ?>
		<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'unstyled' ) ); ?>
	<?php } else { /* else display none */?>
	<?php } ?>
</div>
<!-- SECONDARY NAVIGATION END -->