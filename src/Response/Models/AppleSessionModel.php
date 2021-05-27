<?php

namespace Flowwow\Cloudpayments\Response\Models;

/**
 * Class AppleSessionModel
 * @package Flowwow\Cloudpayments\Response\Models
 */
class AppleSessionModel extends BaseModel
{
    public ?int    $epochTimestamp            = null;
    public ?int    $expiresAt                 = null;
    public ?string $merchantSessionIdentifier = null;
    public ?string $nonce                     = null;
    public ?string $merchantIdentifier        = null;
    public ?string $domainName                = null;
    public ?string $displayName               = null;
    public ?string $signature                 = null;
}
