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
    // or initialize with botan.io tracker api key
    // $bot = new \TelegramBot\Api\Client('YOUR_BOT_API_TOKEN', 'YOUR_BOTAN_TRACKER_API_KEY');
    

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

#### Call to already added commands from callback data

```php
require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBot\Api\Client('YOUR_BOT_API_TOKEN');
    // or initialize with botan.io tracker api key
    // $bot = new \TelegramBot\Api\Client('YOUR_BOT_API_TOKEN', 'YOUR_BOTAN_TRACKER_API_KEY');

    //Handle /ping command
    $bot->command('ping', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'pong!');
    });
    
    //Make test inline button
    $bot->command('test_inline', function ($message) use ($bot) 
	{
		$userid = $message->getChat()->getId();
					
		$buttons = Array();
		$buttons[] = array("text" => 'runping', "callback_data" => "command_/ping");
					
		$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(array($buttons));
					
		$message = "✅ TEST INLINE.";
		$bot->sendMessage($userid, $message, null, false, null, null, $keyboard);
	});
    
    //Handle command event
	$bot->callbackQuery(function ($message) use ($bot) 
	{
		$user_id = $message->getMessage()->getChat()->getId();
		$callback_data = $message->getData();
					
		if(preg_match('/^command_/', $callback_data))
		{
			$command = preg_replace('/^command_/', '', $callback_data);
			$message_json = $message->getMessage()->toJson();
						
			$bot->answerCallbackQuery($message->getId(), "Request command: {$command}. Loading...");
						
			if($messageSource = TelegramBot\Api\BotApi::jsonValidate($message_json, true))
			{
					if(isset($messageSource['reply_markup']))
						unset($messageSource['reply_markup']);
						
					$messageSource['text'] = $command;
							
					$event = $bot->get_event($command);
							
					if($event !== false)
					{
						$data_json = json_encode(["update_id" => rand(11111111,99999999), "message" => $messageSource]);
								
						if($data = TelegramBot\Api\BotApi::jsonValidate($data_json, true))
						{
							$update = TelegramBot\Api\Types\Update::fromResponse($data);
							$event->executeAction($update); 
						}
						else
						$bot->sendMessage($userid, "🅰️JSON error parse new Update manual build!");
					}
					else
					$bot->sendMessage($userid, "🅰️Command '{$command}' not found!");
			}
			else
			$bot->sendMessage($userid, "🅰️JSON error parse message source toJson build!");
		}
        
        /* OTHER CALLBACK CODE */
	});
    
    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}
```

### Botan SDK (not supported more)

[Botan](http://botan.io) is a telegram bot analytics system based on [Yandex.Appmetrica](http://appmetrica.yandex.com/).
In this document you can find how to setup Yandex.Appmetrica account, as well as examples of Botan SDK usage.

### Creating an account
 * Register at http://appmetrica.yandex.com/
 * After registration you will be prompted to create Application. Please use @YourBotName as a name.
 * Save an API key from settings page, you will use it as a token for Botan API calls.
 * Download lib for your language, and use it as described below. Don`t forget to insert your token!

Since we are only getting started, you may discover that some existing reports in AppMetriсa aren't properly working for Telegram bots, like Geography, Gender, Age, Library, Devices, Traffic sources and Network sections. We will polish that later.

## SDK usage

#### Standalone

```php
$tracker = new \TelegramBot\Api\Botan('YOUR_BOTAN_TRACKER_API_KEY');

$tracker->track($message, $eventName);
```

#### API Wrapper
```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN', 'YOUR_BOTAN_TRACKER_API_KEY');

$bot->track($message, $eventName);
```

 You can use method 'getUpdates()'and all incoming messages will be automatically tracked as `Message`-event.

#### Client
```php
$bot = new \TelegramBot\Api\Client('YOUR_BOT_API_TOKEN', 'YOUR_BOTAN_TRACKER_API_KEY');
```

_All registered commands are automatically tracked as command name_

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
