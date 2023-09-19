<?php

namespace Flowwow\Cloudpayments\Request\Receipt;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Основание для коррекции
 * @see https://developers.cloudkassir.ru/#causecorrection
 */
class CauseCorrection extends BaseRequest
{
    /** @var string Дата документа основания для коррекции */
    public string $correctionDate;

    /** @var string Номер документа основания для коррекции */
    public string $correctionNumber;
}
