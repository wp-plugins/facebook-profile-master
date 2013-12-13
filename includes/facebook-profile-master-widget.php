<?php
//Hook Widget
add_action( 'widgets_init', 'facebook_profile_master_widget' );
//Register Widget
function facebook_profile_master_widget() {
register_widget( 'facebook_profile_master_widget' );
}

class facebook_profile_master_widget extends WP_Widget {
	function facebook_profile_master_widget() {
	$widget_ops = array( 'classname' => 'Facebook Profile Master', 'description' => __('Facebook Profile Master gives you full control over all Facebook User Profile plugins, Facebook User Badges and Facebook Follow Button. ', 'facebook_profile_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'facebook_profile_master_widget' );
	$this->WP_Widget( 'facebook_profile_master_widget', __('Facebook Profile Master', 'facebook_profile_master'), $widget_ops, $control_ops );
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
	//Display Facebook Badge

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
		$instance['show_facebook_badge'] = $new_instance['show_facebook_badge'];
		$instance['facebook_badge_code'] = $new_instance['facebook_badge_code'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'name' => __('Facebook Profile Master', 'facebook_profile_master'), 'title' => true, 'show_facebook_follow' => false, 'facebook_user_page' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['title'], true ); ?> id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><b><?php _e('Display Widget Title', 'facebook_profile_master'); ?></b></label></br>
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_facebook_follow'], true ); ?> id="<?php echo $this->get_field_id( 'show_facebook_follow' ); ?>" name="<?php echo $this->get_field_name( 'show_facebook_follow' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_facebook_follow' ); ?>"><b><?php _e('Display Facebook Follow Button', 'facebook_profile_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'facebook_user_page' ); ?>"><?php _e('insert Facebook Profile link:', 'facebook_profile_master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'facebook_user_page' ); ?>" name="<?php echo $this->get_field_name( 'facebook_user_page' ); ?>" value="<?php echo $instance['facebook_user_page']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Display Facebook Badge</b>
	</p>
	<div class="description">Only available in advanced version.</div><br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Shortcode Framework</b>
	</p>
	<div class="description">The shortcode framework allows you to insert Facebook Profile Master inside Pages & Posts without the need of extra plugins or gimmicks. Fast page load times and top SEO. Only available in advanced version.</div>
	<br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Facebook Profile Master Website</b>
	</p>
	<p><a class="button-secondary" href="http://wordpress.techgasp.com/facebook-profile-master/" target="_blank" title="Facebook Profile Master Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/facebook-profile-master-documentation/" target="_blank" title="Facebook Profile Master Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.techgasp.com/facebook-profile-master/" target="_blank" title="Facebook Profile Master">Adv. Version</a></p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
		<p>
		<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
		&nbsp;
		<b>Advanced Version Updater:</b>
		</p>
		<div class="description">The advanced version updater allows to automatically update your advanced plugin. Only available in advanced version.</div>
		<br>
	<?php
	}
 }
?>