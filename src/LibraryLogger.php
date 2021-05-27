<?php

namespace Flowwow\Cloudpayments;

use Flowwow\Cloudpayments\Response\CloudResponse;
use GuzzleHttp\Exception\RequestException;
use hServer;
use hSlack;
use Registry;

/**
 * Декоратор для библиотеки CloudPayments
 * Class LibraryLogger
 */
class LibraryLogger extends Library
{
    /**
     * @param string $method
     * @param array $postData
     * @param CloudResponse|null $cloudResponse
     * @return CloudResponse
     */
    protected function request(
        string $method,
        array $postData = [],
        ?CloudResponse $cloudResponse = null
    ): CloudResponse {
        //На всякий случай, совсем удалять не будем
        //if (hServer::isNewDev()) {
        //    $config['proxy'] = 'http://flowwow:sda09fdi0we9ifqepfokved@185.3.94.114:3128';
        //}

        //Пробуем оплатить в первый раз
        try {
            $response = parent::request($method, $postData, $cloudResponse);
        } catch (RequestException $e) {
            $text = sprintf('cloudpayments пустой ответ сервера - %s server: %s', uniqid(), hServer::getServerName());

            $request = $e->getRequest();
            $config  = $this->client->getConfig();
            unset($config['handler']);
            $attachedText = sprintf("%s\nданные запроса:\n%s", $e->getMessage(), print_r([
                'method'       => $method,
                'data'         => $postData,
                'headers'      => $request->getHeaders(),
                'config'       => $config,
                'responseBody' => $request->getBody(),
            ], true));
            hSlack::reportPaymentProblems($text, $attachedText);
            try {
                $response = parent::request($method, $postData, $cloudResponse);
            } catch (RequestException $e) {
                $response = (new CloudResponse())->fillByResponse($e->getResponse());
            }
        }

        $this->saveRequestData([
            'postData' => $postData,
            'pk'       => $this->getPublicId(),
            'url'      => $this->getUrl(),
            'method'   => $method,
            'response' => $response->asArray(),
        ]);

        return $response;
    }

    /**
     * Сейвим респонс на последний запрос
     * @param array $requestData
     */
    public function saveRequestData(array $requestData): void
    {
        Registry::set('last_cloud_data', $requestData);
    }
}
