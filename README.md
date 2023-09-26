# PHP Telegram Bot Api

[![Latest Version on Packagist](https://img.shields.io/packagist/v/telegram-bot/api.svg?style=flat-square)](https://packagist.org/packages/telegram-bot/api)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/telegram-bot/api.svg?style=flat-square)](https://packagist.org/packages/telegram-bot/api)

An extended native php wrapper for [Telegram Bot API](https://core.telegram.org/bots/api) without requirements. Supports all methods and types of responses.

## Bots: An introduction for developers
>Bots are special Telegram accounts designed to handle messages automatically. Users can interact with bots by sending them command messages in private or group chats.

>You control your bots using HTTPS requests to [bot API](https://core.telegram.org/bots/api).

>The Bot API is an HTTP-based interface created for developers keen on building bots for Telegram.
To learn how to create and set up a bot, please consult [Introduction to Bots](https://core.telegram.org/bots) and [Bot FAQ](https://core.telegram.org/bots/faq).

## Installation

Via Composer

``` bash
$ composer require telegram-bot/api
```

## Usage

See example [DevAnswerBot](https://github.com/TelegramBot/DevAnswerBot) (russian).

### API Wrapper
#### Send message
``` php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$bot->sendMessage($chatId, $messageText);
```
#### Send document
```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$document = new \CURLFile('document.txt');

$bot->sendDocument($chatId, $document);
```
#### Send message with reply keyboard
```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("one", "two", "three")), true); // true for one-time keyboard

$bot->sendMessage($chatId, $messageText, null, false, null, $keyboard);
```
#### Send message with inline keyboard
```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['text' => 'link', 'url' => 'https://core.telegram.org']
                ]
            ]
        );
        
$bot->sendMessage($chatId, $messageText, null, false, null, $keyboard);
```
#### Send media group
```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://avatars3.githubusercontent.com/u/9335727'));
$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://avatars3.githubusercontent.com/u/9335727'));
// Same for video
// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
$bot->sendMediaGroup($chatId, $media);
```

#### Client

```php
require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBot\Api\Client('YOUR_BOT_API_TOKEN');

    //Handle /ping command
    $bot->command('ping', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'pong!');
    });
    
    //Handle text messages
    $bot->on(function (\TelegramBot\Api\Types\Update $update) use ($bot) {
        $message = $update->getMessage();
        $id = $message->getChat()->getId();
        $bot->sendMessage($id, 'Your message: ' . $message->getText());
    }, function () {
        return true;
    });
    
    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}
```

#### Local Bot API Server

For using custom [local bot API server](https://core.telegram.org/bots/api#using-a-local-bot-api-server)

```php
use TelegramBot\Api\Client;
$token = 'YOUR_BOT_API_TOKEN';
$bot = new Client($token, null, null, 'http://localhost:8081');
```

#### Third-party Http Client

```php
use Symfony\Component\HttpClient\HttpClient;
use TelegramBot\Api\BotApi;
use TelegramBot\Api\Http\SymfonyHttpClient;
$token = 'YOUR_BOT_API_TOKEN';
$bot = new Client($token, null, new SymfonyHttpClient(HttpClient::create()););
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email mail@igusev.ru instead of using the issue tracker.

## Credits

- [Ilya Gusev](https://github.com/iGusev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
