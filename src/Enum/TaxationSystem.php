<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * варианты систем налогообложения
 * https://developers.cloudkassir.ru/#taxationsystem
 *
 * @see Enum
 */
class TaxationSystem extends Enum
{
    /**
     * Общая система налогообложения
     * @var int
     */
    public const OSNO = 0;
    /**
     * Упрощенная система налогообложения (Доход)
     * @var int
     */
    public const USN_1 = 1;
    /**
     * Упрощенная система налогообложения (Доход минус Расход)
     * @var int
     */
    public const USN_2 = 2;
    /**
     * Единый налог на вмененный доход
     * @var int
     */
    public const ENVD = 3;
    /**
     * Единый сельскохозяйственный налог
     * @var int
     */
    public const ESN = 4;
    /**
     * Патентная система налогообложения
     * @var int
     */
    public const PATENT = 5;

}
