<?php 

add_action( 'wp_enqueue_scripts', 'soup_enqueue_styles' );
function soup_enqueue_styles() { 
	
    // enqueue parent styles
	wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
	
	// enqueue child styles
	wp_enqueue_style('child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));

}


// Start writing your functions here




//add_action( 'wp_enqueue_scripts', 'load_old_jquery_fix', 100 );
 
function load_old_jquery_fix() {
    if ( ! is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" ), false, '1.11.3' );
        wp_enqueue_script( 'jquery' );
    }
}

add_action('wp_footer', 'add_custom_css');
function add_custom_css() { ?>

<?php 

if ( is_product() ){ ?>
	<script>
			jQuery(document).ready(function($) {
					$(".variations_form .single_add_to_cart_button").prop('disabled', 'disabled');
				});
	</script>
<?php } else { ?>
	<script>
			jQuery(document).ready(function($) {
					$(".variations_form .single_add_to_cart_button").each(function(index, el) {
						$(el).prop('disabled', 'disabled');
					});
				});
	</script>
<?php } ?>
	<script>
		jQuery(document).ready(function($) {

			$(".variations_form input[name='variation_id']").change(function(event) {
				//console.log( $(".variations_form input[name='variation_id']").val() );
				var modal = $(this).closest('.modal');
				//console.log(modal);
				var this_id = modal.attr('id');
				if(modal.length >0) {
					console.log('modal');
					if($("#"+this_id+" .variations_form input[name='variation_id']").val()) {
						$("#"+this_id+" .variations_form .single_add_to_cart_button").removeAttr("disabled");
					}
				} else {
					console.log('nomodal');
					if($(".variations_form input[name='variation_id']").val()) {
						$(".variations_form .single_add_to_cart_button").removeAttr("disabled");
					}	
				}

			});

// console.log( $(".variations_form input[name='variation_id']").val() );

// $(".variations_form .single_add_to_cart_button").each(function(index, el) {
// 	$(el).prop('disabled', 'disabled');
// });
    //.prop('disabled', 'disabled');  // Sets 'disabled' property
    //.prop('onclick', null)         // Removes 'onclick' property if found
    //.off('click'); 


		});
	</script>
	<style>
	#byconsolewooodt_delivery_type_field {
		display: none;
	}
	#byconsolewooodt_checkout_field {
		display: none;
	}
	.woocommerce-variation-availability {
		display: none;
	}
	.stockk {
		color: #ccc;
	}
	.stok_wrap div {
	    display: inline-block;
	    margin-right: 30px;
	}

	.combos .var_title {
		display: none;
	}
	.datastock:after {
		content: ';';
	}
/*	.datastock:last-child:after {
	  content: '';
	}*/

	</style>

	<script>
		jQuery(document).ready(function($) {

			$('.available_stock').each(function(index, el) {
				var id = $(this).attr("data-id");
				var id2 = $(this).attr("data-id2");
				var stock = $(this).text();
				//console.log(id);
				// console.log(id2);

				// console.log(stock);
				//console.log($(this).closest('.modal'));
				var modal = $(this).closest('.modal');
				
				if( modal.length > 0 ) {
					
					var this_id = modal.attr('id');
					//console.log('this_id:'+this_id);
					//console.log('id2:'+id2);
					if(id2) {
						if($(this).hasClass('aval')) {
							//console.log($('#'+this_id+' span[class*="'+id+'"]'));
							$('#'+this_id+' span[class*="'+id+'"]').append(' <span class="datastock datastock_avail" data-stock="'+id2+'">'+stock+'</span>');
							$('#'+this_id+' span[class*="'+id2+'"]').append(' <span class="datastock datastock_avail" data-stock="'+id+'">'+stock+'</span>');
						} else {
							$('#'+this_id+' span[class*="'+id+'"]').append(' <span class="datastock datastock_none" data-stock="'+id2+'">'+stock+'</span>');
							$('#'+this_id+' span[class*="'+id2+'"]').append(' <span class="datastock datastock_none" data-stock="'+id+'">'+stock+'</span>');
						}
						$('#'+this_id+' span[class*="'+id+'"] .datastock').first().addClass('first');
						$('#'+this_id+' span[class*="'+id2+'"] .datastock').first().addClass('first');
						//$('#'+this_id+' span[class*="'+id+'"] .datastock').not('.first').not('.datastock_avail').hide();
						//$('#'+this_id+' span[class*="'+id2+'"] .datastock').not('.first').not('.datastock_avail').hide();
						$('#'+this_id+' span[class*="'+id+'"] .datastock').not('.datastock_avail').hide();
						$('#'+this_id+' span[class*="'+id2+'"] .datastock').not('.datastock_avail').hide();


						

					} else {
						$('#'+this_id+' span[class*="'+id+'"]').text(stock);//for popup 
					}
				

				} else {
					
					if(id2) {
						if($(this).hasClass('aval')) {
							//console.log('id='+id);
							//console.log('id2='+id2);

							
							//$('span[class*="'+id+'"]').append('<span class="stock_'+id2+'">'+stock+'</span>');
							
							$('span[class*="'+id+'"]').append(' <span class="datastock datastock_avail" data-stock="'+id2+'">'+stock+'</span>');
							$('span[class*="'+id2+'"]').append(' <span class="datastock datastock_avail" data-stock="'+id+'">'+stock+'</span>');
						
						} else {

							$('span[class*="'+id+'"]').append(' <span class="datastock datastock_none" data-stock="'+id2+'">'+stock+'</span>');
							$('span[class*="'+id2+'"]').append(' <span class="datastock datastock_none" data-stock="'+id+'">'+stock+'</span>');
						}

						$('span[class*="'+id+'"] .datastock').first().addClass('first');
						$('span[class*="'+id2+'"] .datastock').first().addClass('first');
						// $('span[class*="'+id+'"] .datastock').not('.first').not('.datastock_avail').hide();
						// $('span[class*="'+id2+'"] .datastock').not('.first').not('.datastock_avail').hide();
						$('span[class*="'+id+'"] .datastock').not('.datastock_avail').hide();
						$('span[class*="'+id2+'"] .datastock').not('.datastock_avail').hide();

						
						var l1 = $('span[class*="'+id+'"] .datastock').not('.datastock_avail').length;
						$('span[class*="'+id+'"] .datastock').addClass('viz_'+l1);
						//$('.datastock.datastock_none.viz_1.viz_2').show();

						var l2 = $('span[class*="'+id2+'"] .datastock').not('.datastock_avail').length;
						$('span[class*="'+id2+'"] .datastock').addClass('viz_'+l2);
						//$('.datastock.datastock_none.viz_1.viz_2').show();


					
					} else {
						$('span[class*="'+id+'"]').text(stock); //for single
					}
					// $('span[class*="'+id+'"]').text(stock); //for single
				}

				//$('.panel-details-content').find('.'+id+'').text(stock);
				// $('span[class*="'+id+'"]').text(stock);
				
			});



					
			

			//console.log( $('.stockk_0_1').find('.datastock').length );
			var v01 = $('.single-product .stockk_0_1').find('.datastock').length;
			var v11 = $('.single-product .stockk_1_1').find('.datastock').length;
			var v21 = $('.single-product .stockk_2_1').find('.datastock').length;
			$('.single-product .stockk_0_1').addClass('v_'+v01);
			$('.single-product .stockk_1_1').addClass('v_'+v11);
			$('.single-product .stockk_2_1').addClass('v_'+v21);
			$('.single-product .v_3 .viz_1.viz_2.viz_3').show();

			var v02 = $('.single-product .stockk_0_2').find('.datastock').length;
			var v12 = $('.single-product .stockk_1_2').find('.datastock').length;
			var v22 = $('.single-product .stockk_2_2').find('.datastock').length;
			$('.single-product .stockk_0_2').addClass('v_'+v02);
			$('.single-product .stockk_1_2').addClass('v_'+v12);
			$('.single-product .stockk_2_2').addClass('v_'+v22);
			$('.single-product .v_2 .viz_1.viz_2').show();


			
			$('.page-id-152 .stockk_0_1').each(function(index, el) {
				var v01_m = $(el).find('.datastock').length;
				var v01_mm = $(el).find('.datastock.datastock_none').length;
				$(el).addClass('v_'+v01_m+' vv_'+v01_mm);
			});
			$('.page-id-152 .stockk_1_1').each(function(index, el) {
				var v11_m = $(el).find('.datastock').length;
				var v11_mm = $(el).find('.datastock.datastock_none').length;
				$(el).addClass('v_'+v11_m+' vv_'+v11_mm);
			});
			$('.page-id-152 .stockk_2_1').each(function(index, el) {
				var v21_m = $(el).find('.datastock').length;
				var v21_mm = $(el).find('.datastock.datastock_none').length;
				$(el).addClass('v_'+v21_m+' vv_'+v21_mm);
			});	
			$('.page-id-152 .stockk_0_2').each(function(index, el) {
				var v02_m = $(el).find('.datastock').length;
				var v02_mm = $(el).find('.datastock.datastock_none').length;
				$(el).addClass('v_'+v02_m+' vv_'+v02_mm);
			});
			$('.page-id-152 .stockk_1_2').each(function(index, el) {
				var v12_m = $(el).find('.datastock').length;
				var v12_mm = $(el).find('.datastock.datastock_none').length;
				$(el).addClass('v_'+v12_m+' vv_'+v12_mm);
			});
			$('.page-id-152 .stockk_2_2').each(function(index, el) {
				var v22_m = $(el).find('.datastock').length;
				var v22_mm = $(el).find('.datastock.datastock_none').length;
				$(el).addClass('v_'+v22_m+' vv_'+v22_mm);
			});																		
			//$('.page-id-152 .v_3 .viz_1.viz_2.viz_3').show();
			//$('.page-id-152 .v_2 .viz_1.viz_2').show();
			$('.v_3.vv_3 .datastock').first().show();
			$('.v_2.vv_2 .datastock').first().show();


			$('.which-quarter').parent().addClass('which-quarter-wrap');
			$('.chicken-flavour').parent().addClass('chicken-flavour-wrap');

			$('.postid-571 .which-quarter input').click(function(event) {
				//console.log($(this).attr('data-val'));
				var thisval = $(this).attr('data-val');
				var thiss = $(this);
				//$('.datastock').hide();
				console.log(thisval);
				$('.chicken-flavour-wrap .datastock').hide();

				$('.chicken-flavour-wrap .datastock').each(function(index, el) {
					//var ee = $(el).attr('data-stock');
					//console.log(ee);
					if( $(el).attr('data-stock') == thisval ){
						
						$(el).attr('data-stock',thisval).addClass('on');
						$(el).attr('data-stock',thisval).show();

						//$(el).show();
						//var pr = $(el).parent('.stockk').attr('data-option');
						//console.log(pr);

						//console.log( thiss.parent().parent().find('.datastock').attr('data-stock') );

						//thiss.parent().parent().find('.datastock').attr('data-stock', pr).show();
					}
				});
				

			});

			$('.postid-913 .chicken-flavour input').click(function(event) {
				//console.log($(this).attr('data-val'));
				var thisval = $(this).attr('data-val');
				var thiss = $(this);
				//$('.datastock').hide();
				console.log(thisval);
				$('.which-quarter-wrap .datastock').hide();

				$('.which-quarter-wrap .datastock').each(function(index, el) {
					//var ee = $(el).attr('data-stock');
					//console.log(ee);
					if( $(el).attr('data-stock') == thisval ){
						
						$(el).attr('data-stock',thisval).addClass('on');
						$(el).attr('data-stock',thisval).show();

						//$(el).show();
						//var pr = $(el).parent('.stockk').attr('data-option');
						//console.log(pr);

						//console.log( thiss.parent().parent().find('.datastock').attr('data-stock') );

						//thiss.parent().parent().find('.datastock').attr('data-stock', pr).show();
					}
				});
				

			});


			// menu page-id-152
			$('.page-id-152 .which-quarter input').click(function(event) {
				//console.log($(this).attr('data-val'));
				var thisval = $(this).attr('data-val');
				var thiss = $(this);
				//$('.datastock').hide();
				console.log(thisval);
				$('#productModal_571 .chicken-flavour-wrap .datastock').hide();

				$('#productModal_571 .chicken-flavour-wrap .datastock').each(function(index, el) {

					if( $(el).attr('data-stock') == thisval ){
						
						$(el).attr('data-stock',thisval).addClass('on');
						$(el).attr('data-stock',thisval).show();
					}
				});


				// $('#productModal_913 .which-quarter-wrap .datastock').hide();

				// $('#productModal_913 .which-quarter-wrap .datastock').each(function(index, el) {

				// 	if( $(el).attr('data-stock') == thisval ){
						
				// 		$(el).attr('data-stock',thisval).addClass('on');
				// 		$(el).attr('data-stock',thisval).show();
				// 	}
				// });				

			});

			$('.page-id-152 .chicken-flavour input').click(function(event) {
				
				var thisval = $(this).attr('data-val');
				var thiss = $(this);
				//$('.datastock').hide();
				console.log(thisval);

				$('#productModal_913 .which-quarter-wrap .datastock').hide();

				$('#productModal_913 .which-quarter-wrap .datastock').each(function(index, el) {

					if( $(el).attr('data-stock') == thisval ){
						
						$(el).attr('data-stock',thisval).addClass('on');
						$(el).attr('data-stock',thisval).show();
					}
				});				
			});


		});
</script>
	<?php
}


add_action( 'wp_loaded', function(){
	remove_action('woocommerce_after_order_notes', 'soup_own_checkout_field');
	add_action('woocommerce_before_checkout_billing_form', 'soup_own_checkout_field_child', 1);

	remove_action('woocommerce_checkout_update_order_meta', 'soup_own_checkout_field_update_order_meta');
	remove_action('woocommerce_checkout_update_user_meta', 'soup_own_checkout_field_update_user_meta');
	remove_filter( 'woocommerce_add_to_cart_fragments', 'soup_woocommerce_header_add_to_cart_fragment_2' );
} );

function wc_empty_cart_redirect_url() {
	return home_url('/menu');
}
add_filter( 'woocommerce_return_to_shop_redirect', 'wc_empty_cart_redirect_url' );

// product item count with ajax
add_filter( 'woocommerce_add_to_cart_fragments', 'soup_woocommerce_header_add_to_cart_fragment_2_child' );
function soup_woocommerce_header_add_to_cart_fragment_2_child( $fragments ) {
		global $woocommerce;
	ob_start();
	?>
    <div class="panel-cart-content minc-list">
		<?php if ( class_exists( 'WooCommerce' ) ) : ?>
	        <table class="table-cart min">
					<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				
				$terms = get_the_terms( $cart_item["product_id"], 'product_cat' );
				$product_cat_class= '';
				foreach ($terms as $key => $term) {
					//var_dump($term->slug);
					$product_cat_class .= ' '.$term->slug.' ';
				}
				

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) { ?>        	
	            <tr>
	                <td class="title <?php echo $product_cat_class; ?> ">
	                    <span class="name"><a href="#" data-toggle="modal"><?php echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product);?></a></span>
	                    <span class="caption text-muted"> 
	                    <?php  
							$item_id = ( !empty( $cart_item['variation_id'] ) ) ? $cart_item['variation_id'] : '';
							$V_product = new WC_Product_Variation( $item_id );
							$variation_data = $V_product->get_variation_attributes();
							//var_dump($variation_data);
							$variation_detail = woocommerce_get_formatted_variation( $variation_data, true ); 
							echo '<span class="var_title">' .str_replace(",", "<br>", $variation_detail) . '</span>'  ; 
						 
							echo WC()->cart->get_item_data( $cart_item );
						 
						?> 
						</span>
	                </td>  
	                <td class="price"><?php echo $cart_item['quantity']; ?> x <?php echo wc_price($_product->get_price());?></td>
	                <td class="actions"> 
	                    <a href="<?php echo esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) );?>" class="action-icon"><i class="ti ti-close"></i></a>
	                </td>
	            </tr>
					<?php } } ?>
	        </table>
	        <div class="cart-summary"> 
	        	<?php if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ): ?> 
		            <div class="row text-lg">
		                <div class="col-7 text-right text-muted"><?php esc_html_e('Total','soup'); ?>:</div>
		                <div class="col-5"><strong><?php echo $woocommerce->cart->get_cart_total();?></strong></div>
		            </div>
				<?php else: ?>
					<p><?php esc_html_e( 'No products in the cart.', 'soup' ); ?></p>
				<?php endif; ?>	
	        </div>
		<?php else : ?>
			<p><?php esc_html_e( 'No products in the cart.', 'soup' ); ?></p>
		<?php endif; ?> 
    </div>
	<?php
	$fragments['div.minc-list'] = ob_get_clean();
	return $fragments;
}



function soup_own_checkout_field_child( $checkout ) {

global $soup;

	$stock_class="";

	foreach( WC()->cart->get_cart() as $cart_item_key => $cart_item ){

	    // variable products
	    $variation_id = $cart_item['variation_id']; // Product Variation ID
	    if($variation_id != 0){
	        $product_variation_obj = wc_get_product($variation_id); // Product variation Object
	        $variation_array = $cart_item['variation']; // variation attributes + values
	        $variation_obj = new WC_Product_variation($variation_id);
			$stock = $variation_obj->get_stock_quantity();
	        //var_dump($stock);
	        if ($stock == 0 ) {
	        	//var_dump($stock);
	        	$stock_class .= " out_of_stock ";
	        } else if ( $stock == -1) {
	        	//var_dump($stock);
	        	$stock_class .= " out_of_stock ";
	        } else {
	        	//var_dump($stock);
	        	$stock_class .= " in_stock ";
	        }
	    }
	}

	$chck_delver_text_info = (isset($soup['chck-delver-text-info'])) ? $soup['chck-delver-text-info'] : '';

	echo '<div id="chck-delver-text-info"><p>'.$chck_delver_text_info.'</p></div>';

	echo '<div id="soup_own_checkout_field" class="'.$stock_class.'"><h3>'.__('Delivery','soup').'</h3>';
				
// global $soup;
$soup_checkout_deliver_opt1 = (isset($soup['chck-delver-opt1'])) ? $soup['chck-delver-opt1'] : '';
$soup_checkout_deliver_opt2 = (isset($soup['chck-delver-opt2'])) ? $soup['chck-delver-opt2'] : '';
//$soup_checkout_deliver_opt3 = (isset($soup['chck-delver-opt3'])) ? $soup['chck-delver-opt3'] : '';


	woocommerce_form_field( 'soup_deliver_time', array( 
		'type' 			=> 'select', 
		'options' 			=> array(
				'chck-delver-opt1' => $soup_checkout_deliver_opt1,
				'chck-delver-opt2' => $soup_checkout_deliver_opt2
				//,'chck-delver-opt3' => $soup_checkout_deliver_opt3
			), 
		'class' 		=> array('deliver-field-class  orm-row-first '), 
		'label' 		=> __('Delivery time:','soup'), 
		), $checkout->get_value( 'soup_deliver_time' ));
	
	echo '<p></p></div>';
	 
}

add_action('woocommerce_before_checkout_billing_form', 'soup_own_checkout_field_title',3);
function soup_own_checkout_field_title() {
	echo '<h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Basic informations</h4>';
}

//remove_action('woocommerce_checkout_update_order_meta', 'soup_own_checkout_field_update_order_meta');
add_action('woocommerce_checkout_update_order_meta', 'soup_own_checkout_field_update_order_meta_child');
	
function soup_own_checkout_field_update_order_meta_child( $order_id ) {
	if ($_POST['soup_deliver_time']) {
		$soup_deliver_time = $_POST['soup_deliver_time'];
		//$soup_deliver_time_res = ''
		global $soup;
		$soup_checkout_deliver_opt1 = $soup['chck-delver-opt1'];
		$soup_checkout_deliver_opt2 = $soup['chck-delver-opt2'];
		
		if($soup_deliver_time == 'chck-delver-opt1') {
			update_post_meta( $order_id, 'Delivery', $soup_checkout_deliver_opt1);
		} else if($soup_deliver_time == 'chck-delver-opt2') {
			update_post_meta( $order_id, 'Delivery', $soup_checkout_deliver_opt2);
		}

	}
}

// remove_action('woocommerce_checkout_update_user_meta', 'soup_own_checkout_field_update_user_meta');
add_action('woocommerce_checkout_update_user_meta', 'soup_own_checkout_field_update_user_meta_child');
function soup_own_checkout_field_update_user_meta_child( $user_id ) {
	if ($user_id && $_POST['soup_deliver_time']){
		
		$soup_deliver_time = $_POST['soup_deliver_time'];
		global $soup;
		$soup_checkout_deliver_opt1 = $soup['chck-delver-opt1'];
		$soup_checkout_deliver_opt2 = $soup['chck-delver-opt2'];
		
		if($soup_deliver_time == 'chck-delver-opt1') {
			update_user_meta( $user_id, 'soup_deliver_time', $soup_checkout_deliver_opt1 );
		} else if($soup_deliver_time == 'chck-delver-opt2') {
			update_user_meta( $user_id, 'soup_deliver_time', $soup_checkout_deliver_opt2 );
		}
	} 

	
}



function wcs_do_not_reduce_renewal_stock( $reduce_stock, $order ) {
	
	$soup_deliver_time = $_POST['soup_deliver_time'];
	if($soup_deliver_time == 'chck-delver-opt2') {
		$reduce_stock = false;
	}

	return $reduce_stock;
}
add_filter( 'woocommerce_can_reduce_order_stock', 'wcs_do_not_reduce_renewal_stock', 10, 2 );

// add_filter( 'woocommerce_billing_fields', 'wc_optional_billing_fields', 10, 1 );
//   function wc_optional_billing_fields( $address_fields ) {
//     $address_fields['billing_postcode']['required'] = false;
//     return $address_fields;
//   }