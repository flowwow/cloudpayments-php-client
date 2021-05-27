<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Типы агента
 * https://developers.cloudkassir.ru/#agentsign
 *
 * @see Enum
 */
class AgentSign extends Enum
{
    /**
     * "Банковский платежный агент", Оказание услуг пользователем, являющимся банковским платежным агентом
     * @var string
     */
    public const BANK_AGENT = 0;
    /**
     * "Банковский платежный субагент", Оказание услуг пользователем, являющимся банковским платежным субагентом
     * @var string
     */
    public const BANK_SUB_AGENT = 1;
    /**
     * "Платежный агент", Оказание услуг пользователем, являющимся платежным агентом
     * @var string
     */
    public const PAY_AGENT = 2;
    /**
     * "Платежный субагент", Оказание услуг пользователем, являющимся платежным субагентом
     * @var string
     */
    public const PAY_SUB_AGENT = 3;
    /**
     * "Поверенный", Оказание услуг пользователем, являющимся поверенным
     * @var string
     */
    public const ATTORNEY = 4;
    /**
     * "Комиссионер", Оказание услуг пользователем, являющимся комиссионером
     * @var string
     */
    public const COMMISSIONER = 5;
    /**
     * "Агент", Оказание услуг пользователем, являющимся агентом и не являющимся
     * банковским платежным агентом (субагентом), платежным агентом (субагентом), поверенным, комиссионером
     * @var string
     */
    public const AGENT = 6;
}
