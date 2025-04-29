<?php
class Epay_PayPal extends subgate
{
    public function __construct()
    {
        parent::__construct();

        $this->id = "epay_paypal";
        $this->paymenttype = 14;
		$this->icon = $this->plugin_url('images/paypal.svg');
        // $this->enabled = "yes";
        
        $this->method_title = "ePay - PayPal";

        $this->setup();

        $this->title = $this->get_settings( 'title' );
        $this->description = $this->get_settings( 'description' );
    }

    public function init_form_fields()
    {
	    $this->form_fields = array(
		    'enabled'                         => array(
				'title'   => 'Activate module',
				'type'    => 'checkbox',
				'label'   => 'Enable ePay Payment Solutions as a payment option.',
				'default' => 'yes'
			),
			    'title'                           => array(
				'title'       => 'Title',
				'type'        => 'text',
				'description' => 'The title of the payment method displayed to the customers.',
				'default'     => 'ePay Payment Solutions'
			),
				'description'                     => array(
				'title'       => 'Description',
				'type'        => 'textarea',
				'description' => 'The description of the payment method displayed to the customers.',
				'default'     => 'Pay using ePay Payment Solutions'
            )
        );
    }
}
?>
