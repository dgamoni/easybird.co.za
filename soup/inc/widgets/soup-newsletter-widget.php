<?php

add_action('widgets_init', 'soup_newsletter_load_widgets');
function soup_newsletter_load_widgets(){
	register_widget('soup_newsletter_Widget');
}


class soup_newsletter_Widget extends WP_Widget {
	function __construct(){
		$widget_ops = array('classname' => 'soup-newsletter-widget', 'description' => esc_html__('Soup: Newsletter Widget','soup') );
		$control_ops = array('id_base' => 'soup_newsletter-widget');
		parent::__construct('soup_newsletter-widget', esc_html__('Soup: Newsletter Widget','soup'), $widget_ops, $control_ops);
	}

	function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		} ?>
		<!-- start coding  --> 
			<?php if(isset($instance['scode'])): ?> 
                <?php echo do_shortcode($instance['scode']); ?>
            <?php endif; ?>
			<?php if(isset($instance['social_title'])): ?> 
		    	<h5 class="text-muted mb-3 mt-3"><?php printf(esc_html__('%s','soup'),$instance['social_title']); ?></h5>
            <?php endif; ?>
			<?php if(isset($instance['fb']) && $instance['fb']!= ''): ?> 
		    	<a href="<?php echo esc_url($instance['fb']); ?>" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
            <?php endif; ?>
			<?php if(isset($instance['gp']) && $instance['gp']!= ''): ?> 
		    	<a href="<?php echo esc_url($instance['gp']); ?>" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
            <?php endif; ?>
			<?php if(isset($instance['tw']) && $instance['tw']!= ''): ?> 
		    	<a href="<?php echo esc_url($instance['tw']); ?>" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
            <?php endif; ?>
			<?php if(isset($instance['yt']) && $instance['yt']!= ''): ?> 
		    	<a href="<?php echo esc_url($instance['yt']); ?>" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
            <?php endif; ?>
			<?php if(isset($instance['ins']) && $instance['ins']!= ''): ?> 
		    	<a href="<?php echo esc_url($instance['ins']); ?>" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
            <?php endif; ?> 
		<!-- start code here -->

		<?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title']); 
		$instance['scode'] = sanitize_text_field( $new_instance['scode']); 
		$instance['social_title'] = sanitize_text_field( $new_instance['social_title']); 
		$instance['fb'] = sanitize_text_field( $new_instance['fb']); 
		$instance['gp'] = sanitize_text_field( $new_instance['gp']); 
		$instance['tw'] = sanitize_text_field( $new_instance['tw']); 
		$instance['yt'] = sanitize_text_field( $new_instance['yt']); 
		$instance['ins'] = sanitize_text_field( $new_instance['ins']);   
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Subscribe Us!','scode' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><b><?php esc_html_e('Title','soup'); ?>: </b></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>   
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('scode')); ?>"><?php esc_html_e('Shortcode','soup'); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('scode')); ?>" name="<?php echo esc_attr($this->get_field_name('scode')); ?>" value="<?php echo esc_attr($instance['scode']); ?>" />
		</p> 
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('social_title')); ?>"><b><?php esc_html_e('Social Media Title','soup'); ?>: </b></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_title')); ?>" name="<?php echo esc_attr($this->get_field_name('social_title')); ?>" value="<?php echo esc_attr($instance['social_title']); ?>" />
		</p>   
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('fb')); ?>"><?php esc_html_e('Facebook','soup'); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('fb')); ?>" name="<?php echo esc_attr($this->get_field_name('fb')); ?>" value="<?php echo esc_attr($instance['fb']); ?>" />
		</p> 
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('gp')); ?>"><?php esc_html_e('Google Plus','soup'); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('gp')); ?>" name="<?php echo esc_attr($this->get_field_name('gp')); ?>" value="<?php echo esc_attr($instance['gp']); ?>" />
		</p> 
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('tw')); ?>"><?php esc_html_e('Twitter','soup'); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('tw')); ?>" name="<?php echo esc_attr($this->get_field_name('tw')); ?>" value="<?php echo esc_attr($instance['tw']); ?>" />
		</p> 
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('yt')); ?>"><?php esc_html_e('Youtube','soup'); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('yt')); ?>" name="<?php echo esc_attr($this->get_field_name('yt')); ?>" value="<?php echo esc_attr($instance['yt']); ?>" />
		</p>  
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('ins')); ?>"><?php esc_html_e('Instagram','soup'); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('ins')); ?>" name="<?php echo esc_attr($this->get_field_name('ins')); ?>" value="<?php echo esc_attr($instance['ins']); ?>" />
		</p> 
	<?php
	}
}


