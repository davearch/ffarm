<!-- #DONATE BEGIN -->
<section id="donate" class="row">
    <div class="col_16">
		<?php if ($smof_data['bnk_donation_title']) { ?>
        <div class="vintage-ribbon-wrapper">
            <div class="vintage-ribbon seriftype inset-light"><span>
            	<?php echo stripslashes($smof_data['bnk_donation_title']); ?>           		
            </span></div>
        </div>
        <?php }; ?>
    </div>
    <div class="donate-content col_16">
			<?php
			    if ($smof_data['bnk_donation_img']) {
					$buttons = $smof_data['bnk_donation_img']; 
					foreach ($buttons as $button) {
						$btntitle = $button['title'];
						$btnurl = $button['url'];
						$btnlink = $button['link'];
						$btndesc = $button['description'];
					echo '<div class="donation-button">';
					echo '<a href="'.$btnlink.'" title="'.$btntitle.'"><img src="'.$btnurl.'" alt="'.$btndesc.'"/> </a></div>';
				};
			} ?>
    </div>
	<?php if ($smof_data['bnk_donation_other']) { ?>
    <div class="col_16">
        <div class="textcenter donate-other seriftype">
            <p><a href="
            <?php if ( $smof_data['bnk_donation_other_link'] ) { echo home_url( '/' ); ?>?page_id=<?php echo $smof_data['bnk_donation_other_link']; } ?>" class="tshadow">
			<?php echo stripslashes($smof_data['bnk_donation_other']); ?>                   
            </a></p>
        </div>
    </div>
    <?php }; ?>
    
</section>
<!-- #DONATE END --> 