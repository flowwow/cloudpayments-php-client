<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class NotificationsUpdate
 * @package Flowwow\Cloudpayments\CardPayment
 * @see https://developers.cloudpayments.ru/#izmenenie-nastroek-uvedomleniy
 */
class NotificationsUpdate extends BaseRequest
{
    /**
     * @see https://developers.cloudpayments.ru/#tipy-operatsiy
     * @var string
     */
    public string  $type;
    public ?bool   $isEnabled = null;
    public ?string $address = null;
    public ?string $httpMethod = null;
    public ?string $encoding = null;
    public ?string $format = null;
}
