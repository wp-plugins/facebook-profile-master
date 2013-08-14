<?php
//Load Shortcode Framework

//Hook Widget
add_action( 'widgets_init', 'techgasp_facebookprofilemaster_widget' );
//Register Widget
function techgasp_facebookprofilemaster_widget() {
register_widget( 'techgasp_facebookprofilemaster_widget' );
}

class techgasp_facebookprofilemaster_widget extends WP_Widget {
	function techgasp_facebookprofilemaster_widget() {
	$widget_ops = array( 'classname' => 'Facebook Profile Master', 'description' => __('Facebook Profile Master gives you full control over all Facebook User Profile plugins, Facebook User Badges and Facebook Follow Button. ', 'Facebook Profile Master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'techgasp_facebookprofilemaster_widget' );
	$this->WP_Widget( 'techgasp_facebookprofilemaster_widget', __('Facebook Profile Master', 'facebook profile master'), $widget_ops, $control_ops );
	}
	
function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$name = "Facebook Profile Master";
		$title = isset( $instance['title'] ) ? $instance['title'] :false;
		$facebookprofilespacer ="'";
		$show_facebook_follow = isset( $instance['show_facebook_follow'] ) ? $instance['show_facebook_follow'] :false;
		$facebook_user_page = $instance['facebook_user_page'];
		echo $before_widget;
		
		// Display the widget title
	if ( $title )
		echo $before_title . $name . $after_title;
		//Display Facebook Follow
	if ( $show_facebook_follow )
			echo '<iframe src="//www.facebook.com/plugins/follow?href='.$facebook_user_page.'&amp;layout=button_count&amp;show_faces=false&amp;colorscheme=light&amp;width=450&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:visible; width:450px; height:21px;" allowTransparency="true"></iframe>';
		echo $after_widget;
}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_facebook_follow'] = $new_instance['show_facebook_follow'];
		$instance['facebook_user_page'] = $new_instance['facebook_user_page'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'name' => __('Facebook Profile Master', 'facebook profile master'), 'title' => true, 'show_facebook_follow' => false, 'facebook_user_page' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<b>Check the buttons to be displayed:</b>
		<hr>
		<!--TITLE-->
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['title'], true ); ?> id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><b><?php _e('Display Widget Title', 'facebook profile master'); ?></b></label></br>
	</p>
	<hr>
		<!--FACEBOOK Follow-->
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_facebook_follow'], true ); ?> id="<?php echo $this->get_field_id( 'show_facebook_follow' ); ?>" name="<?php echo $this->get_field_name( 'show_facebook_follow' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_facebook_follow' ); ?>"><b><?php _e('Display Facebook Follow Button', 'facebook profile master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'facebook_user_page' ); ?>"><?php _e('insert Facebook Profile link:', 'facebook profile master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'facebook_user_page' ); ?>" name="<?php echo $this->get_field_name( 'facebook_user_page' ); ?>" value="<?php echo $instance['facebook_user_page']; ?>" style="width:auto;" />
	</p>
	<hr>
		<!--Facebook Badge-->
	<p><b>Facebook Badge Options:</b></p>
	<p>Advanced Version. Upgrade Now!</p>
	<hr>
		<!--NETWORKS-->
	<p><b>You have the lite plugin version. Upgrade now!!</b> Get full advanced options: * Display or hide Widget Title * Facebook Profile Badge * Facebook Photo Badge * Facebook Like Badge * Facebook Page Badge * Facebook Follow Button * Shortcode Framework to publish widget inside pages and posts.</p>
	<p><a class="button-primary" href="http://wordpress.techgasp.com/facebook-profile-master/" target="_blank" title="Facebook Profile Master">Visit Facebook Profile Master</a></p>
	<?php
	}
 }
?>