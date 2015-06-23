<?php

/**
 * Plugin Name: Bhinneka Latest Posts Widget
 * Version: 1.0
 * Author: Population2
 * Author URI: http://themeforest.net/user/population2?ref=population2
 **/


add_action( 'widgets_init', 'bnk_widget_latest_post' );

function bnk_widget_latest_post() {
	register_widget( 'bnk_widget_latest_post' );
}

class bnk_widget_latest_post extends WP_Widget {

function bnk_widget_latest_post() {

	$widget_ops = array(
		'classname' => 'bnk_widget_latest_post',
		'description' => __('Display latest post from any categories', 'bhinneka')
	);

	$this->WP_Widget( 'bnk_widget_latest_post', __('Bhinneka Latest Posts', 'bhinneka'), $widget_ops );
	
}


//	Outputs the options form on admin
	
function form( $instance ) {

	$defaults = array(
		'title' => 'Latest Post',				
		'cat' => '',	
		'count' => 5,
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'bhinneka') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e('Category ID:', 'bhinneka') ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" value="<?php echo $instance['cat']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number of posts:', 'bhinneka') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" />
	</p>
		
	<?php
	}


//	Processes widget options to be saved
	
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['cat'] = strip_tags( $new_instance['cat'] );
	$instance['count'] = strip_tags( $new_instance['count'] );

	return $instance;
}

//	Outputs the content of the widget
	
function widget( $args, $instance ) {
	extract( $args );
	
	$title = $instance['title'] ;
	$cat = $instance['cat'];
	$count = $instance['count'];

	echo $before_widget;
	if ( $title )
		echo $before_title . $title . $after_title;
	?>	
		
	<div class="bnk-post-list">
		<ul>
		<?php 
		$query = new WP_Query();
		$query->query('cat='.$cat.'&posts_per_page='.$count);
		?>
		<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
		<li>
			<div class="clearfix">			
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
				<div class="fleft mobile-hide"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail', array('class' => 'image-border-small') ); ?></a></div>
				<?php endif; ?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<p class="meta-sidebar"><?php echo get_the_date(); ?></p>
                <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
                <div class="clear"></div>
				<?php endif; ?>
			</div>
		</li>
		<?php endwhile; endif; ?>
		<?php wp_reset_query(); ?>	
		</ul>		
	</div>		
	<?php	
	echo $after_widget;
	}

}
?>