<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;

class AbstractInlineQueryResult extends BaseType
{
    /**
     * Type of the result, must be one of: article, photo, gif, mpeg4_gif, video
     *
     * @var string
     */
    protected string $type;

    /**
     * Unique identifier for this result, 1-64 bytes
     *
     * @var string
     */
    protected string $id;

    /**
     * Title for the result
     *
     * @var string
     */
    protected string $title;

    /**
     * Content of the message to be sent instead of the file
     *
     * @var InputMessageContent|null
     */
    protected ?InputMessageContent $inputMessageContent;

    /**
     * Optional. Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    protected ?InlineKeyboardMarkup $replyMarkup;

    /**
     * @param string                    $id
     * @param string                    $title
     * @param InputMessageContent|null  $inputMessageContent
     * @param InlineKeyboardMarkup|null $replyMarkup
     */
    public function __construct(
        string $id,
        string $title,
        ?InputMessageContent $inputMessageContent = null,
        ?InlineKeyboardMarkup $replyMarkup = null
    ) {
        $this->id                  = $id;
        $this->title               = $title;
        $this->inputMessageContent = $inputMessageContent;
        $this->replyMarkup         = $replyMarkup;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return InputMessageContent|null
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->inputMessageContent;
    }

    /**
     * @param InputMessageContent|null $inputMessageContent
     */
    public function setInputMessageContent(?InputMessageContent $inputMessageContent): void
    {
        $this->inputMessageContent = $inputMessageContent;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * @param InlineKeyboardMarkup|null $replyMarkup
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $replyMarkup): void
    {
        $this->replyMarkup = $replyMarkup;
    }
}
