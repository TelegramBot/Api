<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;

class PollAnswer extends BaseType
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['poll_id', 'option_ids', 'user'];

    /**
     * @var array
     */
    protected static array $map = [
        'option_ids' => true,
        'user' => User::class,
        'poll_id' => true,
    ];

    /**
     * @var User
     */
    protected User $user;

    /**
     * @var string
     */
    protected string $pollId;

    /**
     * @var int[]
     */
    protected array $optionIds;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPollId(): string
    {
        return $this->pollId;
    }

    /**
     * @param string $pollId
     */
    public function setPollId(string $pollId): void
    {
        $this->pollId = $pollId;
    }

    /**
     * @return int[]
     */
    public function getOptionIds(): array
    {
        return $this->optionIds;
    }

    /**
     * @param int[] $optionIds
     */
    public function setOptionIds(array $optionIds): void
    {
        $this->optionIds = $optionIds;
    }
}
