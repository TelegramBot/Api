<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class Poll extends BaseType implements TypeInterface
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = [
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
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'question' => true,
        'options' => ArrayOfPollOption::class,
        'total_voter_count' => true,
        'is_closed' => true,
        'is_anonymous' => true,
        'type' => true,
        'allows_multiple_answers' => true,
        'correct_option_id' => true,
        'explanation' => true,
        'explanation_entities' => ArrayOfMessageEntity::class,
        'open_period' => true,
        'close_date' => true
    ];

    /**
     * Unique poll identifier
     *
     * @var string
     */
    protected string $id;

    /**
     * Poll question, 1-255 characters
     *
     * @var string
     */
    protected string $question;

    /**
     * List of poll options
     * Array of \TelegramBot\Api\Types\PollOption
     *
     * @var PollOption[]
     */
    protected array $options;

    /**
     * Total number of users that voted in the poll
     *
     * @var int
     */
    protected int $totalVoterCount;

    /**
     * True, if the poll is closed
     *
     * @var boolean
     */
    protected bool $isClosed;

    /**
     * True, if the poll is anonymous
     *
     * @var bool
     */
    protected bool $isAnonymous;

    /**
     * Poll type, currently can be “regular” or “quiz”
     *
     * @var string
     */
    protected string $type;

    /**
     * True, if the poll allows multiple answers
     *
     * @var bool
     */
    protected bool $allowsMultipleAnswers;

    /**
     * Optional. 0-based identifier of the correct answer option.
     * Available only for polls in the quiz mode, which are closed, or was sent (not forwarded)
     * by the bot or to the private chat with the bot.
     *
     * @var int
     */
    protected int $correctOptionId;

    /**
     * Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style
     * poll, 0-200 characters
     *
     * @var string
     */
    protected string $explanation;

    /**
     * Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
     *
     * @var MessageEntity[]
     */
    protected array $explanationEntities;

    /**
     * Optional. Amount of time in seconds the poll will be active after creation
     *
     * @var int
     */
    protected int $openPeriod;

    /**
     * Optional. Point in time (Unix timestamp) when the poll will be automatically closed
     *
     * @var int
     */
    protected int $closeDate;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return PollOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param PollOption[] $options
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    /**
     * @return int
     */
    public function getTotalVoterCount(): int
    {
        return $this->totalVoterCount;
    }

    /**
     * @param int $totalVoterCount
     */
    public function setTotalVoterCount(int $totalVoterCount): void
    {
        $this->totalVoterCount = $totalVoterCount;
    }

    /**
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->isClosed;
    }

    /**
     * @param bool $isClosed
     */
    public function setIsClosed(bool $isClosed): void
    {
        $this->isClosed = $isClosed;
    }

    /**
     * @return bool
     */
    public function isAnonymous(): bool
    {
        return $this->isAnonymous;
    }

    /**
     * @param bool $isAnonymous
     */
    public function setIsAnonymous(bool $isAnonymous): void
    {
        $this->isAnonymous = $isAnonymous;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isAllowsMultipleAnswers(): bool
    {
        return $this->allowsMultipleAnswers;
    }

    /**
     * @param bool $allowsMultipleAnswers
     */
    public function setAllowsMultipleAnswers(bool $allowsMultipleAnswers): void
    {
        $this->allowsMultipleAnswers = $allowsMultipleAnswers;
    }

    /**
     * @return int
     */
    public function getCorrectOptionId(): int
    {
        return $this->correctOptionId;
    }

    /**
     * @param int $correctOptionId
     */
    public function setCorrectOptionId(int $correctOptionId): void
    {
        $this->correctOptionId = $correctOptionId;
    }

    /**
     * @return string
     */
    public function getExplanation(): string
    {
        return $this->explanation;
    }

    /**
     * @param string $explanation
     */
    public function setExplanation(string $explanation): void
    {
        $this->explanation = $explanation;
    }

    /**
     * @return MessageEntity[]
     */
    public function getExplanationEntities(): array
    {
        return $this->explanationEntities;
    }

    /**
     * @param MessageEntity[] $explanationEntities
     */
    public function setExplanationEntities(array $explanationEntities): void
    {
        $this->explanationEntities = $explanationEntities;
    }

    /**
     * @return int
     */
    public function getOpenPeriod(): int
    {
        return $this->openPeriod;
    }

    /**
     * @param int $openPeriod
     */
    public function setOpenPeriod(int $openPeriod): void
    {
        $this->openPeriod = $openPeriod;
    }

    /**
     * @return int
     */
    public function getCloseDate(): int
    {
        return $this->closeDate;
    }

    /**
     * @param int $closeDate
     */
    public function setCloseDate(int $closeDate): void
    {
        $this->closeDate = $closeDate;
    }
}
