<?php
/*
 * The Sidebar containing the primary widget.
 */
?>

<div id="sidebar" class="col_4 last">

	<?php
        global $smof_data;
		if ($smof_data['bnk_subpages_nav'] == '1') { ?>

        <!--Sub pages nav begin-->
        <?php if($post->post_parent) {
             $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
        } else {
             $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
        } if ($children) { ?>
            <ul id="submenu" >
            <?php echo $children; ?>
            </ul>
        <?php } ?>
    <?php } ?>
    <!--Sub pages nav end-->

    <?php if ( ! dynamic_sidebar( 'sidebar-main' ) ) : ?>

        <aside id="archives" class="widget">
            <h3 class="widget-title"><?php _e( 'Archives', 'bhinneka' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>

        <aside id="meta" class="widget">
            <h3 class="widget-title"><?php _e( 'Meta', 'bhinneka' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>

    <?php endif; // end sidebar widget area ?>
</div><!-- #secondary .widget-area -->




