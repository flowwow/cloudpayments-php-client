<?php

namespace Flowwow\Cloudpayments\Response\Models;

/**
 * Class KktReceiptModel
 * @package Flowwow\Cloudpayments\Response\Models
 */
class KktReceiptModel extends BaseModel
{
    public ?string $id        = null;
    public ?int    $errorCode = null;
}
