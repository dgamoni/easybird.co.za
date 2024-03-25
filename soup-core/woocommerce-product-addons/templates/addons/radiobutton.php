<?php 
$sp_addon =$addon['field-name'];
$sp_addon = explode('-', $sp_addon);  
$sp_addon =  array_slice($sp_addon, 1, -1);
$sp_addon = implode('-', $sp_addon); 

 ?>
<div id="panelDetails_<?php echo sanitize_title( $sp_addon ); ?>_<?php echo get_the_ID(); ?>" class="collapse pdon-radio">
    <div class="panel-details-content">

		<?php foreach ( $addon['options'] as $i => $option ) :

			$price = apply_filters( 'woocommerce_product_addons_option_price',
				$option['price'] > 0 ? '(' . wc_price( get_product_addon_price_for_display( $option['price'] ) ) . ')' : '',
				$option,
				$i,
				'radiobutton'
			);
			$current_value = 0;

			if ( isset( $_POST[ 'addon-' . sanitize_title( $addon['field-name'] ) ] ) ) {
				$current_value = (
						isset( $_POST[ 'addon-' . sanitize_title( $addon['field-name'] ) ] ) &&
						in_array( sanitize_title( $option['label'] ), $_POST[ 'addon-' . sanitize_title( $addon['field-name'] ) ] )
						) ? 1 : 0;
			}
			?>

            <div class="form-group">
                <label class="custom-control custom-radio">
                	<input type="radio" class="custom-control-input addon addon-radio" name="addon-<?php echo sanitize_title( $addon['field-name'] ); ?>[]" data-raw-price="<?php echo esc_attr( $option['price'] ); ?>" data-price="<?php echo get_product_addon_price_for_display( $option['price'] ); ?>" value="<?php echo sanitize_title( $option['label'] ); ?>" <?php checked( $current_value, 1 ); ?> /> 
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo wptexturize( $option['label'] . ' ' . $price ); ?></span>
                </label>
            </div> 
		<?php endforeach; ?>

 
 
    </div>
</div>
