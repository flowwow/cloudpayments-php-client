<?php

namespace Flowwow\Cloudpayments\Request;

use Flowwow\Cloudpayments\BaseRequest;
use Flowwow\Cloudpayments\Exceptions\BadTypeException;

/**
 * Class ApplepayStartSession
 * @package Flowwow\Cloudpayments\CardPayment
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplepayStartSession extends BaseRequest
{
    public string  $validationUrl;
    public ?string $paymentUrl;

    /**
     * ApplepayStartSession constructor.
     * @param string $validationUrl
     * @param string|null $paymentUrl
     * @throws BadTypeException
     */
    public function __construct(string $validationUrl, ?string $paymentUrl = null)
    {
        if (filter_var($validationUrl, FILTER_VALIDATE_URL) === false) {
            throw new BadTypeException('Validation url is wrong');
        }

        $this->validationUrl = $validationUrl;

        if ($paymentUrl) {
            if (filter_var($paymentUrl, FILTER_VALIDATE_URL) === false) {
                throw new BadTypeException('Payment url is wrong');
            }

            $this->paymentUrl = $paymentUrl;
        }
    }
}
