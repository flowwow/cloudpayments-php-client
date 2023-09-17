<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Тип коррекции
 * @see https://developers.cloudkassir.ru/#correctiontype
 */
class CorrectionType extends Enum
{

    /** @var int Самостоятельно */
    public const BY_YOURSELF = 0;

    /** @var int По предписанию */
    public const BY_PRESCRIPTION = 1;
}
