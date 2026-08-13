<?php

namespace Flowwow\Cloudpayments\Request;

/**
 * @see https://developers.cloudpayments.ru/#dolyami
 */
class PaymentsDolyami extends PaymentsAlt
{
    public string $altPayType = 'TcsBnplDolyame';
}
