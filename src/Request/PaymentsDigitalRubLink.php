<?php

namespace Flowwow\Cloudpayments\Request;

/**
 * @see https://developers.cloudpayments.ru/#tsifrovoy-rubl
 */
class PaymentsDigitalRubLink extends PaymentsAlt
{
    public string $altPayType = 'DigitalRubLink';
}
