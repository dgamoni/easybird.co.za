<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://wowtheme.net/sajib
 * @since             1.0.0
 * @package           Soup_Core
 *
 * @wordpress-plugin
 * Plugin Name:       Soup Core
 * Plugin URI:        http://wowtheme.net
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Sajib Talukder
 * Author URI:        http://wowtheme.net/sajib
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       theme-core
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define('APFSURL', WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) );
define('APFPATH', WP_PLUGIN_DIR."/".dirname( plugin_basename( __FILE__ ) ) );
function soup_enqueuescripts()
{
    wp_enqueue_script('soupreview', APFSURL.'/js/soupreview.js', array('jquery'));
    wp_localize_script( 'soupreview', 'soupajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('wp_enqueue_scripts', 'soup_enqueuescripts');
/**
 * Post Type 
 */
require plugin_dir_path( __FILE__ ) . 'includes/post-type.php';

/**
 * Taxonomy
 */
require plugin_dir_path( __FILE__ ) . 'includes/taxonomy.php';

/**
 * Shortcode
 */
require plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php';

/**
 * switcer css
 */
require plugin_dir_path( __FILE__ ) . 'includes/switcher-css.php';

/**
 * One Click Demo Import
 */
require plugin_dir_path( __FILE__ ) . 'one-click-demo/init.php';

/**
 * woocommerce product add on
 */
require plugin_dir_path( __FILE__ ) . 'woocommerce-product-addons/woocommerce-product-addons.php';

/**
 * ajax variable add to cart
 */
require plugin_dir_path( __FILE__ ) . 'woocommerce-ajax-add-to-cart-variable-products/woocommerce-ajax-add-to-cart-variable-products.php';

 
// admin area css
function soup_admin_styles() {
   ?>
    <style type="text/css">
    	.rs-update-notice-wrap,
    	.redux-timer,
    	#wpfooter #footer-left,
    	.redux-dev-qtip,
        .rAds span a img,
        .redux-notice,
        #redux_blast_1454922210,
		#admin_config{
			display: none !important;
		}
		.field-menuposition .edit-menu-item-menuposition,
		.field-mtype .edit-menu-item-mtype,
		.field-column .edit-menu-item-column{
			width: 100px;
		}
		ul#menu-to-edit li.menu-item-depth-6 .hidn,
		ul#menu-to-edit li.menu-item-depth-5 .hidn,
		ul#menu-to-edit li.menu-item-depth-4 .hidn,
		ul#menu-to-edit li.menu-item-depth-3 .hidn,
		ul#menu-to-edit li.menu-item-depth-2 .field-enablemegamenu, 
		ul#menu-to-edit li.menu-item-depth-2 .field-mtype ,
		ul#menu-to-edit li.menu-item-depth-2 .field-column , 
		ul#menu-to-edit li.menu-item-depth-1 .cs-fieldset, 
		ul#menu-to-edit li.menu-item-depth-1 .field-mtype ,
		ul#menu-to-edit li.menu-item-depth-1 .field-column ,
		ul#menu-to-edit li.menu-item-depth-1 .field-enablemegamenu ,
		ul#menu-to-edit li.menu-item-depth-0 .cs-fieldset , 
		ul#menu-to-edit li.menu-item-depth-0 .field-columntitle{
			display: none;
		}
		.menu-item-settings {
		    overflow: hidden;
		}
		.field-mimg img#upimage {
		    width: 100px;
		    max-height: 100px; 
		}
    </style>
    <?php
}
add_action('admin_head', 'soup_admin_styles');

// frontend css
function soup_frontend_styles() {
	global $soup;
   ?>
    <style type="text/css">
		.soup-confirm {
		    position: fixed;
		    left: 47%;
		    top: 50%;
		    background: #ddd;
		    padding: 40px;
		    border-radius: 3px;
    		z-index: 9999;
    		display: none;
		}
		.soup-confirm:before {
			font-family: WooCommerce;
		    content: '\e017';
		    margin-left: .53em;
		    vertical-align: bottom;
		}

		.slick-track .content-inner h1{
			font-size: <?php echo (!empty($soup['slider-title-fsize'])) ? ($soup['slider-title-fsize']) : ''; ?>;
			font-weight: <?php echo (!empty($soup['slider-title-fwet'])) ? ($soup['slider-title-fwet']) : ''; ?>; 
		}
		.slick-track .content-inner h4,
		.slick-track .content-inner h5{
			font-size: <?php echo (!empty($soup['slider-title2-fsize'])) ? ($soup['slider-title2-fsize']) : ''; ?>;
			font-weight:<?php echo (!empty($soup['slider-title2-fwet'])) ? ($soup['slider-title2-fwet']) : ''; ?>;
			color: <?php echo (!empty($soup['slider-title2-colr']['rgba'])) ? ($soup['slider-title2-colr']['rgba'].' !important') : ''; ?>   ;
		}



    </style>
    <?php
}
add_action('wp_head', 'soup_frontend_styles');



/**
 * Post Formate Display Procedure.
 */
add_action('admin_print_scripts', 'cassandra_display_procedure', 1000);

function cassandra_display_procedure(){ ?>
	<?php if(get_post_type() == 'post') : ?>
		<script>
			jQuery(document).ready(function(){
				var id = jQuery( 'input[name="post_format"]:checked' ).attr('id');
				if(id == 'post-format-audio'){
					jQuery('.cmb2-id--cassandra-post-audio').show();
				}else{
					jQuery('.cmb2-id--cassandra-post-audio').hide();
				} 
				if(id == 'post-format-video'){
					jQuery('.cmb2-id--cassandra-post-formate-vdo').show();
				}else{
					jQuery('.cmb2-id--cassandra-post-formate-vdo').hide();
				} 
				
				if(id == 'post-format-gallery'){
					jQuery('.cmb2-id--cassandra-post-galery-list').show();
				}else{
					jQuery('.cmb2-id--cassandra-post-galery-list').hide();
				} 


				jQuery( 'input[name="post_format"]' ).change(function(){
						jQuery('.cmb2-id--cassandra-post-formate-vdo').hide(); 
						jQuery('.cmb2-id--cassandra-post-galery-list').hide(); 
						jQuery('.cmb2-id--cassandra-post-audio').hide();

					var id = jQuery( 'input[name="post_format"]:checked' ).attr('id');

					if(id == 'post-format-audio'){
						jQuery('.cmb2-id--cassandra-post-audio').show();
					}else{
						jQuery('.cmb2-id--cassandra-post-audio').hide();
					} 
					if(id == 'post-format-video'){
						jQuery('.cmb2-id--cassandra-post-formate-vdo').show();
					}else{
						jQuery('.cmb2-id--cassandra-post-formate-vdo').hide();
					} 
					
					if(id == 'post-format-gallery'){
						jQuery('.cmb2-id--cassandra-post-galery-list').show();
					}else{
						jQuery('.cmb2-id--cassandra-post-galery-list').hide();
					}  

				});
			})
		</script> 
	<?php endif; ?>
	<?php if(get_post_type() == 'page') : ?>
		<script>
			jQuery(document).ready(function(){
				var id = jQuery( 'input[name="_soup_pg_bnr_typ"]:checked' ).attr('id');  
				if(id == '_soup_pg_bnr_typ1'){
					jQuery('.cmb2-id--soup-page-banner').show();  
				}else{
					jQuery('.cmb2-id--soup-page-banner').hide();  
				}
				if((id == '_soup_pg_bnr_typ1') || (id == '_soup_pg_bnr_typ2')){ 
					jQuery('.cmb2-id--soup-page-banner-title').show(); 
					jQuery('.cmb2-id--soup-page-banner-subtitle').show(); 
					jQuery('.cmb2-id--soup-page-banner-txtclr').show(); 
				}else{ 
					jQuery('.cmb2-id--soup-page-banner-title').hide(); 
					jQuery('.cmb2-id--soup-page-banner-subtitle').hide(); 
					jQuery('.cmb2-id--soup-page-banner-txtclr').hide(); 
				}
				if(id == '_soup_pg_bnr_typ2'){
					jQuery('.cmb2-id--soup-page-banner-clr').show(); 
				}else{
					jQuery('.cmb2-id--soup-page-banner-clr').hide();  
				}
				if(id == '_soup_pg_bnr_typ3'){
					jQuery('.cmb2-id--soup-pg-slider-styl').show(); 
					jQuery('.cmb2-id--soup-page-psldr-cat').show(); 
				}else{
					jQuery('.cmb2-id--soup-pg-slider-styl').hide(); 
					jQuery('.cmb2-id--soup-page-psldr-cat').hide(); 
				} 
				if(id == '_soup_pg_bnr_typ4'){
					jQuery('.cmb2-id--soup-rev-slider-alias').show(); 
				}else{
					jQuery('.cmb2-id--soup-rev-slider-alias').hide(); 
				} 
				if(id == '_soup_pg_bnr_typ5'){
					jQuery('.cmb2-id--soup-page-vdo-logo').show(); 
					jQuery('.cmb2-id--soup-page-vdo-title').show(); 
					jQuery('.cmb2-id--soup-page-vdo-subtitle').show(); 
					jQuery('.cmb2-id--soup-page-vdo-bgurl').show(); 
					jQuery('.cmb2-id--soup-page-vdo-btntxt').show(); 
					jQuery('.cmb2-id--soup-page-vdo-btnlink').show(); 
				}else{
					jQuery('.cmb2-id--soup-page-vdo-logo').hide(); 
					jQuery('.cmb2-id--soup-page-vdo-title').hide(); 
					jQuery('.cmb2-id--soup-page-vdo-subtitle').hide(); 
					jQuery('.cmb2-id--soup-page-vdo-bgurl').hide(); 
					jQuery('.cmb2-id--soup-page-vdo-btntxt').hide(); 
					jQuery('.cmb2-id--soup-page-vdo-btnlink').hide(); 
				} 

				jQuery( 'input[name="_soup_pg_bnr_typ"]' ).change(function(){ 
					jQuery('.cmb2-id--soup-page-banner').hide();
					jQuery('.cmb2-id--soup-pg-slider-styl').hide(); 
					jQuery('.cmb2-id--soup-page-psldr-cat').hide(); 
					jQuery('.cmb2-id--soup-rev-slider-alias').hide();  
					jQuery('.cmb2-id--soup-page-banner-title').hide();  
					jQuery('.cmb2-id--soup-page-banner-subtitle').hide();  
					jQuery('.cmb2-id--soup-page-banner-txtclr').hide();
					jQuery('.cmb2-id--soup-page-vdo-logo').hide(); 
					jQuery('.cmb2-id--soup-page-vdo-title').hide(); 
					jQuery('.cmb2-id--soup-page-vdo-subtitle').hide(); 
					jQuery('.cmb2-id--soup-page-vdo-bgurl').hide(); 
					jQuery('.cmb2-id--soup-page-vdo-btntxt').hide(); 
					jQuery('.cmb2-id--soup-page-vdo-btnlink').hide(); 

					var id = jQuery( 'input[name="_soup_pg_bnr_typ"]:checked' ).attr('id'); 
 
					if(id == '_soup_pg_bnr_typ1'){
						jQuery('.cmb2-id--soup-page-banner').show();  
					}else{
						jQuery('.cmb2-id--soup-page-banner').hide();  
					}
					if((id == '_soup_pg_bnr_typ1') || (id == '_soup_pg_bnr_typ2')){ 
						jQuery('.cmb2-id--soup-page-banner-title').show(); 
						jQuery('.cmb2-id--soup-page-banner-subtitle').show(); 
						jQuery('.cmb2-id--soup-page-banner-txtclr').show(); 
					}else{ 
						jQuery('.cmb2-id--soup-page-banner-title').hide(); 
						jQuery('.cmb2-id--soup-page-banner-subtitle').hide(); 
						jQuery('.cmb2-id--soup-page-banner-txtclr').hide(); 
					}

					if(id == '_soup_pg_bnr_typ2'){
						jQuery('.cmb2-id--soup-page-banner-clr').show(); 
					}else{
						jQuery('.cmb2-id--soup-page-banner-clr').hide(); 
					}
					if(id == '_soup_pg_bnr_typ3'){
						jQuery('.cmb2-id--soup-pg-slider-styl').show(); 
						jQuery('.cmb2-id--soup-page-psldr-cat').show(); 
					}else{
						jQuery('.cmb2-id--soup-pg-slider-styl').hide(); 
						jQuery('.cmb2-id--soup-page-psldr-cat').hide(); 
					}
					if(id == '_soup_pg_bnr_typ4'){
						jQuery('.cmb2-id--soup-rev-slider-alias').show(); 
					}else{
						jQuery('.cmb2-id--soup-rev-slider-alias').hide(); 
					} 
					if(id == '_soup_pg_bnr_typ5'){
						jQuery('.cmb2-id--soup-page-vdo-logo').show(); 
						jQuery('.cmb2-id--soup-page-vdo-title').show(); 
						jQuery('.cmb2-id--soup-page-vdo-subtitle').show(); 
						jQuery('.cmb2-id--soup-page-vdo-bgurl').show(); 
						jQuery('.cmb2-id--soup-page-vdo-btntxt').show(); 
						jQuery('.cmb2-id--soup-page-vdo-btnlink').show(); 
					}else{
						jQuery('.cmb2-id--soup-page-vdo-logo').hide(); 
						jQuery('.cmb2-id--soup-page-vdo-title').hide(); 
						jQuery('.cmb2-id--soup-page-vdo-subtitle').hide(); 
						jQuery('.cmb2-id--soup-page-vdo-bgurl').hide(); 
						jQuery('.cmb2-id--soup-page-vdo-btntxt').hide(); 
						jQuery('.cmb2-id--soup-page-vdo-btnlink').hide(); 
					} 
  
				});
			})
		</script> 
	<?php endif; ?>
<?php }


function soup_addreviews() {
    $results = '';
  
    $rv_comment =  $_POST['pcoment']; 
    $rv_star = $_POST['pstar']; 
    $rv_name = $_POST['pname']; 
    $rv_email = $_POST['pemail']; 
    $rv_desig = $_POST['pcompany']; 
 

	$rvw_slug = str_replace(" ", "-", strtolower($rv_name));

    $post_id = wp_insert_post(array(
	    'post_title'    =>   $rv_name,
	    'post_name'    =>   $rvw_slug, 
	    'post_content'  =>   $rv_comment, 
	    'post_status'   =>   'pending',           // Choose: publish, preview, future, draft, etc.
	    'post_type' =>   'reviews'  //'post',page' or use a custom post type if you want to
	    ));
 
	//insert custom fields
	update_post_meta($post_id,'_soup_revie_design',$_POST['pcompany']);
	update_post_meta($post_id,'_soup_revie_email',$_POST['pemail']); 
	update_post_meta($post_id,'_soup_revie_rat',$_POST['pstar']); 

    if ( $post_id != 0 ) {
        $results = '*Post Added';
    }
    else {
        $results = '*Error occured while adding the post';
    }
    // Return the String
    die($results);
}
// creating Ajax call for WordPress
add_action( 'wp_ajax_nopriv_soup_addreviews', 'soup_addreviews' );
add_action( 'wp_ajax_soup_addreviews', 'soup_addreviews' );


function soup_add_to_cart_confirm(){
	?>
	<div class="soup-confirm">
		 Product added to cart.
	</div>
	<?php
}
add_action('wp_footer','soup_add_to_cart_confirm');