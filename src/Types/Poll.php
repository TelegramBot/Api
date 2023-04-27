<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class Poll
 * This object contains information about a poll.
 *
 * @package TelegramBot\Api\Types
 */
class Poll extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = [
        'id',
        'question',
        'options',
        'total_voter_count',
        'is_closed',
        'is_anonymous',
        'type',
        'allows_multiple_answers',
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'id' => true,
        'question' => true,
        'options' => ArrayOfPollOption::class,
        'total_voter_count' => true,
        'is_closed' => true,
        'is_anonymous' => true,
        'type' => true,
        'allows_multiple_answers' => true,
        'correct_option_id' => true,
    ];

    /**
     * Unique poll identifier
     *
     * @var string
     */
    protected $id;

    /**
     * Poll question, 1-255 characters
     *
     * @var string
     */
    protected $question;

    /**
     * List of poll options
     * Array of \TelegramBot\Api\Types\PollOption
     *
     * @var array
     */
    protected $options;

    /**
     * Total number of users that voted in the poll
     *
     * @var int
     */
    protected $totalVoterCount;

    /**
     * True, if the poll is closed
     *
     * @var bool
     */
    protected $isClosed;

    /**
     * True, if the poll is anonymous
     *
     * @var bool
     */
    protected $isAnonymous;

    /**
     * Poll type, currently can be “regular” or “quiz”
     *
     * @var string
     */
    protected $type;

    /**
     * True, if the poll allows multiple answers
     *
     * @var bool
     */
    protected $allowsMultipleAnswers;

    /**
     * Optional. 0-based identifier of the correct answer option.
     * Available only for polls in the quiz mode, which are closed, or was sent (not forwarded)
     * by the bot or to the private chat with the bot.
     *
     * @var int|null
     */
    protected $correctOptionId;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param string $question
     * @return void
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return void
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return int
     */
    public function getTotalVoterCount()
    {
        return $this->totalVoterCount;
    }

    /**
     * @param int $totalVoterCount
     * @return void
     */
    public function setTotalVoterCount($totalVoterCount)
    {
        $this->totalVoterCount = $totalVoterCount;
    }

    /**
     * @return bool
     */
    public function isClosed()
    {
        return $this->isClosed;
    }

    /**
     * @param bool $isClosed
     * @return void
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;
    }

    /**
     * @return bool
     */
    public function isAnonymous()
    {
        return $this->isAnonymous;
    }

    /**
     * @param bool $isAnonymous
     * @return void
     */
    public function setIsAnonymous($isAnonymous)
    {
        $this->isAnonymous = $isAnonymous;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isAllowsMultipleAnswers()
    {
        return $this->allowsMultipleAnswers;
    }

    /**
     * @param bool $allowsMultipleAnswers
     * @return void
     */
    public function setAllowsMultipleAnswers($allowsMultipleAnswers)
    {
        $this->allowsMultipleAnswers = $allowsMultipleAnswers;
    }

    /**
     * @return int|null
     */
    public function getCorrectOptionId()
    {
        return $this->correctOptionId;
    }

    /**
     * @param int $correctOptionId
     * @return void
     */
    public function setCorrectOptionId($correctOptionId)
    {
        $this->correctOptionId = $correctOptionId;
    }
}
