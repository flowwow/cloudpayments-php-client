<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;
use Flowwow\Cloudpayments\Exceptions\BadTypeException;

/**
 * Class PaymentsAlt
 */
abstract class PaymentsAlt extends BaseRequest implements PaymentsAltInterface
{
    /**
     * @var int|float
     */
    public         $amount;
    public string  $publicId;
    public string  $currency;
    public string  $altPayType;
    public string  $scheme;
    public ?string $description;
    public ?string $accountId;
    public ?string $email;
    public ?string $jsonData;
    public ?string $invoiceId;
    public ?string $successRedirectUrl;
    public ?string $failRedirectUrl;
    public ?string $ipAddress;
    public ?int    $ttlMinutes;
    public ?bool   $isTest;

    /**
     * PaymentsAlt constructor.
     * @param mixed $amount
     * @param string $publicId
     * @param string $currency
     * @param string $description
     * @throws BadTypeException
     */
    public function __construct($amount, string $publicId, string $currency, string $description)
    {
        if (!is_numeric($amount)) {
            throw new BadTypeException('Amount isn\'t numeric');
        }
        $this->amount      = $amount;
        $this->publicId    = $publicId;
        $this->currency    = $currency;
        $this->description = $description;
        $this->scheme      = 'charge';
    }
}
