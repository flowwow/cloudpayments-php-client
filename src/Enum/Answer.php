<?php

namespace Flowwow\Payment\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Типы агента
 * https://developers.cloudkassir.ru/#agentsign
 *
 * @see Enum
 */
class Answer extends Enum
{
    /**
     * Платеж может быть проведен
     * Система выполнит авторизацию платежа
     * @var string
     */
    public const OK = 0;
    /**
     * Неверный номер заказа
     * Платеж будет отклонен
     * @var string
     */
    public const WRONG_ID = 10;
    /**
     * Некорректный AccountId
     * Платеж будет отклонен
     * @var string
     */
    public const WRONG_USER = 11;
    /**
     * Неверная сумма
     * Платеж будет отклонен
     * @var string
     */
    public const WRONG_SUM = 12;
    /**
     * Платеж не может быть принят
     * Платеж будет отклонен
     * @var string
     */
    public const CANT_ACCEPT = 13;
    /**
     * Платеж просрочен
     * Платеж будет отклонен, плательщик получит соответствующее уведомление
     * @var string
     */
    public const OVERDUE = 20;
}
