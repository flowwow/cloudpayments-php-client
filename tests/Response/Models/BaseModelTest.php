<?php

use Flowwow\Cloudpayments\Response\Models\BaseModel;
use PHPUnit\Framework\TestCase;

/**
 * Class BaseModelTest
 * @group Cloudpayments
 */
class BaseModelTest extends TestCase
{
    /**
     * Проверяем заполнение модели по объекту
     */
    public function testFillBaseModel()
    {
        $testObject = (object) ['a' => 1, 'b' => 2, 'c' => 3];

        $model = new BaseModel();
        $model->fill($testObject);

        $this->assertEquals($testObject->a, $model->a);
        $this->assertEquals($testObject->b, $model->b);
        $this->assertEquals($testObject->c, $model->c);
    }
}
