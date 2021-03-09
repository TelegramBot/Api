<?php

namespace TelegramBot\Api\Types\Inline\QueryResult;

use TelegramBot\Api\Types\ArrayOfMessageEntity;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\Inline\InputMessageContent;
use TelegramBot\Api\Types\MessageEntity;

class Gif extends AbstractInlineQueryResult
{
    /**
     * @var array|string[]
     */
    protected static array $requiredParams = ['type', 'id', 'gif_url', 'thumb_url'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'id' => true,
        'gif_url' => true,
        'gif_width' => true,
        'gif_height' => true,
        'gif_duration' => true,
        'thumb_url' => true,
        'thumb_mime_type' => true,
        'title' => true,
        'caption' => true,
        'parse_mode' => true,
        'caption_entities' => ArrayOfMessageEntity::class,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
    ];

    /**
     * Type of the result, must be gif
     *
     * @var string
     */
    protected string $type = 'gif';

    /**
     * A valid URL for the GIF file. File size must not exceed 1MB
     *
     * @var string
     */
    protected string $gifUrl;

    /**
     * Optional. Width of the GIF
     *
     * @var int|null
     */
    protected ?int $gifWidth;

    /**
     * Optional. Height of the GIF
     *
     * @var int|null
     */
    protected ?int $gifHeight;

    /**
     * Optional. Duration of the GIF
     *
     * @var int|null
     */
    protected ?int $gifDuration;

    /**
     * URL of the static thumbnail for the result (jpeg or gif)
     *
     * @var string
     */
    protected string $thumbUrl;

    /**
     * Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to
     * “image/jpeg”
     *
     * @var string|null
     */
    protected ?string $thumbMimeType;

    /**
     * Optional. Caption of the GIF file to be sent, 0-200 characters
     *
     * @var string|null
     */
    protected ?string $caption;

    /**
     * Optional. Mode for parsing entities in the caption. See formatting options for more details.
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
     * @param string                    $id
     * @param string                    $gifUrl
     * @param string                    $thumbUrl
     * @param int|null                  $gifWidth
     * @param int|null                  $gifHeight
     * @param int|null                  $gifDuration
     * @param string|null               $thumbMimeType
     * @param string|null               $title
     * @param string|null               $caption
     * @param string|null               $parseMode
     * @param MessageEntity[]|null      $captionEntities
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param InputMessageContent|null  $inputMessageContent
     */
    public function __construct(
        string $id,
        string $gifUrl,
        string $thumbUrl,
        ?int $gifWidth = null,
        ?int $gifHeight = null,
        ?int $gifDuration = null,
        ?string $thumbMimeType = null,
        ?string $title = null,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?InputMessageContent $inputMessageContent = null
    ) {
        parent::__construct($id, $title, $inputMessageContent, $replyMarkup);

        $this->gifUrl          = $gifUrl;
        $this->thumbUrl        = $thumbUrl;
        $this->gifWidth        = $gifWidth;
        $this->gifHeight       = $gifHeight;
        $this->gifDuration     = $gifDuration;
        $this->thumbMimeType   = $thumbMimeType;
        $this->caption         = $caption;
        $this->parseMode       = $parseMode;
        $this->captionEntities = $captionEntities;
    }

    /**
     * @return string
     */
    public function getGifUrl(): string
    {
        return $this->gifUrl;
    }

    /**
     * @param string $gifUrl
     */
    public function setGifUrl(string $gifUrl): void
    {
        $this->gifUrl = $gifUrl;
    }

    /**
     * @return int|null
     */
    public function getGifWidth(): ?int
    {
        return $this->gifWidth;
    }

    /**
     * @param int|null $gifWidth
     */
    public function setGifWidth(?int $gifWidth): void
    {
        $this->gifWidth = $gifWidth;
    }

    /**
     * @return int|null
     */
    public function getGifHeight(): ?int
    {
        return $this->gifHeight;
    }

    /**
     * @param int|null $gifHeight
     */
    public function setGifHeight(?int $gifHeight): void
    {
        $this->gifHeight = $gifHeight;
    }

    /**
     * @return int|null
     */
    public function getGifDuration(): ?int
    {
        return $this->gifDuration;
    }

    /**
     * @param int|null $gifDuration
     */
    public function setGifDuration(?int $gifDuration): void
    {
        $this->gifDuration = $gifDuration;
    }

    /**
     * @return string
     */
    public function getThumbUrl(): string
    {
        return $this->thumbUrl;
    }

    /**
     * @param string $thumbUrl
     */
    public function setThumbUrl(string $thumbUrl): void
    {
        $this->thumbUrl = $thumbUrl;
    }

    /**
     * @return string|null
     */
    public function getThumbMimeType(): ?string
    {
        return $this->thumbMimeType;
    }

    /**
     * @param string|null $thumbMimeType
     */
    public function setThumbMimeType(?string $thumbMimeType): void
    {
        $this->thumbMimeType = $thumbMimeType;
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
}
