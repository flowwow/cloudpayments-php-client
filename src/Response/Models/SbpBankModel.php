<?php

namespace Flowwow\Cloudpayments\Response\Models;

/**
 * Class SbpBankModel
 * @package Flowwow\Cloudpayments\Response\Models
 */
class SbpBankModel extends BaseModel
{
    public ?string $bankName            = null;
    public ?string $logoURL             = null;
    public ?string $schema              = null;
    public ?string $currency            = null;
    public ?string $package_name        = null;
    public ?string $webClientUrl        = null;
    public ?bool   $isWebClientActive   = null;
}
