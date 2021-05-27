<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class SubscriptionGet
 * @package Flowwow\Cloudpayments\Request
 * @see https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 *
 */
class SubscriptionGet extends BaseRequest
{
    public string  $id;
}
