<?php
class Epay_iDEAL extends subgate
{
    public function __construct()
    {
        parent::__construct();

        $this->id = "epay_ideal";
        $this->paymenttype = 25;
		$this->icon = WP_PLUGIN_URL . '/epay-payment/images/ideal.svg';
        // $this->enabled = "yes";
        
        $this->method_title = "ePay - iDEAL";

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
