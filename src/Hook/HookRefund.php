<?php

namespace Flowwow\Cloudpayments\Hook;

use Flowwow\Cloudpayments\BaseHook;

/**
 * Class HookRefund
 * @link https://developers.cloudpayments.ru/#refund
 */
class HookRefund extends BaseHook
{
    // Required

    public ?int    $transactionId        = null;
    public ?int    $paymentTransactionId = null;
    public ?float  $amount               = null;
    public ?string $dateTime             = null;
    public ?string $operationType        = null;

    // Not required

    public ?string $invoiceId = null;
    public ?string $accountId = null;
    public ?string $email     = null;
    public ?string $data      = null;
}
