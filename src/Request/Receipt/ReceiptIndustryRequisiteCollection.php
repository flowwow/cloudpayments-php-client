<?php

namespace Flowwow\Cloudpayments\Request\Receipt;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Отраслевой реквизит чека
 * @see https://developers.cloudkassir.ru/#industryrequisitecollection
 */
class ReceiptIndustryRequisiteCollection extends BaseRequest
{
    /** @var string  Идентификатор ФОИВ, тег ОФД 1262 */
    public string $code;
    /** @var string Дата документа основания, тег ОФД 1263 */
    public string $documentDate;
    /** @var string Номер документа основания, тег ОФД 1264 */
    public string $documentNumber;
    /** @var string Значение отраслевого реквизита, тег ОФД 1265 */
    public string $requisiteValue;


    public function __construct(string $code, string $documentDate, string $documentNumber, string $requisiteValue)
    {
        $this->code           = $code;
        $this->documentDate   = $documentDate;
        $this->documentNumber = $documentNumber;
        $this->requisiteValue = $requisiteValue;
    }
}
