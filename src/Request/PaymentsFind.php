<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class PaymentsFind
 * @package Flowwow\Cloudpayments\CardPayment
 * @see https://developers.cloudpayments.ru/#proverka-statusa-platezha
 */
class PaymentsFind extends BaseRequest
{
    public string $invoiceId;

    /**
     * PaymentsFind constructor.
     * @param string $invoiceId
     */
    public function __construct(string $invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }
}
