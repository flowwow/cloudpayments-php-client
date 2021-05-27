<?php

namespace Flowwow\Cloudpayments\Response\Models;

/**
 * Class TransactionModel
 * @package Flowwow\Cloudpayments\Response\Models
 */
class TransactionModel extends BaseModel
{
    public ?int    $transactionId                         = null;
    public ?string $publicId                              = null;
    public ?string $terminalUrl                           = null;
    public ?float  $amount                                = null;
    public ?string $currency                              = null;
    public ?int    $currencyCode                          = null;
    public ?float  $paymentAmount                         = null;
    public ?string $paymentCurrency                       = null;
    public ?int    $paymentCurrencyCode                   = null;
    public ?string $invoiceId                             = null;
    public ?string $accountId                             = null;
    public ?string $email                                 = null;
    public ?string $description                           = null;
    public ?string $jsonData                              = null;
    public ?string $createdDate                           = null;
    public ?string $createdDateIso                        = null;
    public ?string $payoutDate                            = null;
    public ?string $payoutDateIso                         = null;
    public ?int    $payoutAmount                          = null;
    public ?string $authDate                              = null;
    public ?string $authDateIso                           = null;
    public ?string $confirmDate                           = null;
    public ?string $confirmDateIso                        = null;
    public ?string $authCode                              = null;
    public ?bool   $testMode                              = null;
    public ?string $rrn                                   = null;
    public ?int    $originalTransactionId                 = null;
    public ?int    $fallBackScenarioDeclinedTransactionId = null;
    public ?string $ipAddress                             = null;
    public ?string $ipCountry                             = null;
    public ?string $ipCity                                = null;
    public ?string $ipRegion                              = null;
    public ?string $ipDistrict                            = null;
    public ?string $ipLatitude                            = null;
    public ?string $ipLongitude                           = null;
    public ?string $cardFirstSix                          = null;
    public ?string $cardLastFour                          = null;
    public ?string $cardExpDate                           = null;
    public ?string $cardType                              = null;
    public ?int    $cardTypeCode                          = null;
    public ?string $cardProduct                           = null;
    public ?string $cardCategory                          = null;
    public ?string $issuer                                = null;
    public ?string $issuerBankCountry                     = null;
    public ?string $status                                = null;
    public ?int    $statusCode                            = null;
    public ?string $cultureName                           = null;
    public ?string $reason                                = null;
    public ?int    $reasonCode                            = null;
    public ?string $cardHolderMessage                     = null;
    public ?int    $type                                  = null;
    public ?bool   $refunded                              = null;
    public ?string $name                                  = null;
    public ?int    $subscriptionId                        = null;
    public ?bool   $isLocalOrder                          = null;
    public ?bool   $hideInvoiceId                         = null;
    public ?string $token                                 = null;
    public ?int    $gateway                               = null;
    public ?string $gatewayName                           = null;
    public ?bool   $applePay                              = null;
    public ?bool   $androidPay                            = null;
    public ?bool   $masterPass                            = null;
    public ?float  $totalFee                              = null;
    public ?int    $escrowAccumulationId                  = null;

    /**
     * Получение переведенного кода ошибки
     * @return string
     */
    public function getClientErrorCode(): string
    {
        return 'cloudpayments_error_' . $this->reasonCode;
    }
}
