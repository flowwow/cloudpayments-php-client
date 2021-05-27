<?php

namespace Flowwow\Cloudpayments;

/**
 * Базовый класс моделей фондю
 * Class BaseModel
 * @package Flowwow\Cloudpayments
 * @property string $response_status
 */
class BaseHook
{
    /**
     * @var array
     */
    protected array $request;

    /**
     * BaseHook constructor.
     * @param array $request
     */
    public function __construct(array $request)
    {
        $this->request = $request;
        $this->fill();
    }

    public function getRequest(): array
    {
        return $this->request;
    }

    /**
     * Заливка полей
     */
    private function fill()
    {
        $modelFields = get_object_vars($this);
        foreach ($modelFields as $key => $field) {
            $requestKey = ucfirst($key);
            if (isset($this->request[$requestKey])) {
                $this->$key = $this->request[$requestKey];
            }
        }
    }
}