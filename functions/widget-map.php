<?php

/**
 * Plugin Name: Bhinneka Map Widget
 * Version: 1.0
 * Author: Population2
 * Author URI: http://themeforest.net/user/population2?ref=population2
 **/


add_action( 'widgets_init', 'bnk_widget_map' );

function bnk_widget_map() {
	register_widget( 'bnk_widget_map' );
}

class bnk_widget_map extends WP_Widget {

function bnk_widget_map() {

	$widget_ops = array(
		'classname' => 'bnk_widget_map',
		'description' => __('Display map', 'bhinneka')
	);

	$this->WP_Widget( 'bnk_widget_map', __('Bhinneka Map', 'bhinneka'), $widget_ops );
	
}


//	Outputs the options form on admin
	
function form( $instance ) {

	$defaults = array(
		'title' => 'Directions',
		'subtitle' => 'to our centers',
		'code' => '',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'bhinneka') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e('Subtitle:', 'bhinneka') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" value="<?php echo $instance['subtitle']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'code' ); ?>"><?php _e('Google map link (without iframe):', 'bhinneka') ?></label>
		<textarea style="height:150px;" class="widefat" id="<?php echo $this->get_field_id( 'code' ); ?>" name="<?php echo $this->get_field_name( 'code' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['code'] ), ENT_QUOTES)); ?></textarea>
	</p>

	<?php
	}


//	Processes widget options to be saved
	
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['subtitle'] = strip_tags( $new_instance['subtitle'] );
	$instance['code'] = stripslashes( $new_instance['code']);

	return $instance;
}

//	Outputs the content of the widget
	
function widget( $args, $instance ) {
	extract( $args );
	
	$title = $instance['title'] ;
	$subtitle = $instance['subtitle'];
	$code = $instance['code'];

	echo $before_widget;
	echo '<div class="bnk-directions">';
	echo '<span class="map-icon mobile-hide">&nbsp;</span>';
	echo '<h3 class="replace inset"><a href="#">' . $title . '</a></h3>
		<p class="subhead">' . $subtitle . '</p></div> ';
	?>
   	
	<script type="text/javascript">
		jQuery(function($){
			$(".bnk-directions").colorbox({iframe:true, innerWidth:"70%", opacity:"0.7", innerHeight:"70%", href:"<?php echo $code ?>&iwloc=A&output=embed" });
		});
	</script>
   
    
		
	<?php	
	echo $after_widget;
	}
					
}
?>