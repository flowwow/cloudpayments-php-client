<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;
use Flowwow\Cloudpayments\Exceptions\BadTypeException;

/**
 * Class OrderCreate
 * @package Flowwow\Cloudpayments\Request
 * @see https://developers.cloudpayments.ru/#sozdanie-scheta-dlya-otpravki-po-pochte
 */
class OrderCreate extends BaseRequest
{
    /**
     * @var int|float
     */
    public         $amount;
    public string  $currency;
    public string  $description;
    public ?string $email = null;
    public ?bool   $requireConfirmation = null;
    public ?bool   $sendEmail = null;
    public ?string $invoiceId = null;
    public ?string $accountId = null;
    public ?string $offerUri = null;
    public ?string $phone = null;
    public ?bool   $sendSms = null;
    public ?bool   $sendViber = null;
    public ?string $cultureName = null;
    public ?string $subscriptionBehavior = null;
    public ?string $successRedirectUrl = null;
    public ?string $failRedirectUrl = null;
    public ?string $jsonData = null;

    /**
     * OrderCreate constructor.
     * @param $amount
     * @param string $currency
     * @param string $description
     * @throws BadTypeException
     */
    public function __construct($amount, string $currency, string $description)
    {
        if (!is_numeric($amount)) {
            throw new BadTypeException('Amount isn\'t numeric');
        }
        $this->amount      = $amount;
        $this->currency    = $currency;
        $this->description = $description;
    }
}
