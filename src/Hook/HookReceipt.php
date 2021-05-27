<?php

namespace Flowwow\Cloudpayments\Hook;


use Flowwow\Cloudpayments\BaseHook;

/**
 * Class HookReceipt
 *
 */
class HookReceipt extends BaseHook
{
    public $id;
    public $documentNumber;
    public $sessionNumber;
    public $number;
    public $fiscalSign;
    public $deviceNumber;
    public $regNumber;
    public $fiscalNumber;
    public $inn;
    public $type;
    public $ofd;
    public $url;
    public $qrCodeUrl;
    /**
     * @var int|null
     */
    public $transactionId;
    public $amount;
    public $dateTime;
    public $invoiceId;
    public $accountId;
    public $receipt;
    public $calculationPlace;
    public $settlePlace;
}