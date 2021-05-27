<?php

namespace Flowwow\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Bool-значения для клауда
 * https://developers.cloudkassir.ru/#agentsign
 */
class BoolField extends Enum
{
    /**
     * True
     * @var string
     */
    public const TRUE = 'true';
    /**
     * False
     * @var string
     */
    public const FALSE = 'false';

}
