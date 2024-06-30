<?php

namespace TelegramBot\Api\Events;

use Closure;
use TelegramBot\Api\Types\Update;

class EventCollection
{
    /**
     * Array of events.
     *
     * @var array
     */
    protected $events = [];

    /**
     * Add new event to collection
     *
     * @param Closure $event
     * @param Closure|null $checker
     *
     * @return \TelegramBot\Api\Events\EventCollection
     */
    public function add(Closure $event, $checker = null)
    {
        $this->events[] = !is_null($checker) ? new Event($event, $checker)
            : new Event($event, function () {});

        return $this;
    }

    /**
     * @return void
     */
    public function handle(Update $update)
    {
        foreach ($this->events as $event) {
            /* @var \TelegramBot\Api\Events\Event $event */
            if ($event->executeChecker($update) === true) {
                if ($event->executeAction($update) === false) {
                    break;
                }
            }
        }
    }
}
