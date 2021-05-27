<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class PaymentsGet
 * @package Flowwow\Cloudpayments\CardPayment
 * @see https://developers.cloudpayments.ru/#prosmotr-tranzaktsii
 *
 */
class PaymentsGet extends BaseRequest
{
    public int $transactionId;

    /**
     * PaymentsGet constructor.
     * @param int $transactionId
     */
    public function __construct(int $transactionId)
    {
        $this->transactionId = $transactionId;
    }
}
