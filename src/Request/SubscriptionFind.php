<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class SubscriptionFind
 * @package Flowwow\Cloudpayments\Request
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 *
 */
class SubscriptionFind extends BaseRequest
{
    public string $accountId;
}
