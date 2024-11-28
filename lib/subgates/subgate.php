<?php
class subgate extends Epay_Payment {

    public $main_settings = null;

    function __construct()
    {
        parent::__construct();

        $this->supports = [
            'products',
            'refunds'
        ];
    }
    
    public function setup()
    {
        $this->init_hooks();

        $this->main_settings = $this->settings;

        $this->init_form_fields();
        $this->init_settings();
    }

    public function init_form_fields() {
        $this->form_fields = [];
    }

}
?>
