<?php

namespace Flowwow\Cloudpayments\Response\Models;

/**
 * Class SbpBankModelV2
 * https://developers.cloudpayments.ru/#spisok-uchastnikov-sbp
 * @package Flowwow\Cloudpayments\Response\Models
 */
class SbpBankModelV2 extends BaseModel
{
    public ?string $id   = null;
    public ?string $logo = null;
    public ?string $name = null;
    public ?string $url  = null;
}
