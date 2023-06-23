<?php

namespace Flowwow\Cloudpayments\Request\Receipt;

use Flowwow\Cloudpayments\BaseRequest;

class ReceiptUserRequisiteData extends BaseRequest
{
    public string $requisiteKey;
    public string $requisiteValue;

    public function __construct(string $key, string $value)
    {
        $this->requisiteKey   = $key;
        $this->requisiteValue = $value;
    }
}
