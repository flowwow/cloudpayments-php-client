<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Коды ошибок
 * https://developers.cloudpayments.ru/#kody-oshibok
 *
 * @see Enum
 */
class CloudErrors extends Enum
{
    /** Отказ эмитента проводить онлайн-операцию */
    public const REFER_TO_CARD_ISSUER = 5001;

    /** Отказ эмитента проводить онлайн-операцию */
    public const INVALID_MERCHANT = 5003;

    /** Карта потеряна */
    public const PICK_UP_CARD = 5004;

    /** Отказ эмитента без объяснения причин */
    public const DO_NOT_HONOR = 5005;

    /** Отказ сети проводить операцию или неправильный CVV-код */
    public const ERROR = 5006;

    /** Карта потеряна */
    public const PICK_UP_CARD_SPECIAL_CONDITIONS = 5007;

    /** Карта не предназначена для онлайн-платежей */
    public const INVALID_TRANSACTION = 5012;

    /** Слишком маленькая или слишком большая сумма операции */
    public const AMOUNT_ERROR = 5013;

    /** Некорректный номер карты */
    public const INVALID_CARD_NUMBER = 5014;

    /** Эмитент не найден */
    public const NO_SUCH_ISSUER = 5015;

    /** Отказ эмитента без объяснения причин */
    public const TRANSACTION_ERROR = 5019;

    /** Ошибка на стороне эквайера — неверно сформирована транзакция */
    public const FORMAT_ERROR = 5030;

    /** Неизвестный эмитент карты */
    public const BANK_NOT_SUPPORTED_BY_SWITCH = 5031;

    /** Истек срок утери карты */
    public const EXPIRED_CARD_PICKUP = 5033;

    /** Отказ эмитента — подозрение на мошенничество */
    public const SUSPECTED_FRAUD = 5034;

    /** Карта не предназначена для платежей */
    public const RESTRICTED_CARD = 5036;

    /** Карта потеряна */
    public const LOST_CARD = 5041;

    /** Карта украдена */
    public const STOLEN_CARD = 5043;

    /** Недостаточно средств */
    public const INSUFFICIENT_FUNDS = 5051;

    /** Карта просрочена или неверно указан срок действия */
    public const EXPIRED_CARD = 5054;

    /** Ограничение на карте */
    public const TRANSACTION_NOT_PERMITTED = 5057;

    /** Транзакция была отклонена банком по подозрению в мошенничестве */
    public const SUSPECTED_FRAUD_DECLINE = 5059;

    /** Карта не предназначена для платежей */
    public const RESTRICTED_CARD_2 = 5062;

    /** Карта заблокирована из-за нарушений безопасности */
    public const SECURITY_VIOLATION = 5063;

    /** Превышен лимит операций по карте */
    public const EXCEED_WITHDRAWAL_FREQUENCY = 5065;

    /** Неверный CVV-код */
    public const INCORRECT_CVV = 5082;

    /** Эмитент недоступен */
    public const TIMEOUT = 5091;

    /** Эмитент недоступен */
    public const CANNOT_REACH_NETWORK = 5092;

    /** Ошибка банка-эквайера или сети */
    public const SYSTEM_ERROR = 5096;

    /** Операция не может быть обработана по прочим причинам */
    public const UNABLE_TO_PROCESS = 5204;

    /** 3-D Secure авторизация не пройдена */
    public const AUTHENTICATION_FAILED = 5206;

    /** 3-D Secure авторизация недоступна */
    public const AUTHENTICATION_UNAVAILABLE = 5207;

    /** Лимиты эквайера на проведение операций */
    public const ANTI_FRAUD = 5300;
}
