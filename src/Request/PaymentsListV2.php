<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Class PaymentsListV2
 * @package Flowwow\Cloudpayments\Request
 * @see https://developers.cloudpayments.ru/#vygruzka-spiska-tranzaktsiy-za-proizvolnyy-period
 */
class PaymentsListV2 extends BaseRequest
{
    /**
     * Начальная дата создания операций
     * "2021-03-09T00:00:00+03:00"
     */
    public string $createdDateGte;

    /**
     * Конечная дата создания операций
     * "2021-03-09T00:00:00+03:00"
     */
    public string $createdDateLte;

    /** порядковый номер страницы, должно быть больше или равно 1 */
    public int $pageNumber;

    /** https://developers.cloudpayments.ru/#kody-vremennyh-zon */
    public ?string $timeZone = null;

    /**
     * Статус операция. Может иметь значения [ "Authorized", "Completed", "Cancelled", "Declined" ].
     * По умолчанию выбраны все
     * @var string[]
     */
    public ?array $statuses = null;

    public function __construct(string $createdDateGte, string $createdDateLte, int $pageNumber)
    {
        $this->createdDateGte = $createdDateGte;
        $this->createdDateLte = $createdDateLte;
        $this->pageNumber     = $pageNumber;
    }

    /**
     * @param string|null $timeZone
     * @return PaymentsListV2
     */
    public function setTimeZone(?string $timeZone): self
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    /**
     * @param array|null $statuses
     */
    public function setStatuses(?array $statuses): void
    {
        $this->statuses = $statuses;
    }
}
