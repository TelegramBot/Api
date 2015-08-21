<?php

namespace TelegramBot\Api;

use Closure;
use ReflectionFunction;
use TelegramBot\Api\Events\EventCollection;
use TelegramBot\Api\Types\Message;

class Client
{
    const REGEXP = '/^\/([^\s@]+)(@\S+)?\s?(.*)$/';

    /**
     * @var \TelegramBot\Api\BotApi
     */
    protected $api;

    /**
     * @var \TelegramBot\Api\Events\EventCollection
     */
    protected $events;

    /**
     * Client constructor.
     *
     * @param string $token
     */
    public function __construct($token)
    {
        $this->api = new BotApi($token);
        $this->events = new EventCollection();
    }

    /**
     * Use this method to add command. Parameters will be automatically parsed and passed to closure.
     *
     * @param string $name
     * @param \Closure $action
     *
     * @return \TelegramBot\Api\Client
     */
    public function command($name, Closure $action)
    {
        return $this->on(self::getEvent($action), self::getChecker($name));
    }

    /**
     * Use this method to add an event.
     * If first closure will return true (or if you are passed null instead of closure), second one will be executed.
     *
     * @param \Closure $event
     * @param \Closure|null $checker
     *
     * @return \TelegramBot\Api\Client
     */
    public function on(Closure $event, Closure $checker = null)
    {
        $this->events->add($event, $checker);

        return $this;
    }

    /**
     * Returns event function to handling the command.
     *
     * @param string $action
     *
     * @return \Closure
     */
    protected static function getEvent($action)
    {
        return function (Message $message) use ($action) {
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
     * @return \Closure
     */
    protected static function getChecker($name)
    {
        return function (Message $message) use ($name) {
            if (!strlen($message->getText())) {
                return false;
            }

            preg_match(self::REGEXP, $message->getText(), $matches);

            return !empty($matches) && $matches[1] == $name;
        };
    }


    public function __call($name, array $arguments)
    {
        if (method_exists($this, $name)) {
            return call_user_func_array(array($this, $name), $arguments);
        } elseif (method_exists($this->api, $name)) {
            return call_user_func_array(array($this->api, $name), $arguments);
        }
        throw new BadMethodCallException("Method {$name} not exists");
    }
}
