<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Class Poll
 * This object contains information about a poll
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
    static protected $requiredParams = ['id', 'question', 'options', 'is_closed'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'id' => true,
        'question' => true,
        'options' => ArrayOfPollOption::class,
        'is_closed' => true
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
     * @var PollOption[]
     */
    protected $options;

    /**
     * True, if the poll is closed
     *
     * @var bool
     */
    protected $isClosed;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Poll
     */
    public function setId(string $id): Poll
    {
        $this->id = $id;

        return $this;
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
     * @return Poll
     */
    public function setQuestion(string $question): Poll
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return PollOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return Poll
     */
    public function setOptions(array $options): Poll
    {
        $this->options = $options;

        return $this;
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
     * @return Poll
     */
    public function setIsClosed(bool $isClosed): Poll
    {
        $this->isClosed = $isClosed;

        return $this;
    }
}
