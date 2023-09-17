<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;


/**
 * Ставка НДС
 * @see https://developers.cloudkassir.ru/#vatrate
 */
class VatRate extends Enum
{
    public const PERCENT_20     = 1;
    public const PERCENT_10     = 2;
    public const PERCENT_20_120 = 3;
    public const PERCENT_10_110 = 4;
    public const PERCENT_0      = 5;
    public const WITHOUT_NDS    = 6;
}
