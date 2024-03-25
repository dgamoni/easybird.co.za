<?php
/**
 * Soup functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Soup
 */

/**=====================================================================
 * Constant & definitions
 =======================================================================*/
define('SOUP_NAME', wp_get_theme()->get( 'Name' ));
define('SOUP_STYLE', get_template_directory_uri().'/assets/css/');
define('SOUP_SCRIPT', get_template_directory_uri().'/assets/js/'); 
define('SOUP_DIR', get_template_directory() ); 
define('SOUP_DIR_URI', get_template_directory_uri() .'/'); 

/**=====================================================================
 * Theme Core Functions
 ======================================================================*/  
if ( file_exists( SOUP_DIR . '/lib/theme-core-functions/theme-core-functions.php' ) ) { 
	require SOUP_DIR . '/lib/theme-core-functions/theme-core-functions.php';
}

/**=====================================================================
 * Includes Theme Config
 ======================================================================*/  
if ( file_exists( SOUP_DIR . '/lib/theme-config/theme-config.php' ) ) {
	require SOUP_DIR . '/lib/theme-config/theme-config.php';
}


if ( class_exists( 'Redux' ) ) {
   Redux::init( 'soup' );
}
global $soup;
$soup_checkout_deliver = (isset($soup['chck-delver'])) ? $soup['chck-delver'] : 1;
 
 
/**=====================================================================
 * Load Megamenu Functions
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/megamenu/soup-menu.php' ) ) {
	require SOUP_DIR . '/inc/megamenu/soup-menu.php';
}  

/**=====================================================================
 * Implement the Custom Header feature.
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/custom-header.php' ) ) {
	require SOUP_DIR . '/inc/custom-header.php';
}

/**=====================================================================
 * Custom template tags for this theme.
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/template-tags.php' ) ) {
	require SOUP_DIR . '/inc/template-tags.php';
} 

/**=====================================================================
 * Custom functions that act independently of the theme templates.
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/extras.php' ) ) {
	require SOUP_DIR . '/inc/extras.php';
}  

/**=====================================================================
 * Customizer additions.
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/customizer.php' ) ) {
	require SOUP_DIR . '/inc/customizer.php';
}   

/**=====================================================================
 * Load Jetpack compatibility file.
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/jetpack.php' ) ) {
	require SOUP_DIR . '/inc/jetpack.php';
}    

/**=====================================================================
 * Load About Widget File
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/widgets/soup-about-widget.php' ) ) {
	require SOUP_DIR . '/inc/widgets/soup-about-widget.php';
}   
/**=====================================================================
 * Load Newsletter Widget File
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/widgets/soup-newsletter-widget.php' ) ) {
	require SOUP_DIR . '/inc/widgets/soup-newsletter-widget.php';
}    

/**=====================================================================
 *  Initialising Visual shortcode editor
 =====================================================================*/
if (class_exists('WPBakeryVisualComposerAbstract')) {
	function soup_requireVcExtend(){
		include_once( get_template_directory().'/vc_extend/extend_vc.php');
	}
 add_action('init', 'soup_requireVcExtend',2);
}


remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'soup_woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );

add_filter( 'woocommerce_checkout_fields' , 'soup_remove_woo_checkout_form' );
 
function soup_remove_woo_checkout_form( $fields ) {

    // remove billing phone number
    unset($fields['billing']['billing_company']);
    //unset($fields['billing']['billing_country']); 
    unset($fields['billing']['billing_address_2']);
    //unset($fields['billing']['billing_postcode']); 
 
    // remove shipping phone number   
    unset($fields['shipping']['shipping_company']); 
    //unset($fields['shipping']['shipping_country']); 
    unset($fields['shipping']['shipping_address_2']); 
    //unset($fields['shipping']['shipping_postcode']);

    // remove order comment fields
    //unset($fields['order']['order_comments']);
 
    return $fields;
}


 

if($soup_checkout_deliver==1){ 
	/**
	 * Add the field to the checkout
	 **/
	add_action('woocommerce_after_order_notes', 'soup_own_checkout_field');

	function soup_own_checkout_field( $checkout ) {
		
		echo '<div id="soup_own_checkout_field"><h3>'.__('Delivery','soup').'</h3>';
					
		/**
		 * Output the field. This is for 1.4.
		 *
		 * To make it compatible with 1.3 use $checkout->checkout_form_field instead: 
		 **/
		woocommerce_form_field( 'soup_deliver_time', array( 
			'type' 			=> 'select', 
			'options' 			=> array(
					'As fast as possible' => __('As fast as possible','soup'),
					'In one hour' => __('In one hour','soup'),
					'In two hours' => __('In two hours','soup')
				), 
			'class' 		=> array('deliver-field-class  orm-row-first '), 
			'label' 		=> __('Delivery time:','soup'), 
			), $checkout->get_value( 'soup_deliver_time' ));
		
		echo '</div>';
		 
	}
	/**
	 * Process the checkout
	 **/
	add_action('woocommerce_checkout_process', 'soup_own_checkout_field_process');
	function soup_own_checkout_field_process() {
		global $woocommerce;
		
		// Check if set, if its not set add an error. This one is only requite for companies
		if ($_POST['billing_company']){
			if (!$_POST['soup_deliver_time']){ 
				$woocommerce->add_error( __('Please enter your XXX.','soup') );
			}
		}
	}
	/**
	 * Update the user meta with field value
	 **/
	add_action('woocommerce_checkout_update_user_meta', 'soup_own_checkout_field_update_user_meta');
	function soup_own_checkout_field_update_user_meta( $user_id ) {
		if ($user_id && $_POST['soup_deliver_time']) update_user_meta( $user_id, 'soup_deliver_time', esc_attr($_POST['soup_deliver_time']) );
	}
	/**
	 * Update the order meta with field value
	 **/
	add_action('woocommerce_checkout_update_order_meta', 'soup_own_checkout_field_update_order_meta');
	function soup_own_checkout_field_update_order_meta( $order_id ) {
		if ($_POST['soup_deliver_time']) update_post_meta( $order_id, 'Delivery', esc_attr($_POST['soup_deliver_time']));
	}
	/**
	 * Add the field to order emails
	 **/
	add_filter('woocommerce_email_order_meta_keys', 'soup_own_checkout_field_order_meta_keys');
	function soup_own_checkout_field_order_meta_keys( $keys ) {
		$keys[] = 'Delivery';
		return $keys;
	}
	/**
	 * Display field value on the order edit page
	 */
	add_action( 'woocommerce_admin_order_data_after_billing_address', 'soup_own_checkout_field_display_admin_order_meta', 10, 1 );

	function soup_own_checkout_field_display_admin_order_meta($order){
	    echo '<p><strong>'.__('Delivery','soup').':</strong> ' . get_post_meta( $order->get_order_number(), 'Delivery', true ) . '</p>';
	}

	add_action( 'woocommerce_single_product_cart', 'woocommerce_template_single_add_to_cart', 30 );

}



// page redirect after order placed

add_action( 'woocommerce_thankyou', 'bbloomer_redirectcustom');
 
function bbloomer_redirectcustom( $order_id ){
	global $soup;
    $order = new WC_Order( $order_id );
    if(!empty($soup['order_redirect_url'])){
        $url = $soup['order_redirect_url'];
    }else{
    	$url = home_url('/').'confirmation/';
    }
  
 
    if ( $order->status != 'failed' ) {
        wp_redirect($url);
        exit;
    }
}

 
 // display lowest price from variation product
function soup_variation_price_format( ) {
	global $product;
	$wo_price = wc_price($product->get_price());
	if( $product->is_type( 'variable' ) ){
		$min_price = $product->get_variation_price( 'min', true );
		$max_price = $product->get_variation_price( 'max', true );
		if ( $min_price != $max_price ) {
			$price = sprintf( __( '<span class="text-muted">from</span> %1$s', 'soup' ), wc_price( $min_price ) );
			return $price;
		} else {
			$price = sprintf( __( '%1$s', 'soup' ), wc_price( $min_price ) );
			return $price;
		}
	}else{
		return $wo_price;
	}
}
 

// add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
// function woo_custom_cart_button_text() {
//    return __( 'My Button Text', 'woocommerce' );
// }