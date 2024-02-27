<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Мера количества предмета расчета
 * https://developers.cloudkassir.ru/#markpartquantity
 *
 * @see Enum
 */
class UnitCode extends Enum
{
    /**
     * шт. или ед
     */
    public const UNIT = 0;
    /**
     * Грамм
     */
    public const GRAM = 10;
    /**
     * Килограмм
     */
    public const KILOGRAM = 11;
    /**
     * Тонна
     */
    public const TON = 12;
    /**
     * Сантиметр
     */
    public const CENTIMETRE = 20;
    /**
     * Дециметр
     */
    public const DECIMETRE = 21;
    /**
     * Метр
     */
    public const METRE = 22;
    /**
     * Квадратный сантиметр
     */
    public const SQUARE_CENTIMETRE = 30;
    /**
     * Квадратный дециметр
     */
    public const SQUARE_DECIMETRE = 31;
    /**
     * Квадратный метр
     */
    public const SQUARE_METRE = 32;
    /**
     * Миллилитр
     */
    public const MILLILITER = 40;
    /**
     * Литр
     */
    public const LITRE = 41;
    /**
     * Кубический метр
     */
    public const CUBIC_METER = 42;
    /**
     * Киловатт час
     */
    public const KILOWATT_HOUR = 50;
    /**
     * Гигакалория
     */
    public const GIGACALORIE = 51;
    /**
     * Сутки (день)
     */
    public const DAY = 70;
    /**
     * Час
     */
    public const HOUR = 71;
    /**
     * Минута
     */
    public const MINUTE = 72;
    /**
     * Секунда
     */
    public const SECOND = 73;
    /**
     * Килобайт
     */
    public const KILOBYTE = 80;
    /**
     * Мегабайт
     */
    public const MEGABYTE = 81;
    /**
     * Гигабайт
     */
    public const GIGABYTE = 82;
    /**
     * Терабайт
     */
    public const TERABYTE = 83;
    /**
     * Иная система измерения
     */
    public const NONE = 255;
}
