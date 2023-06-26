<?php

namespace Flowwow\Cloudpayments\Request\Receipt;

use Flowwow\Cloudpayments\BaseRequest;

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
}
