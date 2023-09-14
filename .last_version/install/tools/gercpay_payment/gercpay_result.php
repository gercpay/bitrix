<?php
#ini_set( "display_errors", true );
#error_reporting( E_ALL );
if (!require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php')) {
    die('prolog_before.php not found!');
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die();
}

if (CModule::IncludeModule('sale')) {
    $data = json_decode(file_get_contents('php://input'), true);

    $errorMessages = '';
    $orderID = $data['orderReference'] ?? '';
    if (! empty($orderID)) {
        $arOrder = CSaleOrder::GetByID($orderID);

        include $_SERVER['DOCUMENT_ROOT'] . '/bitrix/php_interface/include/sale_payment/gercpay_payment/gercpay.php';

        $payID = $arOrder['PAY_SYSTEM_ID'];
        CSalePaySystemAction::InitParamArrays($arOrder, $arOrder['ID']);
        $secretKey = CSalePaySystemAction::GetParamValue('CP_SECRET_KEY');
        $merchantID = CSalePaySystemAction::GetParamValue('CP_MERCHANT_ID');
        $currency = empty(CSalePaySystemAction::GetParamValue('CP_PRICE_CURRENCY')) ?
            Gercpay::CURRENCY_HRYVNA :
            CSalePaySystemAction::GetParamValue('CP_PRICE_CURRENCY');

        if ($merchantID !== $data['merchantAccount']) {
            $errorMessages .= Loc::GetMessage('GERCPAY_ERROR_MERCHANT') . PHP_EOL;
        }

        if ($currency !== $data['currency']) {
            $errorMessages .= Loc::GetMessage('GERCPAY_ERROR_CURRENCY') . PHP_EOL;
        }

        if ((float)$arOrder['PRICE'] !== (float)$data['amount']) {
            $errorMessages .= Loc::GetMessage('GERCPAY_ERROR_AMOUNT') . PHP_EOL;
        }

        $gercpayPayment = new Gercpay();
        $CPResult = $gercpayPayment->isPaymentValid($data);
    } else {
        $CPResult = Loc::GetMessage('GERCPAY_ERROR_ORDER');
    }

    if ($CPResult === true && isset($data['type'])) {
        $status = '';
        $isPayed = '';
        $isCanceled = '';
        $reasonCanceled = '';
        if ($data['type'] === Gercpay::RESPONSE_TYPE_PAYMENT) {
            // Purchase callback.
            /*Статус P=payed, если Вы используете другой финальный статус, то замените на нужный*/
            $status = 'P';
            $isPayed = 'Y';
            $isCanceled = 'N';
        } elseif ($data['type'] === Gercpay::RESPONSE_TYPE_REVERSE) {
            // Refunded payment callback.
            // Перевод заказа в следующее состояние: "Статус" - "Выполнен" (F=final), "Оплачен" - "Нет", "Отменён" - "Да".
            $status = 'F';
            $isPayed = 'N';
            $isCanceled = 'Y';
            $reasonCanceled = 'Refund payment';
        }

        if (! empty($status)) {
            $arFields = array(
                'STATUS_ID' => $status,
                'PS_STATUS' => 'Y',
                'CANCELED' => $isCanceled,
                'REASON_CANCELED' => $reasonCanceled,
                'PS_STATUS_CODE' => $data['transactionStatus'],
                'PS_STATUS_DESCRIPTION' => $data['transactionStatus'] . ' ' . $payID,
                'PS_STATUS_MESSAGE' => ' - ',
                'PS_SUM' => $data['amount'],
                'PS_CURRENCY' => $data['currency'],
                'PS_RESPONSE_DATE' => date('d.m.Y H:i:s'),
            );

            CSaleOrder::PayOrder($arOrder['ID'], $isPayed);
            CSaleOrder::Update($orderID, $arFields);
        }
    } else {
        if (! empty($errorMessages)) {
            print_r($errorMessages);
        }
        print_r($CPResult);
    }
}

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php');
