<?php

namespace TelegramBot\Api\Events;

use Closure;
use ReflectionFunction;
use TelegramBot\Api\Botan;
use TelegramBot\Api\Types\Message;

class EventCollection
{
    /**
     * Array of events.
     *
     * @var array
     */
    protected $events;

    /**
     * Botan tracker
     *
     * @var \TelegramBot\Api\Botan
     */
    protected $tracker;

    /**
     * EventCollection constructor.
     *
     * @param string $trackerToken
     */
    public function __construct($trackerToken = null)
    {
        if ($trackerToken) {
            $this->tracker = new Botan($trackerToken);
        }
    }


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
            : new Event($event, function () {
            });

        return $this;
    }

    /**
     * @param \TelegramBot\Api\Types\Message
     */
    public function handle(Message $message)
    {
        foreach ($this->events as $event) {
            if ($event->executeChecker($message) === true) {
                if (false === $event->executeAction($message) && !is_null($this->tracker)) {
                    $checker = new ReflectionFunction($event->getChecker());
                    $this->tracker->track($message, $checker->getStaticVariables()['name']);
                    break;
                }
            }
        }
    }
}
