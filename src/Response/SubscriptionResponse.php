<?php

namespace Flowwow\Cloudpayments\Response;

use Flowwow\Cloudpayments\Response\Models\SubscriptionModel;
use stdClass;

/**
 * Class SubscriptionResponse
 * @package Flowwow\Cloudpayments\Response
 */
class SubscriptionResponse extends CloudResponse
{
    /** @var SubscriptionModel */
    public $model;

    /**
     * {@inheritdoc}
     * @param stdClass $modelDate
     */
    public function fillModel($modelDate)
    {
        $model = new SubscriptionModel();
        $model->fill($modelDate);

        $this->model = $model;
    }
}
