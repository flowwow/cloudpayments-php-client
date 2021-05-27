<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;
use Flowwow\Cloudpayments\Exceptions\BadTypeException;

/**
 * Class PaymentsConfirm
 * @package Flowwow\Cloudpayments\CardPayment
 * @see https://developers.cloudpayments.ru/#podtverzhdenie-oplaty
 *
 */
class PaymentsConfirm extends BaseRequest
{
    /**
     * @var int|float
     */
    public         $amount;
    public int     $transactionId;
    public ?string $jsonData;

    /**
     * PaymentsConfirm constructor.
     * @param int|float $amount
     * @param int $transactionId
     * @param string|null $jsonData
     * @throws BadTypeException
     */
    public function __construct($amount, int $transactionId, ?string $jsonData = null)
    {
        if (!is_numeric($amount)) {
            throw new BadTypeException('Amount isn\'t numeric');
        }

        $this->amount = $amount;
        $this->transactionId = $transactionId;

        if ($jsonData) {
            $this->jsonData = $jsonData;
        }
    }
}
