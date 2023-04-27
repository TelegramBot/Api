<?php

namespace TelegramBot\Api\Events;

use TelegramBot\Api\Types\Update;

class Event
{
    /**
     * @var \Closure|null
     */
    protected $checker;

    /**
     * @var \Closure
     */
    protected $action;

    /**
     * Event constructor.
     *
     * @param \Closure $action
     * @param \Closure|null $checker
     */
    public function __construct(\Closure $action, \Closure $checker = null)
    {
        $this->action = $action;
        $this->checker = $checker;
    }

    /**
     * @return \Closure
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return \Closure|null
     */
    public function getChecker()
    {
        return $this->checker;
    }

    /**
     * @return mixed
     */
    public function executeChecker(Update $message)
    {
        if (is_callable($this->checker)) {
            return call_user_func($this->checker, $message);
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function executeAction(Update $message)
    {
        return call_user_func($this->action, $message);
    }
}
