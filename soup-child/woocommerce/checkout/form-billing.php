<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/** @global WC_Checkout $checkout */

?>
<div class="woocommerce-billing-fields">
	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<!-- <h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Basic informations</h4> -->

	<?php else : ?>

		<!-- <h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Basic informations</h4> -->

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<div class="woocommerce-billing-fields__field-wrapper">
		<?php foreach ( $checkout->get_checkout_fields( 'billing' ) as $key => $field ) : ?>
			<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
		<?php endforeach; ?>
	</div>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ) ?> type="checkbox" name="createaccount" value="1" /> <span><?php _e( 'Create an account?', 'soup' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' )  as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>

	<script>
		jQuery(document).ready(function($) {

			// $('.available_stock').each(function(index, el) {
			// 	var id = $(this).attr("data-id");
			// 	var stock = $(this).text();
			// 	console.log(id);
			// 	console.log(stock);
			// 	// var label = 'In stock';
			// 	// if(parseInt(id) === '-1') {
			// 	// 	label = 'Out of stock';
			// 	// 	id = '';
			// 	// }
			// 	$('.panel-details-content').find('.'+id+'').text(stock);
			// });


			$('#soup_deliver_time').on('change', function() {
				//console.log( $(this).val() );
			    if($(this).val() == 'chck-delver-opt1') {
			       $('#byconsolewooodt_checkout_field').hide();
			    } else if($(this).val() == 'chck-delver-opt2') {
			       $('#byconsolewooodt_checkout_field').show();
			    }
			});

			if ( $('#soup_own_checkout_field').hasClass('out_of_stock') ) {
				//console.log($('#soup_deliver_time').val());
					$('#soup_deliver_time').find('option[value=chck-delver-opt1]').attr("disabled", true);
					$('#soup_deliver_time').val('chck-delver-opt2');
					$('#byconsolewooodt_checkout_field').show();
			} else {
				//console.log('none');
			}



		});
	</script>