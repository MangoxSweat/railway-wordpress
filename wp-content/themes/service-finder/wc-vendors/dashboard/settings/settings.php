<?php
/**
 * Settings Template
 *
 * This template can be overridden by copying it to yourtheme/wc-vendors/dashboard/settings/settings.php
 *
 * @author		Jamie Madden, WC Vendors
 * @package 	WCVendors/Templates/Emails/HTML
 * @version 	2.0.0

 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }
?>

<h2><?php esc_html_e( 'Settings', 'service-finder' ); ?></h2>

<?php if ( function_exists( 'wc_print_notices' ) ) { wc_print_notices(); } ?>

<form method="post" class="sf-mangopay-accountform">
	<?php

	do_action( 'wcvendors_settings_before_paypal' );

	do_action( 'wcvendors_settings_after_paypal' );

	?>

	<?php

	do_action( 'wcvendors_settings_after_shop_name' );

	
	do_action( 'wcvendors_settings_after_seller_info' );

	if ( $shop_description !== 'false' ) {
		do_action( 'wcvendors_settings_after_shop_description' );
	}
	?>

	<?php wp_nonce_field( 'save-shop-settings', 'wc-product-vendor-nonce' ); ?>
	<input type="submit" class="btn btn-inverse btn-small" style="float:none;" name="vendor_application_submit"
		   value="<?php esc_attr_e( 'Save', 'service-finder' ); ?>"/>
</form>
