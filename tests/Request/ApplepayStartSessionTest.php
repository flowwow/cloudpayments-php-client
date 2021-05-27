<?php

namespace Flowwow\Test;

use Flowwow\Cloudpayments\Exceptions\BadTypeException;
use Flowwow\Cloudpayments\Request\ApplepayStartSession;
use PHPUnit\Framework\TestCase;

/**
 * Class ApplepayStartSessionTest
 * @group Cloudpayments
 */
class ApplepayStartSessionTest extends TestCase
{
    /**
     * Проверяем валидацию для validationUrl - успешный вариант
     */
    public function testCheckValidationUrlSuccess()
    {
        $validationUrl = 'https://apple-pay-gateway.apple.com/paymentservices/startSession';

        $appleStartSessionRequest = new ApplepayStartSession($validationUrl);
        $this->assertEquals($validationUrl, $appleStartSessionRequest->validationUrl);
    }

    /**
     * Проверяем валидацию для validationUrl - ожидаем ошибку
     */
    public function testCheckValidationUrlFailed()
    {
        $validationUrl = 'asdf';

        $this->expectException(BadTypeException::class);
        /* @phan-suppress-next-line PhanNoopNew */
        new ApplepayStartSession($validationUrl);
    }

    /**
     * Проверяем валидацию для paymentUrl - успешный вариант
     */
    public function testFillPaymentUrlSuccess()
    {
        $validationUrl = 'https://apple-pay-gateway.apple.com/paymentservices/startSession';
        $paymentUrl    = 'https://apple-pay-gateway.apple.com/paymentservices/startSession';

        $appleStartSessionRequest = new ApplepayStartSession($validationUrl, $paymentUrl);

        $this->assertEquals($validationUrl, $appleStartSessionRequest->validationUrl);
        $this->assertEquals($paymentUrl, $appleStartSessionRequest->paymentUrl);
    }

    /**
     * Проверяем, что поле paymentUrl не заполняется,
     * если ничего не передано
     */
    public function testFillPaymentUrlNotFilledSuccess()
    {
        $validationUrl = 'https://apple-pay-gateway.apple.com/paymentservices/startSession';

        $appleStartSessionRequest = new ApplepayStartSession($validationUrl);

        $vars = get_object_vars($appleStartSessionRequest);
        $this->assertFalse(isset($vars['paymentUrl']));
    }

    /**
     * Проверяем валидацию для paymentUrl - ожидаем ошибку
     */
    public function testFillPaymentUrlFailed()
    {
        $validationUrl = 'https://apple-pay-gateway.apple.com/paymentservices/startSession';
        $paymentUrl    = 'asdf';

        $this->expectException(BadTypeException::class);
        /* @phan-suppress-next-line PhanNoopNew */
        new ApplepayStartSession($validationUrl, $paymentUrl);
    }
}
