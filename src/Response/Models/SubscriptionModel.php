<?php

namespace Flowwow\Cloudpayments\Response\Models;

/**
 * Class SubscriptionModel
 * @package Flowwow\Cloudpayments\Response\Models
 */
class SubscriptionModel extends BaseModel
{
    public ?string $id                           = null;
    public ?string $accountId                    = null;
    public ?string $description                  = null;
    public ?string $email                        = null;
    public ?float  $amount                       = null;
    public ?int    $currencyCode                 = null;
    public ?string $currency                     = null;
    public ?bool   $requireConfirmation          = null;
    public ?string $startDate                    = null;
    public ?string $startDateIso                 = null;
    public ?int    $intervalCode                 = null;
    public ?string $interval                     = null;
    public ?int    $period                       = null;
    public ?int    $maxPeriods                   = null;
    public ?string $cultureName                  = null;
    public ?int    $statusCode                   = null;
    public ?string $status                       = null;
    public ?int    $successfulTransactionsNumber = null;
    public ?int    $failedTransactionsNumber     = null;
    public ?string $lastTransactionDate          = null;
    public ?string $lastTransactionDateIso       = null;
    public ?string $nextTransactionDate          = null;
    public ?string $nextTransactionDateIso       = null;
}
