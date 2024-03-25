<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**=============================================================
 * Enqueue scripts and styles.
 ==============================================================*/
function soup_scripts() {
	global $soup;
	$soup_opt = new Soup();
	$soup_map_api = $soup_opt->soup_gmap_api_key();
	$soup_map_icon = $soup_opt->soup_gmap_icon();

	// LOAD STYLE SHEET 
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/dist/css/bootstrap.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/plugins/slick-carousel/slick/slick.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/plugins/animate.css/animate.min.css' );
	wp_enqueue_style( 'animsition', get_template_directory_uri() . '/assets/plugins/animsition/dist/css/animsition.min.css' );
	wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/plugins/font-awesome/css/font-awesome.min.css' ); 
	wp_enqueue_style( 'soup-theme', get_template_directory_uri() . '/assets/css/themes/theme-beige.css' ); 
	wp_enqueue_style( 'soup-default', get_template_directory_uri() . '/assets/css/default-style.css' );
	wp_enqueue_style( 'soup-style', get_stylesheet_uri() );

    // LOAD SCRIPT 
	wp_enqueue_script( 'tether', get_template_directory_uri() . '/assets/plugins/tether/dist/js/tether.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/dist/js/bootstrap.min.js', array(), '20151215', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/plugins/slick-carousel/slick/slick.min.js', array(), '20151215', true );
	wp_enqueue_script( 'appear', get_template_directory_uri() . '/assets/plugins/jquery.appear/jquery.appear.js', array(), '20151215', true );
	wp_enqueue_script( 'scrollTo', get_template_directory_uri() . '/assets/plugins/jquery.scrollto/jquery.scrollTo.min.js', array(), '20151215', true );
	wp_enqueue_script( 'localscroll', get_template_directory_uri() . '/assets/plugins/jquery.localscroll/jquery.localScroll.min.js', array(), '20151215', true );
	wp_enqueue_script( 'validate', get_template_directory_uri() . '/assets/plugins/jquery-validation/dist/jquery.validate.min.js', array(), '20151215', true );
	wp_enqueue_script( 'YTPlayer', get_template_directory_uri() . '/assets/plugins/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.min.js', array(), '20151215', true );
	wp_enqueue_script( 'twitterFetcher_min', get_template_directory_uri() . '/assets/plugins/twitter-fetcher/js/twitterFetcher_min.js', array(), '20151215', true );
	wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/assets/plugins/skrollr/dist/skrollr.min.js', array(), '20151215', true );
	wp_enqueue_script( 'animsition', get_template_directory_uri() . '/assets/plugins/animsition/dist/js/animsition.min.js', array(), '20151215', true );
	wp_enqueue_script( 'soup-core', get_template_directory_uri() . '/assets/js/core.js', array(), '20151215', true ); 
    wp_enqueue_script( 'map-api', 'https://maps.googleapis.com/maps/api/js?key='.$soup_map_api, array(), '', false ); 
	wp_enqueue_script( 'soup-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20151215', true );
	wp_enqueue_script( 'soup-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'soup-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	// inline style css
	$soup_custom_css = "";
    $soup_adv_css = (isset($soup['custom_css'])) ? $soup['custom_css'] : '' ;
    $soup_custom_css .= "{$soup_adv_css}";

	 	 
    if(isset($soup['footer-bg-clr']) && !empty($soup['footer-bg-clr'])){
    	$soup_footer_bg = $soup['footer-bg-clr'];
        $soup_custom_css .= "
			footer#footer.bg-dark{
				background-color: {$soup_footer_bg} !important;
			}
        ";
    } 
	 
    if(isset($soup['logo-width']) && !empty($soup['logo-width'])){
    	$soup_logo_wd = $soup['logo-width'];
        $soup_custom_css .= "
			#header .module-logo img{
				width:{$soup_logo_wd};
			}
        ";
    } 
    if(isset($soup['logo-height']) && !empty($soup['logo-height'])){
    	$soup_logo_ht = $soup['logo-height'];
        $soup_custom_css .= "
			#header .module-logo img{
				height:{$soup_logo_ht};
			}
        ";
    }
    if(isset($soup['mlogo-width']) && !empty($soup['mlogo-width'])){
    	$soup_logo_wd = $soup['mlogo-width'];
        $soup_custom_css .= "
			#header-mobile .module-logo img{
				width:{$soup_logo_wd};
			}
        ";
    } 
    if(isset($soup['mlogo-height']) && !empty($soup['mlogo-height'])){
    	$soup_logo_ht = $soup['mlogo-height'];
        $soup_custom_css .= "
			#header-mobile .module-logo img{
				height:{$soup_logo_ht};
			}
        ";
    }
    if(isset($soup['logo-box']) && !empty($soup['logo-box']) && $soup['logo-box']!='box'){         
    	$soup_custom_css .= "
			#header .module-logo {
			    position: inherit;
			    top: auto;
			    left: 0;
			    right: auto;
			    text-align: left;
			    padding: 0;
			    width: 100%;
			    background-color: transparent !important;
			}
        ";
    }
    if(is_page()){
    	$soup_pgbnrclr = get_post_meta(get_the_ID(),'_soup_page_banner_clr',true); 
    	$soup_pgbnrclrtxt = get_post_meta(get_the_ID(),'_soup_page_banner_txtclr',true); 
	    if(!empty($soup_pgbnrclr)){ 
	        $soup_custom_css .= "
				.page-title.bg-light{
					background-color:{$soup_pgbnrclr};
				}
	        ";
	    }
	    if(!empty($soup_pgbnrclrtxt)){ 
	        $soup_custom_css .= "
				.page-title.bg-light h1,
				.page-title.bg-light h4{
					color:{$soup_pgbnrclrtxt};
				}
	        ";
	    }
    }
 
	$soup_logo_wd = (!empty($soup['flogo-width'])) ? $soup['flogo-width'] : '88px';
    $soup_custom_css .= "
		#footer img.ft2{
			width:{$soup_logo_wd};
		}
    ";  
	$soup_logo_ht = (!empty($soup['flogo-height'])) ? $soup['flogo-height'] : '96px';
    $soup_custom_css .= "
		#footer img.ft2{
			height:{$soup_logo_ht};
		}
    "; 
 
    wp_add_inline_style( 'soup-style', $soup_custom_css );

	// inline custom js
	$soup_custom_js = "";
    $soup_adv_js = (isset($soup['custom_js'])) ? $soup['custom_js'] : '' ;
    $soup_custom_js .= "{$soup_adv_js}";
 	wp_add_inline_script( 'soup-main', $soup_custom_js );

 	$soup_map_lat = (!empty($soup['map-lat'])) ? $soup['map-lat'] : '40.758895';
 	$soup_map_long = (!empty($soup['map-long'])) ? $soup['map-long'] : '-73.985131'; 
 
	// Localize the script with new data
	$translation_array = array(
		'soup_uri' => get_template_directory_uri(), 
		'soup_home' => home_url('/'), 
		'soup_mpico' => $soup_map_icon ,
		'soup_mplat' => $soup_map_lat ,
		'soup_mplong' => $soup_map_long,
		'soup_slidespeed' => (!empty($soup['slider-speed'])) ? $soup['slider-speed'] : 3500
	); 
	wp_localize_script( 'soup-core', 'object_name', $translation_array );
	wp_localize_script( 'soup-custom', 'object_name', $translation_array );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'soup_scripts' );

