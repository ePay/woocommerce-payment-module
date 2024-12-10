<?php
class Epay_ViaBill extends subgate
{
    public function __construct()
    {
        parent::__construct();

        $this->id = "epay_viabill";
        $this->paymentcollection = 7;
        $this->paymenttype = 23;
		$this->icon = WP_PLUGIN_URL . '/epay-payment/images/viabill.svg';
        // $this->enabled = "yes";
        
        $this->method_title = "ePay - ViaBill";

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
