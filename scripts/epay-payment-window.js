/**
 * Copyright (c) 2017. All rights reserved ePay A/S.
 *
 * This program is free software. You are allowed to use the software but NOT allowed to modify the software.
 * It is also not legal to do any changes to the software and distribute it in your own name / brand.
 *
 * All use of the payment modules happens at your own risk. We offer a free test account that you can use to test the module.
 *
 * @author    ePay Payment Solutions
 * @copyright ePay Payment Solutions (https://epay.dk)
 * @license   ePay Payment Solutions
 */

var EpayPaymentWindow = EpayPaymentWindow ||
    (function () {
        var _epayArgsJson = {};
        return {
            init: function (epayArgsJson) {
                _epayArgsJson = epayArgsJson;
            },
            getJsonData: function () {
                return _epayArgsJson;
            },
        }
    }());

var isPaymentWindowReady = false;
var timerOpenWindow;

function PaymentWindowReady() {
    paymentwindow = new PaymentWindow(EpayPaymentWindow.getJsonData());

    isPaymentWindowReady = true;
}

function openPaymentWindow() {
    if (isPaymentWindowReady) {
        clearInterval(timerOpenWindow);
        paymentwindow.open();
    }
}

document.addEventListener('readystatechange', function (event) {
    if (event.target.readyState === "complete") {
        timerOpenWindow = setInterval("openPaymentWindow()", 600);
    }
});
