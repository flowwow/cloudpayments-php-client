<?php

namespace Flowwow\Cloudpayments\Response;

use Flowwow\Cloudpayments\Response\Models\TransactionModel;
use stdClass;

/**
 * Class TransactionResponse
 * @package Flowwow\Cloudpayments\Response
 */
class TransactionResponse extends CloudResponse
{
    /** @var TransactionModel */
    public $model;

    /**
     * {@inheritdoc}
     * @param stdClass $modelDate
     */
    public function fillModel($modelDate)
    {
        $model = new TransactionModel();
        $model->fill($modelDate);

        $this->model = $model;
    }
}
