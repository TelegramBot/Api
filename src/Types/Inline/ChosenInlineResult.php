<?php

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;
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
    static protected $requiredParams = ['result_id', 'from', 'query'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'result_id' => true,
        'from' => User::class,
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
     */
    public function setFrom(User $from)
    {
        $this->from = $from;
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
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }
}
