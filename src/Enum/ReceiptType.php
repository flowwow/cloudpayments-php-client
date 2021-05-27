<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Типы чека по признаку расчета
 * https://developers.cloudkassir.ru/#type
 *
 * @see Enum
 */
class ReceiptType extends Enum
{
    /**
     * Приход
     * Выдается при получении средств от покупателя (клиента)
     * @var string
     */
    public const INCOME = 'Income';
    /**
     * Возврат прихода
     * Выдается при возврате покупателю (клиенту) средств, полученных от него
     * @var string
     */
    public const INCOME_RETURN = 'IncomeReturn';
    /**
     * Расход
     * Выдается при выдаче средств покупателю (клиенту)
     * @var string
     */
    public const EXPENSE = 'Expense';
    /**
     * Возврат расхода
     * Выдается при получении средств от покупателя (клиента), выданных ему
     * @var string
     */
    public const EXPENSE_RETURN = 'ExpenseReturn';
}
