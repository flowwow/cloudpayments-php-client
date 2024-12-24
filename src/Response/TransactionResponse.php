<?php

namespace Flowwow\Cloudpayments\Response;

use Flowwow\Cloudpayments\Response\Models\SbpBankModel;
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
        if (isset($modelDate->Banks->dictionary) && is_array($modelDate->Banks->dictionary)) {
            $banks = [];
            foreach ($modelDate->Banks->dictionary as $bankValue) {
                $bank    = new SbpBankModel();
                $bank->fill($bankValue);
                $banks[] = $bank;
            }
            $model->sbpBankModels = $banks;
        }

        $this->model = $model;
    }
}
