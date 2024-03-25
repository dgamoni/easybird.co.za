<?php 

add_action( 'wp_enqueue_scripts', 'soup_enqueue_styles' );
function soup_enqueue_styles() { 
	
    // enqueue parent styles
	wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
	
	// enqueue child styles
	wp_enqueue_style('child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));

}


// Start writing your functions here


add_action('wp_footer', 'add_custom_css');
function add_custom_css() { ?>
	<script>
		jQuery(document).ready(function($) {

			$('.available_stock').each(function(index, el) {
				var id = $(this).attr("data-id");
				var stock = $(this).text();
				console.log(id);
				console.log(stock);
				// var label = 'In stock';
				// if(parseInt(id) === '-1') {
				// 	label = 'Out of stock';
				// 	id = '';
				// }
				$('.panel-details-content').find('.'+id+'').text(stock);
			});
		});
	</script>
	<style>
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
	</style>
	<?php
}















