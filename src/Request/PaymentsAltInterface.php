<?php

namespace Flowwow\Cloudpayments\Request;

/** Запрос альтернативного способа оплаты */
interface PaymentsAltInterface
{
    public function asArray(): array;
}
