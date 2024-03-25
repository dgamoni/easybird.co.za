<?php

add_action('widgets_init', 'soup_about_load_widgets');
function soup_about_load_widgets(){
	register_widget('soup_about_Widget');
}


class soup_about_Widget extends WP_Widget {
	function __construct(){
		$widget_ops = array('classname' => 'soup-about-widget', 'description' => esc_html__('Soup: About Widget','soup') );
		$control_ops = array('id_base' => 'soup_about-widget');
		parent::__construct('soup_about-widget', esc_html__('Soup: About Widget','soup'), $widget_ops, $control_ops);
	}

	function widget($args, $instance){
		extract($args); 
		echo $before_widget;
 
		?> 
		<!-- start coding  --> 
			<?php if(isset($instance['image_uri'])): ?>
		        <div class="text-center">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($instance['image_uri']); ?>" alt="<?php esc_attr_e('Logo','soup') ?>" width="<?php echo (isset($instance['lwidth'])) ? $instance['lwidth'] : '88px'; ?>" height="<?php echo (isset($instance['lheight'])) ? $instance['lheight'] : '96px'; ?>" class="mt-5 mb-5"></a>
                </div> 
	        <?php endif; ?>  
		<!-- start code here -->

		<?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance){
		$instance = $old_instance; 
		$instance['image_uri'] = sanitize_text_field( $new_instance['image_uri']);  
		$instance['lheight'] = sanitize_text_field( $new_instance['lheight']);  
		$instance['lwidth'] = sanitize_text_field( $new_instance['lwidth']);  
		return $instance;
	}

	function form($instance)
	{
		$defaults = array( 'image_uri' => '','lwidth' => '88px','lheight' => '96px' );
		$instance = wp_parse_args((array) $instance, $defaults); 
		$uniqid = 'id-'.mt_rand(0,10000).mt_rand(50,10000);?> 
		<p>
			<label style="display:block;" for="<?php echo esc_attr($this->get_field_id('image_uri')); ?>"><?php esc_html_e( 'Upload Image:','soup' ); ?></label>
			<img class="custom_media_image <?php echo esc_attr($uniqid); ?>" src="<?php if(!empty($instance['image_uri'])){echo esc_url($instance['image_uri']);} ?>" style="margin:0;padding:0;max-width:100px;display:inline-block" />
        	<input type="text" class="widefat custom_media_url <?php echo esc_attr($uniqid); ?>" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" id="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" value="<?php echo esc_attr($instance['image_uri']); ?>">
        	<a href="#" id="custom_media_button" style="margin-top:10px;" class="button button-primary custom_media_button"><?php esc_html_e('Upload', 'soup'); ?></a>
    	</p> 
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('lwidth')); ?>"><b><?php esc_html_e('Image Width','soup'); ?>: </b></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('lwidth')); ?>" name="<?php echo esc_attr($this->get_field_name('lwidth')); ?>" value="<?php echo esc_attr($instance['lwidth']); ?>" />
			<span>Input with value with px </span>
		</p>   
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('lheight')); ?>"><b><?php esc_html_e('Image Width','soup'); ?>: </b></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('lheight')); ?>" name="<?php echo esc_attr($this->get_field_name('lheight')); ?>" value="<?php echo esc_attr($instance['lheight']); ?>" />
			<span>Input with value with px </span>
		</p>   
	<?php
	}
}


