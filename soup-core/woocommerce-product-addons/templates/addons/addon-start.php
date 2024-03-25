<div class="<?php if ( 1 == $required ) echo 'required-product-addon'; ?> product-addon product-addon-<?php echo sanitize_title( $name ); ?> panel-details">

	<?php do_action( 'wc_product_addon_start', $addon ); ?>

	<?php if ( $name ) : ?>

        <h5 class="panel-details-title">
            <label class="custom-control custom-radio">
                <input name="radio_title_<?php echo sanitize_title( $name ); ?>" type="radio" class="custom-control-input">
                <span class="custom-control-indicator"></span>
            </label>
            <a href="#panelDetails_<?php echo sanitize_title( $name ); ?>_<?php echo get_the_ID(); ?>" data-toggle="collapse"><?php echo wptexturize( $name ); ?> <?php if ( 1 == $required ) echo '<abbr class="required" title="' . __( 'Required field', 'woocommerce-product-addons' ) . '">*</abbr>'; ?></a>
        </h5>
		<!-- <h3 class="addon-name panel-details-title"><?php echo wptexturize( $name ); ?> <?php if ( 1 == $required ) echo '<abbr class="required" title="' . __( 'Required field', 'woocommerce-product-addons' ) . '">*</abbr>'; ?></h3> -->
	<?php endif; ?>

	<?php if ( $description ) : ?>
		<?php echo '<div class="addon-description">' . wpautop( wptexturize( $description ) ) . '</div>'; ?>
	<?php endif; ?>

	<?php do_action( 'wc_product_addon_options', $addon ); ?>
