<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class OrderCancel
 * @package Flowwow\Cloudpayments\Request
 * @see https://developers.cloudpayments.ru/#otmena-sozdannogo-scheta
 */
class OrderCancel extends BaseRequest
{
    public string  $id;
}
