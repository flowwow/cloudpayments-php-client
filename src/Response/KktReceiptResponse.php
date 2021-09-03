<?php

namespace Flowwow\Cloudpayments\Response;

use Flowwow\Cloudpayments\Response\Models\KktReceiptModel;
use stdClass;

/**
 * Class KktReceiptResponse
 * @package Flowwow\Cloudpayments\Response
 */
class KktReceiptResponse extends CloudResponse
{
    /** @var KktReceiptModel */
    public $model;

    /**
     * {@inheritdoc}
     * @param stdClass $modelDate
     */
    public function fillModel($modelDate)
    {
        $model = new KktReceiptModel();
        $model->fill($modelDate);

        $this->model = $model;
    }
}
