<?php

namespace Flowwow\Cloudpayments\Response;

use Flowwow\Cloudpayments\Response\Models\SbpBanksGroupModel;
use stdClass;

/**
 * Ответ со списком участников СБП, сгруппированных по источникам.
 * @see https://developers.cloudpayments.ru/#spisok-uchastnikov-sbp
 */
class SbpBanksInfoResponse extends CloudResponse
{
    /** @var SbpBanksGroupModel[] Группы банков в порядке ответа CloudPayments. */
    public $model = [];

    /**
     * Заполняет группы и вложенные модели банков из ответа API.
     * @param stdClass[] $modelDate
     * @return void
     */
    public function fillModel($modelDate)
    {
        $this->model = [];
        if (is_array($modelDate)) {
            foreach ($modelDate as $groupData) {
                $group = new SbpBanksGroupModel();
                $group->fill($groupData);
                $this->model[] = $group;
            }
        }
    }
}
