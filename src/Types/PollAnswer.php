<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

/**
 * Class PollAnswer
 *
 * @see https://core.telegram.org/bots/api#pollanswer
 *
 * This object represents an answer of a user in a non-anonymous poll.
 *
 *
 * @package TelegramBot\Api\Types
 */
class PollAnswer extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['poll_id', 'option_ids', 'user'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'option_ids' => true,
        'user' => User::class,
        'poll_id' => true,
    ];

    /**
     * @var \TelegramBot\Api\Types\User
     */
    protected $user;

    /**
     * @var string
     */
    protected $pollId;

    /**
     * @var int[]
     */
    protected $optionIds;

    /**
     * @return string
     */
    public function getPollId()
    {
        return $this->pollId;
    }

    /**
     * @param string $id
     */
    public function setPollId($id)
    {
        $this->pollId = $id;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $from
     */
    public function setUser(User $from)
    {
        $this->user = $from;
    }

    /**
     * @return User
     */
    public function getFrom()
    {
        return $this->getUser();
    }

    /**
     * @param User $from
     */
    public function setFrom(User $from)
    {
        return $this->setUser($from);
    }

    /**
     * @return int[]
     */
    public function getOptionIds()
    {
        return $this->optionIds;
    }

    /**
     * @param int[] $optionIds
     */
    public function setOptionIds($optionIds)
    {
        $this->optionIds = $optionIds;
    }
}
