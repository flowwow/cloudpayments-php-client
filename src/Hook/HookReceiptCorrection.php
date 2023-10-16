<?php

namespace Flowwow\Cloudpayments\Hook;

use Flowwow\Cloudpayments\BaseHook;
use Flowwow\Cloudpayments\Request\Receipt\ReceiptAmounts;
use Flowwow\Cloudpayments\Request\Receipt\ReceiptItem;

/**
 * Чек коррекции
 */
class HookReceiptCorrection extends BaseHook
{
    public string $status;
    public string $errorCode;
    public string $errorMessage;
    /** @var ReceiptAmounts[] */
    public array $amounts = [];
    /** @var ReceiptItem */
    public array $items = [];

    public int    $taxationSystem;
    public int    $correctionType;
    public int    $correctionReceiptType;
    public int    $vatRate;
    public string $correctionDate;
    public int    $correctionNumber;
    public string $id;
    public int    $amount;
    public string $paymentPlace;
    public string $paymentAddress;
    public string $cashierName;
    public string $deviceNumber;
    public string $documentNumber;
    public string $fiscalNumber;
    public string $fiscalSign;
    public string $ofdName;
    public int    $ofd;
    public string $ofdInn;
    public string $organizationInn;
    public string $regNumber;
    public string $sessionCheckNumber;
    public string $sessionNumber;

}