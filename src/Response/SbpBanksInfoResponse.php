<?php

namespace Flowwow\Cloudpayments\Response;

use Flowwow\Cloudpayments\Response\Models\SbpBanksGroupModel;

/**
 * Response from /sbp/v2/banks/info.
 */
class SbpBanksInfoResponse extends CloudResponse
{
    /** @var SbpBanksGroupModel[] */
    public $model = [];

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
