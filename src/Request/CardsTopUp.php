<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class CardsTopUp
 * @package Flowwow\Cloudpayments\CardPayment
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CardsTopUp extends BaseRequest
{
    public string $name;
    public string $cardCryptogramPacket;
    /**
     * @var int|float
     */
    public         $amount;
    public string  $accountId;
    public string  $currency;
    public ?string $email;
    public ?string $jsonData;
    public ?string $invoiceId;
    public ?string $description;
    public ?array  $payer;
    public ?array  $receiver;
}
