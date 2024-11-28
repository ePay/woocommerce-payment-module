<?php
class Epay_ApplePay extends subgate
{
    public function __construct()
    {
        parent::__construct();

        $this->id = "epay_applepay";
        // $this->enabled = "yes";
        
        $this->method_title = "ePay - ApplePay";

        $this->setup();

        $this->title = "ePay - ApplePay";
        $this->description = "ePay - ApplePay description";

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
