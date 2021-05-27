<?php

namespace Flowwow\Payment\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Коды временных зон
 * https://developers.cloudpayments.ru/#kody-vremennyh-zon
 * @see Enum
 */
class TimezoneCodes extends Enum
{
    /**
     * (UTC-10:00) Гавайи
     * @var string
     */
    const HST = 'HST';

    /**
     * (UTC-09:00) Аляска
     * @var string
     */
    const AKST = 'AKST';

    /**
     * (UTC-08:00) Тихоокеанское время (США и Канада)
     * @var string
     */
    const PST = 'PST';

    /**
     * (UTC-07:00) Горное время (США и Канада)
     * @var string
     */
    const MST = 'MST';

    /**
     * (UTC-06:00) Центральное время (США и Канада)
     * @var string
     */
    const CST = 'MST';

    /**
     * (UTC-05:00) Восточное время (США и Канада)
     * @var string
     */
    const EST = 'EST';

    /**
     * (UTC-04:00) Атлантическое время (Канада)
     * @var string
     */
    const AST = 'AST';

    /**
     * (UTC-03:00) Бразилия
     * @var string
     */
    const BRT = 'BRT';

    /**
     * (UTC) Время в формате UTC
     * @var string
     */
    const UTC = 'UTC';

    /**
     * (UTC) Дублин, Лиссабон, Лондон, Эдинбург
     * @var string
     */
    const GMT = 'GMT';

    /**
     * (UTC+01:00) Амстердам, Берлин, Берн, Вена, Рим, Стокгольм
     * (UTC+01:00) Белград, Братислава, Будапешт, Любляна, Прага
     * (UTC+01:00) Брюссель, Копенгаген, Мадрид, Париж
     * (UTC+01:00) Варшава, Загреб, Сараево, Скопье
     * @var string
     */
    const CET = 'CET';

    /**
     * (UTC+02:00) Афины, Бухарест
     * (UTC+02:00) Вильнюс, Киев, Рига, София, Таллин, Хельсинки
     * (UTC+02:00) Восточная Европа
     * (UTC+02:00) Калининград (RTZ 1)
     * @var string
     */
    const EET = 'EET';

    /**
     * (UTC+03:00) Волгоград, Москва, Санкт-Петербург (RTZ 2)
     * (UTC+03:00) Минск
     * @var string
     */
    const MSK = 'MSK';

    /**
     * (UTC+04:00) Баку
     * @var string
     */
    const AZT = 'AZT';

    /**
     * (UTC+04:00) Ереван
     * @var string
     */
    const AMT = 'AMT';

    /**
     * (UTC+04:00) Ижевск, Самара (RTZ 3)
     * @var string
     */
    const SAMT = 'SAMT';

    /**
     * (UTC+04:00) Тбилиси
     * @var string
     */
    const GET = 'GET';

    /**
     * (UTC+05:00) Ашхабад, Ташкент
     * @var string
     */
    const TJT = 'TJT';

    /**
     * (UTC+05:00) Екатеринбург (RTZ 4)
     * @var string
     */
    const YEKT = 'YEKT';

    /**
     * (UTC+06:00) Астана, Алматы
     * @var string
     */
    const ALMT = 'ALMT';

    /**
     * (UTC+06:00) Новосибирск (RTZ 5)
     * @var string
     */
    const NOVT = 'NOVT';

    /**
     * (UTC+07:00) Красноярск (RTZ 6)
     * @var string
     */
    const KRAT = 'KRAT';

    /**
     * (UTC+08:00) Гонконг, Пекин, Урумчи, Чунцин
     * @var string
     */
    const HKT = 'HKT';

    /**
     * (UTC+08:00) Иркутск (RTZ 7)
     * @var string
     */
    const IRKT = 'IRKT';

    /**
     * (UTC+08:00) Куала-Лумпур, Сингапур
     * @var string
     */
    const SGT = 'SGT';

    /**
     * (UTC+08:00) Улан-Батор
     * @var string
     */
    const ULAT = 'ULAT';

    /**
     * (UTC+09:00) Якутск (RTZ 8)
     * @var string
     */
    const YAKT = 'YAKT';

    /**
     * (UTC+10:00) Владивосток, Магадан (RTZ 9)
     * @var string
     */
    const VLAT = 'VLAT';

    /**
     * (UTC+11:00) Чокурдах (RTZ 10)
     * @var string
     */
    const SAKT = 'SAKT';

    /**
     * (UTC+12:00) Анадырь, Петропавловск-Камчатский (RTZ 11)
     * @var string
     */
    const ANAT = 'ANAT';
}
