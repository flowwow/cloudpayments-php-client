<?php

namespace Flowwow\Cloudpayments\Response\Models;

use stdClass;

/**
 * A group of SBP banks returned by /sbp/v2/banks/info.
 */
class SbpBanksGroupModel extends BaseModel
{
    public ?string $source = null;
    public ?string $version = null;

    /** @var SbpBankModelV2[] Banks in the order returned by CloudPayments. */
    public array $members = [];

    public function fill(stdClass $fillData)
    {
        $this->source = $fillData->Source ?? null;
        $this->version = $fillData->Version ?? null;
        $this->members = [];

        foreach ($fillData->Members ?? [] as $memberData) {
            $member = new SbpBankModelV2();
            $member->fill($memberData);
            $this->members[] = $member;
        }
    }
}
