<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class ProximityAlertTriggered
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
 *
 * @package TelegramBot\Api\Types
 */
class ProximityAlertTriggered extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['traveler', 'watcher', 'distance'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'traveler' => User::class,
        'watcher' => User::class,
        'distance' => true,
    ];

    /**
     * User that triggered the alert
     *
     * @var User
     */
    protected $traveler;

    /**
     * User that set the alert
     *
     * @var User
     */
    protected $watcher;

    /**
     * The distance between the users
     *
     * @var int
     */
    protected $distance;

    /**
     * @return User
     */
    public function getTraveler()
    {
        return $this->traveler;
    }

    /**
     * @param User $traveler
     * @return void
     */
    public function setTraveler(User $traveler)
    {
        $this->traveler = $traveler;
    }

    /**
     * @return User
     */
    public function getWatcher()
    {
        return $this->watcher;
    }

    /**
     * @param User $watcher
     * @return void
     */
    public function setWatcher(User $watcher)
    {
        $this->watcher = $watcher;
    }

    /**
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     * @return void
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }
}
