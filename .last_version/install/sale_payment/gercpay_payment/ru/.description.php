<?php
global $MESS;
$MESS["GERCPAY_MERCHANT_ID"]              = "Идентификатор торговца";
$MESS["GERCPAY_MERCHANT_ID_DESC"]         = "Выдаётся торговцу системой GercPay";
$MESS["GERCPAY_SECRET_KEY"]               = "Секретный ключ";
$MESS["GERCPAY_SECRET_KEY_DESC"]          = "Выдаётся торговцу системой GercPay";
$MESS["GERCPAY_PRICE_CURRENCY"]           = "Валюта платежа";
$MESS["GERCPAY_PRICE_CURRENCY_DESC"]      = "Внимание! Это значение должно соответствовать UAH";
$MESS["GERCPAY_SERVER_CALLBACK_URL"]      = "URL для информации об оплате";
$MESS["GERCPAY_SERVER_CALLBACK_URL_DESC"] = "URL, по которому будет приходить информация о результате платежа. По умолчанию: https://{your_site}/bitrix/tools/gercpay_payment/gercpay_result.php";
$MESS["GERCPAY_APPROVE_URL"]              = "URL перенаправления при успешном платеже";
$MESS["GERCPAY_APPROVE_URL_DESC"]         = "URL, на который вернется клиент при успешной оплате. По умолчанию: https://{your_site}/personal/order/";
$MESS["GERCPAY_DECLINE_URL"]              = "URL перенаправления при неудачном платеже";
$MESS["GERCPAY_DECLINE_URL_DESC"]         = "URL, на который вернется клиент, если платеж не успешен. По умолчанию: https://{your_site}/personal/order/";
$MESS["GERCPAY_CANCEL_URL"]               = "URL перенаправления при отмене платежа";
$MESS["GERCPAY_CANCEL_URL_DESC"]          = "URL, на который вернётся клиент, если он отменил платеж. По умолчанию: https://{your_site}/personal/order/";
$MESS["GERCPAY_LANGUAGE"]                 = "Язык страницы платежной системы";
$MESS["GERCPAY_LANGUAGE_DESC"]            = "По умолчанию: RU";
$MESS["GERCPAY_DESCRIPTION"]              = "Оплата картой на сайте";
$MESS["GERCPAY_SIGNATURE_ERROR"]          = "Неправильная подпись платежа";
?>