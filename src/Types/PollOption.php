<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class PollOption
 * This object contains information about one answer option in a poll.
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
    protected static $requiredParams = ['text', 'voter_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'text' => true,
        'voter_count' => true,
        'text_entities' => ArrayOfMessageEntity::class
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
     * @var integer
     */
    protected $voterCount;

    /**
     * Optional. Special entities that appear in the option text. Currently, only custom emoji entities are allowed in poll option texts
     *
     * @var array|null
     */
    protected $textEntities;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getVoterCount()
    {
        return $this->voterCount;
    }

    /**
     * @param int $voterCount
     * @return void
     */
    public function setVoterCount($voterCount)
    {
        $this->voterCount = $voterCount;
    }

    /**
     * @return array|null
     */
    public function getTextEntities()
    {
        return $this->textEntities;
    }

    /**
     * @param array|null $textEntities
     * @return void
     */
    public function setTextEntities($textEntities)
    {
        $this->textEntities = $textEntities;
    }
}
