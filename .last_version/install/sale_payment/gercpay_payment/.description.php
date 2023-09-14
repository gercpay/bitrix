<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?><?php
include(GetLangFileName(__DIR__ . "/", "/.description.php"));

$psTitle = "GercPay";
$psDescription = "<a href=\"https://gercpay.com.ua\" target=\"_blank\">https://gercpay.com.ua</a>";

$array = array(
    'gercpay_merchant',
    'gercpay_secret_key',
    'gercpay_price_currency',
    'gercpay_server_callback_url',
    'gercpay_response_url',
    'gercpay_language'
);

$arPSCorrespondence = array(
    "CP_MERCHANT_ID" => array(
        "NAME"  => GetMessage("GERCPAY_MERCHANT_ID"),
        "DESCR" => GetMessage("GERCPAY_MERCHANT_ID_DESC"),
        "VALUE" => "",
        "TYPE"  => ""
    ),
    "CP_SECRET_KEY" => array(
        "NAME"  => GetMessage("GERCPAY_SECRET_KEY"),
        "DESCR" => GetMessage("GERCPAY_SECRET_KEY_DESC"),
        "VALUE" => "",
        "TYPE"  => ""
    ),
    "CP_PRICE_CURRENCY" => array(
        "NAME"  => GetMessage("GERCPAY_PRICE_CURRENCY"),
        "DESCR" => GetMessage("GERCPAY_PRICE_CURRENCY_DESC"),
        "VALUE" => "CURRENCY",
        "TYPE"  => "ORDER"
    ),
    "CP_APPROVE_URL" => array(
        "NAME"  => GetMessage("GERCPAY_APPROVE_URL"),
        "DESCR" => GetMessage("GERCPAY_APPROVE_URL_DESC"),
        "VALUE" => "",
        "TYPE"  => ""
    ),
    "CP_DECLINE_URL" => array(
        "NAME"  => GetMessage("GERCPAY_DECLINE_URL"),
        "DESCR" => GetMessage("GERCPAY_DECLINE_URL_DESC"),
        "VALUE" => "",
        "TYPE"  => ""
    ),
    "CP_CANCEL_URL" => array(
        "NAME"  => GetMessage("GERCPAY_CANCEL_URL"),
        "DESCR" => GetMessage("GERCPAY_CANCEL_URL_DESC"),
        "VALUE" => "",
        "TYPE"  => ""
    ),
    "CP_SERVER_CALLBACK_URL" => array(
        "NAME"  => GetMessage("GERCPAY_SERVER_CALLBACK_URL"),
        "DESCR" => GetMessage("GERCPAY_SERVER_CALLBACK_URL_DESC"),
        "VALUE" => "",
        "TYPE"  => ""
    ),
    "CP_LANGUAGE" => array(
        "NAME"  => GetMessage("GERCPAY_LANGUAGE"),
        "DESCR" => GetMessage("GERCPAY_LANGUAGE_DESC"),
        "VALUE" => "RU",
        "TYPE"  => ""
    ),
);
?>