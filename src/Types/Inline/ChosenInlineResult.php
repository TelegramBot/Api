<?php

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\Types\Location;
use TelegramBot\Api\Types\User;

/**
 * Class ChosenInlineResult
 * This object represents a result of an inline query that was chosen by the user and sent to their chat partner.
 *
 * @package TelegramBot\Api\Types
 */
class ChosenInlineResult extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['result_id', 'from', 'query'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
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
    protected $resultId;

    /**
     * The user that chose the result.
     *
     * @var User
     */
    protected $from;

    /**
     * Optional. Sender location, only for bots that require user location
     *
     * @var Location|null
     */
    protected $location;

    /**
     * Optional. Identifier of the sent inline message.
     * Available only if there is an inline keyboard attached to the message.
     * Will be also received in callback queries and can be used to edit the message.
     *
     * @var string|null
     */
    protected $inlineMessageId;

    /**
     * The query that was used to obtain the result.
     *
     * @var string
     */
    protected $query;

    /**
     * @return string
     */
    public function getResultId()
    {
        return $this->resultId;
    }

    /**
     * @param string $resultId
     *
     * @return void
     */
    public function setResultId($resultId)
    {
        $this->resultId = $resultId;
    }

    /**
     * @return User
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param User $from
     *
     * @return void
     */
    public function setFrom(User $from)
    {
        $this->from = $from;
    }

    /**
     * @return Location|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     *
     * @return void
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return null|string
     */
    public function getInlineMessageId()
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string $inlineMessageId
     *
     * @return void
     */
    public function setInlineMessageId($inlineMessageId)
    {
        $this->inlineMessageId = $inlineMessageId;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param string $query
     *
     * @return void
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }
}
