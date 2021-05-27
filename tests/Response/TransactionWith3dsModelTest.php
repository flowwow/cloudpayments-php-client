<?php

use Flowwow\Cloudpayments\Response\TransactionWith3dsResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class TransactionWith3dsModelTes
 * @group Cloudpayments
 */
class TransactionWith3dsModelTest extends TestCase
{
    /**
     * Проверка на наличие 3ds - проверка нужна
     */
    public function testIs3dsErrorTrue()
    {
        $responseModel = (object) ['PaReq' => 'some', 'AcsUrl' => 'some'];

        $cloudReponseModel = new TransactionWith3dsResponse();
        $cloudReponseModel->fillModel($responseModel);

        $this->assertTrue($cloudReponseModel->is3dsError());
    }

    /**
     * Проверка на наличие 3ds - проверка не нужна
     */
    public function testIs3dsErrorFalse()
    {
        $responseModel = (object) [];

        $cloudReponseModel = new TransactionWith3dsResponse();
        $cloudReponseModel->fillModel($responseModel);

        $this->assertFalse($cloudReponseModel->is3dsError());
    }
}
