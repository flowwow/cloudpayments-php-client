<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class TokenTopUp
 * @package Flowwow\Cloudpayments\CardPayment
 * @see https://developers.cloudpayments.ru/#vyplata-po-tokenu
 */
class TokenTopUp extends BaseRequest
{
    public string  $token;
    /**
     * @var int|float
     */
    public         $amount;
    public string  $accountId;
    public string  $currency;
    public ?string $invoiceId = null;
    public ?array  $payer;
    public ?array  $receiver;
}
