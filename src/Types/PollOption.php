<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class PollOption
 * This object contains information about one answer option in a poll
 *
 * @package TelegramBot\Api\Types
 */
class PollOption extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['text', 'voter_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'text' => true,
        'voter_count' => true
    ];

    /**
     * Option text, 1-100 characters
     *
     * @var string
     */
    protected $text;

    /**
     * Number of users that voted for this option
     *
     * @var int
     */
    protected $voterCount;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return PollOption
     */
    public function setText(string $text): PollOption
    {
        $this->text = $text;
        
        return $this;
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
     * @return PollOption
     */
    public function setVoterCount(int $voterCount): PollOption
    {
        $this->voterCount = $voterCount;

        return $this;
    }
}
