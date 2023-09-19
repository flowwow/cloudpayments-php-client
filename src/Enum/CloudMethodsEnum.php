<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Список методов
 * https://developers.cloudpayments.ru/#api
 * https://developers.cloudkassir.ru/#api-kassy
 *
 * @see Enum
 */
class CloudMethodsEnum extends Enum
{
    /** Проверка платежа по номеру заказа */
    public const PAYMENTS_FIND = 'payments/find';

    /** Проверка платежа */
    public const PAYMENTS_GET = 'payments/get';

    /** Создание оплаты по токену при двухшаговой оплате */
    public const PAYMENTS_TOKENS_AUTH = 'payments/tokens/auth';

    /** Создание оплаты по карте при двухшаговой оплате */
    public const PAYMENTS_CARDS_AUTH = 'payments/cards/auth';

    /** обработка 3Ds */
    public const PAYMENTS_CARDS_POST3DS = 'payments/cards/post3ds';

    /** Проведение оплаты по токену при одношаговой оплате */
    public const PAYMENTS_TOKENS_CHARGE = 'payments/tokens/charge';

    /** Подтверждение оплаты */
    public const PAYMENTS_CONFIRM = 'payments/confirm';

    /** Список транзакций за определенное время */
    public const PAYMENTS_LIST = 'payments/list';

    /** Список транзакций за определенное время */
    public const PAYMENTS_LIST_V2 = 'v2/payments/list';

    /** Отмена оплаты */
    public const PAYMENTS_VOID = 'payments/void';

    /** Старт сессии Applepay */
    public const APPLEPAY_STARTSESSION = 'applepay/startsession';

    /** Возврат средств */
    public const PAYMENTS_REFUND = 'payments/refund';

    /** Метод для оплаты по криптограмме платежных данных для одностадийного платежа */
    public const PAYMENTS_CARDS_CHARGE = 'payments/cards/charge';

    /** Выплата по криптограмме */
    public const PAYMENTS_CARDS_TOPUP = 'payments/cards/topup';

    /** Выплата по токену */
    public const PAYMENTS_TOKEN_TOPUP = 'payments/token/topup';

    /** Метод выгрузки списка всех платежных токенов */
    public const PAYMENTS_TOKENS_LIST = 'payments/tokens/list';

    /** Метод создания подписки на рекуррентные платежи */
    public const SUBSCRIPTIONS_CREATE = 'subscriptions/create';

    /** Метод получения информации о статусе подписки */
    public const SUBSCRIPTIONS_GET = 'subscriptions/get';

    /** Метод получения списка подписок для определенного аккаунта */
    public const SUBSCRIPTIONS_FIND = 'subscriptions/find';

    /** Метод изменения ранее созданной подписки */
    public const SUBSCRIPTIONS_UPDATE = 'subscriptions/update';

    /** Метод отмены подписки на рекуррентные платежи */
    public const SUBSCRIPTIONS_CANCEL = 'subscriptions/cancel';

    /** Создание счета для отправки по почте */
    public const ORDERS_CREATE = 'orders/create';

    /** Метод отмены созданного счета */
    public const ORDERS_CANCEL = 'orders/cancel';

    /** Создание чека */
    public const KKT_RECEIPT = 'kkt/receipt';

    /** Создание чека коррекции */
    public const CORRECTION_RECEIPT = 'kkt/correction-receipt';
}
