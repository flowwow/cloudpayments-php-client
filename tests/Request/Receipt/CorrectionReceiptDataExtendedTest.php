<?php

namespace Flowwow\Test;

use Flowwow\Cloudpayments\Exceptions\BadTypeException;
use Flowwow\Cloudpayments\Request\Receipt\CorrectionReceiptData;
use Flowwow\Cloudpayments\Request\Receipt\ReceiptAmounts;
use Flowwow\Cloudpayments\Request\Receipt\ReceiptItem;
use Flowwow\Cloudpayments\Enum\VatRate;
use Flowwow\Cloudpayments\Enum\TaxationSystem;
use Flowwow\Cloudpayments\Enum\CorrectionReceiptType;
use Flowwow\Cloudpayments\Request\Receipt\CauseCorrection;
use PHPUnit\Framework\TestCase;

class CorrectionReceiptDataExtendedTest extends TestCase
{
    private function buildBase(): CorrectionReceiptData
    {
        $data = new CorrectionReceiptData();
        $data->organizationInn = '1234567890';
        $data->vatRate = VatRate::from('None');
        $data->taxationSystem = TaxationSystem::from('UsnIncome');
        $data->deviceNumber = 'KKT-1';
        $data->correctionReceiptType = CorrectionReceiptType::from('Income');
        $data->causeCorrection = new CauseCorrection();
        $data->amounts = new ReceiptAmounts();
        $data->items = [new ReceiptItem('Item 1', '100.00', '100.00')];
        return $data;
    }

    public function testTimeZoneValidation()
    {
        $data = $this->buildBase();
        $data->timeZoneCode = 12;
        $this->expectException(BadTypeException::class);
        $data->asArray();
    }

    public function testBoolSerialization()
    {
        $data = $this->buildBase();
        $data->isInternetPayment = true;
        $data->timeZoneCode = 3;
        $arr = $data->asArray();
        $this->assertEquals('true', $arr['IsInternetPayment']);
        $this->assertEquals(3, $arr['TimeZoneCode']);
    }
}
