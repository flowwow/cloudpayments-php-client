<?php

namespace Flowwow\Cloudpayments\Hook;

use Flowwow\Cloudpayments\BaseHook;

/**
 * Class HookCancel
 * @link https://developers.cloudpayments.ru/#cancel
 */
class HookCancel extends BaseHook
{
    // Required

    public ?int    $transactionId = null;
    public ?float  $amount        = null;
    public ?string $dateTime      = null;

    // Not required

    public ?string $invoiceId = null;
    public ?string $accountId = null;
    public ?string $email     = null;
    public ?string $data      = null;
}
