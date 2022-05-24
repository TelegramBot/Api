<?php

namespace TelegramBot\Api;

use Closure;
use ReflectionFunction;
use TelegramBot\Api\Types\Update;
use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\ForceReply;
use TelegramBot\Api\Events\EventCollection;
use TelegramBot\Api\Types\ReplyKeyboardHide;
use TelegramBot\Api\Types\ReplyKeyboardRemove;
use TelegramBot\Api\Types\ReplyKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

/**
 * Class Client
 *
 * @package TelegramBot\Api
 * @method Message editMessageText(string $chatId, int $messageId, string $text, string $parseMode = null, bool $disablePreview = false, ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|null $replyMarkup = null, string $inlineMessageId = null)
 */
class Client
{
    /**
     * RegExp for bot commands
     */
    const REGEXP = '/^(?:@\w+\s)?\/([^\s@]+)(@\S+)?\s?(.*)$/';

    /**
     * @var BotApi
     */
    protected $api;

    /**
     * @var EventCollection
     */
    protected $events;

    /**
     * Client constructor
     *
     * @param string $token Telegram Bot API token
     * @param string|null $trackerToken Yandex AppMetrica application api_key
     */
    public function __construct($token, $trackerToken = null)
    {
        $this->api = new BotApi($token);
        $this->events = new EventCollection($trackerToken);
    }

    /**
     * Use this method to add command. Parameters will be automatically parsed and passed to closure.
     *
     * @param string $name
     * @param Closure $action
     *
     * @return Client
     */
    public function command($name, Closure $action)
    {
        return $this->on(self::getEvent($action), self::getChecker($name));
    }

    /**
     * Use this method to add an event.
     * If second closure will return true (or if you are passed null instead of closure), first one will be executed.
     *
     * @param Closure $event
     * @param Closure|null $checker
     *
     * @return Client
     */
    public function on(Closure $event, Closure $checker = null)
    {
        $this->events->add($event, $checker);

        return $this;
    }

    /**
     * Returns event function to handling the command.
     *
     * @param Closure $action
     *
     * @return Closure
     */
    protected static function getEvent(Closure $action)
    {
        return function(Update $update) use ($action) {
            $message = $update->getMessage();
            if (!$message) {
                return true;
            }

            preg_match(self::REGEXP, $message->getText(), $matches);

            if (isset($matches[3]) && !empty($matches[3])) {
                $parameters = str_getcsv($matches[3], chr(32));
            } else {
                $parameters = [];
            }

            array_unshift($parameters, $message);

            $action = new ReflectionFunction($action);

            if (count($parameters) >= $action->getNumberOfRequiredParameters()) {
                $action->invokeArgs($parameters);
            }

            return false;
        };
    }

    /**
     * Returns check function to handling the command.
     *
     * @param string $name
     *
     * @return Closure
     */
    protected static function getChecker($name)
    {
        return function(Update $update) use ($name) {
            $message = $update->getMessage();
            if (is_null($message) || $message->getText() === '') {
                return false;
            }

            preg_match(self::REGEXP, $message->getText(), $matches);

            return !empty($matches) && $matches[1] == $name;
        };
    }

    public function message(Closure $action)
    {
        return $this->on(self::getMessageEvent($action), self::getMessageChecker());
    }

    protected static function getMessageEvent(Closure $action)
    {
        return function(Update $update) use ($action) {
            if (!$update->getMessage()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getMessage()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the message.
     *
     * @return Closure
     */
    protected static function getMessageChecker()
    {
        return function(Update $update) {
            return !is_null($update->getMessage());
        };
    }

    public function editedMessage(Closure $action)
    {
        return $this->on(self::getEditedMessageEvent($action), self::getEditedMessageChecker());
    }

    protected static function getEditedMessageEvent(Closure $action)
    {
        return function(Update $update) use ($action) {
            if (!$update->getEditedMessage()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getEditedMessage()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the edited message.
     *
     * @return Closure
     */
    protected static function getEditedMessageChecker()
    {
        return function(Update $update) {
            return !is_null($update->getEditedMessage());
        };
    }

    public function callbackQuery(Closure $action)
    {
        return $this->on(self::getCallbackQueryEvent($action), self::getCallbackQueryChecker());
    }

    protected static function getCallbackQueryEvent(Closure $action)
    {
        return function(Update $update) use ($action) {
            if (!$update->getCallbackQuery()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getCallbackQuery()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the callbackQuery.
     *
     * @return Closure
     */
    protected static function getCallbackQueryChecker()
    {
        return function(Update $update) {
            return !is_null($update->getCallbackQuery());
        };
    }

    public function channelPost(Closure $action)
    {
        return $this->on(self::getChannelPostEvent($action), self::getChannelPostChecker());
    }

    protected static function getChannelPostEvent(Closure $action)
    {
        return function(Update $update) use ($action) {
            if (!$update->getChannelPost()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getChannelPost()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the channel post.
     *
     * @return Closure
     */
    protected static function getChannelPostChecker()
    {
        return function(Update $update) {
            return !is_null($update->getChannelPost());
        };
    }

    public function editedChannelPost(Closure $action)
    {
        return $this->on(self::getEditedChannelPostEvent($action), self::getEditedChannelPostChecker());
    }

    protected static function getEditedChannelPostEvent(Closure $action)
    {
        return function(Update $update) use ($action) {
            if (!$update->getEditedChannelPost()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getEditedChannelPost()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the edited channel post.
     *
     * @return Closure
     */
    protected static function getEditedChannelPostChecker()
    {
        return function(Update $update) {
            return !is_null($update->getEditedChannelPost());
        };
    }

    public function inlineQuery(Closure $action)
    {
        return $this->on(self::getInlineQueryEvent($action), self::getInlineQueryChecker());
    }

    protected static function getInlineQueryEvent(Closure $action)
    {
        return function(Update $update) use ($action) {
            if (!$update->getInlineQuery()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getInlineQuery()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the inline queries.
     *
     * @return Closure
     */
    protected static function getInlineQueryChecker()
    {
        return function(Update $update) {
            return !is_null($update->getInlineQuery());
        };
    }

    public function chosenInlineResult(Closure $action)
    {
        return $this->on(self::getChosenInlineResultEvent($action), self::getChosenInlineResultChecker());
    }

    protected static function getChosenInlineResultEvent(Closure $action)
    {
        return function(Update $update) use ($action) {
            if (!$update->getChosenInlineResult()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getChosenInlineResult()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the chosen inline result.
     *
     * @return Closure
     */
    protected static function getChosenInlineResultChecker()
    {
        return function(Update $update) {
            return !is_null($update->getChosenInlineResult());
        };
    }

    public function shippingQuery(Closure $action)
    {
        return $this->on(self::getShippingQueryEvent($action), self::getShippingQueryChecker());
    }

    protected static function getShippingQueryEvent(Closure $action)
    {
        return function(Update $update) use ($action) {
            if (!$update->getShippingQuery()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getShippingQuery()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the shipping queries.
     *
     * @return Closure
     */
    protected static function getShippingQueryChecker()
    {
        return function(Update $update) {
            return !is_null($update->getShippingQuery());
        };
    }

    public function preCheckoutQuery(Closure $action)
    {
        return $this->on(self::getPreCheckoutQueryEvent($action), self::getPreCheckoutQueryChecker());
    }

    protected static function getPreCheckoutQueryEvent(Closure $action)
    {
        return function(Update $update) use ($action) {
            if (!$update->getPreCheckoutQuery()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getPreCheckoutQuery()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the pre checkout queries.
     *
     * @return Closure
     */
    protected static function getPreCheckoutQueryChecker()
    {
        return function(Update $update) {
            return !is_null($update->getPreCheckoutQuery());
        };
    }

    /**
     * @return void
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     */
    public function run()
    {
        if ($data = BotApi::jsonValidate($this->getRawBody(), true)) {
            $this->handle([Update::fromResponse($data)]);
        }
    }

    /**
     * @return false|string
     */
    public function getRawBody()
    {
        return file_get_contents('php://input');
    }

    /**
     * Handle updates
     *
     * @param array $updates
     * @return void
     */
    public function handle(array $updates)
    {
        foreach ($updates as $update) {
            /* @var Update $update */
            $this->events->handle($update);
        }
    }

    /**
     * @param $name
     * @param array $arguments
     * @return mixed
     * @throws BadMethodCallException
     */
    public function __call($name, array $arguments)
    {
        if (method_exists($this, $name)) {
            return call_user_func_array([$this, $name], $arguments);
        }

        if (method_exists($this->api, $name)) {
            return call_user_func_array([$this->api, $name], $arguments);
        }
        throw new BadMethodCallException("Method $name not exists");
    }
}
