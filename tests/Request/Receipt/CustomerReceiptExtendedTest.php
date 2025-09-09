<?php

namespace Flowwow\Test;

use Flowwow\Cloudpayments\Exceptions\BadTypeException;
use Flowwow\Cloudpayments\Request\Receipt\CustomerReceipt;
use Flowwow\Cloudpayments\Request\Receipt\NonCashPayment;
use Flowwow\Cloudpayments\Request\Receipt\ReceiptAmounts;
use Flowwow\Cloudpayments\Request\Receipt\ReceiptItem;
use PHPUnit\Framework\TestCase;

class CustomerReceiptExtendedTest extends TestCase
{
    private function buildBaseReceipt(): CustomerReceipt
    {
        $items = [new ReceiptItem('Item 1', '100.00', '100.00')];
        $amounts = new ReceiptAmounts();
        return new CustomerReceipt($items, '2', $amounts);
    }

    public function testNewFieldsSerialized()
    {
        $receipt = $this->buildBaseReceipt();
        $receipt->isInternetPayment = true;
        $receipt->timeZoneCode = 5;
        $receipt->nonCashPayments = [
            new NonCashPayment('50.00', 1, 'PM-1'),
            new NonCashPayment('25.00', 2, 'PM-2'),
        ];

        $arr = $receipt->asArray();

        $this->assertArrayHasKey('IsInternetPayment', $arr);
        $this->assertEquals('true', $arr['IsInternetPayment']);
        $this->assertEquals(5, $arr['TimeZoneCode']);
        $this->assertArrayHasKey('NonCashPayments', $arr);
        $this->assertCount(2, $arr['NonCashPayments']);
        $this->assertEquals('50.00', $arr['NonCashPayments'][0]['Amount']);
    }

    public function testTimeZoneValidation()
    {
        $receipt = $this->buildBaseReceipt();
        $receipt->timeZoneCode = 0;
        $this->expectException(BadTypeException::class);
        $receipt->asArray();
    }

    public function testNonCashPaymentsValidation()
    {
        $receipt = $this->buildBaseReceipt();
        $receipt->nonCashPayments = [new NonCashPayment('50.00', 1, 'PM-1'), 'oops'];
        $this->expectException(BadTypeException::class);
        $receipt->asArray();
    }
}
