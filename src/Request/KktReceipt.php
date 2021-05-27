<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class KktReceipt
 * @package Flowwow\Cloudpayments\Request
 * @see https://developers.cloudkassir.ru/#formirovanie-kassovogo-che
 */
class KktReceipt extends BaseRequest
{
    public string  $inn;
    public string  $type;
    public array   $customerReceipt;
    public ?string $invoiceId;
    public ?string $accountId;

    /**
     * KktReceipt constructor.
     * @param string $inn
     * @param string $type
     * @param array $customerReceipt
     */
    public function __construct(string $inn, string $type, array $customerReceipt)
    {
        $this->inn             = $inn;
        $this->type            = $type;
        $this->customerReceipt = $customerReceipt;
    }
}
