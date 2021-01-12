<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class PollOption extends BaseType implements TypeInterface
{
    /**
     * @var string[]
     */
    protected static array $requiredParams = ['text', 'voter_count'];

    /**
     * @var array|bool[]
     */
    protected static array $map = [
        'text' => true,
        'voter_count' => true
    ];

    /**
     * Option text, 1-100 characters
     *
     * @var string
     */
    protected string $text;

    /**
     * Number of users that voted for this option
     *
     * @var integer
     */
    protected int $voterCount;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getVoterCount(): int
    {
        return $this->voterCount;
    }

    /**
     * @param int $voterCount
     */
    public function setVoterCount(int $voterCount): void
    {
        $this->voterCount = $voterCount;
    }
}
