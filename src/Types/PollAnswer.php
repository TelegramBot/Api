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
 * @package TelegramBot\Api\Types
 */
class PollAnswer extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['poll_id', 'option_ids'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'poll_id' => true,
        'voter_chat' => Chat::class,
        'user' => User::class,
        'option_ids' => true,
    ];

    /**
     * Unique poll identifier
     *
     * @var string
     */
    protected $pollId;

    /**
     * Optional. The chat that changed the answer to the poll, if the voter is anonymous
     *
     * @var Chat|null
     */
    protected $voterChat;

    /**
     * Optional. The user that changed the answer to the poll, if the voter isn't anonymous
     *
     * @var User|null
     */
    protected $user;

    /**
     * 0-based identifiers of chosen answer options. May be empty if the vote was retracted
     *
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
     * @param string $pollId
     * @return void
     */
    public function setPollId($pollId)
    {
        $this->pollId = $pollId;
    }

    /**
     * @return Chat|null
     */
    public function getVoterChat()
    {
        return $this->voterChat;
    }

    /**
     * @param Chat|null $voterChat
     * @return void
     */
    public function setVoterChat($voterChat)
    {
        $this->voterChat = $voterChat;
    }

    /**
     * @return User|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return void
     */
    public function setUser($user)
    {
        $this->user = $user;
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
    public function setOptionIds(array $optionIds)
    {
        $this->optionIds = $optionIds;
    }
}
