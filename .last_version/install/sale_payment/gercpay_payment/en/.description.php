<?php
global $MESS;
$MESS["GERCPAY_MERCHANT_ID"]              = "Merchant Account";
$MESS["GERCPAY_MERCHANT_ID_DESC"]         = "Given to Merchant by GercPay";
$MESS["GERCPAY_SECRET_KEY"]               = "Secret key";
$MESS["GERCPAY_SECRET_KEY_DESC"]          = "Given to Merchant by GercPay";
$MESS["GERCPAY_PRICE_CURRENCY"]           = "Currency";
$MESS["GERCPAY_PRICE_CURRENCY_DESC"]      = "Attention! This value should correspond to UAH";
$MESS["GERCPAY_SERVER_CALLBACK_URL"]      = "URL of the result information";
$MESS["GERCPAY_SERVER_CALLBACK_URL_DESC"] = "URL where information about the payment result will be received. Default: https://{your_site}/bitrix/tools/gercpay_payment/gercpay_result.php";
$MESS["GERCPAY_APPROVE_URL"]              = "Successful payment redirect URL";
$MESS["GERCPAY_APPROVE_URL_DESC"]         = "URL to which the client will return upon successful payment. Default: https://{your_site}/personal/order/";
$MESS["GERCPAY_DECLINE_URL"]              = "Redirect URL failed to pay";
$MESS["GERCPAY_DECLINE_URL_DESC"]         = "URL to which the client will return if the payment is not successful. Default: https://{your_site}/personal/order/";
$MESS["GERCPAY_CANCEL_URL"]               = "Redirect URL in case of failure to make payment";
$MESS["GERCPAY_CANCEL_URL_DESC"]          = "URL to which the client will return if he canceled the payment. Default: https://{your_site}/personal/order/";
$MESS["GERCPAY_LANGUAGE"]                 = "Payment page language";
$MESS["GERCPAY_LANGUAGE_DESC"]            = "Default: RU";
$MESS["GERCPAY_DESCRIPTION"]              = "Payment by card on the site";
$MESS["GERCPAY_SIGNATURE_ERROR"]          = "Invalid payment signature";
?>