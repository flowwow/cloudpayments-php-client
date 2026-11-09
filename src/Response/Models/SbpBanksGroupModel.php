<?php

namespace Flowwow\Cloudpayments\Response\Models;

use stdClass;

/**
 * Группа участников СБП из одного источника данных.
 * @see https://developers.cloudpayments.ru/#spisok-uchastnikov-sbp
 */
class SbpBanksGroupModel extends BaseModel
{
    /** @var string|null Источник списка банков. */
    public ?string $source = null;

    /** @var string|null Версия спецификации ответа. */
    public ?string $version = null;

    /** @var SbpBankModelV2[] Участники СБП в порядке ответа CloudPayments. */
    public array $members = [];

    /**
     * Заполняет данные группы и создает модели участников СБП.
     * @param stdClass $fillData Группа из ответа API с полями Source, Version и Members.
     * @return void
     */
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
