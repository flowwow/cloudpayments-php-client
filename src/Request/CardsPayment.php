<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;
use Flowwow\Cloudpayments\Exceptions\BadTypeException;

/**
 * Class CardsPayment
 * @package Flowwow\Cloudpayments\CardPayment
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CardsPayment extends BaseRequest
{
    /**
     * @var int|float
     */
    public         $amount;
    public string  $currency;
    public string  $ipAddress;
    public ?string $name = null;//Обязательно если не эппл и не гуглпей
    public string  $cardCryptogramPacket;
    public ?string $paymentUrl = null;
    public ?string $invoiceId = null;
    public ?string $description = null;
    public ?string $cultureName = null;
    public ?string $accountId = null;
    public ?string $email = null;
    public ?array  $payer;
    public ?string $jsonData = null;

    /**
     * CardsPayment constructor.
     * @param $amount
     * @param string $currency
     * @param string $ipAddress
     * @param string $cardCryptogramPacket
     * @throws BadTypeException
     */
    public function __construct($amount, string $currency, string $ipAddress, string $cardCryptogramPacket)
    {
        if (!is_numeric($amount)) {
            throw new BadTypeException('Amount isn\'t numeric');
        }

        $this->amount               = $amount;
        $this->currency             = $currency;
        $this->ipAddress            = $ipAddress;
        $this->cardCryptogramPacket = $cardCryptogramPacket;
    }
}
