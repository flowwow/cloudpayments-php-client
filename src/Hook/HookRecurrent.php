<?php

namespace Flowwow\Cloudpayments\Hook;

use Flowwow\Cloudpayments\BaseHook;

/**
 * Class HookRecurrent
 * @link https://developers.cloudpayments.ru/#recurrent
 */
class HookRecurrent extends BaseHook
{
    // Required

    public ?string $id                           = null;
    public ?string $accountId                    = null;
    public ?string $description                  = null;
    public ?string $email                        = null;
    public ?float  $amount                       = null;
    public ?string $currency                     = null;
    public ?bool   $requireConfirmation          = null;
    public ?string $startDate                    = null;
    public ?string $interval                     = null;
    public ?int    $period                       = null;
    public ?string $status                       = null;
    public ?int    $successfulTransactionsNumber = null;
    public ?int    $failedTransactionsNumber     = null;

    // Not required

    public ?int    $maxPeriods          = null;
    public ?string $lastTransactionDate = null;
    public ?string $nextTransactionDate = null;
}
