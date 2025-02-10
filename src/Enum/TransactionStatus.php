<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Статус транзакции
 *
 * @see https://developers.cloudpayments.ru/#statusy-operatsiy
 */
class TransactionStatus extends Enum
{
    public const STATUS_COMPLETED           = 'Completed';
    public const STATUS_AUTHORIZED          = 'Authorized';
    public const STATUS_AWAITING_AUTHORIZED = 'AwaitingAuthentication';
    public const STATUS_CANCELLED           = 'Cancelled';
    public const STATUS_DECLINED            = 'Declined';
    public const STATUS_CREATED             = 'Created';
    public const STATUS_PENDING             = 'Pending';
}
