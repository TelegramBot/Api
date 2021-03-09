<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\Types\ArrayOfMessageEntity;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;
use TelegramBot\Api\Types\MessageEntity;

class Audio extends AbstractInlineQueryResult
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['type', 'id', 'audio_url', 'title'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'id' => true,
        'audio_url' => true,
        'title' => true,
        'caption' => true,
        'parse_mode' => true,
        'caption_entities' => ArrayOfMessageEntity::class,
        'performer' => true,
        'audio_duration' => true,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
    ];

    /**
     * Type of the result, must be audio
     *
     * @var string
     */
    protected string $type = 'audio';

    /**
     * A valid URL for the audio file
     *
     * @var string
     */
    protected string $audioUrl;

    /**
     * Optional. Caption, 0-1024 characters after entities parsing
     *
     * @var string|null
     */
    protected ?string $caption;

    /**
     * Optional. Mode for parsing entities in the audio caption. See formatting options for more details.
     *
     * @var string|null
     */
    protected ?string $parseMode;

    /**
     * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     *
     * @var MessageEntity[]|null
     */
    protected ?array $captionEntities;

    /**
     * Optional. Performer
     *
     * @var string|null
     */
    protected ?string $performer;

    /**
     * Optional. Audio duration in seconds
     *
     * @var int|null
     */
    protected ?int $audioDuration;

    /**
     * @param string                    $id
     * @param string                    $audioUrl
     * @param string                    $title
     * @param string|null               $caption
     * @param string|null               $parseMode
     * @param array|null                $captionEntities
     * @param string|null               $performer
     * @param int|null                  $audioDuration
     * @param InputMessageContent|null  $inputMessageContent
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     */
    public function __construct(
        string $id,
        string $audioUrl,
        string $title,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        string $performer = null,
        int $audioDuration = null,
        ?InputMessageContent $inputMessageContent = null,
        ?InlineKeyboardMarkup $inlineKeyboardMarkup = null
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->audioUrl        = $audioUrl;
        $this->caption         = $caption;
        $this->parseMode       = $parseMode;
        $this->captionEntities = $captionEntities;
        $this->performer       = $performer;
        $this->audioDuration   = $audioDuration;
    }

    /**
     * @return string
     */
    public function getAudioUrl(): string
    {
        return $this->audioUrl;
    }

    /**
     * @param string $audioUrl
     */
    public function setAudioUrl(string $audioUrl): void
    {
        $this->audioUrl = $audioUrl;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     */
    public function setCaption(?string $caption): void
    {
        $this->caption = $caption;
    }

    /**
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
    }

    /**
     * @param string|null $parseMode
     */
    public function setParseMode(?string $parseMode): void
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->captionEntities;
    }

    /**
     * @param MessageEntity[]|null $captionEntities
     */
    public function setCaptionEntities(?array $captionEntities): void
    {
        $this->captionEntities = $captionEntities;
    }

    /**
     * @return string|null
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * @param string|null $performer
     */
    public function setPerformer(?string $performer): void
    {
        $this->performer = $performer;
    }

    /**
     * @return int|null
     */
    public function getAudioDuration(): ?int
    {
        return $this->audioDuration;
    }

    /**
     * @param int|null $audioDuration
     */
    public function setAudioDuration(?int $audioDuration): void
    {
        $this->audioDuration = $audioDuration;
    }
}
