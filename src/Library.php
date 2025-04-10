<?php

namespace Flowwow\Cloudpayments;

use Flowwow\Cloudpayments\Enum\CloudMethodsEnum;
use Flowwow\Cloudpayments\Request\ApplepayStartSession;
use Flowwow\Cloudpayments\Request\CardsPayment;
use Flowwow\Cloudpayments\Request\CardsTopUp;
use Flowwow\Cloudpayments\Request\KktReceipt;
use Flowwow\Cloudpayments\Request\NotificationsGet;
use Flowwow\Cloudpayments\Request\NotificationsUpdate;
use Flowwow\Cloudpayments\Request\OrderCancel;
use Flowwow\Cloudpayments\Request\OrderCreate;
use Flowwow\Cloudpayments\Request\PaymentsConfirm;
use Flowwow\Cloudpayments\Request\PaymentsFind;
use Flowwow\Cloudpayments\Request\PaymentsGet;
use Flowwow\Cloudpayments\Request\PaymentsList;
use Flowwow\Cloudpayments\Request\PaymentsListV2;
use Flowwow\Cloudpayments\Request\PaymentsRefund;
use Flowwow\Cloudpayments\Request\PaymentsSbpLink;
use Flowwow\Cloudpayments\Request\PaymentsSbpQr;
use Flowwow\Cloudpayments\Request\PaymentsVoid;
use Flowwow\Cloudpayments\Request\Post3DS;
use Flowwow\Cloudpayments\Request\Receipt\CorrectionReceiptData;
use Flowwow\Cloudpayments\Request\SubscriptionCancel;
use Flowwow\Cloudpayments\Request\SubscriptionCreate;
use Flowwow\Cloudpayments\Request\SubscriptionFind;
use Flowwow\Cloudpayments\Request\SubscriptionGet;
use Flowwow\Cloudpayments\Request\SubscriptionUpdate;
use Flowwow\Cloudpayments\Request\TokenList;
use Flowwow\Cloudpayments\Request\TokenPayment;
use Flowwow\Cloudpayments\Request\TokenTopUp;
use Flowwow\Cloudpayments\Response\AppleSessionResponse;
use Flowwow\Cloudpayments\Response\CloudResponse;
use Flowwow\Cloudpayments\Response\KktReceiptResponse;
use Flowwow\Cloudpayments\Response\NotificationResponse;
use Flowwow\Cloudpayments\Response\OrderResponse;
use Flowwow\Cloudpayments\Response\SubscriptionArrayResponse;
use Flowwow\Cloudpayments\Response\SubscriptionResponse;
use Flowwow\Cloudpayments\Response\TokenArrayResponse;
use Flowwow\Cloudpayments\Response\TransactionArrayResponse;
use Flowwow\Cloudpayments\Response\TransactionResponse;
use Flowwow\Cloudpayments\Response\TransactionWith3dsResponse;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Библиотека методов для работы с CloudPayments
 * Class Library
 */
class Library
{
    const DEFAULT_URL = 'https://api.cloudpayments.ru/';

    protected string  $publicId;
    protected string  $pass;
    protected string  $url;
    protected Client  $client;
    protected bool    $idempotency    = false;
    protected ?string $idempotencyKey = null;

    protected $logger;

    /**
     * Library constructor.
     * @param string $publicId
     * @param string $pass
     * @param string|null $cpUrlApi
     * @param array|null $options
     * @param Client|null $client
     * @param LoggerInterface|null $logger
     */
    public function __construct(
        string $publicId,
        string $pass,
        ?string $cpUrlApi = null,
        ?array $options = null,
        Client $client = null,
        LoggerInterface $logger = null
    ) {
        $this->url      = $cpUrlApi === null ? self::DEFAULT_URL : $cpUrlApi;
        $this->publicId = $publicId;
        $this->pass     = $pass;
        $data           = [
            'base_uri' => $this->url,
            'auth'     => [
                $this->publicId,
                $this->pass,
            ],
            'expect'   => false
        ];
        if ($options) {
            $data = array_merge($options, $data);
        }

        $this->client = $client ?? new Client($data);
        $this->logger = $logger;
    }

    /**
     * @return string
     */
    public function getPublicId(): string
    {
        return $this->publicId;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @param bool $idempotency
     */
    public function setIdempotency(bool $idempotency): void
    {
        $this->idempotency = $idempotency;
    }

    /**
     * Кастомный ключ идемпотентности
     * @param string $idempotencyKey
     */
    public function setIdempotencyKey(string $idempotencyKey): void
    {
        $this->setIdempotency(true);
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Проверка платежа по номеру заказа
     * @param PaymentsFind $data
     * @return TransactionResponse
     */
    public function getPaymentDataByInvoice(PaymentsFind $data): TransactionResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_FIND;

        return $this->request($method, $data->asArray(), new TransactionResponse());
    }

    /**
     * Метод получения детализации по транзакции
     * @param PaymentsGet $data
     * @return TransactionResponse
     */
    public function getPaymentData(PaymentsGet $data): TransactionResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_GET;

        return $this->request($method, $data->asArray(), new TransactionResponse());
    }

    /**
     * Создание оплаты по токену при двухшаговой оплате
     * @param TokenPayment $data
     * @return TransactionResponse
     */
    public function createPaymentByToken2Step(TokenPayment $data): TransactionResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_TOKENS_AUTH;

        return $this->request($method, $data->asArray(), new TransactionResponse());
    }

    /**
     * Создание оплаты по карте при двухшаговой оплате
     * @param CardsPayment $data
     * @return TransactionWith3dsResponse
     */
    public function createPaymentByCard2Step(CardsPayment $data): TransactionWith3dsResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_CARDS_AUTH;

        return $this->request($method, $data->asArray(), new TransactionWith3dsResponse());
    }

    /**
     * обработка 3Ds
     * @param Post3DS $data
     * @return TransactionResponse
     */
    public function post3Ds(Post3DS $data): TransactionResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_CARDS_POST3DS;

        return $this->request($method, $data->asArray(), new TransactionResponse());
    }

    /**
     * Проведение оплаты по токену при одношаговой оплате
     * @param TokenPayment $data
     * @return TransactionResponse
     */
    public function executePaymentByToken(TokenPayment $data): TransactionResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_TOKENS_CHARGE;

        return $this->request($method, $data->asArray(), new TransactionResponse());
    }

    /**
     * Подтверждение оплаты
     * @param PaymentsConfirm $data
     * @return CloudResponse
     */
    public function confirmPayment(PaymentsConfirm $data): CloudResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_CONFIRM;

        return $this->request($method, $data->asArray());
    }

    /**
     * Список транзакций за определенное время
     * @param PaymentsList $data
     * @return TransactionArrayResponse
     */
    public function getListPayment(PaymentsList $data): TransactionArrayResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_LIST;

        return $this->request($method, $data->asArray(), new TransactionArrayResponse());
    }

    /**
     * Список транзакций за определенное время
     * @param PaymentsListV2 $data
     * @return TransactionArrayResponse
     */
    public function getListPaymentV2(PaymentsListV2 $data): TransactionArrayResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_LIST_V2;

        return $this->request($method, $data->asArray(), new TransactionArrayResponse());
    }

    /**
     * Отмена оплаты
     * @param PaymentsVoid $data
     * @return CloudResponse
     */
    public function cancelPayment(PaymentsVoid $data): CloudResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_VOID;

        return $this->request($method, $data->asArray());
    }

    /**
     * Старт сессии Applepay
     * @param ApplepayStartSession $data
     * @return AppleSessionResponse
     */
    public function startSession(ApplepayStartSession $data): AppleSessionResponse
    {
        $method = CloudMethodsEnum::APPLEPAY_STARTSESSION;

        return $this->request($method, $data->asArray(), new AppleSessionResponse());
    }

    /**
     * Создание чека
     * @param KktReceipt $data
     * @return KktReceiptResponse
     */
    public function createReceipt(KktReceipt $data): KktReceiptResponse
    {
        $method = CloudMethodsEnum::KKT_RECEIPT;

        return $this->request($method, $data->asArray(), new KktReceiptResponse());
    }

    /**
     * Возврат средств
     * @param PaymentsRefund $data
     * @return TransactionResponse
     */
    public function paymentsRefund(PaymentsRefund $data): TransactionResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_REFUND;

        return $this->request($method, $data->asArray(), new TransactionResponse());
    }

    /**
     * Метод для оплаты по криптограмме платежных данных (результат алгоритма шифрования)
     * для одностадийного платежа
     * @param CardsPayment $data
     * @return TransactionWith3dsResponse
     */
    public function paymentsCardsCharge(CardsPayment $data): TransactionWith3dsResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_CARDS_CHARGE;

        return $this->request($method, $data->asArray(), new TransactionWith3dsResponse());
    }

    /**
     * Выплата по криптограмме
     * @param CardsTopUp $data
     * @return TransactionResponse
     */
    public function paymentsCardsTopup(CardsTopUp $data): TransactionResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_CARDS_TOPUP;

        return $this->request($method, $data->asArray(), new TransactionResponse());
    }

    /**
     * Выплата по токену
     * @param TokenTopUp $data
     * @return TransactionResponse
     */
    public function paymentsTokenTopup(TokenTopUp $data): TransactionResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_TOKEN_TOPUP;

        return $this->request($method, $data->asArray(), new TransactionResponse());
    }

    /**
     * Метод выгрузки списка всех платежных токенов CloudPayments
     * @param TokenList|null $data
     * @return TokenArrayResponse
     */
    public function paymentsTokensList(?TokenList $data = null): TokenArrayResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_TOKENS_LIST;

        return $this->request($method, $data === null ? [] : $data->asArray(), new TokenArrayResponse());
    }

    /**
     * Создание оплаты СБП по ссылке
     * @param PaymentsSbpLink $data
     * @return TransactionResponse
     */
    public function paymentsSbpLink(PaymentsSbpLink $data): TransactionResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_SBP_LINK;

        return $this->request($method, $data->asArray(), new TransactionResponse());
    }

    /**
     * Создание оплаты СБП по QR-коду
     * @param PaymentsSbpQr $data
     * @return TransactionResponse
     */
    public function paymentsSbpQr(PaymentsSbpQr $data): TransactionResponse
    {
        $method = CloudMethodsEnum::PAYMENTS_SBP_QR;

        return $this->request($method, $data->asArray(), new TransactionResponse());
    }

    /**
     * Метод создания подписки на рекуррентные платежи
     * @param SubscriptionCreate $data
     * @return SubscriptionResponse
     */
    public function subscriptionsCreate(SubscriptionCreate $data): SubscriptionResponse
    {
        $method = CloudMethodsEnum::SUBSCRIPTIONS_CREATE;

        return $this->request($method, $data->asArray(), new SubscriptionResponse());
    }

    /**
     * Метод получения информации о статусе подписки
     * @param SubscriptionGet $data
     * @return SubscriptionResponse
     */
    public function subscriptionsGet(SubscriptionGet $data): SubscriptionResponse
    {
        $method = CloudMethodsEnum::SUBSCRIPTIONS_GET;

        return $this->request($method, $data->asArray(), new SubscriptionResponse());
    }

    /**
     * Метод получения списка подписок для определенного аккаунта
     * @param SubscriptionFind $data
     * @return SubscriptionArrayResponse
     */
    public function subscriptionsFind(SubscriptionFind $data): SubscriptionArrayResponse
    {
        $method = CloudMethodsEnum::SUBSCRIPTIONS_FIND;

        return $this->request($method, $data->asArray(), new SubscriptionArrayResponse());
    }

    /**
     * Метод изменения ранее созданной подписки
     * @param SubscriptionUpdate $data
     * @return SubscriptionResponse
     */
    public function subscriptionsUpdate(SubscriptionUpdate $data): SubscriptionResponse
    {
        $method = CloudMethodsEnum::SUBSCRIPTIONS_UPDATE;

        return $this->request($method, $data->asArray(), new SubscriptionResponse());
    }

    /**
     * Метод отмены подписки на рекуррентные платежи
     * @param SubscriptionCancel $data
     * @return CloudResponse
     */
    public function subscriptionsCancel(SubscriptionCancel $data): CloudResponse
    {
        $method = CloudMethodsEnum::SUBSCRIPTIONS_CANCEL;

        return $this->request($method, $data->asArray());
    }

    /**
     * Создание счета для отправки по почте
     * @param OrderCreate $data
     * @return OrderResponse
     */
    public function ordersCreate(OrderCreate $data): OrderResponse
    {
        $method = CloudMethodsEnum::ORDERS_CREATE;

        return $this->request($method, $data->asArray(), new OrderResponse());
    }

    /**
     * Метод отмены созданного счета
     * @param OrderCancel $data
     * @return CloudResponse
     */
    public function ordersCancel(OrderCancel $data): CloudResponse
    {
        $method = CloudMethodsEnum::ORDERS_CANCEL;

        return $this->request($method, $data->asArray());
    }

    /**
     * Метод просмотра настроек уведомлений (с указанием типа уведомления)
     * @param NotificationsGet $data
     * @return NotificationResponse
     */
    public function siteNotificationsGet(NotificationsGet $data): NotificationResponse
    {
        $method = sprintf('site/notifications/%s/get', $data->type);

        return $this->request($method, $data->asArray(), new NotificationResponse());
    }

    /**
     * Метод изменения настроек уведомлений
     * @param NotificationsUpdate $data
     * @return CloudResponse
     */
    public function siteNotificationsUpdate(NotificationsUpdate $data): CloudResponse
    {
        $method = sprintf('site/notifications/%s/update', $data->type);

        return $this->request($method, $data->asArray());
    }

    /**
     * Базовый запрос
     * @param string $method API endpoint
     * @param array $postData Передаваемые данные
     * @param CloudResponse|null $cloudResponse
     * @param bool $asJson Отправка как JSON
     * @return mixed
     */
    protected function request(
        string $method,
        array $postData = [],
        ?CloudResponse $cloudResponse = null,
        bool $asJson = false
    ): CloudResponse {
        $response = $this->sendRequest($method, $postData, $asJson);
        if ($this->logger) {
            $context = [
                'method'   => $method,
                'postData' => $postData,
                'asJson'   => $asJson ? 'yes' : 'no',
                'trace'    => debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 20)
            ];
            $msg     = $response->getBody()->getContents();
            if ($response->getStatusCode() !== 200) {
                $this->logger->error($msg, $context);
            } else {
                $this->logger->debug($msg, $context);
            }
        }

        $cloudResponse = $cloudResponse ?? new CloudResponse();

        return $cloudResponse->fillByResponse($response);
    }

    /**
     * Запрос по api
     * @param string $method HTTP method (get, post, etc)
     * @param array $postData send data
     * @param bool $asJson send with JSON body
     * @return ResponseInterface
     */
    public function sendRequest(string $method, array $postData = [], bool $asJson = false): ResponseInterface
    {
        if ($this->idempotency) {
            $options['headers']['X-Request-ID'] = $this->idempotencyKey ?? $this->getRequestId($method, $postData);
        }

        if ($asJson) {
            $options['headers']['Content-Type'] = 'application/json';
            $options['json']                    = $postData;
        } else {
            $options['headers']['Content-Type'] = 'application/x-www-form-urlencoded';
            $options['form_params']             = $postData;
        }


        return $this->client->post('/' . $method, $options);
    }

    /**
     * Генерирует request id для идемпотентных запросов
     * @param string $method
     * @param array $postData
     * @return string
     */
    public function getRequestId(string $method, array $postData): string
    {
        $stringData = "method:$method;";
        foreach ($postData as $key => $value) {
            $stringData .= sprintf('%s:%s', $key, serialize($value));
        }

        return md5($stringData);
    }

    /**
     * Запрос статуса чека
     * @param string $receiptId
     * @return CloudResponse
     */
    public function getReceiptStatus(string $receiptId): CloudResponse
    {
        $method = CloudMethodsEnum::KKT_RECEIPT . '/status/get';

        return $this->request($method, ['Id' => $receiptId]);
    }

    /**
     * Формирование чека коррекции
     * @param CorrectionReceiptData $data
     * @return CloudResponse|mixed
     */
    public function createCorrectionReceipt(CorrectionReceiptData $data)
    {
        $method = CloudMethodsEnum::CORRECTION_RECEIPT;

        return $this->request($method, ['CorrectionReceiptData' => $data->asArray()], null, true);
    }

    /**
     * Получение данных о чеке коррекции
     * @param string $receiptId ID-чека
     * @return CloudResponse
     */
    public function getCorrectionReceiptInfo(string $receiptId): CloudResponse
    {
        $method = CloudMethodsEnum::CORRECTION_RECEIPT . '/get';

        return $this->request($method, ['Id' => $receiptId], null, true);
    }
}
