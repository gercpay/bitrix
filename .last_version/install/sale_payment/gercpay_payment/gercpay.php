<?php

use Bitrix\Main\SystemException;

/**
 * Class Gercpay
 */
class Gercpay
{
    const URL = 'https://api.gercpay.com.ua/api/';

    const ORDER_NEW                   = 'New';
    const ORDER_DECLINED              = 'Declined';
    const ORDER_REFUND_IN_PROCESSING  = 'RefundInProcessing';
    const ORDER_REFUNDED              = 'Refunded';
    const ORDER_EXPIRED               = 'Expired';
    const ORDER_PENDING               = 'Pending';
    const ORDER_APPROVED              = 'Approved';
    const ORDER_WAITING_AUTH_COMPLETE = 'WaitingAuthComplete';
    const ORDER_IN_PROCESSING         = 'InProcessing';
    const ORDER_SEPARATOR             = '#';
    const RESPONSE_TYPE_PAYMENT       = 'payment';
    const RESPONSE_TYPE_REVERSE       = 'reverse';
    const CURRENCY_HRYVNA             = 'UAH';
    const SIGNATURE_SEPARATOR         = ';';

    /**
     * @var string
     */
    protected $secret_key = '';

    /**
     * @var string[]
     */
    protected $keysForResponseSignature = array(
        'merchantAccount',
        'orderReference',
        'amount',
        'currency'
    );

    /**
     * @var string[]
     */
    protected $keysForSignature = array(
        'merchant_id',
        'order_id',
        'amount',
        'currency_iso',
        'description'
    );

    /**
     * Generate signature for operation.
     *
     * @param array $option Request or response data.
     * @param array $keys   Keys for signature.
     * @return string
     * @throws SystemException
     */
    public function getSignature($option, $keys)
    {
        $hash = array();
        foreach ($keys as $dataKey) {
            if (!isset($option[$dataKey])) {
                continue;
            }
            if (is_array($option[$dataKey])) {
                foreach ($option[$dataKey] as $v) {
                    $hash[] = $v;
                }
            } else {
                $hash [] = $option[$dataKey];
            }
        }

        $hash = implode(self::SIGNATURE_SEPARATOR, $hash);
        return hash_hmac('md5', $hash, CSalePaySystemAction::GetParamValue('CP_SECRET_KEY'));
    }

    /**
     * Generate request signature.
     *
     * @param array $options Request data.
     * @return string
     * @throws SystemException
     */
    public function getRequestSignature($options)
    {
        return $this->getSignature($options, $this->keysForSignature);
    }

    /**
     * Generate response signature.
     *
     * @param array $options Response data.
     * @return string
     * @throws SystemException
     */
    public function getResponseSignature($options)
    {
        return $this->getSignature($options, $this->keysForResponseSignature);
    }

    /**
     * Checking is payment valid.
     *
     * @param array $response Response data.
     * @return boolean|string
     * @throws SystemException
     */
    public function isPaymentValid($response)
    {
        $sign = $this->getResponseSignature($response);
        if ($sign !== $response['merchantSignature']) {
            return GetMessage('GERCPAY_SIGNATURE_ERROR');
        }

        if ($response['transactionStatus'] === self::ORDER_APPROVED) {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    protected function getRequest()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    /**
     * @param string $key Secret key.
     */
    public function setSecretKey($key)
    {
        $this->secret_key = $key;
    }

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secret_key;
    }
}
