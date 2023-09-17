<?php

namespace Flowwow\Cloudpayments\Request\Receipt;

use Flowwow\Cloudpayments\BaseRequest;
use Flowwow\Cloudpayments\Enum\CorrectionReceiptType;
use Flowwow\Cloudpayments\Enum\CorrectionType;
use Flowwow\Cloudpayments\Enum\TaxationSystem;
use Flowwow\Cloudpayments\Enum\VatRate;

/**
 * Параметры формирования чека/состав чека.
 * @see https://developers.cloudkassir.ru/#correctionreceiptdata
 */
class CorrectionReceiptData extends BaseRequest
{
    /** @var string ИНН организации */
    public string $organizationInn;

    /** @var VatRate Ставка НДС, см. ниже (необязательный для ФФД 1.2) */
    public VatRate $vatRate;

    /** @var TaxationSystem Система налогообложения */
    public TaxationSystem $taxationSystem;

    /** @var string Номер ККТ */
    public string $deviceNumber;

    /** @var CorrectionReceiptType Признак расчета коррекции */
    public CorrectionReceiptType $correctionReceiptType;

    /** @var CauseCorrection Основание для коррекции */
    public CauseCorrection $causeCorrection;

    /** @var ReceiptAmounts Общая сумма платежа или возврата */
    public ReceiptAmounts $amounts;

    /** @var ReceiptItem Содержимое позиций чека, см. выше. (обязательный для ФФД 1.2) */
    public ReceiptItem $items;

    /** @var ReceiptIndustryRequisiteCollection[]|null Отраслевой реквизит чека, тег ОФД 1261 см. выше (ффд 1.2) */
    public ?array $industryRequisites;

    /** @var ReceiptUserRequisiteData|null Дополнительный реквизит пользователя, тег ОФД 1084 */
    public ?ReceiptUserRequisiteData $userRequisiteData;

    /** @var ReceiptOperationReceiptRequisite|null Операционный реквизит чека, тег ОФД 1270, (ффд 1.2) */
    public ?ReceiptOperationReceiptRequisite $operationReceiptRequisite;

    /** @var string|null Покупатель, наименование организации или фамилия, имя, отчество (при наличии), серия и номер паспорта покупателя (клиента), тег ОФД 1227 */
    public ?string $customerInfo;

    /** @var string|null ИНН покупателя, тег ОФД 1228 */
    public ?string $customerInn;

    /** @var string|null Дата рождения покупателя (клиента), тег ОФД 1243 (ффд 1.2) */
    public ?string $customerBirthday;

    /** @var string|null Гражданство, тег ОФД 1244 (ффд 1.2) */
    public ?string $customerStateCode;

    /** @var string|null Код вида документа, удостоверяющего личность, тег ОФД 1245 (ффд 1.2) */
    public ?string $customerDocType;

    /** @var string|null Данные документа, удостоверяющего личность, тег ОФД 1246 (ффд 1.2) */
    public ?string $customerDoc;

    /** @var string|null Адрес покупателя (клиента), тег ОФД 1254 (ффд 1.2) */
    public ?string $customerPlace;

    /** @var string|null Email или телефон покупателя, тег ОФД 1008 */
    public ?string $customerContactAddress;

    /** @var string|null Имя кассира */
    public ?string $cashierName;

    /** @var string|null ИНН кассира */
    public ?string $cashierInn;

    /** @var string|null Место использования ККТ (сайт) */
    public ?string $paymentPlace;

    /** @var string|null Адрес использования ККТ */
    public ?string $paymentAddress;

    /** @var CorrectionType|null Тип коррекции */
    public ?CorrectionType $correctionType;

    /** @var string|null Дополнительный реквизит чека (тег 1192) */
    public ?string $additionalReceiptRequisite;
}
