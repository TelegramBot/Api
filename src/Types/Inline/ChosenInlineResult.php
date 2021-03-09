<?php

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\Types\Location;
use TelegramBot\Api\Types\User;

class ChosenInlineResult extends BaseType
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['result_id', 'from', 'query'];

    /**
     * @var array
     */
    protected static array $map = [
        'result_id' => true,
        'from' => User::class,
        'location' => Location::class,
        'inline_message_id' => true,
        'query' => true,
    ];

    /**
     * The unique identifier for the result that was chosen.
     *
     * @var string
     */
    protected string $resultId;

    /**
     * The user that chose the result.
     *
     * @var User
     */
    protected User $from;

    /**
     * Optional. Sender location, only for bots that require user location
     *
     * @var Location
     */
    protected Location $location;

    /**
     * Optional. Identifier of the sent inline message.
     * Available only if there is an inline keyboard attached to the message.
     * Will be also received in callback queries and can be used to edit the message.
     *
     * @var string
     */
    protected string $inlineMessageId;

    /**
     * The query that was used to obtain the result.
     *
     * @var string
     */
    protected string $query;

    /**
     * @return string
     */
    public function getResultId(): string
    {
        return $this->resultId;
    }

    /**
     * @param string $resultId
     */
    public function setResultId(string $resultId): void
    {
        $this->resultId = $resultId;
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
    public function getInlineMessageId(): string
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string $inlineMessageId
     */
    public function setInlineMessageId(string $inlineMessageId): void
    {
        $this->inlineMessageId = $inlineMessageId;
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
}
