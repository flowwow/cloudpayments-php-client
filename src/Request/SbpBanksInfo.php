<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Запрос списка участников СБП с учетом платформы клиента.
 * @see https://developers.cloudpayments.ru/#spisok-uchastnikov-sbp
 */
class SbpBanksInfo extends BaseRequest
{
    /** @var string Публичный идентификатор терминала мерчанта. */
    public string $publicTerminalId;

    /** @var string|null Идентификатор аккаунта пользователя. */
    public ?string $accountId = null;

    /** @var bool|null Флаг обновления подписки. */
    public ?bool $isRenewSubscription = null;

    /** @var string|null Дополнительные данные в формате JSON. */
    public ?string $jsonData = null;

    /** @var string|null Платформа клиента: desktop, ios или android. */
    public ?string $platform = null;

    /** @var bool|null Флаг необходимости сохранения карты. */
    public ?bool $saveCard = null;

    /** @var string|null Токен карты для сохранения. */
    public ?string $token = null;

    /**
     * @param string $publicTerminalId Публичный идентификатор терминала мерчанта.
     */
    public function __construct(string $publicTerminalId)
    {
        $this->publicTerminalId = $publicTerminalId;
    }

    /**
     * Формирует параметры запроса, сохраняя boolean для отправки в JSON.
     * @return array<string, string|bool>
     */
    public function asArray(): array
    {
        $data = [];
        foreach (get_object_vars($this) as $field => $value) {
            if ($value !== null) {
                $data[ucfirst($field)] = $value;
            }
        }

        return $data;
    }
}
