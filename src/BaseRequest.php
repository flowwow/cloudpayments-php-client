<?php

namespace Flowwow\Cloudpayments;

use Flowwow\Cloudpayments\Enum\BoolField;

/**
 * Базовый класс моделей фондю
 * Class BaseRequest
 * @package Flowwow\Cloudpayments
 */
class BaseRequest
{
    /**
     * Данные в нужном для запроса формате
     * @return array
     */
    public function asArray(): array
    {
        $data   = [];
        $fields = get_object_vars($this);
        foreach ($fields as $field => $value) {
            $key = ucfirst($field);
            //Подменим booleans
            if ($value === true) {
                $value = BoolField::TRUE;
            } elseif ($value === false) {
                $value = BoolField::FALSE;
            }
            //Пустые поля слать не будем
            if ($value !== null) {
                $data[$key] = $value;
            }

            if ($value instanceof BaseRequest) {
                $data[$key] = $value->asArray();
            }

            if (is_array($value)) {
                $computed = [];
                foreach ($value as $item) {
                    if ($item instanceof BaseRequest) {
                        $item = $item->asArray();
                    }

                    $computed[] = $item;
                }
                $data[$key] = $computed;
            }
        }

        return $data;
    }

}