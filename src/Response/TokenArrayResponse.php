<?php

namespace Flowwow\Cloudpayments\Response;

use Flowwow\Cloudpayments\Response\Models\TokenModel;
use stdClass;

/**
 * Class TokenArrayResponse
 * @package Flowwow\Cloudpayments\Response
 */
class TokenArrayResponse extends CloudResponse
{
    /** @var TokenModel[] */
    public $model;

    /**
     * {@inheritdoc}
     * @param stdClass $modelDate
     */
    public function fillModel($modelDate)
    {
        $models = [];
        if (is_array($modelDate)) {
            foreach ($modelDate as $value) {
                $model = new TokenModel();
                $model->fill($value);

                $models[] = $model;
            }
        }

        $this->model = $models;
    }
}
