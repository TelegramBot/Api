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
    protected static $requiredParams = ['poll_id', 'option_ids', 'user'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
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
     * @return void
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
     * @return void
     */
    public function setUser(User $from)
    {
        $this->user = $from;
    }

    /**
     * @deprecated
     *
     * @return User
     */
    public function getFrom()
    {
        @trigger_error(sprintf('Access user with %s is deprecated, use "%s::getUser" method', __METHOD__, __CLASS__), \E_USER_DEPRECATED);

        return $this->getUser();
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
     * @return void
     */
    public function setOptionIds($optionIds)
    {
        $this->optionIds = $optionIds;
    }
}
