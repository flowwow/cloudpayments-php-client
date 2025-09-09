<?php

namespace Flowwow\Cloudpayments\Request\Receipt;

use Flowwow\Cloudpayments\BaseRequest;
use Flowwow\Cloudpayments\Exceptions\BadTypeException;

/**
 * @see https://developers.cloudkassir.ru/#customerreceipt
 */
class CustomerReceipt extends BaseRequest
{
    /** @var ReceiptItem[] $items */
    public array                                     $items;
    public string                                    $taxationSystem;
    public ReceiptAmounts                            $amounts;
    public ?string                                   $calculationPlace           = null;
    public ?string                                   $email                      = null;
    public ?string                                   $phone                      = null;
    public ?string                                   $customerInfo               = null;
    public ?string                                   $customerInn                = null;
    public ?bool                                     $isBso                      = null;
    public ?string                                   $agentSign                  = null;
    public ?string                                   $cashierName                = null;
    public ?array                                    $additionalReceiptInfos     = null;
    public ?array                                    $additionalReceiptRequisite = null;
    public ?string                                   $customerBirthday            = null;
    public ?string                                   $customerStateCode          = null;
    public ?string                                   $customerDocType            = null;
    public ?string                                   $customerDoc                = null;
    public ?string                                   $customerPlace              = null;
    public ?ReceiptUserRequisiteData                 $userRequisiteData          = null;
    public ?ReceiptOperationReceiptRequisite         $operationReceiptRequisite  = null;
    /** @var ReceiptIndustryRequisiteCollection[]|null */
    public ?array                                    $industryRequisiteCollection = null;

    /** @var bool|null Признак интернет оплаты, тег ОФД 1125 */
    public ?bool                                     $isInternetPayment          = null;

    /** @var int|null Часовая зона места расчета, тег ОФД 1011 (1..11) */
    public ?int                                      $timeZoneCode               = null;

    /** @var NonCashPayment[]|null Массив объектов NonCashPayment, тег ОФД 1234 */
    public ?array                                    $nonCashPayments            = null;

    /**
     * @param ReceiptItem[]  $items
     * @param string         $taxationSystem
     * @param ReceiptAmounts $amounts
     */
    public function __construct(array $items, string $taxationSystem, ReceiptAmounts $amounts)
    {
        $this->items          = $items;
        $this->taxationSystem = $taxationSystem;
        $this->amounts        = $amounts;
    }

    /**
     * @inheritDoc
     * @return array
     * @throws BadTypeException
     */
    public function asArray(): array
    {
        if ($this->timeZoneCode !== null) {
            if ($this->timeZoneCode < 1 || $this->timeZoneCode > 11) {
                throw new BadTypeException('timeZoneCode must be between 1 and 11');
            }
        }
        if ($this->nonCashPayments !== null) {
            if (!is_array($this->nonCashPayments)) {
                throw new BadTypeException('nonCashPayments must be an array of NonCashPayment');
            }
            foreach ($this->nonCashPayments as $payment) {
                if (!$payment instanceof NonCashPayment) {
                    throw new BadTypeException('Each item of nonCashPayments must be instance of NonCashPayment');
                }
            }
        }
        return parent::asArray();
    }
}
