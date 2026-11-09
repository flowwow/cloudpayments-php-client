<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * @see https://developers.cloudpayments.ru/#spisok-uchastnikov-sbp
 */
class SbpBanksInfo extends BaseRequest
{
    public string $publicTerminalId;
    public ?string $accountId = null;
    public ?bool $isRenewSubscription = null;
    public ?string $jsonData = null;
    public ?string $platform = null;
    public ?bool $saveCard = null;
    public ?string $token = null;

    public function __construct(string $publicTerminalId)
    {
        $this->publicTerminalId = $publicTerminalId;
    }

    /** The endpoint expects native JSON booleans. */
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
