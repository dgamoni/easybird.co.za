<?php 
$sp_addon =$addon['field-name'];
$sp_addon = explode('-', $sp_addon);  
$sp_addon =  array_slice($sp_addon, 1, -1);
$sp_addon = implode('-', $sp_addon); 

 ?>
<div id="panelDetails_<?php echo sanitize_title( $sp_addon ); ?>_<?php echo get_the_ID(); ?>" class="collapse"> 
	<?php foreach ( $addon['options'] as $key => $option ) :
		$addon_key     = 'addon-' . sanitize_title( $addon['field-name'] );
		$option_key    = empty( $option['label'] ) ? $key : sanitize_title( $option['label'] );
		$current_value = isset( $_POST[ $addon_key ] ) && isset( $_POST[ $addon_key ][ $option_key ] ) ? wc_clean( $_POST[ $addon_key ][ $option_key ] ) : '';
		$price = apply_filters( 'woocommerce_product_addons_option_price',
			$option['price'] > 0 ? '(' . wc_price( get_product_addon_price_for_display( $option['price'] ) ) . ')' : '',
			$option,
			$key,
			'custom_textarea'
		);
		?>

		<textarea cols="30" type="text" class="input-text addon addon-custom-textarea form-control" data-raw-price="<?php echo esc_attr( $option['price'] ); ?>" data-price="<?php echo get_product_addon_price_for_display( $option['price'] ); ?>" name="<?php echo $addon_key ?>[<?php echo $option_key; ?>]" rows="4" cols="20" <?php if ( ! empty( $option['max'] ) ) echo 'maxlength="' . $option['max'] .'"'; ?> placeholder="Put this any other informations..."><?php echo esc_textarea( $current_value ); ?></textarea>
          
	<?php endforeach; ?>
</div>