<?php

namespace Flowwow\Payment\Cloudpayments\Enum;

use MyCLabs\Enum\Enum;

/**
 * Язык уведомлений после ссылки на оплату
 * https://developers.cloudkassir.ru/#agentsign
 *
 * @see Enum
 */
class CultureName extends Enum
{
    /**
     * Русский
     * @var string
     */
    public const RU = 'ru-RU';
    /**
     * Английский
     * @var string
     */
    public const EN = 'en-US';

}
