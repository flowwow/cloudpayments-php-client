<?php

namespace Flowwow\Cloudpayments\Request;

use DateTime;
use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class SubscriptionCreate
 * @package Flowwow\Cloudpayments\Request
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 */
class SubscriptionCreate extends BaseRequest
{
    public string  $token;
    public string  $accountId;
    public string  $description;
    public string  $email;
    /**
     * @var int|float
     */
    public             $amount;
    public string      $currency;
    public bool        $requireConfirmation;
    /**
     * "startDate":"2014-08-06T16:46:29.5377246Z",
     * @var DateTime
     */
    public DateTime    $startDate;
    public string      $interval;
    public int         $period;
    public ?int        $maxPeriods = null;
    public ?string     $customerReceipt = null;
}
