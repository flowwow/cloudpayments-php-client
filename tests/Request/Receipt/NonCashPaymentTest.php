<?php

namespace Flowwow\Test;

use Flowwow\Cloudpayments\Request\Receipt\NonCashPayment;
use PHPUnit\Framework\TestCase;

class NonCashPaymentTest extends TestCase
{
    public function testAsArray()
    {
        $payment = new NonCashPayment('150.50', 2, 'PAY-123');
        $payment->additionalInfo = 'Extra';

        $this->assertEquals([
            'Amount' => '150.50',
            'PaymentMethod' => 2,
            'PaymentId' => 'PAY-123',
            'AdditionalInfo' => 'Extra',
        ], $payment->asArray());
    }
}
