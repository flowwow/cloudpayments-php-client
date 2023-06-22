<?php

namespace Flowwow\Cloudpayments\Request\Receipt;

use Flowwow\Cloudpayments\BaseRequest;

class ReceiptOperationReceiptRequisite extends BaseRequest
{
    public int $operationIdentifier;
    public string $operationDate;
    public string $operationData;

    public function __construct(int $operationIdentifier, string $operationDate, string $operationData)
    {
        $this->operationIdentifier = $operationIdentifier;
        $this->operationDate = $operationDate;
        $this->operationData = $operationData;
    }
}
