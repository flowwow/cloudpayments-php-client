<?php

namespace Flowwow\Cloudpayments\Response;

use Flowwow\Cloudpayments\Response\Models\SbpBankModel;
use Flowwow\Cloudpayments\Response\Models\SbpBankModelV2;
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
        $banks = $this->getBankModels($modelDate);

        $model->fill($modelDate);
        if (!empty($banks['v1'])) {
            $model->sbpBankModels = $banks['v1'];
        }
        if (!empty($banks['v2'])) {
            $model->sbpBankModelsV2 = $banks['v2'];
        }

        $this->model = $model;
    }

    /**
     * @param stdClass $modelDate
     * @return array
     */
    protected function getBankModels(stdClass $modelDate): array
    {
        $banks = [
            'v1' => [],
            'v2' => [],
        ];
        if (isset($modelDate->Banks->dictionary) && is_array($modelDate->Banks->dictionary)) {
            foreach ($modelDate->Banks->dictionary as $bankValue) {
                $bank    = new SbpBankModel();
                $bank->fill($bankValue);
                $banks['v1'][] = $bank;
            }
            unset($modelDate->Banks);
        }
        if (isset($modelDate->V2Banks)) {
            $bankMembersV2 = is_array($modelDate->V2Banks)
                ? ($modelDate->V2Banks[0]->Members ?? [])
                : ($modelDate->V2Banks->Members ?? []);
            foreach ($bankMembersV2 as $bankValue) {
                $bank    = new SbpBankModelV2();
                $bank->fill($bankValue);
                $banks['v2'][] = $bank;
            }
            unset($modelDate->V2Banks);
        }

        return $banks;
    }
}
