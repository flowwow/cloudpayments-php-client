<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class TokenPayment
 * @package Flowwow\Cloudpayments\CardPayment
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokenPayment extends BaseRequest
{
    /**
     * @var int|float
     */
    public         $amount;
    public string  $currency;
    public string  $accountId;
    public string  $token;
    public ?string $invoiceId = null;
    public ?string $description = null;
    public ?string $ipAddress = null;
    public ?string $email = null;
    public ?string $jsonData = null;

    /**
     * TokenPayment constructor.
     * @param $amount
     * @param string $currency
     * @param string $accountId
     * @param string $token
     */
    public function __construct($amount, string $currency, string $accountId, string $token)
    {
        $this->amount    = $amount;
        $this->currency  = $currency;
        $this->accountId = $accountId;
        $this->token     = $token;
    }
}
