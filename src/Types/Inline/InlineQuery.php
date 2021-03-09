<?php

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\Types\Location;
use TelegramBot\Api\Types\User;

class InlineQuery extends BaseType
{
    /**
     * @var string[]
     */
    protected static array $requiredParams = ['id', 'from', 'query', 'offset'];

    /**
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'from' => User::class,
        'location' => Location::class,
        'query' => true,
        'offset' => true,
    ];

    /**
     * Unique identifier for this query
     *
     * @var string
     */
    protected string $id;

    /**
     * Sender
     *
     * @var User
     */
    protected User $from;


    /**
     * Optional. Sender location, only for bots that request user location
     *
     * @var Location
     */
    protected Location $location;

    /**
     * Text of the query
     *
     * @var string
     */
    protected string $query;

    /**
     * Offset of the results to be returned, can be controlled by the bot
     *
     * @var string
     */
    protected string $offset;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     */
    public function setFrom(User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     */
    public function setQuery(string $query): void
    {
        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getOffset(): string
    {
        return $this->offset;
    }

    /**
     * @param string $offset
     */
    public function setOffset(string $offset): void
    {
        $this->offset = $offset;
    }
}
