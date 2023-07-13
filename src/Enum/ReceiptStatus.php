<?php

namespace Flowwow\Cloudpayments\Enum;

/**
 * Статус чека
 *
 * @see https://developers.cloudkassir.ru/#zapros-statusa-cheka
 */
class ReceiptStatus extends Enum
{
    public const STATUS_PROCESSED = 'Processed';
    public const STATUS_NOTFOUND = 'NotFound';
    public const STATUS_ERROR = 'Error';
    public const STATUS_QUEUED = 'Queued';

}