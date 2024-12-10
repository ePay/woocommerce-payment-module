const gateways = [['Epay_Payment', 'epay_dk'], ['Epay_MobilePay', 'epay_mobilepay'], ['Epay_ApplePay', 'epay_applepay'], ['Epay_ViaBill', 'epay_viabill'], ['Epay_PayPal', 'epay_paypal'], ['Epay_Klarna', 'epay_klarna'], ['Epay_iDEAL', 'epay_ideal']];

gateways.forEach(gateway => {

    const gateway_class = gateway[0];
    const gateway_id = gateway[1];

    const settings = window.wc.wcSettings.getSetting( gateway_class + '_data', {} );
    
    const ariaLabel = window.wp.htmlEntities.decodeEntities( settings.title );

    const icon = '<img src="'+settings.icon+'">';
    
    const Label = () => {
        return window.wp.element.createElement('span', {className: 'blocks-woocommerce-epay-inner'},
            window.wp.element.createElement('span', {
                className: 'blocks-woocommerce-epay-inner__title'
            }, ariaLabel),
            window.wp.element.createElement('span', {
                dangerouslySetInnerHTML: {__html: icon},
                className: 'blocks-woocommerce-epay-inner__icons'
            }),
        );
    };

    const Content = () => {
        return window.wp.htmlEntities.decodeEntities( settings.description || '' );
    };

    const Block_Gateway = {
        // name: 'epay_dk',
        name: gateway_id,
        label: Object( window.wp.element.createElement )( Label, null ),
        content: Object( window.wp.element.createElement )( Content, null ),
        edit: Object( window.wp.element.createElement )( Content, null ),
        canMakePayment: () => true,
        ariaLabel: ariaLabel,
        supports: {
            features: settings.supports,
        },
    };
    window.wc.wcBlocksRegistry.registerPaymentMethod( Block_Gateway );

});

/*
const settings2 = window.wc.wcSettings.getSetting( 'Epay_MobilePay_data', {} );
const label2 = window.wp.htmlEntities.decodeEntities( settings2.title );

const Content2 = () => {
    return window.wp.htmlEntities.decodeEntities( settings2.description || '' );
};

const Block_Gateway2 = {
    name: 'epay_mobilepay',
    label: label2,
    content: Object( window.wp.element.createElement )( Content2, null ),
    edit: Object( window.wp.element.createElement )( Content2, null ),
    canMakePayment: () => true,
    ariaLabel: label2,
    supports: {
        features: settings2.supports,
    },
};
window.wc.wcBlocksRegistry.registerPaymentMethod( Block_Gateway2 );
*/
