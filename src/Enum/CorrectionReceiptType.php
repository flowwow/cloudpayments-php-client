<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Признак расчета коррекции
 * @see https://developers.cloudkassir.ru/#correctionreceipttype
 */
class CorrectionReceiptType extends Enum
{
    /** @var int Корректировка прихода */
    public const PARISH_ADJUSTMENT = 1;

    /** @var int Возврат прихода */
    public const RETURN_OF_PARISH = 2;

    /** @var int Корректировка расхода */
    public const EXPENSE_ADJUSTMENT = 3;

    /** @var int Возврат расхода */
    public const EXPENSE_REFUND = 4;
}
