<?php 
$sp_addon =$addon['field-name'];
$sp_addon = explode('-', $sp_addon);  
$sp_addon =  array_slice($sp_addon, 1, -1);
$sp_addon = implode('-', $sp_addon); 

 ?>
<div id="panelDetails_<?php echo sanitize_title( $sp_addon ); ?>_<?php echo get_the_ID(); ?>" class="collapse pdon-check">
    <div class="panel-details-content">
		<?php foreach ( $addon['options'] as $i => $option ) :

			$price = apply_filters( 'woocommerce_product_addons_option_price',
				$option['price'] > 0 ? '(' . wc_price( get_product_addon_price_for_display( $option['price'] ) ) . ')' : '',
				$option,
				$i,
				'checkbox'
			);

			$selected = isset( $_POST[ 'addon-' . sanitize_title( $addon['field-name'] ) ] ) ? $_POST[ 'addon-' . sanitize_title( $addon['field-name'] ) ] : array();
			if ( ! is_array( $selected ) ) {
				$selected = array( $selected );
			}

			$current_value = ( in_array( sanitize_title( $option['label'] ), $selected ) ) ? 1 : 0;
			?> 
            <div class="form-group">
                <label class="custom-control custom-checkbox">
                	<input type="checkbox" class="custom-control-input addon addon-checkbox" name="addon-<?php echo sanitize_title( $addon['field-name'] ); ?>[]" data-raw-price="<?php echo esc_attr( $option['price'] ); ?>" data-price="<?php echo get_product_addon_price_for_display( $option['price'] ); ?>" value="<?php echo sanitize_title( $option['label'] ); ?>" <?php checked( $current_value, 1 ); ?> />  
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo wptexturize( $option['label'] . ' ' . $price ); ?></span>
                </label>
            </div>
 

		<?php endforeach; ?>
 
    </div>
</div>