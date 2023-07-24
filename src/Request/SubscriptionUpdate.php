<?php

namespace Flowwow\Cloudpayments\Request;

use DateTime;
use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class SubscriptionUpdate
 * @package Flowwow\Cloudpayments\Request
 * @see https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class SubscriptionUpdate extends BaseRequest
{
    public string  $id;
    public ?string $description = null;
    /**
     * @var int|float
     */
    public         $amount;
    public ?string $currency = null;
    public ?bool   $requireConfirmation = null;
    /**
     * "startDate":"2014-08-06T16:46:29.5377246Z",
     * @var DateTime|null
     */
    public ?DateTime $startDate = null;
    public ?string   $interval = null;
    public ?int      $period = null;
    public ?int      $maxPeriods = null;
    public ?string   $customerReceipt = null;
    public ?string   $cultureName = null;
}
