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
			$('.reset_variations').click(function(event) {
				//console.log(  $(this).parent() );
				$(this).parent().find(".single_add_to_cart_button").attr('disabled', true);
				$('._custom-control-indicator').show();
			});
			$(".variations_form input[name='variation_id']").change(function(event) {
				//console.log( $(".variations_form input[name='variation_id']").val() );
				var modal = $(this).closest('.modal');
				//console.log(modal);
				var this_id = modal.attr('id');
				if(modal.length >0) {
					//console.log('modal');
					if($("#"+this_id+" .variations_form input[name='variation_id']").val()) {
						$("#"+this_id+" .variations_form .single_add_to_cart_button").removeAttr("disabled");
					}
				} else {
					//console.log('nomodal');
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
	.woocommerce-checkout .form-row.place-order {
	    bottom: 40px;
	}
	.woocommerce-checkout .p-md-5.custom_margin {
		padding-bottom: 170px !important;
	}
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
@media only screen and (max-width: 575px) {
	.btn.soup-order {
    	width: 90%;
	}
	#soup_deliver_time_field {
	    width: 100%;
	}
}
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


function change_soup_core_js() {
   wp_dequeue_script( 'add-to-cart-variation_ajax' );
   wp_deregister_script( 'add-to-cart-variation_ajax' );
   //wp_enqueue_script( 'avia-default', CORE_URL .'/js/avia.js', array('jquery'), 2, true );
    wp_enqueue_script( 'add-to-cart-variation_ajax', get_stylesheet_directory_uri() . '/soup-core/woocommerce-ajax-add-to-cart-variable-products/js/add-to-cart-variation.js',
     array('jquery'), '5.3', true );

    if(is_checkout()):
	    wp_register_script('jquery-ui-datepicker2', get_stylesheet_directory_uri() .'/js/jquery-ui.js', array('jquery'),'1.12', true);
		wp_enqueue_script('jquery-ui-datepicker2');
	endif;
}
add_action( 'wp_enqueue_scripts', 'change_soup_core_js', 100 );

function soup_add_to_cart_confirm_child(){
	$return_to = wc_get_page_permalink( 'checkout' );
	?>
	<div class="soup-confirm-child">
		<h5 class="productadded">Product added to cart.</h5>
		<div>
			<a href="#" class="btn btn-primary continue_shopping">
				Continue Shopping
			</a>
			<a href="<?php echo $return_to; ?>" class="btn btn-secondary check">
				Checkout
			</a>
		</div>
	</div>
	<style>
		.productadded {
			text-align: center;
		}
		.soup-confirm-child {
		    position: fixed;
		    /*left: 47%;*/
		    /*top: 50%;*/
		    top: calc(50% - 62px); 
  			left: calc(50% - 159px); 
		    background: #ddd;
		    padding: 40px;
		    border-radius: 3px;
    		z-index: 9999;
    		display: none;
		}
		.productadded:before {
			font-family: WooCommerce;
		    content: '\e017';
		    /*margin-left: .53em;*/
		        margin-right: .53em;
		    vertical-align: bottom;
		}
		.soup-confirm-child .btn:hover,
		.soup-confirm-child .btn:focus,
		.soup-confirm-child .btn:active,
		.soup-confirm-child .btn:focus:active {
		    -webkit-transform: translateY(0px);
		    -moz-transform: translateY(0px);
		    -ms-transform: translateY(0px);
		    -o-transform: translateY(0px);
		    transform: translateY(0px);
		}
		.soup-confirm-child .btn-secondary:before,
		.soup-confirm-child .btn-primary:before {
		    display: none;
		}
		.soup-confirm-child .btn.btn-secondary:hover:before,
		.soup-confirm-child  .btn.btn-secondary:focus:before,
		.soup-confirm-child  .btn.btn-secondary:active:before,
		.soup-confirm-child  .btn.btn-secondary:focus:active:before {
    		background-color: transparent;
    		/*opacity: 0.3;*/
		}
		.panel-details-title a {
			padding-left: 50px;
   			margin-left: -50px;
		}
		._custom-control-indicator {
			top: 0.1em !important;
		    font-weight: 400;
		    font-family: "Oswald", sans-serif;
		    width: 1.3em !important;
		    height: 1.3em !important;
		    margin-right: 0.5rem;
		    -webkit-border-radius: 50%;
		    -moz-border-radius: 50%;
		    -ms-border-radius: 50%;
		    -o-border-radius: 50%;
		    border-radius: 50%;
		    border: 2px solid #e0e0e0;
		    background-color: #fff !important;
		    position: absolute;
		    top: .25rem;
		    left: 0;
		    display: block;
		    width: 1rem;
		    height: 1rem;
		    pointer-events: none;
		    -webkit-user-select: none;
		    -moz-user-select: none;
		    -ms-user-select: none;
		    user-select: none;
		    background-color: #ddd;
		    background-repeat: no-repeat;
		    background-position: center center;
		    -webkit-background-size: 50% 50%;
		    background-size: 50% 50%;
		}
		._custom-control-indicator > svg {
		    position: absolute;
		    top: 0;
		    left: 0;
		    height: 100%;
		    width: 100%;
		}
		#byconsolewooodt_delivery_location_field .optional,
		#byconsolewooodt_delivery_date_field .optional,
		#byconsolewooodt_delivery_time_field .optional {
			display: none;
		}
		.term_description {
		    position: absolute;
		    bottom: -84px;
		    left: 0;
		    padding: 60px;
		        width: 100%;
		}
		.term_description p {
			    line-height: 19px;
		    font-weight: 300;
		     /*border: 1px solid white;*/ 
		    padding: 2px 8px;
		    /*background-color: #0000006e;*/
		    height: 44px;
		    overflow: hidden;
		    text-overflow: ellipsis;
		    display: flex;
    		align-items: center;
		}
		@media only screen and (max-width: 993px) {
			.menu-category .menu-category-title .title {
			        bottom: inherit;
    			top: 19px;
    			font-size: 31px;
			}
			.term_description {
			    padding-top: 0;
			    bottom: -49px;
			    padding-left: 23px;
			}
			.term_description p {
			    height: initial;
			        margin: 0;
    			line-height: 1;
			}
		}
	</style>
	<script>
			jQuery(document).ready(function($) {
					$('._custom-control-input').click(function(event) {
						//console.log( $(this).parent().parent().attr('data-id'); );
						var idd = $(this).parent().parent().attr('data-id');
						//console.log(idd);
						$('._custom-control-indicator[data-id="'+ idd +'"]').hide();
					});
					$(".soup-confirm-child a.continue_shopping").click(function(e) {
						e.preventDefault();
						$(".soup-confirm-child").fadeOut();
					});
					$(".soup-confirm-child a.check").click(function(e) {
						//e.preventDefault();
						$(".soup-confirm-child").fadeOut();
					});
					// $('.variations.panel-details').click(function(e) {
					// 	console.log($(this).children('h5.panel-details-title').children('a'));
					// 	//$(this).children('a[data-toggle="collapse"]').trigger('click');
					// 	//$(this).children('h5.panel-details-title').children('a').eq(0).click();
					// });
				});
	</script>
	<?php
}
add_action('wp_footer','soup_add_to_cart_confirm_child');


add_filter( 'woocommerce_shipping_package_name' , 'woocommerce_replace_text_shipping_to_delivery', 10, 3);

function woocommerce_replace_text_shipping_to_delivery($package_name, $i, $package){
    return sprintf( _nx( 'Delivery', 'Delivery %d', ( $i + 1 ), 'shipping packages', 'soup' ), ( $i + 1 ) );
}




// Process the checkout (Checking if required fields are not empty)
add_action('woocommerce_checkout_process', 'ba_custom_checkout_field_process');
function ba_custom_checkout_field_process() {

    if ( !$_POST['byconsolewooodt_delivery_location'] ) {
		 wc_add_notice( __('Please select a <strong>delivery location</strong>.' ), 'error');
    }


    if ( !$_POST['byconsolewooodt_delivery_date'] ) {
		 wc_add_notice( __('Please select a <strong>delivery date</strong>.' ), 'error');
    }
    
    if ( $_POST['byconsolewooodt_delivery_time'] == 'Select time' ) {
    	 wc_add_notice( __('Please select a <strong>delivery time</strong>.' ), 'error');
    }


}


function soup_list_collapse_custom($atts,$content=null){
	extract(shortcode_atts(array(
	    'list_collaps' =>1, 
	    'list_orderby' =>'id',  
	    'list_order' =>'desc',  
	    'list_bnrimg' =>'',  
	    'list_mnuttl' =>'',   
	    'list_colps_num_pro' =>'4',   
	    'list_fodcat' =>''   
	), $atts));    
    $list_image = wp_get_attachment_image_src($list_bnrimg,'list-img');
    $list_img = $list_image[0];  
	if($list_collaps==1){
		$list_bpn = 'true';
		$list_dpn = 'show';
	}else{ 
		$list_bpn = '';
		$list_dpn = '';
	} 
	$soup_menu_lnk = str_replace(" ","_",strtolower($list_mnuttl));
	$soup_menu_lnkM = str_replace(" ","__",strtolower($list_mnuttl))."_1";
	global $post;
	$term = get_term_by('slug', $list_fodcat, 'product_cat');
	$description = term_description($term->term_id, 'product_cat');

	ob_start(); ?> 
	    <div id="<?php echo $soup_menu_lnkM; ?>" class="menu-category">
	        <div class="menu-category-title collapse-toggle" role="tab" data-target="#<?php echo $soup_menu_lnk; ?>" data-toggle="collapse" aria-expanded="<?php echo $list_bpn; ?>">
	            <div class="bg-image"><img src="<?php echo esc_url($list_img); ?>" alt="Food Menu"></div>
	            <h2 class="title"><?php echo $list_mnuttl; ?></h2>
	            <?php if($description): ?><div class="term_description"><?php echo $description; ?></div><?php endif; ?>
	        </div>
	        <div id="<?php echo $soup_menu_lnk; ?>" class="menu-category-content collapse  <?php echo $list_dpn; ?>"> 
            	<?php   
				$product_args = array(
					'post_type'=>'product',
					'product_cat' => $list_fodcat,
					'posts_per_page'=> $soup_girdnvg_num_pro, 
					'order'=>$list_order, 
					'orderby'=>$list_orderby 
				);
            	if($list_orderby=='meta_value_num'){
            		$product_args['meta_key'] = '_price';
            	} 
            	$product_query = new WP_Query($product_args); ?>
	        	<?php while($product_query->have_posts()): $product_query->the_post(); ?>
	                <div class="menu-item menu-list-item">
	                    <div class="row align-items-center">
	                        <div class="col-sm-6 mb-2 mb-sm-0">
	                            <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
	                            <span class="text-muted text-sm"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
	                        </div>
	                        <div class="col-sm-6 text-sm-right">
	                            <span class="text-md mr-4"><?php echo soup_variation_price_format(); ?></span>
	                            <button class="btn btn-outline-secondary btn-sm" data-target="#productModal_<?php echo get_the_ID(); ?>" data-toggle="modal"><span><?php global $product; echo esc_html( $product->single_add_to_cart_text() ); ?></span></button>
	                        </div>
	                    </div>
	                </div>
				<!-- Modal / Product -->
				<div class="modal fade woocommerce" id="productModal_<?php echo get_the_ID(); ?>" role="dialog">
				    <div class="modal-dialog" role="document">
				        <div class="modal-content">
				            <div class="modal-header modal-header-lg dark bg-dark">
				            	<?php global $soup; 
				            		$popup_title = (!empty($soup['pop_up_title'])) ? $soup['pop_up_title'] : 'Specify your dish';
				            		$popup_title_bgimh = (!empty($soup['pop_up_bgimg']['url'])) ? $soup['pop_up_bgimg']['url'] : get_template_directory_uri().'/assets/img/photos/modal-add.jpg';
				            	?>
				                <div class="bg-image"><img src="<?php echo esc_url($popup_title_bgimh); ?>" alt=""></div>
				                <h4 class="modal-title"><?php echo $popup_title; ?></h4>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
				            </div>
				            <div class="modal-product-details">
				                <div class="row align-items-center">
				                    <div class="col-8">
				                        <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
				                        <span class="text-muted"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
				                    </div>
				                    <div class="col-4 text-lg text-right"><?php echo soup_variation_price_format(); ?></div>
				                </div>
				            </div>
				            <div class="modal-body panel-details-container popsoup"> 
					        	<?php do_action( 'woocommerce_single_product_cart' ); ?>
				            </div> 
				        </div>
				    </div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>  
	        </div>
	    </div> 
<?php return ob_get_clean();
}
add_shortcode('list_collapse_custom','soup_list_collapse_custom');

// Display list collapse
vc_map( 
    array(
		'name' => esc_html__('List Collapse Custom', 'soup'),
		'base' => 'list_collapse_custom',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array( 
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Open', 'soup'),
				'param_name' => 'list_collaps',
				'value' => array(
					esc_html__('Yes','soup') => '1',
					esc_html__('No','soup') => '2'  
					),
				'admin_label' => true,
                'description' => esc_html__('Select one of them.', 'soup')
			),  
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image', 'soup'),
				'param_name' => 'list_bnrimg',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload banner image.', 'soup')
			),  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'soup'),
				'param_name' => 'list_mnuttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write title here.', 'soup')
			),  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Category Slug', 'soup'),
				'param_name' => 'list_fodcat',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input category slug here.', 'soup')
			),
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Number of Product to Show', 'soup'),
                'param_name' => 'list_colps_num_pro',
                'description' => esc_html__('Input numeric value here.', 'soup')
            ),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Orderby', 'soup'),
				'param_name' => 'list_orderby',
				'value' => array(
					esc_html__('None','soup') => 'none',
					esc_html__('Price','soup') => 'meta_value_num', 
					esc_html__('Random','soup') => 'rand',  
					esc_html__('ID','soup') => 'id',  
					esc_html__('Title','soup') => 'title',  
					esc_html__('Slug','soup') => 'name',  
					esc_html__('Date','soup') => 'date',  
					esc_html__('Modified Date','soup') => 'modified',  
					esc_html__('Parent ID','soup') => 'parent',  
					esc_html__('Menu Order','soup') => 'menu_order',  
					esc_html__('Comment Count','soup') => 'comment_count',  
					),
				'admin_label' => true,
                'description' => esc_html__('Select one of them.', 'soup')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Order', 'soup'),
				'param_name' => 'list_order',
				'value' => array(
					esc_html__('ASC','soup') => 'asc',
					esc_html__('DESC','soup') => 'desc',   
					),
				'admin_label' => true,
                'description' => esc_html__('Select one of them.', 'soup')
			)   
		)   
	) 
);