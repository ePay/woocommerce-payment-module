<?php
class Epay_MobilePay extends subgate
{
    public function __construct()
    {
        parent::__construct();

        $this->id = "epay_mobilepay";
        $this->paymenttype = 29;
		$this->icon = $this->plugin_url('images/mobilepay.svg');
        // $this->enabled = "yes";
        
        $this->method_title = "ePay - MobilePay";

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
