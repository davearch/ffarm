<!-- #ACTION BEGIN -->
<section id="action" class="row">
	<div class="col_16">
        <div class="antique-ribbon-wrapper">
            <div class="antique-ribbon"><span class="seriftype">
                
    		<?php if ( $smof_data['bnk_action_title'] ) {     
				echo $smof_data['bnk_action_title']; 
			} else { 
				_e('How you can help?','bhinneka');
			}?>
               
            </span></div>
        </div>
    </div>
    
    <!-- Custom Menu begin -->
    <?php // custom walker
	if ($smof_data['bnk_action_items'] == '4 Items') {
    	$walker = new quickmenu_nav_walker_4;
	} else {
		$walker = new quickmenu_nav_walker_3;
	};
    wp_nav_menu(  array(
        'theme_location' => 'ctanav',
        'menu_class' => 'overview',
		'container_id' => 'cta-container',
        'walker' => $walker,
        'depth' => 1,
        'fallback_cb' => false
    )); ?>
    <!-- Custom Menu end -->
    <hr/>
</section>
<!-- #ACTION END --> 