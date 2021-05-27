<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class PaymentsVoid
 * @package Flowwow\Cloudpayments\CardPayment
 * @see https://developers.cloudpayments.ru/#otmena-oplaty
 */
class PaymentsVoid extends BaseRequest
{
    public int $transactionId;

    /**
     * PaymentsVoid constructor.
     * @param int $transactionId
     */
    public function __construct(int $transactionId)
    {
        $this->transactionId = $transactionId;
    }
}
