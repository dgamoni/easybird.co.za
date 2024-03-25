<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.1
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'print_attribute_radio_custom' ) ) {
	function print_attribute_radio_custom( $checked_value, $value, $label, $name, $class ) {
		global $product;
		// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
		$checked = sanitize_title( $checked_value ) === $checked_value ? checked( $checked_value, sanitize_title( $value ), false ) : checked( $checked_value, $value, false );

		$input_name = 'attribute_' . esc_attr( $name ) ;

		$esc_value = esc_attr( $value );
		$id = esc_attr( $name . '_v_' . $value . $product->get_id() ); //added product ID at the end of the name to target single products
		$filtered_label = apply_filters( 'woocommerce_variation_option_name', $label );
		//printf( '<div><input type="radio" name="%1$s" value="%2$s" id="%3$s" %4$s><label for="%3$s" style="background:%5$s">%5$s</label></div>', $input_name, $esc_value, $id, $checked, $filtered_label, $filtered_label ); 
		// printf( ' <div class="form-group">
		// 		    <label class="custom-control custom-radio">
		// 		    	<input type="radio" name="%1$s" value="%2$s" id="%3$s" data-val="%6$s" class="_custom-control-input" %4$s> 
				        
		// 		        <span class="custom-control-description">%5$s</span>
		// 		    </label>
		// 		</div> ', $input_name, $esc_value, $id, $checked, $filtered_label, $class  );

		printf( '<div class="%7$s">
			<input type="radio" name="%1$s" value="%2$s" id="%3$s" data-val="%6$s" class="_custom-control-input" %4$s>
			<label for="%3$s">%5$s</label>
		</div> ', $input_name, $esc_value, $id, $checked, $filtered_label, $class, esc_attr( $name )  );

	}
}

global $product;


				// dgamoni fixit
				global $woocommerce, $post;

					    $available_variations = $product->get_available_variations();
					    
					    //echo "<pre style='display:none'>", var_dump($available_variations),"</pre>";

					    foreach ($available_variations as $key => $variation) 
						    { 

								$taxonomies = array_keys($variation['attributes']);
								$term_attribute = str_replace('attribute_', '', $taxonomies);
								//echo "<pre style='display:none'>", var_dump($taxonomies[$key]),"</pre>";
								//echo "<pre style='display:none'>", var_dump($variation),"</pre>";
						   		

						   		$t = $taxonomies[0];
						   		$t2 = $taxonomies[1];

								$variation_id = $variation['variation_id'];

					
						         $variation_obj = new WC_Product_variation($variation_id);
						         //var_dump($variation_obj);
						         //echo "<pre >", var_dump($variation_obj->get_backorders()),"</pre>";
						         $backorders = $variation_obj->get_backorders();
						         $stock = $variation_obj->get_stock_quantity();
						         $aval = '';
						         //var_dump($stock);
						         if ($stock>0) {
						         	$stock_val = $stock.' In stock';
						         	$aval = 'aval';
						         } else if ($stock == -1 ) {
						         	$stock_val = ' Out of stock (you can only order for a future date/time)';
						         } else if ($stock == 0 && $backorders == 'notify') {
						         	$stock_val = ' Out of stock (you can only order for a future date/time)';
						         } else if ($stock == 0 && $backorders == 'no') {
						         	$stock_val = ' Out of stock';
						         }

						        //echo "<pre style='display:none'>", var_dump($variation_obj), "</pre>";
						        

						        //echo "<pre style='display:none'>", var_dump($variation['attributes'][$t]), "</pre>";
						        //echo "<pre style='display:none'>", var_dump($variation['attributes'][$t2]), "</pre>";
						         $dataid2 = '';
						         if($variation['attributes'][$t2]) {
						         	$dataid2 = 'data-id2='.sanitize_title($variation['attributes'][$t2]);
						         }

						        //echo "<pre style='display:none'>", var_dump($variation['attributes']), "</pre>";
						        if($stock || $stock == 0):
						        	echo "<span class='available_stock ".$aval."' data-id='".sanitize_title($variation['attributes'][$t])."' ".$dataid2." style='display:none'>".$stock_val."</span>";
						    	endif;
						    }




// end fix


$attribute_keys = array_keys( $attributes );
//var_dump($attribute_keys);
//var_dump( $attributes);
//echo "<pre style='display:none'>", var_dump($attribute_keys),"</pre>";

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ) ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'soup' ); ?></p>
	<?php else : ?>  
				<?php $c = 0; ?>
				<?php foreach ( $attributes as $name => $options ) : 
				$c++;
				//var_dump($name);
				//var_dump($options);

			//$attribute_value_object = get_term_by( 'slug', $slug_value, 'attribute_ );

				$tab_id = rand(10,99);
				$nm_atr = strtolower(wc_attribute_label( $name )); 
				$nm_atr = str_replace(" ", "_", $nm_atr);
				//var_dump($nm_atr);


				?>
        <div class="variations panel-details">
            <h5 class="panel-details-title">
                <label class="custom-control custom-radio">
                    <input name="radio_title_<?php echo wc_attribute_label( $nm_atr ); ?>" type="radio" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                </label>
                <a href="#panelDetails_<?php echo $tab_id; ?>" data-toggle="collapse"><?php echo wc_attribute_label( $name ); ?></a>
            </h5>
						<?php
						$sanitized_name = sanitize_title( $name );
						if ( isset( $_REQUEST[ 'attribute_' . $sanitized_name ] ) ) {
							$checked_value = $_REQUEST[ 'attribute_' . $sanitized_name ];
						} elseif ( isset( $selected_attributes[ $sanitized_name ] ) ) {
							$checked_value = $selected_attributes[ $sanitized_name ];
						} else {
							$checked_value = '';
						}
						?>

            <div id="panelDetails_<?php echo $tab_id; ?>" class="collapse">
                <div class="panel-details-content value stok_wrap"> 
 
							<?php
							if ( ! empty( $options ) ) {
								if ( taxonomy_exists( $name ) ) {
									// Get terms if this is a taxonomy - ordered. We need the names too.
									$terms = wc_get_product_terms( $product->get_id(), $name, array( 'fields' => 'all' ) );

									foreach ( $terms as $term ) {
										if ( ! in_array( $term->slug, $options ) ) {
											continue;
										}
										print_attribute_radio( $checked_value, $term->slug, $term->name, $sanitized_name ); 
										
										
									}
								} else {
									foreach ( $options as $key=>$option ) {
										print_attribute_radio_custom( $checked_value, $option, $option, $sanitized_name, sanitize_title($option) );	 
										echo "<span class='stockk_".$key."_".$c." stockk ".sanitize_title($option)."' data-option='".sanitize_title($option)."' data-option2='".$sanitized_name."' id='stockk' ></span><br>";
										// echo "<pre style='display:none'>", var_dump($terms), "</pre>";

				// $nm_atr_term = strtolower( wc_attribute_label($option) ); 
				// $nm_atr_term = str_replace(" ", "_", $nm_atr_term);
				// echo "<pre style='display:none'>", var_dump($nm_atr), "</pre>";
				// echo "<pre style='display:none'>", var_dump($nm_atr_term), "</pre>";
										
									}
								}
							}

							?> 

                </div>
            </div>
        </div>
<?php echo end( $attribute_keys ) === $name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'soup' ) . '</a>' ) : ''; ?>
				<?php endforeach; ?> 

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<div class="single_variation_wrap"> 
			<?php
				do_action( 'woocommerce_before_single_variation' );
				do_action( 'woocommerce_single_variation' );
				do_action( 'woocommerce_after_single_variation' );
			?> 
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>



<?php 




          