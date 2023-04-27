<?php

namespace TelegramBot\Api\Events;

use Closure;
use ReflectionFunction;
use TelegramBot\Api\Botan;
use TelegramBot\Api\Types\Update;

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
     * @var \TelegramBot\Api\Botan|null
     */
    protected $tracker;

    /**
     * EventCollection constructor.
     *
     * @param string $trackerToken
     */
    public function __construct($trackerToken = null)
    {
        $this->events = [];
        if ($trackerToken) {
            @trigger_error(sprintf('Passing $trackerToken to %s is deprecated', self::class), \E_USER_DEPRECATED);
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
     * @return void
     */
    public function handle(Update $update)
    {
        foreach ($this->events as $event) {
            /* @var \TelegramBot\Api\Events\Event $event */
            if ($event->executeChecker($update) === true) {
                if ($event->executeAction($update) === false) {
                    if ($this->tracker && ($message = $update->getMessage())) {
                        $checker = new ReflectionFunction($event->getChecker());
                        $this->tracker->track($message, $checker->getStaticVariables()['name']);
                    }
                    break;
                }
            }
        }
    }
}
