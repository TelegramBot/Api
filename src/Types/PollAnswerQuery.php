<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;


/**
 * Class PollAnswerQuery
 *
 * Poll answer from user
 *
 * @package TelegramBot\Api\Types
 */
class PollAnswerQuery extends BaseType
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
     * Sender
     *
     * @var \TelegramBot\Api\Types\User
     */
    protected $user;

    /**
     *
     * @var int
     */
    protected $poll_id;

    /**
     * @var int[]
     */
    protected $option_ids;


    /**
     * @return string
     */
    public function getPollId()
    {
        return $this->poll_id;
    }

    /**
     * @param string $id
     */
    public function setPollId($id)
    {
        $this->poll_id = $id;
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
        return $this->option_ids;
    }

    /**
     * @param int[] $optionIds
     */
    public function setOptionIds( $optionIds)
    {
        $this->option_ids = $optionIds;
    }


}
