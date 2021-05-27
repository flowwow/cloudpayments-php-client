<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class SubscriptionCancel
 * @package Flowwow\Cloudpayments\Request
 * @see https://developers.cloudpayments.ru/#otmena-podpiski-na-rekurrentnye-platezhi
 */
class SubscriptionCancel extends BaseRequest
{
    public string  $id;
}
