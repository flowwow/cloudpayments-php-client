<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class NotificationsGet
 * @package Flowwow\Cloudpayments\CardPayment
 * @see https://developers.cloudpayments.ru/#prosmotr-tranzaktsii
 */
class NotificationsGet extends BaseRequest
{
    /**
     * @see https://developers.cloudpayments.ru/#tipy-operatsiy
     * @var string
     */
    public string $type;
}
