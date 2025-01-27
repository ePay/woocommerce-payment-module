<?php

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

final class Epay_Payment_Blocks extends AbstractPaymentMethodType {

    private $gateway;
    // protected $name = 'Epay_Payment';// your payment gateway name

    public function __construct($payment_gateway)
    {
        // var_dump($payment_gateway);
        // echo get_class($payment_gateway);
        // echo "<br><br>";
        // die('hard');
        $this->name = get_class($payment_gateway);
        $this->gateway = $payment_gateway;
    }

    public function initialize() {
        // $this->settings = get_option( 'woocommerce_my_custom_gateway_settings', [] );
        // $this->gateway = new Epay_Payment();
    }

    public function is_active() {
        return $this->gateway->is_available();
    }

    public function get_payment_method_script_handles() {

        wp_register_script(
            'epay_payment-blocks-integration',
            plugin_dir_url(__FILE__) . 'scripts/checkout.js',
            [
                'wc-blocks-registry',
                'wc-settings',
                'wp-element',
                'wp-html-entities',
                'wp-i18n',
            ],
            1,
            true
        );
        if( function_exists( 'wp_set_script_translations' ) ) {
            wp_set_script_translations( 'epay_payment-blocks-integration');

        }
        return [ 'epay_payment-blocks-integration' ];
    }

    public function get_payment_method_data() {
        return [
            'title' => $this->gateway->title,
            'description' => $this->gateway->description,
            'supports' => $this->gateway->supports,
            'icon' => $this->gateway->icon,
        ];
    }

}

?>
