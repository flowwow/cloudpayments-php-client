<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Признак способа расчета.
 * https://developers.cloudkassir.ru/#vat
 *
 * @see Enum
 */
class Vat extends Enum
{
    /**
     * НДС не облагается
     * @var null
     */
    public const WITHOUT_VAT = null;
    /**
     * НДС не облагается
     * @var null
     */
    public const PERCENT_0 = 0;
    /**
     * 10% НДС
     * @var int
     */
    public const PERCENT_10 = 10;
    /**
     * 20% НДС
     * @var int
     */
    public const PERCENT_20 = 20;
    /**
     * Расчетный НДС 10/110
     * @var int
     */
    public const PERCENT_110 = 110;
    /**
     * Расчетный НДС 20/120
     * @var int
     */
    public const PERCENT_120 = 120;
    /**
     * НДС 12% (только для онлайн-касс в Казахстане)
     * @var int
     */
    public const PERCENT_12 = 12;

}
