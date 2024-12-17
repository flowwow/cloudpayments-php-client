<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Признак предмета расчета.
 * https://developers.cloudkassir.ru/#object
 *
 * Unknown - значение по умолчанию (при неуказании предмета расчёта в ОФД
 * отправляется Commodity). В электронной форме чека не отображается.
 *
 * @see Enum
 */
class ItemsObject extends Enum
{
    /**
     * Неизвестный предмет оплаты
     * @var null
     */
    public const UNKNOWN = 0;

    /**
     * Товар
     * @var null
     */
    public const COMMODITY = 1;

    /**
     * Подакцизный товар
     * @var int
     */
    public const EXCISED_COMMODITY = 2;

    /**
     * Работа
     * @var int
     */
    public const JOB = 3;

    /**
     * Услуга
     * @var int
     */
    public const SERVICE = 4;

    /**
     * Ставка азартной игры
     * @var int
     */
    public const GAMBLING_BET = 5;

    /**
     * Выигрыш азартной игры
     * @var int
     */
    public const GAMBLING_WIN = 6;

    /**
     * Лотерейный билет
     * @var int
     */
    public const LOTTERY_TICKET = 7;

    /**
     * Выигрыш лотереи
     * @var int
     */
    public const LOTTERY_WIN = 8;

    /**
     * Предоставление РИД
     * @var int
     */
    public const RID_ACCESS = 9;

    /**
     * Платеж
     * @var int
     */
    public const PAYMENT = 10;

    /**
     * Агентское вознаграждение
     * @var int
     */
    public const AGENT_REWARD = 11;

    /**
     * Выплата (композитная)
     * @var int
     */
    public const COMPOSITE_PAYMENT = 12;

    /**
     * Иной предмет расчета
     * @var int
     */
    public const ANOTHER_TRANSACTION = 13;

    /**
     * Имущественное право
     * @var int
     */
    public const PROPERTY_LAW = 14;

    /**
     * Внереализационный доход
     * @var int
     */
    public const NON_OPERATING_INCOME = 15;

    /**
     * Страховые взносы
     * @var int
     */
    public const INSURANCE_CONTRIBUTIONS = 16;

    /**
     * Торговый сбор
     * @var int
     */
    public const TRADE_FEE = 17;

    /**
     * Курортный сбор
     * @var int
     */
    public const RESORT_FEE = 18;

    /**
     * Залог
     * @var int
     */
    public const CAUTION_MONEY = 19;

    /**
     * Расход
     * @var int
     */
    public const EXPENSE_INCURRED = 20;

    /**
     * Взносы на обязательное пенсионное страхование ИП
     * @var int
     */
    public const CONTRIBUTIONS_ON_IP = 21;

    /**
     * Взносы на обязательное пенсионное страхование
     * @var int
     */
    public const CONTRIBUTIONS_SIMPLE = 22;

    /**
     * Взносы на обязательное медицинское страхование ИП
     * @var int
     */
    public const CONTRIBUTIONS_MEDICAL_IP = 23;

    /**
     * Взносы на обязательное медицинское страхование
     * @var int
     */
    public const CONTRIBUTIONS_MEDICAL_SIMPLE = 24;

    /**
     * Взносы на обязательное социальное страхование
     * @var int
     */
    public const CONTRIBUTIONS_SOCIAL = 25;

    /**
     * Платеж казино
     * @var int
     */
    public const CASINO_PAYMENT = 26;

    /**
     * Выдача денежных средств (ФФД 1.2)
     * @var int
     */
    public const CASH_WITHDRAWAL = 27;

    /**
     * АТНМ (ФФД 1.2)
     * @var int
     */
    public const ATNM = 30;

    /**
     * АТМ (ФФД 1.2)
     * @var int
     */
    public const ATM = 31;

    /**
     * ТНМ (ФФД 1.2)
     * @var int
     */
    public const TNM = 32;

    /**
     * ТМ (ФФД 1.2)
     * @var int
     */
    public const TM = 33;

}
