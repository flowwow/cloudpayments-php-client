<?php

namespace Flowwow\Cloudpayments\Response\Models;

/**
 * Class NotificationModel
 * @package Flowwow\Cloudpayments\Response\Models
 */
class NotificationModel extends BaseModel
{
    public ?bool   $isEnabled  = null;
    public ?string $address    = null;
    public ?string $httpMethod = null;
    public ?string $encoding   = null;
    public ?string $format     = null;
}
