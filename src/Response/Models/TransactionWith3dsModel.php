<?php

namespace Flowwow\Cloudpayments\Response\Models;

/**
 * Class TransactionWith3dsModel
 * @package Flowwow\Cloudpayments\Response\Models
 */
class TransactionWith3dsModel extends TransactionModel
{
    public ?string $paReq  = null;
    public ?string $acsUrl = null;
}
