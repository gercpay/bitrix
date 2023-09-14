<?php
global $MESS;
$MESS["GERCPAY_MERCHANT_ID"]              = "Ідентифікатор торговця";
$MESS["GERCPAY_MERCHANT_ID_DESC"]         = "Надається торговцю системою GercPay";
$MESS["GERCPAY_SECRET_KEY"]               = "Секретний ключ";
$MESS["GERCPAY_SECRET_KEY_DESC"]          = "Надається торговцю системою GercPay";
$MESS["GERCPAY_PRICE_CURRENCY"]           = "Валюта платежу";
$MESS["GERCPAY_PRICE_CURRENCY_DESC"]      = "Увага! Це значення має відповідати UAH";
$MESS["GERCPAY_SERVER_CALLBACK_URL"]      = "URL для інформації про результат";
$MESS["GERCPAY_SERVER_CALLBACK_URL_DESC"] = "URL на який буде надходити інформація про результат платежу. За замовчуванням: https://{your_site}/bitrix/tools/gercpay_payment/gercpay_result.php";
$MESS["GERCPAY_APPROVE_URL"]              = "URL переадресації для успішного платежу";
$MESS["GERCPAY_APPROVE_URL_DESC"]         = "URL, на який повернеться клієнт при успішній оплаті. За замовчуванням: https://{your_site}/personal/order/";
$MESS["GERCPAY_DECLINE_URL"]              = "URL переадресації для невдалого платежу";
$MESS["GERCPAY_DECLINE_URL_DESC"]         = "URL, на який повернеться клієнт при невдалій оплаті. За замовчуванням: https://{your_site}/personal/order/";
$MESS["GERCPAY_CANCEL_URL"]               = "URL переадресації для відміненого платежу";
$MESS["GERCPAY_CANCEL_URL_DESC"]          = "URL, на який повернеться клієнт при відмові від оплати. За замовчуванням: https://{your_site}/personal/order/";
$MESS["GERCPAY_LANGUAGE"]                 = "Мова сторінки платіжної системи";
$MESS["GERCPAY_LANGUAGE_DESC"]            = "За замовчуванням: RU";
$MESS["GERCPAY_DESCRIPTION"]              = "Оплата карткою на сайті";
$MESS["GERCPAY_SIGNATURE_ERROR"]          = "Неправильний підпис платежу";
?>