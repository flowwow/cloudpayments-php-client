# Cloudpayments api Library

## Оглавление

- [Установка](#установка)
- [Начало работы](#начало-работы)
- [Поддерживаемые методы](#поддерживаемые-методы)
- [Параметры запроса](#параметры-запроса)
- [Параметры ответа](#параметры-ответа)
- [Уведомления](#уведомления)

## Установка

Установить библиотеку можно с помощью composer:

```
composer require flowwow/cloudpayments-php-client
```

## Начало работы

```php
$publicId = /*...*/;
$pass = /*...*/;
$apiClient = new \Flowwow\Cloudpayments\Library($publicId, $pass);
$response = $apiClient->paymentsCardsCharge(new \Flowwow\Cloudpayments\Request\CardsPayment(
    100,
    'RUB',
    '123.123.123.123',
    '01492500008719030128SMfLeYdKp5dSQVIiO5l6ZCJiPdel4uDjdFTTz1UnXY'
));

echo $response->success;
```

## Поддерживаемые методы

Библиотека поддерживает большое количество методов api(https://developers.cloudpayments.ru/#api). Для параметров запроса и ответа поддерживается объект-обертка.

```php
$apiClient = new \Flowwow\Cloudpayments\Library(\*...*\);
$apiClient->paymentsCardsCharge(\*...*\);
```

| Метод api                        | Метод library               | Объект Request              | Объект Response            |
|----------------------------------|-----------------------------|-----------------------------|----------------------------|
| payments/cards/charge            | paymentsCardsCharge         | TransactionWith3dsResponse  | TransactionWith3dsResponse |
| payments/cards/auth              | createPaymentByCard2Step    | TransactionWith3dsResponse  | TransactionWith3dsResponse |
| payments/tokens/charge           | executePaymentByToken       | TokenPayment                | TransactionResponse        |
| payments/tokens/auth             | executePaymentByToken       | TokenPayment                | TransactionResponse        |
| payments/confirm                 | confirmPayment              | PaymentsConfirm             | CloudResponse              |
| payments/void                    | cancelPayment               | PaymentsVoid                | CloudResponse              |
| payments/refund                  | paymentsRefund              | PaymentsRefund              | TransactionResponse        |
| payments/cards/topup             | paymentsCardsTopup          | CardsTopUp                  | TransactionResponse        |
| payments/token/topup             | paymentsTokenTopup          | TokenTopUp                  | TransactionResponse        |
| payments/get                     | getPaymentData              | PaymentsGet                 | TransactionResponse        |
| payments/find                    | getPaymentDataByInvoice     | PaymentsFind                | TransactionResponse        |
| payments/list                    | getListPayment              | PaymentsList                | TransactionArrayResponse   |
| payments/tokens/list             | paymentsTokensList          | TokenList                   | TokenArrayResponse         |
| subscriptions/create             | subscriptionsCreate         | SubscriptionCreate          | SubscriptionResponse       |
| subscriptions/get                | subscriptionsGet            | SubscriptionGet             | SubscriptionResponse       |
| subscriptions/find               | subscriptionsFind           | SubscriptionFind            | SubscriptionArrayResponse  |
| subscriptions/update             | subscriptionsUpdate         | SubscriptionUpdate          | SubscriptionResponse       |
| subscriptions/cancel             | subscriptionsCancel         | SubscriptionCancel          | CloudResponse              |
| orders/create                    | ordersCreate                | OrderCreate                 | OrderResponse              |
| orders/cancel                    | ordersCancel                | OrderCancel                 | CloudResponse              |
| site/notifications/{Type}/get    | siteNotificationsGet        | NotificationsGet            | NotificationResponse       |
| site/notifications/{Type}/update | siteNotificationsUpdate     | NotificationsUpdate         | CloudResponse              |
| applepay/startsession            | startSession                | ApplepayStartSession        | AppleSessionResponse       |

## Параметры запроса

Параметры запроса обернуты в dto-объект 

```php
...
$validationUrl = 'https://apple-pay-gateway.apple.com/paymentservices/startSession';
$request = new \Flowwow\Cloudpayments\Request\ApplepayStartSession($validationUrl);
$apiClient->startSession($request);
```

Библиотека может выбрасывать ошибку ```BadTypeException``` при формировании request-объекта

```php
try {
    ...
    $validationUrl = 'https://apple-pay-gateway.apple.com/paymentservices/startSession';
    $request = new \Flowwow\Cloudpayments\Request\ApplepayStartSession($validationUrl);
    ...
} catch (\Flowwow\Cloudpayments\Exceptions\BadTypeException $e) {
    var_dump($e->getMessage());
}
```

## Параметры ответа

Параметры ответа так же обернуты в dto-объект. ```CloudResponse``` имеет 3 свойства: ```success```, ```message```, ```model``` 

В свойство ```model``` записывается нужная сущность, в зависимости от запроса.

Список поддерживаемых сущностей:
- ```AppleSessionModel```
- ```NotificationModel```
- ```SubscriptionModel```
- ```TokenModel```
- ```TransactionModel```
- ```TransactionWith3dsModel```

## Уведомления

Библиотека включает в себя dto-объекты для параметров веб хуков

```php
$hookData = new \Flowwow\Cloudpayments\Hook\HookPay($_POST);
echo $hookData->transactionId;
```

Список всех уведомлений - https://developers.cloudpayments.ru/#check

| Webhook   | Объект        |
|-----------|---------------|
| Check     | HookCheck     |
| Pay       | HookPay       |
| Fail      | HookFail      |
| Confirm   | HookConfirm   |
| Refund    | HookRefund    |
| Recurrent | HookRecurrent |
| Cancel    | HookCancel    |

## License

MIT
