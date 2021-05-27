<?php

use Flowwow\Cloudpayments\Exceptions\BadTypeException;
use Flowwow\Cloudpayments\Request\OrderCreate;
use PHPUnit\Framework\TestCase;

/**
 * Class OrderCreateTest
 * @group Cloudpayments
 */
class OrderCreateTest extends TestCase
{
    /**
     * Проверяем валидацию для amount - успешный вариант
     */
    public function testCheckValidationAmountSuccessInt()
    {
        $amount      = 1;
        $currency    = 'RUB';
        $description = 'asdf';

        $orderCreateRequest = new OrderCreate($amount, $currency, $description);
        $this->assertEquals($amount, $orderCreateRequest->amount);
        $this->assertEquals($currency, $orderCreateRequest->currency);
        $this->assertEquals($description, $orderCreateRequest->description);
    }

    /**
     * Проверяем валидацию для amount - успешный вариант
     */
    public function testCheckValidationAmountSuccessFloat()
    {
        $amount      = 1.123;
        $currency    = 'RUB';
        $description = 'asdf';

        $orderCreateRequest = new OrderCreate($amount, $currency, $description);
        $this->assertEquals($amount, $orderCreateRequest->amount);
        $this->assertEquals($currency, $orderCreateRequest->currency);
        $this->assertEquals($description, $orderCreateRequest->description);
    }

    /**
     * Проверяем валидацию для amount - ожидаем ошибку
     */
    public function testCheckValidationAmountFailed()
    {
        $amount      = 'asdf';
        $currency    = 'RUB';
        $description = 'asdf';

        $this->expectException(BadTypeException::class);
        /* @phan-suppress-next-line PhanNoopNew */
        new OrderCreate($amount, $currency, $description);
    }
}
