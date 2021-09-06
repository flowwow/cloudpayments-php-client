<?php

namespace Flowwow\Cloudpayments\Request\Receipt;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * @see https://developers.cloudkassir.ru/#productcodedata
 */
class ReceiptItemProductCodeData extends BaseRequest
{
   public ?string $codeProductNomenclature = null;
}
