<?php

namespace Flowwow\Cloudpayments\Response\Models;

/**
 * Class TokenModel
 * @package Flowwow\Cloudpayments\Response\Models
 */
class TokenModel extends BaseModel
{
    public ?string $token               = null;
    public ?string $accountId           = null;
    public ?string $cardMask            = null;
    public ?int    $expirationDateMonth = null;
    public ?int    $expirationDateYear  = null;
}
